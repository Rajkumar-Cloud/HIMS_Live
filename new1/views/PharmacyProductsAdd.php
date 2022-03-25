<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyProductsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_productsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpharmacy_productsadd = currentForm = new ew.Form("fpharmacy_productsadd", "add");

    // Add fields
    var fields = ew.vars.tables.pharmacy_products.fields;
    fpharmacy_productsadd.addFields([
        ["ProductName", [fields.ProductName.required ? ew.Validators.required(fields.ProductName.caption) : null], fields.ProductName.isInvalid],
        ["DivisionCode", [fields.DivisionCode.required ? ew.Validators.required(fields.DivisionCode.caption) : null], fields.DivisionCode.isInvalid],
        ["ManufacturerCode", [fields.ManufacturerCode.required ? ew.Validators.required(fields.ManufacturerCode.caption) : null], fields.ManufacturerCode.isInvalid],
        ["SupplierCode", [fields.SupplierCode.required ? ew.Validators.required(fields.SupplierCode.caption) : null], fields.SupplierCode.isInvalid],
        ["AlternateSupplierCodes", [fields.AlternateSupplierCodes.required ? ew.Validators.required(fields.AlternateSupplierCodes.caption) : null], fields.AlternateSupplierCodes.isInvalid],
        ["AlternateProductCode", [fields.AlternateProductCode.required ? ew.Validators.required(fields.AlternateProductCode.caption) : null], fields.AlternateProductCode.isInvalid],
        ["UniversalProductCode", [fields.UniversalProductCode.required ? ew.Validators.required(fields.UniversalProductCode.caption) : null, ew.Validators.integer], fields.UniversalProductCode.isInvalid],
        ["BookProductCode", [fields.BookProductCode.required ? ew.Validators.required(fields.BookProductCode.caption) : null, ew.Validators.integer], fields.BookProductCode.isInvalid],
        ["OldCode", [fields.OldCode.required ? ew.Validators.required(fields.OldCode.caption) : null], fields.OldCode.isInvalid],
        ["ProtectedProducts", [fields.ProtectedProducts.required ? ew.Validators.required(fields.ProtectedProducts.caption) : null, ew.Validators.integer], fields.ProtectedProducts.isInvalid],
        ["ProductFullName", [fields.ProductFullName.required ? ew.Validators.required(fields.ProductFullName.caption) : null], fields.ProductFullName.isInvalid],
        ["UnitOfMeasure", [fields.UnitOfMeasure.required ? ew.Validators.required(fields.UnitOfMeasure.caption) : null, ew.Validators.integer], fields.UnitOfMeasure.isInvalid],
        ["UnitDescription", [fields.UnitDescription.required ? ew.Validators.required(fields.UnitDescription.caption) : null], fields.UnitDescription.isInvalid],
        ["BulkDescription", [fields.BulkDescription.required ? ew.Validators.required(fields.BulkDescription.caption) : null], fields.BulkDescription.isInvalid],
        ["BarCodeDescription", [fields.BarCodeDescription.required ? ew.Validators.required(fields.BarCodeDescription.caption) : null], fields.BarCodeDescription.isInvalid],
        ["PackageInformation", [fields.PackageInformation.required ? ew.Validators.required(fields.PackageInformation.caption) : null], fields.PackageInformation.isInvalid],
        ["PackageId", [fields.PackageId.required ? ew.Validators.required(fields.PackageId.caption) : null, ew.Validators.integer], fields.PackageId.isInvalid],
        ["Weight", [fields.Weight.required ? ew.Validators.required(fields.Weight.caption) : null, ew.Validators.float], fields.Weight.isInvalid],
        ["AllowFractions", [fields.AllowFractions.required ? ew.Validators.required(fields.AllowFractions.caption) : null, ew.Validators.integer], fields.AllowFractions.isInvalid],
        ["MinimumStockLevel", [fields.MinimumStockLevel.required ? ew.Validators.required(fields.MinimumStockLevel.caption) : null, ew.Validators.float], fields.MinimumStockLevel.isInvalid],
        ["MaximumStockLevel", [fields.MaximumStockLevel.required ? ew.Validators.required(fields.MaximumStockLevel.caption) : null, ew.Validators.float], fields.MaximumStockLevel.isInvalid],
        ["ReorderLevel", [fields.ReorderLevel.required ? ew.Validators.required(fields.ReorderLevel.caption) : null, ew.Validators.float], fields.ReorderLevel.isInvalid],
        ["MinMaxRatio", [fields.MinMaxRatio.required ? ew.Validators.required(fields.MinMaxRatio.caption) : null, ew.Validators.float], fields.MinMaxRatio.isInvalid],
        ["AutoMinMaxRatio", [fields.AutoMinMaxRatio.required ? ew.Validators.required(fields.AutoMinMaxRatio.caption) : null, ew.Validators.float], fields.AutoMinMaxRatio.isInvalid],
        ["ScheduleCode", [fields.ScheduleCode.required ? ew.Validators.required(fields.ScheduleCode.caption) : null, ew.Validators.integer], fields.ScheduleCode.isInvalid],
        ["RopRatio", [fields.RopRatio.required ? ew.Validators.required(fields.RopRatio.caption) : null, ew.Validators.float], fields.RopRatio.isInvalid],
        ["MRP", [fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["PurchasePrice", [fields.PurchasePrice.required ? ew.Validators.required(fields.PurchasePrice.caption) : null, ew.Validators.float], fields.PurchasePrice.isInvalid],
        ["PurchaseUnit", [fields.PurchaseUnit.required ? ew.Validators.required(fields.PurchaseUnit.caption) : null, ew.Validators.float], fields.PurchaseUnit.isInvalid],
        ["PurchaseTaxCode", [fields.PurchaseTaxCode.required ? ew.Validators.required(fields.PurchaseTaxCode.caption) : null, ew.Validators.integer], fields.PurchaseTaxCode.isInvalid],
        ["AllowDirectInward", [fields.AllowDirectInward.required ? ew.Validators.required(fields.AllowDirectInward.caption) : null, ew.Validators.integer], fields.AllowDirectInward.isInvalid],
        ["SalePrice", [fields.SalePrice.required ? ew.Validators.required(fields.SalePrice.caption) : null, ew.Validators.float], fields.SalePrice.isInvalid],
        ["SaleUnit", [fields.SaleUnit.required ? ew.Validators.required(fields.SaleUnit.caption) : null, ew.Validators.float], fields.SaleUnit.isInvalid],
        ["SalesTaxCode", [fields.SalesTaxCode.required ? ew.Validators.required(fields.SalesTaxCode.caption) : null, ew.Validators.integer], fields.SalesTaxCode.isInvalid],
        ["StockReceived", [fields.StockReceived.required ? ew.Validators.required(fields.StockReceived.caption) : null, ew.Validators.float], fields.StockReceived.isInvalid],
        ["TotalStock", [fields.TotalStock.required ? ew.Validators.required(fields.TotalStock.caption) : null, ew.Validators.float], fields.TotalStock.isInvalid],
        ["StockType", [fields.StockType.required ? ew.Validators.required(fields.StockType.caption) : null, ew.Validators.integer], fields.StockType.isInvalid],
        ["StockCheckDate", [fields.StockCheckDate.required ? ew.Validators.required(fields.StockCheckDate.caption) : null, ew.Validators.datetime(0)], fields.StockCheckDate.isInvalid],
        ["StockAdjustmentDate", [fields.StockAdjustmentDate.required ? ew.Validators.required(fields.StockAdjustmentDate.caption) : null, ew.Validators.datetime(0)], fields.StockAdjustmentDate.isInvalid],
        ["Remarks", [fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["CostCentre", [fields.CostCentre.required ? ew.Validators.required(fields.CostCentre.caption) : null, ew.Validators.integer], fields.CostCentre.isInvalid],
        ["ProductType", [fields.ProductType.required ? ew.Validators.required(fields.ProductType.caption) : null, ew.Validators.integer], fields.ProductType.isInvalid],
        ["TaxAmount", [fields.TaxAmount.required ? ew.Validators.required(fields.TaxAmount.caption) : null, ew.Validators.float], fields.TaxAmount.isInvalid],
        ["TaxId", [fields.TaxId.required ? ew.Validators.required(fields.TaxId.caption) : null, ew.Validators.integer], fields.TaxId.isInvalid],
        ["ResaleTaxApplicable", [fields.ResaleTaxApplicable.required ? ew.Validators.required(fields.ResaleTaxApplicable.caption) : null, ew.Validators.integer], fields.ResaleTaxApplicable.isInvalid],
        ["CstOtherTax", [fields.CstOtherTax.required ? ew.Validators.required(fields.CstOtherTax.caption) : null], fields.CstOtherTax.isInvalid],
        ["TotalTax", [fields.TotalTax.required ? ew.Validators.required(fields.TotalTax.caption) : null, ew.Validators.float], fields.TotalTax.isInvalid],
        ["ItemCost", [fields.ItemCost.required ? ew.Validators.required(fields.ItemCost.caption) : null, ew.Validators.float], fields.ItemCost.isInvalid],
        ["ExpiryDate", [fields.ExpiryDate.required ? ew.Validators.required(fields.ExpiryDate.caption) : null, ew.Validators.datetime(0)], fields.ExpiryDate.isInvalid],
        ["BatchDescription", [fields.BatchDescription.required ? ew.Validators.required(fields.BatchDescription.caption) : null], fields.BatchDescription.isInvalid],
        ["FreeScheme", [fields.FreeScheme.required ? ew.Validators.required(fields.FreeScheme.caption) : null, ew.Validators.integer], fields.FreeScheme.isInvalid],
        ["CashDiscountEligibility", [fields.CashDiscountEligibility.required ? ew.Validators.required(fields.CashDiscountEligibility.caption) : null, ew.Validators.integer], fields.CashDiscountEligibility.isInvalid],
        ["DiscountPerAllowInBill", [fields.DiscountPerAllowInBill.required ? ew.Validators.required(fields.DiscountPerAllowInBill.caption) : null, ew.Validators.float], fields.DiscountPerAllowInBill.isInvalid],
        ["Discount", [fields.Discount.required ? ew.Validators.required(fields.Discount.caption) : null, ew.Validators.float], fields.Discount.isInvalid],
        ["TotalAmount", [fields.TotalAmount.required ? ew.Validators.required(fields.TotalAmount.caption) : null, ew.Validators.float], fields.TotalAmount.isInvalid],
        ["StandardMargin", [fields.StandardMargin.required ? ew.Validators.required(fields.StandardMargin.caption) : null, ew.Validators.float], fields.StandardMargin.isInvalid],
        ["Margin", [fields.Margin.required ? ew.Validators.required(fields.Margin.caption) : null, ew.Validators.float], fields.Margin.isInvalid],
        ["MarginId", [fields.MarginId.required ? ew.Validators.required(fields.MarginId.caption) : null, ew.Validators.integer], fields.MarginId.isInvalid],
        ["ExpectedMargin", [fields.ExpectedMargin.required ? ew.Validators.required(fields.ExpectedMargin.caption) : null, ew.Validators.float], fields.ExpectedMargin.isInvalid],
        ["SurchargeBeforeTax", [fields.SurchargeBeforeTax.required ? ew.Validators.required(fields.SurchargeBeforeTax.caption) : null, ew.Validators.float], fields.SurchargeBeforeTax.isInvalid],
        ["SurchargeAfterTax", [fields.SurchargeAfterTax.required ? ew.Validators.required(fields.SurchargeAfterTax.caption) : null, ew.Validators.float], fields.SurchargeAfterTax.isInvalid],
        ["TempOrderNo", [fields.TempOrderNo.required ? ew.Validators.required(fields.TempOrderNo.caption) : null, ew.Validators.integer], fields.TempOrderNo.isInvalid],
        ["TempOrderDate", [fields.TempOrderDate.required ? ew.Validators.required(fields.TempOrderDate.caption) : null, ew.Validators.datetime(0)], fields.TempOrderDate.isInvalid],
        ["OrderUnit", [fields.OrderUnit.required ? ew.Validators.required(fields.OrderUnit.caption) : null, ew.Validators.float], fields.OrderUnit.isInvalid],
        ["OrderQuantity", [fields.OrderQuantity.required ? ew.Validators.required(fields.OrderQuantity.caption) : null, ew.Validators.float], fields.OrderQuantity.isInvalid],
        ["MarkForOrder", [fields.MarkForOrder.required ? ew.Validators.required(fields.MarkForOrder.caption) : null, ew.Validators.integer], fields.MarkForOrder.isInvalid],
        ["OrderAllId", [fields.OrderAllId.required ? ew.Validators.required(fields.OrderAllId.caption) : null, ew.Validators.integer], fields.OrderAllId.isInvalid],
        ["CalculateOrderQty", [fields.CalculateOrderQty.required ? ew.Validators.required(fields.CalculateOrderQty.caption) : null, ew.Validators.float], fields.CalculateOrderQty.isInvalid],
        ["SubLocation", [fields.SubLocation.required ? ew.Validators.required(fields.SubLocation.caption) : null], fields.SubLocation.isInvalid],
        ["CategoryCode", [fields.CategoryCode.required ? ew.Validators.required(fields.CategoryCode.caption) : null], fields.CategoryCode.isInvalid],
        ["SubCategory", [fields.SubCategory.required ? ew.Validators.required(fields.SubCategory.caption) : null], fields.SubCategory.isInvalid],
        ["FlexCategoryCode", [fields.FlexCategoryCode.required ? ew.Validators.required(fields.FlexCategoryCode.caption) : null, ew.Validators.integer], fields.FlexCategoryCode.isInvalid],
        ["ABCSaleQty", [fields.ABCSaleQty.required ? ew.Validators.required(fields.ABCSaleQty.caption) : null, ew.Validators.float], fields.ABCSaleQty.isInvalid],
        ["ABCSaleValue", [fields.ABCSaleValue.required ? ew.Validators.required(fields.ABCSaleValue.caption) : null, ew.Validators.float], fields.ABCSaleValue.isInvalid],
        ["ConvertionFactor", [fields.ConvertionFactor.required ? ew.Validators.required(fields.ConvertionFactor.caption) : null, ew.Validators.integer], fields.ConvertionFactor.isInvalid],
        ["ConvertionUnitDesc", [fields.ConvertionUnitDesc.required ? ew.Validators.required(fields.ConvertionUnitDesc.caption) : null], fields.ConvertionUnitDesc.isInvalid],
        ["TransactionId", [fields.TransactionId.required ? ew.Validators.required(fields.TransactionId.caption) : null, ew.Validators.integer], fields.TransactionId.isInvalid],
        ["SoldProductId", [fields.SoldProductId.required ? ew.Validators.required(fields.SoldProductId.caption) : null, ew.Validators.integer], fields.SoldProductId.isInvalid],
        ["WantedBookId", [fields.WantedBookId.required ? ew.Validators.required(fields.WantedBookId.caption) : null, ew.Validators.integer], fields.WantedBookId.isInvalid],
        ["AllId", [fields.AllId.required ? ew.Validators.required(fields.AllId.caption) : null, ew.Validators.integer], fields.AllId.isInvalid],
        ["BatchAndExpiryCompulsory", [fields.BatchAndExpiryCompulsory.required ? ew.Validators.required(fields.BatchAndExpiryCompulsory.caption) : null, ew.Validators.integer], fields.BatchAndExpiryCompulsory.isInvalid],
        ["BatchStockForWantedBook", [fields.BatchStockForWantedBook.required ? ew.Validators.required(fields.BatchStockForWantedBook.caption) : null, ew.Validators.integer], fields.BatchStockForWantedBook.isInvalid],
        ["UnitBasedBilling", [fields.UnitBasedBilling.required ? ew.Validators.required(fields.UnitBasedBilling.caption) : null, ew.Validators.integer], fields.UnitBasedBilling.isInvalid],
        ["DoNotCheckStock", [fields.DoNotCheckStock.required ? ew.Validators.required(fields.DoNotCheckStock.caption) : null, ew.Validators.integer], fields.DoNotCheckStock.isInvalid],
        ["AcceptRate", [fields.AcceptRate.required ? ew.Validators.required(fields.AcceptRate.caption) : null, ew.Validators.integer], fields.AcceptRate.isInvalid],
        ["PriceLevel", [fields.PriceLevel.required ? ew.Validators.required(fields.PriceLevel.caption) : null, ew.Validators.integer], fields.PriceLevel.isInvalid],
        ["LastQuotePrice", [fields.LastQuotePrice.required ? ew.Validators.required(fields.LastQuotePrice.caption) : null, ew.Validators.float], fields.LastQuotePrice.isInvalid],
        ["PriceChange", [fields.PriceChange.required ? ew.Validators.required(fields.PriceChange.caption) : null, ew.Validators.float], fields.PriceChange.isInvalid],
        ["CommodityCode", [fields.CommodityCode.required ? ew.Validators.required(fields.CommodityCode.caption) : null], fields.CommodityCode.isInvalid],
        ["InstitutePrice", [fields.InstitutePrice.required ? ew.Validators.required(fields.InstitutePrice.caption) : null, ew.Validators.float], fields.InstitutePrice.isInvalid],
        ["CtrlOrDCtrlProduct", [fields.CtrlOrDCtrlProduct.required ? ew.Validators.required(fields.CtrlOrDCtrlProduct.caption) : null, ew.Validators.integer], fields.CtrlOrDCtrlProduct.isInvalid],
        ["ImportedDate", [fields.ImportedDate.required ? ew.Validators.required(fields.ImportedDate.caption) : null, ew.Validators.datetime(0)], fields.ImportedDate.isInvalid],
        ["IsImported", [fields.IsImported.required ? ew.Validators.required(fields.IsImported.caption) : null, ew.Validators.integer], fields.IsImported.isInvalid],
        ["FileName", [fields.FileName.required ? ew.Validators.required(fields.FileName.caption) : null], fields.FileName.isInvalid],
        ["LPName", [fields.LPName.required ? ew.Validators.required(fields.LPName.caption) : null], fields.LPName.isInvalid],
        ["GodownNumber", [fields.GodownNumber.required ? ew.Validators.required(fields.GodownNumber.caption) : null, ew.Validators.integer], fields.GodownNumber.isInvalid],
        ["CreationDate", [fields.CreationDate.required ? ew.Validators.required(fields.CreationDate.caption) : null, ew.Validators.datetime(0)], fields.CreationDate.isInvalid],
        ["CreatedbyUser", [fields.CreatedbyUser.required ? ew.Validators.required(fields.CreatedbyUser.caption) : null], fields.CreatedbyUser.isInvalid],
        ["ModifiedDate", [fields.ModifiedDate.required ? ew.Validators.required(fields.ModifiedDate.caption) : null, ew.Validators.datetime(0)], fields.ModifiedDate.isInvalid],
        ["ModifiedbyUser", [fields.ModifiedbyUser.required ? ew.Validators.required(fields.ModifiedbyUser.caption) : null], fields.ModifiedbyUser.isInvalid],
        ["isActive", [fields.isActive.required ? ew.Validators.required(fields.isActive.caption) : null, ew.Validators.integer], fields.isActive.isInvalid],
        ["AllowExpiryClaim", [fields.AllowExpiryClaim.required ? ew.Validators.required(fields.AllowExpiryClaim.caption) : null, ew.Validators.integer], fields.AllowExpiryClaim.isInvalid],
        ["BrandCode", [fields.BrandCode.required ? ew.Validators.required(fields.BrandCode.caption) : null, ew.Validators.integer], fields.BrandCode.isInvalid],
        ["FreeSchemeBasedon", [fields.FreeSchemeBasedon.required ? ew.Validators.required(fields.FreeSchemeBasedon.caption) : null, ew.Validators.integer], fields.FreeSchemeBasedon.isInvalid],
        ["DoNotCheckCostInBill", [fields.DoNotCheckCostInBill.required ? ew.Validators.required(fields.DoNotCheckCostInBill.caption) : null, ew.Validators.integer], fields.DoNotCheckCostInBill.isInvalid],
        ["ProductGroupCode", [fields.ProductGroupCode.required ? ew.Validators.required(fields.ProductGroupCode.caption) : null, ew.Validators.integer], fields.ProductGroupCode.isInvalid],
        ["ProductStrengthCode", [fields.ProductStrengthCode.required ? ew.Validators.required(fields.ProductStrengthCode.caption) : null, ew.Validators.integer], fields.ProductStrengthCode.isInvalid],
        ["PackingCode", [fields.PackingCode.required ? ew.Validators.required(fields.PackingCode.caption) : null, ew.Validators.integer], fields.PackingCode.isInvalid],
        ["ComputedMinStock", [fields.ComputedMinStock.required ? ew.Validators.required(fields.ComputedMinStock.caption) : null, ew.Validators.float], fields.ComputedMinStock.isInvalid],
        ["ComputedMaxStock", [fields.ComputedMaxStock.required ? ew.Validators.required(fields.ComputedMaxStock.caption) : null, ew.Validators.float], fields.ComputedMaxStock.isInvalid],
        ["ProductRemark", [fields.ProductRemark.required ? ew.Validators.required(fields.ProductRemark.caption) : null, ew.Validators.integer], fields.ProductRemark.isInvalid],
        ["ProductDrugCode", [fields.ProductDrugCode.required ? ew.Validators.required(fields.ProductDrugCode.caption) : null, ew.Validators.integer], fields.ProductDrugCode.isInvalid],
        ["IsMatrixProduct", [fields.IsMatrixProduct.required ? ew.Validators.required(fields.IsMatrixProduct.caption) : null, ew.Validators.integer], fields.IsMatrixProduct.isInvalid],
        ["AttributeCount1", [fields.AttributeCount1.required ? ew.Validators.required(fields.AttributeCount1.caption) : null, ew.Validators.integer], fields.AttributeCount1.isInvalid],
        ["AttributeCount2", [fields.AttributeCount2.required ? ew.Validators.required(fields.AttributeCount2.caption) : null, ew.Validators.integer], fields.AttributeCount2.isInvalid],
        ["AttributeCount3", [fields.AttributeCount3.required ? ew.Validators.required(fields.AttributeCount3.caption) : null, ew.Validators.integer], fields.AttributeCount3.isInvalid],
        ["AttributeCount4", [fields.AttributeCount4.required ? ew.Validators.required(fields.AttributeCount4.caption) : null, ew.Validators.integer], fields.AttributeCount4.isInvalid],
        ["AttributeCount5", [fields.AttributeCount5.required ? ew.Validators.required(fields.AttributeCount5.caption) : null, ew.Validators.integer], fields.AttributeCount5.isInvalid],
        ["DefaultDiscountPercentage", [fields.DefaultDiscountPercentage.required ? ew.Validators.required(fields.DefaultDiscountPercentage.caption) : null, ew.Validators.float], fields.DefaultDiscountPercentage.isInvalid],
        ["DonotPrintBarcode", [fields.DonotPrintBarcode.required ? ew.Validators.required(fields.DonotPrintBarcode.caption) : null, ew.Validators.integer], fields.DonotPrintBarcode.isInvalid],
        ["ProductLevelDiscount", [fields.ProductLevelDiscount.required ? ew.Validators.required(fields.ProductLevelDiscount.caption) : null, ew.Validators.integer], fields.ProductLevelDiscount.isInvalid],
        ["Markup", [fields.Markup.required ? ew.Validators.required(fields.Markup.caption) : null, ew.Validators.float], fields.Markup.isInvalid],
        ["MarkDown", [fields.MarkDown.required ? ew.Validators.required(fields.MarkDown.caption) : null, ew.Validators.float], fields.MarkDown.isInvalid],
        ["ReworkSalePrice", [fields.ReworkSalePrice.required ? ew.Validators.required(fields.ReworkSalePrice.caption) : null, ew.Validators.integer], fields.ReworkSalePrice.isInvalid],
        ["MultipleInput", [fields.MultipleInput.required ? ew.Validators.required(fields.MultipleInput.caption) : null, ew.Validators.integer], fields.MultipleInput.isInvalid],
        ["LpPackageInformation", [fields.LpPackageInformation.required ? ew.Validators.required(fields.LpPackageInformation.caption) : null], fields.LpPackageInformation.isInvalid],
        ["AllowNegativeStock", [fields.AllowNegativeStock.required ? ew.Validators.required(fields.AllowNegativeStock.caption) : null, ew.Validators.integer], fields.AllowNegativeStock.isInvalid],
        ["OrderDate", [fields.OrderDate.required ? ew.Validators.required(fields.OrderDate.caption) : null, ew.Validators.datetime(0)], fields.OrderDate.isInvalid],
        ["OrderTime", [fields.OrderTime.required ? ew.Validators.required(fields.OrderTime.caption) : null, ew.Validators.datetime(0)], fields.OrderTime.isInvalid],
        ["RateGroupCode", [fields.RateGroupCode.required ? ew.Validators.required(fields.RateGroupCode.caption) : null, ew.Validators.integer], fields.RateGroupCode.isInvalid],
        ["ConversionCaseLot", [fields.ConversionCaseLot.required ? ew.Validators.required(fields.ConversionCaseLot.caption) : null, ew.Validators.integer], fields.ConversionCaseLot.isInvalid],
        ["ShippingLot", [fields.ShippingLot.required ? ew.Validators.required(fields.ShippingLot.caption) : null], fields.ShippingLot.isInvalid],
        ["AllowExpiryReplacement", [fields.AllowExpiryReplacement.required ? ew.Validators.required(fields.AllowExpiryReplacement.caption) : null, ew.Validators.integer], fields.AllowExpiryReplacement.isInvalid],
        ["NoOfMonthExpiryAllowed", [fields.NoOfMonthExpiryAllowed.required ? ew.Validators.required(fields.NoOfMonthExpiryAllowed.caption) : null, ew.Validators.integer], fields.NoOfMonthExpiryAllowed.isInvalid],
        ["ProductDiscountEligibility", [fields.ProductDiscountEligibility.required ? ew.Validators.required(fields.ProductDiscountEligibility.caption) : null, ew.Validators.integer], fields.ProductDiscountEligibility.isInvalid],
        ["ScheduleTypeCode", [fields.ScheduleTypeCode.required ? ew.Validators.required(fields.ScheduleTypeCode.caption) : null, ew.Validators.integer], fields.ScheduleTypeCode.isInvalid],
        ["AIOCDProductCode", [fields.AIOCDProductCode.required ? ew.Validators.required(fields.AIOCDProductCode.caption) : null], fields.AIOCDProductCode.isInvalid],
        ["FreeQuantity", [fields.FreeQuantity.required ? ew.Validators.required(fields.FreeQuantity.caption) : null, ew.Validators.float], fields.FreeQuantity.isInvalid],
        ["DiscountType", [fields.DiscountType.required ? ew.Validators.required(fields.DiscountType.caption) : null, ew.Validators.integer], fields.DiscountType.isInvalid],
        ["DiscountValue", [fields.DiscountValue.required ? ew.Validators.required(fields.DiscountValue.caption) : null, ew.Validators.float], fields.DiscountValue.isInvalid],
        ["HasProductOrderAttribute", [fields.HasProductOrderAttribute.required ? ew.Validators.required(fields.HasProductOrderAttribute.caption) : null, ew.Validators.integer], fields.HasProductOrderAttribute.isInvalid],
        ["FirstPODate", [fields.FirstPODate.required ? ew.Validators.required(fields.FirstPODate.caption) : null, ew.Validators.datetime(0)], fields.FirstPODate.isInvalid],
        ["SaleprcieAndMrpCalcPercent", [fields.SaleprcieAndMrpCalcPercent.required ? ew.Validators.required(fields.SaleprcieAndMrpCalcPercent.caption) : null, ew.Validators.float], fields.SaleprcieAndMrpCalcPercent.isInvalid],
        ["IsGiftVoucherProducts", [fields.IsGiftVoucherProducts.required ? ew.Validators.required(fields.IsGiftVoucherProducts.caption) : null, ew.Validators.integer], fields.IsGiftVoucherProducts.isInvalid],
        ["AcceptRange4SerialNumber", [fields.AcceptRange4SerialNumber.required ? ew.Validators.required(fields.AcceptRange4SerialNumber.caption) : null, ew.Validators.integer], fields.AcceptRange4SerialNumber.isInvalid],
        ["GiftVoucherDenomination", [fields.GiftVoucherDenomination.required ? ew.Validators.required(fields.GiftVoucherDenomination.caption) : null, ew.Validators.integer], fields.GiftVoucherDenomination.isInvalid],
        ["Subclasscode", [fields.Subclasscode.required ? ew.Validators.required(fields.Subclasscode.caption) : null], fields.Subclasscode.isInvalid],
        ["BarCodeFromWeighingMachine", [fields.BarCodeFromWeighingMachine.required ? ew.Validators.required(fields.BarCodeFromWeighingMachine.caption) : null, ew.Validators.integer], fields.BarCodeFromWeighingMachine.isInvalid],
        ["CheckCostInReturn", [fields.CheckCostInReturn.required ? ew.Validators.required(fields.CheckCostInReturn.caption) : null, ew.Validators.integer], fields.CheckCostInReturn.isInvalid],
        ["FrequentSaleProduct", [fields.FrequentSaleProduct.required ? ew.Validators.required(fields.FrequentSaleProduct.caption) : null, ew.Validators.integer], fields.FrequentSaleProduct.isInvalid],
        ["RateType", [fields.RateType.required ? ew.Validators.required(fields.RateType.caption) : null, ew.Validators.integer], fields.RateType.isInvalid],
        ["TouchscreenName", [fields.TouchscreenName.required ? ew.Validators.required(fields.TouchscreenName.caption) : null], fields.TouchscreenName.isInvalid],
        ["FreeType", [fields.FreeType.required ? ew.Validators.required(fields.FreeType.caption) : null, ew.Validators.integer], fields.FreeType.isInvalid],
        ["LooseQtyasNewBatch", [fields.LooseQtyasNewBatch.required ? ew.Validators.required(fields.LooseQtyasNewBatch.caption) : null, ew.Validators.integer], fields.LooseQtyasNewBatch.isInvalid],
        ["AllowSlabBilling", [fields.AllowSlabBilling.required ? ew.Validators.required(fields.AllowSlabBilling.caption) : null, ew.Validators.integer], fields.AllowSlabBilling.isInvalid],
        ["ProductTypeForProduction", [fields.ProductTypeForProduction.required ? ew.Validators.required(fields.ProductTypeForProduction.caption) : null, ew.Validators.integer], fields.ProductTypeForProduction.isInvalid],
        ["RecipeCode", [fields.RecipeCode.required ? ew.Validators.required(fields.RecipeCode.caption) : null, ew.Validators.integer], fields.RecipeCode.isInvalid],
        ["DefaultUnitType", [fields.DefaultUnitType.required ? ew.Validators.required(fields.DefaultUnitType.caption) : null, ew.Validators.integer], fields.DefaultUnitType.isInvalid],
        ["PIstatus", [fields.PIstatus.required ? ew.Validators.required(fields.PIstatus.caption) : null, ew.Validators.integer], fields.PIstatus.isInvalid],
        ["LastPiConfirmedDate", [fields.LastPiConfirmedDate.required ? ew.Validators.required(fields.LastPiConfirmedDate.caption) : null, ew.Validators.datetime(0)], fields.LastPiConfirmedDate.isInvalid],
        ["BarCodeDesign", [fields.BarCodeDesign.required ? ew.Validators.required(fields.BarCodeDesign.caption) : null], fields.BarCodeDesign.isInvalid],
        ["AcceptRemarksInBill", [fields.AcceptRemarksInBill.required ? ew.Validators.required(fields.AcceptRemarksInBill.caption) : null, ew.Validators.integer], fields.AcceptRemarksInBill.isInvalid],
        ["Classification", [fields.Classification.required ? ew.Validators.required(fields.Classification.caption) : null, ew.Validators.integer], fields.Classification.isInvalid],
        ["TimeSlot", [fields.TimeSlot.required ? ew.Validators.required(fields.TimeSlot.caption) : null, ew.Validators.integer], fields.TimeSlot.isInvalid],
        ["IsBundle", [fields.IsBundle.required ? ew.Validators.required(fields.IsBundle.caption) : null, ew.Validators.integer], fields.IsBundle.isInvalid],
        ["ColorCode", [fields.ColorCode.required ? ew.Validators.required(fields.ColorCode.caption) : null, ew.Validators.integer], fields.ColorCode.isInvalid],
        ["GenderCode", [fields.GenderCode.required ? ew.Validators.required(fields.GenderCode.caption) : null, ew.Validators.integer], fields.GenderCode.isInvalid],
        ["SizeCode", [fields.SizeCode.required ? ew.Validators.required(fields.SizeCode.caption) : null, ew.Validators.integer], fields.SizeCode.isInvalid],
        ["GiftCard", [fields.GiftCard.required ? ew.Validators.required(fields.GiftCard.caption) : null, ew.Validators.integer], fields.GiftCard.isInvalid],
        ["ToonLabel", [fields.ToonLabel.required ? ew.Validators.required(fields.ToonLabel.caption) : null, ew.Validators.integer], fields.ToonLabel.isInvalid],
        ["GarmentType", [fields.GarmentType.required ? ew.Validators.required(fields.GarmentType.caption) : null, ew.Validators.integer], fields.GarmentType.isInvalid],
        ["AgeGroup", [fields.AgeGroup.required ? ew.Validators.required(fields.AgeGroup.caption) : null, ew.Validators.integer], fields.AgeGroup.isInvalid],
        ["Season", [fields.Season.required ? ew.Validators.required(fields.Season.caption) : null, ew.Validators.integer], fields.Season.isInvalid],
        ["DailyStockEntry", [fields.DailyStockEntry.required ? ew.Validators.required(fields.DailyStockEntry.caption) : null, ew.Validators.integer], fields.DailyStockEntry.isInvalid],
        ["ModifierApplicable", [fields.ModifierApplicable.required ? ew.Validators.required(fields.ModifierApplicable.caption) : null, ew.Validators.integer], fields.ModifierApplicable.isInvalid],
        ["ModifierType", [fields.ModifierType.required ? ew.Validators.required(fields.ModifierType.caption) : null, ew.Validators.integer], fields.ModifierType.isInvalid],
        ["AcceptZeroRate", [fields.AcceptZeroRate.required ? ew.Validators.required(fields.AcceptZeroRate.caption) : null, ew.Validators.integer], fields.AcceptZeroRate.isInvalid],
        ["ExciseDutyCode", [fields.ExciseDutyCode.required ? ew.Validators.required(fields.ExciseDutyCode.caption) : null, ew.Validators.integer], fields.ExciseDutyCode.isInvalid],
        ["IndentProductGroupCode", [fields.IndentProductGroupCode.required ? ew.Validators.required(fields.IndentProductGroupCode.caption) : null, ew.Validators.integer], fields.IndentProductGroupCode.isInvalid],
        ["IsMultiBatch", [fields.IsMultiBatch.required ? ew.Validators.required(fields.IsMultiBatch.caption) : null, ew.Validators.integer], fields.IsMultiBatch.isInvalid],
        ["IsSingleBatch", [fields.IsSingleBatch.required ? ew.Validators.required(fields.IsSingleBatch.caption) : null, ew.Validators.integer], fields.IsSingleBatch.isInvalid],
        ["MarkUpRate1", [fields.MarkUpRate1.required ? ew.Validators.required(fields.MarkUpRate1.caption) : null, ew.Validators.float], fields.MarkUpRate1.isInvalid],
        ["MarkDownRate1", [fields.MarkDownRate1.required ? ew.Validators.required(fields.MarkDownRate1.caption) : null, ew.Validators.float], fields.MarkDownRate1.isInvalid],
        ["MarkUpRate2", [fields.MarkUpRate2.required ? ew.Validators.required(fields.MarkUpRate2.caption) : null, ew.Validators.float], fields.MarkUpRate2.isInvalid],
        ["MarkDownRate2", [fields.MarkDownRate2.required ? ew.Validators.required(fields.MarkDownRate2.caption) : null, ew.Validators.float], fields.MarkDownRate2.isInvalid],
        ["_Yield", [fields._Yield.required ? ew.Validators.required(fields._Yield.caption) : null, ew.Validators.float], fields._Yield.isInvalid],
        ["RefProductCode", [fields.RefProductCode.required ? ew.Validators.required(fields.RefProductCode.caption) : null, ew.Validators.integer], fields.RefProductCode.isInvalid],
        ["Volume", [fields.Volume.required ? ew.Validators.required(fields.Volume.caption) : null, ew.Validators.float], fields.Volume.isInvalid],
        ["MeasurementID", [fields.MeasurementID.required ? ew.Validators.required(fields.MeasurementID.caption) : null, ew.Validators.integer], fields.MeasurementID.isInvalid],
        ["CountryCode", [fields.CountryCode.required ? ew.Validators.required(fields.CountryCode.caption) : null, ew.Validators.integer], fields.CountryCode.isInvalid],
        ["AcceptWMQty", [fields.AcceptWMQty.required ? ew.Validators.required(fields.AcceptWMQty.caption) : null, ew.Validators.integer], fields.AcceptWMQty.isInvalid],
        ["SingleBatchBasedOnRate", [fields.SingleBatchBasedOnRate.required ? ew.Validators.required(fields.SingleBatchBasedOnRate.caption) : null, ew.Validators.integer], fields.SingleBatchBasedOnRate.isInvalid],
        ["TenderNo", [fields.TenderNo.required ? ew.Validators.required(fields.TenderNo.caption) : null], fields.TenderNo.isInvalid],
        ["SingleBillMaximumSoldQtyFiled", [fields.SingleBillMaximumSoldQtyFiled.required ? ew.Validators.required(fields.SingleBillMaximumSoldQtyFiled.caption) : null, ew.Validators.float], fields.SingleBillMaximumSoldQtyFiled.isInvalid],
        ["Strength1", [fields.Strength1.required ? ew.Validators.required(fields.Strength1.caption) : null], fields.Strength1.isInvalid],
        ["Strength2", [fields.Strength2.required ? ew.Validators.required(fields.Strength2.caption) : null], fields.Strength2.isInvalid],
        ["Strength3", [fields.Strength3.required ? ew.Validators.required(fields.Strength3.caption) : null], fields.Strength3.isInvalid],
        ["Strength4", [fields.Strength4.required ? ew.Validators.required(fields.Strength4.caption) : null], fields.Strength4.isInvalid],
        ["Strength5", [fields.Strength5.required ? ew.Validators.required(fields.Strength5.caption) : null], fields.Strength5.isInvalid],
        ["IngredientCode1", [fields.IngredientCode1.required ? ew.Validators.required(fields.IngredientCode1.caption) : null, ew.Validators.integer], fields.IngredientCode1.isInvalid],
        ["IngredientCode2", [fields.IngredientCode2.required ? ew.Validators.required(fields.IngredientCode2.caption) : null, ew.Validators.integer], fields.IngredientCode2.isInvalid],
        ["IngredientCode3", [fields.IngredientCode3.required ? ew.Validators.required(fields.IngredientCode3.caption) : null, ew.Validators.integer], fields.IngredientCode3.isInvalid],
        ["IngredientCode4", [fields.IngredientCode4.required ? ew.Validators.required(fields.IngredientCode4.caption) : null, ew.Validators.integer], fields.IngredientCode4.isInvalid],
        ["IngredientCode5", [fields.IngredientCode5.required ? ew.Validators.required(fields.IngredientCode5.caption) : null, ew.Validators.integer], fields.IngredientCode5.isInvalid],
        ["OrderType", [fields.OrderType.required ? ew.Validators.required(fields.OrderType.caption) : null, ew.Validators.integer], fields.OrderType.isInvalid],
        ["StockUOM", [fields.StockUOM.required ? ew.Validators.required(fields.StockUOM.caption) : null, ew.Validators.integer], fields.StockUOM.isInvalid],
        ["PriceUOM", [fields.PriceUOM.required ? ew.Validators.required(fields.PriceUOM.caption) : null, ew.Validators.integer], fields.PriceUOM.isInvalid],
        ["DefaultSaleUOM", [fields.DefaultSaleUOM.required ? ew.Validators.required(fields.DefaultSaleUOM.caption) : null, ew.Validators.integer], fields.DefaultSaleUOM.isInvalid],
        ["DefaultPurchaseUOM", [fields.DefaultPurchaseUOM.required ? ew.Validators.required(fields.DefaultPurchaseUOM.caption) : null, ew.Validators.integer], fields.DefaultPurchaseUOM.isInvalid],
        ["ReportingUOM", [fields.ReportingUOM.required ? ew.Validators.required(fields.ReportingUOM.caption) : null, ew.Validators.integer], fields.ReportingUOM.isInvalid],
        ["LastPurchasedUOM", [fields.LastPurchasedUOM.required ? ew.Validators.required(fields.LastPurchasedUOM.caption) : null, ew.Validators.integer], fields.LastPurchasedUOM.isInvalid],
        ["TreatmentCodes", [fields.TreatmentCodes.required ? ew.Validators.required(fields.TreatmentCodes.caption) : null], fields.TreatmentCodes.isInvalid],
        ["InsuranceType", [fields.InsuranceType.required ? ew.Validators.required(fields.InsuranceType.caption) : null, ew.Validators.integer], fields.InsuranceType.isInvalid],
        ["CoverageGroupCodes", [fields.CoverageGroupCodes.required ? ew.Validators.required(fields.CoverageGroupCodes.caption) : null], fields.CoverageGroupCodes.isInvalid],
        ["MultipleUOM", [fields.MultipleUOM.required ? ew.Validators.required(fields.MultipleUOM.caption) : null, ew.Validators.integer], fields.MultipleUOM.isInvalid],
        ["SalePriceComputation", [fields.SalePriceComputation.required ? ew.Validators.required(fields.SalePriceComputation.caption) : null, ew.Validators.integer], fields.SalePriceComputation.isInvalid],
        ["StockCorrection", [fields.StockCorrection.required ? ew.Validators.required(fields.StockCorrection.caption) : null, ew.Validators.integer], fields.StockCorrection.isInvalid],
        ["LBTPercentage", [fields.LBTPercentage.required ? ew.Validators.required(fields.LBTPercentage.caption) : null, ew.Validators.float], fields.LBTPercentage.isInvalid],
        ["SalesCommission", [fields.SalesCommission.required ? ew.Validators.required(fields.SalesCommission.caption) : null, ew.Validators.float], fields.SalesCommission.isInvalid],
        ["LockedStock", [fields.LockedStock.required ? ew.Validators.required(fields.LockedStock.caption) : null, ew.Validators.float], fields.LockedStock.isInvalid],
        ["MinMaxUOM", [fields.MinMaxUOM.required ? ew.Validators.required(fields.MinMaxUOM.caption) : null, ew.Validators.integer], fields.MinMaxUOM.isInvalid],
        ["ExpiryMfrDateFormat", [fields.ExpiryMfrDateFormat.required ? ew.Validators.required(fields.ExpiryMfrDateFormat.caption) : null, ew.Validators.integer], fields.ExpiryMfrDateFormat.isInvalid],
        ["ProductLifeTime", [fields.ProductLifeTime.required ? ew.Validators.required(fields.ProductLifeTime.caption) : null, ew.Validators.integer], fields.ProductLifeTime.isInvalid],
        ["IsCombo", [fields.IsCombo.required ? ew.Validators.required(fields.IsCombo.caption) : null, ew.Validators.integer], fields.IsCombo.isInvalid],
        ["ComboTypeCode", [fields.ComboTypeCode.required ? ew.Validators.required(fields.ComboTypeCode.caption) : null, ew.Validators.integer], fields.ComboTypeCode.isInvalid],
        ["AttributeCount6", [fields.AttributeCount6.required ? ew.Validators.required(fields.AttributeCount6.caption) : null, ew.Validators.integer], fields.AttributeCount6.isInvalid],
        ["AttributeCount7", [fields.AttributeCount7.required ? ew.Validators.required(fields.AttributeCount7.caption) : null, ew.Validators.integer], fields.AttributeCount7.isInvalid],
        ["AttributeCount8", [fields.AttributeCount8.required ? ew.Validators.required(fields.AttributeCount8.caption) : null, ew.Validators.integer], fields.AttributeCount8.isInvalid],
        ["AttributeCount9", [fields.AttributeCount9.required ? ew.Validators.required(fields.AttributeCount9.caption) : null, ew.Validators.integer], fields.AttributeCount9.isInvalid],
        ["AttributeCount10", [fields.AttributeCount10.required ? ew.Validators.required(fields.AttributeCount10.caption) : null, ew.Validators.integer], fields.AttributeCount10.isInvalid],
        ["LabourCharge", [fields.LabourCharge.required ? ew.Validators.required(fields.LabourCharge.caption) : null, ew.Validators.float], fields.LabourCharge.isInvalid],
        ["AffectOtherCharge", [fields.AffectOtherCharge.required ? ew.Validators.required(fields.AffectOtherCharge.caption) : null, ew.Validators.integer], fields.AffectOtherCharge.isInvalid],
        ["DosageInfo", [fields.DosageInfo.required ? ew.Validators.required(fields.DosageInfo.caption) : null], fields.DosageInfo.isInvalid],
        ["DosageType", [fields.DosageType.required ? ew.Validators.required(fields.DosageType.caption) : null, ew.Validators.integer], fields.DosageType.isInvalid],
        ["DefaultIndentUOM", [fields.DefaultIndentUOM.required ? ew.Validators.required(fields.DefaultIndentUOM.caption) : null, ew.Validators.integer], fields.DefaultIndentUOM.isInvalid],
        ["PromoTag", [fields.PromoTag.required ? ew.Validators.required(fields.PromoTag.caption) : null, ew.Validators.integer], fields.PromoTag.isInvalid],
        ["BillLevelPromoTag", [fields.BillLevelPromoTag.required ? ew.Validators.required(fields.BillLevelPromoTag.caption) : null, ew.Validators.integer], fields.BillLevelPromoTag.isInvalid],
        ["IsMRPProduct", [fields.IsMRPProduct.required ? ew.Validators.required(fields.IsMRPProduct.caption) : null, ew.Validators.integer], fields.IsMRPProduct.isInvalid],
        ["MrpList", [fields.MrpList.required ? ew.Validators.required(fields.MrpList.caption) : null], fields.MrpList.isInvalid],
        ["AlternateSaleUOM", [fields.AlternateSaleUOM.required ? ew.Validators.required(fields.AlternateSaleUOM.caption) : null, ew.Validators.integer], fields.AlternateSaleUOM.isInvalid],
        ["FreeUOM", [fields.FreeUOM.required ? ew.Validators.required(fields.FreeUOM.caption) : null, ew.Validators.integer], fields.FreeUOM.isInvalid],
        ["MarketedCode", [fields.MarketedCode.required ? ew.Validators.required(fields.MarketedCode.caption) : null], fields.MarketedCode.isInvalid],
        ["MinimumSalePrice", [fields.MinimumSalePrice.required ? ew.Validators.required(fields.MinimumSalePrice.caption) : null, ew.Validators.float], fields.MinimumSalePrice.isInvalid],
        ["PRate1", [fields.PRate1.required ? ew.Validators.required(fields.PRate1.caption) : null, ew.Validators.float], fields.PRate1.isInvalid],
        ["PRate2", [fields.PRate2.required ? ew.Validators.required(fields.PRate2.caption) : null, ew.Validators.float], fields.PRate2.isInvalid],
        ["LPItemCost", [fields.LPItemCost.required ? ew.Validators.required(fields.LPItemCost.caption) : null, ew.Validators.float], fields.LPItemCost.isInvalid],
        ["FixedItemCost", [fields.FixedItemCost.required ? ew.Validators.required(fields.FixedItemCost.caption) : null, ew.Validators.float], fields.FixedItemCost.isInvalid],
        ["HSNId", [fields.HSNId.required ? ew.Validators.required(fields.HSNId.caption) : null, ew.Validators.integer], fields.HSNId.isInvalid],
        ["TaxInclusive", [fields.TaxInclusive.required ? ew.Validators.required(fields.TaxInclusive.caption) : null, ew.Validators.integer], fields.TaxInclusive.isInvalid],
        ["EligibleforWarranty", [fields.EligibleforWarranty.required ? ew.Validators.required(fields.EligibleforWarranty.caption) : null, ew.Validators.integer], fields.EligibleforWarranty.isInvalid],
        ["NoofMonthsWarranty", [fields.NoofMonthsWarranty.required ? ew.Validators.required(fields.NoofMonthsWarranty.caption) : null, ew.Validators.integer], fields.NoofMonthsWarranty.isInvalid],
        ["ComputeTaxonCost", [fields.ComputeTaxonCost.required ? ew.Validators.required(fields.ComputeTaxonCost.caption) : null, ew.Validators.integer], fields.ComputeTaxonCost.isInvalid],
        ["HasEmptyBottleTrack", [fields.HasEmptyBottleTrack.required ? ew.Validators.required(fields.HasEmptyBottleTrack.caption) : null, ew.Validators.integer], fields.HasEmptyBottleTrack.isInvalid],
        ["EmptyBottleReferenceCode", [fields.EmptyBottleReferenceCode.required ? ew.Validators.required(fields.EmptyBottleReferenceCode.caption) : null, ew.Validators.integer], fields.EmptyBottleReferenceCode.isInvalid],
        ["AdditionalCESSAmount", [fields.AdditionalCESSAmount.required ? ew.Validators.required(fields.AdditionalCESSAmount.caption) : null, ew.Validators.float], fields.AdditionalCESSAmount.isInvalid],
        ["EmptyBottleRate", [fields.EmptyBottleRate.required ? ew.Validators.required(fields.EmptyBottleRate.caption) : null, ew.Validators.float], fields.EmptyBottleRate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_productsadd,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fpharmacy_productsadd.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    fpharmacy_productsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_productsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpharmacy_productsadd");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_productsadd" id="fpharmacy_productsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->ProductName->Visible) { // ProductName ?>
    <div id="r_ProductName" class="form-group row">
        <label id="elh_pharmacy_products_ProductName" for="x_ProductName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductName->caption() ?><?= $Page->ProductName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductName">
<input type="<?= $Page->ProductName->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductName" name="x_ProductName" id="x_ProductName" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->ProductName->getPlaceHolder()) ?>" value="<?= $Page->ProductName->EditValue ?>"<?= $Page->ProductName->editAttributes() ?> aria-describedby="x_ProductName_help">
<?= $Page->ProductName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DivisionCode->Visible) { // DivisionCode ?>
    <div id="r_DivisionCode" class="form-group row">
        <label id="elh_pharmacy_products_DivisionCode" for="x_DivisionCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DivisionCode->caption() ?><?= $Page->DivisionCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DivisionCode->cellAttributes() ?>>
<span id="el_pharmacy_products_DivisionCode">
<input type="<?= $Page->DivisionCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DivisionCode" name="x_DivisionCode" id="x_DivisionCode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->DivisionCode->getPlaceHolder()) ?>" value="<?= $Page->DivisionCode->EditValue ?>"<?= $Page->DivisionCode->editAttributes() ?> aria-describedby="x_DivisionCode_help">
<?= $Page->DivisionCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DivisionCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ManufacturerCode->Visible) { // ManufacturerCode ?>
    <div id="r_ManufacturerCode" class="form-group row">
        <label id="elh_pharmacy_products_ManufacturerCode" for="x_ManufacturerCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ManufacturerCode->caption() ?><?= $Page->ManufacturerCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ManufacturerCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ManufacturerCode">
<input type="<?= $Page->ManufacturerCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ManufacturerCode" name="x_ManufacturerCode" id="x_ManufacturerCode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->ManufacturerCode->getPlaceHolder()) ?>" value="<?= $Page->ManufacturerCode->EditValue ?>"<?= $Page->ManufacturerCode->editAttributes() ?> aria-describedby="x_ManufacturerCode_help">
<?= $Page->ManufacturerCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ManufacturerCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SupplierCode->Visible) { // SupplierCode ?>
    <div id="r_SupplierCode" class="form-group row">
        <label id="elh_pharmacy_products_SupplierCode" for="x_SupplierCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SupplierCode->caption() ?><?= $Page->SupplierCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SupplierCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SupplierCode">
<input type="<?= $Page->SupplierCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SupplierCode" name="x_SupplierCode" id="x_SupplierCode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->SupplierCode->getPlaceHolder()) ?>" value="<?= $Page->SupplierCode->EditValue ?>"<?= $Page->SupplierCode->editAttributes() ?> aria-describedby="x_SupplierCode_help">
<?= $Page->SupplierCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SupplierCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
    <div id="r_AlternateSupplierCodes" class="form-group row">
        <label id="elh_pharmacy_products_AlternateSupplierCodes" for="x_AlternateSupplierCodes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AlternateSupplierCodes->caption() ?><?= $Page->AlternateSupplierCodes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSupplierCodes">
<input type="<?= $Page->AlternateSupplierCodes->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AlternateSupplierCodes" name="x_AlternateSupplierCodes" id="x_AlternateSupplierCodes" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->AlternateSupplierCodes->getPlaceHolder()) ?>" value="<?= $Page->AlternateSupplierCodes->EditValue ?>"<?= $Page->AlternateSupplierCodes->editAttributes() ?> aria-describedby="x_AlternateSupplierCodes_help">
<?= $Page->AlternateSupplierCodes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AlternateSupplierCodes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlternateProductCode->Visible) { // AlternateProductCode ?>
    <div id="r_AlternateProductCode" class="form-group row">
        <label id="elh_pharmacy_products_AlternateProductCode" for="x_AlternateProductCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AlternateProductCode->caption() ?><?= $Page->AlternateProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlternateProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateProductCode">
<input type="<?= $Page->AlternateProductCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AlternateProductCode" name="x_AlternateProductCode" id="x_AlternateProductCode" size="30" maxlength="120" placeholder="<?= HtmlEncode($Page->AlternateProductCode->getPlaceHolder()) ?>" value="<?= $Page->AlternateProductCode->EditValue ?>"<?= $Page->AlternateProductCode->editAttributes() ?> aria-describedby="x_AlternateProductCode_help">
<?= $Page->AlternateProductCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AlternateProductCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UniversalProductCode->Visible) { // UniversalProductCode ?>
    <div id="r_UniversalProductCode" class="form-group row">
        <label id="elh_pharmacy_products_UniversalProductCode" for="x_UniversalProductCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UniversalProductCode->caption() ?><?= $Page->UniversalProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UniversalProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_UniversalProductCode">
<input type="<?= $Page->UniversalProductCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_UniversalProductCode" name="x_UniversalProductCode" id="x_UniversalProductCode" size="30" placeholder="<?= HtmlEncode($Page->UniversalProductCode->getPlaceHolder()) ?>" value="<?= $Page->UniversalProductCode->EditValue ?>"<?= $Page->UniversalProductCode->editAttributes() ?> aria-describedby="x_UniversalProductCode_help">
<?= $Page->UniversalProductCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UniversalProductCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BookProductCode->Visible) { // BookProductCode ?>
    <div id="r_BookProductCode" class="form-group row">
        <label id="elh_pharmacy_products_BookProductCode" for="x_BookProductCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BookProductCode->caption() ?><?= $Page->BookProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BookProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BookProductCode">
<input type="<?= $Page->BookProductCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BookProductCode" name="x_BookProductCode" id="x_BookProductCode" size="30" placeholder="<?= HtmlEncode($Page->BookProductCode->getPlaceHolder()) ?>" value="<?= $Page->BookProductCode->EditValue ?>"<?= $Page->BookProductCode->editAttributes() ?> aria-describedby="x_BookProductCode_help">
<?= $Page->BookProductCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BookProductCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OldCode->Visible) { // OldCode ?>
    <div id="r_OldCode" class="form-group row">
        <label id="elh_pharmacy_products_OldCode" for="x_OldCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OldCode->caption() ?><?= $Page->OldCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OldCode->cellAttributes() ?>>
<span id="el_pharmacy_products_OldCode">
<input type="<?= $Page->OldCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_OldCode" name="x_OldCode" id="x_OldCode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->OldCode->getPlaceHolder()) ?>" value="<?= $Page->OldCode->EditValue ?>"<?= $Page->OldCode->editAttributes() ?> aria-describedby="x_OldCode_help">
<?= $Page->OldCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OldCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProtectedProducts->Visible) { // ProtectedProducts ?>
    <div id="r_ProtectedProducts" class="form-group row">
        <label id="elh_pharmacy_products_ProtectedProducts" for="x_ProtectedProducts" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProtectedProducts->caption() ?><?= $Page->ProtectedProducts->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProtectedProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_ProtectedProducts">
<input type="<?= $Page->ProtectedProducts->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProtectedProducts" name="x_ProtectedProducts" id="x_ProtectedProducts" size="30" placeholder="<?= HtmlEncode($Page->ProtectedProducts->getPlaceHolder()) ?>" value="<?= $Page->ProtectedProducts->EditValue ?>"<?= $Page->ProtectedProducts->editAttributes() ?> aria-describedby="x_ProtectedProducts_help">
<?= $Page->ProtectedProducts->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProtectedProducts->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductFullName->Visible) { // ProductFullName ?>
    <div id="r_ProductFullName" class="form-group row">
        <label id="elh_pharmacy_products_ProductFullName" for="x_ProductFullName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductFullName->caption() ?><?= $Page->ProductFullName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductFullName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductFullName">
<input type="<?= $Page->ProductFullName->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductFullName" name="x_ProductFullName" id="x_ProductFullName" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->ProductFullName->getPlaceHolder()) ?>" value="<?= $Page->ProductFullName->EditValue ?>"<?= $Page->ProductFullName->editAttributes() ?> aria-describedby="x_ProductFullName_help">
<?= $Page->ProductFullName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductFullName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
    <div id="r_UnitOfMeasure" class="form-group row">
        <label id="elh_pharmacy_products_UnitOfMeasure" for="x_UnitOfMeasure" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UnitOfMeasure->caption() ?><?= $Page->UnitOfMeasure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UnitOfMeasure->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitOfMeasure">
<input type="<?= $Page->UnitOfMeasure->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_UnitOfMeasure" name="x_UnitOfMeasure" id="x_UnitOfMeasure" size="30" placeholder="<?= HtmlEncode($Page->UnitOfMeasure->getPlaceHolder()) ?>" value="<?= $Page->UnitOfMeasure->EditValue ?>"<?= $Page->UnitOfMeasure->editAttributes() ?> aria-describedby="x_UnitOfMeasure_help">
<?= $Page->UnitOfMeasure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UnitOfMeasure->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UnitDescription->Visible) { // UnitDescription ?>
    <div id="r_UnitDescription" class="form-group row">
        <label id="elh_pharmacy_products_UnitDescription" for="x_UnitDescription" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UnitDescription->caption() ?><?= $Page->UnitDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UnitDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitDescription">
<input type="<?= $Page->UnitDescription->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_UnitDescription" name="x_UnitDescription" id="x_UnitDescription" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->UnitDescription->getPlaceHolder()) ?>" value="<?= $Page->UnitDescription->EditValue ?>"<?= $Page->UnitDescription->editAttributes() ?> aria-describedby="x_UnitDescription_help">
<?= $Page->UnitDescription->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UnitDescription->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BulkDescription->Visible) { // BulkDescription ?>
    <div id="r_BulkDescription" class="form-group row">
        <label id="elh_pharmacy_products_BulkDescription" for="x_BulkDescription" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BulkDescription->caption() ?><?= $Page->BulkDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BulkDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BulkDescription">
<input type="<?= $Page->BulkDescription->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BulkDescription" name="x_BulkDescription" id="x_BulkDescription" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BulkDescription->getPlaceHolder()) ?>" value="<?= $Page->BulkDescription->EditValue ?>"<?= $Page->BulkDescription->editAttributes() ?> aria-describedby="x_BulkDescription_help">
<?= $Page->BulkDescription->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BulkDescription->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BarCodeDescription->Visible) { // BarCodeDescription ?>
    <div id="r_BarCodeDescription" class="form-group row">
        <label id="elh_pharmacy_products_BarCodeDescription" for="x_BarCodeDescription" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BarCodeDescription->caption() ?><?= $Page->BarCodeDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BarCodeDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDescription">
<input type="<?= $Page->BarCodeDescription->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BarCodeDescription" name="x_BarCodeDescription" id="x_BarCodeDescription" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BarCodeDescription->getPlaceHolder()) ?>" value="<?= $Page->BarCodeDescription->EditValue ?>"<?= $Page->BarCodeDescription->editAttributes() ?> aria-describedby="x_BarCodeDescription_help">
<?= $Page->BarCodeDescription->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BarCodeDescription->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PackageInformation->Visible) { // PackageInformation ?>
    <div id="r_PackageInformation" class="form-group row">
        <label id="elh_pharmacy_products_PackageInformation" for="x_PackageInformation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PackageInformation->caption() ?><?= $Page->PackageInformation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageInformation">
<input type="<?= $Page->PackageInformation->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PackageInformation" name="x_PackageInformation" id="x_PackageInformation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PackageInformation->getPlaceHolder()) ?>" value="<?= $Page->PackageInformation->EditValue ?>"<?= $Page->PackageInformation->editAttributes() ?> aria-describedby="x_PackageInformation_help">
<?= $Page->PackageInformation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PackageInformation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PackageId->Visible) { // PackageId ?>
    <div id="r_PackageId" class="form-group row">
        <label id="elh_pharmacy_products_PackageId" for="x_PackageId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PackageId->caption() ?><?= $Page->PackageId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PackageId->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageId">
<input type="<?= $Page->PackageId->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PackageId" name="x_PackageId" id="x_PackageId" size="30" placeholder="<?= HtmlEncode($Page->PackageId->getPlaceHolder()) ?>" value="<?= $Page->PackageId->EditValue ?>"<?= $Page->PackageId->editAttributes() ?> aria-describedby="x_PackageId_help">
<?= $Page->PackageId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PackageId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
    <div id="r_Weight" class="form-group row">
        <label id="elh_pharmacy_products_Weight" for="x_Weight" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Weight->caption() ?><?= $Page->Weight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Weight->cellAttributes() ?>>
<span id="el_pharmacy_products_Weight">
<input type="<?= $Page->Weight->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Weight" name="x_Weight" id="x_Weight" size="30" placeholder="<?= HtmlEncode($Page->Weight->getPlaceHolder()) ?>" value="<?= $Page->Weight->EditValue ?>"<?= $Page->Weight->editAttributes() ?> aria-describedby="x_Weight_help">
<?= $Page->Weight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Weight->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AllowFractions->Visible) { // AllowFractions ?>
    <div id="r_AllowFractions" class="form-group row">
        <label id="elh_pharmacy_products_AllowFractions" for="x_AllowFractions" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AllowFractions->caption() ?><?= $Page->AllowFractions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AllowFractions->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowFractions">
<input type="<?= $Page->AllowFractions->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AllowFractions" name="x_AllowFractions" id="x_AllowFractions" size="30" placeholder="<?= HtmlEncode($Page->AllowFractions->getPlaceHolder()) ?>" value="<?= $Page->AllowFractions->EditValue ?>"<?= $Page->AllowFractions->editAttributes() ?> aria-describedby="x_AllowFractions_help">
<?= $Page->AllowFractions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AllowFractions->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
    <div id="r_MinimumStockLevel" class="form-group row">
        <label id="elh_pharmacy_products_MinimumStockLevel" for="x_MinimumStockLevel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MinimumStockLevel->caption() ?><?= $Page->MinimumStockLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MinimumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumStockLevel">
<input type="<?= $Page->MinimumStockLevel->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MinimumStockLevel" name="x_MinimumStockLevel" id="x_MinimumStockLevel" size="30" placeholder="<?= HtmlEncode($Page->MinimumStockLevel->getPlaceHolder()) ?>" value="<?= $Page->MinimumStockLevel->EditValue ?>"<?= $Page->MinimumStockLevel->editAttributes() ?> aria-describedby="x_MinimumStockLevel_help">
<?= $Page->MinimumStockLevel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MinimumStockLevel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
    <div id="r_MaximumStockLevel" class="form-group row">
        <label id="elh_pharmacy_products_MaximumStockLevel" for="x_MaximumStockLevel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MaximumStockLevel->caption() ?><?= $Page->MaximumStockLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaximumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MaximumStockLevel">
<input type="<?= $Page->MaximumStockLevel->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MaximumStockLevel" name="x_MaximumStockLevel" id="x_MaximumStockLevel" size="30" placeholder="<?= HtmlEncode($Page->MaximumStockLevel->getPlaceHolder()) ?>" value="<?= $Page->MaximumStockLevel->EditValue ?>"<?= $Page->MaximumStockLevel->editAttributes() ?> aria-describedby="x_MaximumStockLevel_help">
<?= $Page->MaximumStockLevel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaximumStockLevel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReorderLevel->Visible) { // ReorderLevel ?>
    <div id="r_ReorderLevel" class="form-group row">
        <label id="elh_pharmacy_products_ReorderLevel" for="x_ReorderLevel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReorderLevel->caption() ?><?= $Page->ReorderLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReorderLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_ReorderLevel">
<input type="<?= $Page->ReorderLevel->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ReorderLevel" name="x_ReorderLevel" id="x_ReorderLevel" size="30" placeholder="<?= HtmlEncode($Page->ReorderLevel->getPlaceHolder()) ?>" value="<?= $Page->ReorderLevel->EditValue ?>"<?= $Page->ReorderLevel->editAttributes() ?> aria-describedby="x_ReorderLevel_help">
<?= $Page->ReorderLevel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReorderLevel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MinMaxRatio->Visible) { // MinMaxRatio ?>
    <div id="r_MinMaxRatio" class="form-group row">
        <label id="elh_pharmacy_products_MinMaxRatio" for="x_MinMaxRatio" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MinMaxRatio->caption() ?><?= $Page->MinMaxRatio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxRatio">
<input type="<?= $Page->MinMaxRatio->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MinMaxRatio" name="x_MinMaxRatio" id="x_MinMaxRatio" size="30" placeholder="<?= HtmlEncode($Page->MinMaxRatio->getPlaceHolder()) ?>" value="<?= $Page->MinMaxRatio->EditValue ?>"<?= $Page->MinMaxRatio->editAttributes() ?> aria-describedby="x_MinMaxRatio_help">
<?= $Page->MinMaxRatio->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MinMaxRatio->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
    <div id="r_AutoMinMaxRatio" class="form-group row">
        <label id="elh_pharmacy_products_AutoMinMaxRatio" for="x_AutoMinMaxRatio" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AutoMinMaxRatio->caption() ?><?= $Page->AutoMinMaxRatio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_AutoMinMaxRatio">
<input type="<?= $Page->AutoMinMaxRatio->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AutoMinMaxRatio" name="x_AutoMinMaxRatio" id="x_AutoMinMaxRatio" size="30" placeholder="<?= HtmlEncode($Page->AutoMinMaxRatio->getPlaceHolder()) ?>" value="<?= $Page->AutoMinMaxRatio->EditValue ?>"<?= $Page->AutoMinMaxRatio->editAttributes() ?> aria-describedby="x_AutoMinMaxRatio_help">
<?= $Page->AutoMinMaxRatio->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AutoMinMaxRatio->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ScheduleCode->Visible) { // ScheduleCode ?>
    <div id="r_ScheduleCode" class="form-group row">
        <label id="elh_pharmacy_products_ScheduleCode" for="x_ScheduleCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ScheduleCode->caption() ?><?= $Page->ScheduleCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ScheduleCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleCode">
<input type="<?= $Page->ScheduleCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ScheduleCode" name="x_ScheduleCode" id="x_ScheduleCode" size="30" placeholder="<?= HtmlEncode($Page->ScheduleCode->getPlaceHolder()) ?>" value="<?= $Page->ScheduleCode->EditValue ?>"<?= $Page->ScheduleCode->editAttributes() ?> aria-describedby="x_ScheduleCode_help">
<?= $Page->ScheduleCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ScheduleCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RopRatio->Visible) { // RopRatio ?>
    <div id="r_RopRatio" class="form-group row">
        <label id="elh_pharmacy_products_RopRatio" for="x_RopRatio" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RopRatio->caption() ?><?= $Page->RopRatio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RopRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_RopRatio">
<input type="<?= $Page->RopRatio->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_RopRatio" name="x_RopRatio" id="x_RopRatio" size="30" placeholder="<?= HtmlEncode($Page->RopRatio->getPlaceHolder()) ?>" value="<?= $Page->RopRatio->EditValue ?>"<?= $Page->RopRatio->editAttributes() ?> aria-describedby="x_RopRatio_help">
<?= $Page->RopRatio->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RopRatio->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div id="r_MRP" class="form-group row">
        <label id="elh_pharmacy_products_MRP" for="x_MRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MRP->caption() ?><?= $Page->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRP->cellAttributes() ?>>
<span id="el_pharmacy_products_MRP">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?> aria-describedby="x_MRP_help">
<?= $Page->MRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurchasePrice->Visible) { // PurchasePrice ?>
    <div id="r_PurchasePrice" class="form-group row">
        <label id="elh_pharmacy_products_PurchasePrice" for="x_PurchasePrice" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurchasePrice->caption() ?><?= $Page->PurchasePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurchasePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchasePrice">
<input type="<?= $Page->PurchasePrice->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PurchasePrice" name="x_PurchasePrice" id="x_PurchasePrice" size="30" placeholder="<?= HtmlEncode($Page->PurchasePrice->getPlaceHolder()) ?>" value="<?= $Page->PurchasePrice->EditValue ?>"<?= $Page->PurchasePrice->editAttributes() ?> aria-describedby="x_PurchasePrice_help">
<?= $Page->PurchasePrice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurchasePrice->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurchaseUnit->Visible) { // PurchaseUnit ?>
    <div id="r_PurchaseUnit" class="form-group row">
        <label id="elh_pharmacy_products_PurchaseUnit" for="x_PurchaseUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurchaseUnit->caption() ?><?= $Page->PurchaseUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurchaseUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseUnit">
<input type="<?= $Page->PurchaseUnit->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PurchaseUnit" name="x_PurchaseUnit" id="x_PurchaseUnit" size="30" placeholder="<?= HtmlEncode($Page->PurchaseUnit->getPlaceHolder()) ?>" value="<?= $Page->PurchaseUnit->EditValue ?>"<?= $Page->PurchaseUnit->editAttributes() ?> aria-describedby="x_PurchaseUnit_help">
<?= $Page->PurchaseUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurchaseUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
    <div id="r_PurchaseTaxCode" class="form-group row">
        <label id="elh_pharmacy_products_PurchaseTaxCode" for="x_PurchaseTaxCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurchaseTaxCode->caption() ?><?= $Page->PurchaseTaxCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurchaseTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseTaxCode">
<input type="<?= $Page->PurchaseTaxCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PurchaseTaxCode" name="x_PurchaseTaxCode" id="x_PurchaseTaxCode" size="30" placeholder="<?= HtmlEncode($Page->PurchaseTaxCode->getPlaceHolder()) ?>" value="<?= $Page->PurchaseTaxCode->EditValue ?>"<?= $Page->PurchaseTaxCode->editAttributes() ?> aria-describedby="x_PurchaseTaxCode_help">
<?= $Page->PurchaseTaxCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurchaseTaxCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AllowDirectInward->Visible) { // AllowDirectInward ?>
    <div id="r_AllowDirectInward" class="form-group row">
        <label id="elh_pharmacy_products_AllowDirectInward" for="x_AllowDirectInward" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AllowDirectInward->caption() ?><?= $Page->AllowDirectInward->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AllowDirectInward->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowDirectInward">
<input type="<?= $Page->AllowDirectInward->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AllowDirectInward" name="x_AllowDirectInward" id="x_AllowDirectInward" size="30" placeholder="<?= HtmlEncode($Page->AllowDirectInward->getPlaceHolder()) ?>" value="<?= $Page->AllowDirectInward->EditValue ?>"<?= $Page->AllowDirectInward->editAttributes() ?> aria-describedby="x_AllowDirectInward_help">
<?= $Page->AllowDirectInward->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AllowDirectInward->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SalePrice->Visible) { // SalePrice ?>
    <div id="r_SalePrice" class="form-group row">
        <label id="elh_pharmacy_products_SalePrice" for="x_SalePrice" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SalePrice->caption() ?><?= $Page->SalePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePrice">
<input type="<?= $Page->SalePrice->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SalePrice" name="x_SalePrice" id="x_SalePrice" size="30" placeholder="<?= HtmlEncode($Page->SalePrice->getPlaceHolder()) ?>" value="<?= $Page->SalePrice->EditValue ?>"<?= $Page->SalePrice->editAttributes() ?> aria-describedby="x_SalePrice_help">
<?= $Page->SalePrice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SalePrice->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SaleUnit->Visible) { // SaleUnit ?>
    <div id="r_SaleUnit" class="form-group row">
        <label id="elh_pharmacy_products_SaleUnit" for="x_SaleUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SaleUnit->caption() ?><?= $Page->SaleUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SaleUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleUnit">
<input type="<?= $Page->SaleUnit->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SaleUnit" name="x_SaleUnit" id="x_SaleUnit" size="30" placeholder="<?= HtmlEncode($Page->SaleUnit->getPlaceHolder()) ?>" value="<?= $Page->SaleUnit->EditValue ?>"<?= $Page->SaleUnit->editAttributes() ?> aria-describedby="x_SaleUnit_help">
<?= $Page->SaleUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SaleUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SalesTaxCode->Visible) { // SalesTaxCode ?>
    <div id="r_SalesTaxCode" class="form-group row">
        <label id="elh_pharmacy_products_SalesTaxCode" for="x_SalesTaxCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SalesTaxCode->caption() ?><?= $Page->SalesTaxCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalesTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesTaxCode">
<input type="<?= $Page->SalesTaxCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SalesTaxCode" name="x_SalesTaxCode" id="x_SalesTaxCode" size="30" placeholder="<?= HtmlEncode($Page->SalesTaxCode->getPlaceHolder()) ?>" value="<?= $Page->SalesTaxCode->EditValue ?>"<?= $Page->SalesTaxCode->editAttributes() ?> aria-describedby="x_SalesTaxCode_help">
<?= $Page->SalesTaxCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SalesTaxCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StockReceived->Visible) { // StockReceived ?>
    <div id="r_StockReceived" class="form-group row">
        <label id="elh_pharmacy_products_StockReceived" for="x_StockReceived" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StockReceived->caption() ?><?= $Page->StockReceived->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StockReceived->cellAttributes() ?>>
<span id="el_pharmacy_products_StockReceived">
<input type="<?= $Page->StockReceived->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_StockReceived" name="x_StockReceived" id="x_StockReceived" size="30" placeholder="<?= HtmlEncode($Page->StockReceived->getPlaceHolder()) ?>" value="<?= $Page->StockReceived->EditValue ?>"<?= $Page->StockReceived->editAttributes() ?> aria-describedby="x_StockReceived_help">
<?= $Page->StockReceived->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StockReceived->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalStock->Visible) { // TotalStock ?>
    <div id="r_TotalStock" class="form-group row">
        <label id="elh_pharmacy_products_TotalStock" for="x_TotalStock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalStock->caption() ?><?= $Page->TotalStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalStock->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalStock">
<input type="<?= $Page->TotalStock->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TotalStock" name="x_TotalStock" id="x_TotalStock" size="30" placeholder="<?= HtmlEncode($Page->TotalStock->getPlaceHolder()) ?>" value="<?= $Page->TotalStock->EditValue ?>"<?= $Page->TotalStock->editAttributes() ?> aria-describedby="x_TotalStock_help">
<?= $Page->TotalStock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalStock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StockType->Visible) { // StockType ?>
    <div id="r_StockType" class="form-group row">
        <label id="elh_pharmacy_products_StockType" for="x_StockType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StockType->caption() ?><?= $Page->StockType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StockType->cellAttributes() ?>>
<span id="el_pharmacy_products_StockType">
<input type="<?= $Page->StockType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_StockType" name="x_StockType" id="x_StockType" size="30" placeholder="<?= HtmlEncode($Page->StockType->getPlaceHolder()) ?>" value="<?= $Page->StockType->EditValue ?>"<?= $Page->StockType->editAttributes() ?> aria-describedby="x_StockType_help">
<?= $Page->StockType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StockType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StockCheckDate->Visible) { // StockCheckDate ?>
    <div id="r_StockCheckDate" class="form-group row">
        <label id="elh_pharmacy_products_StockCheckDate" for="x_StockCheckDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StockCheckDate->caption() ?><?= $Page->StockCheckDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StockCheckDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCheckDate">
<input type="<?= $Page->StockCheckDate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_StockCheckDate" name="x_StockCheckDate" id="x_StockCheckDate" placeholder="<?= HtmlEncode($Page->StockCheckDate->getPlaceHolder()) ?>" value="<?= $Page->StockCheckDate->EditValue ?>"<?= $Page->StockCheckDate->editAttributes() ?> aria-describedby="x_StockCheckDate_help">
<?= $Page->StockCheckDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StockCheckDate->getErrorMessage() ?></div>
<?php if (!$Page->StockCheckDate->ReadOnly && !$Page->StockCheckDate->Disabled && !isset($Page->StockCheckDate->EditAttrs["readonly"]) && !isset($Page->StockCheckDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_StockCheckDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
    <div id="r_StockAdjustmentDate" class="form-group row">
        <label id="elh_pharmacy_products_StockAdjustmentDate" for="x_StockAdjustmentDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StockAdjustmentDate->caption() ?><?= $Page->StockAdjustmentDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StockAdjustmentDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockAdjustmentDate">
<input type="<?= $Page->StockAdjustmentDate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_StockAdjustmentDate" name="x_StockAdjustmentDate" id="x_StockAdjustmentDate" placeholder="<?= HtmlEncode($Page->StockAdjustmentDate->getPlaceHolder()) ?>" value="<?= $Page->StockAdjustmentDate->EditValue ?>"<?= $Page->StockAdjustmentDate->editAttributes() ?> aria-describedby="x_StockAdjustmentDate_help">
<?= $Page->StockAdjustmentDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StockAdjustmentDate->getErrorMessage() ?></div>
<?php if (!$Page->StockAdjustmentDate->ReadOnly && !$Page->StockAdjustmentDate->Disabled && !isset($Page->StockAdjustmentDate->EditAttrs["readonly"]) && !isset($Page->StockAdjustmentDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_StockAdjustmentDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_pharmacy_products_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_products_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CostCentre->Visible) { // CostCentre ?>
    <div id="r_CostCentre" class="form-group row">
        <label id="elh_pharmacy_products_CostCentre" for="x_CostCentre" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CostCentre->caption() ?><?= $Page->CostCentre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CostCentre->cellAttributes() ?>>
<span id="el_pharmacy_products_CostCentre">
<input type="<?= $Page->CostCentre->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CostCentre" name="x_CostCentre" id="x_CostCentre" size="30" placeholder="<?= HtmlEncode($Page->CostCentre->getPlaceHolder()) ?>" value="<?= $Page->CostCentre->EditValue ?>"<?= $Page->CostCentre->editAttributes() ?> aria-describedby="x_CostCentre_help">
<?= $Page->CostCentre->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CostCentre->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
    <div id="r_ProductType" class="form-group row">
        <label id="elh_pharmacy_products_ProductType" for="x_ProductType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductType->caption() ?><?= $Page->ProductType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductType->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductType">
<input type="<?= $Page->ProductType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductType" name="x_ProductType" id="x_ProductType" size="30" placeholder="<?= HtmlEncode($Page->ProductType->getPlaceHolder()) ?>" value="<?= $Page->ProductType->EditValue ?>"<?= $Page->ProductType->editAttributes() ?> aria-describedby="x_ProductType_help">
<?= $Page->ProductType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TaxAmount->Visible) { // TaxAmount ?>
    <div id="r_TaxAmount" class="form-group row">
        <label id="elh_pharmacy_products_TaxAmount" for="x_TaxAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TaxAmount->caption() ?><?= $Page->TaxAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TaxAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxAmount">
<input type="<?= $Page->TaxAmount->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TaxAmount" name="x_TaxAmount" id="x_TaxAmount" size="30" placeholder="<?= HtmlEncode($Page->TaxAmount->getPlaceHolder()) ?>" value="<?= $Page->TaxAmount->EditValue ?>"<?= $Page->TaxAmount->editAttributes() ?> aria-describedby="x_TaxAmount_help">
<?= $Page->TaxAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TaxAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TaxId->Visible) { // TaxId ?>
    <div id="r_TaxId" class="form-group row">
        <label id="elh_pharmacy_products_TaxId" for="x_TaxId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TaxId->caption() ?><?= $Page->TaxId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TaxId->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxId">
<input type="<?= $Page->TaxId->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TaxId" name="x_TaxId" id="x_TaxId" size="30" placeholder="<?= HtmlEncode($Page->TaxId->getPlaceHolder()) ?>" value="<?= $Page->TaxId->EditValue ?>"<?= $Page->TaxId->editAttributes() ?> aria-describedby="x_TaxId_help">
<?= $Page->TaxId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TaxId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
    <div id="r_ResaleTaxApplicable" class="form-group row">
        <label id="elh_pharmacy_products_ResaleTaxApplicable" for="x_ResaleTaxApplicable" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResaleTaxApplicable->caption() ?><?= $Page->ResaleTaxApplicable->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ResaleTaxApplicable">
<input type="<?= $Page->ResaleTaxApplicable->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ResaleTaxApplicable" name="x_ResaleTaxApplicable" id="x_ResaleTaxApplicable" size="30" placeholder="<?= HtmlEncode($Page->ResaleTaxApplicable->getPlaceHolder()) ?>" value="<?= $Page->ResaleTaxApplicable->EditValue ?>"<?= $Page->ResaleTaxApplicable->editAttributes() ?> aria-describedby="x_ResaleTaxApplicable_help">
<?= $Page->ResaleTaxApplicable->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResaleTaxApplicable->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CstOtherTax->Visible) { // CstOtherTax ?>
    <div id="r_CstOtherTax" class="form-group row">
        <label id="elh_pharmacy_products_CstOtherTax" for="x_CstOtherTax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CstOtherTax->caption() ?><?= $Page->CstOtherTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CstOtherTax->cellAttributes() ?>>
<span id="el_pharmacy_products_CstOtherTax">
<input type="<?= $Page->CstOtherTax->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CstOtherTax" name="x_CstOtherTax" id="x_CstOtherTax" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CstOtherTax->getPlaceHolder()) ?>" value="<?= $Page->CstOtherTax->EditValue ?>"<?= $Page->CstOtherTax->editAttributes() ?> aria-describedby="x_CstOtherTax_help">
<?= $Page->CstOtherTax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CstOtherTax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalTax->Visible) { // TotalTax ?>
    <div id="r_TotalTax" class="form-group row">
        <label id="elh_pharmacy_products_TotalTax" for="x_TotalTax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalTax->caption() ?><?= $Page->TotalTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalTax->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalTax">
<input type="<?= $Page->TotalTax->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TotalTax" name="x_TotalTax" id="x_TotalTax" size="30" placeholder="<?= HtmlEncode($Page->TotalTax->getPlaceHolder()) ?>" value="<?= $Page->TotalTax->EditValue ?>"<?= $Page->TotalTax->editAttributes() ?> aria-describedby="x_TotalTax_help">
<?= $Page->TotalTax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalTax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ItemCost->Visible) { // ItemCost ?>
    <div id="r_ItemCost" class="form-group row">
        <label id="elh_pharmacy_products_ItemCost" for="x_ItemCost" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ItemCost->caption() ?><?= $Page->ItemCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ItemCost">
<input type="<?= $Page->ItemCost->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ItemCost" name="x_ItemCost" id="x_ItemCost" size="30" placeholder="<?= HtmlEncode($Page->ItemCost->getPlaceHolder()) ?>" value="<?= $Page->ItemCost->EditValue ?>"<?= $Page->ItemCost->editAttributes() ?> aria-describedby="x_ItemCost_help">
<?= $Page->ItemCost->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ItemCost->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpiryDate->Visible) { // ExpiryDate ?>
    <div id="r_ExpiryDate" class="form-group row">
        <label id="elh_pharmacy_products_ExpiryDate" for="x_ExpiryDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ExpiryDate->caption() ?><?= $Page->ExpiryDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExpiryDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryDate">
<input type="<?= $Page->ExpiryDate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ExpiryDate" name="x_ExpiryDate" id="x_ExpiryDate" placeholder="<?= HtmlEncode($Page->ExpiryDate->getPlaceHolder()) ?>" value="<?= $Page->ExpiryDate->EditValue ?>"<?= $Page->ExpiryDate->editAttributes() ?> aria-describedby="x_ExpiryDate_help">
<?= $Page->ExpiryDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExpiryDate->getErrorMessage() ?></div>
<?php if (!$Page->ExpiryDate->ReadOnly && !$Page->ExpiryDate->Disabled && !isset($Page->ExpiryDate->EditAttrs["readonly"]) && !isset($Page->ExpiryDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_ExpiryDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BatchDescription->Visible) { // BatchDescription ?>
    <div id="r_BatchDescription" class="form-group row">
        <label id="elh_pharmacy_products_BatchDescription" for="x_BatchDescription" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BatchDescription->caption() ?><?= $Page->BatchDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BatchDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchDescription">
<input type="<?= $Page->BatchDescription->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BatchDescription" name="x_BatchDescription" id="x_BatchDescription" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BatchDescription->getPlaceHolder()) ?>" value="<?= $Page->BatchDescription->EditValue ?>"<?= $Page->BatchDescription->editAttributes() ?> aria-describedby="x_BatchDescription_help">
<?= $Page->BatchDescription->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BatchDescription->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeScheme->Visible) { // FreeScheme ?>
    <div id="r_FreeScheme" class="form-group row">
        <label id="elh_pharmacy_products_FreeScheme" for="x_FreeScheme" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FreeScheme->caption() ?><?= $Page->FreeScheme->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeScheme->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeScheme">
<input type="<?= $Page->FreeScheme->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FreeScheme" name="x_FreeScheme" id="x_FreeScheme" size="30" placeholder="<?= HtmlEncode($Page->FreeScheme->getPlaceHolder()) ?>" value="<?= $Page->FreeScheme->EditValue ?>"<?= $Page->FreeScheme->editAttributes() ?> aria-describedby="x_FreeScheme_help">
<?= $Page->FreeScheme->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FreeScheme->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
    <div id="r_CashDiscountEligibility" class="form-group row">
        <label id="elh_pharmacy_products_CashDiscountEligibility" for="x_CashDiscountEligibility" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CashDiscountEligibility->caption() ?><?= $Page->CashDiscountEligibility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CashDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_CashDiscountEligibility">
<input type="<?= $Page->CashDiscountEligibility->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CashDiscountEligibility" name="x_CashDiscountEligibility" id="x_CashDiscountEligibility" size="30" placeholder="<?= HtmlEncode($Page->CashDiscountEligibility->getPlaceHolder()) ?>" value="<?= $Page->CashDiscountEligibility->EditValue ?>"<?= $Page->CashDiscountEligibility->editAttributes() ?> aria-describedby="x_CashDiscountEligibility_help">
<?= $Page->CashDiscountEligibility->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CashDiscountEligibility->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
    <div id="r_DiscountPerAllowInBill" class="form-group row">
        <label id="elh_pharmacy_products_DiscountPerAllowInBill" for="x_DiscountPerAllowInBill" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DiscountPerAllowInBill->caption() ?><?= $Page->DiscountPerAllowInBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountPerAllowInBill">
<input type="<?= $Page->DiscountPerAllowInBill->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DiscountPerAllowInBill" name="x_DiscountPerAllowInBill" id="x_DiscountPerAllowInBill" size="30" placeholder="<?= HtmlEncode($Page->DiscountPerAllowInBill->getPlaceHolder()) ?>" value="<?= $Page->DiscountPerAllowInBill->EditValue ?>"<?= $Page->DiscountPerAllowInBill->editAttributes() ?> aria-describedby="x_DiscountPerAllowInBill_help">
<?= $Page->DiscountPerAllowInBill->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DiscountPerAllowInBill->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <div id="r_Discount" class="form-group row">
        <label id="elh_pharmacy_products_Discount" for="x_Discount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Discount->caption() ?><?= $Page->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Discount->cellAttributes() ?>>
<span id="el_pharmacy_products_Discount">
<input type="<?= $Page->Discount->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?= HtmlEncode($Page->Discount->getPlaceHolder()) ?>" value="<?= $Page->Discount->EditValue ?>"<?= $Page->Discount->editAttributes() ?> aria-describedby="x_Discount_help">
<?= $Page->Discount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Discount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
    <div id="r_TotalAmount" class="form-group row">
        <label id="elh_pharmacy_products_TotalAmount" for="x_TotalAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalAmount->caption() ?><?= $Page->TotalAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalAmount">
<input type="<?= $Page->TotalAmount->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?= HtmlEncode($Page->TotalAmount->getPlaceHolder()) ?>" value="<?= $Page->TotalAmount->EditValue ?>"<?= $Page->TotalAmount->editAttributes() ?> aria-describedby="x_TotalAmount_help">
<?= $Page->TotalAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StandardMargin->Visible) { // StandardMargin ?>
    <div id="r_StandardMargin" class="form-group row">
        <label id="elh_pharmacy_products_StandardMargin" for="x_StandardMargin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StandardMargin->caption() ?><?= $Page->StandardMargin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StandardMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_StandardMargin">
<input type="<?= $Page->StandardMargin->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_StandardMargin" name="x_StandardMargin" id="x_StandardMargin" size="30" placeholder="<?= HtmlEncode($Page->StandardMargin->getPlaceHolder()) ?>" value="<?= $Page->StandardMargin->EditValue ?>"<?= $Page->StandardMargin->editAttributes() ?> aria-describedby="x_StandardMargin_help">
<?= $Page->StandardMargin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StandardMargin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Margin->Visible) { // Margin ?>
    <div id="r_Margin" class="form-group row">
        <label id="elh_pharmacy_products_Margin" for="x_Margin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Margin->caption() ?><?= $Page->Margin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Margin->cellAttributes() ?>>
<span id="el_pharmacy_products_Margin">
<input type="<?= $Page->Margin->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Margin" name="x_Margin" id="x_Margin" size="30" placeholder="<?= HtmlEncode($Page->Margin->getPlaceHolder()) ?>" value="<?= $Page->Margin->EditValue ?>"<?= $Page->Margin->editAttributes() ?> aria-describedby="x_Margin_help">
<?= $Page->Margin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Margin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MarginId->Visible) { // MarginId ?>
    <div id="r_MarginId" class="form-group row">
        <label id="elh_pharmacy_products_MarginId" for="x_MarginId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MarginId->caption() ?><?= $Page->MarginId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MarginId->cellAttributes() ?>>
<span id="el_pharmacy_products_MarginId">
<input type="<?= $Page->MarginId->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MarginId" name="x_MarginId" id="x_MarginId" size="30" placeholder="<?= HtmlEncode($Page->MarginId->getPlaceHolder()) ?>" value="<?= $Page->MarginId->EditValue ?>"<?= $Page->MarginId->editAttributes() ?> aria-describedby="x_MarginId_help">
<?= $Page->MarginId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MarginId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpectedMargin->Visible) { // ExpectedMargin ?>
    <div id="r_ExpectedMargin" class="form-group row">
        <label id="elh_pharmacy_products_ExpectedMargin" for="x_ExpectedMargin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ExpectedMargin->caption() ?><?= $Page->ExpectedMargin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExpectedMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpectedMargin">
<input type="<?= $Page->ExpectedMargin->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ExpectedMargin" name="x_ExpectedMargin" id="x_ExpectedMargin" size="30" placeholder="<?= HtmlEncode($Page->ExpectedMargin->getPlaceHolder()) ?>" value="<?= $Page->ExpectedMargin->EditValue ?>"<?= $Page->ExpectedMargin->editAttributes() ?> aria-describedby="x_ExpectedMargin_help">
<?= $Page->ExpectedMargin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExpectedMargin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
    <div id="r_SurchargeBeforeTax" class="form-group row">
        <label id="elh_pharmacy_products_SurchargeBeforeTax" for="x_SurchargeBeforeTax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SurchargeBeforeTax->caption() ?><?= $Page->SurchargeBeforeTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeBeforeTax">
<input type="<?= $Page->SurchargeBeforeTax->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SurchargeBeforeTax" name="x_SurchargeBeforeTax" id="x_SurchargeBeforeTax" size="30" placeholder="<?= HtmlEncode($Page->SurchargeBeforeTax->getPlaceHolder()) ?>" value="<?= $Page->SurchargeBeforeTax->EditValue ?>"<?= $Page->SurchargeBeforeTax->editAttributes() ?> aria-describedby="x_SurchargeBeforeTax_help">
<?= $Page->SurchargeBeforeTax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurchargeBeforeTax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
    <div id="r_SurchargeAfterTax" class="form-group row">
        <label id="elh_pharmacy_products_SurchargeAfterTax" for="x_SurchargeAfterTax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SurchargeAfterTax->caption() ?><?= $Page->SurchargeAfterTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurchargeAfterTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeAfterTax">
<input type="<?= $Page->SurchargeAfterTax->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SurchargeAfterTax" name="x_SurchargeAfterTax" id="x_SurchargeAfterTax" size="30" placeholder="<?= HtmlEncode($Page->SurchargeAfterTax->getPlaceHolder()) ?>" value="<?= $Page->SurchargeAfterTax->EditValue ?>"<?= $Page->SurchargeAfterTax->editAttributes() ?> aria-describedby="x_SurchargeAfterTax_help">
<?= $Page->SurchargeAfterTax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurchargeAfterTax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TempOrderNo->Visible) { // TempOrderNo ?>
    <div id="r_TempOrderNo" class="form-group row">
        <label id="elh_pharmacy_products_TempOrderNo" for="x_TempOrderNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TempOrderNo->caption() ?><?= $Page->TempOrderNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TempOrderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderNo">
<input type="<?= $Page->TempOrderNo->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TempOrderNo" name="x_TempOrderNo" id="x_TempOrderNo" size="30" placeholder="<?= HtmlEncode($Page->TempOrderNo->getPlaceHolder()) ?>" value="<?= $Page->TempOrderNo->EditValue ?>"<?= $Page->TempOrderNo->editAttributes() ?> aria-describedby="x_TempOrderNo_help">
<?= $Page->TempOrderNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TempOrderNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TempOrderDate->Visible) { // TempOrderDate ?>
    <div id="r_TempOrderDate" class="form-group row">
        <label id="elh_pharmacy_products_TempOrderDate" for="x_TempOrderDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TempOrderDate->caption() ?><?= $Page->TempOrderDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TempOrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderDate">
<input type="<?= $Page->TempOrderDate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TempOrderDate" name="x_TempOrderDate" id="x_TempOrderDate" placeholder="<?= HtmlEncode($Page->TempOrderDate->getPlaceHolder()) ?>" value="<?= $Page->TempOrderDate->EditValue ?>"<?= $Page->TempOrderDate->editAttributes() ?> aria-describedby="x_TempOrderDate_help">
<?= $Page->TempOrderDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TempOrderDate->getErrorMessage() ?></div>
<?php if (!$Page->TempOrderDate->ReadOnly && !$Page->TempOrderDate->Disabled && !isset($Page->TempOrderDate->EditAttrs["readonly"]) && !isset($Page->TempOrderDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_TempOrderDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OrderUnit->Visible) { // OrderUnit ?>
    <div id="r_OrderUnit" class="form-group row">
        <label id="elh_pharmacy_products_OrderUnit" for="x_OrderUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OrderUnit->caption() ?><?= $Page->OrderUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OrderUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderUnit">
<input type="<?= $Page->OrderUnit->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_OrderUnit" name="x_OrderUnit" id="x_OrderUnit" size="30" placeholder="<?= HtmlEncode($Page->OrderUnit->getPlaceHolder()) ?>" value="<?= $Page->OrderUnit->EditValue ?>"<?= $Page->OrderUnit->editAttributes() ?> aria-describedby="x_OrderUnit_help">
<?= $Page->OrderUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OrderUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OrderQuantity->Visible) { // OrderQuantity ?>
    <div id="r_OrderQuantity" class="form-group row">
        <label id="elh_pharmacy_products_OrderQuantity" for="x_OrderQuantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OrderQuantity->caption() ?><?= $Page->OrderQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OrderQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderQuantity">
<input type="<?= $Page->OrderQuantity->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_OrderQuantity" name="x_OrderQuantity" id="x_OrderQuantity" size="30" placeholder="<?= HtmlEncode($Page->OrderQuantity->getPlaceHolder()) ?>" value="<?= $Page->OrderQuantity->EditValue ?>"<?= $Page->OrderQuantity->editAttributes() ?> aria-describedby="x_OrderQuantity_help">
<?= $Page->OrderQuantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OrderQuantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MarkForOrder->Visible) { // MarkForOrder ?>
    <div id="r_MarkForOrder" class="form-group row">
        <label id="elh_pharmacy_products_MarkForOrder" for="x_MarkForOrder" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MarkForOrder->caption() ?><?= $Page->MarkForOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MarkForOrder->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkForOrder">
<input type="<?= $Page->MarkForOrder->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MarkForOrder" name="x_MarkForOrder" id="x_MarkForOrder" size="30" placeholder="<?= HtmlEncode($Page->MarkForOrder->getPlaceHolder()) ?>" value="<?= $Page->MarkForOrder->EditValue ?>"<?= $Page->MarkForOrder->editAttributes() ?> aria-describedby="x_MarkForOrder_help">
<?= $Page->MarkForOrder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MarkForOrder->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OrderAllId->Visible) { // OrderAllId ?>
    <div id="r_OrderAllId" class="form-group row">
        <label id="elh_pharmacy_products_OrderAllId" for="x_OrderAllId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OrderAllId->caption() ?><?= $Page->OrderAllId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OrderAllId->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderAllId">
<input type="<?= $Page->OrderAllId->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_OrderAllId" name="x_OrderAllId" id="x_OrderAllId" size="30" placeholder="<?= HtmlEncode($Page->OrderAllId->getPlaceHolder()) ?>" value="<?= $Page->OrderAllId->EditValue ?>"<?= $Page->OrderAllId->editAttributes() ?> aria-describedby="x_OrderAllId_help">
<?= $Page->OrderAllId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OrderAllId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
    <div id="r_CalculateOrderQty" class="form-group row">
        <label id="elh_pharmacy_products_CalculateOrderQty" for="x_CalculateOrderQty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CalculateOrderQty->caption() ?><?= $Page->CalculateOrderQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CalculateOrderQty->cellAttributes() ?>>
<span id="el_pharmacy_products_CalculateOrderQty">
<input type="<?= $Page->CalculateOrderQty->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CalculateOrderQty" name="x_CalculateOrderQty" id="x_CalculateOrderQty" size="30" placeholder="<?= HtmlEncode($Page->CalculateOrderQty->getPlaceHolder()) ?>" value="<?= $Page->CalculateOrderQty->EditValue ?>"<?= $Page->CalculateOrderQty->editAttributes() ?> aria-describedby="x_CalculateOrderQty_help">
<?= $Page->CalculateOrderQty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CalculateOrderQty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SubLocation->Visible) { // SubLocation ?>
    <div id="r_SubLocation" class="form-group row">
        <label id="elh_pharmacy_products_SubLocation" for="x_SubLocation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SubLocation->caption() ?><?= $Page->SubLocation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SubLocation->cellAttributes() ?>>
<span id="el_pharmacy_products_SubLocation">
<input type="<?= $Page->SubLocation->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SubLocation" name="x_SubLocation" id="x_SubLocation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SubLocation->getPlaceHolder()) ?>" value="<?= $Page->SubLocation->EditValue ?>"<?= $Page->SubLocation->editAttributes() ?> aria-describedby="x_SubLocation_help">
<?= $Page->SubLocation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SubLocation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CategoryCode->Visible) { // CategoryCode ?>
    <div id="r_CategoryCode" class="form-group row">
        <label id="elh_pharmacy_products_CategoryCode" for="x_CategoryCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CategoryCode->caption() ?><?= $Page->CategoryCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CategoryCode">
<input type="<?= $Page->CategoryCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CategoryCode" name="x_CategoryCode" id="x_CategoryCode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CategoryCode->getPlaceHolder()) ?>" value="<?= $Page->CategoryCode->EditValue ?>"<?= $Page->CategoryCode->editAttributes() ?> aria-describedby="x_CategoryCode_help">
<?= $Page->CategoryCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CategoryCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SubCategory->Visible) { // SubCategory ?>
    <div id="r_SubCategory" class="form-group row">
        <label id="elh_pharmacy_products_SubCategory" for="x_SubCategory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SubCategory->caption() ?><?= $Page->SubCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SubCategory->cellAttributes() ?>>
<span id="el_pharmacy_products_SubCategory">
<input type="<?= $Page->SubCategory->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SubCategory" name="x_SubCategory" id="x_SubCategory" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SubCategory->getPlaceHolder()) ?>" value="<?= $Page->SubCategory->EditValue ?>"<?= $Page->SubCategory->editAttributes() ?> aria-describedby="x_SubCategory_help">
<?= $Page->SubCategory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SubCategory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
    <div id="r_FlexCategoryCode" class="form-group row">
        <label id="elh_pharmacy_products_FlexCategoryCode" for="x_FlexCategoryCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FlexCategoryCode->caption() ?><?= $Page->FlexCategoryCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FlexCategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_FlexCategoryCode">
<input type="<?= $Page->FlexCategoryCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FlexCategoryCode" name="x_FlexCategoryCode" id="x_FlexCategoryCode" size="30" placeholder="<?= HtmlEncode($Page->FlexCategoryCode->getPlaceHolder()) ?>" value="<?= $Page->FlexCategoryCode->EditValue ?>"<?= $Page->FlexCategoryCode->editAttributes() ?> aria-describedby="x_FlexCategoryCode_help">
<?= $Page->FlexCategoryCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FlexCategoryCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ABCSaleQty->Visible) { // ABCSaleQty ?>
    <div id="r_ABCSaleQty" class="form-group row">
        <label id="elh_pharmacy_products_ABCSaleQty" for="x_ABCSaleQty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ABCSaleQty->caption() ?><?= $Page->ABCSaleQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ABCSaleQty->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleQty">
<input type="<?= $Page->ABCSaleQty->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ABCSaleQty" name="x_ABCSaleQty" id="x_ABCSaleQty" size="30" placeholder="<?= HtmlEncode($Page->ABCSaleQty->getPlaceHolder()) ?>" value="<?= $Page->ABCSaleQty->EditValue ?>"<?= $Page->ABCSaleQty->editAttributes() ?> aria-describedby="x_ABCSaleQty_help">
<?= $Page->ABCSaleQty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ABCSaleQty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ABCSaleValue->Visible) { // ABCSaleValue ?>
    <div id="r_ABCSaleValue" class="form-group row">
        <label id="elh_pharmacy_products_ABCSaleValue" for="x_ABCSaleValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ABCSaleValue->caption() ?><?= $Page->ABCSaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ABCSaleValue->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleValue">
<input type="<?= $Page->ABCSaleValue->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ABCSaleValue" name="x_ABCSaleValue" id="x_ABCSaleValue" size="30" placeholder="<?= HtmlEncode($Page->ABCSaleValue->getPlaceHolder()) ?>" value="<?= $Page->ABCSaleValue->EditValue ?>"<?= $Page->ABCSaleValue->editAttributes() ?> aria-describedby="x_ABCSaleValue_help">
<?= $Page->ABCSaleValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ABCSaleValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ConvertionFactor->Visible) { // ConvertionFactor ?>
    <div id="r_ConvertionFactor" class="form-group row">
        <label id="elh_pharmacy_products_ConvertionFactor" for="x_ConvertionFactor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ConvertionFactor->caption() ?><?= $Page->ConvertionFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ConvertionFactor->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionFactor">
<input type="<?= $Page->ConvertionFactor->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ConvertionFactor" name="x_ConvertionFactor" id="x_ConvertionFactor" size="30" placeholder="<?= HtmlEncode($Page->ConvertionFactor->getPlaceHolder()) ?>" value="<?= $Page->ConvertionFactor->EditValue ?>"<?= $Page->ConvertionFactor->editAttributes() ?> aria-describedby="x_ConvertionFactor_help">
<?= $Page->ConvertionFactor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ConvertionFactor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
    <div id="r_ConvertionUnitDesc" class="form-group row">
        <label id="elh_pharmacy_products_ConvertionUnitDesc" for="x_ConvertionUnitDesc" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ConvertionUnitDesc->caption() ?><?= $Page->ConvertionUnitDesc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionUnitDesc">
<input type="<?= $Page->ConvertionUnitDesc->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ConvertionUnitDesc" name="x_ConvertionUnitDesc" id="x_ConvertionUnitDesc" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ConvertionUnitDesc->getPlaceHolder()) ?>" value="<?= $Page->ConvertionUnitDesc->EditValue ?>"<?= $Page->ConvertionUnitDesc->editAttributes() ?> aria-describedby="x_ConvertionUnitDesc_help">
<?= $Page->ConvertionUnitDesc->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ConvertionUnitDesc->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransactionId->Visible) { // TransactionId ?>
    <div id="r_TransactionId" class="form-group row">
        <label id="elh_pharmacy_products_TransactionId" for="x_TransactionId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TransactionId->caption() ?><?= $Page->TransactionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransactionId->cellAttributes() ?>>
<span id="el_pharmacy_products_TransactionId">
<input type="<?= $Page->TransactionId->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TransactionId" name="x_TransactionId" id="x_TransactionId" size="30" placeholder="<?= HtmlEncode($Page->TransactionId->getPlaceHolder()) ?>" value="<?= $Page->TransactionId->EditValue ?>"<?= $Page->TransactionId->editAttributes() ?> aria-describedby="x_TransactionId_help">
<?= $Page->TransactionId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransactionId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SoldProductId->Visible) { // SoldProductId ?>
    <div id="r_SoldProductId" class="form-group row">
        <label id="elh_pharmacy_products_SoldProductId" for="x_SoldProductId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SoldProductId->caption() ?><?= $Page->SoldProductId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SoldProductId->cellAttributes() ?>>
<span id="el_pharmacy_products_SoldProductId">
<input type="<?= $Page->SoldProductId->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SoldProductId" name="x_SoldProductId" id="x_SoldProductId" size="30" placeholder="<?= HtmlEncode($Page->SoldProductId->getPlaceHolder()) ?>" value="<?= $Page->SoldProductId->EditValue ?>"<?= $Page->SoldProductId->editAttributes() ?> aria-describedby="x_SoldProductId_help">
<?= $Page->SoldProductId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SoldProductId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WantedBookId->Visible) { // WantedBookId ?>
    <div id="r_WantedBookId" class="form-group row">
        <label id="elh_pharmacy_products_WantedBookId" for="x_WantedBookId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WantedBookId->caption() ?><?= $Page->WantedBookId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WantedBookId->cellAttributes() ?>>
<span id="el_pharmacy_products_WantedBookId">
<input type="<?= $Page->WantedBookId->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_WantedBookId" name="x_WantedBookId" id="x_WantedBookId" size="30" placeholder="<?= HtmlEncode($Page->WantedBookId->getPlaceHolder()) ?>" value="<?= $Page->WantedBookId->EditValue ?>"<?= $Page->WantedBookId->editAttributes() ?> aria-describedby="x_WantedBookId_help">
<?= $Page->WantedBookId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WantedBookId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AllId->Visible) { // AllId ?>
    <div id="r_AllId" class="form-group row">
        <label id="elh_pharmacy_products_AllId" for="x_AllId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AllId->caption() ?><?= $Page->AllId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AllId->cellAttributes() ?>>
<span id="el_pharmacy_products_AllId">
<input type="<?= $Page->AllId->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AllId" name="x_AllId" id="x_AllId" size="30" placeholder="<?= HtmlEncode($Page->AllId->getPlaceHolder()) ?>" value="<?= $Page->AllId->EditValue ?>"<?= $Page->AllId->editAttributes() ?> aria-describedby="x_AllId_help">
<?= $Page->AllId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AllId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
    <div id="r_BatchAndExpiryCompulsory" class="form-group row">
        <label id="elh_pharmacy_products_BatchAndExpiryCompulsory" for="x_BatchAndExpiryCompulsory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BatchAndExpiryCompulsory->caption() ?><?= $Page->BatchAndExpiryCompulsory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchAndExpiryCompulsory">
<input type="<?= $Page->BatchAndExpiryCompulsory->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BatchAndExpiryCompulsory" name="x_BatchAndExpiryCompulsory" id="x_BatchAndExpiryCompulsory" size="30" placeholder="<?= HtmlEncode($Page->BatchAndExpiryCompulsory->getPlaceHolder()) ?>" value="<?= $Page->BatchAndExpiryCompulsory->EditValue ?>"<?= $Page->BatchAndExpiryCompulsory->editAttributes() ?> aria-describedby="x_BatchAndExpiryCompulsory_help">
<?= $Page->BatchAndExpiryCompulsory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BatchAndExpiryCompulsory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
    <div id="r_BatchStockForWantedBook" class="form-group row">
        <label id="elh_pharmacy_products_BatchStockForWantedBook" for="x_BatchStockForWantedBook" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BatchStockForWantedBook->caption() ?><?= $Page->BatchStockForWantedBook->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchStockForWantedBook">
<input type="<?= $Page->BatchStockForWantedBook->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BatchStockForWantedBook" name="x_BatchStockForWantedBook" id="x_BatchStockForWantedBook" size="30" placeholder="<?= HtmlEncode($Page->BatchStockForWantedBook->getPlaceHolder()) ?>" value="<?= $Page->BatchStockForWantedBook->EditValue ?>"<?= $Page->BatchStockForWantedBook->editAttributes() ?> aria-describedby="x_BatchStockForWantedBook_help">
<?= $Page->BatchStockForWantedBook->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BatchStockForWantedBook->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
    <div id="r_UnitBasedBilling" class="form-group row">
        <label id="elh_pharmacy_products_UnitBasedBilling" for="x_UnitBasedBilling" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UnitBasedBilling->caption() ?><?= $Page->UnitBasedBilling->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UnitBasedBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitBasedBilling">
<input type="<?= $Page->UnitBasedBilling->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_UnitBasedBilling" name="x_UnitBasedBilling" id="x_UnitBasedBilling" size="30" placeholder="<?= HtmlEncode($Page->UnitBasedBilling->getPlaceHolder()) ?>" value="<?= $Page->UnitBasedBilling->EditValue ?>"<?= $Page->UnitBasedBilling->editAttributes() ?> aria-describedby="x_UnitBasedBilling_help">
<?= $Page->UnitBasedBilling->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UnitBasedBilling->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
    <div id="r_DoNotCheckStock" class="form-group row">
        <label id="elh_pharmacy_products_DoNotCheckStock" for="x_DoNotCheckStock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DoNotCheckStock->caption() ?><?= $Page->DoNotCheckStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoNotCheckStock->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckStock">
<input type="<?= $Page->DoNotCheckStock->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DoNotCheckStock" name="x_DoNotCheckStock" id="x_DoNotCheckStock" size="30" placeholder="<?= HtmlEncode($Page->DoNotCheckStock->getPlaceHolder()) ?>" value="<?= $Page->DoNotCheckStock->EditValue ?>"<?= $Page->DoNotCheckStock->editAttributes() ?> aria-describedby="x_DoNotCheckStock_help">
<?= $Page->DoNotCheckStock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoNotCheckStock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AcceptRate->Visible) { // AcceptRate ?>
    <div id="r_AcceptRate" class="form-group row">
        <label id="elh_pharmacy_products_AcceptRate" for="x_AcceptRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AcceptRate->caption() ?><?= $Page->AcceptRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AcceptRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRate">
<input type="<?= $Page->AcceptRate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AcceptRate" name="x_AcceptRate" id="x_AcceptRate" size="30" placeholder="<?= HtmlEncode($Page->AcceptRate->getPlaceHolder()) ?>" value="<?= $Page->AcceptRate->EditValue ?>"<?= $Page->AcceptRate->editAttributes() ?> aria-describedby="x_AcceptRate_help">
<?= $Page->AcceptRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AcceptRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PriceLevel->Visible) { // PriceLevel ?>
    <div id="r_PriceLevel" class="form-group row">
        <label id="elh_pharmacy_products_PriceLevel" for="x_PriceLevel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PriceLevel->caption() ?><?= $Page->PriceLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PriceLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceLevel">
<input type="<?= $Page->PriceLevel->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PriceLevel" name="x_PriceLevel" id="x_PriceLevel" size="30" placeholder="<?= HtmlEncode($Page->PriceLevel->getPlaceHolder()) ?>" value="<?= $Page->PriceLevel->EditValue ?>"<?= $Page->PriceLevel->editAttributes() ?> aria-describedby="x_PriceLevel_help">
<?= $Page->PriceLevel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PriceLevel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LastQuotePrice->Visible) { // LastQuotePrice ?>
    <div id="r_LastQuotePrice" class="form-group row">
        <label id="elh_pharmacy_products_LastQuotePrice" for="x_LastQuotePrice" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LastQuotePrice->caption() ?><?= $Page->LastQuotePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LastQuotePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_LastQuotePrice">
<input type="<?= $Page->LastQuotePrice->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_LastQuotePrice" name="x_LastQuotePrice" id="x_LastQuotePrice" size="30" placeholder="<?= HtmlEncode($Page->LastQuotePrice->getPlaceHolder()) ?>" value="<?= $Page->LastQuotePrice->EditValue ?>"<?= $Page->LastQuotePrice->editAttributes() ?> aria-describedby="x_LastQuotePrice_help">
<?= $Page->LastQuotePrice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LastQuotePrice->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PriceChange->Visible) { // PriceChange ?>
    <div id="r_PriceChange" class="form-group row">
        <label id="elh_pharmacy_products_PriceChange" for="x_PriceChange" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PriceChange->caption() ?><?= $Page->PriceChange->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PriceChange->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceChange">
<input type="<?= $Page->PriceChange->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PriceChange" name="x_PriceChange" id="x_PriceChange" size="30" placeholder="<?= HtmlEncode($Page->PriceChange->getPlaceHolder()) ?>" value="<?= $Page->PriceChange->EditValue ?>"<?= $Page->PriceChange->editAttributes() ?> aria-describedby="x_PriceChange_help">
<?= $Page->PriceChange->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PriceChange->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CommodityCode->Visible) { // CommodityCode ?>
    <div id="r_CommodityCode" class="form-group row">
        <label id="elh_pharmacy_products_CommodityCode" for="x_CommodityCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CommodityCode->caption() ?><?= $Page->CommodityCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CommodityCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CommodityCode">
<input type="<?= $Page->CommodityCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CommodityCode" name="x_CommodityCode" id="x_CommodityCode" size="30" maxlength="25" placeholder="<?= HtmlEncode($Page->CommodityCode->getPlaceHolder()) ?>" value="<?= $Page->CommodityCode->EditValue ?>"<?= $Page->CommodityCode->editAttributes() ?> aria-describedby="x_CommodityCode_help">
<?= $Page->CommodityCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CommodityCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InstitutePrice->Visible) { // InstitutePrice ?>
    <div id="r_InstitutePrice" class="form-group row">
        <label id="elh_pharmacy_products_InstitutePrice" for="x_InstitutePrice" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InstitutePrice->caption() ?><?= $Page->InstitutePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InstitutePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_InstitutePrice">
<input type="<?= $Page->InstitutePrice->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_InstitutePrice" name="x_InstitutePrice" id="x_InstitutePrice" size="30" placeholder="<?= HtmlEncode($Page->InstitutePrice->getPlaceHolder()) ?>" value="<?= $Page->InstitutePrice->EditValue ?>"<?= $Page->InstitutePrice->editAttributes() ?> aria-describedby="x_InstitutePrice_help">
<?= $Page->InstitutePrice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InstitutePrice->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
    <div id="r_CtrlOrDCtrlProduct" class="form-group row">
        <label id="elh_pharmacy_products_CtrlOrDCtrlProduct" for="x_CtrlOrDCtrlProduct" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CtrlOrDCtrlProduct->caption() ?><?= $Page->CtrlOrDCtrlProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_CtrlOrDCtrlProduct">
<input type="<?= $Page->CtrlOrDCtrlProduct->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CtrlOrDCtrlProduct" name="x_CtrlOrDCtrlProduct" id="x_CtrlOrDCtrlProduct" size="30" placeholder="<?= HtmlEncode($Page->CtrlOrDCtrlProduct->getPlaceHolder()) ?>" value="<?= $Page->CtrlOrDCtrlProduct->EditValue ?>"<?= $Page->CtrlOrDCtrlProduct->editAttributes() ?> aria-describedby="x_CtrlOrDCtrlProduct_help">
<?= $Page->CtrlOrDCtrlProduct->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CtrlOrDCtrlProduct->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ImportedDate->Visible) { // ImportedDate ?>
    <div id="r_ImportedDate" class="form-group row">
        <label id="elh_pharmacy_products_ImportedDate" for="x_ImportedDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ImportedDate->caption() ?><?= $Page->ImportedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ImportedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ImportedDate">
<input type="<?= $Page->ImportedDate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ImportedDate" name="x_ImportedDate" id="x_ImportedDate" placeholder="<?= HtmlEncode($Page->ImportedDate->getPlaceHolder()) ?>" value="<?= $Page->ImportedDate->EditValue ?>"<?= $Page->ImportedDate->editAttributes() ?> aria-describedby="x_ImportedDate_help">
<?= $Page->ImportedDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ImportedDate->getErrorMessage() ?></div>
<?php if (!$Page->ImportedDate->ReadOnly && !$Page->ImportedDate->Disabled && !isset($Page->ImportedDate->EditAttrs["readonly"]) && !isset($Page->ImportedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_ImportedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsImported->Visible) { // IsImported ?>
    <div id="r_IsImported" class="form-group row">
        <label id="elh_pharmacy_products_IsImported" for="x_IsImported" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IsImported->caption() ?><?= $Page->IsImported->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsImported->cellAttributes() ?>>
<span id="el_pharmacy_products_IsImported">
<input type="<?= $Page->IsImported->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IsImported" name="x_IsImported" id="x_IsImported" size="30" placeholder="<?= HtmlEncode($Page->IsImported->getPlaceHolder()) ?>" value="<?= $Page->IsImported->EditValue ?>"<?= $Page->IsImported->editAttributes() ?> aria-describedby="x_IsImported_help">
<?= $Page->IsImported->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsImported->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FileName->Visible) { // FileName ?>
    <div id="r_FileName" class="form-group row">
        <label id="elh_pharmacy_products_FileName" for="x_FileName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FileName->caption() ?><?= $Page->FileName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FileName->cellAttributes() ?>>
<span id="el_pharmacy_products_FileName">
<input type="<?= $Page->FileName->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FileName" name="x_FileName" id="x_FileName" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->FileName->getPlaceHolder()) ?>" value="<?= $Page->FileName->EditValue ?>"<?= $Page->FileName->editAttributes() ?> aria-describedby="x_FileName_help">
<?= $Page->FileName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FileName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LPName->Visible) { // LPName ?>
    <div id="r_LPName" class="form-group row">
        <label id="elh_pharmacy_products_LPName" for="x_LPName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LPName->caption() ?><?= $Page->LPName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LPName->cellAttributes() ?>>
<span id="el_pharmacy_products_LPName">
<textarea data-table="pharmacy_products" data-field="x_LPName" name="x_LPName" id="x_LPName" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->LPName->getPlaceHolder()) ?>"<?= $Page->LPName->editAttributes() ?> aria-describedby="x_LPName_help"><?= $Page->LPName->EditValue ?></textarea>
<?= $Page->LPName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LPName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GodownNumber->Visible) { // GodownNumber ?>
    <div id="r_GodownNumber" class="form-group row">
        <label id="elh_pharmacy_products_GodownNumber" for="x_GodownNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GodownNumber->caption() ?><?= $Page->GodownNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GodownNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_GodownNumber">
<input type="<?= $Page->GodownNumber->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_GodownNumber" name="x_GodownNumber" id="x_GodownNumber" size="30" placeholder="<?= HtmlEncode($Page->GodownNumber->getPlaceHolder()) ?>" value="<?= $Page->GodownNumber->EditValue ?>"<?= $Page->GodownNumber->editAttributes() ?> aria-describedby="x_GodownNumber_help">
<?= $Page->GodownNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GodownNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreationDate->Visible) { // CreationDate ?>
    <div id="r_CreationDate" class="form-group row">
        <label id="elh_pharmacy_products_CreationDate" for="x_CreationDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreationDate->caption() ?><?= $Page->CreationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreationDate->cellAttributes() ?>>
<span id="el_pharmacy_products_CreationDate">
<input type="<?= $Page->CreationDate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CreationDate" name="x_CreationDate" id="x_CreationDate" placeholder="<?= HtmlEncode($Page->CreationDate->getPlaceHolder()) ?>" value="<?= $Page->CreationDate->EditValue ?>"<?= $Page->CreationDate->editAttributes() ?> aria-describedby="x_CreationDate_help">
<?= $Page->CreationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreationDate->getErrorMessage() ?></div>
<?php if (!$Page->CreationDate->ReadOnly && !$Page->CreationDate->Disabled && !isset($Page->CreationDate->EditAttrs["readonly"]) && !isset($Page->CreationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_CreationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedbyUser->Visible) { // CreatedbyUser ?>
    <div id="r_CreatedbyUser" class="form-group row">
        <label id="elh_pharmacy_products_CreatedbyUser" for="x_CreatedbyUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedbyUser->caption() ?><?= $Page->CreatedbyUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_CreatedbyUser">
<input type="<?= $Page->CreatedbyUser->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CreatedbyUser" name="x_CreatedbyUser" id="x_CreatedbyUser" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CreatedbyUser->getPlaceHolder()) ?>" value="<?= $Page->CreatedbyUser->EditValue ?>"<?= $Page->CreatedbyUser->editAttributes() ?> aria-describedby="x_CreatedbyUser_help">
<?= $Page->CreatedbyUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedbyUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDate->Visible) { // ModifiedDate ?>
    <div id="r_ModifiedDate" class="form-group row">
        <label id="elh_pharmacy_products_ModifiedDate" for="x_ModifiedDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedDate->caption() ?><?= $Page->ModifiedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedDate">
<input type="<?= $Page->ModifiedDate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ModifiedDate" name="x_ModifiedDate" id="x_ModifiedDate" placeholder="<?= HtmlEncode($Page->ModifiedDate->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDate->EditValue ?>"<?= $Page->ModifiedDate->editAttributes() ?> aria-describedby="x_ModifiedDate_help">
<?= $Page->ModifiedDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedDate->getErrorMessage() ?></div>
<?php if (!$Page->ModifiedDate->ReadOnly && !$Page->ModifiedDate->Disabled && !isset($Page->ModifiedDate->EditAttrs["readonly"]) && !isset($Page->ModifiedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_ModifiedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
    <div id="r_ModifiedbyUser" class="form-group row">
        <label id="elh_pharmacy_products_ModifiedbyUser" for="x_ModifiedbyUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedbyUser->caption() ?><?= $Page->ModifiedbyUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedbyUser">
<input type="<?= $Page->ModifiedbyUser->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ModifiedbyUser" name="x_ModifiedbyUser" id="x_ModifiedbyUser" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ModifiedbyUser->getPlaceHolder()) ?>" value="<?= $Page->ModifiedbyUser->EditValue ?>"<?= $Page->ModifiedbyUser->editAttributes() ?> aria-describedby="x_ModifiedbyUser_help">
<?= $Page->ModifiedbyUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedbyUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->isActive->Visible) { // isActive ?>
    <div id="r_isActive" class="form-group row">
        <label id="elh_pharmacy_products_isActive" for="x_isActive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->isActive->caption() ?><?= $Page->isActive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->isActive->cellAttributes() ?>>
<span id="el_pharmacy_products_isActive">
<input type="<?= $Page->isActive->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_isActive" name="x_isActive" id="x_isActive" size="30" placeholder="<?= HtmlEncode($Page->isActive->getPlaceHolder()) ?>" value="<?= $Page->isActive->EditValue ?>"<?= $Page->isActive->editAttributes() ?> aria-describedby="x_isActive_help">
<?= $Page->isActive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->isActive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
    <div id="r_AllowExpiryClaim" class="form-group row">
        <label id="elh_pharmacy_products_AllowExpiryClaim" for="x_AllowExpiryClaim" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AllowExpiryClaim->caption() ?><?= $Page->AllowExpiryClaim->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AllowExpiryClaim->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryClaim">
<input type="<?= $Page->AllowExpiryClaim->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AllowExpiryClaim" name="x_AllowExpiryClaim" id="x_AllowExpiryClaim" size="30" placeholder="<?= HtmlEncode($Page->AllowExpiryClaim->getPlaceHolder()) ?>" value="<?= $Page->AllowExpiryClaim->EditValue ?>"<?= $Page->AllowExpiryClaim->editAttributes() ?> aria-describedby="x_AllowExpiryClaim_help">
<?= $Page->AllowExpiryClaim->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AllowExpiryClaim->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BrandCode->Visible) { // BrandCode ?>
    <div id="r_BrandCode" class="form-group row">
        <label id="elh_pharmacy_products_BrandCode" for="x_BrandCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BrandCode->caption() ?><?= $Page->BrandCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BrandCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BrandCode">
<input type="<?= $Page->BrandCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BrandCode" name="x_BrandCode" id="x_BrandCode" size="30" placeholder="<?= HtmlEncode($Page->BrandCode->getPlaceHolder()) ?>" value="<?= $Page->BrandCode->EditValue ?>"<?= $Page->BrandCode->editAttributes() ?> aria-describedby="x_BrandCode_help">
<?= $Page->BrandCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BrandCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
    <div id="r_FreeSchemeBasedon" class="form-group row">
        <label id="elh_pharmacy_products_FreeSchemeBasedon" for="x_FreeSchemeBasedon" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FreeSchemeBasedon->caption() ?><?= $Page->FreeSchemeBasedon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeSchemeBasedon">
<input type="<?= $Page->FreeSchemeBasedon->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FreeSchemeBasedon" name="x_FreeSchemeBasedon" id="x_FreeSchemeBasedon" size="30" placeholder="<?= HtmlEncode($Page->FreeSchemeBasedon->getPlaceHolder()) ?>" value="<?= $Page->FreeSchemeBasedon->EditValue ?>"<?= $Page->FreeSchemeBasedon->editAttributes() ?> aria-describedby="x_FreeSchemeBasedon_help">
<?= $Page->FreeSchemeBasedon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FreeSchemeBasedon->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
    <div id="r_DoNotCheckCostInBill" class="form-group row">
        <label id="elh_pharmacy_products_DoNotCheckCostInBill" for="x_DoNotCheckCostInBill" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DoNotCheckCostInBill->caption() ?><?= $Page->DoNotCheckCostInBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckCostInBill">
<input type="<?= $Page->DoNotCheckCostInBill->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DoNotCheckCostInBill" name="x_DoNotCheckCostInBill" id="x_DoNotCheckCostInBill" size="30" placeholder="<?= HtmlEncode($Page->DoNotCheckCostInBill->getPlaceHolder()) ?>" value="<?= $Page->DoNotCheckCostInBill->EditValue ?>"<?= $Page->DoNotCheckCostInBill->editAttributes() ?> aria-describedby="x_DoNotCheckCostInBill_help">
<?= $Page->DoNotCheckCostInBill->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoNotCheckCostInBill->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductGroupCode->Visible) { // ProductGroupCode ?>
    <div id="r_ProductGroupCode" class="form-group row">
        <label id="elh_pharmacy_products_ProductGroupCode" for="x_ProductGroupCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductGroupCode->caption() ?><?= $Page->ProductGroupCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductGroupCode">
<input type="<?= $Page->ProductGroupCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductGroupCode" name="x_ProductGroupCode" id="x_ProductGroupCode" size="30" placeholder="<?= HtmlEncode($Page->ProductGroupCode->getPlaceHolder()) ?>" value="<?= $Page->ProductGroupCode->EditValue ?>"<?= $Page->ProductGroupCode->editAttributes() ?> aria-describedby="x_ProductGroupCode_help">
<?= $Page->ProductGroupCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductGroupCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
    <div id="r_ProductStrengthCode" class="form-group row">
        <label id="elh_pharmacy_products_ProductStrengthCode" for="x_ProductStrengthCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductStrengthCode->caption() ?><?= $Page->ProductStrengthCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductStrengthCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductStrengthCode">
<input type="<?= $Page->ProductStrengthCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductStrengthCode" name="x_ProductStrengthCode" id="x_ProductStrengthCode" size="30" placeholder="<?= HtmlEncode($Page->ProductStrengthCode->getPlaceHolder()) ?>" value="<?= $Page->ProductStrengthCode->EditValue ?>"<?= $Page->ProductStrengthCode->editAttributes() ?> aria-describedby="x_ProductStrengthCode_help">
<?= $Page->ProductStrengthCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductStrengthCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PackingCode->Visible) { // PackingCode ?>
    <div id="r_PackingCode" class="form-group row">
        <label id="elh_pharmacy_products_PackingCode" for="x_PackingCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PackingCode->caption() ?><?= $Page->PackingCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PackingCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PackingCode">
<input type="<?= $Page->PackingCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PackingCode" name="x_PackingCode" id="x_PackingCode" size="30" placeholder="<?= HtmlEncode($Page->PackingCode->getPlaceHolder()) ?>" value="<?= $Page->PackingCode->EditValue ?>"<?= $Page->PackingCode->editAttributes() ?> aria-describedby="x_PackingCode_help">
<?= $Page->PackingCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PackingCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ComputedMinStock->Visible) { // ComputedMinStock ?>
    <div id="r_ComputedMinStock" class="form-group row">
        <label id="elh_pharmacy_products_ComputedMinStock" for="x_ComputedMinStock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ComputedMinStock->caption() ?><?= $Page->ComputedMinStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ComputedMinStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMinStock">
<input type="<?= $Page->ComputedMinStock->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ComputedMinStock" name="x_ComputedMinStock" id="x_ComputedMinStock" size="30" placeholder="<?= HtmlEncode($Page->ComputedMinStock->getPlaceHolder()) ?>" value="<?= $Page->ComputedMinStock->EditValue ?>"<?= $Page->ComputedMinStock->editAttributes() ?> aria-describedby="x_ComputedMinStock_help">
<?= $Page->ComputedMinStock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ComputedMinStock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
    <div id="r_ComputedMaxStock" class="form-group row">
        <label id="elh_pharmacy_products_ComputedMaxStock" for="x_ComputedMaxStock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ComputedMaxStock->caption() ?><?= $Page->ComputedMaxStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ComputedMaxStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMaxStock">
<input type="<?= $Page->ComputedMaxStock->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ComputedMaxStock" name="x_ComputedMaxStock" id="x_ComputedMaxStock" size="30" placeholder="<?= HtmlEncode($Page->ComputedMaxStock->getPlaceHolder()) ?>" value="<?= $Page->ComputedMaxStock->EditValue ?>"<?= $Page->ComputedMaxStock->editAttributes() ?> aria-describedby="x_ComputedMaxStock_help">
<?= $Page->ComputedMaxStock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ComputedMaxStock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductRemark->Visible) { // ProductRemark ?>
    <div id="r_ProductRemark" class="form-group row">
        <label id="elh_pharmacy_products_ProductRemark" for="x_ProductRemark" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductRemark->caption() ?><?= $Page->ProductRemark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductRemark->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductRemark">
<input type="<?= $Page->ProductRemark->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductRemark" name="x_ProductRemark" id="x_ProductRemark" size="30" placeholder="<?= HtmlEncode($Page->ProductRemark->getPlaceHolder()) ?>" value="<?= $Page->ProductRemark->EditValue ?>"<?= $Page->ProductRemark->editAttributes() ?> aria-describedby="x_ProductRemark_help">
<?= $Page->ProductRemark->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductRemark->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductDrugCode->Visible) { // ProductDrugCode ?>
    <div id="r_ProductDrugCode" class="form-group row">
        <label id="elh_pharmacy_products_ProductDrugCode" for="x_ProductDrugCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductDrugCode->caption() ?><?= $Page->ProductDrugCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductDrugCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDrugCode">
<input type="<?= $Page->ProductDrugCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductDrugCode" name="x_ProductDrugCode" id="x_ProductDrugCode" size="30" placeholder="<?= HtmlEncode($Page->ProductDrugCode->getPlaceHolder()) ?>" value="<?= $Page->ProductDrugCode->EditValue ?>"<?= $Page->ProductDrugCode->editAttributes() ?> aria-describedby="x_ProductDrugCode_help">
<?= $Page->ProductDrugCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductDrugCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
    <div id="r_IsMatrixProduct" class="form-group row">
        <label id="elh_pharmacy_products_IsMatrixProduct" for="x_IsMatrixProduct" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IsMatrixProduct->caption() ?><?= $Page->IsMatrixProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsMatrixProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMatrixProduct">
<input type="<?= $Page->IsMatrixProduct->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IsMatrixProduct" name="x_IsMatrixProduct" id="x_IsMatrixProduct" size="30" placeholder="<?= HtmlEncode($Page->IsMatrixProduct->getPlaceHolder()) ?>" value="<?= $Page->IsMatrixProduct->EditValue ?>"<?= $Page->IsMatrixProduct->editAttributes() ?> aria-describedby="x_IsMatrixProduct_help">
<?= $Page->IsMatrixProduct->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsMatrixProduct->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount1->Visible) { // AttributeCount1 ?>
    <div id="r_AttributeCount1" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount1" for="x_AttributeCount1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount1->caption() ?><?= $Page->AttributeCount1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount1->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount1">
<input type="<?= $Page->AttributeCount1->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount1" name="x_AttributeCount1" id="x_AttributeCount1" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount1->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount1->EditValue ?>"<?= $Page->AttributeCount1->editAttributes() ?> aria-describedby="x_AttributeCount1_help">
<?= $Page->AttributeCount1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount2->Visible) { // AttributeCount2 ?>
    <div id="r_AttributeCount2" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount2" for="x_AttributeCount2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount2->caption() ?><?= $Page->AttributeCount2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount2->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount2">
<input type="<?= $Page->AttributeCount2->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount2" name="x_AttributeCount2" id="x_AttributeCount2" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount2->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount2->EditValue ?>"<?= $Page->AttributeCount2->editAttributes() ?> aria-describedby="x_AttributeCount2_help">
<?= $Page->AttributeCount2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount3->Visible) { // AttributeCount3 ?>
    <div id="r_AttributeCount3" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount3" for="x_AttributeCount3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount3->caption() ?><?= $Page->AttributeCount3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount3->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount3">
<input type="<?= $Page->AttributeCount3->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount3" name="x_AttributeCount3" id="x_AttributeCount3" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount3->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount3->EditValue ?>"<?= $Page->AttributeCount3->editAttributes() ?> aria-describedby="x_AttributeCount3_help">
<?= $Page->AttributeCount3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount4->Visible) { // AttributeCount4 ?>
    <div id="r_AttributeCount4" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount4" for="x_AttributeCount4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount4->caption() ?><?= $Page->AttributeCount4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount4->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount4">
<input type="<?= $Page->AttributeCount4->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount4" name="x_AttributeCount4" id="x_AttributeCount4" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount4->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount4->EditValue ?>"<?= $Page->AttributeCount4->editAttributes() ?> aria-describedby="x_AttributeCount4_help">
<?= $Page->AttributeCount4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount5->Visible) { // AttributeCount5 ?>
    <div id="r_AttributeCount5" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount5" for="x_AttributeCount5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount5->caption() ?><?= $Page->AttributeCount5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount5->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount5">
<input type="<?= $Page->AttributeCount5->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount5" name="x_AttributeCount5" id="x_AttributeCount5" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount5->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount5->EditValue ?>"<?= $Page->AttributeCount5->editAttributes() ?> aria-describedby="x_AttributeCount5_help">
<?= $Page->AttributeCount5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
    <div id="r_DefaultDiscountPercentage" class="form-group row">
        <label id="elh_pharmacy_products_DefaultDiscountPercentage" for="x_DefaultDiscountPercentage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DefaultDiscountPercentage->caption() ?><?= $Page->DefaultDiscountPercentage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultDiscountPercentage">
<input type="<?= $Page->DefaultDiscountPercentage->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DefaultDiscountPercentage" name="x_DefaultDiscountPercentage" id="x_DefaultDiscountPercentage" size="30" placeholder="<?= HtmlEncode($Page->DefaultDiscountPercentage->getPlaceHolder()) ?>" value="<?= $Page->DefaultDiscountPercentage->EditValue ?>"<?= $Page->DefaultDiscountPercentage->editAttributes() ?> aria-describedby="x_DefaultDiscountPercentage_help">
<?= $Page->DefaultDiscountPercentage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DefaultDiscountPercentage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
    <div id="r_DonotPrintBarcode" class="form-group row">
        <label id="elh_pharmacy_products_DonotPrintBarcode" for="x_DonotPrintBarcode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DonotPrintBarcode->caption() ?><?= $Page->DonotPrintBarcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DonotPrintBarcode->cellAttributes() ?>>
<span id="el_pharmacy_products_DonotPrintBarcode">
<input type="<?= $Page->DonotPrintBarcode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DonotPrintBarcode" name="x_DonotPrintBarcode" id="x_DonotPrintBarcode" size="30" placeholder="<?= HtmlEncode($Page->DonotPrintBarcode->getPlaceHolder()) ?>" value="<?= $Page->DonotPrintBarcode->EditValue ?>"<?= $Page->DonotPrintBarcode->editAttributes() ?> aria-describedby="x_DonotPrintBarcode_help">
<?= $Page->DonotPrintBarcode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DonotPrintBarcode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
    <div id="r_ProductLevelDiscount" class="form-group row">
        <label id="elh_pharmacy_products_ProductLevelDiscount" for="x_ProductLevelDiscount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductLevelDiscount->caption() ?><?= $Page->ProductLevelDiscount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductLevelDiscount->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLevelDiscount">
<input type="<?= $Page->ProductLevelDiscount->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductLevelDiscount" name="x_ProductLevelDiscount" id="x_ProductLevelDiscount" size="30" placeholder="<?= HtmlEncode($Page->ProductLevelDiscount->getPlaceHolder()) ?>" value="<?= $Page->ProductLevelDiscount->EditValue ?>"<?= $Page->ProductLevelDiscount->editAttributes() ?> aria-describedby="x_ProductLevelDiscount_help">
<?= $Page->ProductLevelDiscount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductLevelDiscount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Markup->Visible) { // Markup ?>
    <div id="r_Markup" class="form-group row">
        <label id="elh_pharmacy_products_Markup" for="x_Markup" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Markup->caption() ?><?= $Page->Markup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Markup->cellAttributes() ?>>
<span id="el_pharmacy_products_Markup">
<input type="<?= $Page->Markup->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Markup" name="x_Markup" id="x_Markup" size="30" placeholder="<?= HtmlEncode($Page->Markup->getPlaceHolder()) ?>" value="<?= $Page->Markup->EditValue ?>"<?= $Page->Markup->editAttributes() ?> aria-describedby="x_Markup_help">
<?= $Page->Markup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Markup->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MarkDown->Visible) { // MarkDown ?>
    <div id="r_MarkDown" class="form-group row">
        <label id="elh_pharmacy_products_MarkDown" for="x_MarkDown" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MarkDown->caption() ?><?= $Page->MarkDown->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MarkDown->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDown">
<input type="<?= $Page->MarkDown->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MarkDown" name="x_MarkDown" id="x_MarkDown" size="30" placeholder="<?= HtmlEncode($Page->MarkDown->getPlaceHolder()) ?>" value="<?= $Page->MarkDown->EditValue ?>"<?= $Page->MarkDown->editAttributes() ?> aria-describedby="x_MarkDown_help">
<?= $Page->MarkDown->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MarkDown->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
    <div id="r_ReworkSalePrice" class="form-group row">
        <label id="elh_pharmacy_products_ReworkSalePrice" for="x_ReworkSalePrice" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReworkSalePrice->caption() ?><?= $Page->ReworkSalePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReworkSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_ReworkSalePrice">
<input type="<?= $Page->ReworkSalePrice->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ReworkSalePrice" name="x_ReworkSalePrice" id="x_ReworkSalePrice" size="30" placeholder="<?= HtmlEncode($Page->ReworkSalePrice->getPlaceHolder()) ?>" value="<?= $Page->ReworkSalePrice->EditValue ?>"<?= $Page->ReworkSalePrice->editAttributes() ?> aria-describedby="x_ReworkSalePrice_help">
<?= $Page->ReworkSalePrice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReworkSalePrice->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MultipleInput->Visible) { // MultipleInput ?>
    <div id="r_MultipleInput" class="form-group row">
        <label id="elh_pharmacy_products_MultipleInput" for="x_MultipleInput" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MultipleInput->caption() ?><?= $Page->MultipleInput->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MultipleInput->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleInput">
<input type="<?= $Page->MultipleInput->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MultipleInput" name="x_MultipleInput" id="x_MultipleInput" size="30" placeholder="<?= HtmlEncode($Page->MultipleInput->getPlaceHolder()) ?>" value="<?= $Page->MultipleInput->EditValue ?>"<?= $Page->MultipleInput->editAttributes() ?> aria-describedby="x_MultipleInput_help">
<?= $Page->MultipleInput->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MultipleInput->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LpPackageInformation->Visible) { // LpPackageInformation ?>
    <div id="r_LpPackageInformation" class="form-group row">
        <label id="elh_pharmacy_products_LpPackageInformation" for="x_LpPackageInformation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LpPackageInformation->caption() ?><?= $Page->LpPackageInformation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LpPackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_LpPackageInformation">
<input type="<?= $Page->LpPackageInformation->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_LpPackageInformation" name="x_LpPackageInformation" id="x_LpPackageInformation" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->LpPackageInformation->getPlaceHolder()) ?>" value="<?= $Page->LpPackageInformation->EditValue ?>"<?= $Page->LpPackageInformation->editAttributes() ?> aria-describedby="x_LpPackageInformation_help">
<?= $Page->LpPackageInformation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LpPackageInformation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
    <div id="r_AllowNegativeStock" class="form-group row">
        <label id="elh_pharmacy_products_AllowNegativeStock" for="x_AllowNegativeStock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AllowNegativeStock->caption() ?><?= $Page->AllowNegativeStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AllowNegativeStock->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowNegativeStock">
<input type="<?= $Page->AllowNegativeStock->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AllowNegativeStock" name="x_AllowNegativeStock" id="x_AllowNegativeStock" size="30" placeholder="<?= HtmlEncode($Page->AllowNegativeStock->getPlaceHolder()) ?>" value="<?= $Page->AllowNegativeStock->EditValue ?>"<?= $Page->AllowNegativeStock->editAttributes() ?> aria-describedby="x_AllowNegativeStock_help">
<?= $Page->AllowNegativeStock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AllowNegativeStock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OrderDate->Visible) { // OrderDate ?>
    <div id="r_OrderDate" class="form-group row">
        <label id="elh_pharmacy_products_OrderDate" for="x_OrderDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OrderDate->caption() ?><?= $Page->OrderDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderDate">
<input type="<?= $Page->OrderDate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_OrderDate" name="x_OrderDate" id="x_OrderDate" placeholder="<?= HtmlEncode($Page->OrderDate->getPlaceHolder()) ?>" value="<?= $Page->OrderDate->EditValue ?>"<?= $Page->OrderDate->editAttributes() ?> aria-describedby="x_OrderDate_help">
<?= $Page->OrderDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OrderDate->getErrorMessage() ?></div>
<?php if (!$Page->OrderDate->ReadOnly && !$Page->OrderDate->Disabled && !isset($Page->OrderDate->EditAttrs["readonly"]) && !isset($Page->OrderDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_OrderDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OrderTime->Visible) { // OrderTime ?>
    <div id="r_OrderTime" class="form-group row">
        <label id="elh_pharmacy_products_OrderTime" for="x_OrderTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OrderTime->caption() ?><?= $Page->OrderTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OrderTime->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderTime">
<input type="<?= $Page->OrderTime->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_OrderTime" name="x_OrderTime" id="x_OrderTime" placeholder="<?= HtmlEncode($Page->OrderTime->getPlaceHolder()) ?>" value="<?= $Page->OrderTime->EditValue ?>"<?= $Page->OrderTime->editAttributes() ?> aria-describedby="x_OrderTime_help">
<?= $Page->OrderTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OrderTime->getErrorMessage() ?></div>
<?php if (!$Page->OrderTime->ReadOnly && !$Page->OrderTime->Disabled && !isset($Page->OrderTime->EditAttrs["readonly"]) && !isset($Page->OrderTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_OrderTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RateGroupCode->Visible) { // RateGroupCode ?>
    <div id="r_RateGroupCode" class="form-group row">
        <label id="elh_pharmacy_products_RateGroupCode" for="x_RateGroupCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RateGroupCode->caption() ?><?= $Page->RateGroupCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RateGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RateGroupCode">
<input type="<?= $Page->RateGroupCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_RateGroupCode" name="x_RateGroupCode" id="x_RateGroupCode" size="30" placeholder="<?= HtmlEncode($Page->RateGroupCode->getPlaceHolder()) ?>" value="<?= $Page->RateGroupCode->EditValue ?>"<?= $Page->RateGroupCode->editAttributes() ?> aria-describedby="x_RateGroupCode_help">
<?= $Page->RateGroupCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RateGroupCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
    <div id="r_ConversionCaseLot" class="form-group row">
        <label id="elh_pharmacy_products_ConversionCaseLot" for="x_ConversionCaseLot" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ConversionCaseLot->caption() ?><?= $Page->ConversionCaseLot->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ConversionCaseLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ConversionCaseLot">
<input type="<?= $Page->ConversionCaseLot->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ConversionCaseLot" name="x_ConversionCaseLot" id="x_ConversionCaseLot" size="30" placeholder="<?= HtmlEncode($Page->ConversionCaseLot->getPlaceHolder()) ?>" value="<?= $Page->ConversionCaseLot->EditValue ?>"<?= $Page->ConversionCaseLot->editAttributes() ?> aria-describedby="x_ConversionCaseLot_help">
<?= $Page->ConversionCaseLot->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ConversionCaseLot->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ShippingLot->Visible) { // ShippingLot ?>
    <div id="r_ShippingLot" class="form-group row">
        <label id="elh_pharmacy_products_ShippingLot" for="x_ShippingLot" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ShippingLot->caption() ?><?= $Page->ShippingLot->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ShippingLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ShippingLot">
<input type="<?= $Page->ShippingLot->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ShippingLot" name="x_ShippingLot" id="x_ShippingLot" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ShippingLot->getPlaceHolder()) ?>" value="<?= $Page->ShippingLot->EditValue ?>"<?= $Page->ShippingLot->editAttributes() ?> aria-describedby="x_ShippingLot_help">
<?= $Page->ShippingLot->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ShippingLot->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
    <div id="r_AllowExpiryReplacement" class="form-group row">
        <label id="elh_pharmacy_products_AllowExpiryReplacement" for="x_AllowExpiryReplacement" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AllowExpiryReplacement->caption() ?><?= $Page->AllowExpiryReplacement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryReplacement">
<input type="<?= $Page->AllowExpiryReplacement->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AllowExpiryReplacement" name="x_AllowExpiryReplacement" id="x_AllowExpiryReplacement" size="30" placeholder="<?= HtmlEncode($Page->AllowExpiryReplacement->getPlaceHolder()) ?>" value="<?= $Page->AllowExpiryReplacement->EditValue ?>"<?= $Page->AllowExpiryReplacement->editAttributes() ?> aria-describedby="x_AllowExpiryReplacement_help">
<?= $Page->AllowExpiryReplacement->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AllowExpiryReplacement->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
    <div id="r_NoOfMonthExpiryAllowed" class="form-group row">
        <label id="elh_pharmacy_products_NoOfMonthExpiryAllowed" for="x_NoOfMonthExpiryAllowed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoOfMonthExpiryAllowed->caption() ?><?= $Page->NoOfMonthExpiryAllowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el_pharmacy_products_NoOfMonthExpiryAllowed">
<input type="<?= $Page->NoOfMonthExpiryAllowed->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_NoOfMonthExpiryAllowed" name="x_NoOfMonthExpiryAllowed" id="x_NoOfMonthExpiryAllowed" size="30" placeholder="<?= HtmlEncode($Page->NoOfMonthExpiryAllowed->getPlaceHolder()) ?>" value="<?= $Page->NoOfMonthExpiryAllowed->EditValue ?>"<?= $Page->NoOfMonthExpiryAllowed->editAttributes() ?> aria-describedby="x_NoOfMonthExpiryAllowed_help">
<?= $Page->NoOfMonthExpiryAllowed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfMonthExpiryAllowed->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
    <div id="r_ProductDiscountEligibility" class="form-group row">
        <label id="elh_pharmacy_products_ProductDiscountEligibility" for="x_ProductDiscountEligibility" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductDiscountEligibility->caption() ?><?= $Page->ProductDiscountEligibility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDiscountEligibility">
<input type="<?= $Page->ProductDiscountEligibility->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductDiscountEligibility" name="x_ProductDiscountEligibility" id="x_ProductDiscountEligibility" size="30" placeholder="<?= HtmlEncode($Page->ProductDiscountEligibility->getPlaceHolder()) ?>" value="<?= $Page->ProductDiscountEligibility->EditValue ?>"<?= $Page->ProductDiscountEligibility->editAttributes() ?> aria-describedby="x_ProductDiscountEligibility_help">
<?= $Page->ProductDiscountEligibility->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductDiscountEligibility->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
    <div id="r_ScheduleTypeCode" class="form-group row">
        <label id="elh_pharmacy_products_ScheduleTypeCode" for="x_ScheduleTypeCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ScheduleTypeCode->caption() ?><?= $Page->ScheduleTypeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ScheduleTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleTypeCode">
<input type="<?= $Page->ScheduleTypeCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ScheduleTypeCode" name="x_ScheduleTypeCode" id="x_ScheduleTypeCode" size="30" placeholder="<?= HtmlEncode($Page->ScheduleTypeCode->getPlaceHolder()) ?>" value="<?= $Page->ScheduleTypeCode->EditValue ?>"<?= $Page->ScheduleTypeCode->editAttributes() ?> aria-describedby="x_ScheduleTypeCode_help">
<?= $Page->ScheduleTypeCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ScheduleTypeCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
    <div id="r_AIOCDProductCode" class="form-group row">
        <label id="elh_pharmacy_products_AIOCDProductCode" for="x_AIOCDProductCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AIOCDProductCode->caption() ?><?= $Page->AIOCDProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AIOCDProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AIOCDProductCode">
<input type="<?= $Page->AIOCDProductCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AIOCDProductCode" name="x_AIOCDProductCode" id="x_AIOCDProductCode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AIOCDProductCode->getPlaceHolder()) ?>" value="<?= $Page->AIOCDProductCode->EditValue ?>"<?= $Page->AIOCDProductCode->editAttributes() ?> aria-describedby="x_AIOCDProductCode_help">
<?= $Page->AIOCDProductCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AIOCDProductCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeQuantity->Visible) { // FreeQuantity ?>
    <div id="r_FreeQuantity" class="form-group row">
        <label id="elh_pharmacy_products_FreeQuantity" for="x_FreeQuantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FreeQuantity->caption() ?><?= $Page->FreeQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeQuantity">
<input type="<?= $Page->FreeQuantity->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FreeQuantity" name="x_FreeQuantity" id="x_FreeQuantity" size="30" placeholder="<?= HtmlEncode($Page->FreeQuantity->getPlaceHolder()) ?>" value="<?= $Page->FreeQuantity->EditValue ?>"<?= $Page->FreeQuantity->editAttributes() ?> aria-describedby="x_FreeQuantity_help">
<?= $Page->FreeQuantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FreeQuantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountType->Visible) { // DiscountType ?>
    <div id="r_DiscountType" class="form-group row">
        <label id="elh_pharmacy_products_DiscountType" for="x_DiscountType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DiscountType->caption() ?><?= $Page->DiscountType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountType->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountType">
<input type="<?= $Page->DiscountType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DiscountType" name="x_DiscountType" id="x_DiscountType" size="30" placeholder="<?= HtmlEncode($Page->DiscountType->getPlaceHolder()) ?>" value="<?= $Page->DiscountType->EditValue ?>"<?= $Page->DiscountType->editAttributes() ?> aria-describedby="x_DiscountType_help">
<?= $Page->DiscountType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DiscountType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountValue->Visible) { // DiscountValue ?>
    <div id="r_DiscountValue" class="form-group row">
        <label id="elh_pharmacy_products_DiscountValue" for="x_DiscountValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DiscountValue->caption() ?><?= $Page->DiscountValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountValue->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountValue">
<input type="<?= $Page->DiscountValue->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DiscountValue" name="x_DiscountValue" id="x_DiscountValue" size="30" placeholder="<?= HtmlEncode($Page->DiscountValue->getPlaceHolder()) ?>" value="<?= $Page->DiscountValue->EditValue ?>"<?= $Page->DiscountValue->editAttributes() ?> aria-describedby="x_DiscountValue_help">
<?= $Page->DiscountValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DiscountValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
    <div id="r_HasProductOrderAttribute" class="form-group row">
        <label id="elh_pharmacy_products_HasProductOrderAttribute" for="x_HasProductOrderAttribute" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HasProductOrderAttribute->caption() ?><?= $Page->HasProductOrderAttribute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el_pharmacy_products_HasProductOrderAttribute">
<input type="<?= $Page->HasProductOrderAttribute->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_HasProductOrderAttribute" name="x_HasProductOrderAttribute" id="x_HasProductOrderAttribute" size="30" placeholder="<?= HtmlEncode($Page->HasProductOrderAttribute->getPlaceHolder()) ?>" value="<?= $Page->HasProductOrderAttribute->EditValue ?>"<?= $Page->HasProductOrderAttribute->editAttributes() ?> aria-describedby="x_HasProductOrderAttribute_help">
<?= $Page->HasProductOrderAttribute->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HasProductOrderAttribute->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FirstPODate->Visible) { // FirstPODate ?>
    <div id="r_FirstPODate" class="form-group row">
        <label id="elh_pharmacy_products_FirstPODate" for="x_FirstPODate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FirstPODate->caption() ?><?= $Page->FirstPODate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FirstPODate->cellAttributes() ?>>
<span id="el_pharmacy_products_FirstPODate">
<input type="<?= $Page->FirstPODate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FirstPODate" name="x_FirstPODate" id="x_FirstPODate" placeholder="<?= HtmlEncode($Page->FirstPODate->getPlaceHolder()) ?>" value="<?= $Page->FirstPODate->EditValue ?>"<?= $Page->FirstPODate->editAttributes() ?> aria-describedby="x_FirstPODate_help">
<?= $Page->FirstPODate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FirstPODate->getErrorMessage() ?></div>
<?php if (!$Page->FirstPODate->ReadOnly && !$Page->FirstPODate->Disabled && !isset($Page->FirstPODate->EditAttrs["readonly"]) && !isset($Page->FirstPODate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_FirstPODate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
    <div id="r_SaleprcieAndMrpCalcPercent" class="form-group row">
        <label id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" for="x_SaleprcieAndMrpCalcPercent" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SaleprcieAndMrpCalcPercent->caption() ?><?= $Page->SaleprcieAndMrpCalcPercent->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleprcieAndMrpCalcPercent">
<input type="<?= $Page->SaleprcieAndMrpCalcPercent->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SaleprcieAndMrpCalcPercent" name="x_SaleprcieAndMrpCalcPercent" id="x_SaleprcieAndMrpCalcPercent" size="30" placeholder="<?= HtmlEncode($Page->SaleprcieAndMrpCalcPercent->getPlaceHolder()) ?>" value="<?= $Page->SaleprcieAndMrpCalcPercent->EditValue ?>"<?= $Page->SaleprcieAndMrpCalcPercent->editAttributes() ?> aria-describedby="x_SaleprcieAndMrpCalcPercent_help">
<?= $Page->SaleprcieAndMrpCalcPercent->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SaleprcieAndMrpCalcPercent->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
    <div id="r_IsGiftVoucherProducts" class="form-group row">
        <label id="elh_pharmacy_products_IsGiftVoucherProducts" for="x_IsGiftVoucherProducts" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IsGiftVoucherProducts->caption() ?><?= $Page->IsGiftVoucherProducts->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_IsGiftVoucherProducts">
<input type="<?= $Page->IsGiftVoucherProducts->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IsGiftVoucherProducts" name="x_IsGiftVoucherProducts" id="x_IsGiftVoucherProducts" size="30" placeholder="<?= HtmlEncode($Page->IsGiftVoucherProducts->getPlaceHolder()) ?>" value="<?= $Page->IsGiftVoucherProducts->EditValue ?>"<?= $Page->IsGiftVoucherProducts->editAttributes() ?> aria-describedby="x_IsGiftVoucherProducts_help">
<?= $Page->IsGiftVoucherProducts->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsGiftVoucherProducts->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
    <div id="r_AcceptRange4SerialNumber" class="form-group row">
        <label id="elh_pharmacy_products_AcceptRange4SerialNumber" for="x_AcceptRange4SerialNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AcceptRange4SerialNumber->caption() ?><?= $Page->AcceptRange4SerialNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRange4SerialNumber">
<input type="<?= $Page->AcceptRange4SerialNumber->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AcceptRange4SerialNumber" name="x_AcceptRange4SerialNumber" id="x_AcceptRange4SerialNumber" size="30" placeholder="<?= HtmlEncode($Page->AcceptRange4SerialNumber->getPlaceHolder()) ?>" value="<?= $Page->AcceptRange4SerialNumber->EditValue ?>"<?= $Page->AcceptRange4SerialNumber->editAttributes() ?> aria-describedby="x_AcceptRange4SerialNumber_help">
<?= $Page->AcceptRange4SerialNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AcceptRange4SerialNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
    <div id="r_GiftVoucherDenomination" class="form-group row">
        <label id="elh_pharmacy_products_GiftVoucherDenomination" for="x_GiftVoucherDenomination" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GiftVoucherDenomination->caption() ?><?= $Page->GiftVoucherDenomination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftVoucherDenomination">
<input type="<?= $Page->GiftVoucherDenomination->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_GiftVoucherDenomination" name="x_GiftVoucherDenomination" id="x_GiftVoucherDenomination" size="30" placeholder="<?= HtmlEncode($Page->GiftVoucherDenomination->getPlaceHolder()) ?>" value="<?= $Page->GiftVoucherDenomination->EditValue ?>"<?= $Page->GiftVoucherDenomination->editAttributes() ?> aria-describedby="x_GiftVoucherDenomination_help">
<?= $Page->GiftVoucherDenomination->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GiftVoucherDenomination->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Subclasscode->Visible) { // Subclasscode ?>
    <div id="r_Subclasscode" class="form-group row">
        <label id="elh_pharmacy_products_Subclasscode" for="x_Subclasscode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Subclasscode->caption() ?><?= $Page->Subclasscode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Subclasscode->cellAttributes() ?>>
<span id="el_pharmacy_products_Subclasscode">
<input type="<?= $Page->Subclasscode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Subclasscode" name="x_Subclasscode" id="x_Subclasscode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Subclasscode->getPlaceHolder()) ?>" value="<?= $Page->Subclasscode->EditValue ?>"<?= $Page->Subclasscode->editAttributes() ?> aria-describedby="x_Subclasscode_help">
<?= $Page->Subclasscode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Subclasscode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
    <div id="r_BarCodeFromWeighingMachine" class="form-group row">
        <label id="elh_pharmacy_products_BarCodeFromWeighingMachine" for="x_BarCodeFromWeighingMachine" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BarCodeFromWeighingMachine->caption() ?><?= $Page->BarCodeFromWeighingMachine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeFromWeighingMachine">
<input type="<?= $Page->BarCodeFromWeighingMachine->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BarCodeFromWeighingMachine" name="x_BarCodeFromWeighingMachine" id="x_BarCodeFromWeighingMachine" size="30" placeholder="<?= HtmlEncode($Page->BarCodeFromWeighingMachine->getPlaceHolder()) ?>" value="<?= $Page->BarCodeFromWeighingMachine->EditValue ?>"<?= $Page->BarCodeFromWeighingMachine->editAttributes() ?> aria-describedby="x_BarCodeFromWeighingMachine_help">
<?= $Page->BarCodeFromWeighingMachine->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BarCodeFromWeighingMachine->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
    <div id="r_CheckCostInReturn" class="form-group row">
        <label id="elh_pharmacy_products_CheckCostInReturn" for="x_CheckCostInReturn" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CheckCostInReturn->caption() ?><?= $Page->CheckCostInReturn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CheckCostInReturn->cellAttributes() ?>>
<span id="el_pharmacy_products_CheckCostInReturn">
<input type="<?= $Page->CheckCostInReturn->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CheckCostInReturn" name="x_CheckCostInReturn" id="x_CheckCostInReturn" size="30" placeholder="<?= HtmlEncode($Page->CheckCostInReturn->getPlaceHolder()) ?>" value="<?= $Page->CheckCostInReturn->EditValue ?>"<?= $Page->CheckCostInReturn->editAttributes() ?> aria-describedby="x_CheckCostInReturn_help">
<?= $Page->CheckCostInReturn->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CheckCostInReturn->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
    <div id="r_FrequentSaleProduct" class="form-group row">
        <label id="elh_pharmacy_products_FrequentSaleProduct" for="x_FrequentSaleProduct" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FrequentSaleProduct->caption() ?><?= $Page->FrequentSaleProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FrequentSaleProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_FrequentSaleProduct">
<input type="<?= $Page->FrequentSaleProduct->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FrequentSaleProduct" name="x_FrequentSaleProduct" id="x_FrequentSaleProduct" size="30" placeholder="<?= HtmlEncode($Page->FrequentSaleProduct->getPlaceHolder()) ?>" value="<?= $Page->FrequentSaleProduct->EditValue ?>"<?= $Page->FrequentSaleProduct->editAttributes() ?> aria-describedby="x_FrequentSaleProduct_help">
<?= $Page->FrequentSaleProduct->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FrequentSaleProduct->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RateType->Visible) { // RateType ?>
    <div id="r_RateType" class="form-group row">
        <label id="elh_pharmacy_products_RateType" for="x_RateType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RateType->caption() ?><?= $Page->RateType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RateType->cellAttributes() ?>>
<span id="el_pharmacy_products_RateType">
<input type="<?= $Page->RateType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_RateType" name="x_RateType" id="x_RateType" size="30" placeholder="<?= HtmlEncode($Page->RateType->getPlaceHolder()) ?>" value="<?= $Page->RateType->EditValue ?>"<?= $Page->RateType->editAttributes() ?> aria-describedby="x_RateType_help">
<?= $Page->RateType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RateType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TouchscreenName->Visible) { // TouchscreenName ?>
    <div id="r_TouchscreenName" class="form-group row">
        <label id="elh_pharmacy_products_TouchscreenName" for="x_TouchscreenName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TouchscreenName->caption() ?><?= $Page->TouchscreenName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TouchscreenName->cellAttributes() ?>>
<span id="el_pharmacy_products_TouchscreenName">
<input type="<?= $Page->TouchscreenName->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TouchscreenName" name="x_TouchscreenName" id="x_TouchscreenName" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->TouchscreenName->getPlaceHolder()) ?>" value="<?= $Page->TouchscreenName->EditValue ?>"<?= $Page->TouchscreenName->editAttributes() ?> aria-describedby="x_TouchscreenName_help">
<?= $Page->TouchscreenName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TouchscreenName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeType->Visible) { // FreeType ?>
    <div id="r_FreeType" class="form-group row">
        <label id="elh_pharmacy_products_FreeType" for="x_FreeType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FreeType->caption() ?><?= $Page->FreeType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeType->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeType">
<input type="<?= $Page->FreeType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FreeType" name="x_FreeType" id="x_FreeType" size="30" placeholder="<?= HtmlEncode($Page->FreeType->getPlaceHolder()) ?>" value="<?= $Page->FreeType->EditValue ?>"<?= $Page->FreeType->editAttributes() ?> aria-describedby="x_FreeType_help">
<?= $Page->FreeType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FreeType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
    <div id="r_LooseQtyasNewBatch" class="form-group row">
        <label id="elh_pharmacy_products_LooseQtyasNewBatch" for="x_LooseQtyasNewBatch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LooseQtyasNewBatch->caption() ?><?= $Page->LooseQtyasNewBatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_LooseQtyasNewBatch">
<input type="<?= $Page->LooseQtyasNewBatch->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_LooseQtyasNewBatch" name="x_LooseQtyasNewBatch" id="x_LooseQtyasNewBatch" size="30" placeholder="<?= HtmlEncode($Page->LooseQtyasNewBatch->getPlaceHolder()) ?>" value="<?= $Page->LooseQtyasNewBatch->EditValue ?>"<?= $Page->LooseQtyasNewBatch->editAttributes() ?> aria-describedby="x_LooseQtyasNewBatch_help">
<?= $Page->LooseQtyasNewBatch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LooseQtyasNewBatch->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
    <div id="r_AllowSlabBilling" class="form-group row">
        <label id="elh_pharmacy_products_AllowSlabBilling" for="x_AllowSlabBilling" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AllowSlabBilling->caption() ?><?= $Page->AllowSlabBilling->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AllowSlabBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowSlabBilling">
<input type="<?= $Page->AllowSlabBilling->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AllowSlabBilling" name="x_AllowSlabBilling" id="x_AllowSlabBilling" size="30" placeholder="<?= HtmlEncode($Page->AllowSlabBilling->getPlaceHolder()) ?>" value="<?= $Page->AllowSlabBilling->EditValue ?>"<?= $Page->AllowSlabBilling->editAttributes() ?> aria-describedby="x_AllowSlabBilling_help">
<?= $Page->AllowSlabBilling->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AllowSlabBilling->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
    <div id="r_ProductTypeForProduction" class="form-group row">
        <label id="elh_pharmacy_products_ProductTypeForProduction" for="x_ProductTypeForProduction" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductTypeForProduction->caption() ?><?= $Page->ProductTypeForProduction->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductTypeForProduction->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductTypeForProduction">
<input type="<?= $Page->ProductTypeForProduction->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductTypeForProduction" name="x_ProductTypeForProduction" id="x_ProductTypeForProduction" size="30" placeholder="<?= HtmlEncode($Page->ProductTypeForProduction->getPlaceHolder()) ?>" value="<?= $Page->ProductTypeForProduction->EditValue ?>"<?= $Page->ProductTypeForProduction->editAttributes() ?> aria-describedby="x_ProductTypeForProduction_help">
<?= $Page->ProductTypeForProduction->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductTypeForProduction->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecipeCode->Visible) { // RecipeCode ?>
    <div id="r_RecipeCode" class="form-group row">
        <label id="elh_pharmacy_products_RecipeCode" for="x_RecipeCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RecipeCode->caption() ?><?= $Page->RecipeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecipeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RecipeCode">
<input type="<?= $Page->RecipeCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_RecipeCode" name="x_RecipeCode" id="x_RecipeCode" size="30" placeholder="<?= HtmlEncode($Page->RecipeCode->getPlaceHolder()) ?>" value="<?= $Page->RecipeCode->EditValue ?>"<?= $Page->RecipeCode->editAttributes() ?> aria-describedby="x_RecipeCode_help">
<?= $Page->RecipeCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecipeCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DefaultUnitType->Visible) { // DefaultUnitType ?>
    <div id="r_DefaultUnitType" class="form-group row">
        <label id="elh_pharmacy_products_DefaultUnitType" for="x_DefaultUnitType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DefaultUnitType->caption() ?><?= $Page->DefaultUnitType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DefaultUnitType->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultUnitType">
<input type="<?= $Page->DefaultUnitType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DefaultUnitType" name="x_DefaultUnitType" id="x_DefaultUnitType" size="30" placeholder="<?= HtmlEncode($Page->DefaultUnitType->getPlaceHolder()) ?>" value="<?= $Page->DefaultUnitType->EditValue ?>"<?= $Page->DefaultUnitType->editAttributes() ?> aria-describedby="x_DefaultUnitType_help">
<?= $Page->DefaultUnitType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DefaultUnitType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PIstatus->Visible) { // PIstatus ?>
    <div id="r_PIstatus" class="form-group row">
        <label id="elh_pharmacy_products_PIstatus" for="x_PIstatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PIstatus->caption() ?><?= $Page->PIstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PIstatus->cellAttributes() ?>>
<span id="el_pharmacy_products_PIstatus">
<input type="<?= $Page->PIstatus->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PIstatus" name="x_PIstatus" id="x_PIstatus" size="30" placeholder="<?= HtmlEncode($Page->PIstatus->getPlaceHolder()) ?>" value="<?= $Page->PIstatus->EditValue ?>"<?= $Page->PIstatus->editAttributes() ?> aria-describedby="x_PIstatus_help">
<?= $Page->PIstatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PIstatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
    <div id="r_LastPiConfirmedDate" class="form-group row">
        <label id="elh_pharmacy_products_LastPiConfirmedDate" for="x_LastPiConfirmedDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LastPiConfirmedDate->caption() ?><?= $Page->LastPiConfirmedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPiConfirmedDate">
<input type="<?= $Page->LastPiConfirmedDate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_LastPiConfirmedDate" name="x_LastPiConfirmedDate" id="x_LastPiConfirmedDate" placeholder="<?= HtmlEncode($Page->LastPiConfirmedDate->getPlaceHolder()) ?>" value="<?= $Page->LastPiConfirmedDate->EditValue ?>"<?= $Page->LastPiConfirmedDate->editAttributes() ?> aria-describedby="x_LastPiConfirmedDate_help">
<?= $Page->LastPiConfirmedDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LastPiConfirmedDate->getErrorMessage() ?></div>
<?php if (!$Page->LastPiConfirmedDate->ReadOnly && !$Page->LastPiConfirmedDate->Disabled && !isset($Page->LastPiConfirmedDate->EditAttrs["readonly"]) && !isset($Page->LastPiConfirmedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_productsadd", "x_LastPiConfirmedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BarCodeDesign->Visible) { // BarCodeDesign ?>
    <div id="r_BarCodeDesign" class="form-group row">
        <label id="elh_pharmacy_products_BarCodeDesign" for="x_BarCodeDesign" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BarCodeDesign->caption() ?><?= $Page->BarCodeDesign->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BarCodeDesign->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDesign">
<input type="<?= $Page->BarCodeDesign->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BarCodeDesign" name="x_BarCodeDesign" id="x_BarCodeDesign" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BarCodeDesign->getPlaceHolder()) ?>" value="<?= $Page->BarCodeDesign->EditValue ?>"<?= $Page->BarCodeDesign->editAttributes() ?> aria-describedby="x_BarCodeDesign_help">
<?= $Page->BarCodeDesign->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BarCodeDesign->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
    <div id="r_AcceptRemarksInBill" class="form-group row">
        <label id="elh_pharmacy_products_AcceptRemarksInBill" for="x_AcceptRemarksInBill" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AcceptRemarksInBill->caption() ?><?= $Page->AcceptRemarksInBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRemarksInBill">
<input type="<?= $Page->AcceptRemarksInBill->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AcceptRemarksInBill" name="x_AcceptRemarksInBill" id="x_AcceptRemarksInBill" size="30" placeholder="<?= HtmlEncode($Page->AcceptRemarksInBill->getPlaceHolder()) ?>" value="<?= $Page->AcceptRemarksInBill->EditValue ?>"<?= $Page->AcceptRemarksInBill->editAttributes() ?> aria-describedby="x_AcceptRemarksInBill_help">
<?= $Page->AcceptRemarksInBill->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AcceptRemarksInBill->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Classification->Visible) { // Classification ?>
    <div id="r_Classification" class="form-group row">
        <label id="elh_pharmacy_products_Classification" for="x_Classification" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Classification->caption() ?><?= $Page->Classification->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Classification->cellAttributes() ?>>
<span id="el_pharmacy_products_Classification">
<input type="<?= $Page->Classification->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Classification" name="x_Classification" id="x_Classification" size="30" placeholder="<?= HtmlEncode($Page->Classification->getPlaceHolder()) ?>" value="<?= $Page->Classification->EditValue ?>"<?= $Page->Classification->editAttributes() ?> aria-describedby="x_Classification_help">
<?= $Page->Classification->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Classification->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TimeSlot->Visible) { // TimeSlot ?>
    <div id="r_TimeSlot" class="form-group row">
        <label id="elh_pharmacy_products_TimeSlot" for="x_TimeSlot" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TimeSlot->caption() ?><?= $Page->TimeSlot->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TimeSlot->cellAttributes() ?>>
<span id="el_pharmacy_products_TimeSlot">
<input type="<?= $Page->TimeSlot->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TimeSlot" name="x_TimeSlot" id="x_TimeSlot" size="30" placeholder="<?= HtmlEncode($Page->TimeSlot->getPlaceHolder()) ?>" value="<?= $Page->TimeSlot->EditValue ?>"<?= $Page->TimeSlot->editAttributes() ?> aria-describedby="x_TimeSlot_help">
<?= $Page->TimeSlot->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TimeSlot->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsBundle->Visible) { // IsBundle ?>
    <div id="r_IsBundle" class="form-group row">
        <label id="elh_pharmacy_products_IsBundle" for="x_IsBundle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IsBundle->caption() ?><?= $Page->IsBundle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsBundle->cellAttributes() ?>>
<span id="el_pharmacy_products_IsBundle">
<input type="<?= $Page->IsBundle->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IsBundle" name="x_IsBundle" id="x_IsBundle" size="30" placeholder="<?= HtmlEncode($Page->IsBundle->getPlaceHolder()) ?>" value="<?= $Page->IsBundle->EditValue ?>"<?= $Page->IsBundle->editAttributes() ?> aria-describedby="x_IsBundle_help">
<?= $Page->IsBundle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsBundle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ColorCode->Visible) { // ColorCode ?>
    <div id="r_ColorCode" class="form-group row">
        <label id="elh_pharmacy_products_ColorCode" for="x_ColorCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ColorCode->caption() ?><?= $Page->ColorCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ColorCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ColorCode">
<input type="<?= $Page->ColorCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ColorCode" name="x_ColorCode" id="x_ColorCode" size="30" placeholder="<?= HtmlEncode($Page->ColorCode->getPlaceHolder()) ?>" value="<?= $Page->ColorCode->EditValue ?>"<?= $Page->ColorCode->editAttributes() ?> aria-describedby="x_ColorCode_help">
<?= $Page->ColorCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ColorCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GenderCode->Visible) { // GenderCode ?>
    <div id="r_GenderCode" class="form-group row">
        <label id="elh_pharmacy_products_GenderCode" for="x_GenderCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GenderCode->caption() ?><?= $Page->GenderCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GenderCode->cellAttributes() ?>>
<span id="el_pharmacy_products_GenderCode">
<input type="<?= $Page->GenderCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_GenderCode" name="x_GenderCode" id="x_GenderCode" size="30" placeholder="<?= HtmlEncode($Page->GenderCode->getPlaceHolder()) ?>" value="<?= $Page->GenderCode->EditValue ?>"<?= $Page->GenderCode->editAttributes() ?> aria-describedby="x_GenderCode_help">
<?= $Page->GenderCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GenderCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SizeCode->Visible) { // SizeCode ?>
    <div id="r_SizeCode" class="form-group row">
        <label id="elh_pharmacy_products_SizeCode" for="x_SizeCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SizeCode->caption() ?><?= $Page->SizeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SizeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SizeCode">
<input type="<?= $Page->SizeCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SizeCode" name="x_SizeCode" id="x_SizeCode" size="30" placeholder="<?= HtmlEncode($Page->SizeCode->getPlaceHolder()) ?>" value="<?= $Page->SizeCode->EditValue ?>"<?= $Page->SizeCode->editAttributes() ?> aria-describedby="x_SizeCode_help">
<?= $Page->SizeCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SizeCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GiftCard->Visible) { // GiftCard ?>
    <div id="r_GiftCard" class="form-group row">
        <label id="elh_pharmacy_products_GiftCard" for="x_GiftCard" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GiftCard->caption() ?><?= $Page->GiftCard->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GiftCard->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftCard">
<input type="<?= $Page->GiftCard->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_GiftCard" name="x_GiftCard" id="x_GiftCard" size="30" placeholder="<?= HtmlEncode($Page->GiftCard->getPlaceHolder()) ?>" value="<?= $Page->GiftCard->EditValue ?>"<?= $Page->GiftCard->editAttributes() ?> aria-describedby="x_GiftCard_help">
<?= $Page->GiftCard->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GiftCard->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ToonLabel->Visible) { // ToonLabel ?>
    <div id="r_ToonLabel" class="form-group row">
        <label id="elh_pharmacy_products_ToonLabel" for="x_ToonLabel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ToonLabel->caption() ?><?= $Page->ToonLabel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ToonLabel->cellAttributes() ?>>
<span id="el_pharmacy_products_ToonLabel">
<input type="<?= $Page->ToonLabel->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ToonLabel" name="x_ToonLabel" id="x_ToonLabel" size="30" placeholder="<?= HtmlEncode($Page->ToonLabel->getPlaceHolder()) ?>" value="<?= $Page->ToonLabel->EditValue ?>"<?= $Page->ToonLabel->editAttributes() ?> aria-describedby="x_ToonLabel_help">
<?= $Page->ToonLabel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ToonLabel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GarmentType->Visible) { // GarmentType ?>
    <div id="r_GarmentType" class="form-group row">
        <label id="elh_pharmacy_products_GarmentType" for="x_GarmentType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GarmentType->caption() ?><?= $Page->GarmentType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GarmentType->cellAttributes() ?>>
<span id="el_pharmacy_products_GarmentType">
<input type="<?= $Page->GarmentType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_GarmentType" name="x_GarmentType" id="x_GarmentType" size="30" placeholder="<?= HtmlEncode($Page->GarmentType->getPlaceHolder()) ?>" value="<?= $Page->GarmentType->EditValue ?>"<?= $Page->GarmentType->editAttributes() ?> aria-describedby="x_GarmentType_help">
<?= $Page->GarmentType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GarmentType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AgeGroup->Visible) { // AgeGroup ?>
    <div id="r_AgeGroup" class="form-group row">
        <label id="elh_pharmacy_products_AgeGroup" for="x_AgeGroup" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AgeGroup->caption() ?><?= $Page->AgeGroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AgeGroup->cellAttributes() ?>>
<span id="el_pharmacy_products_AgeGroup">
<input type="<?= $Page->AgeGroup->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AgeGroup" name="x_AgeGroup" id="x_AgeGroup" size="30" placeholder="<?= HtmlEncode($Page->AgeGroup->getPlaceHolder()) ?>" value="<?= $Page->AgeGroup->EditValue ?>"<?= $Page->AgeGroup->editAttributes() ?> aria-describedby="x_AgeGroup_help">
<?= $Page->AgeGroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AgeGroup->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Season->Visible) { // Season ?>
    <div id="r_Season" class="form-group row">
        <label id="elh_pharmacy_products_Season" for="x_Season" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Season->caption() ?><?= $Page->Season->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Season->cellAttributes() ?>>
<span id="el_pharmacy_products_Season">
<input type="<?= $Page->Season->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Season" name="x_Season" id="x_Season" size="30" placeholder="<?= HtmlEncode($Page->Season->getPlaceHolder()) ?>" value="<?= $Page->Season->EditValue ?>"<?= $Page->Season->editAttributes() ?> aria-describedby="x_Season_help">
<?= $Page->Season->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Season->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DailyStockEntry->Visible) { // DailyStockEntry ?>
    <div id="r_DailyStockEntry" class="form-group row">
        <label id="elh_pharmacy_products_DailyStockEntry" for="x_DailyStockEntry" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DailyStockEntry->caption() ?><?= $Page->DailyStockEntry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DailyStockEntry->cellAttributes() ?>>
<span id="el_pharmacy_products_DailyStockEntry">
<input type="<?= $Page->DailyStockEntry->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DailyStockEntry" name="x_DailyStockEntry" id="x_DailyStockEntry" size="30" placeholder="<?= HtmlEncode($Page->DailyStockEntry->getPlaceHolder()) ?>" value="<?= $Page->DailyStockEntry->EditValue ?>"<?= $Page->DailyStockEntry->editAttributes() ?> aria-describedby="x_DailyStockEntry_help">
<?= $Page->DailyStockEntry->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DailyStockEntry->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifierApplicable->Visible) { // ModifierApplicable ?>
    <div id="r_ModifierApplicable" class="form-group row">
        <label id="elh_pharmacy_products_ModifierApplicable" for="x_ModifierApplicable" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifierApplicable->caption() ?><?= $Page->ModifierApplicable->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifierApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierApplicable">
<input type="<?= $Page->ModifierApplicable->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ModifierApplicable" name="x_ModifierApplicable" id="x_ModifierApplicable" size="30" placeholder="<?= HtmlEncode($Page->ModifierApplicable->getPlaceHolder()) ?>" value="<?= $Page->ModifierApplicable->EditValue ?>"<?= $Page->ModifierApplicable->editAttributes() ?> aria-describedby="x_ModifierApplicable_help">
<?= $Page->ModifierApplicable->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifierApplicable->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifierType->Visible) { // ModifierType ?>
    <div id="r_ModifierType" class="form-group row">
        <label id="elh_pharmacy_products_ModifierType" for="x_ModifierType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifierType->caption() ?><?= $Page->ModifierType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifierType->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierType">
<input type="<?= $Page->ModifierType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ModifierType" name="x_ModifierType" id="x_ModifierType" size="30" placeholder="<?= HtmlEncode($Page->ModifierType->getPlaceHolder()) ?>" value="<?= $Page->ModifierType->EditValue ?>"<?= $Page->ModifierType->editAttributes() ?> aria-describedby="x_ModifierType_help">
<?= $Page->ModifierType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifierType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
    <div id="r_AcceptZeroRate" class="form-group row">
        <label id="elh_pharmacy_products_AcceptZeroRate" for="x_AcceptZeroRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AcceptZeroRate->caption() ?><?= $Page->AcceptZeroRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AcceptZeroRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptZeroRate">
<input type="<?= $Page->AcceptZeroRate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AcceptZeroRate" name="x_AcceptZeroRate" id="x_AcceptZeroRate" size="30" placeholder="<?= HtmlEncode($Page->AcceptZeroRate->getPlaceHolder()) ?>" value="<?= $Page->AcceptZeroRate->EditValue ?>"<?= $Page->AcceptZeroRate->editAttributes() ?> aria-describedby="x_AcceptZeroRate_help">
<?= $Page->AcceptZeroRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AcceptZeroRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
    <div id="r_ExciseDutyCode" class="form-group row">
        <label id="elh_pharmacy_products_ExciseDutyCode" for="x_ExciseDutyCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ExciseDutyCode->caption() ?><?= $Page->ExciseDutyCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExciseDutyCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ExciseDutyCode">
<input type="<?= $Page->ExciseDutyCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ExciseDutyCode" name="x_ExciseDutyCode" id="x_ExciseDutyCode" size="30" placeholder="<?= HtmlEncode($Page->ExciseDutyCode->getPlaceHolder()) ?>" value="<?= $Page->ExciseDutyCode->EditValue ?>"<?= $Page->ExciseDutyCode->editAttributes() ?> aria-describedby="x_ExciseDutyCode_help">
<?= $Page->ExciseDutyCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExciseDutyCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
    <div id="r_IndentProductGroupCode" class="form-group row">
        <label id="elh_pharmacy_products_IndentProductGroupCode" for="x_IndentProductGroupCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IndentProductGroupCode->caption() ?><?= $Page->IndentProductGroupCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IndentProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_IndentProductGroupCode">
<input type="<?= $Page->IndentProductGroupCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IndentProductGroupCode" name="x_IndentProductGroupCode" id="x_IndentProductGroupCode" size="30" placeholder="<?= HtmlEncode($Page->IndentProductGroupCode->getPlaceHolder()) ?>" value="<?= $Page->IndentProductGroupCode->EditValue ?>"<?= $Page->IndentProductGroupCode->editAttributes() ?> aria-describedby="x_IndentProductGroupCode_help">
<?= $Page->IndentProductGroupCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IndentProductGroupCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsMultiBatch->Visible) { // IsMultiBatch ?>
    <div id="r_IsMultiBatch" class="form-group row">
        <label id="elh_pharmacy_products_IsMultiBatch" for="x_IsMultiBatch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IsMultiBatch->caption() ?><?= $Page->IsMultiBatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsMultiBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMultiBatch">
<input type="<?= $Page->IsMultiBatch->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IsMultiBatch" name="x_IsMultiBatch" id="x_IsMultiBatch" size="30" placeholder="<?= HtmlEncode($Page->IsMultiBatch->getPlaceHolder()) ?>" value="<?= $Page->IsMultiBatch->EditValue ?>"<?= $Page->IsMultiBatch->editAttributes() ?> aria-describedby="x_IsMultiBatch_help">
<?= $Page->IsMultiBatch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsMultiBatch->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsSingleBatch->Visible) { // IsSingleBatch ?>
    <div id="r_IsSingleBatch" class="form-group row">
        <label id="elh_pharmacy_products_IsSingleBatch" for="x_IsSingleBatch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IsSingleBatch->caption() ?><?= $Page->IsSingleBatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsSingleBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsSingleBatch">
<input type="<?= $Page->IsSingleBatch->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IsSingleBatch" name="x_IsSingleBatch" id="x_IsSingleBatch" size="30" placeholder="<?= HtmlEncode($Page->IsSingleBatch->getPlaceHolder()) ?>" value="<?= $Page->IsSingleBatch->EditValue ?>"<?= $Page->IsSingleBatch->editAttributes() ?> aria-describedby="x_IsSingleBatch_help">
<?= $Page->IsSingleBatch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsSingleBatch->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MarkUpRate1->Visible) { // MarkUpRate1 ?>
    <div id="r_MarkUpRate1" class="form-group row">
        <label id="elh_pharmacy_products_MarkUpRate1" for="x_MarkUpRate1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MarkUpRate1->caption() ?><?= $Page->MarkUpRate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MarkUpRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate1">
<input type="<?= $Page->MarkUpRate1->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MarkUpRate1" name="x_MarkUpRate1" id="x_MarkUpRate1" size="30" placeholder="<?= HtmlEncode($Page->MarkUpRate1->getPlaceHolder()) ?>" value="<?= $Page->MarkUpRate1->EditValue ?>"<?= $Page->MarkUpRate1->editAttributes() ?> aria-describedby="x_MarkUpRate1_help">
<?= $Page->MarkUpRate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MarkUpRate1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MarkDownRate1->Visible) { // MarkDownRate1 ?>
    <div id="r_MarkDownRate1" class="form-group row">
        <label id="elh_pharmacy_products_MarkDownRate1" for="x_MarkDownRate1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MarkDownRate1->caption() ?><?= $Page->MarkDownRate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MarkDownRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate1">
<input type="<?= $Page->MarkDownRate1->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MarkDownRate1" name="x_MarkDownRate1" id="x_MarkDownRate1" size="30" placeholder="<?= HtmlEncode($Page->MarkDownRate1->getPlaceHolder()) ?>" value="<?= $Page->MarkDownRate1->EditValue ?>"<?= $Page->MarkDownRate1->editAttributes() ?> aria-describedby="x_MarkDownRate1_help">
<?= $Page->MarkDownRate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MarkDownRate1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MarkUpRate2->Visible) { // MarkUpRate2 ?>
    <div id="r_MarkUpRate2" class="form-group row">
        <label id="elh_pharmacy_products_MarkUpRate2" for="x_MarkUpRate2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MarkUpRate2->caption() ?><?= $Page->MarkUpRate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MarkUpRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate2">
<input type="<?= $Page->MarkUpRate2->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MarkUpRate2" name="x_MarkUpRate2" id="x_MarkUpRate2" size="30" placeholder="<?= HtmlEncode($Page->MarkUpRate2->getPlaceHolder()) ?>" value="<?= $Page->MarkUpRate2->EditValue ?>"<?= $Page->MarkUpRate2->editAttributes() ?> aria-describedby="x_MarkUpRate2_help">
<?= $Page->MarkUpRate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MarkUpRate2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MarkDownRate2->Visible) { // MarkDownRate2 ?>
    <div id="r_MarkDownRate2" class="form-group row">
        <label id="elh_pharmacy_products_MarkDownRate2" for="x_MarkDownRate2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MarkDownRate2->caption() ?><?= $Page->MarkDownRate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MarkDownRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate2">
<input type="<?= $Page->MarkDownRate2->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MarkDownRate2" name="x_MarkDownRate2" id="x_MarkDownRate2" size="30" placeholder="<?= HtmlEncode($Page->MarkDownRate2->getPlaceHolder()) ?>" value="<?= $Page->MarkDownRate2->EditValue ?>"<?= $Page->MarkDownRate2->editAttributes() ?> aria-describedby="x_MarkDownRate2_help">
<?= $Page->MarkDownRate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MarkDownRate2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Yield->Visible) { // Yield ?>
    <div id="r__Yield" class="form-group row">
        <label id="elh_pharmacy_products__Yield" for="x__Yield" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Yield->caption() ?><?= $Page->_Yield->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Yield->cellAttributes() ?>>
<span id="el_pharmacy_products__Yield">
<input type="<?= $Page->_Yield->getInputTextType() ?>" data-table="pharmacy_products" data-field="x__Yield" name="x__Yield" id="x__Yield" size="30" placeholder="<?= HtmlEncode($Page->_Yield->getPlaceHolder()) ?>" value="<?= $Page->_Yield->EditValue ?>"<?= $Page->_Yield->editAttributes() ?> aria-describedby="x__Yield_help">
<?= $Page->_Yield->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Yield->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefProductCode->Visible) { // RefProductCode ?>
    <div id="r_RefProductCode" class="form-group row">
        <label id="elh_pharmacy_products_RefProductCode" for="x_RefProductCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefProductCode->caption() ?><?= $Page->RefProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RefProductCode">
<input type="<?= $Page->RefProductCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_RefProductCode" name="x_RefProductCode" id="x_RefProductCode" size="30" placeholder="<?= HtmlEncode($Page->RefProductCode->getPlaceHolder()) ?>" value="<?= $Page->RefProductCode->EditValue ?>"<?= $Page->RefProductCode->editAttributes() ?> aria-describedby="x_RefProductCode_help">
<?= $Page->RefProductCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefProductCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <div id="r_Volume" class="form-group row">
        <label id="elh_pharmacy_products_Volume" for="x_Volume" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Volume->caption() ?><?= $Page->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume->cellAttributes() ?>>
<span id="el_pharmacy_products_Volume">
<input type="<?= $Page->Volume->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" placeholder="<?= HtmlEncode($Page->Volume->getPlaceHolder()) ?>" value="<?= $Page->Volume->EditValue ?>"<?= $Page->Volume->editAttributes() ?> aria-describedby="x_Volume_help">
<?= $Page->Volume->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MeasurementID->Visible) { // MeasurementID ?>
    <div id="r_MeasurementID" class="form-group row">
        <label id="elh_pharmacy_products_MeasurementID" for="x_MeasurementID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MeasurementID->caption() ?><?= $Page->MeasurementID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MeasurementID->cellAttributes() ?>>
<span id="el_pharmacy_products_MeasurementID">
<input type="<?= $Page->MeasurementID->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MeasurementID" name="x_MeasurementID" id="x_MeasurementID" size="30" placeholder="<?= HtmlEncode($Page->MeasurementID->getPlaceHolder()) ?>" value="<?= $Page->MeasurementID->EditValue ?>"<?= $Page->MeasurementID->editAttributes() ?> aria-describedby="x_MeasurementID_help">
<?= $Page->MeasurementID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MeasurementID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CountryCode->Visible) { // CountryCode ?>
    <div id="r_CountryCode" class="form-group row">
        <label id="elh_pharmacy_products_CountryCode" for="x_CountryCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CountryCode->caption() ?><?= $Page->CountryCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CountryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CountryCode">
<input type="<?= $Page->CountryCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CountryCode" name="x_CountryCode" id="x_CountryCode" size="30" placeholder="<?= HtmlEncode($Page->CountryCode->getPlaceHolder()) ?>" value="<?= $Page->CountryCode->EditValue ?>"<?= $Page->CountryCode->editAttributes() ?> aria-describedby="x_CountryCode_help">
<?= $Page->CountryCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CountryCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AcceptWMQty->Visible) { // AcceptWMQty ?>
    <div id="r_AcceptWMQty" class="form-group row">
        <label id="elh_pharmacy_products_AcceptWMQty" for="x_AcceptWMQty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AcceptWMQty->caption() ?><?= $Page->AcceptWMQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AcceptWMQty->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptWMQty">
<input type="<?= $Page->AcceptWMQty->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AcceptWMQty" name="x_AcceptWMQty" id="x_AcceptWMQty" size="30" placeholder="<?= HtmlEncode($Page->AcceptWMQty->getPlaceHolder()) ?>" value="<?= $Page->AcceptWMQty->EditValue ?>"<?= $Page->AcceptWMQty->editAttributes() ?> aria-describedby="x_AcceptWMQty_help">
<?= $Page->AcceptWMQty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AcceptWMQty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
    <div id="r_SingleBatchBasedOnRate" class="form-group row">
        <label id="elh_pharmacy_products_SingleBatchBasedOnRate" for="x_SingleBatchBasedOnRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SingleBatchBasedOnRate->caption() ?><?= $Page->SingleBatchBasedOnRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBatchBasedOnRate">
<input type="<?= $Page->SingleBatchBasedOnRate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SingleBatchBasedOnRate" name="x_SingleBatchBasedOnRate" id="x_SingleBatchBasedOnRate" size="30" placeholder="<?= HtmlEncode($Page->SingleBatchBasedOnRate->getPlaceHolder()) ?>" value="<?= $Page->SingleBatchBasedOnRate->EditValue ?>"<?= $Page->SingleBatchBasedOnRate->editAttributes() ?> aria-describedby="x_SingleBatchBasedOnRate_help">
<?= $Page->SingleBatchBasedOnRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SingleBatchBasedOnRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TenderNo->Visible) { // TenderNo ?>
    <div id="r_TenderNo" class="form-group row">
        <label id="elh_pharmacy_products_TenderNo" for="x_TenderNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TenderNo->caption() ?><?= $Page->TenderNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TenderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TenderNo">
<input type="<?= $Page->TenderNo->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TenderNo" name="x_TenderNo" id="x_TenderNo" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->TenderNo->getPlaceHolder()) ?>" value="<?= $Page->TenderNo->EditValue ?>"<?= $Page->TenderNo->editAttributes() ?> aria-describedby="x_TenderNo_help">
<?= $Page->TenderNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TenderNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
    <div id="r_SingleBillMaximumSoldQtyFiled" class="form-group row">
        <label id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" for="x_SingleBillMaximumSoldQtyFiled" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SingleBillMaximumSoldQtyFiled->caption() ?><?= $Page->SingleBillMaximumSoldQtyFiled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBillMaximumSoldQtyFiled">
<input type="<?= $Page->SingleBillMaximumSoldQtyFiled->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SingleBillMaximumSoldQtyFiled" name="x_SingleBillMaximumSoldQtyFiled" id="x_SingleBillMaximumSoldQtyFiled" size="30" placeholder="<?= HtmlEncode($Page->SingleBillMaximumSoldQtyFiled->getPlaceHolder()) ?>" value="<?= $Page->SingleBillMaximumSoldQtyFiled->EditValue ?>"<?= $Page->SingleBillMaximumSoldQtyFiled->editAttributes() ?> aria-describedby="x_SingleBillMaximumSoldQtyFiled_help">
<?= $Page->SingleBillMaximumSoldQtyFiled->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SingleBillMaximumSoldQtyFiled->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
    <div id="r_Strength1" class="form-group row">
        <label id="elh_pharmacy_products_Strength1" for="x_Strength1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength1->caption() ?><?= $Page->Strength1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength1->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength1">
<input type="<?= $Page->Strength1->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Strength1" name="x_Strength1" id="x_Strength1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength1->getPlaceHolder()) ?>" value="<?= $Page->Strength1->EditValue ?>"<?= $Page->Strength1->editAttributes() ?> aria-describedby="x_Strength1_help">
<?= $Page->Strength1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
    <div id="r_Strength2" class="form-group row">
        <label id="elh_pharmacy_products_Strength2" for="x_Strength2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength2->caption() ?><?= $Page->Strength2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength2->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength2">
<input type="<?= $Page->Strength2->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Strength2" name="x_Strength2" id="x_Strength2" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength2->getPlaceHolder()) ?>" value="<?= $Page->Strength2->EditValue ?>"<?= $Page->Strength2->editAttributes() ?> aria-describedby="x_Strength2_help">
<?= $Page->Strength2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
    <div id="r_Strength3" class="form-group row">
        <label id="elh_pharmacy_products_Strength3" for="x_Strength3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength3->caption() ?><?= $Page->Strength3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength3->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength3">
<input type="<?= $Page->Strength3->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Strength3" name="x_Strength3" id="x_Strength3" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength3->getPlaceHolder()) ?>" value="<?= $Page->Strength3->EditValue ?>"<?= $Page->Strength3->editAttributes() ?> aria-describedby="x_Strength3_help">
<?= $Page->Strength3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
    <div id="r_Strength4" class="form-group row">
        <label id="elh_pharmacy_products_Strength4" for="x_Strength4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength4->caption() ?><?= $Page->Strength4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength4->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength4">
<input type="<?= $Page->Strength4->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Strength4" name="x_Strength4" id="x_Strength4" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength4->getPlaceHolder()) ?>" value="<?= $Page->Strength4->EditValue ?>"<?= $Page->Strength4->editAttributes() ?> aria-describedby="x_Strength4_help">
<?= $Page->Strength4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
    <div id="r_Strength5" class="form-group row">
        <label id="elh_pharmacy_products_Strength5" for="x_Strength5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength5->caption() ?><?= $Page->Strength5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength5->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength5">
<input type="<?= $Page->Strength5->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_Strength5" name="x_Strength5" id="x_Strength5" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength5->getPlaceHolder()) ?>" value="<?= $Page->Strength5->EditValue ?>"<?= $Page->Strength5->editAttributes() ?> aria-describedby="x_Strength5_help">
<?= $Page->Strength5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IngredientCode1->Visible) { // IngredientCode1 ?>
    <div id="r_IngredientCode1" class="form-group row">
        <label id="elh_pharmacy_products_IngredientCode1" for="x_IngredientCode1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IngredientCode1->caption() ?><?= $Page->IngredientCode1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IngredientCode1->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode1">
<input type="<?= $Page->IngredientCode1->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IngredientCode1" name="x_IngredientCode1" id="x_IngredientCode1" size="30" placeholder="<?= HtmlEncode($Page->IngredientCode1->getPlaceHolder()) ?>" value="<?= $Page->IngredientCode1->EditValue ?>"<?= $Page->IngredientCode1->editAttributes() ?> aria-describedby="x_IngredientCode1_help">
<?= $Page->IngredientCode1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IngredientCode1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IngredientCode2->Visible) { // IngredientCode2 ?>
    <div id="r_IngredientCode2" class="form-group row">
        <label id="elh_pharmacy_products_IngredientCode2" for="x_IngredientCode2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IngredientCode2->caption() ?><?= $Page->IngredientCode2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IngredientCode2->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode2">
<input type="<?= $Page->IngredientCode2->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IngredientCode2" name="x_IngredientCode2" id="x_IngredientCode2" size="30" placeholder="<?= HtmlEncode($Page->IngredientCode2->getPlaceHolder()) ?>" value="<?= $Page->IngredientCode2->EditValue ?>"<?= $Page->IngredientCode2->editAttributes() ?> aria-describedby="x_IngredientCode2_help">
<?= $Page->IngredientCode2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IngredientCode2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IngredientCode3->Visible) { // IngredientCode3 ?>
    <div id="r_IngredientCode3" class="form-group row">
        <label id="elh_pharmacy_products_IngredientCode3" for="x_IngredientCode3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IngredientCode3->caption() ?><?= $Page->IngredientCode3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IngredientCode3->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode3">
<input type="<?= $Page->IngredientCode3->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IngredientCode3" name="x_IngredientCode3" id="x_IngredientCode3" size="30" placeholder="<?= HtmlEncode($Page->IngredientCode3->getPlaceHolder()) ?>" value="<?= $Page->IngredientCode3->EditValue ?>"<?= $Page->IngredientCode3->editAttributes() ?> aria-describedby="x_IngredientCode3_help">
<?= $Page->IngredientCode3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IngredientCode3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IngredientCode4->Visible) { // IngredientCode4 ?>
    <div id="r_IngredientCode4" class="form-group row">
        <label id="elh_pharmacy_products_IngredientCode4" for="x_IngredientCode4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IngredientCode4->caption() ?><?= $Page->IngredientCode4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IngredientCode4->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode4">
<input type="<?= $Page->IngredientCode4->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IngredientCode4" name="x_IngredientCode4" id="x_IngredientCode4" size="30" placeholder="<?= HtmlEncode($Page->IngredientCode4->getPlaceHolder()) ?>" value="<?= $Page->IngredientCode4->EditValue ?>"<?= $Page->IngredientCode4->editAttributes() ?> aria-describedby="x_IngredientCode4_help">
<?= $Page->IngredientCode4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IngredientCode4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IngredientCode5->Visible) { // IngredientCode5 ?>
    <div id="r_IngredientCode5" class="form-group row">
        <label id="elh_pharmacy_products_IngredientCode5" for="x_IngredientCode5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IngredientCode5->caption() ?><?= $Page->IngredientCode5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IngredientCode5->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode5">
<input type="<?= $Page->IngredientCode5->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IngredientCode5" name="x_IngredientCode5" id="x_IngredientCode5" size="30" placeholder="<?= HtmlEncode($Page->IngredientCode5->getPlaceHolder()) ?>" value="<?= $Page->IngredientCode5->EditValue ?>"<?= $Page->IngredientCode5->editAttributes() ?> aria-describedby="x_IngredientCode5_help">
<?= $Page->IngredientCode5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IngredientCode5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OrderType->Visible) { // OrderType ?>
    <div id="r_OrderType" class="form-group row">
        <label id="elh_pharmacy_products_OrderType" for="x_OrderType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OrderType->caption() ?><?= $Page->OrderType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OrderType->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderType">
<input type="<?= $Page->OrderType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_OrderType" name="x_OrderType" id="x_OrderType" size="30" placeholder="<?= HtmlEncode($Page->OrderType->getPlaceHolder()) ?>" value="<?= $Page->OrderType->EditValue ?>"<?= $Page->OrderType->editAttributes() ?> aria-describedby="x_OrderType_help">
<?= $Page->OrderType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OrderType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StockUOM->Visible) { // StockUOM ?>
    <div id="r_StockUOM" class="form-group row">
        <label id="elh_pharmacy_products_StockUOM" for="x_StockUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StockUOM->caption() ?><?= $Page->StockUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StockUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_StockUOM">
<input type="<?= $Page->StockUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_StockUOM" name="x_StockUOM" id="x_StockUOM" size="30" placeholder="<?= HtmlEncode($Page->StockUOM->getPlaceHolder()) ?>" value="<?= $Page->StockUOM->EditValue ?>"<?= $Page->StockUOM->editAttributes() ?> aria-describedby="x_StockUOM_help">
<?= $Page->StockUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StockUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PriceUOM->Visible) { // PriceUOM ?>
    <div id="r_PriceUOM" class="form-group row">
        <label id="elh_pharmacy_products_PriceUOM" for="x_PriceUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PriceUOM->caption() ?><?= $Page->PriceUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PriceUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceUOM">
<input type="<?= $Page->PriceUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PriceUOM" name="x_PriceUOM" id="x_PriceUOM" size="30" placeholder="<?= HtmlEncode($Page->PriceUOM->getPlaceHolder()) ?>" value="<?= $Page->PriceUOM->EditValue ?>"<?= $Page->PriceUOM->editAttributes() ?> aria-describedby="x_PriceUOM_help">
<?= $Page->PriceUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PriceUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
    <div id="r_DefaultSaleUOM" class="form-group row">
        <label id="elh_pharmacy_products_DefaultSaleUOM" for="x_DefaultSaleUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DefaultSaleUOM->caption() ?><?= $Page->DefaultSaleUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DefaultSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultSaleUOM">
<input type="<?= $Page->DefaultSaleUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DefaultSaleUOM" name="x_DefaultSaleUOM" id="x_DefaultSaleUOM" size="30" placeholder="<?= HtmlEncode($Page->DefaultSaleUOM->getPlaceHolder()) ?>" value="<?= $Page->DefaultSaleUOM->EditValue ?>"<?= $Page->DefaultSaleUOM->editAttributes() ?> aria-describedby="x_DefaultSaleUOM_help">
<?= $Page->DefaultSaleUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DefaultSaleUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
    <div id="r_DefaultPurchaseUOM" class="form-group row">
        <label id="elh_pharmacy_products_DefaultPurchaseUOM" for="x_DefaultPurchaseUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DefaultPurchaseUOM->caption() ?><?= $Page->DefaultPurchaseUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultPurchaseUOM">
<input type="<?= $Page->DefaultPurchaseUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DefaultPurchaseUOM" name="x_DefaultPurchaseUOM" id="x_DefaultPurchaseUOM" size="30" placeholder="<?= HtmlEncode($Page->DefaultPurchaseUOM->getPlaceHolder()) ?>" value="<?= $Page->DefaultPurchaseUOM->EditValue ?>"<?= $Page->DefaultPurchaseUOM->editAttributes() ?> aria-describedby="x_DefaultPurchaseUOM_help">
<?= $Page->DefaultPurchaseUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DefaultPurchaseUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportingUOM->Visible) { // ReportingUOM ?>
    <div id="r_ReportingUOM" class="form-group row">
        <label id="elh_pharmacy_products_ReportingUOM" for="x_ReportingUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReportingUOM->caption() ?><?= $Page->ReportingUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportingUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_ReportingUOM">
<input type="<?= $Page->ReportingUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ReportingUOM" name="x_ReportingUOM" id="x_ReportingUOM" size="30" placeholder="<?= HtmlEncode($Page->ReportingUOM->getPlaceHolder()) ?>" value="<?= $Page->ReportingUOM->EditValue ?>"<?= $Page->ReportingUOM->editAttributes() ?> aria-describedby="x_ReportingUOM_help">
<?= $Page->ReportingUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportingUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
    <div id="r_LastPurchasedUOM" class="form-group row">
        <label id="elh_pharmacy_products_LastPurchasedUOM" for="x_LastPurchasedUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LastPurchasedUOM->caption() ?><?= $Page->LastPurchasedUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LastPurchasedUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPurchasedUOM">
<input type="<?= $Page->LastPurchasedUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_LastPurchasedUOM" name="x_LastPurchasedUOM" id="x_LastPurchasedUOM" size="30" placeholder="<?= HtmlEncode($Page->LastPurchasedUOM->getPlaceHolder()) ?>" value="<?= $Page->LastPurchasedUOM->EditValue ?>"<?= $Page->LastPurchasedUOM->editAttributes() ?> aria-describedby="x_LastPurchasedUOM_help">
<?= $Page->LastPurchasedUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LastPurchasedUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatmentCodes->Visible) { // TreatmentCodes ?>
    <div id="r_TreatmentCodes" class="form-group row">
        <label id="elh_pharmacy_products_TreatmentCodes" for="x_TreatmentCodes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TreatmentCodes->caption() ?><?= $Page->TreatmentCodes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatmentCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_TreatmentCodes">
<input type="<?= $Page->TreatmentCodes->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TreatmentCodes" name="x_TreatmentCodes" id="x_TreatmentCodes" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->TreatmentCodes->getPlaceHolder()) ?>" value="<?= $Page->TreatmentCodes->EditValue ?>"<?= $Page->TreatmentCodes->editAttributes() ?> aria-describedby="x_TreatmentCodes_help">
<?= $Page->TreatmentCodes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatmentCodes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InsuranceType->Visible) { // InsuranceType ?>
    <div id="r_InsuranceType" class="form-group row">
        <label id="elh_pharmacy_products_InsuranceType" for="x_InsuranceType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InsuranceType->caption() ?><?= $Page->InsuranceType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InsuranceType->cellAttributes() ?>>
<span id="el_pharmacy_products_InsuranceType">
<input type="<?= $Page->InsuranceType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_InsuranceType" name="x_InsuranceType" id="x_InsuranceType" size="30" placeholder="<?= HtmlEncode($Page->InsuranceType->getPlaceHolder()) ?>" value="<?= $Page->InsuranceType->EditValue ?>"<?= $Page->InsuranceType->editAttributes() ?> aria-describedby="x_InsuranceType_help">
<?= $Page->InsuranceType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InsuranceType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
    <div id="r_CoverageGroupCodes" class="form-group row">
        <label id="elh_pharmacy_products_CoverageGroupCodes" for="x_CoverageGroupCodes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CoverageGroupCodes->caption() ?><?= $Page->CoverageGroupCodes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CoverageGroupCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_CoverageGroupCodes">
<input type="<?= $Page->CoverageGroupCodes->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_CoverageGroupCodes" name="x_CoverageGroupCodes" id="x_CoverageGroupCodes" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->CoverageGroupCodes->getPlaceHolder()) ?>" value="<?= $Page->CoverageGroupCodes->EditValue ?>"<?= $Page->CoverageGroupCodes->editAttributes() ?> aria-describedby="x_CoverageGroupCodes_help">
<?= $Page->CoverageGroupCodes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CoverageGroupCodes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MultipleUOM->Visible) { // MultipleUOM ?>
    <div id="r_MultipleUOM" class="form-group row">
        <label id="elh_pharmacy_products_MultipleUOM" for="x_MultipleUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MultipleUOM->caption() ?><?= $Page->MultipleUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MultipleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleUOM">
<input type="<?= $Page->MultipleUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MultipleUOM" name="x_MultipleUOM" id="x_MultipleUOM" size="30" placeholder="<?= HtmlEncode($Page->MultipleUOM->getPlaceHolder()) ?>" value="<?= $Page->MultipleUOM->EditValue ?>"<?= $Page->MultipleUOM->editAttributes() ?> aria-describedby="x_MultipleUOM_help">
<?= $Page->MultipleUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MultipleUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SalePriceComputation->Visible) { // SalePriceComputation ?>
    <div id="r_SalePriceComputation" class="form-group row">
        <label id="elh_pharmacy_products_SalePriceComputation" for="x_SalePriceComputation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SalePriceComputation->caption() ?><?= $Page->SalePriceComputation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalePriceComputation->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePriceComputation">
<input type="<?= $Page->SalePriceComputation->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SalePriceComputation" name="x_SalePriceComputation" id="x_SalePriceComputation" size="30" placeholder="<?= HtmlEncode($Page->SalePriceComputation->getPlaceHolder()) ?>" value="<?= $Page->SalePriceComputation->EditValue ?>"<?= $Page->SalePriceComputation->editAttributes() ?> aria-describedby="x_SalePriceComputation_help">
<?= $Page->SalePriceComputation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SalePriceComputation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StockCorrection->Visible) { // StockCorrection ?>
    <div id="r_StockCorrection" class="form-group row">
        <label id="elh_pharmacy_products_StockCorrection" for="x_StockCorrection" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StockCorrection->caption() ?><?= $Page->StockCorrection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StockCorrection->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCorrection">
<input type="<?= $Page->StockCorrection->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_StockCorrection" name="x_StockCorrection" id="x_StockCorrection" size="30" placeholder="<?= HtmlEncode($Page->StockCorrection->getPlaceHolder()) ?>" value="<?= $Page->StockCorrection->EditValue ?>"<?= $Page->StockCorrection->editAttributes() ?> aria-describedby="x_StockCorrection_help">
<?= $Page->StockCorrection->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StockCorrection->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LBTPercentage->Visible) { // LBTPercentage ?>
    <div id="r_LBTPercentage" class="form-group row">
        <label id="elh_pharmacy_products_LBTPercentage" for="x_LBTPercentage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LBTPercentage->caption() ?><?= $Page->LBTPercentage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LBTPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_LBTPercentage">
<input type="<?= $Page->LBTPercentage->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_LBTPercentage" name="x_LBTPercentage" id="x_LBTPercentage" size="30" placeholder="<?= HtmlEncode($Page->LBTPercentage->getPlaceHolder()) ?>" value="<?= $Page->LBTPercentage->EditValue ?>"<?= $Page->LBTPercentage->editAttributes() ?> aria-describedby="x_LBTPercentage_help">
<?= $Page->LBTPercentage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LBTPercentage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SalesCommission->Visible) { // SalesCommission ?>
    <div id="r_SalesCommission" class="form-group row">
        <label id="elh_pharmacy_products_SalesCommission" for="x_SalesCommission" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SalesCommission->caption() ?><?= $Page->SalesCommission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalesCommission->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesCommission">
<input type="<?= $Page->SalesCommission->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_SalesCommission" name="x_SalesCommission" id="x_SalesCommission" size="30" placeholder="<?= HtmlEncode($Page->SalesCommission->getPlaceHolder()) ?>" value="<?= $Page->SalesCommission->EditValue ?>"<?= $Page->SalesCommission->editAttributes() ?> aria-describedby="x_SalesCommission_help">
<?= $Page->SalesCommission->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SalesCommission->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LockedStock->Visible) { // LockedStock ?>
    <div id="r_LockedStock" class="form-group row">
        <label id="elh_pharmacy_products_LockedStock" for="x_LockedStock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LockedStock->caption() ?><?= $Page->LockedStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LockedStock->cellAttributes() ?>>
<span id="el_pharmacy_products_LockedStock">
<input type="<?= $Page->LockedStock->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_LockedStock" name="x_LockedStock" id="x_LockedStock" size="30" placeholder="<?= HtmlEncode($Page->LockedStock->getPlaceHolder()) ?>" value="<?= $Page->LockedStock->EditValue ?>"<?= $Page->LockedStock->editAttributes() ?> aria-describedby="x_LockedStock_help">
<?= $Page->LockedStock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LockedStock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MinMaxUOM->Visible) { // MinMaxUOM ?>
    <div id="r_MinMaxUOM" class="form-group row">
        <label id="elh_pharmacy_products_MinMaxUOM" for="x_MinMaxUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MinMaxUOM->caption() ?><?= $Page->MinMaxUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MinMaxUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxUOM">
<input type="<?= $Page->MinMaxUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MinMaxUOM" name="x_MinMaxUOM" id="x_MinMaxUOM" size="30" placeholder="<?= HtmlEncode($Page->MinMaxUOM->getPlaceHolder()) ?>" value="<?= $Page->MinMaxUOM->EditValue ?>"<?= $Page->MinMaxUOM->editAttributes() ?> aria-describedby="x_MinMaxUOM_help">
<?= $Page->MinMaxUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MinMaxUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
    <div id="r_ExpiryMfrDateFormat" class="form-group row">
        <label id="elh_pharmacy_products_ExpiryMfrDateFormat" for="x_ExpiryMfrDateFormat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ExpiryMfrDateFormat->caption() ?><?= $Page->ExpiryMfrDateFormat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryMfrDateFormat">
<input type="<?= $Page->ExpiryMfrDateFormat->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ExpiryMfrDateFormat" name="x_ExpiryMfrDateFormat" id="x_ExpiryMfrDateFormat" size="30" placeholder="<?= HtmlEncode($Page->ExpiryMfrDateFormat->getPlaceHolder()) ?>" value="<?= $Page->ExpiryMfrDateFormat->EditValue ?>"<?= $Page->ExpiryMfrDateFormat->editAttributes() ?> aria-describedby="x_ExpiryMfrDateFormat_help">
<?= $Page->ExpiryMfrDateFormat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExpiryMfrDateFormat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductLifeTime->Visible) { // ProductLifeTime ?>
    <div id="r_ProductLifeTime" class="form-group row">
        <label id="elh_pharmacy_products_ProductLifeTime" for="x_ProductLifeTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductLifeTime->caption() ?><?= $Page->ProductLifeTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductLifeTime->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLifeTime">
<input type="<?= $Page->ProductLifeTime->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ProductLifeTime" name="x_ProductLifeTime" id="x_ProductLifeTime" size="30" placeholder="<?= HtmlEncode($Page->ProductLifeTime->getPlaceHolder()) ?>" value="<?= $Page->ProductLifeTime->EditValue ?>"<?= $Page->ProductLifeTime->editAttributes() ?> aria-describedby="x_ProductLifeTime_help">
<?= $Page->ProductLifeTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductLifeTime->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsCombo->Visible) { // IsCombo ?>
    <div id="r_IsCombo" class="form-group row">
        <label id="elh_pharmacy_products_IsCombo" for="x_IsCombo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IsCombo->caption() ?><?= $Page->IsCombo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsCombo->cellAttributes() ?>>
<span id="el_pharmacy_products_IsCombo">
<input type="<?= $Page->IsCombo->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IsCombo" name="x_IsCombo" id="x_IsCombo" size="30" placeholder="<?= HtmlEncode($Page->IsCombo->getPlaceHolder()) ?>" value="<?= $Page->IsCombo->EditValue ?>"<?= $Page->IsCombo->editAttributes() ?> aria-describedby="x_IsCombo_help">
<?= $Page->IsCombo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsCombo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ComboTypeCode->Visible) { // ComboTypeCode ?>
    <div id="r_ComboTypeCode" class="form-group row">
        <label id="elh_pharmacy_products_ComboTypeCode" for="x_ComboTypeCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ComboTypeCode->caption() ?><?= $Page->ComboTypeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ComboTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ComboTypeCode">
<input type="<?= $Page->ComboTypeCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ComboTypeCode" name="x_ComboTypeCode" id="x_ComboTypeCode" size="30" placeholder="<?= HtmlEncode($Page->ComboTypeCode->getPlaceHolder()) ?>" value="<?= $Page->ComboTypeCode->EditValue ?>"<?= $Page->ComboTypeCode->editAttributes() ?> aria-describedby="x_ComboTypeCode_help">
<?= $Page->ComboTypeCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ComboTypeCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount6->Visible) { // AttributeCount6 ?>
    <div id="r_AttributeCount6" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount6" for="x_AttributeCount6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount6->caption() ?><?= $Page->AttributeCount6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount6->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount6">
<input type="<?= $Page->AttributeCount6->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount6" name="x_AttributeCount6" id="x_AttributeCount6" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount6->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount6->EditValue ?>"<?= $Page->AttributeCount6->editAttributes() ?> aria-describedby="x_AttributeCount6_help">
<?= $Page->AttributeCount6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount7->Visible) { // AttributeCount7 ?>
    <div id="r_AttributeCount7" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount7" for="x_AttributeCount7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount7->caption() ?><?= $Page->AttributeCount7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount7->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount7">
<input type="<?= $Page->AttributeCount7->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount7" name="x_AttributeCount7" id="x_AttributeCount7" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount7->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount7->EditValue ?>"<?= $Page->AttributeCount7->editAttributes() ?> aria-describedby="x_AttributeCount7_help">
<?= $Page->AttributeCount7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount8->Visible) { // AttributeCount8 ?>
    <div id="r_AttributeCount8" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount8" for="x_AttributeCount8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount8->caption() ?><?= $Page->AttributeCount8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount8->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount8">
<input type="<?= $Page->AttributeCount8->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount8" name="x_AttributeCount8" id="x_AttributeCount8" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount8->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount8->EditValue ?>"<?= $Page->AttributeCount8->editAttributes() ?> aria-describedby="x_AttributeCount8_help">
<?= $Page->AttributeCount8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount9->Visible) { // AttributeCount9 ?>
    <div id="r_AttributeCount9" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount9" for="x_AttributeCount9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount9->caption() ?><?= $Page->AttributeCount9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount9->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount9">
<input type="<?= $Page->AttributeCount9->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount9" name="x_AttributeCount9" id="x_AttributeCount9" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount9->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount9->EditValue ?>"<?= $Page->AttributeCount9->editAttributes() ?> aria-describedby="x_AttributeCount9_help">
<?= $Page->AttributeCount9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AttributeCount10->Visible) { // AttributeCount10 ?>
    <div id="r_AttributeCount10" class="form-group row">
        <label id="elh_pharmacy_products_AttributeCount10" for="x_AttributeCount10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AttributeCount10->caption() ?><?= $Page->AttributeCount10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AttributeCount10->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount10">
<input type="<?= $Page->AttributeCount10->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AttributeCount10" name="x_AttributeCount10" id="x_AttributeCount10" size="30" placeholder="<?= HtmlEncode($Page->AttributeCount10->getPlaceHolder()) ?>" value="<?= $Page->AttributeCount10->EditValue ?>"<?= $Page->AttributeCount10->editAttributes() ?> aria-describedby="x_AttributeCount10_help">
<?= $Page->AttributeCount10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AttributeCount10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LabourCharge->Visible) { // LabourCharge ?>
    <div id="r_LabourCharge" class="form-group row">
        <label id="elh_pharmacy_products_LabourCharge" for="x_LabourCharge" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LabourCharge->caption() ?><?= $Page->LabourCharge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabourCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_LabourCharge">
<input type="<?= $Page->LabourCharge->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_LabourCharge" name="x_LabourCharge" id="x_LabourCharge" size="30" placeholder="<?= HtmlEncode($Page->LabourCharge->getPlaceHolder()) ?>" value="<?= $Page->LabourCharge->EditValue ?>"<?= $Page->LabourCharge->editAttributes() ?> aria-describedby="x_LabourCharge_help">
<?= $Page->LabourCharge->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LabourCharge->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
    <div id="r_AffectOtherCharge" class="form-group row">
        <label id="elh_pharmacy_products_AffectOtherCharge" for="x_AffectOtherCharge" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AffectOtherCharge->caption() ?><?= $Page->AffectOtherCharge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AffectOtherCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_AffectOtherCharge">
<input type="<?= $Page->AffectOtherCharge->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AffectOtherCharge" name="x_AffectOtherCharge" id="x_AffectOtherCharge" size="30" placeholder="<?= HtmlEncode($Page->AffectOtherCharge->getPlaceHolder()) ?>" value="<?= $Page->AffectOtherCharge->EditValue ?>"<?= $Page->AffectOtherCharge->editAttributes() ?> aria-describedby="x_AffectOtherCharge_help">
<?= $Page->AffectOtherCharge->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AffectOtherCharge->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DosageInfo->Visible) { // DosageInfo ?>
    <div id="r_DosageInfo" class="form-group row">
        <label id="elh_pharmacy_products_DosageInfo" for="x_DosageInfo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DosageInfo->caption() ?><?= $Page->DosageInfo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DosageInfo->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageInfo">
<input type="<?= $Page->DosageInfo->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DosageInfo" name="x_DosageInfo" id="x_DosageInfo" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DosageInfo->getPlaceHolder()) ?>" value="<?= $Page->DosageInfo->EditValue ?>"<?= $Page->DosageInfo->editAttributes() ?> aria-describedby="x_DosageInfo_help">
<?= $Page->DosageInfo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DosageInfo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DosageType->Visible) { // DosageType ?>
    <div id="r_DosageType" class="form-group row">
        <label id="elh_pharmacy_products_DosageType" for="x_DosageType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DosageType->caption() ?><?= $Page->DosageType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DosageType->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageType">
<input type="<?= $Page->DosageType->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DosageType" name="x_DosageType" id="x_DosageType" size="30" placeholder="<?= HtmlEncode($Page->DosageType->getPlaceHolder()) ?>" value="<?= $Page->DosageType->EditValue ?>"<?= $Page->DosageType->editAttributes() ?> aria-describedby="x_DosageType_help">
<?= $Page->DosageType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DosageType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
    <div id="r_DefaultIndentUOM" class="form-group row">
        <label id="elh_pharmacy_products_DefaultIndentUOM" for="x_DefaultIndentUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DefaultIndentUOM->caption() ?><?= $Page->DefaultIndentUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DefaultIndentUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultIndentUOM">
<input type="<?= $Page->DefaultIndentUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_DefaultIndentUOM" name="x_DefaultIndentUOM" id="x_DefaultIndentUOM" size="30" placeholder="<?= HtmlEncode($Page->DefaultIndentUOM->getPlaceHolder()) ?>" value="<?= $Page->DefaultIndentUOM->EditValue ?>"<?= $Page->DefaultIndentUOM->editAttributes() ?> aria-describedby="x_DefaultIndentUOM_help">
<?= $Page->DefaultIndentUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DefaultIndentUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PromoTag->Visible) { // PromoTag ?>
    <div id="r_PromoTag" class="form-group row">
        <label id="elh_pharmacy_products_PromoTag" for="x_PromoTag" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PromoTag->caption() ?><?= $Page->PromoTag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_PromoTag">
<input type="<?= $Page->PromoTag->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PromoTag" name="x_PromoTag" id="x_PromoTag" size="30" placeholder="<?= HtmlEncode($Page->PromoTag->getPlaceHolder()) ?>" value="<?= $Page->PromoTag->EditValue ?>"<?= $Page->PromoTag->editAttributes() ?> aria-describedby="x_PromoTag_help">
<?= $Page->PromoTag->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PromoTag->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
    <div id="r_BillLevelPromoTag" class="form-group row">
        <label id="elh_pharmacy_products_BillLevelPromoTag" for="x_BillLevelPromoTag" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillLevelPromoTag->caption() ?><?= $Page->BillLevelPromoTag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillLevelPromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_BillLevelPromoTag">
<input type="<?= $Page->BillLevelPromoTag->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_BillLevelPromoTag" name="x_BillLevelPromoTag" id="x_BillLevelPromoTag" size="30" placeholder="<?= HtmlEncode($Page->BillLevelPromoTag->getPlaceHolder()) ?>" value="<?= $Page->BillLevelPromoTag->EditValue ?>"<?= $Page->BillLevelPromoTag->editAttributes() ?> aria-describedby="x_BillLevelPromoTag_help">
<?= $Page->BillLevelPromoTag->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillLevelPromoTag->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsMRPProduct->Visible) { // IsMRPProduct ?>
    <div id="r_IsMRPProduct" class="form-group row">
        <label id="elh_pharmacy_products_IsMRPProduct" for="x_IsMRPProduct" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IsMRPProduct->caption() ?><?= $Page->IsMRPProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsMRPProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMRPProduct">
<input type="<?= $Page->IsMRPProduct->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_IsMRPProduct" name="x_IsMRPProduct" id="x_IsMRPProduct" size="30" placeholder="<?= HtmlEncode($Page->IsMRPProduct->getPlaceHolder()) ?>" value="<?= $Page->IsMRPProduct->EditValue ?>"<?= $Page->IsMRPProduct->editAttributes() ?> aria-describedby="x_IsMRPProduct_help">
<?= $Page->IsMRPProduct->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsMRPProduct->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MrpList->Visible) { // MrpList ?>
    <div id="r_MrpList" class="form-group row">
        <label id="elh_pharmacy_products_MrpList" for="x_MrpList" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MrpList->caption() ?><?= $Page->MrpList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MrpList->cellAttributes() ?>>
<span id="el_pharmacy_products_MrpList">
<textarea data-table="pharmacy_products" data-field="x_MrpList" name="x_MrpList" id="x_MrpList" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MrpList->getPlaceHolder()) ?>"<?= $Page->MrpList->editAttributes() ?> aria-describedby="x_MrpList_help"><?= $Page->MrpList->EditValue ?></textarea>
<?= $Page->MrpList->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MrpList->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
    <div id="r_AlternateSaleUOM" class="form-group row">
        <label id="elh_pharmacy_products_AlternateSaleUOM" for="x_AlternateSaleUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AlternateSaleUOM->caption() ?><?= $Page->AlternateSaleUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlternateSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSaleUOM">
<input type="<?= $Page->AlternateSaleUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AlternateSaleUOM" name="x_AlternateSaleUOM" id="x_AlternateSaleUOM" size="30" placeholder="<?= HtmlEncode($Page->AlternateSaleUOM->getPlaceHolder()) ?>" value="<?= $Page->AlternateSaleUOM->EditValue ?>"<?= $Page->AlternateSaleUOM->editAttributes() ?> aria-describedby="x_AlternateSaleUOM_help">
<?= $Page->AlternateSaleUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AlternateSaleUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeUOM->Visible) { // FreeUOM ?>
    <div id="r_FreeUOM" class="form-group row">
        <label id="elh_pharmacy_products_FreeUOM" for="x_FreeUOM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FreeUOM->caption() ?><?= $Page->FreeUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeUOM">
<input type="<?= $Page->FreeUOM->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FreeUOM" name="x_FreeUOM" id="x_FreeUOM" size="30" placeholder="<?= HtmlEncode($Page->FreeUOM->getPlaceHolder()) ?>" value="<?= $Page->FreeUOM->EditValue ?>"<?= $Page->FreeUOM->editAttributes() ?> aria-describedby="x_FreeUOM_help">
<?= $Page->FreeUOM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FreeUOM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MarketedCode->Visible) { // MarketedCode ?>
    <div id="r_MarketedCode" class="form-group row">
        <label id="elh_pharmacy_products_MarketedCode" for="x_MarketedCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MarketedCode->caption() ?><?= $Page->MarketedCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MarketedCode->cellAttributes() ?>>
<span id="el_pharmacy_products_MarketedCode">
<input type="<?= $Page->MarketedCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MarketedCode" name="x_MarketedCode" id="x_MarketedCode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->MarketedCode->getPlaceHolder()) ?>" value="<?= $Page->MarketedCode->EditValue ?>"<?= $Page->MarketedCode->editAttributes() ?> aria-describedby="x_MarketedCode_help">
<?= $Page->MarketedCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MarketedCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
    <div id="r_MinimumSalePrice" class="form-group row">
        <label id="elh_pharmacy_products_MinimumSalePrice" for="x_MinimumSalePrice" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MinimumSalePrice->caption() ?><?= $Page->MinimumSalePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MinimumSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumSalePrice">
<input type="<?= $Page->MinimumSalePrice->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_MinimumSalePrice" name="x_MinimumSalePrice" id="x_MinimumSalePrice" size="30" placeholder="<?= HtmlEncode($Page->MinimumSalePrice->getPlaceHolder()) ?>" value="<?= $Page->MinimumSalePrice->EditValue ?>"<?= $Page->MinimumSalePrice->editAttributes() ?> aria-describedby="x_MinimumSalePrice_help">
<?= $Page->MinimumSalePrice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MinimumSalePrice->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRate1->Visible) { // PRate1 ?>
    <div id="r_PRate1" class="form-group row">
        <label id="elh_pharmacy_products_PRate1" for="x_PRate1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRate1->caption() ?><?= $Page->PRate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate1">
<input type="<?= $Page->PRate1->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PRate1" name="x_PRate1" id="x_PRate1" size="30" placeholder="<?= HtmlEncode($Page->PRate1->getPlaceHolder()) ?>" value="<?= $Page->PRate1->EditValue ?>"<?= $Page->PRate1->editAttributes() ?> aria-describedby="x_PRate1_help">
<?= $Page->PRate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRate1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRate2->Visible) { // PRate2 ?>
    <div id="r_PRate2" class="form-group row">
        <label id="elh_pharmacy_products_PRate2" for="x_PRate2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRate2->caption() ?><?= $Page->PRate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate2">
<input type="<?= $Page->PRate2->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_PRate2" name="x_PRate2" id="x_PRate2" size="30" placeholder="<?= HtmlEncode($Page->PRate2->getPlaceHolder()) ?>" value="<?= $Page->PRate2->EditValue ?>"<?= $Page->PRate2->editAttributes() ?> aria-describedby="x_PRate2_help">
<?= $Page->PRate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRate2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LPItemCost->Visible) { // LPItemCost ?>
    <div id="r_LPItemCost" class="form-group row">
        <label id="elh_pharmacy_products_LPItemCost" for="x_LPItemCost" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LPItemCost->caption() ?><?= $Page->LPItemCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LPItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_LPItemCost">
<input type="<?= $Page->LPItemCost->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_LPItemCost" name="x_LPItemCost" id="x_LPItemCost" size="30" placeholder="<?= HtmlEncode($Page->LPItemCost->getPlaceHolder()) ?>" value="<?= $Page->LPItemCost->EditValue ?>"<?= $Page->LPItemCost->editAttributes() ?> aria-describedby="x_LPItemCost_help">
<?= $Page->LPItemCost->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LPItemCost->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FixedItemCost->Visible) { // FixedItemCost ?>
    <div id="r_FixedItemCost" class="form-group row">
        <label id="elh_pharmacy_products_FixedItemCost" for="x_FixedItemCost" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FixedItemCost->caption() ?><?= $Page->FixedItemCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FixedItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_FixedItemCost">
<input type="<?= $Page->FixedItemCost->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_FixedItemCost" name="x_FixedItemCost" id="x_FixedItemCost" size="30" placeholder="<?= HtmlEncode($Page->FixedItemCost->getPlaceHolder()) ?>" value="<?= $Page->FixedItemCost->EditValue ?>"<?= $Page->FixedItemCost->editAttributes() ?> aria-describedby="x_FixedItemCost_help">
<?= $Page->FixedItemCost->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FixedItemCost->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HSNId->Visible) { // HSNId ?>
    <div id="r_HSNId" class="form-group row">
        <label id="elh_pharmacy_products_HSNId" for="x_HSNId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HSNId->caption() ?><?= $Page->HSNId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSNId->cellAttributes() ?>>
<span id="el_pharmacy_products_HSNId">
<input type="<?= $Page->HSNId->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_HSNId" name="x_HSNId" id="x_HSNId" size="30" placeholder="<?= HtmlEncode($Page->HSNId->getPlaceHolder()) ?>" value="<?= $Page->HSNId->EditValue ?>"<?= $Page->HSNId->editAttributes() ?> aria-describedby="x_HSNId_help">
<?= $Page->HSNId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HSNId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TaxInclusive->Visible) { // TaxInclusive ?>
    <div id="r_TaxInclusive" class="form-group row">
        <label id="elh_pharmacy_products_TaxInclusive" for="x_TaxInclusive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TaxInclusive->caption() ?><?= $Page->TaxInclusive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TaxInclusive->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxInclusive">
<input type="<?= $Page->TaxInclusive->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_TaxInclusive" name="x_TaxInclusive" id="x_TaxInclusive" size="30" placeholder="<?= HtmlEncode($Page->TaxInclusive->getPlaceHolder()) ?>" value="<?= $Page->TaxInclusive->EditValue ?>"<?= $Page->TaxInclusive->editAttributes() ?> aria-describedby="x_TaxInclusive_help">
<?= $Page->TaxInclusive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TaxInclusive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
    <div id="r_EligibleforWarranty" class="form-group row">
        <label id="elh_pharmacy_products_EligibleforWarranty" for="x_EligibleforWarranty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EligibleforWarranty->caption() ?><?= $Page->EligibleforWarranty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EligibleforWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_EligibleforWarranty">
<input type="<?= $Page->EligibleforWarranty->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_EligibleforWarranty" name="x_EligibleforWarranty" id="x_EligibleforWarranty" size="30" placeholder="<?= HtmlEncode($Page->EligibleforWarranty->getPlaceHolder()) ?>" value="<?= $Page->EligibleforWarranty->EditValue ?>"<?= $Page->EligibleforWarranty->editAttributes() ?> aria-describedby="x_EligibleforWarranty_help">
<?= $Page->EligibleforWarranty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EligibleforWarranty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
    <div id="r_NoofMonthsWarranty" class="form-group row">
        <label id="elh_pharmacy_products_NoofMonthsWarranty" for="x_NoofMonthsWarranty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoofMonthsWarranty->caption() ?><?= $Page->NoofMonthsWarranty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_NoofMonthsWarranty">
<input type="<?= $Page->NoofMonthsWarranty->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_NoofMonthsWarranty" name="x_NoofMonthsWarranty" id="x_NoofMonthsWarranty" size="30" placeholder="<?= HtmlEncode($Page->NoofMonthsWarranty->getPlaceHolder()) ?>" value="<?= $Page->NoofMonthsWarranty->EditValue ?>"<?= $Page->NoofMonthsWarranty->editAttributes() ?> aria-describedby="x_NoofMonthsWarranty_help">
<?= $Page->NoofMonthsWarranty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoofMonthsWarranty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
    <div id="r_ComputeTaxonCost" class="form-group row">
        <label id="elh_pharmacy_products_ComputeTaxonCost" for="x_ComputeTaxonCost" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ComputeTaxonCost->caption() ?><?= $Page->ComputeTaxonCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ComputeTaxonCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputeTaxonCost">
<input type="<?= $Page->ComputeTaxonCost->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_ComputeTaxonCost" name="x_ComputeTaxonCost" id="x_ComputeTaxonCost" size="30" placeholder="<?= HtmlEncode($Page->ComputeTaxonCost->getPlaceHolder()) ?>" value="<?= $Page->ComputeTaxonCost->EditValue ?>"<?= $Page->ComputeTaxonCost->editAttributes() ?> aria-describedby="x_ComputeTaxonCost_help">
<?= $Page->ComputeTaxonCost->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ComputeTaxonCost->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
    <div id="r_HasEmptyBottleTrack" class="form-group row">
        <label id="elh_pharmacy_products_HasEmptyBottleTrack" for="x_HasEmptyBottleTrack" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HasEmptyBottleTrack->caption() ?><?= $Page->HasEmptyBottleTrack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el_pharmacy_products_HasEmptyBottleTrack">
<input type="<?= $Page->HasEmptyBottleTrack->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_HasEmptyBottleTrack" name="x_HasEmptyBottleTrack" id="x_HasEmptyBottleTrack" size="30" placeholder="<?= HtmlEncode($Page->HasEmptyBottleTrack->getPlaceHolder()) ?>" value="<?= $Page->HasEmptyBottleTrack->EditValue ?>"<?= $Page->HasEmptyBottleTrack->editAttributes() ?> aria-describedby="x_HasEmptyBottleTrack_help">
<?= $Page->HasEmptyBottleTrack->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HasEmptyBottleTrack->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
    <div id="r_EmptyBottleReferenceCode" class="form-group row">
        <label id="elh_pharmacy_products_EmptyBottleReferenceCode" for="x_EmptyBottleReferenceCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmptyBottleReferenceCode->caption() ?><?= $Page->EmptyBottleReferenceCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleReferenceCode">
<input type="<?= $Page->EmptyBottleReferenceCode->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_EmptyBottleReferenceCode" name="x_EmptyBottleReferenceCode" id="x_EmptyBottleReferenceCode" size="30" placeholder="<?= HtmlEncode($Page->EmptyBottleReferenceCode->getPlaceHolder()) ?>" value="<?= $Page->EmptyBottleReferenceCode->EditValue ?>"<?= $Page->EmptyBottleReferenceCode->editAttributes() ?> aria-describedby="x_EmptyBottleReferenceCode_help">
<?= $Page->EmptyBottleReferenceCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmptyBottleReferenceCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
    <div id="r_AdditionalCESSAmount" class="form-group row">
        <label id="elh_pharmacy_products_AdditionalCESSAmount" for="x_AdditionalCESSAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdditionalCESSAmount->caption() ?><?= $Page->AdditionalCESSAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_AdditionalCESSAmount">
<input type="<?= $Page->AdditionalCESSAmount->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_AdditionalCESSAmount" name="x_AdditionalCESSAmount" id="x_AdditionalCESSAmount" size="30" placeholder="<?= HtmlEncode($Page->AdditionalCESSAmount->getPlaceHolder()) ?>" value="<?= $Page->AdditionalCESSAmount->EditValue ?>"<?= $Page->AdditionalCESSAmount->editAttributes() ?> aria-describedby="x_AdditionalCESSAmount_help">
<?= $Page->AdditionalCESSAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdditionalCESSAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
    <div id="r_EmptyBottleRate" class="form-group row">
        <label id="elh_pharmacy_products_EmptyBottleRate" for="x_EmptyBottleRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmptyBottleRate->caption() ?><?= $Page->EmptyBottleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmptyBottleRate->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleRate">
<input type="<?= $Page->EmptyBottleRate->getInputTextType() ?>" data-table="pharmacy_products" data-field="x_EmptyBottleRate" name="x_EmptyBottleRate" id="x_EmptyBottleRate" size="30" placeholder="<?= HtmlEncode($Page->EmptyBottleRate->getPlaceHolder()) ?>" value="<?= $Page->EmptyBottleRate->EditValue ?>"<?= $Page->EmptyBottleRate->editAttributes() ?> aria-describedby="x_EmptyBottleRate_help">
<?= $Page->EmptyBottleRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmptyBottleRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("pharmacy_products");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyProductsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_productsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_productsdelete = currentForm = new ew.Form("fpharmacy_productsdelete", "delete");
    loadjs.done("fpharmacy_productsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_products) ew.vars.tables.pharmacy_products = <?= JsonEncode(GetClientVar("tables", "pharmacy_products")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_productsdelete" id="fpharmacy_productsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->ProductCode->Visible) { // ProductCode ?>
        <th class="<?= $Page->ProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode"><?= $Page->ProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductName->Visible) { // ProductName ?>
        <th class="<?= $Page->ProductName->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductName" class="pharmacy_products_ProductName"><?= $Page->ProductName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DivisionCode->Visible) { // DivisionCode ?>
        <th class="<?= $Page->DivisionCode->headerCellClass() ?>"><span id="elh_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode"><?= $Page->DivisionCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ManufacturerCode->Visible) { // ManufacturerCode ?>
        <th class="<?= $Page->ManufacturerCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode"><?= $Page->ManufacturerCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SupplierCode->Visible) { // SupplierCode ?>
        <th class="<?= $Page->SupplierCode->headerCellClass() ?>"><span id="elh_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode"><?= $Page->SupplierCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
        <th class="<?= $Page->AlternateSupplierCodes->headerCellClass() ?>"><span id="elh_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes"><?= $Page->AlternateSupplierCodes->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AlternateProductCode->Visible) { // AlternateProductCode ?>
        <th class="<?= $Page->AlternateProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode"><?= $Page->AlternateProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UniversalProductCode->Visible) { // UniversalProductCode ?>
        <th class="<?= $Page->UniversalProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode"><?= $Page->UniversalProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BookProductCode->Visible) { // BookProductCode ?>
        <th class="<?= $Page->BookProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode"><?= $Page->BookProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OldCode->Visible) { // OldCode ?>
        <th class="<?= $Page->OldCode->headerCellClass() ?>"><span id="elh_pharmacy_products_OldCode" class="pharmacy_products_OldCode"><?= $Page->OldCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProtectedProducts->Visible) { // ProtectedProducts ?>
        <th class="<?= $Page->ProtectedProducts->headerCellClass() ?>"><span id="elh_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts"><?= $Page->ProtectedProducts->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductFullName->Visible) { // ProductFullName ?>
        <th class="<?= $Page->ProductFullName->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName"><?= $Page->ProductFullName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
        <th class="<?= $Page->UnitOfMeasure->headerCellClass() ?>"><span id="elh_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure"><?= $Page->UnitOfMeasure->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UnitDescription->Visible) { // UnitDescription ?>
        <th class="<?= $Page->UnitDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription"><?= $Page->UnitDescription->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BulkDescription->Visible) { // BulkDescription ?>
        <th class="<?= $Page->BulkDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription"><?= $Page->BulkDescription->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BarCodeDescription->Visible) { // BarCodeDescription ?>
        <th class="<?= $Page->BarCodeDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription"><?= $Page->BarCodeDescription->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PackageInformation->Visible) { // PackageInformation ?>
        <th class="<?= $Page->PackageInformation->headerCellClass() ?>"><span id="elh_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation"><?= $Page->PackageInformation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PackageId->Visible) { // PackageId ?>
        <th class="<?= $Page->PackageId->headerCellClass() ?>"><span id="elh_pharmacy_products_PackageId" class="pharmacy_products_PackageId"><?= $Page->PackageId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
        <th class="<?= $Page->Weight->headerCellClass() ?>"><span id="elh_pharmacy_products_Weight" class="pharmacy_products_Weight"><?= $Page->Weight->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AllowFractions->Visible) { // AllowFractions ?>
        <th class="<?= $Page->AllowFractions->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions"><?= $Page->AllowFractions->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
        <th class="<?= $Page->MinimumStockLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel"><?= $Page->MinimumStockLevel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
        <th class="<?= $Page->MaximumStockLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel"><?= $Page->MaximumStockLevel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReorderLevel->Visible) { // ReorderLevel ?>
        <th class="<?= $Page->ReorderLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel"><?= $Page->ReorderLevel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MinMaxRatio->Visible) { // MinMaxRatio ?>
        <th class="<?= $Page->MinMaxRatio->headerCellClass() ?>"><span id="elh_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio"><?= $Page->MinMaxRatio->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
        <th class="<?= $Page->AutoMinMaxRatio->headerCellClass() ?>"><span id="elh_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio"><?= $Page->AutoMinMaxRatio->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ScheduleCode->Visible) { // ScheduleCode ?>
        <th class="<?= $Page->ScheduleCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode"><?= $Page->ScheduleCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RopRatio->Visible) { // RopRatio ?>
        <th class="<?= $Page->RopRatio->headerCellClass() ?>"><span id="elh_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio"><?= $Page->RopRatio->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><span id="elh_pharmacy_products_MRP" class="pharmacy_products_MRP"><?= $Page->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurchasePrice->Visible) { // PurchasePrice ?>
        <th class="<?= $Page->PurchasePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice"><?= $Page->PurchasePrice->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurchaseUnit->Visible) { // PurchaseUnit ?>
        <th class="<?= $Page->PurchaseUnit->headerCellClass() ?>"><span id="elh_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit"><?= $Page->PurchaseUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
        <th class="<?= $Page->PurchaseTaxCode->headerCellClass() ?>"><span id="elh_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode"><?= $Page->PurchaseTaxCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AllowDirectInward->Visible) { // AllowDirectInward ?>
        <th class="<?= $Page->AllowDirectInward->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward"><?= $Page->AllowDirectInward->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SalePrice->Visible) { // SalePrice ?>
        <th class="<?= $Page->SalePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice"><?= $Page->SalePrice->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SaleUnit->Visible) { // SaleUnit ?>
        <th class="<?= $Page->SaleUnit->headerCellClass() ?>"><span id="elh_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit"><?= $Page->SaleUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SalesTaxCode->Visible) { // SalesTaxCode ?>
        <th class="<?= $Page->SalesTaxCode->headerCellClass() ?>"><span id="elh_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode"><?= $Page->SalesTaxCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StockReceived->Visible) { // StockReceived ?>
        <th class="<?= $Page->StockReceived->headerCellClass() ?>"><span id="elh_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived"><?= $Page->StockReceived->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalStock->Visible) { // TotalStock ?>
        <th class="<?= $Page->TotalStock->headerCellClass() ?>"><span id="elh_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock"><?= $Page->TotalStock->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StockType->Visible) { // StockType ?>
        <th class="<?= $Page->StockType->headerCellClass() ?>"><span id="elh_pharmacy_products_StockType" class="pharmacy_products_StockType"><?= $Page->StockType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StockCheckDate->Visible) { // StockCheckDate ?>
        <th class="<?= $Page->StockCheckDate->headerCellClass() ?>"><span id="elh_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate"><?= $Page->StockCheckDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
        <th class="<?= $Page->StockAdjustmentDate->headerCellClass() ?>"><span id="elh_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate"><?= $Page->StockAdjustmentDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><span id="elh_pharmacy_products_Remarks" class="pharmacy_products_Remarks"><?= $Page->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CostCentre->Visible) { // CostCentre ?>
        <th class="<?= $Page->CostCentre->headerCellClass() ?>"><span id="elh_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre"><?= $Page->CostCentre->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
        <th class="<?= $Page->ProductType->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductType" class="pharmacy_products_ProductType"><?= $Page->ProductType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TaxAmount->Visible) { // TaxAmount ?>
        <th class="<?= $Page->TaxAmount->headerCellClass() ?>"><span id="elh_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount"><?= $Page->TaxAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TaxId->Visible) { // TaxId ?>
        <th class="<?= $Page->TaxId->headerCellClass() ?>"><span id="elh_pharmacy_products_TaxId" class="pharmacy_products_TaxId"><?= $Page->TaxId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
        <th class="<?= $Page->ResaleTaxApplicable->headerCellClass() ?>"><span id="elh_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable"><?= $Page->ResaleTaxApplicable->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CstOtherTax->Visible) { // CstOtherTax ?>
        <th class="<?= $Page->CstOtherTax->headerCellClass() ?>"><span id="elh_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax"><?= $Page->CstOtherTax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalTax->Visible) { // TotalTax ?>
        <th class="<?= $Page->TotalTax->headerCellClass() ?>"><span id="elh_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax"><?= $Page->TotalTax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ItemCost->Visible) { // ItemCost ?>
        <th class="<?= $Page->ItemCost->headerCellClass() ?>"><span id="elh_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost"><?= $Page->ItemCost->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ExpiryDate->Visible) { // ExpiryDate ?>
        <th class="<?= $Page->ExpiryDate->headerCellClass() ?>"><span id="elh_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate"><?= $Page->ExpiryDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BatchDescription->Visible) { // BatchDescription ?>
        <th class="<?= $Page->BatchDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription"><?= $Page->BatchDescription->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FreeScheme->Visible) { // FreeScheme ?>
        <th class="<?= $Page->FreeScheme->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme"><?= $Page->FreeScheme->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
        <th class="<?= $Page->CashDiscountEligibility->headerCellClass() ?>"><span id="elh_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility"><?= $Page->CashDiscountEligibility->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
        <th class="<?= $Page->DiscountPerAllowInBill->headerCellClass() ?>"><span id="elh_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill"><?= $Page->DiscountPerAllowInBill->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <th class="<?= $Page->Discount->headerCellClass() ?>"><span id="elh_pharmacy_products_Discount" class="pharmacy_products_Discount"><?= $Page->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <th class="<?= $Page->TotalAmount->headerCellClass() ?>"><span id="elh_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount"><?= $Page->TotalAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StandardMargin->Visible) { // StandardMargin ?>
        <th class="<?= $Page->StandardMargin->headerCellClass() ?>"><span id="elh_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin"><?= $Page->StandardMargin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Margin->Visible) { // Margin ?>
        <th class="<?= $Page->Margin->headerCellClass() ?>"><span id="elh_pharmacy_products_Margin" class="pharmacy_products_Margin"><?= $Page->Margin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MarginId->Visible) { // MarginId ?>
        <th class="<?= $Page->MarginId->headerCellClass() ?>"><span id="elh_pharmacy_products_MarginId" class="pharmacy_products_MarginId"><?= $Page->MarginId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ExpectedMargin->Visible) { // ExpectedMargin ?>
        <th class="<?= $Page->ExpectedMargin->headerCellClass() ?>"><span id="elh_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin"><?= $Page->ExpectedMargin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
        <th class="<?= $Page->SurchargeBeforeTax->headerCellClass() ?>"><span id="elh_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax"><?= $Page->SurchargeBeforeTax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
        <th class="<?= $Page->SurchargeAfterTax->headerCellClass() ?>"><span id="elh_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax"><?= $Page->SurchargeAfterTax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TempOrderNo->Visible) { // TempOrderNo ?>
        <th class="<?= $Page->TempOrderNo->headerCellClass() ?>"><span id="elh_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo"><?= $Page->TempOrderNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TempOrderDate->Visible) { // TempOrderDate ?>
        <th class="<?= $Page->TempOrderDate->headerCellClass() ?>"><span id="elh_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate"><?= $Page->TempOrderDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OrderUnit->Visible) { // OrderUnit ?>
        <th class="<?= $Page->OrderUnit->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit"><?= $Page->OrderUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OrderQuantity->Visible) { // OrderQuantity ?>
        <th class="<?= $Page->OrderQuantity->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity"><?= $Page->OrderQuantity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MarkForOrder->Visible) { // MarkForOrder ?>
        <th class="<?= $Page->MarkForOrder->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder"><?= $Page->MarkForOrder->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OrderAllId->Visible) { // OrderAllId ?>
        <th class="<?= $Page->OrderAllId->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId"><?= $Page->OrderAllId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
        <th class="<?= $Page->CalculateOrderQty->headerCellClass() ?>"><span id="elh_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty"><?= $Page->CalculateOrderQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SubLocation->Visible) { // SubLocation ?>
        <th class="<?= $Page->SubLocation->headerCellClass() ?>"><span id="elh_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation"><?= $Page->SubLocation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CategoryCode->Visible) { // CategoryCode ?>
        <th class="<?= $Page->CategoryCode->headerCellClass() ?>"><span id="elh_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode"><?= $Page->CategoryCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SubCategory->Visible) { // SubCategory ?>
        <th class="<?= $Page->SubCategory->headerCellClass() ?>"><span id="elh_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory"><?= $Page->SubCategory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
        <th class="<?= $Page->FlexCategoryCode->headerCellClass() ?>"><span id="elh_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode"><?= $Page->FlexCategoryCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ABCSaleQty->Visible) { // ABCSaleQty ?>
        <th class="<?= $Page->ABCSaleQty->headerCellClass() ?>"><span id="elh_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty"><?= $Page->ABCSaleQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ABCSaleValue->Visible) { // ABCSaleValue ?>
        <th class="<?= $Page->ABCSaleValue->headerCellClass() ?>"><span id="elh_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue"><?= $Page->ABCSaleValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ConvertionFactor->Visible) { // ConvertionFactor ?>
        <th class="<?= $Page->ConvertionFactor->headerCellClass() ?>"><span id="elh_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor"><?= $Page->ConvertionFactor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
        <th class="<?= $Page->ConvertionUnitDesc->headerCellClass() ?>"><span id="elh_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc"><?= $Page->ConvertionUnitDesc->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransactionId->Visible) { // TransactionId ?>
        <th class="<?= $Page->TransactionId->headerCellClass() ?>"><span id="elh_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId"><?= $Page->TransactionId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SoldProductId->Visible) { // SoldProductId ?>
        <th class="<?= $Page->SoldProductId->headerCellClass() ?>"><span id="elh_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId"><?= $Page->SoldProductId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WantedBookId->Visible) { // WantedBookId ?>
        <th class="<?= $Page->WantedBookId->headerCellClass() ?>"><span id="elh_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId"><?= $Page->WantedBookId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AllId->Visible) { // AllId ?>
        <th class="<?= $Page->AllId->headerCellClass() ?>"><span id="elh_pharmacy_products_AllId" class="pharmacy_products_AllId"><?= $Page->AllId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
        <th class="<?= $Page->BatchAndExpiryCompulsory->headerCellClass() ?>"><span id="elh_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory"><?= $Page->BatchAndExpiryCompulsory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
        <th class="<?= $Page->BatchStockForWantedBook->headerCellClass() ?>"><span id="elh_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook"><?= $Page->BatchStockForWantedBook->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
        <th class="<?= $Page->UnitBasedBilling->headerCellClass() ?>"><span id="elh_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling"><?= $Page->UnitBasedBilling->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
        <th class="<?= $Page->DoNotCheckStock->headerCellClass() ?>"><span id="elh_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock"><?= $Page->DoNotCheckStock->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AcceptRate->Visible) { // AcceptRate ?>
        <th class="<?= $Page->AcceptRate->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate"><?= $Page->AcceptRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PriceLevel->Visible) { // PriceLevel ?>
        <th class="<?= $Page->PriceLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel"><?= $Page->PriceLevel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LastQuotePrice->Visible) { // LastQuotePrice ?>
        <th class="<?= $Page->LastQuotePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice"><?= $Page->LastQuotePrice->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PriceChange->Visible) { // PriceChange ?>
        <th class="<?= $Page->PriceChange->headerCellClass() ?>"><span id="elh_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange"><?= $Page->PriceChange->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CommodityCode->Visible) { // CommodityCode ?>
        <th class="<?= $Page->CommodityCode->headerCellClass() ?>"><span id="elh_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode"><?= $Page->CommodityCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InstitutePrice->Visible) { // InstitutePrice ?>
        <th class="<?= $Page->InstitutePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice"><?= $Page->InstitutePrice->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
        <th class="<?= $Page->CtrlOrDCtrlProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct"><?= $Page->CtrlOrDCtrlProduct->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ImportedDate->Visible) { // ImportedDate ?>
        <th class="<?= $Page->ImportedDate->headerCellClass() ?>"><span id="elh_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate"><?= $Page->ImportedDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IsImported->Visible) { // IsImported ?>
        <th class="<?= $Page->IsImported->headerCellClass() ?>"><span id="elh_pharmacy_products_IsImported" class="pharmacy_products_IsImported"><?= $Page->IsImported->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FileName->Visible) { // FileName ?>
        <th class="<?= $Page->FileName->headerCellClass() ?>"><span id="elh_pharmacy_products_FileName" class="pharmacy_products_FileName"><?= $Page->FileName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GodownNumber->Visible) { // GodownNumber ?>
        <th class="<?= $Page->GodownNumber->headerCellClass() ?>"><span id="elh_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber"><?= $Page->GodownNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreationDate->Visible) { // CreationDate ?>
        <th class="<?= $Page->CreationDate->headerCellClass() ?>"><span id="elh_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate"><?= $Page->CreationDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedbyUser->Visible) { // CreatedbyUser ?>
        <th class="<?= $Page->CreatedbyUser->headerCellClass() ?>"><span id="elh_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser"><?= $Page->CreatedbyUser->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedDate->Visible) { // ModifiedDate ?>
        <th class="<?= $Page->ModifiedDate->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate"><?= $Page->ModifiedDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
        <th class="<?= $Page->ModifiedbyUser->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser"><?= $Page->ModifiedbyUser->caption() ?></span></th>
<?php } ?>
<?php if ($Page->isActive->Visible) { // isActive ?>
        <th class="<?= $Page->isActive->headerCellClass() ?>"><span id="elh_pharmacy_products_isActive" class="pharmacy_products_isActive"><?= $Page->isActive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
        <th class="<?= $Page->AllowExpiryClaim->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim"><?= $Page->AllowExpiryClaim->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BrandCode->Visible) { // BrandCode ?>
        <th class="<?= $Page->BrandCode->headerCellClass() ?>"><span id="elh_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode"><?= $Page->BrandCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
        <th class="<?= $Page->FreeSchemeBasedon->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon"><?= $Page->FreeSchemeBasedon->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
        <th class="<?= $Page->DoNotCheckCostInBill->headerCellClass() ?>"><span id="elh_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill"><?= $Page->DoNotCheckCostInBill->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductGroupCode->Visible) { // ProductGroupCode ?>
        <th class="<?= $Page->ProductGroupCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode"><?= $Page->ProductGroupCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
        <th class="<?= $Page->ProductStrengthCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode"><?= $Page->ProductStrengthCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PackingCode->Visible) { // PackingCode ?>
        <th class="<?= $Page->PackingCode->headerCellClass() ?>"><span id="elh_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode"><?= $Page->PackingCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ComputedMinStock->Visible) { // ComputedMinStock ?>
        <th class="<?= $Page->ComputedMinStock->headerCellClass() ?>"><span id="elh_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock"><?= $Page->ComputedMinStock->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
        <th class="<?= $Page->ComputedMaxStock->headerCellClass() ?>"><span id="elh_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock"><?= $Page->ComputedMaxStock->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductRemark->Visible) { // ProductRemark ?>
        <th class="<?= $Page->ProductRemark->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark"><?= $Page->ProductRemark->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductDrugCode->Visible) { // ProductDrugCode ?>
        <th class="<?= $Page->ProductDrugCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode"><?= $Page->ProductDrugCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
        <th class="<?= $Page->IsMatrixProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct"><?= $Page->IsMatrixProduct->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount1->Visible) { // AttributeCount1 ?>
        <th class="<?= $Page->AttributeCount1->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1"><?= $Page->AttributeCount1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount2->Visible) { // AttributeCount2 ?>
        <th class="<?= $Page->AttributeCount2->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2"><?= $Page->AttributeCount2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount3->Visible) { // AttributeCount3 ?>
        <th class="<?= $Page->AttributeCount3->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3"><?= $Page->AttributeCount3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount4->Visible) { // AttributeCount4 ?>
        <th class="<?= $Page->AttributeCount4->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4"><?= $Page->AttributeCount4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount5->Visible) { // AttributeCount5 ?>
        <th class="<?= $Page->AttributeCount5->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5"><?= $Page->AttributeCount5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
        <th class="<?= $Page->DefaultDiscountPercentage->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage"><?= $Page->DefaultDiscountPercentage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
        <th class="<?= $Page->DonotPrintBarcode->headerCellClass() ?>"><span id="elh_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode"><?= $Page->DonotPrintBarcode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
        <th class="<?= $Page->ProductLevelDiscount->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount"><?= $Page->ProductLevelDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Markup->Visible) { // Markup ?>
        <th class="<?= $Page->Markup->headerCellClass() ?>"><span id="elh_pharmacy_products_Markup" class="pharmacy_products_Markup"><?= $Page->Markup->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MarkDown->Visible) { // MarkDown ?>
        <th class="<?= $Page->MarkDown->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown"><?= $Page->MarkDown->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
        <th class="<?= $Page->ReworkSalePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice"><?= $Page->ReworkSalePrice->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MultipleInput->Visible) { // MultipleInput ?>
        <th class="<?= $Page->MultipleInput->headerCellClass() ?>"><span id="elh_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput"><?= $Page->MultipleInput->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LpPackageInformation->Visible) { // LpPackageInformation ?>
        <th class="<?= $Page->LpPackageInformation->headerCellClass() ?>"><span id="elh_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation"><?= $Page->LpPackageInformation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
        <th class="<?= $Page->AllowNegativeStock->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock"><?= $Page->AllowNegativeStock->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OrderDate->Visible) { // OrderDate ?>
        <th class="<?= $Page->OrderDate->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate"><?= $Page->OrderDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OrderTime->Visible) { // OrderTime ?>
        <th class="<?= $Page->OrderTime->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime"><?= $Page->OrderTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RateGroupCode->Visible) { // RateGroupCode ?>
        <th class="<?= $Page->RateGroupCode->headerCellClass() ?>"><span id="elh_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode"><?= $Page->RateGroupCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
        <th class="<?= $Page->ConversionCaseLot->headerCellClass() ?>"><span id="elh_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot"><?= $Page->ConversionCaseLot->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ShippingLot->Visible) { // ShippingLot ?>
        <th class="<?= $Page->ShippingLot->headerCellClass() ?>"><span id="elh_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot"><?= $Page->ShippingLot->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
        <th class="<?= $Page->AllowExpiryReplacement->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement"><?= $Page->AllowExpiryReplacement->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
        <th class="<?= $Page->NoOfMonthExpiryAllowed->headerCellClass() ?>"><span id="elh_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed"><?= $Page->NoOfMonthExpiryAllowed->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
        <th class="<?= $Page->ProductDiscountEligibility->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility"><?= $Page->ProductDiscountEligibility->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
        <th class="<?= $Page->ScheduleTypeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode"><?= $Page->ScheduleTypeCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
        <th class="<?= $Page->AIOCDProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode"><?= $Page->AIOCDProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FreeQuantity->Visible) { // FreeQuantity ?>
        <th class="<?= $Page->FreeQuantity->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity"><?= $Page->FreeQuantity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DiscountType->Visible) { // DiscountType ?>
        <th class="<?= $Page->DiscountType->headerCellClass() ?>"><span id="elh_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType"><?= $Page->DiscountType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DiscountValue->Visible) { // DiscountValue ?>
        <th class="<?= $Page->DiscountValue->headerCellClass() ?>"><span id="elh_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue"><?= $Page->DiscountValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
        <th class="<?= $Page->HasProductOrderAttribute->headerCellClass() ?>"><span id="elh_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute"><?= $Page->HasProductOrderAttribute->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FirstPODate->Visible) { // FirstPODate ?>
        <th class="<?= $Page->FirstPODate->headerCellClass() ?>"><span id="elh_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate"><?= $Page->FirstPODate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
        <th class="<?= $Page->SaleprcieAndMrpCalcPercent->headerCellClass() ?>"><span id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent"><?= $Page->SaleprcieAndMrpCalcPercent->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
        <th class="<?= $Page->IsGiftVoucherProducts->headerCellClass() ?>"><span id="elh_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts"><?= $Page->IsGiftVoucherProducts->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
        <th class="<?= $Page->AcceptRange4SerialNumber->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber"><?= $Page->AcceptRange4SerialNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
        <th class="<?= $Page->GiftVoucherDenomination->headerCellClass() ?>"><span id="elh_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination"><?= $Page->GiftVoucherDenomination->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Subclasscode->Visible) { // Subclasscode ?>
        <th class="<?= $Page->Subclasscode->headerCellClass() ?>"><span id="elh_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode"><?= $Page->Subclasscode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
        <th class="<?= $Page->BarCodeFromWeighingMachine->headerCellClass() ?>"><span id="elh_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine"><?= $Page->BarCodeFromWeighingMachine->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
        <th class="<?= $Page->CheckCostInReturn->headerCellClass() ?>"><span id="elh_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn"><?= $Page->CheckCostInReturn->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
        <th class="<?= $Page->FrequentSaleProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct"><?= $Page->FrequentSaleProduct->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RateType->Visible) { // RateType ?>
        <th class="<?= $Page->RateType->headerCellClass() ?>"><span id="elh_pharmacy_products_RateType" class="pharmacy_products_RateType"><?= $Page->RateType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TouchscreenName->Visible) { // TouchscreenName ?>
        <th class="<?= $Page->TouchscreenName->headerCellClass() ?>"><span id="elh_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName"><?= $Page->TouchscreenName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FreeType->Visible) { // FreeType ?>
        <th class="<?= $Page->FreeType->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeType" class="pharmacy_products_FreeType"><?= $Page->FreeType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
        <th class="<?= $Page->LooseQtyasNewBatch->headerCellClass() ?>"><span id="elh_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch"><?= $Page->LooseQtyasNewBatch->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
        <th class="<?= $Page->AllowSlabBilling->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling"><?= $Page->AllowSlabBilling->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
        <th class="<?= $Page->ProductTypeForProduction->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction"><?= $Page->ProductTypeForProduction->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RecipeCode->Visible) { // RecipeCode ?>
        <th class="<?= $Page->RecipeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode"><?= $Page->RecipeCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DefaultUnitType->Visible) { // DefaultUnitType ?>
        <th class="<?= $Page->DefaultUnitType->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType"><?= $Page->DefaultUnitType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PIstatus->Visible) { // PIstatus ?>
        <th class="<?= $Page->PIstatus->headerCellClass() ?>"><span id="elh_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus"><?= $Page->PIstatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
        <th class="<?= $Page->LastPiConfirmedDate->headerCellClass() ?>"><span id="elh_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate"><?= $Page->LastPiConfirmedDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BarCodeDesign->Visible) { // BarCodeDesign ?>
        <th class="<?= $Page->BarCodeDesign->headerCellClass() ?>"><span id="elh_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign"><?= $Page->BarCodeDesign->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
        <th class="<?= $Page->AcceptRemarksInBill->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill"><?= $Page->AcceptRemarksInBill->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Classification->Visible) { // Classification ?>
        <th class="<?= $Page->Classification->headerCellClass() ?>"><span id="elh_pharmacy_products_Classification" class="pharmacy_products_Classification"><?= $Page->Classification->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TimeSlot->Visible) { // TimeSlot ?>
        <th class="<?= $Page->TimeSlot->headerCellClass() ?>"><span id="elh_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot"><?= $Page->TimeSlot->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IsBundle->Visible) { // IsBundle ?>
        <th class="<?= $Page->IsBundle->headerCellClass() ?>"><span id="elh_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle"><?= $Page->IsBundle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ColorCode->Visible) { // ColorCode ?>
        <th class="<?= $Page->ColorCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode"><?= $Page->ColorCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GenderCode->Visible) { // GenderCode ?>
        <th class="<?= $Page->GenderCode->headerCellClass() ?>"><span id="elh_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode"><?= $Page->GenderCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SizeCode->Visible) { // SizeCode ?>
        <th class="<?= $Page->SizeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode"><?= $Page->SizeCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GiftCard->Visible) { // GiftCard ?>
        <th class="<?= $Page->GiftCard->headerCellClass() ?>"><span id="elh_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard"><?= $Page->GiftCard->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ToonLabel->Visible) { // ToonLabel ?>
        <th class="<?= $Page->ToonLabel->headerCellClass() ?>"><span id="elh_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel"><?= $Page->ToonLabel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GarmentType->Visible) { // GarmentType ?>
        <th class="<?= $Page->GarmentType->headerCellClass() ?>"><span id="elh_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType"><?= $Page->GarmentType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AgeGroup->Visible) { // AgeGroup ?>
        <th class="<?= $Page->AgeGroup->headerCellClass() ?>"><span id="elh_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup"><?= $Page->AgeGroup->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Season->Visible) { // Season ?>
        <th class="<?= $Page->Season->headerCellClass() ?>"><span id="elh_pharmacy_products_Season" class="pharmacy_products_Season"><?= $Page->Season->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DailyStockEntry->Visible) { // DailyStockEntry ?>
        <th class="<?= $Page->DailyStockEntry->headerCellClass() ?>"><span id="elh_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry"><?= $Page->DailyStockEntry->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifierApplicable->Visible) { // ModifierApplicable ?>
        <th class="<?= $Page->ModifierApplicable->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable"><?= $Page->ModifierApplicable->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifierType->Visible) { // ModifierType ?>
        <th class="<?= $Page->ModifierType->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType"><?= $Page->ModifierType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
        <th class="<?= $Page->AcceptZeroRate->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate"><?= $Page->AcceptZeroRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
        <th class="<?= $Page->ExciseDutyCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode"><?= $Page->ExciseDutyCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
        <th class="<?= $Page->IndentProductGroupCode->headerCellClass() ?>"><span id="elh_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode"><?= $Page->IndentProductGroupCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IsMultiBatch->Visible) { // IsMultiBatch ?>
        <th class="<?= $Page->IsMultiBatch->headerCellClass() ?>"><span id="elh_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch"><?= $Page->IsMultiBatch->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IsSingleBatch->Visible) { // IsSingleBatch ?>
        <th class="<?= $Page->IsSingleBatch->headerCellClass() ?>"><span id="elh_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch"><?= $Page->IsSingleBatch->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MarkUpRate1->Visible) { // MarkUpRate1 ?>
        <th class="<?= $Page->MarkUpRate1->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1"><?= $Page->MarkUpRate1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MarkDownRate1->Visible) { // MarkDownRate1 ?>
        <th class="<?= $Page->MarkDownRate1->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1"><?= $Page->MarkDownRate1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MarkUpRate2->Visible) { // MarkUpRate2 ?>
        <th class="<?= $Page->MarkUpRate2->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2"><?= $Page->MarkUpRate2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MarkDownRate2->Visible) { // MarkDownRate2 ?>
        <th class="<?= $Page->MarkDownRate2->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2"><?= $Page->MarkDownRate2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Yield->Visible) { // Yield ?>
        <th class="<?= $Page->_Yield->headerCellClass() ?>"><span id="elh_pharmacy_products__Yield" class="pharmacy_products__Yield"><?= $Page->_Yield->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RefProductCode->Visible) { // RefProductCode ?>
        <th class="<?= $Page->RefProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode"><?= $Page->RefProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <th class="<?= $Page->Volume->headerCellClass() ?>"><span id="elh_pharmacy_products_Volume" class="pharmacy_products_Volume"><?= $Page->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MeasurementID->Visible) { // MeasurementID ?>
        <th class="<?= $Page->MeasurementID->headerCellClass() ?>"><span id="elh_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID"><?= $Page->MeasurementID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CountryCode->Visible) { // CountryCode ?>
        <th class="<?= $Page->CountryCode->headerCellClass() ?>"><span id="elh_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode"><?= $Page->CountryCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AcceptWMQty->Visible) { // AcceptWMQty ?>
        <th class="<?= $Page->AcceptWMQty->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty"><?= $Page->AcceptWMQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
        <th class="<?= $Page->SingleBatchBasedOnRate->headerCellClass() ?>"><span id="elh_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate"><?= $Page->SingleBatchBasedOnRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TenderNo->Visible) { // TenderNo ?>
        <th class="<?= $Page->TenderNo->headerCellClass() ?>"><span id="elh_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo"><?= $Page->TenderNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
        <th class="<?= $Page->SingleBillMaximumSoldQtyFiled->headerCellClass() ?>"><span id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled"><?= $Page->SingleBillMaximumSoldQtyFiled->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <th class="<?= $Page->Strength1->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength1" class="pharmacy_products_Strength1"><?= $Page->Strength1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <th class="<?= $Page->Strength2->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength2" class="pharmacy_products_Strength2"><?= $Page->Strength2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <th class="<?= $Page->Strength3->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength3" class="pharmacy_products_Strength3"><?= $Page->Strength3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <th class="<?= $Page->Strength4->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength4" class="pharmacy_products_Strength4"><?= $Page->Strength4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <th class="<?= $Page->Strength5->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength5" class="pharmacy_products_Strength5"><?= $Page->Strength5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IngredientCode1->Visible) { // IngredientCode1 ?>
        <th class="<?= $Page->IngredientCode1->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1"><?= $Page->IngredientCode1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IngredientCode2->Visible) { // IngredientCode2 ?>
        <th class="<?= $Page->IngredientCode2->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2"><?= $Page->IngredientCode2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IngredientCode3->Visible) { // IngredientCode3 ?>
        <th class="<?= $Page->IngredientCode3->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3"><?= $Page->IngredientCode3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IngredientCode4->Visible) { // IngredientCode4 ?>
        <th class="<?= $Page->IngredientCode4->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4"><?= $Page->IngredientCode4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IngredientCode5->Visible) { // IngredientCode5 ?>
        <th class="<?= $Page->IngredientCode5->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5"><?= $Page->IngredientCode5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OrderType->Visible) { // OrderType ?>
        <th class="<?= $Page->OrderType->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderType" class="pharmacy_products_OrderType"><?= $Page->OrderType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StockUOM->Visible) { // StockUOM ?>
        <th class="<?= $Page->StockUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM"><?= $Page->StockUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PriceUOM->Visible) { // PriceUOM ?>
        <th class="<?= $Page->PriceUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM"><?= $Page->PriceUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
        <th class="<?= $Page->DefaultSaleUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM"><?= $Page->DefaultSaleUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
        <th class="<?= $Page->DefaultPurchaseUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM"><?= $Page->DefaultPurchaseUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReportingUOM->Visible) { // ReportingUOM ?>
        <th class="<?= $Page->ReportingUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM"><?= $Page->ReportingUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
        <th class="<?= $Page->LastPurchasedUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM"><?= $Page->LastPurchasedUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TreatmentCodes->Visible) { // TreatmentCodes ?>
        <th class="<?= $Page->TreatmentCodes->headerCellClass() ?>"><span id="elh_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes"><?= $Page->TreatmentCodes->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InsuranceType->Visible) { // InsuranceType ?>
        <th class="<?= $Page->InsuranceType->headerCellClass() ?>"><span id="elh_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType"><?= $Page->InsuranceType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
        <th class="<?= $Page->CoverageGroupCodes->headerCellClass() ?>"><span id="elh_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes"><?= $Page->CoverageGroupCodes->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MultipleUOM->Visible) { // MultipleUOM ?>
        <th class="<?= $Page->MultipleUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM"><?= $Page->MultipleUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SalePriceComputation->Visible) { // SalePriceComputation ?>
        <th class="<?= $Page->SalePriceComputation->headerCellClass() ?>"><span id="elh_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation"><?= $Page->SalePriceComputation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StockCorrection->Visible) { // StockCorrection ?>
        <th class="<?= $Page->StockCorrection->headerCellClass() ?>"><span id="elh_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection"><?= $Page->StockCorrection->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LBTPercentage->Visible) { // LBTPercentage ?>
        <th class="<?= $Page->LBTPercentage->headerCellClass() ?>"><span id="elh_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage"><?= $Page->LBTPercentage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SalesCommission->Visible) { // SalesCommission ?>
        <th class="<?= $Page->SalesCommission->headerCellClass() ?>"><span id="elh_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission"><?= $Page->SalesCommission->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LockedStock->Visible) { // LockedStock ?>
        <th class="<?= $Page->LockedStock->headerCellClass() ?>"><span id="elh_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock"><?= $Page->LockedStock->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MinMaxUOM->Visible) { // MinMaxUOM ?>
        <th class="<?= $Page->MinMaxUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM"><?= $Page->MinMaxUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
        <th class="<?= $Page->ExpiryMfrDateFormat->headerCellClass() ?>"><span id="elh_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat"><?= $Page->ExpiryMfrDateFormat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductLifeTime->Visible) { // ProductLifeTime ?>
        <th class="<?= $Page->ProductLifeTime->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime"><?= $Page->ProductLifeTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IsCombo->Visible) { // IsCombo ?>
        <th class="<?= $Page->IsCombo->headerCellClass() ?>"><span id="elh_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo"><?= $Page->IsCombo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ComboTypeCode->Visible) { // ComboTypeCode ?>
        <th class="<?= $Page->ComboTypeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode"><?= $Page->ComboTypeCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount6->Visible) { // AttributeCount6 ?>
        <th class="<?= $Page->AttributeCount6->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6"><?= $Page->AttributeCount6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount7->Visible) { // AttributeCount7 ?>
        <th class="<?= $Page->AttributeCount7->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7"><?= $Page->AttributeCount7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount8->Visible) { // AttributeCount8 ?>
        <th class="<?= $Page->AttributeCount8->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8"><?= $Page->AttributeCount8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount9->Visible) { // AttributeCount9 ?>
        <th class="<?= $Page->AttributeCount9->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9"><?= $Page->AttributeCount9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AttributeCount10->Visible) { // AttributeCount10 ?>
        <th class="<?= $Page->AttributeCount10->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10"><?= $Page->AttributeCount10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LabourCharge->Visible) { // LabourCharge ?>
        <th class="<?= $Page->LabourCharge->headerCellClass() ?>"><span id="elh_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge"><?= $Page->LabourCharge->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
        <th class="<?= $Page->AffectOtherCharge->headerCellClass() ?>"><span id="elh_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge"><?= $Page->AffectOtherCharge->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DosageInfo->Visible) { // DosageInfo ?>
        <th class="<?= $Page->DosageInfo->headerCellClass() ?>"><span id="elh_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo"><?= $Page->DosageInfo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DosageType->Visible) { // DosageType ?>
        <th class="<?= $Page->DosageType->headerCellClass() ?>"><span id="elh_pharmacy_products_DosageType" class="pharmacy_products_DosageType"><?= $Page->DosageType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
        <th class="<?= $Page->DefaultIndentUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM"><?= $Page->DefaultIndentUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PromoTag->Visible) { // PromoTag ?>
        <th class="<?= $Page->PromoTag->headerCellClass() ?>"><span id="elh_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag"><?= $Page->PromoTag->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
        <th class="<?= $Page->BillLevelPromoTag->headerCellClass() ?>"><span id="elh_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag"><?= $Page->BillLevelPromoTag->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IsMRPProduct->Visible) { // IsMRPProduct ?>
        <th class="<?= $Page->IsMRPProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct"><?= $Page->IsMRPProduct->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
        <th class="<?= $Page->AlternateSaleUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM"><?= $Page->AlternateSaleUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FreeUOM->Visible) { // FreeUOM ?>
        <th class="<?= $Page->FreeUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM"><?= $Page->FreeUOM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MarketedCode->Visible) { // MarketedCode ?>
        <th class="<?= $Page->MarketedCode->headerCellClass() ?>"><span id="elh_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode"><?= $Page->MarketedCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
        <th class="<?= $Page->MinimumSalePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice"><?= $Page->MinimumSalePrice->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRate1->Visible) { // PRate1 ?>
        <th class="<?= $Page->PRate1->headerCellClass() ?>"><span id="elh_pharmacy_products_PRate1" class="pharmacy_products_PRate1"><?= $Page->PRate1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRate2->Visible) { // PRate2 ?>
        <th class="<?= $Page->PRate2->headerCellClass() ?>"><span id="elh_pharmacy_products_PRate2" class="pharmacy_products_PRate2"><?= $Page->PRate2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LPItemCost->Visible) { // LPItemCost ?>
        <th class="<?= $Page->LPItemCost->headerCellClass() ?>"><span id="elh_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost"><?= $Page->LPItemCost->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FixedItemCost->Visible) { // FixedItemCost ?>
        <th class="<?= $Page->FixedItemCost->headerCellClass() ?>"><span id="elh_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost"><?= $Page->FixedItemCost->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HSNId->Visible) { // HSNId ?>
        <th class="<?= $Page->HSNId->headerCellClass() ?>"><span id="elh_pharmacy_products_HSNId" class="pharmacy_products_HSNId"><?= $Page->HSNId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TaxInclusive->Visible) { // TaxInclusive ?>
        <th class="<?= $Page->TaxInclusive->headerCellClass() ?>"><span id="elh_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive"><?= $Page->TaxInclusive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
        <th class="<?= $Page->EligibleforWarranty->headerCellClass() ?>"><span id="elh_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty"><?= $Page->EligibleforWarranty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
        <th class="<?= $Page->NoofMonthsWarranty->headerCellClass() ?>"><span id="elh_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty"><?= $Page->NoofMonthsWarranty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
        <th class="<?= $Page->ComputeTaxonCost->headerCellClass() ?>"><span id="elh_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost"><?= $Page->ComputeTaxonCost->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
        <th class="<?= $Page->HasEmptyBottleTrack->headerCellClass() ?>"><span id="elh_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack"><?= $Page->HasEmptyBottleTrack->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
        <th class="<?= $Page->EmptyBottleReferenceCode->headerCellClass() ?>"><span id="elh_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode"><?= $Page->EmptyBottleReferenceCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
        <th class="<?= $Page->AdditionalCESSAmount->headerCellClass() ?>"><span id="elh_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount"><?= $Page->AdditionalCESSAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
        <th class="<?= $Page->EmptyBottleRate->headerCellClass() ?>"><span id="elh_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate"><?= $Page->EmptyBottleRate->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->ProductCode->Visible) { // ProductCode ?>
        <td <?= $Page->ProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode">
<span<?= $Page->ProductCode->viewAttributes() ?>>
<?= $Page->ProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductName->Visible) { // ProductName ?>
        <td <?= $Page->ProductName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductName" class="pharmacy_products_ProductName">
<span<?= $Page->ProductName->viewAttributes() ?>>
<?= $Page->ProductName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DivisionCode->Visible) { // DivisionCode ?>
        <td <?= $Page->DivisionCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode">
<span<?= $Page->DivisionCode->viewAttributes() ?>>
<?= $Page->DivisionCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ManufacturerCode->Visible) { // ManufacturerCode ?>
        <td <?= $Page->ManufacturerCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode">
<span<?= $Page->ManufacturerCode->viewAttributes() ?>>
<?= $Page->ManufacturerCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SupplierCode->Visible) { // SupplierCode ?>
        <td <?= $Page->SupplierCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode">
<span<?= $Page->SupplierCode->viewAttributes() ?>>
<?= $Page->SupplierCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
        <td <?= $Page->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes">
<span<?= $Page->AlternateSupplierCodes->viewAttributes() ?>>
<?= $Page->AlternateSupplierCodes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AlternateProductCode->Visible) { // AlternateProductCode ?>
        <td <?= $Page->AlternateProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode">
<span<?= $Page->AlternateProductCode->viewAttributes() ?>>
<?= $Page->AlternateProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UniversalProductCode->Visible) { // UniversalProductCode ?>
        <td <?= $Page->UniversalProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode">
<span<?= $Page->UniversalProductCode->viewAttributes() ?>>
<?= $Page->UniversalProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BookProductCode->Visible) { // BookProductCode ?>
        <td <?= $Page->BookProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode">
<span<?= $Page->BookProductCode->viewAttributes() ?>>
<?= $Page->BookProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OldCode->Visible) { // OldCode ?>
        <td <?= $Page->OldCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OldCode" class="pharmacy_products_OldCode">
<span<?= $Page->OldCode->viewAttributes() ?>>
<?= $Page->OldCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProtectedProducts->Visible) { // ProtectedProducts ?>
        <td <?= $Page->ProtectedProducts->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts">
<span<?= $Page->ProtectedProducts->viewAttributes() ?>>
<?= $Page->ProtectedProducts->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductFullName->Visible) { // ProductFullName ?>
        <td <?= $Page->ProductFullName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName">
<span<?= $Page->ProductFullName->viewAttributes() ?>>
<?= $Page->ProductFullName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
        <td <?= $Page->UnitOfMeasure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure">
<span<?= $Page->UnitOfMeasure->viewAttributes() ?>>
<?= $Page->UnitOfMeasure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UnitDescription->Visible) { // UnitDescription ?>
        <td <?= $Page->UnitDescription->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription">
<span<?= $Page->UnitDescription->viewAttributes() ?>>
<?= $Page->UnitDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BulkDescription->Visible) { // BulkDescription ?>
        <td <?= $Page->BulkDescription->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription">
<span<?= $Page->BulkDescription->viewAttributes() ?>>
<?= $Page->BulkDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BarCodeDescription->Visible) { // BarCodeDescription ?>
        <td <?= $Page->BarCodeDescription->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription">
<span<?= $Page->BarCodeDescription->viewAttributes() ?>>
<?= $Page->BarCodeDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PackageInformation->Visible) { // PackageInformation ?>
        <td <?= $Page->PackageInformation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation">
<span<?= $Page->PackageInformation->viewAttributes() ?>>
<?= $Page->PackageInformation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PackageId->Visible) { // PackageId ?>
        <td <?= $Page->PackageId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PackageId" class="pharmacy_products_PackageId">
<span<?= $Page->PackageId->viewAttributes() ?>>
<?= $Page->PackageId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
        <td <?= $Page->Weight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Weight" class="pharmacy_products_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AllowFractions->Visible) { // AllowFractions ?>
        <td <?= $Page->AllowFractions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions">
<span<?= $Page->AllowFractions->viewAttributes() ?>>
<?= $Page->AllowFractions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
        <td <?= $Page->MinimumStockLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel">
<span<?= $Page->MinimumStockLevel->viewAttributes() ?>>
<?= $Page->MinimumStockLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
        <td <?= $Page->MaximumStockLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel">
<span<?= $Page->MaximumStockLevel->viewAttributes() ?>>
<?= $Page->MaximumStockLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReorderLevel->Visible) { // ReorderLevel ?>
        <td <?= $Page->ReorderLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel">
<span<?= $Page->ReorderLevel->viewAttributes() ?>>
<?= $Page->ReorderLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MinMaxRatio->Visible) { // MinMaxRatio ?>
        <td <?= $Page->MinMaxRatio->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio">
<span<?= $Page->MinMaxRatio->viewAttributes() ?>>
<?= $Page->MinMaxRatio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
        <td <?= $Page->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio">
<span<?= $Page->AutoMinMaxRatio->viewAttributes() ?>>
<?= $Page->AutoMinMaxRatio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ScheduleCode->Visible) { // ScheduleCode ?>
        <td <?= $Page->ScheduleCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode">
<span<?= $Page->ScheduleCode->viewAttributes() ?>>
<?= $Page->ScheduleCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RopRatio->Visible) { // RopRatio ?>
        <td <?= $Page->RopRatio->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio">
<span<?= $Page->RopRatio->viewAttributes() ?>>
<?= $Page->RopRatio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <td <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MRP" class="pharmacy_products_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurchasePrice->Visible) { // PurchasePrice ?>
        <td <?= $Page->PurchasePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice">
<span<?= $Page->PurchasePrice->viewAttributes() ?>>
<?= $Page->PurchasePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurchaseUnit->Visible) { // PurchaseUnit ?>
        <td <?= $Page->PurchaseUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit">
<span<?= $Page->PurchaseUnit->viewAttributes() ?>>
<?= $Page->PurchaseUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
        <td <?= $Page->PurchaseTaxCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode">
<span<?= $Page->PurchaseTaxCode->viewAttributes() ?>>
<?= $Page->PurchaseTaxCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AllowDirectInward->Visible) { // AllowDirectInward ?>
        <td <?= $Page->AllowDirectInward->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward">
<span<?= $Page->AllowDirectInward->viewAttributes() ?>>
<?= $Page->AllowDirectInward->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SalePrice->Visible) { // SalePrice ?>
        <td <?= $Page->SalePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice">
<span<?= $Page->SalePrice->viewAttributes() ?>>
<?= $Page->SalePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SaleUnit->Visible) { // SaleUnit ?>
        <td <?= $Page->SaleUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit">
<span<?= $Page->SaleUnit->viewAttributes() ?>>
<?= $Page->SaleUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SalesTaxCode->Visible) { // SalesTaxCode ?>
        <td <?= $Page->SalesTaxCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode">
<span<?= $Page->SalesTaxCode->viewAttributes() ?>>
<?= $Page->SalesTaxCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StockReceived->Visible) { // StockReceived ?>
        <td <?= $Page->StockReceived->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived">
<span<?= $Page->StockReceived->viewAttributes() ?>>
<?= $Page->StockReceived->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalStock->Visible) { // TotalStock ?>
        <td <?= $Page->TotalStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock">
<span<?= $Page->TotalStock->viewAttributes() ?>>
<?= $Page->TotalStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StockType->Visible) { // StockType ?>
        <td <?= $Page->StockType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockType" class="pharmacy_products_StockType">
<span<?= $Page->StockType->viewAttributes() ?>>
<?= $Page->StockType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StockCheckDate->Visible) { // StockCheckDate ?>
        <td <?= $Page->StockCheckDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate">
<span<?= $Page->StockCheckDate->viewAttributes() ?>>
<?= $Page->StockCheckDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
        <td <?= $Page->StockAdjustmentDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate">
<span<?= $Page->StockAdjustmentDate->viewAttributes() ?>>
<?= $Page->StockAdjustmentDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Remarks" class="pharmacy_products_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CostCentre->Visible) { // CostCentre ?>
        <td <?= $Page->CostCentre->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre">
<span<?= $Page->CostCentre->viewAttributes() ?>>
<?= $Page->CostCentre->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
        <td <?= $Page->ProductType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductType" class="pharmacy_products_ProductType">
<span<?= $Page->ProductType->viewAttributes() ?>>
<?= $Page->ProductType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TaxAmount->Visible) { // TaxAmount ?>
        <td <?= $Page->TaxAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount">
<span<?= $Page->TaxAmount->viewAttributes() ?>>
<?= $Page->TaxAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TaxId->Visible) { // TaxId ?>
        <td <?= $Page->TaxId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TaxId" class="pharmacy_products_TaxId">
<span<?= $Page->TaxId->viewAttributes() ?>>
<?= $Page->TaxId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
        <td <?= $Page->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable">
<span<?= $Page->ResaleTaxApplicable->viewAttributes() ?>>
<?= $Page->ResaleTaxApplicable->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CstOtherTax->Visible) { // CstOtherTax ?>
        <td <?= $Page->CstOtherTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax">
<span<?= $Page->CstOtherTax->viewAttributes() ?>>
<?= $Page->CstOtherTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalTax->Visible) { // TotalTax ?>
        <td <?= $Page->TotalTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax">
<span<?= $Page->TotalTax->viewAttributes() ?>>
<?= $Page->TotalTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ItemCost->Visible) { // ItemCost ?>
        <td <?= $Page->ItemCost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost">
<span<?= $Page->ItemCost->viewAttributes() ?>>
<?= $Page->ItemCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ExpiryDate->Visible) { // ExpiryDate ?>
        <td <?= $Page->ExpiryDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate">
<span<?= $Page->ExpiryDate->viewAttributes() ?>>
<?= $Page->ExpiryDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BatchDescription->Visible) { // BatchDescription ?>
        <td <?= $Page->BatchDescription->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription">
<span<?= $Page->BatchDescription->viewAttributes() ?>>
<?= $Page->BatchDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FreeScheme->Visible) { // FreeScheme ?>
        <td <?= $Page->FreeScheme->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme">
<span<?= $Page->FreeScheme->viewAttributes() ?>>
<?= $Page->FreeScheme->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
        <td <?= $Page->CashDiscountEligibility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility">
<span<?= $Page->CashDiscountEligibility->viewAttributes() ?>>
<?= $Page->CashDiscountEligibility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
        <td <?= $Page->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill">
<span<?= $Page->DiscountPerAllowInBill->viewAttributes() ?>>
<?= $Page->DiscountPerAllowInBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <td <?= $Page->Discount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Discount" class="pharmacy_products_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <td <?= $Page->TotalAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount">
<span<?= $Page->TotalAmount->viewAttributes() ?>>
<?= $Page->TotalAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StandardMargin->Visible) { // StandardMargin ?>
        <td <?= $Page->StandardMargin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin">
<span<?= $Page->StandardMargin->viewAttributes() ?>>
<?= $Page->StandardMargin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Margin->Visible) { // Margin ?>
        <td <?= $Page->Margin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Margin" class="pharmacy_products_Margin">
<span<?= $Page->Margin->viewAttributes() ?>>
<?= $Page->Margin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MarginId->Visible) { // MarginId ?>
        <td <?= $Page->MarginId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarginId" class="pharmacy_products_MarginId">
<span<?= $Page->MarginId->viewAttributes() ?>>
<?= $Page->MarginId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ExpectedMargin->Visible) { // ExpectedMargin ?>
        <td <?= $Page->ExpectedMargin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin">
<span<?= $Page->ExpectedMargin->viewAttributes() ?>>
<?= $Page->ExpectedMargin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
        <td <?= $Page->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax">
<span<?= $Page->SurchargeBeforeTax->viewAttributes() ?>>
<?= $Page->SurchargeBeforeTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
        <td <?= $Page->SurchargeAfterTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax">
<span<?= $Page->SurchargeAfterTax->viewAttributes() ?>>
<?= $Page->SurchargeAfterTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TempOrderNo->Visible) { // TempOrderNo ?>
        <td <?= $Page->TempOrderNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo">
<span<?= $Page->TempOrderNo->viewAttributes() ?>>
<?= $Page->TempOrderNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TempOrderDate->Visible) { // TempOrderDate ?>
        <td <?= $Page->TempOrderDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate">
<span<?= $Page->TempOrderDate->viewAttributes() ?>>
<?= $Page->TempOrderDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OrderUnit->Visible) { // OrderUnit ?>
        <td <?= $Page->OrderUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit">
<span<?= $Page->OrderUnit->viewAttributes() ?>>
<?= $Page->OrderUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OrderQuantity->Visible) { // OrderQuantity ?>
        <td <?= $Page->OrderQuantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity">
<span<?= $Page->OrderQuantity->viewAttributes() ?>>
<?= $Page->OrderQuantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MarkForOrder->Visible) { // MarkForOrder ?>
        <td <?= $Page->MarkForOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder">
<span<?= $Page->MarkForOrder->viewAttributes() ?>>
<?= $Page->MarkForOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OrderAllId->Visible) { // OrderAllId ?>
        <td <?= $Page->OrderAllId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId">
<span<?= $Page->OrderAllId->viewAttributes() ?>>
<?= $Page->OrderAllId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
        <td <?= $Page->CalculateOrderQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty">
<span<?= $Page->CalculateOrderQty->viewAttributes() ?>>
<?= $Page->CalculateOrderQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SubLocation->Visible) { // SubLocation ?>
        <td <?= $Page->SubLocation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation">
<span<?= $Page->SubLocation->viewAttributes() ?>>
<?= $Page->SubLocation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CategoryCode->Visible) { // CategoryCode ?>
        <td <?= $Page->CategoryCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode">
<span<?= $Page->CategoryCode->viewAttributes() ?>>
<?= $Page->CategoryCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SubCategory->Visible) { // SubCategory ?>
        <td <?= $Page->SubCategory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory">
<span<?= $Page->SubCategory->viewAttributes() ?>>
<?= $Page->SubCategory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
        <td <?= $Page->FlexCategoryCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode">
<span<?= $Page->FlexCategoryCode->viewAttributes() ?>>
<?= $Page->FlexCategoryCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ABCSaleQty->Visible) { // ABCSaleQty ?>
        <td <?= $Page->ABCSaleQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty">
<span<?= $Page->ABCSaleQty->viewAttributes() ?>>
<?= $Page->ABCSaleQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ABCSaleValue->Visible) { // ABCSaleValue ?>
        <td <?= $Page->ABCSaleValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue">
<span<?= $Page->ABCSaleValue->viewAttributes() ?>>
<?= $Page->ABCSaleValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ConvertionFactor->Visible) { // ConvertionFactor ?>
        <td <?= $Page->ConvertionFactor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor">
<span<?= $Page->ConvertionFactor->viewAttributes() ?>>
<?= $Page->ConvertionFactor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
        <td <?= $Page->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc">
<span<?= $Page->ConvertionUnitDesc->viewAttributes() ?>>
<?= $Page->ConvertionUnitDesc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TransactionId->Visible) { // TransactionId ?>
        <td <?= $Page->TransactionId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId">
<span<?= $Page->TransactionId->viewAttributes() ?>>
<?= $Page->TransactionId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SoldProductId->Visible) { // SoldProductId ?>
        <td <?= $Page->SoldProductId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId">
<span<?= $Page->SoldProductId->viewAttributes() ?>>
<?= $Page->SoldProductId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WantedBookId->Visible) { // WantedBookId ?>
        <td <?= $Page->WantedBookId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId">
<span<?= $Page->WantedBookId->viewAttributes() ?>>
<?= $Page->WantedBookId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AllId->Visible) { // AllId ?>
        <td <?= $Page->AllId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllId" class="pharmacy_products_AllId">
<span<?= $Page->AllId->viewAttributes() ?>>
<?= $Page->AllId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
        <td <?= $Page->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory">
<span<?= $Page->BatchAndExpiryCompulsory->viewAttributes() ?>>
<?= $Page->BatchAndExpiryCompulsory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
        <td <?= $Page->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook">
<span<?= $Page->BatchStockForWantedBook->viewAttributes() ?>>
<?= $Page->BatchStockForWantedBook->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
        <td <?= $Page->UnitBasedBilling->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling">
<span<?= $Page->UnitBasedBilling->viewAttributes() ?>>
<?= $Page->UnitBasedBilling->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
        <td <?= $Page->DoNotCheckStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock">
<span<?= $Page->DoNotCheckStock->viewAttributes() ?>>
<?= $Page->DoNotCheckStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AcceptRate->Visible) { // AcceptRate ?>
        <td <?= $Page->AcceptRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate">
<span<?= $Page->AcceptRate->viewAttributes() ?>>
<?= $Page->AcceptRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PriceLevel->Visible) { // PriceLevel ?>
        <td <?= $Page->PriceLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel">
<span<?= $Page->PriceLevel->viewAttributes() ?>>
<?= $Page->PriceLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LastQuotePrice->Visible) { // LastQuotePrice ?>
        <td <?= $Page->LastQuotePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice">
<span<?= $Page->LastQuotePrice->viewAttributes() ?>>
<?= $Page->LastQuotePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PriceChange->Visible) { // PriceChange ?>
        <td <?= $Page->PriceChange->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange">
<span<?= $Page->PriceChange->viewAttributes() ?>>
<?= $Page->PriceChange->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CommodityCode->Visible) { // CommodityCode ?>
        <td <?= $Page->CommodityCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode">
<span<?= $Page->CommodityCode->viewAttributes() ?>>
<?= $Page->CommodityCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InstitutePrice->Visible) { // InstitutePrice ?>
        <td <?= $Page->InstitutePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice">
<span<?= $Page->InstitutePrice->viewAttributes() ?>>
<?= $Page->InstitutePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
        <td <?= $Page->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct">
<span<?= $Page->CtrlOrDCtrlProduct->viewAttributes() ?>>
<?= $Page->CtrlOrDCtrlProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ImportedDate->Visible) { // ImportedDate ?>
        <td <?= $Page->ImportedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate">
<span<?= $Page->ImportedDate->viewAttributes() ?>>
<?= $Page->ImportedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IsImported->Visible) { // IsImported ?>
        <td <?= $Page->IsImported->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsImported" class="pharmacy_products_IsImported">
<span<?= $Page->IsImported->viewAttributes() ?>>
<?= $Page->IsImported->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FileName->Visible) { // FileName ?>
        <td <?= $Page->FileName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FileName" class="pharmacy_products_FileName">
<span<?= $Page->FileName->viewAttributes() ?>>
<?= $Page->FileName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GodownNumber->Visible) { // GodownNumber ?>
        <td <?= $Page->GodownNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber">
<span<?= $Page->GodownNumber->viewAttributes() ?>>
<?= $Page->GodownNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreationDate->Visible) { // CreationDate ?>
        <td <?= $Page->CreationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate">
<span<?= $Page->CreationDate->viewAttributes() ?>>
<?= $Page->CreationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedbyUser->Visible) { // CreatedbyUser ?>
        <td <?= $Page->CreatedbyUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser">
<span<?= $Page->CreatedbyUser->viewAttributes() ?>>
<?= $Page->CreatedbyUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedDate->Visible) { // ModifiedDate ?>
        <td <?= $Page->ModifiedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate">
<span<?= $Page->ModifiedDate->viewAttributes() ?>>
<?= $Page->ModifiedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
        <td <?= $Page->ModifiedbyUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser">
<span<?= $Page->ModifiedbyUser->viewAttributes() ?>>
<?= $Page->ModifiedbyUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->isActive->Visible) { // isActive ?>
        <td <?= $Page->isActive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_isActive" class="pharmacy_products_isActive">
<span<?= $Page->isActive->viewAttributes() ?>>
<?= $Page->isActive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
        <td <?= $Page->AllowExpiryClaim->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim">
<span<?= $Page->AllowExpiryClaim->viewAttributes() ?>>
<?= $Page->AllowExpiryClaim->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BrandCode->Visible) { // BrandCode ?>
        <td <?= $Page->BrandCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode">
<span<?= $Page->BrandCode->viewAttributes() ?>>
<?= $Page->BrandCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
        <td <?= $Page->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon">
<span<?= $Page->FreeSchemeBasedon->viewAttributes() ?>>
<?= $Page->FreeSchemeBasedon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
        <td <?= $Page->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill">
<span<?= $Page->DoNotCheckCostInBill->viewAttributes() ?>>
<?= $Page->DoNotCheckCostInBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductGroupCode->Visible) { // ProductGroupCode ?>
        <td <?= $Page->ProductGroupCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode">
<span<?= $Page->ProductGroupCode->viewAttributes() ?>>
<?= $Page->ProductGroupCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
        <td <?= $Page->ProductStrengthCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode">
<span<?= $Page->ProductStrengthCode->viewAttributes() ?>>
<?= $Page->ProductStrengthCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PackingCode->Visible) { // PackingCode ?>
        <td <?= $Page->PackingCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode">
<span<?= $Page->PackingCode->viewAttributes() ?>>
<?= $Page->PackingCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ComputedMinStock->Visible) { // ComputedMinStock ?>
        <td <?= $Page->ComputedMinStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock">
<span<?= $Page->ComputedMinStock->viewAttributes() ?>>
<?= $Page->ComputedMinStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
        <td <?= $Page->ComputedMaxStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock">
<span<?= $Page->ComputedMaxStock->viewAttributes() ?>>
<?= $Page->ComputedMaxStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductRemark->Visible) { // ProductRemark ?>
        <td <?= $Page->ProductRemark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark">
<span<?= $Page->ProductRemark->viewAttributes() ?>>
<?= $Page->ProductRemark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductDrugCode->Visible) { // ProductDrugCode ?>
        <td <?= $Page->ProductDrugCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode">
<span<?= $Page->ProductDrugCode->viewAttributes() ?>>
<?= $Page->ProductDrugCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
        <td <?= $Page->IsMatrixProduct->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct">
<span<?= $Page->IsMatrixProduct->viewAttributes() ?>>
<?= $Page->IsMatrixProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount1->Visible) { // AttributeCount1 ?>
        <td <?= $Page->AttributeCount1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1">
<span<?= $Page->AttributeCount1->viewAttributes() ?>>
<?= $Page->AttributeCount1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount2->Visible) { // AttributeCount2 ?>
        <td <?= $Page->AttributeCount2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2">
<span<?= $Page->AttributeCount2->viewAttributes() ?>>
<?= $Page->AttributeCount2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount3->Visible) { // AttributeCount3 ?>
        <td <?= $Page->AttributeCount3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3">
<span<?= $Page->AttributeCount3->viewAttributes() ?>>
<?= $Page->AttributeCount3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount4->Visible) { // AttributeCount4 ?>
        <td <?= $Page->AttributeCount4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4">
<span<?= $Page->AttributeCount4->viewAttributes() ?>>
<?= $Page->AttributeCount4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount5->Visible) { // AttributeCount5 ?>
        <td <?= $Page->AttributeCount5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5">
<span<?= $Page->AttributeCount5->viewAttributes() ?>>
<?= $Page->AttributeCount5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
        <td <?= $Page->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage">
<span<?= $Page->DefaultDiscountPercentage->viewAttributes() ?>>
<?= $Page->DefaultDiscountPercentage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
        <td <?= $Page->DonotPrintBarcode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode">
<span<?= $Page->DonotPrintBarcode->viewAttributes() ?>>
<?= $Page->DonotPrintBarcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
        <td <?= $Page->ProductLevelDiscount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount">
<span<?= $Page->ProductLevelDiscount->viewAttributes() ?>>
<?= $Page->ProductLevelDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Markup->Visible) { // Markup ?>
        <td <?= $Page->Markup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Markup" class="pharmacy_products_Markup">
<span<?= $Page->Markup->viewAttributes() ?>>
<?= $Page->Markup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MarkDown->Visible) { // MarkDown ?>
        <td <?= $Page->MarkDown->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown">
<span<?= $Page->MarkDown->viewAttributes() ?>>
<?= $Page->MarkDown->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
        <td <?= $Page->ReworkSalePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice">
<span<?= $Page->ReworkSalePrice->viewAttributes() ?>>
<?= $Page->ReworkSalePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MultipleInput->Visible) { // MultipleInput ?>
        <td <?= $Page->MultipleInput->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput">
<span<?= $Page->MultipleInput->viewAttributes() ?>>
<?= $Page->MultipleInput->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LpPackageInformation->Visible) { // LpPackageInformation ?>
        <td <?= $Page->LpPackageInformation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation">
<span<?= $Page->LpPackageInformation->viewAttributes() ?>>
<?= $Page->LpPackageInformation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
        <td <?= $Page->AllowNegativeStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock">
<span<?= $Page->AllowNegativeStock->viewAttributes() ?>>
<?= $Page->AllowNegativeStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OrderDate->Visible) { // OrderDate ?>
        <td <?= $Page->OrderDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate">
<span<?= $Page->OrderDate->viewAttributes() ?>>
<?= $Page->OrderDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OrderTime->Visible) { // OrderTime ?>
        <td <?= $Page->OrderTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime">
<span<?= $Page->OrderTime->viewAttributes() ?>>
<?= $Page->OrderTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RateGroupCode->Visible) { // RateGroupCode ?>
        <td <?= $Page->RateGroupCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode">
<span<?= $Page->RateGroupCode->viewAttributes() ?>>
<?= $Page->RateGroupCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
        <td <?= $Page->ConversionCaseLot->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot">
<span<?= $Page->ConversionCaseLot->viewAttributes() ?>>
<?= $Page->ConversionCaseLot->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ShippingLot->Visible) { // ShippingLot ?>
        <td <?= $Page->ShippingLot->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot">
<span<?= $Page->ShippingLot->viewAttributes() ?>>
<?= $Page->ShippingLot->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
        <td <?= $Page->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement">
<span<?= $Page->AllowExpiryReplacement->viewAttributes() ?>>
<?= $Page->AllowExpiryReplacement->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
        <td <?= $Page->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed">
<span<?= $Page->NoOfMonthExpiryAllowed->viewAttributes() ?>>
<?= $Page->NoOfMonthExpiryAllowed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
        <td <?= $Page->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility">
<span<?= $Page->ProductDiscountEligibility->viewAttributes() ?>>
<?= $Page->ProductDiscountEligibility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
        <td <?= $Page->ScheduleTypeCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode">
<span<?= $Page->ScheduleTypeCode->viewAttributes() ?>>
<?= $Page->ScheduleTypeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
        <td <?= $Page->AIOCDProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode">
<span<?= $Page->AIOCDProductCode->viewAttributes() ?>>
<?= $Page->AIOCDProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FreeQuantity->Visible) { // FreeQuantity ?>
        <td <?= $Page->FreeQuantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity">
<span<?= $Page->FreeQuantity->viewAttributes() ?>>
<?= $Page->FreeQuantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DiscountType->Visible) { // DiscountType ?>
        <td <?= $Page->DiscountType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType">
<span<?= $Page->DiscountType->viewAttributes() ?>>
<?= $Page->DiscountType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DiscountValue->Visible) { // DiscountValue ?>
        <td <?= $Page->DiscountValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue">
<span<?= $Page->DiscountValue->viewAttributes() ?>>
<?= $Page->DiscountValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
        <td <?= $Page->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute">
<span<?= $Page->HasProductOrderAttribute->viewAttributes() ?>>
<?= $Page->HasProductOrderAttribute->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FirstPODate->Visible) { // FirstPODate ?>
        <td <?= $Page->FirstPODate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate">
<span<?= $Page->FirstPODate->viewAttributes() ?>>
<?= $Page->FirstPODate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
        <td <?= $Page->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent">
<span<?= $Page->SaleprcieAndMrpCalcPercent->viewAttributes() ?>>
<?= $Page->SaleprcieAndMrpCalcPercent->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
        <td <?= $Page->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts">
<span<?= $Page->IsGiftVoucherProducts->viewAttributes() ?>>
<?= $Page->IsGiftVoucherProducts->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
        <td <?= $Page->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber">
<span<?= $Page->AcceptRange4SerialNumber->viewAttributes() ?>>
<?= $Page->AcceptRange4SerialNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
        <td <?= $Page->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination">
<span<?= $Page->GiftVoucherDenomination->viewAttributes() ?>>
<?= $Page->GiftVoucherDenomination->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Subclasscode->Visible) { // Subclasscode ?>
        <td <?= $Page->Subclasscode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode">
<span<?= $Page->Subclasscode->viewAttributes() ?>>
<?= $Page->Subclasscode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
        <td <?= $Page->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine">
<span<?= $Page->BarCodeFromWeighingMachine->viewAttributes() ?>>
<?= $Page->BarCodeFromWeighingMachine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
        <td <?= $Page->CheckCostInReturn->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn">
<span<?= $Page->CheckCostInReturn->viewAttributes() ?>>
<?= $Page->CheckCostInReturn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
        <td <?= $Page->FrequentSaleProduct->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct">
<span<?= $Page->FrequentSaleProduct->viewAttributes() ?>>
<?= $Page->FrequentSaleProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RateType->Visible) { // RateType ?>
        <td <?= $Page->RateType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RateType" class="pharmacy_products_RateType">
<span<?= $Page->RateType->viewAttributes() ?>>
<?= $Page->RateType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TouchscreenName->Visible) { // TouchscreenName ?>
        <td <?= $Page->TouchscreenName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName">
<span<?= $Page->TouchscreenName->viewAttributes() ?>>
<?= $Page->TouchscreenName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FreeType->Visible) { // FreeType ?>
        <td <?= $Page->FreeType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeType" class="pharmacy_products_FreeType">
<span<?= $Page->FreeType->viewAttributes() ?>>
<?= $Page->FreeType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
        <td <?= $Page->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch">
<span<?= $Page->LooseQtyasNewBatch->viewAttributes() ?>>
<?= $Page->LooseQtyasNewBatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
        <td <?= $Page->AllowSlabBilling->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling">
<span<?= $Page->AllowSlabBilling->viewAttributes() ?>>
<?= $Page->AllowSlabBilling->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
        <td <?= $Page->ProductTypeForProduction->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction">
<span<?= $Page->ProductTypeForProduction->viewAttributes() ?>>
<?= $Page->ProductTypeForProduction->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RecipeCode->Visible) { // RecipeCode ?>
        <td <?= $Page->RecipeCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode">
<span<?= $Page->RecipeCode->viewAttributes() ?>>
<?= $Page->RecipeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DefaultUnitType->Visible) { // DefaultUnitType ?>
        <td <?= $Page->DefaultUnitType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType">
<span<?= $Page->DefaultUnitType->viewAttributes() ?>>
<?= $Page->DefaultUnitType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PIstatus->Visible) { // PIstatus ?>
        <td <?= $Page->PIstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus">
<span<?= $Page->PIstatus->viewAttributes() ?>>
<?= $Page->PIstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
        <td <?= $Page->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate">
<span<?= $Page->LastPiConfirmedDate->viewAttributes() ?>>
<?= $Page->LastPiConfirmedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BarCodeDesign->Visible) { // BarCodeDesign ?>
        <td <?= $Page->BarCodeDesign->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign">
<span<?= $Page->BarCodeDesign->viewAttributes() ?>>
<?= $Page->BarCodeDesign->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
        <td <?= $Page->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill">
<span<?= $Page->AcceptRemarksInBill->viewAttributes() ?>>
<?= $Page->AcceptRemarksInBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Classification->Visible) { // Classification ?>
        <td <?= $Page->Classification->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Classification" class="pharmacy_products_Classification">
<span<?= $Page->Classification->viewAttributes() ?>>
<?= $Page->Classification->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TimeSlot->Visible) { // TimeSlot ?>
        <td <?= $Page->TimeSlot->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot">
<span<?= $Page->TimeSlot->viewAttributes() ?>>
<?= $Page->TimeSlot->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IsBundle->Visible) { // IsBundle ?>
        <td <?= $Page->IsBundle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle">
<span<?= $Page->IsBundle->viewAttributes() ?>>
<?= $Page->IsBundle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ColorCode->Visible) { // ColorCode ?>
        <td <?= $Page->ColorCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode">
<span<?= $Page->ColorCode->viewAttributes() ?>>
<?= $Page->ColorCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GenderCode->Visible) { // GenderCode ?>
        <td <?= $Page->GenderCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode">
<span<?= $Page->GenderCode->viewAttributes() ?>>
<?= $Page->GenderCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SizeCode->Visible) { // SizeCode ?>
        <td <?= $Page->SizeCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode">
<span<?= $Page->SizeCode->viewAttributes() ?>>
<?= $Page->SizeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GiftCard->Visible) { // GiftCard ?>
        <td <?= $Page->GiftCard->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard">
<span<?= $Page->GiftCard->viewAttributes() ?>>
<?= $Page->GiftCard->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ToonLabel->Visible) { // ToonLabel ?>
        <td <?= $Page->ToonLabel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel">
<span<?= $Page->ToonLabel->viewAttributes() ?>>
<?= $Page->ToonLabel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GarmentType->Visible) { // GarmentType ?>
        <td <?= $Page->GarmentType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType">
<span<?= $Page->GarmentType->viewAttributes() ?>>
<?= $Page->GarmentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AgeGroup->Visible) { // AgeGroup ?>
        <td <?= $Page->AgeGroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup">
<span<?= $Page->AgeGroup->viewAttributes() ?>>
<?= $Page->AgeGroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Season->Visible) { // Season ?>
        <td <?= $Page->Season->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Season" class="pharmacy_products_Season">
<span<?= $Page->Season->viewAttributes() ?>>
<?= $Page->Season->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DailyStockEntry->Visible) { // DailyStockEntry ?>
        <td <?= $Page->DailyStockEntry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry">
<span<?= $Page->DailyStockEntry->viewAttributes() ?>>
<?= $Page->DailyStockEntry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifierApplicable->Visible) { // ModifierApplicable ?>
        <td <?= $Page->ModifierApplicable->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable">
<span<?= $Page->ModifierApplicable->viewAttributes() ?>>
<?= $Page->ModifierApplicable->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifierType->Visible) { // ModifierType ?>
        <td <?= $Page->ModifierType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType">
<span<?= $Page->ModifierType->viewAttributes() ?>>
<?= $Page->ModifierType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
        <td <?= $Page->AcceptZeroRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate">
<span<?= $Page->AcceptZeroRate->viewAttributes() ?>>
<?= $Page->AcceptZeroRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
        <td <?= $Page->ExciseDutyCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode">
<span<?= $Page->ExciseDutyCode->viewAttributes() ?>>
<?= $Page->ExciseDutyCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
        <td <?= $Page->IndentProductGroupCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode">
<span<?= $Page->IndentProductGroupCode->viewAttributes() ?>>
<?= $Page->IndentProductGroupCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IsMultiBatch->Visible) { // IsMultiBatch ?>
        <td <?= $Page->IsMultiBatch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch">
<span<?= $Page->IsMultiBatch->viewAttributes() ?>>
<?= $Page->IsMultiBatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IsSingleBatch->Visible) { // IsSingleBatch ?>
        <td <?= $Page->IsSingleBatch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch">
<span<?= $Page->IsSingleBatch->viewAttributes() ?>>
<?= $Page->IsSingleBatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MarkUpRate1->Visible) { // MarkUpRate1 ?>
        <td <?= $Page->MarkUpRate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1">
<span<?= $Page->MarkUpRate1->viewAttributes() ?>>
<?= $Page->MarkUpRate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MarkDownRate1->Visible) { // MarkDownRate1 ?>
        <td <?= $Page->MarkDownRate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1">
<span<?= $Page->MarkDownRate1->viewAttributes() ?>>
<?= $Page->MarkDownRate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MarkUpRate2->Visible) { // MarkUpRate2 ?>
        <td <?= $Page->MarkUpRate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2">
<span<?= $Page->MarkUpRate2->viewAttributes() ?>>
<?= $Page->MarkUpRate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MarkDownRate2->Visible) { // MarkDownRate2 ?>
        <td <?= $Page->MarkDownRate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2">
<span<?= $Page->MarkDownRate2->viewAttributes() ?>>
<?= $Page->MarkDownRate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Yield->Visible) { // Yield ?>
        <td <?= $Page->_Yield->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products__Yield" class="pharmacy_products__Yield">
<span<?= $Page->_Yield->viewAttributes() ?>>
<?= $Page->_Yield->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RefProductCode->Visible) { // RefProductCode ?>
        <td <?= $Page->RefProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode">
<span<?= $Page->RefProductCode->viewAttributes() ?>>
<?= $Page->RefProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <td <?= $Page->Volume->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Volume" class="pharmacy_products_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MeasurementID->Visible) { // MeasurementID ?>
        <td <?= $Page->MeasurementID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID">
<span<?= $Page->MeasurementID->viewAttributes() ?>>
<?= $Page->MeasurementID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CountryCode->Visible) { // CountryCode ?>
        <td <?= $Page->CountryCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode">
<span<?= $Page->CountryCode->viewAttributes() ?>>
<?= $Page->CountryCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AcceptWMQty->Visible) { // AcceptWMQty ?>
        <td <?= $Page->AcceptWMQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty">
<span<?= $Page->AcceptWMQty->viewAttributes() ?>>
<?= $Page->AcceptWMQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
        <td <?= $Page->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate">
<span<?= $Page->SingleBatchBasedOnRate->viewAttributes() ?>>
<?= $Page->SingleBatchBasedOnRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TenderNo->Visible) { // TenderNo ?>
        <td <?= $Page->TenderNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo">
<span<?= $Page->TenderNo->viewAttributes() ?>>
<?= $Page->TenderNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
        <td <?= $Page->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled">
<span<?= $Page->SingleBillMaximumSoldQtyFiled->viewAttributes() ?>>
<?= $Page->SingleBillMaximumSoldQtyFiled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <td <?= $Page->Strength1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength1" class="pharmacy_products_Strength1">
<span<?= $Page->Strength1->viewAttributes() ?>>
<?= $Page->Strength1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <td <?= $Page->Strength2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength2" class="pharmacy_products_Strength2">
<span<?= $Page->Strength2->viewAttributes() ?>>
<?= $Page->Strength2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <td <?= $Page->Strength3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength3" class="pharmacy_products_Strength3">
<span<?= $Page->Strength3->viewAttributes() ?>>
<?= $Page->Strength3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <td <?= $Page->Strength4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength4" class="pharmacy_products_Strength4">
<span<?= $Page->Strength4->viewAttributes() ?>>
<?= $Page->Strength4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <td <?= $Page->Strength5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength5" class="pharmacy_products_Strength5">
<span<?= $Page->Strength5->viewAttributes() ?>>
<?= $Page->Strength5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IngredientCode1->Visible) { // IngredientCode1 ?>
        <td <?= $Page->IngredientCode1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1">
<span<?= $Page->IngredientCode1->viewAttributes() ?>>
<?= $Page->IngredientCode1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IngredientCode2->Visible) { // IngredientCode2 ?>
        <td <?= $Page->IngredientCode2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2">
<span<?= $Page->IngredientCode2->viewAttributes() ?>>
<?= $Page->IngredientCode2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IngredientCode3->Visible) { // IngredientCode3 ?>
        <td <?= $Page->IngredientCode3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3">
<span<?= $Page->IngredientCode3->viewAttributes() ?>>
<?= $Page->IngredientCode3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IngredientCode4->Visible) { // IngredientCode4 ?>
        <td <?= $Page->IngredientCode4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4">
<span<?= $Page->IngredientCode4->viewAttributes() ?>>
<?= $Page->IngredientCode4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IngredientCode5->Visible) { // IngredientCode5 ?>
        <td <?= $Page->IngredientCode5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5">
<span<?= $Page->IngredientCode5->viewAttributes() ?>>
<?= $Page->IngredientCode5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OrderType->Visible) { // OrderType ?>
        <td <?= $Page->OrderType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderType" class="pharmacy_products_OrderType">
<span<?= $Page->OrderType->viewAttributes() ?>>
<?= $Page->OrderType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StockUOM->Visible) { // StockUOM ?>
        <td <?= $Page->StockUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM">
<span<?= $Page->StockUOM->viewAttributes() ?>>
<?= $Page->StockUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PriceUOM->Visible) { // PriceUOM ?>
        <td <?= $Page->PriceUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM">
<span<?= $Page->PriceUOM->viewAttributes() ?>>
<?= $Page->PriceUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
        <td <?= $Page->DefaultSaleUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM">
<span<?= $Page->DefaultSaleUOM->viewAttributes() ?>>
<?= $Page->DefaultSaleUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
        <td <?= $Page->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM">
<span<?= $Page->DefaultPurchaseUOM->viewAttributes() ?>>
<?= $Page->DefaultPurchaseUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReportingUOM->Visible) { // ReportingUOM ?>
        <td <?= $Page->ReportingUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM">
<span<?= $Page->ReportingUOM->viewAttributes() ?>>
<?= $Page->ReportingUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
        <td <?= $Page->LastPurchasedUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM">
<span<?= $Page->LastPurchasedUOM->viewAttributes() ?>>
<?= $Page->LastPurchasedUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TreatmentCodes->Visible) { // TreatmentCodes ?>
        <td <?= $Page->TreatmentCodes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes">
<span<?= $Page->TreatmentCodes->viewAttributes() ?>>
<?= $Page->TreatmentCodes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InsuranceType->Visible) { // InsuranceType ?>
        <td <?= $Page->InsuranceType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType">
<span<?= $Page->InsuranceType->viewAttributes() ?>>
<?= $Page->InsuranceType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
        <td <?= $Page->CoverageGroupCodes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes">
<span<?= $Page->CoverageGroupCodes->viewAttributes() ?>>
<?= $Page->CoverageGroupCodes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MultipleUOM->Visible) { // MultipleUOM ?>
        <td <?= $Page->MultipleUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM">
<span<?= $Page->MultipleUOM->viewAttributes() ?>>
<?= $Page->MultipleUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SalePriceComputation->Visible) { // SalePriceComputation ?>
        <td <?= $Page->SalePriceComputation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation">
<span<?= $Page->SalePriceComputation->viewAttributes() ?>>
<?= $Page->SalePriceComputation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StockCorrection->Visible) { // StockCorrection ?>
        <td <?= $Page->StockCorrection->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection">
<span<?= $Page->StockCorrection->viewAttributes() ?>>
<?= $Page->StockCorrection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LBTPercentage->Visible) { // LBTPercentage ?>
        <td <?= $Page->LBTPercentage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage">
<span<?= $Page->LBTPercentage->viewAttributes() ?>>
<?= $Page->LBTPercentage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SalesCommission->Visible) { // SalesCommission ?>
        <td <?= $Page->SalesCommission->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission">
<span<?= $Page->SalesCommission->viewAttributes() ?>>
<?= $Page->SalesCommission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LockedStock->Visible) { // LockedStock ?>
        <td <?= $Page->LockedStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock">
<span<?= $Page->LockedStock->viewAttributes() ?>>
<?= $Page->LockedStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MinMaxUOM->Visible) { // MinMaxUOM ?>
        <td <?= $Page->MinMaxUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM">
<span<?= $Page->MinMaxUOM->viewAttributes() ?>>
<?= $Page->MinMaxUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
        <td <?= $Page->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat">
<span<?= $Page->ExpiryMfrDateFormat->viewAttributes() ?>>
<?= $Page->ExpiryMfrDateFormat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductLifeTime->Visible) { // ProductLifeTime ?>
        <td <?= $Page->ProductLifeTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime">
<span<?= $Page->ProductLifeTime->viewAttributes() ?>>
<?= $Page->ProductLifeTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IsCombo->Visible) { // IsCombo ?>
        <td <?= $Page->IsCombo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo">
<span<?= $Page->IsCombo->viewAttributes() ?>>
<?= $Page->IsCombo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ComboTypeCode->Visible) { // ComboTypeCode ?>
        <td <?= $Page->ComboTypeCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode">
<span<?= $Page->ComboTypeCode->viewAttributes() ?>>
<?= $Page->ComboTypeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount6->Visible) { // AttributeCount6 ?>
        <td <?= $Page->AttributeCount6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6">
<span<?= $Page->AttributeCount6->viewAttributes() ?>>
<?= $Page->AttributeCount6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount7->Visible) { // AttributeCount7 ?>
        <td <?= $Page->AttributeCount7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7">
<span<?= $Page->AttributeCount7->viewAttributes() ?>>
<?= $Page->AttributeCount7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount8->Visible) { // AttributeCount8 ?>
        <td <?= $Page->AttributeCount8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8">
<span<?= $Page->AttributeCount8->viewAttributes() ?>>
<?= $Page->AttributeCount8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount9->Visible) { // AttributeCount9 ?>
        <td <?= $Page->AttributeCount9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9">
<span<?= $Page->AttributeCount9->viewAttributes() ?>>
<?= $Page->AttributeCount9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AttributeCount10->Visible) { // AttributeCount10 ?>
        <td <?= $Page->AttributeCount10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10">
<span<?= $Page->AttributeCount10->viewAttributes() ?>>
<?= $Page->AttributeCount10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LabourCharge->Visible) { // LabourCharge ?>
        <td <?= $Page->LabourCharge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge">
<span<?= $Page->LabourCharge->viewAttributes() ?>>
<?= $Page->LabourCharge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
        <td <?= $Page->AffectOtherCharge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge">
<span<?= $Page->AffectOtherCharge->viewAttributes() ?>>
<?= $Page->AffectOtherCharge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DosageInfo->Visible) { // DosageInfo ?>
        <td <?= $Page->DosageInfo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo">
<span<?= $Page->DosageInfo->viewAttributes() ?>>
<?= $Page->DosageInfo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DosageType->Visible) { // DosageType ?>
        <td <?= $Page->DosageType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DosageType" class="pharmacy_products_DosageType">
<span<?= $Page->DosageType->viewAttributes() ?>>
<?= $Page->DosageType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
        <td <?= $Page->DefaultIndentUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM">
<span<?= $Page->DefaultIndentUOM->viewAttributes() ?>>
<?= $Page->DefaultIndentUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PromoTag->Visible) { // PromoTag ?>
        <td <?= $Page->PromoTag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag">
<span<?= $Page->PromoTag->viewAttributes() ?>>
<?= $Page->PromoTag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
        <td <?= $Page->BillLevelPromoTag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag">
<span<?= $Page->BillLevelPromoTag->viewAttributes() ?>>
<?= $Page->BillLevelPromoTag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IsMRPProduct->Visible) { // IsMRPProduct ?>
        <td <?= $Page->IsMRPProduct->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct">
<span<?= $Page->IsMRPProduct->viewAttributes() ?>>
<?= $Page->IsMRPProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
        <td <?= $Page->AlternateSaleUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM">
<span<?= $Page->AlternateSaleUOM->viewAttributes() ?>>
<?= $Page->AlternateSaleUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FreeUOM->Visible) { // FreeUOM ?>
        <td <?= $Page->FreeUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM">
<span<?= $Page->FreeUOM->viewAttributes() ?>>
<?= $Page->FreeUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MarketedCode->Visible) { // MarketedCode ?>
        <td <?= $Page->MarketedCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode">
<span<?= $Page->MarketedCode->viewAttributes() ?>>
<?= $Page->MarketedCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
        <td <?= $Page->MinimumSalePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice">
<span<?= $Page->MinimumSalePrice->viewAttributes() ?>>
<?= $Page->MinimumSalePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRate1->Visible) { // PRate1 ?>
        <td <?= $Page->PRate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PRate1" class="pharmacy_products_PRate1">
<span<?= $Page->PRate1->viewAttributes() ?>>
<?= $Page->PRate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRate2->Visible) { // PRate2 ?>
        <td <?= $Page->PRate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PRate2" class="pharmacy_products_PRate2">
<span<?= $Page->PRate2->viewAttributes() ?>>
<?= $Page->PRate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LPItemCost->Visible) { // LPItemCost ?>
        <td <?= $Page->LPItemCost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost">
<span<?= $Page->LPItemCost->viewAttributes() ?>>
<?= $Page->LPItemCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FixedItemCost->Visible) { // FixedItemCost ?>
        <td <?= $Page->FixedItemCost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost">
<span<?= $Page->FixedItemCost->viewAttributes() ?>>
<?= $Page->FixedItemCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HSNId->Visible) { // HSNId ?>
        <td <?= $Page->HSNId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_HSNId" class="pharmacy_products_HSNId">
<span<?= $Page->HSNId->viewAttributes() ?>>
<?= $Page->HSNId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TaxInclusive->Visible) { // TaxInclusive ?>
        <td <?= $Page->TaxInclusive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive">
<span<?= $Page->TaxInclusive->viewAttributes() ?>>
<?= $Page->TaxInclusive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
        <td <?= $Page->EligibleforWarranty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty">
<span<?= $Page->EligibleforWarranty->viewAttributes() ?>>
<?= $Page->EligibleforWarranty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
        <td <?= $Page->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty">
<span<?= $Page->NoofMonthsWarranty->viewAttributes() ?>>
<?= $Page->NoofMonthsWarranty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
        <td <?= $Page->ComputeTaxonCost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost">
<span<?= $Page->ComputeTaxonCost->viewAttributes() ?>>
<?= $Page->ComputeTaxonCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
        <td <?= $Page->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack">
<span<?= $Page->HasEmptyBottleTrack->viewAttributes() ?>>
<?= $Page->HasEmptyBottleTrack->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
        <td <?= $Page->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode">
<span<?= $Page->EmptyBottleReferenceCode->viewAttributes() ?>>
<?= $Page->EmptyBottleReferenceCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
        <td <?= $Page->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount">
<span<?= $Page->AdditionalCESSAmount->viewAttributes() ?>>
<?= $Page->AdditionalCESSAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
        <td <?= $Page->EmptyBottleRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate">
<span<?= $Page->EmptyBottleRate->viewAttributes() ?>>
<?= $Page->EmptyBottleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

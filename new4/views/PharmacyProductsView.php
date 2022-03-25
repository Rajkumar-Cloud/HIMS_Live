<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyProductsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_productsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_productsview = currentForm = new ew.Form("fpharmacy_productsview", "view");
    loadjs.done("fpharmacy_productsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pharmacy_products) ew.vars.tables.pharmacy_products = <?= JsonEncode(GetClientVar("tables", "pharmacy_products")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_productsview" id="fpharmacy_productsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->ProductCode->Visible) { // ProductCode ?>
    <tr id="r_ProductCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductCode"><?= $Page->ProductCode->caption() ?></span></td>
        <td data-name="ProductCode" <?= $Page->ProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductCode">
<span<?= $Page->ProductCode->viewAttributes() ?>>
<?= $Page->ProductCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductName->Visible) { // ProductName ?>
    <tr id="r_ProductName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductName"><?= $Page->ProductName->caption() ?></span></td>
        <td data-name="ProductName" <?= $Page->ProductName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductName">
<span<?= $Page->ProductName->viewAttributes() ?>>
<?= $Page->ProductName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DivisionCode->Visible) { // DivisionCode ?>
    <tr id="r_DivisionCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DivisionCode"><?= $Page->DivisionCode->caption() ?></span></td>
        <td data-name="DivisionCode" <?= $Page->DivisionCode->cellAttributes() ?>>
<span id="el_pharmacy_products_DivisionCode">
<span<?= $Page->DivisionCode->viewAttributes() ?>>
<?= $Page->DivisionCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ManufacturerCode->Visible) { // ManufacturerCode ?>
    <tr id="r_ManufacturerCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ManufacturerCode"><?= $Page->ManufacturerCode->caption() ?></span></td>
        <td data-name="ManufacturerCode" <?= $Page->ManufacturerCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ManufacturerCode">
<span<?= $Page->ManufacturerCode->viewAttributes() ?>>
<?= $Page->ManufacturerCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SupplierCode->Visible) { // SupplierCode ?>
    <tr id="r_SupplierCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SupplierCode"><?= $Page->SupplierCode->caption() ?></span></td>
        <td data-name="SupplierCode" <?= $Page->SupplierCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SupplierCode">
<span<?= $Page->SupplierCode->viewAttributes() ?>>
<?= $Page->SupplierCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
    <tr id="r_AlternateSupplierCodes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AlternateSupplierCodes"><?= $Page->AlternateSupplierCodes->caption() ?></span></td>
        <td data-name="AlternateSupplierCodes" <?= $Page->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSupplierCodes">
<span<?= $Page->AlternateSupplierCodes->viewAttributes() ?>>
<?= $Page->AlternateSupplierCodes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AlternateProductCode->Visible) { // AlternateProductCode ?>
    <tr id="r_AlternateProductCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AlternateProductCode"><?= $Page->AlternateProductCode->caption() ?></span></td>
        <td data-name="AlternateProductCode" <?= $Page->AlternateProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateProductCode">
<span<?= $Page->AlternateProductCode->viewAttributes() ?>>
<?= $Page->AlternateProductCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UniversalProductCode->Visible) { // UniversalProductCode ?>
    <tr id="r_UniversalProductCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UniversalProductCode"><?= $Page->UniversalProductCode->caption() ?></span></td>
        <td data-name="UniversalProductCode" <?= $Page->UniversalProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_UniversalProductCode">
<span<?= $Page->UniversalProductCode->viewAttributes() ?>>
<?= $Page->UniversalProductCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BookProductCode->Visible) { // BookProductCode ?>
    <tr id="r_BookProductCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BookProductCode"><?= $Page->BookProductCode->caption() ?></span></td>
        <td data-name="BookProductCode" <?= $Page->BookProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BookProductCode">
<span<?= $Page->BookProductCode->viewAttributes() ?>>
<?= $Page->BookProductCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OldCode->Visible) { // OldCode ?>
    <tr id="r_OldCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OldCode"><?= $Page->OldCode->caption() ?></span></td>
        <td data-name="OldCode" <?= $Page->OldCode->cellAttributes() ?>>
<span id="el_pharmacy_products_OldCode">
<span<?= $Page->OldCode->viewAttributes() ?>>
<?= $Page->OldCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProtectedProducts->Visible) { // ProtectedProducts ?>
    <tr id="r_ProtectedProducts">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProtectedProducts"><?= $Page->ProtectedProducts->caption() ?></span></td>
        <td data-name="ProtectedProducts" <?= $Page->ProtectedProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_ProtectedProducts">
<span<?= $Page->ProtectedProducts->viewAttributes() ?>>
<?= $Page->ProtectedProducts->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductFullName->Visible) { // ProductFullName ?>
    <tr id="r_ProductFullName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductFullName"><?= $Page->ProductFullName->caption() ?></span></td>
        <td data-name="ProductFullName" <?= $Page->ProductFullName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductFullName">
<span<?= $Page->ProductFullName->viewAttributes() ?>>
<?= $Page->ProductFullName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
    <tr id="r_UnitOfMeasure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UnitOfMeasure"><?= $Page->UnitOfMeasure->caption() ?></span></td>
        <td data-name="UnitOfMeasure" <?= $Page->UnitOfMeasure->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitOfMeasure">
<span<?= $Page->UnitOfMeasure->viewAttributes() ?>>
<?= $Page->UnitOfMeasure->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UnitDescription->Visible) { // UnitDescription ?>
    <tr id="r_UnitDescription">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UnitDescription"><?= $Page->UnitDescription->caption() ?></span></td>
        <td data-name="UnitDescription" <?= $Page->UnitDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitDescription">
<span<?= $Page->UnitDescription->viewAttributes() ?>>
<?= $Page->UnitDescription->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BulkDescription->Visible) { // BulkDescription ?>
    <tr id="r_BulkDescription">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BulkDescription"><?= $Page->BulkDescription->caption() ?></span></td>
        <td data-name="BulkDescription" <?= $Page->BulkDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BulkDescription">
<span<?= $Page->BulkDescription->viewAttributes() ?>>
<?= $Page->BulkDescription->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BarCodeDescription->Visible) { // BarCodeDescription ?>
    <tr id="r_BarCodeDescription">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BarCodeDescription"><?= $Page->BarCodeDescription->caption() ?></span></td>
        <td data-name="BarCodeDescription" <?= $Page->BarCodeDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDescription">
<span<?= $Page->BarCodeDescription->viewAttributes() ?>>
<?= $Page->BarCodeDescription->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PackageInformation->Visible) { // PackageInformation ?>
    <tr id="r_PackageInformation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PackageInformation"><?= $Page->PackageInformation->caption() ?></span></td>
        <td data-name="PackageInformation" <?= $Page->PackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageInformation">
<span<?= $Page->PackageInformation->viewAttributes() ?>>
<?= $Page->PackageInformation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PackageId->Visible) { // PackageId ?>
    <tr id="r_PackageId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PackageId"><?= $Page->PackageId->caption() ?></span></td>
        <td data-name="PackageId" <?= $Page->PackageId->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageId">
<span<?= $Page->PackageId->viewAttributes() ?>>
<?= $Page->PackageId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
    <tr id="r_Weight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Weight"><?= $Page->Weight->caption() ?></span></td>
        <td data-name="Weight" <?= $Page->Weight->cellAttributes() ?>>
<span id="el_pharmacy_products_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AllowFractions->Visible) { // AllowFractions ?>
    <tr id="r_AllowFractions">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowFractions"><?= $Page->AllowFractions->caption() ?></span></td>
        <td data-name="AllowFractions" <?= $Page->AllowFractions->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowFractions">
<span<?= $Page->AllowFractions->viewAttributes() ?>>
<?= $Page->AllowFractions->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
    <tr id="r_MinimumStockLevel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinimumStockLevel"><?= $Page->MinimumStockLevel->caption() ?></span></td>
        <td data-name="MinimumStockLevel" <?= $Page->MinimumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumStockLevel">
<span<?= $Page->MinimumStockLevel->viewAttributes() ?>>
<?= $Page->MinimumStockLevel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
    <tr id="r_MaximumStockLevel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MaximumStockLevel"><?= $Page->MaximumStockLevel->caption() ?></span></td>
        <td data-name="MaximumStockLevel" <?= $Page->MaximumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MaximumStockLevel">
<span<?= $Page->MaximumStockLevel->viewAttributes() ?>>
<?= $Page->MaximumStockLevel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReorderLevel->Visible) { // ReorderLevel ?>
    <tr id="r_ReorderLevel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ReorderLevel"><?= $Page->ReorderLevel->caption() ?></span></td>
        <td data-name="ReorderLevel" <?= $Page->ReorderLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_ReorderLevel">
<span<?= $Page->ReorderLevel->viewAttributes() ?>>
<?= $Page->ReorderLevel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MinMaxRatio->Visible) { // MinMaxRatio ?>
    <tr id="r_MinMaxRatio">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinMaxRatio"><?= $Page->MinMaxRatio->caption() ?></span></td>
        <td data-name="MinMaxRatio" <?= $Page->MinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxRatio">
<span<?= $Page->MinMaxRatio->viewAttributes() ?>>
<?= $Page->MinMaxRatio->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
    <tr id="r_AutoMinMaxRatio">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AutoMinMaxRatio"><?= $Page->AutoMinMaxRatio->caption() ?></span></td>
        <td data-name="AutoMinMaxRatio" <?= $Page->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_AutoMinMaxRatio">
<span<?= $Page->AutoMinMaxRatio->viewAttributes() ?>>
<?= $Page->AutoMinMaxRatio->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ScheduleCode->Visible) { // ScheduleCode ?>
    <tr id="r_ScheduleCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ScheduleCode"><?= $Page->ScheduleCode->caption() ?></span></td>
        <td data-name="ScheduleCode" <?= $Page->ScheduleCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleCode">
<span<?= $Page->ScheduleCode->viewAttributes() ?>>
<?= $Page->ScheduleCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RopRatio->Visible) { // RopRatio ?>
    <tr id="r_RopRatio">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RopRatio"><?= $Page->RopRatio->caption() ?></span></td>
        <td data-name="RopRatio" <?= $Page->RopRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_RopRatio">
<span<?= $Page->RopRatio->viewAttributes() ?>>
<?= $Page->RopRatio->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <tr id="r_MRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MRP"><?= $Page->MRP->caption() ?></span></td>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el_pharmacy_products_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurchasePrice->Visible) { // PurchasePrice ?>
    <tr id="r_PurchasePrice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PurchasePrice"><?= $Page->PurchasePrice->caption() ?></span></td>
        <td data-name="PurchasePrice" <?= $Page->PurchasePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchasePrice">
<span<?= $Page->PurchasePrice->viewAttributes() ?>>
<?= $Page->PurchasePrice->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurchaseUnit->Visible) { // PurchaseUnit ?>
    <tr id="r_PurchaseUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PurchaseUnit"><?= $Page->PurchaseUnit->caption() ?></span></td>
        <td data-name="PurchaseUnit" <?= $Page->PurchaseUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseUnit">
<span<?= $Page->PurchaseUnit->viewAttributes() ?>>
<?= $Page->PurchaseUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
    <tr id="r_PurchaseTaxCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PurchaseTaxCode"><?= $Page->PurchaseTaxCode->caption() ?></span></td>
        <td data-name="PurchaseTaxCode" <?= $Page->PurchaseTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseTaxCode">
<span<?= $Page->PurchaseTaxCode->viewAttributes() ?>>
<?= $Page->PurchaseTaxCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AllowDirectInward->Visible) { // AllowDirectInward ?>
    <tr id="r_AllowDirectInward">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowDirectInward"><?= $Page->AllowDirectInward->caption() ?></span></td>
        <td data-name="AllowDirectInward" <?= $Page->AllowDirectInward->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowDirectInward">
<span<?= $Page->AllowDirectInward->viewAttributes() ?>>
<?= $Page->AllowDirectInward->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SalePrice->Visible) { // SalePrice ?>
    <tr id="r_SalePrice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalePrice"><?= $Page->SalePrice->caption() ?></span></td>
        <td data-name="SalePrice" <?= $Page->SalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePrice">
<span<?= $Page->SalePrice->viewAttributes() ?>>
<?= $Page->SalePrice->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SaleUnit->Visible) { // SaleUnit ?>
    <tr id="r_SaleUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SaleUnit"><?= $Page->SaleUnit->caption() ?></span></td>
        <td data-name="SaleUnit" <?= $Page->SaleUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleUnit">
<span<?= $Page->SaleUnit->viewAttributes() ?>>
<?= $Page->SaleUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SalesTaxCode->Visible) { // SalesTaxCode ?>
    <tr id="r_SalesTaxCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalesTaxCode"><?= $Page->SalesTaxCode->caption() ?></span></td>
        <td data-name="SalesTaxCode" <?= $Page->SalesTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesTaxCode">
<span<?= $Page->SalesTaxCode->viewAttributes() ?>>
<?= $Page->SalesTaxCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StockReceived->Visible) { // StockReceived ?>
    <tr id="r_StockReceived">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockReceived"><?= $Page->StockReceived->caption() ?></span></td>
        <td data-name="StockReceived" <?= $Page->StockReceived->cellAttributes() ?>>
<span id="el_pharmacy_products_StockReceived">
<span<?= $Page->StockReceived->viewAttributes() ?>>
<?= $Page->StockReceived->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalStock->Visible) { // TotalStock ?>
    <tr id="r_TotalStock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TotalStock"><?= $Page->TotalStock->caption() ?></span></td>
        <td data-name="TotalStock" <?= $Page->TotalStock->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalStock">
<span<?= $Page->TotalStock->viewAttributes() ?>>
<?= $Page->TotalStock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StockType->Visible) { // StockType ?>
    <tr id="r_StockType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockType"><?= $Page->StockType->caption() ?></span></td>
        <td data-name="StockType" <?= $Page->StockType->cellAttributes() ?>>
<span id="el_pharmacy_products_StockType">
<span<?= $Page->StockType->viewAttributes() ?>>
<?= $Page->StockType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StockCheckDate->Visible) { // StockCheckDate ?>
    <tr id="r_StockCheckDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockCheckDate"><?= $Page->StockCheckDate->caption() ?></span></td>
        <td data-name="StockCheckDate" <?= $Page->StockCheckDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCheckDate">
<span<?= $Page->StockCheckDate->viewAttributes() ?>>
<?= $Page->StockCheckDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
    <tr id="r_StockAdjustmentDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockAdjustmentDate"><?= $Page->StockAdjustmentDate->caption() ?></span></td>
        <td data-name="StockAdjustmentDate" <?= $Page->StockAdjustmentDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockAdjustmentDate">
<span<?= $Page->StockAdjustmentDate->viewAttributes() ?>>
<?= $Page->StockAdjustmentDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_products_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CostCentre->Visible) { // CostCentre ?>
    <tr id="r_CostCentre">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CostCentre"><?= $Page->CostCentre->caption() ?></span></td>
        <td data-name="CostCentre" <?= $Page->CostCentre->cellAttributes() ?>>
<span id="el_pharmacy_products_CostCentre">
<span<?= $Page->CostCentre->viewAttributes() ?>>
<?= $Page->CostCentre->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
    <tr id="r_ProductType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductType"><?= $Page->ProductType->caption() ?></span></td>
        <td data-name="ProductType" <?= $Page->ProductType->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductType">
<span<?= $Page->ProductType->viewAttributes() ?>>
<?= $Page->ProductType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TaxAmount->Visible) { // TaxAmount ?>
    <tr id="r_TaxAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TaxAmount"><?= $Page->TaxAmount->caption() ?></span></td>
        <td data-name="TaxAmount" <?= $Page->TaxAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxAmount">
<span<?= $Page->TaxAmount->viewAttributes() ?>>
<?= $Page->TaxAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TaxId->Visible) { // TaxId ?>
    <tr id="r_TaxId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TaxId"><?= $Page->TaxId->caption() ?></span></td>
        <td data-name="TaxId" <?= $Page->TaxId->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxId">
<span<?= $Page->TaxId->viewAttributes() ?>>
<?= $Page->TaxId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
    <tr id="r_ResaleTaxApplicable">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ResaleTaxApplicable"><?= $Page->ResaleTaxApplicable->caption() ?></span></td>
        <td data-name="ResaleTaxApplicable" <?= $Page->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ResaleTaxApplicable">
<span<?= $Page->ResaleTaxApplicable->viewAttributes() ?>>
<?= $Page->ResaleTaxApplicable->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CstOtherTax->Visible) { // CstOtherTax ?>
    <tr id="r_CstOtherTax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CstOtherTax"><?= $Page->CstOtherTax->caption() ?></span></td>
        <td data-name="CstOtherTax" <?= $Page->CstOtherTax->cellAttributes() ?>>
<span id="el_pharmacy_products_CstOtherTax">
<span<?= $Page->CstOtherTax->viewAttributes() ?>>
<?= $Page->CstOtherTax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalTax->Visible) { // TotalTax ?>
    <tr id="r_TotalTax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TotalTax"><?= $Page->TotalTax->caption() ?></span></td>
        <td data-name="TotalTax" <?= $Page->TotalTax->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalTax">
<span<?= $Page->TotalTax->viewAttributes() ?>>
<?= $Page->TotalTax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ItemCost->Visible) { // ItemCost ?>
    <tr id="r_ItemCost">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ItemCost"><?= $Page->ItemCost->caption() ?></span></td>
        <td data-name="ItemCost" <?= $Page->ItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ItemCost">
<span<?= $Page->ItemCost->viewAttributes() ?>>
<?= $Page->ItemCost->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExpiryDate->Visible) { // ExpiryDate ?>
    <tr id="r_ExpiryDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExpiryDate"><?= $Page->ExpiryDate->caption() ?></span></td>
        <td data-name="ExpiryDate" <?= $Page->ExpiryDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryDate">
<span<?= $Page->ExpiryDate->viewAttributes() ?>>
<?= $Page->ExpiryDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BatchDescription->Visible) { // BatchDescription ?>
    <tr id="r_BatchDescription">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BatchDescription"><?= $Page->BatchDescription->caption() ?></span></td>
        <td data-name="BatchDescription" <?= $Page->BatchDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchDescription">
<span<?= $Page->BatchDescription->viewAttributes() ?>>
<?= $Page->BatchDescription->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FreeScheme->Visible) { // FreeScheme ?>
    <tr id="r_FreeScheme">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeScheme"><?= $Page->FreeScheme->caption() ?></span></td>
        <td data-name="FreeScheme" <?= $Page->FreeScheme->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeScheme">
<span<?= $Page->FreeScheme->viewAttributes() ?>>
<?= $Page->FreeScheme->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
    <tr id="r_CashDiscountEligibility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CashDiscountEligibility"><?= $Page->CashDiscountEligibility->caption() ?></span></td>
        <td data-name="CashDiscountEligibility" <?= $Page->CashDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_CashDiscountEligibility">
<span<?= $Page->CashDiscountEligibility->viewAttributes() ?>>
<?= $Page->CashDiscountEligibility->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
    <tr id="r_DiscountPerAllowInBill">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DiscountPerAllowInBill"><?= $Page->DiscountPerAllowInBill->caption() ?></span></td>
        <td data-name="DiscountPerAllowInBill" <?= $Page->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountPerAllowInBill">
<span<?= $Page->DiscountPerAllowInBill->viewAttributes() ?>>
<?= $Page->DiscountPerAllowInBill->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <tr id="r_Discount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Discount"><?= $Page->Discount->caption() ?></span></td>
        <td data-name="Discount" <?= $Page->Discount->cellAttributes() ?>>
<span id="el_pharmacy_products_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
    <tr id="r_TotalAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TotalAmount"><?= $Page->TotalAmount->caption() ?></span></td>
        <td data-name="TotalAmount" <?= $Page->TotalAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalAmount">
<span<?= $Page->TotalAmount->viewAttributes() ?>>
<?= $Page->TotalAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StandardMargin->Visible) { // StandardMargin ?>
    <tr id="r_StandardMargin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StandardMargin"><?= $Page->StandardMargin->caption() ?></span></td>
        <td data-name="StandardMargin" <?= $Page->StandardMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_StandardMargin">
<span<?= $Page->StandardMargin->viewAttributes() ?>>
<?= $Page->StandardMargin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Margin->Visible) { // Margin ?>
    <tr id="r_Margin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Margin"><?= $Page->Margin->caption() ?></span></td>
        <td data-name="Margin" <?= $Page->Margin->cellAttributes() ?>>
<span id="el_pharmacy_products_Margin">
<span<?= $Page->Margin->viewAttributes() ?>>
<?= $Page->Margin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MarginId->Visible) { // MarginId ?>
    <tr id="r_MarginId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarginId"><?= $Page->MarginId->caption() ?></span></td>
        <td data-name="MarginId" <?= $Page->MarginId->cellAttributes() ?>>
<span id="el_pharmacy_products_MarginId">
<span<?= $Page->MarginId->viewAttributes() ?>>
<?= $Page->MarginId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExpectedMargin->Visible) { // ExpectedMargin ?>
    <tr id="r_ExpectedMargin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExpectedMargin"><?= $Page->ExpectedMargin->caption() ?></span></td>
        <td data-name="ExpectedMargin" <?= $Page->ExpectedMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpectedMargin">
<span<?= $Page->ExpectedMargin->viewAttributes() ?>>
<?= $Page->ExpectedMargin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
    <tr id="r_SurchargeBeforeTax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SurchargeBeforeTax"><?= $Page->SurchargeBeforeTax->caption() ?></span></td>
        <td data-name="SurchargeBeforeTax" <?= $Page->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeBeforeTax">
<span<?= $Page->SurchargeBeforeTax->viewAttributes() ?>>
<?= $Page->SurchargeBeforeTax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
    <tr id="r_SurchargeAfterTax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SurchargeAfterTax"><?= $Page->SurchargeAfterTax->caption() ?></span></td>
        <td data-name="SurchargeAfterTax" <?= $Page->SurchargeAfterTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeAfterTax">
<span<?= $Page->SurchargeAfterTax->viewAttributes() ?>>
<?= $Page->SurchargeAfterTax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TempOrderNo->Visible) { // TempOrderNo ?>
    <tr id="r_TempOrderNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TempOrderNo"><?= $Page->TempOrderNo->caption() ?></span></td>
        <td data-name="TempOrderNo" <?= $Page->TempOrderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderNo">
<span<?= $Page->TempOrderNo->viewAttributes() ?>>
<?= $Page->TempOrderNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TempOrderDate->Visible) { // TempOrderDate ?>
    <tr id="r_TempOrderDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TempOrderDate"><?= $Page->TempOrderDate->caption() ?></span></td>
        <td data-name="TempOrderDate" <?= $Page->TempOrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderDate">
<span<?= $Page->TempOrderDate->viewAttributes() ?>>
<?= $Page->TempOrderDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OrderUnit->Visible) { // OrderUnit ?>
    <tr id="r_OrderUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderUnit"><?= $Page->OrderUnit->caption() ?></span></td>
        <td data-name="OrderUnit" <?= $Page->OrderUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderUnit">
<span<?= $Page->OrderUnit->viewAttributes() ?>>
<?= $Page->OrderUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OrderQuantity->Visible) { // OrderQuantity ?>
    <tr id="r_OrderQuantity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderQuantity"><?= $Page->OrderQuantity->caption() ?></span></td>
        <td data-name="OrderQuantity" <?= $Page->OrderQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderQuantity">
<span<?= $Page->OrderQuantity->viewAttributes() ?>>
<?= $Page->OrderQuantity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MarkForOrder->Visible) { // MarkForOrder ?>
    <tr id="r_MarkForOrder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkForOrder"><?= $Page->MarkForOrder->caption() ?></span></td>
        <td data-name="MarkForOrder" <?= $Page->MarkForOrder->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkForOrder">
<span<?= $Page->MarkForOrder->viewAttributes() ?>>
<?= $Page->MarkForOrder->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OrderAllId->Visible) { // OrderAllId ?>
    <tr id="r_OrderAllId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderAllId"><?= $Page->OrderAllId->caption() ?></span></td>
        <td data-name="OrderAllId" <?= $Page->OrderAllId->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderAllId">
<span<?= $Page->OrderAllId->viewAttributes() ?>>
<?= $Page->OrderAllId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
    <tr id="r_CalculateOrderQty">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CalculateOrderQty"><?= $Page->CalculateOrderQty->caption() ?></span></td>
        <td data-name="CalculateOrderQty" <?= $Page->CalculateOrderQty->cellAttributes() ?>>
<span id="el_pharmacy_products_CalculateOrderQty">
<span<?= $Page->CalculateOrderQty->viewAttributes() ?>>
<?= $Page->CalculateOrderQty->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SubLocation->Visible) { // SubLocation ?>
    <tr id="r_SubLocation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SubLocation"><?= $Page->SubLocation->caption() ?></span></td>
        <td data-name="SubLocation" <?= $Page->SubLocation->cellAttributes() ?>>
<span id="el_pharmacy_products_SubLocation">
<span<?= $Page->SubLocation->viewAttributes() ?>>
<?= $Page->SubLocation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CategoryCode->Visible) { // CategoryCode ?>
    <tr id="r_CategoryCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CategoryCode"><?= $Page->CategoryCode->caption() ?></span></td>
        <td data-name="CategoryCode" <?= $Page->CategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CategoryCode">
<span<?= $Page->CategoryCode->viewAttributes() ?>>
<?= $Page->CategoryCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SubCategory->Visible) { // SubCategory ?>
    <tr id="r_SubCategory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SubCategory"><?= $Page->SubCategory->caption() ?></span></td>
        <td data-name="SubCategory" <?= $Page->SubCategory->cellAttributes() ?>>
<span id="el_pharmacy_products_SubCategory">
<span<?= $Page->SubCategory->viewAttributes() ?>>
<?= $Page->SubCategory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
    <tr id="r_FlexCategoryCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FlexCategoryCode"><?= $Page->FlexCategoryCode->caption() ?></span></td>
        <td data-name="FlexCategoryCode" <?= $Page->FlexCategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_FlexCategoryCode">
<span<?= $Page->FlexCategoryCode->viewAttributes() ?>>
<?= $Page->FlexCategoryCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ABCSaleQty->Visible) { // ABCSaleQty ?>
    <tr id="r_ABCSaleQty">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ABCSaleQty"><?= $Page->ABCSaleQty->caption() ?></span></td>
        <td data-name="ABCSaleQty" <?= $Page->ABCSaleQty->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleQty">
<span<?= $Page->ABCSaleQty->viewAttributes() ?>>
<?= $Page->ABCSaleQty->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ABCSaleValue->Visible) { // ABCSaleValue ?>
    <tr id="r_ABCSaleValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ABCSaleValue"><?= $Page->ABCSaleValue->caption() ?></span></td>
        <td data-name="ABCSaleValue" <?= $Page->ABCSaleValue->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleValue">
<span<?= $Page->ABCSaleValue->viewAttributes() ?>>
<?= $Page->ABCSaleValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ConvertionFactor->Visible) { // ConvertionFactor ?>
    <tr id="r_ConvertionFactor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ConvertionFactor"><?= $Page->ConvertionFactor->caption() ?></span></td>
        <td data-name="ConvertionFactor" <?= $Page->ConvertionFactor->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionFactor">
<span<?= $Page->ConvertionFactor->viewAttributes() ?>>
<?= $Page->ConvertionFactor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
    <tr id="r_ConvertionUnitDesc">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ConvertionUnitDesc"><?= $Page->ConvertionUnitDesc->caption() ?></span></td>
        <td data-name="ConvertionUnitDesc" <?= $Page->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionUnitDesc">
<span<?= $Page->ConvertionUnitDesc->viewAttributes() ?>>
<?= $Page->ConvertionUnitDesc->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransactionId->Visible) { // TransactionId ?>
    <tr id="r_TransactionId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TransactionId"><?= $Page->TransactionId->caption() ?></span></td>
        <td data-name="TransactionId" <?= $Page->TransactionId->cellAttributes() ?>>
<span id="el_pharmacy_products_TransactionId">
<span<?= $Page->TransactionId->viewAttributes() ?>>
<?= $Page->TransactionId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SoldProductId->Visible) { // SoldProductId ?>
    <tr id="r_SoldProductId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SoldProductId"><?= $Page->SoldProductId->caption() ?></span></td>
        <td data-name="SoldProductId" <?= $Page->SoldProductId->cellAttributes() ?>>
<span id="el_pharmacy_products_SoldProductId">
<span<?= $Page->SoldProductId->viewAttributes() ?>>
<?= $Page->SoldProductId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WantedBookId->Visible) { // WantedBookId ?>
    <tr id="r_WantedBookId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_WantedBookId"><?= $Page->WantedBookId->caption() ?></span></td>
        <td data-name="WantedBookId" <?= $Page->WantedBookId->cellAttributes() ?>>
<span id="el_pharmacy_products_WantedBookId">
<span<?= $Page->WantedBookId->viewAttributes() ?>>
<?= $Page->WantedBookId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AllId->Visible) { // AllId ?>
    <tr id="r_AllId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllId"><?= $Page->AllId->caption() ?></span></td>
        <td data-name="AllId" <?= $Page->AllId->cellAttributes() ?>>
<span id="el_pharmacy_products_AllId">
<span<?= $Page->AllId->viewAttributes() ?>>
<?= $Page->AllId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
    <tr id="r_BatchAndExpiryCompulsory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BatchAndExpiryCompulsory"><?= $Page->BatchAndExpiryCompulsory->caption() ?></span></td>
        <td data-name="BatchAndExpiryCompulsory" <?= $Page->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchAndExpiryCompulsory">
<span<?= $Page->BatchAndExpiryCompulsory->viewAttributes() ?>>
<?= $Page->BatchAndExpiryCompulsory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
    <tr id="r_BatchStockForWantedBook">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BatchStockForWantedBook"><?= $Page->BatchStockForWantedBook->caption() ?></span></td>
        <td data-name="BatchStockForWantedBook" <?= $Page->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchStockForWantedBook">
<span<?= $Page->BatchStockForWantedBook->viewAttributes() ?>>
<?= $Page->BatchStockForWantedBook->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
    <tr id="r_UnitBasedBilling">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UnitBasedBilling"><?= $Page->UnitBasedBilling->caption() ?></span></td>
        <td data-name="UnitBasedBilling" <?= $Page->UnitBasedBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitBasedBilling">
<span<?= $Page->UnitBasedBilling->viewAttributes() ?>>
<?= $Page->UnitBasedBilling->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
    <tr id="r_DoNotCheckStock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DoNotCheckStock"><?= $Page->DoNotCheckStock->caption() ?></span></td>
        <td data-name="DoNotCheckStock" <?= $Page->DoNotCheckStock->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckStock">
<span<?= $Page->DoNotCheckStock->viewAttributes() ?>>
<?= $Page->DoNotCheckStock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AcceptRate->Visible) { // AcceptRate ?>
    <tr id="r_AcceptRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptRate"><?= $Page->AcceptRate->caption() ?></span></td>
        <td data-name="AcceptRate" <?= $Page->AcceptRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRate">
<span<?= $Page->AcceptRate->viewAttributes() ?>>
<?= $Page->AcceptRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PriceLevel->Visible) { // PriceLevel ?>
    <tr id="r_PriceLevel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PriceLevel"><?= $Page->PriceLevel->caption() ?></span></td>
        <td data-name="PriceLevel" <?= $Page->PriceLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceLevel">
<span<?= $Page->PriceLevel->viewAttributes() ?>>
<?= $Page->PriceLevel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LastQuotePrice->Visible) { // LastQuotePrice ?>
    <tr id="r_LastQuotePrice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LastQuotePrice"><?= $Page->LastQuotePrice->caption() ?></span></td>
        <td data-name="LastQuotePrice" <?= $Page->LastQuotePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_LastQuotePrice">
<span<?= $Page->LastQuotePrice->viewAttributes() ?>>
<?= $Page->LastQuotePrice->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PriceChange->Visible) { // PriceChange ?>
    <tr id="r_PriceChange">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PriceChange"><?= $Page->PriceChange->caption() ?></span></td>
        <td data-name="PriceChange" <?= $Page->PriceChange->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceChange">
<span<?= $Page->PriceChange->viewAttributes() ?>>
<?= $Page->PriceChange->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CommodityCode->Visible) { // CommodityCode ?>
    <tr id="r_CommodityCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CommodityCode"><?= $Page->CommodityCode->caption() ?></span></td>
        <td data-name="CommodityCode" <?= $Page->CommodityCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CommodityCode">
<span<?= $Page->CommodityCode->viewAttributes() ?>>
<?= $Page->CommodityCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InstitutePrice->Visible) { // InstitutePrice ?>
    <tr id="r_InstitutePrice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_InstitutePrice"><?= $Page->InstitutePrice->caption() ?></span></td>
        <td data-name="InstitutePrice" <?= $Page->InstitutePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_InstitutePrice">
<span<?= $Page->InstitutePrice->viewAttributes() ?>>
<?= $Page->InstitutePrice->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
    <tr id="r_CtrlOrDCtrlProduct">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CtrlOrDCtrlProduct"><?= $Page->CtrlOrDCtrlProduct->caption() ?></span></td>
        <td data-name="CtrlOrDCtrlProduct" <?= $Page->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_CtrlOrDCtrlProduct">
<span<?= $Page->CtrlOrDCtrlProduct->viewAttributes() ?>>
<?= $Page->CtrlOrDCtrlProduct->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ImportedDate->Visible) { // ImportedDate ?>
    <tr id="r_ImportedDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ImportedDate"><?= $Page->ImportedDate->caption() ?></span></td>
        <td data-name="ImportedDate" <?= $Page->ImportedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ImportedDate">
<span<?= $Page->ImportedDate->viewAttributes() ?>>
<?= $Page->ImportedDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsImported->Visible) { // IsImported ?>
    <tr id="r_IsImported">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsImported"><?= $Page->IsImported->caption() ?></span></td>
        <td data-name="IsImported" <?= $Page->IsImported->cellAttributes() ?>>
<span id="el_pharmacy_products_IsImported">
<span<?= $Page->IsImported->viewAttributes() ?>>
<?= $Page->IsImported->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FileName->Visible) { // FileName ?>
    <tr id="r_FileName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FileName"><?= $Page->FileName->caption() ?></span></td>
        <td data-name="FileName" <?= $Page->FileName->cellAttributes() ?>>
<span id="el_pharmacy_products_FileName">
<span<?= $Page->FileName->viewAttributes() ?>>
<?= $Page->FileName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LPName->Visible) { // LPName ?>
    <tr id="r_LPName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LPName"><?= $Page->LPName->caption() ?></span></td>
        <td data-name="LPName" <?= $Page->LPName->cellAttributes() ?>>
<span id="el_pharmacy_products_LPName">
<span<?= $Page->LPName->viewAttributes() ?>>
<?= $Page->LPName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GodownNumber->Visible) { // GodownNumber ?>
    <tr id="r_GodownNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GodownNumber"><?= $Page->GodownNumber->caption() ?></span></td>
        <td data-name="GodownNumber" <?= $Page->GodownNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_GodownNumber">
<span<?= $Page->GodownNumber->viewAttributes() ?>>
<?= $Page->GodownNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreationDate->Visible) { // CreationDate ?>
    <tr id="r_CreationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CreationDate"><?= $Page->CreationDate->caption() ?></span></td>
        <td data-name="CreationDate" <?= $Page->CreationDate->cellAttributes() ?>>
<span id="el_pharmacy_products_CreationDate">
<span<?= $Page->CreationDate->viewAttributes() ?>>
<?= $Page->CreationDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedbyUser->Visible) { // CreatedbyUser ?>
    <tr id="r_CreatedbyUser">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CreatedbyUser"><?= $Page->CreatedbyUser->caption() ?></span></td>
        <td data-name="CreatedbyUser" <?= $Page->CreatedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_CreatedbyUser">
<span<?= $Page->CreatedbyUser->viewAttributes() ?>>
<?= $Page->CreatedbyUser->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedDate->Visible) { // ModifiedDate ?>
    <tr id="r_ModifiedDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifiedDate"><?= $Page->ModifiedDate->caption() ?></span></td>
        <td data-name="ModifiedDate" <?= $Page->ModifiedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedDate">
<span<?= $Page->ModifiedDate->viewAttributes() ?>>
<?= $Page->ModifiedDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
    <tr id="r_ModifiedbyUser">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifiedbyUser"><?= $Page->ModifiedbyUser->caption() ?></span></td>
        <td data-name="ModifiedbyUser" <?= $Page->ModifiedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedbyUser">
<span<?= $Page->ModifiedbyUser->viewAttributes() ?>>
<?= $Page->ModifiedbyUser->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->isActive->Visible) { // isActive ?>
    <tr id="r_isActive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_isActive"><?= $Page->isActive->caption() ?></span></td>
        <td data-name="isActive" <?= $Page->isActive->cellAttributes() ?>>
<span id="el_pharmacy_products_isActive">
<span<?= $Page->isActive->viewAttributes() ?>>
<?= $Page->isActive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
    <tr id="r_AllowExpiryClaim">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowExpiryClaim"><?= $Page->AllowExpiryClaim->caption() ?></span></td>
        <td data-name="AllowExpiryClaim" <?= $Page->AllowExpiryClaim->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryClaim">
<span<?= $Page->AllowExpiryClaim->viewAttributes() ?>>
<?= $Page->AllowExpiryClaim->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BrandCode->Visible) { // BrandCode ?>
    <tr id="r_BrandCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BrandCode"><?= $Page->BrandCode->caption() ?></span></td>
        <td data-name="BrandCode" <?= $Page->BrandCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BrandCode">
<span<?= $Page->BrandCode->viewAttributes() ?>>
<?= $Page->BrandCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
    <tr id="r_FreeSchemeBasedon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeSchemeBasedon"><?= $Page->FreeSchemeBasedon->caption() ?></span></td>
        <td data-name="FreeSchemeBasedon" <?= $Page->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeSchemeBasedon">
<span<?= $Page->FreeSchemeBasedon->viewAttributes() ?>>
<?= $Page->FreeSchemeBasedon->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
    <tr id="r_DoNotCheckCostInBill">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DoNotCheckCostInBill"><?= $Page->DoNotCheckCostInBill->caption() ?></span></td>
        <td data-name="DoNotCheckCostInBill" <?= $Page->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckCostInBill">
<span<?= $Page->DoNotCheckCostInBill->viewAttributes() ?>>
<?= $Page->DoNotCheckCostInBill->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductGroupCode->Visible) { // ProductGroupCode ?>
    <tr id="r_ProductGroupCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductGroupCode"><?= $Page->ProductGroupCode->caption() ?></span></td>
        <td data-name="ProductGroupCode" <?= $Page->ProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductGroupCode">
<span<?= $Page->ProductGroupCode->viewAttributes() ?>>
<?= $Page->ProductGroupCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
    <tr id="r_ProductStrengthCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductStrengthCode"><?= $Page->ProductStrengthCode->caption() ?></span></td>
        <td data-name="ProductStrengthCode" <?= $Page->ProductStrengthCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductStrengthCode">
<span<?= $Page->ProductStrengthCode->viewAttributes() ?>>
<?= $Page->ProductStrengthCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PackingCode->Visible) { // PackingCode ?>
    <tr id="r_PackingCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PackingCode"><?= $Page->PackingCode->caption() ?></span></td>
        <td data-name="PackingCode" <?= $Page->PackingCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PackingCode">
<span<?= $Page->PackingCode->viewAttributes() ?>>
<?= $Page->PackingCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ComputedMinStock->Visible) { // ComputedMinStock ?>
    <tr id="r_ComputedMinStock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComputedMinStock"><?= $Page->ComputedMinStock->caption() ?></span></td>
        <td data-name="ComputedMinStock" <?= $Page->ComputedMinStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMinStock">
<span<?= $Page->ComputedMinStock->viewAttributes() ?>>
<?= $Page->ComputedMinStock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
    <tr id="r_ComputedMaxStock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComputedMaxStock"><?= $Page->ComputedMaxStock->caption() ?></span></td>
        <td data-name="ComputedMaxStock" <?= $Page->ComputedMaxStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMaxStock">
<span<?= $Page->ComputedMaxStock->viewAttributes() ?>>
<?= $Page->ComputedMaxStock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductRemark->Visible) { // ProductRemark ?>
    <tr id="r_ProductRemark">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductRemark"><?= $Page->ProductRemark->caption() ?></span></td>
        <td data-name="ProductRemark" <?= $Page->ProductRemark->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductRemark">
<span<?= $Page->ProductRemark->viewAttributes() ?>>
<?= $Page->ProductRemark->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductDrugCode->Visible) { // ProductDrugCode ?>
    <tr id="r_ProductDrugCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductDrugCode"><?= $Page->ProductDrugCode->caption() ?></span></td>
        <td data-name="ProductDrugCode" <?= $Page->ProductDrugCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDrugCode">
<span<?= $Page->ProductDrugCode->viewAttributes() ?>>
<?= $Page->ProductDrugCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
    <tr id="r_IsMatrixProduct">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsMatrixProduct"><?= $Page->IsMatrixProduct->caption() ?></span></td>
        <td data-name="IsMatrixProduct" <?= $Page->IsMatrixProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMatrixProduct">
<span<?= $Page->IsMatrixProduct->viewAttributes() ?>>
<?= $Page->IsMatrixProduct->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount1->Visible) { // AttributeCount1 ?>
    <tr id="r_AttributeCount1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount1"><?= $Page->AttributeCount1->caption() ?></span></td>
        <td data-name="AttributeCount1" <?= $Page->AttributeCount1->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount1">
<span<?= $Page->AttributeCount1->viewAttributes() ?>>
<?= $Page->AttributeCount1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount2->Visible) { // AttributeCount2 ?>
    <tr id="r_AttributeCount2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount2"><?= $Page->AttributeCount2->caption() ?></span></td>
        <td data-name="AttributeCount2" <?= $Page->AttributeCount2->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount2">
<span<?= $Page->AttributeCount2->viewAttributes() ?>>
<?= $Page->AttributeCount2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount3->Visible) { // AttributeCount3 ?>
    <tr id="r_AttributeCount3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount3"><?= $Page->AttributeCount3->caption() ?></span></td>
        <td data-name="AttributeCount3" <?= $Page->AttributeCount3->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount3">
<span<?= $Page->AttributeCount3->viewAttributes() ?>>
<?= $Page->AttributeCount3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount4->Visible) { // AttributeCount4 ?>
    <tr id="r_AttributeCount4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount4"><?= $Page->AttributeCount4->caption() ?></span></td>
        <td data-name="AttributeCount4" <?= $Page->AttributeCount4->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount4">
<span<?= $Page->AttributeCount4->viewAttributes() ?>>
<?= $Page->AttributeCount4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount5->Visible) { // AttributeCount5 ?>
    <tr id="r_AttributeCount5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount5"><?= $Page->AttributeCount5->caption() ?></span></td>
        <td data-name="AttributeCount5" <?= $Page->AttributeCount5->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount5">
<span<?= $Page->AttributeCount5->viewAttributes() ?>>
<?= $Page->AttributeCount5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
    <tr id="r_DefaultDiscountPercentage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultDiscountPercentage"><?= $Page->DefaultDiscountPercentage->caption() ?></span></td>
        <td data-name="DefaultDiscountPercentage" <?= $Page->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultDiscountPercentage">
<span<?= $Page->DefaultDiscountPercentage->viewAttributes() ?>>
<?= $Page->DefaultDiscountPercentage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
    <tr id="r_DonotPrintBarcode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DonotPrintBarcode"><?= $Page->DonotPrintBarcode->caption() ?></span></td>
        <td data-name="DonotPrintBarcode" <?= $Page->DonotPrintBarcode->cellAttributes() ?>>
<span id="el_pharmacy_products_DonotPrintBarcode">
<span<?= $Page->DonotPrintBarcode->viewAttributes() ?>>
<?= $Page->DonotPrintBarcode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
    <tr id="r_ProductLevelDiscount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductLevelDiscount"><?= $Page->ProductLevelDiscount->caption() ?></span></td>
        <td data-name="ProductLevelDiscount" <?= $Page->ProductLevelDiscount->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLevelDiscount">
<span<?= $Page->ProductLevelDiscount->viewAttributes() ?>>
<?= $Page->ProductLevelDiscount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Markup->Visible) { // Markup ?>
    <tr id="r_Markup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Markup"><?= $Page->Markup->caption() ?></span></td>
        <td data-name="Markup" <?= $Page->Markup->cellAttributes() ?>>
<span id="el_pharmacy_products_Markup">
<span<?= $Page->Markup->viewAttributes() ?>>
<?= $Page->Markup->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MarkDown->Visible) { // MarkDown ?>
    <tr id="r_MarkDown">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkDown"><?= $Page->MarkDown->caption() ?></span></td>
        <td data-name="MarkDown" <?= $Page->MarkDown->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDown">
<span<?= $Page->MarkDown->viewAttributes() ?>>
<?= $Page->MarkDown->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
    <tr id="r_ReworkSalePrice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ReworkSalePrice"><?= $Page->ReworkSalePrice->caption() ?></span></td>
        <td data-name="ReworkSalePrice" <?= $Page->ReworkSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_ReworkSalePrice">
<span<?= $Page->ReworkSalePrice->viewAttributes() ?>>
<?= $Page->ReworkSalePrice->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MultipleInput->Visible) { // MultipleInput ?>
    <tr id="r_MultipleInput">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MultipleInput"><?= $Page->MultipleInput->caption() ?></span></td>
        <td data-name="MultipleInput" <?= $Page->MultipleInput->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleInput">
<span<?= $Page->MultipleInput->viewAttributes() ?>>
<?= $Page->MultipleInput->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LpPackageInformation->Visible) { // LpPackageInformation ?>
    <tr id="r_LpPackageInformation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LpPackageInformation"><?= $Page->LpPackageInformation->caption() ?></span></td>
        <td data-name="LpPackageInformation" <?= $Page->LpPackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_LpPackageInformation">
<span<?= $Page->LpPackageInformation->viewAttributes() ?>>
<?= $Page->LpPackageInformation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
    <tr id="r_AllowNegativeStock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowNegativeStock"><?= $Page->AllowNegativeStock->caption() ?></span></td>
        <td data-name="AllowNegativeStock" <?= $Page->AllowNegativeStock->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowNegativeStock">
<span<?= $Page->AllowNegativeStock->viewAttributes() ?>>
<?= $Page->AllowNegativeStock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OrderDate->Visible) { // OrderDate ?>
    <tr id="r_OrderDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderDate"><?= $Page->OrderDate->caption() ?></span></td>
        <td data-name="OrderDate" <?= $Page->OrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderDate">
<span<?= $Page->OrderDate->viewAttributes() ?>>
<?= $Page->OrderDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OrderTime->Visible) { // OrderTime ?>
    <tr id="r_OrderTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderTime"><?= $Page->OrderTime->caption() ?></span></td>
        <td data-name="OrderTime" <?= $Page->OrderTime->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderTime">
<span<?= $Page->OrderTime->viewAttributes() ?>>
<?= $Page->OrderTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RateGroupCode->Visible) { // RateGroupCode ?>
    <tr id="r_RateGroupCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RateGroupCode"><?= $Page->RateGroupCode->caption() ?></span></td>
        <td data-name="RateGroupCode" <?= $Page->RateGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RateGroupCode">
<span<?= $Page->RateGroupCode->viewAttributes() ?>>
<?= $Page->RateGroupCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
    <tr id="r_ConversionCaseLot">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ConversionCaseLot"><?= $Page->ConversionCaseLot->caption() ?></span></td>
        <td data-name="ConversionCaseLot" <?= $Page->ConversionCaseLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ConversionCaseLot">
<span<?= $Page->ConversionCaseLot->viewAttributes() ?>>
<?= $Page->ConversionCaseLot->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ShippingLot->Visible) { // ShippingLot ?>
    <tr id="r_ShippingLot">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ShippingLot"><?= $Page->ShippingLot->caption() ?></span></td>
        <td data-name="ShippingLot" <?= $Page->ShippingLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ShippingLot">
<span<?= $Page->ShippingLot->viewAttributes() ?>>
<?= $Page->ShippingLot->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
    <tr id="r_AllowExpiryReplacement">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowExpiryReplacement"><?= $Page->AllowExpiryReplacement->caption() ?></span></td>
        <td data-name="AllowExpiryReplacement" <?= $Page->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryReplacement">
<span<?= $Page->AllowExpiryReplacement->viewAttributes() ?>>
<?= $Page->AllowExpiryReplacement->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
    <tr id="r_NoOfMonthExpiryAllowed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_NoOfMonthExpiryAllowed"><?= $Page->NoOfMonthExpiryAllowed->caption() ?></span></td>
        <td data-name="NoOfMonthExpiryAllowed" <?= $Page->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el_pharmacy_products_NoOfMonthExpiryAllowed">
<span<?= $Page->NoOfMonthExpiryAllowed->viewAttributes() ?>>
<?= $Page->NoOfMonthExpiryAllowed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
    <tr id="r_ProductDiscountEligibility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductDiscountEligibility"><?= $Page->ProductDiscountEligibility->caption() ?></span></td>
        <td data-name="ProductDiscountEligibility" <?= $Page->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDiscountEligibility">
<span<?= $Page->ProductDiscountEligibility->viewAttributes() ?>>
<?= $Page->ProductDiscountEligibility->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
    <tr id="r_ScheduleTypeCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ScheduleTypeCode"><?= $Page->ScheduleTypeCode->caption() ?></span></td>
        <td data-name="ScheduleTypeCode" <?= $Page->ScheduleTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleTypeCode">
<span<?= $Page->ScheduleTypeCode->viewAttributes() ?>>
<?= $Page->ScheduleTypeCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
    <tr id="r_AIOCDProductCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AIOCDProductCode"><?= $Page->AIOCDProductCode->caption() ?></span></td>
        <td data-name="AIOCDProductCode" <?= $Page->AIOCDProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AIOCDProductCode">
<span<?= $Page->AIOCDProductCode->viewAttributes() ?>>
<?= $Page->AIOCDProductCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FreeQuantity->Visible) { // FreeQuantity ?>
    <tr id="r_FreeQuantity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeQuantity"><?= $Page->FreeQuantity->caption() ?></span></td>
        <td data-name="FreeQuantity" <?= $Page->FreeQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeQuantity">
<span<?= $Page->FreeQuantity->viewAttributes() ?>>
<?= $Page->FreeQuantity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DiscountType->Visible) { // DiscountType ?>
    <tr id="r_DiscountType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DiscountType"><?= $Page->DiscountType->caption() ?></span></td>
        <td data-name="DiscountType" <?= $Page->DiscountType->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountType">
<span<?= $Page->DiscountType->viewAttributes() ?>>
<?= $Page->DiscountType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DiscountValue->Visible) { // DiscountValue ?>
    <tr id="r_DiscountValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DiscountValue"><?= $Page->DiscountValue->caption() ?></span></td>
        <td data-name="DiscountValue" <?= $Page->DiscountValue->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountValue">
<span<?= $Page->DiscountValue->viewAttributes() ?>>
<?= $Page->DiscountValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
    <tr id="r_HasProductOrderAttribute">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_HasProductOrderAttribute"><?= $Page->HasProductOrderAttribute->caption() ?></span></td>
        <td data-name="HasProductOrderAttribute" <?= $Page->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el_pharmacy_products_HasProductOrderAttribute">
<span<?= $Page->HasProductOrderAttribute->viewAttributes() ?>>
<?= $Page->HasProductOrderAttribute->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FirstPODate->Visible) { // FirstPODate ?>
    <tr id="r_FirstPODate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FirstPODate"><?= $Page->FirstPODate->caption() ?></span></td>
        <td data-name="FirstPODate" <?= $Page->FirstPODate->cellAttributes() ?>>
<span id="el_pharmacy_products_FirstPODate">
<span<?= $Page->FirstPODate->viewAttributes() ?>>
<?= $Page->FirstPODate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
    <tr id="r_SaleprcieAndMrpCalcPercent">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent"><?= $Page->SaleprcieAndMrpCalcPercent->caption() ?></span></td>
        <td data-name="SaleprcieAndMrpCalcPercent" <?= $Page->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleprcieAndMrpCalcPercent">
<span<?= $Page->SaleprcieAndMrpCalcPercent->viewAttributes() ?>>
<?= $Page->SaleprcieAndMrpCalcPercent->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
    <tr id="r_IsGiftVoucherProducts">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsGiftVoucherProducts"><?= $Page->IsGiftVoucherProducts->caption() ?></span></td>
        <td data-name="IsGiftVoucherProducts" <?= $Page->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_IsGiftVoucherProducts">
<span<?= $Page->IsGiftVoucherProducts->viewAttributes() ?>>
<?= $Page->IsGiftVoucherProducts->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
    <tr id="r_AcceptRange4SerialNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptRange4SerialNumber"><?= $Page->AcceptRange4SerialNumber->caption() ?></span></td>
        <td data-name="AcceptRange4SerialNumber" <?= $Page->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRange4SerialNumber">
<span<?= $Page->AcceptRange4SerialNumber->viewAttributes() ?>>
<?= $Page->AcceptRange4SerialNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
    <tr id="r_GiftVoucherDenomination">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GiftVoucherDenomination"><?= $Page->GiftVoucherDenomination->caption() ?></span></td>
        <td data-name="GiftVoucherDenomination" <?= $Page->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftVoucherDenomination">
<span<?= $Page->GiftVoucherDenomination->viewAttributes() ?>>
<?= $Page->GiftVoucherDenomination->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Subclasscode->Visible) { // Subclasscode ?>
    <tr id="r_Subclasscode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Subclasscode"><?= $Page->Subclasscode->caption() ?></span></td>
        <td data-name="Subclasscode" <?= $Page->Subclasscode->cellAttributes() ?>>
<span id="el_pharmacy_products_Subclasscode">
<span<?= $Page->Subclasscode->viewAttributes() ?>>
<?= $Page->Subclasscode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
    <tr id="r_BarCodeFromWeighingMachine">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BarCodeFromWeighingMachine"><?= $Page->BarCodeFromWeighingMachine->caption() ?></span></td>
        <td data-name="BarCodeFromWeighingMachine" <?= $Page->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeFromWeighingMachine">
<span<?= $Page->BarCodeFromWeighingMachine->viewAttributes() ?>>
<?= $Page->BarCodeFromWeighingMachine->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
    <tr id="r_CheckCostInReturn">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CheckCostInReturn"><?= $Page->CheckCostInReturn->caption() ?></span></td>
        <td data-name="CheckCostInReturn" <?= $Page->CheckCostInReturn->cellAttributes() ?>>
<span id="el_pharmacy_products_CheckCostInReturn">
<span<?= $Page->CheckCostInReturn->viewAttributes() ?>>
<?= $Page->CheckCostInReturn->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
    <tr id="r_FrequentSaleProduct">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FrequentSaleProduct"><?= $Page->FrequentSaleProduct->caption() ?></span></td>
        <td data-name="FrequentSaleProduct" <?= $Page->FrequentSaleProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_FrequentSaleProduct">
<span<?= $Page->FrequentSaleProduct->viewAttributes() ?>>
<?= $Page->FrequentSaleProduct->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RateType->Visible) { // RateType ?>
    <tr id="r_RateType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RateType"><?= $Page->RateType->caption() ?></span></td>
        <td data-name="RateType" <?= $Page->RateType->cellAttributes() ?>>
<span id="el_pharmacy_products_RateType">
<span<?= $Page->RateType->viewAttributes() ?>>
<?= $Page->RateType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TouchscreenName->Visible) { // TouchscreenName ?>
    <tr id="r_TouchscreenName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TouchscreenName"><?= $Page->TouchscreenName->caption() ?></span></td>
        <td data-name="TouchscreenName" <?= $Page->TouchscreenName->cellAttributes() ?>>
<span id="el_pharmacy_products_TouchscreenName">
<span<?= $Page->TouchscreenName->viewAttributes() ?>>
<?= $Page->TouchscreenName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FreeType->Visible) { // FreeType ?>
    <tr id="r_FreeType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeType"><?= $Page->FreeType->caption() ?></span></td>
        <td data-name="FreeType" <?= $Page->FreeType->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeType">
<span<?= $Page->FreeType->viewAttributes() ?>>
<?= $Page->FreeType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
    <tr id="r_LooseQtyasNewBatch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LooseQtyasNewBatch"><?= $Page->LooseQtyasNewBatch->caption() ?></span></td>
        <td data-name="LooseQtyasNewBatch" <?= $Page->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_LooseQtyasNewBatch">
<span<?= $Page->LooseQtyasNewBatch->viewAttributes() ?>>
<?= $Page->LooseQtyasNewBatch->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
    <tr id="r_AllowSlabBilling">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowSlabBilling"><?= $Page->AllowSlabBilling->caption() ?></span></td>
        <td data-name="AllowSlabBilling" <?= $Page->AllowSlabBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowSlabBilling">
<span<?= $Page->AllowSlabBilling->viewAttributes() ?>>
<?= $Page->AllowSlabBilling->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
    <tr id="r_ProductTypeForProduction">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductTypeForProduction"><?= $Page->ProductTypeForProduction->caption() ?></span></td>
        <td data-name="ProductTypeForProduction" <?= $Page->ProductTypeForProduction->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductTypeForProduction">
<span<?= $Page->ProductTypeForProduction->viewAttributes() ?>>
<?= $Page->ProductTypeForProduction->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RecipeCode->Visible) { // RecipeCode ?>
    <tr id="r_RecipeCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RecipeCode"><?= $Page->RecipeCode->caption() ?></span></td>
        <td data-name="RecipeCode" <?= $Page->RecipeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RecipeCode">
<span<?= $Page->RecipeCode->viewAttributes() ?>>
<?= $Page->RecipeCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DefaultUnitType->Visible) { // DefaultUnitType ?>
    <tr id="r_DefaultUnitType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultUnitType"><?= $Page->DefaultUnitType->caption() ?></span></td>
        <td data-name="DefaultUnitType" <?= $Page->DefaultUnitType->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultUnitType">
<span<?= $Page->DefaultUnitType->viewAttributes() ?>>
<?= $Page->DefaultUnitType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PIstatus->Visible) { // PIstatus ?>
    <tr id="r_PIstatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PIstatus"><?= $Page->PIstatus->caption() ?></span></td>
        <td data-name="PIstatus" <?= $Page->PIstatus->cellAttributes() ?>>
<span id="el_pharmacy_products_PIstatus">
<span<?= $Page->PIstatus->viewAttributes() ?>>
<?= $Page->PIstatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
    <tr id="r_LastPiConfirmedDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LastPiConfirmedDate"><?= $Page->LastPiConfirmedDate->caption() ?></span></td>
        <td data-name="LastPiConfirmedDate" <?= $Page->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPiConfirmedDate">
<span<?= $Page->LastPiConfirmedDate->viewAttributes() ?>>
<?= $Page->LastPiConfirmedDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BarCodeDesign->Visible) { // BarCodeDesign ?>
    <tr id="r_BarCodeDesign">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BarCodeDesign"><?= $Page->BarCodeDesign->caption() ?></span></td>
        <td data-name="BarCodeDesign" <?= $Page->BarCodeDesign->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDesign">
<span<?= $Page->BarCodeDesign->viewAttributes() ?>>
<?= $Page->BarCodeDesign->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
    <tr id="r_AcceptRemarksInBill">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptRemarksInBill"><?= $Page->AcceptRemarksInBill->caption() ?></span></td>
        <td data-name="AcceptRemarksInBill" <?= $Page->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRemarksInBill">
<span<?= $Page->AcceptRemarksInBill->viewAttributes() ?>>
<?= $Page->AcceptRemarksInBill->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Classification->Visible) { // Classification ?>
    <tr id="r_Classification">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Classification"><?= $Page->Classification->caption() ?></span></td>
        <td data-name="Classification" <?= $Page->Classification->cellAttributes() ?>>
<span id="el_pharmacy_products_Classification">
<span<?= $Page->Classification->viewAttributes() ?>>
<?= $Page->Classification->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TimeSlot->Visible) { // TimeSlot ?>
    <tr id="r_TimeSlot">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TimeSlot"><?= $Page->TimeSlot->caption() ?></span></td>
        <td data-name="TimeSlot" <?= $Page->TimeSlot->cellAttributes() ?>>
<span id="el_pharmacy_products_TimeSlot">
<span<?= $Page->TimeSlot->viewAttributes() ?>>
<?= $Page->TimeSlot->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsBundle->Visible) { // IsBundle ?>
    <tr id="r_IsBundle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsBundle"><?= $Page->IsBundle->caption() ?></span></td>
        <td data-name="IsBundle" <?= $Page->IsBundle->cellAttributes() ?>>
<span id="el_pharmacy_products_IsBundle">
<span<?= $Page->IsBundle->viewAttributes() ?>>
<?= $Page->IsBundle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ColorCode->Visible) { // ColorCode ?>
    <tr id="r_ColorCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ColorCode"><?= $Page->ColorCode->caption() ?></span></td>
        <td data-name="ColorCode" <?= $Page->ColorCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ColorCode">
<span<?= $Page->ColorCode->viewAttributes() ?>>
<?= $Page->ColorCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GenderCode->Visible) { // GenderCode ?>
    <tr id="r_GenderCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GenderCode"><?= $Page->GenderCode->caption() ?></span></td>
        <td data-name="GenderCode" <?= $Page->GenderCode->cellAttributes() ?>>
<span id="el_pharmacy_products_GenderCode">
<span<?= $Page->GenderCode->viewAttributes() ?>>
<?= $Page->GenderCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SizeCode->Visible) { // SizeCode ?>
    <tr id="r_SizeCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SizeCode"><?= $Page->SizeCode->caption() ?></span></td>
        <td data-name="SizeCode" <?= $Page->SizeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SizeCode">
<span<?= $Page->SizeCode->viewAttributes() ?>>
<?= $Page->SizeCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GiftCard->Visible) { // GiftCard ?>
    <tr id="r_GiftCard">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GiftCard"><?= $Page->GiftCard->caption() ?></span></td>
        <td data-name="GiftCard" <?= $Page->GiftCard->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftCard">
<span<?= $Page->GiftCard->viewAttributes() ?>>
<?= $Page->GiftCard->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ToonLabel->Visible) { // ToonLabel ?>
    <tr id="r_ToonLabel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ToonLabel"><?= $Page->ToonLabel->caption() ?></span></td>
        <td data-name="ToonLabel" <?= $Page->ToonLabel->cellAttributes() ?>>
<span id="el_pharmacy_products_ToonLabel">
<span<?= $Page->ToonLabel->viewAttributes() ?>>
<?= $Page->ToonLabel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GarmentType->Visible) { // GarmentType ?>
    <tr id="r_GarmentType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GarmentType"><?= $Page->GarmentType->caption() ?></span></td>
        <td data-name="GarmentType" <?= $Page->GarmentType->cellAttributes() ?>>
<span id="el_pharmacy_products_GarmentType">
<span<?= $Page->GarmentType->viewAttributes() ?>>
<?= $Page->GarmentType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AgeGroup->Visible) { // AgeGroup ?>
    <tr id="r_AgeGroup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AgeGroup"><?= $Page->AgeGroup->caption() ?></span></td>
        <td data-name="AgeGroup" <?= $Page->AgeGroup->cellAttributes() ?>>
<span id="el_pharmacy_products_AgeGroup">
<span<?= $Page->AgeGroup->viewAttributes() ?>>
<?= $Page->AgeGroup->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Season->Visible) { // Season ?>
    <tr id="r_Season">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Season"><?= $Page->Season->caption() ?></span></td>
        <td data-name="Season" <?= $Page->Season->cellAttributes() ?>>
<span id="el_pharmacy_products_Season">
<span<?= $Page->Season->viewAttributes() ?>>
<?= $Page->Season->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DailyStockEntry->Visible) { // DailyStockEntry ?>
    <tr id="r_DailyStockEntry">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DailyStockEntry"><?= $Page->DailyStockEntry->caption() ?></span></td>
        <td data-name="DailyStockEntry" <?= $Page->DailyStockEntry->cellAttributes() ?>>
<span id="el_pharmacy_products_DailyStockEntry">
<span<?= $Page->DailyStockEntry->viewAttributes() ?>>
<?= $Page->DailyStockEntry->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifierApplicable->Visible) { // ModifierApplicable ?>
    <tr id="r_ModifierApplicable">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifierApplicable"><?= $Page->ModifierApplicable->caption() ?></span></td>
        <td data-name="ModifierApplicable" <?= $Page->ModifierApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierApplicable">
<span<?= $Page->ModifierApplicable->viewAttributes() ?>>
<?= $Page->ModifierApplicable->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifierType->Visible) { // ModifierType ?>
    <tr id="r_ModifierType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifierType"><?= $Page->ModifierType->caption() ?></span></td>
        <td data-name="ModifierType" <?= $Page->ModifierType->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierType">
<span<?= $Page->ModifierType->viewAttributes() ?>>
<?= $Page->ModifierType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
    <tr id="r_AcceptZeroRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptZeroRate"><?= $Page->AcceptZeroRate->caption() ?></span></td>
        <td data-name="AcceptZeroRate" <?= $Page->AcceptZeroRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptZeroRate">
<span<?= $Page->AcceptZeroRate->viewAttributes() ?>>
<?= $Page->AcceptZeroRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
    <tr id="r_ExciseDutyCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExciseDutyCode"><?= $Page->ExciseDutyCode->caption() ?></span></td>
        <td data-name="ExciseDutyCode" <?= $Page->ExciseDutyCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ExciseDutyCode">
<span<?= $Page->ExciseDutyCode->viewAttributes() ?>>
<?= $Page->ExciseDutyCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
    <tr id="r_IndentProductGroupCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IndentProductGroupCode"><?= $Page->IndentProductGroupCode->caption() ?></span></td>
        <td data-name="IndentProductGroupCode" <?= $Page->IndentProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_IndentProductGroupCode">
<span<?= $Page->IndentProductGroupCode->viewAttributes() ?>>
<?= $Page->IndentProductGroupCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsMultiBatch->Visible) { // IsMultiBatch ?>
    <tr id="r_IsMultiBatch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsMultiBatch"><?= $Page->IsMultiBatch->caption() ?></span></td>
        <td data-name="IsMultiBatch" <?= $Page->IsMultiBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMultiBatch">
<span<?= $Page->IsMultiBatch->viewAttributes() ?>>
<?= $Page->IsMultiBatch->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsSingleBatch->Visible) { // IsSingleBatch ?>
    <tr id="r_IsSingleBatch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsSingleBatch"><?= $Page->IsSingleBatch->caption() ?></span></td>
        <td data-name="IsSingleBatch" <?= $Page->IsSingleBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsSingleBatch">
<span<?= $Page->IsSingleBatch->viewAttributes() ?>>
<?= $Page->IsSingleBatch->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MarkUpRate1->Visible) { // MarkUpRate1 ?>
    <tr id="r_MarkUpRate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkUpRate1"><?= $Page->MarkUpRate1->caption() ?></span></td>
        <td data-name="MarkUpRate1" <?= $Page->MarkUpRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate1">
<span<?= $Page->MarkUpRate1->viewAttributes() ?>>
<?= $Page->MarkUpRate1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MarkDownRate1->Visible) { // MarkDownRate1 ?>
    <tr id="r_MarkDownRate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkDownRate1"><?= $Page->MarkDownRate1->caption() ?></span></td>
        <td data-name="MarkDownRate1" <?= $Page->MarkDownRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate1">
<span<?= $Page->MarkDownRate1->viewAttributes() ?>>
<?= $Page->MarkDownRate1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MarkUpRate2->Visible) { // MarkUpRate2 ?>
    <tr id="r_MarkUpRate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkUpRate2"><?= $Page->MarkUpRate2->caption() ?></span></td>
        <td data-name="MarkUpRate2" <?= $Page->MarkUpRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate2">
<span<?= $Page->MarkUpRate2->viewAttributes() ?>>
<?= $Page->MarkUpRate2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MarkDownRate2->Visible) { // MarkDownRate2 ?>
    <tr id="r_MarkDownRate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkDownRate2"><?= $Page->MarkDownRate2->caption() ?></span></td>
        <td data-name="MarkDownRate2" <?= $Page->MarkDownRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate2">
<span<?= $Page->MarkDownRate2->viewAttributes() ?>>
<?= $Page->MarkDownRate2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Yield->Visible) { // Yield ?>
    <tr id="r__Yield">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products__Yield"><?= $Page->_Yield->caption() ?></span></td>
        <td data-name="_Yield" <?= $Page->_Yield->cellAttributes() ?>>
<span id="el_pharmacy_products__Yield">
<span<?= $Page->_Yield->viewAttributes() ?>>
<?= $Page->_Yield->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefProductCode->Visible) { // RefProductCode ?>
    <tr id="r_RefProductCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RefProductCode"><?= $Page->RefProductCode->caption() ?></span></td>
        <td data-name="RefProductCode" <?= $Page->RefProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RefProductCode">
<span<?= $Page->RefProductCode->viewAttributes() ?>>
<?= $Page->RefProductCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <tr id="r_Volume">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Volume"><?= $Page->Volume->caption() ?></span></td>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<span id="el_pharmacy_products_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MeasurementID->Visible) { // MeasurementID ?>
    <tr id="r_MeasurementID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MeasurementID"><?= $Page->MeasurementID->caption() ?></span></td>
        <td data-name="MeasurementID" <?= $Page->MeasurementID->cellAttributes() ?>>
<span id="el_pharmacy_products_MeasurementID">
<span<?= $Page->MeasurementID->viewAttributes() ?>>
<?= $Page->MeasurementID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CountryCode->Visible) { // CountryCode ?>
    <tr id="r_CountryCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CountryCode"><?= $Page->CountryCode->caption() ?></span></td>
        <td data-name="CountryCode" <?= $Page->CountryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CountryCode">
<span<?= $Page->CountryCode->viewAttributes() ?>>
<?= $Page->CountryCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AcceptWMQty->Visible) { // AcceptWMQty ?>
    <tr id="r_AcceptWMQty">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptWMQty"><?= $Page->AcceptWMQty->caption() ?></span></td>
        <td data-name="AcceptWMQty" <?= $Page->AcceptWMQty->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptWMQty">
<span<?= $Page->AcceptWMQty->viewAttributes() ?>>
<?= $Page->AcceptWMQty->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
    <tr id="r_SingleBatchBasedOnRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SingleBatchBasedOnRate"><?= $Page->SingleBatchBasedOnRate->caption() ?></span></td>
        <td data-name="SingleBatchBasedOnRate" <?= $Page->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBatchBasedOnRate">
<span<?= $Page->SingleBatchBasedOnRate->viewAttributes() ?>>
<?= $Page->SingleBatchBasedOnRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TenderNo->Visible) { // TenderNo ?>
    <tr id="r_TenderNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TenderNo"><?= $Page->TenderNo->caption() ?></span></td>
        <td data-name="TenderNo" <?= $Page->TenderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TenderNo">
<span<?= $Page->TenderNo->viewAttributes() ?>>
<?= $Page->TenderNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
    <tr id="r_SingleBillMaximumSoldQtyFiled">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled"><?= $Page->SingleBillMaximumSoldQtyFiled->caption() ?></span></td>
        <td data-name="SingleBillMaximumSoldQtyFiled" <?= $Page->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBillMaximumSoldQtyFiled">
<span<?= $Page->SingleBillMaximumSoldQtyFiled->viewAttributes() ?>>
<?= $Page->SingleBillMaximumSoldQtyFiled->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
    <tr id="r_Strength1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength1"><?= $Page->Strength1->caption() ?></span></td>
        <td data-name="Strength1" <?= $Page->Strength1->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength1">
<span<?= $Page->Strength1->viewAttributes() ?>>
<?= $Page->Strength1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
    <tr id="r_Strength2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength2"><?= $Page->Strength2->caption() ?></span></td>
        <td data-name="Strength2" <?= $Page->Strength2->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength2">
<span<?= $Page->Strength2->viewAttributes() ?>>
<?= $Page->Strength2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
    <tr id="r_Strength3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength3"><?= $Page->Strength3->caption() ?></span></td>
        <td data-name="Strength3" <?= $Page->Strength3->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength3">
<span<?= $Page->Strength3->viewAttributes() ?>>
<?= $Page->Strength3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
    <tr id="r_Strength4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength4"><?= $Page->Strength4->caption() ?></span></td>
        <td data-name="Strength4" <?= $Page->Strength4->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength4">
<span<?= $Page->Strength4->viewAttributes() ?>>
<?= $Page->Strength4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
    <tr id="r_Strength5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength5"><?= $Page->Strength5->caption() ?></span></td>
        <td data-name="Strength5" <?= $Page->Strength5->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength5">
<span<?= $Page->Strength5->viewAttributes() ?>>
<?= $Page->Strength5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IngredientCode1->Visible) { // IngredientCode1 ?>
    <tr id="r_IngredientCode1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode1"><?= $Page->IngredientCode1->caption() ?></span></td>
        <td data-name="IngredientCode1" <?= $Page->IngredientCode1->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode1">
<span<?= $Page->IngredientCode1->viewAttributes() ?>>
<?= $Page->IngredientCode1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IngredientCode2->Visible) { // IngredientCode2 ?>
    <tr id="r_IngredientCode2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode2"><?= $Page->IngredientCode2->caption() ?></span></td>
        <td data-name="IngredientCode2" <?= $Page->IngredientCode2->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode2">
<span<?= $Page->IngredientCode2->viewAttributes() ?>>
<?= $Page->IngredientCode2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IngredientCode3->Visible) { // IngredientCode3 ?>
    <tr id="r_IngredientCode3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode3"><?= $Page->IngredientCode3->caption() ?></span></td>
        <td data-name="IngredientCode3" <?= $Page->IngredientCode3->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode3">
<span<?= $Page->IngredientCode3->viewAttributes() ?>>
<?= $Page->IngredientCode3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IngredientCode4->Visible) { // IngredientCode4 ?>
    <tr id="r_IngredientCode4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode4"><?= $Page->IngredientCode4->caption() ?></span></td>
        <td data-name="IngredientCode4" <?= $Page->IngredientCode4->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode4">
<span<?= $Page->IngredientCode4->viewAttributes() ?>>
<?= $Page->IngredientCode4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IngredientCode5->Visible) { // IngredientCode5 ?>
    <tr id="r_IngredientCode5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode5"><?= $Page->IngredientCode5->caption() ?></span></td>
        <td data-name="IngredientCode5" <?= $Page->IngredientCode5->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode5">
<span<?= $Page->IngredientCode5->viewAttributes() ?>>
<?= $Page->IngredientCode5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OrderType->Visible) { // OrderType ?>
    <tr id="r_OrderType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderType"><?= $Page->OrderType->caption() ?></span></td>
        <td data-name="OrderType" <?= $Page->OrderType->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderType">
<span<?= $Page->OrderType->viewAttributes() ?>>
<?= $Page->OrderType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StockUOM->Visible) { // StockUOM ?>
    <tr id="r_StockUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockUOM"><?= $Page->StockUOM->caption() ?></span></td>
        <td data-name="StockUOM" <?= $Page->StockUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_StockUOM">
<span<?= $Page->StockUOM->viewAttributes() ?>>
<?= $Page->StockUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PriceUOM->Visible) { // PriceUOM ?>
    <tr id="r_PriceUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PriceUOM"><?= $Page->PriceUOM->caption() ?></span></td>
        <td data-name="PriceUOM" <?= $Page->PriceUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceUOM">
<span<?= $Page->PriceUOM->viewAttributes() ?>>
<?= $Page->PriceUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
    <tr id="r_DefaultSaleUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultSaleUOM"><?= $Page->DefaultSaleUOM->caption() ?></span></td>
        <td data-name="DefaultSaleUOM" <?= $Page->DefaultSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultSaleUOM">
<span<?= $Page->DefaultSaleUOM->viewAttributes() ?>>
<?= $Page->DefaultSaleUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
    <tr id="r_DefaultPurchaseUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultPurchaseUOM"><?= $Page->DefaultPurchaseUOM->caption() ?></span></td>
        <td data-name="DefaultPurchaseUOM" <?= $Page->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultPurchaseUOM">
<span<?= $Page->DefaultPurchaseUOM->viewAttributes() ?>>
<?= $Page->DefaultPurchaseUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReportingUOM->Visible) { // ReportingUOM ?>
    <tr id="r_ReportingUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ReportingUOM"><?= $Page->ReportingUOM->caption() ?></span></td>
        <td data-name="ReportingUOM" <?= $Page->ReportingUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_ReportingUOM">
<span<?= $Page->ReportingUOM->viewAttributes() ?>>
<?= $Page->ReportingUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
    <tr id="r_LastPurchasedUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LastPurchasedUOM"><?= $Page->LastPurchasedUOM->caption() ?></span></td>
        <td data-name="LastPurchasedUOM" <?= $Page->LastPurchasedUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPurchasedUOM">
<span<?= $Page->LastPurchasedUOM->viewAttributes() ?>>
<?= $Page->LastPurchasedUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentCodes->Visible) { // TreatmentCodes ?>
    <tr id="r_TreatmentCodes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TreatmentCodes"><?= $Page->TreatmentCodes->caption() ?></span></td>
        <td data-name="TreatmentCodes" <?= $Page->TreatmentCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_TreatmentCodes">
<span<?= $Page->TreatmentCodes->viewAttributes() ?>>
<?= $Page->TreatmentCodes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InsuranceType->Visible) { // InsuranceType ?>
    <tr id="r_InsuranceType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_InsuranceType"><?= $Page->InsuranceType->caption() ?></span></td>
        <td data-name="InsuranceType" <?= $Page->InsuranceType->cellAttributes() ?>>
<span id="el_pharmacy_products_InsuranceType">
<span<?= $Page->InsuranceType->viewAttributes() ?>>
<?= $Page->InsuranceType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
    <tr id="r_CoverageGroupCodes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CoverageGroupCodes"><?= $Page->CoverageGroupCodes->caption() ?></span></td>
        <td data-name="CoverageGroupCodes" <?= $Page->CoverageGroupCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_CoverageGroupCodes">
<span<?= $Page->CoverageGroupCodes->viewAttributes() ?>>
<?= $Page->CoverageGroupCodes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MultipleUOM->Visible) { // MultipleUOM ?>
    <tr id="r_MultipleUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MultipleUOM"><?= $Page->MultipleUOM->caption() ?></span></td>
        <td data-name="MultipleUOM" <?= $Page->MultipleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleUOM">
<span<?= $Page->MultipleUOM->viewAttributes() ?>>
<?= $Page->MultipleUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SalePriceComputation->Visible) { // SalePriceComputation ?>
    <tr id="r_SalePriceComputation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalePriceComputation"><?= $Page->SalePriceComputation->caption() ?></span></td>
        <td data-name="SalePriceComputation" <?= $Page->SalePriceComputation->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePriceComputation">
<span<?= $Page->SalePriceComputation->viewAttributes() ?>>
<?= $Page->SalePriceComputation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StockCorrection->Visible) { // StockCorrection ?>
    <tr id="r_StockCorrection">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockCorrection"><?= $Page->StockCorrection->caption() ?></span></td>
        <td data-name="StockCorrection" <?= $Page->StockCorrection->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCorrection">
<span<?= $Page->StockCorrection->viewAttributes() ?>>
<?= $Page->StockCorrection->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LBTPercentage->Visible) { // LBTPercentage ?>
    <tr id="r_LBTPercentage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LBTPercentage"><?= $Page->LBTPercentage->caption() ?></span></td>
        <td data-name="LBTPercentage" <?= $Page->LBTPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_LBTPercentage">
<span<?= $Page->LBTPercentage->viewAttributes() ?>>
<?= $Page->LBTPercentage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SalesCommission->Visible) { // SalesCommission ?>
    <tr id="r_SalesCommission">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalesCommission"><?= $Page->SalesCommission->caption() ?></span></td>
        <td data-name="SalesCommission" <?= $Page->SalesCommission->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesCommission">
<span<?= $Page->SalesCommission->viewAttributes() ?>>
<?= $Page->SalesCommission->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LockedStock->Visible) { // LockedStock ?>
    <tr id="r_LockedStock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LockedStock"><?= $Page->LockedStock->caption() ?></span></td>
        <td data-name="LockedStock" <?= $Page->LockedStock->cellAttributes() ?>>
<span id="el_pharmacy_products_LockedStock">
<span<?= $Page->LockedStock->viewAttributes() ?>>
<?= $Page->LockedStock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MinMaxUOM->Visible) { // MinMaxUOM ?>
    <tr id="r_MinMaxUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinMaxUOM"><?= $Page->MinMaxUOM->caption() ?></span></td>
        <td data-name="MinMaxUOM" <?= $Page->MinMaxUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxUOM">
<span<?= $Page->MinMaxUOM->viewAttributes() ?>>
<?= $Page->MinMaxUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
    <tr id="r_ExpiryMfrDateFormat">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExpiryMfrDateFormat"><?= $Page->ExpiryMfrDateFormat->caption() ?></span></td>
        <td data-name="ExpiryMfrDateFormat" <?= $Page->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryMfrDateFormat">
<span<?= $Page->ExpiryMfrDateFormat->viewAttributes() ?>>
<?= $Page->ExpiryMfrDateFormat->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductLifeTime->Visible) { // ProductLifeTime ?>
    <tr id="r_ProductLifeTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductLifeTime"><?= $Page->ProductLifeTime->caption() ?></span></td>
        <td data-name="ProductLifeTime" <?= $Page->ProductLifeTime->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLifeTime">
<span<?= $Page->ProductLifeTime->viewAttributes() ?>>
<?= $Page->ProductLifeTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsCombo->Visible) { // IsCombo ?>
    <tr id="r_IsCombo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsCombo"><?= $Page->IsCombo->caption() ?></span></td>
        <td data-name="IsCombo" <?= $Page->IsCombo->cellAttributes() ?>>
<span id="el_pharmacy_products_IsCombo">
<span<?= $Page->IsCombo->viewAttributes() ?>>
<?= $Page->IsCombo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ComboTypeCode->Visible) { // ComboTypeCode ?>
    <tr id="r_ComboTypeCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComboTypeCode"><?= $Page->ComboTypeCode->caption() ?></span></td>
        <td data-name="ComboTypeCode" <?= $Page->ComboTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ComboTypeCode">
<span<?= $Page->ComboTypeCode->viewAttributes() ?>>
<?= $Page->ComboTypeCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount6->Visible) { // AttributeCount6 ?>
    <tr id="r_AttributeCount6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount6"><?= $Page->AttributeCount6->caption() ?></span></td>
        <td data-name="AttributeCount6" <?= $Page->AttributeCount6->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount6">
<span<?= $Page->AttributeCount6->viewAttributes() ?>>
<?= $Page->AttributeCount6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount7->Visible) { // AttributeCount7 ?>
    <tr id="r_AttributeCount7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount7"><?= $Page->AttributeCount7->caption() ?></span></td>
        <td data-name="AttributeCount7" <?= $Page->AttributeCount7->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount7">
<span<?= $Page->AttributeCount7->viewAttributes() ?>>
<?= $Page->AttributeCount7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount8->Visible) { // AttributeCount8 ?>
    <tr id="r_AttributeCount8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount8"><?= $Page->AttributeCount8->caption() ?></span></td>
        <td data-name="AttributeCount8" <?= $Page->AttributeCount8->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount8">
<span<?= $Page->AttributeCount8->viewAttributes() ?>>
<?= $Page->AttributeCount8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount9->Visible) { // AttributeCount9 ?>
    <tr id="r_AttributeCount9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount9"><?= $Page->AttributeCount9->caption() ?></span></td>
        <td data-name="AttributeCount9" <?= $Page->AttributeCount9->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount9">
<span<?= $Page->AttributeCount9->viewAttributes() ?>>
<?= $Page->AttributeCount9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AttributeCount10->Visible) { // AttributeCount10 ?>
    <tr id="r_AttributeCount10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount10"><?= $Page->AttributeCount10->caption() ?></span></td>
        <td data-name="AttributeCount10" <?= $Page->AttributeCount10->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount10">
<span<?= $Page->AttributeCount10->viewAttributes() ?>>
<?= $Page->AttributeCount10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LabourCharge->Visible) { // LabourCharge ?>
    <tr id="r_LabourCharge">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LabourCharge"><?= $Page->LabourCharge->caption() ?></span></td>
        <td data-name="LabourCharge" <?= $Page->LabourCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_LabourCharge">
<span<?= $Page->LabourCharge->viewAttributes() ?>>
<?= $Page->LabourCharge->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
    <tr id="r_AffectOtherCharge">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AffectOtherCharge"><?= $Page->AffectOtherCharge->caption() ?></span></td>
        <td data-name="AffectOtherCharge" <?= $Page->AffectOtherCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_AffectOtherCharge">
<span<?= $Page->AffectOtherCharge->viewAttributes() ?>>
<?= $Page->AffectOtherCharge->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DosageInfo->Visible) { // DosageInfo ?>
    <tr id="r_DosageInfo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DosageInfo"><?= $Page->DosageInfo->caption() ?></span></td>
        <td data-name="DosageInfo" <?= $Page->DosageInfo->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageInfo">
<span<?= $Page->DosageInfo->viewAttributes() ?>>
<?= $Page->DosageInfo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DosageType->Visible) { // DosageType ?>
    <tr id="r_DosageType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DosageType"><?= $Page->DosageType->caption() ?></span></td>
        <td data-name="DosageType" <?= $Page->DosageType->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageType">
<span<?= $Page->DosageType->viewAttributes() ?>>
<?= $Page->DosageType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
    <tr id="r_DefaultIndentUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultIndentUOM"><?= $Page->DefaultIndentUOM->caption() ?></span></td>
        <td data-name="DefaultIndentUOM" <?= $Page->DefaultIndentUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultIndentUOM">
<span<?= $Page->DefaultIndentUOM->viewAttributes() ?>>
<?= $Page->DefaultIndentUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PromoTag->Visible) { // PromoTag ?>
    <tr id="r_PromoTag">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PromoTag"><?= $Page->PromoTag->caption() ?></span></td>
        <td data-name="PromoTag" <?= $Page->PromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_PromoTag">
<span<?= $Page->PromoTag->viewAttributes() ?>>
<?= $Page->PromoTag->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
    <tr id="r_BillLevelPromoTag">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BillLevelPromoTag"><?= $Page->BillLevelPromoTag->caption() ?></span></td>
        <td data-name="BillLevelPromoTag" <?= $Page->BillLevelPromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_BillLevelPromoTag">
<span<?= $Page->BillLevelPromoTag->viewAttributes() ?>>
<?= $Page->BillLevelPromoTag->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsMRPProduct->Visible) { // IsMRPProduct ?>
    <tr id="r_IsMRPProduct">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsMRPProduct"><?= $Page->IsMRPProduct->caption() ?></span></td>
        <td data-name="IsMRPProduct" <?= $Page->IsMRPProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMRPProduct">
<span<?= $Page->IsMRPProduct->viewAttributes() ?>>
<?= $Page->IsMRPProduct->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MrpList->Visible) { // MrpList ?>
    <tr id="r_MrpList">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MrpList"><?= $Page->MrpList->caption() ?></span></td>
        <td data-name="MrpList" <?= $Page->MrpList->cellAttributes() ?>>
<span id="el_pharmacy_products_MrpList">
<span<?= $Page->MrpList->viewAttributes() ?>>
<?= $Page->MrpList->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
    <tr id="r_AlternateSaleUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AlternateSaleUOM"><?= $Page->AlternateSaleUOM->caption() ?></span></td>
        <td data-name="AlternateSaleUOM" <?= $Page->AlternateSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSaleUOM">
<span<?= $Page->AlternateSaleUOM->viewAttributes() ?>>
<?= $Page->AlternateSaleUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FreeUOM->Visible) { // FreeUOM ?>
    <tr id="r_FreeUOM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeUOM"><?= $Page->FreeUOM->caption() ?></span></td>
        <td data-name="FreeUOM" <?= $Page->FreeUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeUOM">
<span<?= $Page->FreeUOM->viewAttributes() ?>>
<?= $Page->FreeUOM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MarketedCode->Visible) { // MarketedCode ?>
    <tr id="r_MarketedCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarketedCode"><?= $Page->MarketedCode->caption() ?></span></td>
        <td data-name="MarketedCode" <?= $Page->MarketedCode->cellAttributes() ?>>
<span id="el_pharmacy_products_MarketedCode">
<span<?= $Page->MarketedCode->viewAttributes() ?>>
<?= $Page->MarketedCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
    <tr id="r_MinimumSalePrice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinimumSalePrice"><?= $Page->MinimumSalePrice->caption() ?></span></td>
        <td data-name="MinimumSalePrice" <?= $Page->MinimumSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumSalePrice">
<span<?= $Page->MinimumSalePrice->viewAttributes() ?>>
<?= $Page->MinimumSalePrice->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRate1->Visible) { // PRate1 ?>
    <tr id="r_PRate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PRate1"><?= $Page->PRate1->caption() ?></span></td>
        <td data-name="PRate1" <?= $Page->PRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate1">
<span<?= $Page->PRate1->viewAttributes() ?>>
<?= $Page->PRate1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRate2->Visible) { // PRate2 ?>
    <tr id="r_PRate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PRate2"><?= $Page->PRate2->caption() ?></span></td>
        <td data-name="PRate2" <?= $Page->PRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate2">
<span<?= $Page->PRate2->viewAttributes() ?>>
<?= $Page->PRate2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LPItemCost->Visible) { // LPItemCost ?>
    <tr id="r_LPItemCost">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LPItemCost"><?= $Page->LPItemCost->caption() ?></span></td>
        <td data-name="LPItemCost" <?= $Page->LPItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_LPItemCost">
<span<?= $Page->LPItemCost->viewAttributes() ?>>
<?= $Page->LPItemCost->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FixedItemCost->Visible) { // FixedItemCost ?>
    <tr id="r_FixedItemCost">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FixedItemCost"><?= $Page->FixedItemCost->caption() ?></span></td>
        <td data-name="FixedItemCost" <?= $Page->FixedItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_FixedItemCost">
<span<?= $Page->FixedItemCost->viewAttributes() ?>>
<?= $Page->FixedItemCost->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HSNId->Visible) { // HSNId ?>
    <tr id="r_HSNId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_HSNId"><?= $Page->HSNId->caption() ?></span></td>
        <td data-name="HSNId" <?= $Page->HSNId->cellAttributes() ?>>
<span id="el_pharmacy_products_HSNId">
<span<?= $Page->HSNId->viewAttributes() ?>>
<?= $Page->HSNId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TaxInclusive->Visible) { // TaxInclusive ?>
    <tr id="r_TaxInclusive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TaxInclusive"><?= $Page->TaxInclusive->caption() ?></span></td>
        <td data-name="TaxInclusive" <?= $Page->TaxInclusive->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxInclusive">
<span<?= $Page->TaxInclusive->viewAttributes() ?>>
<?= $Page->TaxInclusive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
    <tr id="r_EligibleforWarranty">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_EligibleforWarranty"><?= $Page->EligibleforWarranty->caption() ?></span></td>
        <td data-name="EligibleforWarranty" <?= $Page->EligibleforWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_EligibleforWarranty">
<span<?= $Page->EligibleforWarranty->viewAttributes() ?>>
<?= $Page->EligibleforWarranty->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
    <tr id="r_NoofMonthsWarranty">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_NoofMonthsWarranty"><?= $Page->NoofMonthsWarranty->caption() ?></span></td>
        <td data-name="NoofMonthsWarranty" <?= $Page->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_NoofMonthsWarranty">
<span<?= $Page->NoofMonthsWarranty->viewAttributes() ?>>
<?= $Page->NoofMonthsWarranty->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
    <tr id="r_ComputeTaxonCost">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComputeTaxonCost"><?= $Page->ComputeTaxonCost->caption() ?></span></td>
        <td data-name="ComputeTaxonCost" <?= $Page->ComputeTaxonCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputeTaxonCost">
<span<?= $Page->ComputeTaxonCost->viewAttributes() ?>>
<?= $Page->ComputeTaxonCost->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
    <tr id="r_HasEmptyBottleTrack">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_HasEmptyBottleTrack"><?= $Page->HasEmptyBottleTrack->caption() ?></span></td>
        <td data-name="HasEmptyBottleTrack" <?= $Page->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el_pharmacy_products_HasEmptyBottleTrack">
<span<?= $Page->HasEmptyBottleTrack->viewAttributes() ?>>
<?= $Page->HasEmptyBottleTrack->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
    <tr id="r_EmptyBottleReferenceCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_EmptyBottleReferenceCode"><?= $Page->EmptyBottleReferenceCode->caption() ?></span></td>
        <td data-name="EmptyBottleReferenceCode" <?= $Page->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleReferenceCode">
<span<?= $Page->EmptyBottleReferenceCode->viewAttributes() ?>>
<?= $Page->EmptyBottleReferenceCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
    <tr id="r_AdditionalCESSAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AdditionalCESSAmount"><?= $Page->AdditionalCESSAmount->caption() ?></span></td>
        <td data-name="AdditionalCESSAmount" <?= $Page->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_AdditionalCESSAmount">
<span<?= $Page->AdditionalCESSAmount->viewAttributes() ?>>
<?= $Page->AdditionalCESSAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
    <tr id="r_EmptyBottleRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_EmptyBottleRate"><?= $Page->EmptyBottleRate->caption() ?></span></td>
        <td data-name="EmptyBottleRate" <?= $Page->EmptyBottleRate->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleRate">
<span<?= $Page->EmptyBottleRate->viewAttributes() ?>>
<?= $Page->EmptyBottleRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

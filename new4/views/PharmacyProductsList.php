<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyProductsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_productslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_productslist = currentForm = new ew.Form("fpharmacy_productslist", "list");
    fpharmacy_productslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpharmacy_productslist");
});
var fpharmacy_productslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_productslistsrch = currentSearchForm = new ew.Form("fpharmacy_productslistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_productslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_productslistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = false;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpharmacy_productslistsrch" id="fpharmacy_productslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpharmacy_productslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_products">
    <div class="ew-extended-search">
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_products">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_productslist" id="fpharmacy_productslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<div id="gmp_pharmacy_products" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_productslist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->ProductCode->Visible) { // ProductCode ?>
        <th data-name="ProductCode" class="<?= $Page->ProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode"><?= $Page->renderSort($Page->ProductCode) ?></div></th>
<?php } ?>
<?php if ($Page->ProductName->Visible) { // ProductName ?>
        <th data-name="ProductName" class="<?= $Page->ProductName->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductName" class="pharmacy_products_ProductName"><?= $Page->renderSort($Page->ProductName) ?></div></th>
<?php } ?>
<?php if ($Page->DivisionCode->Visible) { // DivisionCode ?>
        <th data-name="DivisionCode" class="<?= $Page->DivisionCode->headerCellClass() ?>"><div id="elh_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode"><?= $Page->renderSort($Page->DivisionCode) ?></div></th>
<?php } ?>
<?php if ($Page->ManufacturerCode->Visible) { // ManufacturerCode ?>
        <th data-name="ManufacturerCode" class="<?= $Page->ManufacturerCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode"><?= $Page->renderSort($Page->ManufacturerCode) ?></div></th>
<?php } ?>
<?php if ($Page->SupplierCode->Visible) { // SupplierCode ?>
        <th data-name="SupplierCode" class="<?= $Page->SupplierCode->headerCellClass() ?>"><div id="elh_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode"><?= $Page->renderSort($Page->SupplierCode) ?></div></th>
<?php } ?>
<?php if ($Page->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
        <th data-name="AlternateSupplierCodes" class="<?= $Page->AlternateSupplierCodes->headerCellClass() ?>"><div id="elh_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes"><?= $Page->renderSort($Page->AlternateSupplierCodes) ?></div></th>
<?php } ?>
<?php if ($Page->AlternateProductCode->Visible) { // AlternateProductCode ?>
        <th data-name="AlternateProductCode" class="<?= $Page->AlternateProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode"><?= $Page->renderSort($Page->AlternateProductCode) ?></div></th>
<?php } ?>
<?php if ($Page->UniversalProductCode->Visible) { // UniversalProductCode ?>
        <th data-name="UniversalProductCode" class="<?= $Page->UniversalProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode"><?= $Page->renderSort($Page->UniversalProductCode) ?></div></th>
<?php } ?>
<?php if ($Page->BookProductCode->Visible) { // BookProductCode ?>
        <th data-name="BookProductCode" class="<?= $Page->BookProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode"><?= $Page->renderSort($Page->BookProductCode) ?></div></th>
<?php } ?>
<?php if ($Page->OldCode->Visible) { // OldCode ?>
        <th data-name="OldCode" class="<?= $Page->OldCode->headerCellClass() ?>"><div id="elh_pharmacy_products_OldCode" class="pharmacy_products_OldCode"><?= $Page->renderSort($Page->OldCode) ?></div></th>
<?php } ?>
<?php if ($Page->ProtectedProducts->Visible) { // ProtectedProducts ?>
        <th data-name="ProtectedProducts" class="<?= $Page->ProtectedProducts->headerCellClass() ?>"><div id="elh_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts"><?= $Page->renderSort($Page->ProtectedProducts) ?></div></th>
<?php } ?>
<?php if ($Page->ProductFullName->Visible) { // ProductFullName ?>
        <th data-name="ProductFullName" class="<?= $Page->ProductFullName->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName"><?= $Page->renderSort($Page->ProductFullName) ?></div></th>
<?php } ?>
<?php if ($Page->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
        <th data-name="UnitOfMeasure" class="<?= $Page->UnitOfMeasure->headerCellClass() ?>"><div id="elh_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure"><?= $Page->renderSort($Page->UnitOfMeasure) ?></div></th>
<?php } ?>
<?php if ($Page->UnitDescription->Visible) { // UnitDescription ?>
        <th data-name="UnitDescription" class="<?= $Page->UnitDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription"><?= $Page->renderSort($Page->UnitDescription) ?></div></th>
<?php } ?>
<?php if ($Page->BulkDescription->Visible) { // BulkDescription ?>
        <th data-name="BulkDescription" class="<?= $Page->BulkDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription"><?= $Page->renderSort($Page->BulkDescription) ?></div></th>
<?php } ?>
<?php if ($Page->BarCodeDescription->Visible) { // BarCodeDescription ?>
        <th data-name="BarCodeDescription" class="<?= $Page->BarCodeDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription"><?= $Page->renderSort($Page->BarCodeDescription) ?></div></th>
<?php } ?>
<?php if ($Page->PackageInformation->Visible) { // PackageInformation ?>
        <th data-name="PackageInformation" class="<?= $Page->PackageInformation->headerCellClass() ?>"><div id="elh_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation"><?= $Page->renderSort($Page->PackageInformation) ?></div></th>
<?php } ?>
<?php if ($Page->PackageId->Visible) { // PackageId ?>
        <th data-name="PackageId" class="<?= $Page->PackageId->headerCellClass() ?>"><div id="elh_pharmacy_products_PackageId" class="pharmacy_products_PackageId"><?= $Page->renderSort($Page->PackageId) ?></div></th>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
        <th data-name="Weight" class="<?= $Page->Weight->headerCellClass() ?>"><div id="elh_pharmacy_products_Weight" class="pharmacy_products_Weight"><?= $Page->renderSort($Page->Weight) ?></div></th>
<?php } ?>
<?php if ($Page->AllowFractions->Visible) { // AllowFractions ?>
        <th data-name="AllowFractions" class="<?= $Page->AllowFractions->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions"><?= $Page->renderSort($Page->AllowFractions) ?></div></th>
<?php } ?>
<?php if ($Page->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
        <th data-name="MinimumStockLevel" class="<?= $Page->MinimumStockLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel"><?= $Page->renderSort($Page->MinimumStockLevel) ?></div></th>
<?php } ?>
<?php if ($Page->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
        <th data-name="MaximumStockLevel" class="<?= $Page->MaximumStockLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel"><?= $Page->renderSort($Page->MaximumStockLevel) ?></div></th>
<?php } ?>
<?php if ($Page->ReorderLevel->Visible) { // ReorderLevel ?>
        <th data-name="ReorderLevel" class="<?= $Page->ReorderLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel"><?= $Page->renderSort($Page->ReorderLevel) ?></div></th>
<?php } ?>
<?php if ($Page->MinMaxRatio->Visible) { // MinMaxRatio ?>
        <th data-name="MinMaxRatio" class="<?= $Page->MinMaxRatio->headerCellClass() ?>"><div id="elh_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio"><?= $Page->renderSort($Page->MinMaxRatio) ?></div></th>
<?php } ?>
<?php if ($Page->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
        <th data-name="AutoMinMaxRatio" class="<?= $Page->AutoMinMaxRatio->headerCellClass() ?>"><div id="elh_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio"><?= $Page->renderSort($Page->AutoMinMaxRatio) ?></div></th>
<?php } ?>
<?php if ($Page->ScheduleCode->Visible) { // ScheduleCode ?>
        <th data-name="ScheduleCode" class="<?= $Page->ScheduleCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode"><?= $Page->renderSort($Page->ScheduleCode) ?></div></th>
<?php } ?>
<?php if ($Page->RopRatio->Visible) { // RopRatio ?>
        <th data-name="RopRatio" class="<?= $Page->RopRatio->headerCellClass() ?>"><div id="elh_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio"><?= $Page->renderSort($Page->RopRatio) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_pharmacy_products_MRP" class="pharmacy_products_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->PurchasePrice->Visible) { // PurchasePrice ?>
        <th data-name="PurchasePrice" class="<?= $Page->PurchasePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice"><?= $Page->renderSort($Page->PurchasePrice) ?></div></th>
<?php } ?>
<?php if ($Page->PurchaseUnit->Visible) { // PurchaseUnit ?>
        <th data-name="PurchaseUnit" class="<?= $Page->PurchaseUnit->headerCellClass() ?>"><div id="elh_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit"><?= $Page->renderSort($Page->PurchaseUnit) ?></div></th>
<?php } ?>
<?php if ($Page->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
        <th data-name="PurchaseTaxCode" class="<?= $Page->PurchaseTaxCode->headerCellClass() ?>"><div id="elh_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode"><?= $Page->renderSort($Page->PurchaseTaxCode) ?></div></th>
<?php } ?>
<?php if ($Page->AllowDirectInward->Visible) { // AllowDirectInward ?>
        <th data-name="AllowDirectInward" class="<?= $Page->AllowDirectInward->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward"><?= $Page->renderSort($Page->AllowDirectInward) ?></div></th>
<?php } ?>
<?php if ($Page->SalePrice->Visible) { // SalePrice ?>
        <th data-name="SalePrice" class="<?= $Page->SalePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice"><?= $Page->renderSort($Page->SalePrice) ?></div></th>
<?php } ?>
<?php if ($Page->SaleUnit->Visible) { // SaleUnit ?>
        <th data-name="SaleUnit" class="<?= $Page->SaleUnit->headerCellClass() ?>"><div id="elh_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit"><?= $Page->renderSort($Page->SaleUnit) ?></div></th>
<?php } ?>
<?php if ($Page->SalesTaxCode->Visible) { // SalesTaxCode ?>
        <th data-name="SalesTaxCode" class="<?= $Page->SalesTaxCode->headerCellClass() ?>"><div id="elh_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode"><?= $Page->renderSort($Page->SalesTaxCode) ?></div></th>
<?php } ?>
<?php if ($Page->StockReceived->Visible) { // StockReceived ?>
        <th data-name="StockReceived" class="<?= $Page->StockReceived->headerCellClass() ?>"><div id="elh_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived"><?= $Page->renderSort($Page->StockReceived) ?></div></th>
<?php } ?>
<?php if ($Page->TotalStock->Visible) { // TotalStock ?>
        <th data-name="TotalStock" class="<?= $Page->TotalStock->headerCellClass() ?>"><div id="elh_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock"><?= $Page->renderSort($Page->TotalStock) ?></div></th>
<?php } ?>
<?php if ($Page->StockType->Visible) { // StockType ?>
        <th data-name="StockType" class="<?= $Page->StockType->headerCellClass() ?>"><div id="elh_pharmacy_products_StockType" class="pharmacy_products_StockType"><?= $Page->renderSort($Page->StockType) ?></div></th>
<?php } ?>
<?php if ($Page->StockCheckDate->Visible) { // StockCheckDate ?>
        <th data-name="StockCheckDate" class="<?= $Page->StockCheckDate->headerCellClass() ?>"><div id="elh_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate"><?= $Page->renderSort($Page->StockCheckDate) ?></div></th>
<?php } ?>
<?php if ($Page->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
        <th data-name="StockAdjustmentDate" class="<?= $Page->StockAdjustmentDate->headerCellClass() ?>"><div id="elh_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate"><?= $Page->renderSort($Page->StockAdjustmentDate) ?></div></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Page->Remarks->headerCellClass() ?>"><div id="elh_pharmacy_products_Remarks" class="pharmacy_products_Remarks"><?= $Page->renderSort($Page->Remarks) ?></div></th>
<?php } ?>
<?php if ($Page->CostCentre->Visible) { // CostCentre ?>
        <th data-name="CostCentre" class="<?= $Page->CostCentre->headerCellClass() ?>"><div id="elh_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre"><?= $Page->renderSort($Page->CostCentre) ?></div></th>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
        <th data-name="ProductType" class="<?= $Page->ProductType->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductType" class="pharmacy_products_ProductType"><?= $Page->renderSort($Page->ProductType) ?></div></th>
<?php } ?>
<?php if ($Page->TaxAmount->Visible) { // TaxAmount ?>
        <th data-name="TaxAmount" class="<?= $Page->TaxAmount->headerCellClass() ?>"><div id="elh_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount"><?= $Page->renderSort($Page->TaxAmount) ?></div></th>
<?php } ?>
<?php if ($Page->TaxId->Visible) { // TaxId ?>
        <th data-name="TaxId" class="<?= $Page->TaxId->headerCellClass() ?>"><div id="elh_pharmacy_products_TaxId" class="pharmacy_products_TaxId"><?= $Page->renderSort($Page->TaxId) ?></div></th>
<?php } ?>
<?php if ($Page->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
        <th data-name="ResaleTaxApplicable" class="<?= $Page->ResaleTaxApplicable->headerCellClass() ?>"><div id="elh_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable"><?= $Page->renderSort($Page->ResaleTaxApplicable) ?></div></th>
<?php } ?>
<?php if ($Page->CstOtherTax->Visible) { // CstOtherTax ?>
        <th data-name="CstOtherTax" class="<?= $Page->CstOtherTax->headerCellClass() ?>"><div id="elh_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax"><?= $Page->renderSort($Page->CstOtherTax) ?></div></th>
<?php } ?>
<?php if ($Page->TotalTax->Visible) { // TotalTax ?>
        <th data-name="TotalTax" class="<?= $Page->TotalTax->headerCellClass() ?>"><div id="elh_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax"><?= $Page->renderSort($Page->TotalTax) ?></div></th>
<?php } ?>
<?php if ($Page->ItemCost->Visible) { // ItemCost ?>
        <th data-name="ItemCost" class="<?= $Page->ItemCost->headerCellClass() ?>"><div id="elh_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost"><?= $Page->renderSort($Page->ItemCost) ?></div></th>
<?php } ?>
<?php if ($Page->ExpiryDate->Visible) { // ExpiryDate ?>
        <th data-name="ExpiryDate" class="<?= $Page->ExpiryDate->headerCellClass() ?>"><div id="elh_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate"><?= $Page->renderSort($Page->ExpiryDate) ?></div></th>
<?php } ?>
<?php if ($Page->BatchDescription->Visible) { // BatchDescription ?>
        <th data-name="BatchDescription" class="<?= $Page->BatchDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription"><?= $Page->renderSort($Page->BatchDescription) ?></div></th>
<?php } ?>
<?php if ($Page->FreeScheme->Visible) { // FreeScheme ?>
        <th data-name="FreeScheme" class="<?= $Page->FreeScheme->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme"><?= $Page->renderSort($Page->FreeScheme) ?></div></th>
<?php } ?>
<?php if ($Page->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
        <th data-name="CashDiscountEligibility" class="<?= $Page->CashDiscountEligibility->headerCellClass() ?>"><div id="elh_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility"><?= $Page->renderSort($Page->CashDiscountEligibility) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
        <th data-name="DiscountPerAllowInBill" class="<?= $Page->DiscountPerAllowInBill->headerCellClass() ?>"><div id="elh_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill"><?= $Page->renderSort($Page->DiscountPerAllowInBill) ?></div></th>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <th data-name="Discount" class="<?= $Page->Discount->headerCellClass() ?>"><div id="elh_pharmacy_products_Discount" class="pharmacy_products_Discount"><?= $Page->renderSort($Page->Discount) ?></div></th>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <th data-name="TotalAmount" class="<?= $Page->TotalAmount->headerCellClass() ?>"><div id="elh_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount"><?= $Page->renderSort($Page->TotalAmount) ?></div></th>
<?php } ?>
<?php if ($Page->StandardMargin->Visible) { // StandardMargin ?>
        <th data-name="StandardMargin" class="<?= $Page->StandardMargin->headerCellClass() ?>"><div id="elh_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin"><?= $Page->renderSort($Page->StandardMargin) ?></div></th>
<?php } ?>
<?php if ($Page->Margin->Visible) { // Margin ?>
        <th data-name="Margin" class="<?= $Page->Margin->headerCellClass() ?>"><div id="elh_pharmacy_products_Margin" class="pharmacy_products_Margin"><?= $Page->renderSort($Page->Margin) ?></div></th>
<?php } ?>
<?php if ($Page->MarginId->Visible) { // MarginId ?>
        <th data-name="MarginId" class="<?= $Page->MarginId->headerCellClass() ?>"><div id="elh_pharmacy_products_MarginId" class="pharmacy_products_MarginId"><?= $Page->renderSort($Page->MarginId) ?></div></th>
<?php } ?>
<?php if ($Page->ExpectedMargin->Visible) { // ExpectedMargin ?>
        <th data-name="ExpectedMargin" class="<?= $Page->ExpectedMargin->headerCellClass() ?>"><div id="elh_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin"><?= $Page->renderSort($Page->ExpectedMargin) ?></div></th>
<?php } ?>
<?php if ($Page->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
        <th data-name="SurchargeBeforeTax" class="<?= $Page->SurchargeBeforeTax->headerCellClass() ?>"><div id="elh_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax"><?= $Page->renderSort($Page->SurchargeBeforeTax) ?></div></th>
<?php } ?>
<?php if ($Page->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
        <th data-name="SurchargeAfterTax" class="<?= $Page->SurchargeAfterTax->headerCellClass() ?>"><div id="elh_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax"><?= $Page->renderSort($Page->SurchargeAfterTax) ?></div></th>
<?php } ?>
<?php if ($Page->TempOrderNo->Visible) { // TempOrderNo ?>
        <th data-name="TempOrderNo" class="<?= $Page->TempOrderNo->headerCellClass() ?>"><div id="elh_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo"><?= $Page->renderSort($Page->TempOrderNo) ?></div></th>
<?php } ?>
<?php if ($Page->TempOrderDate->Visible) { // TempOrderDate ?>
        <th data-name="TempOrderDate" class="<?= $Page->TempOrderDate->headerCellClass() ?>"><div id="elh_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate"><?= $Page->renderSort($Page->TempOrderDate) ?></div></th>
<?php } ?>
<?php if ($Page->OrderUnit->Visible) { // OrderUnit ?>
        <th data-name="OrderUnit" class="<?= $Page->OrderUnit->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit"><?= $Page->renderSort($Page->OrderUnit) ?></div></th>
<?php } ?>
<?php if ($Page->OrderQuantity->Visible) { // OrderQuantity ?>
        <th data-name="OrderQuantity" class="<?= $Page->OrderQuantity->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity"><?= $Page->renderSort($Page->OrderQuantity) ?></div></th>
<?php } ?>
<?php if ($Page->MarkForOrder->Visible) { // MarkForOrder ?>
        <th data-name="MarkForOrder" class="<?= $Page->MarkForOrder->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder"><?= $Page->renderSort($Page->MarkForOrder) ?></div></th>
<?php } ?>
<?php if ($Page->OrderAllId->Visible) { // OrderAllId ?>
        <th data-name="OrderAllId" class="<?= $Page->OrderAllId->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId"><?= $Page->renderSort($Page->OrderAllId) ?></div></th>
<?php } ?>
<?php if ($Page->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
        <th data-name="CalculateOrderQty" class="<?= $Page->CalculateOrderQty->headerCellClass() ?>"><div id="elh_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty"><?= $Page->renderSort($Page->CalculateOrderQty) ?></div></th>
<?php } ?>
<?php if ($Page->SubLocation->Visible) { // SubLocation ?>
        <th data-name="SubLocation" class="<?= $Page->SubLocation->headerCellClass() ?>"><div id="elh_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation"><?= $Page->renderSort($Page->SubLocation) ?></div></th>
<?php } ?>
<?php if ($Page->CategoryCode->Visible) { // CategoryCode ?>
        <th data-name="CategoryCode" class="<?= $Page->CategoryCode->headerCellClass() ?>"><div id="elh_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode"><?= $Page->renderSort($Page->CategoryCode) ?></div></th>
<?php } ?>
<?php if ($Page->SubCategory->Visible) { // SubCategory ?>
        <th data-name="SubCategory" class="<?= $Page->SubCategory->headerCellClass() ?>"><div id="elh_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory"><?= $Page->renderSort($Page->SubCategory) ?></div></th>
<?php } ?>
<?php if ($Page->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
        <th data-name="FlexCategoryCode" class="<?= $Page->FlexCategoryCode->headerCellClass() ?>"><div id="elh_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode"><?= $Page->renderSort($Page->FlexCategoryCode) ?></div></th>
<?php } ?>
<?php if ($Page->ABCSaleQty->Visible) { // ABCSaleQty ?>
        <th data-name="ABCSaleQty" class="<?= $Page->ABCSaleQty->headerCellClass() ?>"><div id="elh_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty"><?= $Page->renderSort($Page->ABCSaleQty) ?></div></th>
<?php } ?>
<?php if ($Page->ABCSaleValue->Visible) { // ABCSaleValue ?>
        <th data-name="ABCSaleValue" class="<?= $Page->ABCSaleValue->headerCellClass() ?>"><div id="elh_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue"><?= $Page->renderSort($Page->ABCSaleValue) ?></div></th>
<?php } ?>
<?php if ($Page->ConvertionFactor->Visible) { // ConvertionFactor ?>
        <th data-name="ConvertionFactor" class="<?= $Page->ConvertionFactor->headerCellClass() ?>"><div id="elh_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor"><?= $Page->renderSort($Page->ConvertionFactor) ?></div></th>
<?php } ?>
<?php if ($Page->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
        <th data-name="ConvertionUnitDesc" class="<?= $Page->ConvertionUnitDesc->headerCellClass() ?>"><div id="elh_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc"><?= $Page->renderSort($Page->ConvertionUnitDesc) ?></div></th>
<?php } ?>
<?php if ($Page->TransactionId->Visible) { // TransactionId ?>
        <th data-name="TransactionId" class="<?= $Page->TransactionId->headerCellClass() ?>"><div id="elh_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId"><?= $Page->renderSort($Page->TransactionId) ?></div></th>
<?php } ?>
<?php if ($Page->SoldProductId->Visible) { // SoldProductId ?>
        <th data-name="SoldProductId" class="<?= $Page->SoldProductId->headerCellClass() ?>"><div id="elh_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId"><?= $Page->renderSort($Page->SoldProductId) ?></div></th>
<?php } ?>
<?php if ($Page->WantedBookId->Visible) { // WantedBookId ?>
        <th data-name="WantedBookId" class="<?= $Page->WantedBookId->headerCellClass() ?>"><div id="elh_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId"><?= $Page->renderSort($Page->WantedBookId) ?></div></th>
<?php } ?>
<?php if ($Page->AllId->Visible) { // AllId ?>
        <th data-name="AllId" class="<?= $Page->AllId->headerCellClass() ?>"><div id="elh_pharmacy_products_AllId" class="pharmacy_products_AllId"><?= $Page->renderSort($Page->AllId) ?></div></th>
<?php } ?>
<?php if ($Page->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
        <th data-name="BatchAndExpiryCompulsory" class="<?= $Page->BatchAndExpiryCompulsory->headerCellClass() ?>"><div id="elh_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory"><?= $Page->renderSort($Page->BatchAndExpiryCompulsory) ?></div></th>
<?php } ?>
<?php if ($Page->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
        <th data-name="BatchStockForWantedBook" class="<?= $Page->BatchStockForWantedBook->headerCellClass() ?>"><div id="elh_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook"><?= $Page->renderSort($Page->BatchStockForWantedBook) ?></div></th>
<?php } ?>
<?php if ($Page->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
        <th data-name="UnitBasedBilling" class="<?= $Page->UnitBasedBilling->headerCellClass() ?>"><div id="elh_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling"><?= $Page->renderSort($Page->UnitBasedBilling) ?></div></th>
<?php } ?>
<?php if ($Page->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
        <th data-name="DoNotCheckStock" class="<?= $Page->DoNotCheckStock->headerCellClass() ?>"><div id="elh_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock"><?= $Page->renderSort($Page->DoNotCheckStock) ?></div></th>
<?php } ?>
<?php if ($Page->AcceptRate->Visible) { // AcceptRate ?>
        <th data-name="AcceptRate" class="<?= $Page->AcceptRate->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate"><?= $Page->renderSort($Page->AcceptRate) ?></div></th>
<?php } ?>
<?php if ($Page->PriceLevel->Visible) { // PriceLevel ?>
        <th data-name="PriceLevel" class="<?= $Page->PriceLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel"><?= $Page->renderSort($Page->PriceLevel) ?></div></th>
<?php } ?>
<?php if ($Page->LastQuotePrice->Visible) { // LastQuotePrice ?>
        <th data-name="LastQuotePrice" class="<?= $Page->LastQuotePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice"><?= $Page->renderSort($Page->LastQuotePrice) ?></div></th>
<?php } ?>
<?php if ($Page->PriceChange->Visible) { // PriceChange ?>
        <th data-name="PriceChange" class="<?= $Page->PriceChange->headerCellClass() ?>"><div id="elh_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange"><?= $Page->renderSort($Page->PriceChange) ?></div></th>
<?php } ?>
<?php if ($Page->CommodityCode->Visible) { // CommodityCode ?>
        <th data-name="CommodityCode" class="<?= $Page->CommodityCode->headerCellClass() ?>"><div id="elh_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode"><?= $Page->renderSort($Page->CommodityCode) ?></div></th>
<?php } ?>
<?php if ($Page->InstitutePrice->Visible) { // InstitutePrice ?>
        <th data-name="InstitutePrice" class="<?= $Page->InstitutePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice"><?= $Page->renderSort($Page->InstitutePrice) ?></div></th>
<?php } ?>
<?php if ($Page->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
        <th data-name="CtrlOrDCtrlProduct" class="<?= $Page->CtrlOrDCtrlProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct"><?= $Page->renderSort($Page->CtrlOrDCtrlProduct) ?></div></th>
<?php } ?>
<?php if ($Page->ImportedDate->Visible) { // ImportedDate ?>
        <th data-name="ImportedDate" class="<?= $Page->ImportedDate->headerCellClass() ?>"><div id="elh_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate"><?= $Page->renderSort($Page->ImportedDate) ?></div></th>
<?php } ?>
<?php if ($Page->IsImported->Visible) { // IsImported ?>
        <th data-name="IsImported" class="<?= $Page->IsImported->headerCellClass() ?>"><div id="elh_pharmacy_products_IsImported" class="pharmacy_products_IsImported"><?= $Page->renderSort($Page->IsImported) ?></div></th>
<?php } ?>
<?php if ($Page->FileName->Visible) { // FileName ?>
        <th data-name="FileName" class="<?= $Page->FileName->headerCellClass() ?>"><div id="elh_pharmacy_products_FileName" class="pharmacy_products_FileName"><?= $Page->renderSort($Page->FileName) ?></div></th>
<?php } ?>
<?php if ($Page->GodownNumber->Visible) { // GodownNumber ?>
        <th data-name="GodownNumber" class="<?= $Page->GodownNumber->headerCellClass() ?>"><div id="elh_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber"><?= $Page->renderSort($Page->GodownNumber) ?></div></th>
<?php } ?>
<?php if ($Page->CreationDate->Visible) { // CreationDate ?>
        <th data-name="CreationDate" class="<?= $Page->CreationDate->headerCellClass() ?>"><div id="elh_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate"><?= $Page->renderSort($Page->CreationDate) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedbyUser->Visible) { // CreatedbyUser ?>
        <th data-name="CreatedbyUser" class="<?= $Page->CreatedbyUser->headerCellClass() ?>"><div id="elh_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser"><?= $Page->renderSort($Page->CreatedbyUser) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedDate->Visible) { // ModifiedDate ?>
        <th data-name="ModifiedDate" class="<?= $Page->ModifiedDate->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate"><?= $Page->renderSort($Page->ModifiedDate) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
        <th data-name="ModifiedbyUser" class="<?= $Page->ModifiedbyUser->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser"><?= $Page->renderSort($Page->ModifiedbyUser) ?></div></th>
<?php } ?>
<?php if ($Page->isActive->Visible) { // isActive ?>
        <th data-name="isActive" class="<?= $Page->isActive->headerCellClass() ?>"><div id="elh_pharmacy_products_isActive" class="pharmacy_products_isActive"><?= $Page->renderSort($Page->isActive) ?></div></th>
<?php } ?>
<?php if ($Page->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
        <th data-name="AllowExpiryClaim" class="<?= $Page->AllowExpiryClaim->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim"><?= $Page->renderSort($Page->AllowExpiryClaim) ?></div></th>
<?php } ?>
<?php if ($Page->BrandCode->Visible) { // BrandCode ?>
        <th data-name="BrandCode" class="<?= $Page->BrandCode->headerCellClass() ?>"><div id="elh_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode"><?= $Page->renderSort($Page->BrandCode) ?></div></th>
<?php } ?>
<?php if ($Page->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
        <th data-name="FreeSchemeBasedon" class="<?= $Page->FreeSchemeBasedon->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon"><?= $Page->renderSort($Page->FreeSchemeBasedon) ?></div></th>
<?php } ?>
<?php if ($Page->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
        <th data-name="DoNotCheckCostInBill" class="<?= $Page->DoNotCheckCostInBill->headerCellClass() ?>"><div id="elh_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill"><?= $Page->renderSort($Page->DoNotCheckCostInBill) ?></div></th>
<?php } ?>
<?php if ($Page->ProductGroupCode->Visible) { // ProductGroupCode ?>
        <th data-name="ProductGroupCode" class="<?= $Page->ProductGroupCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode"><?= $Page->renderSort($Page->ProductGroupCode) ?></div></th>
<?php } ?>
<?php if ($Page->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
        <th data-name="ProductStrengthCode" class="<?= $Page->ProductStrengthCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode"><?= $Page->renderSort($Page->ProductStrengthCode) ?></div></th>
<?php } ?>
<?php if ($Page->PackingCode->Visible) { // PackingCode ?>
        <th data-name="PackingCode" class="<?= $Page->PackingCode->headerCellClass() ?>"><div id="elh_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode"><?= $Page->renderSort($Page->PackingCode) ?></div></th>
<?php } ?>
<?php if ($Page->ComputedMinStock->Visible) { // ComputedMinStock ?>
        <th data-name="ComputedMinStock" class="<?= $Page->ComputedMinStock->headerCellClass() ?>"><div id="elh_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock"><?= $Page->renderSort($Page->ComputedMinStock) ?></div></th>
<?php } ?>
<?php if ($Page->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
        <th data-name="ComputedMaxStock" class="<?= $Page->ComputedMaxStock->headerCellClass() ?>"><div id="elh_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock"><?= $Page->renderSort($Page->ComputedMaxStock) ?></div></th>
<?php } ?>
<?php if ($Page->ProductRemark->Visible) { // ProductRemark ?>
        <th data-name="ProductRemark" class="<?= $Page->ProductRemark->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark"><?= $Page->renderSort($Page->ProductRemark) ?></div></th>
<?php } ?>
<?php if ($Page->ProductDrugCode->Visible) { // ProductDrugCode ?>
        <th data-name="ProductDrugCode" class="<?= $Page->ProductDrugCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode"><?= $Page->renderSort($Page->ProductDrugCode) ?></div></th>
<?php } ?>
<?php if ($Page->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
        <th data-name="IsMatrixProduct" class="<?= $Page->IsMatrixProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct"><?= $Page->renderSort($Page->IsMatrixProduct) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount1->Visible) { // AttributeCount1 ?>
        <th data-name="AttributeCount1" class="<?= $Page->AttributeCount1->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1"><?= $Page->renderSort($Page->AttributeCount1) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount2->Visible) { // AttributeCount2 ?>
        <th data-name="AttributeCount2" class="<?= $Page->AttributeCount2->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2"><?= $Page->renderSort($Page->AttributeCount2) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount3->Visible) { // AttributeCount3 ?>
        <th data-name="AttributeCount3" class="<?= $Page->AttributeCount3->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3"><?= $Page->renderSort($Page->AttributeCount3) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount4->Visible) { // AttributeCount4 ?>
        <th data-name="AttributeCount4" class="<?= $Page->AttributeCount4->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4"><?= $Page->renderSort($Page->AttributeCount4) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount5->Visible) { // AttributeCount5 ?>
        <th data-name="AttributeCount5" class="<?= $Page->AttributeCount5->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5"><?= $Page->renderSort($Page->AttributeCount5) ?></div></th>
<?php } ?>
<?php if ($Page->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
        <th data-name="DefaultDiscountPercentage" class="<?= $Page->DefaultDiscountPercentage->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage"><?= $Page->renderSort($Page->DefaultDiscountPercentage) ?></div></th>
<?php } ?>
<?php if ($Page->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
        <th data-name="DonotPrintBarcode" class="<?= $Page->DonotPrintBarcode->headerCellClass() ?>"><div id="elh_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode"><?= $Page->renderSort($Page->DonotPrintBarcode) ?></div></th>
<?php } ?>
<?php if ($Page->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
        <th data-name="ProductLevelDiscount" class="<?= $Page->ProductLevelDiscount->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount"><?= $Page->renderSort($Page->ProductLevelDiscount) ?></div></th>
<?php } ?>
<?php if ($Page->Markup->Visible) { // Markup ?>
        <th data-name="Markup" class="<?= $Page->Markup->headerCellClass() ?>"><div id="elh_pharmacy_products_Markup" class="pharmacy_products_Markup"><?= $Page->renderSort($Page->Markup) ?></div></th>
<?php } ?>
<?php if ($Page->MarkDown->Visible) { // MarkDown ?>
        <th data-name="MarkDown" class="<?= $Page->MarkDown->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown"><?= $Page->renderSort($Page->MarkDown) ?></div></th>
<?php } ?>
<?php if ($Page->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
        <th data-name="ReworkSalePrice" class="<?= $Page->ReworkSalePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice"><?= $Page->renderSort($Page->ReworkSalePrice) ?></div></th>
<?php } ?>
<?php if ($Page->MultipleInput->Visible) { // MultipleInput ?>
        <th data-name="MultipleInput" class="<?= $Page->MultipleInput->headerCellClass() ?>"><div id="elh_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput"><?= $Page->renderSort($Page->MultipleInput) ?></div></th>
<?php } ?>
<?php if ($Page->LpPackageInformation->Visible) { // LpPackageInformation ?>
        <th data-name="LpPackageInformation" class="<?= $Page->LpPackageInformation->headerCellClass() ?>"><div id="elh_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation"><?= $Page->renderSort($Page->LpPackageInformation) ?></div></th>
<?php } ?>
<?php if ($Page->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
        <th data-name="AllowNegativeStock" class="<?= $Page->AllowNegativeStock->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock"><?= $Page->renderSort($Page->AllowNegativeStock) ?></div></th>
<?php } ?>
<?php if ($Page->OrderDate->Visible) { // OrderDate ?>
        <th data-name="OrderDate" class="<?= $Page->OrderDate->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate"><?= $Page->renderSort($Page->OrderDate) ?></div></th>
<?php } ?>
<?php if ($Page->OrderTime->Visible) { // OrderTime ?>
        <th data-name="OrderTime" class="<?= $Page->OrderTime->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime"><?= $Page->renderSort($Page->OrderTime) ?></div></th>
<?php } ?>
<?php if ($Page->RateGroupCode->Visible) { // RateGroupCode ?>
        <th data-name="RateGroupCode" class="<?= $Page->RateGroupCode->headerCellClass() ?>"><div id="elh_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode"><?= $Page->renderSort($Page->RateGroupCode) ?></div></th>
<?php } ?>
<?php if ($Page->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
        <th data-name="ConversionCaseLot" class="<?= $Page->ConversionCaseLot->headerCellClass() ?>"><div id="elh_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot"><?= $Page->renderSort($Page->ConversionCaseLot) ?></div></th>
<?php } ?>
<?php if ($Page->ShippingLot->Visible) { // ShippingLot ?>
        <th data-name="ShippingLot" class="<?= $Page->ShippingLot->headerCellClass() ?>"><div id="elh_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot"><?= $Page->renderSort($Page->ShippingLot) ?></div></th>
<?php } ?>
<?php if ($Page->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
        <th data-name="AllowExpiryReplacement" class="<?= $Page->AllowExpiryReplacement->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement"><?= $Page->renderSort($Page->AllowExpiryReplacement) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
        <th data-name="NoOfMonthExpiryAllowed" class="<?= $Page->NoOfMonthExpiryAllowed->headerCellClass() ?>"><div id="elh_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed"><?= $Page->renderSort($Page->NoOfMonthExpiryAllowed) ?></div></th>
<?php } ?>
<?php if ($Page->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
        <th data-name="ProductDiscountEligibility" class="<?= $Page->ProductDiscountEligibility->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility"><?= $Page->renderSort($Page->ProductDiscountEligibility) ?></div></th>
<?php } ?>
<?php if ($Page->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
        <th data-name="ScheduleTypeCode" class="<?= $Page->ScheduleTypeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode"><?= $Page->renderSort($Page->ScheduleTypeCode) ?></div></th>
<?php } ?>
<?php if ($Page->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
        <th data-name="AIOCDProductCode" class="<?= $Page->AIOCDProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode"><?= $Page->renderSort($Page->AIOCDProductCode) ?></div></th>
<?php } ?>
<?php if ($Page->FreeQuantity->Visible) { // FreeQuantity ?>
        <th data-name="FreeQuantity" class="<?= $Page->FreeQuantity->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity"><?= $Page->renderSort($Page->FreeQuantity) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountType->Visible) { // DiscountType ?>
        <th data-name="DiscountType" class="<?= $Page->DiscountType->headerCellClass() ?>"><div id="elh_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType"><?= $Page->renderSort($Page->DiscountType) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountValue->Visible) { // DiscountValue ?>
        <th data-name="DiscountValue" class="<?= $Page->DiscountValue->headerCellClass() ?>"><div id="elh_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue"><?= $Page->renderSort($Page->DiscountValue) ?></div></th>
<?php } ?>
<?php if ($Page->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
        <th data-name="HasProductOrderAttribute" class="<?= $Page->HasProductOrderAttribute->headerCellClass() ?>"><div id="elh_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute"><?= $Page->renderSort($Page->HasProductOrderAttribute) ?></div></th>
<?php } ?>
<?php if ($Page->FirstPODate->Visible) { // FirstPODate ?>
        <th data-name="FirstPODate" class="<?= $Page->FirstPODate->headerCellClass() ?>"><div id="elh_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate"><?= $Page->renderSort($Page->FirstPODate) ?></div></th>
<?php } ?>
<?php if ($Page->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
        <th data-name="SaleprcieAndMrpCalcPercent" class="<?= $Page->SaleprcieAndMrpCalcPercent->headerCellClass() ?>"><div id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent"><?= $Page->renderSort($Page->SaleprcieAndMrpCalcPercent) ?></div></th>
<?php } ?>
<?php if ($Page->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
        <th data-name="IsGiftVoucherProducts" class="<?= $Page->IsGiftVoucherProducts->headerCellClass() ?>"><div id="elh_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts"><?= $Page->renderSort($Page->IsGiftVoucherProducts) ?></div></th>
<?php } ?>
<?php if ($Page->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
        <th data-name="AcceptRange4SerialNumber" class="<?= $Page->AcceptRange4SerialNumber->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber"><?= $Page->renderSort($Page->AcceptRange4SerialNumber) ?></div></th>
<?php } ?>
<?php if ($Page->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
        <th data-name="GiftVoucherDenomination" class="<?= $Page->GiftVoucherDenomination->headerCellClass() ?>"><div id="elh_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination"><?= $Page->renderSort($Page->GiftVoucherDenomination) ?></div></th>
<?php } ?>
<?php if ($Page->Subclasscode->Visible) { // Subclasscode ?>
        <th data-name="Subclasscode" class="<?= $Page->Subclasscode->headerCellClass() ?>"><div id="elh_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode"><?= $Page->renderSort($Page->Subclasscode) ?></div></th>
<?php } ?>
<?php if ($Page->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
        <th data-name="BarCodeFromWeighingMachine" class="<?= $Page->BarCodeFromWeighingMachine->headerCellClass() ?>"><div id="elh_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine"><?= $Page->renderSort($Page->BarCodeFromWeighingMachine) ?></div></th>
<?php } ?>
<?php if ($Page->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
        <th data-name="CheckCostInReturn" class="<?= $Page->CheckCostInReturn->headerCellClass() ?>"><div id="elh_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn"><?= $Page->renderSort($Page->CheckCostInReturn) ?></div></th>
<?php } ?>
<?php if ($Page->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
        <th data-name="FrequentSaleProduct" class="<?= $Page->FrequentSaleProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct"><?= $Page->renderSort($Page->FrequentSaleProduct) ?></div></th>
<?php } ?>
<?php if ($Page->RateType->Visible) { // RateType ?>
        <th data-name="RateType" class="<?= $Page->RateType->headerCellClass() ?>"><div id="elh_pharmacy_products_RateType" class="pharmacy_products_RateType"><?= $Page->renderSort($Page->RateType) ?></div></th>
<?php } ?>
<?php if ($Page->TouchscreenName->Visible) { // TouchscreenName ?>
        <th data-name="TouchscreenName" class="<?= $Page->TouchscreenName->headerCellClass() ?>"><div id="elh_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName"><?= $Page->renderSort($Page->TouchscreenName) ?></div></th>
<?php } ?>
<?php if ($Page->FreeType->Visible) { // FreeType ?>
        <th data-name="FreeType" class="<?= $Page->FreeType->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeType" class="pharmacy_products_FreeType"><?= $Page->renderSort($Page->FreeType) ?></div></th>
<?php } ?>
<?php if ($Page->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
        <th data-name="LooseQtyasNewBatch" class="<?= $Page->LooseQtyasNewBatch->headerCellClass() ?>"><div id="elh_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch"><?= $Page->renderSort($Page->LooseQtyasNewBatch) ?></div></th>
<?php } ?>
<?php if ($Page->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
        <th data-name="AllowSlabBilling" class="<?= $Page->AllowSlabBilling->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling"><?= $Page->renderSort($Page->AllowSlabBilling) ?></div></th>
<?php } ?>
<?php if ($Page->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
        <th data-name="ProductTypeForProduction" class="<?= $Page->ProductTypeForProduction->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction"><?= $Page->renderSort($Page->ProductTypeForProduction) ?></div></th>
<?php } ?>
<?php if ($Page->RecipeCode->Visible) { // RecipeCode ?>
        <th data-name="RecipeCode" class="<?= $Page->RecipeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode"><?= $Page->renderSort($Page->RecipeCode) ?></div></th>
<?php } ?>
<?php if ($Page->DefaultUnitType->Visible) { // DefaultUnitType ?>
        <th data-name="DefaultUnitType" class="<?= $Page->DefaultUnitType->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType"><?= $Page->renderSort($Page->DefaultUnitType) ?></div></th>
<?php } ?>
<?php if ($Page->PIstatus->Visible) { // PIstatus ?>
        <th data-name="PIstatus" class="<?= $Page->PIstatus->headerCellClass() ?>"><div id="elh_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus"><?= $Page->renderSort($Page->PIstatus) ?></div></th>
<?php } ?>
<?php if ($Page->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
        <th data-name="LastPiConfirmedDate" class="<?= $Page->LastPiConfirmedDate->headerCellClass() ?>"><div id="elh_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate"><?= $Page->renderSort($Page->LastPiConfirmedDate) ?></div></th>
<?php } ?>
<?php if ($Page->BarCodeDesign->Visible) { // BarCodeDesign ?>
        <th data-name="BarCodeDesign" class="<?= $Page->BarCodeDesign->headerCellClass() ?>"><div id="elh_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign"><?= $Page->renderSort($Page->BarCodeDesign) ?></div></th>
<?php } ?>
<?php if ($Page->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
        <th data-name="AcceptRemarksInBill" class="<?= $Page->AcceptRemarksInBill->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill"><?= $Page->renderSort($Page->AcceptRemarksInBill) ?></div></th>
<?php } ?>
<?php if ($Page->Classification->Visible) { // Classification ?>
        <th data-name="Classification" class="<?= $Page->Classification->headerCellClass() ?>"><div id="elh_pharmacy_products_Classification" class="pharmacy_products_Classification"><?= $Page->renderSort($Page->Classification) ?></div></th>
<?php } ?>
<?php if ($Page->TimeSlot->Visible) { // TimeSlot ?>
        <th data-name="TimeSlot" class="<?= $Page->TimeSlot->headerCellClass() ?>"><div id="elh_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot"><?= $Page->renderSort($Page->TimeSlot) ?></div></th>
<?php } ?>
<?php if ($Page->IsBundle->Visible) { // IsBundle ?>
        <th data-name="IsBundle" class="<?= $Page->IsBundle->headerCellClass() ?>"><div id="elh_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle"><?= $Page->renderSort($Page->IsBundle) ?></div></th>
<?php } ?>
<?php if ($Page->ColorCode->Visible) { // ColorCode ?>
        <th data-name="ColorCode" class="<?= $Page->ColorCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode"><?= $Page->renderSort($Page->ColorCode) ?></div></th>
<?php } ?>
<?php if ($Page->GenderCode->Visible) { // GenderCode ?>
        <th data-name="GenderCode" class="<?= $Page->GenderCode->headerCellClass() ?>"><div id="elh_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode"><?= $Page->renderSort($Page->GenderCode) ?></div></th>
<?php } ?>
<?php if ($Page->SizeCode->Visible) { // SizeCode ?>
        <th data-name="SizeCode" class="<?= $Page->SizeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode"><?= $Page->renderSort($Page->SizeCode) ?></div></th>
<?php } ?>
<?php if ($Page->GiftCard->Visible) { // GiftCard ?>
        <th data-name="GiftCard" class="<?= $Page->GiftCard->headerCellClass() ?>"><div id="elh_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard"><?= $Page->renderSort($Page->GiftCard) ?></div></th>
<?php } ?>
<?php if ($Page->ToonLabel->Visible) { // ToonLabel ?>
        <th data-name="ToonLabel" class="<?= $Page->ToonLabel->headerCellClass() ?>"><div id="elh_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel"><?= $Page->renderSort($Page->ToonLabel) ?></div></th>
<?php } ?>
<?php if ($Page->GarmentType->Visible) { // GarmentType ?>
        <th data-name="GarmentType" class="<?= $Page->GarmentType->headerCellClass() ?>"><div id="elh_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType"><?= $Page->renderSort($Page->GarmentType) ?></div></th>
<?php } ?>
<?php if ($Page->AgeGroup->Visible) { // AgeGroup ?>
        <th data-name="AgeGroup" class="<?= $Page->AgeGroup->headerCellClass() ?>"><div id="elh_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup"><?= $Page->renderSort($Page->AgeGroup) ?></div></th>
<?php } ?>
<?php if ($Page->Season->Visible) { // Season ?>
        <th data-name="Season" class="<?= $Page->Season->headerCellClass() ?>"><div id="elh_pharmacy_products_Season" class="pharmacy_products_Season"><?= $Page->renderSort($Page->Season) ?></div></th>
<?php } ?>
<?php if ($Page->DailyStockEntry->Visible) { // DailyStockEntry ?>
        <th data-name="DailyStockEntry" class="<?= $Page->DailyStockEntry->headerCellClass() ?>"><div id="elh_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry"><?= $Page->renderSort($Page->DailyStockEntry) ?></div></th>
<?php } ?>
<?php if ($Page->ModifierApplicable->Visible) { // ModifierApplicable ?>
        <th data-name="ModifierApplicable" class="<?= $Page->ModifierApplicable->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable"><?= $Page->renderSort($Page->ModifierApplicable) ?></div></th>
<?php } ?>
<?php if ($Page->ModifierType->Visible) { // ModifierType ?>
        <th data-name="ModifierType" class="<?= $Page->ModifierType->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType"><?= $Page->renderSort($Page->ModifierType) ?></div></th>
<?php } ?>
<?php if ($Page->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
        <th data-name="AcceptZeroRate" class="<?= $Page->AcceptZeroRate->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate"><?= $Page->renderSort($Page->AcceptZeroRate) ?></div></th>
<?php } ?>
<?php if ($Page->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
        <th data-name="ExciseDutyCode" class="<?= $Page->ExciseDutyCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode"><?= $Page->renderSort($Page->ExciseDutyCode) ?></div></th>
<?php } ?>
<?php if ($Page->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
        <th data-name="IndentProductGroupCode" class="<?= $Page->IndentProductGroupCode->headerCellClass() ?>"><div id="elh_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode"><?= $Page->renderSort($Page->IndentProductGroupCode) ?></div></th>
<?php } ?>
<?php if ($Page->IsMultiBatch->Visible) { // IsMultiBatch ?>
        <th data-name="IsMultiBatch" class="<?= $Page->IsMultiBatch->headerCellClass() ?>"><div id="elh_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch"><?= $Page->renderSort($Page->IsMultiBatch) ?></div></th>
<?php } ?>
<?php if ($Page->IsSingleBatch->Visible) { // IsSingleBatch ?>
        <th data-name="IsSingleBatch" class="<?= $Page->IsSingleBatch->headerCellClass() ?>"><div id="elh_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch"><?= $Page->renderSort($Page->IsSingleBatch) ?></div></th>
<?php } ?>
<?php if ($Page->MarkUpRate1->Visible) { // MarkUpRate1 ?>
        <th data-name="MarkUpRate1" class="<?= $Page->MarkUpRate1->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1"><?= $Page->renderSort($Page->MarkUpRate1) ?></div></th>
<?php } ?>
<?php if ($Page->MarkDownRate1->Visible) { // MarkDownRate1 ?>
        <th data-name="MarkDownRate1" class="<?= $Page->MarkDownRate1->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1"><?= $Page->renderSort($Page->MarkDownRate1) ?></div></th>
<?php } ?>
<?php if ($Page->MarkUpRate2->Visible) { // MarkUpRate2 ?>
        <th data-name="MarkUpRate2" class="<?= $Page->MarkUpRate2->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2"><?= $Page->renderSort($Page->MarkUpRate2) ?></div></th>
<?php } ?>
<?php if ($Page->MarkDownRate2->Visible) { // MarkDownRate2 ?>
        <th data-name="MarkDownRate2" class="<?= $Page->MarkDownRate2->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2"><?= $Page->renderSort($Page->MarkDownRate2) ?></div></th>
<?php } ?>
<?php if ($Page->_Yield->Visible) { // Yield ?>
        <th data-name="_Yield" class="<?= $Page->_Yield->headerCellClass() ?>"><div id="elh_pharmacy_products__Yield" class="pharmacy_products__Yield"><?= $Page->renderSort($Page->_Yield) ?></div></th>
<?php } ?>
<?php if ($Page->RefProductCode->Visible) { // RefProductCode ?>
        <th data-name="RefProductCode" class="<?= $Page->RefProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode"><?= $Page->renderSort($Page->RefProductCode) ?></div></th>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <th data-name="Volume" class="<?= $Page->Volume->headerCellClass() ?>"><div id="elh_pharmacy_products_Volume" class="pharmacy_products_Volume"><?= $Page->renderSort($Page->Volume) ?></div></th>
<?php } ?>
<?php if ($Page->MeasurementID->Visible) { // MeasurementID ?>
        <th data-name="MeasurementID" class="<?= $Page->MeasurementID->headerCellClass() ?>"><div id="elh_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID"><?= $Page->renderSort($Page->MeasurementID) ?></div></th>
<?php } ?>
<?php if ($Page->CountryCode->Visible) { // CountryCode ?>
        <th data-name="CountryCode" class="<?= $Page->CountryCode->headerCellClass() ?>"><div id="elh_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode"><?= $Page->renderSort($Page->CountryCode) ?></div></th>
<?php } ?>
<?php if ($Page->AcceptWMQty->Visible) { // AcceptWMQty ?>
        <th data-name="AcceptWMQty" class="<?= $Page->AcceptWMQty->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty"><?= $Page->renderSort($Page->AcceptWMQty) ?></div></th>
<?php } ?>
<?php if ($Page->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
        <th data-name="SingleBatchBasedOnRate" class="<?= $Page->SingleBatchBasedOnRate->headerCellClass() ?>"><div id="elh_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate"><?= $Page->renderSort($Page->SingleBatchBasedOnRate) ?></div></th>
<?php } ?>
<?php if ($Page->TenderNo->Visible) { // TenderNo ?>
        <th data-name="TenderNo" class="<?= $Page->TenderNo->headerCellClass() ?>"><div id="elh_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo"><?= $Page->renderSort($Page->TenderNo) ?></div></th>
<?php } ?>
<?php if ($Page->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
        <th data-name="SingleBillMaximumSoldQtyFiled" class="<?= $Page->SingleBillMaximumSoldQtyFiled->headerCellClass() ?>"><div id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled"><?= $Page->renderSort($Page->SingleBillMaximumSoldQtyFiled) ?></div></th>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <th data-name="Strength1" class="<?= $Page->Strength1->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength1" class="pharmacy_products_Strength1"><?= $Page->renderSort($Page->Strength1) ?></div></th>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <th data-name="Strength2" class="<?= $Page->Strength2->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength2" class="pharmacy_products_Strength2"><?= $Page->renderSort($Page->Strength2) ?></div></th>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <th data-name="Strength3" class="<?= $Page->Strength3->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength3" class="pharmacy_products_Strength3"><?= $Page->renderSort($Page->Strength3) ?></div></th>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <th data-name="Strength4" class="<?= $Page->Strength4->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength4" class="pharmacy_products_Strength4"><?= $Page->renderSort($Page->Strength4) ?></div></th>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <th data-name="Strength5" class="<?= $Page->Strength5->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength5" class="pharmacy_products_Strength5"><?= $Page->renderSort($Page->Strength5) ?></div></th>
<?php } ?>
<?php if ($Page->IngredientCode1->Visible) { // IngredientCode1 ?>
        <th data-name="IngredientCode1" class="<?= $Page->IngredientCode1->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1"><?= $Page->renderSort($Page->IngredientCode1) ?></div></th>
<?php } ?>
<?php if ($Page->IngredientCode2->Visible) { // IngredientCode2 ?>
        <th data-name="IngredientCode2" class="<?= $Page->IngredientCode2->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2"><?= $Page->renderSort($Page->IngredientCode2) ?></div></th>
<?php } ?>
<?php if ($Page->IngredientCode3->Visible) { // IngredientCode3 ?>
        <th data-name="IngredientCode3" class="<?= $Page->IngredientCode3->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3"><?= $Page->renderSort($Page->IngredientCode3) ?></div></th>
<?php } ?>
<?php if ($Page->IngredientCode4->Visible) { // IngredientCode4 ?>
        <th data-name="IngredientCode4" class="<?= $Page->IngredientCode4->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4"><?= $Page->renderSort($Page->IngredientCode4) ?></div></th>
<?php } ?>
<?php if ($Page->IngredientCode5->Visible) { // IngredientCode5 ?>
        <th data-name="IngredientCode5" class="<?= $Page->IngredientCode5->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5"><?= $Page->renderSort($Page->IngredientCode5) ?></div></th>
<?php } ?>
<?php if ($Page->OrderType->Visible) { // OrderType ?>
        <th data-name="OrderType" class="<?= $Page->OrderType->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderType" class="pharmacy_products_OrderType"><?= $Page->renderSort($Page->OrderType) ?></div></th>
<?php } ?>
<?php if ($Page->StockUOM->Visible) { // StockUOM ?>
        <th data-name="StockUOM" class="<?= $Page->StockUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM"><?= $Page->renderSort($Page->StockUOM) ?></div></th>
<?php } ?>
<?php if ($Page->PriceUOM->Visible) { // PriceUOM ?>
        <th data-name="PriceUOM" class="<?= $Page->PriceUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM"><?= $Page->renderSort($Page->PriceUOM) ?></div></th>
<?php } ?>
<?php if ($Page->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
        <th data-name="DefaultSaleUOM" class="<?= $Page->DefaultSaleUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM"><?= $Page->renderSort($Page->DefaultSaleUOM) ?></div></th>
<?php } ?>
<?php if ($Page->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
        <th data-name="DefaultPurchaseUOM" class="<?= $Page->DefaultPurchaseUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM"><?= $Page->renderSort($Page->DefaultPurchaseUOM) ?></div></th>
<?php } ?>
<?php if ($Page->ReportingUOM->Visible) { // ReportingUOM ?>
        <th data-name="ReportingUOM" class="<?= $Page->ReportingUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM"><?= $Page->renderSort($Page->ReportingUOM) ?></div></th>
<?php } ?>
<?php if ($Page->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
        <th data-name="LastPurchasedUOM" class="<?= $Page->LastPurchasedUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM"><?= $Page->renderSort($Page->LastPurchasedUOM) ?></div></th>
<?php } ?>
<?php if ($Page->TreatmentCodes->Visible) { // TreatmentCodes ?>
        <th data-name="TreatmentCodes" class="<?= $Page->TreatmentCodes->headerCellClass() ?>"><div id="elh_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes"><?= $Page->renderSort($Page->TreatmentCodes) ?></div></th>
<?php } ?>
<?php if ($Page->InsuranceType->Visible) { // InsuranceType ?>
        <th data-name="InsuranceType" class="<?= $Page->InsuranceType->headerCellClass() ?>"><div id="elh_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType"><?= $Page->renderSort($Page->InsuranceType) ?></div></th>
<?php } ?>
<?php if ($Page->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
        <th data-name="CoverageGroupCodes" class="<?= $Page->CoverageGroupCodes->headerCellClass() ?>"><div id="elh_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes"><?= $Page->renderSort($Page->CoverageGroupCodes) ?></div></th>
<?php } ?>
<?php if ($Page->MultipleUOM->Visible) { // MultipleUOM ?>
        <th data-name="MultipleUOM" class="<?= $Page->MultipleUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM"><?= $Page->renderSort($Page->MultipleUOM) ?></div></th>
<?php } ?>
<?php if ($Page->SalePriceComputation->Visible) { // SalePriceComputation ?>
        <th data-name="SalePriceComputation" class="<?= $Page->SalePriceComputation->headerCellClass() ?>"><div id="elh_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation"><?= $Page->renderSort($Page->SalePriceComputation) ?></div></th>
<?php } ?>
<?php if ($Page->StockCorrection->Visible) { // StockCorrection ?>
        <th data-name="StockCorrection" class="<?= $Page->StockCorrection->headerCellClass() ?>"><div id="elh_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection"><?= $Page->renderSort($Page->StockCorrection) ?></div></th>
<?php } ?>
<?php if ($Page->LBTPercentage->Visible) { // LBTPercentage ?>
        <th data-name="LBTPercentage" class="<?= $Page->LBTPercentage->headerCellClass() ?>"><div id="elh_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage"><?= $Page->renderSort($Page->LBTPercentage) ?></div></th>
<?php } ?>
<?php if ($Page->SalesCommission->Visible) { // SalesCommission ?>
        <th data-name="SalesCommission" class="<?= $Page->SalesCommission->headerCellClass() ?>"><div id="elh_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission"><?= $Page->renderSort($Page->SalesCommission) ?></div></th>
<?php } ?>
<?php if ($Page->LockedStock->Visible) { // LockedStock ?>
        <th data-name="LockedStock" class="<?= $Page->LockedStock->headerCellClass() ?>"><div id="elh_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock"><?= $Page->renderSort($Page->LockedStock) ?></div></th>
<?php } ?>
<?php if ($Page->MinMaxUOM->Visible) { // MinMaxUOM ?>
        <th data-name="MinMaxUOM" class="<?= $Page->MinMaxUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM"><?= $Page->renderSort($Page->MinMaxUOM) ?></div></th>
<?php } ?>
<?php if ($Page->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
        <th data-name="ExpiryMfrDateFormat" class="<?= $Page->ExpiryMfrDateFormat->headerCellClass() ?>"><div id="elh_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat"><?= $Page->renderSort($Page->ExpiryMfrDateFormat) ?></div></th>
<?php } ?>
<?php if ($Page->ProductLifeTime->Visible) { // ProductLifeTime ?>
        <th data-name="ProductLifeTime" class="<?= $Page->ProductLifeTime->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime"><?= $Page->renderSort($Page->ProductLifeTime) ?></div></th>
<?php } ?>
<?php if ($Page->IsCombo->Visible) { // IsCombo ?>
        <th data-name="IsCombo" class="<?= $Page->IsCombo->headerCellClass() ?>"><div id="elh_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo"><?= $Page->renderSort($Page->IsCombo) ?></div></th>
<?php } ?>
<?php if ($Page->ComboTypeCode->Visible) { // ComboTypeCode ?>
        <th data-name="ComboTypeCode" class="<?= $Page->ComboTypeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode"><?= $Page->renderSort($Page->ComboTypeCode) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount6->Visible) { // AttributeCount6 ?>
        <th data-name="AttributeCount6" class="<?= $Page->AttributeCount6->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6"><?= $Page->renderSort($Page->AttributeCount6) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount7->Visible) { // AttributeCount7 ?>
        <th data-name="AttributeCount7" class="<?= $Page->AttributeCount7->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7"><?= $Page->renderSort($Page->AttributeCount7) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount8->Visible) { // AttributeCount8 ?>
        <th data-name="AttributeCount8" class="<?= $Page->AttributeCount8->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8"><?= $Page->renderSort($Page->AttributeCount8) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount9->Visible) { // AttributeCount9 ?>
        <th data-name="AttributeCount9" class="<?= $Page->AttributeCount9->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9"><?= $Page->renderSort($Page->AttributeCount9) ?></div></th>
<?php } ?>
<?php if ($Page->AttributeCount10->Visible) { // AttributeCount10 ?>
        <th data-name="AttributeCount10" class="<?= $Page->AttributeCount10->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10"><?= $Page->renderSort($Page->AttributeCount10) ?></div></th>
<?php } ?>
<?php if ($Page->LabourCharge->Visible) { // LabourCharge ?>
        <th data-name="LabourCharge" class="<?= $Page->LabourCharge->headerCellClass() ?>"><div id="elh_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge"><?= $Page->renderSort($Page->LabourCharge) ?></div></th>
<?php } ?>
<?php if ($Page->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
        <th data-name="AffectOtherCharge" class="<?= $Page->AffectOtherCharge->headerCellClass() ?>"><div id="elh_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge"><?= $Page->renderSort($Page->AffectOtherCharge) ?></div></th>
<?php } ?>
<?php if ($Page->DosageInfo->Visible) { // DosageInfo ?>
        <th data-name="DosageInfo" class="<?= $Page->DosageInfo->headerCellClass() ?>"><div id="elh_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo"><?= $Page->renderSort($Page->DosageInfo) ?></div></th>
<?php } ?>
<?php if ($Page->DosageType->Visible) { // DosageType ?>
        <th data-name="DosageType" class="<?= $Page->DosageType->headerCellClass() ?>"><div id="elh_pharmacy_products_DosageType" class="pharmacy_products_DosageType"><?= $Page->renderSort($Page->DosageType) ?></div></th>
<?php } ?>
<?php if ($Page->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
        <th data-name="DefaultIndentUOM" class="<?= $Page->DefaultIndentUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM"><?= $Page->renderSort($Page->DefaultIndentUOM) ?></div></th>
<?php } ?>
<?php if ($Page->PromoTag->Visible) { // PromoTag ?>
        <th data-name="PromoTag" class="<?= $Page->PromoTag->headerCellClass() ?>"><div id="elh_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag"><?= $Page->renderSort($Page->PromoTag) ?></div></th>
<?php } ?>
<?php if ($Page->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
        <th data-name="BillLevelPromoTag" class="<?= $Page->BillLevelPromoTag->headerCellClass() ?>"><div id="elh_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag"><?= $Page->renderSort($Page->BillLevelPromoTag) ?></div></th>
<?php } ?>
<?php if ($Page->IsMRPProduct->Visible) { // IsMRPProduct ?>
        <th data-name="IsMRPProduct" class="<?= $Page->IsMRPProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct"><?= $Page->renderSort($Page->IsMRPProduct) ?></div></th>
<?php } ?>
<?php if ($Page->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
        <th data-name="AlternateSaleUOM" class="<?= $Page->AlternateSaleUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM"><?= $Page->renderSort($Page->AlternateSaleUOM) ?></div></th>
<?php } ?>
<?php if ($Page->FreeUOM->Visible) { // FreeUOM ?>
        <th data-name="FreeUOM" class="<?= $Page->FreeUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM"><?= $Page->renderSort($Page->FreeUOM) ?></div></th>
<?php } ?>
<?php if ($Page->MarketedCode->Visible) { // MarketedCode ?>
        <th data-name="MarketedCode" class="<?= $Page->MarketedCode->headerCellClass() ?>"><div id="elh_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode"><?= $Page->renderSort($Page->MarketedCode) ?></div></th>
<?php } ?>
<?php if ($Page->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
        <th data-name="MinimumSalePrice" class="<?= $Page->MinimumSalePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice"><?= $Page->renderSort($Page->MinimumSalePrice) ?></div></th>
<?php } ?>
<?php if ($Page->PRate1->Visible) { // PRate1 ?>
        <th data-name="PRate1" class="<?= $Page->PRate1->headerCellClass() ?>"><div id="elh_pharmacy_products_PRate1" class="pharmacy_products_PRate1"><?= $Page->renderSort($Page->PRate1) ?></div></th>
<?php } ?>
<?php if ($Page->PRate2->Visible) { // PRate2 ?>
        <th data-name="PRate2" class="<?= $Page->PRate2->headerCellClass() ?>"><div id="elh_pharmacy_products_PRate2" class="pharmacy_products_PRate2"><?= $Page->renderSort($Page->PRate2) ?></div></th>
<?php } ?>
<?php if ($Page->LPItemCost->Visible) { // LPItemCost ?>
        <th data-name="LPItemCost" class="<?= $Page->LPItemCost->headerCellClass() ?>"><div id="elh_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost"><?= $Page->renderSort($Page->LPItemCost) ?></div></th>
<?php } ?>
<?php if ($Page->FixedItemCost->Visible) { // FixedItemCost ?>
        <th data-name="FixedItemCost" class="<?= $Page->FixedItemCost->headerCellClass() ?>"><div id="elh_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost"><?= $Page->renderSort($Page->FixedItemCost) ?></div></th>
<?php } ?>
<?php if ($Page->HSNId->Visible) { // HSNId ?>
        <th data-name="HSNId" class="<?= $Page->HSNId->headerCellClass() ?>"><div id="elh_pharmacy_products_HSNId" class="pharmacy_products_HSNId"><?= $Page->renderSort($Page->HSNId) ?></div></th>
<?php } ?>
<?php if ($Page->TaxInclusive->Visible) { // TaxInclusive ?>
        <th data-name="TaxInclusive" class="<?= $Page->TaxInclusive->headerCellClass() ?>"><div id="elh_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive"><?= $Page->renderSort($Page->TaxInclusive) ?></div></th>
<?php } ?>
<?php if ($Page->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
        <th data-name="EligibleforWarranty" class="<?= $Page->EligibleforWarranty->headerCellClass() ?>"><div id="elh_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty"><?= $Page->renderSort($Page->EligibleforWarranty) ?></div></th>
<?php } ?>
<?php if ($Page->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
        <th data-name="NoofMonthsWarranty" class="<?= $Page->NoofMonthsWarranty->headerCellClass() ?>"><div id="elh_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty"><?= $Page->renderSort($Page->NoofMonthsWarranty) ?></div></th>
<?php } ?>
<?php if ($Page->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
        <th data-name="ComputeTaxonCost" class="<?= $Page->ComputeTaxonCost->headerCellClass() ?>"><div id="elh_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost"><?= $Page->renderSort($Page->ComputeTaxonCost) ?></div></th>
<?php } ?>
<?php if ($Page->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
        <th data-name="HasEmptyBottleTrack" class="<?= $Page->HasEmptyBottleTrack->headerCellClass() ?>"><div id="elh_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack"><?= $Page->renderSort($Page->HasEmptyBottleTrack) ?></div></th>
<?php } ?>
<?php if ($Page->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
        <th data-name="EmptyBottleReferenceCode" class="<?= $Page->EmptyBottleReferenceCode->headerCellClass() ?>"><div id="elh_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode"><?= $Page->renderSort($Page->EmptyBottleReferenceCode) ?></div></th>
<?php } ?>
<?php if ($Page->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
        <th data-name="AdditionalCESSAmount" class="<?= $Page->AdditionalCESSAmount->headerCellClass() ?>"><div id="elh_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount"><?= $Page->renderSort($Page->AdditionalCESSAmount) ?></div></th>
<?php } ?>
<?php if ($Page->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
        <th data-name="EmptyBottleRate" class="<?= $Page->EmptyBottleRate->headerCellClass() ?>"><div id="elh_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate"><?= $Page->renderSort($Page->EmptyBottleRate) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_products", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->ProductCode->Visible) { // ProductCode ?>
        <td data-name="ProductCode" <?= $Page->ProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductCode">
<span<?= $Page->ProductCode->viewAttributes() ?>>
<?= $Page->ProductCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductName->Visible) { // ProductName ?>
        <td data-name="ProductName" <?= $Page->ProductName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductName">
<span<?= $Page->ProductName->viewAttributes() ?>>
<?= $Page->ProductName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DivisionCode->Visible) { // DivisionCode ?>
        <td data-name="DivisionCode" <?= $Page->DivisionCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DivisionCode">
<span<?= $Page->DivisionCode->viewAttributes() ?>>
<?= $Page->DivisionCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ManufacturerCode->Visible) { // ManufacturerCode ?>
        <td data-name="ManufacturerCode" <?= $Page->ManufacturerCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ManufacturerCode">
<span<?= $Page->ManufacturerCode->viewAttributes() ?>>
<?= $Page->ManufacturerCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SupplierCode->Visible) { // SupplierCode ?>
        <td data-name="SupplierCode" <?= $Page->SupplierCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SupplierCode">
<span<?= $Page->SupplierCode->viewAttributes() ?>>
<?= $Page->SupplierCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
        <td data-name="AlternateSupplierCodes" <?= $Page->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AlternateSupplierCodes">
<span<?= $Page->AlternateSupplierCodes->viewAttributes() ?>>
<?= $Page->AlternateSupplierCodes->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlternateProductCode->Visible) { // AlternateProductCode ?>
        <td data-name="AlternateProductCode" <?= $Page->AlternateProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AlternateProductCode">
<span<?= $Page->AlternateProductCode->viewAttributes() ?>>
<?= $Page->AlternateProductCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UniversalProductCode->Visible) { // UniversalProductCode ?>
        <td data-name="UniversalProductCode" <?= $Page->UniversalProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_UniversalProductCode">
<span<?= $Page->UniversalProductCode->viewAttributes() ?>>
<?= $Page->UniversalProductCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BookProductCode->Visible) { // BookProductCode ?>
        <td data-name="BookProductCode" <?= $Page->BookProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BookProductCode">
<span<?= $Page->BookProductCode->viewAttributes() ?>>
<?= $Page->BookProductCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OldCode->Visible) { // OldCode ?>
        <td data-name="OldCode" <?= $Page->OldCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OldCode">
<span<?= $Page->OldCode->viewAttributes() ?>>
<?= $Page->OldCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProtectedProducts->Visible) { // ProtectedProducts ?>
        <td data-name="ProtectedProducts" <?= $Page->ProtectedProducts->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProtectedProducts">
<span<?= $Page->ProtectedProducts->viewAttributes() ?>>
<?= $Page->ProtectedProducts->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductFullName->Visible) { // ProductFullName ?>
        <td data-name="ProductFullName" <?= $Page->ProductFullName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductFullName">
<span<?= $Page->ProductFullName->viewAttributes() ?>>
<?= $Page->ProductFullName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
        <td data-name="UnitOfMeasure" <?= $Page->UnitOfMeasure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_UnitOfMeasure">
<span<?= $Page->UnitOfMeasure->viewAttributes() ?>>
<?= $Page->UnitOfMeasure->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UnitDescription->Visible) { // UnitDescription ?>
        <td data-name="UnitDescription" <?= $Page->UnitDescription->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_UnitDescription">
<span<?= $Page->UnitDescription->viewAttributes() ?>>
<?= $Page->UnitDescription->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BulkDescription->Visible) { // BulkDescription ?>
        <td data-name="BulkDescription" <?= $Page->BulkDescription->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BulkDescription">
<span<?= $Page->BulkDescription->viewAttributes() ?>>
<?= $Page->BulkDescription->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BarCodeDescription->Visible) { // BarCodeDescription ?>
        <td data-name="BarCodeDescription" <?= $Page->BarCodeDescription->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BarCodeDescription">
<span<?= $Page->BarCodeDescription->viewAttributes() ?>>
<?= $Page->BarCodeDescription->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PackageInformation->Visible) { // PackageInformation ?>
        <td data-name="PackageInformation" <?= $Page->PackageInformation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PackageInformation">
<span<?= $Page->PackageInformation->viewAttributes() ?>>
<?= $Page->PackageInformation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PackageId->Visible) { // PackageId ?>
        <td data-name="PackageId" <?= $Page->PackageId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PackageId">
<span<?= $Page->PackageId->viewAttributes() ?>>
<?= $Page->PackageId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Weight->Visible) { // Weight ?>
        <td data-name="Weight" <?= $Page->Weight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AllowFractions->Visible) { // AllowFractions ?>
        <td data-name="AllowFractions" <?= $Page->AllowFractions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowFractions">
<span<?= $Page->AllowFractions->viewAttributes() ?>>
<?= $Page->AllowFractions->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
        <td data-name="MinimumStockLevel" <?= $Page->MinimumStockLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MinimumStockLevel">
<span<?= $Page->MinimumStockLevel->viewAttributes() ?>>
<?= $Page->MinimumStockLevel->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
        <td data-name="MaximumStockLevel" <?= $Page->MaximumStockLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MaximumStockLevel">
<span<?= $Page->MaximumStockLevel->viewAttributes() ?>>
<?= $Page->MaximumStockLevel->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReorderLevel->Visible) { // ReorderLevel ?>
        <td data-name="ReorderLevel" <?= $Page->ReorderLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ReorderLevel">
<span<?= $Page->ReorderLevel->viewAttributes() ?>>
<?= $Page->ReorderLevel->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MinMaxRatio->Visible) { // MinMaxRatio ?>
        <td data-name="MinMaxRatio" <?= $Page->MinMaxRatio->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MinMaxRatio">
<span<?= $Page->MinMaxRatio->viewAttributes() ?>>
<?= $Page->MinMaxRatio->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
        <td data-name="AutoMinMaxRatio" <?= $Page->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AutoMinMaxRatio">
<span<?= $Page->AutoMinMaxRatio->viewAttributes() ?>>
<?= $Page->AutoMinMaxRatio->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ScheduleCode->Visible) { // ScheduleCode ?>
        <td data-name="ScheduleCode" <?= $Page->ScheduleCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ScheduleCode">
<span<?= $Page->ScheduleCode->viewAttributes() ?>>
<?= $Page->ScheduleCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RopRatio->Visible) { // RopRatio ?>
        <td data-name="RopRatio" <?= $Page->RopRatio->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RopRatio">
<span<?= $Page->RopRatio->viewAttributes() ?>>
<?= $Page->RopRatio->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurchasePrice->Visible) { // PurchasePrice ?>
        <td data-name="PurchasePrice" <?= $Page->PurchasePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PurchasePrice">
<span<?= $Page->PurchasePrice->viewAttributes() ?>>
<?= $Page->PurchasePrice->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurchaseUnit->Visible) { // PurchaseUnit ?>
        <td data-name="PurchaseUnit" <?= $Page->PurchaseUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PurchaseUnit">
<span<?= $Page->PurchaseUnit->viewAttributes() ?>>
<?= $Page->PurchaseUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
        <td data-name="PurchaseTaxCode" <?= $Page->PurchaseTaxCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PurchaseTaxCode">
<span<?= $Page->PurchaseTaxCode->viewAttributes() ?>>
<?= $Page->PurchaseTaxCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AllowDirectInward->Visible) { // AllowDirectInward ?>
        <td data-name="AllowDirectInward" <?= $Page->AllowDirectInward->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowDirectInward">
<span<?= $Page->AllowDirectInward->viewAttributes() ?>>
<?= $Page->AllowDirectInward->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalePrice->Visible) { // SalePrice ?>
        <td data-name="SalePrice" <?= $Page->SalePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SalePrice">
<span<?= $Page->SalePrice->viewAttributes() ?>>
<?= $Page->SalePrice->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SaleUnit->Visible) { // SaleUnit ?>
        <td data-name="SaleUnit" <?= $Page->SaleUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SaleUnit">
<span<?= $Page->SaleUnit->viewAttributes() ?>>
<?= $Page->SaleUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalesTaxCode->Visible) { // SalesTaxCode ?>
        <td data-name="SalesTaxCode" <?= $Page->SalesTaxCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SalesTaxCode">
<span<?= $Page->SalesTaxCode->viewAttributes() ?>>
<?= $Page->SalesTaxCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StockReceived->Visible) { // StockReceived ?>
        <td data-name="StockReceived" <?= $Page->StockReceived->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockReceived">
<span<?= $Page->StockReceived->viewAttributes() ?>>
<?= $Page->StockReceived->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalStock->Visible) { // TotalStock ?>
        <td data-name="TotalStock" <?= $Page->TotalStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TotalStock">
<span<?= $Page->TotalStock->viewAttributes() ?>>
<?= $Page->TotalStock->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StockType->Visible) { // StockType ?>
        <td data-name="StockType" <?= $Page->StockType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockType">
<span<?= $Page->StockType->viewAttributes() ?>>
<?= $Page->StockType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StockCheckDate->Visible) { // StockCheckDate ?>
        <td data-name="StockCheckDate" <?= $Page->StockCheckDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockCheckDate">
<span<?= $Page->StockCheckDate->viewAttributes() ?>>
<?= $Page->StockCheckDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
        <td data-name="StockAdjustmentDate" <?= $Page->StockAdjustmentDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockAdjustmentDate">
<span<?= $Page->StockAdjustmentDate->viewAttributes() ?>>
<?= $Page->StockAdjustmentDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CostCentre->Visible) { // CostCentre ?>
        <td data-name="CostCentre" <?= $Page->CostCentre->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CostCentre">
<span<?= $Page->CostCentre->viewAttributes() ?>>
<?= $Page->CostCentre->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductType->Visible) { // ProductType ?>
        <td data-name="ProductType" <?= $Page->ProductType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductType">
<span<?= $Page->ProductType->viewAttributes() ?>>
<?= $Page->ProductType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TaxAmount->Visible) { // TaxAmount ?>
        <td data-name="TaxAmount" <?= $Page->TaxAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TaxAmount">
<span<?= $Page->TaxAmount->viewAttributes() ?>>
<?= $Page->TaxAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TaxId->Visible) { // TaxId ?>
        <td data-name="TaxId" <?= $Page->TaxId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TaxId">
<span<?= $Page->TaxId->viewAttributes() ?>>
<?= $Page->TaxId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
        <td data-name="ResaleTaxApplicable" <?= $Page->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ResaleTaxApplicable">
<span<?= $Page->ResaleTaxApplicable->viewAttributes() ?>>
<?= $Page->ResaleTaxApplicable->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CstOtherTax->Visible) { // CstOtherTax ?>
        <td data-name="CstOtherTax" <?= $Page->CstOtherTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CstOtherTax">
<span<?= $Page->CstOtherTax->viewAttributes() ?>>
<?= $Page->CstOtherTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalTax->Visible) { // TotalTax ?>
        <td data-name="TotalTax" <?= $Page->TotalTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TotalTax">
<span<?= $Page->TotalTax->viewAttributes() ?>>
<?= $Page->TotalTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ItemCost->Visible) { // ItemCost ?>
        <td data-name="ItemCost" <?= $Page->ItemCost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ItemCost">
<span<?= $Page->ItemCost->viewAttributes() ?>>
<?= $Page->ItemCost->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExpiryDate->Visible) { // ExpiryDate ?>
        <td data-name="ExpiryDate" <?= $Page->ExpiryDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ExpiryDate">
<span<?= $Page->ExpiryDate->viewAttributes() ?>>
<?= $Page->ExpiryDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BatchDescription->Visible) { // BatchDescription ?>
        <td data-name="BatchDescription" <?= $Page->BatchDescription->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BatchDescription">
<span<?= $Page->BatchDescription->viewAttributes() ?>>
<?= $Page->BatchDescription->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeScheme->Visible) { // FreeScheme ?>
        <td data-name="FreeScheme" <?= $Page->FreeScheme->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeScheme">
<span<?= $Page->FreeScheme->viewAttributes() ?>>
<?= $Page->FreeScheme->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
        <td data-name="CashDiscountEligibility" <?= $Page->CashDiscountEligibility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CashDiscountEligibility">
<span<?= $Page->CashDiscountEligibility->viewAttributes() ?>>
<?= $Page->CashDiscountEligibility->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
        <td data-name="DiscountPerAllowInBill" <?= $Page->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DiscountPerAllowInBill">
<span<?= $Page->DiscountPerAllowInBill->viewAttributes() ?>>
<?= $Page->DiscountPerAllowInBill->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Discount->Visible) { // Discount ?>
        <td data-name="Discount" <?= $Page->Discount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <td data-name="TotalAmount" <?= $Page->TotalAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TotalAmount">
<span<?= $Page->TotalAmount->viewAttributes() ?>>
<?= $Page->TotalAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StandardMargin->Visible) { // StandardMargin ?>
        <td data-name="StandardMargin" <?= $Page->StandardMargin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StandardMargin">
<span<?= $Page->StandardMargin->viewAttributes() ?>>
<?= $Page->StandardMargin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Margin->Visible) { // Margin ?>
        <td data-name="Margin" <?= $Page->Margin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Margin">
<span<?= $Page->Margin->viewAttributes() ?>>
<?= $Page->Margin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarginId->Visible) { // MarginId ?>
        <td data-name="MarginId" <?= $Page->MarginId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarginId">
<span<?= $Page->MarginId->viewAttributes() ?>>
<?= $Page->MarginId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExpectedMargin->Visible) { // ExpectedMargin ?>
        <td data-name="ExpectedMargin" <?= $Page->ExpectedMargin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ExpectedMargin">
<span<?= $Page->ExpectedMargin->viewAttributes() ?>>
<?= $Page->ExpectedMargin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
        <td data-name="SurchargeBeforeTax" <?= $Page->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SurchargeBeforeTax">
<span<?= $Page->SurchargeBeforeTax->viewAttributes() ?>>
<?= $Page->SurchargeBeforeTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
        <td data-name="SurchargeAfterTax" <?= $Page->SurchargeAfterTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SurchargeAfterTax">
<span<?= $Page->SurchargeAfterTax->viewAttributes() ?>>
<?= $Page->SurchargeAfterTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TempOrderNo->Visible) { // TempOrderNo ?>
        <td data-name="TempOrderNo" <?= $Page->TempOrderNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TempOrderNo">
<span<?= $Page->TempOrderNo->viewAttributes() ?>>
<?= $Page->TempOrderNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TempOrderDate->Visible) { // TempOrderDate ?>
        <td data-name="TempOrderDate" <?= $Page->TempOrderDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TempOrderDate">
<span<?= $Page->TempOrderDate->viewAttributes() ?>>
<?= $Page->TempOrderDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OrderUnit->Visible) { // OrderUnit ?>
        <td data-name="OrderUnit" <?= $Page->OrderUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderUnit">
<span<?= $Page->OrderUnit->viewAttributes() ?>>
<?= $Page->OrderUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OrderQuantity->Visible) { // OrderQuantity ?>
        <td data-name="OrderQuantity" <?= $Page->OrderQuantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderQuantity">
<span<?= $Page->OrderQuantity->viewAttributes() ?>>
<?= $Page->OrderQuantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarkForOrder->Visible) { // MarkForOrder ?>
        <td data-name="MarkForOrder" <?= $Page->MarkForOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkForOrder">
<span<?= $Page->MarkForOrder->viewAttributes() ?>>
<?= $Page->MarkForOrder->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OrderAllId->Visible) { // OrderAllId ?>
        <td data-name="OrderAllId" <?= $Page->OrderAllId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderAllId">
<span<?= $Page->OrderAllId->viewAttributes() ?>>
<?= $Page->OrderAllId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
        <td data-name="CalculateOrderQty" <?= $Page->CalculateOrderQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CalculateOrderQty">
<span<?= $Page->CalculateOrderQty->viewAttributes() ?>>
<?= $Page->CalculateOrderQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SubLocation->Visible) { // SubLocation ?>
        <td data-name="SubLocation" <?= $Page->SubLocation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SubLocation">
<span<?= $Page->SubLocation->viewAttributes() ?>>
<?= $Page->SubLocation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CategoryCode->Visible) { // CategoryCode ?>
        <td data-name="CategoryCode" <?= $Page->CategoryCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CategoryCode">
<span<?= $Page->CategoryCode->viewAttributes() ?>>
<?= $Page->CategoryCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SubCategory->Visible) { // SubCategory ?>
        <td data-name="SubCategory" <?= $Page->SubCategory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SubCategory">
<span<?= $Page->SubCategory->viewAttributes() ?>>
<?= $Page->SubCategory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
        <td data-name="FlexCategoryCode" <?= $Page->FlexCategoryCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FlexCategoryCode">
<span<?= $Page->FlexCategoryCode->viewAttributes() ?>>
<?= $Page->FlexCategoryCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ABCSaleQty->Visible) { // ABCSaleQty ?>
        <td data-name="ABCSaleQty" <?= $Page->ABCSaleQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ABCSaleQty">
<span<?= $Page->ABCSaleQty->viewAttributes() ?>>
<?= $Page->ABCSaleQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ABCSaleValue->Visible) { // ABCSaleValue ?>
        <td data-name="ABCSaleValue" <?= $Page->ABCSaleValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ABCSaleValue">
<span<?= $Page->ABCSaleValue->viewAttributes() ?>>
<?= $Page->ABCSaleValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ConvertionFactor->Visible) { // ConvertionFactor ?>
        <td data-name="ConvertionFactor" <?= $Page->ConvertionFactor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ConvertionFactor">
<span<?= $Page->ConvertionFactor->viewAttributes() ?>>
<?= $Page->ConvertionFactor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
        <td data-name="ConvertionUnitDesc" <?= $Page->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ConvertionUnitDesc">
<span<?= $Page->ConvertionUnitDesc->viewAttributes() ?>>
<?= $Page->ConvertionUnitDesc->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransactionId->Visible) { // TransactionId ?>
        <td data-name="TransactionId" <?= $Page->TransactionId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TransactionId">
<span<?= $Page->TransactionId->viewAttributes() ?>>
<?= $Page->TransactionId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SoldProductId->Visible) { // SoldProductId ?>
        <td data-name="SoldProductId" <?= $Page->SoldProductId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SoldProductId">
<span<?= $Page->SoldProductId->viewAttributes() ?>>
<?= $Page->SoldProductId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WantedBookId->Visible) { // WantedBookId ?>
        <td data-name="WantedBookId" <?= $Page->WantedBookId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_WantedBookId">
<span<?= $Page->WantedBookId->viewAttributes() ?>>
<?= $Page->WantedBookId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AllId->Visible) { // AllId ?>
        <td data-name="AllId" <?= $Page->AllId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllId">
<span<?= $Page->AllId->viewAttributes() ?>>
<?= $Page->AllId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
        <td data-name="BatchAndExpiryCompulsory" <?= $Page->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BatchAndExpiryCompulsory">
<span<?= $Page->BatchAndExpiryCompulsory->viewAttributes() ?>>
<?= $Page->BatchAndExpiryCompulsory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
        <td data-name="BatchStockForWantedBook" <?= $Page->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BatchStockForWantedBook">
<span<?= $Page->BatchStockForWantedBook->viewAttributes() ?>>
<?= $Page->BatchStockForWantedBook->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
        <td data-name="UnitBasedBilling" <?= $Page->UnitBasedBilling->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_UnitBasedBilling">
<span<?= $Page->UnitBasedBilling->viewAttributes() ?>>
<?= $Page->UnitBasedBilling->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
        <td data-name="DoNotCheckStock" <?= $Page->DoNotCheckStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DoNotCheckStock">
<span<?= $Page->DoNotCheckStock->viewAttributes() ?>>
<?= $Page->DoNotCheckStock->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AcceptRate->Visible) { // AcceptRate ?>
        <td data-name="AcceptRate" <?= $Page->AcceptRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptRate">
<span<?= $Page->AcceptRate->viewAttributes() ?>>
<?= $Page->AcceptRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PriceLevel->Visible) { // PriceLevel ?>
        <td data-name="PriceLevel" <?= $Page->PriceLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PriceLevel">
<span<?= $Page->PriceLevel->viewAttributes() ?>>
<?= $Page->PriceLevel->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LastQuotePrice->Visible) { // LastQuotePrice ?>
        <td data-name="LastQuotePrice" <?= $Page->LastQuotePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LastQuotePrice">
<span<?= $Page->LastQuotePrice->viewAttributes() ?>>
<?= $Page->LastQuotePrice->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PriceChange->Visible) { // PriceChange ?>
        <td data-name="PriceChange" <?= $Page->PriceChange->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PriceChange">
<span<?= $Page->PriceChange->viewAttributes() ?>>
<?= $Page->PriceChange->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CommodityCode->Visible) { // CommodityCode ?>
        <td data-name="CommodityCode" <?= $Page->CommodityCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CommodityCode">
<span<?= $Page->CommodityCode->viewAttributes() ?>>
<?= $Page->CommodityCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InstitutePrice->Visible) { // InstitutePrice ?>
        <td data-name="InstitutePrice" <?= $Page->InstitutePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_InstitutePrice">
<span<?= $Page->InstitutePrice->viewAttributes() ?>>
<?= $Page->InstitutePrice->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
        <td data-name="CtrlOrDCtrlProduct" <?= $Page->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CtrlOrDCtrlProduct">
<span<?= $Page->CtrlOrDCtrlProduct->viewAttributes() ?>>
<?= $Page->CtrlOrDCtrlProduct->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ImportedDate->Visible) { // ImportedDate ?>
        <td data-name="ImportedDate" <?= $Page->ImportedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ImportedDate">
<span<?= $Page->ImportedDate->viewAttributes() ?>>
<?= $Page->ImportedDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IsImported->Visible) { // IsImported ?>
        <td data-name="IsImported" <?= $Page->IsImported->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsImported">
<span<?= $Page->IsImported->viewAttributes() ?>>
<?= $Page->IsImported->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FileName->Visible) { // FileName ?>
        <td data-name="FileName" <?= $Page->FileName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FileName">
<span<?= $Page->FileName->viewAttributes() ?>>
<?= $Page->FileName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GodownNumber->Visible) { // GodownNumber ?>
        <td data-name="GodownNumber" <?= $Page->GodownNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GodownNumber">
<span<?= $Page->GodownNumber->viewAttributes() ?>>
<?= $Page->GodownNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreationDate->Visible) { // CreationDate ?>
        <td data-name="CreationDate" <?= $Page->CreationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CreationDate">
<span<?= $Page->CreationDate->viewAttributes() ?>>
<?= $Page->CreationDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedbyUser->Visible) { // CreatedbyUser ?>
        <td data-name="CreatedbyUser" <?= $Page->CreatedbyUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CreatedbyUser">
<span<?= $Page->CreatedbyUser->viewAttributes() ?>>
<?= $Page->CreatedbyUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDate->Visible) { // ModifiedDate ?>
        <td data-name="ModifiedDate" <?= $Page->ModifiedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ModifiedDate">
<span<?= $Page->ModifiedDate->viewAttributes() ?>>
<?= $Page->ModifiedDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
        <td data-name="ModifiedbyUser" <?= $Page->ModifiedbyUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ModifiedbyUser">
<span<?= $Page->ModifiedbyUser->viewAttributes() ?>>
<?= $Page->ModifiedbyUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->isActive->Visible) { // isActive ?>
        <td data-name="isActive" <?= $Page->isActive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_isActive">
<span<?= $Page->isActive->viewAttributes() ?>>
<?= $Page->isActive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
        <td data-name="AllowExpiryClaim" <?= $Page->AllowExpiryClaim->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowExpiryClaim">
<span<?= $Page->AllowExpiryClaim->viewAttributes() ?>>
<?= $Page->AllowExpiryClaim->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BrandCode->Visible) { // BrandCode ?>
        <td data-name="BrandCode" <?= $Page->BrandCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BrandCode">
<span<?= $Page->BrandCode->viewAttributes() ?>>
<?= $Page->BrandCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
        <td data-name="FreeSchemeBasedon" <?= $Page->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeSchemeBasedon">
<span<?= $Page->FreeSchemeBasedon->viewAttributes() ?>>
<?= $Page->FreeSchemeBasedon->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
        <td data-name="DoNotCheckCostInBill" <?= $Page->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DoNotCheckCostInBill">
<span<?= $Page->DoNotCheckCostInBill->viewAttributes() ?>>
<?= $Page->DoNotCheckCostInBill->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductGroupCode->Visible) { // ProductGroupCode ?>
        <td data-name="ProductGroupCode" <?= $Page->ProductGroupCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductGroupCode">
<span<?= $Page->ProductGroupCode->viewAttributes() ?>>
<?= $Page->ProductGroupCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
        <td data-name="ProductStrengthCode" <?= $Page->ProductStrengthCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductStrengthCode">
<span<?= $Page->ProductStrengthCode->viewAttributes() ?>>
<?= $Page->ProductStrengthCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PackingCode->Visible) { // PackingCode ?>
        <td data-name="PackingCode" <?= $Page->PackingCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PackingCode">
<span<?= $Page->PackingCode->viewAttributes() ?>>
<?= $Page->PackingCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ComputedMinStock->Visible) { // ComputedMinStock ?>
        <td data-name="ComputedMinStock" <?= $Page->ComputedMinStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ComputedMinStock">
<span<?= $Page->ComputedMinStock->viewAttributes() ?>>
<?= $Page->ComputedMinStock->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
        <td data-name="ComputedMaxStock" <?= $Page->ComputedMaxStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ComputedMaxStock">
<span<?= $Page->ComputedMaxStock->viewAttributes() ?>>
<?= $Page->ComputedMaxStock->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductRemark->Visible) { // ProductRemark ?>
        <td data-name="ProductRemark" <?= $Page->ProductRemark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductRemark">
<span<?= $Page->ProductRemark->viewAttributes() ?>>
<?= $Page->ProductRemark->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductDrugCode->Visible) { // ProductDrugCode ?>
        <td data-name="ProductDrugCode" <?= $Page->ProductDrugCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductDrugCode">
<span<?= $Page->ProductDrugCode->viewAttributes() ?>>
<?= $Page->ProductDrugCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
        <td data-name="IsMatrixProduct" <?= $Page->IsMatrixProduct->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsMatrixProduct">
<span<?= $Page->IsMatrixProduct->viewAttributes() ?>>
<?= $Page->IsMatrixProduct->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount1->Visible) { // AttributeCount1 ?>
        <td data-name="AttributeCount1" <?= $Page->AttributeCount1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount1">
<span<?= $Page->AttributeCount1->viewAttributes() ?>>
<?= $Page->AttributeCount1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount2->Visible) { // AttributeCount2 ?>
        <td data-name="AttributeCount2" <?= $Page->AttributeCount2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount2">
<span<?= $Page->AttributeCount2->viewAttributes() ?>>
<?= $Page->AttributeCount2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount3->Visible) { // AttributeCount3 ?>
        <td data-name="AttributeCount3" <?= $Page->AttributeCount3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount3">
<span<?= $Page->AttributeCount3->viewAttributes() ?>>
<?= $Page->AttributeCount3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount4->Visible) { // AttributeCount4 ?>
        <td data-name="AttributeCount4" <?= $Page->AttributeCount4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount4">
<span<?= $Page->AttributeCount4->viewAttributes() ?>>
<?= $Page->AttributeCount4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount5->Visible) { // AttributeCount5 ?>
        <td data-name="AttributeCount5" <?= $Page->AttributeCount5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount5">
<span<?= $Page->AttributeCount5->viewAttributes() ?>>
<?= $Page->AttributeCount5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
        <td data-name="DefaultDiscountPercentage" <?= $Page->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultDiscountPercentage">
<span<?= $Page->DefaultDiscountPercentage->viewAttributes() ?>>
<?= $Page->DefaultDiscountPercentage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
        <td data-name="DonotPrintBarcode" <?= $Page->DonotPrintBarcode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DonotPrintBarcode">
<span<?= $Page->DonotPrintBarcode->viewAttributes() ?>>
<?= $Page->DonotPrintBarcode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
        <td data-name="ProductLevelDiscount" <?= $Page->ProductLevelDiscount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductLevelDiscount">
<span<?= $Page->ProductLevelDiscount->viewAttributes() ?>>
<?= $Page->ProductLevelDiscount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Markup->Visible) { // Markup ?>
        <td data-name="Markup" <?= $Page->Markup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Markup">
<span<?= $Page->Markup->viewAttributes() ?>>
<?= $Page->Markup->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarkDown->Visible) { // MarkDown ?>
        <td data-name="MarkDown" <?= $Page->MarkDown->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkDown">
<span<?= $Page->MarkDown->viewAttributes() ?>>
<?= $Page->MarkDown->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
        <td data-name="ReworkSalePrice" <?= $Page->ReworkSalePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ReworkSalePrice">
<span<?= $Page->ReworkSalePrice->viewAttributes() ?>>
<?= $Page->ReworkSalePrice->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MultipleInput->Visible) { // MultipleInput ?>
        <td data-name="MultipleInput" <?= $Page->MultipleInput->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MultipleInput">
<span<?= $Page->MultipleInput->viewAttributes() ?>>
<?= $Page->MultipleInput->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LpPackageInformation->Visible) { // LpPackageInformation ?>
        <td data-name="LpPackageInformation" <?= $Page->LpPackageInformation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LpPackageInformation">
<span<?= $Page->LpPackageInformation->viewAttributes() ?>>
<?= $Page->LpPackageInformation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
        <td data-name="AllowNegativeStock" <?= $Page->AllowNegativeStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowNegativeStock">
<span<?= $Page->AllowNegativeStock->viewAttributes() ?>>
<?= $Page->AllowNegativeStock->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OrderDate->Visible) { // OrderDate ?>
        <td data-name="OrderDate" <?= $Page->OrderDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderDate">
<span<?= $Page->OrderDate->viewAttributes() ?>>
<?= $Page->OrderDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OrderTime->Visible) { // OrderTime ?>
        <td data-name="OrderTime" <?= $Page->OrderTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderTime">
<span<?= $Page->OrderTime->viewAttributes() ?>>
<?= $Page->OrderTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RateGroupCode->Visible) { // RateGroupCode ?>
        <td data-name="RateGroupCode" <?= $Page->RateGroupCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RateGroupCode">
<span<?= $Page->RateGroupCode->viewAttributes() ?>>
<?= $Page->RateGroupCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
        <td data-name="ConversionCaseLot" <?= $Page->ConversionCaseLot->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ConversionCaseLot">
<span<?= $Page->ConversionCaseLot->viewAttributes() ?>>
<?= $Page->ConversionCaseLot->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ShippingLot->Visible) { // ShippingLot ?>
        <td data-name="ShippingLot" <?= $Page->ShippingLot->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ShippingLot">
<span<?= $Page->ShippingLot->viewAttributes() ?>>
<?= $Page->ShippingLot->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
        <td data-name="AllowExpiryReplacement" <?= $Page->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowExpiryReplacement">
<span<?= $Page->AllowExpiryReplacement->viewAttributes() ?>>
<?= $Page->AllowExpiryReplacement->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
        <td data-name="NoOfMonthExpiryAllowed" <?= $Page->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_NoOfMonthExpiryAllowed">
<span<?= $Page->NoOfMonthExpiryAllowed->viewAttributes() ?>>
<?= $Page->NoOfMonthExpiryAllowed->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
        <td data-name="ProductDiscountEligibility" <?= $Page->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductDiscountEligibility">
<span<?= $Page->ProductDiscountEligibility->viewAttributes() ?>>
<?= $Page->ProductDiscountEligibility->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
        <td data-name="ScheduleTypeCode" <?= $Page->ScheduleTypeCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ScheduleTypeCode">
<span<?= $Page->ScheduleTypeCode->viewAttributes() ?>>
<?= $Page->ScheduleTypeCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
        <td data-name="AIOCDProductCode" <?= $Page->AIOCDProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AIOCDProductCode">
<span<?= $Page->AIOCDProductCode->viewAttributes() ?>>
<?= $Page->AIOCDProductCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeQuantity->Visible) { // FreeQuantity ?>
        <td data-name="FreeQuantity" <?= $Page->FreeQuantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeQuantity">
<span<?= $Page->FreeQuantity->viewAttributes() ?>>
<?= $Page->FreeQuantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DiscountType->Visible) { // DiscountType ?>
        <td data-name="DiscountType" <?= $Page->DiscountType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DiscountType">
<span<?= $Page->DiscountType->viewAttributes() ?>>
<?= $Page->DiscountType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DiscountValue->Visible) { // DiscountValue ?>
        <td data-name="DiscountValue" <?= $Page->DiscountValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DiscountValue">
<span<?= $Page->DiscountValue->viewAttributes() ?>>
<?= $Page->DiscountValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
        <td data-name="HasProductOrderAttribute" <?= $Page->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_HasProductOrderAttribute">
<span<?= $Page->HasProductOrderAttribute->viewAttributes() ?>>
<?= $Page->HasProductOrderAttribute->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FirstPODate->Visible) { // FirstPODate ?>
        <td data-name="FirstPODate" <?= $Page->FirstPODate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FirstPODate">
<span<?= $Page->FirstPODate->viewAttributes() ?>>
<?= $Page->FirstPODate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
        <td data-name="SaleprcieAndMrpCalcPercent" <?= $Page->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SaleprcieAndMrpCalcPercent">
<span<?= $Page->SaleprcieAndMrpCalcPercent->viewAttributes() ?>>
<?= $Page->SaleprcieAndMrpCalcPercent->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
        <td data-name="IsGiftVoucherProducts" <?= $Page->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsGiftVoucherProducts">
<span<?= $Page->IsGiftVoucherProducts->viewAttributes() ?>>
<?= $Page->IsGiftVoucherProducts->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
        <td data-name="AcceptRange4SerialNumber" <?= $Page->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptRange4SerialNumber">
<span<?= $Page->AcceptRange4SerialNumber->viewAttributes() ?>>
<?= $Page->AcceptRange4SerialNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
        <td data-name="GiftVoucherDenomination" <?= $Page->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GiftVoucherDenomination">
<span<?= $Page->GiftVoucherDenomination->viewAttributes() ?>>
<?= $Page->GiftVoucherDenomination->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Subclasscode->Visible) { // Subclasscode ?>
        <td data-name="Subclasscode" <?= $Page->Subclasscode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Subclasscode">
<span<?= $Page->Subclasscode->viewAttributes() ?>>
<?= $Page->Subclasscode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
        <td data-name="BarCodeFromWeighingMachine" <?= $Page->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BarCodeFromWeighingMachine">
<span<?= $Page->BarCodeFromWeighingMachine->viewAttributes() ?>>
<?= $Page->BarCodeFromWeighingMachine->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
        <td data-name="CheckCostInReturn" <?= $Page->CheckCostInReturn->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CheckCostInReturn">
<span<?= $Page->CheckCostInReturn->viewAttributes() ?>>
<?= $Page->CheckCostInReturn->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
        <td data-name="FrequentSaleProduct" <?= $Page->FrequentSaleProduct->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FrequentSaleProduct">
<span<?= $Page->FrequentSaleProduct->viewAttributes() ?>>
<?= $Page->FrequentSaleProduct->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RateType->Visible) { // RateType ?>
        <td data-name="RateType" <?= $Page->RateType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RateType">
<span<?= $Page->RateType->viewAttributes() ?>>
<?= $Page->RateType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TouchscreenName->Visible) { // TouchscreenName ?>
        <td data-name="TouchscreenName" <?= $Page->TouchscreenName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TouchscreenName">
<span<?= $Page->TouchscreenName->viewAttributes() ?>>
<?= $Page->TouchscreenName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeType->Visible) { // FreeType ?>
        <td data-name="FreeType" <?= $Page->FreeType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeType">
<span<?= $Page->FreeType->viewAttributes() ?>>
<?= $Page->FreeType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
        <td data-name="LooseQtyasNewBatch" <?= $Page->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LooseQtyasNewBatch">
<span<?= $Page->LooseQtyasNewBatch->viewAttributes() ?>>
<?= $Page->LooseQtyasNewBatch->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
        <td data-name="AllowSlabBilling" <?= $Page->AllowSlabBilling->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AllowSlabBilling">
<span<?= $Page->AllowSlabBilling->viewAttributes() ?>>
<?= $Page->AllowSlabBilling->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
        <td data-name="ProductTypeForProduction" <?= $Page->ProductTypeForProduction->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductTypeForProduction">
<span<?= $Page->ProductTypeForProduction->viewAttributes() ?>>
<?= $Page->ProductTypeForProduction->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RecipeCode->Visible) { // RecipeCode ?>
        <td data-name="RecipeCode" <?= $Page->RecipeCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RecipeCode">
<span<?= $Page->RecipeCode->viewAttributes() ?>>
<?= $Page->RecipeCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DefaultUnitType->Visible) { // DefaultUnitType ?>
        <td data-name="DefaultUnitType" <?= $Page->DefaultUnitType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultUnitType">
<span<?= $Page->DefaultUnitType->viewAttributes() ?>>
<?= $Page->DefaultUnitType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PIstatus->Visible) { // PIstatus ?>
        <td data-name="PIstatus" <?= $Page->PIstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PIstatus">
<span<?= $Page->PIstatus->viewAttributes() ?>>
<?= $Page->PIstatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
        <td data-name="LastPiConfirmedDate" <?= $Page->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LastPiConfirmedDate">
<span<?= $Page->LastPiConfirmedDate->viewAttributes() ?>>
<?= $Page->LastPiConfirmedDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BarCodeDesign->Visible) { // BarCodeDesign ?>
        <td data-name="BarCodeDesign" <?= $Page->BarCodeDesign->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BarCodeDesign">
<span<?= $Page->BarCodeDesign->viewAttributes() ?>>
<?= $Page->BarCodeDesign->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
        <td data-name="AcceptRemarksInBill" <?= $Page->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptRemarksInBill">
<span<?= $Page->AcceptRemarksInBill->viewAttributes() ?>>
<?= $Page->AcceptRemarksInBill->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Classification->Visible) { // Classification ?>
        <td data-name="Classification" <?= $Page->Classification->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Classification">
<span<?= $Page->Classification->viewAttributes() ?>>
<?= $Page->Classification->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TimeSlot->Visible) { // TimeSlot ?>
        <td data-name="TimeSlot" <?= $Page->TimeSlot->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TimeSlot">
<span<?= $Page->TimeSlot->viewAttributes() ?>>
<?= $Page->TimeSlot->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IsBundle->Visible) { // IsBundle ?>
        <td data-name="IsBundle" <?= $Page->IsBundle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsBundle">
<span<?= $Page->IsBundle->viewAttributes() ?>>
<?= $Page->IsBundle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ColorCode->Visible) { // ColorCode ?>
        <td data-name="ColorCode" <?= $Page->ColorCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ColorCode">
<span<?= $Page->ColorCode->viewAttributes() ?>>
<?= $Page->ColorCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GenderCode->Visible) { // GenderCode ?>
        <td data-name="GenderCode" <?= $Page->GenderCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GenderCode">
<span<?= $Page->GenderCode->viewAttributes() ?>>
<?= $Page->GenderCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SizeCode->Visible) { // SizeCode ?>
        <td data-name="SizeCode" <?= $Page->SizeCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SizeCode">
<span<?= $Page->SizeCode->viewAttributes() ?>>
<?= $Page->SizeCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GiftCard->Visible) { // GiftCard ?>
        <td data-name="GiftCard" <?= $Page->GiftCard->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GiftCard">
<span<?= $Page->GiftCard->viewAttributes() ?>>
<?= $Page->GiftCard->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ToonLabel->Visible) { // ToonLabel ?>
        <td data-name="ToonLabel" <?= $Page->ToonLabel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ToonLabel">
<span<?= $Page->ToonLabel->viewAttributes() ?>>
<?= $Page->ToonLabel->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GarmentType->Visible) { // GarmentType ?>
        <td data-name="GarmentType" <?= $Page->GarmentType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_GarmentType">
<span<?= $Page->GarmentType->viewAttributes() ?>>
<?= $Page->GarmentType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AgeGroup->Visible) { // AgeGroup ?>
        <td data-name="AgeGroup" <?= $Page->AgeGroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AgeGroup">
<span<?= $Page->AgeGroup->viewAttributes() ?>>
<?= $Page->AgeGroup->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Season->Visible) { // Season ?>
        <td data-name="Season" <?= $Page->Season->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Season">
<span<?= $Page->Season->viewAttributes() ?>>
<?= $Page->Season->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DailyStockEntry->Visible) { // DailyStockEntry ?>
        <td data-name="DailyStockEntry" <?= $Page->DailyStockEntry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DailyStockEntry">
<span<?= $Page->DailyStockEntry->viewAttributes() ?>>
<?= $Page->DailyStockEntry->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifierApplicable->Visible) { // ModifierApplicable ?>
        <td data-name="ModifierApplicable" <?= $Page->ModifierApplicable->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ModifierApplicable">
<span<?= $Page->ModifierApplicable->viewAttributes() ?>>
<?= $Page->ModifierApplicable->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifierType->Visible) { // ModifierType ?>
        <td data-name="ModifierType" <?= $Page->ModifierType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ModifierType">
<span<?= $Page->ModifierType->viewAttributes() ?>>
<?= $Page->ModifierType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
        <td data-name="AcceptZeroRate" <?= $Page->AcceptZeroRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptZeroRate">
<span<?= $Page->AcceptZeroRate->viewAttributes() ?>>
<?= $Page->AcceptZeroRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
        <td data-name="ExciseDutyCode" <?= $Page->ExciseDutyCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ExciseDutyCode">
<span<?= $Page->ExciseDutyCode->viewAttributes() ?>>
<?= $Page->ExciseDutyCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
        <td data-name="IndentProductGroupCode" <?= $Page->IndentProductGroupCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IndentProductGroupCode">
<span<?= $Page->IndentProductGroupCode->viewAttributes() ?>>
<?= $Page->IndentProductGroupCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IsMultiBatch->Visible) { // IsMultiBatch ?>
        <td data-name="IsMultiBatch" <?= $Page->IsMultiBatch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsMultiBatch">
<span<?= $Page->IsMultiBatch->viewAttributes() ?>>
<?= $Page->IsMultiBatch->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IsSingleBatch->Visible) { // IsSingleBatch ?>
        <td data-name="IsSingleBatch" <?= $Page->IsSingleBatch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsSingleBatch">
<span<?= $Page->IsSingleBatch->viewAttributes() ?>>
<?= $Page->IsSingleBatch->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarkUpRate1->Visible) { // MarkUpRate1 ?>
        <td data-name="MarkUpRate1" <?= $Page->MarkUpRate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkUpRate1">
<span<?= $Page->MarkUpRate1->viewAttributes() ?>>
<?= $Page->MarkUpRate1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarkDownRate1->Visible) { // MarkDownRate1 ?>
        <td data-name="MarkDownRate1" <?= $Page->MarkDownRate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkDownRate1">
<span<?= $Page->MarkDownRate1->viewAttributes() ?>>
<?= $Page->MarkDownRate1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarkUpRate2->Visible) { // MarkUpRate2 ?>
        <td data-name="MarkUpRate2" <?= $Page->MarkUpRate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkUpRate2">
<span<?= $Page->MarkUpRate2->viewAttributes() ?>>
<?= $Page->MarkUpRate2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarkDownRate2->Visible) { // MarkDownRate2 ?>
        <td data-name="MarkDownRate2" <?= $Page->MarkDownRate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarkDownRate2">
<span<?= $Page->MarkDownRate2->viewAttributes() ?>>
<?= $Page->MarkDownRate2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Yield->Visible) { // Yield ?>
        <td data-name="_Yield" <?= $Page->_Yield->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products__Yield">
<span<?= $Page->_Yield->viewAttributes() ?>>
<?= $Page->_Yield->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RefProductCode->Visible) { // RefProductCode ?>
        <td data-name="RefProductCode" <?= $Page->RefProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_RefProductCode">
<span<?= $Page->RefProductCode->viewAttributes() ?>>
<?= $Page->RefProductCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Volume->Visible) { // Volume ?>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MeasurementID->Visible) { // MeasurementID ?>
        <td data-name="MeasurementID" <?= $Page->MeasurementID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MeasurementID">
<span<?= $Page->MeasurementID->viewAttributes() ?>>
<?= $Page->MeasurementID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CountryCode->Visible) { // CountryCode ?>
        <td data-name="CountryCode" <?= $Page->CountryCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CountryCode">
<span<?= $Page->CountryCode->viewAttributes() ?>>
<?= $Page->CountryCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AcceptWMQty->Visible) { // AcceptWMQty ?>
        <td data-name="AcceptWMQty" <?= $Page->AcceptWMQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AcceptWMQty">
<span<?= $Page->AcceptWMQty->viewAttributes() ?>>
<?= $Page->AcceptWMQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
        <td data-name="SingleBatchBasedOnRate" <?= $Page->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SingleBatchBasedOnRate">
<span<?= $Page->SingleBatchBasedOnRate->viewAttributes() ?>>
<?= $Page->SingleBatchBasedOnRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TenderNo->Visible) { // TenderNo ?>
        <td data-name="TenderNo" <?= $Page->TenderNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TenderNo">
<span<?= $Page->TenderNo->viewAttributes() ?>>
<?= $Page->TenderNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
        <td data-name="SingleBillMaximumSoldQtyFiled" <?= $Page->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SingleBillMaximumSoldQtyFiled">
<span<?= $Page->SingleBillMaximumSoldQtyFiled->viewAttributes() ?>>
<?= $Page->SingleBillMaximumSoldQtyFiled->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <td data-name="Strength1" <?= $Page->Strength1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength1">
<span<?= $Page->Strength1->viewAttributes() ?>>
<?= $Page->Strength1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <td data-name="Strength2" <?= $Page->Strength2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength2">
<span<?= $Page->Strength2->viewAttributes() ?>>
<?= $Page->Strength2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <td data-name="Strength3" <?= $Page->Strength3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength3">
<span<?= $Page->Strength3->viewAttributes() ?>>
<?= $Page->Strength3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <td data-name="Strength4" <?= $Page->Strength4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength4">
<span<?= $Page->Strength4->viewAttributes() ?>>
<?= $Page->Strength4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <td data-name="Strength5" <?= $Page->Strength5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_Strength5">
<span<?= $Page->Strength5->viewAttributes() ?>>
<?= $Page->Strength5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IngredientCode1->Visible) { // IngredientCode1 ?>
        <td data-name="IngredientCode1" <?= $Page->IngredientCode1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode1">
<span<?= $Page->IngredientCode1->viewAttributes() ?>>
<?= $Page->IngredientCode1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IngredientCode2->Visible) { // IngredientCode2 ?>
        <td data-name="IngredientCode2" <?= $Page->IngredientCode2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode2">
<span<?= $Page->IngredientCode2->viewAttributes() ?>>
<?= $Page->IngredientCode2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IngredientCode3->Visible) { // IngredientCode3 ?>
        <td data-name="IngredientCode3" <?= $Page->IngredientCode3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode3">
<span<?= $Page->IngredientCode3->viewAttributes() ?>>
<?= $Page->IngredientCode3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IngredientCode4->Visible) { // IngredientCode4 ?>
        <td data-name="IngredientCode4" <?= $Page->IngredientCode4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode4">
<span<?= $Page->IngredientCode4->viewAttributes() ?>>
<?= $Page->IngredientCode4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IngredientCode5->Visible) { // IngredientCode5 ?>
        <td data-name="IngredientCode5" <?= $Page->IngredientCode5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IngredientCode5">
<span<?= $Page->IngredientCode5->viewAttributes() ?>>
<?= $Page->IngredientCode5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OrderType->Visible) { // OrderType ?>
        <td data-name="OrderType" <?= $Page->OrderType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_OrderType">
<span<?= $Page->OrderType->viewAttributes() ?>>
<?= $Page->OrderType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StockUOM->Visible) { // StockUOM ?>
        <td data-name="StockUOM" <?= $Page->StockUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockUOM">
<span<?= $Page->StockUOM->viewAttributes() ?>>
<?= $Page->StockUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PriceUOM->Visible) { // PriceUOM ?>
        <td data-name="PriceUOM" <?= $Page->PriceUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PriceUOM">
<span<?= $Page->PriceUOM->viewAttributes() ?>>
<?= $Page->PriceUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
        <td data-name="DefaultSaleUOM" <?= $Page->DefaultSaleUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultSaleUOM">
<span<?= $Page->DefaultSaleUOM->viewAttributes() ?>>
<?= $Page->DefaultSaleUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
        <td data-name="DefaultPurchaseUOM" <?= $Page->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultPurchaseUOM">
<span<?= $Page->DefaultPurchaseUOM->viewAttributes() ?>>
<?= $Page->DefaultPurchaseUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReportingUOM->Visible) { // ReportingUOM ?>
        <td data-name="ReportingUOM" <?= $Page->ReportingUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ReportingUOM">
<span<?= $Page->ReportingUOM->viewAttributes() ?>>
<?= $Page->ReportingUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
        <td data-name="LastPurchasedUOM" <?= $Page->LastPurchasedUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LastPurchasedUOM">
<span<?= $Page->LastPurchasedUOM->viewAttributes() ?>>
<?= $Page->LastPurchasedUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatmentCodes->Visible) { // TreatmentCodes ?>
        <td data-name="TreatmentCodes" <?= $Page->TreatmentCodes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TreatmentCodes">
<span<?= $Page->TreatmentCodes->viewAttributes() ?>>
<?= $Page->TreatmentCodes->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InsuranceType->Visible) { // InsuranceType ?>
        <td data-name="InsuranceType" <?= $Page->InsuranceType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_InsuranceType">
<span<?= $Page->InsuranceType->viewAttributes() ?>>
<?= $Page->InsuranceType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
        <td data-name="CoverageGroupCodes" <?= $Page->CoverageGroupCodes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_CoverageGroupCodes">
<span<?= $Page->CoverageGroupCodes->viewAttributes() ?>>
<?= $Page->CoverageGroupCodes->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MultipleUOM->Visible) { // MultipleUOM ?>
        <td data-name="MultipleUOM" <?= $Page->MultipleUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MultipleUOM">
<span<?= $Page->MultipleUOM->viewAttributes() ?>>
<?= $Page->MultipleUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalePriceComputation->Visible) { // SalePriceComputation ?>
        <td data-name="SalePriceComputation" <?= $Page->SalePriceComputation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SalePriceComputation">
<span<?= $Page->SalePriceComputation->viewAttributes() ?>>
<?= $Page->SalePriceComputation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StockCorrection->Visible) { // StockCorrection ?>
        <td data-name="StockCorrection" <?= $Page->StockCorrection->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_StockCorrection">
<span<?= $Page->StockCorrection->viewAttributes() ?>>
<?= $Page->StockCorrection->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LBTPercentage->Visible) { // LBTPercentage ?>
        <td data-name="LBTPercentage" <?= $Page->LBTPercentage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LBTPercentage">
<span<?= $Page->LBTPercentage->viewAttributes() ?>>
<?= $Page->LBTPercentage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalesCommission->Visible) { // SalesCommission ?>
        <td data-name="SalesCommission" <?= $Page->SalesCommission->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_SalesCommission">
<span<?= $Page->SalesCommission->viewAttributes() ?>>
<?= $Page->SalesCommission->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LockedStock->Visible) { // LockedStock ?>
        <td data-name="LockedStock" <?= $Page->LockedStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LockedStock">
<span<?= $Page->LockedStock->viewAttributes() ?>>
<?= $Page->LockedStock->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MinMaxUOM->Visible) { // MinMaxUOM ?>
        <td data-name="MinMaxUOM" <?= $Page->MinMaxUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MinMaxUOM">
<span<?= $Page->MinMaxUOM->viewAttributes() ?>>
<?= $Page->MinMaxUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
        <td data-name="ExpiryMfrDateFormat" <?= $Page->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ExpiryMfrDateFormat">
<span<?= $Page->ExpiryMfrDateFormat->viewAttributes() ?>>
<?= $Page->ExpiryMfrDateFormat->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductLifeTime->Visible) { // ProductLifeTime ?>
        <td data-name="ProductLifeTime" <?= $Page->ProductLifeTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ProductLifeTime">
<span<?= $Page->ProductLifeTime->viewAttributes() ?>>
<?= $Page->ProductLifeTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IsCombo->Visible) { // IsCombo ?>
        <td data-name="IsCombo" <?= $Page->IsCombo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsCombo">
<span<?= $Page->IsCombo->viewAttributes() ?>>
<?= $Page->IsCombo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ComboTypeCode->Visible) { // ComboTypeCode ?>
        <td data-name="ComboTypeCode" <?= $Page->ComboTypeCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ComboTypeCode">
<span<?= $Page->ComboTypeCode->viewAttributes() ?>>
<?= $Page->ComboTypeCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount6->Visible) { // AttributeCount6 ?>
        <td data-name="AttributeCount6" <?= $Page->AttributeCount6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount6">
<span<?= $Page->AttributeCount6->viewAttributes() ?>>
<?= $Page->AttributeCount6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount7->Visible) { // AttributeCount7 ?>
        <td data-name="AttributeCount7" <?= $Page->AttributeCount7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount7">
<span<?= $Page->AttributeCount7->viewAttributes() ?>>
<?= $Page->AttributeCount7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount8->Visible) { // AttributeCount8 ?>
        <td data-name="AttributeCount8" <?= $Page->AttributeCount8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount8">
<span<?= $Page->AttributeCount8->viewAttributes() ?>>
<?= $Page->AttributeCount8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount9->Visible) { // AttributeCount9 ?>
        <td data-name="AttributeCount9" <?= $Page->AttributeCount9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount9">
<span<?= $Page->AttributeCount9->viewAttributes() ?>>
<?= $Page->AttributeCount9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AttributeCount10->Visible) { // AttributeCount10 ?>
        <td data-name="AttributeCount10" <?= $Page->AttributeCount10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AttributeCount10">
<span<?= $Page->AttributeCount10->viewAttributes() ?>>
<?= $Page->AttributeCount10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LabourCharge->Visible) { // LabourCharge ?>
        <td data-name="LabourCharge" <?= $Page->LabourCharge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LabourCharge">
<span<?= $Page->LabourCharge->viewAttributes() ?>>
<?= $Page->LabourCharge->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
        <td data-name="AffectOtherCharge" <?= $Page->AffectOtherCharge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AffectOtherCharge">
<span<?= $Page->AffectOtherCharge->viewAttributes() ?>>
<?= $Page->AffectOtherCharge->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DosageInfo->Visible) { // DosageInfo ?>
        <td data-name="DosageInfo" <?= $Page->DosageInfo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DosageInfo">
<span<?= $Page->DosageInfo->viewAttributes() ?>>
<?= $Page->DosageInfo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DosageType->Visible) { // DosageType ?>
        <td data-name="DosageType" <?= $Page->DosageType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DosageType">
<span<?= $Page->DosageType->viewAttributes() ?>>
<?= $Page->DosageType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
        <td data-name="DefaultIndentUOM" <?= $Page->DefaultIndentUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_DefaultIndentUOM">
<span<?= $Page->DefaultIndentUOM->viewAttributes() ?>>
<?= $Page->DefaultIndentUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PromoTag->Visible) { // PromoTag ?>
        <td data-name="PromoTag" <?= $Page->PromoTag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PromoTag">
<span<?= $Page->PromoTag->viewAttributes() ?>>
<?= $Page->PromoTag->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
        <td data-name="BillLevelPromoTag" <?= $Page->BillLevelPromoTag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_BillLevelPromoTag">
<span<?= $Page->BillLevelPromoTag->viewAttributes() ?>>
<?= $Page->BillLevelPromoTag->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IsMRPProduct->Visible) { // IsMRPProduct ?>
        <td data-name="IsMRPProduct" <?= $Page->IsMRPProduct->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_IsMRPProduct">
<span<?= $Page->IsMRPProduct->viewAttributes() ?>>
<?= $Page->IsMRPProduct->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
        <td data-name="AlternateSaleUOM" <?= $Page->AlternateSaleUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AlternateSaleUOM">
<span<?= $Page->AlternateSaleUOM->viewAttributes() ?>>
<?= $Page->AlternateSaleUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeUOM->Visible) { // FreeUOM ?>
        <td data-name="FreeUOM" <?= $Page->FreeUOM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FreeUOM">
<span<?= $Page->FreeUOM->viewAttributes() ?>>
<?= $Page->FreeUOM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarketedCode->Visible) { // MarketedCode ?>
        <td data-name="MarketedCode" <?= $Page->MarketedCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MarketedCode">
<span<?= $Page->MarketedCode->viewAttributes() ?>>
<?= $Page->MarketedCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
        <td data-name="MinimumSalePrice" <?= $Page->MinimumSalePrice->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_MinimumSalePrice">
<span<?= $Page->MinimumSalePrice->viewAttributes() ?>>
<?= $Page->MinimumSalePrice->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRate1->Visible) { // PRate1 ?>
        <td data-name="PRate1" <?= $Page->PRate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PRate1">
<span<?= $Page->PRate1->viewAttributes() ?>>
<?= $Page->PRate1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRate2->Visible) { // PRate2 ?>
        <td data-name="PRate2" <?= $Page->PRate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_PRate2">
<span<?= $Page->PRate2->viewAttributes() ?>>
<?= $Page->PRate2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LPItemCost->Visible) { // LPItemCost ?>
        <td data-name="LPItemCost" <?= $Page->LPItemCost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_LPItemCost">
<span<?= $Page->LPItemCost->viewAttributes() ?>>
<?= $Page->LPItemCost->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FixedItemCost->Visible) { // FixedItemCost ?>
        <td data-name="FixedItemCost" <?= $Page->FixedItemCost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_FixedItemCost">
<span<?= $Page->FixedItemCost->viewAttributes() ?>>
<?= $Page->FixedItemCost->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSNId->Visible) { // HSNId ?>
        <td data-name="HSNId" <?= $Page->HSNId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_HSNId">
<span<?= $Page->HSNId->viewAttributes() ?>>
<?= $Page->HSNId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TaxInclusive->Visible) { // TaxInclusive ?>
        <td data-name="TaxInclusive" <?= $Page->TaxInclusive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_TaxInclusive">
<span<?= $Page->TaxInclusive->viewAttributes() ?>>
<?= $Page->TaxInclusive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
        <td data-name="EligibleforWarranty" <?= $Page->EligibleforWarranty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_EligibleforWarranty">
<span<?= $Page->EligibleforWarranty->viewAttributes() ?>>
<?= $Page->EligibleforWarranty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
        <td data-name="NoofMonthsWarranty" <?= $Page->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_NoofMonthsWarranty">
<span<?= $Page->NoofMonthsWarranty->viewAttributes() ?>>
<?= $Page->NoofMonthsWarranty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
        <td data-name="ComputeTaxonCost" <?= $Page->ComputeTaxonCost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_ComputeTaxonCost">
<span<?= $Page->ComputeTaxonCost->viewAttributes() ?>>
<?= $Page->ComputeTaxonCost->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
        <td data-name="HasEmptyBottleTrack" <?= $Page->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_HasEmptyBottleTrack">
<span<?= $Page->HasEmptyBottleTrack->viewAttributes() ?>>
<?= $Page->HasEmptyBottleTrack->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
        <td data-name="EmptyBottleReferenceCode" <?= $Page->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_EmptyBottleReferenceCode">
<span<?= $Page->EmptyBottleReferenceCode->viewAttributes() ?>>
<?= $Page->EmptyBottleReferenceCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
        <td data-name="AdditionalCESSAmount" <?= $Page->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_AdditionalCESSAmount">
<span<?= $Page->AdditionalCESSAmount->viewAttributes() ?>>
<?= $Page->AdditionalCESSAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
        <td data-name="EmptyBottleRate" <?= $Page->EmptyBottleRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_products_EmptyBottleRate">
<span<?= $Page->EmptyBottleRate->viewAttributes() ?>>
<?= $Page->EmptyBottleRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
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
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_pharmacy_products",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

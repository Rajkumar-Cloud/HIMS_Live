<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$pharmacy_products_delete = new pharmacy_products_delete();

// Run the page
$pharmacy_products_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_products_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_productsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_productsdelete = currentForm = new ew.Form("fpharmacy_productsdelete", "delete");
	loadjs.done("fpharmacy_productsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_products_delete->showPageHeader(); ?>
<?php
$pharmacy_products_delete->showMessage();
?>
<form name="fpharmacy_productsdelete" id="fpharmacy_productsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_products_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_products_delete->ProductCode->Visible) { // ProductCode ?>
		<th class="<?php echo $pharmacy_products_delete->ProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode"><?php echo $pharmacy_products_delete->ProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductName->Visible) { // ProductName ?>
		<th class="<?php echo $pharmacy_products_delete->ProductName->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductName" class="pharmacy_products_ProductName"><?php echo $pharmacy_products_delete->ProductName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DivisionCode->Visible) { // DivisionCode ?>
		<th class="<?php echo $pharmacy_products_delete->DivisionCode->headerCellClass() ?>"><span id="elh_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode"><?php echo $pharmacy_products_delete->DivisionCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ManufacturerCode->Visible) { // ManufacturerCode ?>
		<th class="<?php echo $pharmacy_products_delete->ManufacturerCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode"><?php echo $pharmacy_products_delete->ManufacturerCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SupplierCode->Visible) { // SupplierCode ?>
		<th class="<?php echo $pharmacy_products_delete->SupplierCode->headerCellClass() ?>"><span id="elh_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode"><?php echo $pharmacy_products_delete->SupplierCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
		<th class="<?php echo $pharmacy_products_delete->AlternateSupplierCodes->headerCellClass() ?>"><span id="elh_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes"><?php echo $pharmacy_products_delete->AlternateSupplierCodes->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AlternateProductCode->Visible) { // AlternateProductCode ?>
		<th class="<?php echo $pharmacy_products_delete->AlternateProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode"><?php echo $pharmacy_products_delete->AlternateProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->UniversalProductCode->Visible) { // UniversalProductCode ?>
		<th class="<?php echo $pharmacy_products_delete->UniversalProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode"><?php echo $pharmacy_products_delete->UniversalProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BookProductCode->Visible) { // BookProductCode ?>
		<th class="<?php echo $pharmacy_products_delete->BookProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode"><?php echo $pharmacy_products_delete->BookProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->OldCode->Visible) { // OldCode ?>
		<th class="<?php echo $pharmacy_products_delete->OldCode->headerCellClass() ?>"><span id="elh_pharmacy_products_OldCode" class="pharmacy_products_OldCode"><?php echo $pharmacy_products_delete->OldCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProtectedProducts->Visible) { // ProtectedProducts ?>
		<th class="<?php echo $pharmacy_products_delete->ProtectedProducts->headerCellClass() ?>"><span id="elh_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts"><?php echo $pharmacy_products_delete->ProtectedProducts->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductFullName->Visible) { // ProductFullName ?>
		<th class="<?php echo $pharmacy_products_delete->ProductFullName->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName"><?php echo $pharmacy_products_delete->ProductFullName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
		<th class="<?php echo $pharmacy_products_delete->UnitOfMeasure->headerCellClass() ?>"><span id="elh_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure"><?php echo $pharmacy_products_delete->UnitOfMeasure->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->UnitDescription->Visible) { // UnitDescription ?>
		<th class="<?php echo $pharmacy_products_delete->UnitDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription"><?php echo $pharmacy_products_delete->UnitDescription->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BulkDescription->Visible) { // BulkDescription ?>
		<th class="<?php echo $pharmacy_products_delete->BulkDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription"><?php echo $pharmacy_products_delete->BulkDescription->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BarCodeDescription->Visible) { // BarCodeDescription ?>
		<th class="<?php echo $pharmacy_products_delete->BarCodeDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription"><?php echo $pharmacy_products_delete->BarCodeDescription->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PackageInformation->Visible) { // PackageInformation ?>
		<th class="<?php echo $pharmacy_products_delete->PackageInformation->headerCellClass() ?>"><span id="elh_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation"><?php echo $pharmacy_products_delete->PackageInformation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PackageId->Visible) { // PackageId ?>
		<th class="<?php echo $pharmacy_products_delete->PackageId->headerCellClass() ?>"><span id="elh_pharmacy_products_PackageId" class="pharmacy_products_PackageId"><?php echo $pharmacy_products_delete->PackageId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Weight->Visible) { // Weight ?>
		<th class="<?php echo $pharmacy_products_delete->Weight->headerCellClass() ?>"><span id="elh_pharmacy_products_Weight" class="pharmacy_products_Weight"><?php echo $pharmacy_products_delete->Weight->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowFractions->Visible) { // AllowFractions ?>
		<th class="<?php echo $pharmacy_products_delete->AllowFractions->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions"><?php echo $pharmacy_products_delete->AllowFractions->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
		<th class="<?php echo $pharmacy_products_delete->MinimumStockLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel"><?php echo $pharmacy_products_delete->MinimumStockLevel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
		<th class="<?php echo $pharmacy_products_delete->MaximumStockLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel"><?php echo $pharmacy_products_delete->MaximumStockLevel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ReorderLevel->Visible) { // ReorderLevel ?>
		<th class="<?php echo $pharmacy_products_delete->ReorderLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel"><?php echo $pharmacy_products_delete->ReorderLevel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MinMaxRatio->Visible) { // MinMaxRatio ?>
		<th class="<?php echo $pharmacy_products_delete->MinMaxRatio->headerCellClass() ?>"><span id="elh_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio"><?php echo $pharmacy_products_delete->MinMaxRatio->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
		<th class="<?php echo $pharmacy_products_delete->AutoMinMaxRatio->headerCellClass() ?>"><span id="elh_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio"><?php echo $pharmacy_products_delete->AutoMinMaxRatio->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ScheduleCode->Visible) { // ScheduleCode ?>
		<th class="<?php echo $pharmacy_products_delete->ScheduleCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode"><?php echo $pharmacy_products_delete->ScheduleCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->RopRatio->Visible) { // RopRatio ?>
		<th class="<?php echo $pharmacy_products_delete->RopRatio->headerCellClass() ?>"><span id="elh_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio"><?php echo $pharmacy_products_delete->RopRatio->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MRP->Visible) { // MRP ?>
		<th class="<?php echo $pharmacy_products_delete->MRP->headerCellClass() ?>"><span id="elh_pharmacy_products_MRP" class="pharmacy_products_MRP"><?php echo $pharmacy_products_delete->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PurchasePrice->Visible) { // PurchasePrice ?>
		<th class="<?php echo $pharmacy_products_delete->PurchasePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice"><?php echo $pharmacy_products_delete->PurchasePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PurchaseUnit->Visible) { // PurchaseUnit ?>
		<th class="<?php echo $pharmacy_products_delete->PurchaseUnit->headerCellClass() ?>"><span id="elh_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit"><?php echo $pharmacy_products_delete->PurchaseUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
		<th class="<?php echo $pharmacy_products_delete->PurchaseTaxCode->headerCellClass() ?>"><span id="elh_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode"><?php echo $pharmacy_products_delete->PurchaseTaxCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowDirectInward->Visible) { // AllowDirectInward ?>
		<th class="<?php echo $pharmacy_products_delete->AllowDirectInward->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward"><?php echo $pharmacy_products_delete->AllowDirectInward->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SalePrice->Visible) { // SalePrice ?>
		<th class="<?php echo $pharmacy_products_delete->SalePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice"><?php echo $pharmacy_products_delete->SalePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SaleUnit->Visible) { // SaleUnit ?>
		<th class="<?php echo $pharmacy_products_delete->SaleUnit->headerCellClass() ?>"><span id="elh_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit"><?php echo $pharmacy_products_delete->SaleUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SalesTaxCode->Visible) { // SalesTaxCode ?>
		<th class="<?php echo $pharmacy_products_delete->SalesTaxCode->headerCellClass() ?>"><span id="elh_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode"><?php echo $pharmacy_products_delete->SalesTaxCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->StockReceived->Visible) { // StockReceived ?>
		<th class="<?php echo $pharmacy_products_delete->StockReceived->headerCellClass() ?>"><span id="elh_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived"><?php echo $pharmacy_products_delete->StockReceived->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TotalStock->Visible) { // TotalStock ?>
		<th class="<?php echo $pharmacy_products_delete->TotalStock->headerCellClass() ?>"><span id="elh_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock"><?php echo $pharmacy_products_delete->TotalStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->StockType->Visible) { // StockType ?>
		<th class="<?php echo $pharmacy_products_delete->StockType->headerCellClass() ?>"><span id="elh_pharmacy_products_StockType" class="pharmacy_products_StockType"><?php echo $pharmacy_products_delete->StockType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->StockCheckDate->Visible) { // StockCheckDate ?>
		<th class="<?php echo $pharmacy_products_delete->StockCheckDate->headerCellClass() ?>"><span id="elh_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate"><?php echo $pharmacy_products_delete->StockCheckDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
		<th class="<?php echo $pharmacy_products_delete->StockAdjustmentDate->headerCellClass() ?>"><span id="elh_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate"><?php echo $pharmacy_products_delete->StockAdjustmentDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $pharmacy_products_delete->Remarks->headerCellClass() ?>"><span id="elh_pharmacy_products_Remarks" class="pharmacy_products_Remarks"><?php echo $pharmacy_products_delete->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CostCentre->Visible) { // CostCentre ?>
		<th class="<?php echo $pharmacy_products_delete->CostCentre->headerCellClass() ?>"><span id="elh_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre"><?php echo $pharmacy_products_delete->CostCentre->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductType->Visible) { // ProductType ?>
		<th class="<?php echo $pharmacy_products_delete->ProductType->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductType" class="pharmacy_products_ProductType"><?php echo $pharmacy_products_delete->ProductType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TaxAmount->Visible) { // TaxAmount ?>
		<th class="<?php echo $pharmacy_products_delete->TaxAmount->headerCellClass() ?>"><span id="elh_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount"><?php echo $pharmacy_products_delete->TaxAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TaxId->Visible) { // TaxId ?>
		<th class="<?php echo $pharmacy_products_delete->TaxId->headerCellClass() ?>"><span id="elh_pharmacy_products_TaxId" class="pharmacy_products_TaxId"><?php echo $pharmacy_products_delete->TaxId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
		<th class="<?php echo $pharmacy_products_delete->ResaleTaxApplicable->headerCellClass() ?>"><span id="elh_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable"><?php echo $pharmacy_products_delete->ResaleTaxApplicable->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CstOtherTax->Visible) { // CstOtherTax ?>
		<th class="<?php echo $pharmacy_products_delete->CstOtherTax->headerCellClass() ?>"><span id="elh_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax"><?php echo $pharmacy_products_delete->CstOtherTax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TotalTax->Visible) { // TotalTax ?>
		<th class="<?php echo $pharmacy_products_delete->TotalTax->headerCellClass() ?>"><span id="elh_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax"><?php echo $pharmacy_products_delete->TotalTax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ItemCost->Visible) { // ItemCost ?>
		<th class="<?php echo $pharmacy_products_delete->ItemCost->headerCellClass() ?>"><span id="elh_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost"><?php echo $pharmacy_products_delete->ItemCost->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ExpiryDate->Visible) { // ExpiryDate ?>
		<th class="<?php echo $pharmacy_products_delete->ExpiryDate->headerCellClass() ?>"><span id="elh_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate"><?php echo $pharmacy_products_delete->ExpiryDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BatchDescription->Visible) { // BatchDescription ?>
		<th class="<?php echo $pharmacy_products_delete->BatchDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription"><?php echo $pharmacy_products_delete->BatchDescription->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeScheme->Visible) { // FreeScheme ?>
		<th class="<?php echo $pharmacy_products_delete->FreeScheme->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme"><?php echo $pharmacy_products_delete->FreeScheme->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
		<th class="<?php echo $pharmacy_products_delete->CashDiscountEligibility->headerCellClass() ?>"><span id="elh_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility"><?php echo $pharmacy_products_delete->CashDiscountEligibility->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
		<th class="<?php echo $pharmacy_products_delete->DiscountPerAllowInBill->headerCellClass() ?>"><span id="elh_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill"><?php echo $pharmacy_products_delete->DiscountPerAllowInBill->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Discount->Visible) { // Discount ?>
		<th class="<?php echo $pharmacy_products_delete->Discount->headerCellClass() ?>"><span id="elh_pharmacy_products_Discount" class="pharmacy_products_Discount"><?php echo $pharmacy_products_delete->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TotalAmount->Visible) { // TotalAmount ?>
		<th class="<?php echo $pharmacy_products_delete->TotalAmount->headerCellClass() ?>"><span id="elh_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount"><?php echo $pharmacy_products_delete->TotalAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->StandardMargin->Visible) { // StandardMargin ?>
		<th class="<?php echo $pharmacy_products_delete->StandardMargin->headerCellClass() ?>"><span id="elh_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin"><?php echo $pharmacy_products_delete->StandardMargin->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Margin->Visible) { // Margin ?>
		<th class="<?php echo $pharmacy_products_delete->Margin->headerCellClass() ?>"><span id="elh_pharmacy_products_Margin" class="pharmacy_products_Margin"><?php echo $pharmacy_products_delete->Margin->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MarginId->Visible) { // MarginId ?>
		<th class="<?php echo $pharmacy_products_delete->MarginId->headerCellClass() ?>"><span id="elh_pharmacy_products_MarginId" class="pharmacy_products_MarginId"><?php echo $pharmacy_products_delete->MarginId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ExpectedMargin->Visible) { // ExpectedMargin ?>
		<th class="<?php echo $pharmacy_products_delete->ExpectedMargin->headerCellClass() ?>"><span id="elh_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin"><?php echo $pharmacy_products_delete->ExpectedMargin->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
		<th class="<?php echo $pharmacy_products_delete->SurchargeBeforeTax->headerCellClass() ?>"><span id="elh_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax"><?php echo $pharmacy_products_delete->SurchargeBeforeTax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
		<th class="<?php echo $pharmacy_products_delete->SurchargeAfterTax->headerCellClass() ?>"><span id="elh_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax"><?php echo $pharmacy_products_delete->SurchargeAfterTax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TempOrderNo->Visible) { // TempOrderNo ?>
		<th class="<?php echo $pharmacy_products_delete->TempOrderNo->headerCellClass() ?>"><span id="elh_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo"><?php echo $pharmacy_products_delete->TempOrderNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TempOrderDate->Visible) { // TempOrderDate ?>
		<th class="<?php echo $pharmacy_products_delete->TempOrderDate->headerCellClass() ?>"><span id="elh_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate"><?php echo $pharmacy_products_delete->TempOrderDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderUnit->Visible) { // OrderUnit ?>
		<th class="<?php echo $pharmacy_products_delete->OrderUnit->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit"><?php echo $pharmacy_products_delete->OrderUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderQuantity->Visible) { // OrderQuantity ?>
		<th class="<?php echo $pharmacy_products_delete->OrderQuantity->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity"><?php echo $pharmacy_products_delete->OrderQuantity->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkForOrder->Visible) { // MarkForOrder ?>
		<th class="<?php echo $pharmacy_products_delete->MarkForOrder->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder"><?php echo $pharmacy_products_delete->MarkForOrder->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderAllId->Visible) { // OrderAllId ?>
		<th class="<?php echo $pharmacy_products_delete->OrderAllId->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId"><?php echo $pharmacy_products_delete->OrderAllId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
		<th class="<?php echo $pharmacy_products_delete->CalculateOrderQty->headerCellClass() ?>"><span id="elh_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty"><?php echo $pharmacy_products_delete->CalculateOrderQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SubLocation->Visible) { // SubLocation ?>
		<th class="<?php echo $pharmacy_products_delete->SubLocation->headerCellClass() ?>"><span id="elh_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation"><?php echo $pharmacy_products_delete->SubLocation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CategoryCode->Visible) { // CategoryCode ?>
		<th class="<?php echo $pharmacy_products_delete->CategoryCode->headerCellClass() ?>"><span id="elh_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode"><?php echo $pharmacy_products_delete->CategoryCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SubCategory->Visible) { // SubCategory ?>
		<th class="<?php echo $pharmacy_products_delete->SubCategory->headerCellClass() ?>"><span id="elh_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory"><?php echo $pharmacy_products_delete->SubCategory->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
		<th class="<?php echo $pharmacy_products_delete->FlexCategoryCode->headerCellClass() ?>"><span id="elh_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode"><?php echo $pharmacy_products_delete->FlexCategoryCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ABCSaleQty->Visible) { // ABCSaleQty ?>
		<th class="<?php echo $pharmacy_products_delete->ABCSaleQty->headerCellClass() ?>"><span id="elh_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty"><?php echo $pharmacy_products_delete->ABCSaleQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ABCSaleValue->Visible) { // ABCSaleValue ?>
		<th class="<?php echo $pharmacy_products_delete->ABCSaleValue->headerCellClass() ?>"><span id="elh_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue"><?php echo $pharmacy_products_delete->ABCSaleValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ConvertionFactor->Visible) { // ConvertionFactor ?>
		<th class="<?php echo $pharmacy_products_delete->ConvertionFactor->headerCellClass() ?>"><span id="elh_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor"><?php echo $pharmacy_products_delete->ConvertionFactor->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
		<th class="<?php echo $pharmacy_products_delete->ConvertionUnitDesc->headerCellClass() ?>"><span id="elh_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc"><?php echo $pharmacy_products_delete->ConvertionUnitDesc->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TransactionId->Visible) { // TransactionId ?>
		<th class="<?php echo $pharmacy_products_delete->TransactionId->headerCellClass() ?>"><span id="elh_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId"><?php echo $pharmacy_products_delete->TransactionId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SoldProductId->Visible) { // SoldProductId ?>
		<th class="<?php echo $pharmacy_products_delete->SoldProductId->headerCellClass() ?>"><span id="elh_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId"><?php echo $pharmacy_products_delete->SoldProductId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->WantedBookId->Visible) { // WantedBookId ?>
		<th class="<?php echo $pharmacy_products_delete->WantedBookId->headerCellClass() ?>"><span id="elh_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId"><?php echo $pharmacy_products_delete->WantedBookId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AllId->Visible) { // AllId ?>
		<th class="<?php echo $pharmacy_products_delete->AllId->headerCellClass() ?>"><span id="elh_pharmacy_products_AllId" class="pharmacy_products_AllId"><?php echo $pharmacy_products_delete->AllId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
		<th class="<?php echo $pharmacy_products_delete->BatchAndExpiryCompulsory->headerCellClass() ?>"><span id="elh_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory"><?php echo $pharmacy_products_delete->BatchAndExpiryCompulsory->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
		<th class="<?php echo $pharmacy_products_delete->BatchStockForWantedBook->headerCellClass() ?>"><span id="elh_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook"><?php echo $pharmacy_products_delete->BatchStockForWantedBook->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
		<th class="<?php echo $pharmacy_products_delete->UnitBasedBilling->headerCellClass() ?>"><span id="elh_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling"><?php echo $pharmacy_products_delete->UnitBasedBilling->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
		<th class="<?php echo $pharmacy_products_delete->DoNotCheckStock->headerCellClass() ?>"><span id="elh_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock"><?php echo $pharmacy_products_delete->DoNotCheckStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptRate->Visible) { // AcceptRate ?>
		<th class="<?php echo $pharmacy_products_delete->AcceptRate->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate"><?php echo $pharmacy_products_delete->AcceptRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PriceLevel->Visible) { // PriceLevel ?>
		<th class="<?php echo $pharmacy_products_delete->PriceLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel"><?php echo $pharmacy_products_delete->PriceLevel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->LastQuotePrice->Visible) { // LastQuotePrice ?>
		<th class="<?php echo $pharmacy_products_delete->LastQuotePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice"><?php echo $pharmacy_products_delete->LastQuotePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PriceChange->Visible) { // PriceChange ?>
		<th class="<?php echo $pharmacy_products_delete->PriceChange->headerCellClass() ?>"><span id="elh_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange"><?php echo $pharmacy_products_delete->PriceChange->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CommodityCode->Visible) { // CommodityCode ?>
		<th class="<?php echo $pharmacy_products_delete->CommodityCode->headerCellClass() ?>"><span id="elh_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode"><?php echo $pharmacy_products_delete->CommodityCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->InstitutePrice->Visible) { // InstitutePrice ?>
		<th class="<?php echo $pharmacy_products_delete->InstitutePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice"><?php echo $pharmacy_products_delete->InstitutePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
		<th class="<?php echo $pharmacy_products_delete->CtrlOrDCtrlProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct"><?php echo $pharmacy_products_delete->CtrlOrDCtrlProduct->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ImportedDate->Visible) { // ImportedDate ?>
		<th class="<?php echo $pharmacy_products_delete->ImportedDate->headerCellClass() ?>"><span id="elh_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate"><?php echo $pharmacy_products_delete->ImportedDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IsImported->Visible) { // IsImported ?>
		<th class="<?php echo $pharmacy_products_delete->IsImported->headerCellClass() ?>"><span id="elh_pharmacy_products_IsImported" class="pharmacy_products_IsImported"><?php echo $pharmacy_products_delete->IsImported->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FileName->Visible) { // FileName ?>
		<th class="<?php echo $pharmacy_products_delete->FileName->headerCellClass() ?>"><span id="elh_pharmacy_products_FileName" class="pharmacy_products_FileName"><?php echo $pharmacy_products_delete->FileName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->GodownNumber->Visible) { // GodownNumber ?>
		<th class="<?php echo $pharmacy_products_delete->GodownNumber->headerCellClass() ?>"><span id="elh_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber"><?php echo $pharmacy_products_delete->GodownNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CreationDate->Visible) { // CreationDate ?>
		<th class="<?php echo $pharmacy_products_delete->CreationDate->headerCellClass() ?>"><span id="elh_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate"><?php echo $pharmacy_products_delete->CreationDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CreatedbyUser->Visible) { // CreatedbyUser ?>
		<th class="<?php echo $pharmacy_products_delete->CreatedbyUser->headerCellClass() ?>"><span id="elh_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser"><?php echo $pharmacy_products_delete->CreatedbyUser->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ModifiedDate->Visible) { // ModifiedDate ?>
		<th class="<?php echo $pharmacy_products_delete->ModifiedDate->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate"><?php echo $pharmacy_products_delete->ModifiedDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
		<th class="<?php echo $pharmacy_products_delete->ModifiedbyUser->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser"><?php echo $pharmacy_products_delete->ModifiedbyUser->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->isActive->Visible) { // isActive ?>
		<th class="<?php echo $pharmacy_products_delete->isActive->headerCellClass() ?>"><span id="elh_pharmacy_products_isActive" class="pharmacy_products_isActive"><?php echo $pharmacy_products_delete->isActive->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
		<th class="<?php echo $pharmacy_products_delete->AllowExpiryClaim->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim"><?php echo $pharmacy_products_delete->AllowExpiryClaim->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BrandCode->Visible) { // BrandCode ?>
		<th class="<?php echo $pharmacy_products_delete->BrandCode->headerCellClass() ?>"><span id="elh_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode"><?php echo $pharmacy_products_delete->BrandCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
		<th class="<?php echo $pharmacy_products_delete->FreeSchemeBasedon->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon"><?php echo $pharmacy_products_delete->FreeSchemeBasedon->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
		<th class="<?php echo $pharmacy_products_delete->DoNotCheckCostInBill->headerCellClass() ?>"><span id="elh_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill"><?php echo $pharmacy_products_delete->DoNotCheckCostInBill->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductGroupCode->Visible) { // ProductGroupCode ?>
		<th class="<?php echo $pharmacy_products_delete->ProductGroupCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode"><?php echo $pharmacy_products_delete->ProductGroupCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
		<th class="<?php echo $pharmacy_products_delete->ProductStrengthCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode"><?php echo $pharmacy_products_delete->ProductStrengthCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PackingCode->Visible) { // PackingCode ?>
		<th class="<?php echo $pharmacy_products_delete->PackingCode->headerCellClass() ?>"><span id="elh_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode"><?php echo $pharmacy_products_delete->PackingCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ComputedMinStock->Visible) { // ComputedMinStock ?>
		<th class="<?php echo $pharmacy_products_delete->ComputedMinStock->headerCellClass() ?>"><span id="elh_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock"><?php echo $pharmacy_products_delete->ComputedMinStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
		<th class="<?php echo $pharmacy_products_delete->ComputedMaxStock->headerCellClass() ?>"><span id="elh_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock"><?php echo $pharmacy_products_delete->ComputedMaxStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductRemark->Visible) { // ProductRemark ?>
		<th class="<?php echo $pharmacy_products_delete->ProductRemark->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark"><?php echo $pharmacy_products_delete->ProductRemark->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductDrugCode->Visible) { // ProductDrugCode ?>
		<th class="<?php echo $pharmacy_products_delete->ProductDrugCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode"><?php echo $pharmacy_products_delete->ProductDrugCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
		<th class="<?php echo $pharmacy_products_delete->IsMatrixProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct"><?php echo $pharmacy_products_delete->IsMatrixProduct->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount1->Visible) { // AttributeCount1 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount1->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1"><?php echo $pharmacy_products_delete->AttributeCount1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount2->Visible) { // AttributeCount2 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount2->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2"><?php echo $pharmacy_products_delete->AttributeCount2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount3->Visible) { // AttributeCount3 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount3->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3"><?php echo $pharmacy_products_delete->AttributeCount3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount4->Visible) { // AttributeCount4 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount4->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4"><?php echo $pharmacy_products_delete->AttributeCount4->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount5->Visible) { // AttributeCount5 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount5->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5"><?php echo $pharmacy_products_delete->AttributeCount5->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
		<th class="<?php echo $pharmacy_products_delete->DefaultDiscountPercentage->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage"><?php echo $pharmacy_products_delete->DefaultDiscountPercentage->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
		<th class="<?php echo $pharmacy_products_delete->DonotPrintBarcode->headerCellClass() ?>"><span id="elh_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode"><?php echo $pharmacy_products_delete->DonotPrintBarcode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
		<th class="<?php echo $pharmacy_products_delete->ProductLevelDiscount->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount"><?php echo $pharmacy_products_delete->ProductLevelDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Markup->Visible) { // Markup ?>
		<th class="<?php echo $pharmacy_products_delete->Markup->headerCellClass() ?>"><span id="elh_pharmacy_products_Markup" class="pharmacy_products_Markup"><?php echo $pharmacy_products_delete->Markup->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkDown->Visible) { // MarkDown ?>
		<th class="<?php echo $pharmacy_products_delete->MarkDown->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown"><?php echo $pharmacy_products_delete->MarkDown->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
		<th class="<?php echo $pharmacy_products_delete->ReworkSalePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice"><?php echo $pharmacy_products_delete->ReworkSalePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MultipleInput->Visible) { // MultipleInput ?>
		<th class="<?php echo $pharmacy_products_delete->MultipleInput->headerCellClass() ?>"><span id="elh_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput"><?php echo $pharmacy_products_delete->MultipleInput->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->LpPackageInformation->Visible) { // LpPackageInformation ?>
		<th class="<?php echo $pharmacy_products_delete->LpPackageInformation->headerCellClass() ?>"><span id="elh_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation"><?php echo $pharmacy_products_delete->LpPackageInformation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
		<th class="<?php echo $pharmacy_products_delete->AllowNegativeStock->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock"><?php echo $pharmacy_products_delete->AllowNegativeStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderDate->Visible) { // OrderDate ?>
		<th class="<?php echo $pharmacy_products_delete->OrderDate->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate"><?php echo $pharmacy_products_delete->OrderDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderTime->Visible) { // OrderTime ?>
		<th class="<?php echo $pharmacy_products_delete->OrderTime->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime"><?php echo $pharmacy_products_delete->OrderTime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->RateGroupCode->Visible) { // RateGroupCode ?>
		<th class="<?php echo $pharmacy_products_delete->RateGroupCode->headerCellClass() ?>"><span id="elh_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode"><?php echo $pharmacy_products_delete->RateGroupCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
		<th class="<?php echo $pharmacy_products_delete->ConversionCaseLot->headerCellClass() ?>"><span id="elh_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot"><?php echo $pharmacy_products_delete->ConversionCaseLot->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ShippingLot->Visible) { // ShippingLot ?>
		<th class="<?php echo $pharmacy_products_delete->ShippingLot->headerCellClass() ?>"><span id="elh_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot"><?php echo $pharmacy_products_delete->ShippingLot->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
		<th class="<?php echo $pharmacy_products_delete->AllowExpiryReplacement->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement"><?php echo $pharmacy_products_delete->AllowExpiryReplacement->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
		<th class="<?php echo $pharmacy_products_delete->NoOfMonthExpiryAllowed->headerCellClass() ?>"><span id="elh_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed"><?php echo $pharmacy_products_delete->NoOfMonthExpiryAllowed->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
		<th class="<?php echo $pharmacy_products_delete->ProductDiscountEligibility->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility"><?php echo $pharmacy_products_delete->ProductDiscountEligibility->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
		<th class="<?php echo $pharmacy_products_delete->ScheduleTypeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode"><?php echo $pharmacy_products_delete->ScheduleTypeCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
		<th class="<?php echo $pharmacy_products_delete->AIOCDProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode"><?php echo $pharmacy_products_delete->AIOCDProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeQuantity->Visible) { // FreeQuantity ?>
		<th class="<?php echo $pharmacy_products_delete->FreeQuantity->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity"><?php echo $pharmacy_products_delete->FreeQuantity->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DiscountType->Visible) { // DiscountType ?>
		<th class="<?php echo $pharmacy_products_delete->DiscountType->headerCellClass() ?>"><span id="elh_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType"><?php echo $pharmacy_products_delete->DiscountType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DiscountValue->Visible) { // DiscountValue ?>
		<th class="<?php echo $pharmacy_products_delete->DiscountValue->headerCellClass() ?>"><span id="elh_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue"><?php echo $pharmacy_products_delete->DiscountValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
		<th class="<?php echo $pharmacy_products_delete->HasProductOrderAttribute->headerCellClass() ?>"><span id="elh_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute"><?php echo $pharmacy_products_delete->HasProductOrderAttribute->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FirstPODate->Visible) { // FirstPODate ?>
		<th class="<?php echo $pharmacy_products_delete->FirstPODate->headerCellClass() ?>"><span id="elh_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate"><?php echo $pharmacy_products_delete->FirstPODate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
		<th class="<?php echo $pharmacy_products_delete->SaleprcieAndMrpCalcPercent->headerCellClass() ?>"><span id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent"><?php echo $pharmacy_products_delete->SaleprcieAndMrpCalcPercent->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
		<th class="<?php echo $pharmacy_products_delete->IsGiftVoucherProducts->headerCellClass() ?>"><span id="elh_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts"><?php echo $pharmacy_products_delete->IsGiftVoucherProducts->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
		<th class="<?php echo $pharmacy_products_delete->AcceptRange4SerialNumber->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber"><?php echo $pharmacy_products_delete->AcceptRange4SerialNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
		<th class="<?php echo $pharmacy_products_delete->GiftVoucherDenomination->headerCellClass() ?>"><span id="elh_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination"><?php echo $pharmacy_products_delete->GiftVoucherDenomination->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Subclasscode->Visible) { // Subclasscode ?>
		<th class="<?php echo $pharmacy_products_delete->Subclasscode->headerCellClass() ?>"><span id="elh_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode"><?php echo $pharmacy_products_delete->Subclasscode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
		<th class="<?php echo $pharmacy_products_delete->BarCodeFromWeighingMachine->headerCellClass() ?>"><span id="elh_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine"><?php echo $pharmacy_products_delete->BarCodeFromWeighingMachine->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
		<th class="<?php echo $pharmacy_products_delete->CheckCostInReturn->headerCellClass() ?>"><span id="elh_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn"><?php echo $pharmacy_products_delete->CheckCostInReturn->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
		<th class="<?php echo $pharmacy_products_delete->FrequentSaleProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct"><?php echo $pharmacy_products_delete->FrequentSaleProduct->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->RateType->Visible) { // RateType ?>
		<th class="<?php echo $pharmacy_products_delete->RateType->headerCellClass() ?>"><span id="elh_pharmacy_products_RateType" class="pharmacy_products_RateType"><?php echo $pharmacy_products_delete->RateType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TouchscreenName->Visible) { // TouchscreenName ?>
		<th class="<?php echo $pharmacy_products_delete->TouchscreenName->headerCellClass() ?>"><span id="elh_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName"><?php echo $pharmacy_products_delete->TouchscreenName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeType->Visible) { // FreeType ?>
		<th class="<?php echo $pharmacy_products_delete->FreeType->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeType" class="pharmacy_products_FreeType"><?php echo $pharmacy_products_delete->FreeType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
		<th class="<?php echo $pharmacy_products_delete->LooseQtyasNewBatch->headerCellClass() ?>"><span id="elh_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch"><?php echo $pharmacy_products_delete->LooseQtyasNewBatch->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
		<th class="<?php echo $pharmacy_products_delete->AllowSlabBilling->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling"><?php echo $pharmacy_products_delete->AllowSlabBilling->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
		<th class="<?php echo $pharmacy_products_delete->ProductTypeForProduction->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction"><?php echo $pharmacy_products_delete->ProductTypeForProduction->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->RecipeCode->Visible) { // RecipeCode ?>
		<th class="<?php echo $pharmacy_products_delete->RecipeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode"><?php echo $pharmacy_products_delete->RecipeCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultUnitType->Visible) { // DefaultUnitType ?>
		<th class="<?php echo $pharmacy_products_delete->DefaultUnitType->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType"><?php echo $pharmacy_products_delete->DefaultUnitType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PIstatus->Visible) { // PIstatus ?>
		<th class="<?php echo $pharmacy_products_delete->PIstatus->headerCellClass() ?>"><span id="elh_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus"><?php echo $pharmacy_products_delete->PIstatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
		<th class="<?php echo $pharmacy_products_delete->LastPiConfirmedDate->headerCellClass() ?>"><span id="elh_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate"><?php echo $pharmacy_products_delete->LastPiConfirmedDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BarCodeDesign->Visible) { // BarCodeDesign ?>
		<th class="<?php echo $pharmacy_products_delete->BarCodeDesign->headerCellClass() ?>"><span id="elh_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign"><?php echo $pharmacy_products_delete->BarCodeDesign->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
		<th class="<?php echo $pharmacy_products_delete->AcceptRemarksInBill->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill"><?php echo $pharmacy_products_delete->AcceptRemarksInBill->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Classification->Visible) { // Classification ?>
		<th class="<?php echo $pharmacy_products_delete->Classification->headerCellClass() ?>"><span id="elh_pharmacy_products_Classification" class="pharmacy_products_Classification"><?php echo $pharmacy_products_delete->Classification->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TimeSlot->Visible) { // TimeSlot ?>
		<th class="<?php echo $pharmacy_products_delete->TimeSlot->headerCellClass() ?>"><span id="elh_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot"><?php echo $pharmacy_products_delete->TimeSlot->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IsBundle->Visible) { // IsBundle ?>
		<th class="<?php echo $pharmacy_products_delete->IsBundle->headerCellClass() ?>"><span id="elh_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle"><?php echo $pharmacy_products_delete->IsBundle->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ColorCode->Visible) { // ColorCode ?>
		<th class="<?php echo $pharmacy_products_delete->ColorCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode"><?php echo $pharmacy_products_delete->ColorCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->GenderCode->Visible) { // GenderCode ?>
		<th class="<?php echo $pharmacy_products_delete->GenderCode->headerCellClass() ?>"><span id="elh_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode"><?php echo $pharmacy_products_delete->GenderCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SizeCode->Visible) { // SizeCode ?>
		<th class="<?php echo $pharmacy_products_delete->SizeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode"><?php echo $pharmacy_products_delete->SizeCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->GiftCard->Visible) { // GiftCard ?>
		<th class="<?php echo $pharmacy_products_delete->GiftCard->headerCellClass() ?>"><span id="elh_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard"><?php echo $pharmacy_products_delete->GiftCard->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ToonLabel->Visible) { // ToonLabel ?>
		<th class="<?php echo $pharmacy_products_delete->ToonLabel->headerCellClass() ?>"><span id="elh_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel"><?php echo $pharmacy_products_delete->ToonLabel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->GarmentType->Visible) { // GarmentType ?>
		<th class="<?php echo $pharmacy_products_delete->GarmentType->headerCellClass() ?>"><span id="elh_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType"><?php echo $pharmacy_products_delete->GarmentType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AgeGroup->Visible) { // AgeGroup ?>
		<th class="<?php echo $pharmacy_products_delete->AgeGroup->headerCellClass() ?>"><span id="elh_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup"><?php echo $pharmacy_products_delete->AgeGroup->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Season->Visible) { // Season ?>
		<th class="<?php echo $pharmacy_products_delete->Season->headerCellClass() ?>"><span id="elh_pharmacy_products_Season" class="pharmacy_products_Season"><?php echo $pharmacy_products_delete->Season->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DailyStockEntry->Visible) { // DailyStockEntry ?>
		<th class="<?php echo $pharmacy_products_delete->DailyStockEntry->headerCellClass() ?>"><span id="elh_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry"><?php echo $pharmacy_products_delete->DailyStockEntry->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ModifierApplicable->Visible) { // ModifierApplicable ?>
		<th class="<?php echo $pharmacy_products_delete->ModifierApplicable->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable"><?php echo $pharmacy_products_delete->ModifierApplicable->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ModifierType->Visible) { // ModifierType ?>
		<th class="<?php echo $pharmacy_products_delete->ModifierType->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType"><?php echo $pharmacy_products_delete->ModifierType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
		<th class="<?php echo $pharmacy_products_delete->AcceptZeroRate->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate"><?php echo $pharmacy_products_delete->AcceptZeroRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
		<th class="<?php echo $pharmacy_products_delete->ExciseDutyCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode"><?php echo $pharmacy_products_delete->ExciseDutyCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
		<th class="<?php echo $pharmacy_products_delete->IndentProductGroupCode->headerCellClass() ?>"><span id="elh_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode"><?php echo $pharmacy_products_delete->IndentProductGroupCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IsMultiBatch->Visible) { // IsMultiBatch ?>
		<th class="<?php echo $pharmacy_products_delete->IsMultiBatch->headerCellClass() ?>"><span id="elh_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch"><?php echo $pharmacy_products_delete->IsMultiBatch->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IsSingleBatch->Visible) { // IsSingleBatch ?>
		<th class="<?php echo $pharmacy_products_delete->IsSingleBatch->headerCellClass() ?>"><span id="elh_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch"><?php echo $pharmacy_products_delete->IsSingleBatch->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkUpRate1->Visible) { // MarkUpRate1 ?>
		<th class="<?php echo $pharmacy_products_delete->MarkUpRate1->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1"><?php echo $pharmacy_products_delete->MarkUpRate1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkDownRate1->Visible) { // MarkDownRate1 ?>
		<th class="<?php echo $pharmacy_products_delete->MarkDownRate1->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1"><?php echo $pharmacy_products_delete->MarkDownRate1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkUpRate2->Visible) { // MarkUpRate2 ?>
		<th class="<?php echo $pharmacy_products_delete->MarkUpRate2->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2"><?php echo $pharmacy_products_delete->MarkUpRate2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkDownRate2->Visible) { // MarkDownRate2 ?>
		<th class="<?php echo $pharmacy_products_delete->MarkDownRate2->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2"><?php echo $pharmacy_products_delete->MarkDownRate2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->_Yield->Visible) { // Yield ?>
		<th class="<?php echo $pharmacy_products_delete->_Yield->headerCellClass() ?>"><span id="elh_pharmacy_products__Yield" class="pharmacy_products__Yield"><?php echo $pharmacy_products_delete->_Yield->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->RefProductCode->Visible) { // RefProductCode ?>
		<th class="<?php echo $pharmacy_products_delete->RefProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode"><?php echo $pharmacy_products_delete->RefProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Volume->Visible) { // Volume ?>
		<th class="<?php echo $pharmacy_products_delete->Volume->headerCellClass() ?>"><span id="elh_pharmacy_products_Volume" class="pharmacy_products_Volume"><?php echo $pharmacy_products_delete->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MeasurementID->Visible) { // MeasurementID ?>
		<th class="<?php echo $pharmacy_products_delete->MeasurementID->headerCellClass() ?>"><span id="elh_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID"><?php echo $pharmacy_products_delete->MeasurementID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CountryCode->Visible) { // CountryCode ?>
		<th class="<?php echo $pharmacy_products_delete->CountryCode->headerCellClass() ?>"><span id="elh_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode"><?php echo $pharmacy_products_delete->CountryCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptWMQty->Visible) { // AcceptWMQty ?>
		<th class="<?php echo $pharmacy_products_delete->AcceptWMQty->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty"><?php echo $pharmacy_products_delete->AcceptWMQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
		<th class="<?php echo $pharmacy_products_delete->SingleBatchBasedOnRate->headerCellClass() ?>"><span id="elh_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate"><?php echo $pharmacy_products_delete->SingleBatchBasedOnRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TenderNo->Visible) { // TenderNo ?>
		<th class="<?php echo $pharmacy_products_delete->TenderNo->headerCellClass() ?>"><span id="elh_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo"><?php echo $pharmacy_products_delete->TenderNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
		<th class="<?php echo $pharmacy_products_delete->SingleBillMaximumSoldQtyFiled->headerCellClass() ?>"><span id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled"><?php echo $pharmacy_products_delete->SingleBillMaximumSoldQtyFiled->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength1->Visible) { // Strength1 ?>
		<th class="<?php echo $pharmacy_products_delete->Strength1->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength1" class="pharmacy_products_Strength1"><?php echo $pharmacy_products_delete->Strength1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength2->Visible) { // Strength2 ?>
		<th class="<?php echo $pharmacy_products_delete->Strength2->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength2" class="pharmacy_products_Strength2"><?php echo $pharmacy_products_delete->Strength2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength3->Visible) { // Strength3 ?>
		<th class="<?php echo $pharmacy_products_delete->Strength3->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength3" class="pharmacy_products_Strength3"><?php echo $pharmacy_products_delete->Strength3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength4->Visible) { // Strength4 ?>
		<th class="<?php echo $pharmacy_products_delete->Strength4->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength4" class="pharmacy_products_Strength4"><?php echo $pharmacy_products_delete->Strength4->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength5->Visible) { // Strength5 ?>
		<th class="<?php echo $pharmacy_products_delete->Strength5->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength5" class="pharmacy_products_Strength5"><?php echo $pharmacy_products_delete->Strength5->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode1->Visible) { // IngredientCode1 ?>
		<th class="<?php echo $pharmacy_products_delete->IngredientCode1->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1"><?php echo $pharmacy_products_delete->IngredientCode1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode2->Visible) { // IngredientCode2 ?>
		<th class="<?php echo $pharmacy_products_delete->IngredientCode2->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2"><?php echo $pharmacy_products_delete->IngredientCode2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode3->Visible) { // IngredientCode3 ?>
		<th class="<?php echo $pharmacy_products_delete->IngredientCode3->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3"><?php echo $pharmacy_products_delete->IngredientCode3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode4->Visible) { // IngredientCode4 ?>
		<th class="<?php echo $pharmacy_products_delete->IngredientCode4->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4"><?php echo $pharmacy_products_delete->IngredientCode4->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode5->Visible) { // IngredientCode5 ?>
		<th class="<?php echo $pharmacy_products_delete->IngredientCode5->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5"><?php echo $pharmacy_products_delete->IngredientCode5->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderType->Visible) { // OrderType ?>
		<th class="<?php echo $pharmacy_products_delete->OrderType->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderType" class="pharmacy_products_OrderType"><?php echo $pharmacy_products_delete->OrderType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->StockUOM->Visible) { // StockUOM ?>
		<th class="<?php echo $pharmacy_products_delete->StockUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM"><?php echo $pharmacy_products_delete->StockUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PriceUOM->Visible) { // PriceUOM ?>
		<th class="<?php echo $pharmacy_products_delete->PriceUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM"><?php echo $pharmacy_products_delete->PriceUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
		<th class="<?php echo $pharmacy_products_delete->DefaultSaleUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM"><?php echo $pharmacy_products_delete->DefaultSaleUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
		<th class="<?php echo $pharmacy_products_delete->DefaultPurchaseUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM"><?php echo $pharmacy_products_delete->DefaultPurchaseUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ReportingUOM->Visible) { // ReportingUOM ?>
		<th class="<?php echo $pharmacy_products_delete->ReportingUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM"><?php echo $pharmacy_products_delete->ReportingUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
		<th class="<?php echo $pharmacy_products_delete->LastPurchasedUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM"><?php echo $pharmacy_products_delete->LastPurchasedUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TreatmentCodes->Visible) { // TreatmentCodes ?>
		<th class="<?php echo $pharmacy_products_delete->TreatmentCodes->headerCellClass() ?>"><span id="elh_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes"><?php echo $pharmacy_products_delete->TreatmentCodes->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->InsuranceType->Visible) { // InsuranceType ?>
		<th class="<?php echo $pharmacy_products_delete->InsuranceType->headerCellClass() ?>"><span id="elh_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType"><?php echo $pharmacy_products_delete->InsuranceType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
		<th class="<?php echo $pharmacy_products_delete->CoverageGroupCodes->headerCellClass() ?>"><span id="elh_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes"><?php echo $pharmacy_products_delete->CoverageGroupCodes->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MultipleUOM->Visible) { // MultipleUOM ?>
		<th class="<?php echo $pharmacy_products_delete->MultipleUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM"><?php echo $pharmacy_products_delete->MultipleUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SalePriceComputation->Visible) { // SalePriceComputation ?>
		<th class="<?php echo $pharmacy_products_delete->SalePriceComputation->headerCellClass() ?>"><span id="elh_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation"><?php echo $pharmacy_products_delete->SalePriceComputation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->StockCorrection->Visible) { // StockCorrection ?>
		<th class="<?php echo $pharmacy_products_delete->StockCorrection->headerCellClass() ?>"><span id="elh_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection"><?php echo $pharmacy_products_delete->StockCorrection->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->LBTPercentage->Visible) { // LBTPercentage ?>
		<th class="<?php echo $pharmacy_products_delete->LBTPercentage->headerCellClass() ?>"><span id="elh_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage"><?php echo $pharmacy_products_delete->LBTPercentage->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->SalesCommission->Visible) { // SalesCommission ?>
		<th class="<?php echo $pharmacy_products_delete->SalesCommission->headerCellClass() ?>"><span id="elh_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission"><?php echo $pharmacy_products_delete->SalesCommission->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->LockedStock->Visible) { // LockedStock ?>
		<th class="<?php echo $pharmacy_products_delete->LockedStock->headerCellClass() ?>"><span id="elh_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock"><?php echo $pharmacy_products_delete->LockedStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MinMaxUOM->Visible) { // MinMaxUOM ?>
		<th class="<?php echo $pharmacy_products_delete->MinMaxUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM"><?php echo $pharmacy_products_delete->MinMaxUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
		<th class="<?php echo $pharmacy_products_delete->ExpiryMfrDateFormat->headerCellClass() ?>"><span id="elh_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat"><?php echo $pharmacy_products_delete->ExpiryMfrDateFormat->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductLifeTime->Visible) { // ProductLifeTime ?>
		<th class="<?php echo $pharmacy_products_delete->ProductLifeTime->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime"><?php echo $pharmacy_products_delete->ProductLifeTime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IsCombo->Visible) { // IsCombo ?>
		<th class="<?php echo $pharmacy_products_delete->IsCombo->headerCellClass() ?>"><span id="elh_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo"><?php echo $pharmacy_products_delete->IsCombo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ComboTypeCode->Visible) { // ComboTypeCode ?>
		<th class="<?php echo $pharmacy_products_delete->ComboTypeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode"><?php echo $pharmacy_products_delete->ComboTypeCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount6->Visible) { // AttributeCount6 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount6->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6"><?php echo $pharmacy_products_delete->AttributeCount6->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount7->Visible) { // AttributeCount7 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount7->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7"><?php echo $pharmacy_products_delete->AttributeCount7->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount8->Visible) { // AttributeCount8 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount8->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8"><?php echo $pharmacy_products_delete->AttributeCount8->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount9->Visible) { // AttributeCount9 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount9->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9"><?php echo $pharmacy_products_delete->AttributeCount9->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount10->Visible) { // AttributeCount10 ?>
		<th class="<?php echo $pharmacy_products_delete->AttributeCount10->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10"><?php echo $pharmacy_products_delete->AttributeCount10->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->LabourCharge->Visible) { // LabourCharge ?>
		<th class="<?php echo $pharmacy_products_delete->LabourCharge->headerCellClass() ?>"><span id="elh_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge"><?php echo $pharmacy_products_delete->LabourCharge->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
		<th class="<?php echo $pharmacy_products_delete->AffectOtherCharge->headerCellClass() ?>"><span id="elh_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge"><?php echo $pharmacy_products_delete->AffectOtherCharge->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DosageInfo->Visible) { // DosageInfo ?>
		<th class="<?php echo $pharmacy_products_delete->DosageInfo->headerCellClass() ?>"><span id="elh_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo"><?php echo $pharmacy_products_delete->DosageInfo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DosageType->Visible) { // DosageType ?>
		<th class="<?php echo $pharmacy_products_delete->DosageType->headerCellClass() ?>"><span id="elh_pharmacy_products_DosageType" class="pharmacy_products_DosageType"><?php echo $pharmacy_products_delete->DosageType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
		<th class="<?php echo $pharmacy_products_delete->DefaultIndentUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM"><?php echo $pharmacy_products_delete->DefaultIndentUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PromoTag->Visible) { // PromoTag ?>
		<th class="<?php echo $pharmacy_products_delete->PromoTag->headerCellClass() ?>"><span id="elh_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag"><?php echo $pharmacy_products_delete->PromoTag->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
		<th class="<?php echo $pharmacy_products_delete->BillLevelPromoTag->headerCellClass() ?>"><span id="elh_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag"><?php echo $pharmacy_products_delete->BillLevelPromoTag->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->IsMRPProduct->Visible) { // IsMRPProduct ?>
		<th class="<?php echo $pharmacy_products_delete->IsMRPProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct"><?php echo $pharmacy_products_delete->IsMRPProduct->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
		<th class="<?php echo $pharmacy_products_delete->AlternateSaleUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM"><?php echo $pharmacy_products_delete->AlternateSaleUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeUOM->Visible) { // FreeUOM ?>
		<th class="<?php echo $pharmacy_products_delete->FreeUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM"><?php echo $pharmacy_products_delete->FreeUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MarketedCode->Visible) { // MarketedCode ?>
		<th class="<?php echo $pharmacy_products_delete->MarketedCode->headerCellClass() ?>"><span id="elh_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode"><?php echo $pharmacy_products_delete->MarketedCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
		<th class="<?php echo $pharmacy_products_delete->MinimumSalePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice"><?php echo $pharmacy_products_delete->MinimumSalePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PRate1->Visible) { // PRate1 ?>
		<th class="<?php echo $pharmacy_products_delete->PRate1->headerCellClass() ?>"><span id="elh_pharmacy_products_PRate1" class="pharmacy_products_PRate1"><?php echo $pharmacy_products_delete->PRate1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->PRate2->Visible) { // PRate2 ?>
		<th class="<?php echo $pharmacy_products_delete->PRate2->headerCellClass() ?>"><span id="elh_pharmacy_products_PRate2" class="pharmacy_products_PRate2"><?php echo $pharmacy_products_delete->PRate2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->LPItemCost->Visible) { // LPItemCost ?>
		<th class="<?php echo $pharmacy_products_delete->LPItemCost->headerCellClass() ?>"><span id="elh_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost"><?php echo $pharmacy_products_delete->LPItemCost->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->FixedItemCost->Visible) { // FixedItemCost ?>
		<th class="<?php echo $pharmacy_products_delete->FixedItemCost->headerCellClass() ?>"><span id="elh_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost"><?php echo $pharmacy_products_delete->FixedItemCost->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->HSNId->Visible) { // HSNId ?>
		<th class="<?php echo $pharmacy_products_delete->HSNId->headerCellClass() ?>"><span id="elh_pharmacy_products_HSNId" class="pharmacy_products_HSNId"><?php echo $pharmacy_products_delete->HSNId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->TaxInclusive->Visible) { // TaxInclusive ?>
		<th class="<?php echo $pharmacy_products_delete->TaxInclusive->headerCellClass() ?>"><span id="elh_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive"><?php echo $pharmacy_products_delete->TaxInclusive->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
		<th class="<?php echo $pharmacy_products_delete->EligibleforWarranty->headerCellClass() ?>"><span id="elh_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty"><?php echo $pharmacy_products_delete->EligibleforWarranty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
		<th class="<?php echo $pharmacy_products_delete->NoofMonthsWarranty->headerCellClass() ?>"><span id="elh_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty"><?php echo $pharmacy_products_delete->NoofMonthsWarranty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
		<th class="<?php echo $pharmacy_products_delete->ComputeTaxonCost->headerCellClass() ?>"><span id="elh_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost"><?php echo $pharmacy_products_delete->ComputeTaxonCost->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
		<th class="<?php echo $pharmacy_products_delete->HasEmptyBottleTrack->headerCellClass() ?>"><span id="elh_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack"><?php echo $pharmacy_products_delete->HasEmptyBottleTrack->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
		<th class="<?php echo $pharmacy_products_delete->EmptyBottleReferenceCode->headerCellClass() ?>"><span id="elh_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode"><?php echo $pharmacy_products_delete->EmptyBottleReferenceCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
		<th class="<?php echo $pharmacy_products_delete->AdditionalCESSAmount->headerCellClass() ?>"><span id="elh_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount"><?php echo $pharmacy_products_delete->AdditionalCESSAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products_delete->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
		<th class="<?php echo $pharmacy_products_delete->EmptyBottleRate->headerCellClass() ?>"><span id="elh_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate"><?php echo $pharmacy_products_delete->EmptyBottleRate->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_products_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_products_delete->Recordset->EOF) {
	$pharmacy_products_delete->RecordCount++;
	$pharmacy_products_delete->RowCount++;

	// Set row properties
	$pharmacy_products->resetAttributes();
	$pharmacy_products->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_products_delete->loadRowValues($pharmacy_products_delete->Recordset);

	// Render row
	$pharmacy_products_delete->renderRow();
?>
	<tr <?php echo $pharmacy_products->rowAttributes() ?>>
<?php if ($pharmacy_products_delete->ProductCode->Visible) { // ProductCode ?>
		<td <?php echo $pharmacy_products_delete->ProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode">
<span<?php echo $pharmacy_products_delete->ProductCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductName->Visible) { // ProductName ?>
		<td <?php echo $pharmacy_products_delete->ProductName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductName" class="pharmacy_products_ProductName">
<span<?php echo $pharmacy_products_delete->ProductName->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DivisionCode->Visible) { // DivisionCode ?>
		<td <?php echo $pharmacy_products_delete->DivisionCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode">
<span<?php echo $pharmacy_products_delete->DivisionCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->DivisionCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ManufacturerCode->Visible) { // ManufacturerCode ?>
		<td <?php echo $pharmacy_products_delete->ManufacturerCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode">
<span<?php echo $pharmacy_products_delete->ManufacturerCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ManufacturerCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SupplierCode->Visible) { // SupplierCode ?>
		<td <?php echo $pharmacy_products_delete->SupplierCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode">
<span<?php echo $pharmacy_products_delete->SupplierCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->SupplierCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
		<td <?php echo $pharmacy_products_delete->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes">
<span<?php echo $pharmacy_products_delete->AlternateSupplierCodes->viewAttributes() ?>><?php echo $pharmacy_products_delete->AlternateSupplierCodes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AlternateProductCode->Visible) { // AlternateProductCode ?>
		<td <?php echo $pharmacy_products_delete->AlternateProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode">
<span<?php echo $pharmacy_products_delete->AlternateProductCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->AlternateProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->UniversalProductCode->Visible) { // UniversalProductCode ?>
		<td <?php echo $pharmacy_products_delete->UniversalProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode">
<span<?php echo $pharmacy_products_delete->UniversalProductCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->UniversalProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BookProductCode->Visible) { // BookProductCode ?>
		<td <?php echo $pharmacy_products_delete->BookProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode">
<span<?php echo $pharmacy_products_delete->BookProductCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->BookProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->OldCode->Visible) { // OldCode ?>
		<td <?php echo $pharmacy_products_delete->OldCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_OldCode" class="pharmacy_products_OldCode">
<span<?php echo $pharmacy_products_delete->OldCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->OldCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProtectedProducts->Visible) { // ProtectedProducts ?>
		<td <?php echo $pharmacy_products_delete->ProtectedProducts->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts">
<span<?php echo $pharmacy_products_delete->ProtectedProducts->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProtectedProducts->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductFullName->Visible) { // ProductFullName ?>
		<td <?php echo $pharmacy_products_delete->ProductFullName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName">
<span<?php echo $pharmacy_products_delete->ProductFullName->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductFullName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
		<td <?php echo $pharmacy_products_delete->UnitOfMeasure->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure">
<span<?php echo $pharmacy_products_delete->UnitOfMeasure->viewAttributes() ?>><?php echo $pharmacy_products_delete->UnitOfMeasure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->UnitDescription->Visible) { // UnitDescription ?>
		<td <?php echo $pharmacy_products_delete->UnitDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription">
<span<?php echo $pharmacy_products_delete->UnitDescription->viewAttributes() ?>><?php echo $pharmacy_products_delete->UnitDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BulkDescription->Visible) { // BulkDescription ?>
		<td <?php echo $pharmacy_products_delete->BulkDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription">
<span<?php echo $pharmacy_products_delete->BulkDescription->viewAttributes() ?>><?php echo $pharmacy_products_delete->BulkDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BarCodeDescription->Visible) { // BarCodeDescription ?>
		<td <?php echo $pharmacy_products_delete->BarCodeDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription">
<span<?php echo $pharmacy_products_delete->BarCodeDescription->viewAttributes() ?>><?php echo $pharmacy_products_delete->BarCodeDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PackageInformation->Visible) { // PackageInformation ?>
		<td <?php echo $pharmacy_products_delete->PackageInformation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation">
<span<?php echo $pharmacy_products_delete->PackageInformation->viewAttributes() ?>><?php echo $pharmacy_products_delete->PackageInformation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PackageId->Visible) { // PackageId ?>
		<td <?php echo $pharmacy_products_delete->PackageId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PackageId" class="pharmacy_products_PackageId">
<span<?php echo $pharmacy_products_delete->PackageId->viewAttributes() ?>><?php echo $pharmacy_products_delete->PackageId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Weight->Visible) { // Weight ?>
		<td <?php echo $pharmacy_products_delete->Weight->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Weight" class="pharmacy_products_Weight">
<span<?php echo $pharmacy_products_delete->Weight->viewAttributes() ?>><?php echo $pharmacy_products_delete->Weight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowFractions->Visible) { // AllowFractions ?>
		<td <?php echo $pharmacy_products_delete->AllowFractions->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions">
<span<?php echo $pharmacy_products_delete->AllowFractions->viewAttributes() ?>><?php echo $pharmacy_products_delete->AllowFractions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
		<td <?php echo $pharmacy_products_delete->MinimumStockLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel">
<span<?php echo $pharmacy_products_delete->MinimumStockLevel->viewAttributes() ?>><?php echo $pharmacy_products_delete->MinimumStockLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
		<td <?php echo $pharmacy_products_delete->MaximumStockLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel">
<span<?php echo $pharmacy_products_delete->MaximumStockLevel->viewAttributes() ?>><?php echo $pharmacy_products_delete->MaximumStockLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ReorderLevel->Visible) { // ReorderLevel ?>
		<td <?php echo $pharmacy_products_delete->ReorderLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel">
<span<?php echo $pharmacy_products_delete->ReorderLevel->viewAttributes() ?>><?php echo $pharmacy_products_delete->ReorderLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MinMaxRatio->Visible) { // MinMaxRatio ?>
		<td <?php echo $pharmacy_products_delete->MinMaxRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio">
<span<?php echo $pharmacy_products_delete->MinMaxRatio->viewAttributes() ?>><?php echo $pharmacy_products_delete->MinMaxRatio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
		<td <?php echo $pharmacy_products_delete->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio">
<span<?php echo $pharmacy_products_delete->AutoMinMaxRatio->viewAttributes() ?>><?php echo $pharmacy_products_delete->AutoMinMaxRatio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ScheduleCode->Visible) { // ScheduleCode ?>
		<td <?php echo $pharmacy_products_delete->ScheduleCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode">
<span<?php echo $pharmacy_products_delete->ScheduleCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ScheduleCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->RopRatio->Visible) { // RopRatio ?>
		<td <?php echo $pharmacy_products_delete->RopRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio">
<span<?php echo $pharmacy_products_delete->RopRatio->viewAttributes() ?>><?php echo $pharmacy_products_delete->RopRatio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MRP->Visible) { // MRP ?>
		<td <?php echo $pharmacy_products_delete->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MRP" class="pharmacy_products_MRP">
<span<?php echo $pharmacy_products_delete->MRP->viewAttributes() ?>><?php echo $pharmacy_products_delete->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PurchasePrice->Visible) { // PurchasePrice ?>
		<td <?php echo $pharmacy_products_delete->PurchasePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice">
<span<?php echo $pharmacy_products_delete->PurchasePrice->viewAttributes() ?>><?php echo $pharmacy_products_delete->PurchasePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PurchaseUnit->Visible) { // PurchaseUnit ?>
		<td <?php echo $pharmacy_products_delete->PurchaseUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit">
<span<?php echo $pharmacy_products_delete->PurchaseUnit->viewAttributes() ?>><?php echo $pharmacy_products_delete->PurchaseUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
		<td <?php echo $pharmacy_products_delete->PurchaseTaxCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode">
<span<?php echo $pharmacy_products_delete->PurchaseTaxCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->PurchaseTaxCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowDirectInward->Visible) { // AllowDirectInward ?>
		<td <?php echo $pharmacy_products_delete->AllowDirectInward->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward">
<span<?php echo $pharmacy_products_delete->AllowDirectInward->viewAttributes() ?>><?php echo $pharmacy_products_delete->AllowDirectInward->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SalePrice->Visible) { // SalePrice ?>
		<td <?php echo $pharmacy_products_delete->SalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice">
<span<?php echo $pharmacy_products_delete->SalePrice->viewAttributes() ?>><?php echo $pharmacy_products_delete->SalePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SaleUnit->Visible) { // SaleUnit ?>
		<td <?php echo $pharmacy_products_delete->SaleUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit">
<span<?php echo $pharmacy_products_delete->SaleUnit->viewAttributes() ?>><?php echo $pharmacy_products_delete->SaleUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SalesTaxCode->Visible) { // SalesTaxCode ?>
		<td <?php echo $pharmacy_products_delete->SalesTaxCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode">
<span<?php echo $pharmacy_products_delete->SalesTaxCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->SalesTaxCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->StockReceived->Visible) { // StockReceived ?>
		<td <?php echo $pharmacy_products_delete->StockReceived->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived">
<span<?php echo $pharmacy_products_delete->StockReceived->viewAttributes() ?>><?php echo $pharmacy_products_delete->StockReceived->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TotalStock->Visible) { // TotalStock ?>
		<td <?php echo $pharmacy_products_delete->TotalStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock">
<span<?php echo $pharmacy_products_delete->TotalStock->viewAttributes() ?>><?php echo $pharmacy_products_delete->TotalStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->StockType->Visible) { // StockType ?>
		<td <?php echo $pharmacy_products_delete->StockType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_StockType" class="pharmacy_products_StockType">
<span<?php echo $pharmacy_products_delete->StockType->viewAttributes() ?>><?php echo $pharmacy_products_delete->StockType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->StockCheckDate->Visible) { // StockCheckDate ?>
		<td <?php echo $pharmacy_products_delete->StockCheckDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate">
<span<?php echo $pharmacy_products_delete->StockCheckDate->viewAttributes() ?>><?php echo $pharmacy_products_delete->StockCheckDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
		<td <?php echo $pharmacy_products_delete->StockAdjustmentDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate">
<span<?php echo $pharmacy_products_delete->StockAdjustmentDate->viewAttributes() ?>><?php echo $pharmacy_products_delete->StockAdjustmentDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Remarks->Visible) { // Remarks ?>
		<td <?php echo $pharmacy_products_delete->Remarks->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Remarks" class="pharmacy_products_Remarks">
<span<?php echo $pharmacy_products_delete->Remarks->viewAttributes() ?>><?php echo $pharmacy_products_delete->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CostCentre->Visible) { // CostCentre ?>
		<td <?php echo $pharmacy_products_delete->CostCentre->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre">
<span<?php echo $pharmacy_products_delete->CostCentre->viewAttributes() ?>><?php echo $pharmacy_products_delete->CostCentre->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductType->Visible) { // ProductType ?>
		<td <?php echo $pharmacy_products_delete->ProductType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductType" class="pharmacy_products_ProductType">
<span<?php echo $pharmacy_products_delete->ProductType->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TaxAmount->Visible) { // TaxAmount ?>
		<td <?php echo $pharmacy_products_delete->TaxAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount">
<span<?php echo $pharmacy_products_delete->TaxAmount->viewAttributes() ?>><?php echo $pharmacy_products_delete->TaxAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TaxId->Visible) { // TaxId ?>
		<td <?php echo $pharmacy_products_delete->TaxId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TaxId" class="pharmacy_products_TaxId">
<span<?php echo $pharmacy_products_delete->TaxId->viewAttributes() ?>><?php echo $pharmacy_products_delete->TaxId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
		<td <?php echo $pharmacy_products_delete->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable">
<span<?php echo $pharmacy_products_delete->ResaleTaxApplicable->viewAttributes() ?>><?php echo $pharmacy_products_delete->ResaleTaxApplicable->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CstOtherTax->Visible) { // CstOtherTax ?>
		<td <?php echo $pharmacy_products_delete->CstOtherTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax">
<span<?php echo $pharmacy_products_delete->CstOtherTax->viewAttributes() ?>><?php echo $pharmacy_products_delete->CstOtherTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TotalTax->Visible) { // TotalTax ?>
		<td <?php echo $pharmacy_products_delete->TotalTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax">
<span<?php echo $pharmacy_products_delete->TotalTax->viewAttributes() ?>><?php echo $pharmacy_products_delete->TotalTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ItemCost->Visible) { // ItemCost ?>
		<td <?php echo $pharmacy_products_delete->ItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost">
<span<?php echo $pharmacy_products_delete->ItemCost->viewAttributes() ?>><?php echo $pharmacy_products_delete->ItemCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ExpiryDate->Visible) { // ExpiryDate ?>
		<td <?php echo $pharmacy_products_delete->ExpiryDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate">
<span<?php echo $pharmacy_products_delete->ExpiryDate->viewAttributes() ?>><?php echo $pharmacy_products_delete->ExpiryDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BatchDescription->Visible) { // BatchDescription ?>
		<td <?php echo $pharmacy_products_delete->BatchDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription">
<span<?php echo $pharmacy_products_delete->BatchDescription->viewAttributes() ?>><?php echo $pharmacy_products_delete->BatchDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeScheme->Visible) { // FreeScheme ?>
		<td <?php echo $pharmacy_products_delete->FreeScheme->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme">
<span<?php echo $pharmacy_products_delete->FreeScheme->viewAttributes() ?>><?php echo $pharmacy_products_delete->FreeScheme->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
		<td <?php echo $pharmacy_products_delete->CashDiscountEligibility->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility">
<span<?php echo $pharmacy_products_delete->CashDiscountEligibility->viewAttributes() ?>><?php echo $pharmacy_products_delete->CashDiscountEligibility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
		<td <?php echo $pharmacy_products_delete->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill">
<span<?php echo $pharmacy_products_delete->DiscountPerAllowInBill->viewAttributes() ?>><?php echo $pharmacy_products_delete->DiscountPerAllowInBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Discount->Visible) { // Discount ?>
		<td <?php echo $pharmacy_products_delete->Discount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Discount" class="pharmacy_products_Discount">
<span<?php echo $pharmacy_products_delete->Discount->viewAttributes() ?>><?php echo $pharmacy_products_delete->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TotalAmount->Visible) { // TotalAmount ?>
		<td <?php echo $pharmacy_products_delete->TotalAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount">
<span<?php echo $pharmacy_products_delete->TotalAmount->viewAttributes() ?>><?php echo $pharmacy_products_delete->TotalAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->StandardMargin->Visible) { // StandardMargin ?>
		<td <?php echo $pharmacy_products_delete->StandardMargin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin">
<span<?php echo $pharmacy_products_delete->StandardMargin->viewAttributes() ?>><?php echo $pharmacy_products_delete->StandardMargin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Margin->Visible) { // Margin ?>
		<td <?php echo $pharmacy_products_delete->Margin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Margin" class="pharmacy_products_Margin">
<span<?php echo $pharmacy_products_delete->Margin->viewAttributes() ?>><?php echo $pharmacy_products_delete->Margin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MarginId->Visible) { // MarginId ?>
		<td <?php echo $pharmacy_products_delete->MarginId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MarginId" class="pharmacy_products_MarginId">
<span<?php echo $pharmacy_products_delete->MarginId->viewAttributes() ?>><?php echo $pharmacy_products_delete->MarginId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ExpectedMargin->Visible) { // ExpectedMargin ?>
		<td <?php echo $pharmacy_products_delete->ExpectedMargin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin">
<span<?php echo $pharmacy_products_delete->ExpectedMargin->viewAttributes() ?>><?php echo $pharmacy_products_delete->ExpectedMargin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
		<td <?php echo $pharmacy_products_delete->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax">
<span<?php echo $pharmacy_products_delete->SurchargeBeforeTax->viewAttributes() ?>><?php echo $pharmacy_products_delete->SurchargeBeforeTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
		<td <?php echo $pharmacy_products_delete->SurchargeAfterTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax">
<span<?php echo $pharmacy_products_delete->SurchargeAfterTax->viewAttributes() ?>><?php echo $pharmacy_products_delete->SurchargeAfterTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TempOrderNo->Visible) { // TempOrderNo ?>
		<td <?php echo $pharmacy_products_delete->TempOrderNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo">
<span<?php echo $pharmacy_products_delete->TempOrderNo->viewAttributes() ?>><?php echo $pharmacy_products_delete->TempOrderNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TempOrderDate->Visible) { // TempOrderDate ?>
		<td <?php echo $pharmacy_products_delete->TempOrderDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate">
<span<?php echo $pharmacy_products_delete->TempOrderDate->viewAttributes() ?>><?php echo $pharmacy_products_delete->TempOrderDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderUnit->Visible) { // OrderUnit ?>
		<td <?php echo $pharmacy_products_delete->OrderUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit">
<span<?php echo $pharmacy_products_delete->OrderUnit->viewAttributes() ?>><?php echo $pharmacy_products_delete->OrderUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderQuantity->Visible) { // OrderQuantity ?>
		<td <?php echo $pharmacy_products_delete->OrderQuantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity">
<span<?php echo $pharmacy_products_delete->OrderQuantity->viewAttributes() ?>><?php echo $pharmacy_products_delete->OrderQuantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkForOrder->Visible) { // MarkForOrder ?>
		<td <?php echo $pharmacy_products_delete->MarkForOrder->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder">
<span<?php echo $pharmacy_products_delete->MarkForOrder->viewAttributes() ?>><?php echo $pharmacy_products_delete->MarkForOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderAllId->Visible) { // OrderAllId ?>
		<td <?php echo $pharmacy_products_delete->OrderAllId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId">
<span<?php echo $pharmacy_products_delete->OrderAllId->viewAttributes() ?>><?php echo $pharmacy_products_delete->OrderAllId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
		<td <?php echo $pharmacy_products_delete->CalculateOrderQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty">
<span<?php echo $pharmacy_products_delete->CalculateOrderQty->viewAttributes() ?>><?php echo $pharmacy_products_delete->CalculateOrderQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SubLocation->Visible) { // SubLocation ?>
		<td <?php echo $pharmacy_products_delete->SubLocation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation">
<span<?php echo $pharmacy_products_delete->SubLocation->viewAttributes() ?>><?php echo $pharmacy_products_delete->SubLocation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CategoryCode->Visible) { // CategoryCode ?>
		<td <?php echo $pharmacy_products_delete->CategoryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode">
<span<?php echo $pharmacy_products_delete->CategoryCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->CategoryCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SubCategory->Visible) { // SubCategory ?>
		<td <?php echo $pharmacy_products_delete->SubCategory->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory">
<span<?php echo $pharmacy_products_delete->SubCategory->viewAttributes() ?>><?php echo $pharmacy_products_delete->SubCategory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
		<td <?php echo $pharmacy_products_delete->FlexCategoryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode">
<span<?php echo $pharmacy_products_delete->FlexCategoryCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->FlexCategoryCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ABCSaleQty->Visible) { // ABCSaleQty ?>
		<td <?php echo $pharmacy_products_delete->ABCSaleQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty">
<span<?php echo $pharmacy_products_delete->ABCSaleQty->viewAttributes() ?>><?php echo $pharmacy_products_delete->ABCSaleQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ABCSaleValue->Visible) { // ABCSaleValue ?>
		<td <?php echo $pharmacy_products_delete->ABCSaleValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue">
<span<?php echo $pharmacy_products_delete->ABCSaleValue->viewAttributes() ?>><?php echo $pharmacy_products_delete->ABCSaleValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ConvertionFactor->Visible) { // ConvertionFactor ?>
		<td <?php echo $pharmacy_products_delete->ConvertionFactor->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor">
<span<?php echo $pharmacy_products_delete->ConvertionFactor->viewAttributes() ?>><?php echo $pharmacy_products_delete->ConvertionFactor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
		<td <?php echo $pharmacy_products_delete->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc">
<span<?php echo $pharmacy_products_delete->ConvertionUnitDesc->viewAttributes() ?>><?php echo $pharmacy_products_delete->ConvertionUnitDesc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TransactionId->Visible) { // TransactionId ?>
		<td <?php echo $pharmacy_products_delete->TransactionId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId">
<span<?php echo $pharmacy_products_delete->TransactionId->viewAttributes() ?>><?php echo $pharmacy_products_delete->TransactionId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SoldProductId->Visible) { // SoldProductId ?>
		<td <?php echo $pharmacy_products_delete->SoldProductId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId">
<span<?php echo $pharmacy_products_delete->SoldProductId->viewAttributes() ?>><?php echo $pharmacy_products_delete->SoldProductId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->WantedBookId->Visible) { // WantedBookId ?>
		<td <?php echo $pharmacy_products_delete->WantedBookId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId">
<span<?php echo $pharmacy_products_delete->WantedBookId->viewAttributes() ?>><?php echo $pharmacy_products_delete->WantedBookId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AllId->Visible) { // AllId ?>
		<td <?php echo $pharmacy_products_delete->AllId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AllId" class="pharmacy_products_AllId">
<span<?php echo $pharmacy_products_delete->AllId->viewAttributes() ?>><?php echo $pharmacy_products_delete->AllId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
		<td <?php echo $pharmacy_products_delete->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory">
<span<?php echo $pharmacy_products_delete->BatchAndExpiryCompulsory->viewAttributes() ?>><?php echo $pharmacy_products_delete->BatchAndExpiryCompulsory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
		<td <?php echo $pharmacy_products_delete->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook">
<span<?php echo $pharmacy_products_delete->BatchStockForWantedBook->viewAttributes() ?>><?php echo $pharmacy_products_delete->BatchStockForWantedBook->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
		<td <?php echo $pharmacy_products_delete->UnitBasedBilling->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling">
<span<?php echo $pharmacy_products_delete->UnitBasedBilling->viewAttributes() ?>><?php echo $pharmacy_products_delete->UnitBasedBilling->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
		<td <?php echo $pharmacy_products_delete->DoNotCheckStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock">
<span<?php echo $pharmacy_products_delete->DoNotCheckStock->viewAttributes() ?>><?php echo $pharmacy_products_delete->DoNotCheckStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptRate->Visible) { // AcceptRate ?>
		<td <?php echo $pharmacy_products_delete->AcceptRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate">
<span<?php echo $pharmacy_products_delete->AcceptRate->viewAttributes() ?>><?php echo $pharmacy_products_delete->AcceptRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PriceLevel->Visible) { // PriceLevel ?>
		<td <?php echo $pharmacy_products_delete->PriceLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel">
<span<?php echo $pharmacy_products_delete->PriceLevel->viewAttributes() ?>><?php echo $pharmacy_products_delete->PriceLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->LastQuotePrice->Visible) { // LastQuotePrice ?>
		<td <?php echo $pharmacy_products_delete->LastQuotePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice">
<span<?php echo $pharmacy_products_delete->LastQuotePrice->viewAttributes() ?>><?php echo $pharmacy_products_delete->LastQuotePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PriceChange->Visible) { // PriceChange ?>
		<td <?php echo $pharmacy_products_delete->PriceChange->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange">
<span<?php echo $pharmacy_products_delete->PriceChange->viewAttributes() ?>><?php echo $pharmacy_products_delete->PriceChange->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CommodityCode->Visible) { // CommodityCode ?>
		<td <?php echo $pharmacy_products_delete->CommodityCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode">
<span<?php echo $pharmacy_products_delete->CommodityCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->CommodityCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->InstitutePrice->Visible) { // InstitutePrice ?>
		<td <?php echo $pharmacy_products_delete->InstitutePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice">
<span<?php echo $pharmacy_products_delete->InstitutePrice->viewAttributes() ?>><?php echo $pharmacy_products_delete->InstitutePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
		<td <?php echo $pharmacy_products_delete->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct">
<span<?php echo $pharmacy_products_delete->CtrlOrDCtrlProduct->viewAttributes() ?>><?php echo $pharmacy_products_delete->CtrlOrDCtrlProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ImportedDate->Visible) { // ImportedDate ?>
		<td <?php echo $pharmacy_products_delete->ImportedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate">
<span<?php echo $pharmacy_products_delete->ImportedDate->viewAttributes() ?>><?php echo $pharmacy_products_delete->ImportedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IsImported->Visible) { // IsImported ?>
		<td <?php echo $pharmacy_products_delete->IsImported->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IsImported" class="pharmacy_products_IsImported">
<span<?php echo $pharmacy_products_delete->IsImported->viewAttributes() ?>><?php echo $pharmacy_products_delete->IsImported->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FileName->Visible) { // FileName ?>
		<td <?php echo $pharmacy_products_delete->FileName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FileName" class="pharmacy_products_FileName">
<span<?php echo $pharmacy_products_delete->FileName->viewAttributes() ?>><?php echo $pharmacy_products_delete->FileName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->GodownNumber->Visible) { // GodownNumber ?>
		<td <?php echo $pharmacy_products_delete->GodownNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber">
<span<?php echo $pharmacy_products_delete->GodownNumber->viewAttributes() ?>><?php echo $pharmacy_products_delete->GodownNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CreationDate->Visible) { // CreationDate ?>
		<td <?php echo $pharmacy_products_delete->CreationDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate">
<span<?php echo $pharmacy_products_delete->CreationDate->viewAttributes() ?>><?php echo $pharmacy_products_delete->CreationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CreatedbyUser->Visible) { // CreatedbyUser ?>
		<td <?php echo $pharmacy_products_delete->CreatedbyUser->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser">
<span<?php echo $pharmacy_products_delete->CreatedbyUser->viewAttributes() ?>><?php echo $pharmacy_products_delete->CreatedbyUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ModifiedDate->Visible) { // ModifiedDate ?>
		<td <?php echo $pharmacy_products_delete->ModifiedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate">
<span<?php echo $pharmacy_products_delete->ModifiedDate->viewAttributes() ?>><?php echo $pharmacy_products_delete->ModifiedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
		<td <?php echo $pharmacy_products_delete->ModifiedbyUser->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser">
<span<?php echo $pharmacy_products_delete->ModifiedbyUser->viewAttributes() ?>><?php echo $pharmacy_products_delete->ModifiedbyUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->isActive->Visible) { // isActive ?>
		<td <?php echo $pharmacy_products_delete->isActive->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_isActive" class="pharmacy_products_isActive">
<span<?php echo $pharmacy_products_delete->isActive->viewAttributes() ?>><?php echo $pharmacy_products_delete->isActive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
		<td <?php echo $pharmacy_products_delete->AllowExpiryClaim->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim">
<span<?php echo $pharmacy_products_delete->AllowExpiryClaim->viewAttributes() ?>><?php echo $pharmacy_products_delete->AllowExpiryClaim->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BrandCode->Visible) { // BrandCode ?>
		<td <?php echo $pharmacy_products_delete->BrandCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode">
<span<?php echo $pharmacy_products_delete->BrandCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->BrandCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
		<td <?php echo $pharmacy_products_delete->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon">
<span<?php echo $pharmacy_products_delete->FreeSchemeBasedon->viewAttributes() ?>><?php echo $pharmacy_products_delete->FreeSchemeBasedon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
		<td <?php echo $pharmacy_products_delete->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill">
<span<?php echo $pharmacy_products_delete->DoNotCheckCostInBill->viewAttributes() ?>><?php echo $pharmacy_products_delete->DoNotCheckCostInBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductGroupCode->Visible) { // ProductGroupCode ?>
		<td <?php echo $pharmacy_products_delete->ProductGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode">
<span<?php echo $pharmacy_products_delete->ProductGroupCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductGroupCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
		<td <?php echo $pharmacy_products_delete->ProductStrengthCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode">
<span<?php echo $pharmacy_products_delete->ProductStrengthCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductStrengthCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PackingCode->Visible) { // PackingCode ?>
		<td <?php echo $pharmacy_products_delete->PackingCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode">
<span<?php echo $pharmacy_products_delete->PackingCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->PackingCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ComputedMinStock->Visible) { // ComputedMinStock ?>
		<td <?php echo $pharmacy_products_delete->ComputedMinStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock">
<span<?php echo $pharmacy_products_delete->ComputedMinStock->viewAttributes() ?>><?php echo $pharmacy_products_delete->ComputedMinStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
		<td <?php echo $pharmacy_products_delete->ComputedMaxStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock">
<span<?php echo $pharmacy_products_delete->ComputedMaxStock->viewAttributes() ?>><?php echo $pharmacy_products_delete->ComputedMaxStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductRemark->Visible) { // ProductRemark ?>
		<td <?php echo $pharmacy_products_delete->ProductRemark->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark">
<span<?php echo $pharmacy_products_delete->ProductRemark->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductRemark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductDrugCode->Visible) { // ProductDrugCode ?>
		<td <?php echo $pharmacy_products_delete->ProductDrugCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode">
<span<?php echo $pharmacy_products_delete->ProductDrugCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductDrugCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
		<td <?php echo $pharmacy_products_delete->IsMatrixProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct">
<span<?php echo $pharmacy_products_delete->IsMatrixProduct->viewAttributes() ?>><?php echo $pharmacy_products_delete->IsMatrixProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount1->Visible) { // AttributeCount1 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1">
<span<?php echo $pharmacy_products_delete->AttributeCount1->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount2->Visible) { // AttributeCount2 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2">
<span<?php echo $pharmacy_products_delete->AttributeCount2->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount3->Visible) { // AttributeCount3 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3">
<span<?php echo $pharmacy_products_delete->AttributeCount3->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount4->Visible) { // AttributeCount4 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4">
<span<?php echo $pharmacy_products_delete->AttributeCount4->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount5->Visible) { // AttributeCount5 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5">
<span<?php echo $pharmacy_products_delete->AttributeCount5->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
		<td <?php echo $pharmacy_products_delete->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage">
<span<?php echo $pharmacy_products_delete->DefaultDiscountPercentage->viewAttributes() ?>><?php echo $pharmacy_products_delete->DefaultDiscountPercentage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
		<td <?php echo $pharmacy_products_delete->DonotPrintBarcode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode">
<span<?php echo $pharmacy_products_delete->DonotPrintBarcode->viewAttributes() ?>><?php echo $pharmacy_products_delete->DonotPrintBarcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
		<td <?php echo $pharmacy_products_delete->ProductLevelDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount">
<span<?php echo $pharmacy_products_delete->ProductLevelDiscount->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductLevelDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Markup->Visible) { // Markup ?>
		<td <?php echo $pharmacy_products_delete->Markup->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Markup" class="pharmacy_products_Markup">
<span<?php echo $pharmacy_products_delete->Markup->viewAttributes() ?>><?php echo $pharmacy_products_delete->Markup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkDown->Visible) { // MarkDown ?>
		<td <?php echo $pharmacy_products_delete->MarkDown->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown">
<span<?php echo $pharmacy_products_delete->MarkDown->viewAttributes() ?>><?php echo $pharmacy_products_delete->MarkDown->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
		<td <?php echo $pharmacy_products_delete->ReworkSalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice">
<span<?php echo $pharmacy_products_delete->ReworkSalePrice->viewAttributes() ?>><?php echo $pharmacy_products_delete->ReworkSalePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MultipleInput->Visible) { // MultipleInput ?>
		<td <?php echo $pharmacy_products_delete->MultipleInput->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput">
<span<?php echo $pharmacy_products_delete->MultipleInput->viewAttributes() ?>><?php echo $pharmacy_products_delete->MultipleInput->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->LpPackageInformation->Visible) { // LpPackageInformation ?>
		<td <?php echo $pharmacy_products_delete->LpPackageInformation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation">
<span<?php echo $pharmacy_products_delete->LpPackageInformation->viewAttributes() ?>><?php echo $pharmacy_products_delete->LpPackageInformation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
		<td <?php echo $pharmacy_products_delete->AllowNegativeStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock">
<span<?php echo $pharmacy_products_delete->AllowNegativeStock->viewAttributes() ?>><?php echo $pharmacy_products_delete->AllowNegativeStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderDate->Visible) { // OrderDate ?>
		<td <?php echo $pharmacy_products_delete->OrderDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate">
<span<?php echo $pharmacy_products_delete->OrderDate->viewAttributes() ?>><?php echo $pharmacy_products_delete->OrderDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderTime->Visible) { // OrderTime ?>
		<td <?php echo $pharmacy_products_delete->OrderTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime">
<span<?php echo $pharmacy_products_delete->OrderTime->viewAttributes() ?>><?php echo $pharmacy_products_delete->OrderTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->RateGroupCode->Visible) { // RateGroupCode ?>
		<td <?php echo $pharmacy_products_delete->RateGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode">
<span<?php echo $pharmacy_products_delete->RateGroupCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->RateGroupCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
		<td <?php echo $pharmacy_products_delete->ConversionCaseLot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot">
<span<?php echo $pharmacy_products_delete->ConversionCaseLot->viewAttributes() ?>><?php echo $pharmacy_products_delete->ConversionCaseLot->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ShippingLot->Visible) { // ShippingLot ?>
		<td <?php echo $pharmacy_products_delete->ShippingLot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot">
<span<?php echo $pharmacy_products_delete->ShippingLot->viewAttributes() ?>><?php echo $pharmacy_products_delete->ShippingLot->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
		<td <?php echo $pharmacy_products_delete->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement">
<span<?php echo $pharmacy_products_delete->AllowExpiryReplacement->viewAttributes() ?>><?php echo $pharmacy_products_delete->AllowExpiryReplacement->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
		<td <?php echo $pharmacy_products_delete->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed">
<span<?php echo $pharmacy_products_delete->NoOfMonthExpiryAllowed->viewAttributes() ?>><?php echo $pharmacy_products_delete->NoOfMonthExpiryAllowed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
		<td <?php echo $pharmacy_products_delete->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility">
<span<?php echo $pharmacy_products_delete->ProductDiscountEligibility->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductDiscountEligibility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
		<td <?php echo $pharmacy_products_delete->ScheduleTypeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode">
<span<?php echo $pharmacy_products_delete->ScheduleTypeCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ScheduleTypeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
		<td <?php echo $pharmacy_products_delete->AIOCDProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode">
<span<?php echo $pharmacy_products_delete->AIOCDProductCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->AIOCDProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeQuantity->Visible) { // FreeQuantity ?>
		<td <?php echo $pharmacy_products_delete->FreeQuantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity">
<span<?php echo $pharmacy_products_delete->FreeQuantity->viewAttributes() ?>><?php echo $pharmacy_products_delete->FreeQuantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DiscountType->Visible) { // DiscountType ?>
		<td <?php echo $pharmacy_products_delete->DiscountType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType">
<span<?php echo $pharmacy_products_delete->DiscountType->viewAttributes() ?>><?php echo $pharmacy_products_delete->DiscountType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DiscountValue->Visible) { // DiscountValue ?>
		<td <?php echo $pharmacy_products_delete->DiscountValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue">
<span<?php echo $pharmacy_products_delete->DiscountValue->viewAttributes() ?>><?php echo $pharmacy_products_delete->DiscountValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
		<td <?php echo $pharmacy_products_delete->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute">
<span<?php echo $pharmacy_products_delete->HasProductOrderAttribute->viewAttributes() ?>><?php echo $pharmacy_products_delete->HasProductOrderAttribute->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FirstPODate->Visible) { // FirstPODate ?>
		<td <?php echo $pharmacy_products_delete->FirstPODate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate">
<span<?php echo $pharmacy_products_delete->FirstPODate->viewAttributes() ?>><?php echo $pharmacy_products_delete->FirstPODate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
		<td <?php echo $pharmacy_products_delete->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent">
<span<?php echo $pharmacy_products_delete->SaleprcieAndMrpCalcPercent->viewAttributes() ?>><?php echo $pharmacy_products_delete->SaleprcieAndMrpCalcPercent->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
		<td <?php echo $pharmacy_products_delete->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts">
<span<?php echo $pharmacy_products_delete->IsGiftVoucherProducts->viewAttributes() ?>><?php echo $pharmacy_products_delete->IsGiftVoucherProducts->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
		<td <?php echo $pharmacy_products_delete->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber">
<span<?php echo $pharmacy_products_delete->AcceptRange4SerialNumber->viewAttributes() ?>><?php echo $pharmacy_products_delete->AcceptRange4SerialNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
		<td <?php echo $pharmacy_products_delete->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination">
<span<?php echo $pharmacy_products_delete->GiftVoucherDenomination->viewAttributes() ?>><?php echo $pharmacy_products_delete->GiftVoucherDenomination->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Subclasscode->Visible) { // Subclasscode ?>
		<td <?php echo $pharmacy_products_delete->Subclasscode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode">
<span<?php echo $pharmacy_products_delete->Subclasscode->viewAttributes() ?>><?php echo $pharmacy_products_delete->Subclasscode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
		<td <?php echo $pharmacy_products_delete->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine">
<span<?php echo $pharmacy_products_delete->BarCodeFromWeighingMachine->viewAttributes() ?>><?php echo $pharmacy_products_delete->BarCodeFromWeighingMachine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
		<td <?php echo $pharmacy_products_delete->CheckCostInReturn->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn">
<span<?php echo $pharmacy_products_delete->CheckCostInReturn->viewAttributes() ?>><?php echo $pharmacy_products_delete->CheckCostInReturn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
		<td <?php echo $pharmacy_products_delete->FrequentSaleProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct">
<span<?php echo $pharmacy_products_delete->FrequentSaleProduct->viewAttributes() ?>><?php echo $pharmacy_products_delete->FrequentSaleProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->RateType->Visible) { // RateType ?>
		<td <?php echo $pharmacy_products_delete->RateType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_RateType" class="pharmacy_products_RateType">
<span<?php echo $pharmacy_products_delete->RateType->viewAttributes() ?>><?php echo $pharmacy_products_delete->RateType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TouchscreenName->Visible) { // TouchscreenName ?>
		<td <?php echo $pharmacy_products_delete->TouchscreenName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName">
<span<?php echo $pharmacy_products_delete->TouchscreenName->viewAttributes() ?>><?php echo $pharmacy_products_delete->TouchscreenName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeType->Visible) { // FreeType ?>
		<td <?php echo $pharmacy_products_delete->FreeType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FreeType" class="pharmacy_products_FreeType">
<span<?php echo $pharmacy_products_delete->FreeType->viewAttributes() ?>><?php echo $pharmacy_products_delete->FreeType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
		<td <?php echo $pharmacy_products_delete->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch">
<span<?php echo $pharmacy_products_delete->LooseQtyasNewBatch->viewAttributes() ?>><?php echo $pharmacy_products_delete->LooseQtyasNewBatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
		<td <?php echo $pharmacy_products_delete->AllowSlabBilling->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling">
<span<?php echo $pharmacy_products_delete->AllowSlabBilling->viewAttributes() ?>><?php echo $pharmacy_products_delete->AllowSlabBilling->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
		<td <?php echo $pharmacy_products_delete->ProductTypeForProduction->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction">
<span<?php echo $pharmacy_products_delete->ProductTypeForProduction->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductTypeForProduction->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->RecipeCode->Visible) { // RecipeCode ?>
		<td <?php echo $pharmacy_products_delete->RecipeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode">
<span<?php echo $pharmacy_products_delete->RecipeCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->RecipeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultUnitType->Visible) { // DefaultUnitType ?>
		<td <?php echo $pharmacy_products_delete->DefaultUnitType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType">
<span<?php echo $pharmacy_products_delete->DefaultUnitType->viewAttributes() ?>><?php echo $pharmacy_products_delete->DefaultUnitType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PIstatus->Visible) { // PIstatus ?>
		<td <?php echo $pharmacy_products_delete->PIstatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus">
<span<?php echo $pharmacy_products_delete->PIstatus->viewAttributes() ?>><?php echo $pharmacy_products_delete->PIstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
		<td <?php echo $pharmacy_products_delete->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate">
<span<?php echo $pharmacy_products_delete->LastPiConfirmedDate->viewAttributes() ?>><?php echo $pharmacy_products_delete->LastPiConfirmedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BarCodeDesign->Visible) { // BarCodeDesign ?>
		<td <?php echo $pharmacy_products_delete->BarCodeDesign->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign">
<span<?php echo $pharmacy_products_delete->BarCodeDesign->viewAttributes() ?>><?php echo $pharmacy_products_delete->BarCodeDesign->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
		<td <?php echo $pharmacy_products_delete->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill">
<span<?php echo $pharmacy_products_delete->AcceptRemarksInBill->viewAttributes() ?>><?php echo $pharmacy_products_delete->AcceptRemarksInBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Classification->Visible) { // Classification ?>
		<td <?php echo $pharmacy_products_delete->Classification->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Classification" class="pharmacy_products_Classification">
<span<?php echo $pharmacy_products_delete->Classification->viewAttributes() ?>><?php echo $pharmacy_products_delete->Classification->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TimeSlot->Visible) { // TimeSlot ?>
		<td <?php echo $pharmacy_products_delete->TimeSlot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot">
<span<?php echo $pharmacy_products_delete->TimeSlot->viewAttributes() ?>><?php echo $pharmacy_products_delete->TimeSlot->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IsBundle->Visible) { // IsBundle ?>
		<td <?php echo $pharmacy_products_delete->IsBundle->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle">
<span<?php echo $pharmacy_products_delete->IsBundle->viewAttributes() ?>><?php echo $pharmacy_products_delete->IsBundle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ColorCode->Visible) { // ColorCode ?>
		<td <?php echo $pharmacy_products_delete->ColorCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode">
<span<?php echo $pharmacy_products_delete->ColorCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ColorCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->GenderCode->Visible) { // GenderCode ?>
		<td <?php echo $pharmacy_products_delete->GenderCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode">
<span<?php echo $pharmacy_products_delete->GenderCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->GenderCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SizeCode->Visible) { // SizeCode ?>
		<td <?php echo $pharmacy_products_delete->SizeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode">
<span<?php echo $pharmacy_products_delete->SizeCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->SizeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->GiftCard->Visible) { // GiftCard ?>
		<td <?php echo $pharmacy_products_delete->GiftCard->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard">
<span<?php echo $pharmacy_products_delete->GiftCard->viewAttributes() ?>><?php echo $pharmacy_products_delete->GiftCard->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ToonLabel->Visible) { // ToonLabel ?>
		<td <?php echo $pharmacy_products_delete->ToonLabel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel">
<span<?php echo $pharmacy_products_delete->ToonLabel->viewAttributes() ?>><?php echo $pharmacy_products_delete->ToonLabel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->GarmentType->Visible) { // GarmentType ?>
		<td <?php echo $pharmacy_products_delete->GarmentType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType">
<span<?php echo $pharmacy_products_delete->GarmentType->viewAttributes() ?>><?php echo $pharmacy_products_delete->GarmentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AgeGroup->Visible) { // AgeGroup ?>
		<td <?php echo $pharmacy_products_delete->AgeGroup->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup">
<span<?php echo $pharmacy_products_delete->AgeGroup->viewAttributes() ?>><?php echo $pharmacy_products_delete->AgeGroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Season->Visible) { // Season ?>
		<td <?php echo $pharmacy_products_delete->Season->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Season" class="pharmacy_products_Season">
<span<?php echo $pharmacy_products_delete->Season->viewAttributes() ?>><?php echo $pharmacy_products_delete->Season->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DailyStockEntry->Visible) { // DailyStockEntry ?>
		<td <?php echo $pharmacy_products_delete->DailyStockEntry->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry">
<span<?php echo $pharmacy_products_delete->DailyStockEntry->viewAttributes() ?>><?php echo $pharmacy_products_delete->DailyStockEntry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ModifierApplicable->Visible) { // ModifierApplicable ?>
		<td <?php echo $pharmacy_products_delete->ModifierApplicable->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable">
<span<?php echo $pharmacy_products_delete->ModifierApplicable->viewAttributes() ?>><?php echo $pharmacy_products_delete->ModifierApplicable->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ModifierType->Visible) { // ModifierType ?>
		<td <?php echo $pharmacy_products_delete->ModifierType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType">
<span<?php echo $pharmacy_products_delete->ModifierType->viewAttributes() ?>><?php echo $pharmacy_products_delete->ModifierType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
		<td <?php echo $pharmacy_products_delete->AcceptZeroRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate">
<span<?php echo $pharmacy_products_delete->AcceptZeroRate->viewAttributes() ?>><?php echo $pharmacy_products_delete->AcceptZeroRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
		<td <?php echo $pharmacy_products_delete->ExciseDutyCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode">
<span<?php echo $pharmacy_products_delete->ExciseDutyCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ExciseDutyCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
		<td <?php echo $pharmacy_products_delete->IndentProductGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode">
<span<?php echo $pharmacy_products_delete->IndentProductGroupCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->IndentProductGroupCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IsMultiBatch->Visible) { // IsMultiBatch ?>
		<td <?php echo $pharmacy_products_delete->IsMultiBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch">
<span<?php echo $pharmacy_products_delete->IsMultiBatch->viewAttributes() ?>><?php echo $pharmacy_products_delete->IsMultiBatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IsSingleBatch->Visible) { // IsSingleBatch ?>
		<td <?php echo $pharmacy_products_delete->IsSingleBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch">
<span<?php echo $pharmacy_products_delete->IsSingleBatch->viewAttributes() ?>><?php echo $pharmacy_products_delete->IsSingleBatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkUpRate1->Visible) { // MarkUpRate1 ?>
		<td <?php echo $pharmacy_products_delete->MarkUpRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1">
<span<?php echo $pharmacy_products_delete->MarkUpRate1->viewAttributes() ?>><?php echo $pharmacy_products_delete->MarkUpRate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkDownRate1->Visible) { // MarkDownRate1 ?>
		<td <?php echo $pharmacy_products_delete->MarkDownRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1">
<span<?php echo $pharmacy_products_delete->MarkDownRate1->viewAttributes() ?>><?php echo $pharmacy_products_delete->MarkDownRate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkUpRate2->Visible) { // MarkUpRate2 ?>
		<td <?php echo $pharmacy_products_delete->MarkUpRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2">
<span<?php echo $pharmacy_products_delete->MarkUpRate2->viewAttributes() ?>><?php echo $pharmacy_products_delete->MarkUpRate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MarkDownRate2->Visible) { // MarkDownRate2 ?>
		<td <?php echo $pharmacy_products_delete->MarkDownRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2">
<span<?php echo $pharmacy_products_delete->MarkDownRate2->viewAttributes() ?>><?php echo $pharmacy_products_delete->MarkDownRate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->_Yield->Visible) { // Yield ?>
		<td <?php echo $pharmacy_products_delete->_Yield->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products__Yield" class="pharmacy_products__Yield">
<span<?php echo $pharmacy_products_delete->_Yield->viewAttributes() ?>><?php echo $pharmacy_products_delete->_Yield->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->RefProductCode->Visible) { // RefProductCode ?>
		<td <?php echo $pharmacy_products_delete->RefProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode">
<span<?php echo $pharmacy_products_delete->RefProductCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->RefProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Volume->Visible) { // Volume ?>
		<td <?php echo $pharmacy_products_delete->Volume->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Volume" class="pharmacy_products_Volume">
<span<?php echo $pharmacy_products_delete->Volume->viewAttributes() ?>><?php echo $pharmacy_products_delete->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MeasurementID->Visible) { // MeasurementID ?>
		<td <?php echo $pharmacy_products_delete->MeasurementID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID">
<span<?php echo $pharmacy_products_delete->MeasurementID->viewAttributes() ?>><?php echo $pharmacy_products_delete->MeasurementID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CountryCode->Visible) { // CountryCode ?>
		<td <?php echo $pharmacy_products_delete->CountryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode">
<span<?php echo $pharmacy_products_delete->CountryCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->CountryCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AcceptWMQty->Visible) { // AcceptWMQty ?>
		<td <?php echo $pharmacy_products_delete->AcceptWMQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty">
<span<?php echo $pharmacy_products_delete->AcceptWMQty->viewAttributes() ?>><?php echo $pharmacy_products_delete->AcceptWMQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
		<td <?php echo $pharmacy_products_delete->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate">
<span<?php echo $pharmacy_products_delete->SingleBatchBasedOnRate->viewAttributes() ?>><?php echo $pharmacy_products_delete->SingleBatchBasedOnRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TenderNo->Visible) { // TenderNo ?>
		<td <?php echo $pharmacy_products_delete->TenderNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo">
<span<?php echo $pharmacy_products_delete->TenderNo->viewAttributes() ?>><?php echo $pharmacy_products_delete->TenderNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
		<td <?php echo $pharmacy_products_delete->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled">
<span<?php echo $pharmacy_products_delete->SingleBillMaximumSoldQtyFiled->viewAttributes() ?>><?php echo $pharmacy_products_delete->SingleBillMaximumSoldQtyFiled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength1->Visible) { // Strength1 ?>
		<td <?php echo $pharmacy_products_delete->Strength1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Strength1" class="pharmacy_products_Strength1">
<span<?php echo $pharmacy_products_delete->Strength1->viewAttributes() ?>><?php echo $pharmacy_products_delete->Strength1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength2->Visible) { // Strength2 ?>
		<td <?php echo $pharmacy_products_delete->Strength2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Strength2" class="pharmacy_products_Strength2">
<span<?php echo $pharmacy_products_delete->Strength2->viewAttributes() ?>><?php echo $pharmacy_products_delete->Strength2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength3->Visible) { // Strength3 ?>
		<td <?php echo $pharmacy_products_delete->Strength3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Strength3" class="pharmacy_products_Strength3">
<span<?php echo $pharmacy_products_delete->Strength3->viewAttributes() ?>><?php echo $pharmacy_products_delete->Strength3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength4->Visible) { // Strength4 ?>
		<td <?php echo $pharmacy_products_delete->Strength4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Strength4" class="pharmacy_products_Strength4">
<span<?php echo $pharmacy_products_delete->Strength4->viewAttributes() ?>><?php echo $pharmacy_products_delete->Strength4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->Strength5->Visible) { // Strength5 ?>
		<td <?php echo $pharmacy_products_delete->Strength5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_Strength5" class="pharmacy_products_Strength5">
<span<?php echo $pharmacy_products_delete->Strength5->viewAttributes() ?>><?php echo $pharmacy_products_delete->Strength5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode1->Visible) { // IngredientCode1 ?>
		<td <?php echo $pharmacy_products_delete->IngredientCode1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1">
<span<?php echo $pharmacy_products_delete->IngredientCode1->viewAttributes() ?>><?php echo $pharmacy_products_delete->IngredientCode1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode2->Visible) { // IngredientCode2 ?>
		<td <?php echo $pharmacy_products_delete->IngredientCode2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2">
<span<?php echo $pharmacy_products_delete->IngredientCode2->viewAttributes() ?>><?php echo $pharmacy_products_delete->IngredientCode2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode3->Visible) { // IngredientCode3 ?>
		<td <?php echo $pharmacy_products_delete->IngredientCode3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3">
<span<?php echo $pharmacy_products_delete->IngredientCode3->viewAttributes() ?>><?php echo $pharmacy_products_delete->IngredientCode3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode4->Visible) { // IngredientCode4 ?>
		<td <?php echo $pharmacy_products_delete->IngredientCode4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4">
<span<?php echo $pharmacy_products_delete->IngredientCode4->viewAttributes() ?>><?php echo $pharmacy_products_delete->IngredientCode4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IngredientCode5->Visible) { // IngredientCode5 ?>
		<td <?php echo $pharmacy_products_delete->IngredientCode5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5">
<span<?php echo $pharmacy_products_delete->IngredientCode5->viewAttributes() ?>><?php echo $pharmacy_products_delete->IngredientCode5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->OrderType->Visible) { // OrderType ?>
		<td <?php echo $pharmacy_products_delete->OrderType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_OrderType" class="pharmacy_products_OrderType">
<span<?php echo $pharmacy_products_delete->OrderType->viewAttributes() ?>><?php echo $pharmacy_products_delete->OrderType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->StockUOM->Visible) { // StockUOM ?>
		<td <?php echo $pharmacy_products_delete->StockUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM">
<span<?php echo $pharmacy_products_delete->StockUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->StockUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PriceUOM->Visible) { // PriceUOM ?>
		<td <?php echo $pharmacy_products_delete->PriceUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM">
<span<?php echo $pharmacy_products_delete->PriceUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->PriceUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
		<td <?php echo $pharmacy_products_delete->DefaultSaleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM">
<span<?php echo $pharmacy_products_delete->DefaultSaleUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->DefaultSaleUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
		<td <?php echo $pharmacy_products_delete->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM">
<span<?php echo $pharmacy_products_delete->DefaultPurchaseUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->DefaultPurchaseUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ReportingUOM->Visible) { // ReportingUOM ?>
		<td <?php echo $pharmacy_products_delete->ReportingUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM">
<span<?php echo $pharmacy_products_delete->ReportingUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->ReportingUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
		<td <?php echo $pharmacy_products_delete->LastPurchasedUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM">
<span<?php echo $pharmacy_products_delete->LastPurchasedUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->LastPurchasedUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TreatmentCodes->Visible) { // TreatmentCodes ?>
		<td <?php echo $pharmacy_products_delete->TreatmentCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes">
<span<?php echo $pharmacy_products_delete->TreatmentCodes->viewAttributes() ?>><?php echo $pharmacy_products_delete->TreatmentCodes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->InsuranceType->Visible) { // InsuranceType ?>
		<td <?php echo $pharmacy_products_delete->InsuranceType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType">
<span<?php echo $pharmacy_products_delete->InsuranceType->viewAttributes() ?>><?php echo $pharmacy_products_delete->InsuranceType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
		<td <?php echo $pharmacy_products_delete->CoverageGroupCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes">
<span<?php echo $pharmacy_products_delete->CoverageGroupCodes->viewAttributes() ?>><?php echo $pharmacy_products_delete->CoverageGroupCodes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MultipleUOM->Visible) { // MultipleUOM ?>
		<td <?php echo $pharmacy_products_delete->MultipleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM">
<span<?php echo $pharmacy_products_delete->MultipleUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->MultipleUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SalePriceComputation->Visible) { // SalePriceComputation ?>
		<td <?php echo $pharmacy_products_delete->SalePriceComputation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation">
<span<?php echo $pharmacy_products_delete->SalePriceComputation->viewAttributes() ?>><?php echo $pharmacy_products_delete->SalePriceComputation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->StockCorrection->Visible) { // StockCorrection ?>
		<td <?php echo $pharmacy_products_delete->StockCorrection->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection">
<span<?php echo $pharmacy_products_delete->StockCorrection->viewAttributes() ?>><?php echo $pharmacy_products_delete->StockCorrection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->LBTPercentage->Visible) { // LBTPercentage ?>
		<td <?php echo $pharmacy_products_delete->LBTPercentage->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage">
<span<?php echo $pharmacy_products_delete->LBTPercentage->viewAttributes() ?>><?php echo $pharmacy_products_delete->LBTPercentage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->SalesCommission->Visible) { // SalesCommission ?>
		<td <?php echo $pharmacy_products_delete->SalesCommission->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission">
<span<?php echo $pharmacy_products_delete->SalesCommission->viewAttributes() ?>><?php echo $pharmacy_products_delete->SalesCommission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->LockedStock->Visible) { // LockedStock ?>
		<td <?php echo $pharmacy_products_delete->LockedStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock">
<span<?php echo $pharmacy_products_delete->LockedStock->viewAttributes() ?>><?php echo $pharmacy_products_delete->LockedStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MinMaxUOM->Visible) { // MinMaxUOM ?>
		<td <?php echo $pharmacy_products_delete->MinMaxUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM">
<span<?php echo $pharmacy_products_delete->MinMaxUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->MinMaxUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
		<td <?php echo $pharmacy_products_delete->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat">
<span<?php echo $pharmacy_products_delete->ExpiryMfrDateFormat->viewAttributes() ?>><?php echo $pharmacy_products_delete->ExpiryMfrDateFormat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ProductLifeTime->Visible) { // ProductLifeTime ?>
		<td <?php echo $pharmacy_products_delete->ProductLifeTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime">
<span<?php echo $pharmacy_products_delete->ProductLifeTime->viewAttributes() ?>><?php echo $pharmacy_products_delete->ProductLifeTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IsCombo->Visible) { // IsCombo ?>
		<td <?php echo $pharmacy_products_delete->IsCombo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo">
<span<?php echo $pharmacy_products_delete->IsCombo->viewAttributes() ?>><?php echo $pharmacy_products_delete->IsCombo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ComboTypeCode->Visible) { // ComboTypeCode ?>
		<td <?php echo $pharmacy_products_delete->ComboTypeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode">
<span<?php echo $pharmacy_products_delete->ComboTypeCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->ComboTypeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount6->Visible) { // AttributeCount6 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount6->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6">
<span<?php echo $pharmacy_products_delete->AttributeCount6->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount7->Visible) { // AttributeCount7 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount7->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7">
<span<?php echo $pharmacy_products_delete->AttributeCount7->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount8->Visible) { // AttributeCount8 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount8->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8">
<span<?php echo $pharmacy_products_delete->AttributeCount8->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount9->Visible) { // AttributeCount9 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount9->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9">
<span<?php echo $pharmacy_products_delete->AttributeCount9->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AttributeCount10->Visible) { // AttributeCount10 ?>
		<td <?php echo $pharmacy_products_delete->AttributeCount10->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10">
<span<?php echo $pharmacy_products_delete->AttributeCount10->viewAttributes() ?>><?php echo $pharmacy_products_delete->AttributeCount10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->LabourCharge->Visible) { // LabourCharge ?>
		<td <?php echo $pharmacy_products_delete->LabourCharge->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge">
<span<?php echo $pharmacy_products_delete->LabourCharge->viewAttributes() ?>><?php echo $pharmacy_products_delete->LabourCharge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
		<td <?php echo $pharmacy_products_delete->AffectOtherCharge->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge">
<span<?php echo $pharmacy_products_delete->AffectOtherCharge->viewAttributes() ?>><?php echo $pharmacy_products_delete->AffectOtherCharge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DosageInfo->Visible) { // DosageInfo ?>
		<td <?php echo $pharmacy_products_delete->DosageInfo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo">
<span<?php echo $pharmacy_products_delete->DosageInfo->viewAttributes() ?>><?php echo $pharmacy_products_delete->DosageInfo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DosageType->Visible) { // DosageType ?>
		<td <?php echo $pharmacy_products_delete->DosageType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DosageType" class="pharmacy_products_DosageType">
<span<?php echo $pharmacy_products_delete->DosageType->viewAttributes() ?>><?php echo $pharmacy_products_delete->DosageType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
		<td <?php echo $pharmacy_products_delete->DefaultIndentUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM">
<span<?php echo $pharmacy_products_delete->DefaultIndentUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->DefaultIndentUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PromoTag->Visible) { // PromoTag ?>
		<td <?php echo $pharmacy_products_delete->PromoTag->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag">
<span<?php echo $pharmacy_products_delete->PromoTag->viewAttributes() ?>><?php echo $pharmacy_products_delete->PromoTag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
		<td <?php echo $pharmacy_products_delete->BillLevelPromoTag->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag">
<span<?php echo $pharmacy_products_delete->BillLevelPromoTag->viewAttributes() ?>><?php echo $pharmacy_products_delete->BillLevelPromoTag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->IsMRPProduct->Visible) { // IsMRPProduct ?>
		<td <?php echo $pharmacy_products_delete->IsMRPProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct">
<span<?php echo $pharmacy_products_delete->IsMRPProduct->viewAttributes() ?>><?php echo $pharmacy_products_delete->IsMRPProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
		<td <?php echo $pharmacy_products_delete->AlternateSaleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM">
<span<?php echo $pharmacy_products_delete->AlternateSaleUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->AlternateSaleUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FreeUOM->Visible) { // FreeUOM ?>
		<td <?php echo $pharmacy_products_delete->FreeUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM">
<span<?php echo $pharmacy_products_delete->FreeUOM->viewAttributes() ?>><?php echo $pharmacy_products_delete->FreeUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MarketedCode->Visible) { // MarketedCode ?>
		<td <?php echo $pharmacy_products_delete->MarketedCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode">
<span<?php echo $pharmacy_products_delete->MarketedCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->MarketedCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
		<td <?php echo $pharmacy_products_delete->MinimumSalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice">
<span<?php echo $pharmacy_products_delete->MinimumSalePrice->viewAttributes() ?>><?php echo $pharmacy_products_delete->MinimumSalePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PRate1->Visible) { // PRate1 ?>
		<td <?php echo $pharmacy_products_delete->PRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PRate1" class="pharmacy_products_PRate1">
<span<?php echo $pharmacy_products_delete->PRate1->viewAttributes() ?>><?php echo $pharmacy_products_delete->PRate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->PRate2->Visible) { // PRate2 ?>
		<td <?php echo $pharmacy_products_delete->PRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_PRate2" class="pharmacy_products_PRate2">
<span<?php echo $pharmacy_products_delete->PRate2->viewAttributes() ?>><?php echo $pharmacy_products_delete->PRate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->LPItemCost->Visible) { // LPItemCost ?>
		<td <?php echo $pharmacy_products_delete->LPItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost">
<span<?php echo $pharmacy_products_delete->LPItemCost->viewAttributes() ?>><?php echo $pharmacy_products_delete->LPItemCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->FixedItemCost->Visible) { // FixedItemCost ?>
		<td <?php echo $pharmacy_products_delete->FixedItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost">
<span<?php echo $pharmacy_products_delete->FixedItemCost->viewAttributes() ?>><?php echo $pharmacy_products_delete->FixedItemCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->HSNId->Visible) { // HSNId ?>
		<td <?php echo $pharmacy_products_delete->HSNId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_HSNId" class="pharmacy_products_HSNId">
<span<?php echo $pharmacy_products_delete->HSNId->viewAttributes() ?>><?php echo $pharmacy_products_delete->HSNId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->TaxInclusive->Visible) { // TaxInclusive ?>
		<td <?php echo $pharmacy_products_delete->TaxInclusive->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive">
<span<?php echo $pharmacy_products_delete->TaxInclusive->viewAttributes() ?>><?php echo $pharmacy_products_delete->TaxInclusive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
		<td <?php echo $pharmacy_products_delete->EligibleforWarranty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty">
<span<?php echo $pharmacy_products_delete->EligibleforWarranty->viewAttributes() ?>><?php echo $pharmacy_products_delete->EligibleforWarranty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
		<td <?php echo $pharmacy_products_delete->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty">
<span<?php echo $pharmacy_products_delete->NoofMonthsWarranty->viewAttributes() ?>><?php echo $pharmacy_products_delete->NoofMonthsWarranty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
		<td <?php echo $pharmacy_products_delete->ComputeTaxonCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost">
<span<?php echo $pharmacy_products_delete->ComputeTaxonCost->viewAttributes() ?>><?php echo $pharmacy_products_delete->ComputeTaxonCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
		<td <?php echo $pharmacy_products_delete->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack">
<span<?php echo $pharmacy_products_delete->HasEmptyBottleTrack->viewAttributes() ?>><?php echo $pharmacy_products_delete->HasEmptyBottleTrack->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
		<td <?php echo $pharmacy_products_delete->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode">
<span<?php echo $pharmacy_products_delete->EmptyBottleReferenceCode->viewAttributes() ?>><?php echo $pharmacy_products_delete->EmptyBottleReferenceCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
		<td <?php echo $pharmacy_products_delete->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount">
<span<?php echo $pharmacy_products_delete->AdditionalCESSAmount->viewAttributes() ?>><?php echo $pharmacy_products_delete->AdditionalCESSAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products_delete->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
		<td <?php echo $pharmacy_products_delete->EmptyBottleRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCount ?>_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate">
<span<?php echo $pharmacy_products_delete->EmptyBottleRate->viewAttributes() ?>><?php echo $pharmacy_products_delete->EmptyBottleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_products_delete->Recordset->moveNext();
}
$pharmacy_products_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_products_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_products_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_products_delete->terminate();
?>
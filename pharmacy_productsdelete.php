<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_productsdelete = currentForm = new ew.Form("fpharmacy_productsdelete", "delete");

// Form_CustomValidate event
fpharmacy_productsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_productsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_products_delete->showPageHeader(); ?>
<?php
$pharmacy_products_delete->showMessage();
?>
<form name="fpharmacy_productsdelete" id="fpharmacy_productsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_products_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_products_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_products_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_products->ProductCode->Visible) { // ProductCode ?>
		<th class="<?php echo $pharmacy_products->ProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode"><?php echo $pharmacy_products->ProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductName->Visible) { // ProductName ?>
		<th class="<?php echo $pharmacy_products->ProductName->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductName" class="pharmacy_products_ProductName"><?php echo $pharmacy_products->ProductName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DivisionCode->Visible) { // DivisionCode ?>
		<th class="<?php echo $pharmacy_products->DivisionCode->headerCellClass() ?>"><span id="elh_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode"><?php echo $pharmacy_products->DivisionCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ManufacturerCode->Visible) { // ManufacturerCode ?>
		<th class="<?php echo $pharmacy_products->ManufacturerCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode"><?php echo $pharmacy_products->ManufacturerCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SupplierCode->Visible) { // SupplierCode ?>
		<th class="<?php echo $pharmacy_products->SupplierCode->headerCellClass() ?>"><span id="elh_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode"><?php echo $pharmacy_products->SupplierCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
		<th class="<?php echo $pharmacy_products->AlternateSupplierCodes->headerCellClass() ?>"><span id="elh_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes"><?php echo $pharmacy_products->AlternateSupplierCodes->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AlternateProductCode->Visible) { // AlternateProductCode ?>
		<th class="<?php echo $pharmacy_products->AlternateProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode"><?php echo $pharmacy_products->AlternateProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->UniversalProductCode->Visible) { // UniversalProductCode ?>
		<th class="<?php echo $pharmacy_products->UniversalProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode"><?php echo $pharmacy_products->UniversalProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BookProductCode->Visible) { // BookProductCode ?>
		<th class="<?php echo $pharmacy_products->BookProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode"><?php echo $pharmacy_products->BookProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->OldCode->Visible) { // OldCode ?>
		<th class="<?php echo $pharmacy_products->OldCode->headerCellClass() ?>"><span id="elh_pharmacy_products_OldCode" class="pharmacy_products_OldCode"><?php echo $pharmacy_products->OldCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProtectedProducts->Visible) { // ProtectedProducts ?>
		<th class="<?php echo $pharmacy_products->ProtectedProducts->headerCellClass() ?>"><span id="elh_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts"><?php echo $pharmacy_products->ProtectedProducts->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductFullName->Visible) { // ProductFullName ?>
		<th class="<?php echo $pharmacy_products->ProductFullName->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName"><?php echo $pharmacy_products->ProductFullName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
		<th class="<?php echo $pharmacy_products->UnitOfMeasure->headerCellClass() ?>"><span id="elh_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure"><?php echo $pharmacy_products->UnitOfMeasure->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->UnitDescription->Visible) { // UnitDescription ?>
		<th class="<?php echo $pharmacy_products->UnitDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription"><?php echo $pharmacy_products->UnitDescription->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BulkDescription->Visible) { // BulkDescription ?>
		<th class="<?php echo $pharmacy_products->BulkDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription"><?php echo $pharmacy_products->BulkDescription->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDescription->Visible) { // BarCodeDescription ?>
		<th class="<?php echo $pharmacy_products->BarCodeDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription"><?php echo $pharmacy_products->BarCodeDescription->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PackageInformation->Visible) { // PackageInformation ?>
		<th class="<?php echo $pharmacy_products->PackageInformation->headerCellClass() ?>"><span id="elh_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation"><?php echo $pharmacy_products->PackageInformation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PackageId->Visible) { // PackageId ?>
		<th class="<?php echo $pharmacy_products->PackageId->headerCellClass() ?>"><span id="elh_pharmacy_products_PackageId" class="pharmacy_products_PackageId"><?php echo $pharmacy_products->PackageId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Weight->Visible) { // Weight ?>
		<th class="<?php echo $pharmacy_products->Weight->headerCellClass() ?>"><span id="elh_pharmacy_products_Weight" class="pharmacy_products_Weight"><?php echo $pharmacy_products->Weight->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AllowFractions->Visible) { // AllowFractions ?>
		<th class="<?php echo $pharmacy_products->AllowFractions->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions"><?php echo $pharmacy_products->AllowFractions->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
		<th class="<?php echo $pharmacy_products->MinimumStockLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel"><?php echo $pharmacy_products->MinimumStockLevel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
		<th class="<?php echo $pharmacy_products->MaximumStockLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel"><?php echo $pharmacy_products->MaximumStockLevel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ReorderLevel->Visible) { // ReorderLevel ?>
		<th class="<?php echo $pharmacy_products->ReorderLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel"><?php echo $pharmacy_products->ReorderLevel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MinMaxRatio->Visible) { // MinMaxRatio ?>
		<th class="<?php echo $pharmacy_products->MinMaxRatio->headerCellClass() ?>"><span id="elh_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio"><?php echo $pharmacy_products->MinMaxRatio->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
		<th class="<?php echo $pharmacy_products->AutoMinMaxRatio->headerCellClass() ?>"><span id="elh_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio"><?php echo $pharmacy_products->AutoMinMaxRatio->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ScheduleCode->Visible) { // ScheduleCode ?>
		<th class="<?php echo $pharmacy_products->ScheduleCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode"><?php echo $pharmacy_products->ScheduleCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->RopRatio->Visible) { // RopRatio ?>
		<th class="<?php echo $pharmacy_products->RopRatio->headerCellClass() ?>"><span id="elh_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio"><?php echo $pharmacy_products->RopRatio->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MRP->Visible) { // MRP ?>
		<th class="<?php echo $pharmacy_products->MRP->headerCellClass() ?>"><span id="elh_pharmacy_products_MRP" class="pharmacy_products_MRP"><?php echo $pharmacy_products->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PurchasePrice->Visible) { // PurchasePrice ?>
		<th class="<?php echo $pharmacy_products->PurchasePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice"><?php echo $pharmacy_products->PurchasePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PurchaseUnit->Visible) { // PurchaseUnit ?>
		<th class="<?php echo $pharmacy_products->PurchaseUnit->headerCellClass() ?>"><span id="elh_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit"><?php echo $pharmacy_products->PurchaseUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
		<th class="<?php echo $pharmacy_products->PurchaseTaxCode->headerCellClass() ?>"><span id="elh_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode"><?php echo $pharmacy_products->PurchaseTaxCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AllowDirectInward->Visible) { // AllowDirectInward ?>
		<th class="<?php echo $pharmacy_products->AllowDirectInward->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward"><?php echo $pharmacy_products->AllowDirectInward->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SalePrice->Visible) { // SalePrice ?>
		<th class="<?php echo $pharmacy_products->SalePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice"><?php echo $pharmacy_products->SalePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SaleUnit->Visible) { // SaleUnit ?>
		<th class="<?php echo $pharmacy_products->SaleUnit->headerCellClass() ?>"><span id="elh_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit"><?php echo $pharmacy_products->SaleUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SalesTaxCode->Visible) { // SalesTaxCode ?>
		<th class="<?php echo $pharmacy_products->SalesTaxCode->headerCellClass() ?>"><span id="elh_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode"><?php echo $pharmacy_products->SalesTaxCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->StockReceived->Visible) { // StockReceived ?>
		<th class="<?php echo $pharmacy_products->StockReceived->headerCellClass() ?>"><span id="elh_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived"><?php echo $pharmacy_products->StockReceived->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TotalStock->Visible) { // TotalStock ?>
		<th class="<?php echo $pharmacy_products->TotalStock->headerCellClass() ?>"><span id="elh_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock"><?php echo $pharmacy_products->TotalStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->StockType->Visible) { // StockType ?>
		<th class="<?php echo $pharmacy_products->StockType->headerCellClass() ?>"><span id="elh_pharmacy_products_StockType" class="pharmacy_products_StockType"><?php echo $pharmacy_products->StockType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->StockCheckDate->Visible) { // StockCheckDate ?>
		<th class="<?php echo $pharmacy_products->StockCheckDate->headerCellClass() ?>"><span id="elh_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate"><?php echo $pharmacy_products->StockCheckDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
		<th class="<?php echo $pharmacy_products->StockAdjustmentDate->headerCellClass() ?>"><span id="elh_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate"><?php echo $pharmacy_products->StockAdjustmentDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $pharmacy_products->Remarks->headerCellClass() ?>"><span id="elh_pharmacy_products_Remarks" class="pharmacy_products_Remarks"><?php echo $pharmacy_products->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CostCentre->Visible) { // CostCentre ?>
		<th class="<?php echo $pharmacy_products->CostCentre->headerCellClass() ?>"><span id="elh_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre"><?php echo $pharmacy_products->CostCentre->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductType->Visible) { // ProductType ?>
		<th class="<?php echo $pharmacy_products->ProductType->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductType" class="pharmacy_products_ProductType"><?php echo $pharmacy_products->ProductType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TaxAmount->Visible) { // TaxAmount ?>
		<th class="<?php echo $pharmacy_products->TaxAmount->headerCellClass() ?>"><span id="elh_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount"><?php echo $pharmacy_products->TaxAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TaxId->Visible) { // TaxId ?>
		<th class="<?php echo $pharmacy_products->TaxId->headerCellClass() ?>"><span id="elh_pharmacy_products_TaxId" class="pharmacy_products_TaxId"><?php echo $pharmacy_products->TaxId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
		<th class="<?php echo $pharmacy_products->ResaleTaxApplicable->headerCellClass() ?>"><span id="elh_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable"><?php echo $pharmacy_products->ResaleTaxApplicable->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CstOtherTax->Visible) { // CstOtherTax ?>
		<th class="<?php echo $pharmacy_products->CstOtherTax->headerCellClass() ?>"><span id="elh_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax"><?php echo $pharmacy_products->CstOtherTax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TotalTax->Visible) { // TotalTax ?>
		<th class="<?php echo $pharmacy_products->TotalTax->headerCellClass() ?>"><span id="elh_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax"><?php echo $pharmacy_products->TotalTax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ItemCost->Visible) { // ItemCost ?>
		<th class="<?php echo $pharmacy_products->ItemCost->headerCellClass() ?>"><span id="elh_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost"><?php echo $pharmacy_products->ItemCost->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ExpiryDate->Visible) { // ExpiryDate ?>
		<th class="<?php echo $pharmacy_products->ExpiryDate->headerCellClass() ?>"><span id="elh_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate"><?php echo $pharmacy_products->ExpiryDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BatchDescription->Visible) { // BatchDescription ?>
		<th class="<?php echo $pharmacy_products->BatchDescription->headerCellClass() ?>"><span id="elh_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription"><?php echo $pharmacy_products->BatchDescription->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FreeScheme->Visible) { // FreeScheme ?>
		<th class="<?php echo $pharmacy_products->FreeScheme->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme"><?php echo $pharmacy_products->FreeScheme->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
		<th class="<?php echo $pharmacy_products->CashDiscountEligibility->headerCellClass() ?>"><span id="elh_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility"><?php echo $pharmacy_products->CashDiscountEligibility->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
		<th class="<?php echo $pharmacy_products->DiscountPerAllowInBill->headerCellClass() ?>"><span id="elh_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill"><?php echo $pharmacy_products->DiscountPerAllowInBill->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Discount->Visible) { // Discount ?>
		<th class="<?php echo $pharmacy_products->Discount->headerCellClass() ?>"><span id="elh_pharmacy_products_Discount" class="pharmacy_products_Discount"><?php echo $pharmacy_products->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TotalAmount->Visible) { // TotalAmount ?>
		<th class="<?php echo $pharmacy_products->TotalAmount->headerCellClass() ?>"><span id="elh_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount"><?php echo $pharmacy_products->TotalAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->StandardMargin->Visible) { // StandardMargin ?>
		<th class="<?php echo $pharmacy_products->StandardMargin->headerCellClass() ?>"><span id="elh_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin"><?php echo $pharmacy_products->StandardMargin->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Margin->Visible) { // Margin ?>
		<th class="<?php echo $pharmacy_products->Margin->headerCellClass() ?>"><span id="elh_pharmacy_products_Margin" class="pharmacy_products_Margin"><?php echo $pharmacy_products->Margin->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MarginId->Visible) { // MarginId ?>
		<th class="<?php echo $pharmacy_products->MarginId->headerCellClass() ?>"><span id="elh_pharmacy_products_MarginId" class="pharmacy_products_MarginId"><?php echo $pharmacy_products->MarginId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ExpectedMargin->Visible) { // ExpectedMargin ?>
		<th class="<?php echo $pharmacy_products->ExpectedMargin->headerCellClass() ?>"><span id="elh_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin"><?php echo $pharmacy_products->ExpectedMargin->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
		<th class="<?php echo $pharmacy_products->SurchargeBeforeTax->headerCellClass() ?>"><span id="elh_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax"><?php echo $pharmacy_products->SurchargeBeforeTax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
		<th class="<?php echo $pharmacy_products->SurchargeAfterTax->headerCellClass() ?>"><span id="elh_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax"><?php echo $pharmacy_products->SurchargeAfterTax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TempOrderNo->Visible) { // TempOrderNo ?>
		<th class="<?php echo $pharmacy_products->TempOrderNo->headerCellClass() ?>"><span id="elh_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo"><?php echo $pharmacy_products->TempOrderNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TempOrderDate->Visible) { // TempOrderDate ?>
		<th class="<?php echo $pharmacy_products->TempOrderDate->headerCellClass() ?>"><span id="elh_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate"><?php echo $pharmacy_products->TempOrderDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->OrderUnit->Visible) { // OrderUnit ?>
		<th class="<?php echo $pharmacy_products->OrderUnit->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit"><?php echo $pharmacy_products->OrderUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->OrderQuantity->Visible) { // OrderQuantity ?>
		<th class="<?php echo $pharmacy_products->OrderQuantity->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity"><?php echo $pharmacy_products->OrderQuantity->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MarkForOrder->Visible) { // MarkForOrder ?>
		<th class="<?php echo $pharmacy_products->MarkForOrder->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder"><?php echo $pharmacy_products->MarkForOrder->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->OrderAllId->Visible) { // OrderAllId ?>
		<th class="<?php echo $pharmacy_products->OrderAllId->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId"><?php echo $pharmacy_products->OrderAllId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
		<th class="<?php echo $pharmacy_products->CalculateOrderQty->headerCellClass() ?>"><span id="elh_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty"><?php echo $pharmacy_products->CalculateOrderQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SubLocation->Visible) { // SubLocation ?>
		<th class="<?php echo $pharmacy_products->SubLocation->headerCellClass() ?>"><span id="elh_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation"><?php echo $pharmacy_products->SubLocation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CategoryCode->Visible) { // CategoryCode ?>
		<th class="<?php echo $pharmacy_products->CategoryCode->headerCellClass() ?>"><span id="elh_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode"><?php echo $pharmacy_products->CategoryCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SubCategory->Visible) { // SubCategory ?>
		<th class="<?php echo $pharmacy_products->SubCategory->headerCellClass() ?>"><span id="elh_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory"><?php echo $pharmacy_products->SubCategory->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
		<th class="<?php echo $pharmacy_products->FlexCategoryCode->headerCellClass() ?>"><span id="elh_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode"><?php echo $pharmacy_products->FlexCategoryCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleQty->Visible) { // ABCSaleQty ?>
		<th class="<?php echo $pharmacy_products->ABCSaleQty->headerCellClass() ?>"><span id="elh_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty"><?php echo $pharmacy_products->ABCSaleQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleValue->Visible) { // ABCSaleValue ?>
		<th class="<?php echo $pharmacy_products->ABCSaleValue->headerCellClass() ?>"><span id="elh_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue"><?php echo $pharmacy_products->ABCSaleValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ConvertionFactor->Visible) { // ConvertionFactor ?>
		<th class="<?php echo $pharmacy_products->ConvertionFactor->headerCellClass() ?>"><span id="elh_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor"><?php echo $pharmacy_products->ConvertionFactor->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
		<th class="<?php echo $pharmacy_products->ConvertionUnitDesc->headerCellClass() ?>"><span id="elh_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc"><?php echo $pharmacy_products->ConvertionUnitDesc->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TransactionId->Visible) { // TransactionId ?>
		<th class="<?php echo $pharmacy_products->TransactionId->headerCellClass() ?>"><span id="elh_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId"><?php echo $pharmacy_products->TransactionId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SoldProductId->Visible) { // SoldProductId ?>
		<th class="<?php echo $pharmacy_products->SoldProductId->headerCellClass() ?>"><span id="elh_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId"><?php echo $pharmacy_products->SoldProductId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->WantedBookId->Visible) { // WantedBookId ?>
		<th class="<?php echo $pharmacy_products->WantedBookId->headerCellClass() ?>"><span id="elh_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId"><?php echo $pharmacy_products->WantedBookId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AllId->Visible) { // AllId ?>
		<th class="<?php echo $pharmacy_products->AllId->headerCellClass() ?>"><span id="elh_pharmacy_products_AllId" class="pharmacy_products_AllId"><?php echo $pharmacy_products->AllId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
		<th class="<?php echo $pharmacy_products->BatchAndExpiryCompulsory->headerCellClass() ?>"><span id="elh_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory"><?php echo $pharmacy_products->BatchAndExpiryCompulsory->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
		<th class="<?php echo $pharmacy_products->BatchStockForWantedBook->headerCellClass() ?>"><span id="elh_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook"><?php echo $pharmacy_products->BatchStockForWantedBook->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
		<th class="<?php echo $pharmacy_products->UnitBasedBilling->headerCellClass() ?>"><span id="elh_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling"><?php echo $pharmacy_products->UnitBasedBilling->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
		<th class="<?php echo $pharmacy_products->DoNotCheckStock->headerCellClass() ?>"><span id="elh_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock"><?php echo $pharmacy_products->DoNotCheckStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AcceptRate->Visible) { // AcceptRate ?>
		<th class="<?php echo $pharmacy_products->AcceptRate->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate"><?php echo $pharmacy_products->AcceptRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PriceLevel->Visible) { // PriceLevel ?>
		<th class="<?php echo $pharmacy_products->PriceLevel->headerCellClass() ?>"><span id="elh_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel"><?php echo $pharmacy_products->PriceLevel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->LastQuotePrice->Visible) { // LastQuotePrice ?>
		<th class="<?php echo $pharmacy_products->LastQuotePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice"><?php echo $pharmacy_products->LastQuotePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PriceChange->Visible) { // PriceChange ?>
		<th class="<?php echo $pharmacy_products->PriceChange->headerCellClass() ?>"><span id="elh_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange"><?php echo $pharmacy_products->PriceChange->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CommodityCode->Visible) { // CommodityCode ?>
		<th class="<?php echo $pharmacy_products->CommodityCode->headerCellClass() ?>"><span id="elh_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode"><?php echo $pharmacy_products->CommodityCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->InstitutePrice->Visible) { // InstitutePrice ?>
		<th class="<?php echo $pharmacy_products->InstitutePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice"><?php echo $pharmacy_products->InstitutePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
		<th class="<?php echo $pharmacy_products->CtrlOrDCtrlProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct"><?php echo $pharmacy_products->CtrlOrDCtrlProduct->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ImportedDate->Visible) { // ImportedDate ?>
		<th class="<?php echo $pharmacy_products->ImportedDate->headerCellClass() ?>"><span id="elh_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate"><?php echo $pharmacy_products->ImportedDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IsImported->Visible) { // IsImported ?>
		<th class="<?php echo $pharmacy_products->IsImported->headerCellClass() ?>"><span id="elh_pharmacy_products_IsImported" class="pharmacy_products_IsImported"><?php echo $pharmacy_products->IsImported->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FileName->Visible) { // FileName ?>
		<th class="<?php echo $pharmacy_products->FileName->headerCellClass() ?>"><span id="elh_pharmacy_products_FileName" class="pharmacy_products_FileName"><?php echo $pharmacy_products->FileName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->GodownNumber->Visible) { // GodownNumber ?>
		<th class="<?php echo $pharmacy_products->GodownNumber->headerCellClass() ?>"><span id="elh_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber"><?php echo $pharmacy_products->GodownNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CreationDate->Visible) { // CreationDate ?>
		<th class="<?php echo $pharmacy_products->CreationDate->headerCellClass() ?>"><span id="elh_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate"><?php echo $pharmacy_products->CreationDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CreatedbyUser->Visible) { // CreatedbyUser ?>
		<th class="<?php echo $pharmacy_products->CreatedbyUser->headerCellClass() ?>"><span id="elh_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser"><?php echo $pharmacy_products->CreatedbyUser->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ModifiedDate->Visible) { // ModifiedDate ?>
		<th class="<?php echo $pharmacy_products->ModifiedDate->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate"><?php echo $pharmacy_products->ModifiedDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
		<th class="<?php echo $pharmacy_products->ModifiedbyUser->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser"><?php echo $pharmacy_products->ModifiedbyUser->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->isActive->Visible) { // isActive ?>
		<th class="<?php echo $pharmacy_products->isActive->headerCellClass() ?>"><span id="elh_pharmacy_products_isActive" class="pharmacy_products_isActive"><?php echo $pharmacy_products->isActive->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
		<th class="<?php echo $pharmacy_products->AllowExpiryClaim->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim"><?php echo $pharmacy_products->AllowExpiryClaim->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BrandCode->Visible) { // BrandCode ?>
		<th class="<?php echo $pharmacy_products->BrandCode->headerCellClass() ?>"><span id="elh_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode"><?php echo $pharmacy_products->BrandCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
		<th class="<?php echo $pharmacy_products->FreeSchemeBasedon->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon"><?php echo $pharmacy_products->FreeSchemeBasedon->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
		<th class="<?php echo $pharmacy_products->DoNotCheckCostInBill->headerCellClass() ?>"><span id="elh_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill"><?php echo $pharmacy_products->DoNotCheckCostInBill->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductGroupCode->Visible) { // ProductGroupCode ?>
		<th class="<?php echo $pharmacy_products->ProductGroupCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode"><?php echo $pharmacy_products->ProductGroupCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
		<th class="<?php echo $pharmacy_products->ProductStrengthCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode"><?php echo $pharmacy_products->ProductStrengthCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PackingCode->Visible) { // PackingCode ?>
		<th class="<?php echo $pharmacy_products->PackingCode->headerCellClass() ?>"><span id="elh_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode"><?php echo $pharmacy_products->PackingCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ComputedMinStock->Visible) { // ComputedMinStock ?>
		<th class="<?php echo $pharmacy_products->ComputedMinStock->headerCellClass() ?>"><span id="elh_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock"><?php echo $pharmacy_products->ComputedMinStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
		<th class="<?php echo $pharmacy_products->ComputedMaxStock->headerCellClass() ?>"><span id="elh_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock"><?php echo $pharmacy_products->ComputedMaxStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductRemark->Visible) { // ProductRemark ?>
		<th class="<?php echo $pharmacy_products->ProductRemark->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark"><?php echo $pharmacy_products->ProductRemark->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductDrugCode->Visible) { // ProductDrugCode ?>
		<th class="<?php echo $pharmacy_products->ProductDrugCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode"><?php echo $pharmacy_products->ProductDrugCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
		<th class="<?php echo $pharmacy_products->IsMatrixProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct"><?php echo $pharmacy_products->IsMatrixProduct->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount1->Visible) { // AttributeCount1 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount1->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1"><?php echo $pharmacy_products->AttributeCount1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount2->Visible) { // AttributeCount2 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount2->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2"><?php echo $pharmacy_products->AttributeCount2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount3->Visible) { // AttributeCount3 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount3->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3"><?php echo $pharmacy_products->AttributeCount3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount4->Visible) { // AttributeCount4 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount4->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4"><?php echo $pharmacy_products->AttributeCount4->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount5->Visible) { // AttributeCount5 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount5->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5"><?php echo $pharmacy_products->AttributeCount5->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
		<th class="<?php echo $pharmacy_products->DefaultDiscountPercentage->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage"><?php echo $pharmacy_products->DefaultDiscountPercentage->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
		<th class="<?php echo $pharmacy_products->DonotPrintBarcode->headerCellClass() ?>"><span id="elh_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode"><?php echo $pharmacy_products->DonotPrintBarcode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
		<th class="<?php echo $pharmacy_products->ProductLevelDiscount->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount"><?php echo $pharmacy_products->ProductLevelDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Markup->Visible) { // Markup ?>
		<th class="<?php echo $pharmacy_products->Markup->headerCellClass() ?>"><span id="elh_pharmacy_products_Markup" class="pharmacy_products_Markup"><?php echo $pharmacy_products->Markup->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MarkDown->Visible) { // MarkDown ?>
		<th class="<?php echo $pharmacy_products->MarkDown->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown"><?php echo $pharmacy_products->MarkDown->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
		<th class="<?php echo $pharmacy_products->ReworkSalePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice"><?php echo $pharmacy_products->ReworkSalePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MultipleInput->Visible) { // MultipleInput ?>
		<th class="<?php echo $pharmacy_products->MultipleInput->headerCellClass() ?>"><span id="elh_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput"><?php echo $pharmacy_products->MultipleInput->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->LpPackageInformation->Visible) { // LpPackageInformation ?>
		<th class="<?php echo $pharmacy_products->LpPackageInformation->headerCellClass() ?>"><span id="elh_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation"><?php echo $pharmacy_products->LpPackageInformation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
		<th class="<?php echo $pharmacy_products->AllowNegativeStock->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock"><?php echo $pharmacy_products->AllowNegativeStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->OrderDate->Visible) { // OrderDate ?>
		<th class="<?php echo $pharmacy_products->OrderDate->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate"><?php echo $pharmacy_products->OrderDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->OrderTime->Visible) { // OrderTime ?>
		<th class="<?php echo $pharmacy_products->OrderTime->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime"><?php echo $pharmacy_products->OrderTime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->RateGroupCode->Visible) { // RateGroupCode ?>
		<th class="<?php echo $pharmacy_products->RateGroupCode->headerCellClass() ?>"><span id="elh_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode"><?php echo $pharmacy_products->RateGroupCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
		<th class="<?php echo $pharmacy_products->ConversionCaseLot->headerCellClass() ?>"><span id="elh_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot"><?php echo $pharmacy_products->ConversionCaseLot->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ShippingLot->Visible) { // ShippingLot ?>
		<th class="<?php echo $pharmacy_products->ShippingLot->headerCellClass() ?>"><span id="elh_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot"><?php echo $pharmacy_products->ShippingLot->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
		<th class="<?php echo $pharmacy_products->AllowExpiryReplacement->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement"><?php echo $pharmacy_products->AllowExpiryReplacement->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
		<th class="<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->headerCellClass() ?>"><span id="elh_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed"><?php echo $pharmacy_products->NoOfMonthExpiryAllowed->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
		<th class="<?php echo $pharmacy_products->ProductDiscountEligibility->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility"><?php echo $pharmacy_products->ProductDiscountEligibility->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
		<th class="<?php echo $pharmacy_products->ScheduleTypeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode"><?php echo $pharmacy_products->ScheduleTypeCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
		<th class="<?php echo $pharmacy_products->AIOCDProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode"><?php echo $pharmacy_products->AIOCDProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FreeQuantity->Visible) { // FreeQuantity ?>
		<th class="<?php echo $pharmacy_products->FreeQuantity->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity"><?php echo $pharmacy_products->FreeQuantity->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DiscountType->Visible) { // DiscountType ?>
		<th class="<?php echo $pharmacy_products->DiscountType->headerCellClass() ?>"><span id="elh_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType"><?php echo $pharmacy_products->DiscountType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DiscountValue->Visible) { // DiscountValue ?>
		<th class="<?php echo $pharmacy_products->DiscountValue->headerCellClass() ?>"><span id="elh_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue"><?php echo $pharmacy_products->DiscountValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
		<th class="<?php echo $pharmacy_products->HasProductOrderAttribute->headerCellClass() ?>"><span id="elh_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute"><?php echo $pharmacy_products->HasProductOrderAttribute->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FirstPODate->Visible) { // FirstPODate ?>
		<th class="<?php echo $pharmacy_products->FirstPODate->headerCellClass() ?>"><span id="elh_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate"><?php echo $pharmacy_products->FirstPODate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
		<th class="<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->headerCellClass() ?>"><span id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent"><?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
		<th class="<?php echo $pharmacy_products->IsGiftVoucherProducts->headerCellClass() ?>"><span id="elh_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts"><?php echo $pharmacy_products->IsGiftVoucherProducts->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
		<th class="<?php echo $pharmacy_products->AcceptRange4SerialNumber->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber"><?php echo $pharmacy_products->AcceptRange4SerialNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
		<th class="<?php echo $pharmacy_products->GiftVoucherDenomination->headerCellClass() ?>"><span id="elh_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination"><?php echo $pharmacy_products->GiftVoucherDenomination->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Subclasscode->Visible) { // Subclasscode ?>
		<th class="<?php echo $pharmacy_products->Subclasscode->headerCellClass() ?>"><span id="elh_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode"><?php echo $pharmacy_products->Subclasscode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
		<th class="<?php echo $pharmacy_products->BarCodeFromWeighingMachine->headerCellClass() ?>"><span id="elh_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine"><?php echo $pharmacy_products->BarCodeFromWeighingMachine->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
		<th class="<?php echo $pharmacy_products->CheckCostInReturn->headerCellClass() ?>"><span id="elh_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn"><?php echo $pharmacy_products->CheckCostInReturn->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
		<th class="<?php echo $pharmacy_products->FrequentSaleProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct"><?php echo $pharmacy_products->FrequentSaleProduct->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->RateType->Visible) { // RateType ?>
		<th class="<?php echo $pharmacy_products->RateType->headerCellClass() ?>"><span id="elh_pharmacy_products_RateType" class="pharmacy_products_RateType"><?php echo $pharmacy_products->RateType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TouchscreenName->Visible) { // TouchscreenName ?>
		<th class="<?php echo $pharmacy_products->TouchscreenName->headerCellClass() ?>"><span id="elh_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName"><?php echo $pharmacy_products->TouchscreenName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FreeType->Visible) { // FreeType ?>
		<th class="<?php echo $pharmacy_products->FreeType->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeType" class="pharmacy_products_FreeType"><?php echo $pharmacy_products->FreeType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
		<th class="<?php echo $pharmacy_products->LooseQtyasNewBatch->headerCellClass() ?>"><span id="elh_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch"><?php echo $pharmacy_products->LooseQtyasNewBatch->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
		<th class="<?php echo $pharmacy_products->AllowSlabBilling->headerCellClass() ?>"><span id="elh_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling"><?php echo $pharmacy_products->AllowSlabBilling->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
		<th class="<?php echo $pharmacy_products->ProductTypeForProduction->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction"><?php echo $pharmacy_products->ProductTypeForProduction->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->RecipeCode->Visible) { // RecipeCode ?>
		<th class="<?php echo $pharmacy_products->RecipeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode"><?php echo $pharmacy_products->RecipeCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DefaultUnitType->Visible) { // DefaultUnitType ?>
		<th class="<?php echo $pharmacy_products->DefaultUnitType->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType"><?php echo $pharmacy_products->DefaultUnitType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PIstatus->Visible) { // PIstatus ?>
		<th class="<?php echo $pharmacy_products->PIstatus->headerCellClass() ?>"><span id="elh_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus"><?php echo $pharmacy_products->PIstatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
		<th class="<?php echo $pharmacy_products->LastPiConfirmedDate->headerCellClass() ?>"><span id="elh_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate"><?php echo $pharmacy_products->LastPiConfirmedDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDesign->Visible) { // BarCodeDesign ?>
		<th class="<?php echo $pharmacy_products->BarCodeDesign->headerCellClass() ?>"><span id="elh_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign"><?php echo $pharmacy_products->BarCodeDesign->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
		<th class="<?php echo $pharmacy_products->AcceptRemarksInBill->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill"><?php echo $pharmacy_products->AcceptRemarksInBill->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Classification->Visible) { // Classification ?>
		<th class="<?php echo $pharmacy_products->Classification->headerCellClass() ?>"><span id="elh_pharmacy_products_Classification" class="pharmacy_products_Classification"><?php echo $pharmacy_products->Classification->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TimeSlot->Visible) { // TimeSlot ?>
		<th class="<?php echo $pharmacy_products->TimeSlot->headerCellClass() ?>"><span id="elh_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot"><?php echo $pharmacy_products->TimeSlot->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IsBundle->Visible) { // IsBundle ?>
		<th class="<?php echo $pharmacy_products->IsBundle->headerCellClass() ?>"><span id="elh_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle"><?php echo $pharmacy_products->IsBundle->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ColorCode->Visible) { // ColorCode ?>
		<th class="<?php echo $pharmacy_products->ColorCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode"><?php echo $pharmacy_products->ColorCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->GenderCode->Visible) { // GenderCode ?>
		<th class="<?php echo $pharmacy_products->GenderCode->headerCellClass() ?>"><span id="elh_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode"><?php echo $pharmacy_products->GenderCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SizeCode->Visible) { // SizeCode ?>
		<th class="<?php echo $pharmacy_products->SizeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode"><?php echo $pharmacy_products->SizeCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->GiftCard->Visible) { // GiftCard ?>
		<th class="<?php echo $pharmacy_products->GiftCard->headerCellClass() ?>"><span id="elh_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard"><?php echo $pharmacy_products->GiftCard->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ToonLabel->Visible) { // ToonLabel ?>
		<th class="<?php echo $pharmacy_products->ToonLabel->headerCellClass() ?>"><span id="elh_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel"><?php echo $pharmacy_products->ToonLabel->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->GarmentType->Visible) { // GarmentType ?>
		<th class="<?php echo $pharmacy_products->GarmentType->headerCellClass() ?>"><span id="elh_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType"><?php echo $pharmacy_products->GarmentType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AgeGroup->Visible) { // AgeGroup ?>
		<th class="<?php echo $pharmacy_products->AgeGroup->headerCellClass() ?>"><span id="elh_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup"><?php echo $pharmacy_products->AgeGroup->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Season->Visible) { // Season ?>
		<th class="<?php echo $pharmacy_products->Season->headerCellClass() ?>"><span id="elh_pharmacy_products_Season" class="pharmacy_products_Season"><?php echo $pharmacy_products->Season->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DailyStockEntry->Visible) { // DailyStockEntry ?>
		<th class="<?php echo $pharmacy_products->DailyStockEntry->headerCellClass() ?>"><span id="elh_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry"><?php echo $pharmacy_products->DailyStockEntry->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ModifierApplicable->Visible) { // ModifierApplicable ?>
		<th class="<?php echo $pharmacy_products->ModifierApplicable->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable"><?php echo $pharmacy_products->ModifierApplicable->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ModifierType->Visible) { // ModifierType ?>
		<th class="<?php echo $pharmacy_products->ModifierType->headerCellClass() ?>"><span id="elh_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType"><?php echo $pharmacy_products->ModifierType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
		<th class="<?php echo $pharmacy_products->AcceptZeroRate->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate"><?php echo $pharmacy_products->AcceptZeroRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
		<th class="<?php echo $pharmacy_products->ExciseDutyCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode"><?php echo $pharmacy_products->ExciseDutyCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
		<th class="<?php echo $pharmacy_products->IndentProductGroupCode->headerCellClass() ?>"><span id="elh_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode"><?php echo $pharmacy_products->IndentProductGroupCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IsMultiBatch->Visible) { // IsMultiBatch ?>
		<th class="<?php echo $pharmacy_products->IsMultiBatch->headerCellClass() ?>"><span id="elh_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch"><?php echo $pharmacy_products->IsMultiBatch->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IsSingleBatch->Visible) { // IsSingleBatch ?>
		<th class="<?php echo $pharmacy_products->IsSingleBatch->headerCellClass() ?>"><span id="elh_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch"><?php echo $pharmacy_products->IsSingleBatch->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate1->Visible) { // MarkUpRate1 ?>
		<th class="<?php echo $pharmacy_products->MarkUpRate1->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1"><?php echo $pharmacy_products->MarkUpRate1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate1->Visible) { // MarkDownRate1 ?>
		<th class="<?php echo $pharmacy_products->MarkDownRate1->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1"><?php echo $pharmacy_products->MarkDownRate1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate2->Visible) { // MarkUpRate2 ?>
		<th class="<?php echo $pharmacy_products->MarkUpRate2->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2"><?php echo $pharmacy_products->MarkUpRate2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate2->Visible) { // MarkDownRate2 ?>
		<th class="<?php echo $pharmacy_products->MarkDownRate2->headerCellClass() ?>"><span id="elh_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2"><?php echo $pharmacy_products->MarkDownRate2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->_Yield->Visible) { // Yield ?>
		<th class="<?php echo $pharmacy_products->_Yield->headerCellClass() ?>"><span id="elh_pharmacy_products__Yield" class="pharmacy_products__Yield"><?php echo $pharmacy_products->_Yield->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->RefProductCode->Visible) { // RefProductCode ?>
		<th class="<?php echo $pharmacy_products->RefProductCode->headerCellClass() ?>"><span id="elh_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode"><?php echo $pharmacy_products->RefProductCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Volume->Visible) { // Volume ?>
		<th class="<?php echo $pharmacy_products->Volume->headerCellClass() ?>"><span id="elh_pharmacy_products_Volume" class="pharmacy_products_Volume"><?php echo $pharmacy_products->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MeasurementID->Visible) { // MeasurementID ?>
		<th class="<?php echo $pharmacy_products->MeasurementID->headerCellClass() ?>"><span id="elh_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID"><?php echo $pharmacy_products->MeasurementID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CountryCode->Visible) { // CountryCode ?>
		<th class="<?php echo $pharmacy_products->CountryCode->headerCellClass() ?>"><span id="elh_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode"><?php echo $pharmacy_products->CountryCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AcceptWMQty->Visible) { // AcceptWMQty ?>
		<th class="<?php echo $pharmacy_products->AcceptWMQty->headerCellClass() ?>"><span id="elh_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty"><?php echo $pharmacy_products->AcceptWMQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
		<th class="<?php echo $pharmacy_products->SingleBatchBasedOnRate->headerCellClass() ?>"><span id="elh_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate"><?php echo $pharmacy_products->SingleBatchBasedOnRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TenderNo->Visible) { // TenderNo ?>
		<th class="<?php echo $pharmacy_products->TenderNo->headerCellClass() ?>"><span id="elh_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo"><?php echo $pharmacy_products->TenderNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
		<th class="<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->headerCellClass() ?>"><span id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled"><?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Strength1->Visible) { // Strength1 ?>
		<th class="<?php echo $pharmacy_products->Strength1->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength1" class="pharmacy_products_Strength1"><?php echo $pharmacy_products->Strength1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Strength2->Visible) { // Strength2 ?>
		<th class="<?php echo $pharmacy_products->Strength2->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength2" class="pharmacy_products_Strength2"><?php echo $pharmacy_products->Strength2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Strength3->Visible) { // Strength3 ?>
		<th class="<?php echo $pharmacy_products->Strength3->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength3" class="pharmacy_products_Strength3"><?php echo $pharmacy_products->Strength3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Strength4->Visible) { // Strength4 ?>
		<th class="<?php echo $pharmacy_products->Strength4->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength4" class="pharmacy_products_Strength4"><?php echo $pharmacy_products->Strength4->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->Strength5->Visible) { // Strength5 ?>
		<th class="<?php echo $pharmacy_products->Strength5->headerCellClass() ?>"><span id="elh_pharmacy_products_Strength5" class="pharmacy_products_Strength5"><?php echo $pharmacy_products->Strength5->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode1->Visible) { // IngredientCode1 ?>
		<th class="<?php echo $pharmacy_products->IngredientCode1->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1"><?php echo $pharmacy_products->IngredientCode1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode2->Visible) { // IngredientCode2 ?>
		<th class="<?php echo $pharmacy_products->IngredientCode2->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2"><?php echo $pharmacy_products->IngredientCode2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode3->Visible) { // IngredientCode3 ?>
		<th class="<?php echo $pharmacy_products->IngredientCode3->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3"><?php echo $pharmacy_products->IngredientCode3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode4->Visible) { // IngredientCode4 ?>
		<th class="<?php echo $pharmacy_products->IngredientCode4->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4"><?php echo $pharmacy_products->IngredientCode4->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode5->Visible) { // IngredientCode5 ?>
		<th class="<?php echo $pharmacy_products->IngredientCode5->headerCellClass() ?>"><span id="elh_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5"><?php echo $pharmacy_products->IngredientCode5->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->OrderType->Visible) { // OrderType ?>
		<th class="<?php echo $pharmacy_products->OrderType->headerCellClass() ?>"><span id="elh_pharmacy_products_OrderType" class="pharmacy_products_OrderType"><?php echo $pharmacy_products->OrderType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->StockUOM->Visible) { // StockUOM ?>
		<th class="<?php echo $pharmacy_products->StockUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM"><?php echo $pharmacy_products->StockUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PriceUOM->Visible) { // PriceUOM ?>
		<th class="<?php echo $pharmacy_products->PriceUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM"><?php echo $pharmacy_products->PriceUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
		<th class="<?php echo $pharmacy_products->DefaultSaleUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM"><?php echo $pharmacy_products->DefaultSaleUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
		<th class="<?php echo $pharmacy_products->DefaultPurchaseUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM"><?php echo $pharmacy_products->DefaultPurchaseUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ReportingUOM->Visible) { // ReportingUOM ?>
		<th class="<?php echo $pharmacy_products->ReportingUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM"><?php echo $pharmacy_products->ReportingUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
		<th class="<?php echo $pharmacy_products->LastPurchasedUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM"><?php echo $pharmacy_products->LastPurchasedUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TreatmentCodes->Visible) { // TreatmentCodes ?>
		<th class="<?php echo $pharmacy_products->TreatmentCodes->headerCellClass() ?>"><span id="elh_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes"><?php echo $pharmacy_products->TreatmentCodes->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->InsuranceType->Visible) { // InsuranceType ?>
		<th class="<?php echo $pharmacy_products->InsuranceType->headerCellClass() ?>"><span id="elh_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType"><?php echo $pharmacy_products->InsuranceType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
		<th class="<?php echo $pharmacy_products->CoverageGroupCodes->headerCellClass() ?>"><span id="elh_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes"><?php echo $pharmacy_products->CoverageGroupCodes->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MultipleUOM->Visible) { // MultipleUOM ?>
		<th class="<?php echo $pharmacy_products->MultipleUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM"><?php echo $pharmacy_products->MultipleUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SalePriceComputation->Visible) { // SalePriceComputation ?>
		<th class="<?php echo $pharmacy_products->SalePriceComputation->headerCellClass() ?>"><span id="elh_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation"><?php echo $pharmacy_products->SalePriceComputation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->StockCorrection->Visible) { // StockCorrection ?>
		<th class="<?php echo $pharmacy_products->StockCorrection->headerCellClass() ?>"><span id="elh_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection"><?php echo $pharmacy_products->StockCorrection->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->LBTPercentage->Visible) { // LBTPercentage ?>
		<th class="<?php echo $pharmacy_products->LBTPercentage->headerCellClass() ?>"><span id="elh_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage"><?php echo $pharmacy_products->LBTPercentage->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->SalesCommission->Visible) { // SalesCommission ?>
		<th class="<?php echo $pharmacy_products->SalesCommission->headerCellClass() ?>"><span id="elh_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission"><?php echo $pharmacy_products->SalesCommission->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->LockedStock->Visible) { // LockedStock ?>
		<th class="<?php echo $pharmacy_products->LockedStock->headerCellClass() ?>"><span id="elh_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock"><?php echo $pharmacy_products->LockedStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MinMaxUOM->Visible) { // MinMaxUOM ?>
		<th class="<?php echo $pharmacy_products->MinMaxUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM"><?php echo $pharmacy_products->MinMaxUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
		<th class="<?php echo $pharmacy_products->ExpiryMfrDateFormat->headerCellClass() ?>"><span id="elh_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat"><?php echo $pharmacy_products->ExpiryMfrDateFormat->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ProductLifeTime->Visible) { // ProductLifeTime ?>
		<th class="<?php echo $pharmacy_products->ProductLifeTime->headerCellClass() ?>"><span id="elh_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime"><?php echo $pharmacy_products->ProductLifeTime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IsCombo->Visible) { // IsCombo ?>
		<th class="<?php echo $pharmacy_products->IsCombo->headerCellClass() ?>"><span id="elh_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo"><?php echo $pharmacy_products->IsCombo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ComboTypeCode->Visible) { // ComboTypeCode ?>
		<th class="<?php echo $pharmacy_products->ComboTypeCode->headerCellClass() ?>"><span id="elh_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode"><?php echo $pharmacy_products->ComboTypeCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount6->Visible) { // AttributeCount6 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount6->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6"><?php echo $pharmacy_products->AttributeCount6->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount7->Visible) { // AttributeCount7 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount7->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7"><?php echo $pharmacy_products->AttributeCount7->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount8->Visible) { // AttributeCount8 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount8->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8"><?php echo $pharmacy_products->AttributeCount8->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount9->Visible) { // AttributeCount9 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount9->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9"><?php echo $pharmacy_products->AttributeCount9->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount10->Visible) { // AttributeCount10 ?>
		<th class="<?php echo $pharmacy_products->AttributeCount10->headerCellClass() ?>"><span id="elh_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10"><?php echo $pharmacy_products->AttributeCount10->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->LabourCharge->Visible) { // LabourCharge ?>
		<th class="<?php echo $pharmacy_products->LabourCharge->headerCellClass() ?>"><span id="elh_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge"><?php echo $pharmacy_products->LabourCharge->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
		<th class="<?php echo $pharmacy_products->AffectOtherCharge->headerCellClass() ?>"><span id="elh_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge"><?php echo $pharmacy_products->AffectOtherCharge->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DosageInfo->Visible) { // DosageInfo ?>
		<th class="<?php echo $pharmacy_products->DosageInfo->headerCellClass() ?>"><span id="elh_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo"><?php echo $pharmacy_products->DosageInfo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DosageType->Visible) { // DosageType ?>
		<th class="<?php echo $pharmacy_products->DosageType->headerCellClass() ?>"><span id="elh_pharmacy_products_DosageType" class="pharmacy_products_DosageType"><?php echo $pharmacy_products->DosageType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
		<th class="<?php echo $pharmacy_products->DefaultIndentUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM"><?php echo $pharmacy_products->DefaultIndentUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PromoTag->Visible) { // PromoTag ?>
		<th class="<?php echo $pharmacy_products->PromoTag->headerCellClass() ?>"><span id="elh_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag"><?php echo $pharmacy_products->PromoTag->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
		<th class="<?php echo $pharmacy_products->BillLevelPromoTag->headerCellClass() ?>"><span id="elh_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag"><?php echo $pharmacy_products->BillLevelPromoTag->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->IsMRPProduct->Visible) { // IsMRPProduct ?>
		<th class="<?php echo $pharmacy_products->IsMRPProduct->headerCellClass() ?>"><span id="elh_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct"><?php echo $pharmacy_products->IsMRPProduct->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
		<th class="<?php echo $pharmacy_products->AlternateSaleUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM"><?php echo $pharmacy_products->AlternateSaleUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FreeUOM->Visible) { // FreeUOM ?>
		<th class="<?php echo $pharmacy_products->FreeUOM->headerCellClass() ?>"><span id="elh_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM"><?php echo $pharmacy_products->FreeUOM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MarketedCode->Visible) { // MarketedCode ?>
		<th class="<?php echo $pharmacy_products->MarketedCode->headerCellClass() ?>"><span id="elh_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode"><?php echo $pharmacy_products->MarketedCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
		<th class="<?php echo $pharmacy_products->MinimumSalePrice->headerCellClass() ?>"><span id="elh_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice"><?php echo $pharmacy_products->MinimumSalePrice->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PRate1->Visible) { // PRate1 ?>
		<th class="<?php echo $pharmacy_products->PRate1->headerCellClass() ?>"><span id="elh_pharmacy_products_PRate1" class="pharmacy_products_PRate1"><?php echo $pharmacy_products->PRate1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->PRate2->Visible) { // PRate2 ?>
		<th class="<?php echo $pharmacy_products->PRate2->headerCellClass() ?>"><span id="elh_pharmacy_products_PRate2" class="pharmacy_products_PRate2"><?php echo $pharmacy_products->PRate2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->LPItemCost->Visible) { // LPItemCost ?>
		<th class="<?php echo $pharmacy_products->LPItemCost->headerCellClass() ?>"><span id="elh_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost"><?php echo $pharmacy_products->LPItemCost->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->FixedItemCost->Visible) { // FixedItemCost ?>
		<th class="<?php echo $pharmacy_products->FixedItemCost->headerCellClass() ?>"><span id="elh_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost"><?php echo $pharmacy_products->FixedItemCost->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->HSNId->Visible) { // HSNId ?>
		<th class="<?php echo $pharmacy_products->HSNId->headerCellClass() ?>"><span id="elh_pharmacy_products_HSNId" class="pharmacy_products_HSNId"><?php echo $pharmacy_products->HSNId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->TaxInclusive->Visible) { // TaxInclusive ?>
		<th class="<?php echo $pharmacy_products->TaxInclusive->headerCellClass() ?>"><span id="elh_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive"><?php echo $pharmacy_products->TaxInclusive->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
		<th class="<?php echo $pharmacy_products->EligibleforWarranty->headerCellClass() ?>"><span id="elh_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty"><?php echo $pharmacy_products->EligibleforWarranty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
		<th class="<?php echo $pharmacy_products->NoofMonthsWarranty->headerCellClass() ?>"><span id="elh_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty"><?php echo $pharmacy_products->NoofMonthsWarranty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
		<th class="<?php echo $pharmacy_products->ComputeTaxonCost->headerCellClass() ?>"><span id="elh_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost"><?php echo $pharmacy_products->ComputeTaxonCost->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
		<th class="<?php echo $pharmacy_products->HasEmptyBottleTrack->headerCellClass() ?>"><span id="elh_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack"><?php echo $pharmacy_products->HasEmptyBottleTrack->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
		<th class="<?php echo $pharmacy_products->EmptyBottleReferenceCode->headerCellClass() ?>"><span id="elh_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode"><?php echo $pharmacy_products->EmptyBottleReferenceCode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
		<th class="<?php echo $pharmacy_products->AdditionalCESSAmount->headerCellClass() ?>"><span id="elh_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount"><?php echo $pharmacy_products->AdditionalCESSAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
		<th class="<?php echo $pharmacy_products->EmptyBottleRate->headerCellClass() ?>"><span id="elh_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate"><?php echo $pharmacy_products->EmptyBottleRate->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_products_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_products_delete->Recordset->EOF) {
	$pharmacy_products_delete->RecCnt++;
	$pharmacy_products_delete->RowCnt++;

	// Set row properties
	$pharmacy_products->resetAttributes();
	$pharmacy_products->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_products_delete->loadRowValues($pharmacy_products_delete->Recordset);

	// Render row
	$pharmacy_products_delete->renderRow();
?>
	<tr<?php echo $pharmacy_products->rowAttributes() ?>>
<?php if ($pharmacy_products->ProductCode->Visible) { // ProductCode ?>
		<td<?php echo $pharmacy_products->ProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode">
<span<?php echo $pharmacy_products->ProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductName->Visible) { // ProductName ?>
		<td<?php echo $pharmacy_products->ProductName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductName" class="pharmacy_products_ProductName">
<span<?php echo $pharmacy_products->ProductName->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DivisionCode->Visible) { // DivisionCode ?>
		<td<?php echo $pharmacy_products->DivisionCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode">
<span<?php echo $pharmacy_products->DivisionCode->viewAttributes() ?>>
<?php echo $pharmacy_products->DivisionCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ManufacturerCode->Visible) { // ManufacturerCode ?>
		<td<?php echo $pharmacy_products->ManufacturerCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode">
<span<?php echo $pharmacy_products->ManufacturerCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ManufacturerCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SupplierCode->Visible) { // SupplierCode ?>
		<td<?php echo $pharmacy_products->SupplierCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode">
<span<?php echo $pharmacy_products->SupplierCode->viewAttributes() ?>>
<?php echo $pharmacy_products->SupplierCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
		<td<?php echo $pharmacy_products->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes">
<span<?php echo $pharmacy_products->AlternateSupplierCodes->viewAttributes() ?>>
<?php echo $pharmacy_products->AlternateSupplierCodes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AlternateProductCode->Visible) { // AlternateProductCode ?>
		<td<?php echo $pharmacy_products->AlternateProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode">
<span<?php echo $pharmacy_products->AlternateProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->AlternateProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->UniversalProductCode->Visible) { // UniversalProductCode ?>
		<td<?php echo $pharmacy_products->UniversalProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode">
<span<?php echo $pharmacy_products->UniversalProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->UniversalProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BookProductCode->Visible) { // BookProductCode ?>
		<td<?php echo $pharmacy_products->BookProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode">
<span<?php echo $pharmacy_products->BookProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->BookProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->OldCode->Visible) { // OldCode ?>
		<td<?php echo $pharmacy_products->OldCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_OldCode" class="pharmacy_products_OldCode">
<span<?php echo $pharmacy_products->OldCode->viewAttributes() ?>>
<?php echo $pharmacy_products->OldCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProtectedProducts->Visible) { // ProtectedProducts ?>
		<td<?php echo $pharmacy_products->ProtectedProducts->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts">
<span<?php echo $pharmacy_products->ProtectedProducts->viewAttributes() ?>>
<?php echo $pharmacy_products->ProtectedProducts->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductFullName->Visible) { // ProductFullName ?>
		<td<?php echo $pharmacy_products->ProductFullName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName">
<span<?php echo $pharmacy_products->ProductFullName->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductFullName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
		<td<?php echo $pharmacy_products->UnitOfMeasure->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure">
<span<?php echo $pharmacy_products->UnitOfMeasure->viewAttributes() ?>>
<?php echo $pharmacy_products->UnitOfMeasure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->UnitDescription->Visible) { // UnitDescription ?>
		<td<?php echo $pharmacy_products->UnitDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription">
<span<?php echo $pharmacy_products->UnitDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->UnitDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BulkDescription->Visible) { // BulkDescription ?>
		<td<?php echo $pharmacy_products->BulkDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription">
<span<?php echo $pharmacy_products->BulkDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->BulkDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDescription->Visible) { // BarCodeDescription ?>
		<td<?php echo $pharmacy_products->BarCodeDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription">
<span<?php echo $pharmacy_products->BarCodeDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->BarCodeDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PackageInformation->Visible) { // PackageInformation ?>
		<td<?php echo $pharmacy_products->PackageInformation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation">
<span<?php echo $pharmacy_products->PackageInformation->viewAttributes() ?>>
<?php echo $pharmacy_products->PackageInformation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PackageId->Visible) { // PackageId ?>
		<td<?php echo $pharmacy_products->PackageId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PackageId" class="pharmacy_products_PackageId">
<span<?php echo $pharmacy_products->PackageId->viewAttributes() ?>>
<?php echo $pharmacy_products->PackageId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Weight->Visible) { // Weight ?>
		<td<?php echo $pharmacy_products->Weight->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Weight" class="pharmacy_products_Weight">
<span<?php echo $pharmacy_products->Weight->viewAttributes() ?>>
<?php echo $pharmacy_products->Weight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AllowFractions->Visible) { // AllowFractions ?>
		<td<?php echo $pharmacy_products->AllowFractions->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions">
<span<?php echo $pharmacy_products->AllowFractions->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowFractions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
		<td<?php echo $pharmacy_products->MinimumStockLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel">
<span<?php echo $pharmacy_products->MinimumStockLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->MinimumStockLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
		<td<?php echo $pharmacy_products->MaximumStockLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel">
<span<?php echo $pharmacy_products->MaximumStockLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->MaximumStockLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ReorderLevel->Visible) { // ReorderLevel ?>
		<td<?php echo $pharmacy_products->ReorderLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel">
<span<?php echo $pharmacy_products->ReorderLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->ReorderLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MinMaxRatio->Visible) { // MinMaxRatio ?>
		<td<?php echo $pharmacy_products->MinMaxRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio">
<span<?php echo $pharmacy_products->MinMaxRatio->viewAttributes() ?>>
<?php echo $pharmacy_products->MinMaxRatio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
		<td<?php echo $pharmacy_products->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio">
<span<?php echo $pharmacy_products->AutoMinMaxRatio->viewAttributes() ?>>
<?php echo $pharmacy_products->AutoMinMaxRatio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ScheduleCode->Visible) { // ScheduleCode ?>
		<td<?php echo $pharmacy_products->ScheduleCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode">
<span<?php echo $pharmacy_products->ScheduleCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ScheduleCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->RopRatio->Visible) { // RopRatio ?>
		<td<?php echo $pharmacy_products->RopRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio">
<span<?php echo $pharmacy_products->RopRatio->viewAttributes() ?>>
<?php echo $pharmacy_products->RopRatio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MRP->Visible) { // MRP ?>
		<td<?php echo $pharmacy_products->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MRP" class="pharmacy_products_MRP">
<span<?php echo $pharmacy_products->MRP->viewAttributes() ?>>
<?php echo $pharmacy_products->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PurchasePrice->Visible) { // PurchasePrice ?>
		<td<?php echo $pharmacy_products->PurchasePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice">
<span<?php echo $pharmacy_products->PurchasePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->PurchasePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PurchaseUnit->Visible) { // PurchaseUnit ?>
		<td<?php echo $pharmacy_products->PurchaseUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit">
<span<?php echo $pharmacy_products->PurchaseUnit->viewAttributes() ?>>
<?php echo $pharmacy_products->PurchaseUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
		<td<?php echo $pharmacy_products->PurchaseTaxCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode">
<span<?php echo $pharmacy_products->PurchaseTaxCode->viewAttributes() ?>>
<?php echo $pharmacy_products->PurchaseTaxCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AllowDirectInward->Visible) { // AllowDirectInward ?>
		<td<?php echo $pharmacy_products->AllowDirectInward->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward">
<span<?php echo $pharmacy_products->AllowDirectInward->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowDirectInward->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SalePrice->Visible) { // SalePrice ?>
		<td<?php echo $pharmacy_products->SalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice">
<span<?php echo $pharmacy_products->SalePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->SalePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SaleUnit->Visible) { // SaleUnit ?>
		<td<?php echo $pharmacy_products->SaleUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit">
<span<?php echo $pharmacy_products->SaleUnit->viewAttributes() ?>>
<?php echo $pharmacy_products->SaleUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SalesTaxCode->Visible) { // SalesTaxCode ?>
		<td<?php echo $pharmacy_products->SalesTaxCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode">
<span<?php echo $pharmacy_products->SalesTaxCode->viewAttributes() ?>>
<?php echo $pharmacy_products->SalesTaxCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->StockReceived->Visible) { // StockReceived ?>
		<td<?php echo $pharmacy_products->StockReceived->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived">
<span<?php echo $pharmacy_products->StockReceived->viewAttributes() ?>>
<?php echo $pharmacy_products->StockReceived->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TotalStock->Visible) { // TotalStock ?>
		<td<?php echo $pharmacy_products->TotalStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock">
<span<?php echo $pharmacy_products->TotalStock->viewAttributes() ?>>
<?php echo $pharmacy_products->TotalStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->StockType->Visible) { // StockType ?>
		<td<?php echo $pharmacy_products->StockType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_StockType" class="pharmacy_products_StockType">
<span<?php echo $pharmacy_products->StockType->viewAttributes() ?>>
<?php echo $pharmacy_products->StockType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->StockCheckDate->Visible) { // StockCheckDate ?>
		<td<?php echo $pharmacy_products->StockCheckDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate">
<span<?php echo $pharmacy_products->StockCheckDate->viewAttributes() ?>>
<?php echo $pharmacy_products->StockCheckDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
		<td<?php echo $pharmacy_products->StockAdjustmentDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate">
<span<?php echo $pharmacy_products->StockAdjustmentDate->viewAttributes() ?>>
<?php echo $pharmacy_products->StockAdjustmentDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Remarks->Visible) { // Remarks ?>
		<td<?php echo $pharmacy_products->Remarks->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Remarks" class="pharmacy_products_Remarks">
<span<?php echo $pharmacy_products->Remarks->viewAttributes() ?>>
<?php echo $pharmacy_products->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CostCentre->Visible) { // CostCentre ?>
		<td<?php echo $pharmacy_products->CostCentre->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre">
<span<?php echo $pharmacy_products->CostCentre->viewAttributes() ?>>
<?php echo $pharmacy_products->CostCentre->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductType->Visible) { // ProductType ?>
		<td<?php echo $pharmacy_products->ProductType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductType" class="pharmacy_products_ProductType">
<span<?php echo $pharmacy_products->ProductType->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TaxAmount->Visible) { // TaxAmount ?>
		<td<?php echo $pharmacy_products->TaxAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount">
<span<?php echo $pharmacy_products->TaxAmount->viewAttributes() ?>>
<?php echo $pharmacy_products->TaxAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TaxId->Visible) { // TaxId ?>
		<td<?php echo $pharmacy_products->TaxId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TaxId" class="pharmacy_products_TaxId">
<span<?php echo $pharmacy_products->TaxId->viewAttributes() ?>>
<?php echo $pharmacy_products->TaxId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
		<td<?php echo $pharmacy_products->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable">
<span<?php echo $pharmacy_products->ResaleTaxApplicable->viewAttributes() ?>>
<?php echo $pharmacy_products->ResaleTaxApplicable->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CstOtherTax->Visible) { // CstOtherTax ?>
		<td<?php echo $pharmacy_products->CstOtherTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax">
<span<?php echo $pharmacy_products->CstOtherTax->viewAttributes() ?>>
<?php echo $pharmacy_products->CstOtherTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TotalTax->Visible) { // TotalTax ?>
		<td<?php echo $pharmacy_products->TotalTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax">
<span<?php echo $pharmacy_products->TotalTax->viewAttributes() ?>>
<?php echo $pharmacy_products->TotalTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ItemCost->Visible) { // ItemCost ?>
		<td<?php echo $pharmacy_products->ItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost">
<span<?php echo $pharmacy_products->ItemCost->viewAttributes() ?>>
<?php echo $pharmacy_products->ItemCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ExpiryDate->Visible) { // ExpiryDate ?>
		<td<?php echo $pharmacy_products->ExpiryDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate">
<span<?php echo $pharmacy_products->ExpiryDate->viewAttributes() ?>>
<?php echo $pharmacy_products->ExpiryDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BatchDescription->Visible) { // BatchDescription ?>
		<td<?php echo $pharmacy_products->BatchDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription">
<span<?php echo $pharmacy_products->BatchDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->BatchDescription->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FreeScheme->Visible) { // FreeScheme ?>
		<td<?php echo $pharmacy_products->FreeScheme->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme">
<span<?php echo $pharmacy_products->FreeScheme->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeScheme->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
		<td<?php echo $pharmacy_products->CashDiscountEligibility->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility">
<span<?php echo $pharmacy_products->CashDiscountEligibility->viewAttributes() ?>>
<?php echo $pharmacy_products->CashDiscountEligibility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
		<td<?php echo $pharmacy_products->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill">
<span<?php echo $pharmacy_products->DiscountPerAllowInBill->viewAttributes() ?>>
<?php echo $pharmacy_products->DiscountPerAllowInBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Discount->Visible) { // Discount ?>
		<td<?php echo $pharmacy_products->Discount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Discount" class="pharmacy_products_Discount">
<span<?php echo $pharmacy_products->Discount->viewAttributes() ?>>
<?php echo $pharmacy_products->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TotalAmount->Visible) { // TotalAmount ?>
		<td<?php echo $pharmacy_products->TotalAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount">
<span<?php echo $pharmacy_products->TotalAmount->viewAttributes() ?>>
<?php echo $pharmacy_products->TotalAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->StandardMargin->Visible) { // StandardMargin ?>
		<td<?php echo $pharmacy_products->StandardMargin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin">
<span<?php echo $pharmacy_products->StandardMargin->viewAttributes() ?>>
<?php echo $pharmacy_products->StandardMargin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Margin->Visible) { // Margin ?>
		<td<?php echo $pharmacy_products->Margin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Margin" class="pharmacy_products_Margin">
<span<?php echo $pharmacy_products->Margin->viewAttributes() ?>>
<?php echo $pharmacy_products->Margin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MarginId->Visible) { // MarginId ?>
		<td<?php echo $pharmacy_products->MarginId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MarginId" class="pharmacy_products_MarginId">
<span<?php echo $pharmacy_products->MarginId->viewAttributes() ?>>
<?php echo $pharmacy_products->MarginId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ExpectedMargin->Visible) { // ExpectedMargin ?>
		<td<?php echo $pharmacy_products->ExpectedMargin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin">
<span<?php echo $pharmacy_products->ExpectedMargin->viewAttributes() ?>>
<?php echo $pharmacy_products->ExpectedMargin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
		<td<?php echo $pharmacy_products->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax">
<span<?php echo $pharmacy_products->SurchargeBeforeTax->viewAttributes() ?>>
<?php echo $pharmacy_products->SurchargeBeforeTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
		<td<?php echo $pharmacy_products->SurchargeAfterTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax">
<span<?php echo $pharmacy_products->SurchargeAfterTax->viewAttributes() ?>>
<?php echo $pharmacy_products->SurchargeAfterTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TempOrderNo->Visible) { // TempOrderNo ?>
		<td<?php echo $pharmacy_products->TempOrderNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo">
<span<?php echo $pharmacy_products->TempOrderNo->viewAttributes() ?>>
<?php echo $pharmacy_products->TempOrderNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TempOrderDate->Visible) { // TempOrderDate ?>
		<td<?php echo $pharmacy_products->TempOrderDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate">
<span<?php echo $pharmacy_products->TempOrderDate->viewAttributes() ?>>
<?php echo $pharmacy_products->TempOrderDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->OrderUnit->Visible) { // OrderUnit ?>
		<td<?php echo $pharmacy_products->OrderUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit">
<span<?php echo $pharmacy_products->OrderUnit->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->OrderQuantity->Visible) { // OrderQuantity ?>
		<td<?php echo $pharmacy_products->OrderQuantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity">
<span<?php echo $pharmacy_products->OrderQuantity->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderQuantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MarkForOrder->Visible) { // MarkForOrder ?>
		<td<?php echo $pharmacy_products->MarkForOrder->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder">
<span<?php echo $pharmacy_products->MarkForOrder->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkForOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->OrderAllId->Visible) { // OrderAllId ?>
		<td<?php echo $pharmacy_products->OrderAllId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId">
<span<?php echo $pharmacy_products->OrderAllId->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderAllId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
		<td<?php echo $pharmacy_products->CalculateOrderQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty">
<span<?php echo $pharmacy_products->CalculateOrderQty->viewAttributes() ?>>
<?php echo $pharmacy_products->CalculateOrderQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SubLocation->Visible) { // SubLocation ?>
		<td<?php echo $pharmacy_products->SubLocation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation">
<span<?php echo $pharmacy_products->SubLocation->viewAttributes() ?>>
<?php echo $pharmacy_products->SubLocation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CategoryCode->Visible) { // CategoryCode ?>
		<td<?php echo $pharmacy_products->CategoryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode">
<span<?php echo $pharmacy_products->CategoryCode->viewAttributes() ?>>
<?php echo $pharmacy_products->CategoryCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SubCategory->Visible) { // SubCategory ?>
		<td<?php echo $pharmacy_products->SubCategory->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory">
<span<?php echo $pharmacy_products->SubCategory->viewAttributes() ?>>
<?php echo $pharmacy_products->SubCategory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
		<td<?php echo $pharmacy_products->FlexCategoryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode">
<span<?php echo $pharmacy_products->FlexCategoryCode->viewAttributes() ?>>
<?php echo $pharmacy_products->FlexCategoryCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleQty->Visible) { // ABCSaleQty ?>
		<td<?php echo $pharmacy_products->ABCSaleQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty">
<span<?php echo $pharmacy_products->ABCSaleQty->viewAttributes() ?>>
<?php echo $pharmacy_products->ABCSaleQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleValue->Visible) { // ABCSaleValue ?>
		<td<?php echo $pharmacy_products->ABCSaleValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue">
<span<?php echo $pharmacy_products->ABCSaleValue->viewAttributes() ?>>
<?php echo $pharmacy_products->ABCSaleValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ConvertionFactor->Visible) { // ConvertionFactor ?>
		<td<?php echo $pharmacy_products->ConvertionFactor->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor">
<span<?php echo $pharmacy_products->ConvertionFactor->viewAttributes() ?>>
<?php echo $pharmacy_products->ConvertionFactor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
		<td<?php echo $pharmacy_products->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc">
<span<?php echo $pharmacy_products->ConvertionUnitDesc->viewAttributes() ?>>
<?php echo $pharmacy_products->ConvertionUnitDesc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TransactionId->Visible) { // TransactionId ?>
		<td<?php echo $pharmacy_products->TransactionId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId">
<span<?php echo $pharmacy_products->TransactionId->viewAttributes() ?>>
<?php echo $pharmacy_products->TransactionId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SoldProductId->Visible) { // SoldProductId ?>
		<td<?php echo $pharmacy_products->SoldProductId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId">
<span<?php echo $pharmacy_products->SoldProductId->viewAttributes() ?>>
<?php echo $pharmacy_products->SoldProductId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->WantedBookId->Visible) { // WantedBookId ?>
		<td<?php echo $pharmacy_products->WantedBookId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId">
<span<?php echo $pharmacy_products->WantedBookId->viewAttributes() ?>>
<?php echo $pharmacy_products->WantedBookId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AllId->Visible) { // AllId ?>
		<td<?php echo $pharmacy_products->AllId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AllId" class="pharmacy_products_AllId">
<span<?php echo $pharmacy_products->AllId->viewAttributes() ?>>
<?php echo $pharmacy_products->AllId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
		<td<?php echo $pharmacy_products->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory">
<span<?php echo $pharmacy_products->BatchAndExpiryCompulsory->viewAttributes() ?>>
<?php echo $pharmacy_products->BatchAndExpiryCompulsory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
		<td<?php echo $pharmacy_products->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook">
<span<?php echo $pharmacy_products->BatchStockForWantedBook->viewAttributes() ?>>
<?php echo $pharmacy_products->BatchStockForWantedBook->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
		<td<?php echo $pharmacy_products->UnitBasedBilling->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling">
<span<?php echo $pharmacy_products->UnitBasedBilling->viewAttributes() ?>>
<?php echo $pharmacy_products->UnitBasedBilling->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
		<td<?php echo $pharmacy_products->DoNotCheckStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock">
<span<?php echo $pharmacy_products->DoNotCheckStock->viewAttributes() ?>>
<?php echo $pharmacy_products->DoNotCheckStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AcceptRate->Visible) { // AcceptRate ?>
		<td<?php echo $pharmacy_products->AcceptRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate">
<span<?php echo $pharmacy_products->AcceptRate->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PriceLevel->Visible) { // PriceLevel ?>
		<td<?php echo $pharmacy_products->PriceLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel">
<span<?php echo $pharmacy_products->PriceLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->PriceLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->LastQuotePrice->Visible) { // LastQuotePrice ?>
		<td<?php echo $pharmacy_products->LastQuotePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice">
<span<?php echo $pharmacy_products->LastQuotePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->LastQuotePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PriceChange->Visible) { // PriceChange ?>
		<td<?php echo $pharmacy_products->PriceChange->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange">
<span<?php echo $pharmacy_products->PriceChange->viewAttributes() ?>>
<?php echo $pharmacy_products->PriceChange->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CommodityCode->Visible) { // CommodityCode ?>
		<td<?php echo $pharmacy_products->CommodityCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode">
<span<?php echo $pharmacy_products->CommodityCode->viewAttributes() ?>>
<?php echo $pharmacy_products->CommodityCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->InstitutePrice->Visible) { // InstitutePrice ?>
		<td<?php echo $pharmacy_products->InstitutePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice">
<span<?php echo $pharmacy_products->InstitutePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->InstitutePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
		<td<?php echo $pharmacy_products->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct">
<span<?php echo $pharmacy_products->CtrlOrDCtrlProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->CtrlOrDCtrlProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ImportedDate->Visible) { // ImportedDate ?>
		<td<?php echo $pharmacy_products->ImportedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate">
<span<?php echo $pharmacy_products->ImportedDate->viewAttributes() ?>>
<?php echo $pharmacy_products->ImportedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IsImported->Visible) { // IsImported ?>
		<td<?php echo $pharmacy_products->IsImported->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IsImported" class="pharmacy_products_IsImported">
<span<?php echo $pharmacy_products->IsImported->viewAttributes() ?>>
<?php echo $pharmacy_products->IsImported->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FileName->Visible) { // FileName ?>
		<td<?php echo $pharmacy_products->FileName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FileName" class="pharmacy_products_FileName">
<span<?php echo $pharmacy_products->FileName->viewAttributes() ?>>
<?php echo $pharmacy_products->FileName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->GodownNumber->Visible) { // GodownNumber ?>
		<td<?php echo $pharmacy_products->GodownNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber">
<span<?php echo $pharmacy_products->GodownNumber->viewAttributes() ?>>
<?php echo $pharmacy_products->GodownNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CreationDate->Visible) { // CreationDate ?>
		<td<?php echo $pharmacy_products->CreationDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate">
<span<?php echo $pharmacy_products->CreationDate->viewAttributes() ?>>
<?php echo $pharmacy_products->CreationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CreatedbyUser->Visible) { // CreatedbyUser ?>
		<td<?php echo $pharmacy_products->CreatedbyUser->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser">
<span<?php echo $pharmacy_products->CreatedbyUser->viewAttributes() ?>>
<?php echo $pharmacy_products->CreatedbyUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ModifiedDate->Visible) { // ModifiedDate ?>
		<td<?php echo $pharmacy_products->ModifiedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate">
<span<?php echo $pharmacy_products->ModifiedDate->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifiedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
		<td<?php echo $pharmacy_products->ModifiedbyUser->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser">
<span<?php echo $pharmacy_products->ModifiedbyUser->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifiedbyUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->isActive->Visible) { // isActive ?>
		<td<?php echo $pharmacy_products->isActive->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_isActive" class="pharmacy_products_isActive">
<span<?php echo $pharmacy_products->isActive->viewAttributes() ?>>
<?php echo $pharmacy_products->isActive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
		<td<?php echo $pharmacy_products->AllowExpiryClaim->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim">
<span<?php echo $pharmacy_products->AllowExpiryClaim->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowExpiryClaim->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BrandCode->Visible) { // BrandCode ?>
		<td<?php echo $pharmacy_products->BrandCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode">
<span<?php echo $pharmacy_products->BrandCode->viewAttributes() ?>>
<?php echo $pharmacy_products->BrandCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
		<td<?php echo $pharmacy_products->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon">
<span<?php echo $pharmacy_products->FreeSchemeBasedon->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeSchemeBasedon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
		<td<?php echo $pharmacy_products->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill">
<span<?php echo $pharmacy_products->DoNotCheckCostInBill->viewAttributes() ?>>
<?php echo $pharmacy_products->DoNotCheckCostInBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductGroupCode->Visible) { // ProductGroupCode ?>
		<td<?php echo $pharmacy_products->ProductGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode">
<span<?php echo $pharmacy_products->ProductGroupCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductGroupCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
		<td<?php echo $pharmacy_products->ProductStrengthCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode">
<span<?php echo $pharmacy_products->ProductStrengthCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductStrengthCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PackingCode->Visible) { // PackingCode ?>
		<td<?php echo $pharmacy_products->PackingCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode">
<span<?php echo $pharmacy_products->PackingCode->viewAttributes() ?>>
<?php echo $pharmacy_products->PackingCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ComputedMinStock->Visible) { // ComputedMinStock ?>
		<td<?php echo $pharmacy_products->ComputedMinStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock">
<span<?php echo $pharmacy_products->ComputedMinStock->viewAttributes() ?>>
<?php echo $pharmacy_products->ComputedMinStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
		<td<?php echo $pharmacy_products->ComputedMaxStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock">
<span<?php echo $pharmacy_products->ComputedMaxStock->viewAttributes() ?>>
<?php echo $pharmacy_products->ComputedMaxStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductRemark->Visible) { // ProductRemark ?>
		<td<?php echo $pharmacy_products->ProductRemark->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark">
<span<?php echo $pharmacy_products->ProductRemark->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductRemark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductDrugCode->Visible) { // ProductDrugCode ?>
		<td<?php echo $pharmacy_products->ProductDrugCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode">
<span<?php echo $pharmacy_products->ProductDrugCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductDrugCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
		<td<?php echo $pharmacy_products->IsMatrixProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct">
<span<?php echo $pharmacy_products->IsMatrixProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->IsMatrixProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount1->Visible) { // AttributeCount1 ?>
		<td<?php echo $pharmacy_products->AttributeCount1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1">
<span<?php echo $pharmacy_products->AttributeCount1->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount2->Visible) { // AttributeCount2 ?>
		<td<?php echo $pharmacy_products->AttributeCount2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2">
<span<?php echo $pharmacy_products->AttributeCount2->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount3->Visible) { // AttributeCount3 ?>
		<td<?php echo $pharmacy_products->AttributeCount3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3">
<span<?php echo $pharmacy_products->AttributeCount3->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount4->Visible) { // AttributeCount4 ?>
		<td<?php echo $pharmacy_products->AttributeCount4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4">
<span<?php echo $pharmacy_products->AttributeCount4->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount5->Visible) { // AttributeCount5 ?>
		<td<?php echo $pharmacy_products->AttributeCount5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5">
<span<?php echo $pharmacy_products->AttributeCount5->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
		<td<?php echo $pharmacy_products->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage">
<span<?php echo $pharmacy_products->DefaultDiscountPercentage->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultDiscountPercentage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
		<td<?php echo $pharmacy_products->DonotPrintBarcode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode">
<span<?php echo $pharmacy_products->DonotPrintBarcode->viewAttributes() ?>>
<?php echo $pharmacy_products->DonotPrintBarcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
		<td<?php echo $pharmacy_products->ProductLevelDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount">
<span<?php echo $pharmacy_products->ProductLevelDiscount->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductLevelDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Markup->Visible) { // Markup ?>
		<td<?php echo $pharmacy_products->Markup->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Markup" class="pharmacy_products_Markup">
<span<?php echo $pharmacy_products->Markup->viewAttributes() ?>>
<?php echo $pharmacy_products->Markup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MarkDown->Visible) { // MarkDown ?>
		<td<?php echo $pharmacy_products->MarkDown->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown">
<span<?php echo $pharmacy_products->MarkDown->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkDown->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
		<td<?php echo $pharmacy_products->ReworkSalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice">
<span<?php echo $pharmacy_products->ReworkSalePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->ReworkSalePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MultipleInput->Visible) { // MultipleInput ?>
		<td<?php echo $pharmacy_products->MultipleInput->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput">
<span<?php echo $pharmacy_products->MultipleInput->viewAttributes() ?>>
<?php echo $pharmacy_products->MultipleInput->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->LpPackageInformation->Visible) { // LpPackageInformation ?>
		<td<?php echo $pharmacy_products->LpPackageInformation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation">
<span<?php echo $pharmacy_products->LpPackageInformation->viewAttributes() ?>>
<?php echo $pharmacy_products->LpPackageInformation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
		<td<?php echo $pharmacy_products->AllowNegativeStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock">
<span<?php echo $pharmacy_products->AllowNegativeStock->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowNegativeStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->OrderDate->Visible) { // OrderDate ?>
		<td<?php echo $pharmacy_products->OrderDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate">
<span<?php echo $pharmacy_products->OrderDate->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->OrderTime->Visible) { // OrderTime ?>
		<td<?php echo $pharmacy_products->OrderTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime">
<span<?php echo $pharmacy_products->OrderTime->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->RateGroupCode->Visible) { // RateGroupCode ?>
		<td<?php echo $pharmacy_products->RateGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode">
<span<?php echo $pharmacy_products->RateGroupCode->viewAttributes() ?>>
<?php echo $pharmacy_products->RateGroupCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
		<td<?php echo $pharmacy_products->ConversionCaseLot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot">
<span<?php echo $pharmacy_products->ConversionCaseLot->viewAttributes() ?>>
<?php echo $pharmacy_products->ConversionCaseLot->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ShippingLot->Visible) { // ShippingLot ?>
		<td<?php echo $pharmacy_products->ShippingLot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot">
<span<?php echo $pharmacy_products->ShippingLot->viewAttributes() ?>>
<?php echo $pharmacy_products->ShippingLot->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
		<td<?php echo $pharmacy_products->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement">
<span<?php echo $pharmacy_products->AllowExpiryReplacement->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowExpiryReplacement->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
		<td<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed">
<span<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->viewAttributes() ?>>
<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
		<td<?php echo $pharmacy_products->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility">
<span<?php echo $pharmacy_products->ProductDiscountEligibility->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductDiscountEligibility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
		<td<?php echo $pharmacy_products->ScheduleTypeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode">
<span<?php echo $pharmacy_products->ScheduleTypeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ScheduleTypeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
		<td<?php echo $pharmacy_products->AIOCDProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode">
<span<?php echo $pharmacy_products->AIOCDProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->AIOCDProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FreeQuantity->Visible) { // FreeQuantity ?>
		<td<?php echo $pharmacy_products->FreeQuantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity">
<span<?php echo $pharmacy_products->FreeQuantity->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeQuantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DiscountType->Visible) { // DiscountType ?>
		<td<?php echo $pharmacy_products->DiscountType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType">
<span<?php echo $pharmacy_products->DiscountType->viewAttributes() ?>>
<?php echo $pharmacy_products->DiscountType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DiscountValue->Visible) { // DiscountValue ?>
		<td<?php echo $pharmacy_products->DiscountValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue">
<span<?php echo $pharmacy_products->DiscountValue->viewAttributes() ?>>
<?php echo $pharmacy_products->DiscountValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
		<td<?php echo $pharmacy_products->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute">
<span<?php echo $pharmacy_products->HasProductOrderAttribute->viewAttributes() ?>>
<?php echo $pharmacy_products->HasProductOrderAttribute->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FirstPODate->Visible) { // FirstPODate ?>
		<td<?php echo $pharmacy_products->FirstPODate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate">
<span<?php echo $pharmacy_products->FirstPODate->viewAttributes() ?>>
<?php echo $pharmacy_products->FirstPODate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
		<td<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent">
<span<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->viewAttributes() ?>>
<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
		<td<?php echo $pharmacy_products->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts">
<span<?php echo $pharmacy_products->IsGiftVoucherProducts->viewAttributes() ?>>
<?php echo $pharmacy_products->IsGiftVoucherProducts->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
		<td<?php echo $pharmacy_products->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber">
<span<?php echo $pharmacy_products->AcceptRange4SerialNumber->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptRange4SerialNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
		<td<?php echo $pharmacy_products->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination">
<span<?php echo $pharmacy_products->GiftVoucherDenomination->viewAttributes() ?>>
<?php echo $pharmacy_products->GiftVoucherDenomination->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Subclasscode->Visible) { // Subclasscode ?>
		<td<?php echo $pharmacy_products->Subclasscode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode">
<span<?php echo $pharmacy_products->Subclasscode->viewAttributes() ?>>
<?php echo $pharmacy_products->Subclasscode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
		<td<?php echo $pharmacy_products->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine">
<span<?php echo $pharmacy_products->BarCodeFromWeighingMachine->viewAttributes() ?>>
<?php echo $pharmacy_products->BarCodeFromWeighingMachine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
		<td<?php echo $pharmacy_products->CheckCostInReturn->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn">
<span<?php echo $pharmacy_products->CheckCostInReturn->viewAttributes() ?>>
<?php echo $pharmacy_products->CheckCostInReturn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
		<td<?php echo $pharmacy_products->FrequentSaleProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct">
<span<?php echo $pharmacy_products->FrequentSaleProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->FrequentSaleProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->RateType->Visible) { // RateType ?>
		<td<?php echo $pharmacy_products->RateType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_RateType" class="pharmacy_products_RateType">
<span<?php echo $pharmacy_products->RateType->viewAttributes() ?>>
<?php echo $pharmacy_products->RateType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TouchscreenName->Visible) { // TouchscreenName ?>
		<td<?php echo $pharmacy_products->TouchscreenName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName">
<span<?php echo $pharmacy_products->TouchscreenName->viewAttributes() ?>>
<?php echo $pharmacy_products->TouchscreenName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FreeType->Visible) { // FreeType ?>
		<td<?php echo $pharmacy_products->FreeType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FreeType" class="pharmacy_products_FreeType">
<span<?php echo $pharmacy_products->FreeType->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
		<td<?php echo $pharmacy_products->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch">
<span<?php echo $pharmacy_products->LooseQtyasNewBatch->viewAttributes() ?>>
<?php echo $pharmacy_products->LooseQtyasNewBatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
		<td<?php echo $pharmacy_products->AllowSlabBilling->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling">
<span<?php echo $pharmacy_products->AllowSlabBilling->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowSlabBilling->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
		<td<?php echo $pharmacy_products->ProductTypeForProduction->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction">
<span<?php echo $pharmacy_products->ProductTypeForProduction->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductTypeForProduction->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->RecipeCode->Visible) { // RecipeCode ?>
		<td<?php echo $pharmacy_products->RecipeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode">
<span<?php echo $pharmacy_products->RecipeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->RecipeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DefaultUnitType->Visible) { // DefaultUnitType ?>
		<td<?php echo $pharmacy_products->DefaultUnitType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType">
<span<?php echo $pharmacy_products->DefaultUnitType->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultUnitType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PIstatus->Visible) { // PIstatus ?>
		<td<?php echo $pharmacy_products->PIstatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus">
<span<?php echo $pharmacy_products->PIstatus->viewAttributes() ?>>
<?php echo $pharmacy_products->PIstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
		<td<?php echo $pharmacy_products->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate">
<span<?php echo $pharmacy_products->LastPiConfirmedDate->viewAttributes() ?>>
<?php echo $pharmacy_products->LastPiConfirmedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDesign->Visible) { // BarCodeDesign ?>
		<td<?php echo $pharmacy_products->BarCodeDesign->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign">
<span<?php echo $pharmacy_products->BarCodeDesign->viewAttributes() ?>>
<?php echo $pharmacy_products->BarCodeDesign->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
		<td<?php echo $pharmacy_products->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill">
<span<?php echo $pharmacy_products->AcceptRemarksInBill->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptRemarksInBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Classification->Visible) { // Classification ?>
		<td<?php echo $pharmacy_products->Classification->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Classification" class="pharmacy_products_Classification">
<span<?php echo $pharmacy_products->Classification->viewAttributes() ?>>
<?php echo $pharmacy_products->Classification->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TimeSlot->Visible) { // TimeSlot ?>
		<td<?php echo $pharmacy_products->TimeSlot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot">
<span<?php echo $pharmacy_products->TimeSlot->viewAttributes() ?>>
<?php echo $pharmacy_products->TimeSlot->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IsBundle->Visible) { // IsBundle ?>
		<td<?php echo $pharmacy_products->IsBundle->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle">
<span<?php echo $pharmacy_products->IsBundle->viewAttributes() ?>>
<?php echo $pharmacy_products->IsBundle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ColorCode->Visible) { // ColorCode ?>
		<td<?php echo $pharmacy_products->ColorCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode">
<span<?php echo $pharmacy_products->ColorCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ColorCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->GenderCode->Visible) { // GenderCode ?>
		<td<?php echo $pharmacy_products->GenderCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode">
<span<?php echo $pharmacy_products->GenderCode->viewAttributes() ?>>
<?php echo $pharmacy_products->GenderCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SizeCode->Visible) { // SizeCode ?>
		<td<?php echo $pharmacy_products->SizeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode">
<span<?php echo $pharmacy_products->SizeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->SizeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->GiftCard->Visible) { // GiftCard ?>
		<td<?php echo $pharmacy_products->GiftCard->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard">
<span<?php echo $pharmacy_products->GiftCard->viewAttributes() ?>>
<?php echo $pharmacy_products->GiftCard->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ToonLabel->Visible) { // ToonLabel ?>
		<td<?php echo $pharmacy_products->ToonLabel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel">
<span<?php echo $pharmacy_products->ToonLabel->viewAttributes() ?>>
<?php echo $pharmacy_products->ToonLabel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->GarmentType->Visible) { // GarmentType ?>
		<td<?php echo $pharmacy_products->GarmentType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType">
<span<?php echo $pharmacy_products->GarmentType->viewAttributes() ?>>
<?php echo $pharmacy_products->GarmentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AgeGroup->Visible) { // AgeGroup ?>
		<td<?php echo $pharmacy_products->AgeGroup->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup">
<span<?php echo $pharmacy_products->AgeGroup->viewAttributes() ?>>
<?php echo $pharmacy_products->AgeGroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Season->Visible) { // Season ?>
		<td<?php echo $pharmacy_products->Season->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Season" class="pharmacy_products_Season">
<span<?php echo $pharmacy_products->Season->viewAttributes() ?>>
<?php echo $pharmacy_products->Season->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DailyStockEntry->Visible) { // DailyStockEntry ?>
		<td<?php echo $pharmacy_products->DailyStockEntry->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry">
<span<?php echo $pharmacy_products->DailyStockEntry->viewAttributes() ?>>
<?php echo $pharmacy_products->DailyStockEntry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ModifierApplicable->Visible) { // ModifierApplicable ?>
		<td<?php echo $pharmacy_products->ModifierApplicable->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable">
<span<?php echo $pharmacy_products->ModifierApplicable->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifierApplicable->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ModifierType->Visible) { // ModifierType ?>
		<td<?php echo $pharmacy_products->ModifierType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType">
<span<?php echo $pharmacy_products->ModifierType->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifierType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
		<td<?php echo $pharmacy_products->AcceptZeroRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate">
<span<?php echo $pharmacy_products->AcceptZeroRate->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptZeroRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
		<td<?php echo $pharmacy_products->ExciseDutyCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode">
<span<?php echo $pharmacy_products->ExciseDutyCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ExciseDutyCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
		<td<?php echo $pharmacy_products->IndentProductGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode">
<span<?php echo $pharmacy_products->IndentProductGroupCode->viewAttributes() ?>>
<?php echo $pharmacy_products->IndentProductGroupCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IsMultiBatch->Visible) { // IsMultiBatch ?>
		<td<?php echo $pharmacy_products->IsMultiBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch">
<span<?php echo $pharmacy_products->IsMultiBatch->viewAttributes() ?>>
<?php echo $pharmacy_products->IsMultiBatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IsSingleBatch->Visible) { // IsSingleBatch ?>
		<td<?php echo $pharmacy_products->IsSingleBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch">
<span<?php echo $pharmacy_products->IsSingleBatch->viewAttributes() ?>>
<?php echo $pharmacy_products->IsSingleBatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate1->Visible) { // MarkUpRate1 ?>
		<td<?php echo $pharmacy_products->MarkUpRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1">
<span<?php echo $pharmacy_products->MarkUpRate1->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkUpRate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate1->Visible) { // MarkDownRate1 ?>
		<td<?php echo $pharmacy_products->MarkDownRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1">
<span<?php echo $pharmacy_products->MarkDownRate1->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkDownRate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate2->Visible) { // MarkUpRate2 ?>
		<td<?php echo $pharmacy_products->MarkUpRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2">
<span<?php echo $pharmacy_products->MarkUpRate2->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkUpRate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate2->Visible) { // MarkDownRate2 ?>
		<td<?php echo $pharmacy_products->MarkDownRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2">
<span<?php echo $pharmacy_products->MarkDownRate2->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkDownRate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->_Yield->Visible) { // Yield ?>
		<td<?php echo $pharmacy_products->_Yield->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products__Yield" class="pharmacy_products__Yield">
<span<?php echo $pharmacy_products->_Yield->viewAttributes() ?>>
<?php echo $pharmacy_products->_Yield->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->RefProductCode->Visible) { // RefProductCode ?>
		<td<?php echo $pharmacy_products->RefProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode">
<span<?php echo $pharmacy_products->RefProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->RefProductCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Volume->Visible) { // Volume ?>
		<td<?php echo $pharmacy_products->Volume->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Volume" class="pharmacy_products_Volume">
<span<?php echo $pharmacy_products->Volume->viewAttributes() ?>>
<?php echo $pharmacy_products->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MeasurementID->Visible) { // MeasurementID ?>
		<td<?php echo $pharmacy_products->MeasurementID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID">
<span<?php echo $pharmacy_products->MeasurementID->viewAttributes() ?>>
<?php echo $pharmacy_products->MeasurementID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CountryCode->Visible) { // CountryCode ?>
		<td<?php echo $pharmacy_products->CountryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode">
<span<?php echo $pharmacy_products->CountryCode->viewAttributes() ?>>
<?php echo $pharmacy_products->CountryCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AcceptWMQty->Visible) { // AcceptWMQty ?>
		<td<?php echo $pharmacy_products->AcceptWMQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty">
<span<?php echo $pharmacy_products->AcceptWMQty->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptWMQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
		<td<?php echo $pharmacy_products->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate">
<span<?php echo $pharmacy_products->SingleBatchBasedOnRate->viewAttributes() ?>>
<?php echo $pharmacy_products->SingleBatchBasedOnRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TenderNo->Visible) { // TenderNo ?>
		<td<?php echo $pharmacy_products->TenderNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo">
<span<?php echo $pharmacy_products->TenderNo->viewAttributes() ?>>
<?php echo $pharmacy_products->TenderNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
		<td<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled">
<span<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->viewAttributes() ?>>
<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Strength1->Visible) { // Strength1 ?>
		<td<?php echo $pharmacy_products->Strength1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Strength1" class="pharmacy_products_Strength1">
<span<?php echo $pharmacy_products->Strength1->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Strength2->Visible) { // Strength2 ?>
		<td<?php echo $pharmacy_products->Strength2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Strength2" class="pharmacy_products_Strength2">
<span<?php echo $pharmacy_products->Strength2->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Strength3->Visible) { // Strength3 ?>
		<td<?php echo $pharmacy_products->Strength3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Strength3" class="pharmacy_products_Strength3">
<span<?php echo $pharmacy_products->Strength3->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Strength4->Visible) { // Strength4 ?>
		<td<?php echo $pharmacy_products->Strength4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Strength4" class="pharmacy_products_Strength4">
<span<?php echo $pharmacy_products->Strength4->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->Strength5->Visible) { // Strength5 ?>
		<td<?php echo $pharmacy_products->Strength5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_Strength5" class="pharmacy_products_Strength5">
<span<?php echo $pharmacy_products->Strength5->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode1->Visible) { // IngredientCode1 ?>
		<td<?php echo $pharmacy_products->IngredientCode1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1">
<span<?php echo $pharmacy_products->IngredientCode1->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode2->Visible) { // IngredientCode2 ?>
		<td<?php echo $pharmacy_products->IngredientCode2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2">
<span<?php echo $pharmacy_products->IngredientCode2->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode3->Visible) { // IngredientCode3 ?>
		<td<?php echo $pharmacy_products->IngredientCode3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3">
<span<?php echo $pharmacy_products->IngredientCode3->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode4->Visible) { // IngredientCode4 ?>
		<td<?php echo $pharmacy_products->IngredientCode4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4">
<span<?php echo $pharmacy_products->IngredientCode4->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode5->Visible) { // IngredientCode5 ?>
		<td<?php echo $pharmacy_products->IngredientCode5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5">
<span<?php echo $pharmacy_products->IngredientCode5->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->OrderType->Visible) { // OrderType ?>
		<td<?php echo $pharmacy_products->OrderType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_OrderType" class="pharmacy_products_OrderType">
<span<?php echo $pharmacy_products->OrderType->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->StockUOM->Visible) { // StockUOM ?>
		<td<?php echo $pharmacy_products->StockUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM">
<span<?php echo $pharmacy_products->StockUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->StockUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PriceUOM->Visible) { // PriceUOM ?>
		<td<?php echo $pharmacy_products->PriceUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM">
<span<?php echo $pharmacy_products->PriceUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->PriceUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
		<td<?php echo $pharmacy_products->DefaultSaleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM">
<span<?php echo $pharmacy_products->DefaultSaleUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultSaleUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
		<td<?php echo $pharmacy_products->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM">
<span<?php echo $pharmacy_products->DefaultPurchaseUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultPurchaseUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ReportingUOM->Visible) { // ReportingUOM ?>
		<td<?php echo $pharmacy_products->ReportingUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM">
<span<?php echo $pharmacy_products->ReportingUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->ReportingUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
		<td<?php echo $pharmacy_products->LastPurchasedUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM">
<span<?php echo $pharmacy_products->LastPurchasedUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->LastPurchasedUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TreatmentCodes->Visible) { // TreatmentCodes ?>
		<td<?php echo $pharmacy_products->TreatmentCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes">
<span<?php echo $pharmacy_products->TreatmentCodes->viewAttributes() ?>>
<?php echo $pharmacy_products->TreatmentCodes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->InsuranceType->Visible) { // InsuranceType ?>
		<td<?php echo $pharmacy_products->InsuranceType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType">
<span<?php echo $pharmacy_products->InsuranceType->viewAttributes() ?>>
<?php echo $pharmacy_products->InsuranceType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
		<td<?php echo $pharmacy_products->CoverageGroupCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes">
<span<?php echo $pharmacy_products->CoverageGroupCodes->viewAttributes() ?>>
<?php echo $pharmacy_products->CoverageGroupCodes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MultipleUOM->Visible) { // MultipleUOM ?>
		<td<?php echo $pharmacy_products->MultipleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM">
<span<?php echo $pharmacy_products->MultipleUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->MultipleUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SalePriceComputation->Visible) { // SalePriceComputation ?>
		<td<?php echo $pharmacy_products->SalePriceComputation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation">
<span<?php echo $pharmacy_products->SalePriceComputation->viewAttributes() ?>>
<?php echo $pharmacy_products->SalePriceComputation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->StockCorrection->Visible) { // StockCorrection ?>
		<td<?php echo $pharmacy_products->StockCorrection->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection">
<span<?php echo $pharmacy_products->StockCorrection->viewAttributes() ?>>
<?php echo $pharmacy_products->StockCorrection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->LBTPercentage->Visible) { // LBTPercentage ?>
		<td<?php echo $pharmacy_products->LBTPercentage->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage">
<span<?php echo $pharmacy_products->LBTPercentage->viewAttributes() ?>>
<?php echo $pharmacy_products->LBTPercentage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->SalesCommission->Visible) { // SalesCommission ?>
		<td<?php echo $pharmacy_products->SalesCommission->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission">
<span<?php echo $pharmacy_products->SalesCommission->viewAttributes() ?>>
<?php echo $pharmacy_products->SalesCommission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->LockedStock->Visible) { // LockedStock ?>
		<td<?php echo $pharmacy_products->LockedStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock">
<span<?php echo $pharmacy_products->LockedStock->viewAttributes() ?>>
<?php echo $pharmacy_products->LockedStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MinMaxUOM->Visible) { // MinMaxUOM ?>
		<td<?php echo $pharmacy_products->MinMaxUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM">
<span<?php echo $pharmacy_products->MinMaxUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->MinMaxUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
		<td<?php echo $pharmacy_products->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat">
<span<?php echo $pharmacy_products->ExpiryMfrDateFormat->viewAttributes() ?>>
<?php echo $pharmacy_products->ExpiryMfrDateFormat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ProductLifeTime->Visible) { // ProductLifeTime ?>
		<td<?php echo $pharmacy_products->ProductLifeTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime">
<span<?php echo $pharmacy_products->ProductLifeTime->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductLifeTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IsCombo->Visible) { // IsCombo ?>
		<td<?php echo $pharmacy_products->IsCombo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo">
<span<?php echo $pharmacy_products->IsCombo->viewAttributes() ?>>
<?php echo $pharmacy_products->IsCombo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ComboTypeCode->Visible) { // ComboTypeCode ?>
		<td<?php echo $pharmacy_products->ComboTypeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode">
<span<?php echo $pharmacy_products->ComboTypeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ComboTypeCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount6->Visible) { // AttributeCount6 ?>
		<td<?php echo $pharmacy_products->AttributeCount6->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6">
<span<?php echo $pharmacy_products->AttributeCount6->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount7->Visible) { // AttributeCount7 ?>
		<td<?php echo $pharmacy_products->AttributeCount7->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7">
<span<?php echo $pharmacy_products->AttributeCount7->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount8->Visible) { // AttributeCount8 ?>
		<td<?php echo $pharmacy_products->AttributeCount8->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8">
<span<?php echo $pharmacy_products->AttributeCount8->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount9->Visible) { // AttributeCount9 ?>
		<td<?php echo $pharmacy_products->AttributeCount9->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9">
<span<?php echo $pharmacy_products->AttributeCount9->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount10->Visible) { // AttributeCount10 ?>
		<td<?php echo $pharmacy_products->AttributeCount10->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10">
<span<?php echo $pharmacy_products->AttributeCount10->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->LabourCharge->Visible) { // LabourCharge ?>
		<td<?php echo $pharmacy_products->LabourCharge->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge">
<span<?php echo $pharmacy_products->LabourCharge->viewAttributes() ?>>
<?php echo $pharmacy_products->LabourCharge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
		<td<?php echo $pharmacy_products->AffectOtherCharge->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge">
<span<?php echo $pharmacy_products->AffectOtherCharge->viewAttributes() ?>>
<?php echo $pharmacy_products->AffectOtherCharge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DosageInfo->Visible) { // DosageInfo ?>
		<td<?php echo $pharmacy_products->DosageInfo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo">
<span<?php echo $pharmacy_products->DosageInfo->viewAttributes() ?>>
<?php echo $pharmacy_products->DosageInfo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DosageType->Visible) { // DosageType ?>
		<td<?php echo $pharmacy_products->DosageType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DosageType" class="pharmacy_products_DosageType">
<span<?php echo $pharmacy_products->DosageType->viewAttributes() ?>>
<?php echo $pharmacy_products->DosageType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
		<td<?php echo $pharmacy_products->DefaultIndentUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM">
<span<?php echo $pharmacy_products->DefaultIndentUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultIndentUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PromoTag->Visible) { // PromoTag ?>
		<td<?php echo $pharmacy_products->PromoTag->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag">
<span<?php echo $pharmacy_products->PromoTag->viewAttributes() ?>>
<?php echo $pharmacy_products->PromoTag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
		<td<?php echo $pharmacy_products->BillLevelPromoTag->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag">
<span<?php echo $pharmacy_products->BillLevelPromoTag->viewAttributes() ?>>
<?php echo $pharmacy_products->BillLevelPromoTag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->IsMRPProduct->Visible) { // IsMRPProduct ?>
		<td<?php echo $pharmacy_products->IsMRPProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct">
<span<?php echo $pharmacy_products->IsMRPProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->IsMRPProduct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
		<td<?php echo $pharmacy_products->AlternateSaleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM">
<span<?php echo $pharmacy_products->AlternateSaleUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->AlternateSaleUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FreeUOM->Visible) { // FreeUOM ?>
		<td<?php echo $pharmacy_products->FreeUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM">
<span<?php echo $pharmacy_products->FreeUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeUOM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MarketedCode->Visible) { // MarketedCode ?>
		<td<?php echo $pharmacy_products->MarketedCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode">
<span<?php echo $pharmacy_products->MarketedCode->viewAttributes() ?>>
<?php echo $pharmacy_products->MarketedCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
		<td<?php echo $pharmacy_products->MinimumSalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice">
<span<?php echo $pharmacy_products->MinimumSalePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->MinimumSalePrice->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PRate1->Visible) { // PRate1 ?>
		<td<?php echo $pharmacy_products->PRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PRate1" class="pharmacy_products_PRate1">
<span<?php echo $pharmacy_products->PRate1->viewAttributes() ?>>
<?php echo $pharmacy_products->PRate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->PRate2->Visible) { // PRate2 ?>
		<td<?php echo $pharmacy_products->PRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_PRate2" class="pharmacy_products_PRate2">
<span<?php echo $pharmacy_products->PRate2->viewAttributes() ?>>
<?php echo $pharmacy_products->PRate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->LPItemCost->Visible) { // LPItemCost ?>
		<td<?php echo $pharmacy_products->LPItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost">
<span<?php echo $pharmacy_products->LPItemCost->viewAttributes() ?>>
<?php echo $pharmacy_products->LPItemCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->FixedItemCost->Visible) { // FixedItemCost ?>
		<td<?php echo $pharmacy_products->FixedItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost">
<span<?php echo $pharmacy_products->FixedItemCost->viewAttributes() ?>>
<?php echo $pharmacy_products->FixedItemCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->HSNId->Visible) { // HSNId ?>
		<td<?php echo $pharmacy_products->HSNId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_HSNId" class="pharmacy_products_HSNId">
<span<?php echo $pharmacy_products->HSNId->viewAttributes() ?>>
<?php echo $pharmacy_products->HSNId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->TaxInclusive->Visible) { // TaxInclusive ?>
		<td<?php echo $pharmacy_products->TaxInclusive->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive">
<span<?php echo $pharmacy_products->TaxInclusive->viewAttributes() ?>>
<?php echo $pharmacy_products->TaxInclusive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
		<td<?php echo $pharmacy_products->EligibleforWarranty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty">
<span<?php echo $pharmacy_products->EligibleforWarranty->viewAttributes() ?>>
<?php echo $pharmacy_products->EligibleforWarranty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
		<td<?php echo $pharmacy_products->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty">
<span<?php echo $pharmacy_products->NoofMonthsWarranty->viewAttributes() ?>>
<?php echo $pharmacy_products->NoofMonthsWarranty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
		<td<?php echo $pharmacy_products->ComputeTaxonCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost">
<span<?php echo $pharmacy_products->ComputeTaxonCost->viewAttributes() ?>>
<?php echo $pharmacy_products->ComputeTaxonCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
		<td<?php echo $pharmacy_products->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack">
<span<?php echo $pharmacy_products->HasEmptyBottleTrack->viewAttributes() ?>>
<?php echo $pharmacy_products->HasEmptyBottleTrack->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
		<td<?php echo $pharmacy_products->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode">
<span<?php echo $pharmacy_products->EmptyBottleReferenceCode->viewAttributes() ?>>
<?php echo $pharmacy_products->EmptyBottleReferenceCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
		<td<?php echo $pharmacy_products->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount">
<span<?php echo $pharmacy_products->AdditionalCESSAmount->viewAttributes() ?>>
<?php echo $pharmacy_products->AdditionalCESSAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
		<td<?php echo $pharmacy_products->EmptyBottleRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_delete->RowCnt ?>_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate">
<span<?php echo $pharmacy_products->EmptyBottleRate->viewAttributes() ?>>
<?php echo $pharmacy_products->EmptyBottleRate->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_products_delete->terminate();
?>
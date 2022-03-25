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
$pharmacy_products_view = new pharmacy_products_view();

// Run the page
$pharmacy_products_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_products_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_products_view->isExport()) { ?>
<script>
var fpharmacy_productsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_productsview = currentForm = new ew.Form("fpharmacy_productsview", "view");
	loadjs.done("fpharmacy_productsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_products_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_products_view->ExportOptions->render("body") ?>
<?php $pharmacy_products_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_products_view->showPageHeader(); ?>
<?php
$pharmacy_products_view->showMessage();
?>
<form name="fpharmacy_productsview" id="fpharmacy_productsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_products_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_products_view->ProductCode->Visible) { // ProductCode ?>
	<tr id="r_ProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductCode"><?php echo $pharmacy_products_view->ProductCode->caption() ?></span></td>
		<td data-name="ProductCode" <?php echo $pharmacy_products_view->ProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductCode">
<span<?php echo $pharmacy_products_view->ProductCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductName->Visible) { // ProductName ?>
	<tr id="r_ProductName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductName"><?php echo $pharmacy_products_view->ProductName->caption() ?></span></td>
		<td data-name="ProductName" <?php echo $pharmacy_products_view->ProductName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductName">
<span<?php echo $pharmacy_products_view->ProductName->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DivisionCode->Visible) { // DivisionCode ?>
	<tr id="r_DivisionCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DivisionCode"><?php echo $pharmacy_products_view->DivisionCode->caption() ?></span></td>
		<td data-name="DivisionCode" <?php echo $pharmacy_products_view->DivisionCode->cellAttributes() ?>>
<span id="el_pharmacy_products_DivisionCode">
<span<?php echo $pharmacy_products_view->DivisionCode->viewAttributes() ?>><?php echo $pharmacy_products_view->DivisionCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ManufacturerCode->Visible) { // ManufacturerCode ?>
	<tr id="r_ManufacturerCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ManufacturerCode"><?php echo $pharmacy_products_view->ManufacturerCode->caption() ?></span></td>
		<td data-name="ManufacturerCode" <?php echo $pharmacy_products_view->ManufacturerCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ManufacturerCode">
<span<?php echo $pharmacy_products_view->ManufacturerCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ManufacturerCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SupplierCode->Visible) { // SupplierCode ?>
	<tr id="r_SupplierCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SupplierCode"><?php echo $pharmacy_products_view->SupplierCode->caption() ?></span></td>
		<td data-name="SupplierCode" <?php echo $pharmacy_products_view->SupplierCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SupplierCode">
<span<?php echo $pharmacy_products_view->SupplierCode->viewAttributes() ?>><?php echo $pharmacy_products_view->SupplierCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
	<tr id="r_AlternateSupplierCodes">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AlternateSupplierCodes"><?php echo $pharmacy_products_view->AlternateSupplierCodes->caption() ?></span></td>
		<td data-name="AlternateSupplierCodes" <?php echo $pharmacy_products_view->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSupplierCodes">
<span<?php echo $pharmacy_products_view->AlternateSupplierCodes->viewAttributes() ?>><?php echo $pharmacy_products_view->AlternateSupplierCodes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AlternateProductCode->Visible) { // AlternateProductCode ?>
	<tr id="r_AlternateProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AlternateProductCode"><?php echo $pharmacy_products_view->AlternateProductCode->caption() ?></span></td>
		<td data-name="AlternateProductCode" <?php echo $pharmacy_products_view->AlternateProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateProductCode">
<span<?php echo $pharmacy_products_view->AlternateProductCode->viewAttributes() ?>><?php echo $pharmacy_products_view->AlternateProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->UniversalProductCode->Visible) { // UniversalProductCode ?>
	<tr id="r_UniversalProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UniversalProductCode"><?php echo $pharmacy_products_view->UniversalProductCode->caption() ?></span></td>
		<td data-name="UniversalProductCode" <?php echo $pharmacy_products_view->UniversalProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_UniversalProductCode">
<span<?php echo $pharmacy_products_view->UniversalProductCode->viewAttributes() ?>><?php echo $pharmacy_products_view->UniversalProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BookProductCode->Visible) { // BookProductCode ?>
	<tr id="r_BookProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BookProductCode"><?php echo $pharmacy_products_view->BookProductCode->caption() ?></span></td>
		<td data-name="BookProductCode" <?php echo $pharmacy_products_view->BookProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BookProductCode">
<span<?php echo $pharmacy_products_view->BookProductCode->viewAttributes() ?>><?php echo $pharmacy_products_view->BookProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->OldCode->Visible) { // OldCode ?>
	<tr id="r_OldCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OldCode"><?php echo $pharmacy_products_view->OldCode->caption() ?></span></td>
		<td data-name="OldCode" <?php echo $pharmacy_products_view->OldCode->cellAttributes() ?>>
<span id="el_pharmacy_products_OldCode">
<span<?php echo $pharmacy_products_view->OldCode->viewAttributes() ?>><?php echo $pharmacy_products_view->OldCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProtectedProducts->Visible) { // ProtectedProducts ?>
	<tr id="r_ProtectedProducts">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProtectedProducts"><?php echo $pharmacy_products_view->ProtectedProducts->caption() ?></span></td>
		<td data-name="ProtectedProducts" <?php echo $pharmacy_products_view->ProtectedProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_ProtectedProducts">
<span<?php echo $pharmacy_products_view->ProtectedProducts->viewAttributes() ?>><?php echo $pharmacy_products_view->ProtectedProducts->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductFullName->Visible) { // ProductFullName ?>
	<tr id="r_ProductFullName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductFullName"><?php echo $pharmacy_products_view->ProductFullName->caption() ?></span></td>
		<td data-name="ProductFullName" <?php echo $pharmacy_products_view->ProductFullName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductFullName">
<span<?php echo $pharmacy_products_view->ProductFullName->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductFullName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
	<tr id="r_UnitOfMeasure">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UnitOfMeasure"><?php echo $pharmacy_products_view->UnitOfMeasure->caption() ?></span></td>
		<td data-name="UnitOfMeasure" <?php echo $pharmacy_products_view->UnitOfMeasure->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitOfMeasure">
<span<?php echo $pharmacy_products_view->UnitOfMeasure->viewAttributes() ?>><?php echo $pharmacy_products_view->UnitOfMeasure->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->UnitDescription->Visible) { // UnitDescription ?>
	<tr id="r_UnitDescription">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UnitDescription"><?php echo $pharmacy_products_view->UnitDescription->caption() ?></span></td>
		<td data-name="UnitDescription" <?php echo $pharmacy_products_view->UnitDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitDescription">
<span<?php echo $pharmacy_products_view->UnitDescription->viewAttributes() ?>><?php echo $pharmacy_products_view->UnitDescription->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BulkDescription->Visible) { // BulkDescription ?>
	<tr id="r_BulkDescription">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BulkDescription"><?php echo $pharmacy_products_view->BulkDescription->caption() ?></span></td>
		<td data-name="BulkDescription" <?php echo $pharmacy_products_view->BulkDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BulkDescription">
<span<?php echo $pharmacy_products_view->BulkDescription->viewAttributes() ?>><?php echo $pharmacy_products_view->BulkDescription->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BarCodeDescription->Visible) { // BarCodeDescription ?>
	<tr id="r_BarCodeDescription">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BarCodeDescription"><?php echo $pharmacy_products_view->BarCodeDescription->caption() ?></span></td>
		<td data-name="BarCodeDescription" <?php echo $pharmacy_products_view->BarCodeDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDescription">
<span<?php echo $pharmacy_products_view->BarCodeDescription->viewAttributes() ?>><?php echo $pharmacy_products_view->BarCodeDescription->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PackageInformation->Visible) { // PackageInformation ?>
	<tr id="r_PackageInformation">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PackageInformation"><?php echo $pharmacy_products_view->PackageInformation->caption() ?></span></td>
		<td data-name="PackageInformation" <?php echo $pharmacy_products_view->PackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageInformation">
<span<?php echo $pharmacy_products_view->PackageInformation->viewAttributes() ?>><?php echo $pharmacy_products_view->PackageInformation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PackageId->Visible) { // PackageId ?>
	<tr id="r_PackageId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PackageId"><?php echo $pharmacy_products_view->PackageId->caption() ?></span></td>
		<td data-name="PackageId" <?php echo $pharmacy_products_view->PackageId->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageId">
<span<?php echo $pharmacy_products_view->PackageId->viewAttributes() ?>><?php echo $pharmacy_products_view->PackageId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Weight->Visible) { // Weight ?>
	<tr id="r_Weight">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Weight"><?php echo $pharmacy_products_view->Weight->caption() ?></span></td>
		<td data-name="Weight" <?php echo $pharmacy_products_view->Weight->cellAttributes() ?>>
<span id="el_pharmacy_products_Weight">
<span<?php echo $pharmacy_products_view->Weight->viewAttributes() ?>><?php echo $pharmacy_products_view->Weight->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AllowFractions->Visible) { // AllowFractions ?>
	<tr id="r_AllowFractions">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowFractions"><?php echo $pharmacy_products_view->AllowFractions->caption() ?></span></td>
		<td data-name="AllowFractions" <?php echo $pharmacy_products_view->AllowFractions->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowFractions">
<span<?php echo $pharmacy_products_view->AllowFractions->viewAttributes() ?>><?php echo $pharmacy_products_view->AllowFractions->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
	<tr id="r_MinimumStockLevel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinimumStockLevel"><?php echo $pharmacy_products_view->MinimumStockLevel->caption() ?></span></td>
		<td data-name="MinimumStockLevel" <?php echo $pharmacy_products_view->MinimumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumStockLevel">
<span<?php echo $pharmacy_products_view->MinimumStockLevel->viewAttributes() ?>><?php echo $pharmacy_products_view->MinimumStockLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
	<tr id="r_MaximumStockLevel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MaximumStockLevel"><?php echo $pharmacy_products_view->MaximumStockLevel->caption() ?></span></td>
		<td data-name="MaximumStockLevel" <?php echo $pharmacy_products_view->MaximumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MaximumStockLevel">
<span<?php echo $pharmacy_products_view->MaximumStockLevel->viewAttributes() ?>><?php echo $pharmacy_products_view->MaximumStockLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ReorderLevel->Visible) { // ReorderLevel ?>
	<tr id="r_ReorderLevel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ReorderLevel"><?php echo $pharmacy_products_view->ReorderLevel->caption() ?></span></td>
		<td data-name="ReorderLevel" <?php echo $pharmacy_products_view->ReorderLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_ReorderLevel">
<span<?php echo $pharmacy_products_view->ReorderLevel->viewAttributes() ?>><?php echo $pharmacy_products_view->ReorderLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MinMaxRatio->Visible) { // MinMaxRatio ?>
	<tr id="r_MinMaxRatio">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinMaxRatio"><?php echo $pharmacy_products_view->MinMaxRatio->caption() ?></span></td>
		<td data-name="MinMaxRatio" <?php echo $pharmacy_products_view->MinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxRatio">
<span<?php echo $pharmacy_products_view->MinMaxRatio->viewAttributes() ?>><?php echo $pharmacy_products_view->MinMaxRatio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
	<tr id="r_AutoMinMaxRatio">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AutoMinMaxRatio"><?php echo $pharmacy_products_view->AutoMinMaxRatio->caption() ?></span></td>
		<td data-name="AutoMinMaxRatio" <?php echo $pharmacy_products_view->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_AutoMinMaxRatio">
<span<?php echo $pharmacy_products_view->AutoMinMaxRatio->viewAttributes() ?>><?php echo $pharmacy_products_view->AutoMinMaxRatio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ScheduleCode->Visible) { // ScheduleCode ?>
	<tr id="r_ScheduleCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ScheduleCode"><?php echo $pharmacy_products_view->ScheduleCode->caption() ?></span></td>
		<td data-name="ScheduleCode" <?php echo $pharmacy_products_view->ScheduleCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleCode">
<span<?php echo $pharmacy_products_view->ScheduleCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ScheduleCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->RopRatio->Visible) { // RopRatio ?>
	<tr id="r_RopRatio">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RopRatio"><?php echo $pharmacy_products_view->RopRatio->caption() ?></span></td>
		<td data-name="RopRatio" <?php echo $pharmacy_products_view->RopRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_RopRatio">
<span<?php echo $pharmacy_products_view->RopRatio->viewAttributes() ?>><?php echo $pharmacy_products_view->RopRatio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MRP"><?php echo $pharmacy_products_view->MRP->caption() ?></span></td>
		<td data-name="MRP" <?php echo $pharmacy_products_view->MRP->cellAttributes() ?>>
<span id="el_pharmacy_products_MRP">
<span<?php echo $pharmacy_products_view->MRP->viewAttributes() ?>><?php echo $pharmacy_products_view->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PurchasePrice->Visible) { // PurchasePrice ?>
	<tr id="r_PurchasePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PurchasePrice"><?php echo $pharmacy_products_view->PurchasePrice->caption() ?></span></td>
		<td data-name="PurchasePrice" <?php echo $pharmacy_products_view->PurchasePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchasePrice">
<span<?php echo $pharmacy_products_view->PurchasePrice->viewAttributes() ?>><?php echo $pharmacy_products_view->PurchasePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PurchaseUnit->Visible) { // PurchaseUnit ?>
	<tr id="r_PurchaseUnit">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PurchaseUnit"><?php echo $pharmacy_products_view->PurchaseUnit->caption() ?></span></td>
		<td data-name="PurchaseUnit" <?php echo $pharmacy_products_view->PurchaseUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseUnit">
<span<?php echo $pharmacy_products_view->PurchaseUnit->viewAttributes() ?>><?php echo $pharmacy_products_view->PurchaseUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
	<tr id="r_PurchaseTaxCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PurchaseTaxCode"><?php echo $pharmacy_products_view->PurchaseTaxCode->caption() ?></span></td>
		<td data-name="PurchaseTaxCode" <?php echo $pharmacy_products_view->PurchaseTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseTaxCode">
<span<?php echo $pharmacy_products_view->PurchaseTaxCode->viewAttributes() ?>><?php echo $pharmacy_products_view->PurchaseTaxCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AllowDirectInward->Visible) { // AllowDirectInward ?>
	<tr id="r_AllowDirectInward">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowDirectInward"><?php echo $pharmacy_products_view->AllowDirectInward->caption() ?></span></td>
		<td data-name="AllowDirectInward" <?php echo $pharmacy_products_view->AllowDirectInward->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowDirectInward">
<span<?php echo $pharmacy_products_view->AllowDirectInward->viewAttributes() ?>><?php echo $pharmacy_products_view->AllowDirectInward->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SalePrice->Visible) { // SalePrice ?>
	<tr id="r_SalePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalePrice"><?php echo $pharmacy_products_view->SalePrice->caption() ?></span></td>
		<td data-name="SalePrice" <?php echo $pharmacy_products_view->SalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePrice">
<span<?php echo $pharmacy_products_view->SalePrice->viewAttributes() ?>><?php echo $pharmacy_products_view->SalePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SaleUnit->Visible) { // SaleUnit ?>
	<tr id="r_SaleUnit">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SaleUnit"><?php echo $pharmacy_products_view->SaleUnit->caption() ?></span></td>
		<td data-name="SaleUnit" <?php echo $pharmacy_products_view->SaleUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleUnit">
<span<?php echo $pharmacy_products_view->SaleUnit->viewAttributes() ?>><?php echo $pharmacy_products_view->SaleUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SalesTaxCode->Visible) { // SalesTaxCode ?>
	<tr id="r_SalesTaxCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalesTaxCode"><?php echo $pharmacy_products_view->SalesTaxCode->caption() ?></span></td>
		<td data-name="SalesTaxCode" <?php echo $pharmacy_products_view->SalesTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesTaxCode">
<span<?php echo $pharmacy_products_view->SalesTaxCode->viewAttributes() ?>><?php echo $pharmacy_products_view->SalesTaxCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->StockReceived->Visible) { // StockReceived ?>
	<tr id="r_StockReceived">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockReceived"><?php echo $pharmacy_products_view->StockReceived->caption() ?></span></td>
		<td data-name="StockReceived" <?php echo $pharmacy_products_view->StockReceived->cellAttributes() ?>>
<span id="el_pharmacy_products_StockReceived">
<span<?php echo $pharmacy_products_view->StockReceived->viewAttributes() ?>><?php echo $pharmacy_products_view->StockReceived->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TotalStock->Visible) { // TotalStock ?>
	<tr id="r_TotalStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TotalStock"><?php echo $pharmacy_products_view->TotalStock->caption() ?></span></td>
		<td data-name="TotalStock" <?php echo $pharmacy_products_view->TotalStock->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalStock">
<span<?php echo $pharmacy_products_view->TotalStock->viewAttributes() ?>><?php echo $pharmacy_products_view->TotalStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->StockType->Visible) { // StockType ?>
	<tr id="r_StockType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockType"><?php echo $pharmacy_products_view->StockType->caption() ?></span></td>
		<td data-name="StockType" <?php echo $pharmacy_products_view->StockType->cellAttributes() ?>>
<span id="el_pharmacy_products_StockType">
<span<?php echo $pharmacy_products_view->StockType->viewAttributes() ?>><?php echo $pharmacy_products_view->StockType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->StockCheckDate->Visible) { // StockCheckDate ?>
	<tr id="r_StockCheckDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockCheckDate"><?php echo $pharmacy_products_view->StockCheckDate->caption() ?></span></td>
		<td data-name="StockCheckDate" <?php echo $pharmacy_products_view->StockCheckDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCheckDate">
<span<?php echo $pharmacy_products_view->StockCheckDate->viewAttributes() ?>><?php echo $pharmacy_products_view->StockCheckDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
	<tr id="r_StockAdjustmentDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockAdjustmentDate"><?php echo $pharmacy_products_view->StockAdjustmentDate->caption() ?></span></td>
		<td data-name="StockAdjustmentDate" <?php echo $pharmacy_products_view->StockAdjustmentDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockAdjustmentDate">
<span<?php echo $pharmacy_products_view->StockAdjustmentDate->viewAttributes() ?>><?php echo $pharmacy_products_view->StockAdjustmentDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Remarks"><?php echo $pharmacy_products_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $pharmacy_products_view->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_products_Remarks">
<span<?php echo $pharmacy_products_view->Remarks->viewAttributes() ?>><?php echo $pharmacy_products_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CostCentre->Visible) { // CostCentre ?>
	<tr id="r_CostCentre">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CostCentre"><?php echo $pharmacy_products_view->CostCentre->caption() ?></span></td>
		<td data-name="CostCentre" <?php echo $pharmacy_products_view->CostCentre->cellAttributes() ?>>
<span id="el_pharmacy_products_CostCentre">
<span<?php echo $pharmacy_products_view->CostCentre->viewAttributes() ?>><?php echo $pharmacy_products_view->CostCentre->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductType->Visible) { // ProductType ?>
	<tr id="r_ProductType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductType"><?php echo $pharmacy_products_view->ProductType->caption() ?></span></td>
		<td data-name="ProductType" <?php echo $pharmacy_products_view->ProductType->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductType">
<span<?php echo $pharmacy_products_view->ProductType->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TaxAmount->Visible) { // TaxAmount ?>
	<tr id="r_TaxAmount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TaxAmount"><?php echo $pharmacy_products_view->TaxAmount->caption() ?></span></td>
		<td data-name="TaxAmount" <?php echo $pharmacy_products_view->TaxAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxAmount">
<span<?php echo $pharmacy_products_view->TaxAmount->viewAttributes() ?>><?php echo $pharmacy_products_view->TaxAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TaxId->Visible) { // TaxId ?>
	<tr id="r_TaxId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TaxId"><?php echo $pharmacy_products_view->TaxId->caption() ?></span></td>
		<td data-name="TaxId" <?php echo $pharmacy_products_view->TaxId->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxId">
<span<?php echo $pharmacy_products_view->TaxId->viewAttributes() ?>><?php echo $pharmacy_products_view->TaxId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
	<tr id="r_ResaleTaxApplicable">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ResaleTaxApplicable"><?php echo $pharmacy_products_view->ResaleTaxApplicable->caption() ?></span></td>
		<td data-name="ResaleTaxApplicable" <?php echo $pharmacy_products_view->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ResaleTaxApplicable">
<span<?php echo $pharmacy_products_view->ResaleTaxApplicable->viewAttributes() ?>><?php echo $pharmacy_products_view->ResaleTaxApplicable->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CstOtherTax->Visible) { // CstOtherTax ?>
	<tr id="r_CstOtherTax">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CstOtherTax"><?php echo $pharmacy_products_view->CstOtherTax->caption() ?></span></td>
		<td data-name="CstOtherTax" <?php echo $pharmacy_products_view->CstOtherTax->cellAttributes() ?>>
<span id="el_pharmacy_products_CstOtherTax">
<span<?php echo $pharmacy_products_view->CstOtherTax->viewAttributes() ?>><?php echo $pharmacy_products_view->CstOtherTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TotalTax->Visible) { // TotalTax ?>
	<tr id="r_TotalTax">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TotalTax"><?php echo $pharmacy_products_view->TotalTax->caption() ?></span></td>
		<td data-name="TotalTax" <?php echo $pharmacy_products_view->TotalTax->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalTax">
<span<?php echo $pharmacy_products_view->TotalTax->viewAttributes() ?>><?php echo $pharmacy_products_view->TotalTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ItemCost->Visible) { // ItemCost ?>
	<tr id="r_ItemCost">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ItemCost"><?php echo $pharmacy_products_view->ItemCost->caption() ?></span></td>
		<td data-name="ItemCost" <?php echo $pharmacy_products_view->ItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ItemCost">
<span<?php echo $pharmacy_products_view->ItemCost->viewAttributes() ?>><?php echo $pharmacy_products_view->ItemCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ExpiryDate->Visible) { // ExpiryDate ?>
	<tr id="r_ExpiryDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExpiryDate"><?php echo $pharmacy_products_view->ExpiryDate->caption() ?></span></td>
		<td data-name="ExpiryDate" <?php echo $pharmacy_products_view->ExpiryDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryDate">
<span<?php echo $pharmacy_products_view->ExpiryDate->viewAttributes() ?>><?php echo $pharmacy_products_view->ExpiryDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BatchDescription->Visible) { // BatchDescription ?>
	<tr id="r_BatchDescription">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BatchDescription"><?php echo $pharmacy_products_view->BatchDescription->caption() ?></span></td>
		<td data-name="BatchDescription" <?php echo $pharmacy_products_view->BatchDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchDescription">
<span<?php echo $pharmacy_products_view->BatchDescription->viewAttributes() ?>><?php echo $pharmacy_products_view->BatchDescription->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FreeScheme->Visible) { // FreeScheme ?>
	<tr id="r_FreeScheme">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeScheme"><?php echo $pharmacy_products_view->FreeScheme->caption() ?></span></td>
		<td data-name="FreeScheme" <?php echo $pharmacy_products_view->FreeScheme->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeScheme">
<span<?php echo $pharmacy_products_view->FreeScheme->viewAttributes() ?>><?php echo $pharmacy_products_view->FreeScheme->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
	<tr id="r_CashDiscountEligibility">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CashDiscountEligibility"><?php echo $pharmacy_products_view->CashDiscountEligibility->caption() ?></span></td>
		<td data-name="CashDiscountEligibility" <?php echo $pharmacy_products_view->CashDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_CashDiscountEligibility">
<span<?php echo $pharmacy_products_view->CashDiscountEligibility->viewAttributes() ?>><?php echo $pharmacy_products_view->CashDiscountEligibility->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
	<tr id="r_DiscountPerAllowInBill">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DiscountPerAllowInBill"><?php echo $pharmacy_products_view->DiscountPerAllowInBill->caption() ?></span></td>
		<td data-name="DiscountPerAllowInBill" <?php echo $pharmacy_products_view->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountPerAllowInBill">
<span<?php echo $pharmacy_products_view->DiscountPerAllowInBill->viewAttributes() ?>><?php echo $pharmacy_products_view->DiscountPerAllowInBill->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Discount"><?php echo $pharmacy_products_view->Discount->caption() ?></span></td>
		<td data-name="Discount" <?php echo $pharmacy_products_view->Discount->cellAttributes() ?>>
<span id="el_pharmacy_products_Discount">
<span<?php echo $pharmacy_products_view->Discount->viewAttributes() ?>><?php echo $pharmacy_products_view->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TotalAmount->Visible) { // TotalAmount ?>
	<tr id="r_TotalAmount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TotalAmount"><?php echo $pharmacy_products_view->TotalAmount->caption() ?></span></td>
		<td data-name="TotalAmount" <?php echo $pharmacy_products_view->TotalAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalAmount">
<span<?php echo $pharmacy_products_view->TotalAmount->viewAttributes() ?>><?php echo $pharmacy_products_view->TotalAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->StandardMargin->Visible) { // StandardMargin ?>
	<tr id="r_StandardMargin">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StandardMargin"><?php echo $pharmacy_products_view->StandardMargin->caption() ?></span></td>
		<td data-name="StandardMargin" <?php echo $pharmacy_products_view->StandardMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_StandardMargin">
<span<?php echo $pharmacy_products_view->StandardMargin->viewAttributes() ?>><?php echo $pharmacy_products_view->StandardMargin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Margin->Visible) { // Margin ?>
	<tr id="r_Margin">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Margin"><?php echo $pharmacy_products_view->Margin->caption() ?></span></td>
		<td data-name="Margin" <?php echo $pharmacy_products_view->Margin->cellAttributes() ?>>
<span id="el_pharmacy_products_Margin">
<span<?php echo $pharmacy_products_view->Margin->viewAttributes() ?>><?php echo $pharmacy_products_view->Margin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MarginId->Visible) { // MarginId ?>
	<tr id="r_MarginId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarginId"><?php echo $pharmacy_products_view->MarginId->caption() ?></span></td>
		<td data-name="MarginId" <?php echo $pharmacy_products_view->MarginId->cellAttributes() ?>>
<span id="el_pharmacy_products_MarginId">
<span<?php echo $pharmacy_products_view->MarginId->viewAttributes() ?>><?php echo $pharmacy_products_view->MarginId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ExpectedMargin->Visible) { // ExpectedMargin ?>
	<tr id="r_ExpectedMargin">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExpectedMargin"><?php echo $pharmacy_products_view->ExpectedMargin->caption() ?></span></td>
		<td data-name="ExpectedMargin" <?php echo $pharmacy_products_view->ExpectedMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpectedMargin">
<span<?php echo $pharmacy_products_view->ExpectedMargin->viewAttributes() ?>><?php echo $pharmacy_products_view->ExpectedMargin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
	<tr id="r_SurchargeBeforeTax">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SurchargeBeforeTax"><?php echo $pharmacy_products_view->SurchargeBeforeTax->caption() ?></span></td>
		<td data-name="SurchargeBeforeTax" <?php echo $pharmacy_products_view->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeBeforeTax">
<span<?php echo $pharmacy_products_view->SurchargeBeforeTax->viewAttributes() ?>><?php echo $pharmacy_products_view->SurchargeBeforeTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
	<tr id="r_SurchargeAfterTax">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SurchargeAfterTax"><?php echo $pharmacy_products_view->SurchargeAfterTax->caption() ?></span></td>
		<td data-name="SurchargeAfterTax" <?php echo $pharmacy_products_view->SurchargeAfterTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeAfterTax">
<span<?php echo $pharmacy_products_view->SurchargeAfterTax->viewAttributes() ?>><?php echo $pharmacy_products_view->SurchargeAfterTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TempOrderNo->Visible) { // TempOrderNo ?>
	<tr id="r_TempOrderNo">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TempOrderNo"><?php echo $pharmacy_products_view->TempOrderNo->caption() ?></span></td>
		<td data-name="TempOrderNo" <?php echo $pharmacy_products_view->TempOrderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderNo">
<span<?php echo $pharmacy_products_view->TempOrderNo->viewAttributes() ?>><?php echo $pharmacy_products_view->TempOrderNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TempOrderDate->Visible) { // TempOrderDate ?>
	<tr id="r_TempOrderDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TempOrderDate"><?php echo $pharmacy_products_view->TempOrderDate->caption() ?></span></td>
		<td data-name="TempOrderDate" <?php echo $pharmacy_products_view->TempOrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderDate">
<span<?php echo $pharmacy_products_view->TempOrderDate->viewAttributes() ?>><?php echo $pharmacy_products_view->TempOrderDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->OrderUnit->Visible) { // OrderUnit ?>
	<tr id="r_OrderUnit">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderUnit"><?php echo $pharmacy_products_view->OrderUnit->caption() ?></span></td>
		<td data-name="OrderUnit" <?php echo $pharmacy_products_view->OrderUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderUnit">
<span<?php echo $pharmacy_products_view->OrderUnit->viewAttributes() ?>><?php echo $pharmacy_products_view->OrderUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->OrderQuantity->Visible) { // OrderQuantity ?>
	<tr id="r_OrderQuantity">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderQuantity"><?php echo $pharmacy_products_view->OrderQuantity->caption() ?></span></td>
		<td data-name="OrderQuantity" <?php echo $pharmacy_products_view->OrderQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderQuantity">
<span<?php echo $pharmacy_products_view->OrderQuantity->viewAttributes() ?>><?php echo $pharmacy_products_view->OrderQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MarkForOrder->Visible) { // MarkForOrder ?>
	<tr id="r_MarkForOrder">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkForOrder"><?php echo $pharmacy_products_view->MarkForOrder->caption() ?></span></td>
		<td data-name="MarkForOrder" <?php echo $pharmacy_products_view->MarkForOrder->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkForOrder">
<span<?php echo $pharmacy_products_view->MarkForOrder->viewAttributes() ?>><?php echo $pharmacy_products_view->MarkForOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->OrderAllId->Visible) { // OrderAllId ?>
	<tr id="r_OrderAllId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderAllId"><?php echo $pharmacy_products_view->OrderAllId->caption() ?></span></td>
		<td data-name="OrderAllId" <?php echo $pharmacy_products_view->OrderAllId->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderAllId">
<span<?php echo $pharmacy_products_view->OrderAllId->viewAttributes() ?>><?php echo $pharmacy_products_view->OrderAllId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
	<tr id="r_CalculateOrderQty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CalculateOrderQty"><?php echo $pharmacy_products_view->CalculateOrderQty->caption() ?></span></td>
		<td data-name="CalculateOrderQty" <?php echo $pharmacy_products_view->CalculateOrderQty->cellAttributes() ?>>
<span id="el_pharmacy_products_CalculateOrderQty">
<span<?php echo $pharmacy_products_view->CalculateOrderQty->viewAttributes() ?>><?php echo $pharmacy_products_view->CalculateOrderQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SubLocation->Visible) { // SubLocation ?>
	<tr id="r_SubLocation">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SubLocation"><?php echo $pharmacy_products_view->SubLocation->caption() ?></span></td>
		<td data-name="SubLocation" <?php echo $pharmacy_products_view->SubLocation->cellAttributes() ?>>
<span id="el_pharmacy_products_SubLocation">
<span<?php echo $pharmacy_products_view->SubLocation->viewAttributes() ?>><?php echo $pharmacy_products_view->SubLocation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CategoryCode->Visible) { // CategoryCode ?>
	<tr id="r_CategoryCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CategoryCode"><?php echo $pharmacy_products_view->CategoryCode->caption() ?></span></td>
		<td data-name="CategoryCode" <?php echo $pharmacy_products_view->CategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CategoryCode">
<span<?php echo $pharmacy_products_view->CategoryCode->viewAttributes() ?>><?php echo $pharmacy_products_view->CategoryCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SubCategory->Visible) { // SubCategory ?>
	<tr id="r_SubCategory">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SubCategory"><?php echo $pharmacy_products_view->SubCategory->caption() ?></span></td>
		<td data-name="SubCategory" <?php echo $pharmacy_products_view->SubCategory->cellAttributes() ?>>
<span id="el_pharmacy_products_SubCategory">
<span<?php echo $pharmacy_products_view->SubCategory->viewAttributes() ?>><?php echo $pharmacy_products_view->SubCategory->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
	<tr id="r_FlexCategoryCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FlexCategoryCode"><?php echo $pharmacy_products_view->FlexCategoryCode->caption() ?></span></td>
		<td data-name="FlexCategoryCode" <?php echo $pharmacy_products_view->FlexCategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_FlexCategoryCode">
<span<?php echo $pharmacy_products_view->FlexCategoryCode->viewAttributes() ?>><?php echo $pharmacy_products_view->FlexCategoryCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ABCSaleQty->Visible) { // ABCSaleQty ?>
	<tr id="r_ABCSaleQty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ABCSaleQty"><?php echo $pharmacy_products_view->ABCSaleQty->caption() ?></span></td>
		<td data-name="ABCSaleQty" <?php echo $pharmacy_products_view->ABCSaleQty->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleQty">
<span<?php echo $pharmacy_products_view->ABCSaleQty->viewAttributes() ?>><?php echo $pharmacy_products_view->ABCSaleQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ABCSaleValue->Visible) { // ABCSaleValue ?>
	<tr id="r_ABCSaleValue">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ABCSaleValue"><?php echo $pharmacy_products_view->ABCSaleValue->caption() ?></span></td>
		<td data-name="ABCSaleValue" <?php echo $pharmacy_products_view->ABCSaleValue->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleValue">
<span<?php echo $pharmacy_products_view->ABCSaleValue->viewAttributes() ?>><?php echo $pharmacy_products_view->ABCSaleValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ConvertionFactor->Visible) { // ConvertionFactor ?>
	<tr id="r_ConvertionFactor">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ConvertionFactor"><?php echo $pharmacy_products_view->ConvertionFactor->caption() ?></span></td>
		<td data-name="ConvertionFactor" <?php echo $pharmacy_products_view->ConvertionFactor->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionFactor">
<span<?php echo $pharmacy_products_view->ConvertionFactor->viewAttributes() ?>><?php echo $pharmacy_products_view->ConvertionFactor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
	<tr id="r_ConvertionUnitDesc">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ConvertionUnitDesc"><?php echo $pharmacy_products_view->ConvertionUnitDesc->caption() ?></span></td>
		<td data-name="ConvertionUnitDesc" <?php echo $pharmacy_products_view->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionUnitDesc">
<span<?php echo $pharmacy_products_view->ConvertionUnitDesc->viewAttributes() ?>><?php echo $pharmacy_products_view->ConvertionUnitDesc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TransactionId->Visible) { // TransactionId ?>
	<tr id="r_TransactionId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TransactionId"><?php echo $pharmacy_products_view->TransactionId->caption() ?></span></td>
		<td data-name="TransactionId" <?php echo $pharmacy_products_view->TransactionId->cellAttributes() ?>>
<span id="el_pharmacy_products_TransactionId">
<span<?php echo $pharmacy_products_view->TransactionId->viewAttributes() ?>><?php echo $pharmacy_products_view->TransactionId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SoldProductId->Visible) { // SoldProductId ?>
	<tr id="r_SoldProductId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SoldProductId"><?php echo $pharmacy_products_view->SoldProductId->caption() ?></span></td>
		<td data-name="SoldProductId" <?php echo $pharmacy_products_view->SoldProductId->cellAttributes() ?>>
<span id="el_pharmacy_products_SoldProductId">
<span<?php echo $pharmacy_products_view->SoldProductId->viewAttributes() ?>><?php echo $pharmacy_products_view->SoldProductId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->WantedBookId->Visible) { // WantedBookId ?>
	<tr id="r_WantedBookId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_WantedBookId"><?php echo $pharmacy_products_view->WantedBookId->caption() ?></span></td>
		<td data-name="WantedBookId" <?php echo $pharmacy_products_view->WantedBookId->cellAttributes() ?>>
<span id="el_pharmacy_products_WantedBookId">
<span<?php echo $pharmacy_products_view->WantedBookId->viewAttributes() ?>><?php echo $pharmacy_products_view->WantedBookId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AllId->Visible) { // AllId ?>
	<tr id="r_AllId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllId"><?php echo $pharmacy_products_view->AllId->caption() ?></span></td>
		<td data-name="AllId" <?php echo $pharmacy_products_view->AllId->cellAttributes() ?>>
<span id="el_pharmacy_products_AllId">
<span<?php echo $pharmacy_products_view->AllId->viewAttributes() ?>><?php echo $pharmacy_products_view->AllId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
	<tr id="r_BatchAndExpiryCompulsory">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BatchAndExpiryCompulsory"><?php echo $pharmacy_products_view->BatchAndExpiryCompulsory->caption() ?></span></td>
		<td data-name="BatchAndExpiryCompulsory" <?php echo $pharmacy_products_view->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchAndExpiryCompulsory">
<span<?php echo $pharmacy_products_view->BatchAndExpiryCompulsory->viewAttributes() ?>><?php echo $pharmacy_products_view->BatchAndExpiryCompulsory->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
	<tr id="r_BatchStockForWantedBook">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BatchStockForWantedBook"><?php echo $pharmacy_products_view->BatchStockForWantedBook->caption() ?></span></td>
		<td data-name="BatchStockForWantedBook" <?php echo $pharmacy_products_view->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchStockForWantedBook">
<span<?php echo $pharmacy_products_view->BatchStockForWantedBook->viewAttributes() ?>><?php echo $pharmacy_products_view->BatchStockForWantedBook->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
	<tr id="r_UnitBasedBilling">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UnitBasedBilling"><?php echo $pharmacy_products_view->UnitBasedBilling->caption() ?></span></td>
		<td data-name="UnitBasedBilling" <?php echo $pharmacy_products_view->UnitBasedBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitBasedBilling">
<span<?php echo $pharmacy_products_view->UnitBasedBilling->viewAttributes() ?>><?php echo $pharmacy_products_view->UnitBasedBilling->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
	<tr id="r_DoNotCheckStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DoNotCheckStock"><?php echo $pharmacy_products_view->DoNotCheckStock->caption() ?></span></td>
		<td data-name="DoNotCheckStock" <?php echo $pharmacy_products_view->DoNotCheckStock->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckStock">
<span<?php echo $pharmacy_products_view->DoNotCheckStock->viewAttributes() ?>><?php echo $pharmacy_products_view->DoNotCheckStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AcceptRate->Visible) { // AcceptRate ?>
	<tr id="r_AcceptRate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptRate"><?php echo $pharmacy_products_view->AcceptRate->caption() ?></span></td>
		<td data-name="AcceptRate" <?php echo $pharmacy_products_view->AcceptRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRate">
<span<?php echo $pharmacy_products_view->AcceptRate->viewAttributes() ?>><?php echo $pharmacy_products_view->AcceptRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PriceLevel->Visible) { // PriceLevel ?>
	<tr id="r_PriceLevel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PriceLevel"><?php echo $pharmacy_products_view->PriceLevel->caption() ?></span></td>
		<td data-name="PriceLevel" <?php echo $pharmacy_products_view->PriceLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceLevel">
<span<?php echo $pharmacy_products_view->PriceLevel->viewAttributes() ?>><?php echo $pharmacy_products_view->PriceLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LastQuotePrice->Visible) { // LastQuotePrice ?>
	<tr id="r_LastQuotePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LastQuotePrice"><?php echo $pharmacy_products_view->LastQuotePrice->caption() ?></span></td>
		<td data-name="LastQuotePrice" <?php echo $pharmacy_products_view->LastQuotePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_LastQuotePrice">
<span<?php echo $pharmacy_products_view->LastQuotePrice->viewAttributes() ?>><?php echo $pharmacy_products_view->LastQuotePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PriceChange->Visible) { // PriceChange ?>
	<tr id="r_PriceChange">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PriceChange"><?php echo $pharmacy_products_view->PriceChange->caption() ?></span></td>
		<td data-name="PriceChange" <?php echo $pharmacy_products_view->PriceChange->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceChange">
<span<?php echo $pharmacy_products_view->PriceChange->viewAttributes() ?>><?php echo $pharmacy_products_view->PriceChange->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CommodityCode->Visible) { // CommodityCode ?>
	<tr id="r_CommodityCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CommodityCode"><?php echo $pharmacy_products_view->CommodityCode->caption() ?></span></td>
		<td data-name="CommodityCode" <?php echo $pharmacy_products_view->CommodityCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CommodityCode">
<span<?php echo $pharmacy_products_view->CommodityCode->viewAttributes() ?>><?php echo $pharmacy_products_view->CommodityCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->InstitutePrice->Visible) { // InstitutePrice ?>
	<tr id="r_InstitutePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_InstitutePrice"><?php echo $pharmacy_products_view->InstitutePrice->caption() ?></span></td>
		<td data-name="InstitutePrice" <?php echo $pharmacy_products_view->InstitutePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_InstitutePrice">
<span<?php echo $pharmacy_products_view->InstitutePrice->viewAttributes() ?>><?php echo $pharmacy_products_view->InstitutePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
	<tr id="r_CtrlOrDCtrlProduct">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CtrlOrDCtrlProduct"><?php echo $pharmacy_products_view->CtrlOrDCtrlProduct->caption() ?></span></td>
		<td data-name="CtrlOrDCtrlProduct" <?php echo $pharmacy_products_view->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_CtrlOrDCtrlProduct">
<span<?php echo $pharmacy_products_view->CtrlOrDCtrlProduct->viewAttributes() ?>><?php echo $pharmacy_products_view->CtrlOrDCtrlProduct->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ImportedDate->Visible) { // ImportedDate ?>
	<tr id="r_ImportedDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ImportedDate"><?php echo $pharmacy_products_view->ImportedDate->caption() ?></span></td>
		<td data-name="ImportedDate" <?php echo $pharmacy_products_view->ImportedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ImportedDate">
<span<?php echo $pharmacy_products_view->ImportedDate->viewAttributes() ?>><?php echo $pharmacy_products_view->ImportedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IsImported->Visible) { // IsImported ?>
	<tr id="r_IsImported">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsImported"><?php echo $pharmacy_products_view->IsImported->caption() ?></span></td>
		<td data-name="IsImported" <?php echo $pharmacy_products_view->IsImported->cellAttributes() ?>>
<span id="el_pharmacy_products_IsImported">
<span<?php echo $pharmacy_products_view->IsImported->viewAttributes() ?>><?php echo $pharmacy_products_view->IsImported->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FileName->Visible) { // FileName ?>
	<tr id="r_FileName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FileName"><?php echo $pharmacy_products_view->FileName->caption() ?></span></td>
		<td data-name="FileName" <?php echo $pharmacy_products_view->FileName->cellAttributes() ?>>
<span id="el_pharmacy_products_FileName">
<span<?php echo $pharmacy_products_view->FileName->viewAttributes() ?>><?php echo $pharmacy_products_view->FileName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LPName->Visible) { // LPName ?>
	<tr id="r_LPName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LPName"><?php echo $pharmacy_products_view->LPName->caption() ?></span></td>
		<td data-name="LPName" <?php echo $pharmacy_products_view->LPName->cellAttributes() ?>>
<span id="el_pharmacy_products_LPName">
<span<?php echo $pharmacy_products_view->LPName->viewAttributes() ?>><?php echo $pharmacy_products_view->LPName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->GodownNumber->Visible) { // GodownNumber ?>
	<tr id="r_GodownNumber">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GodownNumber"><?php echo $pharmacy_products_view->GodownNumber->caption() ?></span></td>
		<td data-name="GodownNumber" <?php echo $pharmacy_products_view->GodownNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_GodownNumber">
<span<?php echo $pharmacy_products_view->GodownNumber->viewAttributes() ?>><?php echo $pharmacy_products_view->GodownNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CreationDate->Visible) { // CreationDate ?>
	<tr id="r_CreationDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CreationDate"><?php echo $pharmacy_products_view->CreationDate->caption() ?></span></td>
		<td data-name="CreationDate" <?php echo $pharmacy_products_view->CreationDate->cellAttributes() ?>>
<span id="el_pharmacy_products_CreationDate">
<span<?php echo $pharmacy_products_view->CreationDate->viewAttributes() ?>><?php echo $pharmacy_products_view->CreationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CreatedbyUser->Visible) { // CreatedbyUser ?>
	<tr id="r_CreatedbyUser">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CreatedbyUser"><?php echo $pharmacy_products_view->CreatedbyUser->caption() ?></span></td>
		<td data-name="CreatedbyUser" <?php echo $pharmacy_products_view->CreatedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_CreatedbyUser">
<span<?php echo $pharmacy_products_view->CreatedbyUser->viewAttributes() ?>><?php echo $pharmacy_products_view->CreatedbyUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ModifiedDate->Visible) { // ModifiedDate ?>
	<tr id="r_ModifiedDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifiedDate"><?php echo $pharmacy_products_view->ModifiedDate->caption() ?></span></td>
		<td data-name="ModifiedDate" <?php echo $pharmacy_products_view->ModifiedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedDate">
<span<?php echo $pharmacy_products_view->ModifiedDate->viewAttributes() ?>><?php echo $pharmacy_products_view->ModifiedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
	<tr id="r_ModifiedbyUser">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifiedbyUser"><?php echo $pharmacy_products_view->ModifiedbyUser->caption() ?></span></td>
		<td data-name="ModifiedbyUser" <?php echo $pharmacy_products_view->ModifiedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedbyUser">
<span<?php echo $pharmacy_products_view->ModifiedbyUser->viewAttributes() ?>><?php echo $pharmacy_products_view->ModifiedbyUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->isActive->Visible) { // isActive ?>
	<tr id="r_isActive">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_isActive"><?php echo $pharmacy_products_view->isActive->caption() ?></span></td>
		<td data-name="isActive" <?php echo $pharmacy_products_view->isActive->cellAttributes() ?>>
<span id="el_pharmacy_products_isActive">
<span<?php echo $pharmacy_products_view->isActive->viewAttributes() ?>><?php echo $pharmacy_products_view->isActive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
	<tr id="r_AllowExpiryClaim">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowExpiryClaim"><?php echo $pharmacy_products_view->AllowExpiryClaim->caption() ?></span></td>
		<td data-name="AllowExpiryClaim" <?php echo $pharmacy_products_view->AllowExpiryClaim->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryClaim">
<span<?php echo $pharmacy_products_view->AllowExpiryClaim->viewAttributes() ?>><?php echo $pharmacy_products_view->AllowExpiryClaim->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BrandCode->Visible) { // BrandCode ?>
	<tr id="r_BrandCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BrandCode"><?php echo $pharmacy_products_view->BrandCode->caption() ?></span></td>
		<td data-name="BrandCode" <?php echo $pharmacy_products_view->BrandCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BrandCode">
<span<?php echo $pharmacy_products_view->BrandCode->viewAttributes() ?>><?php echo $pharmacy_products_view->BrandCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
	<tr id="r_FreeSchemeBasedon">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeSchemeBasedon"><?php echo $pharmacy_products_view->FreeSchemeBasedon->caption() ?></span></td>
		<td data-name="FreeSchemeBasedon" <?php echo $pharmacy_products_view->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeSchemeBasedon">
<span<?php echo $pharmacy_products_view->FreeSchemeBasedon->viewAttributes() ?>><?php echo $pharmacy_products_view->FreeSchemeBasedon->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
	<tr id="r_DoNotCheckCostInBill">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DoNotCheckCostInBill"><?php echo $pharmacy_products_view->DoNotCheckCostInBill->caption() ?></span></td>
		<td data-name="DoNotCheckCostInBill" <?php echo $pharmacy_products_view->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckCostInBill">
<span<?php echo $pharmacy_products_view->DoNotCheckCostInBill->viewAttributes() ?>><?php echo $pharmacy_products_view->DoNotCheckCostInBill->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductGroupCode->Visible) { // ProductGroupCode ?>
	<tr id="r_ProductGroupCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductGroupCode"><?php echo $pharmacy_products_view->ProductGroupCode->caption() ?></span></td>
		<td data-name="ProductGroupCode" <?php echo $pharmacy_products_view->ProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductGroupCode">
<span<?php echo $pharmacy_products_view->ProductGroupCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductGroupCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
	<tr id="r_ProductStrengthCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductStrengthCode"><?php echo $pharmacy_products_view->ProductStrengthCode->caption() ?></span></td>
		<td data-name="ProductStrengthCode" <?php echo $pharmacy_products_view->ProductStrengthCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductStrengthCode">
<span<?php echo $pharmacy_products_view->ProductStrengthCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductStrengthCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PackingCode->Visible) { // PackingCode ?>
	<tr id="r_PackingCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PackingCode"><?php echo $pharmacy_products_view->PackingCode->caption() ?></span></td>
		<td data-name="PackingCode" <?php echo $pharmacy_products_view->PackingCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PackingCode">
<span<?php echo $pharmacy_products_view->PackingCode->viewAttributes() ?>><?php echo $pharmacy_products_view->PackingCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ComputedMinStock->Visible) { // ComputedMinStock ?>
	<tr id="r_ComputedMinStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComputedMinStock"><?php echo $pharmacy_products_view->ComputedMinStock->caption() ?></span></td>
		<td data-name="ComputedMinStock" <?php echo $pharmacy_products_view->ComputedMinStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMinStock">
<span<?php echo $pharmacy_products_view->ComputedMinStock->viewAttributes() ?>><?php echo $pharmacy_products_view->ComputedMinStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
	<tr id="r_ComputedMaxStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComputedMaxStock"><?php echo $pharmacy_products_view->ComputedMaxStock->caption() ?></span></td>
		<td data-name="ComputedMaxStock" <?php echo $pharmacy_products_view->ComputedMaxStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMaxStock">
<span<?php echo $pharmacy_products_view->ComputedMaxStock->viewAttributes() ?>><?php echo $pharmacy_products_view->ComputedMaxStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductRemark->Visible) { // ProductRemark ?>
	<tr id="r_ProductRemark">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductRemark"><?php echo $pharmacy_products_view->ProductRemark->caption() ?></span></td>
		<td data-name="ProductRemark" <?php echo $pharmacy_products_view->ProductRemark->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductRemark">
<span<?php echo $pharmacy_products_view->ProductRemark->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductRemark->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductDrugCode->Visible) { // ProductDrugCode ?>
	<tr id="r_ProductDrugCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductDrugCode"><?php echo $pharmacy_products_view->ProductDrugCode->caption() ?></span></td>
		<td data-name="ProductDrugCode" <?php echo $pharmacy_products_view->ProductDrugCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDrugCode">
<span<?php echo $pharmacy_products_view->ProductDrugCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductDrugCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
	<tr id="r_IsMatrixProduct">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsMatrixProduct"><?php echo $pharmacy_products_view->IsMatrixProduct->caption() ?></span></td>
		<td data-name="IsMatrixProduct" <?php echo $pharmacy_products_view->IsMatrixProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMatrixProduct">
<span<?php echo $pharmacy_products_view->IsMatrixProduct->viewAttributes() ?>><?php echo $pharmacy_products_view->IsMatrixProduct->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount1->Visible) { // AttributeCount1 ?>
	<tr id="r_AttributeCount1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount1"><?php echo $pharmacy_products_view->AttributeCount1->caption() ?></span></td>
		<td data-name="AttributeCount1" <?php echo $pharmacy_products_view->AttributeCount1->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount1">
<span<?php echo $pharmacy_products_view->AttributeCount1->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount2->Visible) { // AttributeCount2 ?>
	<tr id="r_AttributeCount2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount2"><?php echo $pharmacy_products_view->AttributeCount2->caption() ?></span></td>
		<td data-name="AttributeCount2" <?php echo $pharmacy_products_view->AttributeCount2->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount2">
<span<?php echo $pharmacy_products_view->AttributeCount2->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount3->Visible) { // AttributeCount3 ?>
	<tr id="r_AttributeCount3">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount3"><?php echo $pharmacy_products_view->AttributeCount3->caption() ?></span></td>
		<td data-name="AttributeCount3" <?php echo $pharmacy_products_view->AttributeCount3->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount3">
<span<?php echo $pharmacy_products_view->AttributeCount3->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount4->Visible) { // AttributeCount4 ?>
	<tr id="r_AttributeCount4">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount4"><?php echo $pharmacy_products_view->AttributeCount4->caption() ?></span></td>
		<td data-name="AttributeCount4" <?php echo $pharmacy_products_view->AttributeCount4->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount4">
<span<?php echo $pharmacy_products_view->AttributeCount4->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount5->Visible) { // AttributeCount5 ?>
	<tr id="r_AttributeCount5">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount5"><?php echo $pharmacy_products_view->AttributeCount5->caption() ?></span></td>
		<td data-name="AttributeCount5" <?php echo $pharmacy_products_view->AttributeCount5->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount5">
<span<?php echo $pharmacy_products_view->AttributeCount5->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
	<tr id="r_DefaultDiscountPercentage">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultDiscountPercentage"><?php echo $pharmacy_products_view->DefaultDiscountPercentage->caption() ?></span></td>
		<td data-name="DefaultDiscountPercentage" <?php echo $pharmacy_products_view->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultDiscountPercentage">
<span<?php echo $pharmacy_products_view->DefaultDiscountPercentage->viewAttributes() ?>><?php echo $pharmacy_products_view->DefaultDiscountPercentage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
	<tr id="r_DonotPrintBarcode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DonotPrintBarcode"><?php echo $pharmacy_products_view->DonotPrintBarcode->caption() ?></span></td>
		<td data-name="DonotPrintBarcode" <?php echo $pharmacy_products_view->DonotPrintBarcode->cellAttributes() ?>>
<span id="el_pharmacy_products_DonotPrintBarcode">
<span<?php echo $pharmacy_products_view->DonotPrintBarcode->viewAttributes() ?>><?php echo $pharmacy_products_view->DonotPrintBarcode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
	<tr id="r_ProductLevelDiscount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductLevelDiscount"><?php echo $pharmacy_products_view->ProductLevelDiscount->caption() ?></span></td>
		<td data-name="ProductLevelDiscount" <?php echo $pharmacy_products_view->ProductLevelDiscount->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLevelDiscount">
<span<?php echo $pharmacy_products_view->ProductLevelDiscount->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductLevelDiscount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Markup->Visible) { // Markup ?>
	<tr id="r_Markup">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Markup"><?php echo $pharmacy_products_view->Markup->caption() ?></span></td>
		<td data-name="Markup" <?php echo $pharmacy_products_view->Markup->cellAttributes() ?>>
<span id="el_pharmacy_products_Markup">
<span<?php echo $pharmacy_products_view->Markup->viewAttributes() ?>><?php echo $pharmacy_products_view->Markup->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MarkDown->Visible) { // MarkDown ?>
	<tr id="r_MarkDown">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkDown"><?php echo $pharmacy_products_view->MarkDown->caption() ?></span></td>
		<td data-name="MarkDown" <?php echo $pharmacy_products_view->MarkDown->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDown">
<span<?php echo $pharmacy_products_view->MarkDown->viewAttributes() ?>><?php echo $pharmacy_products_view->MarkDown->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
	<tr id="r_ReworkSalePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ReworkSalePrice"><?php echo $pharmacy_products_view->ReworkSalePrice->caption() ?></span></td>
		<td data-name="ReworkSalePrice" <?php echo $pharmacy_products_view->ReworkSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_ReworkSalePrice">
<span<?php echo $pharmacy_products_view->ReworkSalePrice->viewAttributes() ?>><?php echo $pharmacy_products_view->ReworkSalePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MultipleInput->Visible) { // MultipleInput ?>
	<tr id="r_MultipleInput">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MultipleInput"><?php echo $pharmacy_products_view->MultipleInput->caption() ?></span></td>
		<td data-name="MultipleInput" <?php echo $pharmacy_products_view->MultipleInput->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleInput">
<span<?php echo $pharmacy_products_view->MultipleInput->viewAttributes() ?>><?php echo $pharmacy_products_view->MultipleInput->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LpPackageInformation->Visible) { // LpPackageInformation ?>
	<tr id="r_LpPackageInformation">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LpPackageInformation"><?php echo $pharmacy_products_view->LpPackageInformation->caption() ?></span></td>
		<td data-name="LpPackageInformation" <?php echo $pharmacy_products_view->LpPackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_LpPackageInformation">
<span<?php echo $pharmacy_products_view->LpPackageInformation->viewAttributes() ?>><?php echo $pharmacy_products_view->LpPackageInformation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
	<tr id="r_AllowNegativeStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowNegativeStock"><?php echo $pharmacy_products_view->AllowNegativeStock->caption() ?></span></td>
		<td data-name="AllowNegativeStock" <?php echo $pharmacy_products_view->AllowNegativeStock->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowNegativeStock">
<span<?php echo $pharmacy_products_view->AllowNegativeStock->viewAttributes() ?>><?php echo $pharmacy_products_view->AllowNegativeStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->OrderDate->Visible) { // OrderDate ?>
	<tr id="r_OrderDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderDate"><?php echo $pharmacy_products_view->OrderDate->caption() ?></span></td>
		<td data-name="OrderDate" <?php echo $pharmacy_products_view->OrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderDate">
<span<?php echo $pharmacy_products_view->OrderDate->viewAttributes() ?>><?php echo $pharmacy_products_view->OrderDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->OrderTime->Visible) { // OrderTime ?>
	<tr id="r_OrderTime">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderTime"><?php echo $pharmacy_products_view->OrderTime->caption() ?></span></td>
		<td data-name="OrderTime" <?php echo $pharmacy_products_view->OrderTime->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderTime">
<span<?php echo $pharmacy_products_view->OrderTime->viewAttributes() ?>><?php echo $pharmacy_products_view->OrderTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->RateGroupCode->Visible) { // RateGroupCode ?>
	<tr id="r_RateGroupCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RateGroupCode"><?php echo $pharmacy_products_view->RateGroupCode->caption() ?></span></td>
		<td data-name="RateGroupCode" <?php echo $pharmacy_products_view->RateGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RateGroupCode">
<span<?php echo $pharmacy_products_view->RateGroupCode->viewAttributes() ?>><?php echo $pharmacy_products_view->RateGroupCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
	<tr id="r_ConversionCaseLot">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ConversionCaseLot"><?php echo $pharmacy_products_view->ConversionCaseLot->caption() ?></span></td>
		<td data-name="ConversionCaseLot" <?php echo $pharmacy_products_view->ConversionCaseLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ConversionCaseLot">
<span<?php echo $pharmacy_products_view->ConversionCaseLot->viewAttributes() ?>><?php echo $pharmacy_products_view->ConversionCaseLot->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ShippingLot->Visible) { // ShippingLot ?>
	<tr id="r_ShippingLot">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ShippingLot"><?php echo $pharmacy_products_view->ShippingLot->caption() ?></span></td>
		<td data-name="ShippingLot" <?php echo $pharmacy_products_view->ShippingLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ShippingLot">
<span<?php echo $pharmacy_products_view->ShippingLot->viewAttributes() ?>><?php echo $pharmacy_products_view->ShippingLot->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
	<tr id="r_AllowExpiryReplacement">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowExpiryReplacement"><?php echo $pharmacy_products_view->AllowExpiryReplacement->caption() ?></span></td>
		<td data-name="AllowExpiryReplacement" <?php echo $pharmacy_products_view->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryReplacement">
<span<?php echo $pharmacy_products_view->AllowExpiryReplacement->viewAttributes() ?>><?php echo $pharmacy_products_view->AllowExpiryReplacement->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
	<tr id="r_NoOfMonthExpiryAllowed">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_NoOfMonthExpiryAllowed"><?php echo $pharmacy_products_view->NoOfMonthExpiryAllowed->caption() ?></span></td>
		<td data-name="NoOfMonthExpiryAllowed" <?php echo $pharmacy_products_view->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el_pharmacy_products_NoOfMonthExpiryAllowed">
<span<?php echo $pharmacy_products_view->NoOfMonthExpiryAllowed->viewAttributes() ?>><?php echo $pharmacy_products_view->NoOfMonthExpiryAllowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
	<tr id="r_ProductDiscountEligibility">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductDiscountEligibility"><?php echo $pharmacy_products_view->ProductDiscountEligibility->caption() ?></span></td>
		<td data-name="ProductDiscountEligibility" <?php echo $pharmacy_products_view->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDiscountEligibility">
<span<?php echo $pharmacy_products_view->ProductDiscountEligibility->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductDiscountEligibility->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
	<tr id="r_ScheduleTypeCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ScheduleTypeCode"><?php echo $pharmacy_products_view->ScheduleTypeCode->caption() ?></span></td>
		<td data-name="ScheduleTypeCode" <?php echo $pharmacy_products_view->ScheduleTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleTypeCode">
<span<?php echo $pharmacy_products_view->ScheduleTypeCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ScheduleTypeCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
	<tr id="r_AIOCDProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AIOCDProductCode"><?php echo $pharmacy_products_view->AIOCDProductCode->caption() ?></span></td>
		<td data-name="AIOCDProductCode" <?php echo $pharmacy_products_view->AIOCDProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AIOCDProductCode">
<span<?php echo $pharmacy_products_view->AIOCDProductCode->viewAttributes() ?>><?php echo $pharmacy_products_view->AIOCDProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FreeQuantity->Visible) { // FreeQuantity ?>
	<tr id="r_FreeQuantity">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeQuantity"><?php echo $pharmacy_products_view->FreeQuantity->caption() ?></span></td>
		<td data-name="FreeQuantity" <?php echo $pharmacy_products_view->FreeQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeQuantity">
<span<?php echo $pharmacy_products_view->FreeQuantity->viewAttributes() ?>><?php echo $pharmacy_products_view->FreeQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DiscountType->Visible) { // DiscountType ?>
	<tr id="r_DiscountType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DiscountType"><?php echo $pharmacy_products_view->DiscountType->caption() ?></span></td>
		<td data-name="DiscountType" <?php echo $pharmacy_products_view->DiscountType->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountType">
<span<?php echo $pharmacy_products_view->DiscountType->viewAttributes() ?>><?php echo $pharmacy_products_view->DiscountType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DiscountValue->Visible) { // DiscountValue ?>
	<tr id="r_DiscountValue">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DiscountValue"><?php echo $pharmacy_products_view->DiscountValue->caption() ?></span></td>
		<td data-name="DiscountValue" <?php echo $pharmacy_products_view->DiscountValue->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountValue">
<span<?php echo $pharmacy_products_view->DiscountValue->viewAttributes() ?>><?php echo $pharmacy_products_view->DiscountValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
	<tr id="r_HasProductOrderAttribute">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_HasProductOrderAttribute"><?php echo $pharmacy_products_view->HasProductOrderAttribute->caption() ?></span></td>
		<td data-name="HasProductOrderAttribute" <?php echo $pharmacy_products_view->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el_pharmacy_products_HasProductOrderAttribute">
<span<?php echo $pharmacy_products_view->HasProductOrderAttribute->viewAttributes() ?>><?php echo $pharmacy_products_view->HasProductOrderAttribute->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FirstPODate->Visible) { // FirstPODate ?>
	<tr id="r_FirstPODate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FirstPODate"><?php echo $pharmacy_products_view->FirstPODate->caption() ?></span></td>
		<td data-name="FirstPODate" <?php echo $pharmacy_products_view->FirstPODate->cellAttributes() ?>>
<span id="el_pharmacy_products_FirstPODate">
<span<?php echo $pharmacy_products_view->FirstPODate->viewAttributes() ?>><?php echo $pharmacy_products_view->FirstPODate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
	<tr id="r_SaleprcieAndMrpCalcPercent">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent"><?php echo $pharmacy_products_view->SaleprcieAndMrpCalcPercent->caption() ?></span></td>
		<td data-name="SaleprcieAndMrpCalcPercent" <?php echo $pharmacy_products_view->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleprcieAndMrpCalcPercent">
<span<?php echo $pharmacy_products_view->SaleprcieAndMrpCalcPercent->viewAttributes() ?>><?php echo $pharmacy_products_view->SaleprcieAndMrpCalcPercent->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
	<tr id="r_IsGiftVoucherProducts">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsGiftVoucherProducts"><?php echo $pharmacy_products_view->IsGiftVoucherProducts->caption() ?></span></td>
		<td data-name="IsGiftVoucherProducts" <?php echo $pharmacy_products_view->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_IsGiftVoucherProducts">
<span<?php echo $pharmacy_products_view->IsGiftVoucherProducts->viewAttributes() ?>><?php echo $pharmacy_products_view->IsGiftVoucherProducts->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
	<tr id="r_AcceptRange4SerialNumber">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptRange4SerialNumber"><?php echo $pharmacy_products_view->AcceptRange4SerialNumber->caption() ?></span></td>
		<td data-name="AcceptRange4SerialNumber" <?php echo $pharmacy_products_view->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRange4SerialNumber">
<span<?php echo $pharmacy_products_view->AcceptRange4SerialNumber->viewAttributes() ?>><?php echo $pharmacy_products_view->AcceptRange4SerialNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
	<tr id="r_GiftVoucherDenomination">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GiftVoucherDenomination"><?php echo $pharmacy_products_view->GiftVoucherDenomination->caption() ?></span></td>
		<td data-name="GiftVoucherDenomination" <?php echo $pharmacy_products_view->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftVoucherDenomination">
<span<?php echo $pharmacy_products_view->GiftVoucherDenomination->viewAttributes() ?>><?php echo $pharmacy_products_view->GiftVoucherDenomination->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Subclasscode->Visible) { // Subclasscode ?>
	<tr id="r_Subclasscode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Subclasscode"><?php echo $pharmacy_products_view->Subclasscode->caption() ?></span></td>
		<td data-name="Subclasscode" <?php echo $pharmacy_products_view->Subclasscode->cellAttributes() ?>>
<span id="el_pharmacy_products_Subclasscode">
<span<?php echo $pharmacy_products_view->Subclasscode->viewAttributes() ?>><?php echo $pharmacy_products_view->Subclasscode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
	<tr id="r_BarCodeFromWeighingMachine">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BarCodeFromWeighingMachine"><?php echo $pharmacy_products_view->BarCodeFromWeighingMachine->caption() ?></span></td>
		<td data-name="BarCodeFromWeighingMachine" <?php echo $pharmacy_products_view->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeFromWeighingMachine">
<span<?php echo $pharmacy_products_view->BarCodeFromWeighingMachine->viewAttributes() ?>><?php echo $pharmacy_products_view->BarCodeFromWeighingMachine->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
	<tr id="r_CheckCostInReturn">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CheckCostInReturn"><?php echo $pharmacy_products_view->CheckCostInReturn->caption() ?></span></td>
		<td data-name="CheckCostInReturn" <?php echo $pharmacy_products_view->CheckCostInReturn->cellAttributes() ?>>
<span id="el_pharmacy_products_CheckCostInReturn">
<span<?php echo $pharmacy_products_view->CheckCostInReturn->viewAttributes() ?>><?php echo $pharmacy_products_view->CheckCostInReturn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
	<tr id="r_FrequentSaleProduct">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FrequentSaleProduct"><?php echo $pharmacy_products_view->FrequentSaleProduct->caption() ?></span></td>
		<td data-name="FrequentSaleProduct" <?php echo $pharmacy_products_view->FrequentSaleProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_FrequentSaleProduct">
<span<?php echo $pharmacy_products_view->FrequentSaleProduct->viewAttributes() ?>><?php echo $pharmacy_products_view->FrequentSaleProduct->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->RateType->Visible) { // RateType ?>
	<tr id="r_RateType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RateType"><?php echo $pharmacy_products_view->RateType->caption() ?></span></td>
		<td data-name="RateType" <?php echo $pharmacy_products_view->RateType->cellAttributes() ?>>
<span id="el_pharmacy_products_RateType">
<span<?php echo $pharmacy_products_view->RateType->viewAttributes() ?>><?php echo $pharmacy_products_view->RateType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TouchscreenName->Visible) { // TouchscreenName ?>
	<tr id="r_TouchscreenName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TouchscreenName"><?php echo $pharmacy_products_view->TouchscreenName->caption() ?></span></td>
		<td data-name="TouchscreenName" <?php echo $pharmacy_products_view->TouchscreenName->cellAttributes() ?>>
<span id="el_pharmacy_products_TouchscreenName">
<span<?php echo $pharmacy_products_view->TouchscreenName->viewAttributes() ?>><?php echo $pharmacy_products_view->TouchscreenName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FreeType->Visible) { // FreeType ?>
	<tr id="r_FreeType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeType"><?php echo $pharmacy_products_view->FreeType->caption() ?></span></td>
		<td data-name="FreeType" <?php echo $pharmacy_products_view->FreeType->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeType">
<span<?php echo $pharmacy_products_view->FreeType->viewAttributes() ?>><?php echo $pharmacy_products_view->FreeType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
	<tr id="r_LooseQtyasNewBatch">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LooseQtyasNewBatch"><?php echo $pharmacy_products_view->LooseQtyasNewBatch->caption() ?></span></td>
		<td data-name="LooseQtyasNewBatch" <?php echo $pharmacy_products_view->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_LooseQtyasNewBatch">
<span<?php echo $pharmacy_products_view->LooseQtyasNewBatch->viewAttributes() ?>><?php echo $pharmacy_products_view->LooseQtyasNewBatch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
	<tr id="r_AllowSlabBilling">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowSlabBilling"><?php echo $pharmacy_products_view->AllowSlabBilling->caption() ?></span></td>
		<td data-name="AllowSlabBilling" <?php echo $pharmacy_products_view->AllowSlabBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowSlabBilling">
<span<?php echo $pharmacy_products_view->AllowSlabBilling->viewAttributes() ?>><?php echo $pharmacy_products_view->AllowSlabBilling->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
	<tr id="r_ProductTypeForProduction">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductTypeForProduction"><?php echo $pharmacy_products_view->ProductTypeForProduction->caption() ?></span></td>
		<td data-name="ProductTypeForProduction" <?php echo $pharmacy_products_view->ProductTypeForProduction->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductTypeForProduction">
<span<?php echo $pharmacy_products_view->ProductTypeForProduction->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductTypeForProduction->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->RecipeCode->Visible) { // RecipeCode ?>
	<tr id="r_RecipeCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RecipeCode"><?php echo $pharmacy_products_view->RecipeCode->caption() ?></span></td>
		<td data-name="RecipeCode" <?php echo $pharmacy_products_view->RecipeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RecipeCode">
<span<?php echo $pharmacy_products_view->RecipeCode->viewAttributes() ?>><?php echo $pharmacy_products_view->RecipeCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DefaultUnitType->Visible) { // DefaultUnitType ?>
	<tr id="r_DefaultUnitType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultUnitType"><?php echo $pharmacy_products_view->DefaultUnitType->caption() ?></span></td>
		<td data-name="DefaultUnitType" <?php echo $pharmacy_products_view->DefaultUnitType->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultUnitType">
<span<?php echo $pharmacy_products_view->DefaultUnitType->viewAttributes() ?>><?php echo $pharmacy_products_view->DefaultUnitType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PIstatus->Visible) { // PIstatus ?>
	<tr id="r_PIstatus">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PIstatus"><?php echo $pharmacy_products_view->PIstatus->caption() ?></span></td>
		<td data-name="PIstatus" <?php echo $pharmacy_products_view->PIstatus->cellAttributes() ?>>
<span id="el_pharmacy_products_PIstatus">
<span<?php echo $pharmacy_products_view->PIstatus->viewAttributes() ?>><?php echo $pharmacy_products_view->PIstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
	<tr id="r_LastPiConfirmedDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LastPiConfirmedDate"><?php echo $pharmacy_products_view->LastPiConfirmedDate->caption() ?></span></td>
		<td data-name="LastPiConfirmedDate" <?php echo $pharmacy_products_view->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPiConfirmedDate">
<span<?php echo $pharmacy_products_view->LastPiConfirmedDate->viewAttributes() ?>><?php echo $pharmacy_products_view->LastPiConfirmedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BarCodeDesign->Visible) { // BarCodeDesign ?>
	<tr id="r_BarCodeDesign">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BarCodeDesign"><?php echo $pharmacy_products_view->BarCodeDesign->caption() ?></span></td>
		<td data-name="BarCodeDesign" <?php echo $pharmacy_products_view->BarCodeDesign->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDesign">
<span<?php echo $pharmacy_products_view->BarCodeDesign->viewAttributes() ?>><?php echo $pharmacy_products_view->BarCodeDesign->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
	<tr id="r_AcceptRemarksInBill">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptRemarksInBill"><?php echo $pharmacy_products_view->AcceptRemarksInBill->caption() ?></span></td>
		<td data-name="AcceptRemarksInBill" <?php echo $pharmacy_products_view->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRemarksInBill">
<span<?php echo $pharmacy_products_view->AcceptRemarksInBill->viewAttributes() ?>><?php echo $pharmacy_products_view->AcceptRemarksInBill->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Classification->Visible) { // Classification ?>
	<tr id="r_Classification">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Classification"><?php echo $pharmacy_products_view->Classification->caption() ?></span></td>
		<td data-name="Classification" <?php echo $pharmacy_products_view->Classification->cellAttributes() ?>>
<span id="el_pharmacy_products_Classification">
<span<?php echo $pharmacy_products_view->Classification->viewAttributes() ?>><?php echo $pharmacy_products_view->Classification->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TimeSlot->Visible) { // TimeSlot ?>
	<tr id="r_TimeSlot">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TimeSlot"><?php echo $pharmacy_products_view->TimeSlot->caption() ?></span></td>
		<td data-name="TimeSlot" <?php echo $pharmacy_products_view->TimeSlot->cellAttributes() ?>>
<span id="el_pharmacy_products_TimeSlot">
<span<?php echo $pharmacy_products_view->TimeSlot->viewAttributes() ?>><?php echo $pharmacy_products_view->TimeSlot->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IsBundle->Visible) { // IsBundle ?>
	<tr id="r_IsBundle">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsBundle"><?php echo $pharmacy_products_view->IsBundle->caption() ?></span></td>
		<td data-name="IsBundle" <?php echo $pharmacy_products_view->IsBundle->cellAttributes() ?>>
<span id="el_pharmacy_products_IsBundle">
<span<?php echo $pharmacy_products_view->IsBundle->viewAttributes() ?>><?php echo $pharmacy_products_view->IsBundle->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ColorCode->Visible) { // ColorCode ?>
	<tr id="r_ColorCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ColorCode"><?php echo $pharmacy_products_view->ColorCode->caption() ?></span></td>
		<td data-name="ColorCode" <?php echo $pharmacy_products_view->ColorCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ColorCode">
<span<?php echo $pharmacy_products_view->ColorCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ColorCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->GenderCode->Visible) { // GenderCode ?>
	<tr id="r_GenderCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GenderCode"><?php echo $pharmacy_products_view->GenderCode->caption() ?></span></td>
		<td data-name="GenderCode" <?php echo $pharmacy_products_view->GenderCode->cellAttributes() ?>>
<span id="el_pharmacy_products_GenderCode">
<span<?php echo $pharmacy_products_view->GenderCode->viewAttributes() ?>><?php echo $pharmacy_products_view->GenderCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SizeCode->Visible) { // SizeCode ?>
	<tr id="r_SizeCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SizeCode"><?php echo $pharmacy_products_view->SizeCode->caption() ?></span></td>
		<td data-name="SizeCode" <?php echo $pharmacy_products_view->SizeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SizeCode">
<span<?php echo $pharmacy_products_view->SizeCode->viewAttributes() ?>><?php echo $pharmacy_products_view->SizeCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->GiftCard->Visible) { // GiftCard ?>
	<tr id="r_GiftCard">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GiftCard"><?php echo $pharmacy_products_view->GiftCard->caption() ?></span></td>
		<td data-name="GiftCard" <?php echo $pharmacy_products_view->GiftCard->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftCard">
<span<?php echo $pharmacy_products_view->GiftCard->viewAttributes() ?>><?php echo $pharmacy_products_view->GiftCard->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ToonLabel->Visible) { // ToonLabel ?>
	<tr id="r_ToonLabel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ToonLabel"><?php echo $pharmacy_products_view->ToonLabel->caption() ?></span></td>
		<td data-name="ToonLabel" <?php echo $pharmacy_products_view->ToonLabel->cellAttributes() ?>>
<span id="el_pharmacy_products_ToonLabel">
<span<?php echo $pharmacy_products_view->ToonLabel->viewAttributes() ?>><?php echo $pharmacy_products_view->ToonLabel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->GarmentType->Visible) { // GarmentType ?>
	<tr id="r_GarmentType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GarmentType"><?php echo $pharmacy_products_view->GarmentType->caption() ?></span></td>
		<td data-name="GarmentType" <?php echo $pharmacy_products_view->GarmentType->cellAttributes() ?>>
<span id="el_pharmacy_products_GarmentType">
<span<?php echo $pharmacy_products_view->GarmentType->viewAttributes() ?>><?php echo $pharmacy_products_view->GarmentType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AgeGroup->Visible) { // AgeGroup ?>
	<tr id="r_AgeGroup">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AgeGroup"><?php echo $pharmacy_products_view->AgeGroup->caption() ?></span></td>
		<td data-name="AgeGroup" <?php echo $pharmacy_products_view->AgeGroup->cellAttributes() ?>>
<span id="el_pharmacy_products_AgeGroup">
<span<?php echo $pharmacy_products_view->AgeGroup->viewAttributes() ?>><?php echo $pharmacy_products_view->AgeGroup->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Season->Visible) { // Season ?>
	<tr id="r_Season">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Season"><?php echo $pharmacy_products_view->Season->caption() ?></span></td>
		<td data-name="Season" <?php echo $pharmacy_products_view->Season->cellAttributes() ?>>
<span id="el_pharmacy_products_Season">
<span<?php echo $pharmacy_products_view->Season->viewAttributes() ?>><?php echo $pharmacy_products_view->Season->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DailyStockEntry->Visible) { // DailyStockEntry ?>
	<tr id="r_DailyStockEntry">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DailyStockEntry"><?php echo $pharmacy_products_view->DailyStockEntry->caption() ?></span></td>
		<td data-name="DailyStockEntry" <?php echo $pharmacy_products_view->DailyStockEntry->cellAttributes() ?>>
<span id="el_pharmacy_products_DailyStockEntry">
<span<?php echo $pharmacy_products_view->DailyStockEntry->viewAttributes() ?>><?php echo $pharmacy_products_view->DailyStockEntry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ModifierApplicable->Visible) { // ModifierApplicable ?>
	<tr id="r_ModifierApplicable">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifierApplicable"><?php echo $pharmacy_products_view->ModifierApplicable->caption() ?></span></td>
		<td data-name="ModifierApplicable" <?php echo $pharmacy_products_view->ModifierApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierApplicable">
<span<?php echo $pharmacy_products_view->ModifierApplicable->viewAttributes() ?>><?php echo $pharmacy_products_view->ModifierApplicable->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ModifierType->Visible) { // ModifierType ?>
	<tr id="r_ModifierType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifierType"><?php echo $pharmacy_products_view->ModifierType->caption() ?></span></td>
		<td data-name="ModifierType" <?php echo $pharmacy_products_view->ModifierType->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierType">
<span<?php echo $pharmacy_products_view->ModifierType->viewAttributes() ?>><?php echo $pharmacy_products_view->ModifierType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
	<tr id="r_AcceptZeroRate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptZeroRate"><?php echo $pharmacy_products_view->AcceptZeroRate->caption() ?></span></td>
		<td data-name="AcceptZeroRate" <?php echo $pharmacy_products_view->AcceptZeroRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptZeroRate">
<span<?php echo $pharmacy_products_view->AcceptZeroRate->viewAttributes() ?>><?php echo $pharmacy_products_view->AcceptZeroRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
	<tr id="r_ExciseDutyCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExciseDutyCode"><?php echo $pharmacy_products_view->ExciseDutyCode->caption() ?></span></td>
		<td data-name="ExciseDutyCode" <?php echo $pharmacy_products_view->ExciseDutyCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ExciseDutyCode">
<span<?php echo $pharmacy_products_view->ExciseDutyCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ExciseDutyCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
	<tr id="r_IndentProductGroupCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IndentProductGroupCode"><?php echo $pharmacy_products_view->IndentProductGroupCode->caption() ?></span></td>
		<td data-name="IndentProductGroupCode" <?php echo $pharmacy_products_view->IndentProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_IndentProductGroupCode">
<span<?php echo $pharmacy_products_view->IndentProductGroupCode->viewAttributes() ?>><?php echo $pharmacy_products_view->IndentProductGroupCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IsMultiBatch->Visible) { // IsMultiBatch ?>
	<tr id="r_IsMultiBatch">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsMultiBatch"><?php echo $pharmacy_products_view->IsMultiBatch->caption() ?></span></td>
		<td data-name="IsMultiBatch" <?php echo $pharmacy_products_view->IsMultiBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMultiBatch">
<span<?php echo $pharmacy_products_view->IsMultiBatch->viewAttributes() ?>><?php echo $pharmacy_products_view->IsMultiBatch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IsSingleBatch->Visible) { // IsSingleBatch ?>
	<tr id="r_IsSingleBatch">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsSingleBatch"><?php echo $pharmacy_products_view->IsSingleBatch->caption() ?></span></td>
		<td data-name="IsSingleBatch" <?php echo $pharmacy_products_view->IsSingleBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsSingleBatch">
<span<?php echo $pharmacy_products_view->IsSingleBatch->viewAttributes() ?>><?php echo $pharmacy_products_view->IsSingleBatch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MarkUpRate1->Visible) { // MarkUpRate1 ?>
	<tr id="r_MarkUpRate1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkUpRate1"><?php echo $pharmacy_products_view->MarkUpRate1->caption() ?></span></td>
		<td data-name="MarkUpRate1" <?php echo $pharmacy_products_view->MarkUpRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate1">
<span<?php echo $pharmacy_products_view->MarkUpRate1->viewAttributes() ?>><?php echo $pharmacy_products_view->MarkUpRate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MarkDownRate1->Visible) { // MarkDownRate1 ?>
	<tr id="r_MarkDownRate1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkDownRate1"><?php echo $pharmacy_products_view->MarkDownRate1->caption() ?></span></td>
		<td data-name="MarkDownRate1" <?php echo $pharmacy_products_view->MarkDownRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate1">
<span<?php echo $pharmacy_products_view->MarkDownRate1->viewAttributes() ?>><?php echo $pharmacy_products_view->MarkDownRate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MarkUpRate2->Visible) { // MarkUpRate2 ?>
	<tr id="r_MarkUpRate2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkUpRate2"><?php echo $pharmacy_products_view->MarkUpRate2->caption() ?></span></td>
		<td data-name="MarkUpRate2" <?php echo $pharmacy_products_view->MarkUpRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate2">
<span<?php echo $pharmacy_products_view->MarkUpRate2->viewAttributes() ?>><?php echo $pharmacy_products_view->MarkUpRate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MarkDownRate2->Visible) { // MarkDownRate2 ?>
	<tr id="r_MarkDownRate2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkDownRate2"><?php echo $pharmacy_products_view->MarkDownRate2->caption() ?></span></td>
		<td data-name="MarkDownRate2" <?php echo $pharmacy_products_view->MarkDownRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate2">
<span<?php echo $pharmacy_products_view->MarkDownRate2->viewAttributes() ?>><?php echo $pharmacy_products_view->MarkDownRate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->_Yield->Visible) { // Yield ?>
	<tr id="r__Yield">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products__Yield"><?php echo $pharmacy_products_view->_Yield->caption() ?></span></td>
		<td data-name="_Yield" <?php echo $pharmacy_products_view->_Yield->cellAttributes() ?>>
<span id="el_pharmacy_products__Yield">
<span<?php echo $pharmacy_products_view->_Yield->viewAttributes() ?>><?php echo $pharmacy_products_view->_Yield->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->RefProductCode->Visible) { // RefProductCode ?>
	<tr id="r_RefProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RefProductCode"><?php echo $pharmacy_products_view->RefProductCode->caption() ?></span></td>
		<td data-name="RefProductCode" <?php echo $pharmacy_products_view->RefProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RefProductCode">
<span<?php echo $pharmacy_products_view->RefProductCode->viewAttributes() ?>><?php echo $pharmacy_products_view->RefProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Volume->Visible) { // Volume ?>
	<tr id="r_Volume">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Volume"><?php echo $pharmacy_products_view->Volume->caption() ?></span></td>
		<td data-name="Volume" <?php echo $pharmacy_products_view->Volume->cellAttributes() ?>>
<span id="el_pharmacy_products_Volume">
<span<?php echo $pharmacy_products_view->Volume->viewAttributes() ?>><?php echo $pharmacy_products_view->Volume->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MeasurementID->Visible) { // MeasurementID ?>
	<tr id="r_MeasurementID">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MeasurementID"><?php echo $pharmacy_products_view->MeasurementID->caption() ?></span></td>
		<td data-name="MeasurementID" <?php echo $pharmacy_products_view->MeasurementID->cellAttributes() ?>>
<span id="el_pharmacy_products_MeasurementID">
<span<?php echo $pharmacy_products_view->MeasurementID->viewAttributes() ?>><?php echo $pharmacy_products_view->MeasurementID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CountryCode->Visible) { // CountryCode ?>
	<tr id="r_CountryCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CountryCode"><?php echo $pharmacy_products_view->CountryCode->caption() ?></span></td>
		<td data-name="CountryCode" <?php echo $pharmacy_products_view->CountryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CountryCode">
<span<?php echo $pharmacy_products_view->CountryCode->viewAttributes() ?>><?php echo $pharmacy_products_view->CountryCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AcceptWMQty->Visible) { // AcceptWMQty ?>
	<tr id="r_AcceptWMQty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptWMQty"><?php echo $pharmacy_products_view->AcceptWMQty->caption() ?></span></td>
		<td data-name="AcceptWMQty" <?php echo $pharmacy_products_view->AcceptWMQty->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptWMQty">
<span<?php echo $pharmacy_products_view->AcceptWMQty->viewAttributes() ?>><?php echo $pharmacy_products_view->AcceptWMQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
	<tr id="r_SingleBatchBasedOnRate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SingleBatchBasedOnRate"><?php echo $pharmacy_products_view->SingleBatchBasedOnRate->caption() ?></span></td>
		<td data-name="SingleBatchBasedOnRate" <?php echo $pharmacy_products_view->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBatchBasedOnRate">
<span<?php echo $pharmacy_products_view->SingleBatchBasedOnRate->viewAttributes() ?>><?php echo $pharmacy_products_view->SingleBatchBasedOnRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TenderNo->Visible) { // TenderNo ?>
	<tr id="r_TenderNo">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TenderNo"><?php echo $pharmacy_products_view->TenderNo->caption() ?></span></td>
		<td data-name="TenderNo" <?php echo $pharmacy_products_view->TenderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TenderNo">
<span<?php echo $pharmacy_products_view->TenderNo->viewAttributes() ?>><?php echo $pharmacy_products_view->TenderNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
	<tr id="r_SingleBillMaximumSoldQtyFiled">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled"><?php echo $pharmacy_products_view->SingleBillMaximumSoldQtyFiled->caption() ?></span></td>
		<td data-name="SingleBillMaximumSoldQtyFiled" <?php echo $pharmacy_products_view->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBillMaximumSoldQtyFiled">
<span<?php echo $pharmacy_products_view->SingleBillMaximumSoldQtyFiled->viewAttributes() ?>><?php echo $pharmacy_products_view->SingleBillMaximumSoldQtyFiled->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Strength1->Visible) { // Strength1 ?>
	<tr id="r_Strength1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength1"><?php echo $pharmacy_products_view->Strength1->caption() ?></span></td>
		<td data-name="Strength1" <?php echo $pharmacy_products_view->Strength1->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength1">
<span<?php echo $pharmacy_products_view->Strength1->viewAttributes() ?>><?php echo $pharmacy_products_view->Strength1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Strength2->Visible) { // Strength2 ?>
	<tr id="r_Strength2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength2"><?php echo $pharmacy_products_view->Strength2->caption() ?></span></td>
		<td data-name="Strength2" <?php echo $pharmacy_products_view->Strength2->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength2">
<span<?php echo $pharmacy_products_view->Strength2->viewAttributes() ?>><?php echo $pharmacy_products_view->Strength2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Strength3->Visible) { // Strength3 ?>
	<tr id="r_Strength3">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength3"><?php echo $pharmacy_products_view->Strength3->caption() ?></span></td>
		<td data-name="Strength3" <?php echo $pharmacy_products_view->Strength3->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength3">
<span<?php echo $pharmacy_products_view->Strength3->viewAttributes() ?>><?php echo $pharmacy_products_view->Strength3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Strength4->Visible) { // Strength4 ?>
	<tr id="r_Strength4">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength4"><?php echo $pharmacy_products_view->Strength4->caption() ?></span></td>
		<td data-name="Strength4" <?php echo $pharmacy_products_view->Strength4->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength4">
<span<?php echo $pharmacy_products_view->Strength4->viewAttributes() ?>><?php echo $pharmacy_products_view->Strength4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->Strength5->Visible) { // Strength5 ?>
	<tr id="r_Strength5">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength5"><?php echo $pharmacy_products_view->Strength5->caption() ?></span></td>
		<td data-name="Strength5" <?php echo $pharmacy_products_view->Strength5->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength5">
<span<?php echo $pharmacy_products_view->Strength5->viewAttributes() ?>><?php echo $pharmacy_products_view->Strength5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IngredientCode1->Visible) { // IngredientCode1 ?>
	<tr id="r_IngredientCode1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode1"><?php echo $pharmacy_products_view->IngredientCode1->caption() ?></span></td>
		<td data-name="IngredientCode1" <?php echo $pharmacy_products_view->IngredientCode1->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode1">
<span<?php echo $pharmacy_products_view->IngredientCode1->viewAttributes() ?>><?php echo $pharmacy_products_view->IngredientCode1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IngredientCode2->Visible) { // IngredientCode2 ?>
	<tr id="r_IngredientCode2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode2"><?php echo $pharmacy_products_view->IngredientCode2->caption() ?></span></td>
		<td data-name="IngredientCode2" <?php echo $pharmacy_products_view->IngredientCode2->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode2">
<span<?php echo $pharmacy_products_view->IngredientCode2->viewAttributes() ?>><?php echo $pharmacy_products_view->IngredientCode2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IngredientCode3->Visible) { // IngredientCode3 ?>
	<tr id="r_IngredientCode3">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode3"><?php echo $pharmacy_products_view->IngredientCode3->caption() ?></span></td>
		<td data-name="IngredientCode3" <?php echo $pharmacy_products_view->IngredientCode3->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode3">
<span<?php echo $pharmacy_products_view->IngredientCode3->viewAttributes() ?>><?php echo $pharmacy_products_view->IngredientCode3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IngredientCode4->Visible) { // IngredientCode4 ?>
	<tr id="r_IngredientCode4">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode4"><?php echo $pharmacy_products_view->IngredientCode4->caption() ?></span></td>
		<td data-name="IngredientCode4" <?php echo $pharmacy_products_view->IngredientCode4->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode4">
<span<?php echo $pharmacy_products_view->IngredientCode4->viewAttributes() ?>><?php echo $pharmacy_products_view->IngredientCode4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IngredientCode5->Visible) { // IngredientCode5 ?>
	<tr id="r_IngredientCode5">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode5"><?php echo $pharmacy_products_view->IngredientCode5->caption() ?></span></td>
		<td data-name="IngredientCode5" <?php echo $pharmacy_products_view->IngredientCode5->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode5">
<span<?php echo $pharmacy_products_view->IngredientCode5->viewAttributes() ?>><?php echo $pharmacy_products_view->IngredientCode5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->OrderType->Visible) { // OrderType ?>
	<tr id="r_OrderType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderType"><?php echo $pharmacy_products_view->OrderType->caption() ?></span></td>
		<td data-name="OrderType" <?php echo $pharmacy_products_view->OrderType->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderType">
<span<?php echo $pharmacy_products_view->OrderType->viewAttributes() ?>><?php echo $pharmacy_products_view->OrderType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->StockUOM->Visible) { // StockUOM ?>
	<tr id="r_StockUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockUOM"><?php echo $pharmacy_products_view->StockUOM->caption() ?></span></td>
		<td data-name="StockUOM" <?php echo $pharmacy_products_view->StockUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_StockUOM">
<span<?php echo $pharmacy_products_view->StockUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->StockUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PriceUOM->Visible) { // PriceUOM ?>
	<tr id="r_PriceUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PriceUOM"><?php echo $pharmacy_products_view->PriceUOM->caption() ?></span></td>
		<td data-name="PriceUOM" <?php echo $pharmacy_products_view->PriceUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceUOM">
<span<?php echo $pharmacy_products_view->PriceUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->PriceUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
	<tr id="r_DefaultSaleUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultSaleUOM"><?php echo $pharmacy_products_view->DefaultSaleUOM->caption() ?></span></td>
		<td data-name="DefaultSaleUOM" <?php echo $pharmacy_products_view->DefaultSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultSaleUOM">
<span<?php echo $pharmacy_products_view->DefaultSaleUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->DefaultSaleUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
	<tr id="r_DefaultPurchaseUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultPurchaseUOM"><?php echo $pharmacy_products_view->DefaultPurchaseUOM->caption() ?></span></td>
		<td data-name="DefaultPurchaseUOM" <?php echo $pharmacy_products_view->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultPurchaseUOM">
<span<?php echo $pharmacy_products_view->DefaultPurchaseUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->DefaultPurchaseUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ReportingUOM->Visible) { // ReportingUOM ?>
	<tr id="r_ReportingUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ReportingUOM"><?php echo $pharmacy_products_view->ReportingUOM->caption() ?></span></td>
		<td data-name="ReportingUOM" <?php echo $pharmacy_products_view->ReportingUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_ReportingUOM">
<span<?php echo $pharmacy_products_view->ReportingUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->ReportingUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
	<tr id="r_LastPurchasedUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LastPurchasedUOM"><?php echo $pharmacy_products_view->LastPurchasedUOM->caption() ?></span></td>
		<td data-name="LastPurchasedUOM" <?php echo $pharmacy_products_view->LastPurchasedUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPurchasedUOM">
<span<?php echo $pharmacy_products_view->LastPurchasedUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->LastPurchasedUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TreatmentCodes->Visible) { // TreatmentCodes ?>
	<tr id="r_TreatmentCodes">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TreatmentCodes"><?php echo $pharmacy_products_view->TreatmentCodes->caption() ?></span></td>
		<td data-name="TreatmentCodes" <?php echo $pharmacy_products_view->TreatmentCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_TreatmentCodes">
<span<?php echo $pharmacy_products_view->TreatmentCodes->viewAttributes() ?>><?php echo $pharmacy_products_view->TreatmentCodes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->InsuranceType->Visible) { // InsuranceType ?>
	<tr id="r_InsuranceType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_InsuranceType"><?php echo $pharmacy_products_view->InsuranceType->caption() ?></span></td>
		<td data-name="InsuranceType" <?php echo $pharmacy_products_view->InsuranceType->cellAttributes() ?>>
<span id="el_pharmacy_products_InsuranceType">
<span<?php echo $pharmacy_products_view->InsuranceType->viewAttributes() ?>><?php echo $pharmacy_products_view->InsuranceType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
	<tr id="r_CoverageGroupCodes">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CoverageGroupCodes"><?php echo $pharmacy_products_view->CoverageGroupCodes->caption() ?></span></td>
		<td data-name="CoverageGroupCodes" <?php echo $pharmacy_products_view->CoverageGroupCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_CoverageGroupCodes">
<span<?php echo $pharmacy_products_view->CoverageGroupCodes->viewAttributes() ?>><?php echo $pharmacy_products_view->CoverageGroupCodes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MultipleUOM->Visible) { // MultipleUOM ?>
	<tr id="r_MultipleUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MultipleUOM"><?php echo $pharmacy_products_view->MultipleUOM->caption() ?></span></td>
		<td data-name="MultipleUOM" <?php echo $pharmacy_products_view->MultipleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleUOM">
<span<?php echo $pharmacy_products_view->MultipleUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->MultipleUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SalePriceComputation->Visible) { // SalePriceComputation ?>
	<tr id="r_SalePriceComputation">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalePriceComputation"><?php echo $pharmacy_products_view->SalePriceComputation->caption() ?></span></td>
		<td data-name="SalePriceComputation" <?php echo $pharmacy_products_view->SalePriceComputation->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePriceComputation">
<span<?php echo $pharmacy_products_view->SalePriceComputation->viewAttributes() ?>><?php echo $pharmacy_products_view->SalePriceComputation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->StockCorrection->Visible) { // StockCorrection ?>
	<tr id="r_StockCorrection">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockCorrection"><?php echo $pharmacy_products_view->StockCorrection->caption() ?></span></td>
		<td data-name="StockCorrection" <?php echo $pharmacy_products_view->StockCorrection->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCorrection">
<span<?php echo $pharmacy_products_view->StockCorrection->viewAttributes() ?>><?php echo $pharmacy_products_view->StockCorrection->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LBTPercentage->Visible) { // LBTPercentage ?>
	<tr id="r_LBTPercentage">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LBTPercentage"><?php echo $pharmacy_products_view->LBTPercentage->caption() ?></span></td>
		<td data-name="LBTPercentage" <?php echo $pharmacy_products_view->LBTPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_LBTPercentage">
<span<?php echo $pharmacy_products_view->LBTPercentage->viewAttributes() ?>><?php echo $pharmacy_products_view->LBTPercentage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->SalesCommission->Visible) { // SalesCommission ?>
	<tr id="r_SalesCommission">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalesCommission"><?php echo $pharmacy_products_view->SalesCommission->caption() ?></span></td>
		<td data-name="SalesCommission" <?php echo $pharmacy_products_view->SalesCommission->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesCommission">
<span<?php echo $pharmacy_products_view->SalesCommission->viewAttributes() ?>><?php echo $pharmacy_products_view->SalesCommission->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LockedStock->Visible) { // LockedStock ?>
	<tr id="r_LockedStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LockedStock"><?php echo $pharmacy_products_view->LockedStock->caption() ?></span></td>
		<td data-name="LockedStock" <?php echo $pharmacy_products_view->LockedStock->cellAttributes() ?>>
<span id="el_pharmacy_products_LockedStock">
<span<?php echo $pharmacy_products_view->LockedStock->viewAttributes() ?>><?php echo $pharmacy_products_view->LockedStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MinMaxUOM->Visible) { // MinMaxUOM ?>
	<tr id="r_MinMaxUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinMaxUOM"><?php echo $pharmacy_products_view->MinMaxUOM->caption() ?></span></td>
		<td data-name="MinMaxUOM" <?php echo $pharmacy_products_view->MinMaxUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxUOM">
<span<?php echo $pharmacy_products_view->MinMaxUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->MinMaxUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
	<tr id="r_ExpiryMfrDateFormat">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExpiryMfrDateFormat"><?php echo $pharmacy_products_view->ExpiryMfrDateFormat->caption() ?></span></td>
		<td data-name="ExpiryMfrDateFormat" <?php echo $pharmacy_products_view->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryMfrDateFormat">
<span<?php echo $pharmacy_products_view->ExpiryMfrDateFormat->viewAttributes() ?>><?php echo $pharmacy_products_view->ExpiryMfrDateFormat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ProductLifeTime->Visible) { // ProductLifeTime ?>
	<tr id="r_ProductLifeTime">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductLifeTime"><?php echo $pharmacy_products_view->ProductLifeTime->caption() ?></span></td>
		<td data-name="ProductLifeTime" <?php echo $pharmacy_products_view->ProductLifeTime->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLifeTime">
<span<?php echo $pharmacy_products_view->ProductLifeTime->viewAttributes() ?>><?php echo $pharmacy_products_view->ProductLifeTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IsCombo->Visible) { // IsCombo ?>
	<tr id="r_IsCombo">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsCombo"><?php echo $pharmacy_products_view->IsCombo->caption() ?></span></td>
		<td data-name="IsCombo" <?php echo $pharmacy_products_view->IsCombo->cellAttributes() ?>>
<span id="el_pharmacy_products_IsCombo">
<span<?php echo $pharmacy_products_view->IsCombo->viewAttributes() ?>><?php echo $pharmacy_products_view->IsCombo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ComboTypeCode->Visible) { // ComboTypeCode ?>
	<tr id="r_ComboTypeCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComboTypeCode"><?php echo $pharmacy_products_view->ComboTypeCode->caption() ?></span></td>
		<td data-name="ComboTypeCode" <?php echo $pharmacy_products_view->ComboTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ComboTypeCode">
<span<?php echo $pharmacy_products_view->ComboTypeCode->viewAttributes() ?>><?php echo $pharmacy_products_view->ComboTypeCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount6->Visible) { // AttributeCount6 ?>
	<tr id="r_AttributeCount6">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount6"><?php echo $pharmacy_products_view->AttributeCount6->caption() ?></span></td>
		<td data-name="AttributeCount6" <?php echo $pharmacy_products_view->AttributeCount6->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount6">
<span<?php echo $pharmacy_products_view->AttributeCount6->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount6->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount7->Visible) { // AttributeCount7 ?>
	<tr id="r_AttributeCount7">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount7"><?php echo $pharmacy_products_view->AttributeCount7->caption() ?></span></td>
		<td data-name="AttributeCount7" <?php echo $pharmacy_products_view->AttributeCount7->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount7">
<span<?php echo $pharmacy_products_view->AttributeCount7->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount7->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount8->Visible) { // AttributeCount8 ?>
	<tr id="r_AttributeCount8">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount8"><?php echo $pharmacy_products_view->AttributeCount8->caption() ?></span></td>
		<td data-name="AttributeCount8" <?php echo $pharmacy_products_view->AttributeCount8->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount8">
<span<?php echo $pharmacy_products_view->AttributeCount8->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount8->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount9->Visible) { // AttributeCount9 ?>
	<tr id="r_AttributeCount9">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount9"><?php echo $pharmacy_products_view->AttributeCount9->caption() ?></span></td>
		<td data-name="AttributeCount9" <?php echo $pharmacy_products_view->AttributeCount9->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount9">
<span<?php echo $pharmacy_products_view->AttributeCount9->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount9->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AttributeCount10->Visible) { // AttributeCount10 ?>
	<tr id="r_AttributeCount10">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount10"><?php echo $pharmacy_products_view->AttributeCount10->caption() ?></span></td>
		<td data-name="AttributeCount10" <?php echo $pharmacy_products_view->AttributeCount10->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount10">
<span<?php echo $pharmacy_products_view->AttributeCount10->viewAttributes() ?>><?php echo $pharmacy_products_view->AttributeCount10->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LabourCharge->Visible) { // LabourCharge ?>
	<tr id="r_LabourCharge">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LabourCharge"><?php echo $pharmacy_products_view->LabourCharge->caption() ?></span></td>
		<td data-name="LabourCharge" <?php echo $pharmacy_products_view->LabourCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_LabourCharge">
<span<?php echo $pharmacy_products_view->LabourCharge->viewAttributes() ?>><?php echo $pharmacy_products_view->LabourCharge->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
	<tr id="r_AffectOtherCharge">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AffectOtherCharge"><?php echo $pharmacy_products_view->AffectOtherCharge->caption() ?></span></td>
		<td data-name="AffectOtherCharge" <?php echo $pharmacy_products_view->AffectOtherCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_AffectOtherCharge">
<span<?php echo $pharmacy_products_view->AffectOtherCharge->viewAttributes() ?>><?php echo $pharmacy_products_view->AffectOtherCharge->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DosageInfo->Visible) { // DosageInfo ?>
	<tr id="r_DosageInfo">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DosageInfo"><?php echo $pharmacy_products_view->DosageInfo->caption() ?></span></td>
		<td data-name="DosageInfo" <?php echo $pharmacy_products_view->DosageInfo->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageInfo">
<span<?php echo $pharmacy_products_view->DosageInfo->viewAttributes() ?>><?php echo $pharmacy_products_view->DosageInfo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DosageType->Visible) { // DosageType ?>
	<tr id="r_DosageType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DosageType"><?php echo $pharmacy_products_view->DosageType->caption() ?></span></td>
		<td data-name="DosageType" <?php echo $pharmacy_products_view->DosageType->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageType">
<span<?php echo $pharmacy_products_view->DosageType->viewAttributes() ?>><?php echo $pharmacy_products_view->DosageType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
	<tr id="r_DefaultIndentUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultIndentUOM"><?php echo $pharmacy_products_view->DefaultIndentUOM->caption() ?></span></td>
		<td data-name="DefaultIndentUOM" <?php echo $pharmacy_products_view->DefaultIndentUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultIndentUOM">
<span<?php echo $pharmacy_products_view->DefaultIndentUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->DefaultIndentUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PromoTag->Visible) { // PromoTag ?>
	<tr id="r_PromoTag">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PromoTag"><?php echo $pharmacy_products_view->PromoTag->caption() ?></span></td>
		<td data-name="PromoTag" <?php echo $pharmacy_products_view->PromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_PromoTag">
<span<?php echo $pharmacy_products_view->PromoTag->viewAttributes() ?>><?php echo $pharmacy_products_view->PromoTag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
	<tr id="r_BillLevelPromoTag">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BillLevelPromoTag"><?php echo $pharmacy_products_view->BillLevelPromoTag->caption() ?></span></td>
		<td data-name="BillLevelPromoTag" <?php echo $pharmacy_products_view->BillLevelPromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_BillLevelPromoTag">
<span<?php echo $pharmacy_products_view->BillLevelPromoTag->viewAttributes() ?>><?php echo $pharmacy_products_view->BillLevelPromoTag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->IsMRPProduct->Visible) { // IsMRPProduct ?>
	<tr id="r_IsMRPProduct">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsMRPProduct"><?php echo $pharmacy_products_view->IsMRPProduct->caption() ?></span></td>
		<td data-name="IsMRPProduct" <?php echo $pharmacy_products_view->IsMRPProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMRPProduct">
<span<?php echo $pharmacy_products_view->IsMRPProduct->viewAttributes() ?>><?php echo $pharmacy_products_view->IsMRPProduct->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MrpList->Visible) { // MrpList ?>
	<tr id="r_MrpList">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MrpList"><?php echo $pharmacy_products_view->MrpList->caption() ?></span></td>
		<td data-name="MrpList" <?php echo $pharmacy_products_view->MrpList->cellAttributes() ?>>
<span id="el_pharmacy_products_MrpList">
<span<?php echo $pharmacy_products_view->MrpList->viewAttributes() ?>><?php echo $pharmacy_products_view->MrpList->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
	<tr id="r_AlternateSaleUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AlternateSaleUOM"><?php echo $pharmacy_products_view->AlternateSaleUOM->caption() ?></span></td>
		<td data-name="AlternateSaleUOM" <?php echo $pharmacy_products_view->AlternateSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSaleUOM">
<span<?php echo $pharmacy_products_view->AlternateSaleUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->AlternateSaleUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FreeUOM->Visible) { // FreeUOM ?>
	<tr id="r_FreeUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeUOM"><?php echo $pharmacy_products_view->FreeUOM->caption() ?></span></td>
		<td data-name="FreeUOM" <?php echo $pharmacy_products_view->FreeUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeUOM">
<span<?php echo $pharmacy_products_view->FreeUOM->viewAttributes() ?>><?php echo $pharmacy_products_view->FreeUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MarketedCode->Visible) { // MarketedCode ?>
	<tr id="r_MarketedCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarketedCode"><?php echo $pharmacy_products_view->MarketedCode->caption() ?></span></td>
		<td data-name="MarketedCode" <?php echo $pharmacy_products_view->MarketedCode->cellAttributes() ?>>
<span id="el_pharmacy_products_MarketedCode">
<span<?php echo $pharmacy_products_view->MarketedCode->viewAttributes() ?>><?php echo $pharmacy_products_view->MarketedCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
	<tr id="r_MinimumSalePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinimumSalePrice"><?php echo $pharmacy_products_view->MinimumSalePrice->caption() ?></span></td>
		<td data-name="MinimumSalePrice" <?php echo $pharmacy_products_view->MinimumSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumSalePrice">
<span<?php echo $pharmacy_products_view->MinimumSalePrice->viewAttributes() ?>><?php echo $pharmacy_products_view->MinimumSalePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PRate1->Visible) { // PRate1 ?>
	<tr id="r_PRate1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PRate1"><?php echo $pharmacy_products_view->PRate1->caption() ?></span></td>
		<td data-name="PRate1" <?php echo $pharmacy_products_view->PRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate1">
<span<?php echo $pharmacy_products_view->PRate1->viewAttributes() ?>><?php echo $pharmacy_products_view->PRate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->PRate2->Visible) { // PRate2 ?>
	<tr id="r_PRate2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PRate2"><?php echo $pharmacy_products_view->PRate2->caption() ?></span></td>
		<td data-name="PRate2" <?php echo $pharmacy_products_view->PRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate2">
<span<?php echo $pharmacy_products_view->PRate2->viewAttributes() ?>><?php echo $pharmacy_products_view->PRate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->LPItemCost->Visible) { // LPItemCost ?>
	<tr id="r_LPItemCost">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LPItemCost"><?php echo $pharmacy_products_view->LPItemCost->caption() ?></span></td>
		<td data-name="LPItemCost" <?php echo $pharmacy_products_view->LPItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_LPItemCost">
<span<?php echo $pharmacy_products_view->LPItemCost->viewAttributes() ?>><?php echo $pharmacy_products_view->LPItemCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->FixedItemCost->Visible) { // FixedItemCost ?>
	<tr id="r_FixedItemCost">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FixedItemCost"><?php echo $pharmacy_products_view->FixedItemCost->caption() ?></span></td>
		<td data-name="FixedItemCost" <?php echo $pharmacy_products_view->FixedItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_FixedItemCost">
<span<?php echo $pharmacy_products_view->FixedItemCost->viewAttributes() ?>><?php echo $pharmacy_products_view->FixedItemCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->HSNId->Visible) { // HSNId ?>
	<tr id="r_HSNId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_HSNId"><?php echo $pharmacy_products_view->HSNId->caption() ?></span></td>
		<td data-name="HSNId" <?php echo $pharmacy_products_view->HSNId->cellAttributes() ?>>
<span id="el_pharmacy_products_HSNId">
<span<?php echo $pharmacy_products_view->HSNId->viewAttributes() ?>><?php echo $pharmacy_products_view->HSNId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->TaxInclusive->Visible) { // TaxInclusive ?>
	<tr id="r_TaxInclusive">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TaxInclusive"><?php echo $pharmacy_products_view->TaxInclusive->caption() ?></span></td>
		<td data-name="TaxInclusive" <?php echo $pharmacy_products_view->TaxInclusive->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxInclusive">
<span<?php echo $pharmacy_products_view->TaxInclusive->viewAttributes() ?>><?php echo $pharmacy_products_view->TaxInclusive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
	<tr id="r_EligibleforWarranty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_EligibleforWarranty"><?php echo $pharmacy_products_view->EligibleforWarranty->caption() ?></span></td>
		<td data-name="EligibleforWarranty" <?php echo $pharmacy_products_view->EligibleforWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_EligibleforWarranty">
<span<?php echo $pharmacy_products_view->EligibleforWarranty->viewAttributes() ?>><?php echo $pharmacy_products_view->EligibleforWarranty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
	<tr id="r_NoofMonthsWarranty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_NoofMonthsWarranty"><?php echo $pharmacy_products_view->NoofMonthsWarranty->caption() ?></span></td>
		<td data-name="NoofMonthsWarranty" <?php echo $pharmacy_products_view->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_NoofMonthsWarranty">
<span<?php echo $pharmacy_products_view->NoofMonthsWarranty->viewAttributes() ?>><?php echo $pharmacy_products_view->NoofMonthsWarranty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
	<tr id="r_ComputeTaxonCost">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComputeTaxonCost"><?php echo $pharmacy_products_view->ComputeTaxonCost->caption() ?></span></td>
		<td data-name="ComputeTaxonCost" <?php echo $pharmacy_products_view->ComputeTaxonCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputeTaxonCost">
<span<?php echo $pharmacy_products_view->ComputeTaxonCost->viewAttributes() ?>><?php echo $pharmacy_products_view->ComputeTaxonCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
	<tr id="r_HasEmptyBottleTrack">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_HasEmptyBottleTrack"><?php echo $pharmacy_products_view->HasEmptyBottleTrack->caption() ?></span></td>
		<td data-name="HasEmptyBottleTrack" <?php echo $pharmacy_products_view->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el_pharmacy_products_HasEmptyBottleTrack">
<span<?php echo $pharmacy_products_view->HasEmptyBottleTrack->viewAttributes() ?>><?php echo $pharmacy_products_view->HasEmptyBottleTrack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
	<tr id="r_EmptyBottleReferenceCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_EmptyBottleReferenceCode"><?php echo $pharmacy_products_view->EmptyBottleReferenceCode->caption() ?></span></td>
		<td data-name="EmptyBottleReferenceCode" <?php echo $pharmacy_products_view->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleReferenceCode">
<span<?php echo $pharmacy_products_view->EmptyBottleReferenceCode->viewAttributes() ?>><?php echo $pharmacy_products_view->EmptyBottleReferenceCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
	<tr id="r_AdditionalCESSAmount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AdditionalCESSAmount"><?php echo $pharmacy_products_view->AdditionalCESSAmount->caption() ?></span></td>
		<td data-name="AdditionalCESSAmount" <?php echo $pharmacy_products_view->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_AdditionalCESSAmount">
<span<?php echo $pharmacy_products_view->AdditionalCESSAmount->viewAttributes() ?>><?php echo $pharmacy_products_view->AdditionalCESSAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products_view->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
	<tr id="r_EmptyBottleRate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_EmptyBottleRate"><?php echo $pharmacy_products_view->EmptyBottleRate->caption() ?></span></td>
		<td data-name="EmptyBottleRate" <?php echo $pharmacy_products_view->EmptyBottleRate->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleRate">
<span<?php echo $pharmacy_products_view->EmptyBottleRate->viewAttributes() ?>><?php echo $pharmacy_products_view->EmptyBottleRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_products_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_products_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_products_view->terminate();
?>
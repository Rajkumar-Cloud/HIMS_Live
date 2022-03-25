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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_products->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_productsview = currentForm = new ew.Form("fpharmacy_productsview", "view");

// Form_CustomValidate event
fpharmacy_productsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_productsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_products->isExport()) { ?>
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
<?php if ($pharmacy_products_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_products_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_products_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_products->ProductCode->Visible) { // ProductCode ?>
	<tr id="r_ProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductCode"><?php echo $pharmacy_products->ProductCode->caption() ?></span></td>
		<td data-name="ProductCode"<?php echo $pharmacy_products->ProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductCode">
<span<?php echo $pharmacy_products->ProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductName->Visible) { // ProductName ?>
	<tr id="r_ProductName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductName"><?php echo $pharmacy_products->ProductName->caption() ?></span></td>
		<td data-name="ProductName"<?php echo $pharmacy_products->ProductName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductName">
<span<?php echo $pharmacy_products->ProductName->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DivisionCode->Visible) { // DivisionCode ?>
	<tr id="r_DivisionCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DivisionCode"><?php echo $pharmacy_products->DivisionCode->caption() ?></span></td>
		<td data-name="DivisionCode"<?php echo $pharmacy_products->DivisionCode->cellAttributes() ?>>
<span id="el_pharmacy_products_DivisionCode">
<span<?php echo $pharmacy_products->DivisionCode->viewAttributes() ?>>
<?php echo $pharmacy_products->DivisionCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ManufacturerCode->Visible) { // ManufacturerCode ?>
	<tr id="r_ManufacturerCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ManufacturerCode"><?php echo $pharmacy_products->ManufacturerCode->caption() ?></span></td>
		<td data-name="ManufacturerCode"<?php echo $pharmacy_products->ManufacturerCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ManufacturerCode">
<span<?php echo $pharmacy_products->ManufacturerCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ManufacturerCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SupplierCode->Visible) { // SupplierCode ?>
	<tr id="r_SupplierCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SupplierCode"><?php echo $pharmacy_products->SupplierCode->caption() ?></span></td>
		<td data-name="SupplierCode"<?php echo $pharmacy_products->SupplierCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SupplierCode">
<span<?php echo $pharmacy_products->SupplierCode->viewAttributes() ?>>
<?php echo $pharmacy_products->SupplierCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
	<tr id="r_AlternateSupplierCodes">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AlternateSupplierCodes"><?php echo $pharmacy_products->AlternateSupplierCodes->caption() ?></span></td>
		<td data-name="AlternateSupplierCodes"<?php echo $pharmacy_products->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSupplierCodes">
<span<?php echo $pharmacy_products->AlternateSupplierCodes->viewAttributes() ?>>
<?php echo $pharmacy_products->AlternateSupplierCodes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AlternateProductCode->Visible) { // AlternateProductCode ?>
	<tr id="r_AlternateProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AlternateProductCode"><?php echo $pharmacy_products->AlternateProductCode->caption() ?></span></td>
		<td data-name="AlternateProductCode"<?php echo $pharmacy_products->AlternateProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateProductCode">
<span<?php echo $pharmacy_products->AlternateProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->AlternateProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->UniversalProductCode->Visible) { // UniversalProductCode ?>
	<tr id="r_UniversalProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UniversalProductCode"><?php echo $pharmacy_products->UniversalProductCode->caption() ?></span></td>
		<td data-name="UniversalProductCode"<?php echo $pharmacy_products->UniversalProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_UniversalProductCode">
<span<?php echo $pharmacy_products->UniversalProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->UniversalProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BookProductCode->Visible) { // BookProductCode ?>
	<tr id="r_BookProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BookProductCode"><?php echo $pharmacy_products->BookProductCode->caption() ?></span></td>
		<td data-name="BookProductCode"<?php echo $pharmacy_products->BookProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BookProductCode">
<span<?php echo $pharmacy_products->BookProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->BookProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->OldCode->Visible) { // OldCode ?>
	<tr id="r_OldCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OldCode"><?php echo $pharmacy_products->OldCode->caption() ?></span></td>
		<td data-name="OldCode"<?php echo $pharmacy_products->OldCode->cellAttributes() ?>>
<span id="el_pharmacy_products_OldCode">
<span<?php echo $pharmacy_products->OldCode->viewAttributes() ?>>
<?php echo $pharmacy_products->OldCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProtectedProducts->Visible) { // ProtectedProducts ?>
	<tr id="r_ProtectedProducts">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProtectedProducts"><?php echo $pharmacy_products->ProtectedProducts->caption() ?></span></td>
		<td data-name="ProtectedProducts"<?php echo $pharmacy_products->ProtectedProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_ProtectedProducts">
<span<?php echo $pharmacy_products->ProtectedProducts->viewAttributes() ?>>
<?php echo $pharmacy_products->ProtectedProducts->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductFullName->Visible) { // ProductFullName ?>
	<tr id="r_ProductFullName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductFullName"><?php echo $pharmacy_products->ProductFullName->caption() ?></span></td>
		<td data-name="ProductFullName"<?php echo $pharmacy_products->ProductFullName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductFullName">
<span<?php echo $pharmacy_products->ProductFullName->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductFullName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
	<tr id="r_UnitOfMeasure">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UnitOfMeasure"><?php echo $pharmacy_products->UnitOfMeasure->caption() ?></span></td>
		<td data-name="UnitOfMeasure"<?php echo $pharmacy_products->UnitOfMeasure->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitOfMeasure">
<span<?php echo $pharmacy_products->UnitOfMeasure->viewAttributes() ?>>
<?php echo $pharmacy_products->UnitOfMeasure->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->UnitDescription->Visible) { // UnitDescription ?>
	<tr id="r_UnitDescription">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UnitDescription"><?php echo $pharmacy_products->UnitDescription->caption() ?></span></td>
		<td data-name="UnitDescription"<?php echo $pharmacy_products->UnitDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitDescription">
<span<?php echo $pharmacy_products->UnitDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->UnitDescription->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BulkDescription->Visible) { // BulkDescription ?>
	<tr id="r_BulkDescription">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BulkDescription"><?php echo $pharmacy_products->BulkDescription->caption() ?></span></td>
		<td data-name="BulkDescription"<?php echo $pharmacy_products->BulkDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BulkDescription">
<span<?php echo $pharmacy_products->BulkDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->BulkDescription->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDescription->Visible) { // BarCodeDescription ?>
	<tr id="r_BarCodeDescription">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BarCodeDescription"><?php echo $pharmacy_products->BarCodeDescription->caption() ?></span></td>
		<td data-name="BarCodeDescription"<?php echo $pharmacy_products->BarCodeDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDescription">
<span<?php echo $pharmacy_products->BarCodeDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->BarCodeDescription->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PackageInformation->Visible) { // PackageInformation ?>
	<tr id="r_PackageInformation">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PackageInformation"><?php echo $pharmacy_products->PackageInformation->caption() ?></span></td>
		<td data-name="PackageInformation"<?php echo $pharmacy_products->PackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageInformation">
<span<?php echo $pharmacy_products->PackageInformation->viewAttributes() ?>>
<?php echo $pharmacy_products->PackageInformation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PackageId->Visible) { // PackageId ?>
	<tr id="r_PackageId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PackageId"><?php echo $pharmacy_products->PackageId->caption() ?></span></td>
		<td data-name="PackageId"<?php echo $pharmacy_products->PackageId->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageId">
<span<?php echo $pharmacy_products->PackageId->viewAttributes() ?>>
<?php echo $pharmacy_products->PackageId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Weight->Visible) { // Weight ?>
	<tr id="r_Weight">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Weight"><?php echo $pharmacy_products->Weight->caption() ?></span></td>
		<td data-name="Weight"<?php echo $pharmacy_products->Weight->cellAttributes() ?>>
<span id="el_pharmacy_products_Weight">
<span<?php echo $pharmacy_products->Weight->viewAttributes() ?>>
<?php echo $pharmacy_products->Weight->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AllowFractions->Visible) { // AllowFractions ?>
	<tr id="r_AllowFractions">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowFractions"><?php echo $pharmacy_products->AllowFractions->caption() ?></span></td>
		<td data-name="AllowFractions"<?php echo $pharmacy_products->AllowFractions->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowFractions">
<span<?php echo $pharmacy_products->AllowFractions->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowFractions->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
	<tr id="r_MinimumStockLevel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinimumStockLevel"><?php echo $pharmacy_products->MinimumStockLevel->caption() ?></span></td>
		<td data-name="MinimumStockLevel"<?php echo $pharmacy_products->MinimumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumStockLevel">
<span<?php echo $pharmacy_products->MinimumStockLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->MinimumStockLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
	<tr id="r_MaximumStockLevel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MaximumStockLevel"><?php echo $pharmacy_products->MaximumStockLevel->caption() ?></span></td>
		<td data-name="MaximumStockLevel"<?php echo $pharmacy_products->MaximumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MaximumStockLevel">
<span<?php echo $pharmacy_products->MaximumStockLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->MaximumStockLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ReorderLevel->Visible) { // ReorderLevel ?>
	<tr id="r_ReorderLevel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ReorderLevel"><?php echo $pharmacy_products->ReorderLevel->caption() ?></span></td>
		<td data-name="ReorderLevel"<?php echo $pharmacy_products->ReorderLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_ReorderLevel">
<span<?php echo $pharmacy_products->ReorderLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->ReorderLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MinMaxRatio->Visible) { // MinMaxRatio ?>
	<tr id="r_MinMaxRatio">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinMaxRatio"><?php echo $pharmacy_products->MinMaxRatio->caption() ?></span></td>
		<td data-name="MinMaxRatio"<?php echo $pharmacy_products->MinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxRatio">
<span<?php echo $pharmacy_products->MinMaxRatio->viewAttributes() ?>>
<?php echo $pharmacy_products->MinMaxRatio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
	<tr id="r_AutoMinMaxRatio">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AutoMinMaxRatio"><?php echo $pharmacy_products->AutoMinMaxRatio->caption() ?></span></td>
		<td data-name="AutoMinMaxRatio"<?php echo $pharmacy_products->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_AutoMinMaxRatio">
<span<?php echo $pharmacy_products->AutoMinMaxRatio->viewAttributes() ?>>
<?php echo $pharmacy_products->AutoMinMaxRatio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ScheduleCode->Visible) { // ScheduleCode ?>
	<tr id="r_ScheduleCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ScheduleCode"><?php echo $pharmacy_products->ScheduleCode->caption() ?></span></td>
		<td data-name="ScheduleCode"<?php echo $pharmacy_products->ScheduleCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleCode">
<span<?php echo $pharmacy_products->ScheduleCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ScheduleCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->RopRatio->Visible) { // RopRatio ?>
	<tr id="r_RopRatio">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RopRatio"><?php echo $pharmacy_products->RopRatio->caption() ?></span></td>
		<td data-name="RopRatio"<?php echo $pharmacy_products->RopRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_RopRatio">
<span<?php echo $pharmacy_products->RopRatio->viewAttributes() ?>>
<?php echo $pharmacy_products->RopRatio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MRP"><?php echo $pharmacy_products->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $pharmacy_products->MRP->cellAttributes() ?>>
<span id="el_pharmacy_products_MRP">
<span<?php echo $pharmacy_products->MRP->viewAttributes() ?>>
<?php echo $pharmacy_products->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PurchasePrice->Visible) { // PurchasePrice ?>
	<tr id="r_PurchasePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PurchasePrice"><?php echo $pharmacy_products->PurchasePrice->caption() ?></span></td>
		<td data-name="PurchasePrice"<?php echo $pharmacy_products->PurchasePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchasePrice">
<span<?php echo $pharmacy_products->PurchasePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->PurchasePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PurchaseUnit->Visible) { // PurchaseUnit ?>
	<tr id="r_PurchaseUnit">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PurchaseUnit"><?php echo $pharmacy_products->PurchaseUnit->caption() ?></span></td>
		<td data-name="PurchaseUnit"<?php echo $pharmacy_products->PurchaseUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseUnit">
<span<?php echo $pharmacy_products->PurchaseUnit->viewAttributes() ?>>
<?php echo $pharmacy_products->PurchaseUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
	<tr id="r_PurchaseTaxCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PurchaseTaxCode"><?php echo $pharmacy_products->PurchaseTaxCode->caption() ?></span></td>
		<td data-name="PurchaseTaxCode"<?php echo $pharmacy_products->PurchaseTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseTaxCode">
<span<?php echo $pharmacy_products->PurchaseTaxCode->viewAttributes() ?>>
<?php echo $pharmacy_products->PurchaseTaxCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AllowDirectInward->Visible) { // AllowDirectInward ?>
	<tr id="r_AllowDirectInward">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowDirectInward"><?php echo $pharmacy_products->AllowDirectInward->caption() ?></span></td>
		<td data-name="AllowDirectInward"<?php echo $pharmacy_products->AllowDirectInward->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowDirectInward">
<span<?php echo $pharmacy_products->AllowDirectInward->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowDirectInward->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SalePrice->Visible) { // SalePrice ?>
	<tr id="r_SalePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalePrice"><?php echo $pharmacy_products->SalePrice->caption() ?></span></td>
		<td data-name="SalePrice"<?php echo $pharmacy_products->SalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePrice">
<span<?php echo $pharmacy_products->SalePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->SalePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SaleUnit->Visible) { // SaleUnit ?>
	<tr id="r_SaleUnit">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SaleUnit"><?php echo $pharmacy_products->SaleUnit->caption() ?></span></td>
		<td data-name="SaleUnit"<?php echo $pharmacy_products->SaleUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleUnit">
<span<?php echo $pharmacy_products->SaleUnit->viewAttributes() ?>>
<?php echo $pharmacy_products->SaleUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SalesTaxCode->Visible) { // SalesTaxCode ?>
	<tr id="r_SalesTaxCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalesTaxCode"><?php echo $pharmacy_products->SalesTaxCode->caption() ?></span></td>
		<td data-name="SalesTaxCode"<?php echo $pharmacy_products->SalesTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesTaxCode">
<span<?php echo $pharmacy_products->SalesTaxCode->viewAttributes() ?>>
<?php echo $pharmacy_products->SalesTaxCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->StockReceived->Visible) { // StockReceived ?>
	<tr id="r_StockReceived">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockReceived"><?php echo $pharmacy_products->StockReceived->caption() ?></span></td>
		<td data-name="StockReceived"<?php echo $pharmacy_products->StockReceived->cellAttributes() ?>>
<span id="el_pharmacy_products_StockReceived">
<span<?php echo $pharmacy_products->StockReceived->viewAttributes() ?>>
<?php echo $pharmacy_products->StockReceived->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TotalStock->Visible) { // TotalStock ?>
	<tr id="r_TotalStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TotalStock"><?php echo $pharmacy_products->TotalStock->caption() ?></span></td>
		<td data-name="TotalStock"<?php echo $pharmacy_products->TotalStock->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalStock">
<span<?php echo $pharmacy_products->TotalStock->viewAttributes() ?>>
<?php echo $pharmacy_products->TotalStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->StockType->Visible) { // StockType ?>
	<tr id="r_StockType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockType"><?php echo $pharmacy_products->StockType->caption() ?></span></td>
		<td data-name="StockType"<?php echo $pharmacy_products->StockType->cellAttributes() ?>>
<span id="el_pharmacy_products_StockType">
<span<?php echo $pharmacy_products->StockType->viewAttributes() ?>>
<?php echo $pharmacy_products->StockType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->StockCheckDate->Visible) { // StockCheckDate ?>
	<tr id="r_StockCheckDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockCheckDate"><?php echo $pharmacy_products->StockCheckDate->caption() ?></span></td>
		<td data-name="StockCheckDate"<?php echo $pharmacy_products->StockCheckDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCheckDate">
<span<?php echo $pharmacy_products->StockCheckDate->viewAttributes() ?>>
<?php echo $pharmacy_products->StockCheckDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
	<tr id="r_StockAdjustmentDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockAdjustmentDate"><?php echo $pharmacy_products->StockAdjustmentDate->caption() ?></span></td>
		<td data-name="StockAdjustmentDate"<?php echo $pharmacy_products->StockAdjustmentDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockAdjustmentDate">
<span<?php echo $pharmacy_products->StockAdjustmentDate->viewAttributes() ?>>
<?php echo $pharmacy_products->StockAdjustmentDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Remarks"><?php echo $pharmacy_products->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $pharmacy_products->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_products_Remarks">
<span<?php echo $pharmacy_products->Remarks->viewAttributes() ?>>
<?php echo $pharmacy_products->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CostCentre->Visible) { // CostCentre ?>
	<tr id="r_CostCentre">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CostCentre"><?php echo $pharmacy_products->CostCentre->caption() ?></span></td>
		<td data-name="CostCentre"<?php echo $pharmacy_products->CostCentre->cellAttributes() ?>>
<span id="el_pharmacy_products_CostCentre">
<span<?php echo $pharmacy_products->CostCentre->viewAttributes() ?>>
<?php echo $pharmacy_products->CostCentre->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductType->Visible) { // ProductType ?>
	<tr id="r_ProductType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductType"><?php echo $pharmacy_products->ProductType->caption() ?></span></td>
		<td data-name="ProductType"<?php echo $pharmacy_products->ProductType->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductType">
<span<?php echo $pharmacy_products->ProductType->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TaxAmount->Visible) { // TaxAmount ?>
	<tr id="r_TaxAmount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TaxAmount"><?php echo $pharmacy_products->TaxAmount->caption() ?></span></td>
		<td data-name="TaxAmount"<?php echo $pharmacy_products->TaxAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxAmount">
<span<?php echo $pharmacy_products->TaxAmount->viewAttributes() ?>>
<?php echo $pharmacy_products->TaxAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TaxId->Visible) { // TaxId ?>
	<tr id="r_TaxId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TaxId"><?php echo $pharmacy_products->TaxId->caption() ?></span></td>
		<td data-name="TaxId"<?php echo $pharmacy_products->TaxId->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxId">
<span<?php echo $pharmacy_products->TaxId->viewAttributes() ?>>
<?php echo $pharmacy_products->TaxId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
	<tr id="r_ResaleTaxApplicable">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ResaleTaxApplicable"><?php echo $pharmacy_products->ResaleTaxApplicable->caption() ?></span></td>
		<td data-name="ResaleTaxApplicable"<?php echo $pharmacy_products->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ResaleTaxApplicable">
<span<?php echo $pharmacy_products->ResaleTaxApplicable->viewAttributes() ?>>
<?php echo $pharmacy_products->ResaleTaxApplicable->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CstOtherTax->Visible) { // CstOtherTax ?>
	<tr id="r_CstOtherTax">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CstOtherTax"><?php echo $pharmacy_products->CstOtherTax->caption() ?></span></td>
		<td data-name="CstOtherTax"<?php echo $pharmacy_products->CstOtherTax->cellAttributes() ?>>
<span id="el_pharmacy_products_CstOtherTax">
<span<?php echo $pharmacy_products->CstOtherTax->viewAttributes() ?>>
<?php echo $pharmacy_products->CstOtherTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TotalTax->Visible) { // TotalTax ?>
	<tr id="r_TotalTax">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TotalTax"><?php echo $pharmacy_products->TotalTax->caption() ?></span></td>
		<td data-name="TotalTax"<?php echo $pharmacy_products->TotalTax->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalTax">
<span<?php echo $pharmacy_products->TotalTax->viewAttributes() ?>>
<?php echo $pharmacy_products->TotalTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ItemCost->Visible) { // ItemCost ?>
	<tr id="r_ItemCost">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ItemCost"><?php echo $pharmacy_products->ItemCost->caption() ?></span></td>
		<td data-name="ItemCost"<?php echo $pharmacy_products->ItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ItemCost">
<span<?php echo $pharmacy_products->ItemCost->viewAttributes() ?>>
<?php echo $pharmacy_products->ItemCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ExpiryDate->Visible) { // ExpiryDate ?>
	<tr id="r_ExpiryDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExpiryDate"><?php echo $pharmacy_products->ExpiryDate->caption() ?></span></td>
		<td data-name="ExpiryDate"<?php echo $pharmacy_products->ExpiryDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryDate">
<span<?php echo $pharmacy_products->ExpiryDate->viewAttributes() ?>>
<?php echo $pharmacy_products->ExpiryDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BatchDescription->Visible) { // BatchDescription ?>
	<tr id="r_BatchDescription">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BatchDescription"><?php echo $pharmacy_products->BatchDescription->caption() ?></span></td>
		<td data-name="BatchDescription"<?php echo $pharmacy_products->BatchDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchDescription">
<span<?php echo $pharmacy_products->BatchDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->BatchDescription->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FreeScheme->Visible) { // FreeScheme ?>
	<tr id="r_FreeScheme">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeScheme"><?php echo $pharmacy_products->FreeScheme->caption() ?></span></td>
		<td data-name="FreeScheme"<?php echo $pharmacy_products->FreeScheme->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeScheme">
<span<?php echo $pharmacy_products->FreeScheme->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeScheme->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
	<tr id="r_CashDiscountEligibility">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CashDiscountEligibility"><?php echo $pharmacy_products->CashDiscountEligibility->caption() ?></span></td>
		<td data-name="CashDiscountEligibility"<?php echo $pharmacy_products->CashDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_CashDiscountEligibility">
<span<?php echo $pharmacy_products->CashDiscountEligibility->viewAttributes() ?>>
<?php echo $pharmacy_products->CashDiscountEligibility->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
	<tr id="r_DiscountPerAllowInBill">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DiscountPerAllowInBill"><?php echo $pharmacy_products->DiscountPerAllowInBill->caption() ?></span></td>
		<td data-name="DiscountPerAllowInBill"<?php echo $pharmacy_products->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountPerAllowInBill">
<span<?php echo $pharmacy_products->DiscountPerAllowInBill->viewAttributes() ?>>
<?php echo $pharmacy_products->DiscountPerAllowInBill->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Discount"><?php echo $pharmacy_products->Discount->caption() ?></span></td>
		<td data-name="Discount"<?php echo $pharmacy_products->Discount->cellAttributes() ?>>
<span id="el_pharmacy_products_Discount">
<span<?php echo $pharmacy_products->Discount->viewAttributes() ?>>
<?php echo $pharmacy_products->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TotalAmount->Visible) { // TotalAmount ?>
	<tr id="r_TotalAmount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TotalAmount"><?php echo $pharmacy_products->TotalAmount->caption() ?></span></td>
		<td data-name="TotalAmount"<?php echo $pharmacy_products->TotalAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalAmount">
<span<?php echo $pharmacy_products->TotalAmount->viewAttributes() ?>>
<?php echo $pharmacy_products->TotalAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->StandardMargin->Visible) { // StandardMargin ?>
	<tr id="r_StandardMargin">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StandardMargin"><?php echo $pharmacy_products->StandardMargin->caption() ?></span></td>
		<td data-name="StandardMargin"<?php echo $pharmacy_products->StandardMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_StandardMargin">
<span<?php echo $pharmacy_products->StandardMargin->viewAttributes() ?>>
<?php echo $pharmacy_products->StandardMargin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Margin->Visible) { // Margin ?>
	<tr id="r_Margin">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Margin"><?php echo $pharmacy_products->Margin->caption() ?></span></td>
		<td data-name="Margin"<?php echo $pharmacy_products->Margin->cellAttributes() ?>>
<span id="el_pharmacy_products_Margin">
<span<?php echo $pharmacy_products->Margin->viewAttributes() ?>>
<?php echo $pharmacy_products->Margin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MarginId->Visible) { // MarginId ?>
	<tr id="r_MarginId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarginId"><?php echo $pharmacy_products->MarginId->caption() ?></span></td>
		<td data-name="MarginId"<?php echo $pharmacy_products->MarginId->cellAttributes() ?>>
<span id="el_pharmacy_products_MarginId">
<span<?php echo $pharmacy_products->MarginId->viewAttributes() ?>>
<?php echo $pharmacy_products->MarginId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ExpectedMargin->Visible) { // ExpectedMargin ?>
	<tr id="r_ExpectedMargin">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExpectedMargin"><?php echo $pharmacy_products->ExpectedMargin->caption() ?></span></td>
		<td data-name="ExpectedMargin"<?php echo $pharmacy_products->ExpectedMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpectedMargin">
<span<?php echo $pharmacy_products->ExpectedMargin->viewAttributes() ?>>
<?php echo $pharmacy_products->ExpectedMargin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
	<tr id="r_SurchargeBeforeTax">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SurchargeBeforeTax"><?php echo $pharmacy_products->SurchargeBeforeTax->caption() ?></span></td>
		<td data-name="SurchargeBeforeTax"<?php echo $pharmacy_products->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeBeforeTax">
<span<?php echo $pharmacy_products->SurchargeBeforeTax->viewAttributes() ?>>
<?php echo $pharmacy_products->SurchargeBeforeTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
	<tr id="r_SurchargeAfterTax">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SurchargeAfterTax"><?php echo $pharmacy_products->SurchargeAfterTax->caption() ?></span></td>
		<td data-name="SurchargeAfterTax"<?php echo $pharmacy_products->SurchargeAfterTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeAfterTax">
<span<?php echo $pharmacy_products->SurchargeAfterTax->viewAttributes() ?>>
<?php echo $pharmacy_products->SurchargeAfterTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TempOrderNo->Visible) { // TempOrderNo ?>
	<tr id="r_TempOrderNo">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TempOrderNo"><?php echo $pharmacy_products->TempOrderNo->caption() ?></span></td>
		<td data-name="TempOrderNo"<?php echo $pharmacy_products->TempOrderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderNo">
<span<?php echo $pharmacy_products->TempOrderNo->viewAttributes() ?>>
<?php echo $pharmacy_products->TempOrderNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TempOrderDate->Visible) { // TempOrderDate ?>
	<tr id="r_TempOrderDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TempOrderDate"><?php echo $pharmacy_products->TempOrderDate->caption() ?></span></td>
		<td data-name="TempOrderDate"<?php echo $pharmacy_products->TempOrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderDate">
<span<?php echo $pharmacy_products->TempOrderDate->viewAttributes() ?>>
<?php echo $pharmacy_products->TempOrderDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->OrderUnit->Visible) { // OrderUnit ?>
	<tr id="r_OrderUnit">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderUnit"><?php echo $pharmacy_products->OrderUnit->caption() ?></span></td>
		<td data-name="OrderUnit"<?php echo $pharmacy_products->OrderUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderUnit">
<span<?php echo $pharmacy_products->OrderUnit->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->OrderQuantity->Visible) { // OrderQuantity ?>
	<tr id="r_OrderQuantity">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderQuantity"><?php echo $pharmacy_products->OrderQuantity->caption() ?></span></td>
		<td data-name="OrderQuantity"<?php echo $pharmacy_products->OrderQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderQuantity">
<span<?php echo $pharmacy_products->OrderQuantity->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MarkForOrder->Visible) { // MarkForOrder ?>
	<tr id="r_MarkForOrder">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkForOrder"><?php echo $pharmacy_products->MarkForOrder->caption() ?></span></td>
		<td data-name="MarkForOrder"<?php echo $pharmacy_products->MarkForOrder->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkForOrder">
<span<?php echo $pharmacy_products->MarkForOrder->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkForOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->OrderAllId->Visible) { // OrderAllId ?>
	<tr id="r_OrderAllId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderAllId"><?php echo $pharmacy_products->OrderAllId->caption() ?></span></td>
		<td data-name="OrderAllId"<?php echo $pharmacy_products->OrderAllId->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderAllId">
<span<?php echo $pharmacy_products->OrderAllId->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderAllId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
	<tr id="r_CalculateOrderQty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CalculateOrderQty"><?php echo $pharmacy_products->CalculateOrderQty->caption() ?></span></td>
		<td data-name="CalculateOrderQty"<?php echo $pharmacy_products->CalculateOrderQty->cellAttributes() ?>>
<span id="el_pharmacy_products_CalculateOrderQty">
<span<?php echo $pharmacy_products->CalculateOrderQty->viewAttributes() ?>>
<?php echo $pharmacy_products->CalculateOrderQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SubLocation->Visible) { // SubLocation ?>
	<tr id="r_SubLocation">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SubLocation"><?php echo $pharmacy_products->SubLocation->caption() ?></span></td>
		<td data-name="SubLocation"<?php echo $pharmacy_products->SubLocation->cellAttributes() ?>>
<span id="el_pharmacy_products_SubLocation">
<span<?php echo $pharmacy_products->SubLocation->viewAttributes() ?>>
<?php echo $pharmacy_products->SubLocation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CategoryCode->Visible) { // CategoryCode ?>
	<tr id="r_CategoryCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CategoryCode"><?php echo $pharmacy_products->CategoryCode->caption() ?></span></td>
		<td data-name="CategoryCode"<?php echo $pharmacy_products->CategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CategoryCode">
<span<?php echo $pharmacy_products->CategoryCode->viewAttributes() ?>>
<?php echo $pharmacy_products->CategoryCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SubCategory->Visible) { // SubCategory ?>
	<tr id="r_SubCategory">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SubCategory"><?php echo $pharmacy_products->SubCategory->caption() ?></span></td>
		<td data-name="SubCategory"<?php echo $pharmacy_products->SubCategory->cellAttributes() ?>>
<span id="el_pharmacy_products_SubCategory">
<span<?php echo $pharmacy_products->SubCategory->viewAttributes() ?>>
<?php echo $pharmacy_products->SubCategory->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
	<tr id="r_FlexCategoryCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FlexCategoryCode"><?php echo $pharmacy_products->FlexCategoryCode->caption() ?></span></td>
		<td data-name="FlexCategoryCode"<?php echo $pharmacy_products->FlexCategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_FlexCategoryCode">
<span<?php echo $pharmacy_products->FlexCategoryCode->viewAttributes() ?>>
<?php echo $pharmacy_products->FlexCategoryCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleQty->Visible) { // ABCSaleQty ?>
	<tr id="r_ABCSaleQty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ABCSaleQty"><?php echo $pharmacy_products->ABCSaleQty->caption() ?></span></td>
		<td data-name="ABCSaleQty"<?php echo $pharmacy_products->ABCSaleQty->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleQty">
<span<?php echo $pharmacy_products->ABCSaleQty->viewAttributes() ?>>
<?php echo $pharmacy_products->ABCSaleQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleValue->Visible) { // ABCSaleValue ?>
	<tr id="r_ABCSaleValue">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ABCSaleValue"><?php echo $pharmacy_products->ABCSaleValue->caption() ?></span></td>
		<td data-name="ABCSaleValue"<?php echo $pharmacy_products->ABCSaleValue->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleValue">
<span<?php echo $pharmacy_products->ABCSaleValue->viewAttributes() ?>>
<?php echo $pharmacy_products->ABCSaleValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ConvertionFactor->Visible) { // ConvertionFactor ?>
	<tr id="r_ConvertionFactor">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ConvertionFactor"><?php echo $pharmacy_products->ConvertionFactor->caption() ?></span></td>
		<td data-name="ConvertionFactor"<?php echo $pharmacy_products->ConvertionFactor->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionFactor">
<span<?php echo $pharmacy_products->ConvertionFactor->viewAttributes() ?>>
<?php echo $pharmacy_products->ConvertionFactor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
	<tr id="r_ConvertionUnitDesc">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ConvertionUnitDesc"><?php echo $pharmacy_products->ConvertionUnitDesc->caption() ?></span></td>
		<td data-name="ConvertionUnitDesc"<?php echo $pharmacy_products->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionUnitDesc">
<span<?php echo $pharmacy_products->ConvertionUnitDesc->viewAttributes() ?>>
<?php echo $pharmacy_products->ConvertionUnitDesc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TransactionId->Visible) { // TransactionId ?>
	<tr id="r_TransactionId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TransactionId"><?php echo $pharmacy_products->TransactionId->caption() ?></span></td>
		<td data-name="TransactionId"<?php echo $pharmacy_products->TransactionId->cellAttributes() ?>>
<span id="el_pharmacy_products_TransactionId">
<span<?php echo $pharmacy_products->TransactionId->viewAttributes() ?>>
<?php echo $pharmacy_products->TransactionId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SoldProductId->Visible) { // SoldProductId ?>
	<tr id="r_SoldProductId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SoldProductId"><?php echo $pharmacy_products->SoldProductId->caption() ?></span></td>
		<td data-name="SoldProductId"<?php echo $pharmacy_products->SoldProductId->cellAttributes() ?>>
<span id="el_pharmacy_products_SoldProductId">
<span<?php echo $pharmacy_products->SoldProductId->viewAttributes() ?>>
<?php echo $pharmacy_products->SoldProductId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->WantedBookId->Visible) { // WantedBookId ?>
	<tr id="r_WantedBookId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_WantedBookId"><?php echo $pharmacy_products->WantedBookId->caption() ?></span></td>
		<td data-name="WantedBookId"<?php echo $pharmacy_products->WantedBookId->cellAttributes() ?>>
<span id="el_pharmacy_products_WantedBookId">
<span<?php echo $pharmacy_products->WantedBookId->viewAttributes() ?>>
<?php echo $pharmacy_products->WantedBookId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AllId->Visible) { // AllId ?>
	<tr id="r_AllId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllId"><?php echo $pharmacy_products->AllId->caption() ?></span></td>
		<td data-name="AllId"<?php echo $pharmacy_products->AllId->cellAttributes() ?>>
<span id="el_pharmacy_products_AllId">
<span<?php echo $pharmacy_products->AllId->viewAttributes() ?>>
<?php echo $pharmacy_products->AllId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
	<tr id="r_BatchAndExpiryCompulsory">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BatchAndExpiryCompulsory"><?php echo $pharmacy_products->BatchAndExpiryCompulsory->caption() ?></span></td>
		<td data-name="BatchAndExpiryCompulsory"<?php echo $pharmacy_products->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchAndExpiryCompulsory">
<span<?php echo $pharmacy_products->BatchAndExpiryCompulsory->viewAttributes() ?>>
<?php echo $pharmacy_products->BatchAndExpiryCompulsory->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
	<tr id="r_BatchStockForWantedBook">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BatchStockForWantedBook"><?php echo $pharmacy_products->BatchStockForWantedBook->caption() ?></span></td>
		<td data-name="BatchStockForWantedBook"<?php echo $pharmacy_products->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchStockForWantedBook">
<span<?php echo $pharmacy_products->BatchStockForWantedBook->viewAttributes() ?>>
<?php echo $pharmacy_products->BatchStockForWantedBook->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
	<tr id="r_UnitBasedBilling">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_UnitBasedBilling"><?php echo $pharmacy_products->UnitBasedBilling->caption() ?></span></td>
		<td data-name="UnitBasedBilling"<?php echo $pharmacy_products->UnitBasedBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitBasedBilling">
<span<?php echo $pharmacy_products->UnitBasedBilling->viewAttributes() ?>>
<?php echo $pharmacy_products->UnitBasedBilling->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
	<tr id="r_DoNotCheckStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DoNotCheckStock"><?php echo $pharmacy_products->DoNotCheckStock->caption() ?></span></td>
		<td data-name="DoNotCheckStock"<?php echo $pharmacy_products->DoNotCheckStock->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckStock">
<span<?php echo $pharmacy_products->DoNotCheckStock->viewAttributes() ?>>
<?php echo $pharmacy_products->DoNotCheckStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AcceptRate->Visible) { // AcceptRate ?>
	<tr id="r_AcceptRate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptRate"><?php echo $pharmacy_products->AcceptRate->caption() ?></span></td>
		<td data-name="AcceptRate"<?php echo $pharmacy_products->AcceptRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRate">
<span<?php echo $pharmacy_products->AcceptRate->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PriceLevel->Visible) { // PriceLevel ?>
	<tr id="r_PriceLevel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PriceLevel"><?php echo $pharmacy_products->PriceLevel->caption() ?></span></td>
		<td data-name="PriceLevel"<?php echo $pharmacy_products->PriceLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceLevel">
<span<?php echo $pharmacy_products->PriceLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->PriceLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LastQuotePrice->Visible) { // LastQuotePrice ?>
	<tr id="r_LastQuotePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LastQuotePrice"><?php echo $pharmacy_products->LastQuotePrice->caption() ?></span></td>
		<td data-name="LastQuotePrice"<?php echo $pharmacy_products->LastQuotePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_LastQuotePrice">
<span<?php echo $pharmacy_products->LastQuotePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->LastQuotePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PriceChange->Visible) { // PriceChange ?>
	<tr id="r_PriceChange">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PriceChange"><?php echo $pharmacy_products->PriceChange->caption() ?></span></td>
		<td data-name="PriceChange"<?php echo $pharmacy_products->PriceChange->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceChange">
<span<?php echo $pharmacy_products->PriceChange->viewAttributes() ?>>
<?php echo $pharmacy_products->PriceChange->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CommodityCode->Visible) { // CommodityCode ?>
	<tr id="r_CommodityCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CommodityCode"><?php echo $pharmacy_products->CommodityCode->caption() ?></span></td>
		<td data-name="CommodityCode"<?php echo $pharmacy_products->CommodityCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CommodityCode">
<span<?php echo $pharmacy_products->CommodityCode->viewAttributes() ?>>
<?php echo $pharmacy_products->CommodityCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->InstitutePrice->Visible) { // InstitutePrice ?>
	<tr id="r_InstitutePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_InstitutePrice"><?php echo $pharmacy_products->InstitutePrice->caption() ?></span></td>
		<td data-name="InstitutePrice"<?php echo $pharmacy_products->InstitutePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_InstitutePrice">
<span<?php echo $pharmacy_products->InstitutePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->InstitutePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
	<tr id="r_CtrlOrDCtrlProduct">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CtrlOrDCtrlProduct"><?php echo $pharmacy_products->CtrlOrDCtrlProduct->caption() ?></span></td>
		<td data-name="CtrlOrDCtrlProduct"<?php echo $pharmacy_products->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_CtrlOrDCtrlProduct">
<span<?php echo $pharmacy_products->CtrlOrDCtrlProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->CtrlOrDCtrlProduct->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ImportedDate->Visible) { // ImportedDate ?>
	<tr id="r_ImportedDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ImportedDate"><?php echo $pharmacy_products->ImportedDate->caption() ?></span></td>
		<td data-name="ImportedDate"<?php echo $pharmacy_products->ImportedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ImportedDate">
<span<?php echo $pharmacy_products->ImportedDate->viewAttributes() ?>>
<?php echo $pharmacy_products->ImportedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IsImported->Visible) { // IsImported ?>
	<tr id="r_IsImported">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsImported"><?php echo $pharmacy_products->IsImported->caption() ?></span></td>
		<td data-name="IsImported"<?php echo $pharmacy_products->IsImported->cellAttributes() ?>>
<span id="el_pharmacy_products_IsImported">
<span<?php echo $pharmacy_products->IsImported->viewAttributes() ?>>
<?php echo $pharmacy_products->IsImported->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FileName->Visible) { // FileName ?>
	<tr id="r_FileName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FileName"><?php echo $pharmacy_products->FileName->caption() ?></span></td>
		<td data-name="FileName"<?php echo $pharmacy_products->FileName->cellAttributes() ?>>
<span id="el_pharmacy_products_FileName">
<span<?php echo $pharmacy_products->FileName->viewAttributes() ?>>
<?php echo $pharmacy_products->FileName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LPName->Visible) { // LPName ?>
	<tr id="r_LPName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LPName"><?php echo $pharmacy_products->LPName->caption() ?></span></td>
		<td data-name="LPName"<?php echo $pharmacy_products->LPName->cellAttributes() ?>>
<span id="el_pharmacy_products_LPName">
<span<?php echo $pharmacy_products->LPName->viewAttributes() ?>>
<?php echo $pharmacy_products->LPName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->GodownNumber->Visible) { // GodownNumber ?>
	<tr id="r_GodownNumber">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GodownNumber"><?php echo $pharmacy_products->GodownNumber->caption() ?></span></td>
		<td data-name="GodownNumber"<?php echo $pharmacy_products->GodownNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_GodownNumber">
<span<?php echo $pharmacy_products->GodownNumber->viewAttributes() ?>>
<?php echo $pharmacy_products->GodownNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CreationDate->Visible) { // CreationDate ?>
	<tr id="r_CreationDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CreationDate"><?php echo $pharmacy_products->CreationDate->caption() ?></span></td>
		<td data-name="CreationDate"<?php echo $pharmacy_products->CreationDate->cellAttributes() ?>>
<span id="el_pharmacy_products_CreationDate">
<span<?php echo $pharmacy_products->CreationDate->viewAttributes() ?>>
<?php echo $pharmacy_products->CreationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CreatedbyUser->Visible) { // CreatedbyUser ?>
	<tr id="r_CreatedbyUser">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CreatedbyUser"><?php echo $pharmacy_products->CreatedbyUser->caption() ?></span></td>
		<td data-name="CreatedbyUser"<?php echo $pharmacy_products->CreatedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_CreatedbyUser">
<span<?php echo $pharmacy_products->CreatedbyUser->viewAttributes() ?>>
<?php echo $pharmacy_products->CreatedbyUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ModifiedDate->Visible) { // ModifiedDate ?>
	<tr id="r_ModifiedDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifiedDate"><?php echo $pharmacy_products->ModifiedDate->caption() ?></span></td>
		<td data-name="ModifiedDate"<?php echo $pharmacy_products->ModifiedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedDate">
<span<?php echo $pharmacy_products->ModifiedDate->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifiedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
	<tr id="r_ModifiedbyUser">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifiedbyUser"><?php echo $pharmacy_products->ModifiedbyUser->caption() ?></span></td>
		<td data-name="ModifiedbyUser"<?php echo $pharmacy_products->ModifiedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedbyUser">
<span<?php echo $pharmacy_products->ModifiedbyUser->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifiedbyUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->isActive->Visible) { // isActive ?>
	<tr id="r_isActive">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_isActive"><?php echo $pharmacy_products->isActive->caption() ?></span></td>
		<td data-name="isActive"<?php echo $pharmacy_products->isActive->cellAttributes() ?>>
<span id="el_pharmacy_products_isActive">
<span<?php echo $pharmacy_products->isActive->viewAttributes() ?>>
<?php echo $pharmacy_products->isActive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
	<tr id="r_AllowExpiryClaim">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowExpiryClaim"><?php echo $pharmacy_products->AllowExpiryClaim->caption() ?></span></td>
		<td data-name="AllowExpiryClaim"<?php echo $pharmacy_products->AllowExpiryClaim->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryClaim">
<span<?php echo $pharmacy_products->AllowExpiryClaim->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowExpiryClaim->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BrandCode->Visible) { // BrandCode ?>
	<tr id="r_BrandCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BrandCode"><?php echo $pharmacy_products->BrandCode->caption() ?></span></td>
		<td data-name="BrandCode"<?php echo $pharmacy_products->BrandCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BrandCode">
<span<?php echo $pharmacy_products->BrandCode->viewAttributes() ?>>
<?php echo $pharmacy_products->BrandCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
	<tr id="r_FreeSchemeBasedon">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeSchemeBasedon"><?php echo $pharmacy_products->FreeSchemeBasedon->caption() ?></span></td>
		<td data-name="FreeSchemeBasedon"<?php echo $pharmacy_products->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeSchemeBasedon">
<span<?php echo $pharmacy_products->FreeSchemeBasedon->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeSchemeBasedon->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
	<tr id="r_DoNotCheckCostInBill">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DoNotCheckCostInBill"><?php echo $pharmacy_products->DoNotCheckCostInBill->caption() ?></span></td>
		<td data-name="DoNotCheckCostInBill"<?php echo $pharmacy_products->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckCostInBill">
<span<?php echo $pharmacy_products->DoNotCheckCostInBill->viewAttributes() ?>>
<?php echo $pharmacy_products->DoNotCheckCostInBill->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductGroupCode->Visible) { // ProductGroupCode ?>
	<tr id="r_ProductGroupCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductGroupCode"><?php echo $pharmacy_products->ProductGroupCode->caption() ?></span></td>
		<td data-name="ProductGroupCode"<?php echo $pharmacy_products->ProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductGroupCode">
<span<?php echo $pharmacy_products->ProductGroupCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductGroupCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
	<tr id="r_ProductStrengthCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductStrengthCode"><?php echo $pharmacy_products->ProductStrengthCode->caption() ?></span></td>
		<td data-name="ProductStrengthCode"<?php echo $pharmacy_products->ProductStrengthCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductStrengthCode">
<span<?php echo $pharmacy_products->ProductStrengthCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductStrengthCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PackingCode->Visible) { // PackingCode ?>
	<tr id="r_PackingCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PackingCode"><?php echo $pharmacy_products->PackingCode->caption() ?></span></td>
		<td data-name="PackingCode"<?php echo $pharmacy_products->PackingCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PackingCode">
<span<?php echo $pharmacy_products->PackingCode->viewAttributes() ?>>
<?php echo $pharmacy_products->PackingCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ComputedMinStock->Visible) { // ComputedMinStock ?>
	<tr id="r_ComputedMinStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComputedMinStock"><?php echo $pharmacy_products->ComputedMinStock->caption() ?></span></td>
		<td data-name="ComputedMinStock"<?php echo $pharmacy_products->ComputedMinStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMinStock">
<span<?php echo $pharmacy_products->ComputedMinStock->viewAttributes() ?>>
<?php echo $pharmacy_products->ComputedMinStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
	<tr id="r_ComputedMaxStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComputedMaxStock"><?php echo $pharmacy_products->ComputedMaxStock->caption() ?></span></td>
		<td data-name="ComputedMaxStock"<?php echo $pharmacy_products->ComputedMaxStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMaxStock">
<span<?php echo $pharmacy_products->ComputedMaxStock->viewAttributes() ?>>
<?php echo $pharmacy_products->ComputedMaxStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductRemark->Visible) { // ProductRemark ?>
	<tr id="r_ProductRemark">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductRemark"><?php echo $pharmacy_products->ProductRemark->caption() ?></span></td>
		<td data-name="ProductRemark"<?php echo $pharmacy_products->ProductRemark->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductRemark">
<span<?php echo $pharmacy_products->ProductRemark->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductRemark->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductDrugCode->Visible) { // ProductDrugCode ?>
	<tr id="r_ProductDrugCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductDrugCode"><?php echo $pharmacy_products->ProductDrugCode->caption() ?></span></td>
		<td data-name="ProductDrugCode"<?php echo $pharmacy_products->ProductDrugCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDrugCode">
<span<?php echo $pharmacy_products->ProductDrugCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductDrugCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
	<tr id="r_IsMatrixProduct">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsMatrixProduct"><?php echo $pharmacy_products->IsMatrixProduct->caption() ?></span></td>
		<td data-name="IsMatrixProduct"<?php echo $pharmacy_products->IsMatrixProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMatrixProduct">
<span<?php echo $pharmacy_products->IsMatrixProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->IsMatrixProduct->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount1->Visible) { // AttributeCount1 ?>
	<tr id="r_AttributeCount1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount1"><?php echo $pharmacy_products->AttributeCount1->caption() ?></span></td>
		<td data-name="AttributeCount1"<?php echo $pharmacy_products->AttributeCount1->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount1">
<span<?php echo $pharmacy_products->AttributeCount1->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount2->Visible) { // AttributeCount2 ?>
	<tr id="r_AttributeCount2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount2"><?php echo $pharmacy_products->AttributeCount2->caption() ?></span></td>
		<td data-name="AttributeCount2"<?php echo $pharmacy_products->AttributeCount2->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount2">
<span<?php echo $pharmacy_products->AttributeCount2->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount3->Visible) { // AttributeCount3 ?>
	<tr id="r_AttributeCount3">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount3"><?php echo $pharmacy_products->AttributeCount3->caption() ?></span></td>
		<td data-name="AttributeCount3"<?php echo $pharmacy_products->AttributeCount3->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount3">
<span<?php echo $pharmacy_products->AttributeCount3->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount4->Visible) { // AttributeCount4 ?>
	<tr id="r_AttributeCount4">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount4"><?php echo $pharmacy_products->AttributeCount4->caption() ?></span></td>
		<td data-name="AttributeCount4"<?php echo $pharmacy_products->AttributeCount4->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount4">
<span<?php echo $pharmacy_products->AttributeCount4->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount5->Visible) { // AttributeCount5 ?>
	<tr id="r_AttributeCount5">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount5"><?php echo $pharmacy_products->AttributeCount5->caption() ?></span></td>
		<td data-name="AttributeCount5"<?php echo $pharmacy_products->AttributeCount5->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount5">
<span<?php echo $pharmacy_products->AttributeCount5->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
	<tr id="r_DefaultDiscountPercentage">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultDiscountPercentage"><?php echo $pharmacy_products->DefaultDiscountPercentage->caption() ?></span></td>
		<td data-name="DefaultDiscountPercentage"<?php echo $pharmacy_products->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultDiscountPercentage">
<span<?php echo $pharmacy_products->DefaultDiscountPercentage->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultDiscountPercentage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
	<tr id="r_DonotPrintBarcode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DonotPrintBarcode"><?php echo $pharmacy_products->DonotPrintBarcode->caption() ?></span></td>
		<td data-name="DonotPrintBarcode"<?php echo $pharmacy_products->DonotPrintBarcode->cellAttributes() ?>>
<span id="el_pharmacy_products_DonotPrintBarcode">
<span<?php echo $pharmacy_products->DonotPrintBarcode->viewAttributes() ?>>
<?php echo $pharmacy_products->DonotPrintBarcode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
	<tr id="r_ProductLevelDiscount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductLevelDiscount"><?php echo $pharmacy_products->ProductLevelDiscount->caption() ?></span></td>
		<td data-name="ProductLevelDiscount"<?php echo $pharmacy_products->ProductLevelDiscount->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLevelDiscount">
<span<?php echo $pharmacy_products->ProductLevelDiscount->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductLevelDiscount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Markup->Visible) { // Markup ?>
	<tr id="r_Markup">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Markup"><?php echo $pharmacy_products->Markup->caption() ?></span></td>
		<td data-name="Markup"<?php echo $pharmacy_products->Markup->cellAttributes() ?>>
<span id="el_pharmacy_products_Markup">
<span<?php echo $pharmacy_products->Markup->viewAttributes() ?>>
<?php echo $pharmacy_products->Markup->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MarkDown->Visible) { // MarkDown ?>
	<tr id="r_MarkDown">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkDown"><?php echo $pharmacy_products->MarkDown->caption() ?></span></td>
		<td data-name="MarkDown"<?php echo $pharmacy_products->MarkDown->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDown">
<span<?php echo $pharmacy_products->MarkDown->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkDown->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
	<tr id="r_ReworkSalePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ReworkSalePrice"><?php echo $pharmacy_products->ReworkSalePrice->caption() ?></span></td>
		<td data-name="ReworkSalePrice"<?php echo $pharmacy_products->ReworkSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_ReworkSalePrice">
<span<?php echo $pharmacy_products->ReworkSalePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->ReworkSalePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MultipleInput->Visible) { // MultipleInput ?>
	<tr id="r_MultipleInput">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MultipleInput"><?php echo $pharmacy_products->MultipleInput->caption() ?></span></td>
		<td data-name="MultipleInput"<?php echo $pharmacy_products->MultipleInput->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleInput">
<span<?php echo $pharmacy_products->MultipleInput->viewAttributes() ?>>
<?php echo $pharmacy_products->MultipleInput->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LpPackageInformation->Visible) { // LpPackageInformation ?>
	<tr id="r_LpPackageInformation">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LpPackageInformation"><?php echo $pharmacy_products->LpPackageInformation->caption() ?></span></td>
		<td data-name="LpPackageInformation"<?php echo $pharmacy_products->LpPackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_LpPackageInformation">
<span<?php echo $pharmacy_products->LpPackageInformation->viewAttributes() ?>>
<?php echo $pharmacy_products->LpPackageInformation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
	<tr id="r_AllowNegativeStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowNegativeStock"><?php echo $pharmacy_products->AllowNegativeStock->caption() ?></span></td>
		<td data-name="AllowNegativeStock"<?php echo $pharmacy_products->AllowNegativeStock->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowNegativeStock">
<span<?php echo $pharmacy_products->AllowNegativeStock->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowNegativeStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->OrderDate->Visible) { // OrderDate ?>
	<tr id="r_OrderDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderDate"><?php echo $pharmacy_products->OrderDate->caption() ?></span></td>
		<td data-name="OrderDate"<?php echo $pharmacy_products->OrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderDate">
<span<?php echo $pharmacy_products->OrderDate->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->OrderTime->Visible) { // OrderTime ?>
	<tr id="r_OrderTime">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderTime"><?php echo $pharmacy_products->OrderTime->caption() ?></span></td>
		<td data-name="OrderTime"<?php echo $pharmacy_products->OrderTime->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderTime">
<span<?php echo $pharmacy_products->OrderTime->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->RateGroupCode->Visible) { // RateGroupCode ?>
	<tr id="r_RateGroupCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RateGroupCode"><?php echo $pharmacy_products->RateGroupCode->caption() ?></span></td>
		<td data-name="RateGroupCode"<?php echo $pharmacy_products->RateGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RateGroupCode">
<span<?php echo $pharmacy_products->RateGroupCode->viewAttributes() ?>>
<?php echo $pharmacy_products->RateGroupCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
	<tr id="r_ConversionCaseLot">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ConversionCaseLot"><?php echo $pharmacy_products->ConversionCaseLot->caption() ?></span></td>
		<td data-name="ConversionCaseLot"<?php echo $pharmacy_products->ConversionCaseLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ConversionCaseLot">
<span<?php echo $pharmacy_products->ConversionCaseLot->viewAttributes() ?>>
<?php echo $pharmacy_products->ConversionCaseLot->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ShippingLot->Visible) { // ShippingLot ?>
	<tr id="r_ShippingLot">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ShippingLot"><?php echo $pharmacy_products->ShippingLot->caption() ?></span></td>
		<td data-name="ShippingLot"<?php echo $pharmacy_products->ShippingLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ShippingLot">
<span<?php echo $pharmacy_products->ShippingLot->viewAttributes() ?>>
<?php echo $pharmacy_products->ShippingLot->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
	<tr id="r_AllowExpiryReplacement">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowExpiryReplacement"><?php echo $pharmacy_products->AllowExpiryReplacement->caption() ?></span></td>
		<td data-name="AllowExpiryReplacement"<?php echo $pharmacy_products->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryReplacement">
<span<?php echo $pharmacy_products->AllowExpiryReplacement->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowExpiryReplacement->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
	<tr id="r_NoOfMonthExpiryAllowed">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_NoOfMonthExpiryAllowed"><?php echo $pharmacy_products->NoOfMonthExpiryAllowed->caption() ?></span></td>
		<td data-name="NoOfMonthExpiryAllowed"<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el_pharmacy_products_NoOfMonthExpiryAllowed">
<span<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->viewAttributes() ?>>
<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
	<tr id="r_ProductDiscountEligibility">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductDiscountEligibility"><?php echo $pharmacy_products->ProductDiscountEligibility->caption() ?></span></td>
		<td data-name="ProductDiscountEligibility"<?php echo $pharmacy_products->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDiscountEligibility">
<span<?php echo $pharmacy_products->ProductDiscountEligibility->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductDiscountEligibility->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
	<tr id="r_ScheduleTypeCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ScheduleTypeCode"><?php echo $pharmacy_products->ScheduleTypeCode->caption() ?></span></td>
		<td data-name="ScheduleTypeCode"<?php echo $pharmacy_products->ScheduleTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleTypeCode">
<span<?php echo $pharmacy_products->ScheduleTypeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ScheduleTypeCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
	<tr id="r_AIOCDProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AIOCDProductCode"><?php echo $pharmacy_products->AIOCDProductCode->caption() ?></span></td>
		<td data-name="AIOCDProductCode"<?php echo $pharmacy_products->AIOCDProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AIOCDProductCode">
<span<?php echo $pharmacy_products->AIOCDProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->AIOCDProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FreeQuantity->Visible) { // FreeQuantity ?>
	<tr id="r_FreeQuantity">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeQuantity"><?php echo $pharmacy_products->FreeQuantity->caption() ?></span></td>
		<td data-name="FreeQuantity"<?php echo $pharmacy_products->FreeQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeQuantity">
<span<?php echo $pharmacy_products->FreeQuantity->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DiscountType->Visible) { // DiscountType ?>
	<tr id="r_DiscountType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DiscountType"><?php echo $pharmacy_products->DiscountType->caption() ?></span></td>
		<td data-name="DiscountType"<?php echo $pharmacy_products->DiscountType->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountType">
<span<?php echo $pharmacy_products->DiscountType->viewAttributes() ?>>
<?php echo $pharmacy_products->DiscountType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DiscountValue->Visible) { // DiscountValue ?>
	<tr id="r_DiscountValue">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DiscountValue"><?php echo $pharmacy_products->DiscountValue->caption() ?></span></td>
		<td data-name="DiscountValue"<?php echo $pharmacy_products->DiscountValue->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountValue">
<span<?php echo $pharmacy_products->DiscountValue->viewAttributes() ?>>
<?php echo $pharmacy_products->DiscountValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
	<tr id="r_HasProductOrderAttribute">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_HasProductOrderAttribute"><?php echo $pharmacy_products->HasProductOrderAttribute->caption() ?></span></td>
		<td data-name="HasProductOrderAttribute"<?php echo $pharmacy_products->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el_pharmacy_products_HasProductOrderAttribute">
<span<?php echo $pharmacy_products->HasProductOrderAttribute->viewAttributes() ?>>
<?php echo $pharmacy_products->HasProductOrderAttribute->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FirstPODate->Visible) { // FirstPODate ?>
	<tr id="r_FirstPODate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FirstPODate"><?php echo $pharmacy_products->FirstPODate->caption() ?></span></td>
		<td data-name="FirstPODate"<?php echo $pharmacy_products->FirstPODate->cellAttributes() ?>>
<span id="el_pharmacy_products_FirstPODate">
<span<?php echo $pharmacy_products->FirstPODate->viewAttributes() ?>>
<?php echo $pharmacy_products->FirstPODate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
	<tr id="r_SaleprcieAndMrpCalcPercent">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent"><?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->caption() ?></span></td>
		<td data-name="SaleprcieAndMrpCalcPercent"<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleprcieAndMrpCalcPercent">
<span<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->viewAttributes() ?>>
<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
	<tr id="r_IsGiftVoucherProducts">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsGiftVoucherProducts"><?php echo $pharmacy_products->IsGiftVoucherProducts->caption() ?></span></td>
		<td data-name="IsGiftVoucherProducts"<?php echo $pharmacy_products->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_IsGiftVoucherProducts">
<span<?php echo $pharmacy_products->IsGiftVoucherProducts->viewAttributes() ?>>
<?php echo $pharmacy_products->IsGiftVoucherProducts->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
	<tr id="r_AcceptRange4SerialNumber">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptRange4SerialNumber"><?php echo $pharmacy_products->AcceptRange4SerialNumber->caption() ?></span></td>
		<td data-name="AcceptRange4SerialNumber"<?php echo $pharmacy_products->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRange4SerialNumber">
<span<?php echo $pharmacy_products->AcceptRange4SerialNumber->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptRange4SerialNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
	<tr id="r_GiftVoucherDenomination">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GiftVoucherDenomination"><?php echo $pharmacy_products->GiftVoucherDenomination->caption() ?></span></td>
		<td data-name="GiftVoucherDenomination"<?php echo $pharmacy_products->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftVoucherDenomination">
<span<?php echo $pharmacy_products->GiftVoucherDenomination->viewAttributes() ?>>
<?php echo $pharmacy_products->GiftVoucherDenomination->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Subclasscode->Visible) { // Subclasscode ?>
	<tr id="r_Subclasscode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Subclasscode"><?php echo $pharmacy_products->Subclasscode->caption() ?></span></td>
		<td data-name="Subclasscode"<?php echo $pharmacy_products->Subclasscode->cellAttributes() ?>>
<span id="el_pharmacy_products_Subclasscode">
<span<?php echo $pharmacy_products->Subclasscode->viewAttributes() ?>>
<?php echo $pharmacy_products->Subclasscode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
	<tr id="r_BarCodeFromWeighingMachine">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BarCodeFromWeighingMachine"><?php echo $pharmacy_products->BarCodeFromWeighingMachine->caption() ?></span></td>
		<td data-name="BarCodeFromWeighingMachine"<?php echo $pharmacy_products->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeFromWeighingMachine">
<span<?php echo $pharmacy_products->BarCodeFromWeighingMachine->viewAttributes() ?>>
<?php echo $pharmacy_products->BarCodeFromWeighingMachine->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
	<tr id="r_CheckCostInReturn">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CheckCostInReturn"><?php echo $pharmacy_products->CheckCostInReturn->caption() ?></span></td>
		<td data-name="CheckCostInReturn"<?php echo $pharmacy_products->CheckCostInReturn->cellAttributes() ?>>
<span id="el_pharmacy_products_CheckCostInReturn">
<span<?php echo $pharmacy_products->CheckCostInReturn->viewAttributes() ?>>
<?php echo $pharmacy_products->CheckCostInReturn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
	<tr id="r_FrequentSaleProduct">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FrequentSaleProduct"><?php echo $pharmacy_products->FrequentSaleProduct->caption() ?></span></td>
		<td data-name="FrequentSaleProduct"<?php echo $pharmacy_products->FrequentSaleProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_FrequentSaleProduct">
<span<?php echo $pharmacy_products->FrequentSaleProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->FrequentSaleProduct->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->RateType->Visible) { // RateType ?>
	<tr id="r_RateType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RateType"><?php echo $pharmacy_products->RateType->caption() ?></span></td>
		<td data-name="RateType"<?php echo $pharmacy_products->RateType->cellAttributes() ?>>
<span id="el_pharmacy_products_RateType">
<span<?php echo $pharmacy_products->RateType->viewAttributes() ?>>
<?php echo $pharmacy_products->RateType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TouchscreenName->Visible) { // TouchscreenName ?>
	<tr id="r_TouchscreenName">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TouchscreenName"><?php echo $pharmacy_products->TouchscreenName->caption() ?></span></td>
		<td data-name="TouchscreenName"<?php echo $pharmacy_products->TouchscreenName->cellAttributes() ?>>
<span id="el_pharmacy_products_TouchscreenName">
<span<?php echo $pharmacy_products->TouchscreenName->viewAttributes() ?>>
<?php echo $pharmacy_products->TouchscreenName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FreeType->Visible) { // FreeType ?>
	<tr id="r_FreeType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeType"><?php echo $pharmacy_products->FreeType->caption() ?></span></td>
		<td data-name="FreeType"<?php echo $pharmacy_products->FreeType->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeType">
<span<?php echo $pharmacy_products->FreeType->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
	<tr id="r_LooseQtyasNewBatch">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LooseQtyasNewBatch"><?php echo $pharmacy_products->LooseQtyasNewBatch->caption() ?></span></td>
		<td data-name="LooseQtyasNewBatch"<?php echo $pharmacy_products->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_LooseQtyasNewBatch">
<span<?php echo $pharmacy_products->LooseQtyasNewBatch->viewAttributes() ?>>
<?php echo $pharmacy_products->LooseQtyasNewBatch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
	<tr id="r_AllowSlabBilling">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AllowSlabBilling"><?php echo $pharmacy_products->AllowSlabBilling->caption() ?></span></td>
		<td data-name="AllowSlabBilling"<?php echo $pharmacy_products->AllowSlabBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowSlabBilling">
<span<?php echo $pharmacy_products->AllowSlabBilling->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowSlabBilling->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
	<tr id="r_ProductTypeForProduction">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductTypeForProduction"><?php echo $pharmacy_products->ProductTypeForProduction->caption() ?></span></td>
		<td data-name="ProductTypeForProduction"<?php echo $pharmacy_products->ProductTypeForProduction->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductTypeForProduction">
<span<?php echo $pharmacy_products->ProductTypeForProduction->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductTypeForProduction->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->RecipeCode->Visible) { // RecipeCode ?>
	<tr id="r_RecipeCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RecipeCode"><?php echo $pharmacy_products->RecipeCode->caption() ?></span></td>
		<td data-name="RecipeCode"<?php echo $pharmacy_products->RecipeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RecipeCode">
<span<?php echo $pharmacy_products->RecipeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->RecipeCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DefaultUnitType->Visible) { // DefaultUnitType ?>
	<tr id="r_DefaultUnitType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultUnitType"><?php echo $pharmacy_products->DefaultUnitType->caption() ?></span></td>
		<td data-name="DefaultUnitType"<?php echo $pharmacy_products->DefaultUnitType->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultUnitType">
<span<?php echo $pharmacy_products->DefaultUnitType->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultUnitType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PIstatus->Visible) { // PIstatus ?>
	<tr id="r_PIstatus">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PIstatus"><?php echo $pharmacy_products->PIstatus->caption() ?></span></td>
		<td data-name="PIstatus"<?php echo $pharmacy_products->PIstatus->cellAttributes() ?>>
<span id="el_pharmacy_products_PIstatus">
<span<?php echo $pharmacy_products->PIstatus->viewAttributes() ?>>
<?php echo $pharmacy_products->PIstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
	<tr id="r_LastPiConfirmedDate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LastPiConfirmedDate"><?php echo $pharmacy_products->LastPiConfirmedDate->caption() ?></span></td>
		<td data-name="LastPiConfirmedDate"<?php echo $pharmacy_products->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPiConfirmedDate">
<span<?php echo $pharmacy_products->LastPiConfirmedDate->viewAttributes() ?>>
<?php echo $pharmacy_products->LastPiConfirmedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDesign->Visible) { // BarCodeDesign ?>
	<tr id="r_BarCodeDesign">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BarCodeDesign"><?php echo $pharmacy_products->BarCodeDesign->caption() ?></span></td>
		<td data-name="BarCodeDesign"<?php echo $pharmacy_products->BarCodeDesign->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDesign">
<span<?php echo $pharmacy_products->BarCodeDesign->viewAttributes() ?>>
<?php echo $pharmacy_products->BarCodeDesign->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
	<tr id="r_AcceptRemarksInBill">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptRemarksInBill"><?php echo $pharmacy_products->AcceptRemarksInBill->caption() ?></span></td>
		<td data-name="AcceptRemarksInBill"<?php echo $pharmacy_products->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRemarksInBill">
<span<?php echo $pharmacy_products->AcceptRemarksInBill->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptRemarksInBill->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Classification->Visible) { // Classification ?>
	<tr id="r_Classification">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Classification"><?php echo $pharmacy_products->Classification->caption() ?></span></td>
		<td data-name="Classification"<?php echo $pharmacy_products->Classification->cellAttributes() ?>>
<span id="el_pharmacy_products_Classification">
<span<?php echo $pharmacy_products->Classification->viewAttributes() ?>>
<?php echo $pharmacy_products->Classification->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TimeSlot->Visible) { // TimeSlot ?>
	<tr id="r_TimeSlot">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TimeSlot"><?php echo $pharmacy_products->TimeSlot->caption() ?></span></td>
		<td data-name="TimeSlot"<?php echo $pharmacy_products->TimeSlot->cellAttributes() ?>>
<span id="el_pharmacy_products_TimeSlot">
<span<?php echo $pharmacy_products->TimeSlot->viewAttributes() ?>>
<?php echo $pharmacy_products->TimeSlot->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IsBundle->Visible) { // IsBundle ?>
	<tr id="r_IsBundle">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsBundle"><?php echo $pharmacy_products->IsBundle->caption() ?></span></td>
		<td data-name="IsBundle"<?php echo $pharmacy_products->IsBundle->cellAttributes() ?>>
<span id="el_pharmacy_products_IsBundle">
<span<?php echo $pharmacy_products->IsBundle->viewAttributes() ?>>
<?php echo $pharmacy_products->IsBundle->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ColorCode->Visible) { // ColorCode ?>
	<tr id="r_ColorCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ColorCode"><?php echo $pharmacy_products->ColorCode->caption() ?></span></td>
		<td data-name="ColorCode"<?php echo $pharmacy_products->ColorCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ColorCode">
<span<?php echo $pharmacy_products->ColorCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ColorCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->GenderCode->Visible) { // GenderCode ?>
	<tr id="r_GenderCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GenderCode"><?php echo $pharmacy_products->GenderCode->caption() ?></span></td>
		<td data-name="GenderCode"<?php echo $pharmacy_products->GenderCode->cellAttributes() ?>>
<span id="el_pharmacy_products_GenderCode">
<span<?php echo $pharmacy_products->GenderCode->viewAttributes() ?>>
<?php echo $pharmacy_products->GenderCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SizeCode->Visible) { // SizeCode ?>
	<tr id="r_SizeCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SizeCode"><?php echo $pharmacy_products->SizeCode->caption() ?></span></td>
		<td data-name="SizeCode"<?php echo $pharmacy_products->SizeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SizeCode">
<span<?php echo $pharmacy_products->SizeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->SizeCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->GiftCard->Visible) { // GiftCard ?>
	<tr id="r_GiftCard">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GiftCard"><?php echo $pharmacy_products->GiftCard->caption() ?></span></td>
		<td data-name="GiftCard"<?php echo $pharmacy_products->GiftCard->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftCard">
<span<?php echo $pharmacy_products->GiftCard->viewAttributes() ?>>
<?php echo $pharmacy_products->GiftCard->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ToonLabel->Visible) { // ToonLabel ?>
	<tr id="r_ToonLabel">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ToonLabel"><?php echo $pharmacy_products->ToonLabel->caption() ?></span></td>
		<td data-name="ToonLabel"<?php echo $pharmacy_products->ToonLabel->cellAttributes() ?>>
<span id="el_pharmacy_products_ToonLabel">
<span<?php echo $pharmacy_products->ToonLabel->viewAttributes() ?>>
<?php echo $pharmacy_products->ToonLabel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->GarmentType->Visible) { // GarmentType ?>
	<tr id="r_GarmentType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_GarmentType"><?php echo $pharmacy_products->GarmentType->caption() ?></span></td>
		<td data-name="GarmentType"<?php echo $pharmacy_products->GarmentType->cellAttributes() ?>>
<span id="el_pharmacy_products_GarmentType">
<span<?php echo $pharmacy_products->GarmentType->viewAttributes() ?>>
<?php echo $pharmacy_products->GarmentType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AgeGroup->Visible) { // AgeGroup ?>
	<tr id="r_AgeGroup">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AgeGroup"><?php echo $pharmacy_products->AgeGroup->caption() ?></span></td>
		<td data-name="AgeGroup"<?php echo $pharmacy_products->AgeGroup->cellAttributes() ?>>
<span id="el_pharmacy_products_AgeGroup">
<span<?php echo $pharmacy_products->AgeGroup->viewAttributes() ?>>
<?php echo $pharmacy_products->AgeGroup->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Season->Visible) { // Season ?>
	<tr id="r_Season">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Season"><?php echo $pharmacy_products->Season->caption() ?></span></td>
		<td data-name="Season"<?php echo $pharmacy_products->Season->cellAttributes() ?>>
<span id="el_pharmacy_products_Season">
<span<?php echo $pharmacy_products->Season->viewAttributes() ?>>
<?php echo $pharmacy_products->Season->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DailyStockEntry->Visible) { // DailyStockEntry ?>
	<tr id="r_DailyStockEntry">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DailyStockEntry"><?php echo $pharmacy_products->DailyStockEntry->caption() ?></span></td>
		<td data-name="DailyStockEntry"<?php echo $pharmacy_products->DailyStockEntry->cellAttributes() ?>>
<span id="el_pharmacy_products_DailyStockEntry">
<span<?php echo $pharmacy_products->DailyStockEntry->viewAttributes() ?>>
<?php echo $pharmacy_products->DailyStockEntry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ModifierApplicable->Visible) { // ModifierApplicable ?>
	<tr id="r_ModifierApplicable">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifierApplicable"><?php echo $pharmacy_products->ModifierApplicable->caption() ?></span></td>
		<td data-name="ModifierApplicable"<?php echo $pharmacy_products->ModifierApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierApplicable">
<span<?php echo $pharmacy_products->ModifierApplicable->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifierApplicable->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ModifierType->Visible) { // ModifierType ?>
	<tr id="r_ModifierType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ModifierType"><?php echo $pharmacy_products->ModifierType->caption() ?></span></td>
		<td data-name="ModifierType"<?php echo $pharmacy_products->ModifierType->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierType">
<span<?php echo $pharmacy_products->ModifierType->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifierType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
	<tr id="r_AcceptZeroRate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptZeroRate"><?php echo $pharmacy_products->AcceptZeroRate->caption() ?></span></td>
		<td data-name="AcceptZeroRate"<?php echo $pharmacy_products->AcceptZeroRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptZeroRate">
<span<?php echo $pharmacy_products->AcceptZeroRate->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptZeroRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
	<tr id="r_ExciseDutyCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExciseDutyCode"><?php echo $pharmacy_products->ExciseDutyCode->caption() ?></span></td>
		<td data-name="ExciseDutyCode"<?php echo $pharmacy_products->ExciseDutyCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ExciseDutyCode">
<span<?php echo $pharmacy_products->ExciseDutyCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ExciseDutyCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
	<tr id="r_IndentProductGroupCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IndentProductGroupCode"><?php echo $pharmacy_products->IndentProductGroupCode->caption() ?></span></td>
		<td data-name="IndentProductGroupCode"<?php echo $pharmacy_products->IndentProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_IndentProductGroupCode">
<span<?php echo $pharmacy_products->IndentProductGroupCode->viewAttributes() ?>>
<?php echo $pharmacy_products->IndentProductGroupCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IsMultiBatch->Visible) { // IsMultiBatch ?>
	<tr id="r_IsMultiBatch">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsMultiBatch"><?php echo $pharmacy_products->IsMultiBatch->caption() ?></span></td>
		<td data-name="IsMultiBatch"<?php echo $pharmacy_products->IsMultiBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMultiBatch">
<span<?php echo $pharmacy_products->IsMultiBatch->viewAttributes() ?>>
<?php echo $pharmacy_products->IsMultiBatch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IsSingleBatch->Visible) { // IsSingleBatch ?>
	<tr id="r_IsSingleBatch">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsSingleBatch"><?php echo $pharmacy_products->IsSingleBatch->caption() ?></span></td>
		<td data-name="IsSingleBatch"<?php echo $pharmacy_products->IsSingleBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsSingleBatch">
<span<?php echo $pharmacy_products->IsSingleBatch->viewAttributes() ?>>
<?php echo $pharmacy_products->IsSingleBatch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate1->Visible) { // MarkUpRate1 ?>
	<tr id="r_MarkUpRate1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkUpRate1"><?php echo $pharmacy_products->MarkUpRate1->caption() ?></span></td>
		<td data-name="MarkUpRate1"<?php echo $pharmacy_products->MarkUpRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate1">
<span<?php echo $pharmacy_products->MarkUpRate1->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkUpRate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate1->Visible) { // MarkDownRate1 ?>
	<tr id="r_MarkDownRate1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkDownRate1"><?php echo $pharmacy_products->MarkDownRate1->caption() ?></span></td>
		<td data-name="MarkDownRate1"<?php echo $pharmacy_products->MarkDownRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate1">
<span<?php echo $pharmacy_products->MarkDownRate1->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkDownRate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate2->Visible) { // MarkUpRate2 ?>
	<tr id="r_MarkUpRate2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkUpRate2"><?php echo $pharmacy_products->MarkUpRate2->caption() ?></span></td>
		<td data-name="MarkUpRate2"<?php echo $pharmacy_products->MarkUpRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate2">
<span<?php echo $pharmacy_products->MarkUpRate2->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkUpRate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate2->Visible) { // MarkDownRate2 ?>
	<tr id="r_MarkDownRate2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarkDownRate2"><?php echo $pharmacy_products->MarkDownRate2->caption() ?></span></td>
		<td data-name="MarkDownRate2"<?php echo $pharmacy_products->MarkDownRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate2">
<span<?php echo $pharmacy_products->MarkDownRate2->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkDownRate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->_Yield->Visible) { // Yield ?>
	<tr id="r__Yield">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products__Yield"><?php echo $pharmacy_products->_Yield->caption() ?></span></td>
		<td data-name="_Yield"<?php echo $pharmacy_products->_Yield->cellAttributes() ?>>
<span id="el_pharmacy_products__Yield">
<span<?php echo $pharmacy_products->_Yield->viewAttributes() ?>>
<?php echo $pharmacy_products->_Yield->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->RefProductCode->Visible) { // RefProductCode ?>
	<tr id="r_RefProductCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_RefProductCode"><?php echo $pharmacy_products->RefProductCode->caption() ?></span></td>
		<td data-name="RefProductCode"<?php echo $pharmacy_products->RefProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RefProductCode">
<span<?php echo $pharmacy_products->RefProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->RefProductCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Volume->Visible) { // Volume ?>
	<tr id="r_Volume">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Volume"><?php echo $pharmacy_products->Volume->caption() ?></span></td>
		<td data-name="Volume"<?php echo $pharmacy_products->Volume->cellAttributes() ?>>
<span id="el_pharmacy_products_Volume">
<span<?php echo $pharmacy_products->Volume->viewAttributes() ?>>
<?php echo $pharmacy_products->Volume->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MeasurementID->Visible) { // MeasurementID ?>
	<tr id="r_MeasurementID">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MeasurementID"><?php echo $pharmacy_products->MeasurementID->caption() ?></span></td>
		<td data-name="MeasurementID"<?php echo $pharmacy_products->MeasurementID->cellAttributes() ?>>
<span id="el_pharmacy_products_MeasurementID">
<span<?php echo $pharmacy_products->MeasurementID->viewAttributes() ?>>
<?php echo $pharmacy_products->MeasurementID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CountryCode->Visible) { // CountryCode ?>
	<tr id="r_CountryCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CountryCode"><?php echo $pharmacy_products->CountryCode->caption() ?></span></td>
		<td data-name="CountryCode"<?php echo $pharmacy_products->CountryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CountryCode">
<span<?php echo $pharmacy_products->CountryCode->viewAttributes() ?>>
<?php echo $pharmacy_products->CountryCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AcceptWMQty->Visible) { // AcceptWMQty ?>
	<tr id="r_AcceptWMQty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AcceptWMQty"><?php echo $pharmacy_products->AcceptWMQty->caption() ?></span></td>
		<td data-name="AcceptWMQty"<?php echo $pharmacy_products->AcceptWMQty->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptWMQty">
<span<?php echo $pharmacy_products->AcceptWMQty->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptWMQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
	<tr id="r_SingleBatchBasedOnRate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SingleBatchBasedOnRate"><?php echo $pharmacy_products->SingleBatchBasedOnRate->caption() ?></span></td>
		<td data-name="SingleBatchBasedOnRate"<?php echo $pharmacy_products->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBatchBasedOnRate">
<span<?php echo $pharmacy_products->SingleBatchBasedOnRate->viewAttributes() ?>>
<?php echo $pharmacy_products->SingleBatchBasedOnRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TenderNo->Visible) { // TenderNo ?>
	<tr id="r_TenderNo">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TenderNo"><?php echo $pharmacy_products->TenderNo->caption() ?></span></td>
		<td data-name="TenderNo"<?php echo $pharmacy_products->TenderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TenderNo">
<span<?php echo $pharmacy_products->TenderNo->viewAttributes() ?>>
<?php echo $pharmacy_products->TenderNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
	<tr id="r_SingleBillMaximumSoldQtyFiled">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled"><?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->caption() ?></span></td>
		<td data-name="SingleBillMaximumSoldQtyFiled"<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBillMaximumSoldQtyFiled">
<span<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->viewAttributes() ?>>
<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Strength1->Visible) { // Strength1 ?>
	<tr id="r_Strength1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength1"><?php echo $pharmacy_products->Strength1->caption() ?></span></td>
		<td data-name="Strength1"<?php echo $pharmacy_products->Strength1->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength1">
<span<?php echo $pharmacy_products->Strength1->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Strength2->Visible) { // Strength2 ?>
	<tr id="r_Strength2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength2"><?php echo $pharmacy_products->Strength2->caption() ?></span></td>
		<td data-name="Strength2"<?php echo $pharmacy_products->Strength2->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength2">
<span<?php echo $pharmacy_products->Strength2->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Strength3->Visible) { // Strength3 ?>
	<tr id="r_Strength3">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength3"><?php echo $pharmacy_products->Strength3->caption() ?></span></td>
		<td data-name="Strength3"<?php echo $pharmacy_products->Strength3->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength3">
<span<?php echo $pharmacy_products->Strength3->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Strength4->Visible) { // Strength4 ?>
	<tr id="r_Strength4">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength4"><?php echo $pharmacy_products->Strength4->caption() ?></span></td>
		<td data-name="Strength4"<?php echo $pharmacy_products->Strength4->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength4">
<span<?php echo $pharmacy_products->Strength4->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->Strength5->Visible) { // Strength5 ?>
	<tr id="r_Strength5">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_Strength5"><?php echo $pharmacy_products->Strength5->caption() ?></span></td>
		<td data-name="Strength5"<?php echo $pharmacy_products->Strength5->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength5">
<span<?php echo $pharmacy_products->Strength5->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode1->Visible) { // IngredientCode1 ?>
	<tr id="r_IngredientCode1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode1"><?php echo $pharmacy_products->IngredientCode1->caption() ?></span></td>
		<td data-name="IngredientCode1"<?php echo $pharmacy_products->IngredientCode1->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode1">
<span<?php echo $pharmacy_products->IngredientCode1->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode2->Visible) { // IngredientCode2 ?>
	<tr id="r_IngredientCode2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode2"><?php echo $pharmacy_products->IngredientCode2->caption() ?></span></td>
		<td data-name="IngredientCode2"<?php echo $pharmacy_products->IngredientCode2->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode2">
<span<?php echo $pharmacy_products->IngredientCode2->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode3->Visible) { // IngredientCode3 ?>
	<tr id="r_IngredientCode3">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode3"><?php echo $pharmacy_products->IngredientCode3->caption() ?></span></td>
		<td data-name="IngredientCode3"<?php echo $pharmacy_products->IngredientCode3->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode3">
<span<?php echo $pharmacy_products->IngredientCode3->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode4->Visible) { // IngredientCode4 ?>
	<tr id="r_IngredientCode4">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode4"><?php echo $pharmacy_products->IngredientCode4->caption() ?></span></td>
		<td data-name="IngredientCode4"<?php echo $pharmacy_products->IngredientCode4->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode4">
<span<?php echo $pharmacy_products->IngredientCode4->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode5->Visible) { // IngredientCode5 ?>
	<tr id="r_IngredientCode5">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IngredientCode5"><?php echo $pharmacy_products->IngredientCode5->caption() ?></span></td>
		<td data-name="IngredientCode5"<?php echo $pharmacy_products->IngredientCode5->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode5">
<span<?php echo $pharmacy_products->IngredientCode5->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->OrderType->Visible) { // OrderType ?>
	<tr id="r_OrderType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_OrderType"><?php echo $pharmacy_products->OrderType->caption() ?></span></td>
		<td data-name="OrderType"<?php echo $pharmacy_products->OrderType->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderType">
<span<?php echo $pharmacy_products->OrderType->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->StockUOM->Visible) { // StockUOM ?>
	<tr id="r_StockUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockUOM"><?php echo $pharmacy_products->StockUOM->caption() ?></span></td>
		<td data-name="StockUOM"<?php echo $pharmacy_products->StockUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_StockUOM">
<span<?php echo $pharmacy_products->StockUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->StockUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PriceUOM->Visible) { // PriceUOM ?>
	<tr id="r_PriceUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PriceUOM"><?php echo $pharmacy_products->PriceUOM->caption() ?></span></td>
		<td data-name="PriceUOM"<?php echo $pharmacy_products->PriceUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceUOM">
<span<?php echo $pharmacy_products->PriceUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->PriceUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
	<tr id="r_DefaultSaleUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultSaleUOM"><?php echo $pharmacy_products->DefaultSaleUOM->caption() ?></span></td>
		<td data-name="DefaultSaleUOM"<?php echo $pharmacy_products->DefaultSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultSaleUOM">
<span<?php echo $pharmacy_products->DefaultSaleUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultSaleUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
	<tr id="r_DefaultPurchaseUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultPurchaseUOM"><?php echo $pharmacy_products->DefaultPurchaseUOM->caption() ?></span></td>
		<td data-name="DefaultPurchaseUOM"<?php echo $pharmacy_products->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultPurchaseUOM">
<span<?php echo $pharmacy_products->DefaultPurchaseUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultPurchaseUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ReportingUOM->Visible) { // ReportingUOM ?>
	<tr id="r_ReportingUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ReportingUOM"><?php echo $pharmacy_products->ReportingUOM->caption() ?></span></td>
		<td data-name="ReportingUOM"<?php echo $pharmacy_products->ReportingUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_ReportingUOM">
<span<?php echo $pharmacy_products->ReportingUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->ReportingUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
	<tr id="r_LastPurchasedUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LastPurchasedUOM"><?php echo $pharmacy_products->LastPurchasedUOM->caption() ?></span></td>
		<td data-name="LastPurchasedUOM"<?php echo $pharmacy_products->LastPurchasedUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPurchasedUOM">
<span<?php echo $pharmacy_products->LastPurchasedUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->LastPurchasedUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TreatmentCodes->Visible) { // TreatmentCodes ?>
	<tr id="r_TreatmentCodes">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TreatmentCodes"><?php echo $pharmacy_products->TreatmentCodes->caption() ?></span></td>
		<td data-name="TreatmentCodes"<?php echo $pharmacy_products->TreatmentCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_TreatmentCodes">
<span<?php echo $pharmacy_products->TreatmentCodes->viewAttributes() ?>>
<?php echo $pharmacy_products->TreatmentCodes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->InsuranceType->Visible) { // InsuranceType ?>
	<tr id="r_InsuranceType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_InsuranceType"><?php echo $pharmacy_products->InsuranceType->caption() ?></span></td>
		<td data-name="InsuranceType"<?php echo $pharmacy_products->InsuranceType->cellAttributes() ?>>
<span id="el_pharmacy_products_InsuranceType">
<span<?php echo $pharmacy_products->InsuranceType->viewAttributes() ?>>
<?php echo $pharmacy_products->InsuranceType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
	<tr id="r_CoverageGroupCodes">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_CoverageGroupCodes"><?php echo $pharmacy_products->CoverageGroupCodes->caption() ?></span></td>
		<td data-name="CoverageGroupCodes"<?php echo $pharmacy_products->CoverageGroupCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_CoverageGroupCodes">
<span<?php echo $pharmacy_products->CoverageGroupCodes->viewAttributes() ?>>
<?php echo $pharmacy_products->CoverageGroupCodes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MultipleUOM->Visible) { // MultipleUOM ?>
	<tr id="r_MultipleUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MultipleUOM"><?php echo $pharmacy_products->MultipleUOM->caption() ?></span></td>
		<td data-name="MultipleUOM"<?php echo $pharmacy_products->MultipleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleUOM">
<span<?php echo $pharmacy_products->MultipleUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->MultipleUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SalePriceComputation->Visible) { // SalePriceComputation ?>
	<tr id="r_SalePriceComputation">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalePriceComputation"><?php echo $pharmacy_products->SalePriceComputation->caption() ?></span></td>
		<td data-name="SalePriceComputation"<?php echo $pharmacy_products->SalePriceComputation->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePriceComputation">
<span<?php echo $pharmacy_products->SalePriceComputation->viewAttributes() ?>>
<?php echo $pharmacy_products->SalePriceComputation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->StockCorrection->Visible) { // StockCorrection ?>
	<tr id="r_StockCorrection">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_StockCorrection"><?php echo $pharmacy_products->StockCorrection->caption() ?></span></td>
		<td data-name="StockCorrection"<?php echo $pharmacy_products->StockCorrection->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCorrection">
<span<?php echo $pharmacy_products->StockCorrection->viewAttributes() ?>>
<?php echo $pharmacy_products->StockCorrection->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LBTPercentage->Visible) { // LBTPercentage ?>
	<tr id="r_LBTPercentage">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LBTPercentage"><?php echo $pharmacy_products->LBTPercentage->caption() ?></span></td>
		<td data-name="LBTPercentage"<?php echo $pharmacy_products->LBTPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_LBTPercentage">
<span<?php echo $pharmacy_products->LBTPercentage->viewAttributes() ?>>
<?php echo $pharmacy_products->LBTPercentage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->SalesCommission->Visible) { // SalesCommission ?>
	<tr id="r_SalesCommission">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_SalesCommission"><?php echo $pharmacy_products->SalesCommission->caption() ?></span></td>
		<td data-name="SalesCommission"<?php echo $pharmacy_products->SalesCommission->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesCommission">
<span<?php echo $pharmacy_products->SalesCommission->viewAttributes() ?>>
<?php echo $pharmacy_products->SalesCommission->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LockedStock->Visible) { // LockedStock ?>
	<tr id="r_LockedStock">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LockedStock"><?php echo $pharmacy_products->LockedStock->caption() ?></span></td>
		<td data-name="LockedStock"<?php echo $pharmacy_products->LockedStock->cellAttributes() ?>>
<span id="el_pharmacy_products_LockedStock">
<span<?php echo $pharmacy_products->LockedStock->viewAttributes() ?>>
<?php echo $pharmacy_products->LockedStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MinMaxUOM->Visible) { // MinMaxUOM ?>
	<tr id="r_MinMaxUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinMaxUOM"><?php echo $pharmacy_products->MinMaxUOM->caption() ?></span></td>
		<td data-name="MinMaxUOM"<?php echo $pharmacy_products->MinMaxUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxUOM">
<span<?php echo $pharmacy_products->MinMaxUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->MinMaxUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
	<tr id="r_ExpiryMfrDateFormat">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ExpiryMfrDateFormat"><?php echo $pharmacy_products->ExpiryMfrDateFormat->caption() ?></span></td>
		<td data-name="ExpiryMfrDateFormat"<?php echo $pharmacy_products->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryMfrDateFormat">
<span<?php echo $pharmacy_products->ExpiryMfrDateFormat->viewAttributes() ?>>
<?php echo $pharmacy_products->ExpiryMfrDateFormat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ProductLifeTime->Visible) { // ProductLifeTime ?>
	<tr id="r_ProductLifeTime">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ProductLifeTime"><?php echo $pharmacy_products->ProductLifeTime->caption() ?></span></td>
		<td data-name="ProductLifeTime"<?php echo $pharmacy_products->ProductLifeTime->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLifeTime">
<span<?php echo $pharmacy_products->ProductLifeTime->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductLifeTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IsCombo->Visible) { // IsCombo ?>
	<tr id="r_IsCombo">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsCombo"><?php echo $pharmacy_products->IsCombo->caption() ?></span></td>
		<td data-name="IsCombo"<?php echo $pharmacy_products->IsCombo->cellAttributes() ?>>
<span id="el_pharmacy_products_IsCombo">
<span<?php echo $pharmacy_products->IsCombo->viewAttributes() ?>>
<?php echo $pharmacy_products->IsCombo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ComboTypeCode->Visible) { // ComboTypeCode ?>
	<tr id="r_ComboTypeCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComboTypeCode"><?php echo $pharmacy_products->ComboTypeCode->caption() ?></span></td>
		<td data-name="ComboTypeCode"<?php echo $pharmacy_products->ComboTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ComboTypeCode">
<span<?php echo $pharmacy_products->ComboTypeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ComboTypeCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount6->Visible) { // AttributeCount6 ?>
	<tr id="r_AttributeCount6">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount6"><?php echo $pharmacy_products->AttributeCount6->caption() ?></span></td>
		<td data-name="AttributeCount6"<?php echo $pharmacy_products->AttributeCount6->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount6">
<span<?php echo $pharmacy_products->AttributeCount6->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount6->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount7->Visible) { // AttributeCount7 ?>
	<tr id="r_AttributeCount7">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount7"><?php echo $pharmacy_products->AttributeCount7->caption() ?></span></td>
		<td data-name="AttributeCount7"<?php echo $pharmacy_products->AttributeCount7->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount7">
<span<?php echo $pharmacy_products->AttributeCount7->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount7->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount8->Visible) { // AttributeCount8 ?>
	<tr id="r_AttributeCount8">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount8"><?php echo $pharmacy_products->AttributeCount8->caption() ?></span></td>
		<td data-name="AttributeCount8"<?php echo $pharmacy_products->AttributeCount8->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount8">
<span<?php echo $pharmacy_products->AttributeCount8->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount8->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount9->Visible) { // AttributeCount9 ?>
	<tr id="r_AttributeCount9">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount9"><?php echo $pharmacy_products->AttributeCount9->caption() ?></span></td>
		<td data-name="AttributeCount9"<?php echo $pharmacy_products->AttributeCount9->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount9">
<span<?php echo $pharmacy_products->AttributeCount9->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount9->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount10->Visible) { // AttributeCount10 ?>
	<tr id="r_AttributeCount10">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AttributeCount10"><?php echo $pharmacy_products->AttributeCount10->caption() ?></span></td>
		<td data-name="AttributeCount10"<?php echo $pharmacy_products->AttributeCount10->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount10">
<span<?php echo $pharmacy_products->AttributeCount10->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount10->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LabourCharge->Visible) { // LabourCharge ?>
	<tr id="r_LabourCharge">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LabourCharge"><?php echo $pharmacy_products->LabourCharge->caption() ?></span></td>
		<td data-name="LabourCharge"<?php echo $pharmacy_products->LabourCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_LabourCharge">
<span<?php echo $pharmacy_products->LabourCharge->viewAttributes() ?>>
<?php echo $pharmacy_products->LabourCharge->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
	<tr id="r_AffectOtherCharge">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AffectOtherCharge"><?php echo $pharmacy_products->AffectOtherCharge->caption() ?></span></td>
		<td data-name="AffectOtherCharge"<?php echo $pharmacy_products->AffectOtherCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_AffectOtherCharge">
<span<?php echo $pharmacy_products->AffectOtherCharge->viewAttributes() ?>>
<?php echo $pharmacy_products->AffectOtherCharge->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DosageInfo->Visible) { // DosageInfo ?>
	<tr id="r_DosageInfo">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DosageInfo"><?php echo $pharmacy_products->DosageInfo->caption() ?></span></td>
		<td data-name="DosageInfo"<?php echo $pharmacy_products->DosageInfo->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageInfo">
<span<?php echo $pharmacy_products->DosageInfo->viewAttributes() ?>>
<?php echo $pharmacy_products->DosageInfo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DosageType->Visible) { // DosageType ?>
	<tr id="r_DosageType">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DosageType"><?php echo $pharmacy_products->DosageType->caption() ?></span></td>
		<td data-name="DosageType"<?php echo $pharmacy_products->DosageType->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageType">
<span<?php echo $pharmacy_products->DosageType->viewAttributes() ?>>
<?php echo $pharmacy_products->DosageType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
	<tr id="r_DefaultIndentUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_DefaultIndentUOM"><?php echo $pharmacy_products->DefaultIndentUOM->caption() ?></span></td>
		<td data-name="DefaultIndentUOM"<?php echo $pharmacy_products->DefaultIndentUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultIndentUOM">
<span<?php echo $pharmacy_products->DefaultIndentUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultIndentUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PromoTag->Visible) { // PromoTag ?>
	<tr id="r_PromoTag">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PromoTag"><?php echo $pharmacy_products->PromoTag->caption() ?></span></td>
		<td data-name="PromoTag"<?php echo $pharmacy_products->PromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_PromoTag">
<span<?php echo $pharmacy_products->PromoTag->viewAttributes() ?>>
<?php echo $pharmacy_products->PromoTag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
	<tr id="r_BillLevelPromoTag">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_BillLevelPromoTag"><?php echo $pharmacy_products->BillLevelPromoTag->caption() ?></span></td>
		<td data-name="BillLevelPromoTag"<?php echo $pharmacy_products->BillLevelPromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_BillLevelPromoTag">
<span<?php echo $pharmacy_products->BillLevelPromoTag->viewAttributes() ?>>
<?php echo $pharmacy_products->BillLevelPromoTag->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->IsMRPProduct->Visible) { // IsMRPProduct ?>
	<tr id="r_IsMRPProduct">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_IsMRPProduct"><?php echo $pharmacy_products->IsMRPProduct->caption() ?></span></td>
		<td data-name="IsMRPProduct"<?php echo $pharmacy_products->IsMRPProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMRPProduct">
<span<?php echo $pharmacy_products->IsMRPProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->IsMRPProduct->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MrpList->Visible) { // MrpList ?>
	<tr id="r_MrpList">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MrpList"><?php echo $pharmacy_products->MrpList->caption() ?></span></td>
		<td data-name="MrpList"<?php echo $pharmacy_products->MrpList->cellAttributes() ?>>
<span id="el_pharmacy_products_MrpList">
<span<?php echo $pharmacy_products->MrpList->viewAttributes() ?>>
<?php echo $pharmacy_products->MrpList->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
	<tr id="r_AlternateSaleUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AlternateSaleUOM"><?php echo $pharmacy_products->AlternateSaleUOM->caption() ?></span></td>
		<td data-name="AlternateSaleUOM"<?php echo $pharmacy_products->AlternateSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSaleUOM">
<span<?php echo $pharmacy_products->AlternateSaleUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->AlternateSaleUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FreeUOM->Visible) { // FreeUOM ?>
	<tr id="r_FreeUOM">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FreeUOM"><?php echo $pharmacy_products->FreeUOM->caption() ?></span></td>
		<td data-name="FreeUOM"<?php echo $pharmacy_products->FreeUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeUOM">
<span<?php echo $pharmacy_products->FreeUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeUOM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MarketedCode->Visible) { // MarketedCode ?>
	<tr id="r_MarketedCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MarketedCode"><?php echo $pharmacy_products->MarketedCode->caption() ?></span></td>
		<td data-name="MarketedCode"<?php echo $pharmacy_products->MarketedCode->cellAttributes() ?>>
<span id="el_pharmacy_products_MarketedCode">
<span<?php echo $pharmacy_products->MarketedCode->viewAttributes() ?>>
<?php echo $pharmacy_products->MarketedCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
	<tr id="r_MinimumSalePrice">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_MinimumSalePrice"><?php echo $pharmacy_products->MinimumSalePrice->caption() ?></span></td>
		<td data-name="MinimumSalePrice"<?php echo $pharmacy_products->MinimumSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumSalePrice">
<span<?php echo $pharmacy_products->MinimumSalePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->MinimumSalePrice->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PRate1->Visible) { // PRate1 ?>
	<tr id="r_PRate1">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PRate1"><?php echo $pharmacy_products->PRate1->caption() ?></span></td>
		<td data-name="PRate1"<?php echo $pharmacy_products->PRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate1">
<span<?php echo $pharmacy_products->PRate1->viewAttributes() ?>>
<?php echo $pharmacy_products->PRate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->PRate2->Visible) { // PRate2 ?>
	<tr id="r_PRate2">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_PRate2"><?php echo $pharmacy_products->PRate2->caption() ?></span></td>
		<td data-name="PRate2"<?php echo $pharmacy_products->PRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate2">
<span<?php echo $pharmacy_products->PRate2->viewAttributes() ?>>
<?php echo $pharmacy_products->PRate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->LPItemCost->Visible) { // LPItemCost ?>
	<tr id="r_LPItemCost">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_LPItemCost"><?php echo $pharmacy_products->LPItemCost->caption() ?></span></td>
		<td data-name="LPItemCost"<?php echo $pharmacy_products->LPItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_LPItemCost">
<span<?php echo $pharmacy_products->LPItemCost->viewAttributes() ?>>
<?php echo $pharmacy_products->LPItemCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->FixedItemCost->Visible) { // FixedItemCost ?>
	<tr id="r_FixedItemCost">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_FixedItemCost"><?php echo $pharmacy_products->FixedItemCost->caption() ?></span></td>
		<td data-name="FixedItemCost"<?php echo $pharmacy_products->FixedItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_FixedItemCost">
<span<?php echo $pharmacy_products->FixedItemCost->viewAttributes() ?>>
<?php echo $pharmacy_products->FixedItemCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->HSNId->Visible) { // HSNId ?>
	<tr id="r_HSNId">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_HSNId"><?php echo $pharmacy_products->HSNId->caption() ?></span></td>
		<td data-name="HSNId"<?php echo $pharmacy_products->HSNId->cellAttributes() ?>>
<span id="el_pharmacy_products_HSNId">
<span<?php echo $pharmacy_products->HSNId->viewAttributes() ?>>
<?php echo $pharmacy_products->HSNId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->TaxInclusive->Visible) { // TaxInclusive ?>
	<tr id="r_TaxInclusive">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_TaxInclusive"><?php echo $pharmacy_products->TaxInclusive->caption() ?></span></td>
		<td data-name="TaxInclusive"<?php echo $pharmacy_products->TaxInclusive->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxInclusive">
<span<?php echo $pharmacy_products->TaxInclusive->viewAttributes() ?>>
<?php echo $pharmacy_products->TaxInclusive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
	<tr id="r_EligibleforWarranty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_EligibleforWarranty"><?php echo $pharmacy_products->EligibleforWarranty->caption() ?></span></td>
		<td data-name="EligibleforWarranty"<?php echo $pharmacy_products->EligibleforWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_EligibleforWarranty">
<span<?php echo $pharmacy_products->EligibleforWarranty->viewAttributes() ?>>
<?php echo $pharmacy_products->EligibleforWarranty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
	<tr id="r_NoofMonthsWarranty">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_NoofMonthsWarranty"><?php echo $pharmacy_products->NoofMonthsWarranty->caption() ?></span></td>
		<td data-name="NoofMonthsWarranty"<?php echo $pharmacy_products->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_NoofMonthsWarranty">
<span<?php echo $pharmacy_products->NoofMonthsWarranty->viewAttributes() ?>>
<?php echo $pharmacy_products->NoofMonthsWarranty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
	<tr id="r_ComputeTaxonCost">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_ComputeTaxonCost"><?php echo $pharmacy_products->ComputeTaxonCost->caption() ?></span></td>
		<td data-name="ComputeTaxonCost"<?php echo $pharmacy_products->ComputeTaxonCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputeTaxonCost">
<span<?php echo $pharmacy_products->ComputeTaxonCost->viewAttributes() ?>>
<?php echo $pharmacy_products->ComputeTaxonCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
	<tr id="r_HasEmptyBottleTrack">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_HasEmptyBottleTrack"><?php echo $pharmacy_products->HasEmptyBottleTrack->caption() ?></span></td>
		<td data-name="HasEmptyBottleTrack"<?php echo $pharmacy_products->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el_pharmacy_products_HasEmptyBottleTrack">
<span<?php echo $pharmacy_products->HasEmptyBottleTrack->viewAttributes() ?>>
<?php echo $pharmacy_products->HasEmptyBottleTrack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
	<tr id="r_EmptyBottleReferenceCode">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_EmptyBottleReferenceCode"><?php echo $pharmacy_products->EmptyBottleReferenceCode->caption() ?></span></td>
		<td data-name="EmptyBottleReferenceCode"<?php echo $pharmacy_products->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleReferenceCode">
<span<?php echo $pharmacy_products->EmptyBottleReferenceCode->viewAttributes() ?>>
<?php echo $pharmacy_products->EmptyBottleReferenceCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
	<tr id="r_AdditionalCESSAmount">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_AdditionalCESSAmount"><?php echo $pharmacy_products->AdditionalCESSAmount->caption() ?></span></td>
		<td data-name="AdditionalCESSAmount"<?php echo $pharmacy_products->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_AdditionalCESSAmount">
<span<?php echo $pharmacy_products->AdditionalCESSAmount->viewAttributes() ?>>
<?php echo $pharmacy_products->AdditionalCESSAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
	<tr id="r_EmptyBottleRate">
		<td class="<?php echo $pharmacy_products_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_products_EmptyBottleRate"><?php echo $pharmacy_products->EmptyBottleRate->caption() ?></span></td>
		<td data-name="EmptyBottleRate"<?php echo $pharmacy_products->EmptyBottleRate->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleRate">
<span<?php echo $pharmacy_products->EmptyBottleRate->viewAttributes() ?>>
<?php echo $pharmacy_products->EmptyBottleRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_products_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_products->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_products_view->terminate();
?>
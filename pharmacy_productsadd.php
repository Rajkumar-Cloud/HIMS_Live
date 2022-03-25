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
$pharmacy_products_add = new pharmacy_products_add();

// Run the page
$pharmacy_products_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_products_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpharmacy_productsadd = currentForm = new ew.Form("fpharmacy_productsadd", "add");

// Validate form
fpharmacy_productsadd.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($pharmacy_products_add->ProductName->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductName->caption(), $pharmacy_products->ProductName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->DivisionCode->Required) { ?>
			elm = this.getElements("x" + infix + "_DivisionCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DivisionCode->caption(), $pharmacy_products->DivisionCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->ManufacturerCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ManufacturerCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ManufacturerCode->caption(), $pharmacy_products->ManufacturerCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->SupplierCode->Required) { ?>
			elm = this.getElements("x" + infix + "_SupplierCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SupplierCode->caption(), $pharmacy_products->SupplierCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->AlternateSupplierCodes->Required) { ?>
			elm = this.getElements("x" + infix + "_AlternateSupplierCodes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AlternateSupplierCodes->caption(), $pharmacy_products->AlternateSupplierCodes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->AlternateProductCode->Required) { ?>
			elm = this.getElements("x" + infix + "_AlternateProductCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AlternateProductCode->caption(), $pharmacy_products->AlternateProductCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->UniversalProductCode->Required) { ?>
			elm = this.getElements("x" + infix + "_UniversalProductCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->UniversalProductCode->caption(), $pharmacy_products->UniversalProductCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UniversalProductCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->UniversalProductCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->BookProductCode->Required) { ?>
			elm = this.getElements("x" + infix + "_BookProductCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BookProductCode->caption(), $pharmacy_products->BookProductCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BookProductCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->BookProductCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->OldCode->Required) { ?>
			elm = this.getElements("x" + infix + "_OldCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->OldCode->caption(), $pharmacy_products->OldCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->ProtectedProducts->Required) { ?>
			elm = this.getElements("x" + infix + "_ProtectedProducts");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProtectedProducts->caption(), $pharmacy_products->ProtectedProducts->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProtectedProducts");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProtectedProducts->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductFullName->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductFullName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductFullName->caption(), $pharmacy_products->ProductFullName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->UnitOfMeasure->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitOfMeasure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->UnitOfMeasure->caption(), $pharmacy_products->UnitOfMeasure->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UnitOfMeasure");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->UnitOfMeasure->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->UnitDescription->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitDescription");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->UnitDescription->caption(), $pharmacy_products->UnitDescription->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->BulkDescription->Required) { ?>
			elm = this.getElements("x" + infix + "_BulkDescription");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BulkDescription->caption(), $pharmacy_products->BulkDescription->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->BarCodeDescription->Required) { ?>
			elm = this.getElements("x" + infix + "_BarCodeDescription");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BarCodeDescription->caption(), $pharmacy_products->BarCodeDescription->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->PackageInformation->Required) { ?>
			elm = this.getElements("x" + infix + "_PackageInformation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PackageInformation->caption(), $pharmacy_products->PackageInformation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->PackageId->Required) { ?>
			elm = this.getElements("x" + infix + "_PackageId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PackageId->caption(), $pharmacy_products->PackageId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PackageId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PackageId->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Weight->Required) { ?>
			elm = this.getElements("x" + infix + "_Weight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Weight->caption(), $pharmacy_products->Weight->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Weight");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->Weight->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AllowFractions->Required) { ?>
			elm = this.getElements("x" + infix + "_AllowFractions");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AllowFractions->caption(), $pharmacy_products->AllowFractions->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AllowFractions");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AllowFractions->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MinimumStockLevel->Required) { ?>
			elm = this.getElements("x" + infix + "_MinimumStockLevel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MinimumStockLevel->caption(), $pharmacy_products->MinimumStockLevel->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MinimumStockLevel");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MinimumStockLevel->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MaximumStockLevel->Required) { ?>
			elm = this.getElements("x" + infix + "_MaximumStockLevel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MaximumStockLevel->caption(), $pharmacy_products->MaximumStockLevel->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MaximumStockLevel");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MaximumStockLevel->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ReorderLevel->Required) { ?>
			elm = this.getElements("x" + infix + "_ReorderLevel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ReorderLevel->caption(), $pharmacy_products->ReorderLevel->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReorderLevel");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ReorderLevel->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MinMaxRatio->Required) { ?>
			elm = this.getElements("x" + infix + "_MinMaxRatio");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MinMaxRatio->caption(), $pharmacy_products->MinMaxRatio->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MinMaxRatio");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MinMaxRatio->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AutoMinMaxRatio->Required) { ?>
			elm = this.getElements("x" + infix + "_AutoMinMaxRatio");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AutoMinMaxRatio->caption(), $pharmacy_products->AutoMinMaxRatio->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AutoMinMaxRatio");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AutoMinMaxRatio->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ScheduleCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ScheduleCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ScheduleCode->caption(), $pharmacy_products->ScheduleCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ScheduleCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ScheduleCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->RopRatio->Required) { ?>
			elm = this.getElements("x" + infix + "_RopRatio");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->RopRatio->caption(), $pharmacy_products->RopRatio->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RopRatio");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->RopRatio->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MRP->caption(), $pharmacy_products->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MRP->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PurchasePrice->Required) { ?>
			elm = this.getElements("x" + infix + "_PurchasePrice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PurchasePrice->caption(), $pharmacy_products->PurchasePrice->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurchasePrice");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PurchasePrice->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PurchaseUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PurchaseUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PurchaseUnit->caption(), $pharmacy_products->PurchaseUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurchaseUnit");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PurchaseUnit->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PurchaseTaxCode->Required) { ?>
			elm = this.getElements("x" + infix + "_PurchaseTaxCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PurchaseTaxCode->caption(), $pharmacy_products->PurchaseTaxCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurchaseTaxCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PurchaseTaxCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AllowDirectInward->Required) { ?>
			elm = this.getElements("x" + infix + "_AllowDirectInward");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AllowDirectInward->caption(), $pharmacy_products->AllowDirectInward->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AllowDirectInward");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AllowDirectInward->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SalePrice->Required) { ?>
			elm = this.getElements("x" + infix + "_SalePrice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SalePrice->caption(), $pharmacy_products->SalePrice->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalePrice");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SalePrice->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SaleUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SaleUnit->caption(), $pharmacy_products->SaleUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleUnit");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SaleUnit->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SalesTaxCode->Required) { ?>
			elm = this.getElements("x" + infix + "_SalesTaxCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SalesTaxCode->caption(), $pharmacy_products->SalesTaxCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalesTaxCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SalesTaxCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->StockReceived->Required) { ?>
			elm = this.getElements("x" + infix + "_StockReceived");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->StockReceived->caption(), $pharmacy_products->StockReceived->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StockReceived");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->StockReceived->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TotalStock->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TotalStock->caption(), $pharmacy_products->TotalStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TotalStock");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TotalStock->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->StockType->Required) { ?>
			elm = this.getElements("x" + infix + "_StockType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->StockType->caption(), $pharmacy_products->StockType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StockType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->StockType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->StockCheckDate->Required) { ?>
			elm = this.getElements("x" + infix + "_StockCheckDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->StockCheckDate->caption(), $pharmacy_products->StockCheckDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StockCheckDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->StockCheckDate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->StockAdjustmentDate->Required) { ?>
			elm = this.getElements("x" + infix + "_StockAdjustmentDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->StockAdjustmentDate->caption(), $pharmacy_products->StockAdjustmentDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StockAdjustmentDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->StockAdjustmentDate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Remarks->caption(), $pharmacy_products->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->CostCentre->Required) { ?>
			elm = this.getElements("x" + infix + "_CostCentre");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CostCentre->caption(), $pharmacy_products->CostCentre->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CostCentre");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->CostCentre->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductType->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductType->caption(), $pharmacy_products->ProductType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProductType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TaxAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_TaxAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TaxAmount->caption(), $pharmacy_products->TaxAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TaxAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TaxAmount->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TaxId->Required) { ?>
			elm = this.getElements("x" + infix + "_TaxId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TaxId->caption(), $pharmacy_products->TaxId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TaxId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TaxId->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ResaleTaxApplicable->Required) { ?>
			elm = this.getElements("x" + infix + "_ResaleTaxApplicable");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ResaleTaxApplicable->caption(), $pharmacy_products->ResaleTaxApplicable->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResaleTaxApplicable");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ResaleTaxApplicable->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CstOtherTax->Required) { ?>
			elm = this.getElements("x" + infix + "_CstOtherTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CstOtherTax->caption(), $pharmacy_products->CstOtherTax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->TotalTax->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TotalTax->caption(), $pharmacy_products->TotalTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TotalTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TotalTax->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ItemCost->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCost");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ItemCost->caption(), $pharmacy_products->ItemCost->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemCost");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ItemCost->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ExpiryDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpiryDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ExpiryDate->caption(), $pharmacy_products->ExpiryDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpiryDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ExpiryDate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->BatchDescription->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchDescription");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BatchDescription->caption(), $pharmacy_products->BatchDescription->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->FreeScheme->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeScheme");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FreeScheme->caption(), $pharmacy_products->FreeScheme->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeScheme");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->FreeScheme->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CashDiscountEligibility->Required) { ?>
			elm = this.getElements("x" + infix + "_CashDiscountEligibility");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CashDiscountEligibility->caption(), $pharmacy_products->CashDiscountEligibility->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CashDiscountEligibility");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->CashDiscountEligibility->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DiscountPerAllowInBill->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountPerAllowInBill");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DiscountPerAllowInBill->caption(), $pharmacy_products->DiscountPerAllowInBill->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DiscountPerAllowInBill");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DiscountPerAllowInBill->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Discount->caption(), $pharmacy_products->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->Discount->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TotalAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TotalAmount->caption(), $pharmacy_products->TotalAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TotalAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TotalAmount->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->StandardMargin->Required) { ?>
			elm = this.getElements("x" + infix + "_StandardMargin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->StandardMargin->caption(), $pharmacy_products->StandardMargin->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StandardMargin");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->StandardMargin->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Margin->Required) { ?>
			elm = this.getElements("x" + infix + "_Margin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Margin->caption(), $pharmacy_products->Margin->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Margin");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->Margin->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MarginId->Required) { ?>
			elm = this.getElements("x" + infix + "_MarginId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MarginId->caption(), $pharmacy_products->MarginId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MarginId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MarginId->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ExpectedMargin->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpectedMargin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ExpectedMargin->caption(), $pharmacy_products->ExpectedMargin->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpectedMargin");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ExpectedMargin->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SurchargeBeforeTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SurchargeBeforeTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SurchargeBeforeTax->caption(), $pharmacy_products->SurchargeBeforeTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SurchargeBeforeTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SurchargeBeforeTax->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SurchargeAfterTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SurchargeAfterTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SurchargeAfterTax->caption(), $pharmacy_products->SurchargeAfterTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SurchargeAfterTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SurchargeAfterTax->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TempOrderNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TempOrderNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TempOrderNo->caption(), $pharmacy_products->TempOrderNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TempOrderNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TempOrderNo->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TempOrderDate->Required) { ?>
			elm = this.getElements("x" + infix + "_TempOrderDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TempOrderDate->caption(), $pharmacy_products->TempOrderDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TempOrderDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TempOrderDate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->OrderUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_OrderUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->OrderUnit->caption(), $pharmacy_products->OrderUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OrderUnit");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->OrderUnit->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->OrderQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_OrderQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->OrderQuantity->caption(), $pharmacy_products->OrderQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OrderQuantity");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->OrderQuantity->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MarkForOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_MarkForOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MarkForOrder->caption(), $pharmacy_products->MarkForOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MarkForOrder");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MarkForOrder->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->OrderAllId->Required) { ?>
			elm = this.getElements("x" + infix + "_OrderAllId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->OrderAllId->caption(), $pharmacy_products->OrderAllId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OrderAllId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->OrderAllId->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CalculateOrderQty->Required) { ?>
			elm = this.getElements("x" + infix + "_CalculateOrderQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CalculateOrderQty->caption(), $pharmacy_products->CalculateOrderQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CalculateOrderQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->CalculateOrderQty->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SubLocation->Required) { ?>
			elm = this.getElements("x" + infix + "_SubLocation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SubLocation->caption(), $pharmacy_products->SubLocation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->CategoryCode->Required) { ?>
			elm = this.getElements("x" + infix + "_CategoryCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CategoryCode->caption(), $pharmacy_products->CategoryCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->SubCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_SubCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SubCategory->caption(), $pharmacy_products->SubCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->FlexCategoryCode->Required) { ?>
			elm = this.getElements("x" + infix + "_FlexCategoryCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FlexCategoryCode->caption(), $pharmacy_products->FlexCategoryCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FlexCategoryCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->FlexCategoryCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ABCSaleQty->Required) { ?>
			elm = this.getElements("x" + infix + "_ABCSaleQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ABCSaleQty->caption(), $pharmacy_products->ABCSaleQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ABCSaleQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ABCSaleQty->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ABCSaleValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ABCSaleValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ABCSaleValue->caption(), $pharmacy_products->ABCSaleValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ABCSaleValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ABCSaleValue->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ConvertionFactor->Required) { ?>
			elm = this.getElements("x" + infix + "_ConvertionFactor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ConvertionFactor->caption(), $pharmacy_products->ConvertionFactor->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ConvertionFactor");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ConvertionFactor->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ConvertionUnitDesc->Required) { ?>
			elm = this.getElements("x" + infix + "_ConvertionUnitDesc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ConvertionUnitDesc->caption(), $pharmacy_products->ConvertionUnitDesc->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->TransactionId->Required) { ?>
			elm = this.getElements("x" + infix + "_TransactionId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TransactionId->caption(), $pharmacy_products->TransactionId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TransactionId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TransactionId->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SoldProductId->Required) { ?>
			elm = this.getElements("x" + infix + "_SoldProductId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SoldProductId->caption(), $pharmacy_products->SoldProductId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SoldProductId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SoldProductId->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->WantedBookId->Required) { ?>
			elm = this.getElements("x" + infix + "_WantedBookId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->WantedBookId->caption(), $pharmacy_products->WantedBookId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_WantedBookId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->WantedBookId->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AllId->Required) { ?>
			elm = this.getElements("x" + infix + "_AllId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AllId->caption(), $pharmacy_products->AllId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AllId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AllId->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->BatchAndExpiryCompulsory->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchAndExpiryCompulsory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BatchAndExpiryCompulsory->caption(), $pharmacy_products->BatchAndExpiryCompulsory->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BatchAndExpiryCompulsory");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->BatchAndExpiryCompulsory->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->BatchStockForWantedBook->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchStockForWantedBook");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BatchStockForWantedBook->caption(), $pharmacy_products->BatchStockForWantedBook->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BatchStockForWantedBook");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->BatchStockForWantedBook->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->UnitBasedBilling->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitBasedBilling");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->UnitBasedBilling->caption(), $pharmacy_products->UnitBasedBilling->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UnitBasedBilling");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->UnitBasedBilling->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DoNotCheckStock->Required) { ?>
			elm = this.getElements("x" + infix + "_DoNotCheckStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DoNotCheckStock->caption(), $pharmacy_products->DoNotCheckStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DoNotCheckStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DoNotCheckStock->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AcceptRate->Required) { ?>
			elm = this.getElements("x" + infix + "_AcceptRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AcceptRate->caption(), $pharmacy_products->AcceptRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AcceptRate");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AcceptRate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PriceLevel->Required) { ?>
			elm = this.getElements("x" + infix + "_PriceLevel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PriceLevel->caption(), $pharmacy_products->PriceLevel->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PriceLevel");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PriceLevel->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->LastQuotePrice->Required) { ?>
			elm = this.getElements("x" + infix + "_LastQuotePrice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LastQuotePrice->caption(), $pharmacy_products->LastQuotePrice->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastQuotePrice");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->LastQuotePrice->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PriceChange->Required) { ?>
			elm = this.getElements("x" + infix + "_PriceChange");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PriceChange->caption(), $pharmacy_products->PriceChange->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PriceChange");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PriceChange->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CommodityCode->Required) { ?>
			elm = this.getElements("x" + infix + "_CommodityCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CommodityCode->caption(), $pharmacy_products->CommodityCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->InstitutePrice->Required) { ?>
			elm = this.getElements("x" + infix + "_InstitutePrice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->InstitutePrice->caption(), $pharmacy_products->InstitutePrice->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_InstitutePrice");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->InstitutePrice->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CtrlOrDCtrlProduct->Required) { ?>
			elm = this.getElements("x" + infix + "_CtrlOrDCtrlProduct");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CtrlOrDCtrlProduct->caption(), $pharmacy_products->CtrlOrDCtrlProduct->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CtrlOrDCtrlProduct");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->CtrlOrDCtrlProduct->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ImportedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ImportedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ImportedDate->caption(), $pharmacy_products->ImportedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ImportedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ImportedDate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IsImported->Required) { ?>
			elm = this.getElements("x" + infix + "_IsImported");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IsImported->caption(), $pharmacy_products->IsImported->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IsImported");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IsImported->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->FileName->Required) { ?>
			elm = this.getElements("x" + infix + "_FileName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FileName->caption(), $pharmacy_products->FileName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->LPName->Required) { ?>
			elm = this.getElements("x" + infix + "_LPName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LPName->caption(), $pharmacy_products->LPName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->GodownNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_GodownNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->GodownNumber->caption(), $pharmacy_products->GodownNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GodownNumber");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->GodownNumber->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CreationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_CreationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CreationDate->caption(), $pharmacy_products->CreationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreationDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->CreationDate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CreatedbyUser->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedbyUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CreatedbyUser->caption(), $pharmacy_products->CreatedbyUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->ModifiedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ModifiedDate->caption(), $pharmacy_products->ModifiedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifiedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ModifiedDate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ModifiedbyUser->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedbyUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ModifiedbyUser->caption(), $pharmacy_products->ModifiedbyUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->isActive->Required) { ?>
			elm = this.getElements("x" + infix + "_isActive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->isActive->caption(), $pharmacy_products->isActive->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_isActive");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->isActive->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AllowExpiryClaim->Required) { ?>
			elm = this.getElements("x" + infix + "_AllowExpiryClaim");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AllowExpiryClaim->caption(), $pharmacy_products->AllowExpiryClaim->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AllowExpiryClaim");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AllowExpiryClaim->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->BrandCode->Required) { ?>
			elm = this.getElements("x" + infix + "_BrandCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BrandCode->caption(), $pharmacy_products->BrandCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BrandCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->BrandCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->FreeSchemeBasedon->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeSchemeBasedon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FreeSchemeBasedon->caption(), $pharmacy_products->FreeSchemeBasedon->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeSchemeBasedon");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->FreeSchemeBasedon->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DoNotCheckCostInBill->Required) { ?>
			elm = this.getElements("x" + infix + "_DoNotCheckCostInBill");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DoNotCheckCostInBill->caption(), $pharmacy_products->DoNotCheckCostInBill->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DoNotCheckCostInBill");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DoNotCheckCostInBill->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductGroupCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductGroupCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductGroupCode->caption(), $pharmacy_products->ProductGroupCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductGroupCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProductGroupCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductStrengthCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductStrengthCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductStrengthCode->caption(), $pharmacy_products->ProductStrengthCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductStrengthCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProductStrengthCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PackingCode->Required) { ?>
			elm = this.getElements("x" + infix + "_PackingCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PackingCode->caption(), $pharmacy_products->PackingCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PackingCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PackingCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ComputedMinStock->Required) { ?>
			elm = this.getElements("x" + infix + "_ComputedMinStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ComputedMinStock->caption(), $pharmacy_products->ComputedMinStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ComputedMinStock");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ComputedMinStock->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ComputedMaxStock->Required) { ?>
			elm = this.getElements("x" + infix + "_ComputedMaxStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ComputedMaxStock->caption(), $pharmacy_products->ComputedMaxStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ComputedMaxStock");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ComputedMaxStock->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductRemark->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductRemark");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductRemark->caption(), $pharmacy_products->ProductRemark->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductRemark");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProductRemark->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductDrugCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductDrugCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductDrugCode->caption(), $pharmacy_products->ProductDrugCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductDrugCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProductDrugCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IsMatrixProduct->Required) { ?>
			elm = this.getElements("x" + infix + "_IsMatrixProduct");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IsMatrixProduct->caption(), $pharmacy_products->IsMatrixProduct->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IsMatrixProduct");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IsMatrixProduct->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount1->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount1->caption(), $pharmacy_products->AttributeCount1->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount1");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount1->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount2->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount2->caption(), $pharmacy_products->AttributeCount2->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount2");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount2->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount3->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount3->caption(), $pharmacy_products->AttributeCount3->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount3");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount3->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount4->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount4->caption(), $pharmacy_products->AttributeCount4->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount4");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount4->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount5->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount5->caption(), $pharmacy_products->AttributeCount5->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount5");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount5->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DefaultDiscountPercentage->Required) { ?>
			elm = this.getElements("x" + infix + "_DefaultDiscountPercentage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DefaultDiscountPercentage->caption(), $pharmacy_products->DefaultDiscountPercentage->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DefaultDiscountPercentage");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DefaultDiscountPercentage->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DonotPrintBarcode->Required) { ?>
			elm = this.getElements("x" + infix + "_DonotPrintBarcode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DonotPrintBarcode->caption(), $pharmacy_products->DonotPrintBarcode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DonotPrintBarcode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DonotPrintBarcode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductLevelDiscount->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductLevelDiscount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductLevelDiscount->caption(), $pharmacy_products->ProductLevelDiscount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductLevelDiscount");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProductLevelDiscount->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Markup->Required) { ?>
			elm = this.getElements("x" + infix + "_Markup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Markup->caption(), $pharmacy_products->Markup->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Markup");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->Markup->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MarkDown->Required) { ?>
			elm = this.getElements("x" + infix + "_MarkDown");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MarkDown->caption(), $pharmacy_products->MarkDown->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MarkDown");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MarkDown->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ReworkSalePrice->Required) { ?>
			elm = this.getElements("x" + infix + "_ReworkSalePrice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ReworkSalePrice->caption(), $pharmacy_products->ReworkSalePrice->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReworkSalePrice");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ReworkSalePrice->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MultipleInput->Required) { ?>
			elm = this.getElements("x" + infix + "_MultipleInput");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MultipleInput->caption(), $pharmacy_products->MultipleInput->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MultipleInput");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MultipleInput->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->LpPackageInformation->Required) { ?>
			elm = this.getElements("x" + infix + "_LpPackageInformation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LpPackageInformation->caption(), $pharmacy_products->LpPackageInformation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->AllowNegativeStock->Required) { ?>
			elm = this.getElements("x" + infix + "_AllowNegativeStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AllowNegativeStock->caption(), $pharmacy_products->AllowNegativeStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AllowNegativeStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AllowNegativeStock->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->OrderDate->Required) { ?>
			elm = this.getElements("x" + infix + "_OrderDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->OrderDate->caption(), $pharmacy_products->OrderDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OrderDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->OrderDate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->OrderTime->Required) { ?>
			elm = this.getElements("x" + infix + "_OrderTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->OrderTime->caption(), $pharmacy_products->OrderTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OrderTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->OrderTime->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->RateGroupCode->Required) { ?>
			elm = this.getElements("x" + infix + "_RateGroupCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->RateGroupCode->caption(), $pharmacy_products->RateGroupCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RateGroupCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->RateGroupCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ConversionCaseLot->Required) { ?>
			elm = this.getElements("x" + infix + "_ConversionCaseLot");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ConversionCaseLot->caption(), $pharmacy_products->ConversionCaseLot->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ConversionCaseLot");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ConversionCaseLot->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ShippingLot->Required) { ?>
			elm = this.getElements("x" + infix + "_ShippingLot");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ShippingLot->caption(), $pharmacy_products->ShippingLot->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->AllowExpiryReplacement->Required) { ?>
			elm = this.getElements("x" + infix + "_AllowExpiryReplacement");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AllowExpiryReplacement->caption(), $pharmacy_products->AllowExpiryReplacement->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AllowExpiryReplacement");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AllowExpiryReplacement->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->NoOfMonthExpiryAllowed->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfMonthExpiryAllowed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->NoOfMonthExpiryAllowed->caption(), $pharmacy_products->NoOfMonthExpiryAllowed->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoOfMonthExpiryAllowed");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->NoOfMonthExpiryAllowed->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductDiscountEligibility->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductDiscountEligibility");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductDiscountEligibility->caption(), $pharmacy_products->ProductDiscountEligibility->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductDiscountEligibility");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProductDiscountEligibility->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ScheduleTypeCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ScheduleTypeCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ScheduleTypeCode->caption(), $pharmacy_products->ScheduleTypeCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ScheduleTypeCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ScheduleTypeCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AIOCDProductCode->Required) { ?>
			elm = this.getElements("x" + infix + "_AIOCDProductCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AIOCDProductCode->caption(), $pharmacy_products->AIOCDProductCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->FreeQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FreeQuantity->caption(), $pharmacy_products->FreeQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQuantity");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->FreeQuantity->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DiscountType->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DiscountType->caption(), $pharmacy_products->DiscountType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DiscountType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DiscountType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DiscountValue->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DiscountValue->caption(), $pharmacy_products->DiscountValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DiscountValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DiscountValue->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->HasProductOrderAttribute->Required) { ?>
			elm = this.getElements("x" + infix + "_HasProductOrderAttribute");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->HasProductOrderAttribute->caption(), $pharmacy_products->HasProductOrderAttribute->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HasProductOrderAttribute");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->HasProductOrderAttribute->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->FirstPODate->Required) { ?>
			elm = this.getElements("x" + infix + "_FirstPODate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FirstPODate->caption(), $pharmacy_products->FirstPODate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FirstPODate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->FirstPODate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SaleprcieAndMrpCalcPercent->Required) { ?>
			elm = this.getElements("x" + infix + "_SaleprcieAndMrpCalcPercent");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SaleprcieAndMrpCalcPercent->caption(), $pharmacy_products->SaleprcieAndMrpCalcPercent->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SaleprcieAndMrpCalcPercent");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SaleprcieAndMrpCalcPercent->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IsGiftVoucherProducts->Required) { ?>
			elm = this.getElements("x" + infix + "_IsGiftVoucherProducts");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IsGiftVoucherProducts->caption(), $pharmacy_products->IsGiftVoucherProducts->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IsGiftVoucherProducts");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IsGiftVoucherProducts->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AcceptRange4SerialNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_AcceptRange4SerialNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AcceptRange4SerialNumber->caption(), $pharmacy_products->AcceptRange4SerialNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AcceptRange4SerialNumber");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AcceptRange4SerialNumber->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->GiftVoucherDenomination->Required) { ?>
			elm = this.getElements("x" + infix + "_GiftVoucherDenomination");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->GiftVoucherDenomination->caption(), $pharmacy_products->GiftVoucherDenomination->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GiftVoucherDenomination");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->GiftVoucherDenomination->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Subclasscode->Required) { ?>
			elm = this.getElements("x" + infix + "_Subclasscode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Subclasscode->caption(), $pharmacy_products->Subclasscode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->BarCodeFromWeighingMachine->Required) { ?>
			elm = this.getElements("x" + infix + "_BarCodeFromWeighingMachine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BarCodeFromWeighingMachine->caption(), $pharmacy_products->BarCodeFromWeighingMachine->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BarCodeFromWeighingMachine");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->BarCodeFromWeighingMachine->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CheckCostInReturn->Required) { ?>
			elm = this.getElements("x" + infix + "_CheckCostInReturn");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CheckCostInReturn->caption(), $pharmacy_products->CheckCostInReturn->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CheckCostInReturn");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->CheckCostInReturn->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->FrequentSaleProduct->Required) { ?>
			elm = this.getElements("x" + infix + "_FrequentSaleProduct");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FrequentSaleProduct->caption(), $pharmacy_products->FrequentSaleProduct->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FrequentSaleProduct");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->FrequentSaleProduct->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->RateType->Required) { ?>
			elm = this.getElements("x" + infix + "_RateType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->RateType->caption(), $pharmacy_products->RateType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RateType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->RateType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TouchscreenName->Required) { ?>
			elm = this.getElements("x" + infix + "_TouchscreenName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TouchscreenName->caption(), $pharmacy_products->TouchscreenName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->FreeType->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FreeType->caption(), $pharmacy_products->FreeType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->FreeType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->LooseQtyasNewBatch->Required) { ?>
			elm = this.getElements("x" + infix + "_LooseQtyasNewBatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LooseQtyasNewBatch->caption(), $pharmacy_products->LooseQtyasNewBatch->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LooseQtyasNewBatch");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->LooseQtyasNewBatch->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AllowSlabBilling->Required) { ?>
			elm = this.getElements("x" + infix + "_AllowSlabBilling");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AllowSlabBilling->caption(), $pharmacy_products->AllowSlabBilling->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AllowSlabBilling");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AllowSlabBilling->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductTypeForProduction->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductTypeForProduction");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductTypeForProduction->caption(), $pharmacy_products->ProductTypeForProduction->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductTypeForProduction");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProductTypeForProduction->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->RecipeCode->Required) { ?>
			elm = this.getElements("x" + infix + "_RecipeCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->RecipeCode->caption(), $pharmacy_products->RecipeCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RecipeCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->RecipeCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DefaultUnitType->Required) { ?>
			elm = this.getElements("x" + infix + "_DefaultUnitType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DefaultUnitType->caption(), $pharmacy_products->DefaultUnitType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DefaultUnitType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DefaultUnitType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PIstatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PIstatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PIstatus->caption(), $pharmacy_products->PIstatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PIstatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PIstatus->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->LastPiConfirmedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_LastPiConfirmedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LastPiConfirmedDate->caption(), $pharmacy_products->LastPiConfirmedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastPiConfirmedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->LastPiConfirmedDate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->BarCodeDesign->Required) { ?>
			elm = this.getElements("x" + infix + "_BarCodeDesign");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BarCodeDesign->caption(), $pharmacy_products->BarCodeDesign->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->AcceptRemarksInBill->Required) { ?>
			elm = this.getElements("x" + infix + "_AcceptRemarksInBill");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AcceptRemarksInBill->caption(), $pharmacy_products->AcceptRemarksInBill->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AcceptRemarksInBill");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AcceptRemarksInBill->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Classification->Required) { ?>
			elm = this.getElements("x" + infix + "_Classification");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Classification->caption(), $pharmacy_products->Classification->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Classification");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->Classification->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TimeSlot->Required) { ?>
			elm = this.getElements("x" + infix + "_TimeSlot");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TimeSlot->caption(), $pharmacy_products->TimeSlot->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TimeSlot");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TimeSlot->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IsBundle->Required) { ?>
			elm = this.getElements("x" + infix + "_IsBundle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IsBundle->caption(), $pharmacy_products->IsBundle->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IsBundle");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IsBundle->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ColorCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ColorCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ColorCode->caption(), $pharmacy_products->ColorCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ColorCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ColorCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->GenderCode->Required) { ?>
			elm = this.getElements("x" + infix + "_GenderCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->GenderCode->caption(), $pharmacy_products->GenderCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GenderCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->GenderCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SizeCode->Required) { ?>
			elm = this.getElements("x" + infix + "_SizeCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SizeCode->caption(), $pharmacy_products->SizeCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SizeCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SizeCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->GiftCard->Required) { ?>
			elm = this.getElements("x" + infix + "_GiftCard");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->GiftCard->caption(), $pharmacy_products->GiftCard->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GiftCard");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->GiftCard->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ToonLabel->Required) { ?>
			elm = this.getElements("x" + infix + "_ToonLabel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ToonLabel->caption(), $pharmacy_products->ToonLabel->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ToonLabel");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ToonLabel->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->GarmentType->Required) { ?>
			elm = this.getElements("x" + infix + "_GarmentType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->GarmentType->caption(), $pharmacy_products->GarmentType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GarmentType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->GarmentType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AgeGroup->Required) { ?>
			elm = this.getElements("x" + infix + "_AgeGroup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AgeGroup->caption(), $pharmacy_products->AgeGroup->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AgeGroup");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AgeGroup->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Season->Required) { ?>
			elm = this.getElements("x" + infix + "_Season");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Season->caption(), $pharmacy_products->Season->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Season");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->Season->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DailyStockEntry->Required) { ?>
			elm = this.getElements("x" + infix + "_DailyStockEntry");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DailyStockEntry->caption(), $pharmacy_products->DailyStockEntry->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DailyStockEntry");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DailyStockEntry->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ModifierApplicable->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifierApplicable");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ModifierApplicable->caption(), $pharmacy_products->ModifierApplicable->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifierApplicable");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ModifierApplicable->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ModifierType->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifierType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ModifierType->caption(), $pharmacy_products->ModifierType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ModifierType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ModifierType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AcceptZeroRate->Required) { ?>
			elm = this.getElements("x" + infix + "_AcceptZeroRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AcceptZeroRate->caption(), $pharmacy_products->AcceptZeroRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AcceptZeroRate");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AcceptZeroRate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ExciseDutyCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ExciseDutyCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ExciseDutyCode->caption(), $pharmacy_products->ExciseDutyCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExciseDutyCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ExciseDutyCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IndentProductGroupCode->Required) { ?>
			elm = this.getElements("x" + infix + "_IndentProductGroupCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IndentProductGroupCode->caption(), $pharmacy_products->IndentProductGroupCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IndentProductGroupCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IndentProductGroupCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IsMultiBatch->Required) { ?>
			elm = this.getElements("x" + infix + "_IsMultiBatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IsMultiBatch->caption(), $pharmacy_products->IsMultiBatch->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IsMultiBatch");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IsMultiBatch->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IsSingleBatch->Required) { ?>
			elm = this.getElements("x" + infix + "_IsSingleBatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IsSingleBatch->caption(), $pharmacy_products->IsSingleBatch->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IsSingleBatch");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IsSingleBatch->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MarkUpRate1->Required) { ?>
			elm = this.getElements("x" + infix + "_MarkUpRate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MarkUpRate1->caption(), $pharmacy_products->MarkUpRate1->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MarkUpRate1");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MarkUpRate1->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MarkDownRate1->Required) { ?>
			elm = this.getElements("x" + infix + "_MarkDownRate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MarkDownRate1->caption(), $pharmacy_products->MarkDownRate1->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MarkDownRate1");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MarkDownRate1->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MarkUpRate2->Required) { ?>
			elm = this.getElements("x" + infix + "_MarkUpRate2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MarkUpRate2->caption(), $pharmacy_products->MarkUpRate2->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MarkUpRate2");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MarkUpRate2->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MarkDownRate2->Required) { ?>
			elm = this.getElements("x" + infix + "_MarkDownRate2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MarkDownRate2->caption(), $pharmacy_products->MarkDownRate2->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MarkDownRate2");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MarkDownRate2->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->_Yield->Required) { ?>
			elm = this.getElements("x" + infix + "__Yield");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->_Yield->caption(), $pharmacy_products->_Yield->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "__Yield");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->_Yield->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->RefProductCode->Required) { ?>
			elm = this.getElements("x" + infix + "_RefProductCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->RefProductCode->caption(), $pharmacy_products->RefProductCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RefProductCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->RefProductCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Volume->Required) { ?>
			elm = this.getElements("x" + infix + "_Volume");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Volume->caption(), $pharmacy_products->Volume->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Volume");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->Volume->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MeasurementID->Required) { ?>
			elm = this.getElements("x" + infix + "_MeasurementID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MeasurementID->caption(), $pharmacy_products->MeasurementID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MeasurementID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MeasurementID->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CountryCode->Required) { ?>
			elm = this.getElements("x" + infix + "_CountryCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CountryCode->caption(), $pharmacy_products->CountryCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CountryCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->CountryCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AcceptWMQty->Required) { ?>
			elm = this.getElements("x" + infix + "_AcceptWMQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AcceptWMQty->caption(), $pharmacy_products->AcceptWMQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AcceptWMQty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AcceptWMQty->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SingleBatchBasedOnRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SingleBatchBasedOnRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SingleBatchBasedOnRate->caption(), $pharmacy_products->SingleBatchBasedOnRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SingleBatchBasedOnRate");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SingleBatchBasedOnRate->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TenderNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TenderNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TenderNo->caption(), $pharmacy_products->TenderNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->SingleBillMaximumSoldQtyFiled->Required) { ?>
			elm = this.getElements("x" + infix + "_SingleBillMaximumSoldQtyFiled");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SingleBillMaximumSoldQtyFiled->caption(), $pharmacy_products->SingleBillMaximumSoldQtyFiled->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SingleBillMaximumSoldQtyFiled");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SingleBillMaximumSoldQtyFiled->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->Strength1->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Strength1->caption(), $pharmacy_products->Strength1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->Strength2->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Strength2->caption(), $pharmacy_products->Strength2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->Strength3->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Strength3->caption(), $pharmacy_products->Strength3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->Strength4->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Strength4->caption(), $pharmacy_products->Strength4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->Strength5->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->Strength5->caption(), $pharmacy_products->Strength5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->IngredientCode1->Required) { ?>
			elm = this.getElements("x" + infix + "_IngredientCode1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IngredientCode1->caption(), $pharmacy_products->IngredientCode1->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IngredientCode1");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IngredientCode1->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IngredientCode2->Required) { ?>
			elm = this.getElements("x" + infix + "_IngredientCode2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IngredientCode2->caption(), $pharmacy_products->IngredientCode2->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IngredientCode2");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IngredientCode2->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IngredientCode3->Required) { ?>
			elm = this.getElements("x" + infix + "_IngredientCode3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IngredientCode3->caption(), $pharmacy_products->IngredientCode3->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IngredientCode3");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IngredientCode3->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IngredientCode4->Required) { ?>
			elm = this.getElements("x" + infix + "_IngredientCode4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IngredientCode4->caption(), $pharmacy_products->IngredientCode4->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IngredientCode4");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IngredientCode4->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IngredientCode5->Required) { ?>
			elm = this.getElements("x" + infix + "_IngredientCode5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IngredientCode5->caption(), $pharmacy_products->IngredientCode5->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IngredientCode5");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IngredientCode5->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->OrderType->Required) { ?>
			elm = this.getElements("x" + infix + "_OrderType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->OrderType->caption(), $pharmacy_products->OrderType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OrderType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->OrderType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->StockUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_StockUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->StockUOM->caption(), $pharmacy_products->StockUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StockUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->StockUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PriceUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_PriceUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PriceUOM->caption(), $pharmacy_products->PriceUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PriceUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PriceUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DefaultSaleUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_DefaultSaleUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DefaultSaleUOM->caption(), $pharmacy_products->DefaultSaleUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DefaultSaleUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DefaultSaleUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DefaultPurchaseUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_DefaultPurchaseUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DefaultPurchaseUOM->caption(), $pharmacy_products->DefaultPurchaseUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DefaultPurchaseUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DefaultPurchaseUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ReportingUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportingUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ReportingUOM->caption(), $pharmacy_products->ReportingUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReportingUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ReportingUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->LastPurchasedUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_LastPurchasedUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LastPurchasedUOM->caption(), $pharmacy_products->LastPurchasedUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastPurchasedUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->LastPurchasedUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TreatmentCodes->Required) { ?>
			elm = this.getElements("x" + infix + "_TreatmentCodes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TreatmentCodes->caption(), $pharmacy_products->TreatmentCodes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->InsuranceType->Required) { ?>
			elm = this.getElements("x" + infix + "_InsuranceType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->InsuranceType->caption(), $pharmacy_products->InsuranceType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_InsuranceType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->InsuranceType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->CoverageGroupCodes->Required) { ?>
			elm = this.getElements("x" + infix + "_CoverageGroupCodes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->CoverageGroupCodes->caption(), $pharmacy_products->CoverageGroupCodes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->MultipleUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_MultipleUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MultipleUOM->caption(), $pharmacy_products->MultipleUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MultipleUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MultipleUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SalePriceComputation->Required) { ?>
			elm = this.getElements("x" + infix + "_SalePriceComputation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SalePriceComputation->caption(), $pharmacy_products->SalePriceComputation->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalePriceComputation");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SalePriceComputation->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->StockCorrection->Required) { ?>
			elm = this.getElements("x" + infix + "_StockCorrection");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->StockCorrection->caption(), $pharmacy_products->StockCorrection->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StockCorrection");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->StockCorrection->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->LBTPercentage->Required) { ?>
			elm = this.getElements("x" + infix + "_LBTPercentage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LBTPercentage->caption(), $pharmacy_products->LBTPercentage->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LBTPercentage");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->LBTPercentage->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->SalesCommission->Required) { ?>
			elm = this.getElements("x" + infix + "_SalesCommission");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->SalesCommission->caption(), $pharmacy_products->SalesCommission->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalesCommission");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->SalesCommission->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->LockedStock->Required) { ?>
			elm = this.getElements("x" + infix + "_LockedStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LockedStock->caption(), $pharmacy_products->LockedStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LockedStock");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->LockedStock->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MinMaxUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_MinMaxUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MinMaxUOM->caption(), $pharmacy_products->MinMaxUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MinMaxUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MinMaxUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ExpiryMfrDateFormat->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpiryMfrDateFormat");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ExpiryMfrDateFormat->caption(), $pharmacy_products->ExpiryMfrDateFormat->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpiryMfrDateFormat");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ExpiryMfrDateFormat->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ProductLifeTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductLifeTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ProductLifeTime->caption(), $pharmacy_products->ProductLifeTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductLifeTime");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ProductLifeTime->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IsCombo->Required) { ?>
			elm = this.getElements("x" + infix + "_IsCombo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IsCombo->caption(), $pharmacy_products->IsCombo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IsCombo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IsCombo->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ComboTypeCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ComboTypeCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ComboTypeCode->caption(), $pharmacy_products->ComboTypeCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ComboTypeCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ComboTypeCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount6->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount6");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount6->caption(), $pharmacy_products->AttributeCount6->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount6");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount6->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount7->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount7");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount7->caption(), $pharmacy_products->AttributeCount7->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount7");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount7->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount8->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount8");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount8->caption(), $pharmacy_products->AttributeCount8->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount8");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount8->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount9->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount9");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount9->caption(), $pharmacy_products->AttributeCount9->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount9");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount9->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AttributeCount10->Required) { ?>
			elm = this.getElements("x" + infix + "_AttributeCount10");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AttributeCount10->caption(), $pharmacy_products->AttributeCount10->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AttributeCount10");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AttributeCount10->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->LabourCharge->Required) { ?>
			elm = this.getElements("x" + infix + "_LabourCharge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LabourCharge->caption(), $pharmacy_products->LabourCharge->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LabourCharge");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->LabourCharge->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AffectOtherCharge->Required) { ?>
			elm = this.getElements("x" + infix + "_AffectOtherCharge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AffectOtherCharge->caption(), $pharmacy_products->AffectOtherCharge->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AffectOtherCharge");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AffectOtherCharge->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DosageInfo->Required) { ?>
			elm = this.getElements("x" + infix + "_DosageInfo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DosageInfo->caption(), $pharmacy_products->DosageInfo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->DosageType->Required) { ?>
			elm = this.getElements("x" + infix + "_DosageType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DosageType->caption(), $pharmacy_products->DosageType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DosageType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DosageType->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->DefaultIndentUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_DefaultIndentUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->DefaultIndentUOM->caption(), $pharmacy_products->DefaultIndentUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DefaultIndentUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->DefaultIndentUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PromoTag->Required) { ?>
			elm = this.getElements("x" + infix + "_PromoTag");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PromoTag->caption(), $pharmacy_products->PromoTag->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PromoTag");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PromoTag->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->BillLevelPromoTag->Required) { ?>
			elm = this.getElements("x" + infix + "_BillLevelPromoTag");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->BillLevelPromoTag->caption(), $pharmacy_products->BillLevelPromoTag->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillLevelPromoTag");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->BillLevelPromoTag->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->IsMRPProduct->Required) { ?>
			elm = this.getElements("x" + infix + "_IsMRPProduct");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->IsMRPProduct->caption(), $pharmacy_products->IsMRPProduct->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IsMRPProduct");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->IsMRPProduct->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MrpList->Required) { ?>
			elm = this.getElements("x" + infix + "_MrpList");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MrpList->caption(), $pharmacy_products->MrpList->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->AlternateSaleUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_AlternateSaleUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AlternateSaleUOM->caption(), $pharmacy_products->AlternateSaleUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AlternateSaleUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AlternateSaleUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->FreeUOM->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeUOM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FreeUOM->caption(), $pharmacy_products->FreeUOM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeUOM");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->FreeUOM->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->MarketedCode->Required) { ?>
			elm = this.getElements("x" + infix + "_MarketedCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MarketedCode->caption(), $pharmacy_products->MarketedCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_products_add->MinimumSalePrice->Required) { ?>
			elm = this.getElements("x" + infix + "_MinimumSalePrice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->MinimumSalePrice->caption(), $pharmacy_products->MinimumSalePrice->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MinimumSalePrice");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->MinimumSalePrice->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PRate1->Required) { ?>
			elm = this.getElements("x" + infix + "_PRate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PRate1->caption(), $pharmacy_products->PRate1->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PRate1");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PRate1->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->PRate2->Required) { ?>
			elm = this.getElements("x" + infix + "_PRate2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->PRate2->caption(), $pharmacy_products->PRate2->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PRate2");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->PRate2->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->LPItemCost->Required) { ?>
			elm = this.getElements("x" + infix + "_LPItemCost");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->LPItemCost->caption(), $pharmacy_products->LPItemCost->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LPItemCost");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->LPItemCost->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->FixedItemCost->Required) { ?>
			elm = this.getElements("x" + infix + "_FixedItemCost");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->FixedItemCost->caption(), $pharmacy_products->FixedItemCost->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FixedItemCost");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->FixedItemCost->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->HSNId->Required) { ?>
			elm = this.getElements("x" + infix + "_HSNId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->HSNId->caption(), $pharmacy_products->HSNId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HSNId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->HSNId->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->TaxInclusive->Required) { ?>
			elm = this.getElements("x" + infix + "_TaxInclusive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->TaxInclusive->caption(), $pharmacy_products->TaxInclusive->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TaxInclusive");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->TaxInclusive->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->EligibleforWarranty->Required) { ?>
			elm = this.getElements("x" + infix + "_EligibleforWarranty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->EligibleforWarranty->caption(), $pharmacy_products->EligibleforWarranty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EligibleforWarranty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->EligibleforWarranty->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->NoofMonthsWarranty->Required) { ?>
			elm = this.getElements("x" + infix + "_NoofMonthsWarranty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->NoofMonthsWarranty->caption(), $pharmacy_products->NoofMonthsWarranty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoofMonthsWarranty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->NoofMonthsWarranty->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->ComputeTaxonCost->Required) { ?>
			elm = this.getElements("x" + infix + "_ComputeTaxonCost");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->ComputeTaxonCost->caption(), $pharmacy_products->ComputeTaxonCost->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ComputeTaxonCost");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->ComputeTaxonCost->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->HasEmptyBottleTrack->Required) { ?>
			elm = this.getElements("x" + infix + "_HasEmptyBottleTrack");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->HasEmptyBottleTrack->caption(), $pharmacy_products->HasEmptyBottleTrack->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HasEmptyBottleTrack");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->HasEmptyBottleTrack->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->EmptyBottleReferenceCode->Required) { ?>
			elm = this.getElements("x" + infix + "_EmptyBottleReferenceCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->EmptyBottleReferenceCode->caption(), $pharmacy_products->EmptyBottleReferenceCode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EmptyBottleReferenceCode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->EmptyBottleReferenceCode->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->AdditionalCESSAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_AdditionalCESSAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->AdditionalCESSAmount->caption(), $pharmacy_products->AdditionalCESSAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AdditionalCESSAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->AdditionalCESSAmount->errorMessage()) ?>");
		<?php if ($pharmacy_products_add->EmptyBottleRate->Required) { ?>
			elm = this.getElements("x" + infix + "_EmptyBottleRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products->EmptyBottleRate->caption(), $pharmacy_products->EmptyBottleRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EmptyBottleRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_products->EmptyBottleRate->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpharmacy_productsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_productsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_products_add->showPageHeader(); ?>
<?php
$pharmacy_products_add->showMessage();
?>
<form name="fpharmacy_productsadd" id="fpharmacy_productsadd" class="<?php echo $pharmacy_products_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_products_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_products_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_products_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_products->ProductName->Visible) { // ProductName ?>
	<div id="r_ProductName" class="form-group row">
		<label id="elh_pharmacy_products_ProductName" for="x_ProductName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductName->caption() ?><?php echo ($pharmacy_products->ProductName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductName">
<input type="text" data-table="pharmacy_products" data-field="x_ProductName" name="x_ProductName" id="x_ProductName" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductName->EditValue ?>"<?php echo $pharmacy_products->ProductName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DivisionCode->Visible) { // DivisionCode ?>
	<div id="r_DivisionCode" class="form-group row">
		<label id="elh_pharmacy_products_DivisionCode" for="x_DivisionCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DivisionCode->caption() ?><?php echo ($pharmacy_products->DivisionCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DivisionCode->cellAttributes() ?>>
<span id="el_pharmacy_products_DivisionCode">
<input type="text" data-table="pharmacy_products" data-field="x_DivisionCode" name="x_DivisionCode" id="x_DivisionCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products->DivisionCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DivisionCode->EditValue ?>"<?php echo $pharmacy_products->DivisionCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DivisionCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ManufacturerCode->Visible) { // ManufacturerCode ?>
	<div id="r_ManufacturerCode" class="form-group row">
		<label id="elh_pharmacy_products_ManufacturerCode" for="x_ManufacturerCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ManufacturerCode->caption() ?><?php echo ($pharmacy_products->ManufacturerCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ManufacturerCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ManufacturerCode">
<input type="text" data-table="pharmacy_products" data-field="x_ManufacturerCode" name="x_ManufacturerCode" id="x_ManufacturerCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products->ManufacturerCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ManufacturerCode->EditValue ?>"<?php echo $pharmacy_products->ManufacturerCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ManufacturerCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SupplierCode->Visible) { // SupplierCode ?>
	<div id="r_SupplierCode" class="form-group row">
		<label id="elh_pharmacy_products_SupplierCode" for="x_SupplierCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SupplierCode->caption() ?><?php echo ($pharmacy_products->SupplierCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SupplierCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SupplierCode">
<input type="text" data-table="pharmacy_products" data-field="x_SupplierCode" name="x_SupplierCode" id="x_SupplierCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products->SupplierCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SupplierCode->EditValue ?>"<?php echo $pharmacy_products->SupplierCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SupplierCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
	<div id="r_AlternateSupplierCodes" class="form-group row">
		<label id="elh_pharmacy_products_AlternateSupplierCodes" for="x_AlternateSupplierCodes" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AlternateSupplierCodes->caption() ?><?php echo ($pharmacy_products->AlternateSupplierCodes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSupplierCodes">
<input type="text" data-table="pharmacy_products" data-field="x_AlternateSupplierCodes" name="x_AlternateSupplierCodes" id="x_AlternateSupplierCodes" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_products->AlternateSupplierCodes->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AlternateSupplierCodes->EditValue ?>"<?php echo $pharmacy_products->AlternateSupplierCodes->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AlternateSupplierCodes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AlternateProductCode->Visible) { // AlternateProductCode ?>
	<div id="r_AlternateProductCode" class="form-group row">
		<label id="elh_pharmacy_products_AlternateProductCode" for="x_AlternateProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AlternateProductCode->caption() ?><?php echo ($pharmacy_products->AlternateProductCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AlternateProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_AlternateProductCode" name="x_AlternateProductCode" id="x_AlternateProductCode" size="30" maxlength="120" placeholder="<?php echo HtmlEncode($pharmacy_products->AlternateProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AlternateProductCode->EditValue ?>"<?php echo $pharmacy_products->AlternateProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AlternateProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->UniversalProductCode->Visible) { // UniversalProductCode ?>
	<div id="r_UniversalProductCode" class="form-group row">
		<label id="elh_pharmacy_products_UniversalProductCode" for="x_UniversalProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->UniversalProductCode->caption() ?><?php echo ($pharmacy_products->UniversalProductCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->UniversalProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_UniversalProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_UniversalProductCode" name="x_UniversalProductCode" id="x_UniversalProductCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->UniversalProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->UniversalProductCode->EditValue ?>"<?php echo $pharmacy_products->UniversalProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->UniversalProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BookProductCode->Visible) { // BookProductCode ?>
	<div id="r_BookProductCode" class="form-group row">
		<label id="elh_pharmacy_products_BookProductCode" for="x_BookProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BookProductCode->caption() ?><?php echo ($pharmacy_products->BookProductCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BookProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BookProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_BookProductCode" name="x_BookProductCode" id="x_BookProductCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->BookProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BookProductCode->EditValue ?>"<?php echo $pharmacy_products->BookProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BookProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->OldCode->Visible) { // OldCode ?>
	<div id="r_OldCode" class="form-group row">
		<label id="elh_pharmacy_products_OldCode" for="x_OldCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->OldCode->caption() ?><?php echo ($pharmacy_products->OldCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->OldCode->cellAttributes() ?>>
<span id="el_pharmacy_products_OldCode">
<input type="text" data-table="pharmacy_products" data-field="x_OldCode" name="x_OldCode" id="x_OldCode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->OldCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->OldCode->EditValue ?>"<?php echo $pharmacy_products->OldCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->OldCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProtectedProducts->Visible) { // ProtectedProducts ?>
	<div id="r_ProtectedProducts" class="form-group row">
		<label id="elh_pharmacy_products_ProtectedProducts" for="x_ProtectedProducts" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProtectedProducts->caption() ?><?php echo ($pharmacy_products->ProtectedProducts->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProtectedProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_ProtectedProducts">
<input type="text" data-table="pharmacy_products" data-field="x_ProtectedProducts" name="x_ProtectedProducts" id="x_ProtectedProducts" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProtectedProducts->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProtectedProducts->EditValue ?>"<?php echo $pharmacy_products->ProtectedProducts->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProtectedProducts->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductFullName->Visible) { // ProductFullName ?>
	<div id="r_ProductFullName" class="form-group row">
		<label id="elh_pharmacy_products_ProductFullName" for="x_ProductFullName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductFullName->caption() ?><?php echo ($pharmacy_products->ProductFullName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductFullName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductFullName">
<input type="text" data-table="pharmacy_products" data-field="x_ProductFullName" name="x_ProductFullName" id="x_ProductFullName" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductFullName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductFullName->EditValue ?>"<?php echo $pharmacy_products->ProductFullName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductFullName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
	<div id="r_UnitOfMeasure" class="form-group row">
		<label id="elh_pharmacy_products_UnitOfMeasure" for="x_UnitOfMeasure" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->UnitOfMeasure->caption() ?><?php echo ($pharmacy_products->UnitOfMeasure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->UnitOfMeasure->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitOfMeasure">
<input type="text" data-table="pharmacy_products" data-field="x_UnitOfMeasure" name="x_UnitOfMeasure" id="x_UnitOfMeasure" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->UnitOfMeasure->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->UnitOfMeasure->EditValue ?>"<?php echo $pharmacy_products->UnitOfMeasure->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->UnitOfMeasure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->UnitDescription->Visible) { // UnitDescription ?>
	<div id="r_UnitDescription" class="form-group row">
		<label id="elh_pharmacy_products_UnitDescription" for="x_UnitDescription" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->UnitDescription->caption() ?><?php echo ($pharmacy_products->UnitDescription->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->UnitDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitDescription">
<input type="text" data-table="pharmacy_products" data-field="x_UnitDescription" name="x_UnitDescription" id="x_UnitDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->UnitDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->UnitDescription->EditValue ?>"<?php echo $pharmacy_products->UnitDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->UnitDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BulkDescription->Visible) { // BulkDescription ?>
	<div id="r_BulkDescription" class="form-group row">
		<label id="elh_pharmacy_products_BulkDescription" for="x_BulkDescription" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BulkDescription->caption() ?><?php echo ($pharmacy_products->BulkDescription->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BulkDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BulkDescription">
<input type="text" data-table="pharmacy_products" data-field="x_BulkDescription" name="x_BulkDescription" id="x_BulkDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->BulkDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BulkDescription->EditValue ?>"<?php echo $pharmacy_products->BulkDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BulkDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDescription->Visible) { // BarCodeDescription ?>
	<div id="r_BarCodeDescription" class="form-group row">
		<label id="elh_pharmacy_products_BarCodeDescription" for="x_BarCodeDescription" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BarCodeDescription->caption() ?><?php echo ($pharmacy_products->BarCodeDescription->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BarCodeDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDescription">
<input type="text" data-table="pharmacy_products" data-field="x_BarCodeDescription" name="x_BarCodeDescription" id="x_BarCodeDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->BarCodeDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BarCodeDescription->EditValue ?>"<?php echo $pharmacy_products->BarCodeDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BarCodeDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PackageInformation->Visible) { // PackageInformation ?>
	<div id="r_PackageInformation" class="form-group row">
		<label id="elh_pharmacy_products_PackageInformation" for="x_PackageInformation" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PackageInformation->caption() ?><?php echo ($pharmacy_products->PackageInformation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageInformation">
<input type="text" data-table="pharmacy_products" data-field="x_PackageInformation" name="x_PackageInformation" id="x_PackageInformation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->PackageInformation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PackageInformation->EditValue ?>"<?php echo $pharmacy_products->PackageInformation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PackageInformation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PackageId->Visible) { // PackageId ?>
	<div id="r_PackageId" class="form-group row">
		<label id="elh_pharmacy_products_PackageId" for="x_PackageId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PackageId->caption() ?><?php echo ($pharmacy_products->PackageId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PackageId->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageId">
<input type="text" data-table="pharmacy_products" data-field="x_PackageId" name="x_PackageId" id="x_PackageId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PackageId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PackageId->EditValue ?>"<?php echo $pharmacy_products->PackageId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PackageId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Weight->Visible) { // Weight ?>
	<div id="r_Weight" class="form-group row">
		<label id="elh_pharmacy_products_Weight" for="x_Weight" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Weight->caption() ?><?php echo ($pharmacy_products->Weight->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Weight->cellAttributes() ?>>
<span id="el_pharmacy_products_Weight">
<input type="text" data-table="pharmacy_products" data-field="x_Weight" name="x_Weight" id="x_Weight" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->Weight->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Weight->EditValue ?>"<?php echo $pharmacy_products->Weight->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Weight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AllowFractions->Visible) { // AllowFractions ?>
	<div id="r_AllowFractions" class="form-group row">
		<label id="elh_pharmacy_products_AllowFractions" for="x_AllowFractions" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AllowFractions->caption() ?><?php echo ($pharmacy_products->AllowFractions->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AllowFractions->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowFractions">
<input type="text" data-table="pharmacy_products" data-field="x_AllowFractions" name="x_AllowFractions" id="x_AllowFractions" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AllowFractions->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AllowFractions->EditValue ?>"<?php echo $pharmacy_products->AllowFractions->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AllowFractions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
	<div id="r_MinimumStockLevel" class="form-group row">
		<label id="elh_pharmacy_products_MinimumStockLevel" for="x_MinimumStockLevel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MinimumStockLevel->caption() ?><?php echo ($pharmacy_products->MinimumStockLevel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MinimumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumStockLevel">
<input type="text" data-table="pharmacy_products" data-field="x_MinimumStockLevel" name="x_MinimumStockLevel" id="x_MinimumStockLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MinimumStockLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MinimumStockLevel->EditValue ?>"<?php echo $pharmacy_products->MinimumStockLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MinimumStockLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
	<div id="r_MaximumStockLevel" class="form-group row">
		<label id="elh_pharmacy_products_MaximumStockLevel" for="x_MaximumStockLevel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MaximumStockLevel->caption() ?><?php echo ($pharmacy_products->MaximumStockLevel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MaximumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MaximumStockLevel">
<input type="text" data-table="pharmacy_products" data-field="x_MaximumStockLevel" name="x_MaximumStockLevel" id="x_MaximumStockLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MaximumStockLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MaximumStockLevel->EditValue ?>"<?php echo $pharmacy_products->MaximumStockLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MaximumStockLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ReorderLevel->Visible) { // ReorderLevel ?>
	<div id="r_ReorderLevel" class="form-group row">
		<label id="elh_pharmacy_products_ReorderLevel" for="x_ReorderLevel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ReorderLevel->caption() ?><?php echo ($pharmacy_products->ReorderLevel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ReorderLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_ReorderLevel">
<input type="text" data-table="pharmacy_products" data-field="x_ReorderLevel" name="x_ReorderLevel" id="x_ReorderLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ReorderLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ReorderLevel->EditValue ?>"<?php echo $pharmacy_products->ReorderLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ReorderLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MinMaxRatio->Visible) { // MinMaxRatio ?>
	<div id="r_MinMaxRatio" class="form-group row">
		<label id="elh_pharmacy_products_MinMaxRatio" for="x_MinMaxRatio" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MinMaxRatio->caption() ?><?php echo ($pharmacy_products->MinMaxRatio->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxRatio">
<input type="text" data-table="pharmacy_products" data-field="x_MinMaxRatio" name="x_MinMaxRatio" id="x_MinMaxRatio" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MinMaxRatio->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MinMaxRatio->EditValue ?>"<?php echo $pharmacy_products->MinMaxRatio->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MinMaxRatio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
	<div id="r_AutoMinMaxRatio" class="form-group row">
		<label id="elh_pharmacy_products_AutoMinMaxRatio" for="x_AutoMinMaxRatio" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AutoMinMaxRatio->caption() ?><?php echo ($pharmacy_products->AutoMinMaxRatio->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_AutoMinMaxRatio">
<input type="text" data-table="pharmacy_products" data-field="x_AutoMinMaxRatio" name="x_AutoMinMaxRatio" id="x_AutoMinMaxRatio" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AutoMinMaxRatio->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AutoMinMaxRatio->EditValue ?>"<?php echo $pharmacy_products->AutoMinMaxRatio->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AutoMinMaxRatio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ScheduleCode->Visible) { // ScheduleCode ?>
	<div id="r_ScheduleCode" class="form-group row">
		<label id="elh_pharmacy_products_ScheduleCode" for="x_ScheduleCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ScheduleCode->caption() ?><?php echo ($pharmacy_products->ScheduleCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ScheduleCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleCode">
<input type="text" data-table="pharmacy_products" data-field="x_ScheduleCode" name="x_ScheduleCode" id="x_ScheduleCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ScheduleCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ScheduleCode->EditValue ?>"<?php echo $pharmacy_products->ScheduleCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ScheduleCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->RopRatio->Visible) { // RopRatio ?>
	<div id="r_RopRatio" class="form-group row">
		<label id="elh_pharmacy_products_RopRatio" for="x_RopRatio" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->RopRatio->caption() ?><?php echo ($pharmacy_products->RopRatio->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->RopRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_RopRatio">
<input type="text" data-table="pharmacy_products" data-field="x_RopRatio" name="x_RopRatio" id="x_RopRatio" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->RopRatio->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->RopRatio->EditValue ?>"<?php echo $pharmacy_products->RopRatio->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->RopRatio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_products_MRP" for="x_MRP" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MRP->caption() ?><?php echo ($pharmacy_products->MRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MRP->cellAttributes() ?>>
<span id="el_pharmacy_products_MRP">
<input type="text" data-table="pharmacy_products" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MRP->EditValue ?>"<?php echo $pharmacy_products->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PurchasePrice->Visible) { // PurchasePrice ?>
	<div id="r_PurchasePrice" class="form-group row">
		<label id="elh_pharmacy_products_PurchasePrice" for="x_PurchasePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PurchasePrice->caption() ?><?php echo ($pharmacy_products->PurchasePrice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PurchasePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchasePrice">
<input type="text" data-table="pharmacy_products" data-field="x_PurchasePrice" name="x_PurchasePrice" id="x_PurchasePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PurchasePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PurchasePrice->EditValue ?>"<?php echo $pharmacy_products->PurchasePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PurchasePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PurchaseUnit->Visible) { // PurchaseUnit ?>
	<div id="r_PurchaseUnit" class="form-group row">
		<label id="elh_pharmacy_products_PurchaseUnit" for="x_PurchaseUnit" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PurchaseUnit->caption() ?><?php echo ($pharmacy_products->PurchaseUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PurchaseUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseUnit">
<input type="text" data-table="pharmacy_products" data-field="x_PurchaseUnit" name="x_PurchaseUnit" id="x_PurchaseUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PurchaseUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PurchaseUnit->EditValue ?>"<?php echo $pharmacy_products->PurchaseUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PurchaseUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
	<div id="r_PurchaseTaxCode" class="form-group row">
		<label id="elh_pharmacy_products_PurchaseTaxCode" for="x_PurchaseTaxCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PurchaseTaxCode->caption() ?><?php echo ($pharmacy_products->PurchaseTaxCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PurchaseTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseTaxCode">
<input type="text" data-table="pharmacy_products" data-field="x_PurchaseTaxCode" name="x_PurchaseTaxCode" id="x_PurchaseTaxCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PurchaseTaxCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PurchaseTaxCode->EditValue ?>"<?php echo $pharmacy_products->PurchaseTaxCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PurchaseTaxCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AllowDirectInward->Visible) { // AllowDirectInward ?>
	<div id="r_AllowDirectInward" class="form-group row">
		<label id="elh_pharmacy_products_AllowDirectInward" for="x_AllowDirectInward" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AllowDirectInward->caption() ?><?php echo ($pharmacy_products->AllowDirectInward->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AllowDirectInward->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowDirectInward">
<input type="text" data-table="pharmacy_products" data-field="x_AllowDirectInward" name="x_AllowDirectInward" id="x_AllowDirectInward" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AllowDirectInward->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AllowDirectInward->EditValue ?>"<?php echo $pharmacy_products->AllowDirectInward->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AllowDirectInward->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SalePrice->Visible) { // SalePrice ?>
	<div id="r_SalePrice" class="form-group row">
		<label id="elh_pharmacy_products_SalePrice" for="x_SalePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SalePrice->caption() ?><?php echo ($pharmacy_products->SalePrice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePrice">
<input type="text" data-table="pharmacy_products" data-field="x_SalePrice" name="x_SalePrice" id="x_SalePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SalePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SalePrice->EditValue ?>"<?php echo $pharmacy_products->SalePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SalePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SaleUnit->Visible) { // SaleUnit ?>
	<div id="r_SaleUnit" class="form-group row">
		<label id="elh_pharmacy_products_SaleUnit" for="x_SaleUnit" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SaleUnit->caption() ?><?php echo ($pharmacy_products->SaleUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SaleUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleUnit">
<input type="text" data-table="pharmacy_products" data-field="x_SaleUnit" name="x_SaleUnit" id="x_SaleUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SaleUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SaleUnit->EditValue ?>"<?php echo $pharmacy_products->SaleUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SaleUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SalesTaxCode->Visible) { // SalesTaxCode ?>
	<div id="r_SalesTaxCode" class="form-group row">
		<label id="elh_pharmacy_products_SalesTaxCode" for="x_SalesTaxCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SalesTaxCode->caption() ?><?php echo ($pharmacy_products->SalesTaxCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SalesTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesTaxCode">
<input type="text" data-table="pharmacy_products" data-field="x_SalesTaxCode" name="x_SalesTaxCode" id="x_SalesTaxCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SalesTaxCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SalesTaxCode->EditValue ?>"<?php echo $pharmacy_products->SalesTaxCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SalesTaxCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->StockReceived->Visible) { // StockReceived ?>
	<div id="r_StockReceived" class="form-group row">
		<label id="elh_pharmacy_products_StockReceived" for="x_StockReceived" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->StockReceived->caption() ?><?php echo ($pharmacy_products->StockReceived->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->StockReceived->cellAttributes() ?>>
<span id="el_pharmacy_products_StockReceived">
<input type="text" data-table="pharmacy_products" data-field="x_StockReceived" name="x_StockReceived" id="x_StockReceived" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->StockReceived->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->StockReceived->EditValue ?>"<?php echo $pharmacy_products->StockReceived->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->StockReceived->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TotalStock->Visible) { // TotalStock ?>
	<div id="r_TotalStock" class="form-group row">
		<label id="elh_pharmacy_products_TotalStock" for="x_TotalStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TotalStock->caption() ?><?php echo ($pharmacy_products->TotalStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TotalStock->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalStock">
<input type="text" data-table="pharmacy_products" data-field="x_TotalStock" name="x_TotalStock" id="x_TotalStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->TotalStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TotalStock->EditValue ?>"<?php echo $pharmacy_products->TotalStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TotalStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->StockType->Visible) { // StockType ?>
	<div id="r_StockType" class="form-group row">
		<label id="elh_pharmacy_products_StockType" for="x_StockType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->StockType->caption() ?><?php echo ($pharmacy_products->StockType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->StockType->cellAttributes() ?>>
<span id="el_pharmacy_products_StockType">
<input type="text" data-table="pharmacy_products" data-field="x_StockType" name="x_StockType" id="x_StockType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->StockType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->StockType->EditValue ?>"<?php echo $pharmacy_products->StockType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->StockType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->StockCheckDate->Visible) { // StockCheckDate ?>
	<div id="r_StockCheckDate" class="form-group row">
		<label id="elh_pharmacy_products_StockCheckDate" for="x_StockCheckDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->StockCheckDate->caption() ?><?php echo ($pharmacy_products->StockCheckDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->StockCheckDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCheckDate">
<input type="text" data-table="pharmacy_products" data-field="x_StockCheckDate" name="x_StockCheckDate" id="x_StockCheckDate" placeholder="<?php echo HtmlEncode($pharmacy_products->StockCheckDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->StockCheckDate->EditValue ?>"<?php echo $pharmacy_products->StockCheckDate->editAttributes() ?>>
<?php if (!$pharmacy_products->StockCheckDate->ReadOnly && !$pharmacy_products->StockCheckDate->Disabled && !isset($pharmacy_products->StockCheckDate->EditAttrs["readonly"]) && !isset($pharmacy_products->StockCheckDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_StockCheckDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->StockCheckDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
	<div id="r_StockAdjustmentDate" class="form-group row">
		<label id="elh_pharmacy_products_StockAdjustmentDate" for="x_StockAdjustmentDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->StockAdjustmentDate->caption() ?><?php echo ($pharmacy_products->StockAdjustmentDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->StockAdjustmentDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockAdjustmentDate">
<input type="text" data-table="pharmacy_products" data-field="x_StockAdjustmentDate" name="x_StockAdjustmentDate" id="x_StockAdjustmentDate" placeholder="<?php echo HtmlEncode($pharmacy_products->StockAdjustmentDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->StockAdjustmentDate->EditValue ?>"<?php echo $pharmacy_products->StockAdjustmentDate->editAttributes() ?>>
<?php if (!$pharmacy_products->StockAdjustmentDate->ReadOnly && !$pharmacy_products->StockAdjustmentDate->Disabled && !isset($pharmacy_products->StockAdjustmentDate->EditAttrs["readonly"]) && !isset($pharmacy_products->StockAdjustmentDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_StockAdjustmentDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->StockAdjustmentDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_products_Remarks" for="x_Remarks" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Remarks->caption() ?><?php echo ($pharmacy_products->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_products_Remarks">
<input type="text" data-table="pharmacy_products" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Remarks->EditValue ?>"<?php echo $pharmacy_products->Remarks->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CostCentre->Visible) { // CostCentre ?>
	<div id="r_CostCentre" class="form-group row">
		<label id="elh_pharmacy_products_CostCentre" for="x_CostCentre" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CostCentre->caption() ?><?php echo ($pharmacy_products->CostCentre->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CostCentre->cellAttributes() ?>>
<span id="el_pharmacy_products_CostCentre">
<input type="text" data-table="pharmacy_products" data-field="x_CostCentre" name="x_CostCentre" id="x_CostCentre" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->CostCentre->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CostCentre->EditValue ?>"<?php echo $pharmacy_products->CostCentre->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CostCentre->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductType->Visible) { // ProductType ?>
	<div id="r_ProductType" class="form-group row">
		<label id="elh_pharmacy_products_ProductType" for="x_ProductType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductType->caption() ?><?php echo ($pharmacy_products->ProductType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductType->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductType">
<input type="text" data-table="pharmacy_products" data-field="x_ProductType" name="x_ProductType" id="x_ProductType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductType->EditValue ?>"<?php echo $pharmacy_products->ProductType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TaxAmount->Visible) { // TaxAmount ?>
	<div id="r_TaxAmount" class="form-group row">
		<label id="elh_pharmacy_products_TaxAmount" for="x_TaxAmount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TaxAmount->caption() ?><?php echo ($pharmacy_products->TaxAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TaxAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxAmount">
<input type="text" data-table="pharmacy_products" data-field="x_TaxAmount" name="x_TaxAmount" id="x_TaxAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->TaxAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TaxAmount->EditValue ?>"<?php echo $pharmacy_products->TaxAmount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TaxAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TaxId->Visible) { // TaxId ?>
	<div id="r_TaxId" class="form-group row">
		<label id="elh_pharmacy_products_TaxId" for="x_TaxId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TaxId->caption() ?><?php echo ($pharmacy_products->TaxId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TaxId->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxId">
<input type="text" data-table="pharmacy_products" data-field="x_TaxId" name="x_TaxId" id="x_TaxId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->TaxId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TaxId->EditValue ?>"<?php echo $pharmacy_products->TaxId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TaxId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
	<div id="r_ResaleTaxApplicable" class="form-group row">
		<label id="elh_pharmacy_products_ResaleTaxApplicable" for="x_ResaleTaxApplicable" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ResaleTaxApplicable->caption() ?><?php echo ($pharmacy_products->ResaleTaxApplicable->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ResaleTaxApplicable">
<input type="text" data-table="pharmacy_products" data-field="x_ResaleTaxApplicable" name="x_ResaleTaxApplicable" id="x_ResaleTaxApplicable" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ResaleTaxApplicable->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ResaleTaxApplicable->EditValue ?>"<?php echo $pharmacy_products->ResaleTaxApplicable->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ResaleTaxApplicable->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CstOtherTax->Visible) { // CstOtherTax ?>
	<div id="r_CstOtherTax" class="form-group row">
		<label id="elh_pharmacy_products_CstOtherTax" for="x_CstOtherTax" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CstOtherTax->caption() ?><?php echo ($pharmacy_products->CstOtherTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CstOtherTax->cellAttributes() ?>>
<span id="el_pharmacy_products_CstOtherTax">
<input type="text" data-table="pharmacy_products" data-field="x_CstOtherTax" name="x_CstOtherTax" id="x_CstOtherTax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->CstOtherTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CstOtherTax->EditValue ?>"<?php echo $pharmacy_products->CstOtherTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CstOtherTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TotalTax->Visible) { // TotalTax ?>
	<div id="r_TotalTax" class="form-group row">
		<label id="elh_pharmacy_products_TotalTax" for="x_TotalTax" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TotalTax->caption() ?><?php echo ($pharmacy_products->TotalTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TotalTax->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalTax">
<input type="text" data-table="pharmacy_products" data-field="x_TotalTax" name="x_TotalTax" id="x_TotalTax" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->TotalTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TotalTax->EditValue ?>"<?php echo $pharmacy_products->TotalTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TotalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ItemCost->Visible) { // ItemCost ?>
	<div id="r_ItemCost" class="form-group row">
		<label id="elh_pharmacy_products_ItemCost" for="x_ItemCost" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ItemCost->caption() ?><?php echo ($pharmacy_products->ItemCost->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ItemCost">
<input type="text" data-table="pharmacy_products" data-field="x_ItemCost" name="x_ItemCost" id="x_ItemCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ItemCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ItemCost->EditValue ?>"<?php echo $pharmacy_products->ItemCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ItemCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ExpiryDate->Visible) { // ExpiryDate ?>
	<div id="r_ExpiryDate" class="form-group row">
		<label id="elh_pharmacy_products_ExpiryDate" for="x_ExpiryDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ExpiryDate->caption() ?><?php echo ($pharmacy_products->ExpiryDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ExpiryDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryDate">
<input type="text" data-table="pharmacy_products" data-field="x_ExpiryDate" name="x_ExpiryDate" id="x_ExpiryDate" placeholder="<?php echo HtmlEncode($pharmacy_products->ExpiryDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ExpiryDate->EditValue ?>"<?php echo $pharmacy_products->ExpiryDate->editAttributes() ?>>
<?php if (!$pharmacy_products->ExpiryDate->ReadOnly && !$pharmacy_products->ExpiryDate->Disabled && !isset($pharmacy_products->ExpiryDate->EditAttrs["readonly"]) && !isset($pharmacy_products->ExpiryDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_ExpiryDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->ExpiryDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BatchDescription->Visible) { // BatchDescription ?>
	<div id="r_BatchDescription" class="form-group row">
		<label id="elh_pharmacy_products_BatchDescription" for="x_BatchDescription" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BatchDescription->caption() ?><?php echo ($pharmacy_products->BatchDescription->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BatchDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchDescription">
<input type="text" data-table="pharmacy_products" data-field="x_BatchDescription" name="x_BatchDescription" id="x_BatchDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->BatchDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BatchDescription->EditValue ?>"<?php echo $pharmacy_products->BatchDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BatchDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FreeScheme->Visible) { // FreeScheme ?>
	<div id="r_FreeScheme" class="form-group row">
		<label id="elh_pharmacy_products_FreeScheme" for="x_FreeScheme" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FreeScheme->caption() ?><?php echo ($pharmacy_products->FreeScheme->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FreeScheme->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeScheme">
<input type="text" data-table="pharmacy_products" data-field="x_FreeScheme" name="x_FreeScheme" id="x_FreeScheme" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->FreeScheme->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FreeScheme->EditValue ?>"<?php echo $pharmacy_products->FreeScheme->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->FreeScheme->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
	<div id="r_CashDiscountEligibility" class="form-group row">
		<label id="elh_pharmacy_products_CashDiscountEligibility" for="x_CashDiscountEligibility" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CashDiscountEligibility->caption() ?><?php echo ($pharmacy_products->CashDiscountEligibility->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CashDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_CashDiscountEligibility">
<input type="text" data-table="pharmacy_products" data-field="x_CashDiscountEligibility" name="x_CashDiscountEligibility" id="x_CashDiscountEligibility" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->CashDiscountEligibility->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CashDiscountEligibility->EditValue ?>"<?php echo $pharmacy_products->CashDiscountEligibility->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CashDiscountEligibility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
	<div id="r_DiscountPerAllowInBill" class="form-group row">
		<label id="elh_pharmacy_products_DiscountPerAllowInBill" for="x_DiscountPerAllowInBill" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DiscountPerAllowInBill->caption() ?><?php echo ($pharmacy_products->DiscountPerAllowInBill->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountPerAllowInBill">
<input type="text" data-table="pharmacy_products" data-field="x_DiscountPerAllowInBill" name="x_DiscountPerAllowInBill" id="x_DiscountPerAllowInBill" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DiscountPerAllowInBill->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DiscountPerAllowInBill->EditValue ?>"<?php echo $pharmacy_products->DiscountPerAllowInBill->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DiscountPerAllowInBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_pharmacy_products_Discount" for="x_Discount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Discount->caption() ?><?php echo ($pharmacy_products->Discount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Discount->cellAttributes() ?>>
<span id="el_pharmacy_products_Discount">
<input type="text" data-table="pharmacy_products" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->Discount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Discount->EditValue ?>"<?php echo $pharmacy_products->Discount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TotalAmount->Visible) { // TotalAmount ?>
	<div id="r_TotalAmount" class="form-group row">
		<label id="elh_pharmacy_products_TotalAmount" for="x_TotalAmount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TotalAmount->caption() ?><?php echo ($pharmacy_products->TotalAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TotalAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalAmount">
<input type="text" data-table="pharmacy_products" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TotalAmount->EditValue ?>"<?php echo $pharmacy_products->TotalAmount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TotalAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->StandardMargin->Visible) { // StandardMargin ?>
	<div id="r_StandardMargin" class="form-group row">
		<label id="elh_pharmacy_products_StandardMargin" for="x_StandardMargin" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->StandardMargin->caption() ?><?php echo ($pharmacy_products->StandardMargin->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->StandardMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_StandardMargin">
<input type="text" data-table="pharmacy_products" data-field="x_StandardMargin" name="x_StandardMargin" id="x_StandardMargin" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->StandardMargin->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->StandardMargin->EditValue ?>"<?php echo $pharmacy_products->StandardMargin->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->StandardMargin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Margin->Visible) { // Margin ?>
	<div id="r_Margin" class="form-group row">
		<label id="elh_pharmacy_products_Margin" for="x_Margin" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Margin->caption() ?><?php echo ($pharmacy_products->Margin->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Margin->cellAttributes() ?>>
<span id="el_pharmacy_products_Margin">
<input type="text" data-table="pharmacy_products" data-field="x_Margin" name="x_Margin" id="x_Margin" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->Margin->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Margin->EditValue ?>"<?php echo $pharmacy_products->Margin->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Margin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MarginId->Visible) { // MarginId ?>
	<div id="r_MarginId" class="form-group row">
		<label id="elh_pharmacy_products_MarginId" for="x_MarginId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MarginId->caption() ?><?php echo ($pharmacy_products->MarginId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MarginId->cellAttributes() ?>>
<span id="el_pharmacy_products_MarginId">
<input type="text" data-table="pharmacy_products" data-field="x_MarginId" name="x_MarginId" id="x_MarginId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MarginId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MarginId->EditValue ?>"<?php echo $pharmacy_products->MarginId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MarginId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ExpectedMargin->Visible) { // ExpectedMargin ?>
	<div id="r_ExpectedMargin" class="form-group row">
		<label id="elh_pharmacy_products_ExpectedMargin" for="x_ExpectedMargin" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ExpectedMargin->caption() ?><?php echo ($pharmacy_products->ExpectedMargin->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ExpectedMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpectedMargin">
<input type="text" data-table="pharmacy_products" data-field="x_ExpectedMargin" name="x_ExpectedMargin" id="x_ExpectedMargin" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ExpectedMargin->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ExpectedMargin->EditValue ?>"<?php echo $pharmacy_products->ExpectedMargin->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ExpectedMargin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
	<div id="r_SurchargeBeforeTax" class="form-group row">
		<label id="elh_pharmacy_products_SurchargeBeforeTax" for="x_SurchargeBeforeTax" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SurchargeBeforeTax->caption() ?><?php echo ($pharmacy_products->SurchargeBeforeTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeBeforeTax">
<input type="text" data-table="pharmacy_products" data-field="x_SurchargeBeforeTax" name="x_SurchargeBeforeTax" id="x_SurchargeBeforeTax" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SurchargeBeforeTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SurchargeBeforeTax->EditValue ?>"<?php echo $pharmacy_products->SurchargeBeforeTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SurchargeBeforeTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
	<div id="r_SurchargeAfterTax" class="form-group row">
		<label id="elh_pharmacy_products_SurchargeAfterTax" for="x_SurchargeAfterTax" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SurchargeAfterTax->caption() ?><?php echo ($pharmacy_products->SurchargeAfterTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SurchargeAfterTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeAfterTax">
<input type="text" data-table="pharmacy_products" data-field="x_SurchargeAfterTax" name="x_SurchargeAfterTax" id="x_SurchargeAfterTax" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SurchargeAfterTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SurchargeAfterTax->EditValue ?>"<?php echo $pharmacy_products->SurchargeAfterTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SurchargeAfterTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TempOrderNo->Visible) { // TempOrderNo ?>
	<div id="r_TempOrderNo" class="form-group row">
		<label id="elh_pharmacy_products_TempOrderNo" for="x_TempOrderNo" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TempOrderNo->caption() ?><?php echo ($pharmacy_products->TempOrderNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TempOrderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderNo">
<input type="text" data-table="pharmacy_products" data-field="x_TempOrderNo" name="x_TempOrderNo" id="x_TempOrderNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->TempOrderNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TempOrderNo->EditValue ?>"<?php echo $pharmacy_products->TempOrderNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TempOrderNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TempOrderDate->Visible) { // TempOrderDate ?>
	<div id="r_TempOrderDate" class="form-group row">
		<label id="elh_pharmacy_products_TempOrderDate" for="x_TempOrderDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TempOrderDate->caption() ?><?php echo ($pharmacy_products->TempOrderDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TempOrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderDate">
<input type="text" data-table="pharmacy_products" data-field="x_TempOrderDate" name="x_TempOrderDate" id="x_TempOrderDate" placeholder="<?php echo HtmlEncode($pharmacy_products->TempOrderDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TempOrderDate->EditValue ?>"<?php echo $pharmacy_products->TempOrderDate->editAttributes() ?>>
<?php if (!$pharmacy_products->TempOrderDate->ReadOnly && !$pharmacy_products->TempOrderDate->Disabled && !isset($pharmacy_products->TempOrderDate->EditAttrs["readonly"]) && !isset($pharmacy_products->TempOrderDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_TempOrderDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->TempOrderDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->OrderUnit->Visible) { // OrderUnit ?>
	<div id="r_OrderUnit" class="form-group row">
		<label id="elh_pharmacy_products_OrderUnit" for="x_OrderUnit" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->OrderUnit->caption() ?><?php echo ($pharmacy_products->OrderUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->OrderUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderUnit">
<input type="text" data-table="pharmacy_products" data-field="x_OrderUnit" name="x_OrderUnit" id="x_OrderUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->OrderUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->OrderUnit->EditValue ?>"<?php echo $pharmacy_products->OrderUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->OrderUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->OrderQuantity->Visible) { // OrderQuantity ?>
	<div id="r_OrderQuantity" class="form-group row">
		<label id="elh_pharmacy_products_OrderQuantity" for="x_OrderQuantity" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->OrderQuantity->caption() ?><?php echo ($pharmacy_products->OrderQuantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->OrderQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderQuantity">
<input type="text" data-table="pharmacy_products" data-field="x_OrderQuantity" name="x_OrderQuantity" id="x_OrderQuantity" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->OrderQuantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->OrderQuantity->EditValue ?>"<?php echo $pharmacy_products->OrderQuantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->OrderQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MarkForOrder->Visible) { // MarkForOrder ?>
	<div id="r_MarkForOrder" class="form-group row">
		<label id="elh_pharmacy_products_MarkForOrder" for="x_MarkForOrder" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MarkForOrder->caption() ?><?php echo ($pharmacy_products->MarkForOrder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MarkForOrder->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkForOrder">
<input type="text" data-table="pharmacy_products" data-field="x_MarkForOrder" name="x_MarkForOrder" id="x_MarkForOrder" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MarkForOrder->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MarkForOrder->EditValue ?>"<?php echo $pharmacy_products->MarkForOrder->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MarkForOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->OrderAllId->Visible) { // OrderAllId ?>
	<div id="r_OrderAllId" class="form-group row">
		<label id="elh_pharmacy_products_OrderAllId" for="x_OrderAllId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->OrderAllId->caption() ?><?php echo ($pharmacy_products->OrderAllId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->OrderAllId->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderAllId">
<input type="text" data-table="pharmacy_products" data-field="x_OrderAllId" name="x_OrderAllId" id="x_OrderAllId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->OrderAllId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->OrderAllId->EditValue ?>"<?php echo $pharmacy_products->OrderAllId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->OrderAllId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
	<div id="r_CalculateOrderQty" class="form-group row">
		<label id="elh_pharmacy_products_CalculateOrderQty" for="x_CalculateOrderQty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CalculateOrderQty->caption() ?><?php echo ($pharmacy_products->CalculateOrderQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CalculateOrderQty->cellAttributes() ?>>
<span id="el_pharmacy_products_CalculateOrderQty">
<input type="text" data-table="pharmacy_products" data-field="x_CalculateOrderQty" name="x_CalculateOrderQty" id="x_CalculateOrderQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->CalculateOrderQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CalculateOrderQty->EditValue ?>"<?php echo $pharmacy_products->CalculateOrderQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CalculateOrderQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SubLocation->Visible) { // SubLocation ?>
	<div id="r_SubLocation" class="form-group row">
		<label id="elh_pharmacy_products_SubLocation" for="x_SubLocation" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SubLocation->caption() ?><?php echo ($pharmacy_products->SubLocation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SubLocation->cellAttributes() ?>>
<span id="el_pharmacy_products_SubLocation">
<input type="text" data-table="pharmacy_products" data-field="x_SubLocation" name="x_SubLocation" id="x_SubLocation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->SubLocation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SubLocation->EditValue ?>"<?php echo $pharmacy_products->SubLocation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SubLocation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CategoryCode->Visible) { // CategoryCode ?>
	<div id="r_CategoryCode" class="form-group row">
		<label id="elh_pharmacy_products_CategoryCode" for="x_CategoryCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CategoryCode->caption() ?><?php echo ($pharmacy_products->CategoryCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CategoryCode">
<input type="text" data-table="pharmacy_products" data-field="x_CategoryCode" name="x_CategoryCode" id="x_CategoryCode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->CategoryCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CategoryCode->EditValue ?>"<?php echo $pharmacy_products->CategoryCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CategoryCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SubCategory->Visible) { // SubCategory ?>
	<div id="r_SubCategory" class="form-group row">
		<label id="elh_pharmacy_products_SubCategory" for="x_SubCategory" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SubCategory->caption() ?><?php echo ($pharmacy_products->SubCategory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SubCategory->cellAttributes() ?>>
<span id="el_pharmacy_products_SubCategory">
<input type="text" data-table="pharmacy_products" data-field="x_SubCategory" name="x_SubCategory" id="x_SubCategory" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->SubCategory->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SubCategory->EditValue ?>"<?php echo $pharmacy_products->SubCategory->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SubCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
	<div id="r_FlexCategoryCode" class="form-group row">
		<label id="elh_pharmacy_products_FlexCategoryCode" for="x_FlexCategoryCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FlexCategoryCode->caption() ?><?php echo ($pharmacy_products->FlexCategoryCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FlexCategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_FlexCategoryCode">
<input type="text" data-table="pharmacy_products" data-field="x_FlexCategoryCode" name="x_FlexCategoryCode" id="x_FlexCategoryCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->FlexCategoryCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FlexCategoryCode->EditValue ?>"<?php echo $pharmacy_products->FlexCategoryCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->FlexCategoryCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleQty->Visible) { // ABCSaleQty ?>
	<div id="r_ABCSaleQty" class="form-group row">
		<label id="elh_pharmacy_products_ABCSaleQty" for="x_ABCSaleQty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ABCSaleQty->caption() ?><?php echo ($pharmacy_products->ABCSaleQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ABCSaleQty->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleQty">
<input type="text" data-table="pharmacy_products" data-field="x_ABCSaleQty" name="x_ABCSaleQty" id="x_ABCSaleQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ABCSaleQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ABCSaleQty->EditValue ?>"<?php echo $pharmacy_products->ABCSaleQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ABCSaleQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleValue->Visible) { // ABCSaleValue ?>
	<div id="r_ABCSaleValue" class="form-group row">
		<label id="elh_pharmacy_products_ABCSaleValue" for="x_ABCSaleValue" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ABCSaleValue->caption() ?><?php echo ($pharmacy_products->ABCSaleValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ABCSaleValue->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleValue">
<input type="text" data-table="pharmacy_products" data-field="x_ABCSaleValue" name="x_ABCSaleValue" id="x_ABCSaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ABCSaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ABCSaleValue->EditValue ?>"<?php echo $pharmacy_products->ABCSaleValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ABCSaleValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ConvertionFactor->Visible) { // ConvertionFactor ?>
	<div id="r_ConvertionFactor" class="form-group row">
		<label id="elh_pharmacy_products_ConvertionFactor" for="x_ConvertionFactor" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ConvertionFactor->caption() ?><?php echo ($pharmacy_products->ConvertionFactor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ConvertionFactor->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionFactor">
<input type="text" data-table="pharmacy_products" data-field="x_ConvertionFactor" name="x_ConvertionFactor" id="x_ConvertionFactor" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ConvertionFactor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ConvertionFactor->EditValue ?>"<?php echo $pharmacy_products->ConvertionFactor->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ConvertionFactor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
	<div id="r_ConvertionUnitDesc" class="form-group row">
		<label id="elh_pharmacy_products_ConvertionUnitDesc" for="x_ConvertionUnitDesc" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ConvertionUnitDesc->caption() ?><?php echo ($pharmacy_products->ConvertionUnitDesc->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionUnitDesc">
<input type="text" data-table="pharmacy_products" data-field="x_ConvertionUnitDesc" name="x_ConvertionUnitDesc" id="x_ConvertionUnitDesc" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->ConvertionUnitDesc->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ConvertionUnitDesc->EditValue ?>"<?php echo $pharmacy_products->ConvertionUnitDesc->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ConvertionUnitDesc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TransactionId->Visible) { // TransactionId ?>
	<div id="r_TransactionId" class="form-group row">
		<label id="elh_pharmacy_products_TransactionId" for="x_TransactionId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TransactionId->caption() ?><?php echo ($pharmacy_products->TransactionId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TransactionId->cellAttributes() ?>>
<span id="el_pharmacy_products_TransactionId">
<input type="text" data-table="pharmacy_products" data-field="x_TransactionId" name="x_TransactionId" id="x_TransactionId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->TransactionId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TransactionId->EditValue ?>"<?php echo $pharmacy_products->TransactionId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TransactionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SoldProductId->Visible) { // SoldProductId ?>
	<div id="r_SoldProductId" class="form-group row">
		<label id="elh_pharmacy_products_SoldProductId" for="x_SoldProductId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SoldProductId->caption() ?><?php echo ($pharmacy_products->SoldProductId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SoldProductId->cellAttributes() ?>>
<span id="el_pharmacy_products_SoldProductId">
<input type="text" data-table="pharmacy_products" data-field="x_SoldProductId" name="x_SoldProductId" id="x_SoldProductId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SoldProductId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SoldProductId->EditValue ?>"<?php echo $pharmacy_products->SoldProductId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SoldProductId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->WantedBookId->Visible) { // WantedBookId ?>
	<div id="r_WantedBookId" class="form-group row">
		<label id="elh_pharmacy_products_WantedBookId" for="x_WantedBookId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->WantedBookId->caption() ?><?php echo ($pharmacy_products->WantedBookId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->WantedBookId->cellAttributes() ?>>
<span id="el_pharmacy_products_WantedBookId">
<input type="text" data-table="pharmacy_products" data-field="x_WantedBookId" name="x_WantedBookId" id="x_WantedBookId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->WantedBookId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->WantedBookId->EditValue ?>"<?php echo $pharmacy_products->WantedBookId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->WantedBookId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AllId->Visible) { // AllId ?>
	<div id="r_AllId" class="form-group row">
		<label id="elh_pharmacy_products_AllId" for="x_AllId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AllId->caption() ?><?php echo ($pharmacy_products->AllId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AllId->cellAttributes() ?>>
<span id="el_pharmacy_products_AllId">
<input type="text" data-table="pharmacy_products" data-field="x_AllId" name="x_AllId" id="x_AllId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AllId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AllId->EditValue ?>"<?php echo $pharmacy_products->AllId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AllId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
	<div id="r_BatchAndExpiryCompulsory" class="form-group row">
		<label id="elh_pharmacy_products_BatchAndExpiryCompulsory" for="x_BatchAndExpiryCompulsory" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BatchAndExpiryCompulsory->caption() ?><?php echo ($pharmacy_products->BatchAndExpiryCompulsory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchAndExpiryCompulsory">
<input type="text" data-table="pharmacy_products" data-field="x_BatchAndExpiryCompulsory" name="x_BatchAndExpiryCompulsory" id="x_BatchAndExpiryCompulsory" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->BatchAndExpiryCompulsory->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BatchAndExpiryCompulsory->EditValue ?>"<?php echo $pharmacy_products->BatchAndExpiryCompulsory->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BatchAndExpiryCompulsory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
	<div id="r_BatchStockForWantedBook" class="form-group row">
		<label id="elh_pharmacy_products_BatchStockForWantedBook" for="x_BatchStockForWantedBook" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BatchStockForWantedBook->caption() ?><?php echo ($pharmacy_products->BatchStockForWantedBook->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchStockForWantedBook">
<input type="text" data-table="pharmacy_products" data-field="x_BatchStockForWantedBook" name="x_BatchStockForWantedBook" id="x_BatchStockForWantedBook" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->BatchStockForWantedBook->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BatchStockForWantedBook->EditValue ?>"<?php echo $pharmacy_products->BatchStockForWantedBook->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BatchStockForWantedBook->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
	<div id="r_UnitBasedBilling" class="form-group row">
		<label id="elh_pharmacy_products_UnitBasedBilling" for="x_UnitBasedBilling" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->UnitBasedBilling->caption() ?><?php echo ($pharmacy_products->UnitBasedBilling->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->UnitBasedBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitBasedBilling">
<input type="text" data-table="pharmacy_products" data-field="x_UnitBasedBilling" name="x_UnitBasedBilling" id="x_UnitBasedBilling" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->UnitBasedBilling->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->UnitBasedBilling->EditValue ?>"<?php echo $pharmacy_products->UnitBasedBilling->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->UnitBasedBilling->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
	<div id="r_DoNotCheckStock" class="form-group row">
		<label id="elh_pharmacy_products_DoNotCheckStock" for="x_DoNotCheckStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DoNotCheckStock->caption() ?><?php echo ($pharmacy_products->DoNotCheckStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DoNotCheckStock->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckStock">
<input type="text" data-table="pharmacy_products" data-field="x_DoNotCheckStock" name="x_DoNotCheckStock" id="x_DoNotCheckStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DoNotCheckStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DoNotCheckStock->EditValue ?>"<?php echo $pharmacy_products->DoNotCheckStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DoNotCheckStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AcceptRate->Visible) { // AcceptRate ?>
	<div id="r_AcceptRate" class="form-group row">
		<label id="elh_pharmacy_products_AcceptRate" for="x_AcceptRate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AcceptRate->caption() ?><?php echo ($pharmacy_products->AcceptRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AcceptRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRate">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptRate" name="x_AcceptRate" id="x_AcceptRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AcceptRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AcceptRate->EditValue ?>"<?php echo $pharmacy_products->AcceptRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AcceptRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PriceLevel->Visible) { // PriceLevel ?>
	<div id="r_PriceLevel" class="form-group row">
		<label id="elh_pharmacy_products_PriceLevel" for="x_PriceLevel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PriceLevel->caption() ?><?php echo ($pharmacy_products->PriceLevel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PriceLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceLevel">
<input type="text" data-table="pharmacy_products" data-field="x_PriceLevel" name="x_PriceLevel" id="x_PriceLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PriceLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PriceLevel->EditValue ?>"<?php echo $pharmacy_products->PriceLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PriceLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LastQuotePrice->Visible) { // LastQuotePrice ?>
	<div id="r_LastQuotePrice" class="form-group row">
		<label id="elh_pharmacy_products_LastQuotePrice" for="x_LastQuotePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LastQuotePrice->caption() ?><?php echo ($pharmacy_products->LastQuotePrice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LastQuotePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_LastQuotePrice">
<input type="text" data-table="pharmacy_products" data-field="x_LastQuotePrice" name="x_LastQuotePrice" id="x_LastQuotePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->LastQuotePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->LastQuotePrice->EditValue ?>"<?php echo $pharmacy_products->LastQuotePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->LastQuotePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PriceChange->Visible) { // PriceChange ?>
	<div id="r_PriceChange" class="form-group row">
		<label id="elh_pharmacy_products_PriceChange" for="x_PriceChange" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PriceChange->caption() ?><?php echo ($pharmacy_products->PriceChange->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PriceChange->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceChange">
<input type="text" data-table="pharmacy_products" data-field="x_PriceChange" name="x_PriceChange" id="x_PriceChange" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PriceChange->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PriceChange->EditValue ?>"<?php echo $pharmacy_products->PriceChange->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PriceChange->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CommodityCode->Visible) { // CommodityCode ?>
	<div id="r_CommodityCode" class="form-group row">
		<label id="elh_pharmacy_products_CommodityCode" for="x_CommodityCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CommodityCode->caption() ?><?php echo ($pharmacy_products->CommodityCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CommodityCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CommodityCode">
<input type="text" data-table="pharmacy_products" data-field="x_CommodityCode" name="x_CommodityCode" id="x_CommodityCode" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($pharmacy_products->CommodityCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CommodityCode->EditValue ?>"<?php echo $pharmacy_products->CommodityCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CommodityCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->InstitutePrice->Visible) { // InstitutePrice ?>
	<div id="r_InstitutePrice" class="form-group row">
		<label id="elh_pharmacy_products_InstitutePrice" for="x_InstitutePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->InstitutePrice->caption() ?><?php echo ($pharmacy_products->InstitutePrice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->InstitutePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_InstitutePrice">
<input type="text" data-table="pharmacy_products" data-field="x_InstitutePrice" name="x_InstitutePrice" id="x_InstitutePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->InstitutePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->InstitutePrice->EditValue ?>"<?php echo $pharmacy_products->InstitutePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->InstitutePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
	<div id="r_CtrlOrDCtrlProduct" class="form-group row">
		<label id="elh_pharmacy_products_CtrlOrDCtrlProduct" for="x_CtrlOrDCtrlProduct" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CtrlOrDCtrlProduct->caption() ?><?php echo ($pharmacy_products->CtrlOrDCtrlProduct->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_CtrlOrDCtrlProduct">
<input type="text" data-table="pharmacy_products" data-field="x_CtrlOrDCtrlProduct" name="x_CtrlOrDCtrlProduct" id="x_CtrlOrDCtrlProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->CtrlOrDCtrlProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CtrlOrDCtrlProduct->EditValue ?>"<?php echo $pharmacy_products->CtrlOrDCtrlProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CtrlOrDCtrlProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ImportedDate->Visible) { // ImportedDate ?>
	<div id="r_ImportedDate" class="form-group row">
		<label id="elh_pharmacy_products_ImportedDate" for="x_ImportedDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ImportedDate->caption() ?><?php echo ($pharmacy_products->ImportedDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ImportedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ImportedDate">
<input type="text" data-table="pharmacy_products" data-field="x_ImportedDate" name="x_ImportedDate" id="x_ImportedDate" placeholder="<?php echo HtmlEncode($pharmacy_products->ImportedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ImportedDate->EditValue ?>"<?php echo $pharmacy_products->ImportedDate->editAttributes() ?>>
<?php if (!$pharmacy_products->ImportedDate->ReadOnly && !$pharmacy_products->ImportedDate->Disabled && !isset($pharmacy_products->ImportedDate->EditAttrs["readonly"]) && !isset($pharmacy_products->ImportedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_ImportedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->ImportedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IsImported->Visible) { // IsImported ?>
	<div id="r_IsImported" class="form-group row">
		<label id="elh_pharmacy_products_IsImported" for="x_IsImported" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IsImported->caption() ?><?php echo ($pharmacy_products->IsImported->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IsImported->cellAttributes() ?>>
<span id="el_pharmacy_products_IsImported">
<input type="text" data-table="pharmacy_products" data-field="x_IsImported" name="x_IsImported" id="x_IsImported" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IsImported->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IsImported->EditValue ?>"<?php echo $pharmacy_products->IsImported->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IsImported->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FileName->Visible) { // FileName ?>
	<div id="r_FileName" class="form-group row">
		<label id="elh_pharmacy_products_FileName" for="x_FileName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FileName->caption() ?><?php echo ($pharmacy_products->FileName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FileName->cellAttributes() ?>>
<span id="el_pharmacy_products_FileName">
<input type="text" data-table="pharmacy_products" data-field="x_FileName" name="x_FileName" id="x_FileName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->FileName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FileName->EditValue ?>"<?php echo $pharmacy_products->FileName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->FileName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LPName->Visible) { // LPName ?>
	<div id="r_LPName" class="form-group row">
		<label id="elh_pharmacy_products_LPName" for="x_LPName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LPName->caption() ?><?php echo ($pharmacy_products->LPName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LPName->cellAttributes() ?>>
<span id="el_pharmacy_products_LPName">
<textarea data-table="pharmacy_products" data-field="x_LPName" name="x_LPName" id="x_LPName" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_products->LPName->getPlaceHolder()) ?>"<?php echo $pharmacy_products->LPName->editAttributes() ?>><?php echo $pharmacy_products->LPName->EditValue ?></textarea>
</span>
<?php echo $pharmacy_products->LPName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->GodownNumber->Visible) { // GodownNumber ?>
	<div id="r_GodownNumber" class="form-group row">
		<label id="elh_pharmacy_products_GodownNumber" for="x_GodownNumber" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->GodownNumber->caption() ?><?php echo ($pharmacy_products->GodownNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->GodownNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_GodownNumber">
<input type="text" data-table="pharmacy_products" data-field="x_GodownNumber" name="x_GodownNumber" id="x_GodownNumber" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->GodownNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->GodownNumber->EditValue ?>"<?php echo $pharmacy_products->GodownNumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->GodownNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CreationDate->Visible) { // CreationDate ?>
	<div id="r_CreationDate" class="form-group row">
		<label id="elh_pharmacy_products_CreationDate" for="x_CreationDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CreationDate->caption() ?><?php echo ($pharmacy_products->CreationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CreationDate->cellAttributes() ?>>
<span id="el_pharmacy_products_CreationDate">
<input type="text" data-table="pharmacy_products" data-field="x_CreationDate" name="x_CreationDate" id="x_CreationDate" placeholder="<?php echo HtmlEncode($pharmacy_products->CreationDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CreationDate->EditValue ?>"<?php echo $pharmacy_products->CreationDate->editAttributes() ?>>
<?php if (!$pharmacy_products->CreationDate->ReadOnly && !$pharmacy_products->CreationDate->Disabled && !isset($pharmacy_products->CreationDate->EditAttrs["readonly"]) && !isset($pharmacy_products->CreationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_CreationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->CreationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CreatedbyUser->Visible) { // CreatedbyUser ?>
	<div id="r_CreatedbyUser" class="form-group row">
		<label id="elh_pharmacy_products_CreatedbyUser" for="x_CreatedbyUser" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CreatedbyUser->caption() ?><?php echo ($pharmacy_products->CreatedbyUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CreatedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_CreatedbyUser">
<input type="text" data-table="pharmacy_products" data-field="x_CreatedbyUser" name="x_CreatedbyUser" id="x_CreatedbyUser" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->CreatedbyUser->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CreatedbyUser->EditValue ?>"<?php echo $pharmacy_products->CreatedbyUser->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CreatedbyUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ModifiedDate->Visible) { // ModifiedDate ?>
	<div id="r_ModifiedDate" class="form-group row">
		<label id="elh_pharmacy_products_ModifiedDate" for="x_ModifiedDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ModifiedDate->caption() ?><?php echo ($pharmacy_products->ModifiedDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ModifiedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedDate">
<input type="text" data-table="pharmacy_products" data-field="x_ModifiedDate" name="x_ModifiedDate" id="x_ModifiedDate" placeholder="<?php echo HtmlEncode($pharmacy_products->ModifiedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ModifiedDate->EditValue ?>"<?php echo $pharmacy_products->ModifiedDate->editAttributes() ?>>
<?php if (!$pharmacy_products->ModifiedDate->ReadOnly && !$pharmacy_products->ModifiedDate->Disabled && !isset($pharmacy_products->ModifiedDate->EditAttrs["readonly"]) && !isset($pharmacy_products->ModifiedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_ModifiedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->ModifiedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
	<div id="r_ModifiedbyUser" class="form-group row">
		<label id="elh_pharmacy_products_ModifiedbyUser" for="x_ModifiedbyUser" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ModifiedbyUser->caption() ?><?php echo ($pharmacy_products->ModifiedbyUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ModifiedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedbyUser">
<input type="text" data-table="pharmacy_products" data-field="x_ModifiedbyUser" name="x_ModifiedbyUser" id="x_ModifiedbyUser" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->ModifiedbyUser->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ModifiedbyUser->EditValue ?>"<?php echo $pharmacy_products->ModifiedbyUser->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ModifiedbyUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->isActive->Visible) { // isActive ?>
	<div id="r_isActive" class="form-group row">
		<label id="elh_pharmacy_products_isActive" for="x_isActive" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->isActive->caption() ?><?php echo ($pharmacy_products->isActive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->isActive->cellAttributes() ?>>
<span id="el_pharmacy_products_isActive">
<input type="text" data-table="pharmacy_products" data-field="x_isActive" name="x_isActive" id="x_isActive" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->isActive->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->isActive->EditValue ?>"<?php echo $pharmacy_products->isActive->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->isActive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
	<div id="r_AllowExpiryClaim" class="form-group row">
		<label id="elh_pharmacy_products_AllowExpiryClaim" for="x_AllowExpiryClaim" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AllowExpiryClaim->caption() ?><?php echo ($pharmacy_products->AllowExpiryClaim->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AllowExpiryClaim->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryClaim">
<input type="text" data-table="pharmacy_products" data-field="x_AllowExpiryClaim" name="x_AllowExpiryClaim" id="x_AllowExpiryClaim" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AllowExpiryClaim->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AllowExpiryClaim->EditValue ?>"<?php echo $pharmacy_products->AllowExpiryClaim->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AllowExpiryClaim->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BrandCode->Visible) { // BrandCode ?>
	<div id="r_BrandCode" class="form-group row">
		<label id="elh_pharmacy_products_BrandCode" for="x_BrandCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BrandCode->caption() ?><?php echo ($pharmacy_products->BrandCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BrandCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BrandCode">
<input type="text" data-table="pharmacy_products" data-field="x_BrandCode" name="x_BrandCode" id="x_BrandCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->BrandCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BrandCode->EditValue ?>"<?php echo $pharmacy_products->BrandCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BrandCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
	<div id="r_FreeSchemeBasedon" class="form-group row">
		<label id="elh_pharmacy_products_FreeSchemeBasedon" for="x_FreeSchemeBasedon" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FreeSchemeBasedon->caption() ?><?php echo ($pharmacy_products->FreeSchemeBasedon->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeSchemeBasedon">
<input type="text" data-table="pharmacy_products" data-field="x_FreeSchemeBasedon" name="x_FreeSchemeBasedon" id="x_FreeSchemeBasedon" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->FreeSchemeBasedon->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FreeSchemeBasedon->EditValue ?>"<?php echo $pharmacy_products->FreeSchemeBasedon->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->FreeSchemeBasedon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
	<div id="r_DoNotCheckCostInBill" class="form-group row">
		<label id="elh_pharmacy_products_DoNotCheckCostInBill" for="x_DoNotCheckCostInBill" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DoNotCheckCostInBill->caption() ?><?php echo ($pharmacy_products->DoNotCheckCostInBill->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckCostInBill">
<input type="text" data-table="pharmacy_products" data-field="x_DoNotCheckCostInBill" name="x_DoNotCheckCostInBill" id="x_DoNotCheckCostInBill" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DoNotCheckCostInBill->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DoNotCheckCostInBill->EditValue ?>"<?php echo $pharmacy_products->DoNotCheckCostInBill->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DoNotCheckCostInBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductGroupCode->Visible) { // ProductGroupCode ?>
	<div id="r_ProductGroupCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductGroupCode" for="x_ProductGroupCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductGroupCode->caption() ?><?php echo ($pharmacy_products->ProductGroupCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductGroupCode">
<input type="text" data-table="pharmacy_products" data-field="x_ProductGroupCode" name="x_ProductGroupCode" id="x_ProductGroupCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductGroupCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductGroupCode->EditValue ?>"<?php echo $pharmacy_products->ProductGroupCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductGroupCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
	<div id="r_ProductStrengthCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductStrengthCode" for="x_ProductStrengthCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductStrengthCode->caption() ?><?php echo ($pharmacy_products->ProductStrengthCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductStrengthCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductStrengthCode">
<input type="text" data-table="pharmacy_products" data-field="x_ProductStrengthCode" name="x_ProductStrengthCode" id="x_ProductStrengthCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductStrengthCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductStrengthCode->EditValue ?>"<?php echo $pharmacy_products->ProductStrengthCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductStrengthCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PackingCode->Visible) { // PackingCode ?>
	<div id="r_PackingCode" class="form-group row">
		<label id="elh_pharmacy_products_PackingCode" for="x_PackingCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PackingCode->caption() ?><?php echo ($pharmacy_products->PackingCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PackingCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PackingCode">
<input type="text" data-table="pharmacy_products" data-field="x_PackingCode" name="x_PackingCode" id="x_PackingCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PackingCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PackingCode->EditValue ?>"<?php echo $pharmacy_products->PackingCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PackingCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ComputedMinStock->Visible) { // ComputedMinStock ?>
	<div id="r_ComputedMinStock" class="form-group row">
		<label id="elh_pharmacy_products_ComputedMinStock" for="x_ComputedMinStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ComputedMinStock->caption() ?><?php echo ($pharmacy_products->ComputedMinStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ComputedMinStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMinStock">
<input type="text" data-table="pharmacy_products" data-field="x_ComputedMinStock" name="x_ComputedMinStock" id="x_ComputedMinStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ComputedMinStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ComputedMinStock->EditValue ?>"<?php echo $pharmacy_products->ComputedMinStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ComputedMinStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
	<div id="r_ComputedMaxStock" class="form-group row">
		<label id="elh_pharmacy_products_ComputedMaxStock" for="x_ComputedMaxStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ComputedMaxStock->caption() ?><?php echo ($pharmacy_products->ComputedMaxStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ComputedMaxStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMaxStock">
<input type="text" data-table="pharmacy_products" data-field="x_ComputedMaxStock" name="x_ComputedMaxStock" id="x_ComputedMaxStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ComputedMaxStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ComputedMaxStock->EditValue ?>"<?php echo $pharmacy_products->ComputedMaxStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ComputedMaxStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductRemark->Visible) { // ProductRemark ?>
	<div id="r_ProductRemark" class="form-group row">
		<label id="elh_pharmacy_products_ProductRemark" for="x_ProductRemark" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductRemark->caption() ?><?php echo ($pharmacy_products->ProductRemark->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductRemark->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductRemark">
<input type="text" data-table="pharmacy_products" data-field="x_ProductRemark" name="x_ProductRemark" id="x_ProductRemark" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductRemark->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductRemark->EditValue ?>"<?php echo $pharmacy_products->ProductRemark->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductRemark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductDrugCode->Visible) { // ProductDrugCode ?>
	<div id="r_ProductDrugCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductDrugCode" for="x_ProductDrugCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductDrugCode->caption() ?><?php echo ($pharmacy_products->ProductDrugCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductDrugCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDrugCode">
<input type="text" data-table="pharmacy_products" data-field="x_ProductDrugCode" name="x_ProductDrugCode" id="x_ProductDrugCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductDrugCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductDrugCode->EditValue ?>"<?php echo $pharmacy_products->ProductDrugCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductDrugCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
	<div id="r_IsMatrixProduct" class="form-group row">
		<label id="elh_pharmacy_products_IsMatrixProduct" for="x_IsMatrixProduct" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IsMatrixProduct->caption() ?><?php echo ($pharmacy_products->IsMatrixProduct->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IsMatrixProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMatrixProduct">
<input type="text" data-table="pharmacy_products" data-field="x_IsMatrixProduct" name="x_IsMatrixProduct" id="x_IsMatrixProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IsMatrixProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IsMatrixProduct->EditValue ?>"<?php echo $pharmacy_products->IsMatrixProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IsMatrixProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount1->Visible) { // AttributeCount1 ?>
	<div id="r_AttributeCount1" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount1" for="x_AttributeCount1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount1->caption() ?><?php echo ($pharmacy_products->AttributeCount1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount1->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount1">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount1" name="x_AttributeCount1" id="x_AttributeCount1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount1->EditValue ?>"<?php echo $pharmacy_products->AttributeCount1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount2->Visible) { // AttributeCount2 ?>
	<div id="r_AttributeCount2" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount2" for="x_AttributeCount2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount2->caption() ?><?php echo ($pharmacy_products->AttributeCount2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount2->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount2">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount2" name="x_AttributeCount2" id="x_AttributeCount2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount2->EditValue ?>"<?php echo $pharmacy_products->AttributeCount2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount3->Visible) { // AttributeCount3 ?>
	<div id="r_AttributeCount3" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount3" for="x_AttributeCount3" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount3->caption() ?><?php echo ($pharmacy_products->AttributeCount3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount3->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount3">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount3" name="x_AttributeCount3" id="x_AttributeCount3" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount3->EditValue ?>"<?php echo $pharmacy_products->AttributeCount3->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount4->Visible) { // AttributeCount4 ?>
	<div id="r_AttributeCount4" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount4" for="x_AttributeCount4" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount4->caption() ?><?php echo ($pharmacy_products->AttributeCount4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount4->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount4">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount4" name="x_AttributeCount4" id="x_AttributeCount4" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount4->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount4->EditValue ?>"<?php echo $pharmacy_products->AttributeCount4->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount5->Visible) { // AttributeCount5 ?>
	<div id="r_AttributeCount5" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount5" for="x_AttributeCount5" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount5->caption() ?><?php echo ($pharmacy_products->AttributeCount5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount5->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount5">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount5" name="x_AttributeCount5" id="x_AttributeCount5" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount5->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount5->EditValue ?>"<?php echo $pharmacy_products->AttributeCount5->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
	<div id="r_DefaultDiscountPercentage" class="form-group row">
		<label id="elh_pharmacy_products_DefaultDiscountPercentage" for="x_DefaultDiscountPercentage" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DefaultDiscountPercentage->caption() ?><?php echo ($pharmacy_products->DefaultDiscountPercentage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultDiscountPercentage">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultDiscountPercentage" name="x_DefaultDiscountPercentage" id="x_DefaultDiscountPercentage" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DefaultDiscountPercentage->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DefaultDiscountPercentage->EditValue ?>"<?php echo $pharmacy_products->DefaultDiscountPercentage->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DefaultDiscountPercentage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
	<div id="r_DonotPrintBarcode" class="form-group row">
		<label id="elh_pharmacy_products_DonotPrintBarcode" for="x_DonotPrintBarcode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DonotPrintBarcode->caption() ?><?php echo ($pharmacy_products->DonotPrintBarcode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DonotPrintBarcode->cellAttributes() ?>>
<span id="el_pharmacy_products_DonotPrintBarcode">
<input type="text" data-table="pharmacy_products" data-field="x_DonotPrintBarcode" name="x_DonotPrintBarcode" id="x_DonotPrintBarcode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DonotPrintBarcode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DonotPrintBarcode->EditValue ?>"<?php echo $pharmacy_products->DonotPrintBarcode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DonotPrintBarcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
	<div id="r_ProductLevelDiscount" class="form-group row">
		<label id="elh_pharmacy_products_ProductLevelDiscount" for="x_ProductLevelDiscount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductLevelDiscount->caption() ?><?php echo ($pharmacy_products->ProductLevelDiscount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductLevelDiscount->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLevelDiscount">
<input type="text" data-table="pharmacy_products" data-field="x_ProductLevelDiscount" name="x_ProductLevelDiscount" id="x_ProductLevelDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductLevelDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductLevelDiscount->EditValue ?>"<?php echo $pharmacy_products->ProductLevelDiscount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductLevelDiscount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Markup->Visible) { // Markup ?>
	<div id="r_Markup" class="form-group row">
		<label id="elh_pharmacy_products_Markup" for="x_Markup" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Markup->caption() ?><?php echo ($pharmacy_products->Markup->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Markup->cellAttributes() ?>>
<span id="el_pharmacy_products_Markup">
<input type="text" data-table="pharmacy_products" data-field="x_Markup" name="x_Markup" id="x_Markup" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->Markup->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Markup->EditValue ?>"<?php echo $pharmacy_products->Markup->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Markup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MarkDown->Visible) { // MarkDown ?>
	<div id="r_MarkDown" class="form-group row">
		<label id="elh_pharmacy_products_MarkDown" for="x_MarkDown" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MarkDown->caption() ?><?php echo ($pharmacy_products->MarkDown->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MarkDown->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDown">
<input type="text" data-table="pharmacy_products" data-field="x_MarkDown" name="x_MarkDown" id="x_MarkDown" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MarkDown->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MarkDown->EditValue ?>"<?php echo $pharmacy_products->MarkDown->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MarkDown->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
	<div id="r_ReworkSalePrice" class="form-group row">
		<label id="elh_pharmacy_products_ReworkSalePrice" for="x_ReworkSalePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ReworkSalePrice->caption() ?><?php echo ($pharmacy_products->ReworkSalePrice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ReworkSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_ReworkSalePrice">
<input type="text" data-table="pharmacy_products" data-field="x_ReworkSalePrice" name="x_ReworkSalePrice" id="x_ReworkSalePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ReworkSalePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ReworkSalePrice->EditValue ?>"<?php echo $pharmacy_products->ReworkSalePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ReworkSalePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MultipleInput->Visible) { // MultipleInput ?>
	<div id="r_MultipleInput" class="form-group row">
		<label id="elh_pharmacy_products_MultipleInput" for="x_MultipleInput" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MultipleInput->caption() ?><?php echo ($pharmacy_products->MultipleInput->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MultipleInput->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleInput">
<input type="text" data-table="pharmacy_products" data-field="x_MultipleInput" name="x_MultipleInput" id="x_MultipleInput" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MultipleInput->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MultipleInput->EditValue ?>"<?php echo $pharmacy_products->MultipleInput->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MultipleInput->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LpPackageInformation->Visible) { // LpPackageInformation ?>
	<div id="r_LpPackageInformation" class="form-group row">
		<label id="elh_pharmacy_products_LpPackageInformation" for="x_LpPackageInformation" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LpPackageInformation->caption() ?><?php echo ($pharmacy_products->LpPackageInformation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LpPackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_LpPackageInformation">
<input type="text" data-table="pharmacy_products" data-field="x_LpPackageInformation" name="x_LpPackageInformation" id="x_LpPackageInformation" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($pharmacy_products->LpPackageInformation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->LpPackageInformation->EditValue ?>"<?php echo $pharmacy_products->LpPackageInformation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->LpPackageInformation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
	<div id="r_AllowNegativeStock" class="form-group row">
		<label id="elh_pharmacy_products_AllowNegativeStock" for="x_AllowNegativeStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AllowNegativeStock->caption() ?><?php echo ($pharmacy_products->AllowNegativeStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AllowNegativeStock->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowNegativeStock">
<input type="text" data-table="pharmacy_products" data-field="x_AllowNegativeStock" name="x_AllowNegativeStock" id="x_AllowNegativeStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AllowNegativeStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AllowNegativeStock->EditValue ?>"<?php echo $pharmacy_products->AllowNegativeStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AllowNegativeStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->OrderDate->Visible) { // OrderDate ?>
	<div id="r_OrderDate" class="form-group row">
		<label id="elh_pharmacy_products_OrderDate" for="x_OrderDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->OrderDate->caption() ?><?php echo ($pharmacy_products->OrderDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->OrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderDate">
<input type="text" data-table="pharmacy_products" data-field="x_OrderDate" name="x_OrderDate" id="x_OrderDate" placeholder="<?php echo HtmlEncode($pharmacy_products->OrderDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->OrderDate->EditValue ?>"<?php echo $pharmacy_products->OrderDate->editAttributes() ?>>
<?php if (!$pharmacy_products->OrderDate->ReadOnly && !$pharmacy_products->OrderDate->Disabled && !isset($pharmacy_products->OrderDate->EditAttrs["readonly"]) && !isset($pharmacy_products->OrderDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_OrderDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->OrderDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->OrderTime->Visible) { // OrderTime ?>
	<div id="r_OrderTime" class="form-group row">
		<label id="elh_pharmacy_products_OrderTime" for="x_OrderTime" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->OrderTime->caption() ?><?php echo ($pharmacy_products->OrderTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->OrderTime->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderTime">
<input type="text" data-table="pharmacy_products" data-field="x_OrderTime" name="x_OrderTime" id="x_OrderTime" placeholder="<?php echo HtmlEncode($pharmacy_products->OrderTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->OrderTime->EditValue ?>"<?php echo $pharmacy_products->OrderTime->editAttributes() ?>>
<?php if (!$pharmacy_products->OrderTime->ReadOnly && !$pharmacy_products->OrderTime->Disabled && !isset($pharmacy_products->OrderTime->EditAttrs["readonly"]) && !isset($pharmacy_products->OrderTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_OrderTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->OrderTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->RateGroupCode->Visible) { // RateGroupCode ?>
	<div id="r_RateGroupCode" class="form-group row">
		<label id="elh_pharmacy_products_RateGroupCode" for="x_RateGroupCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->RateGroupCode->caption() ?><?php echo ($pharmacy_products->RateGroupCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->RateGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RateGroupCode">
<input type="text" data-table="pharmacy_products" data-field="x_RateGroupCode" name="x_RateGroupCode" id="x_RateGroupCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->RateGroupCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->RateGroupCode->EditValue ?>"<?php echo $pharmacy_products->RateGroupCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->RateGroupCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
	<div id="r_ConversionCaseLot" class="form-group row">
		<label id="elh_pharmacy_products_ConversionCaseLot" for="x_ConversionCaseLot" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ConversionCaseLot->caption() ?><?php echo ($pharmacy_products->ConversionCaseLot->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ConversionCaseLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ConversionCaseLot">
<input type="text" data-table="pharmacy_products" data-field="x_ConversionCaseLot" name="x_ConversionCaseLot" id="x_ConversionCaseLot" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ConversionCaseLot->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ConversionCaseLot->EditValue ?>"<?php echo $pharmacy_products->ConversionCaseLot->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ConversionCaseLot->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ShippingLot->Visible) { // ShippingLot ?>
	<div id="r_ShippingLot" class="form-group row">
		<label id="elh_pharmacy_products_ShippingLot" for="x_ShippingLot" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ShippingLot->caption() ?><?php echo ($pharmacy_products->ShippingLot->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ShippingLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ShippingLot">
<input type="text" data-table="pharmacy_products" data-field="x_ShippingLot" name="x_ShippingLot" id="x_ShippingLot" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->ShippingLot->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ShippingLot->EditValue ?>"<?php echo $pharmacy_products->ShippingLot->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ShippingLot->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
	<div id="r_AllowExpiryReplacement" class="form-group row">
		<label id="elh_pharmacy_products_AllowExpiryReplacement" for="x_AllowExpiryReplacement" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AllowExpiryReplacement->caption() ?><?php echo ($pharmacy_products->AllowExpiryReplacement->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryReplacement">
<input type="text" data-table="pharmacy_products" data-field="x_AllowExpiryReplacement" name="x_AllowExpiryReplacement" id="x_AllowExpiryReplacement" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AllowExpiryReplacement->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AllowExpiryReplacement->EditValue ?>"<?php echo $pharmacy_products->AllowExpiryReplacement->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AllowExpiryReplacement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
	<div id="r_NoOfMonthExpiryAllowed" class="form-group row">
		<label id="elh_pharmacy_products_NoOfMonthExpiryAllowed" for="x_NoOfMonthExpiryAllowed" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->NoOfMonthExpiryAllowed->caption() ?><?php echo ($pharmacy_products->NoOfMonthExpiryAllowed->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el_pharmacy_products_NoOfMonthExpiryAllowed">
<input type="text" data-table="pharmacy_products" data-field="x_NoOfMonthExpiryAllowed" name="x_NoOfMonthExpiryAllowed" id="x_NoOfMonthExpiryAllowed" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->NoOfMonthExpiryAllowed->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->EditValue ?>"<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
	<div id="r_ProductDiscountEligibility" class="form-group row">
		<label id="elh_pharmacy_products_ProductDiscountEligibility" for="x_ProductDiscountEligibility" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductDiscountEligibility->caption() ?><?php echo ($pharmacy_products->ProductDiscountEligibility->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDiscountEligibility">
<input type="text" data-table="pharmacy_products" data-field="x_ProductDiscountEligibility" name="x_ProductDiscountEligibility" id="x_ProductDiscountEligibility" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductDiscountEligibility->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductDiscountEligibility->EditValue ?>"<?php echo $pharmacy_products->ProductDiscountEligibility->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductDiscountEligibility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
	<div id="r_ScheduleTypeCode" class="form-group row">
		<label id="elh_pharmacy_products_ScheduleTypeCode" for="x_ScheduleTypeCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ScheduleTypeCode->caption() ?><?php echo ($pharmacy_products->ScheduleTypeCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ScheduleTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleTypeCode">
<input type="text" data-table="pharmacy_products" data-field="x_ScheduleTypeCode" name="x_ScheduleTypeCode" id="x_ScheduleTypeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ScheduleTypeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ScheduleTypeCode->EditValue ?>"<?php echo $pharmacy_products->ScheduleTypeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ScheduleTypeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
	<div id="r_AIOCDProductCode" class="form-group row">
		<label id="elh_pharmacy_products_AIOCDProductCode" for="x_AIOCDProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AIOCDProductCode->caption() ?><?php echo ($pharmacy_products->AIOCDProductCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AIOCDProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AIOCDProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_AIOCDProductCode" name="x_AIOCDProductCode" id="x_AIOCDProductCode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->AIOCDProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AIOCDProductCode->EditValue ?>"<?php echo $pharmacy_products->AIOCDProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AIOCDProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FreeQuantity->Visible) { // FreeQuantity ?>
	<div id="r_FreeQuantity" class="form-group row">
		<label id="elh_pharmacy_products_FreeQuantity" for="x_FreeQuantity" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FreeQuantity->caption() ?><?php echo ($pharmacy_products->FreeQuantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FreeQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeQuantity">
<input type="text" data-table="pharmacy_products" data-field="x_FreeQuantity" name="x_FreeQuantity" id="x_FreeQuantity" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->FreeQuantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FreeQuantity->EditValue ?>"<?php echo $pharmacy_products->FreeQuantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->FreeQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DiscountType->Visible) { // DiscountType ?>
	<div id="r_DiscountType" class="form-group row">
		<label id="elh_pharmacy_products_DiscountType" for="x_DiscountType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DiscountType->caption() ?><?php echo ($pharmacy_products->DiscountType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DiscountType->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountType">
<input type="text" data-table="pharmacy_products" data-field="x_DiscountType" name="x_DiscountType" id="x_DiscountType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DiscountType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DiscountType->EditValue ?>"<?php echo $pharmacy_products->DiscountType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DiscountType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DiscountValue->Visible) { // DiscountValue ?>
	<div id="r_DiscountValue" class="form-group row">
		<label id="elh_pharmacy_products_DiscountValue" for="x_DiscountValue" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DiscountValue->caption() ?><?php echo ($pharmacy_products->DiscountValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DiscountValue->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountValue">
<input type="text" data-table="pharmacy_products" data-field="x_DiscountValue" name="x_DiscountValue" id="x_DiscountValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DiscountValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DiscountValue->EditValue ?>"<?php echo $pharmacy_products->DiscountValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DiscountValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
	<div id="r_HasProductOrderAttribute" class="form-group row">
		<label id="elh_pharmacy_products_HasProductOrderAttribute" for="x_HasProductOrderAttribute" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->HasProductOrderAttribute->caption() ?><?php echo ($pharmacy_products->HasProductOrderAttribute->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el_pharmacy_products_HasProductOrderAttribute">
<input type="text" data-table="pharmacy_products" data-field="x_HasProductOrderAttribute" name="x_HasProductOrderAttribute" id="x_HasProductOrderAttribute" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->HasProductOrderAttribute->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->HasProductOrderAttribute->EditValue ?>"<?php echo $pharmacy_products->HasProductOrderAttribute->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->HasProductOrderAttribute->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FirstPODate->Visible) { // FirstPODate ?>
	<div id="r_FirstPODate" class="form-group row">
		<label id="elh_pharmacy_products_FirstPODate" for="x_FirstPODate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FirstPODate->caption() ?><?php echo ($pharmacy_products->FirstPODate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FirstPODate->cellAttributes() ?>>
<span id="el_pharmacy_products_FirstPODate">
<input type="text" data-table="pharmacy_products" data-field="x_FirstPODate" name="x_FirstPODate" id="x_FirstPODate" placeholder="<?php echo HtmlEncode($pharmacy_products->FirstPODate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FirstPODate->EditValue ?>"<?php echo $pharmacy_products->FirstPODate->editAttributes() ?>>
<?php if (!$pharmacy_products->FirstPODate->ReadOnly && !$pharmacy_products->FirstPODate->Disabled && !isset($pharmacy_products->FirstPODate->EditAttrs["readonly"]) && !isset($pharmacy_products->FirstPODate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_FirstPODate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->FirstPODate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
	<div id="r_SaleprcieAndMrpCalcPercent" class="form-group row">
		<label id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" for="x_SaleprcieAndMrpCalcPercent" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->caption() ?><?php echo ($pharmacy_products->SaleprcieAndMrpCalcPercent->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleprcieAndMrpCalcPercent">
<input type="text" data-table="pharmacy_products" data-field="x_SaleprcieAndMrpCalcPercent" name="x_SaleprcieAndMrpCalcPercent" id="x_SaleprcieAndMrpCalcPercent" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SaleprcieAndMrpCalcPercent->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->EditValue ?>"<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
	<div id="r_IsGiftVoucherProducts" class="form-group row">
		<label id="elh_pharmacy_products_IsGiftVoucherProducts" for="x_IsGiftVoucherProducts" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IsGiftVoucherProducts->caption() ?><?php echo ($pharmacy_products->IsGiftVoucherProducts->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_IsGiftVoucherProducts">
<input type="text" data-table="pharmacy_products" data-field="x_IsGiftVoucherProducts" name="x_IsGiftVoucherProducts" id="x_IsGiftVoucherProducts" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IsGiftVoucherProducts->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IsGiftVoucherProducts->EditValue ?>"<?php echo $pharmacy_products->IsGiftVoucherProducts->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IsGiftVoucherProducts->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
	<div id="r_AcceptRange4SerialNumber" class="form-group row">
		<label id="elh_pharmacy_products_AcceptRange4SerialNumber" for="x_AcceptRange4SerialNumber" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AcceptRange4SerialNumber->caption() ?><?php echo ($pharmacy_products->AcceptRange4SerialNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRange4SerialNumber">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptRange4SerialNumber" name="x_AcceptRange4SerialNumber" id="x_AcceptRange4SerialNumber" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AcceptRange4SerialNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AcceptRange4SerialNumber->EditValue ?>"<?php echo $pharmacy_products->AcceptRange4SerialNumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AcceptRange4SerialNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
	<div id="r_GiftVoucherDenomination" class="form-group row">
		<label id="elh_pharmacy_products_GiftVoucherDenomination" for="x_GiftVoucherDenomination" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->GiftVoucherDenomination->caption() ?><?php echo ($pharmacy_products->GiftVoucherDenomination->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftVoucherDenomination">
<input type="text" data-table="pharmacy_products" data-field="x_GiftVoucherDenomination" name="x_GiftVoucherDenomination" id="x_GiftVoucherDenomination" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->GiftVoucherDenomination->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->GiftVoucherDenomination->EditValue ?>"<?php echo $pharmacy_products->GiftVoucherDenomination->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->GiftVoucherDenomination->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Subclasscode->Visible) { // Subclasscode ?>
	<div id="r_Subclasscode" class="form-group row">
		<label id="elh_pharmacy_products_Subclasscode" for="x_Subclasscode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Subclasscode->caption() ?><?php echo ($pharmacy_products->Subclasscode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Subclasscode->cellAttributes() ?>>
<span id="el_pharmacy_products_Subclasscode">
<input type="text" data-table="pharmacy_products" data-field="x_Subclasscode" name="x_Subclasscode" id="x_Subclasscode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->Subclasscode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Subclasscode->EditValue ?>"<?php echo $pharmacy_products->Subclasscode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Subclasscode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
	<div id="r_BarCodeFromWeighingMachine" class="form-group row">
		<label id="elh_pharmacy_products_BarCodeFromWeighingMachine" for="x_BarCodeFromWeighingMachine" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BarCodeFromWeighingMachine->caption() ?><?php echo ($pharmacy_products->BarCodeFromWeighingMachine->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeFromWeighingMachine">
<input type="text" data-table="pharmacy_products" data-field="x_BarCodeFromWeighingMachine" name="x_BarCodeFromWeighingMachine" id="x_BarCodeFromWeighingMachine" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->BarCodeFromWeighingMachine->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BarCodeFromWeighingMachine->EditValue ?>"<?php echo $pharmacy_products->BarCodeFromWeighingMachine->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BarCodeFromWeighingMachine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
	<div id="r_CheckCostInReturn" class="form-group row">
		<label id="elh_pharmacy_products_CheckCostInReturn" for="x_CheckCostInReturn" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CheckCostInReturn->caption() ?><?php echo ($pharmacy_products->CheckCostInReturn->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CheckCostInReturn->cellAttributes() ?>>
<span id="el_pharmacy_products_CheckCostInReturn">
<input type="text" data-table="pharmacy_products" data-field="x_CheckCostInReturn" name="x_CheckCostInReturn" id="x_CheckCostInReturn" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->CheckCostInReturn->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CheckCostInReturn->EditValue ?>"<?php echo $pharmacy_products->CheckCostInReturn->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CheckCostInReturn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
	<div id="r_FrequentSaleProduct" class="form-group row">
		<label id="elh_pharmacy_products_FrequentSaleProduct" for="x_FrequentSaleProduct" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FrequentSaleProduct->caption() ?><?php echo ($pharmacy_products->FrequentSaleProduct->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FrequentSaleProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_FrequentSaleProduct">
<input type="text" data-table="pharmacy_products" data-field="x_FrequentSaleProduct" name="x_FrequentSaleProduct" id="x_FrequentSaleProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->FrequentSaleProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FrequentSaleProduct->EditValue ?>"<?php echo $pharmacy_products->FrequentSaleProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->FrequentSaleProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->RateType->Visible) { // RateType ?>
	<div id="r_RateType" class="form-group row">
		<label id="elh_pharmacy_products_RateType" for="x_RateType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->RateType->caption() ?><?php echo ($pharmacy_products->RateType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->RateType->cellAttributes() ?>>
<span id="el_pharmacy_products_RateType">
<input type="text" data-table="pharmacy_products" data-field="x_RateType" name="x_RateType" id="x_RateType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->RateType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->RateType->EditValue ?>"<?php echo $pharmacy_products->RateType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->RateType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TouchscreenName->Visible) { // TouchscreenName ?>
	<div id="r_TouchscreenName" class="form-group row">
		<label id="elh_pharmacy_products_TouchscreenName" for="x_TouchscreenName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TouchscreenName->caption() ?><?php echo ($pharmacy_products->TouchscreenName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TouchscreenName->cellAttributes() ?>>
<span id="el_pharmacy_products_TouchscreenName">
<input type="text" data-table="pharmacy_products" data-field="x_TouchscreenName" name="x_TouchscreenName" id="x_TouchscreenName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->TouchscreenName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TouchscreenName->EditValue ?>"<?php echo $pharmacy_products->TouchscreenName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TouchscreenName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FreeType->Visible) { // FreeType ?>
	<div id="r_FreeType" class="form-group row">
		<label id="elh_pharmacy_products_FreeType" for="x_FreeType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FreeType->caption() ?><?php echo ($pharmacy_products->FreeType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FreeType->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeType">
<input type="text" data-table="pharmacy_products" data-field="x_FreeType" name="x_FreeType" id="x_FreeType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->FreeType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FreeType->EditValue ?>"<?php echo $pharmacy_products->FreeType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->FreeType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
	<div id="r_LooseQtyasNewBatch" class="form-group row">
		<label id="elh_pharmacy_products_LooseQtyasNewBatch" for="x_LooseQtyasNewBatch" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LooseQtyasNewBatch->caption() ?><?php echo ($pharmacy_products->LooseQtyasNewBatch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_LooseQtyasNewBatch">
<input type="text" data-table="pharmacy_products" data-field="x_LooseQtyasNewBatch" name="x_LooseQtyasNewBatch" id="x_LooseQtyasNewBatch" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->LooseQtyasNewBatch->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->LooseQtyasNewBatch->EditValue ?>"<?php echo $pharmacy_products->LooseQtyasNewBatch->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->LooseQtyasNewBatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
	<div id="r_AllowSlabBilling" class="form-group row">
		<label id="elh_pharmacy_products_AllowSlabBilling" for="x_AllowSlabBilling" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AllowSlabBilling->caption() ?><?php echo ($pharmacy_products->AllowSlabBilling->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AllowSlabBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowSlabBilling">
<input type="text" data-table="pharmacy_products" data-field="x_AllowSlabBilling" name="x_AllowSlabBilling" id="x_AllowSlabBilling" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AllowSlabBilling->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AllowSlabBilling->EditValue ?>"<?php echo $pharmacy_products->AllowSlabBilling->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AllowSlabBilling->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
	<div id="r_ProductTypeForProduction" class="form-group row">
		<label id="elh_pharmacy_products_ProductTypeForProduction" for="x_ProductTypeForProduction" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductTypeForProduction->caption() ?><?php echo ($pharmacy_products->ProductTypeForProduction->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductTypeForProduction->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductTypeForProduction">
<input type="text" data-table="pharmacy_products" data-field="x_ProductTypeForProduction" name="x_ProductTypeForProduction" id="x_ProductTypeForProduction" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductTypeForProduction->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductTypeForProduction->EditValue ?>"<?php echo $pharmacy_products->ProductTypeForProduction->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductTypeForProduction->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->RecipeCode->Visible) { // RecipeCode ?>
	<div id="r_RecipeCode" class="form-group row">
		<label id="elh_pharmacy_products_RecipeCode" for="x_RecipeCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->RecipeCode->caption() ?><?php echo ($pharmacy_products->RecipeCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->RecipeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RecipeCode">
<input type="text" data-table="pharmacy_products" data-field="x_RecipeCode" name="x_RecipeCode" id="x_RecipeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->RecipeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->RecipeCode->EditValue ?>"<?php echo $pharmacy_products->RecipeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->RecipeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DefaultUnitType->Visible) { // DefaultUnitType ?>
	<div id="r_DefaultUnitType" class="form-group row">
		<label id="elh_pharmacy_products_DefaultUnitType" for="x_DefaultUnitType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DefaultUnitType->caption() ?><?php echo ($pharmacy_products->DefaultUnitType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DefaultUnitType->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultUnitType">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultUnitType" name="x_DefaultUnitType" id="x_DefaultUnitType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DefaultUnitType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DefaultUnitType->EditValue ?>"<?php echo $pharmacy_products->DefaultUnitType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DefaultUnitType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PIstatus->Visible) { // PIstatus ?>
	<div id="r_PIstatus" class="form-group row">
		<label id="elh_pharmacy_products_PIstatus" for="x_PIstatus" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PIstatus->caption() ?><?php echo ($pharmacy_products->PIstatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PIstatus->cellAttributes() ?>>
<span id="el_pharmacy_products_PIstatus">
<input type="text" data-table="pharmacy_products" data-field="x_PIstatus" name="x_PIstatus" id="x_PIstatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PIstatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PIstatus->EditValue ?>"<?php echo $pharmacy_products->PIstatus->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PIstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
	<div id="r_LastPiConfirmedDate" class="form-group row">
		<label id="elh_pharmacy_products_LastPiConfirmedDate" for="x_LastPiConfirmedDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LastPiConfirmedDate->caption() ?><?php echo ($pharmacy_products->LastPiConfirmedDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPiConfirmedDate">
<input type="text" data-table="pharmacy_products" data-field="x_LastPiConfirmedDate" name="x_LastPiConfirmedDate" id="x_LastPiConfirmedDate" placeholder="<?php echo HtmlEncode($pharmacy_products->LastPiConfirmedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->LastPiConfirmedDate->EditValue ?>"<?php echo $pharmacy_products->LastPiConfirmedDate->editAttributes() ?>>
<?php if (!$pharmacy_products->LastPiConfirmedDate->ReadOnly && !$pharmacy_products->LastPiConfirmedDate->Disabled && !isset($pharmacy_products->LastPiConfirmedDate->EditAttrs["readonly"]) && !isset($pharmacy_products->LastPiConfirmedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_productsadd", "x_LastPiConfirmedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products->LastPiConfirmedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDesign->Visible) { // BarCodeDesign ?>
	<div id="r_BarCodeDesign" class="form-group row">
		<label id="elh_pharmacy_products_BarCodeDesign" for="x_BarCodeDesign" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BarCodeDesign->caption() ?><?php echo ($pharmacy_products->BarCodeDesign->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BarCodeDesign->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDesign">
<input type="text" data-table="pharmacy_products" data-field="x_BarCodeDesign" name="x_BarCodeDesign" id="x_BarCodeDesign" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->BarCodeDesign->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BarCodeDesign->EditValue ?>"<?php echo $pharmacy_products->BarCodeDesign->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BarCodeDesign->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
	<div id="r_AcceptRemarksInBill" class="form-group row">
		<label id="elh_pharmacy_products_AcceptRemarksInBill" for="x_AcceptRemarksInBill" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AcceptRemarksInBill->caption() ?><?php echo ($pharmacy_products->AcceptRemarksInBill->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRemarksInBill">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptRemarksInBill" name="x_AcceptRemarksInBill" id="x_AcceptRemarksInBill" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AcceptRemarksInBill->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AcceptRemarksInBill->EditValue ?>"<?php echo $pharmacy_products->AcceptRemarksInBill->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AcceptRemarksInBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Classification->Visible) { // Classification ?>
	<div id="r_Classification" class="form-group row">
		<label id="elh_pharmacy_products_Classification" for="x_Classification" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Classification->caption() ?><?php echo ($pharmacy_products->Classification->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Classification->cellAttributes() ?>>
<span id="el_pharmacy_products_Classification">
<input type="text" data-table="pharmacy_products" data-field="x_Classification" name="x_Classification" id="x_Classification" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->Classification->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Classification->EditValue ?>"<?php echo $pharmacy_products->Classification->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Classification->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TimeSlot->Visible) { // TimeSlot ?>
	<div id="r_TimeSlot" class="form-group row">
		<label id="elh_pharmacy_products_TimeSlot" for="x_TimeSlot" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TimeSlot->caption() ?><?php echo ($pharmacy_products->TimeSlot->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TimeSlot->cellAttributes() ?>>
<span id="el_pharmacy_products_TimeSlot">
<input type="text" data-table="pharmacy_products" data-field="x_TimeSlot" name="x_TimeSlot" id="x_TimeSlot" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->TimeSlot->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TimeSlot->EditValue ?>"<?php echo $pharmacy_products->TimeSlot->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TimeSlot->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IsBundle->Visible) { // IsBundle ?>
	<div id="r_IsBundle" class="form-group row">
		<label id="elh_pharmacy_products_IsBundle" for="x_IsBundle" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IsBundle->caption() ?><?php echo ($pharmacy_products->IsBundle->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IsBundle->cellAttributes() ?>>
<span id="el_pharmacy_products_IsBundle">
<input type="text" data-table="pharmacy_products" data-field="x_IsBundle" name="x_IsBundle" id="x_IsBundle" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IsBundle->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IsBundle->EditValue ?>"<?php echo $pharmacy_products->IsBundle->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IsBundle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ColorCode->Visible) { // ColorCode ?>
	<div id="r_ColorCode" class="form-group row">
		<label id="elh_pharmacy_products_ColorCode" for="x_ColorCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ColorCode->caption() ?><?php echo ($pharmacy_products->ColorCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ColorCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ColorCode">
<input type="text" data-table="pharmacy_products" data-field="x_ColorCode" name="x_ColorCode" id="x_ColorCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ColorCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ColorCode->EditValue ?>"<?php echo $pharmacy_products->ColorCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ColorCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->GenderCode->Visible) { // GenderCode ?>
	<div id="r_GenderCode" class="form-group row">
		<label id="elh_pharmacy_products_GenderCode" for="x_GenderCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->GenderCode->caption() ?><?php echo ($pharmacy_products->GenderCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->GenderCode->cellAttributes() ?>>
<span id="el_pharmacy_products_GenderCode">
<input type="text" data-table="pharmacy_products" data-field="x_GenderCode" name="x_GenderCode" id="x_GenderCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->GenderCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->GenderCode->EditValue ?>"<?php echo $pharmacy_products->GenderCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->GenderCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SizeCode->Visible) { // SizeCode ?>
	<div id="r_SizeCode" class="form-group row">
		<label id="elh_pharmacy_products_SizeCode" for="x_SizeCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SizeCode->caption() ?><?php echo ($pharmacy_products->SizeCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SizeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SizeCode">
<input type="text" data-table="pharmacy_products" data-field="x_SizeCode" name="x_SizeCode" id="x_SizeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SizeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SizeCode->EditValue ?>"<?php echo $pharmacy_products->SizeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SizeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->GiftCard->Visible) { // GiftCard ?>
	<div id="r_GiftCard" class="form-group row">
		<label id="elh_pharmacy_products_GiftCard" for="x_GiftCard" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->GiftCard->caption() ?><?php echo ($pharmacy_products->GiftCard->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->GiftCard->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftCard">
<input type="text" data-table="pharmacy_products" data-field="x_GiftCard" name="x_GiftCard" id="x_GiftCard" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->GiftCard->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->GiftCard->EditValue ?>"<?php echo $pharmacy_products->GiftCard->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->GiftCard->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ToonLabel->Visible) { // ToonLabel ?>
	<div id="r_ToonLabel" class="form-group row">
		<label id="elh_pharmacy_products_ToonLabel" for="x_ToonLabel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ToonLabel->caption() ?><?php echo ($pharmacy_products->ToonLabel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ToonLabel->cellAttributes() ?>>
<span id="el_pharmacy_products_ToonLabel">
<input type="text" data-table="pharmacy_products" data-field="x_ToonLabel" name="x_ToonLabel" id="x_ToonLabel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ToonLabel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ToonLabel->EditValue ?>"<?php echo $pharmacy_products->ToonLabel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ToonLabel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->GarmentType->Visible) { // GarmentType ?>
	<div id="r_GarmentType" class="form-group row">
		<label id="elh_pharmacy_products_GarmentType" for="x_GarmentType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->GarmentType->caption() ?><?php echo ($pharmacy_products->GarmentType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->GarmentType->cellAttributes() ?>>
<span id="el_pharmacy_products_GarmentType">
<input type="text" data-table="pharmacy_products" data-field="x_GarmentType" name="x_GarmentType" id="x_GarmentType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->GarmentType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->GarmentType->EditValue ?>"<?php echo $pharmacy_products->GarmentType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->GarmentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AgeGroup->Visible) { // AgeGroup ?>
	<div id="r_AgeGroup" class="form-group row">
		<label id="elh_pharmacy_products_AgeGroup" for="x_AgeGroup" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AgeGroup->caption() ?><?php echo ($pharmacy_products->AgeGroup->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AgeGroup->cellAttributes() ?>>
<span id="el_pharmacy_products_AgeGroup">
<input type="text" data-table="pharmacy_products" data-field="x_AgeGroup" name="x_AgeGroup" id="x_AgeGroup" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AgeGroup->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AgeGroup->EditValue ?>"<?php echo $pharmacy_products->AgeGroup->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AgeGroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Season->Visible) { // Season ?>
	<div id="r_Season" class="form-group row">
		<label id="elh_pharmacy_products_Season" for="x_Season" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Season->caption() ?><?php echo ($pharmacy_products->Season->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Season->cellAttributes() ?>>
<span id="el_pharmacy_products_Season">
<input type="text" data-table="pharmacy_products" data-field="x_Season" name="x_Season" id="x_Season" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->Season->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Season->EditValue ?>"<?php echo $pharmacy_products->Season->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Season->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DailyStockEntry->Visible) { // DailyStockEntry ?>
	<div id="r_DailyStockEntry" class="form-group row">
		<label id="elh_pharmacy_products_DailyStockEntry" for="x_DailyStockEntry" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DailyStockEntry->caption() ?><?php echo ($pharmacy_products->DailyStockEntry->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DailyStockEntry->cellAttributes() ?>>
<span id="el_pharmacy_products_DailyStockEntry">
<input type="text" data-table="pharmacy_products" data-field="x_DailyStockEntry" name="x_DailyStockEntry" id="x_DailyStockEntry" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DailyStockEntry->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DailyStockEntry->EditValue ?>"<?php echo $pharmacy_products->DailyStockEntry->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DailyStockEntry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ModifierApplicable->Visible) { // ModifierApplicable ?>
	<div id="r_ModifierApplicable" class="form-group row">
		<label id="elh_pharmacy_products_ModifierApplicable" for="x_ModifierApplicable" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ModifierApplicable->caption() ?><?php echo ($pharmacy_products->ModifierApplicable->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ModifierApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierApplicable">
<input type="text" data-table="pharmacy_products" data-field="x_ModifierApplicable" name="x_ModifierApplicable" id="x_ModifierApplicable" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ModifierApplicable->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ModifierApplicable->EditValue ?>"<?php echo $pharmacy_products->ModifierApplicable->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ModifierApplicable->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ModifierType->Visible) { // ModifierType ?>
	<div id="r_ModifierType" class="form-group row">
		<label id="elh_pharmacy_products_ModifierType" for="x_ModifierType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ModifierType->caption() ?><?php echo ($pharmacy_products->ModifierType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ModifierType->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierType">
<input type="text" data-table="pharmacy_products" data-field="x_ModifierType" name="x_ModifierType" id="x_ModifierType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ModifierType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ModifierType->EditValue ?>"<?php echo $pharmacy_products->ModifierType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ModifierType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
	<div id="r_AcceptZeroRate" class="form-group row">
		<label id="elh_pharmacy_products_AcceptZeroRate" for="x_AcceptZeroRate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AcceptZeroRate->caption() ?><?php echo ($pharmacy_products->AcceptZeroRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AcceptZeroRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptZeroRate">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptZeroRate" name="x_AcceptZeroRate" id="x_AcceptZeroRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AcceptZeroRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AcceptZeroRate->EditValue ?>"<?php echo $pharmacy_products->AcceptZeroRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AcceptZeroRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
	<div id="r_ExciseDutyCode" class="form-group row">
		<label id="elh_pharmacy_products_ExciseDutyCode" for="x_ExciseDutyCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ExciseDutyCode->caption() ?><?php echo ($pharmacy_products->ExciseDutyCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ExciseDutyCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ExciseDutyCode">
<input type="text" data-table="pharmacy_products" data-field="x_ExciseDutyCode" name="x_ExciseDutyCode" id="x_ExciseDutyCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ExciseDutyCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ExciseDutyCode->EditValue ?>"<?php echo $pharmacy_products->ExciseDutyCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ExciseDutyCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
	<div id="r_IndentProductGroupCode" class="form-group row">
		<label id="elh_pharmacy_products_IndentProductGroupCode" for="x_IndentProductGroupCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IndentProductGroupCode->caption() ?><?php echo ($pharmacy_products->IndentProductGroupCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IndentProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_IndentProductGroupCode">
<input type="text" data-table="pharmacy_products" data-field="x_IndentProductGroupCode" name="x_IndentProductGroupCode" id="x_IndentProductGroupCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IndentProductGroupCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IndentProductGroupCode->EditValue ?>"<?php echo $pharmacy_products->IndentProductGroupCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IndentProductGroupCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IsMultiBatch->Visible) { // IsMultiBatch ?>
	<div id="r_IsMultiBatch" class="form-group row">
		<label id="elh_pharmacy_products_IsMultiBatch" for="x_IsMultiBatch" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IsMultiBatch->caption() ?><?php echo ($pharmacy_products->IsMultiBatch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IsMultiBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMultiBatch">
<input type="text" data-table="pharmacy_products" data-field="x_IsMultiBatch" name="x_IsMultiBatch" id="x_IsMultiBatch" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IsMultiBatch->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IsMultiBatch->EditValue ?>"<?php echo $pharmacy_products->IsMultiBatch->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IsMultiBatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IsSingleBatch->Visible) { // IsSingleBatch ?>
	<div id="r_IsSingleBatch" class="form-group row">
		<label id="elh_pharmacy_products_IsSingleBatch" for="x_IsSingleBatch" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IsSingleBatch->caption() ?><?php echo ($pharmacy_products->IsSingleBatch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IsSingleBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsSingleBatch">
<input type="text" data-table="pharmacy_products" data-field="x_IsSingleBatch" name="x_IsSingleBatch" id="x_IsSingleBatch" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IsSingleBatch->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IsSingleBatch->EditValue ?>"<?php echo $pharmacy_products->IsSingleBatch->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IsSingleBatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate1->Visible) { // MarkUpRate1 ?>
	<div id="r_MarkUpRate1" class="form-group row">
		<label id="elh_pharmacy_products_MarkUpRate1" for="x_MarkUpRate1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MarkUpRate1->caption() ?><?php echo ($pharmacy_products->MarkUpRate1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MarkUpRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate1">
<input type="text" data-table="pharmacy_products" data-field="x_MarkUpRate1" name="x_MarkUpRate1" id="x_MarkUpRate1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MarkUpRate1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MarkUpRate1->EditValue ?>"<?php echo $pharmacy_products->MarkUpRate1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MarkUpRate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate1->Visible) { // MarkDownRate1 ?>
	<div id="r_MarkDownRate1" class="form-group row">
		<label id="elh_pharmacy_products_MarkDownRate1" for="x_MarkDownRate1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MarkDownRate1->caption() ?><?php echo ($pharmacy_products->MarkDownRate1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MarkDownRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate1">
<input type="text" data-table="pharmacy_products" data-field="x_MarkDownRate1" name="x_MarkDownRate1" id="x_MarkDownRate1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MarkDownRate1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MarkDownRate1->EditValue ?>"<?php echo $pharmacy_products->MarkDownRate1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MarkDownRate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate2->Visible) { // MarkUpRate2 ?>
	<div id="r_MarkUpRate2" class="form-group row">
		<label id="elh_pharmacy_products_MarkUpRate2" for="x_MarkUpRate2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MarkUpRate2->caption() ?><?php echo ($pharmacy_products->MarkUpRate2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MarkUpRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate2">
<input type="text" data-table="pharmacy_products" data-field="x_MarkUpRate2" name="x_MarkUpRate2" id="x_MarkUpRate2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MarkUpRate2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MarkUpRate2->EditValue ?>"<?php echo $pharmacy_products->MarkUpRate2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MarkUpRate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate2->Visible) { // MarkDownRate2 ?>
	<div id="r_MarkDownRate2" class="form-group row">
		<label id="elh_pharmacy_products_MarkDownRate2" for="x_MarkDownRate2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MarkDownRate2->caption() ?><?php echo ($pharmacy_products->MarkDownRate2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MarkDownRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate2">
<input type="text" data-table="pharmacy_products" data-field="x_MarkDownRate2" name="x_MarkDownRate2" id="x_MarkDownRate2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MarkDownRate2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MarkDownRate2->EditValue ?>"<?php echo $pharmacy_products->MarkDownRate2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MarkDownRate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->_Yield->Visible) { // Yield ?>
	<div id="r__Yield" class="form-group row">
		<label id="elh_pharmacy_products__Yield" for="x__Yield" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->_Yield->caption() ?><?php echo ($pharmacy_products->_Yield->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->_Yield->cellAttributes() ?>>
<span id="el_pharmacy_products__Yield">
<input type="text" data-table="pharmacy_products" data-field="x__Yield" name="x__Yield" id="x__Yield" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->_Yield->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->_Yield->EditValue ?>"<?php echo $pharmacy_products->_Yield->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->_Yield->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->RefProductCode->Visible) { // RefProductCode ?>
	<div id="r_RefProductCode" class="form-group row">
		<label id="elh_pharmacy_products_RefProductCode" for="x_RefProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->RefProductCode->caption() ?><?php echo ($pharmacy_products->RefProductCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->RefProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RefProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_RefProductCode" name="x_RefProductCode" id="x_RefProductCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->RefProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->RefProductCode->EditValue ?>"<?php echo $pharmacy_products->RefProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->RefProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_pharmacy_products_Volume" for="x_Volume" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Volume->caption() ?><?php echo ($pharmacy_products->Volume->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Volume->cellAttributes() ?>>
<span id="el_pharmacy_products_Volume">
<input type="text" data-table="pharmacy_products" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->Volume->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Volume->EditValue ?>"<?php echo $pharmacy_products->Volume->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MeasurementID->Visible) { // MeasurementID ?>
	<div id="r_MeasurementID" class="form-group row">
		<label id="elh_pharmacy_products_MeasurementID" for="x_MeasurementID" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MeasurementID->caption() ?><?php echo ($pharmacy_products->MeasurementID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MeasurementID->cellAttributes() ?>>
<span id="el_pharmacy_products_MeasurementID">
<input type="text" data-table="pharmacy_products" data-field="x_MeasurementID" name="x_MeasurementID" id="x_MeasurementID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MeasurementID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MeasurementID->EditValue ?>"<?php echo $pharmacy_products->MeasurementID->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MeasurementID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CountryCode->Visible) { // CountryCode ?>
	<div id="r_CountryCode" class="form-group row">
		<label id="elh_pharmacy_products_CountryCode" for="x_CountryCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CountryCode->caption() ?><?php echo ($pharmacy_products->CountryCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CountryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CountryCode">
<input type="text" data-table="pharmacy_products" data-field="x_CountryCode" name="x_CountryCode" id="x_CountryCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->CountryCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CountryCode->EditValue ?>"<?php echo $pharmacy_products->CountryCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CountryCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AcceptWMQty->Visible) { // AcceptWMQty ?>
	<div id="r_AcceptWMQty" class="form-group row">
		<label id="elh_pharmacy_products_AcceptWMQty" for="x_AcceptWMQty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AcceptWMQty->caption() ?><?php echo ($pharmacy_products->AcceptWMQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AcceptWMQty->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptWMQty">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptWMQty" name="x_AcceptWMQty" id="x_AcceptWMQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AcceptWMQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AcceptWMQty->EditValue ?>"<?php echo $pharmacy_products->AcceptWMQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AcceptWMQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
	<div id="r_SingleBatchBasedOnRate" class="form-group row">
		<label id="elh_pharmacy_products_SingleBatchBasedOnRate" for="x_SingleBatchBasedOnRate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SingleBatchBasedOnRate->caption() ?><?php echo ($pharmacy_products->SingleBatchBasedOnRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBatchBasedOnRate">
<input type="text" data-table="pharmacy_products" data-field="x_SingleBatchBasedOnRate" name="x_SingleBatchBasedOnRate" id="x_SingleBatchBasedOnRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SingleBatchBasedOnRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SingleBatchBasedOnRate->EditValue ?>"<?php echo $pharmacy_products->SingleBatchBasedOnRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SingleBatchBasedOnRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TenderNo->Visible) { // TenderNo ?>
	<div id="r_TenderNo" class="form-group row">
		<label id="elh_pharmacy_products_TenderNo" for="x_TenderNo" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TenderNo->caption() ?><?php echo ($pharmacy_products->TenderNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TenderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TenderNo">
<input type="text" data-table="pharmacy_products" data-field="x_TenderNo" name="x_TenderNo" id="x_TenderNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->TenderNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TenderNo->EditValue ?>"<?php echo $pharmacy_products->TenderNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TenderNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
	<div id="r_SingleBillMaximumSoldQtyFiled" class="form-group row">
		<label id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" for="x_SingleBillMaximumSoldQtyFiled" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->caption() ?><?php echo ($pharmacy_products->SingleBillMaximumSoldQtyFiled->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBillMaximumSoldQtyFiled">
<input type="text" data-table="pharmacy_products" data-field="x_SingleBillMaximumSoldQtyFiled" name="x_SingleBillMaximumSoldQtyFiled" id="x_SingleBillMaximumSoldQtyFiled" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SingleBillMaximumSoldQtyFiled->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->EditValue ?>"<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Strength1->Visible) { // Strength1 ?>
	<div id="r_Strength1" class="form-group row">
		<label id="elh_pharmacy_products_Strength1" for="x_Strength1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Strength1->caption() ?><?php echo ($pharmacy_products->Strength1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Strength1->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength1">
<input type="text" data-table="pharmacy_products" data-field="x_Strength1" name="x_Strength1" id="x_Strength1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->Strength1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Strength1->EditValue ?>"<?php echo $pharmacy_products->Strength1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Strength1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Strength2->Visible) { // Strength2 ?>
	<div id="r_Strength2" class="form-group row">
		<label id="elh_pharmacy_products_Strength2" for="x_Strength2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Strength2->caption() ?><?php echo ($pharmacy_products->Strength2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Strength2->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength2">
<input type="text" data-table="pharmacy_products" data-field="x_Strength2" name="x_Strength2" id="x_Strength2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->Strength2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Strength2->EditValue ?>"<?php echo $pharmacy_products->Strength2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Strength2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Strength3->Visible) { // Strength3 ?>
	<div id="r_Strength3" class="form-group row">
		<label id="elh_pharmacy_products_Strength3" for="x_Strength3" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Strength3->caption() ?><?php echo ($pharmacy_products->Strength3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Strength3->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength3">
<input type="text" data-table="pharmacy_products" data-field="x_Strength3" name="x_Strength3" id="x_Strength3" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->Strength3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Strength3->EditValue ?>"<?php echo $pharmacy_products->Strength3->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Strength3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Strength4->Visible) { // Strength4 ?>
	<div id="r_Strength4" class="form-group row">
		<label id="elh_pharmacy_products_Strength4" for="x_Strength4" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Strength4->caption() ?><?php echo ($pharmacy_products->Strength4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Strength4->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength4">
<input type="text" data-table="pharmacy_products" data-field="x_Strength4" name="x_Strength4" id="x_Strength4" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->Strength4->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Strength4->EditValue ?>"<?php echo $pharmacy_products->Strength4->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Strength4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->Strength5->Visible) { // Strength5 ?>
	<div id="r_Strength5" class="form-group row">
		<label id="elh_pharmacy_products_Strength5" for="x_Strength5" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->Strength5->caption() ?><?php echo ($pharmacy_products->Strength5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->Strength5->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength5">
<input type="text" data-table="pharmacy_products" data-field="x_Strength5" name="x_Strength5" id="x_Strength5" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products->Strength5->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->Strength5->EditValue ?>"<?php echo $pharmacy_products->Strength5->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->Strength5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode1->Visible) { // IngredientCode1 ?>
	<div id="r_IngredientCode1" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode1" for="x_IngredientCode1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IngredientCode1->caption() ?><?php echo ($pharmacy_products->IngredientCode1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IngredientCode1->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode1">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode1" name="x_IngredientCode1" id="x_IngredientCode1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IngredientCode1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IngredientCode1->EditValue ?>"<?php echo $pharmacy_products->IngredientCode1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IngredientCode1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode2->Visible) { // IngredientCode2 ?>
	<div id="r_IngredientCode2" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode2" for="x_IngredientCode2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IngredientCode2->caption() ?><?php echo ($pharmacy_products->IngredientCode2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IngredientCode2->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode2">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode2" name="x_IngredientCode2" id="x_IngredientCode2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IngredientCode2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IngredientCode2->EditValue ?>"<?php echo $pharmacy_products->IngredientCode2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IngredientCode2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode3->Visible) { // IngredientCode3 ?>
	<div id="r_IngredientCode3" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode3" for="x_IngredientCode3" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IngredientCode3->caption() ?><?php echo ($pharmacy_products->IngredientCode3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IngredientCode3->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode3">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode3" name="x_IngredientCode3" id="x_IngredientCode3" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IngredientCode3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IngredientCode3->EditValue ?>"<?php echo $pharmacy_products->IngredientCode3->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IngredientCode3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode4->Visible) { // IngredientCode4 ?>
	<div id="r_IngredientCode4" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode4" for="x_IngredientCode4" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IngredientCode4->caption() ?><?php echo ($pharmacy_products->IngredientCode4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IngredientCode4->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode4">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode4" name="x_IngredientCode4" id="x_IngredientCode4" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IngredientCode4->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IngredientCode4->EditValue ?>"<?php echo $pharmacy_products->IngredientCode4->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IngredientCode4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode5->Visible) { // IngredientCode5 ?>
	<div id="r_IngredientCode5" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode5" for="x_IngredientCode5" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IngredientCode5->caption() ?><?php echo ($pharmacy_products->IngredientCode5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IngredientCode5->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode5">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode5" name="x_IngredientCode5" id="x_IngredientCode5" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IngredientCode5->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IngredientCode5->EditValue ?>"<?php echo $pharmacy_products->IngredientCode5->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IngredientCode5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->OrderType->Visible) { // OrderType ?>
	<div id="r_OrderType" class="form-group row">
		<label id="elh_pharmacy_products_OrderType" for="x_OrderType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->OrderType->caption() ?><?php echo ($pharmacy_products->OrderType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->OrderType->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderType">
<input type="text" data-table="pharmacy_products" data-field="x_OrderType" name="x_OrderType" id="x_OrderType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->OrderType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->OrderType->EditValue ?>"<?php echo $pharmacy_products->OrderType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->OrderType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->StockUOM->Visible) { // StockUOM ?>
	<div id="r_StockUOM" class="form-group row">
		<label id="elh_pharmacy_products_StockUOM" for="x_StockUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->StockUOM->caption() ?><?php echo ($pharmacy_products->StockUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->StockUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_StockUOM">
<input type="text" data-table="pharmacy_products" data-field="x_StockUOM" name="x_StockUOM" id="x_StockUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->StockUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->StockUOM->EditValue ?>"<?php echo $pharmacy_products->StockUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->StockUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PriceUOM->Visible) { // PriceUOM ?>
	<div id="r_PriceUOM" class="form-group row">
		<label id="elh_pharmacy_products_PriceUOM" for="x_PriceUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PriceUOM->caption() ?><?php echo ($pharmacy_products->PriceUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PriceUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceUOM">
<input type="text" data-table="pharmacy_products" data-field="x_PriceUOM" name="x_PriceUOM" id="x_PriceUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PriceUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PriceUOM->EditValue ?>"<?php echo $pharmacy_products->PriceUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PriceUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
	<div id="r_DefaultSaleUOM" class="form-group row">
		<label id="elh_pharmacy_products_DefaultSaleUOM" for="x_DefaultSaleUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DefaultSaleUOM->caption() ?><?php echo ($pharmacy_products->DefaultSaleUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DefaultSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultSaleUOM">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultSaleUOM" name="x_DefaultSaleUOM" id="x_DefaultSaleUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DefaultSaleUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DefaultSaleUOM->EditValue ?>"<?php echo $pharmacy_products->DefaultSaleUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DefaultSaleUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
	<div id="r_DefaultPurchaseUOM" class="form-group row">
		<label id="elh_pharmacy_products_DefaultPurchaseUOM" for="x_DefaultPurchaseUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DefaultPurchaseUOM->caption() ?><?php echo ($pharmacy_products->DefaultPurchaseUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultPurchaseUOM">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultPurchaseUOM" name="x_DefaultPurchaseUOM" id="x_DefaultPurchaseUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DefaultPurchaseUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DefaultPurchaseUOM->EditValue ?>"<?php echo $pharmacy_products->DefaultPurchaseUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DefaultPurchaseUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ReportingUOM->Visible) { // ReportingUOM ?>
	<div id="r_ReportingUOM" class="form-group row">
		<label id="elh_pharmacy_products_ReportingUOM" for="x_ReportingUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ReportingUOM->caption() ?><?php echo ($pharmacy_products->ReportingUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ReportingUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_ReportingUOM">
<input type="text" data-table="pharmacy_products" data-field="x_ReportingUOM" name="x_ReportingUOM" id="x_ReportingUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ReportingUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ReportingUOM->EditValue ?>"<?php echo $pharmacy_products->ReportingUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ReportingUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
	<div id="r_LastPurchasedUOM" class="form-group row">
		<label id="elh_pharmacy_products_LastPurchasedUOM" for="x_LastPurchasedUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LastPurchasedUOM->caption() ?><?php echo ($pharmacy_products->LastPurchasedUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LastPurchasedUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPurchasedUOM">
<input type="text" data-table="pharmacy_products" data-field="x_LastPurchasedUOM" name="x_LastPurchasedUOM" id="x_LastPurchasedUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->LastPurchasedUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->LastPurchasedUOM->EditValue ?>"<?php echo $pharmacy_products->LastPurchasedUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->LastPurchasedUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TreatmentCodes->Visible) { // TreatmentCodes ?>
	<div id="r_TreatmentCodes" class="form-group row">
		<label id="elh_pharmacy_products_TreatmentCodes" for="x_TreatmentCodes" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TreatmentCodes->caption() ?><?php echo ($pharmacy_products->TreatmentCodes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TreatmentCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_TreatmentCodes">
<input type="text" data-table="pharmacy_products" data-field="x_TreatmentCodes" name="x_TreatmentCodes" id="x_TreatmentCodes" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products->TreatmentCodes->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TreatmentCodes->EditValue ?>"<?php echo $pharmacy_products->TreatmentCodes->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TreatmentCodes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->InsuranceType->Visible) { // InsuranceType ?>
	<div id="r_InsuranceType" class="form-group row">
		<label id="elh_pharmacy_products_InsuranceType" for="x_InsuranceType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->InsuranceType->caption() ?><?php echo ($pharmacy_products->InsuranceType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->InsuranceType->cellAttributes() ?>>
<span id="el_pharmacy_products_InsuranceType">
<input type="text" data-table="pharmacy_products" data-field="x_InsuranceType" name="x_InsuranceType" id="x_InsuranceType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->InsuranceType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->InsuranceType->EditValue ?>"<?php echo $pharmacy_products->InsuranceType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->InsuranceType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
	<div id="r_CoverageGroupCodes" class="form-group row">
		<label id="elh_pharmacy_products_CoverageGroupCodes" for="x_CoverageGroupCodes" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->CoverageGroupCodes->caption() ?><?php echo ($pharmacy_products->CoverageGroupCodes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->CoverageGroupCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_CoverageGroupCodes">
<input type="text" data-table="pharmacy_products" data-field="x_CoverageGroupCodes" name="x_CoverageGroupCodes" id="x_CoverageGroupCodes" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products->CoverageGroupCodes->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->CoverageGroupCodes->EditValue ?>"<?php echo $pharmacy_products->CoverageGroupCodes->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->CoverageGroupCodes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MultipleUOM->Visible) { // MultipleUOM ?>
	<div id="r_MultipleUOM" class="form-group row">
		<label id="elh_pharmacy_products_MultipleUOM" for="x_MultipleUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MultipleUOM->caption() ?><?php echo ($pharmacy_products->MultipleUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MultipleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleUOM">
<input type="text" data-table="pharmacy_products" data-field="x_MultipleUOM" name="x_MultipleUOM" id="x_MultipleUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MultipleUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MultipleUOM->EditValue ?>"<?php echo $pharmacy_products->MultipleUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MultipleUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SalePriceComputation->Visible) { // SalePriceComputation ?>
	<div id="r_SalePriceComputation" class="form-group row">
		<label id="elh_pharmacy_products_SalePriceComputation" for="x_SalePriceComputation" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SalePriceComputation->caption() ?><?php echo ($pharmacy_products->SalePriceComputation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SalePriceComputation->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePriceComputation">
<input type="text" data-table="pharmacy_products" data-field="x_SalePriceComputation" name="x_SalePriceComputation" id="x_SalePriceComputation" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SalePriceComputation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SalePriceComputation->EditValue ?>"<?php echo $pharmacy_products->SalePriceComputation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SalePriceComputation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->StockCorrection->Visible) { // StockCorrection ?>
	<div id="r_StockCorrection" class="form-group row">
		<label id="elh_pharmacy_products_StockCorrection" for="x_StockCorrection" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->StockCorrection->caption() ?><?php echo ($pharmacy_products->StockCorrection->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->StockCorrection->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCorrection">
<input type="text" data-table="pharmacy_products" data-field="x_StockCorrection" name="x_StockCorrection" id="x_StockCorrection" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->StockCorrection->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->StockCorrection->EditValue ?>"<?php echo $pharmacy_products->StockCorrection->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->StockCorrection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LBTPercentage->Visible) { // LBTPercentage ?>
	<div id="r_LBTPercentage" class="form-group row">
		<label id="elh_pharmacy_products_LBTPercentage" for="x_LBTPercentage" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LBTPercentage->caption() ?><?php echo ($pharmacy_products->LBTPercentage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LBTPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_LBTPercentage">
<input type="text" data-table="pharmacy_products" data-field="x_LBTPercentage" name="x_LBTPercentage" id="x_LBTPercentage" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->LBTPercentage->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->LBTPercentage->EditValue ?>"<?php echo $pharmacy_products->LBTPercentage->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->LBTPercentage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->SalesCommission->Visible) { // SalesCommission ?>
	<div id="r_SalesCommission" class="form-group row">
		<label id="elh_pharmacy_products_SalesCommission" for="x_SalesCommission" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->SalesCommission->caption() ?><?php echo ($pharmacy_products->SalesCommission->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->SalesCommission->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesCommission">
<input type="text" data-table="pharmacy_products" data-field="x_SalesCommission" name="x_SalesCommission" id="x_SalesCommission" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->SalesCommission->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->SalesCommission->EditValue ?>"<?php echo $pharmacy_products->SalesCommission->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->SalesCommission->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LockedStock->Visible) { // LockedStock ?>
	<div id="r_LockedStock" class="form-group row">
		<label id="elh_pharmacy_products_LockedStock" for="x_LockedStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LockedStock->caption() ?><?php echo ($pharmacy_products->LockedStock->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LockedStock->cellAttributes() ?>>
<span id="el_pharmacy_products_LockedStock">
<input type="text" data-table="pharmacy_products" data-field="x_LockedStock" name="x_LockedStock" id="x_LockedStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->LockedStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->LockedStock->EditValue ?>"<?php echo $pharmacy_products->LockedStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->LockedStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MinMaxUOM->Visible) { // MinMaxUOM ?>
	<div id="r_MinMaxUOM" class="form-group row">
		<label id="elh_pharmacy_products_MinMaxUOM" for="x_MinMaxUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MinMaxUOM->caption() ?><?php echo ($pharmacy_products->MinMaxUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MinMaxUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxUOM">
<input type="text" data-table="pharmacy_products" data-field="x_MinMaxUOM" name="x_MinMaxUOM" id="x_MinMaxUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MinMaxUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MinMaxUOM->EditValue ?>"<?php echo $pharmacy_products->MinMaxUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MinMaxUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
	<div id="r_ExpiryMfrDateFormat" class="form-group row">
		<label id="elh_pharmacy_products_ExpiryMfrDateFormat" for="x_ExpiryMfrDateFormat" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ExpiryMfrDateFormat->caption() ?><?php echo ($pharmacy_products->ExpiryMfrDateFormat->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryMfrDateFormat">
<input type="text" data-table="pharmacy_products" data-field="x_ExpiryMfrDateFormat" name="x_ExpiryMfrDateFormat" id="x_ExpiryMfrDateFormat" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ExpiryMfrDateFormat->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ExpiryMfrDateFormat->EditValue ?>"<?php echo $pharmacy_products->ExpiryMfrDateFormat->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ExpiryMfrDateFormat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ProductLifeTime->Visible) { // ProductLifeTime ?>
	<div id="r_ProductLifeTime" class="form-group row">
		<label id="elh_pharmacy_products_ProductLifeTime" for="x_ProductLifeTime" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ProductLifeTime->caption() ?><?php echo ($pharmacy_products->ProductLifeTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ProductLifeTime->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLifeTime">
<input type="text" data-table="pharmacy_products" data-field="x_ProductLifeTime" name="x_ProductLifeTime" id="x_ProductLifeTime" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ProductLifeTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ProductLifeTime->EditValue ?>"<?php echo $pharmacy_products->ProductLifeTime->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ProductLifeTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IsCombo->Visible) { // IsCombo ?>
	<div id="r_IsCombo" class="form-group row">
		<label id="elh_pharmacy_products_IsCombo" for="x_IsCombo" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IsCombo->caption() ?><?php echo ($pharmacy_products->IsCombo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IsCombo->cellAttributes() ?>>
<span id="el_pharmacy_products_IsCombo">
<input type="text" data-table="pharmacy_products" data-field="x_IsCombo" name="x_IsCombo" id="x_IsCombo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IsCombo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IsCombo->EditValue ?>"<?php echo $pharmacy_products->IsCombo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IsCombo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ComboTypeCode->Visible) { // ComboTypeCode ?>
	<div id="r_ComboTypeCode" class="form-group row">
		<label id="elh_pharmacy_products_ComboTypeCode" for="x_ComboTypeCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ComboTypeCode->caption() ?><?php echo ($pharmacy_products->ComboTypeCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ComboTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ComboTypeCode">
<input type="text" data-table="pharmacy_products" data-field="x_ComboTypeCode" name="x_ComboTypeCode" id="x_ComboTypeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ComboTypeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ComboTypeCode->EditValue ?>"<?php echo $pharmacy_products->ComboTypeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ComboTypeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount6->Visible) { // AttributeCount6 ?>
	<div id="r_AttributeCount6" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount6" for="x_AttributeCount6" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount6->caption() ?><?php echo ($pharmacy_products->AttributeCount6->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount6->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount6">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount6" name="x_AttributeCount6" id="x_AttributeCount6" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount6->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount6->EditValue ?>"<?php echo $pharmacy_products->AttributeCount6->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount7->Visible) { // AttributeCount7 ?>
	<div id="r_AttributeCount7" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount7" for="x_AttributeCount7" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount7->caption() ?><?php echo ($pharmacy_products->AttributeCount7->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount7->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount7">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount7" name="x_AttributeCount7" id="x_AttributeCount7" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount7->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount7->EditValue ?>"<?php echo $pharmacy_products->AttributeCount7->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount8->Visible) { // AttributeCount8 ?>
	<div id="r_AttributeCount8" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount8" for="x_AttributeCount8" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount8->caption() ?><?php echo ($pharmacy_products->AttributeCount8->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount8->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount8">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount8" name="x_AttributeCount8" id="x_AttributeCount8" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount8->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount8->EditValue ?>"<?php echo $pharmacy_products->AttributeCount8->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount9->Visible) { // AttributeCount9 ?>
	<div id="r_AttributeCount9" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount9" for="x_AttributeCount9" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount9->caption() ?><?php echo ($pharmacy_products->AttributeCount9->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount9->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount9">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount9" name="x_AttributeCount9" id="x_AttributeCount9" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount9->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount9->EditValue ?>"<?php echo $pharmacy_products->AttributeCount9->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount10->Visible) { // AttributeCount10 ?>
	<div id="r_AttributeCount10" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount10" for="x_AttributeCount10" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AttributeCount10->caption() ?><?php echo ($pharmacy_products->AttributeCount10->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AttributeCount10->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount10">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount10" name="x_AttributeCount10" id="x_AttributeCount10" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AttributeCount10->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AttributeCount10->EditValue ?>"<?php echo $pharmacy_products->AttributeCount10->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AttributeCount10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LabourCharge->Visible) { // LabourCharge ?>
	<div id="r_LabourCharge" class="form-group row">
		<label id="elh_pharmacy_products_LabourCharge" for="x_LabourCharge" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LabourCharge->caption() ?><?php echo ($pharmacy_products->LabourCharge->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LabourCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_LabourCharge">
<input type="text" data-table="pharmacy_products" data-field="x_LabourCharge" name="x_LabourCharge" id="x_LabourCharge" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->LabourCharge->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->LabourCharge->EditValue ?>"<?php echo $pharmacy_products->LabourCharge->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->LabourCharge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
	<div id="r_AffectOtherCharge" class="form-group row">
		<label id="elh_pharmacy_products_AffectOtherCharge" for="x_AffectOtherCharge" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AffectOtherCharge->caption() ?><?php echo ($pharmacy_products->AffectOtherCharge->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AffectOtherCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_AffectOtherCharge">
<input type="text" data-table="pharmacy_products" data-field="x_AffectOtherCharge" name="x_AffectOtherCharge" id="x_AffectOtherCharge" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AffectOtherCharge->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AffectOtherCharge->EditValue ?>"<?php echo $pharmacy_products->AffectOtherCharge->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AffectOtherCharge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DosageInfo->Visible) { // DosageInfo ?>
	<div id="r_DosageInfo" class="form-group row">
		<label id="elh_pharmacy_products_DosageInfo" for="x_DosageInfo" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DosageInfo->caption() ?><?php echo ($pharmacy_products->DosageInfo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DosageInfo->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageInfo">
<input type="text" data-table="pharmacy_products" data-field="x_DosageInfo" name="x_DosageInfo" id="x_DosageInfo" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products->DosageInfo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DosageInfo->EditValue ?>"<?php echo $pharmacy_products->DosageInfo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DosageInfo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DosageType->Visible) { // DosageType ?>
	<div id="r_DosageType" class="form-group row">
		<label id="elh_pharmacy_products_DosageType" for="x_DosageType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DosageType->caption() ?><?php echo ($pharmacy_products->DosageType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DosageType->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageType">
<input type="text" data-table="pharmacy_products" data-field="x_DosageType" name="x_DosageType" id="x_DosageType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DosageType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DosageType->EditValue ?>"<?php echo $pharmacy_products->DosageType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DosageType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
	<div id="r_DefaultIndentUOM" class="form-group row">
		<label id="elh_pharmacy_products_DefaultIndentUOM" for="x_DefaultIndentUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->DefaultIndentUOM->caption() ?><?php echo ($pharmacy_products->DefaultIndentUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->DefaultIndentUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultIndentUOM">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultIndentUOM" name="x_DefaultIndentUOM" id="x_DefaultIndentUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->DefaultIndentUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->DefaultIndentUOM->EditValue ?>"<?php echo $pharmacy_products->DefaultIndentUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->DefaultIndentUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PromoTag->Visible) { // PromoTag ?>
	<div id="r_PromoTag" class="form-group row">
		<label id="elh_pharmacy_products_PromoTag" for="x_PromoTag" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PromoTag->caption() ?><?php echo ($pharmacy_products->PromoTag->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_PromoTag">
<input type="text" data-table="pharmacy_products" data-field="x_PromoTag" name="x_PromoTag" id="x_PromoTag" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PromoTag->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PromoTag->EditValue ?>"<?php echo $pharmacy_products->PromoTag->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PromoTag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
	<div id="r_BillLevelPromoTag" class="form-group row">
		<label id="elh_pharmacy_products_BillLevelPromoTag" for="x_BillLevelPromoTag" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->BillLevelPromoTag->caption() ?><?php echo ($pharmacy_products->BillLevelPromoTag->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->BillLevelPromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_BillLevelPromoTag">
<input type="text" data-table="pharmacy_products" data-field="x_BillLevelPromoTag" name="x_BillLevelPromoTag" id="x_BillLevelPromoTag" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->BillLevelPromoTag->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->BillLevelPromoTag->EditValue ?>"<?php echo $pharmacy_products->BillLevelPromoTag->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->BillLevelPromoTag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->IsMRPProduct->Visible) { // IsMRPProduct ?>
	<div id="r_IsMRPProduct" class="form-group row">
		<label id="elh_pharmacy_products_IsMRPProduct" for="x_IsMRPProduct" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->IsMRPProduct->caption() ?><?php echo ($pharmacy_products->IsMRPProduct->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->IsMRPProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMRPProduct">
<input type="text" data-table="pharmacy_products" data-field="x_IsMRPProduct" name="x_IsMRPProduct" id="x_IsMRPProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->IsMRPProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->IsMRPProduct->EditValue ?>"<?php echo $pharmacy_products->IsMRPProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->IsMRPProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MrpList->Visible) { // MrpList ?>
	<div id="r_MrpList" class="form-group row">
		<label id="elh_pharmacy_products_MrpList" for="x_MrpList" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MrpList->caption() ?><?php echo ($pharmacy_products->MrpList->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MrpList->cellAttributes() ?>>
<span id="el_pharmacy_products_MrpList">
<textarea data-table="pharmacy_products" data-field="x_MrpList" name="x_MrpList" id="x_MrpList" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_products->MrpList->getPlaceHolder()) ?>"<?php echo $pharmacy_products->MrpList->editAttributes() ?>><?php echo $pharmacy_products->MrpList->EditValue ?></textarea>
</span>
<?php echo $pharmacy_products->MrpList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
	<div id="r_AlternateSaleUOM" class="form-group row">
		<label id="elh_pharmacy_products_AlternateSaleUOM" for="x_AlternateSaleUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AlternateSaleUOM->caption() ?><?php echo ($pharmacy_products->AlternateSaleUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AlternateSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSaleUOM">
<input type="text" data-table="pharmacy_products" data-field="x_AlternateSaleUOM" name="x_AlternateSaleUOM" id="x_AlternateSaleUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AlternateSaleUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AlternateSaleUOM->EditValue ?>"<?php echo $pharmacy_products->AlternateSaleUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AlternateSaleUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FreeUOM->Visible) { // FreeUOM ?>
	<div id="r_FreeUOM" class="form-group row">
		<label id="elh_pharmacy_products_FreeUOM" for="x_FreeUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FreeUOM->caption() ?><?php echo ($pharmacy_products->FreeUOM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FreeUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeUOM">
<input type="text" data-table="pharmacy_products" data-field="x_FreeUOM" name="x_FreeUOM" id="x_FreeUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->FreeUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FreeUOM->EditValue ?>"<?php echo $pharmacy_products->FreeUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->FreeUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MarketedCode->Visible) { // MarketedCode ?>
	<div id="r_MarketedCode" class="form-group row">
		<label id="elh_pharmacy_products_MarketedCode" for="x_MarketedCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MarketedCode->caption() ?><?php echo ($pharmacy_products->MarketedCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MarketedCode->cellAttributes() ?>>
<span id="el_pharmacy_products_MarketedCode">
<input type="text" data-table="pharmacy_products" data-field="x_MarketedCode" name="x_MarketedCode" id="x_MarketedCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products->MarketedCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MarketedCode->EditValue ?>"<?php echo $pharmacy_products->MarketedCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MarketedCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
	<div id="r_MinimumSalePrice" class="form-group row">
		<label id="elh_pharmacy_products_MinimumSalePrice" for="x_MinimumSalePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->MinimumSalePrice->caption() ?><?php echo ($pharmacy_products->MinimumSalePrice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->MinimumSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumSalePrice">
<input type="text" data-table="pharmacy_products" data-field="x_MinimumSalePrice" name="x_MinimumSalePrice" id="x_MinimumSalePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->MinimumSalePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->MinimumSalePrice->EditValue ?>"<?php echo $pharmacy_products->MinimumSalePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->MinimumSalePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PRate1->Visible) { // PRate1 ?>
	<div id="r_PRate1" class="form-group row">
		<label id="elh_pharmacy_products_PRate1" for="x_PRate1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PRate1->caption() ?><?php echo ($pharmacy_products->PRate1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate1">
<input type="text" data-table="pharmacy_products" data-field="x_PRate1" name="x_PRate1" id="x_PRate1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PRate1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PRate1->EditValue ?>"<?php echo $pharmacy_products->PRate1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PRate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->PRate2->Visible) { // PRate2 ?>
	<div id="r_PRate2" class="form-group row">
		<label id="elh_pharmacy_products_PRate2" for="x_PRate2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->PRate2->caption() ?><?php echo ($pharmacy_products->PRate2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->PRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate2">
<input type="text" data-table="pharmacy_products" data-field="x_PRate2" name="x_PRate2" id="x_PRate2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->PRate2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->PRate2->EditValue ?>"<?php echo $pharmacy_products->PRate2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->PRate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->LPItemCost->Visible) { // LPItemCost ?>
	<div id="r_LPItemCost" class="form-group row">
		<label id="elh_pharmacy_products_LPItemCost" for="x_LPItemCost" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->LPItemCost->caption() ?><?php echo ($pharmacy_products->LPItemCost->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->LPItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_LPItemCost">
<input type="text" data-table="pharmacy_products" data-field="x_LPItemCost" name="x_LPItemCost" id="x_LPItemCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->LPItemCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->LPItemCost->EditValue ?>"<?php echo $pharmacy_products->LPItemCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->LPItemCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->FixedItemCost->Visible) { // FixedItemCost ?>
	<div id="r_FixedItemCost" class="form-group row">
		<label id="elh_pharmacy_products_FixedItemCost" for="x_FixedItemCost" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->FixedItemCost->caption() ?><?php echo ($pharmacy_products->FixedItemCost->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->FixedItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_FixedItemCost">
<input type="text" data-table="pharmacy_products" data-field="x_FixedItemCost" name="x_FixedItemCost" id="x_FixedItemCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->FixedItemCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->FixedItemCost->EditValue ?>"<?php echo $pharmacy_products->FixedItemCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->FixedItemCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->HSNId->Visible) { // HSNId ?>
	<div id="r_HSNId" class="form-group row">
		<label id="elh_pharmacy_products_HSNId" for="x_HSNId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->HSNId->caption() ?><?php echo ($pharmacy_products->HSNId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->HSNId->cellAttributes() ?>>
<span id="el_pharmacy_products_HSNId">
<input type="text" data-table="pharmacy_products" data-field="x_HSNId" name="x_HSNId" id="x_HSNId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->HSNId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->HSNId->EditValue ?>"<?php echo $pharmacy_products->HSNId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->HSNId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->TaxInclusive->Visible) { // TaxInclusive ?>
	<div id="r_TaxInclusive" class="form-group row">
		<label id="elh_pharmacy_products_TaxInclusive" for="x_TaxInclusive" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->TaxInclusive->caption() ?><?php echo ($pharmacy_products->TaxInclusive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->TaxInclusive->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxInclusive">
<input type="text" data-table="pharmacy_products" data-field="x_TaxInclusive" name="x_TaxInclusive" id="x_TaxInclusive" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->TaxInclusive->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->TaxInclusive->EditValue ?>"<?php echo $pharmacy_products->TaxInclusive->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->TaxInclusive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
	<div id="r_EligibleforWarranty" class="form-group row">
		<label id="elh_pharmacy_products_EligibleforWarranty" for="x_EligibleforWarranty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->EligibleforWarranty->caption() ?><?php echo ($pharmacy_products->EligibleforWarranty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->EligibleforWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_EligibleforWarranty">
<input type="text" data-table="pharmacy_products" data-field="x_EligibleforWarranty" name="x_EligibleforWarranty" id="x_EligibleforWarranty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->EligibleforWarranty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->EligibleforWarranty->EditValue ?>"<?php echo $pharmacy_products->EligibleforWarranty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->EligibleforWarranty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
	<div id="r_NoofMonthsWarranty" class="form-group row">
		<label id="elh_pharmacy_products_NoofMonthsWarranty" for="x_NoofMonthsWarranty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->NoofMonthsWarranty->caption() ?><?php echo ($pharmacy_products->NoofMonthsWarranty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_NoofMonthsWarranty">
<input type="text" data-table="pharmacy_products" data-field="x_NoofMonthsWarranty" name="x_NoofMonthsWarranty" id="x_NoofMonthsWarranty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->NoofMonthsWarranty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->NoofMonthsWarranty->EditValue ?>"<?php echo $pharmacy_products->NoofMonthsWarranty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->NoofMonthsWarranty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
	<div id="r_ComputeTaxonCost" class="form-group row">
		<label id="elh_pharmacy_products_ComputeTaxonCost" for="x_ComputeTaxonCost" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->ComputeTaxonCost->caption() ?><?php echo ($pharmacy_products->ComputeTaxonCost->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->ComputeTaxonCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputeTaxonCost">
<input type="text" data-table="pharmacy_products" data-field="x_ComputeTaxonCost" name="x_ComputeTaxonCost" id="x_ComputeTaxonCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->ComputeTaxonCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->ComputeTaxonCost->EditValue ?>"<?php echo $pharmacy_products->ComputeTaxonCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->ComputeTaxonCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
	<div id="r_HasEmptyBottleTrack" class="form-group row">
		<label id="elh_pharmacy_products_HasEmptyBottleTrack" for="x_HasEmptyBottleTrack" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->HasEmptyBottleTrack->caption() ?><?php echo ($pharmacy_products->HasEmptyBottleTrack->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el_pharmacy_products_HasEmptyBottleTrack">
<input type="text" data-table="pharmacy_products" data-field="x_HasEmptyBottleTrack" name="x_HasEmptyBottleTrack" id="x_HasEmptyBottleTrack" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->HasEmptyBottleTrack->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->HasEmptyBottleTrack->EditValue ?>"<?php echo $pharmacy_products->HasEmptyBottleTrack->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->HasEmptyBottleTrack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
	<div id="r_EmptyBottleReferenceCode" class="form-group row">
		<label id="elh_pharmacy_products_EmptyBottleReferenceCode" for="x_EmptyBottleReferenceCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->EmptyBottleReferenceCode->caption() ?><?php echo ($pharmacy_products->EmptyBottleReferenceCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleReferenceCode">
<input type="text" data-table="pharmacy_products" data-field="x_EmptyBottleReferenceCode" name="x_EmptyBottleReferenceCode" id="x_EmptyBottleReferenceCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->EmptyBottleReferenceCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->EmptyBottleReferenceCode->EditValue ?>"<?php echo $pharmacy_products->EmptyBottleReferenceCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->EmptyBottleReferenceCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
	<div id="r_AdditionalCESSAmount" class="form-group row">
		<label id="elh_pharmacy_products_AdditionalCESSAmount" for="x_AdditionalCESSAmount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->AdditionalCESSAmount->caption() ?><?php echo ($pharmacy_products->AdditionalCESSAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_AdditionalCESSAmount">
<input type="text" data-table="pharmacy_products" data-field="x_AdditionalCESSAmount" name="x_AdditionalCESSAmount" id="x_AdditionalCESSAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->AdditionalCESSAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->AdditionalCESSAmount->EditValue ?>"<?php echo $pharmacy_products->AdditionalCESSAmount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->AdditionalCESSAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
	<div id="r_EmptyBottleRate" class="form-group row">
		<label id="elh_pharmacy_products_EmptyBottleRate" for="x_EmptyBottleRate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products->EmptyBottleRate->caption() ?><?php echo ($pharmacy_products->EmptyBottleRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div<?php echo $pharmacy_products->EmptyBottleRate->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleRate">
<input type="text" data-table="pharmacy_products" data-field="x_EmptyBottleRate" name="x_EmptyBottleRate" id="x_EmptyBottleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products->EmptyBottleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products->EmptyBottleRate->EditValue ?>"<?php echo $pharmacy_products->EmptyBottleRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products->EmptyBottleRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_products_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_products_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_products_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_products_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_products_add->terminate();
?>
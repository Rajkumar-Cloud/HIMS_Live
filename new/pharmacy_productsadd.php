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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_productsadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_productsadd = currentForm = new ew.Form("fpharmacy_productsadd", "add");

	// Validate form
	fpharmacy_productsadd.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductName->caption(), $pharmacy_products_add->ProductName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->DivisionCode->Required) { ?>
				elm = this.getElements("x" + infix + "_DivisionCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DivisionCode->caption(), $pharmacy_products_add->DivisionCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->ManufacturerCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ManufacturerCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ManufacturerCode->caption(), $pharmacy_products_add->ManufacturerCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->SupplierCode->Required) { ?>
				elm = this.getElements("x" + infix + "_SupplierCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SupplierCode->caption(), $pharmacy_products_add->SupplierCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->AlternateSupplierCodes->Required) { ?>
				elm = this.getElements("x" + infix + "_AlternateSupplierCodes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AlternateSupplierCodes->caption(), $pharmacy_products_add->AlternateSupplierCodes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->AlternateProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_AlternateProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AlternateProductCode->caption(), $pharmacy_products_add->AlternateProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->UniversalProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_UniversalProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->UniversalProductCode->caption(), $pharmacy_products_add->UniversalProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UniversalProductCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->UniversalProductCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->BookProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_BookProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BookProductCode->caption(), $pharmacy_products_add->BookProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BookProductCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->BookProductCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->OldCode->Required) { ?>
				elm = this.getElements("x" + infix + "_OldCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->OldCode->caption(), $pharmacy_products_add->OldCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->ProtectedProducts->Required) { ?>
				elm = this.getElements("x" + infix + "_ProtectedProducts");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProtectedProducts->caption(), $pharmacy_products_add->ProtectedProducts->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProtectedProducts");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProtectedProducts->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductFullName->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductFullName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductFullName->caption(), $pharmacy_products_add->ProductFullName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->UnitOfMeasure->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitOfMeasure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->UnitOfMeasure->caption(), $pharmacy_products_add->UnitOfMeasure->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UnitOfMeasure");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->UnitOfMeasure->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->UnitDescription->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitDescription");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->UnitDescription->caption(), $pharmacy_products_add->UnitDescription->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->BulkDescription->Required) { ?>
				elm = this.getElements("x" + infix + "_BulkDescription");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BulkDescription->caption(), $pharmacy_products_add->BulkDescription->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->BarCodeDescription->Required) { ?>
				elm = this.getElements("x" + infix + "_BarCodeDescription");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BarCodeDescription->caption(), $pharmacy_products_add->BarCodeDescription->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->PackageInformation->Required) { ?>
				elm = this.getElements("x" + infix + "_PackageInformation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PackageInformation->caption(), $pharmacy_products_add->PackageInformation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->PackageId->Required) { ?>
				elm = this.getElements("x" + infix + "_PackageId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PackageId->caption(), $pharmacy_products_add->PackageId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PackageId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PackageId->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Weight->Required) { ?>
				elm = this.getElements("x" + infix + "_Weight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Weight->caption(), $pharmacy_products_add->Weight->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Weight");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->Weight->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AllowFractions->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowFractions");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AllowFractions->caption(), $pharmacy_products_add->AllowFractions->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowFractions");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AllowFractions->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MinimumStockLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_MinimumStockLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MinimumStockLevel->caption(), $pharmacy_products_add->MinimumStockLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MinimumStockLevel");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MinimumStockLevel->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MaximumStockLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_MaximumStockLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MaximumStockLevel->caption(), $pharmacy_products_add->MaximumStockLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MaximumStockLevel");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MaximumStockLevel->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ReorderLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_ReorderLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ReorderLevel->caption(), $pharmacy_products_add->ReorderLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReorderLevel");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ReorderLevel->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MinMaxRatio->Required) { ?>
				elm = this.getElements("x" + infix + "_MinMaxRatio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MinMaxRatio->caption(), $pharmacy_products_add->MinMaxRatio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MinMaxRatio");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MinMaxRatio->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AutoMinMaxRatio->Required) { ?>
				elm = this.getElements("x" + infix + "_AutoMinMaxRatio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AutoMinMaxRatio->caption(), $pharmacy_products_add->AutoMinMaxRatio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AutoMinMaxRatio");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AutoMinMaxRatio->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ScheduleCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ScheduleCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ScheduleCode->caption(), $pharmacy_products_add->ScheduleCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ScheduleCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ScheduleCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->RopRatio->Required) { ?>
				elm = this.getElements("x" + infix + "_RopRatio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->RopRatio->caption(), $pharmacy_products_add->RopRatio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RopRatio");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->RopRatio->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MRP->caption(), $pharmacy_products_add->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MRP->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PurchasePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_PurchasePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PurchasePrice->caption(), $pharmacy_products_add->PurchasePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurchasePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PurchasePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PurchaseUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_PurchaseUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PurchaseUnit->caption(), $pharmacy_products_add->PurchaseUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurchaseUnit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PurchaseUnit->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PurchaseTaxCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PurchaseTaxCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PurchaseTaxCode->caption(), $pharmacy_products_add->PurchaseTaxCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurchaseTaxCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PurchaseTaxCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AllowDirectInward->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowDirectInward");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AllowDirectInward->caption(), $pharmacy_products_add->AllowDirectInward->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowDirectInward");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AllowDirectInward->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SalePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_SalePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SalePrice->caption(), $pharmacy_products_add->SalePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SalePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SaleUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SaleUnit->caption(), $pharmacy_products_add->SaleUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleUnit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SaleUnit->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SalesTaxCode->Required) { ?>
				elm = this.getElements("x" + infix + "_SalesTaxCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SalesTaxCode->caption(), $pharmacy_products_add->SalesTaxCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalesTaxCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SalesTaxCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->StockReceived->Required) { ?>
				elm = this.getElements("x" + infix + "_StockReceived");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->StockReceived->caption(), $pharmacy_products_add->StockReceived->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockReceived");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->StockReceived->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TotalStock->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TotalStock->caption(), $pharmacy_products_add->TotalStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TotalStock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TotalStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->StockType->Required) { ?>
				elm = this.getElements("x" + infix + "_StockType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->StockType->caption(), $pharmacy_products_add->StockType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->StockType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->StockCheckDate->Required) { ?>
				elm = this.getElements("x" + infix + "_StockCheckDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->StockCheckDate->caption(), $pharmacy_products_add->StockCheckDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockCheckDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->StockCheckDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->StockAdjustmentDate->Required) { ?>
				elm = this.getElements("x" + infix + "_StockAdjustmentDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->StockAdjustmentDate->caption(), $pharmacy_products_add->StockAdjustmentDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockAdjustmentDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->StockAdjustmentDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Remarks->caption(), $pharmacy_products_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->CostCentre->Required) { ?>
				elm = this.getElements("x" + infix + "_CostCentre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CostCentre->caption(), $pharmacy_products_add->CostCentre->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CostCentre");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->CostCentre->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductType->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductType->caption(), $pharmacy_products_add->ProductType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProductType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TaxAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_TaxAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TaxAmount->caption(), $pharmacy_products_add->TaxAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TaxAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TaxAmount->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TaxId->Required) { ?>
				elm = this.getElements("x" + infix + "_TaxId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TaxId->caption(), $pharmacy_products_add->TaxId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TaxId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TaxId->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ResaleTaxApplicable->Required) { ?>
				elm = this.getElements("x" + infix + "_ResaleTaxApplicable");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ResaleTaxApplicable->caption(), $pharmacy_products_add->ResaleTaxApplicable->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResaleTaxApplicable");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ResaleTaxApplicable->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CstOtherTax->Required) { ?>
				elm = this.getElements("x" + infix + "_CstOtherTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CstOtherTax->caption(), $pharmacy_products_add->CstOtherTax->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->TotalTax->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TotalTax->caption(), $pharmacy_products_add->TotalTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TotalTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TotalTax->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ItemCost->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ItemCost->caption(), $pharmacy_products_add->ItemCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ItemCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ItemCost->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ExpiryDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpiryDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ExpiryDate->caption(), $pharmacy_products_add->ExpiryDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpiryDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ExpiryDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->BatchDescription->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchDescription");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BatchDescription->caption(), $pharmacy_products_add->BatchDescription->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->FreeScheme->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeScheme");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FreeScheme->caption(), $pharmacy_products_add->FreeScheme->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeScheme");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->FreeScheme->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CashDiscountEligibility->Required) { ?>
				elm = this.getElements("x" + infix + "_CashDiscountEligibility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CashDiscountEligibility->caption(), $pharmacy_products_add->CashDiscountEligibility->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CashDiscountEligibility");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->CashDiscountEligibility->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DiscountPerAllowInBill->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountPerAllowInBill");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DiscountPerAllowInBill->caption(), $pharmacy_products_add->DiscountPerAllowInBill->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DiscountPerAllowInBill");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DiscountPerAllowInBill->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Discount->caption(), $pharmacy_products_add->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->Discount->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TotalAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TotalAmount->caption(), $pharmacy_products_add->TotalAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TotalAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TotalAmount->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->StandardMargin->Required) { ?>
				elm = this.getElements("x" + infix + "_StandardMargin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->StandardMargin->caption(), $pharmacy_products_add->StandardMargin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StandardMargin");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->StandardMargin->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Margin->Required) { ?>
				elm = this.getElements("x" + infix + "_Margin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Margin->caption(), $pharmacy_products_add->Margin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Margin");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->Margin->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MarginId->Required) { ?>
				elm = this.getElements("x" + infix + "_MarginId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MarginId->caption(), $pharmacy_products_add->MarginId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarginId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MarginId->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ExpectedMargin->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpectedMargin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ExpectedMargin->caption(), $pharmacy_products_add->ExpectedMargin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpectedMargin");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ExpectedMargin->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SurchargeBeforeTax->Required) { ?>
				elm = this.getElements("x" + infix + "_SurchargeBeforeTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SurchargeBeforeTax->caption(), $pharmacy_products_add->SurchargeBeforeTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SurchargeBeforeTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SurchargeBeforeTax->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SurchargeAfterTax->Required) { ?>
				elm = this.getElements("x" + infix + "_SurchargeAfterTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SurchargeAfterTax->caption(), $pharmacy_products_add->SurchargeAfterTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SurchargeAfterTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SurchargeAfterTax->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TempOrderNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TempOrderNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TempOrderNo->caption(), $pharmacy_products_add->TempOrderNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TempOrderNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TempOrderNo->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TempOrderDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TempOrderDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TempOrderDate->caption(), $pharmacy_products_add->TempOrderDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TempOrderDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TempOrderDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->OrderUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->OrderUnit->caption(), $pharmacy_products_add->OrderUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderUnit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->OrderUnit->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->OrderQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->OrderQuantity->caption(), $pharmacy_products_add->OrderQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderQuantity");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->OrderQuantity->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MarkForOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkForOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MarkForOrder->caption(), $pharmacy_products_add->MarkForOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkForOrder");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MarkForOrder->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->OrderAllId->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderAllId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->OrderAllId->caption(), $pharmacy_products_add->OrderAllId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderAllId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->OrderAllId->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CalculateOrderQty->Required) { ?>
				elm = this.getElements("x" + infix + "_CalculateOrderQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CalculateOrderQty->caption(), $pharmacy_products_add->CalculateOrderQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CalculateOrderQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->CalculateOrderQty->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SubLocation->Required) { ?>
				elm = this.getElements("x" + infix + "_SubLocation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SubLocation->caption(), $pharmacy_products_add->SubLocation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->CategoryCode->Required) { ?>
				elm = this.getElements("x" + infix + "_CategoryCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CategoryCode->caption(), $pharmacy_products_add->CategoryCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->SubCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_SubCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SubCategory->caption(), $pharmacy_products_add->SubCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->FlexCategoryCode->Required) { ?>
				elm = this.getElements("x" + infix + "_FlexCategoryCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FlexCategoryCode->caption(), $pharmacy_products_add->FlexCategoryCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FlexCategoryCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->FlexCategoryCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ABCSaleQty->Required) { ?>
				elm = this.getElements("x" + infix + "_ABCSaleQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ABCSaleQty->caption(), $pharmacy_products_add->ABCSaleQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ABCSaleQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ABCSaleQty->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ABCSaleValue->Required) { ?>
				elm = this.getElements("x" + infix + "_ABCSaleValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ABCSaleValue->caption(), $pharmacy_products_add->ABCSaleValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ABCSaleValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ABCSaleValue->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ConvertionFactor->Required) { ?>
				elm = this.getElements("x" + infix + "_ConvertionFactor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ConvertionFactor->caption(), $pharmacy_products_add->ConvertionFactor->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConvertionFactor");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ConvertionFactor->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ConvertionUnitDesc->Required) { ?>
				elm = this.getElements("x" + infix + "_ConvertionUnitDesc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ConvertionUnitDesc->caption(), $pharmacy_products_add->ConvertionUnitDesc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->TransactionId->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TransactionId->caption(), $pharmacy_products_add->TransactionId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TransactionId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TransactionId->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SoldProductId->Required) { ?>
				elm = this.getElements("x" + infix + "_SoldProductId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SoldProductId->caption(), $pharmacy_products_add->SoldProductId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SoldProductId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SoldProductId->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->WantedBookId->Required) { ?>
				elm = this.getElements("x" + infix + "_WantedBookId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->WantedBookId->caption(), $pharmacy_products_add->WantedBookId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_WantedBookId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->WantedBookId->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AllId->Required) { ?>
				elm = this.getElements("x" + infix + "_AllId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AllId->caption(), $pharmacy_products_add->AllId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AllId->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->BatchAndExpiryCompulsory->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchAndExpiryCompulsory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BatchAndExpiryCompulsory->caption(), $pharmacy_products_add->BatchAndExpiryCompulsory->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BatchAndExpiryCompulsory");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->BatchAndExpiryCompulsory->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->BatchStockForWantedBook->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchStockForWantedBook");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BatchStockForWantedBook->caption(), $pharmacy_products_add->BatchStockForWantedBook->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BatchStockForWantedBook");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->BatchStockForWantedBook->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->UnitBasedBilling->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitBasedBilling");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->UnitBasedBilling->caption(), $pharmacy_products_add->UnitBasedBilling->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UnitBasedBilling");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->UnitBasedBilling->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DoNotCheckStock->Required) { ?>
				elm = this.getElements("x" + infix + "_DoNotCheckStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DoNotCheckStock->caption(), $pharmacy_products_add->DoNotCheckStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DoNotCheckStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DoNotCheckStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AcceptRate->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AcceptRate->caption(), $pharmacy_products_add->AcceptRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptRate");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AcceptRate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PriceLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_PriceLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PriceLevel->caption(), $pharmacy_products_add->PriceLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PriceLevel");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PriceLevel->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->LastQuotePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_LastQuotePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LastQuotePrice->caption(), $pharmacy_products_add->LastQuotePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastQuotePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->LastQuotePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PriceChange->Required) { ?>
				elm = this.getElements("x" + infix + "_PriceChange");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PriceChange->caption(), $pharmacy_products_add->PriceChange->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PriceChange");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PriceChange->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CommodityCode->Required) { ?>
				elm = this.getElements("x" + infix + "_CommodityCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CommodityCode->caption(), $pharmacy_products_add->CommodityCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->InstitutePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_InstitutePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->InstitutePrice->caption(), $pharmacy_products_add->InstitutePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_InstitutePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->InstitutePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CtrlOrDCtrlProduct->Required) { ?>
				elm = this.getElements("x" + infix + "_CtrlOrDCtrlProduct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CtrlOrDCtrlProduct->caption(), $pharmacy_products_add->CtrlOrDCtrlProduct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CtrlOrDCtrlProduct");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->CtrlOrDCtrlProduct->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ImportedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ImportedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ImportedDate->caption(), $pharmacy_products_add->ImportedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ImportedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ImportedDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IsImported->Required) { ?>
				elm = this.getElements("x" + infix + "_IsImported");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IsImported->caption(), $pharmacy_products_add->IsImported->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsImported");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IsImported->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->FileName->Required) { ?>
				elm = this.getElements("x" + infix + "_FileName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FileName->caption(), $pharmacy_products_add->FileName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->LPName->Required) { ?>
				elm = this.getElements("x" + infix + "_LPName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LPName->caption(), $pharmacy_products_add->LPName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->GodownNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_GodownNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->GodownNumber->caption(), $pharmacy_products_add->GodownNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GodownNumber");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->GodownNumber->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CreationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_CreationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CreationDate->caption(), $pharmacy_products_add->CreationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreationDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->CreationDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CreatedbyUser->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedbyUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CreatedbyUser->caption(), $pharmacy_products_add->CreatedbyUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->ModifiedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ModifiedDate->caption(), $pharmacy_products_add->ModifiedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifiedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ModifiedDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ModifiedbyUser->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedbyUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ModifiedbyUser->caption(), $pharmacy_products_add->ModifiedbyUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->isActive->Required) { ?>
				elm = this.getElements("x" + infix + "_isActive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->isActive->caption(), $pharmacy_products_add->isActive->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_isActive");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->isActive->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AllowExpiryClaim->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowExpiryClaim");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AllowExpiryClaim->caption(), $pharmacy_products_add->AllowExpiryClaim->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowExpiryClaim");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AllowExpiryClaim->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->BrandCode->Required) { ?>
				elm = this.getElements("x" + infix + "_BrandCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BrandCode->caption(), $pharmacy_products_add->BrandCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BrandCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->BrandCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->FreeSchemeBasedon->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeSchemeBasedon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FreeSchemeBasedon->caption(), $pharmacy_products_add->FreeSchemeBasedon->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeSchemeBasedon");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->FreeSchemeBasedon->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DoNotCheckCostInBill->Required) { ?>
				elm = this.getElements("x" + infix + "_DoNotCheckCostInBill");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DoNotCheckCostInBill->caption(), $pharmacy_products_add->DoNotCheckCostInBill->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DoNotCheckCostInBill");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DoNotCheckCostInBill->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductGroupCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductGroupCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductGroupCode->caption(), $pharmacy_products_add->ProductGroupCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductGroupCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProductGroupCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductStrengthCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductStrengthCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductStrengthCode->caption(), $pharmacy_products_add->ProductStrengthCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductStrengthCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProductStrengthCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PackingCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PackingCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PackingCode->caption(), $pharmacy_products_add->PackingCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PackingCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PackingCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ComputedMinStock->Required) { ?>
				elm = this.getElements("x" + infix + "_ComputedMinStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ComputedMinStock->caption(), $pharmacy_products_add->ComputedMinStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComputedMinStock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ComputedMinStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ComputedMaxStock->Required) { ?>
				elm = this.getElements("x" + infix + "_ComputedMaxStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ComputedMaxStock->caption(), $pharmacy_products_add->ComputedMaxStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComputedMaxStock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ComputedMaxStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductRemark->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductRemark");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductRemark->caption(), $pharmacy_products_add->ProductRemark->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductRemark");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProductRemark->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductDrugCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductDrugCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductDrugCode->caption(), $pharmacy_products_add->ProductDrugCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductDrugCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProductDrugCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IsMatrixProduct->Required) { ?>
				elm = this.getElements("x" + infix + "_IsMatrixProduct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IsMatrixProduct->caption(), $pharmacy_products_add->IsMatrixProduct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsMatrixProduct");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IsMatrixProduct->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount1->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount1->caption(), $pharmacy_products_add->AttributeCount1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount1");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount1->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount2->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount2->caption(), $pharmacy_products_add->AttributeCount2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount2");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount2->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount3->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount3->caption(), $pharmacy_products_add->AttributeCount3->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount3");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount3->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount4->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount4->caption(), $pharmacy_products_add->AttributeCount4->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount4");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount4->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount5->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount5->caption(), $pharmacy_products_add->AttributeCount5->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount5");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount5->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DefaultDiscountPercentage->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultDiscountPercentage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DefaultDiscountPercentage->caption(), $pharmacy_products_add->DefaultDiscountPercentage->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultDiscountPercentage");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DefaultDiscountPercentage->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DonotPrintBarcode->Required) { ?>
				elm = this.getElements("x" + infix + "_DonotPrintBarcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DonotPrintBarcode->caption(), $pharmacy_products_add->DonotPrintBarcode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DonotPrintBarcode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DonotPrintBarcode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductLevelDiscount->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductLevelDiscount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductLevelDiscount->caption(), $pharmacy_products_add->ProductLevelDiscount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductLevelDiscount");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProductLevelDiscount->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Markup->Required) { ?>
				elm = this.getElements("x" + infix + "_Markup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Markup->caption(), $pharmacy_products_add->Markup->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Markup");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->Markup->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MarkDown->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkDown");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MarkDown->caption(), $pharmacy_products_add->MarkDown->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkDown");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MarkDown->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ReworkSalePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_ReworkSalePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ReworkSalePrice->caption(), $pharmacy_products_add->ReworkSalePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReworkSalePrice");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ReworkSalePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MultipleInput->Required) { ?>
				elm = this.getElements("x" + infix + "_MultipleInput");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MultipleInput->caption(), $pharmacy_products_add->MultipleInput->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MultipleInput");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MultipleInput->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->LpPackageInformation->Required) { ?>
				elm = this.getElements("x" + infix + "_LpPackageInformation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LpPackageInformation->caption(), $pharmacy_products_add->LpPackageInformation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->AllowNegativeStock->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowNegativeStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AllowNegativeStock->caption(), $pharmacy_products_add->AllowNegativeStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowNegativeStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AllowNegativeStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->OrderDate->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->OrderDate->caption(), $pharmacy_products_add->OrderDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->OrderDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->OrderTime->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->OrderTime->caption(), $pharmacy_products_add->OrderTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->OrderTime->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->RateGroupCode->Required) { ?>
				elm = this.getElements("x" + infix + "_RateGroupCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->RateGroupCode->caption(), $pharmacy_products_add->RateGroupCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RateGroupCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->RateGroupCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ConversionCaseLot->Required) { ?>
				elm = this.getElements("x" + infix + "_ConversionCaseLot");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ConversionCaseLot->caption(), $pharmacy_products_add->ConversionCaseLot->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConversionCaseLot");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ConversionCaseLot->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ShippingLot->Required) { ?>
				elm = this.getElements("x" + infix + "_ShippingLot");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ShippingLot->caption(), $pharmacy_products_add->ShippingLot->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->AllowExpiryReplacement->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowExpiryReplacement");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AllowExpiryReplacement->caption(), $pharmacy_products_add->AllowExpiryReplacement->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowExpiryReplacement");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AllowExpiryReplacement->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->NoOfMonthExpiryAllowed->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfMonthExpiryAllowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->NoOfMonthExpiryAllowed->caption(), $pharmacy_products_add->NoOfMonthExpiryAllowed->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoOfMonthExpiryAllowed");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->NoOfMonthExpiryAllowed->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductDiscountEligibility->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductDiscountEligibility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductDiscountEligibility->caption(), $pharmacy_products_add->ProductDiscountEligibility->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductDiscountEligibility");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProductDiscountEligibility->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ScheduleTypeCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ScheduleTypeCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ScheduleTypeCode->caption(), $pharmacy_products_add->ScheduleTypeCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ScheduleTypeCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ScheduleTypeCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AIOCDProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_AIOCDProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AIOCDProductCode->caption(), $pharmacy_products_add->AIOCDProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->FreeQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FreeQuantity->caption(), $pharmacy_products_add->FreeQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeQuantity");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->FreeQuantity->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DiscountType->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DiscountType->caption(), $pharmacy_products_add->DiscountType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DiscountType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DiscountType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DiscountValue->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DiscountValue->caption(), $pharmacy_products_add->DiscountValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DiscountValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DiscountValue->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->HasProductOrderAttribute->Required) { ?>
				elm = this.getElements("x" + infix + "_HasProductOrderAttribute");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->HasProductOrderAttribute->caption(), $pharmacy_products_add->HasProductOrderAttribute->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HasProductOrderAttribute");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->HasProductOrderAttribute->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->FirstPODate->Required) { ?>
				elm = this.getElements("x" + infix + "_FirstPODate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FirstPODate->caption(), $pharmacy_products_add->FirstPODate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FirstPODate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->FirstPODate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SaleprcieAndMrpCalcPercent->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleprcieAndMrpCalcPercent");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SaleprcieAndMrpCalcPercent->caption(), $pharmacy_products_add->SaleprcieAndMrpCalcPercent->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleprcieAndMrpCalcPercent");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SaleprcieAndMrpCalcPercent->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IsGiftVoucherProducts->Required) { ?>
				elm = this.getElements("x" + infix + "_IsGiftVoucherProducts");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IsGiftVoucherProducts->caption(), $pharmacy_products_add->IsGiftVoucherProducts->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsGiftVoucherProducts");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IsGiftVoucherProducts->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AcceptRange4SerialNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptRange4SerialNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AcceptRange4SerialNumber->caption(), $pharmacy_products_add->AcceptRange4SerialNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptRange4SerialNumber");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AcceptRange4SerialNumber->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->GiftVoucherDenomination->Required) { ?>
				elm = this.getElements("x" + infix + "_GiftVoucherDenomination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->GiftVoucherDenomination->caption(), $pharmacy_products_add->GiftVoucherDenomination->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GiftVoucherDenomination");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->GiftVoucherDenomination->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Subclasscode->Required) { ?>
				elm = this.getElements("x" + infix + "_Subclasscode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Subclasscode->caption(), $pharmacy_products_add->Subclasscode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->BarCodeFromWeighingMachine->Required) { ?>
				elm = this.getElements("x" + infix + "_BarCodeFromWeighingMachine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BarCodeFromWeighingMachine->caption(), $pharmacy_products_add->BarCodeFromWeighingMachine->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BarCodeFromWeighingMachine");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->BarCodeFromWeighingMachine->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CheckCostInReturn->Required) { ?>
				elm = this.getElements("x" + infix + "_CheckCostInReturn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CheckCostInReturn->caption(), $pharmacy_products_add->CheckCostInReturn->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CheckCostInReturn");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->CheckCostInReturn->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->FrequentSaleProduct->Required) { ?>
				elm = this.getElements("x" + infix + "_FrequentSaleProduct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FrequentSaleProduct->caption(), $pharmacy_products_add->FrequentSaleProduct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FrequentSaleProduct");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->FrequentSaleProduct->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->RateType->Required) { ?>
				elm = this.getElements("x" + infix + "_RateType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->RateType->caption(), $pharmacy_products_add->RateType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RateType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->RateType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TouchscreenName->Required) { ?>
				elm = this.getElements("x" + infix + "_TouchscreenName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TouchscreenName->caption(), $pharmacy_products_add->TouchscreenName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->FreeType->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FreeType->caption(), $pharmacy_products_add->FreeType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->FreeType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->LooseQtyasNewBatch->Required) { ?>
				elm = this.getElements("x" + infix + "_LooseQtyasNewBatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LooseQtyasNewBatch->caption(), $pharmacy_products_add->LooseQtyasNewBatch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LooseQtyasNewBatch");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->LooseQtyasNewBatch->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AllowSlabBilling->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowSlabBilling");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AllowSlabBilling->caption(), $pharmacy_products_add->AllowSlabBilling->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowSlabBilling");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AllowSlabBilling->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductTypeForProduction->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductTypeForProduction");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductTypeForProduction->caption(), $pharmacy_products_add->ProductTypeForProduction->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductTypeForProduction");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProductTypeForProduction->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->RecipeCode->Required) { ?>
				elm = this.getElements("x" + infix + "_RecipeCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->RecipeCode->caption(), $pharmacy_products_add->RecipeCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RecipeCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->RecipeCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DefaultUnitType->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultUnitType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DefaultUnitType->caption(), $pharmacy_products_add->DefaultUnitType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultUnitType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DefaultUnitType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PIstatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PIstatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PIstatus->caption(), $pharmacy_products_add->PIstatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PIstatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PIstatus->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->LastPiConfirmedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_LastPiConfirmedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LastPiConfirmedDate->caption(), $pharmacy_products_add->LastPiConfirmedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastPiConfirmedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->LastPiConfirmedDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->BarCodeDesign->Required) { ?>
				elm = this.getElements("x" + infix + "_BarCodeDesign");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BarCodeDesign->caption(), $pharmacy_products_add->BarCodeDesign->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->AcceptRemarksInBill->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptRemarksInBill");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AcceptRemarksInBill->caption(), $pharmacy_products_add->AcceptRemarksInBill->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptRemarksInBill");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AcceptRemarksInBill->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Classification->Required) { ?>
				elm = this.getElements("x" + infix + "_Classification");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Classification->caption(), $pharmacy_products_add->Classification->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Classification");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->Classification->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TimeSlot->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeSlot");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TimeSlot->caption(), $pharmacy_products_add->TimeSlot->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TimeSlot");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TimeSlot->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IsBundle->Required) { ?>
				elm = this.getElements("x" + infix + "_IsBundle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IsBundle->caption(), $pharmacy_products_add->IsBundle->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsBundle");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IsBundle->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ColorCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ColorCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ColorCode->caption(), $pharmacy_products_add->ColorCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ColorCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ColorCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->GenderCode->Required) { ?>
				elm = this.getElements("x" + infix + "_GenderCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->GenderCode->caption(), $pharmacy_products_add->GenderCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GenderCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->GenderCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SizeCode->Required) { ?>
				elm = this.getElements("x" + infix + "_SizeCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SizeCode->caption(), $pharmacy_products_add->SizeCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SizeCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SizeCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->GiftCard->Required) { ?>
				elm = this.getElements("x" + infix + "_GiftCard");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->GiftCard->caption(), $pharmacy_products_add->GiftCard->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GiftCard");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->GiftCard->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ToonLabel->Required) { ?>
				elm = this.getElements("x" + infix + "_ToonLabel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ToonLabel->caption(), $pharmacy_products_add->ToonLabel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ToonLabel");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ToonLabel->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->GarmentType->Required) { ?>
				elm = this.getElements("x" + infix + "_GarmentType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->GarmentType->caption(), $pharmacy_products_add->GarmentType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GarmentType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->GarmentType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AgeGroup->Required) { ?>
				elm = this.getElements("x" + infix + "_AgeGroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AgeGroup->caption(), $pharmacy_products_add->AgeGroup->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AgeGroup");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AgeGroup->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Season->Required) { ?>
				elm = this.getElements("x" + infix + "_Season");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Season->caption(), $pharmacy_products_add->Season->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Season");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->Season->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DailyStockEntry->Required) { ?>
				elm = this.getElements("x" + infix + "_DailyStockEntry");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DailyStockEntry->caption(), $pharmacy_products_add->DailyStockEntry->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DailyStockEntry");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DailyStockEntry->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ModifierApplicable->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifierApplicable");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ModifierApplicable->caption(), $pharmacy_products_add->ModifierApplicable->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifierApplicable");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ModifierApplicable->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ModifierType->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifierType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ModifierType->caption(), $pharmacy_products_add->ModifierType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifierType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ModifierType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AcceptZeroRate->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptZeroRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AcceptZeroRate->caption(), $pharmacy_products_add->AcceptZeroRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptZeroRate");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AcceptZeroRate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ExciseDutyCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ExciseDutyCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ExciseDutyCode->caption(), $pharmacy_products_add->ExciseDutyCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExciseDutyCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ExciseDutyCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IndentProductGroupCode->Required) { ?>
				elm = this.getElements("x" + infix + "_IndentProductGroupCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IndentProductGroupCode->caption(), $pharmacy_products_add->IndentProductGroupCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IndentProductGroupCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IndentProductGroupCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IsMultiBatch->Required) { ?>
				elm = this.getElements("x" + infix + "_IsMultiBatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IsMultiBatch->caption(), $pharmacy_products_add->IsMultiBatch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsMultiBatch");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IsMultiBatch->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IsSingleBatch->Required) { ?>
				elm = this.getElements("x" + infix + "_IsSingleBatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IsSingleBatch->caption(), $pharmacy_products_add->IsSingleBatch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsSingleBatch");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IsSingleBatch->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MarkUpRate1->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkUpRate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MarkUpRate1->caption(), $pharmacy_products_add->MarkUpRate1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkUpRate1");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MarkUpRate1->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MarkDownRate1->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkDownRate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MarkDownRate1->caption(), $pharmacy_products_add->MarkDownRate1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkDownRate1");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MarkDownRate1->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MarkUpRate2->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkUpRate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MarkUpRate2->caption(), $pharmacy_products_add->MarkUpRate2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkUpRate2");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MarkUpRate2->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MarkDownRate2->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkDownRate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MarkDownRate2->caption(), $pharmacy_products_add->MarkDownRate2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkDownRate2");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MarkDownRate2->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->_Yield->Required) { ?>
				elm = this.getElements("x" + infix + "__Yield");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->_Yield->caption(), $pharmacy_products_add->_Yield->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__Yield");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->_Yield->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->RefProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_RefProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->RefProductCode->caption(), $pharmacy_products_add->RefProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RefProductCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->RefProductCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Volume->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Volume->caption(), $pharmacy_products_add->Volume->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->Volume->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MeasurementID->Required) { ?>
				elm = this.getElements("x" + infix + "_MeasurementID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MeasurementID->caption(), $pharmacy_products_add->MeasurementID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MeasurementID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MeasurementID->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CountryCode->Required) { ?>
				elm = this.getElements("x" + infix + "_CountryCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CountryCode->caption(), $pharmacy_products_add->CountryCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CountryCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->CountryCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AcceptWMQty->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptWMQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AcceptWMQty->caption(), $pharmacy_products_add->AcceptWMQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptWMQty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AcceptWMQty->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SingleBatchBasedOnRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SingleBatchBasedOnRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SingleBatchBasedOnRate->caption(), $pharmacy_products_add->SingleBatchBasedOnRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SingleBatchBasedOnRate");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SingleBatchBasedOnRate->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TenderNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TenderNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TenderNo->caption(), $pharmacy_products_add->TenderNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->SingleBillMaximumSoldQtyFiled->Required) { ?>
				elm = this.getElements("x" + infix + "_SingleBillMaximumSoldQtyFiled");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SingleBillMaximumSoldQtyFiled->caption(), $pharmacy_products_add->SingleBillMaximumSoldQtyFiled->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SingleBillMaximumSoldQtyFiled");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SingleBillMaximumSoldQtyFiled->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->Strength1->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Strength1->caption(), $pharmacy_products_add->Strength1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->Strength2->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Strength2->caption(), $pharmacy_products_add->Strength2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->Strength3->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Strength3->caption(), $pharmacy_products_add->Strength3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->Strength4->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Strength4->caption(), $pharmacy_products_add->Strength4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->Strength5->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->Strength5->caption(), $pharmacy_products_add->Strength5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->IngredientCode1->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IngredientCode1->caption(), $pharmacy_products_add->IngredientCode1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode1");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IngredientCode1->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IngredientCode2->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IngredientCode2->caption(), $pharmacy_products_add->IngredientCode2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode2");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IngredientCode2->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IngredientCode3->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IngredientCode3->caption(), $pharmacy_products_add->IngredientCode3->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode3");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IngredientCode3->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IngredientCode4->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IngredientCode4->caption(), $pharmacy_products_add->IngredientCode4->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode4");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IngredientCode4->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IngredientCode5->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IngredientCode5->caption(), $pharmacy_products_add->IngredientCode5->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode5");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IngredientCode5->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->OrderType->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->OrderType->caption(), $pharmacy_products_add->OrderType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->OrderType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->StockUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_StockUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->StockUOM->caption(), $pharmacy_products_add->StockUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->StockUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PriceUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_PriceUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PriceUOM->caption(), $pharmacy_products_add->PriceUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PriceUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PriceUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DefaultSaleUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultSaleUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DefaultSaleUOM->caption(), $pharmacy_products_add->DefaultSaleUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultSaleUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DefaultSaleUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DefaultPurchaseUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultPurchaseUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DefaultPurchaseUOM->caption(), $pharmacy_products_add->DefaultPurchaseUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultPurchaseUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DefaultPurchaseUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ReportingUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportingUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ReportingUOM->caption(), $pharmacy_products_add->ReportingUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReportingUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ReportingUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->LastPurchasedUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_LastPurchasedUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LastPurchasedUOM->caption(), $pharmacy_products_add->LastPurchasedUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastPurchasedUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->LastPurchasedUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TreatmentCodes->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentCodes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TreatmentCodes->caption(), $pharmacy_products_add->TreatmentCodes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->InsuranceType->Required) { ?>
				elm = this.getElements("x" + infix + "_InsuranceType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->InsuranceType->caption(), $pharmacy_products_add->InsuranceType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_InsuranceType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->InsuranceType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->CoverageGroupCodes->Required) { ?>
				elm = this.getElements("x" + infix + "_CoverageGroupCodes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->CoverageGroupCodes->caption(), $pharmacy_products_add->CoverageGroupCodes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->MultipleUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_MultipleUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MultipleUOM->caption(), $pharmacy_products_add->MultipleUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MultipleUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MultipleUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SalePriceComputation->Required) { ?>
				elm = this.getElements("x" + infix + "_SalePriceComputation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SalePriceComputation->caption(), $pharmacy_products_add->SalePriceComputation->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalePriceComputation");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SalePriceComputation->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->StockCorrection->Required) { ?>
				elm = this.getElements("x" + infix + "_StockCorrection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->StockCorrection->caption(), $pharmacy_products_add->StockCorrection->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockCorrection");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->StockCorrection->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->LBTPercentage->Required) { ?>
				elm = this.getElements("x" + infix + "_LBTPercentage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LBTPercentage->caption(), $pharmacy_products_add->LBTPercentage->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LBTPercentage");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->LBTPercentage->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->SalesCommission->Required) { ?>
				elm = this.getElements("x" + infix + "_SalesCommission");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->SalesCommission->caption(), $pharmacy_products_add->SalesCommission->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalesCommission");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->SalesCommission->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->LockedStock->Required) { ?>
				elm = this.getElements("x" + infix + "_LockedStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LockedStock->caption(), $pharmacy_products_add->LockedStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LockedStock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->LockedStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MinMaxUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_MinMaxUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MinMaxUOM->caption(), $pharmacy_products_add->MinMaxUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MinMaxUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MinMaxUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ExpiryMfrDateFormat->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpiryMfrDateFormat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ExpiryMfrDateFormat->caption(), $pharmacy_products_add->ExpiryMfrDateFormat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpiryMfrDateFormat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ExpiryMfrDateFormat->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ProductLifeTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductLifeTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ProductLifeTime->caption(), $pharmacy_products_add->ProductLifeTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductLifeTime");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ProductLifeTime->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IsCombo->Required) { ?>
				elm = this.getElements("x" + infix + "_IsCombo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IsCombo->caption(), $pharmacy_products_add->IsCombo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsCombo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IsCombo->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ComboTypeCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ComboTypeCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ComboTypeCode->caption(), $pharmacy_products_add->ComboTypeCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComboTypeCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ComboTypeCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount6->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount6->caption(), $pharmacy_products_add->AttributeCount6->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount6");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount6->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount7->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount7->caption(), $pharmacy_products_add->AttributeCount7->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount7");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount7->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount8->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount8->caption(), $pharmacy_products_add->AttributeCount8->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount8");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount8->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount9->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount9->caption(), $pharmacy_products_add->AttributeCount9->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount9");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount9->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AttributeCount10->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AttributeCount10->caption(), $pharmacy_products_add->AttributeCount10->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount10");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AttributeCount10->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->LabourCharge->Required) { ?>
				elm = this.getElements("x" + infix + "_LabourCharge");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LabourCharge->caption(), $pharmacy_products_add->LabourCharge->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LabourCharge");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->LabourCharge->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AffectOtherCharge->Required) { ?>
				elm = this.getElements("x" + infix + "_AffectOtherCharge");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AffectOtherCharge->caption(), $pharmacy_products_add->AffectOtherCharge->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AffectOtherCharge");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AffectOtherCharge->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DosageInfo->Required) { ?>
				elm = this.getElements("x" + infix + "_DosageInfo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DosageInfo->caption(), $pharmacy_products_add->DosageInfo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->DosageType->Required) { ?>
				elm = this.getElements("x" + infix + "_DosageType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DosageType->caption(), $pharmacy_products_add->DosageType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DosageType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DosageType->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->DefaultIndentUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultIndentUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->DefaultIndentUOM->caption(), $pharmacy_products_add->DefaultIndentUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultIndentUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->DefaultIndentUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PromoTag->Required) { ?>
				elm = this.getElements("x" + infix + "_PromoTag");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PromoTag->caption(), $pharmacy_products_add->PromoTag->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PromoTag");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PromoTag->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->BillLevelPromoTag->Required) { ?>
				elm = this.getElements("x" + infix + "_BillLevelPromoTag");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->BillLevelPromoTag->caption(), $pharmacy_products_add->BillLevelPromoTag->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillLevelPromoTag");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->BillLevelPromoTag->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->IsMRPProduct->Required) { ?>
				elm = this.getElements("x" + infix + "_IsMRPProduct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->IsMRPProduct->caption(), $pharmacy_products_add->IsMRPProduct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsMRPProduct");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->IsMRPProduct->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MrpList->Required) { ?>
				elm = this.getElements("x" + infix + "_MrpList");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MrpList->caption(), $pharmacy_products_add->MrpList->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->AlternateSaleUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_AlternateSaleUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AlternateSaleUOM->caption(), $pharmacy_products_add->AlternateSaleUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AlternateSaleUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AlternateSaleUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->FreeUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FreeUOM->caption(), $pharmacy_products_add->FreeUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->FreeUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->MarketedCode->Required) { ?>
				elm = this.getElements("x" + infix + "_MarketedCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MarketedCode->caption(), $pharmacy_products_add->MarketedCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_add->MinimumSalePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_MinimumSalePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->MinimumSalePrice->caption(), $pharmacy_products_add->MinimumSalePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MinimumSalePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->MinimumSalePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PRate1->Required) { ?>
				elm = this.getElements("x" + infix + "_PRate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PRate1->caption(), $pharmacy_products_add->PRate1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PRate1");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PRate1->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->PRate2->Required) { ?>
				elm = this.getElements("x" + infix + "_PRate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->PRate2->caption(), $pharmacy_products_add->PRate2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PRate2");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->PRate2->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->LPItemCost->Required) { ?>
				elm = this.getElements("x" + infix + "_LPItemCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->LPItemCost->caption(), $pharmacy_products_add->LPItemCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LPItemCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->LPItemCost->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->FixedItemCost->Required) { ?>
				elm = this.getElements("x" + infix + "_FixedItemCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->FixedItemCost->caption(), $pharmacy_products_add->FixedItemCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FixedItemCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->FixedItemCost->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->HSNId->Required) { ?>
				elm = this.getElements("x" + infix + "_HSNId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->HSNId->caption(), $pharmacy_products_add->HSNId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HSNId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->HSNId->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->TaxInclusive->Required) { ?>
				elm = this.getElements("x" + infix + "_TaxInclusive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->TaxInclusive->caption(), $pharmacy_products_add->TaxInclusive->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TaxInclusive");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->TaxInclusive->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->EligibleforWarranty->Required) { ?>
				elm = this.getElements("x" + infix + "_EligibleforWarranty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->EligibleforWarranty->caption(), $pharmacy_products_add->EligibleforWarranty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EligibleforWarranty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->EligibleforWarranty->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->NoofMonthsWarranty->Required) { ?>
				elm = this.getElements("x" + infix + "_NoofMonthsWarranty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->NoofMonthsWarranty->caption(), $pharmacy_products_add->NoofMonthsWarranty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoofMonthsWarranty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->NoofMonthsWarranty->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->ComputeTaxonCost->Required) { ?>
				elm = this.getElements("x" + infix + "_ComputeTaxonCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->ComputeTaxonCost->caption(), $pharmacy_products_add->ComputeTaxonCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComputeTaxonCost");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->ComputeTaxonCost->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->HasEmptyBottleTrack->Required) { ?>
				elm = this.getElements("x" + infix + "_HasEmptyBottleTrack");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->HasEmptyBottleTrack->caption(), $pharmacy_products_add->HasEmptyBottleTrack->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HasEmptyBottleTrack");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->HasEmptyBottleTrack->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->EmptyBottleReferenceCode->Required) { ?>
				elm = this.getElements("x" + infix + "_EmptyBottleReferenceCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->EmptyBottleReferenceCode->caption(), $pharmacy_products_add->EmptyBottleReferenceCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EmptyBottleReferenceCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->EmptyBottleReferenceCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->AdditionalCESSAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_AdditionalCESSAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->AdditionalCESSAmount->caption(), $pharmacy_products_add->AdditionalCESSAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AdditionalCESSAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->AdditionalCESSAmount->errorMessage()) ?>");
			<?php if ($pharmacy_products_add->EmptyBottleRate->Required) { ?>
				elm = this.getElements("x" + infix + "_EmptyBottleRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_add->EmptyBottleRate->caption(), $pharmacy_products_add->EmptyBottleRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EmptyBottleRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_add->EmptyBottleRate->errorMessage()) ?>");

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpharmacy_productsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_productsadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpharmacy_productsadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_products_add->showPageHeader(); ?>
<?php
$pharmacy_products_add->showMessage();
?>
<form name="fpharmacy_productsadd" id="fpharmacy_productsadd" class="<?php echo $pharmacy_products_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_products_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_products_add->ProductName->Visible) { // ProductName ?>
	<div id="r_ProductName" class="form-group row">
		<label id="elh_pharmacy_products_ProductName" for="x_ProductName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductName->caption() ?><?php echo $pharmacy_products_add->ProductName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductName">
<input type="text" data-table="pharmacy_products" data-field="x_ProductName" name="x_ProductName" id="x_ProductName" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductName->EditValue ?>"<?php echo $pharmacy_products_add->ProductName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DivisionCode->Visible) { // DivisionCode ?>
	<div id="r_DivisionCode" class="form-group row">
		<label id="elh_pharmacy_products_DivisionCode" for="x_DivisionCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DivisionCode->caption() ?><?php echo $pharmacy_products_add->DivisionCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DivisionCode->cellAttributes() ?>>
<span id="el_pharmacy_products_DivisionCode">
<input type="text" data-table="pharmacy_products" data-field="x_DivisionCode" name="x_DivisionCode" id="x_DivisionCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DivisionCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DivisionCode->EditValue ?>"<?php echo $pharmacy_products_add->DivisionCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DivisionCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ManufacturerCode->Visible) { // ManufacturerCode ?>
	<div id="r_ManufacturerCode" class="form-group row">
		<label id="elh_pharmacy_products_ManufacturerCode" for="x_ManufacturerCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ManufacturerCode->caption() ?><?php echo $pharmacy_products_add->ManufacturerCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ManufacturerCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ManufacturerCode">
<input type="text" data-table="pharmacy_products" data-field="x_ManufacturerCode" name="x_ManufacturerCode" id="x_ManufacturerCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ManufacturerCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ManufacturerCode->EditValue ?>"<?php echo $pharmacy_products_add->ManufacturerCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ManufacturerCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SupplierCode->Visible) { // SupplierCode ?>
	<div id="r_SupplierCode" class="form-group row">
		<label id="elh_pharmacy_products_SupplierCode" for="x_SupplierCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SupplierCode->caption() ?><?php echo $pharmacy_products_add->SupplierCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SupplierCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SupplierCode">
<input type="text" data-table="pharmacy_products" data-field="x_SupplierCode" name="x_SupplierCode" id="x_SupplierCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SupplierCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SupplierCode->EditValue ?>"<?php echo $pharmacy_products_add->SupplierCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SupplierCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
	<div id="r_AlternateSupplierCodes" class="form-group row">
		<label id="elh_pharmacy_products_AlternateSupplierCodes" for="x_AlternateSupplierCodes" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AlternateSupplierCodes->caption() ?><?php echo $pharmacy_products_add->AlternateSupplierCodes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSupplierCodes">
<input type="text" data-table="pharmacy_products" data-field="x_AlternateSupplierCodes" name="x_AlternateSupplierCodes" id="x_AlternateSupplierCodes" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AlternateSupplierCodes->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AlternateSupplierCodes->EditValue ?>"<?php echo $pharmacy_products_add->AlternateSupplierCodes->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AlternateSupplierCodes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AlternateProductCode->Visible) { // AlternateProductCode ?>
	<div id="r_AlternateProductCode" class="form-group row">
		<label id="elh_pharmacy_products_AlternateProductCode" for="x_AlternateProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AlternateProductCode->caption() ?><?php echo $pharmacy_products_add->AlternateProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AlternateProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_AlternateProductCode" name="x_AlternateProductCode" id="x_AlternateProductCode" size="30" maxlength="120" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AlternateProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AlternateProductCode->EditValue ?>"<?php echo $pharmacy_products_add->AlternateProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AlternateProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->UniversalProductCode->Visible) { // UniversalProductCode ?>
	<div id="r_UniversalProductCode" class="form-group row">
		<label id="elh_pharmacy_products_UniversalProductCode" for="x_UniversalProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->UniversalProductCode->caption() ?><?php echo $pharmacy_products_add->UniversalProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->UniversalProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_UniversalProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_UniversalProductCode" name="x_UniversalProductCode" id="x_UniversalProductCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->UniversalProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->UniversalProductCode->EditValue ?>"<?php echo $pharmacy_products_add->UniversalProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->UniversalProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BookProductCode->Visible) { // BookProductCode ?>
	<div id="r_BookProductCode" class="form-group row">
		<label id="elh_pharmacy_products_BookProductCode" for="x_BookProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BookProductCode->caption() ?><?php echo $pharmacy_products_add->BookProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BookProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BookProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_BookProductCode" name="x_BookProductCode" id="x_BookProductCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BookProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BookProductCode->EditValue ?>"<?php echo $pharmacy_products_add->BookProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BookProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->OldCode->Visible) { // OldCode ?>
	<div id="r_OldCode" class="form-group row">
		<label id="elh_pharmacy_products_OldCode" for="x_OldCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->OldCode->caption() ?><?php echo $pharmacy_products_add->OldCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->OldCode->cellAttributes() ?>>
<span id="el_pharmacy_products_OldCode">
<input type="text" data-table="pharmacy_products" data-field="x_OldCode" name="x_OldCode" id="x_OldCode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->OldCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->OldCode->EditValue ?>"<?php echo $pharmacy_products_add->OldCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->OldCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProtectedProducts->Visible) { // ProtectedProducts ?>
	<div id="r_ProtectedProducts" class="form-group row">
		<label id="elh_pharmacy_products_ProtectedProducts" for="x_ProtectedProducts" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProtectedProducts->caption() ?><?php echo $pharmacy_products_add->ProtectedProducts->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProtectedProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_ProtectedProducts">
<input type="text" data-table="pharmacy_products" data-field="x_ProtectedProducts" name="x_ProtectedProducts" id="x_ProtectedProducts" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProtectedProducts->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProtectedProducts->EditValue ?>"<?php echo $pharmacy_products_add->ProtectedProducts->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProtectedProducts->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductFullName->Visible) { // ProductFullName ?>
	<div id="r_ProductFullName" class="form-group row">
		<label id="elh_pharmacy_products_ProductFullName" for="x_ProductFullName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductFullName->caption() ?><?php echo $pharmacy_products_add->ProductFullName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductFullName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductFullName">
<input type="text" data-table="pharmacy_products" data-field="x_ProductFullName" name="x_ProductFullName" id="x_ProductFullName" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductFullName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductFullName->EditValue ?>"<?php echo $pharmacy_products_add->ProductFullName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductFullName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
	<div id="r_UnitOfMeasure" class="form-group row">
		<label id="elh_pharmacy_products_UnitOfMeasure" for="x_UnitOfMeasure" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->UnitOfMeasure->caption() ?><?php echo $pharmacy_products_add->UnitOfMeasure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->UnitOfMeasure->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitOfMeasure">
<input type="text" data-table="pharmacy_products" data-field="x_UnitOfMeasure" name="x_UnitOfMeasure" id="x_UnitOfMeasure" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->UnitOfMeasure->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->UnitOfMeasure->EditValue ?>"<?php echo $pharmacy_products_add->UnitOfMeasure->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->UnitOfMeasure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->UnitDescription->Visible) { // UnitDescription ?>
	<div id="r_UnitDescription" class="form-group row">
		<label id="elh_pharmacy_products_UnitDescription" for="x_UnitDescription" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->UnitDescription->caption() ?><?php echo $pharmacy_products_add->UnitDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->UnitDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitDescription">
<input type="text" data-table="pharmacy_products" data-field="x_UnitDescription" name="x_UnitDescription" id="x_UnitDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->UnitDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->UnitDescription->EditValue ?>"<?php echo $pharmacy_products_add->UnitDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->UnitDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BulkDescription->Visible) { // BulkDescription ?>
	<div id="r_BulkDescription" class="form-group row">
		<label id="elh_pharmacy_products_BulkDescription" for="x_BulkDescription" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BulkDescription->caption() ?><?php echo $pharmacy_products_add->BulkDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BulkDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BulkDescription">
<input type="text" data-table="pharmacy_products" data-field="x_BulkDescription" name="x_BulkDescription" id="x_BulkDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BulkDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BulkDescription->EditValue ?>"<?php echo $pharmacy_products_add->BulkDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BulkDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BarCodeDescription->Visible) { // BarCodeDescription ?>
	<div id="r_BarCodeDescription" class="form-group row">
		<label id="elh_pharmacy_products_BarCodeDescription" for="x_BarCodeDescription" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BarCodeDescription->caption() ?><?php echo $pharmacy_products_add->BarCodeDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BarCodeDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDescription">
<input type="text" data-table="pharmacy_products" data-field="x_BarCodeDescription" name="x_BarCodeDescription" id="x_BarCodeDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BarCodeDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BarCodeDescription->EditValue ?>"<?php echo $pharmacy_products_add->BarCodeDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BarCodeDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PackageInformation->Visible) { // PackageInformation ?>
	<div id="r_PackageInformation" class="form-group row">
		<label id="elh_pharmacy_products_PackageInformation" for="x_PackageInformation" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PackageInformation->caption() ?><?php echo $pharmacy_products_add->PackageInformation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageInformation">
<input type="text" data-table="pharmacy_products" data-field="x_PackageInformation" name="x_PackageInformation" id="x_PackageInformation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PackageInformation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PackageInformation->EditValue ?>"<?php echo $pharmacy_products_add->PackageInformation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PackageInformation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PackageId->Visible) { // PackageId ?>
	<div id="r_PackageId" class="form-group row">
		<label id="elh_pharmacy_products_PackageId" for="x_PackageId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PackageId->caption() ?><?php echo $pharmacy_products_add->PackageId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PackageId->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageId">
<input type="text" data-table="pharmacy_products" data-field="x_PackageId" name="x_PackageId" id="x_PackageId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PackageId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PackageId->EditValue ?>"<?php echo $pharmacy_products_add->PackageId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PackageId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Weight->Visible) { // Weight ?>
	<div id="r_Weight" class="form-group row">
		<label id="elh_pharmacy_products_Weight" for="x_Weight" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Weight->caption() ?><?php echo $pharmacy_products_add->Weight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Weight->cellAttributes() ?>>
<span id="el_pharmacy_products_Weight">
<input type="text" data-table="pharmacy_products" data-field="x_Weight" name="x_Weight" id="x_Weight" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Weight->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Weight->EditValue ?>"<?php echo $pharmacy_products_add->Weight->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Weight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AllowFractions->Visible) { // AllowFractions ?>
	<div id="r_AllowFractions" class="form-group row">
		<label id="elh_pharmacy_products_AllowFractions" for="x_AllowFractions" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AllowFractions->caption() ?><?php echo $pharmacy_products_add->AllowFractions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AllowFractions->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowFractions">
<input type="text" data-table="pharmacy_products" data-field="x_AllowFractions" name="x_AllowFractions" id="x_AllowFractions" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AllowFractions->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AllowFractions->EditValue ?>"<?php echo $pharmacy_products_add->AllowFractions->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AllowFractions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
	<div id="r_MinimumStockLevel" class="form-group row">
		<label id="elh_pharmacy_products_MinimumStockLevel" for="x_MinimumStockLevel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MinimumStockLevel->caption() ?><?php echo $pharmacy_products_add->MinimumStockLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MinimumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumStockLevel">
<input type="text" data-table="pharmacy_products" data-field="x_MinimumStockLevel" name="x_MinimumStockLevel" id="x_MinimumStockLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MinimumStockLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MinimumStockLevel->EditValue ?>"<?php echo $pharmacy_products_add->MinimumStockLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MinimumStockLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
	<div id="r_MaximumStockLevel" class="form-group row">
		<label id="elh_pharmacy_products_MaximumStockLevel" for="x_MaximumStockLevel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MaximumStockLevel->caption() ?><?php echo $pharmacy_products_add->MaximumStockLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MaximumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MaximumStockLevel">
<input type="text" data-table="pharmacy_products" data-field="x_MaximumStockLevel" name="x_MaximumStockLevel" id="x_MaximumStockLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MaximumStockLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MaximumStockLevel->EditValue ?>"<?php echo $pharmacy_products_add->MaximumStockLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MaximumStockLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ReorderLevel->Visible) { // ReorderLevel ?>
	<div id="r_ReorderLevel" class="form-group row">
		<label id="elh_pharmacy_products_ReorderLevel" for="x_ReorderLevel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ReorderLevel->caption() ?><?php echo $pharmacy_products_add->ReorderLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ReorderLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_ReorderLevel">
<input type="text" data-table="pharmacy_products" data-field="x_ReorderLevel" name="x_ReorderLevel" id="x_ReorderLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ReorderLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ReorderLevel->EditValue ?>"<?php echo $pharmacy_products_add->ReorderLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ReorderLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MinMaxRatio->Visible) { // MinMaxRatio ?>
	<div id="r_MinMaxRatio" class="form-group row">
		<label id="elh_pharmacy_products_MinMaxRatio" for="x_MinMaxRatio" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MinMaxRatio->caption() ?><?php echo $pharmacy_products_add->MinMaxRatio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxRatio">
<input type="text" data-table="pharmacy_products" data-field="x_MinMaxRatio" name="x_MinMaxRatio" id="x_MinMaxRatio" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MinMaxRatio->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MinMaxRatio->EditValue ?>"<?php echo $pharmacy_products_add->MinMaxRatio->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MinMaxRatio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
	<div id="r_AutoMinMaxRatio" class="form-group row">
		<label id="elh_pharmacy_products_AutoMinMaxRatio" for="x_AutoMinMaxRatio" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AutoMinMaxRatio->caption() ?><?php echo $pharmacy_products_add->AutoMinMaxRatio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_AutoMinMaxRatio">
<input type="text" data-table="pharmacy_products" data-field="x_AutoMinMaxRatio" name="x_AutoMinMaxRatio" id="x_AutoMinMaxRatio" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AutoMinMaxRatio->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AutoMinMaxRatio->EditValue ?>"<?php echo $pharmacy_products_add->AutoMinMaxRatio->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AutoMinMaxRatio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ScheduleCode->Visible) { // ScheduleCode ?>
	<div id="r_ScheduleCode" class="form-group row">
		<label id="elh_pharmacy_products_ScheduleCode" for="x_ScheduleCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ScheduleCode->caption() ?><?php echo $pharmacy_products_add->ScheduleCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ScheduleCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleCode">
<input type="text" data-table="pharmacy_products" data-field="x_ScheduleCode" name="x_ScheduleCode" id="x_ScheduleCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ScheduleCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ScheduleCode->EditValue ?>"<?php echo $pharmacy_products_add->ScheduleCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ScheduleCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->RopRatio->Visible) { // RopRatio ?>
	<div id="r_RopRatio" class="form-group row">
		<label id="elh_pharmacy_products_RopRatio" for="x_RopRatio" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->RopRatio->caption() ?><?php echo $pharmacy_products_add->RopRatio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->RopRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_RopRatio">
<input type="text" data-table="pharmacy_products" data-field="x_RopRatio" name="x_RopRatio" id="x_RopRatio" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->RopRatio->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->RopRatio->EditValue ?>"<?php echo $pharmacy_products_add->RopRatio->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->RopRatio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_products_MRP" for="x_MRP" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MRP->caption() ?><?php echo $pharmacy_products_add->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MRP->cellAttributes() ?>>
<span id="el_pharmacy_products_MRP">
<input type="text" data-table="pharmacy_products" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MRP->EditValue ?>"<?php echo $pharmacy_products_add->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PurchasePrice->Visible) { // PurchasePrice ?>
	<div id="r_PurchasePrice" class="form-group row">
		<label id="elh_pharmacy_products_PurchasePrice" for="x_PurchasePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PurchasePrice->caption() ?><?php echo $pharmacy_products_add->PurchasePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PurchasePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchasePrice">
<input type="text" data-table="pharmacy_products" data-field="x_PurchasePrice" name="x_PurchasePrice" id="x_PurchasePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PurchasePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PurchasePrice->EditValue ?>"<?php echo $pharmacy_products_add->PurchasePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PurchasePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PurchaseUnit->Visible) { // PurchaseUnit ?>
	<div id="r_PurchaseUnit" class="form-group row">
		<label id="elh_pharmacy_products_PurchaseUnit" for="x_PurchaseUnit" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PurchaseUnit->caption() ?><?php echo $pharmacy_products_add->PurchaseUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PurchaseUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseUnit">
<input type="text" data-table="pharmacy_products" data-field="x_PurchaseUnit" name="x_PurchaseUnit" id="x_PurchaseUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PurchaseUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PurchaseUnit->EditValue ?>"<?php echo $pharmacy_products_add->PurchaseUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PurchaseUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
	<div id="r_PurchaseTaxCode" class="form-group row">
		<label id="elh_pharmacy_products_PurchaseTaxCode" for="x_PurchaseTaxCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PurchaseTaxCode->caption() ?><?php echo $pharmacy_products_add->PurchaseTaxCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PurchaseTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseTaxCode">
<input type="text" data-table="pharmacy_products" data-field="x_PurchaseTaxCode" name="x_PurchaseTaxCode" id="x_PurchaseTaxCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PurchaseTaxCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PurchaseTaxCode->EditValue ?>"<?php echo $pharmacy_products_add->PurchaseTaxCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PurchaseTaxCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AllowDirectInward->Visible) { // AllowDirectInward ?>
	<div id="r_AllowDirectInward" class="form-group row">
		<label id="elh_pharmacy_products_AllowDirectInward" for="x_AllowDirectInward" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AllowDirectInward->caption() ?><?php echo $pharmacy_products_add->AllowDirectInward->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AllowDirectInward->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowDirectInward">
<input type="text" data-table="pharmacy_products" data-field="x_AllowDirectInward" name="x_AllowDirectInward" id="x_AllowDirectInward" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AllowDirectInward->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AllowDirectInward->EditValue ?>"<?php echo $pharmacy_products_add->AllowDirectInward->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AllowDirectInward->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SalePrice->Visible) { // SalePrice ?>
	<div id="r_SalePrice" class="form-group row">
		<label id="elh_pharmacy_products_SalePrice" for="x_SalePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SalePrice->caption() ?><?php echo $pharmacy_products_add->SalePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePrice">
<input type="text" data-table="pharmacy_products" data-field="x_SalePrice" name="x_SalePrice" id="x_SalePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SalePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SalePrice->EditValue ?>"<?php echo $pharmacy_products_add->SalePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SalePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SaleUnit->Visible) { // SaleUnit ?>
	<div id="r_SaleUnit" class="form-group row">
		<label id="elh_pharmacy_products_SaleUnit" for="x_SaleUnit" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SaleUnit->caption() ?><?php echo $pharmacy_products_add->SaleUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SaleUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleUnit">
<input type="text" data-table="pharmacy_products" data-field="x_SaleUnit" name="x_SaleUnit" id="x_SaleUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SaleUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SaleUnit->EditValue ?>"<?php echo $pharmacy_products_add->SaleUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SaleUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SalesTaxCode->Visible) { // SalesTaxCode ?>
	<div id="r_SalesTaxCode" class="form-group row">
		<label id="elh_pharmacy_products_SalesTaxCode" for="x_SalesTaxCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SalesTaxCode->caption() ?><?php echo $pharmacy_products_add->SalesTaxCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SalesTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesTaxCode">
<input type="text" data-table="pharmacy_products" data-field="x_SalesTaxCode" name="x_SalesTaxCode" id="x_SalesTaxCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SalesTaxCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SalesTaxCode->EditValue ?>"<?php echo $pharmacy_products_add->SalesTaxCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SalesTaxCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->StockReceived->Visible) { // StockReceived ?>
	<div id="r_StockReceived" class="form-group row">
		<label id="elh_pharmacy_products_StockReceived" for="x_StockReceived" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->StockReceived->caption() ?><?php echo $pharmacy_products_add->StockReceived->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->StockReceived->cellAttributes() ?>>
<span id="el_pharmacy_products_StockReceived">
<input type="text" data-table="pharmacy_products" data-field="x_StockReceived" name="x_StockReceived" id="x_StockReceived" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->StockReceived->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->StockReceived->EditValue ?>"<?php echo $pharmacy_products_add->StockReceived->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->StockReceived->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TotalStock->Visible) { // TotalStock ?>
	<div id="r_TotalStock" class="form-group row">
		<label id="elh_pharmacy_products_TotalStock" for="x_TotalStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TotalStock->caption() ?><?php echo $pharmacy_products_add->TotalStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TotalStock->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalStock">
<input type="text" data-table="pharmacy_products" data-field="x_TotalStock" name="x_TotalStock" id="x_TotalStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TotalStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TotalStock->EditValue ?>"<?php echo $pharmacy_products_add->TotalStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TotalStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->StockType->Visible) { // StockType ?>
	<div id="r_StockType" class="form-group row">
		<label id="elh_pharmacy_products_StockType" for="x_StockType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->StockType->caption() ?><?php echo $pharmacy_products_add->StockType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->StockType->cellAttributes() ?>>
<span id="el_pharmacy_products_StockType">
<input type="text" data-table="pharmacy_products" data-field="x_StockType" name="x_StockType" id="x_StockType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->StockType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->StockType->EditValue ?>"<?php echo $pharmacy_products_add->StockType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->StockType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->StockCheckDate->Visible) { // StockCheckDate ?>
	<div id="r_StockCheckDate" class="form-group row">
		<label id="elh_pharmacy_products_StockCheckDate" for="x_StockCheckDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->StockCheckDate->caption() ?><?php echo $pharmacy_products_add->StockCheckDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->StockCheckDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCheckDate">
<input type="text" data-table="pharmacy_products" data-field="x_StockCheckDate" name="x_StockCheckDate" id="x_StockCheckDate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->StockCheckDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->StockCheckDate->EditValue ?>"<?php echo $pharmacy_products_add->StockCheckDate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->StockCheckDate->ReadOnly && !$pharmacy_products_add->StockCheckDate->Disabled && !isset($pharmacy_products_add->StockCheckDate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->StockCheckDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_StockCheckDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->StockCheckDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
	<div id="r_StockAdjustmentDate" class="form-group row">
		<label id="elh_pharmacy_products_StockAdjustmentDate" for="x_StockAdjustmentDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->StockAdjustmentDate->caption() ?><?php echo $pharmacy_products_add->StockAdjustmentDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->StockAdjustmentDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockAdjustmentDate">
<input type="text" data-table="pharmacy_products" data-field="x_StockAdjustmentDate" name="x_StockAdjustmentDate" id="x_StockAdjustmentDate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->StockAdjustmentDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->StockAdjustmentDate->EditValue ?>"<?php echo $pharmacy_products_add->StockAdjustmentDate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->StockAdjustmentDate->ReadOnly && !$pharmacy_products_add->StockAdjustmentDate->Disabled && !isset($pharmacy_products_add->StockAdjustmentDate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->StockAdjustmentDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_StockAdjustmentDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->StockAdjustmentDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_products_Remarks" for="x_Remarks" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Remarks->caption() ?><?php echo $pharmacy_products_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_products_Remarks">
<input type="text" data-table="pharmacy_products" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Remarks->EditValue ?>"<?php echo $pharmacy_products_add->Remarks->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CostCentre->Visible) { // CostCentre ?>
	<div id="r_CostCentre" class="form-group row">
		<label id="elh_pharmacy_products_CostCentre" for="x_CostCentre" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CostCentre->caption() ?><?php echo $pharmacy_products_add->CostCentre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CostCentre->cellAttributes() ?>>
<span id="el_pharmacy_products_CostCentre">
<input type="text" data-table="pharmacy_products" data-field="x_CostCentre" name="x_CostCentre" id="x_CostCentre" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CostCentre->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CostCentre->EditValue ?>"<?php echo $pharmacy_products_add->CostCentre->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CostCentre->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductType->Visible) { // ProductType ?>
	<div id="r_ProductType" class="form-group row">
		<label id="elh_pharmacy_products_ProductType" for="x_ProductType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductType->caption() ?><?php echo $pharmacy_products_add->ProductType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductType->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductType">
<input type="text" data-table="pharmacy_products" data-field="x_ProductType" name="x_ProductType" id="x_ProductType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductType->EditValue ?>"<?php echo $pharmacy_products_add->ProductType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TaxAmount->Visible) { // TaxAmount ?>
	<div id="r_TaxAmount" class="form-group row">
		<label id="elh_pharmacy_products_TaxAmount" for="x_TaxAmount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TaxAmount->caption() ?><?php echo $pharmacy_products_add->TaxAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TaxAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxAmount">
<input type="text" data-table="pharmacy_products" data-field="x_TaxAmount" name="x_TaxAmount" id="x_TaxAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TaxAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TaxAmount->EditValue ?>"<?php echo $pharmacy_products_add->TaxAmount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TaxAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TaxId->Visible) { // TaxId ?>
	<div id="r_TaxId" class="form-group row">
		<label id="elh_pharmacy_products_TaxId" for="x_TaxId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TaxId->caption() ?><?php echo $pharmacy_products_add->TaxId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TaxId->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxId">
<input type="text" data-table="pharmacy_products" data-field="x_TaxId" name="x_TaxId" id="x_TaxId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TaxId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TaxId->EditValue ?>"<?php echo $pharmacy_products_add->TaxId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TaxId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
	<div id="r_ResaleTaxApplicable" class="form-group row">
		<label id="elh_pharmacy_products_ResaleTaxApplicable" for="x_ResaleTaxApplicable" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ResaleTaxApplicable->caption() ?><?php echo $pharmacy_products_add->ResaleTaxApplicable->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ResaleTaxApplicable">
<input type="text" data-table="pharmacy_products" data-field="x_ResaleTaxApplicable" name="x_ResaleTaxApplicable" id="x_ResaleTaxApplicable" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ResaleTaxApplicable->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ResaleTaxApplicable->EditValue ?>"<?php echo $pharmacy_products_add->ResaleTaxApplicable->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ResaleTaxApplicable->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CstOtherTax->Visible) { // CstOtherTax ?>
	<div id="r_CstOtherTax" class="form-group row">
		<label id="elh_pharmacy_products_CstOtherTax" for="x_CstOtherTax" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CstOtherTax->caption() ?><?php echo $pharmacy_products_add->CstOtherTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CstOtherTax->cellAttributes() ?>>
<span id="el_pharmacy_products_CstOtherTax">
<input type="text" data-table="pharmacy_products" data-field="x_CstOtherTax" name="x_CstOtherTax" id="x_CstOtherTax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CstOtherTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CstOtherTax->EditValue ?>"<?php echo $pharmacy_products_add->CstOtherTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CstOtherTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TotalTax->Visible) { // TotalTax ?>
	<div id="r_TotalTax" class="form-group row">
		<label id="elh_pharmacy_products_TotalTax" for="x_TotalTax" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TotalTax->caption() ?><?php echo $pharmacy_products_add->TotalTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TotalTax->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalTax">
<input type="text" data-table="pharmacy_products" data-field="x_TotalTax" name="x_TotalTax" id="x_TotalTax" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TotalTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TotalTax->EditValue ?>"<?php echo $pharmacy_products_add->TotalTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TotalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ItemCost->Visible) { // ItemCost ?>
	<div id="r_ItemCost" class="form-group row">
		<label id="elh_pharmacy_products_ItemCost" for="x_ItemCost" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ItemCost->caption() ?><?php echo $pharmacy_products_add->ItemCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ItemCost">
<input type="text" data-table="pharmacy_products" data-field="x_ItemCost" name="x_ItemCost" id="x_ItemCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ItemCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ItemCost->EditValue ?>"<?php echo $pharmacy_products_add->ItemCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ItemCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ExpiryDate->Visible) { // ExpiryDate ?>
	<div id="r_ExpiryDate" class="form-group row">
		<label id="elh_pharmacy_products_ExpiryDate" for="x_ExpiryDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ExpiryDate->caption() ?><?php echo $pharmacy_products_add->ExpiryDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ExpiryDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryDate">
<input type="text" data-table="pharmacy_products" data-field="x_ExpiryDate" name="x_ExpiryDate" id="x_ExpiryDate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ExpiryDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ExpiryDate->EditValue ?>"<?php echo $pharmacy_products_add->ExpiryDate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->ExpiryDate->ReadOnly && !$pharmacy_products_add->ExpiryDate->Disabled && !isset($pharmacy_products_add->ExpiryDate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->ExpiryDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_ExpiryDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->ExpiryDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BatchDescription->Visible) { // BatchDescription ?>
	<div id="r_BatchDescription" class="form-group row">
		<label id="elh_pharmacy_products_BatchDescription" for="x_BatchDescription" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BatchDescription->caption() ?><?php echo $pharmacy_products_add->BatchDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BatchDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchDescription">
<input type="text" data-table="pharmacy_products" data-field="x_BatchDescription" name="x_BatchDescription" id="x_BatchDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BatchDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BatchDescription->EditValue ?>"<?php echo $pharmacy_products_add->BatchDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BatchDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FreeScheme->Visible) { // FreeScheme ?>
	<div id="r_FreeScheme" class="form-group row">
		<label id="elh_pharmacy_products_FreeScheme" for="x_FreeScheme" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FreeScheme->caption() ?><?php echo $pharmacy_products_add->FreeScheme->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FreeScheme->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeScheme">
<input type="text" data-table="pharmacy_products" data-field="x_FreeScheme" name="x_FreeScheme" id="x_FreeScheme" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FreeScheme->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FreeScheme->EditValue ?>"<?php echo $pharmacy_products_add->FreeScheme->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->FreeScheme->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
	<div id="r_CashDiscountEligibility" class="form-group row">
		<label id="elh_pharmacy_products_CashDiscountEligibility" for="x_CashDiscountEligibility" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CashDiscountEligibility->caption() ?><?php echo $pharmacy_products_add->CashDiscountEligibility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CashDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_CashDiscountEligibility">
<input type="text" data-table="pharmacy_products" data-field="x_CashDiscountEligibility" name="x_CashDiscountEligibility" id="x_CashDiscountEligibility" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CashDiscountEligibility->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CashDiscountEligibility->EditValue ?>"<?php echo $pharmacy_products_add->CashDiscountEligibility->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CashDiscountEligibility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
	<div id="r_DiscountPerAllowInBill" class="form-group row">
		<label id="elh_pharmacy_products_DiscountPerAllowInBill" for="x_DiscountPerAllowInBill" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DiscountPerAllowInBill->caption() ?><?php echo $pharmacy_products_add->DiscountPerAllowInBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountPerAllowInBill">
<input type="text" data-table="pharmacy_products" data-field="x_DiscountPerAllowInBill" name="x_DiscountPerAllowInBill" id="x_DiscountPerAllowInBill" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DiscountPerAllowInBill->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DiscountPerAllowInBill->EditValue ?>"<?php echo $pharmacy_products_add->DiscountPerAllowInBill->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DiscountPerAllowInBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_pharmacy_products_Discount" for="x_Discount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Discount->caption() ?><?php echo $pharmacy_products_add->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Discount->cellAttributes() ?>>
<span id="el_pharmacy_products_Discount">
<input type="text" data-table="pharmacy_products" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Discount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Discount->EditValue ?>"<?php echo $pharmacy_products_add->Discount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TotalAmount->Visible) { // TotalAmount ?>
	<div id="r_TotalAmount" class="form-group row">
		<label id="elh_pharmacy_products_TotalAmount" for="x_TotalAmount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TotalAmount->caption() ?><?php echo $pharmacy_products_add->TotalAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TotalAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalAmount">
<input type="text" data-table="pharmacy_products" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TotalAmount->EditValue ?>"<?php echo $pharmacy_products_add->TotalAmount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TotalAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->StandardMargin->Visible) { // StandardMargin ?>
	<div id="r_StandardMargin" class="form-group row">
		<label id="elh_pharmacy_products_StandardMargin" for="x_StandardMargin" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->StandardMargin->caption() ?><?php echo $pharmacy_products_add->StandardMargin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->StandardMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_StandardMargin">
<input type="text" data-table="pharmacy_products" data-field="x_StandardMargin" name="x_StandardMargin" id="x_StandardMargin" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->StandardMargin->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->StandardMargin->EditValue ?>"<?php echo $pharmacy_products_add->StandardMargin->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->StandardMargin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Margin->Visible) { // Margin ?>
	<div id="r_Margin" class="form-group row">
		<label id="elh_pharmacy_products_Margin" for="x_Margin" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Margin->caption() ?><?php echo $pharmacy_products_add->Margin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Margin->cellAttributes() ?>>
<span id="el_pharmacy_products_Margin">
<input type="text" data-table="pharmacy_products" data-field="x_Margin" name="x_Margin" id="x_Margin" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Margin->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Margin->EditValue ?>"<?php echo $pharmacy_products_add->Margin->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Margin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MarginId->Visible) { // MarginId ?>
	<div id="r_MarginId" class="form-group row">
		<label id="elh_pharmacy_products_MarginId" for="x_MarginId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MarginId->caption() ?><?php echo $pharmacy_products_add->MarginId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MarginId->cellAttributes() ?>>
<span id="el_pharmacy_products_MarginId">
<input type="text" data-table="pharmacy_products" data-field="x_MarginId" name="x_MarginId" id="x_MarginId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MarginId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MarginId->EditValue ?>"<?php echo $pharmacy_products_add->MarginId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MarginId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ExpectedMargin->Visible) { // ExpectedMargin ?>
	<div id="r_ExpectedMargin" class="form-group row">
		<label id="elh_pharmacy_products_ExpectedMargin" for="x_ExpectedMargin" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ExpectedMargin->caption() ?><?php echo $pharmacy_products_add->ExpectedMargin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ExpectedMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpectedMargin">
<input type="text" data-table="pharmacy_products" data-field="x_ExpectedMargin" name="x_ExpectedMargin" id="x_ExpectedMargin" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ExpectedMargin->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ExpectedMargin->EditValue ?>"<?php echo $pharmacy_products_add->ExpectedMargin->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ExpectedMargin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
	<div id="r_SurchargeBeforeTax" class="form-group row">
		<label id="elh_pharmacy_products_SurchargeBeforeTax" for="x_SurchargeBeforeTax" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SurchargeBeforeTax->caption() ?><?php echo $pharmacy_products_add->SurchargeBeforeTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeBeforeTax">
<input type="text" data-table="pharmacy_products" data-field="x_SurchargeBeforeTax" name="x_SurchargeBeforeTax" id="x_SurchargeBeforeTax" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SurchargeBeforeTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SurchargeBeforeTax->EditValue ?>"<?php echo $pharmacy_products_add->SurchargeBeforeTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SurchargeBeforeTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
	<div id="r_SurchargeAfterTax" class="form-group row">
		<label id="elh_pharmacy_products_SurchargeAfterTax" for="x_SurchargeAfterTax" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SurchargeAfterTax->caption() ?><?php echo $pharmacy_products_add->SurchargeAfterTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SurchargeAfterTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeAfterTax">
<input type="text" data-table="pharmacy_products" data-field="x_SurchargeAfterTax" name="x_SurchargeAfterTax" id="x_SurchargeAfterTax" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SurchargeAfterTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SurchargeAfterTax->EditValue ?>"<?php echo $pharmacy_products_add->SurchargeAfterTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SurchargeAfterTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TempOrderNo->Visible) { // TempOrderNo ?>
	<div id="r_TempOrderNo" class="form-group row">
		<label id="elh_pharmacy_products_TempOrderNo" for="x_TempOrderNo" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TempOrderNo->caption() ?><?php echo $pharmacy_products_add->TempOrderNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TempOrderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderNo">
<input type="text" data-table="pharmacy_products" data-field="x_TempOrderNo" name="x_TempOrderNo" id="x_TempOrderNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TempOrderNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TempOrderNo->EditValue ?>"<?php echo $pharmacy_products_add->TempOrderNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TempOrderNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TempOrderDate->Visible) { // TempOrderDate ?>
	<div id="r_TempOrderDate" class="form-group row">
		<label id="elh_pharmacy_products_TempOrderDate" for="x_TempOrderDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TempOrderDate->caption() ?><?php echo $pharmacy_products_add->TempOrderDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TempOrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderDate">
<input type="text" data-table="pharmacy_products" data-field="x_TempOrderDate" name="x_TempOrderDate" id="x_TempOrderDate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TempOrderDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TempOrderDate->EditValue ?>"<?php echo $pharmacy_products_add->TempOrderDate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->TempOrderDate->ReadOnly && !$pharmacy_products_add->TempOrderDate->Disabled && !isset($pharmacy_products_add->TempOrderDate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->TempOrderDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_TempOrderDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->TempOrderDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->OrderUnit->Visible) { // OrderUnit ?>
	<div id="r_OrderUnit" class="form-group row">
		<label id="elh_pharmacy_products_OrderUnit" for="x_OrderUnit" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->OrderUnit->caption() ?><?php echo $pharmacy_products_add->OrderUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->OrderUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderUnit">
<input type="text" data-table="pharmacy_products" data-field="x_OrderUnit" name="x_OrderUnit" id="x_OrderUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->OrderUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->OrderUnit->EditValue ?>"<?php echo $pharmacy_products_add->OrderUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->OrderUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->OrderQuantity->Visible) { // OrderQuantity ?>
	<div id="r_OrderQuantity" class="form-group row">
		<label id="elh_pharmacy_products_OrderQuantity" for="x_OrderQuantity" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->OrderQuantity->caption() ?><?php echo $pharmacy_products_add->OrderQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->OrderQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderQuantity">
<input type="text" data-table="pharmacy_products" data-field="x_OrderQuantity" name="x_OrderQuantity" id="x_OrderQuantity" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->OrderQuantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->OrderQuantity->EditValue ?>"<?php echo $pharmacy_products_add->OrderQuantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->OrderQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MarkForOrder->Visible) { // MarkForOrder ?>
	<div id="r_MarkForOrder" class="form-group row">
		<label id="elh_pharmacy_products_MarkForOrder" for="x_MarkForOrder" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MarkForOrder->caption() ?><?php echo $pharmacy_products_add->MarkForOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MarkForOrder->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkForOrder">
<input type="text" data-table="pharmacy_products" data-field="x_MarkForOrder" name="x_MarkForOrder" id="x_MarkForOrder" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MarkForOrder->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MarkForOrder->EditValue ?>"<?php echo $pharmacy_products_add->MarkForOrder->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MarkForOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->OrderAllId->Visible) { // OrderAllId ?>
	<div id="r_OrderAllId" class="form-group row">
		<label id="elh_pharmacy_products_OrderAllId" for="x_OrderAllId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->OrderAllId->caption() ?><?php echo $pharmacy_products_add->OrderAllId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->OrderAllId->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderAllId">
<input type="text" data-table="pharmacy_products" data-field="x_OrderAllId" name="x_OrderAllId" id="x_OrderAllId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->OrderAllId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->OrderAllId->EditValue ?>"<?php echo $pharmacy_products_add->OrderAllId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->OrderAllId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
	<div id="r_CalculateOrderQty" class="form-group row">
		<label id="elh_pharmacy_products_CalculateOrderQty" for="x_CalculateOrderQty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CalculateOrderQty->caption() ?><?php echo $pharmacy_products_add->CalculateOrderQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CalculateOrderQty->cellAttributes() ?>>
<span id="el_pharmacy_products_CalculateOrderQty">
<input type="text" data-table="pharmacy_products" data-field="x_CalculateOrderQty" name="x_CalculateOrderQty" id="x_CalculateOrderQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CalculateOrderQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CalculateOrderQty->EditValue ?>"<?php echo $pharmacy_products_add->CalculateOrderQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CalculateOrderQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SubLocation->Visible) { // SubLocation ?>
	<div id="r_SubLocation" class="form-group row">
		<label id="elh_pharmacy_products_SubLocation" for="x_SubLocation" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SubLocation->caption() ?><?php echo $pharmacy_products_add->SubLocation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SubLocation->cellAttributes() ?>>
<span id="el_pharmacy_products_SubLocation">
<input type="text" data-table="pharmacy_products" data-field="x_SubLocation" name="x_SubLocation" id="x_SubLocation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SubLocation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SubLocation->EditValue ?>"<?php echo $pharmacy_products_add->SubLocation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SubLocation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CategoryCode->Visible) { // CategoryCode ?>
	<div id="r_CategoryCode" class="form-group row">
		<label id="elh_pharmacy_products_CategoryCode" for="x_CategoryCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CategoryCode->caption() ?><?php echo $pharmacy_products_add->CategoryCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CategoryCode">
<input type="text" data-table="pharmacy_products" data-field="x_CategoryCode" name="x_CategoryCode" id="x_CategoryCode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CategoryCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CategoryCode->EditValue ?>"<?php echo $pharmacy_products_add->CategoryCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CategoryCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SubCategory->Visible) { // SubCategory ?>
	<div id="r_SubCategory" class="form-group row">
		<label id="elh_pharmacy_products_SubCategory" for="x_SubCategory" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SubCategory->caption() ?><?php echo $pharmacy_products_add->SubCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SubCategory->cellAttributes() ?>>
<span id="el_pharmacy_products_SubCategory">
<input type="text" data-table="pharmacy_products" data-field="x_SubCategory" name="x_SubCategory" id="x_SubCategory" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SubCategory->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SubCategory->EditValue ?>"<?php echo $pharmacy_products_add->SubCategory->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SubCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
	<div id="r_FlexCategoryCode" class="form-group row">
		<label id="elh_pharmacy_products_FlexCategoryCode" for="x_FlexCategoryCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FlexCategoryCode->caption() ?><?php echo $pharmacy_products_add->FlexCategoryCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FlexCategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_FlexCategoryCode">
<input type="text" data-table="pharmacy_products" data-field="x_FlexCategoryCode" name="x_FlexCategoryCode" id="x_FlexCategoryCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FlexCategoryCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FlexCategoryCode->EditValue ?>"<?php echo $pharmacy_products_add->FlexCategoryCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->FlexCategoryCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ABCSaleQty->Visible) { // ABCSaleQty ?>
	<div id="r_ABCSaleQty" class="form-group row">
		<label id="elh_pharmacy_products_ABCSaleQty" for="x_ABCSaleQty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ABCSaleQty->caption() ?><?php echo $pharmacy_products_add->ABCSaleQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ABCSaleQty->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleQty">
<input type="text" data-table="pharmacy_products" data-field="x_ABCSaleQty" name="x_ABCSaleQty" id="x_ABCSaleQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ABCSaleQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ABCSaleQty->EditValue ?>"<?php echo $pharmacy_products_add->ABCSaleQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ABCSaleQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ABCSaleValue->Visible) { // ABCSaleValue ?>
	<div id="r_ABCSaleValue" class="form-group row">
		<label id="elh_pharmacy_products_ABCSaleValue" for="x_ABCSaleValue" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ABCSaleValue->caption() ?><?php echo $pharmacy_products_add->ABCSaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ABCSaleValue->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleValue">
<input type="text" data-table="pharmacy_products" data-field="x_ABCSaleValue" name="x_ABCSaleValue" id="x_ABCSaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ABCSaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ABCSaleValue->EditValue ?>"<?php echo $pharmacy_products_add->ABCSaleValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ABCSaleValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ConvertionFactor->Visible) { // ConvertionFactor ?>
	<div id="r_ConvertionFactor" class="form-group row">
		<label id="elh_pharmacy_products_ConvertionFactor" for="x_ConvertionFactor" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ConvertionFactor->caption() ?><?php echo $pharmacy_products_add->ConvertionFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ConvertionFactor->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionFactor">
<input type="text" data-table="pharmacy_products" data-field="x_ConvertionFactor" name="x_ConvertionFactor" id="x_ConvertionFactor" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ConvertionFactor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ConvertionFactor->EditValue ?>"<?php echo $pharmacy_products_add->ConvertionFactor->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ConvertionFactor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
	<div id="r_ConvertionUnitDesc" class="form-group row">
		<label id="elh_pharmacy_products_ConvertionUnitDesc" for="x_ConvertionUnitDesc" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ConvertionUnitDesc->caption() ?><?php echo $pharmacy_products_add->ConvertionUnitDesc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionUnitDesc">
<input type="text" data-table="pharmacy_products" data-field="x_ConvertionUnitDesc" name="x_ConvertionUnitDesc" id="x_ConvertionUnitDesc" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ConvertionUnitDesc->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ConvertionUnitDesc->EditValue ?>"<?php echo $pharmacy_products_add->ConvertionUnitDesc->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ConvertionUnitDesc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TransactionId->Visible) { // TransactionId ?>
	<div id="r_TransactionId" class="form-group row">
		<label id="elh_pharmacy_products_TransactionId" for="x_TransactionId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TransactionId->caption() ?><?php echo $pharmacy_products_add->TransactionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TransactionId->cellAttributes() ?>>
<span id="el_pharmacy_products_TransactionId">
<input type="text" data-table="pharmacy_products" data-field="x_TransactionId" name="x_TransactionId" id="x_TransactionId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TransactionId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TransactionId->EditValue ?>"<?php echo $pharmacy_products_add->TransactionId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TransactionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SoldProductId->Visible) { // SoldProductId ?>
	<div id="r_SoldProductId" class="form-group row">
		<label id="elh_pharmacy_products_SoldProductId" for="x_SoldProductId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SoldProductId->caption() ?><?php echo $pharmacy_products_add->SoldProductId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SoldProductId->cellAttributes() ?>>
<span id="el_pharmacy_products_SoldProductId">
<input type="text" data-table="pharmacy_products" data-field="x_SoldProductId" name="x_SoldProductId" id="x_SoldProductId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SoldProductId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SoldProductId->EditValue ?>"<?php echo $pharmacy_products_add->SoldProductId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SoldProductId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->WantedBookId->Visible) { // WantedBookId ?>
	<div id="r_WantedBookId" class="form-group row">
		<label id="elh_pharmacy_products_WantedBookId" for="x_WantedBookId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->WantedBookId->caption() ?><?php echo $pharmacy_products_add->WantedBookId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->WantedBookId->cellAttributes() ?>>
<span id="el_pharmacy_products_WantedBookId">
<input type="text" data-table="pharmacy_products" data-field="x_WantedBookId" name="x_WantedBookId" id="x_WantedBookId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->WantedBookId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->WantedBookId->EditValue ?>"<?php echo $pharmacy_products_add->WantedBookId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->WantedBookId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AllId->Visible) { // AllId ?>
	<div id="r_AllId" class="form-group row">
		<label id="elh_pharmacy_products_AllId" for="x_AllId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AllId->caption() ?><?php echo $pharmacy_products_add->AllId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AllId->cellAttributes() ?>>
<span id="el_pharmacy_products_AllId">
<input type="text" data-table="pharmacy_products" data-field="x_AllId" name="x_AllId" id="x_AllId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AllId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AllId->EditValue ?>"<?php echo $pharmacy_products_add->AllId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AllId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
	<div id="r_BatchAndExpiryCompulsory" class="form-group row">
		<label id="elh_pharmacy_products_BatchAndExpiryCompulsory" for="x_BatchAndExpiryCompulsory" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BatchAndExpiryCompulsory->caption() ?><?php echo $pharmacy_products_add->BatchAndExpiryCompulsory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchAndExpiryCompulsory">
<input type="text" data-table="pharmacy_products" data-field="x_BatchAndExpiryCompulsory" name="x_BatchAndExpiryCompulsory" id="x_BatchAndExpiryCompulsory" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BatchAndExpiryCompulsory->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BatchAndExpiryCompulsory->EditValue ?>"<?php echo $pharmacy_products_add->BatchAndExpiryCompulsory->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BatchAndExpiryCompulsory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
	<div id="r_BatchStockForWantedBook" class="form-group row">
		<label id="elh_pharmacy_products_BatchStockForWantedBook" for="x_BatchStockForWantedBook" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BatchStockForWantedBook->caption() ?><?php echo $pharmacy_products_add->BatchStockForWantedBook->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchStockForWantedBook">
<input type="text" data-table="pharmacy_products" data-field="x_BatchStockForWantedBook" name="x_BatchStockForWantedBook" id="x_BatchStockForWantedBook" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BatchStockForWantedBook->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BatchStockForWantedBook->EditValue ?>"<?php echo $pharmacy_products_add->BatchStockForWantedBook->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BatchStockForWantedBook->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
	<div id="r_UnitBasedBilling" class="form-group row">
		<label id="elh_pharmacy_products_UnitBasedBilling" for="x_UnitBasedBilling" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->UnitBasedBilling->caption() ?><?php echo $pharmacy_products_add->UnitBasedBilling->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->UnitBasedBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitBasedBilling">
<input type="text" data-table="pharmacy_products" data-field="x_UnitBasedBilling" name="x_UnitBasedBilling" id="x_UnitBasedBilling" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->UnitBasedBilling->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->UnitBasedBilling->EditValue ?>"<?php echo $pharmacy_products_add->UnitBasedBilling->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->UnitBasedBilling->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
	<div id="r_DoNotCheckStock" class="form-group row">
		<label id="elh_pharmacy_products_DoNotCheckStock" for="x_DoNotCheckStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DoNotCheckStock->caption() ?><?php echo $pharmacy_products_add->DoNotCheckStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DoNotCheckStock->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckStock">
<input type="text" data-table="pharmacy_products" data-field="x_DoNotCheckStock" name="x_DoNotCheckStock" id="x_DoNotCheckStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DoNotCheckStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DoNotCheckStock->EditValue ?>"<?php echo $pharmacy_products_add->DoNotCheckStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DoNotCheckStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AcceptRate->Visible) { // AcceptRate ?>
	<div id="r_AcceptRate" class="form-group row">
		<label id="elh_pharmacy_products_AcceptRate" for="x_AcceptRate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AcceptRate->caption() ?><?php echo $pharmacy_products_add->AcceptRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AcceptRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRate">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptRate" name="x_AcceptRate" id="x_AcceptRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AcceptRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AcceptRate->EditValue ?>"<?php echo $pharmacy_products_add->AcceptRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AcceptRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PriceLevel->Visible) { // PriceLevel ?>
	<div id="r_PriceLevel" class="form-group row">
		<label id="elh_pharmacy_products_PriceLevel" for="x_PriceLevel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PriceLevel->caption() ?><?php echo $pharmacy_products_add->PriceLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PriceLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceLevel">
<input type="text" data-table="pharmacy_products" data-field="x_PriceLevel" name="x_PriceLevel" id="x_PriceLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PriceLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PriceLevel->EditValue ?>"<?php echo $pharmacy_products_add->PriceLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PriceLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LastQuotePrice->Visible) { // LastQuotePrice ?>
	<div id="r_LastQuotePrice" class="form-group row">
		<label id="elh_pharmacy_products_LastQuotePrice" for="x_LastQuotePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LastQuotePrice->caption() ?><?php echo $pharmacy_products_add->LastQuotePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LastQuotePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_LastQuotePrice">
<input type="text" data-table="pharmacy_products" data-field="x_LastQuotePrice" name="x_LastQuotePrice" id="x_LastQuotePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LastQuotePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->LastQuotePrice->EditValue ?>"<?php echo $pharmacy_products_add->LastQuotePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->LastQuotePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PriceChange->Visible) { // PriceChange ?>
	<div id="r_PriceChange" class="form-group row">
		<label id="elh_pharmacy_products_PriceChange" for="x_PriceChange" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PriceChange->caption() ?><?php echo $pharmacy_products_add->PriceChange->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PriceChange->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceChange">
<input type="text" data-table="pharmacy_products" data-field="x_PriceChange" name="x_PriceChange" id="x_PriceChange" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PriceChange->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PriceChange->EditValue ?>"<?php echo $pharmacy_products_add->PriceChange->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PriceChange->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CommodityCode->Visible) { // CommodityCode ?>
	<div id="r_CommodityCode" class="form-group row">
		<label id="elh_pharmacy_products_CommodityCode" for="x_CommodityCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CommodityCode->caption() ?><?php echo $pharmacy_products_add->CommodityCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CommodityCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CommodityCode">
<input type="text" data-table="pharmacy_products" data-field="x_CommodityCode" name="x_CommodityCode" id="x_CommodityCode" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CommodityCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CommodityCode->EditValue ?>"<?php echo $pharmacy_products_add->CommodityCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CommodityCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->InstitutePrice->Visible) { // InstitutePrice ?>
	<div id="r_InstitutePrice" class="form-group row">
		<label id="elh_pharmacy_products_InstitutePrice" for="x_InstitutePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->InstitutePrice->caption() ?><?php echo $pharmacy_products_add->InstitutePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->InstitutePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_InstitutePrice">
<input type="text" data-table="pharmacy_products" data-field="x_InstitutePrice" name="x_InstitutePrice" id="x_InstitutePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->InstitutePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->InstitutePrice->EditValue ?>"<?php echo $pharmacy_products_add->InstitutePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->InstitutePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
	<div id="r_CtrlOrDCtrlProduct" class="form-group row">
		<label id="elh_pharmacy_products_CtrlOrDCtrlProduct" for="x_CtrlOrDCtrlProduct" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CtrlOrDCtrlProduct->caption() ?><?php echo $pharmacy_products_add->CtrlOrDCtrlProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_CtrlOrDCtrlProduct">
<input type="text" data-table="pharmacy_products" data-field="x_CtrlOrDCtrlProduct" name="x_CtrlOrDCtrlProduct" id="x_CtrlOrDCtrlProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CtrlOrDCtrlProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CtrlOrDCtrlProduct->EditValue ?>"<?php echo $pharmacy_products_add->CtrlOrDCtrlProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CtrlOrDCtrlProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ImportedDate->Visible) { // ImportedDate ?>
	<div id="r_ImportedDate" class="form-group row">
		<label id="elh_pharmacy_products_ImportedDate" for="x_ImportedDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ImportedDate->caption() ?><?php echo $pharmacy_products_add->ImportedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ImportedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ImportedDate">
<input type="text" data-table="pharmacy_products" data-field="x_ImportedDate" name="x_ImportedDate" id="x_ImportedDate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ImportedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ImportedDate->EditValue ?>"<?php echo $pharmacy_products_add->ImportedDate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->ImportedDate->ReadOnly && !$pharmacy_products_add->ImportedDate->Disabled && !isset($pharmacy_products_add->ImportedDate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->ImportedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_ImportedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->ImportedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IsImported->Visible) { // IsImported ?>
	<div id="r_IsImported" class="form-group row">
		<label id="elh_pharmacy_products_IsImported" for="x_IsImported" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IsImported->caption() ?><?php echo $pharmacy_products_add->IsImported->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IsImported->cellAttributes() ?>>
<span id="el_pharmacy_products_IsImported">
<input type="text" data-table="pharmacy_products" data-field="x_IsImported" name="x_IsImported" id="x_IsImported" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IsImported->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IsImported->EditValue ?>"<?php echo $pharmacy_products_add->IsImported->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IsImported->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FileName->Visible) { // FileName ?>
	<div id="r_FileName" class="form-group row">
		<label id="elh_pharmacy_products_FileName" for="x_FileName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FileName->caption() ?><?php echo $pharmacy_products_add->FileName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FileName->cellAttributes() ?>>
<span id="el_pharmacy_products_FileName">
<input type="text" data-table="pharmacy_products" data-field="x_FileName" name="x_FileName" id="x_FileName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FileName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FileName->EditValue ?>"<?php echo $pharmacy_products_add->FileName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->FileName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LPName->Visible) { // LPName ?>
	<div id="r_LPName" class="form-group row">
		<label id="elh_pharmacy_products_LPName" for="x_LPName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LPName->caption() ?><?php echo $pharmacy_products_add->LPName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LPName->cellAttributes() ?>>
<span id="el_pharmacy_products_LPName">
<textarea data-table="pharmacy_products" data-field="x_LPName" name="x_LPName" id="x_LPName" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LPName->getPlaceHolder()) ?>"<?php echo $pharmacy_products_add->LPName->editAttributes() ?>><?php echo $pharmacy_products_add->LPName->EditValue ?></textarea>
</span>
<?php echo $pharmacy_products_add->LPName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->GodownNumber->Visible) { // GodownNumber ?>
	<div id="r_GodownNumber" class="form-group row">
		<label id="elh_pharmacy_products_GodownNumber" for="x_GodownNumber" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->GodownNumber->caption() ?><?php echo $pharmacy_products_add->GodownNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->GodownNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_GodownNumber">
<input type="text" data-table="pharmacy_products" data-field="x_GodownNumber" name="x_GodownNumber" id="x_GodownNumber" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->GodownNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->GodownNumber->EditValue ?>"<?php echo $pharmacy_products_add->GodownNumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->GodownNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CreationDate->Visible) { // CreationDate ?>
	<div id="r_CreationDate" class="form-group row">
		<label id="elh_pharmacy_products_CreationDate" for="x_CreationDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CreationDate->caption() ?><?php echo $pharmacy_products_add->CreationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CreationDate->cellAttributes() ?>>
<span id="el_pharmacy_products_CreationDate">
<input type="text" data-table="pharmacy_products" data-field="x_CreationDate" name="x_CreationDate" id="x_CreationDate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CreationDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CreationDate->EditValue ?>"<?php echo $pharmacy_products_add->CreationDate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->CreationDate->ReadOnly && !$pharmacy_products_add->CreationDate->Disabled && !isset($pharmacy_products_add->CreationDate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->CreationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_CreationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->CreationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CreatedbyUser->Visible) { // CreatedbyUser ?>
	<div id="r_CreatedbyUser" class="form-group row">
		<label id="elh_pharmacy_products_CreatedbyUser" for="x_CreatedbyUser" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CreatedbyUser->caption() ?><?php echo $pharmacy_products_add->CreatedbyUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CreatedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_CreatedbyUser">
<input type="text" data-table="pharmacy_products" data-field="x_CreatedbyUser" name="x_CreatedbyUser" id="x_CreatedbyUser" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CreatedbyUser->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CreatedbyUser->EditValue ?>"<?php echo $pharmacy_products_add->CreatedbyUser->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CreatedbyUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ModifiedDate->Visible) { // ModifiedDate ?>
	<div id="r_ModifiedDate" class="form-group row">
		<label id="elh_pharmacy_products_ModifiedDate" for="x_ModifiedDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ModifiedDate->caption() ?><?php echo $pharmacy_products_add->ModifiedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ModifiedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedDate">
<input type="text" data-table="pharmacy_products" data-field="x_ModifiedDate" name="x_ModifiedDate" id="x_ModifiedDate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ModifiedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ModifiedDate->EditValue ?>"<?php echo $pharmacy_products_add->ModifiedDate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->ModifiedDate->ReadOnly && !$pharmacy_products_add->ModifiedDate->Disabled && !isset($pharmacy_products_add->ModifiedDate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->ModifiedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_ModifiedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->ModifiedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
	<div id="r_ModifiedbyUser" class="form-group row">
		<label id="elh_pharmacy_products_ModifiedbyUser" for="x_ModifiedbyUser" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ModifiedbyUser->caption() ?><?php echo $pharmacy_products_add->ModifiedbyUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ModifiedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedbyUser">
<input type="text" data-table="pharmacy_products" data-field="x_ModifiedbyUser" name="x_ModifiedbyUser" id="x_ModifiedbyUser" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ModifiedbyUser->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ModifiedbyUser->EditValue ?>"<?php echo $pharmacy_products_add->ModifiedbyUser->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ModifiedbyUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->isActive->Visible) { // isActive ?>
	<div id="r_isActive" class="form-group row">
		<label id="elh_pharmacy_products_isActive" for="x_isActive" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->isActive->caption() ?><?php echo $pharmacy_products_add->isActive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->isActive->cellAttributes() ?>>
<span id="el_pharmacy_products_isActive">
<input type="text" data-table="pharmacy_products" data-field="x_isActive" name="x_isActive" id="x_isActive" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->isActive->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->isActive->EditValue ?>"<?php echo $pharmacy_products_add->isActive->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->isActive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
	<div id="r_AllowExpiryClaim" class="form-group row">
		<label id="elh_pharmacy_products_AllowExpiryClaim" for="x_AllowExpiryClaim" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AllowExpiryClaim->caption() ?><?php echo $pharmacy_products_add->AllowExpiryClaim->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AllowExpiryClaim->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryClaim">
<input type="text" data-table="pharmacy_products" data-field="x_AllowExpiryClaim" name="x_AllowExpiryClaim" id="x_AllowExpiryClaim" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AllowExpiryClaim->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AllowExpiryClaim->EditValue ?>"<?php echo $pharmacy_products_add->AllowExpiryClaim->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AllowExpiryClaim->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BrandCode->Visible) { // BrandCode ?>
	<div id="r_BrandCode" class="form-group row">
		<label id="elh_pharmacy_products_BrandCode" for="x_BrandCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BrandCode->caption() ?><?php echo $pharmacy_products_add->BrandCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BrandCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BrandCode">
<input type="text" data-table="pharmacy_products" data-field="x_BrandCode" name="x_BrandCode" id="x_BrandCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BrandCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BrandCode->EditValue ?>"<?php echo $pharmacy_products_add->BrandCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BrandCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
	<div id="r_FreeSchemeBasedon" class="form-group row">
		<label id="elh_pharmacy_products_FreeSchemeBasedon" for="x_FreeSchemeBasedon" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FreeSchemeBasedon->caption() ?><?php echo $pharmacy_products_add->FreeSchemeBasedon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeSchemeBasedon">
<input type="text" data-table="pharmacy_products" data-field="x_FreeSchemeBasedon" name="x_FreeSchemeBasedon" id="x_FreeSchemeBasedon" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FreeSchemeBasedon->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FreeSchemeBasedon->EditValue ?>"<?php echo $pharmacy_products_add->FreeSchemeBasedon->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->FreeSchemeBasedon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
	<div id="r_DoNotCheckCostInBill" class="form-group row">
		<label id="elh_pharmacy_products_DoNotCheckCostInBill" for="x_DoNotCheckCostInBill" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DoNotCheckCostInBill->caption() ?><?php echo $pharmacy_products_add->DoNotCheckCostInBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckCostInBill">
<input type="text" data-table="pharmacy_products" data-field="x_DoNotCheckCostInBill" name="x_DoNotCheckCostInBill" id="x_DoNotCheckCostInBill" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DoNotCheckCostInBill->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DoNotCheckCostInBill->EditValue ?>"<?php echo $pharmacy_products_add->DoNotCheckCostInBill->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DoNotCheckCostInBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductGroupCode->Visible) { // ProductGroupCode ?>
	<div id="r_ProductGroupCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductGroupCode" for="x_ProductGroupCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductGroupCode->caption() ?><?php echo $pharmacy_products_add->ProductGroupCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductGroupCode">
<input type="text" data-table="pharmacy_products" data-field="x_ProductGroupCode" name="x_ProductGroupCode" id="x_ProductGroupCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductGroupCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductGroupCode->EditValue ?>"<?php echo $pharmacy_products_add->ProductGroupCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductGroupCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
	<div id="r_ProductStrengthCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductStrengthCode" for="x_ProductStrengthCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductStrengthCode->caption() ?><?php echo $pharmacy_products_add->ProductStrengthCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductStrengthCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductStrengthCode">
<input type="text" data-table="pharmacy_products" data-field="x_ProductStrengthCode" name="x_ProductStrengthCode" id="x_ProductStrengthCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductStrengthCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductStrengthCode->EditValue ?>"<?php echo $pharmacy_products_add->ProductStrengthCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductStrengthCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PackingCode->Visible) { // PackingCode ?>
	<div id="r_PackingCode" class="form-group row">
		<label id="elh_pharmacy_products_PackingCode" for="x_PackingCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PackingCode->caption() ?><?php echo $pharmacy_products_add->PackingCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PackingCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PackingCode">
<input type="text" data-table="pharmacy_products" data-field="x_PackingCode" name="x_PackingCode" id="x_PackingCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PackingCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PackingCode->EditValue ?>"<?php echo $pharmacy_products_add->PackingCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PackingCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ComputedMinStock->Visible) { // ComputedMinStock ?>
	<div id="r_ComputedMinStock" class="form-group row">
		<label id="elh_pharmacy_products_ComputedMinStock" for="x_ComputedMinStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ComputedMinStock->caption() ?><?php echo $pharmacy_products_add->ComputedMinStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ComputedMinStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMinStock">
<input type="text" data-table="pharmacy_products" data-field="x_ComputedMinStock" name="x_ComputedMinStock" id="x_ComputedMinStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ComputedMinStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ComputedMinStock->EditValue ?>"<?php echo $pharmacy_products_add->ComputedMinStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ComputedMinStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
	<div id="r_ComputedMaxStock" class="form-group row">
		<label id="elh_pharmacy_products_ComputedMaxStock" for="x_ComputedMaxStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ComputedMaxStock->caption() ?><?php echo $pharmacy_products_add->ComputedMaxStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ComputedMaxStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMaxStock">
<input type="text" data-table="pharmacy_products" data-field="x_ComputedMaxStock" name="x_ComputedMaxStock" id="x_ComputedMaxStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ComputedMaxStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ComputedMaxStock->EditValue ?>"<?php echo $pharmacy_products_add->ComputedMaxStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ComputedMaxStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductRemark->Visible) { // ProductRemark ?>
	<div id="r_ProductRemark" class="form-group row">
		<label id="elh_pharmacy_products_ProductRemark" for="x_ProductRemark" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductRemark->caption() ?><?php echo $pharmacy_products_add->ProductRemark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductRemark->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductRemark">
<input type="text" data-table="pharmacy_products" data-field="x_ProductRemark" name="x_ProductRemark" id="x_ProductRemark" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductRemark->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductRemark->EditValue ?>"<?php echo $pharmacy_products_add->ProductRemark->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductRemark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductDrugCode->Visible) { // ProductDrugCode ?>
	<div id="r_ProductDrugCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductDrugCode" for="x_ProductDrugCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductDrugCode->caption() ?><?php echo $pharmacy_products_add->ProductDrugCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductDrugCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDrugCode">
<input type="text" data-table="pharmacy_products" data-field="x_ProductDrugCode" name="x_ProductDrugCode" id="x_ProductDrugCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductDrugCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductDrugCode->EditValue ?>"<?php echo $pharmacy_products_add->ProductDrugCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductDrugCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
	<div id="r_IsMatrixProduct" class="form-group row">
		<label id="elh_pharmacy_products_IsMatrixProduct" for="x_IsMatrixProduct" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IsMatrixProduct->caption() ?><?php echo $pharmacy_products_add->IsMatrixProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IsMatrixProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMatrixProduct">
<input type="text" data-table="pharmacy_products" data-field="x_IsMatrixProduct" name="x_IsMatrixProduct" id="x_IsMatrixProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IsMatrixProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IsMatrixProduct->EditValue ?>"<?php echo $pharmacy_products_add->IsMatrixProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IsMatrixProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount1->Visible) { // AttributeCount1 ?>
	<div id="r_AttributeCount1" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount1" for="x_AttributeCount1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount1->caption() ?><?php echo $pharmacy_products_add->AttributeCount1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount1->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount1">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount1" name="x_AttributeCount1" id="x_AttributeCount1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount1->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount2->Visible) { // AttributeCount2 ?>
	<div id="r_AttributeCount2" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount2" for="x_AttributeCount2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount2->caption() ?><?php echo $pharmacy_products_add->AttributeCount2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount2->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount2">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount2" name="x_AttributeCount2" id="x_AttributeCount2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount2->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount3->Visible) { // AttributeCount3 ?>
	<div id="r_AttributeCount3" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount3" for="x_AttributeCount3" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount3->caption() ?><?php echo $pharmacy_products_add->AttributeCount3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount3->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount3">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount3" name="x_AttributeCount3" id="x_AttributeCount3" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount3->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount3->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount4->Visible) { // AttributeCount4 ?>
	<div id="r_AttributeCount4" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount4" for="x_AttributeCount4" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount4->caption() ?><?php echo $pharmacy_products_add->AttributeCount4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount4->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount4">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount4" name="x_AttributeCount4" id="x_AttributeCount4" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount4->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount4->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount4->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount5->Visible) { // AttributeCount5 ?>
	<div id="r_AttributeCount5" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount5" for="x_AttributeCount5" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount5->caption() ?><?php echo $pharmacy_products_add->AttributeCount5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount5->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount5">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount5" name="x_AttributeCount5" id="x_AttributeCount5" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount5->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount5->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount5->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
	<div id="r_DefaultDiscountPercentage" class="form-group row">
		<label id="elh_pharmacy_products_DefaultDiscountPercentage" for="x_DefaultDiscountPercentage" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DefaultDiscountPercentage->caption() ?><?php echo $pharmacy_products_add->DefaultDiscountPercentage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultDiscountPercentage">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultDiscountPercentage" name="x_DefaultDiscountPercentage" id="x_DefaultDiscountPercentage" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DefaultDiscountPercentage->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DefaultDiscountPercentage->EditValue ?>"<?php echo $pharmacy_products_add->DefaultDiscountPercentage->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DefaultDiscountPercentage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
	<div id="r_DonotPrintBarcode" class="form-group row">
		<label id="elh_pharmacy_products_DonotPrintBarcode" for="x_DonotPrintBarcode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DonotPrintBarcode->caption() ?><?php echo $pharmacy_products_add->DonotPrintBarcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DonotPrintBarcode->cellAttributes() ?>>
<span id="el_pharmacy_products_DonotPrintBarcode">
<input type="text" data-table="pharmacy_products" data-field="x_DonotPrintBarcode" name="x_DonotPrintBarcode" id="x_DonotPrintBarcode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DonotPrintBarcode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DonotPrintBarcode->EditValue ?>"<?php echo $pharmacy_products_add->DonotPrintBarcode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DonotPrintBarcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
	<div id="r_ProductLevelDiscount" class="form-group row">
		<label id="elh_pharmacy_products_ProductLevelDiscount" for="x_ProductLevelDiscount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductLevelDiscount->caption() ?><?php echo $pharmacy_products_add->ProductLevelDiscount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductLevelDiscount->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLevelDiscount">
<input type="text" data-table="pharmacy_products" data-field="x_ProductLevelDiscount" name="x_ProductLevelDiscount" id="x_ProductLevelDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductLevelDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductLevelDiscount->EditValue ?>"<?php echo $pharmacy_products_add->ProductLevelDiscount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductLevelDiscount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Markup->Visible) { // Markup ?>
	<div id="r_Markup" class="form-group row">
		<label id="elh_pharmacy_products_Markup" for="x_Markup" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Markup->caption() ?><?php echo $pharmacy_products_add->Markup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Markup->cellAttributes() ?>>
<span id="el_pharmacy_products_Markup">
<input type="text" data-table="pharmacy_products" data-field="x_Markup" name="x_Markup" id="x_Markup" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Markup->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Markup->EditValue ?>"<?php echo $pharmacy_products_add->Markup->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Markup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MarkDown->Visible) { // MarkDown ?>
	<div id="r_MarkDown" class="form-group row">
		<label id="elh_pharmacy_products_MarkDown" for="x_MarkDown" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MarkDown->caption() ?><?php echo $pharmacy_products_add->MarkDown->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MarkDown->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDown">
<input type="text" data-table="pharmacy_products" data-field="x_MarkDown" name="x_MarkDown" id="x_MarkDown" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MarkDown->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MarkDown->EditValue ?>"<?php echo $pharmacy_products_add->MarkDown->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MarkDown->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
	<div id="r_ReworkSalePrice" class="form-group row">
		<label id="elh_pharmacy_products_ReworkSalePrice" for="x_ReworkSalePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ReworkSalePrice->caption() ?><?php echo $pharmacy_products_add->ReworkSalePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ReworkSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_ReworkSalePrice">
<input type="text" data-table="pharmacy_products" data-field="x_ReworkSalePrice" name="x_ReworkSalePrice" id="x_ReworkSalePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ReworkSalePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ReworkSalePrice->EditValue ?>"<?php echo $pharmacy_products_add->ReworkSalePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ReworkSalePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MultipleInput->Visible) { // MultipleInput ?>
	<div id="r_MultipleInput" class="form-group row">
		<label id="elh_pharmacy_products_MultipleInput" for="x_MultipleInput" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MultipleInput->caption() ?><?php echo $pharmacy_products_add->MultipleInput->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MultipleInput->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleInput">
<input type="text" data-table="pharmacy_products" data-field="x_MultipleInput" name="x_MultipleInput" id="x_MultipleInput" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MultipleInput->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MultipleInput->EditValue ?>"<?php echo $pharmacy_products_add->MultipleInput->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MultipleInput->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LpPackageInformation->Visible) { // LpPackageInformation ?>
	<div id="r_LpPackageInformation" class="form-group row">
		<label id="elh_pharmacy_products_LpPackageInformation" for="x_LpPackageInformation" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LpPackageInformation->caption() ?><?php echo $pharmacy_products_add->LpPackageInformation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LpPackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_LpPackageInformation">
<input type="text" data-table="pharmacy_products" data-field="x_LpPackageInformation" name="x_LpPackageInformation" id="x_LpPackageInformation" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LpPackageInformation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->LpPackageInformation->EditValue ?>"<?php echo $pharmacy_products_add->LpPackageInformation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->LpPackageInformation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
	<div id="r_AllowNegativeStock" class="form-group row">
		<label id="elh_pharmacy_products_AllowNegativeStock" for="x_AllowNegativeStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AllowNegativeStock->caption() ?><?php echo $pharmacy_products_add->AllowNegativeStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AllowNegativeStock->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowNegativeStock">
<input type="text" data-table="pharmacy_products" data-field="x_AllowNegativeStock" name="x_AllowNegativeStock" id="x_AllowNegativeStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AllowNegativeStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AllowNegativeStock->EditValue ?>"<?php echo $pharmacy_products_add->AllowNegativeStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AllowNegativeStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->OrderDate->Visible) { // OrderDate ?>
	<div id="r_OrderDate" class="form-group row">
		<label id="elh_pharmacy_products_OrderDate" for="x_OrderDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->OrderDate->caption() ?><?php echo $pharmacy_products_add->OrderDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->OrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderDate">
<input type="text" data-table="pharmacy_products" data-field="x_OrderDate" name="x_OrderDate" id="x_OrderDate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->OrderDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->OrderDate->EditValue ?>"<?php echo $pharmacy_products_add->OrderDate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->OrderDate->ReadOnly && !$pharmacy_products_add->OrderDate->Disabled && !isset($pharmacy_products_add->OrderDate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->OrderDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_OrderDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->OrderDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->OrderTime->Visible) { // OrderTime ?>
	<div id="r_OrderTime" class="form-group row">
		<label id="elh_pharmacy_products_OrderTime" for="x_OrderTime" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->OrderTime->caption() ?><?php echo $pharmacy_products_add->OrderTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->OrderTime->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderTime">
<input type="text" data-table="pharmacy_products" data-field="x_OrderTime" name="x_OrderTime" id="x_OrderTime" placeholder="<?php echo HtmlEncode($pharmacy_products_add->OrderTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->OrderTime->EditValue ?>"<?php echo $pharmacy_products_add->OrderTime->editAttributes() ?>>
<?php if (!$pharmacy_products_add->OrderTime->ReadOnly && !$pharmacy_products_add->OrderTime->Disabled && !isset($pharmacy_products_add->OrderTime->EditAttrs["readonly"]) && !isset($pharmacy_products_add->OrderTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_OrderTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->OrderTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->RateGroupCode->Visible) { // RateGroupCode ?>
	<div id="r_RateGroupCode" class="form-group row">
		<label id="elh_pharmacy_products_RateGroupCode" for="x_RateGroupCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->RateGroupCode->caption() ?><?php echo $pharmacy_products_add->RateGroupCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->RateGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RateGroupCode">
<input type="text" data-table="pharmacy_products" data-field="x_RateGroupCode" name="x_RateGroupCode" id="x_RateGroupCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->RateGroupCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->RateGroupCode->EditValue ?>"<?php echo $pharmacy_products_add->RateGroupCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->RateGroupCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
	<div id="r_ConversionCaseLot" class="form-group row">
		<label id="elh_pharmacy_products_ConversionCaseLot" for="x_ConversionCaseLot" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ConversionCaseLot->caption() ?><?php echo $pharmacy_products_add->ConversionCaseLot->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ConversionCaseLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ConversionCaseLot">
<input type="text" data-table="pharmacy_products" data-field="x_ConversionCaseLot" name="x_ConversionCaseLot" id="x_ConversionCaseLot" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ConversionCaseLot->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ConversionCaseLot->EditValue ?>"<?php echo $pharmacy_products_add->ConversionCaseLot->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ConversionCaseLot->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ShippingLot->Visible) { // ShippingLot ?>
	<div id="r_ShippingLot" class="form-group row">
		<label id="elh_pharmacy_products_ShippingLot" for="x_ShippingLot" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ShippingLot->caption() ?><?php echo $pharmacy_products_add->ShippingLot->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ShippingLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ShippingLot">
<input type="text" data-table="pharmacy_products" data-field="x_ShippingLot" name="x_ShippingLot" id="x_ShippingLot" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ShippingLot->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ShippingLot->EditValue ?>"<?php echo $pharmacy_products_add->ShippingLot->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ShippingLot->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
	<div id="r_AllowExpiryReplacement" class="form-group row">
		<label id="elh_pharmacy_products_AllowExpiryReplacement" for="x_AllowExpiryReplacement" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AllowExpiryReplacement->caption() ?><?php echo $pharmacy_products_add->AllowExpiryReplacement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryReplacement">
<input type="text" data-table="pharmacy_products" data-field="x_AllowExpiryReplacement" name="x_AllowExpiryReplacement" id="x_AllowExpiryReplacement" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AllowExpiryReplacement->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AllowExpiryReplacement->EditValue ?>"<?php echo $pharmacy_products_add->AllowExpiryReplacement->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AllowExpiryReplacement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
	<div id="r_NoOfMonthExpiryAllowed" class="form-group row">
		<label id="elh_pharmacy_products_NoOfMonthExpiryAllowed" for="x_NoOfMonthExpiryAllowed" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->NoOfMonthExpiryAllowed->caption() ?><?php echo $pharmacy_products_add->NoOfMonthExpiryAllowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el_pharmacy_products_NoOfMonthExpiryAllowed">
<input type="text" data-table="pharmacy_products" data-field="x_NoOfMonthExpiryAllowed" name="x_NoOfMonthExpiryAllowed" id="x_NoOfMonthExpiryAllowed" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->NoOfMonthExpiryAllowed->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->NoOfMonthExpiryAllowed->EditValue ?>"<?php echo $pharmacy_products_add->NoOfMonthExpiryAllowed->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->NoOfMonthExpiryAllowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
	<div id="r_ProductDiscountEligibility" class="form-group row">
		<label id="elh_pharmacy_products_ProductDiscountEligibility" for="x_ProductDiscountEligibility" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductDiscountEligibility->caption() ?><?php echo $pharmacy_products_add->ProductDiscountEligibility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDiscountEligibility">
<input type="text" data-table="pharmacy_products" data-field="x_ProductDiscountEligibility" name="x_ProductDiscountEligibility" id="x_ProductDiscountEligibility" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductDiscountEligibility->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductDiscountEligibility->EditValue ?>"<?php echo $pharmacy_products_add->ProductDiscountEligibility->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductDiscountEligibility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
	<div id="r_ScheduleTypeCode" class="form-group row">
		<label id="elh_pharmacy_products_ScheduleTypeCode" for="x_ScheduleTypeCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ScheduleTypeCode->caption() ?><?php echo $pharmacy_products_add->ScheduleTypeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ScheduleTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleTypeCode">
<input type="text" data-table="pharmacy_products" data-field="x_ScheduleTypeCode" name="x_ScheduleTypeCode" id="x_ScheduleTypeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ScheduleTypeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ScheduleTypeCode->EditValue ?>"<?php echo $pharmacy_products_add->ScheduleTypeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ScheduleTypeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
	<div id="r_AIOCDProductCode" class="form-group row">
		<label id="elh_pharmacy_products_AIOCDProductCode" for="x_AIOCDProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AIOCDProductCode->caption() ?><?php echo $pharmacy_products_add->AIOCDProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AIOCDProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AIOCDProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_AIOCDProductCode" name="x_AIOCDProductCode" id="x_AIOCDProductCode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AIOCDProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AIOCDProductCode->EditValue ?>"<?php echo $pharmacy_products_add->AIOCDProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AIOCDProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FreeQuantity->Visible) { // FreeQuantity ?>
	<div id="r_FreeQuantity" class="form-group row">
		<label id="elh_pharmacy_products_FreeQuantity" for="x_FreeQuantity" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FreeQuantity->caption() ?><?php echo $pharmacy_products_add->FreeQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FreeQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeQuantity">
<input type="text" data-table="pharmacy_products" data-field="x_FreeQuantity" name="x_FreeQuantity" id="x_FreeQuantity" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FreeQuantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FreeQuantity->EditValue ?>"<?php echo $pharmacy_products_add->FreeQuantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->FreeQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DiscountType->Visible) { // DiscountType ?>
	<div id="r_DiscountType" class="form-group row">
		<label id="elh_pharmacy_products_DiscountType" for="x_DiscountType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DiscountType->caption() ?><?php echo $pharmacy_products_add->DiscountType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DiscountType->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountType">
<input type="text" data-table="pharmacy_products" data-field="x_DiscountType" name="x_DiscountType" id="x_DiscountType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DiscountType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DiscountType->EditValue ?>"<?php echo $pharmacy_products_add->DiscountType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DiscountType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DiscountValue->Visible) { // DiscountValue ?>
	<div id="r_DiscountValue" class="form-group row">
		<label id="elh_pharmacy_products_DiscountValue" for="x_DiscountValue" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DiscountValue->caption() ?><?php echo $pharmacy_products_add->DiscountValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DiscountValue->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountValue">
<input type="text" data-table="pharmacy_products" data-field="x_DiscountValue" name="x_DiscountValue" id="x_DiscountValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DiscountValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DiscountValue->EditValue ?>"<?php echo $pharmacy_products_add->DiscountValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DiscountValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
	<div id="r_HasProductOrderAttribute" class="form-group row">
		<label id="elh_pharmacy_products_HasProductOrderAttribute" for="x_HasProductOrderAttribute" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->HasProductOrderAttribute->caption() ?><?php echo $pharmacy_products_add->HasProductOrderAttribute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el_pharmacy_products_HasProductOrderAttribute">
<input type="text" data-table="pharmacy_products" data-field="x_HasProductOrderAttribute" name="x_HasProductOrderAttribute" id="x_HasProductOrderAttribute" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->HasProductOrderAttribute->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->HasProductOrderAttribute->EditValue ?>"<?php echo $pharmacy_products_add->HasProductOrderAttribute->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->HasProductOrderAttribute->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FirstPODate->Visible) { // FirstPODate ?>
	<div id="r_FirstPODate" class="form-group row">
		<label id="elh_pharmacy_products_FirstPODate" for="x_FirstPODate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FirstPODate->caption() ?><?php echo $pharmacy_products_add->FirstPODate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FirstPODate->cellAttributes() ?>>
<span id="el_pharmacy_products_FirstPODate">
<input type="text" data-table="pharmacy_products" data-field="x_FirstPODate" name="x_FirstPODate" id="x_FirstPODate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FirstPODate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FirstPODate->EditValue ?>"<?php echo $pharmacy_products_add->FirstPODate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->FirstPODate->ReadOnly && !$pharmacy_products_add->FirstPODate->Disabled && !isset($pharmacy_products_add->FirstPODate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->FirstPODate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_FirstPODate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->FirstPODate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
	<div id="r_SaleprcieAndMrpCalcPercent" class="form-group row">
		<label id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" for="x_SaleprcieAndMrpCalcPercent" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SaleprcieAndMrpCalcPercent->caption() ?><?php echo $pharmacy_products_add->SaleprcieAndMrpCalcPercent->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleprcieAndMrpCalcPercent">
<input type="text" data-table="pharmacy_products" data-field="x_SaleprcieAndMrpCalcPercent" name="x_SaleprcieAndMrpCalcPercent" id="x_SaleprcieAndMrpCalcPercent" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SaleprcieAndMrpCalcPercent->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SaleprcieAndMrpCalcPercent->EditValue ?>"<?php echo $pharmacy_products_add->SaleprcieAndMrpCalcPercent->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SaleprcieAndMrpCalcPercent->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
	<div id="r_IsGiftVoucherProducts" class="form-group row">
		<label id="elh_pharmacy_products_IsGiftVoucherProducts" for="x_IsGiftVoucherProducts" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IsGiftVoucherProducts->caption() ?><?php echo $pharmacy_products_add->IsGiftVoucherProducts->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_IsGiftVoucherProducts">
<input type="text" data-table="pharmacy_products" data-field="x_IsGiftVoucherProducts" name="x_IsGiftVoucherProducts" id="x_IsGiftVoucherProducts" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IsGiftVoucherProducts->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IsGiftVoucherProducts->EditValue ?>"<?php echo $pharmacy_products_add->IsGiftVoucherProducts->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IsGiftVoucherProducts->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
	<div id="r_AcceptRange4SerialNumber" class="form-group row">
		<label id="elh_pharmacy_products_AcceptRange4SerialNumber" for="x_AcceptRange4SerialNumber" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AcceptRange4SerialNumber->caption() ?><?php echo $pharmacy_products_add->AcceptRange4SerialNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRange4SerialNumber">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptRange4SerialNumber" name="x_AcceptRange4SerialNumber" id="x_AcceptRange4SerialNumber" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AcceptRange4SerialNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AcceptRange4SerialNumber->EditValue ?>"<?php echo $pharmacy_products_add->AcceptRange4SerialNumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AcceptRange4SerialNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
	<div id="r_GiftVoucherDenomination" class="form-group row">
		<label id="elh_pharmacy_products_GiftVoucherDenomination" for="x_GiftVoucherDenomination" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->GiftVoucherDenomination->caption() ?><?php echo $pharmacy_products_add->GiftVoucherDenomination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftVoucherDenomination">
<input type="text" data-table="pharmacy_products" data-field="x_GiftVoucherDenomination" name="x_GiftVoucherDenomination" id="x_GiftVoucherDenomination" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->GiftVoucherDenomination->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->GiftVoucherDenomination->EditValue ?>"<?php echo $pharmacy_products_add->GiftVoucherDenomination->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->GiftVoucherDenomination->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Subclasscode->Visible) { // Subclasscode ?>
	<div id="r_Subclasscode" class="form-group row">
		<label id="elh_pharmacy_products_Subclasscode" for="x_Subclasscode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Subclasscode->caption() ?><?php echo $pharmacy_products_add->Subclasscode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Subclasscode->cellAttributes() ?>>
<span id="el_pharmacy_products_Subclasscode">
<input type="text" data-table="pharmacy_products" data-field="x_Subclasscode" name="x_Subclasscode" id="x_Subclasscode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Subclasscode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Subclasscode->EditValue ?>"<?php echo $pharmacy_products_add->Subclasscode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Subclasscode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
	<div id="r_BarCodeFromWeighingMachine" class="form-group row">
		<label id="elh_pharmacy_products_BarCodeFromWeighingMachine" for="x_BarCodeFromWeighingMachine" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BarCodeFromWeighingMachine->caption() ?><?php echo $pharmacy_products_add->BarCodeFromWeighingMachine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeFromWeighingMachine">
<input type="text" data-table="pharmacy_products" data-field="x_BarCodeFromWeighingMachine" name="x_BarCodeFromWeighingMachine" id="x_BarCodeFromWeighingMachine" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BarCodeFromWeighingMachine->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BarCodeFromWeighingMachine->EditValue ?>"<?php echo $pharmacy_products_add->BarCodeFromWeighingMachine->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BarCodeFromWeighingMachine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
	<div id="r_CheckCostInReturn" class="form-group row">
		<label id="elh_pharmacy_products_CheckCostInReturn" for="x_CheckCostInReturn" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CheckCostInReturn->caption() ?><?php echo $pharmacy_products_add->CheckCostInReturn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CheckCostInReturn->cellAttributes() ?>>
<span id="el_pharmacy_products_CheckCostInReturn">
<input type="text" data-table="pharmacy_products" data-field="x_CheckCostInReturn" name="x_CheckCostInReturn" id="x_CheckCostInReturn" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CheckCostInReturn->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CheckCostInReturn->EditValue ?>"<?php echo $pharmacy_products_add->CheckCostInReturn->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CheckCostInReturn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
	<div id="r_FrequentSaleProduct" class="form-group row">
		<label id="elh_pharmacy_products_FrequentSaleProduct" for="x_FrequentSaleProduct" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FrequentSaleProduct->caption() ?><?php echo $pharmacy_products_add->FrequentSaleProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FrequentSaleProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_FrequentSaleProduct">
<input type="text" data-table="pharmacy_products" data-field="x_FrequentSaleProduct" name="x_FrequentSaleProduct" id="x_FrequentSaleProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FrequentSaleProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FrequentSaleProduct->EditValue ?>"<?php echo $pharmacy_products_add->FrequentSaleProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->FrequentSaleProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->RateType->Visible) { // RateType ?>
	<div id="r_RateType" class="form-group row">
		<label id="elh_pharmacy_products_RateType" for="x_RateType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->RateType->caption() ?><?php echo $pharmacy_products_add->RateType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->RateType->cellAttributes() ?>>
<span id="el_pharmacy_products_RateType">
<input type="text" data-table="pharmacy_products" data-field="x_RateType" name="x_RateType" id="x_RateType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->RateType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->RateType->EditValue ?>"<?php echo $pharmacy_products_add->RateType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->RateType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TouchscreenName->Visible) { // TouchscreenName ?>
	<div id="r_TouchscreenName" class="form-group row">
		<label id="elh_pharmacy_products_TouchscreenName" for="x_TouchscreenName" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TouchscreenName->caption() ?><?php echo $pharmacy_products_add->TouchscreenName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TouchscreenName->cellAttributes() ?>>
<span id="el_pharmacy_products_TouchscreenName">
<input type="text" data-table="pharmacy_products" data-field="x_TouchscreenName" name="x_TouchscreenName" id="x_TouchscreenName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TouchscreenName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TouchscreenName->EditValue ?>"<?php echo $pharmacy_products_add->TouchscreenName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TouchscreenName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FreeType->Visible) { // FreeType ?>
	<div id="r_FreeType" class="form-group row">
		<label id="elh_pharmacy_products_FreeType" for="x_FreeType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FreeType->caption() ?><?php echo $pharmacy_products_add->FreeType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FreeType->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeType">
<input type="text" data-table="pharmacy_products" data-field="x_FreeType" name="x_FreeType" id="x_FreeType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FreeType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FreeType->EditValue ?>"<?php echo $pharmacy_products_add->FreeType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->FreeType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
	<div id="r_LooseQtyasNewBatch" class="form-group row">
		<label id="elh_pharmacy_products_LooseQtyasNewBatch" for="x_LooseQtyasNewBatch" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LooseQtyasNewBatch->caption() ?><?php echo $pharmacy_products_add->LooseQtyasNewBatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_LooseQtyasNewBatch">
<input type="text" data-table="pharmacy_products" data-field="x_LooseQtyasNewBatch" name="x_LooseQtyasNewBatch" id="x_LooseQtyasNewBatch" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LooseQtyasNewBatch->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->LooseQtyasNewBatch->EditValue ?>"<?php echo $pharmacy_products_add->LooseQtyasNewBatch->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->LooseQtyasNewBatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
	<div id="r_AllowSlabBilling" class="form-group row">
		<label id="elh_pharmacy_products_AllowSlabBilling" for="x_AllowSlabBilling" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AllowSlabBilling->caption() ?><?php echo $pharmacy_products_add->AllowSlabBilling->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AllowSlabBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowSlabBilling">
<input type="text" data-table="pharmacy_products" data-field="x_AllowSlabBilling" name="x_AllowSlabBilling" id="x_AllowSlabBilling" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AllowSlabBilling->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AllowSlabBilling->EditValue ?>"<?php echo $pharmacy_products_add->AllowSlabBilling->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AllowSlabBilling->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
	<div id="r_ProductTypeForProduction" class="form-group row">
		<label id="elh_pharmacy_products_ProductTypeForProduction" for="x_ProductTypeForProduction" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductTypeForProduction->caption() ?><?php echo $pharmacy_products_add->ProductTypeForProduction->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductTypeForProduction->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductTypeForProduction">
<input type="text" data-table="pharmacy_products" data-field="x_ProductTypeForProduction" name="x_ProductTypeForProduction" id="x_ProductTypeForProduction" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductTypeForProduction->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductTypeForProduction->EditValue ?>"<?php echo $pharmacy_products_add->ProductTypeForProduction->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductTypeForProduction->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->RecipeCode->Visible) { // RecipeCode ?>
	<div id="r_RecipeCode" class="form-group row">
		<label id="elh_pharmacy_products_RecipeCode" for="x_RecipeCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->RecipeCode->caption() ?><?php echo $pharmacy_products_add->RecipeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->RecipeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RecipeCode">
<input type="text" data-table="pharmacy_products" data-field="x_RecipeCode" name="x_RecipeCode" id="x_RecipeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->RecipeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->RecipeCode->EditValue ?>"<?php echo $pharmacy_products_add->RecipeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->RecipeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DefaultUnitType->Visible) { // DefaultUnitType ?>
	<div id="r_DefaultUnitType" class="form-group row">
		<label id="elh_pharmacy_products_DefaultUnitType" for="x_DefaultUnitType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DefaultUnitType->caption() ?><?php echo $pharmacy_products_add->DefaultUnitType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DefaultUnitType->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultUnitType">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultUnitType" name="x_DefaultUnitType" id="x_DefaultUnitType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DefaultUnitType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DefaultUnitType->EditValue ?>"<?php echo $pharmacy_products_add->DefaultUnitType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DefaultUnitType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PIstatus->Visible) { // PIstatus ?>
	<div id="r_PIstatus" class="form-group row">
		<label id="elh_pharmacy_products_PIstatus" for="x_PIstatus" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PIstatus->caption() ?><?php echo $pharmacy_products_add->PIstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PIstatus->cellAttributes() ?>>
<span id="el_pharmacy_products_PIstatus">
<input type="text" data-table="pharmacy_products" data-field="x_PIstatus" name="x_PIstatus" id="x_PIstatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PIstatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PIstatus->EditValue ?>"<?php echo $pharmacy_products_add->PIstatus->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PIstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
	<div id="r_LastPiConfirmedDate" class="form-group row">
		<label id="elh_pharmacy_products_LastPiConfirmedDate" for="x_LastPiConfirmedDate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LastPiConfirmedDate->caption() ?><?php echo $pharmacy_products_add->LastPiConfirmedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPiConfirmedDate">
<input type="text" data-table="pharmacy_products" data-field="x_LastPiConfirmedDate" name="x_LastPiConfirmedDate" id="x_LastPiConfirmedDate" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LastPiConfirmedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->LastPiConfirmedDate->EditValue ?>"<?php echo $pharmacy_products_add->LastPiConfirmedDate->editAttributes() ?>>
<?php if (!$pharmacy_products_add->LastPiConfirmedDate->ReadOnly && !$pharmacy_products_add->LastPiConfirmedDate->Disabled && !isset($pharmacy_products_add->LastPiConfirmedDate->EditAttrs["readonly"]) && !isset($pharmacy_products_add->LastPiConfirmedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsadd", "x_LastPiConfirmedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_add->LastPiConfirmedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BarCodeDesign->Visible) { // BarCodeDesign ?>
	<div id="r_BarCodeDesign" class="form-group row">
		<label id="elh_pharmacy_products_BarCodeDesign" for="x_BarCodeDesign" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BarCodeDesign->caption() ?><?php echo $pharmacy_products_add->BarCodeDesign->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BarCodeDesign->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDesign">
<input type="text" data-table="pharmacy_products" data-field="x_BarCodeDesign" name="x_BarCodeDesign" id="x_BarCodeDesign" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BarCodeDesign->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BarCodeDesign->EditValue ?>"<?php echo $pharmacy_products_add->BarCodeDesign->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BarCodeDesign->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
	<div id="r_AcceptRemarksInBill" class="form-group row">
		<label id="elh_pharmacy_products_AcceptRemarksInBill" for="x_AcceptRemarksInBill" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AcceptRemarksInBill->caption() ?><?php echo $pharmacy_products_add->AcceptRemarksInBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRemarksInBill">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptRemarksInBill" name="x_AcceptRemarksInBill" id="x_AcceptRemarksInBill" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AcceptRemarksInBill->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AcceptRemarksInBill->EditValue ?>"<?php echo $pharmacy_products_add->AcceptRemarksInBill->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AcceptRemarksInBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Classification->Visible) { // Classification ?>
	<div id="r_Classification" class="form-group row">
		<label id="elh_pharmacy_products_Classification" for="x_Classification" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Classification->caption() ?><?php echo $pharmacy_products_add->Classification->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Classification->cellAttributes() ?>>
<span id="el_pharmacy_products_Classification">
<input type="text" data-table="pharmacy_products" data-field="x_Classification" name="x_Classification" id="x_Classification" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Classification->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Classification->EditValue ?>"<?php echo $pharmacy_products_add->Classification->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Classification->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TimeSlot->Visible) { // TimeSlot ?>
	<div id="r_TimeSlot" class="form-group row">
		<label id="elh_pharmacy_products_TimeSlot" for="x_TimeSlot" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TimeSlot->caption() ?><?php echo $pharmacy_products_add->TimeSlot->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TimeSlot->cellAttributes() ?>>
<span id="el_pharmacy_products_TimeSlot">
<input type="text" data-table="pharmacy_products" data-field="x_TimeSlot" name="x_TimeSlot" id="x_TimeSlot" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TimeSlot->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TimeSlot->EditValue ?>"<?php echo $pharmacy_products_add->TimeSlot->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TimeSlot->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IsBundle->Visible) { // IsBundle ?>
	<div id="r_IsBundle" class="form-group row">
		<label id="elh_pharmacy_products_IsBundle" for="x_IsBundle" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IsBundle->caption() ?><?php echo $pharmacy_products_add->IsBundle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IsBundle->cellAttributes() ?>>
<span id="el_pharmacy_products_IsBundle">
<input type="text" data-table="pharmacy_products" data-field="x_IsBundle" name="x_IsBundle" id="x_IsBundle" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IsBundle->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IsBundle->EditValue ?>"<?php echo $pharmacy_products_add->IsBundle->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IsBundle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ColorCode->Visible) { // ColorCode ?>
	<div id="r_ColorCode" class="form-group row">
		<label id="elh_pharmacy_products_ColorCode" for="x_ColorCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ColorCode->caption() ?><?php echo $pharmacy_products_add->ColorCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ColorCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ColorCode">
<input type="text" data-table="pharmacy_products" data-field="x_ColorCode" name="x_ColorCode" id="x_ColorCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ColorCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ColorCode->EditValue ?>"<?php echo $pharmacy_products_add->ColorCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ColorCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->GenderCode->Visible) { // GenderCode ?>
	<div id="r_GenderCode" class="form-group row">
		<label id="elh_pharmacy_products_GenderCode" for="x_GenderCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->GenderCode->caption() ?><?php echo $pharmacy_products_add->GenderCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->GenderCode->cellAttributes() ?>>
<span id="el_pharmacy_products_GenderCode">
<input type="text" data-table="pharmacy_products" data-field="x_GenderCode" name="x_GenderCode" id="x_GenderCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->GenderCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->GenderCode->EditValue ?>"<?php echo $pharmacy_products_add->GenderCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->GenderCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SizeCode->Visible) { // SizeCode ?>
	<div id="r_SizeCode" class="form-group row">
		<label id="elh_pharmacy_products_SizeCode" for="x_SizeCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SizeCode->caption() ?><?php echo $pharmacy_products_add->SizeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SizeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SizeCode">
<input type="text" data-table="pharmacy_products" data-field="x_SizeCode" name="x_SizeCode" id="x_SizeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SizeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SizeCode->EditValue ?>"<?php echo $pharmacy_products_add->SizeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SizeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->GiftCard->Visible) { // GiftCard ?>
	<div id="r_GiftCard" class="form-group row">
		<label id="elh_pharmacy_products_GiftCard" for="x_GiftCard" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->GiftCard->caption() ?><?php echo $pharmacy_products_add->GiftCard->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->GiftCard->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftCard">
<input type="text" data-table="pharmacy_products" data-field="x_GiftCard" name="x_GiftCard" id="x_GiftCard" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->GiftCard->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->GiftCard->EditValue ?>"<?php echo $pharmacy_products_add->GiftCard->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->GiftCard->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ToonLabel->Visible) { // ToonLabel ?>
	<div id="r_ToonLabel" class="form-group row">
		<label id="elh_pharmacy_products_ToonLabel" for="x_ToonLabel" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ToonLabel->caption() ?><?php echo $pharmacy_products_add->ToonLabel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ToonLabel->cellAttributes() ?>>
<span id="el_pharmacy_products_ToonLabel">
<input type="text" data-table="pharmacy_products" data-field="x_ToonLabel" name="x_ToonLabel" id="x_ToonLabel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ToonLabel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ToonLabel->EditValue ?>"<?php echo $pharmacy_products_add->ToonLabel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ToonLabel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->GarmentType->Visible) { // GarmentType ?>
	<div id="r_GarmentType" class="form-group row">
		<label id="elh_pharmacy_products_GarmentType" for="x_GarmentType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->GarmentType->caption() ?><?php echo $pharmacy_products_add->GarmentType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->GarmentType->cellAttributes() ?>>
<span id="el_pharmacy_products_GarmentType">
<input type="text" data-table="pharmacy_products" data-field="x_GarmentType" name="x_GarmentType" id="x_GarmentType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->GarmentType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->GarmentType->EditValue ?>"<?php echo $pharmacy_products_add->GarmentType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->GarmentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AgeGroup->Visible) { // AgeGroup ?>
	<div id="r_AgeGroup" class="form-group row">
		<label id="elh_pharmacy_products_AgeGroup" for="x_AgeGroup" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AgeGroup->caption() ?><?php echo $pharmacy_products_add->AgeGroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AgeGroup->cellAttributes() ?>>
<span id="el_pharmacy_products_AgeGroup">
<input type="text" data-table="pharmacy_products" data-field="x_AgeGroup" name="x_AgeGroup" id="x_AgeGroup" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AgeGroup->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AgeGroup->EditValue ?>"<?php echo $pharmacy_products_add->AgeGroup->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AgeGroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Season->Visible) { // Season ?>
	<div id="r_Season" class="form-group row">
		<label id="elh_pharmacy_products_Season" for="x_Season" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Season->caption() ?><?php echo $pharmacy_products_add->Season->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Season->cellAttributes() ?>>
<span id="el_pharmacy_products_Season">
<input type="text" data-table="pharmacy_products" data-field="x_Season" name="x_Season" id="x_Season" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Season->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Season->EditValue ?>"<?php echo $pharmacy_products_add->Season->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Season->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DailyStockEntry->Visible) { // DailyStockEntry ?>
	<div id="r_DailyStockEntry" class="form-group row">
		<label id="elh_pharmacy_products_DailyStockEntry" for="x_DailyStockEntry" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DailyStockEntry->caption() ?><?php echo $pharmacy_products_add->DailyStockEntry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DailyStockEntry->cellAttributes() ?>>
<span id="el_pharmacy_products_DailyStockEntry">
<input type="text" data-table="pharmacy_products" data-field="x_DailyStockEntry" name="x_DailyStockEntry" id="x_DailyStockEntry" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DailyStockEntry->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DailyStockEntry->EditValue ?>"<?php echo $pharmacy_products_add->DailyStockEntry->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DailyStockEntry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ModifierApplicable->Visible) { // ModifierApplicable ?>
	<div id="r_ModifierApplicable" class="form-group row">
		<label id="elh_pharmacy_products_ModifierApplicable" for="x_ModifierApplicable" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ModifierApplicable->caption() ?><?php echo $pharmacy_products_add->ModifierApplicable->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ModifierApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierApplicable">
<input type="text" data-table="pharmacy_products" data-field="x_ModifierApplicable" name="x_ModifierApplicable" id="x_ModifierApplicable" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ModifierApplicable->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ModifierApplicable->EditValue ?>"<?php echo $pharmacy_products_add->ModifierApplicable->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ModifierApplicable->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ModifierType->Visible) { // ModifierType ?>
	<div id="r_ModifierType" class="form-group row">
		<label id="elh_pharmacy_products_ModifierType" for="x_ModifierType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ModifierType->caption() ?><?php echo $pharmacy_products_add->ModifierType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ModifierType->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierType">
<input type="text" data-table="pharmacy_products" data-field="x_ModifierType" name="x_ModifierType" id="x_ModifierType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ModifierType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ModifierType->EditValue ?>"<?php echo $pharmacy_products_add->ModifierType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ModifierType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
	<div id="r_AcceptZeroRate" class="form-group row">
		<label id="elh_pharmacy_products_AcceptZeroRate" for="x_AcceptZeroRate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AcceptZeroRate->caption() ?><?php echo $pharmacy_products_add->AcceptZeroRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AcceptZeroRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptZeroRate">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptZeroRate" name="x_AcceptZeroRate" id="x_AcceptZeroRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AcceptZeroRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AcceptZeroRate->EditValue ?>"<?php echo $pharmacy_products_add->AcceptZeroRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AcceptZeroRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
	<div id="r_ExciseDutyCode" class="form-group row">
		<label id="elh_pharmacy_products_ExciseDutyCode" for="x_ExciseDutyCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ExciseDutyCode->caption() ?><?php echo $pharmacy_products_add->ExciseDutyCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ExciseDutyCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ExciseDutyCode">
<input type="text" data-table="pharmacy_products" data-field="x_ExciseDutyCode" name="x_ExciseDutyCode" id="x_ExciseDutyCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ExciseDutyCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ExciseDutyCode->EditValue ?>"<?php echo $pharmacy_products_add->ExciseDutyCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ExciseDutyCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
	<div id="r_IndentProductGroupCode" class="form-group row">
		<label id="elh_pharmacy_products_IndentProductGroupCode" for="x_IndentProductGroupCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IndentProductGroupCode->caption() ?><?php echo $pharmacy_products_add->IndentProductGroupCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IndentProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_IndentProductGroupCode">
<input type="text" data-table="pharmacy_products" data-field="x_IndentProductGroupCode" name="x_IndentProductGroupCode" id="x_IndentProductGroupCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IndentProductGroupCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IndentProductGroupCode->EditValue ?>"<?php echo $pharmacy_products_add->IndentProductGroupCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IndentProductGroupCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IsMultiBatch->Visible) { // IsMultiBatch ?>
	<div id="r_IsMultiBatch" class="form-group row">
		<label id="elh_pharmacy_products_IsMultiBatch" for="x_IsMultiBatch" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IsMultiBatch->caption() ?><?php echo $pharmacy_products_add->IsMultiBatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IsMultiBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMultiBatch">
<input type="text" data-table="pharmacy_products" data-field="x_IsMultiBatch" name="x_IsMultiBatch" id="x_IsMultiBatch" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IsMultiBatch->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IsMultiBatch->EditValue ?>"<?php echo $pharmacy_products_add->IsMultiBatch->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IsMultiBatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IsSingleBatch->Visible) { // IsSingleBatch ?>
	<div id="r_IsSingleBatch" class="form-group row">
		<label id="elh_pharmacy_products_IsSingleBatch" for="x_IsSingleBatch" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IsSingleBatch->caption() ?><?php echo $pharmacy_products_add->IsSingleBatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IsSingleBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsSingleBatch">
<input type="text" data-table="pharmacy_products" data-field="x_IsSingleBatch" name="x_IsSingleBatch" id="x_IsSingleBatch" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IsSingleBatch->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IsSingleBatch->EditValue ?>"<?php echo $pharmacy_products_add->IsSingleBatch->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IsSingleBatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MarkUpRate1->Visible) { // MarkUpRate1 ?>
	<div id="r_MarkUpRate1" class="form-group row">
		<label id="elh_pharmacy_products_MarkUpRate1" for="x_MarkUpRate1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MarkUpRate1->caption() ?><?php echo $pharmacy_products_add->MarkUpRate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MarkUpRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate1">
<input type="text" data-table="pharmacy_products" data-field="x_MarkUpRate1" name="x_MarkUpRate1" id="x_MarkUpRate1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MarkUpRate1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MarkUpRate1->EditValue ?>"<?php echo $pharmacy_products_add->MarkUpRate1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MarkUpRate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MarkDownRate1->Visible) { // MarkDownRate1 ?>
	<div id="r_MarkDownRate1" class="form-group row">
		<label id="elh_pharmacy_products_MarkDownRate1" for="x_MarkDownRate1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MarkDownRate1->caption() ?><?php echo $pharmacy_products_add->MarkDownRate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MarkDownRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate1">
<input type="text" data-table="pharmacy_products" data-field="x_MarkDownRate1" name="x_MarkDownRate1" id="x_MarkDownRate1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MarkDownRate1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MarkDownRate1->EditValue ?>"<?php echo $pharmacy_products_add->MarkDownRate1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MarkDownRate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MarkUpRate2->Visible) { // MarkUpRate2 ?>
	<div id="r_MarkUpRate2" class="form-group row">
		<label id="elh_pharmacy_products_MarkUpRate2" for="x_MarkUpRate2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MarkUpRate2->caption() ?><?php echo $pharmacy_products_add->MarkUpRate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MarkUpRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate2">
<input type="text" data-table="pharmacy_products" data-field="x_MarkUpRate2" name="x_MarkUpRate2" id="x_MarkUpRate2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MarkUpRate2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MarkUpRate2->EditValue ?>"<?php echo $pharmacy_products_add->MarkUpRate2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MarkUpRate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MarkDownRate2->Visible) { // MarkDownRate2 ?>
	<div id="r_MarkDownRate2" class="form-group row">
		<label id="elh_pharmacy_products_MarkDownRate2" for="x_MarkDownRate2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MarkDownRate2->caption() ?><?php echo $pharmacy_products_add->MarkDownRate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MarkDownRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate2">
<input type="text" data-table="pharmacy_products" data-field="x_MarkDownRate2" name="x_MarkDownRate2" id="x_MarkDownRate2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MarkDownRate2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MarkDownRate2->EditValue ?>"<?php echo $pharmacy_products_add->MarkDownRate2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MarkDownRate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->_Yield->Visible) { // Yield ?>
	<div id="r__Yield" class="form-group row">
		<label id="elh_pharmacy_products__Yield" for="x__Yield" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->_Yield->caption() ?><?php echo $pharmacy_products_add->_Yield->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->_Yield->cellAttributes() ?>>
<span id="el_pharmacy_products__Yield">
<input type="text" data-table="pharmacy_products" data-field="x__Yield" name="x__Yield" id="x__Yield" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->_Yield->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->_Yield->EditValue ?>"<?php echo $pharmacy_products_add->_Yield->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->_Yield->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->RefProductCode->Visible) { // RefProductCode ?>
	<div id="r_RefProductCode" class="form-group row">
		<label id="elh_pharmacy_products_RefProductCode" for="x_RefProductCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->RefProductCode->caption() ?><?php echo $pharmacy_products_add->RefProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->RefProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RefProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_RefProductCode" name="x_RefProductCode" id="x_RefProductCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->RefProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->RefProductCode->EditValue ?>"<?php echo $pharmacy_products_add->RefProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->RefProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_pharmacy_products_Volume" for="x_Volume" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Volume->caption() ?><?php echo $pharmacy_products_add->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Volume->cellAttributes() ?>>
<span id="el_pharmacy_products_Volume">
<input type="text" data-table="pharmacy_products" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Volume->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Volume->EditValue ?>"<?php echo $pharmacy_products_add->Volume->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MeasurementID->Visible) { // MeasurementID ?>
	<div id="r_MeasurementID" class="form-group row">
		<label id="elh_pharmacy_products_MeasurementID" for="x_MeasurementID" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MeasurementID->caption() ?><?php echo $pharmacy_products_add->MeasurementID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MeasurementID->cellAttributes() ?>>
<span id="el_pharmacy_products_MeasurementID">
<input type="text" data-table="pharmacy_products" data-field="x_MeasurementID" name="x_MeasurementID" id="x_MeasurementID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MeasurementID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MeasurementID->EditValue ?>"<?php echo $pharmacy_products_add->MeasurementID->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MeasurementID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CountryCode->Visible) { // CountryCode ?>
	<div id="r_CountryCode" class="form-group row">
		<label id="elh_pharmacy_products_CountryCode" for="x_CountryCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CountryCode->caption() ?><?php echo $pharmacy_products_add->CountryCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CountryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CountryCode">
<input type="text" data-table="pharmacy_products" data-field="x_CountryCode" name="x_CountryCode" id="x_CountryCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CountryCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CountryCode->EditValue ?>"<?php echo $pharmacy_products_add->CountryCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CountryCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AcceptWMQty->Visible) { // AcceptWMQty ?>
	<div id="r_AcceptWMQty" class="form-group row">
		<label id="elh_pharmacy_products_AcceptWMQty" for="x_AcceptWMQty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AcceptWMQty->caption() ?><?php echo $pharmacy_products_add->AcceptWMQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AcceptWMQty->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptWMQty">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptWMQty" name="x_AcceptWMQty" id="x_AcceptWMQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AcceptWMQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AcceptWMQty->EditValue ?>"<?php echo $pharmacy_products_add->AcceptWMQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AcceptWMQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
	<div id="r_SingleBatchBasedOnRate" class="form-group row">
		<label id="elh_pharmacy_products_SingleBatchBasedOnRate" for="x_SingleBatchBasedOnRate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SingleBatchBasedOnRate->caption() ?><?php echo $pharmacy_products_add->SingleBatchBasedOnRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBatchBasedOnRate">
<input type="text" data-table="pharmacy_products" data-field="x_SingleBatchBasedOnRate" name="x_SingleBatchBasedOnRate" id="x_SingleBatchBasedOnRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SingleBatchBasedOnRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SingleBatchBasedOnRate->EditValue ?>"<?php echo $pharmacy_products_add->SingleBatchBasedOnRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SingleBatchBasedOnRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TenderNo->Visible) { // TenderNo ?>
	<div id="r_TenderNo" class="form-group row">
		<label id="elh_pharmacy_products_TenderNo" for="x_TenderNo" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TenderNo->caption() ?><?php echo $pharmacy_products_add->TenderNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TenderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TenderNo">
<input type="text" data-table="pharmacy_products" data-field="x_TenderNo" name="x_TenderNo" id="x_TenderNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TenderNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TenderNo->EditValue ?>"<?php echo $pharmacy_products_add->TenderNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TenderNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
	<div id="r_SingleBillMaximumSoldQtyFiled" class="form-group row">
		<label id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" for="x_SingleBillMaximumSoldQtyFiled" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SingleBillMaximumSoldQtyFiled->caption() ?><?php echo $pharmacy_products_add->SingleBillMaximumSoldQtyFiled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBillMaximumSoldQtyFiled">
<input type="text" data-table="pharmacy_products" data-field="x_SingleBillMaximumSoldQtyFiled" name="x_SingleBillMaximumSoldQtyFiled" id="x_SingleBillMaximumSoldQtyFiled" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SingleBillMaximumSoldQtyFiled->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SingleBillMaximumSoldQtyFiled->EditValue ?>"<?php echo $pharmacy_products_add->SingleBillMaximumSoldQtyFiled->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SingleBillMaximumSoldQtyFiled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Strength1->Visible) { // Strength1 ?>
	<div id="r_Strength1" class="form-group row">
		<label id="elh_pharmacy_products_Strength1" for="x_Strength1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Strength1->caption() ?><?php echo $pharmacy_products_add->Strength1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Strength1->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength1">
<input type="text" data-table="pharmacy_products" data-field="x_Strength1" name="x_Strength1" id="x_Strength1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Strength1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Strength1->EditValue ?>"<?php echo $pharmacy_products_add->Strength1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Strength1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Strength2->Visible) { // Strength2 ?>
	<div id="r_Strength2" class="form-group row">
		<label id="elh_pharmacy_products_Strength2" for="x_Strength2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Strength2->caption() ?><?php echo $pharmacy_products_add->Strength2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Strength2->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength2">
<input type="text" data-table="pharmacy_products" data-field="x_Strength2" name="x_Strength2" id="x_Strength2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Strength2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Strength2->EditValue ?>"<?php echo $pharmacy_products_add->Strength2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Strength2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Strength3->Visible) { // Strength3 ?>
	<div id="r_Strength3" class="form-group row">
		<label id="elh_pharmacy_products_Strength3" for="x_Strength3" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Strength3->caption() ?><?php echo $pharmacy_products_add->Strength3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Strength3->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength3">
<input type="text" data-table="pharmacy_products" data-field="x_Strength3" name="x_Strength3" id="x_Strength3" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Strength3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Strength3->EditValue ?>"<?php echo $pharmacy_products_add->Strength3->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Strength3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Strength4->Visible) { // Strength4 ?>
	<div id="r_Strength4" class="form-group row">
		<label id="elh_pharmacy_products_Strength4" for="x_Strength4" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Strength4->caption() ?><?php echo $pharmacy_products_add->Strength4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Strength4->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength4">
<input type="text" data-table="pharmacy_products" data-field="x_Strength4" name="x_Strength4" id="x_Strength4" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Strength4->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Strength4->EditValue ?>"<?php echo $pharmacy_products_add->Strength4->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Strength4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->Strength5->Visible) { // Strength5 ?>
	<div id="r_Strength5" class="form-group row">
		<label id="elh_pharmacy_products_Strength5" for="x_Strength5" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->Strength5->caption() ?><?php echo $pharmacy_products_add->Strength5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->Strength5->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength5">
<input type="text" data-table="pharmacy_products" data-field="x_Strength5" name="x_Strength5" id="x_Strength5" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_add->Strength5->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->Strength5->EditValue ?>"<?php echo $pharmacy_products_add->Strength5->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->Strength5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IngredientCode1->Visible) { // IngredientCode1 ?>
	<div id="r_IngredientCode1" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode1" for="x_IngredientCode1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IngredientCode1->caption() ?><?php echo $pharmacy_products_add->IngredientCode1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IngredientCode1->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode1">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode1" name="x_IngredientCode1" id="x_IngredientCode1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IngredientCode1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IngredientCode1->EditValue ?>"<?php echo $pharmacy_products_add->IngredientCode1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IngredientCode1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IngredientCode2->Visible) { // IngredientCode2 ?>
	<div id="r_IngredientCode2" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode2" for="x_IngredientCode2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IngredientCode2->caption() ?><?php echo $pharmacy_products_add->IngredientCode2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IngredientCode2->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode2">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode2" name="x_IngredientCode2" id="x_IngredientCode2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IngredientCode2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IngredientCode2->EditValue ?>"<?php echo $pharmacy_products_add->IngredientCode2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IngredientCode2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IngredientCode3->Visible) { // IngredientCode3 ?>
	<div id="r_IngredientCode3" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode3" for="x_IngredientCode3" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IngredientCode3->caption() ?><?php echo $pharmacy_products_add->IngredientCode3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IngredientCode3->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode3">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode3" name="x_IngredientCode3" id="x_IngredientCode3" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IngredientCode3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IngredientCode3->EditValue ?>"<?php echo $pharmacy_products_add->IngredientCode3->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IngredientCode3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IngredientCode4->Visible) { // IngredientCode4 ?>
	<div id="r_IngredientCode4" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode4" for="x_IngredientCode4" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IngredientCode4->caption() ?><?php echo $pharmacy_products_add->IngredientCode4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IngredientCode4->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode4">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode4" name="x_IngredientCode4" id="x_IngredientCode4" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IngredientCode4->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IngredientCode4->EditValue ?>"<?php echo $pharmacy_products_add->IngredientCode4->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IngredientCode4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IngredientCode5->Visible) { // IngredientCode5 ?>
	<div id="r_IngredientCode5" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode5" for="x_IngredientCode5" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IngredientCode5->caption() ?><?php echo $pharmacy_products_add->IngredientCode5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IngredientCode5->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode5">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode5" name="x_IngredientCode5" id="x_IngredientCode5" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IngredientCode5->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IngredientCode5->EditValue ?>"<?php echo $pharmacy_products_add->IngredientCode5->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IngredientCode5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->OrderType->Visible) { // OrderType ?>
	<div id="r_OrderType" class="form-group row">
		<label id="elh_pharmacy_products_OrderType" for="x_OrderType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->OrderType->caption() ?><?php echo $pharmacy_products_add->OrderType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->OrderType->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderType">
<input type="text" data-table="pharmacy_products" data-field="x_OrderType" name="x_OrderType" id="x_OrderType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->OrderType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->OrderType->EditValue ?>"<?php echo $pharmacy_products_add->OrderType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->OrderType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->StockUOM->Visible) { // StockUOM ?>
	<div id="r_StockUOM" class="form-group row">
		<label id="elh_pharmacy_products_StockUOM" for="x_StockUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->StockUOM->caption() ?><?php echo $pharmacy_products_add->StockUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->StockUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_StockUOM">
<input type="text" data-table="pharmacy_products" data-field="x_StockUOM" name="x_StockUOM" id="x_StockUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->StockUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->StockUOM->EditValue ?>"<?php echo $pharmacy_products_add->StockUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->StockUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PriceUOM->Visible) { // PriceUOM ?>
	<div id="r_PriceUOM" class="form-group row">
		<label id="elh_pharmacy_products_PriceUOM" for="x_PriceUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PriceUOM->caption() ?><?php echo $pharmacy_products_add->PriceUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PriceUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceUOM">
<input type="text" data-table="pharmacy_products" data-field="x_PriceUOM" name="x_PriceUOM" id="x_PriceUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PriceUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PriceUOM->EditValue ?>"<?php echo $pharmacy_products_add->PriceUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PriceUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
	<div id="r_DefaultSaleUOM" class="form-group row">
		<label id="elh_pharmacy_products_DefaultSaleUOM" for="x_DefaultSaleUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DefaultSaleUOM->caption() ?><?php echo $pharmacy_products_add->DefaultSaleUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DefaultSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultSaleUOM">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultSaleUOM" name="x_DefaultSaleUOM" id="x_DefaultSaleUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DefaultSaleUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DefaultSaleUOM->EditValue ?>"<?php echo $pharmacy_products_add->DefaultSaleUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DefaultSaleUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
	<div id="r_DefaultPurchaseUOM" class="form-group row">
		<label id="elh_pharmacy_products_DefaultPurchaseUOM" for="x_DefaultPurchaseUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DefaultPurchaseUOM->caption() ?><?php echo $pharmacy_products_add->DefaultPurchaseUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultPurchaseUOM">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultPurchaseUOM" name="x_DefaultPurchaseUOM" id="x_DefaultPurchaseUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DefaultPurchaseUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DefaultPurchaseUOM->EditValue ?>"<?php echo $pharmacy_products_add->DefaultPurchaseUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DefaultPurchaseUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ReportingUOM->Visible) { // ReportingUOM ?>
	<div id="r_ReportingUOM" class="form-group row">
		<label id="elh_pharmacy_products_ReportingUOM" for="x_ReportingUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ReportingUOM->caption() ?><?php echo $pharmacy_products_add->ReportingUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ReportingUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_ReportingUOM">
<input type="text" data-table="pharmacy_products" data-field="x_ReportingUOM" name="x_ReportingUOM" id="x_ReportingUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ReportingUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ReportingUOM->EditValue ?>"<?php echo $pharmacy_products_add->ReportingUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ReportingUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
	<div id="r_LastPurchasedUOM" class="form-group row">
		<label id="elh_pharmacy_products_LastPurchasedUOM" for="x_LastPurchasedUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LastPurchasedUOM->caption() ?><?php echo $pharmacy_products_add->LastPurchasedUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LastPurchasedUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPurchasedUOM">
<input type="text" data-table="pharmacy_products" data-field="x_LastPurchasedUOM" name="x_LastPurchasedUOM" id="x_LastPurchasedUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LastPurchasedUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->LastPurchasedUOM->EditValue ?>"<?php echo $pharmacy_products_add->LastPurchasedUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->LastPurchasedUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TreatmentCodes->Visible) { // TreatmentCodes ?>
	<div id="r_TreatmentCodes" class="form-group row">
		<label id="elh_pharmacy_products_TreatmentCodes" for="x_TreatmentCodes" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TreatmentCodes->caption() ?><?php echo $pharmacy_products_add->TreatmentCodes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TreatmentCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_TreatmentCodes">
<input type="text" data-table="pharmacy_products" data-field="x_TreatmentCodes" name="x_TreatmentCodes" id="x_TreatmentCodes" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TreatmentCodes->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TreatmentCodes->EditValue ?>"<?php echo $pharmacy_products_add->TreatmentCodes->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TreatmentCodes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->InsuranceType->Visible) { // InsuranceType ?>
	<div id="r_InsuranceType" class="form-group row">
		<label id="elh_pharmacy_products_InsuranceType" for="x_InsuranceType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->InsuranceType->caption() ?><?php echo $pharmacy_products_add->InsuranceType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->InsuranceType->cellAttributes() ?>>
<span id="el_pharmacy_products_InsuranceType">
<input type="text" data-table="pharmacy_products" data-field="x_InsuranceType" name="x_InsuranceType" id="x_InsuranceType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->InsuranceType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->InsuranceType->EditValue ?>"<?php echo $pharmacy_products_add->InsuranceType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->InsuranceType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
	<div id="r_CoverageGroupCodes" class="form-group row">
		<label id="elh_pharmacy_products_CoverageGroupCodes" for="x_CoverageGroupCodes" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->CoverageGroupCodes->caption() ?><?php echo $pharmacy_products_add->CoverageGroupCodes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->CoverageGroupCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_CoverageGroupCodes">
<input type="text" data-table="pharmacy_products" data-field="x_CoverageGroupCodes" name="x_CoverageGroupCodes" id="x_CoverageGroupCodes" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products_add->CoverageGroupCodes->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->CoverageGroupCodes->EditValue ?>"<?php echo $pharmacy_products_add->CoverageGroupCodes->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->CoverageGroupCodes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MultipleUOM->Visible) { // MultipleUOM ?>
	<div id="r_MultipleUOM" class="form-group row">
		<label id="elh_pharmacy_products_MultipleUOM" for="x_MultipleUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MultipleUOM->caption() ?><?php echo $pharmacy_products_add->MultipleUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MultipleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleUOM">
<input type="text" data-table="pharmacy_products" data-field="x_MultipleUOM" name="x_MultipleUOM" id="x_MultipleUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MultipleUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MultipleUOM->EditValue ?>"<?php echo $pharmacy_products_add->MultipleUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MultipleUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SalePriceComputation->Visible) { // SalePriceComputation ?>
	<div id="r_SalePriceComputation" class="form-group row">
		<label id="elh_pharmacy_products_SalePriceComputation" for="x_SalePriceComputation" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SalePriceComputation->caption() ?><?php echo $pharmacy_products_add->SalePriceComputation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SalePriceComputation->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePriceComputation">
<input type="text" data-table="pharmacy_products" data-field="x_SalePriceComputation" name="x_SalePriceComputation" id="x_SalePriceComputation" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SalePriceComputation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SalePriceComputation->EditValue ?>"<?php echo $pharmacy_products_add->SalePriceComputation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SalePriceComputation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->StockCorrection->Visible) { // StockCorrection ?>
	<div id="r_StockCorrection" class="form-group row">
		<label id="elh_pharmacy_products_StockCorrection" for="x_StockCorrection" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->StockCorrection->caption() ?><?php echo $pharmacy_products_add->StockCorrection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->StockCorrection->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCorrection">
<input type="text" data-table="pharmacy_products" data-field="x_StockCorrection" name="x_StockCorrection" id="x_StockCorrection" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->StockCorrection->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->StockCorrection->EditValue ?>"<?php echo $pharmacy_products_add->StockCorrection->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->StockCorrection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LBTPercentage->Visible) { // LBTPercentage ?>
	<div id="r_LBTPercentage" class="form-group row">
		<label id="elh_pharmacy_products_LBTPercentage" for="x_LBTPercentage" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LBTPercentage->caption() ?><?php echo $pharmacy_products_add->LBTPercentage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LBTPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_LBTPercentage">
<input type="text" data-table="pharmacy_products" data-field="x_LBTPercentage" name="x_LBTPercentage" id="x_LBTPercentage" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LBTPercentage->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->LBTPercentage->EditValue ?>"<?php echo $pharmacy_products_add->LBTPercentage->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->LBTPercentage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->SalesCommission->Visible) { // SalesCommission ?>
	<div id="r_SalesCommission" class="form-group row">
		<label id="elh_pharmacy_products_SalesCommission" for="x_SalesCommission" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->SalesCommission->caption() ?><?php echo $pharmacy_products_add->SalesCommission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->SalesCommission->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesCommission">
<input type="text" data-table="pharmacy_products" data-field="x_SalesCommission" name="x_SalesCommission" id="x_SalesCommission" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->SalesCommission->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->SalesCommission->EditValue ?>"<?php echo $pharmacy_products_add->SalesCommission->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->SalesCommission->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LockedStock->Visible) { // LockedStock ?>
	<div id="r_LockedStock" class="form-group row">
		<label id="elh_pharmacy_products_LockedStock" for="x_LockedStock" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LockedStock->caption() ?><?php echo $pharmacy_products_add->LockedStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LockedStock->cellAttributes() ?>>
<span id="el_pharmacy_products_LockedStock">
<input type="text" data-table="pharmacy_products" data-field="x_LockedStock" name="x_LockedStock" id="x_LockedStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LockedStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->LockedStock->EditValue ?>"<?php echo $pharmacy_products_add->LockedStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->LockedStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MinMaxUOM->Visible) { // MinMaxUOM ?>
	<div id="r_MinMaxUOM" class="form-group row">
		<label id="elh_pharmacy_products_MinMaxUOM" for="x_MinMaxUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MinMaxUOM->caption() ?><?php echo $pharmacy_products_add->MinMaxUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MinMaxUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxUOM">
<input type="text" data-table="pharmacy_products" data-field="x_MinMaxUOM" name="x_MinMaxUOM" id="x_MinMaxUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MinMaxUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MinMaxUOM->EditValue ?>"<?php echo $pharmacy_products_add->MinMaxUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MinMaxUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
	<div id="r_ExpiryMfrDateFormat" class="form-group row">
		<label id="elh_pharmacy_products_ExpiryMfrDateFormat" for="x_ExpiryMfrDateFormat" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ExpiryMfrDateFormat->caption() ?><?php echo $pharmacy_products_add->ExpiryMfrDateFormat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryMfrDateFormat">
<input type="text" data-table="pharmacy_products" data-field="x_ExpiryMfrDateFormat" name="x_ExpiryMfrDateFormat" id="x_ExpiryMfrDateFormat" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ExpiryMfrDateFormat->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ExpiryMfrDateFormat->EditValue ?>"<?php echo $pharmacy_products_add->ExpiryMfrDateFormat->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ExpiryMfrDateFormat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ProductLifeTime->Visible) { // ProductLifeTime ?>
	<div id="r_ProductLifeTime" class="form-group row">
		<label id="elh_pharmacy_products_ProductLifeTime" for="x_ProductLifeTime" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ProductLifeTime->caption() ?><?php echo $pharmacy_products_add->ProductLifeTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ProductLifeTime->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLifeTime">
<input type="text" data-table="pharmacy_products" data-field="x_ProductLifeTime" name="x_ProductLifeTime" id="x_ProductLifeTime" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ProductLifeTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ProductLifeTime->EditValue ?>"<?php echo $pharmacy_products_add->ProductLifeTime->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ProductLifeTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IsCombo->Visible) { // IsCombo ?>
	<div id="r_IsCombo" class="form-group row">
		<label id="elh_pharmacy_products_IsCombo" for="x_IsCombo" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IsCombo->caption() ?><?php echo $pharmacy_products_add->IsCombo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IsCombo->cellAttributes() ?>>
<span id="el_pharmacy_products_IsCombo">
<input type="text" data-table="pharmacy_products" data-field="x_IsCombo" name="x_IsCombo" id="x_IsCombo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IsCombo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IsCombo->EditValue ?>"<?php echo $pharmacy_products_add->IsCombo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IsCombo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ComboTypeCode->Visible) { // ComboTypeCode ?>
	<div id="r_ComboTypeCode" class="form-group row">
		<label id="elh_pharmacy_products_ComboTypeCode" for="x_ComboTypeCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ComboTypeCode->caption() ?><?php echo $pharmacy_products_add->ComboTypeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ComboTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ComboTypeCode">
<input type="text" data-table="pharmacy_products" data-field="x_ComboTypeCode" name="x_ComboTypeCode" id="x_ComboTypeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ComboTypeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ComboTypeCode->EditValue ?>"<?php echo $pharmacy_products_add->ComboTypeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ComboTypeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount6->Visible) { // AttributeCount6 ?>
	<div id="r_AttributeCount6" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount6" for="x_AttributeCount6" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount6->caption() ?><?php echo $pharmacy_products_add->AttributeCount6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount6->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount6">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount6" name="x_AttributeCount6" id="x_AttributeCount6" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount6->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount6->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount6->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount7->Visible) { // AttributeCount7 ?>
	<div id="r_AttributeCount7" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount7" for="x_AttributeCount7" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount7->caption() ?><?php echo $pharmacy_products_add->AttributeCount7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount7->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount7">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount7" name="x_AttributeCount7" id="x_AttributeCount7" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount7->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount7->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount7->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount8->Visible) { // AttributeCount8 ?>
	<div id="r_AttributeCount8" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount8" for="x_AttributeCount8" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount8->caption() ?><?php echo $pharmacy_products_add->AttributeCount8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount8->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount8">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount8" name="x_AttributeCount8" id="x_AttributeCount8" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount8->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount8->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount8->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount9->Visible) { // AttributeCount9 ?>
	<div id="r_AttributeCount9" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount9" for="x_AttributeCount9" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount9->caption() ?><?php echo $pharmacy_products_add->AttributeCount9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount9->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount9">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount9" name="x_AttributeCount9" id="x_AttributeCount9" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount9->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount9->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount9->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AttributeCount10->Visible) { // AttributeCount10 ?>
	<div id="r_AttributeCount10" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount10" for="x_AttributeCount10" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AttributeCount10->caption() ?><?php echo $pharmacy_products_add->AttributeCount10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AttributeCount10->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount10">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount10" name="x_AttributeCount10" id="x_AttributeCount10" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AttributeCount10->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AttributeCount10->EditValue ?>"<?php echo $pharmacy_products_add->AttributeCount10->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AttributeCount10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LabourCharge->Visible) { // LabourCharge ?>
	<div id="r_LabourCharge" class="form-group row">
		<label id="elh_pharmacy_products_LabourCharge" for="x_LabourCharge" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LabourCharge->caption() ?><?php echo $pharmacy_products_add->LabourCharge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LabourCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_LabourCharge">
<input type="text" data-table="pharmacy_products" data-field="x_LabourCharge" name="x_LabourCharge" id="x_LabourCharge" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LabourCharge->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->LabourCharge->EditValue ?>"<?php echo $pharmacy_products_add->LabourCharge->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->LabourCharge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
	<div id="r_AffectOtherCharge" class="form-group row">
		<label id="elh_pharmacy_products_AffectOtherCharge" for="x_AffectOtherCharge" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AffectOtherCharge->caption() ?><?php echo $pharmacy_products_add->AffectOtherCharge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AffectOtherCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_AffectOtherCharge">
<input type="text" data-table="pharmacy_products" data-field="x_AffectOtherCharge" name="x_AffectOtherCharge" id="x_AffectOtherCharge" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AffectOtherCharge->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AffectOtherCharge->EditValue ?>"<?php echo $pharmacy_products_add->AffectOtherCharge->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AffectOtherCharge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DosageInfo->Visible) { // DosageInfo ?>
	<div id="r_DosageInfo" class="form-group row">
		<label id="elh_pharmacy_products_DosageInfo" for="x_DosageInfo" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DosageInfo->caption() ?><?php echo $pharmacy_products_add->DosageInfo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DosageInfo->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageInfo">
<input type="text" data-table="pharmacy_products" data-field="x_DosageInfo" name="x_DosageInfo" id="x_DosageInfo" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DosageInfo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DosageInfo->EditValue ?>"<?php echo $pharmacy_products_add->DosageInfo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DosageInfo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DosageType->Visible) { // DosageType ?>
	<div id="r_DosageType" class="form-group row">
		<label id="elh_pharmacy_products_DosageType" for="x_DosageType" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DosageType->caption() ?><?php echo $pharmacy_products_add->DosageType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DosageType->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageType">
<input type="text" data-table="pharmacy_products" data-field="x_DosageType" name="x_DosageType" id="x_DosageType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DosageType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DosageType->EditValue ?>"<?php echo $pharmacy_products_add->DosageType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DosageType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
	<div id="r_DefaultIndentUOM" class="form-group row">
		<label id="elh_pharmacy_products_DefaultIndentUOM" for="x_DefaultIndentUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->DefaultIndentUOM->caption() ?><?php echo $pharmacy_products_add->DefaultIndentUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->DefaultIndentUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultIndentUOM">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultIndentUOM" name="x_DefaultIndentUOM" id="x_DefaultIndentUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->DefaultIndentUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->DefaultIndentUOM->EditValue ?>"<?php echo $pharmacy_products_add->DefaultIndentUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->DefaultIndentUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PromoTag->Visible) { // PromoTag ?>
	<div id="r_PromoTag" class="form-group row">
		<label id="elh_pharmacy_products_PromoTag" for="x_PromoTag" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PromoTag->caption() ?><?php echo $pharmacy_products_add->PromoTag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_PromoTag">
<input type="text" data-table="pharmacy_products" data-field="x_PromoTag" name="x_PromoTag" id="x_PromoTag" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PromoTag->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PromoTag->EditValue ?>"<?php echo $pharmacy_products_add->PromoTag->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PromoTag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
	<div id="r_BillLevelPromoTag" class="form-group row">
		<label id="elh_pharmacy_products_BillLevelPromoTag" for="x_BillLevelPromoTag" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->BillLevelPromoTag->caption() ?><?php echo $pharmacy_products_add->BillLevelPromoTag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->BillLevelPromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_BillLevelPromoTag">
<input type="text" data-table="pharmacy_products" data-field="x_BillLevelPromoTag" name="x_BillLevelPromoTag" id="x_BillLevelPromoTag" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->BillLevelPromoTag->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->BillLevelPromoTag->EditValue ?>"<?php echo $pharmacy_products_add->BillLevelPromoTag->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->BillLevelPromoTag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->IsMRPProduct->Visible) { // IsMRPProduct ?>
	<div id="r_IsMRPProduct" class="form-group row">
		<label id="elh_pharmacy_products_IsMRPProduct" for="x_IsMRPProduct" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->IsMRPProduct->caption() ?><?php echo $pharmacy_products_add->IsMRPProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->IsMRPProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMRPProduct">
<input type="text" data-table="pharmacy_products" data-field="x_IsMRPProduct" name="x_IsMRPProduct" id="x_IsMRPProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->IsMRPProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->IsMRPProduct->EditValue ?>"<?php echo $pharmacy_products_add->IsMRPProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->IsMRPProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MrpList->Visible) { // MrpList ?>
	<div id="r_MrpList" class="form-group row">
		<label id="elh_pharmacy_products_MrpList" for="x_MrpList" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MrpList->caption() ?><?php echo $pharmacy_products_add->MrpList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MrpList->cellAttributes() ?>>
<span id="el_pharmacy_products_MrpList">
<textarea data-table="pharmacy_products" data-field="x_MrpList" name="x_MrpList" id="x_MrpList" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MrpList->getPlaceHolder()) ?>"<?php echo $pharmacy_products_add->MrpList->editAttributes() ?>><?php echo $pharmacy_products_add->MrpList->EditValue ?></textarea>
</span>
<?php echo $pharmacy_products_add->MrpList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
	<div id="r_AlternateSaleUOM" class="form-group row">
		<label id="elh_pharmacy_products_AlternateSaleUOM" for="x_AlternateSaleUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AlternateSaleUOM->caption() ?><?php echo $pharmacy_products_add->AlternateSaleUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AlternateSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSaleUOM">
<input type="text" data-table="pharmacy_products" data-field="x_AlternateSaleUOM" name="x_AlternateSaleUOM" id="x_AlternateSaleUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AlternateSaleUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AlternateSaleUOM->EditValue ?>"<?php echo $pharmacy_products_add->AlternateSaleUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AlternateSaleUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FreeUOM->Visible) { // FreeUOM ?>
	<div id="r_FreeUOM" class="form-group row">
		<label id="elh_pharmacy_products_FreeUOM" for="x_FreeUOM" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FreeUOM->caption() ?><?php echo $pharmacy_products_add->FreeUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FreeUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeUOM">
<input type="text" data-table="pharmacy_products" data-field="x_FreeUOM" name="x_FreeUOM" id="x_FreeUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FreeUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FreeUOM->EditValue ?>"<?php echo $pharmacy_products_add->FreeUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->FreeUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MarketedCode->Visible) { // MarketedCode ?>
	<div id="r_MarketedCode" class="form-group row">
		<label id="elh_pharmacy_products_MarketedCode" for="x_MarketedCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MarketedCode->caption() ?><?php echo $pharmacy_products_add->MarketedCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MarketedCode->cellAttributes() ?>>
<span id="el_pharmacy_products_MarketedCode">
<input type="text" data-table="pharmacy_products" data-field="x_MarketedCode" name="x_MarketedCode" id="x_MarketedCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MarketedCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MarketedCode->EditValue ?>"<?php echo $pharmacy_products_add->MarketedCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MarketedCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
	<div id="r_MinimumSalePrice" class="form-group row">
		<label id="elh_pharmacy_products_MinimumSalePrice" for="x_MinimumSalePrice" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->MinimumSalePrice->caption() ?><?php echo $pharmacy_products_add->MinimumSalePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->MinimumSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumSalePrice">
<input type="text" data-table="pharmacy_products" data-field="x_MinimumSalePrice" name="x_MinimumSalePrice" id="x_MinimumSalePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->MinimumSalePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->MinimumSalePrice->EditValue ?>"<?php echo $pharmacy_products_add->MinimumSalePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->MinimumSalePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PRate1->Visible) { // PRate1 ?>
	<div id="r_PRate1" class="form-group row">
		<label id="elh_pharmacy_products_PRate1" for="x_PRate1" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PRate1->caption() ?><?php echo $pharmacy_products_add->PRate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate1">
<input type="text" data-table="pharmacy_products" data-field="x_PRate1" name="x_PRate1" id="x_PRate1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PRate1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PRate1->EditValue ?>"<?php echo $pharmacy_products_add->PRate1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PRate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->PRate2->Visible) { // PRate2 ?>
	<div id="r_PRate2" class="form-group row">
		<label id="elh_pharmacy_products_PRate2" for="x_PRate2" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->PRate2->caption() ?><?php echo $pharmacy_products_add->PRate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->PRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate2">
<input type="text" data-table="pharmacy_products" data-field="x_PRate2" name="x_PRate2" id="x_PRate2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->PRate2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->PRate2->EditValue ?>"<?php echo $pharmacy_products_add->PRate2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->PRate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->LPItemCost->Visible) { // LPItemCost ?>
	<div id="r_LPItemCost" class="form-group row">
		<label id="elh_pharmacy_products_LPItemCost" for="x_LPItemCost" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->LPItemCost->caption() ?><?php echo $pharmacy_products_add->LPItemCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->LPItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_LPItemCost">
<input type="text" data-table="pharmacy_products" data-field="x_LPItemCost" name="x_LPItemCost" id="x_LPItemCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->LPItemCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->LPItemCost->EditValue ?>"<?php echo $pharmacy_products_add->LPItemCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->LPItemCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->FixedItemCost->Visible) { // FixedItemCost ?>
	<div id="r_FixedItemCost" class="form-group row">
		<label id="elh_pharmacy_products_FixedItemCost" for="x_FixedItemCost" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->FixedItemCost->caption() ?><?php echo $pharmacy_products_add->FixedItemCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->FixedItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_FixedItemCost">
<input type="text" data-table="pharmacy_products" data-field="x_FixedItemCost" name="x_FixedItemCost" id="x_FixedItemCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->FixedItemCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->FixedItemCost->EditValue ?>"<?php echo $pharmacy_products_add->FixedItemCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->FixedItemCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->HSNId->Visible) { // HSNId ?>
	<div id="r_HSNId" class="form-group row">
		<label id="elh_pharmacy_products_HSNId" for="x_HSNId" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->HSNId->caption() ?><?php echo $pharmacy_products_add->HSNId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->HSNId->cellAttributes() ?>>
<span id="el_pharmacy_products_HSNId">
<input type="text" data-table="pharmacy_products" data-field="x_HSNId" name="x_HSNId" id="x_HSNId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->HSNId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->HSNId->EditValue ?>"<?php echo $pharmacy_products_add->HSNId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->HSNId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->TaxInclusive->Visible) { // TaxInclusive ?>
	<div id="r_TaxInclusive" class="form-group row">
		<label id="elh_pharmacy_products_TaxInclusive" for="x_TaxInclusive" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->TaxInclusive->caption() ?><?php echo $pharmacy_products_add->TaxInclusive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->TaxInclusive->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxInclusive">
<input type="text" data-table="pharmacy_products" data-field="x_TaxInclusive" name="x_TaxInclusive" id="x_TaxInclusive" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->TaxInclusive->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->TaxInclusive->EditValue ?>"<?php echo $pharmacy_products_add->TaxInclusive->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->TaxInclusive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
	<div id="r_EligibleforWarranty" class="form-group row">
		<label id="elh_pharmacy_products_EligibleforWarranty" for="x_EligibleforWarranty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->EligibleforWarranty->caption() ?><?php echo $pharmacy_products_add->EligibleforWarranty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->EligibleforWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_EligibleforWarranty">
<input type="text" data-table="pharmacy_products" data-field="x_EligibleforWarranty" name="x_EligibleforWarranty" id="x_EligibleforWarranty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->EligibleforWarranty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->EligibleforWarranty->EditValue ?>"<?php echo $pharmacy_products_add->EligibleforWarranty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->EligibleforWarranty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
	<div id="r_NoofMonthsWarranty" class="form-group row">
		<label id="elh_pharmacy_products_NoofMonthsWarranty" for="x_NoofMonthsWarranty" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->NoofMonthsWarranty->caption() ?><?php echo $pharmacy_products_add->NoofMonthsWarranty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_NoofMonthsWarranty">
<input type="text" data-table="pharmacy_products" data-field="x_NoofMonthsWarranty" name="x_NoofMonthsWarranty" id="x_NoofMonthsWarranty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->NoofMonthsWarranty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->NoofMonthsWarranty->EditValue ?>"<?php echo $pharmacy_products_add->NoofMonthsWarranty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->NoofMonthsWarranty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
	<div id="r_ComputeTaxonCost" class="form-group row">
		<label id="elh_pharmacy_products_ComputeTaxonCost" for="x_ComputeTaxonCost" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->ComputeTaxonCost->caption() ?><?php echo $pharmacy_products_add->ComputeTaxonCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->ComputeTaxonCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputeTaxonCost">
<input type="text" data-table="pharmacy_products" data-field="x_ComputeTaxonCost" name="x_ComputeTaxonCost" id="x_ComputeTaxonCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->ComputeTaxonCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->ComputeTaxonCost->EditValue ?>"<?php echo $pharmacy_products_add->ComputeTaxonCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->ComputeTaxonCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
	<div id="r_HasEmptyBottleTrack" class="form-group row">
		<label id="elh_pharmacy_products_HasEmptyBottleTrack" for="x_HasEmptyBottleTrack" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->HasEmptyBottleTrack->caption() ?><?php echo $pharmacy_products_add->HasEmptyBottleTrack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el_pharmacy_products_HasEmptyBottleTrack">
<input type="text" data-table="pharmacy_products" data-field="x_HasEmptyBottleTrack" name="x_HasEmptyBottleTrack" id="x_HasEmptyBottleTrack" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->HasEmptyBottleTrack->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->HasEmptyBottleTrack->EditValue ?>"<?php echo $pharmacy_products_add->HasEmptyBottleTrack->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->HasEmptyBottleTrack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
	<div id="r_EmptyBottleReferenceCode" class="form-group row">
		<label id="elh_pharmacy_products_EmptyBottleReferenceCode" for="x_EmptyBottleReferenceCode" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->EmptyBottleReferenceCode->caption() ?><?php echo $pharmacy_products_add->EmptyBottleReferenceCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleReferenceCode">
<input type="text" data-table="pharmacy_products" data-field="x_EmptyBottleReferenceCode" name="x_EmptyBottleReferenceCode" id="x_EmptyBottleReferenceCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->EmptyBottleReferenceCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->EmptyBottleReferenceCode->EditValue ?>"<?php echo $pharmacy_products_add->EmptyBottleReferenceCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->EmptyBottleReferenceCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
	<div id="r_AdditionalCESSAmount" class="form-group row">
		<label id="elh_pharmacy_products_AdditionalCESSAmount" for="x_AdditionalCESSAmount" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->AdditionalCESSAmount->caption() ?><?php echo $pharmacy_products_add->AdditionalCESSAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_AdditionalCESSAmount">
<input type="text" data-table="pharmacy_products" data-field="x_AdditionalCESSAmount" name="x_AdditionalCESSAmount" id="x_AdditionalCESSAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->AdditionalCESSAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->AdditionalCESSAmount->EditValue ?>"<?php echo $pharmacy_products_add->AdditionalCESSAmount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->AdditionalCESSAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_add->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
	<div id="r_EmptyBottleRate" class="form-group row">
		<label id="elh_pharmacy_products_EmptyBottleRate" for="x_EmptyBottleRate" class="<?php echo $pharmacy_products_add->LeftColumnClass ?>"><?php echo $pharmacy_products_add->EmptyBottleRate->caption() ?><?php echo $pharmacy_products_add->EmptyBottleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_add->RightColumnClass ?>"><div <?php echo $pharmacy_products_add->EmptyBottleRate->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleRate">
<input type="text" data-table="pharmacy_products" data-field="x_EmptyBottleRate" name="x_EmptyBottleRate" id="x_EmptyBottleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_add->EmptyBottleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_add->EmptyBottleRate->EditValue ?>"<?php echo $pharmacy_products_add->EmptyBottleRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_add->EmptyBottleRate->CustomMsg ?></div></div>
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
$pharmacy_products_add->terminate();
?>
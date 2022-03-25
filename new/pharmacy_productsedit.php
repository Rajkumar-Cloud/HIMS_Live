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
$pharmacy_products_edit = new pharmacy_products_edit();

// Run the page
$pharmacy_products_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_products_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_productsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_productsedit = currentForm = new ew.Form("fpharmacy_productsedit", "edit");

	// Validate form
	fpharmacy_productsedit.validate = function() {
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
			<?php if ($pharmacy_products_edit->ProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductCode->caption(), $pharmacy_products_edit->ProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->ProductName->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductName->caption(), $pharmacy_products_edit->ProductName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->DivisionCode->Required) { ?>
				elm = this.getElements("x" + infix + "_DivisionCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DivisionCode->caption(), $pharmacy_products_edit->DivisionCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->ManufacturerCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ManufacturerCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ManufacturerCode->caption(), $pharmacy_products_edit->ManufacturerCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->SupplierCode->Required) { ?>
				elm = this.getElements("x" + infix + "_SupplierCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SupplierCode->caption(), $pharmacy_products_edit->SupplierCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->AlternateSupplierCodes->Required) { ?>
				elm = this.getElements("x" + infix + "_AlternateSupplierCodes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AlternateSupplierCodes->caption(), $pharmacy_products_edit->AlternateSupplierCodes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->AlternateProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_AlternateProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AlternateProductCode->caption(), $pharmacy_products_edit->AlternateProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->UniversalProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_UniversalProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->UniversalProductCode->caption(), $pharmacy_products_edit->UniversalProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UniversalProductCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->UniversalProductCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->BookProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_BookProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BookProductCode->caption(), $pharmacy_products_edit->BookProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BookProductCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->BookProductCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->OldCode->Required) { ?>
				elm = this.getElements("x" + infix + "_OldCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->OldCode->caption(), $pharmacy_products_edit->OldCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->ProtectedProducts->Required) { ?>
				elm = this.getElements("x" + infix + "_ProtectedProducts");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProtectedProducts->caption(), $pharmacy_products_edit->ProtectedProducts->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProtectedProducts");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProtectedProducts->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductFullName->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductFullName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductFullName->caption(), $pharmacy_products_edit->ProductFullName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->UnitOfMeasure->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitOfMeasure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->UnitOfMeasure->caption(), $pharmacy_products_edit->UnitOfMeasure->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UnitOfMeasure");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->UnitOfMeasure->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->UnitDescription->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitDescription");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->UnitDescription->caption(), $pharmacy_products_edit->UnitDescription->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->BulkDescription->Required) { ?>
				elm = this.getElements("x" + infix + "_BulkDescription");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BulkDescription->caption(), $pharmacy_products_edit->BulkDescription->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->BarCodeDescription->Required) { ?>
				elm = this.getElements("x" + infix + "_BarCodeDescription");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BarCodeDescription->caption(), $pharmacy_products_edit->BarCodeDescription->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->PackageInformation->Required) { ?>
				elm = this.getElements("x" + infix + "_PackageInformation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PackageInformation->caption(), $pharmacy_products_edit->PackageInformation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->PackageId->Required) { ?>
				elm = this.getElements("x" + infix + "_PackageId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PackageId->caption(), $pharmacy_products_edit->PackageId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PackageId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PackageId->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Weight->Required) { ?>
				elm = this.getElements("x" + infix + "_Weight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Weight->caption(), $pharmacy_products_edit->Weight->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Weight");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->Weight->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AllowFractions->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowFractions");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AllowFractions->caption(), $pharmacy_products_edit->AllowFractions->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowFractions");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AllowFractions->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MinimumStockLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_MinimumStockLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MinimumStockLevel->caption(), $pharmacy_products_edit->MinimumStockLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MinimumStockLevel");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MinimumStockLevel->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MaximumStockLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_MaximumStockLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MaximumStockLevel->caption(), $pharmacy_products_edit->MaximumStockLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MaximumStockLevel");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MaximumStockLevel->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ReorderLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_ReorderLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ReorderLevel->caption(), $pharmacy_products_edit->ReorderLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReorderLevel");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ReorderLevel->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MinMaxRatio->Required) { ?>
				elm = this.getElements("x" + infix + "_MinMaxRatio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MinMaxRatio->caption(), $pharmacy_products_edit->MinMaxRatio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MinMaxRatio");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MinMaxRatio->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AutoMinMaxRatio->Required) { ?>
				elm = this.getElements("x" + infix + "_AutoMinMaxRatio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AutoMinMaxRatio->caption(), $pharmacy_products_edit->AutoMinMaxRatio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AutoMinMaxRatio");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AutoMinMaxRatio->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ScheduleCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ScheduleCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ScheduleCode->caption(), $pharmacy_products_edit->ScheduleCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ScheduleCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ScheduleCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->RopRatio->Required) { ?>
				elm = this.getElements("x" + infix + "_RopRatio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->RopRatio->caption(), $pharmacy_products_edit->RopRatio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RopRatio");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->RopRatio->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MRP->caption(), $pharmacy_products_edit->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MRP->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PurchasePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_PurchasePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PurchasePrice->caption(), $pharmacy_products_edit->PurchasePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurchasePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PurchasePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PurchaseUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_PurchaseUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PurchaseUnit->caption(), $pharmacy_products_edit->PurchaseUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurchaseUnit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PurchaseUnit->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PurchaseTaxCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PurchaseTaxCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PurchaseTaxCode->caption(), $pharmacy_products_edit->PurchaseTaxCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurchaseTaxCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PurchaseTaxCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AllowDirectInward->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowDirectInward");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AllowDirectInward->caption(), $pharmacy_products_edit->AllowDirectInward->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowDirectInward");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AllowDirectInward->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SalePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_SalePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SalePrice->caption(), $pharmacy_products_edit->SalePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SalePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SaleUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SaleUnit->caption(), $pharmacy_products_edit->SaleUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleUnit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SaleUnit->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SalesTaxCode->Required) { ?>
				elm = this.getElements("x" + infix + "_SalesTaxCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SalesTaxCode->caption(), $pharmacy_products_edit->SalesTaxCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalesTaxCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SalesTaxCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->StockReceived->Required) { ?>
				elm = this.getElements("x" + infix + "_StockReceived");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->StockReceived->caption(), $pharmacy_products_edit->StockReceived->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockReceived");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->StockReceived->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TotalStock->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TotalStock->caption(), $pharmacy_products_edit->TotalStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TotalStock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TotalStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->StockType->Required) { ?>
				elm = this.getElements("x" + infix + "_StockType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->StockType->caption(), $pharmacy_products_edit->StockType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->StockType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->StockCheckDate->Required) { ?>
				elm = this.getElements("x" + infix + "_StockCheckDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->StockCheckDate->caption(), $pharmacy_products_edit->StockCheckDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockCheckDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->StockCheckDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->StockAdjustmentDate->Required) { ?>
				elm = this.getElements("x" + infix + "_StockAdjustmentDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->StockAdjustmentDate->caption(), $pharmacy_products_edit->StockAdjustmentDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockAdjustmentDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->StockAdjustmentDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Remarks->caption(), $pharmacy_products_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->CostCentre->Required) { ?>
				elm = this.getElements("x" + infix + "_CostCentre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CostCentre->caption(), $pharmacy_products_edit->CostCentre->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CostCentre");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->CostCentre->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductType->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductType->caption(), $pharmacy_products_edit->ProductType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProductType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TaxAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_TaxAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TaxAmount->caption(), $pharmacy_products_edit->TaxAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TaxAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TaxAmount->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TaxId->Required) { ?>
				elm = this.getElements("x" + infix + "_TaxId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TaxId->caption(), $pharmacy_products_edit->TaxId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TaxId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TaxId->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ResaleTaxApplicable->Required) { ?>
				elm = this.getElements("x" + infix + "_ResaleTaxApplicable");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ResaleTaxApplicable->caption(), $pharmacy_products_edit->ResaleTaxApplicable->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResaleTaxApplicable");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ResaleTaxApplicable->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CstOtherTax->Required) { ?>
				elm = this.getElements("x" + infix + "_CstOtherTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CstOtherTax->caption(), $pharmacy_products_edit->CstOtherTax->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->TotalTax->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TotalTax->caption(), $pharmacy_products_edit->TotalTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TotalTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TotalTax->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ItemCost->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ItemCost->caption(), $pharmacy_products_edit->ItemCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ItemCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ItemCost->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ExpiryDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpiryDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ExpiryDate->caption(), $pharmacy_products_edit->ExpiryDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpiryDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ExpiryDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->BatchDescription->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchDescription");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BatchDescription->caption(), $pharmacy_products_edit->BatchDescription->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->FreeScheme->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeScheme");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FreeScheme->caption(), $pharmacy_products_edit->FreeScheme->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeScheme");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->FreeScheme->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CashDiscountEligibility->Required) { ?>
				elm = this.getElements("x" + infix + "_CashDiscountEligibility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CashDiscountEligibility->caption(), $pharmacy_products_edit->CashDiscountEligibility->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CashDiscountEligibility");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->CashDiscountEligibility->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DiscountPerAllowInBill->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountPerAllowInBill");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DiscountPerAllowInBill->caption(), $pharmacy_products_edit->DiscountPerAllowInBill->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DiscountPerAllowInBill");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DiscountPerAllowInBill->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Discount->caption(), $pharmacy_products_edit->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->Discount->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TotalAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TotalAmount->caption(), $pharmacy_products_edit->TotalAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TotalAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TotalAmount->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->StandardMargin->Required) { ?>
				elm = this.getElements("x" + infix + "_StandardMargin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->StandardMargin->caption(), $pharmacy_products_edit->StandardMargin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StandardMargin");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->StandardMargin->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Margin->Required) { ?>
				elm = this.getElements("x" + infix + "_Margin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Margin->caption(), $pharmacy_products_edit->Margin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Margin");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->Margin->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MarginId->Required) { ?>
				elm = this.getElements("x" + infix + "_MarginId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MarginId->caption(), $pharmacy_products_edit->MarginId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarginId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MarginId->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ExpectedMargin->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpectedMargin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ExpectedMargin->caption(), $pharmacy_products_edit->ExpectedMargin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpectedMargin");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ExpectedMargin->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SurchargeBeforeTax->Required) { ?>
				elm = this.getElements("x" + infix + "_SurchargeBeforeTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SurchargeBeforeTax->caption(), $pharmacy_products_edit->SurchargeBeforeTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SurchargeBeforeTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SurchargeBeforeTax->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SurchargeAfterTax->Required) { ?>
				elm = this.getElements("x" + infix + "_SurchargeAfterTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SurchargeAfterTax->caption(), $pharmacy_products_edit->SurchargeAfterTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SurchargeAfterTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SurchargeAfterTax->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TempOrderNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TempOrderNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TempOrderNo->caption(), $pharmacy_products_edit->TempOrderNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TempOrderNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TempOrderNo->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TempOrderDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TempOrderDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TempOrderDate->caption(), $pharmacy_products_edit->TempOrderDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TempOrderDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TempOrderDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->OrderUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->OrderUnit->caption(), $pharmacy_products_edit->OrderUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderUnit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->OrderUnit->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->OrderQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->OrderQuantity->caption(), $pharmacy_products_edit->OrderQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderQuantity");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->OrderQuantity->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MarkForOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkForOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MarkForOrder->caption(), $pharmacy_products_edit->MarkForOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkForOrder");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MarkForOrder->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->OrderAllId->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderAllId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->OrderAllId->caption(), $pharmacy_products_edit->OrderAllId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderAllId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->OrderAllId->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CalculateOrderQty->Required) { ?>
				elm = this.getElements("x" + infix + "_CalculateOrderQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CalculateOrderQty->caption(), $pharmacy_products_edit->CalculateOrderQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CalculateOrderQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->CalculateOrderQty->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SubLocation->Required) { ?>
				elm = this.getElements("x" + infix + "_SubLocation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SubLocation->caption(), $pharmacy_products_edit->SubLocation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->CategoryCode->Required) { ?>
				elm = this.getElements("x" + infix + "_CategoryCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CategoryCode->caption(), $pharmacy_products_edit->CategoryCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->SubCategory->Required) { ?>
				elm = this.getElements("x" + infix + "_SubCategory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SubCategory->caption(), $pharmacy_products_edit->SubCategory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->FlexCategoryCode->Required) { ?>
				elm = this.getElements("x" + infix + "_FlexCategoryCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FlexCategoryCode->caption(), $pharmacy_products_edit->FlexCategoryCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FlexCategoryCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->FlexCategoryCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ABCSaleQty->Required) { ?>
				elm = this.getElements("x" + infix + "_ABCSaleQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ABCSaleQty->caption(), $pharmacy_products_edit->ABCSaleQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ABCSaleQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ABCSaleQty->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ABCSaleValue->Required) { ?>
				elm = this.getElements("x" + infix + "_ABCSaleValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ABCSaleValue->caption(), $pharmacy_products_edit->ABCSaleValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ABCSaleValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ABCSaleValue->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ConvertionFactor->Required) { ?>
				elm = this.getElements("x" + infix + "_ConvertionFactor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ConvertionFactor->caption(), $pharmacy_products_edit->ConvertionFactor->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConvertionFactor");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ConvertionFactor->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ConvertionUnitDesc->Required) { ?>
				elm = this.getElements("x" + infix + "_ConvertionUnitDesc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ConvertionUnitDesc->caption(), $pharmacy_products_edit->ConvertionUnitDesc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->TransactionId->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TransactionId->caption(), $pharmacy_products_edit->TransactionId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TransactionId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TransactionId->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SoldProductId->Required) { ?>
				elm = this.getElements("x" + infix + "_SoldProductId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SoldProductId->caption(), $pharmacy_products_edit->SoldProductId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SoldProductId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SoldProductId->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->WantedBookId->Required) { ?>
				elm = this.getElements("x" + infix + "_WantedBookId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->WantedBookId->caption(), $pharmacy_products_edit->WantedBookId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_WantedBookId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->WantedBookId->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AllId->Required) { ?>
				elm = this.getElements("x" + infix + "_AllId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AllId->caption(), $pharmacy_products_edit->AllId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AllId->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->BatchAndExpiryCompulsory->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchAndExpiryCompulsory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BatchAndExpiryCompulsory->caption(), $pharmacy_products_edit->BatchAndExpiryCompulsory->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BatchAndExpiryCompulsory");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->BatchAndExpiryCompulsory->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->BatchStockForWantedBook->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchStockForWantedBook");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BatchStockForWantedBook->caption(), $pharmacy_products_edit->BatchStockForWantedBook->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BatchStockForWantedBook");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->BatchStockForWantedBook->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->UnitBasedBilling->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitBasedBilling");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->UnitBasedBilling->caption(), $pharmacy_products_edit->UnitBasedBilling->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UnitBasedBilling");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->UnitBasedBilling->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DoNotCheckStock->Required) { ?>
				elm = this.getElements("x" + infix + "_DoNotCheckStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DoNotCheckStock->caption(), $pharmacy_products_edit->DoNotCheckStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DoNotCheckStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DoNotCheckStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AcceptRate->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AcceptRate->caption(), $pharmacy_products_edit->AcceptRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptRate");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AcceptRate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PriceLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_PriceLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PriceLevel->caption(), $pharmacy_products_edit->PriceLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PriceLevel");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PriceLevel->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->LastQuotePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_LastQuotePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LastQuotePrice->caption(), $pharmacy_products_edit->LastQuotePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastQuotePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->LastQuotePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PriceChange->Required) { ?>
				elm = this.getElements("x" + infix + "_PriceChange");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PriceChange->caption(), $pharmacy_products_edit->PriceChange->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PriceChange");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PriceChange->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CommodityCode->Required) { ?>
				elm = this.getElements("x" + infix + "_CommodityCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CommodityCode->caption(), $pharmacy_products_edit->CommodityCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->InstitutePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_InstitutePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->InstitutePrice->caption(), $pharmacy_products_edit->InstitutePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_InstitutePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->InstitutePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CtrlOrDCtrlProduct->Required) { ?>
				elm = this.getElements("x" + infix + "_CtrlOrDCtrlProduct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CtrlOrDCtrlProduct->caption(), $pharmacy_products_edit->CtrlOrDCtrlProduct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CtrlOrDCtrlProduct");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->CtrlOrDCtrlProduct->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ImportedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ImportedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ImportedDate->caption(), $pharmacy_products_edit->ImportedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ImportedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ImportedDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IsImported->Required) { ?>
				elm = this.getElements("x" + infix + "_IsImported");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IsImported->caption(), $pharmacy_products_edit->IsImported->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsImported");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IsImported->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->FileName->Required) { ?>
				elm = this.getElements("x" + infix + "_FileName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FileName->caption(), $pharmacy_products_edit->FileName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->LPName->Required) { ?>
				elm = this.getElements("x" + infix + "_LPName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LPName->caption(), $pharmacy_products_edit->LPName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->GodownNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_GodownNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->GodownNumber->caption(), $pharmacy_products_edit->GodownNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GodownNumber");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->GodownNumber->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CreationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_CreationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CreationDate->caption(), $pharmacy_products_edit->CreationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreationDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->CreationDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CreatedbyUser->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedbyUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CreatedbyUser->caption(), $pharmacy_products_edit->CreatedbyUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->ModifiedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ModifiedDate->caption(), $pharmacy_products_edit->ModifiedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifiedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ModifiedDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ModifiedbyUser->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedbyUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ModifiedbyUser->caption(), $pharmacy_products_edit->ModifiedbyUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->isActive->Required) { ?>
				elm = this.getElements("x" + infix + "_isActive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->isActive->caption(), $pharmacy_products_edit->isActive->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_isActive");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->isActive->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AllowExpiryClaim->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowExpiryClaim");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AllowExpiryClaim->caption(), $pharmacy_products_edit->AllowExpiryClaim->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowExpiryClaim");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AllowExpiryClaim->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->BrandCode->Required) { ?>
				elm = this.getElements("x" + infix + "_BrandCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BrandCode->caption(), $pharmacy_products_edit->BrandCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BrandCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->BrandCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->FreeSchemeBasedon->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeSchemeBasedon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FreeSchemeBasedon->caption(), $pharmacy_products_edit->FreeSchemeBasedon->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeSchemeBasedon");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->FreeSchemeBasedon->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DoNotCheckCostInBill->Required) { ?>
				elm = this.getElements("x" + infix + "_DoNotCheckCostInBill");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DoNotCheckCostInBill->caption(), $pharmacy_products_edit->DoNotCheckCostInBill->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DoNotCheckCostInBill");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DoNotCheckCostInBill->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductGroupCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductGroupCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductGroupCode->caption(), $pharmacy_products_edit->ProductGroupCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductGroupCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProductGroupCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductStrengthCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductStrengthCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductStrengthCode->caption(), $pharmacy_products_edit->ProductStrengthCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductStrengthCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProductStrengthCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PackingCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PackingCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PackingCode->caption(), $pharmacy_products_edit->PackingCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PackingCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PackingCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ComputedMinStock->Required) { ?>
				elm = this.getElements("x" + infix + "_ComputedMinStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ComputedMinStock->caption(), $pharmacy_products_edit->ComputedMinStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComputedMinStock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ComputedMinStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ComputedMaxStock->Required) { ?>
				elm = this.getElements("x" + infix + "_ComputedMaxStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ComputedMaxStock->caption(), $pharmacy_products_edit->ComputedMaxStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComputedMaxStock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ComputedMaxStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductRemark->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductRemark");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductRemark->caption(), $pharmacy_products_edit->ProductRemark->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductRemark");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProductRemark->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductDrugCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductDrugCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductDrugCode->caption(), $pharmacy_products_edit->ProductDrugCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductDrugCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProductDrugCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IsMatrixProduct->Required) { ?>
				elm = this.getElements("x" + infix + "_IsMatrixProduct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IsMatrixProduct->caption(), $pharmacy_products_edit->IsMatrixProduct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsMatrixProduct");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IsMatrixProduct->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount1->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount1->caption(), $pharmacy_products_edit->AttributeCount1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount1");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount1->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount2->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount2->caption(), $pharmacy_products_edit->AttributeCount2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount2");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount2->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount3->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount3->caption(), $pharmacy_products_edit->AttributeCount3->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount3");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount3->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount4->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount4->caption(), $pharmacy_products_edit->AttributeCount4->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount4");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount4->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount5->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount5->caption(), $pharmacy_products_edit->AttributeCount5->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount5");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount5->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DefaultDiscountPercentage->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultDiscountPercentage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DefaultDiscountPercentage->caption(), $pharmacy_products_edit->DefaultDiscountPercentage->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultDiscountPercentage");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DefaultDiscountPercentage->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DonotPrintBarcode->Required) { ?>
				elm = this.getElements("x" + infix + "_DonotPrintBarcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DonotPrintBarcode->caption(), $pharmacy_products_edit->DonotPrintBarcode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DonotPrintBarcode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DonotPrintBarcode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductLevelDiscount->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductLevelDiscount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductLevelDiscount->caption(), $pharmacy_products_edit->ProductLevelDiscount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductLevelDiscount");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProductLevelDiscount->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Markup->Required) { ?>
				elm = this.getElements("x" + infix + "_Markup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Markup->caption(), $pharmacy_products_edit->Markup->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Markup");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->Markup->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MarkDown->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkDown");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MarkDown->caption(), $pharmacy_products_edit->MarkDown->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkDown");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MarkDown->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ReworkSalePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_ReworkSalePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ReworkSalePrice->caption(), $pharmacy_products_edit->ReworkSalePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReworkSalePrice");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ReworkSalePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MultipleInput->Required) { ?>
				elm = this.getElements("x" + infix + "_MultipleInput");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MultipleInput->caption(), $pharmacy_products_edit->MultipleInput->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MultipleInput");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MultipleInput->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->LpPackageInformation->Required) { ?>
				elm = this.getElements("x" + infix + "_LpPackageInformation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LpPackageInformation->caption(), $pharmacy_products_edit->LpPackageInformation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->AllowNegativeStock->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowNegativeStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AllowNegativeStock->caption(), $pharmacy_products_edit->AllowNegativeStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowNegativeStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AllowNegativeStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->OrderDate->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->OrderDate->caption(), $pharmacy_products_edit->OrderDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->OrderDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->OrderTime->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->OrderTime->caption(), $pharmacy_products_edit->OrderTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->OrderTime->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->RateGroupCode->Required) { ?>
				elm = this.getElements("x" + infix + "_RateGroupCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->RateGroupCode->caption(), $pharmacy_products_edit->RateGroupCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RateGroupCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->RateGroupCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ConversionCaseLot->Required) { ?>
				elm = this.getElements("x" + infix + "_ConversionCaseLot");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ConversionCaseLot->caption(), $pharmacy_products_edit->ConversionCaseLot->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ConversionCaseLot");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ConversionCaseLot->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ShippingLot->Required) { ?>
				elm = this.getElements("x" + infix + "_ShippingLot");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ShippingLot->caption(), $pharmacy_products_edit->ShippingLot->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->AllowExpiryReplacement->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowExpiryReplacement");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AllowExpiryReplacement->caption(), $pharmacy_products_edit->AllowExpiryReplacement->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowExpiryReplacement");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AllowExpiryReplacement->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->NoOfMonthExpiryAllowed->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfMonthExpiryAllowed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->NoOfMonthExpiryAllowed->caption(), $pharmacy_products_edit->NoOfMonthExpiryAllowed->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoOfMonthExpiryAllowed");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->NoOfMonthExpiryAllowed->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductDiscountEligibility->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductDiscountEligibility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductDiscountEligibility->caption(), $pharmacy_products_edit->ProductDiscountEligibility->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductDiscountEligibility");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProductDiscountEligibility->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ScheduleTypeCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ScheduleTypeCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ScheduleTypeCode->caption(), $pharmacy_products_edit->ScheduleTypeCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ScheduleTypeCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ScheduleTypeCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AIOCDProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_AIOCDProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AIOCDProductCode->caption(), $pharmacy_products_edit->AIOCDProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->FreeQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FreeQuantity->caption(), $pharmacy_products_edit->FreeQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeQuantity");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->FreeQuantity->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DiscountType->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DiscountType->caption(), $pharmacy_products_edit->DiscountType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DiscountType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DiscountType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DiscountValue->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DiscountValue->caption(), $pharmacy_products_edit->DiscountValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DiscountValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DiscountValue->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->HasProductOrderAttribute->Required) { ?>
				elm = this.getElements("x" + infix + "_HasProductOrderAttribute");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->HasProductOrderAttribute->caption(), $pharmacy_products_edit->HasProductOrderAttribute->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HasProductOrderAttribute");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->HasProductOrderAttribute->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->FirstPODate->Required) { ?>
				elm = this.getElements("x" + infix + "_FirstPODate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FirstPODate->caption(), $pharmacy_products_edit->FirstPODate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FirstPODate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->FirstPODate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SaleprcieAndMrpCalcPercent->Required) { ?>
				elm = this.getElements("x" + infix + "_SaleprcieAndMrpCalcPercent");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SaleprcieAndMrpCalcPercent->caption(), $pharmacy_products_edit->SaleprcieAndMrpCalcPercent->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SaleprcieAndMrpCalcPercent");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SaleprcieAndMrpCalcPercent->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IsGiftVoucherProducts->Required) { ?>
				elm = this.getElements("x" + infix + "_IsGiftVoucherProducts");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IsGiftVoucherProducts->caption(), $pharmacy_products_edit->IsGiftVoucherProducts->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsGiftVoucherProducts");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IsGiftVoucherProducts->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AcceptRange4SerialNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptRange4SerialNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AcceptRange4SerialNumber->caption(), $pharmacy_products_edit->AcceptRange4SerialNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptRange4SerialNumber");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AcceptRange4SerialNumber->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->GiftVoucherDenomination->Required) { ?>
				elm = this.getElements("x" + infix + "_GiftVoucherDenomination");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->GiftVoucherDenomination->caption(), $pharmacy_products_edit->GiftVoucherDenomination->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GiftVoucherDenomination");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->GiftVoucherDenomination->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Subclasscode->Required) { ?>
				elm = this.getElements("x" + infix + "_Subclasscode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Subclasscode->caption(), $pharmacy_products_edit->Subclasscode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->BarCodeFromWeighingMachine->Required) { ?>
				elm = this.getElements("x" + infix + "_BarCodeFromWeighingMachine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BarCodeFromWeighingMachine->caption(), $pharmacy_products_edit->BarCodeFromWeighingMachine->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BarCodeFromWeighingMachine");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->BarCodeFromWeighingMachine->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CheckCostInReturn->Required) { ?>
				elm = this.getElements("x" + infix + "_CheckCostInReturn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CheckCostInReturn->caption(), $pharmacy_products_edit->CheckCostInReturn->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CheckCostInReturn");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->CheckCostInReturn->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->FrequentSaleProduct->Required) { ?>
				elm = this.getElements("x" + infix + "_FrequentSaleProduct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FrequentSaleProduct->caption(), $pharmacy_products_edit->FrequentSaleProduct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FrequentSaleProduct");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->FrequentSaleProduct->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->RateType->Required) { ?>
				elm = this.getElements("x" + infix + "_RateType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->RateType->caption(), $pharmacy_products_edit->RateType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RateType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->RateType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TouchscreenName->Required) { ?>
				elm = this.getElements("x" + infix + "_TouchscreenName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TouchscreenName->caption(), $pharmacy_products_edit->TouchscreenName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->FreeType->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FreeType->caption(), $pharmacy_products_edit->FreeType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->FreeType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->LooseQtyasNewBatch->Required) { ?>
				elm = this.getElements("x" + infix + "_LooseQtyasNewBatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LooseQtyasNewBatch->caption(), $pharmacy_products_edit->LooseQtyasNewBatch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LooseQtyasNewBatch");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->LooseQtyasNewBatch->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AllowSlabBilling->Required) { ?>
				elm = this.getElements("x" + infix + "_AllowSlabBilling");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AllowSlabBilling->caption(), $pharmacy_products_edit->AllowSlabBilling->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AllowSlabBilling");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AllowSlabBilling->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductTypeForProduction->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductTypeForProduction");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductTypeForProduction->caption(), $pharmacy_products_edit->ProductTypeForProduction->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductTypeForProduction");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProductTypeForProduction->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->RecipeCode->Required) { ?>
				elm = this.getElements("x" + infix + "_RecipeCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->RecipeCode->caption(), $pharmacy_products_edit->RecipeCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RecipeCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->RecipeCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DefaultUnitType->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultUnitType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DefaultUnitType->caption(), $pharmacy_products_edit->DefaultUnitType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultUnitType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DefaultUnitType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PIstatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PIstatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PIstatus->caption(), $pharmacy_products_edit->PIstatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PIstatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PIstatus->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->LastPiConfirmedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_LastPiConfirmedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LastPiConfirmedDate->caption(), $pharmacy_products_edit->LastPiConfirmedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastPiConfirmedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->LastPiConfirmedDate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->BarCodeDesign->Required) { ?>
				elm = this.getElements("x" + infix + "_BarCodeDesign");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BarCodeDesign->caption(), $pharmacy_products_edit->BarCodeDesign->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->AcceptRemarksInBill->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptRemarksInBill");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AcceptRemarksInBill->caption(), $pharmacy_products_edit->AcceptRemarksInBill->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptRemarksInBill");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AcceptRemarksInBill->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Classification->Required) { ?>
				elm = this.getElements("x" + infix + "_Classification");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Classification->caption(), $pharmacy_products_edit->Classification->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Classification");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->Classification->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TimeSlot->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeSlot");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TimeSlot->caption(), $pharmacy_products_edit->TimeSlot->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TimeSlot");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TimeSlot->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IsBundle->Required) { ?>
				elm = this.getElements("x" + infix + "_IsBundle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IsBundle->caption(), $pharmacy_products_edit->IsBundle->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsBundle");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IsBundle->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ColorCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ColorCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ColorCode->caption(), $pharmacy_products_edit->ColorCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ColorCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ColorCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->GenderCode->Required) { ?>
				elm = this.getElements("x" + infix + "_GenderCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->GenderCode->caption(), $pharmacy_products_edit->GenderCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GenderCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->GenderCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SizeCode->Required) { ?>
				elm = this.getElements("x" + infix + "_SizeCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SizeCode->caption(), $pharmacy_products_edit->SizeCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SizeCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SizeCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->GiftCard->Required) { ?>
				elm = this.getElements("x" + infix + "_GiftCard");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->GiftCard->caption(), $pharmacy_products_edit->GiftCard->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GiftCard");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->GiftCard->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ToonLabel->Required) { ?>
				elm = this.getElements("x" + infix + "_ToonLabel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ToonLabel->caption(), $pharmacy_products_edit->ToonLabel->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ToonLabel");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ToonLabel->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->GarmentType->Required) { ?>
				elm = this.getElements("x" + infix + "_GarmentType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->GarmentType->caption(), $pharmacy_products_edit->GarmentType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GarmentType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->GarmentType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AgeGroup->Required) { ?>
				elm = this.getElements("x" + infix + "_AgeGroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AgeGroup->caption(), $pharmacy_products_edit->AgeGroup->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AgeGroup");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AgeGroup->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Season->Required) { ?>
				elm = this.getElements("x" + infix + "_Season");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Season->caption(), $pharmacy_products_edit->Season->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Season");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->Season->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DailyStockEntry->Required) { ?>
				elm = this.getElements("x" + infix + "_DailyStockEntry");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DailyStockEntry->caption(), $pharmacy_products_edit->DailyStockEntry->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DailyStockEntry");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DailyStockEntry->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ModifierApplicable->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifierApplicable");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ModifierApplicable->caption(), $pharmacy_products_edit->ModifierApplicable->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifierApplicable");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ModifierApplicable->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ModifierType->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifierType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ModifierType->caption(), $pharmacy_products_edit->ModifierType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ModifierType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ModifierType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AcceptZeroRate->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptZeroRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AcceptZeroRate->caption(), $pharmacy_products_edit->AcceptZeroRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptZeroRate");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AcceptZeroRate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ExciseDutyCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ExciseDutyCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ExciseDutyCode->caption(), $pharmacy_products_edit->ExciseDutyCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExciseDutyCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ExciseDutyCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IndentProductGroupCode->Required) { ?>
				elm = this.getElements("x" + infix + "_IndentProductGroupCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IndentProductGroupCode->caption(), $pharmacy_products_edit->IndentProductGroupCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IndentProductGroupCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IndentProductGroupCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IsMultiBatch->Required) { ?>
				elm = this.getElements("x" + infix + "_IsMultiBatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IsMultiBatch->caption(), $pharmacy_products_edit->IsMultiBatch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsMultiBatch");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IsMultiBatch->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IsSingleBatch->Required) { ?>
				elm = this.getElements("x" + infix + "_IsSingleBatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IsSingleBatch->caption(), $pharmacy_products_edit->IsSingleBatch->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsSingleBatch");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IsSingleBatch->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MarkUpRate1->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkUpRate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MarkUpRate1->caption(), $pharmacy_products_edit->MarkUpRate1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkUpRate1");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MarkUpRate1->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MarkDownRate1->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkDownRate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MarkDownRate1->caption(), $pharmacy_products_edit->MarkDownRate1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkDownRate1");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MarkDownRate1->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MarkUpRate2->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkUpRate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MarkUpRate2->caption(), $pharmacy_products_edit->MarkUpRate2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkUpRate2");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MarkUpRate2->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MarkDownRate2->Required) { ?>
				elm = this.getElements("x" + infix + "_MarkDownRate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MarkDownRate2->caption(), $pharmacy_products_edit->MarkDownRate2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MarkDownRate2");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MarkDownRate2->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->_Yield->Required) { ?>
				elm = this.getElements("x" + infix + "__Yield");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->_Yield->caption(), $pharmacy_products_edit->_Yield->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__Yield");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->_Yield->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->RefProductCode->Required) { ?>
				elm = this.getElements("x" + infix + "_RefProductCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->RefProductCode->caption(), $pharmacy_products_edit->RefProductCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RefProductCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->RefProductCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Volume->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Volume->caption(), $pharmacy_products_edit->Volume->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->Volume->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MeasurementID->Required) { ?>
				elm = this.getElements("x" + infix + "_MeasurementID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MeasurementID->caption(), $pharmacy_products_edit->MeasurementID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MeasurementID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MeasurementID->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CountryCode->Required) { ?>
				elm = this.getElements("x" + infix + "_CountryCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CountryCode->caption(), $pharmacy_products_edit->CountryCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CountryCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->CountryCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AcceptWMQty->Required) { ?>
				elm = this.getElements("x" + infix + "_AcceptWMQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AcceptWMQty->caption(), $pharmacy_products_edit->AcceptWMQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AcceptWMQty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AcceptWMQty->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SingleBatchBasedOnRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SingleBatchBasedOnRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SingleBatchBasedOnRate->caption(), $pharmacy_products_edit->SingleBatchBasedOnRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SingleBatchBasedOnRate");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SingleBatchBasedOnRate->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TenderNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TenderNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TenderNo->caption(), $pharmacy_products_edit->TenderNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->Required) { ?>
				elm = this.getElements("x" + infix + "_SingleBillMaximumSoldQtyFiled");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->caption(), $pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SingleBillMaximumSoldQtyFiled");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->Strength1->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Strength1->caption(), $pharmacy_products_edit->Strength1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->Strength2->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Strength2->caption(), $pharmacy_products_edit->Strength2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->Strength3->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Strength3->caption(), $pharmacy_products_edit->Strength3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->Strength4->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Strength4->caption(), $pharmacy_products_edit->Strength4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->Strength5->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->Strength5->caption(), $pharmacy_products_edit->Strength5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->IngredientCode1->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IngredientCode1->caption(), $pharmacy_products_edit->IngredientCode1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode1");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IngredientCode1->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IngredientCode2->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IngredientCode2->caption(), $pharmacy_products_edit->IngredientCode2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode2");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IngredientCode2->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IngredientCode3->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IngredientCode3->caption(), $pharmacy_products_edit->IngredientCode3->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode3");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IngredientCode3->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IngredientCode4->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IngredientCode4->caption(), $pharmacy_products_edit->IngredientCode4->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode4");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IngredientCode4->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IngredientCode5->Required) { ?>
				elm = this.getElements("x" + infix + "_IngredientCode5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IngredientCode5->caption(), $pharmacy_products_edit->IngredientCode5->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IngredientCode5");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IngredientCode5->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->OrderType->Required) { ?>
				elm = this.getElements("x" + infix + "_OrderType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->OrderType->caption(), $pharmacy_products_edit->OrderType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OrderType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->OrderType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->StockUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_StockUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->StockUOM->caption(), $pharmacy_products_edit->StockUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->StockUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PriceUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_PriceUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PriceUOM->caption(), $pharmacy_products_edit->PriceUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PriceUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PriceUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DefaultSaleUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultSaleUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DefaultSaleUOM->caption(), $pharmacy_products_edit->DefaultSaleUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultSaleUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DefaultSaleUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DefaultPurchaseUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultPurchaseUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DefaultPurchaseUOM->caption(), $pharmacy_products_edit->DefaultPurchaseUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultPurchaseUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DefaultPurchaseUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ReportingUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportingUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ReportingUOM->caption(), $pharmacy_products_edit->ReportingUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReportingUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ReportingUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->LastPurchasedUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_LastPurchasedUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LastPurchasedUOM->caption(), $pharmacy_products_edit->LastPurchasedUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastPurchasedUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->LastPurchasedUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TreatmentCodes->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentCodes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TreatmentCodes->caption(), $pharmacy_products_edit->TreatmentCodes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->InsuranceType->Required) { ?>
				elm = this.getElements("x" + infix + "_InsuranceType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->InsuranceType->caption(), $pharmacy_products_edit->InsuranceType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_InsuranceType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->InsuranceType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->CoverageGroupCodes->Required) { ?>
				elm = this.getElements("x" + infix + "_CoverageGroupCodes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->CoverageGroupCodes->caption(), $pharmacy_products_edit->CoverageGroupCodes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->MultipleUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_MultipleUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MultipleUOM->caption(), $pharmacy_products_edit->MultipleUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MultipleUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MultipleUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SalePriceComputation->Required) { ?>
				elm = this.getElements("x" + infix + "_SalePriceComputation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SalePriceComputation->caption(), $pharmacy_products_edit->SalePriceComputation->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalePriceComputation");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SalePriceComputation->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->StockCorrection->Required) { ?>
				elm = this.getElements("x" + infix + "_StockCorrection");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->StockCorrection->caption(), $pharmacy_products_edit->StockCorrection->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StockCorrection");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->StockCorrection->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->LBTPercentage->Required) { ?>
				elm = this.getElements("x" + infix + "_LBTPercentage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LBTPercentage->caption(), $pharmacy_products_edit->LBTPercentage->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LBTPercentage");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->LBTPercentage->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->SalesCommission->Required) { ?>
				elm = this.getElements("x" + infix + "_SalesCommission");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->SalesCommission->caption(), $pharmacy_products_edit->SalesCommission->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalesCommission");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->SalesCommission->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->LockedStock->Required) { ?>
				elm = this.getElements("x" + infix + "_LockedStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LockedStock->caption(), $pharmacy_products_edit->LockedStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LockedStock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->LockedStock->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MinMaxUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_MinMaxUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MinMaxUOM->caption(), $pharmacy_products_edit->MinMaxUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MinMaxUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MinMaxUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ExpiryMfrDateFormat->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpiryMfrDateFormat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ExpiryMfrDateFormat->caption(), $pharmacy_products_edit->ExpiryMfrDateFormat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpiryMfrDateFormat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ExpiryMfrDateFormat->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ProductLifeTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductLifeTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ProductLifeTime->caption(), $pharmacy_products_edit->ProductLifeTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductLifeTime");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ProductLifeTime->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IsCombo->Required) { ?>
				elm = this.getElements("x" + infix + "_IsCombo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IsCombo->caption(), $pharmacy_products_edit->IsCombo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsCombo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IsCombo->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ComboTypeCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ComboTypeCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ComboTypeCode->caption(), $pharmacy_products_edit->ComboTypeCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComboTypeCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ComboTypeCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount6->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount6->caption(), $pharmacy_products_edit->AttributeCount6->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount6");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount6->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount7->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount7->caption(), $pharmacy_products_edit->AttributeCount7->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount7");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount7->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount8->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount8->caption(), $pharmacy_products_edit->AttributeCount8->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount8");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount8->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount9->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount9->caption(), $pharmacy_products_edit->AttributeCount9->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount9");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount9->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AttributeCount10->Required) { ?>
				elm = this.getElements("x" + infix + "_AttributeCount10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AttributeCount10->caption(), $pharmacy_products_edit->AttributeCount10->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AttributeCount10");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AttributeCount10->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->LabourCharge->Required) { ?>
				elm = this.getElements("x" + infix + "_LabourCharge");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LabourCharge->caption(), $pharmacy_products_edit->LabourCharge->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LabourCharge");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->LabourCharge->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AffectOtherCharge->Required) { ?>
				elm = this.getElements("x" + infix + "_AffectOtherCharge");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AffectOtherCharge->caption(), $pharmacy_products_edit->AffectOtherCharge->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AffectOtherCharge");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AffectOtherCharge->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DosageInfo->Required) { ?>
				elm = this.getElements("x" + infix + "_DosageInfo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DosageInfo->caption(), $pharmacy_products_edit->DosageInfo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->DosageType->Required) { ?>
				elm = this.getElements("x" + infix + "_DosageType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DosageType->caption(), $pharmacy_products_edit->DosageType->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DosageType");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DosageType->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->DefaultIndentUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_DefaultIndentUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->DefaultIndentUOM->caption(), $pharmacy_products_edit->DefaultIndentUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DefaultIndentUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->DefaultIndentUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PromoTag->Required) { ?>
				elm = this.getElements("x" + infix + "_PromoTag");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PromoTag->caption(), $pharmacy_products_edit->PromoTag->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PromoTag");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PromoTag->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->BillLevelPromoTag->Required) { ?>
				elm = this.getElements("x" + infix + "_BillLevelPromoTag");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->BillLevelPromoTag->caption(), $pharmacy_products_edit->BillLevelPromoTag->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillLevelPromoTag");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->BillLevelPromoTag->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->IsMRPProduct->Required) { ?>
				elm = this.getElements("x" + infix + "_IsMRPProduct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->IsMRPProduct->caption(), $pharmacy_products_edit->IsMRPProduct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IsMRPProduct");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->IsMRPProduct->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MrpList->Required) { ?>
				elm = this.getElements("x" + infix + "_MrpList");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MrpList->caption(), $pharmacy_products_edit->MrpList->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->AlternateSaleUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_AlternateSaleUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AlternateSaleUOM->caption(), $pharmacy_products_edit->AlternateSaleUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AlternateSaleUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AlternateSaleUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->FreeUOM->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeUOM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FreeUOM->caption(), $pharmacy_products_edit->FreeUOM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeUOM");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->FreeUOM->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->MarketedCode->Required) { ?>
				elm = this.getElements("x" + infix + "_MarketedCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MarketedCode->caption(), $pharmacy_products_edit->MarketedCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_products_edit->MinimumSalePrice->Required) { ?>
				elm = this.getElements("x" + infix + "_MinimumSalePrice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->MinimumSalePrice->caption(), $pharmacy_products_edit->MinimumSalePrice->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MinimumSalePrice");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->MinimumSalePrice->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PRate1->Required) { ?>
				elm = this.getElements("x" + infix + "_PRate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PRate1->caption(), $pharmacy_products_edit->PRate1->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PRate1");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PRate1->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->PRate2->Required) { ?>
				elm = this.getElements("x" + infix + "_PRate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->PRate2->caption(), $pharmacy_products_edit->PRate2->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PRate2");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->PRate2->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->LPItemCost->Required) { ?>
				elm = this.getElements("x" + infix + "_LPItemCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->LPItemCost->caption(), $pharmacy_products_edit->LPItemCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LPItemCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->LPItemCost->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->FixedItemCost->Required) { ?>
				elm = this.getElements("x" + infix + "_FixedItemCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->FixedItemCost->caption(), $pharmacy_products_edit->FixedItemCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FixedItemCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->FixedItemCost->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->HSNId->Required) { ?>
				elm = this.getElements("x" + infix + "_HSNId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->HSNId->caption(), $pharmacy_products_edit->HSNId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HSNId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->HSNId->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->TaxInclusive->Required) { ?>
				elm = this.getElements("x" + infix + "_TaxInclusive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->TaxInclusive->caption(), $pharmacy_products_edit->TaxInclusive->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TaxInclusive");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->TaxInclusive->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->EligibleforWarranty->Required) { ?>
				elm = this.getElements("x" + infix + "_EligibleforWarranty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->EligibleforWarranty->caption(), $pharmacy_products_edit->EligibleforWarranty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EligibleforWarranty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->EligibleforWarranty->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->NoofMonthsWarranty->Required) { ?>
				elm = this.getElements("x" + infix + "_NoofMonthsWarranty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->NoofMonthsWarranty->caption(), $pharmacy_products_edit->NoofMonthsWarranty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoofMonthsWarranty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->NoofMonthsWarranty->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->ComputeTaxonCost->Required) { ?>
				elm = this.getElements("x" + infix + "_ComputeTaxonCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->ComputeTaxonCost->caption(), $pharmacy_products_edit->ComputeTaxonCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ComputeTaxonCost");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->ComputeTaxonCost->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->HasEmptyBottleTrack->Required) { ?>
				elm = this.getElements("x" + infix + "_HasEmptyBottleTrack");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->HasEmptyBottleTrack->caption(), $pharmacy_products_edit->HasEmptyBottleTrack->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HasEmptyBottleTrack");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->HasEmptyBottleTrack->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->EmptyBottleReferenceCode->Required) { ?>
				elm = this.getElements("x" + infix + "_EmptyBottleReferenceCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->EmptyBottleReferenceCode->caption(), $pharmacy_products_edit->EmptyBottleReferenceCode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EmptyBottleReferenceCode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->EmptyBottleReferenceCode->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->AdditionalCESSAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_AdditionalCESSAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->AdditionalCESSAmount->caption(), $pharmacy_products_edit->AdditionalCESSAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AdditionalCESSAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->AdditionalCESSAmount->errorMessage()) ?>");
			<?php if ($pharmacy_products_edit->EmptyBottleRate->Required) { ?>
				elm = this.getElements("x" + infix + "_EmptyBottleRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_products_edit->EmptyBottleRate->caption(), $pharmacy_products_edit->EmptyBottleRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EmptyBottleRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_products_edit->EmptyBottleRate->errorMessage()) ?>");

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
	fpharmacy_productsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_productsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpharmacy_productsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_products_edit->showPageHeader(); ?>
<?php
$pharmacy_products_edit->showMessage();
?>
<form name="fpharmacy_productsedit" id="fpharmacy_productsedit" class="<?php echo $pharmacy_products_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_products_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_products_edit->ProductCode->Visible) { // ProductCode ?>
	<div id="r_ProductCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductCode->caption() ?><?php echo $pharmacy_products_edit->ProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductCode">
<span<?php echo $pharmacy_products_edit->ProductCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_products_edit->ProductCode->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_products" data-field="x_ProductCode" name="x_ProductCode" id="x_ProductCode" value="<?php echo HtmlEncode($pharmacy_products_edit->ProductCode->CurrentValue) ?>">
<?php echo $pharmacy_products_edit->ProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductName->Visible) { // ProductName ?>
	<div id="r_ProductName" class="form-group row">
		<label id="elh_pharmacy_products_ProductName" for="x_ProductName" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductName->caption() ?><?php echo $pharmacy_products_edit->ProductName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductName">
<input type="text" data-table="pharmacy_products" data-field="x_ProductName" name="x_ProductName" id="x_ProductName" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductName->EditValue ?>"<?php echo $pharmacy_products_edit->ProductName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DivisionCode->Visible) { // DivisionCode ?>
	<div id="r_DivisionCode" class="form-group row">
		<label id="elh_pharmacy_products_DivisionCode" for="x_DivisionCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DivisionCode->caption() ?><?php echo $pharmacy_products_edit->DivisionCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DivisionCode->cellAttributes() ?>>
<span id="el_pharmacy_products_DivisionCode">
<input type="text" data-table="pharmacy_products" data-field="x_DivisionCode" name="x_DivisionCode" id="x_DivisionCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DivisionCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DivisionCode->EditValue ?>"<?php echo $pharmacy_products_edit->DivisionCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DivisionCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ManufacturerCode->Visible) { // ManufacturerCode ?>
	<div id="r_ManufacturerCode" class="form-group row">
		<label id="elh_pharmacy_products_ManufacturerCode" for="x_ManufacturerCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ManufacturerCode->caption() ?><?php echo $pharmacy_products_edit->ManufacturerCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ManufacturerCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ManufacturerCode">
<input type="text" data-table="pharmacy_products" data-field="x_ManufacturerCode" name="x_ManufacturerCode" id="x_ManufacturerCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ManufacturerCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ManufacturerCode->EditValue ?>"<?php echo $pharmacy_products_edit->ManufacturerCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ManufacturerCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SupplierCode->Visible) { // SupplierCode ?>
	<div id="r_SupplierCode" class="form-group row">
		<label id="elh_pharmacy_products_SupplierCode" for="x_SupplierCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SupplierCode->caption() ?><?php echo $pharmacy_products_edit->SupplierCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SupplierCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SupplierCode">
<input type="text" data-table="pharmacy_products" data-field="x_SupplierCode" name="x_SupplierCode" id="x_SupplierCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SupplierCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SupplierCode->EditValue ?>"<?php echo $pharmacy_products_edit->SupplierCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SupplierCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
	<div id="r_AlternateSupplierCodes" class="form-group row">
		<label id="elh_pharmacy_products_AlternateSupplierCodes" for="x_AlternateSupplierCodes" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AlternateSupplierCodes->caption() ?><?php echo $pharmacy_products_edit->AlternateSupplierCodes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSupplierCodes">
<input type="text" data-table="pharmacy_products" data-field="x_AlternateSupplierCodes" name="x_AlternateSupplierCodes" id="x_AlternateSupplierCodes" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AlternateSupplierCodes->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AlternateSupplierCodes->EditValue ?>"<?php echo $pharmacy_products_edit->AlternateSupplierCodes->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AlternateSupplierCodes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AlternateProductCode->Visible) { // AlternateProductCode ?>
	<div id="r_AlternateProductCode" class="form-group row">
		<label id="elh_pharmacy_products_AlternateProductCode" for="x_AlternateProductCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AlternateProductCode->caption() ?><?php echo $pharmacy_products_edit->AlternateProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AlternateProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_AlternateProductCode" name="x_AlternateProductCode" id="x_AlternateProductCode" size="30" maxlength="120" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AlternateProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AlternateProductCode->EditValue ?>"<?php echo $pharmacy_products_edit->AlternateProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AlternateProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->UniversalProductCode->Visible) { // UniversalProductCode ?>
	<div id="r_UniversalProductCode" class="form-group row">
		<label id="elh_pharmacy_products_UniversalProductCode" for="x_UniversalProductCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->UniversalProductCode->caption() ?><?php echo $pharmacy_products_edit->UniversalProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->UniversalProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_UniversalProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_UniversalProductCode" name="x_UniversalProductCode" id="x_UniversalProductCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->UniversalProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->UniversalProductCode->EditValue ?>"<?php echo $pharmacy_products_edit->UniversalProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->UniversalProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BookProductCode->Visible) { // BookProductCode ?>
	<div id="r_BookProductCode" class="form-group row">
		<label id="elh_pharmacy_products_BookProductCode" for="x_BookProductCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BookProductCode->caption() ?><?php echo $pharmacy_products_edit->BookProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BookProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BookProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_BookProductCode" name="x_BookProductCode" id="x_BookProductCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BookProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BookProductCode->EditValue ?>"<?php echo $pharmacy_products_edit->BookProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BookProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->OldCode->Visible) { // OldCode ?>
	<div id="r_OldCode" class="form-group row">
		<label id="elh_pharmacy_products_OldCode" for="x_OldCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->OldCode->caption() ?><?php echo $pharmacy_products_edit->OldCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->OldCode->cellAttributes() ?>>
<span id="el_pharmacy_products_OldCode">
<input type="text" data-table="pharmacy_products" data-field="x_OldCode" name="x_OldCode" id="x_OldCode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->OldCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->OldCode->EditValue ?>"<?php echo $pharmacy_products_edit->OldCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->OldCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProtectedProducts->Visible) { // ProtectedProducts ?>
	<div id="r_ProtectedProducts" class="form-group row">
		<label id="elh_pharmacy_products_ProtectedProducts" for="x_ProtectedProducts" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProtectedProducts->caption() ?><?php echo $pharmacy_products_edit->ProtectedProducts->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProtectedProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_ProtectedProducts">
<input type="text" data-table="pharmacy_products" data-field="x_ProtectedProducts" name="x_ProtectedProducts" id="x_ProtectedProducts" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProtectedProducts->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProtectedProducts->EditValue ?>"<?php echo $pharmacy_products_edit->ProtectedProducts->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProtectedProducts->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductFullName->Visible) { // ProductFullName ?>
	<div id="r_ProductFullName" class="form-group row">
		<label id="elh_pharmacy_products_ProductFullName" for="x_ProductFullName" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductFullName->caption() ?><?php echo $pharmacy_products_edit->ProductFullName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductFullName->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductFullName">
<input type="text" data-table="pharmacy_products" data-field="x_ProductFullName" name="x_ProductFullName" id="x_ProductFullName" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductFullName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductFullName->EditValue ?>"<?php echo $pharmacy_products_edit->ProductFullName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductFullName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
	<div id="r_UnitOfMeasure" class="form-group row">
		<label id="elh_pharmacy_products_UnitOfMeasure" for="x_UnitOfMeasure" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->UnitOfMeasure->caption() ?><?php echo $pharmacy_products_edit->UnitOfMeasure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->UnitOfMeasure->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitOfMeasure">
<input type="text" data-table="pharmacy_products" data-field="x_UnitOfMeasure" name="x_UnitOfMeasure" id="x_UnitOfMeasure" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->UnitOfMeasure->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->UnitOfMeasure->EditValue ?>"<?php echo $pharmacy_products_edit->UnitOfMeasure->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->UnitOfMeasure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->UnitDescription->Visible) { // UnitDescription ?>
	<div id="r_UnitDescription" class="form-group row">
		<label id="elh_pharmacy_products_UnitDescription" for="x_UnitDescription" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->UnitDescription->caption() ?><?php echo $pharmacy_products_edit->UnitDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->UnitDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitDescription">
<input type="text" data-table="pharmacy_products" data-field="x_UnitDescription" name="x_UnitDescription" id="x_UnitDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->UnitDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->UnitDescription->EditValue ?>"<?php echo $pharmacy_products_edit->UnitDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->UnitDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BulkDescription->Visible) { // BulkDescription ?>
	<div id="r_BulkDescription" class="form-group row">
		<label id="elh_pharmacy_products_BulkDescription" for="x_BulkDescription" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BulkDescription->caption() ?><?php echo $pharmacy_products_edit->BulkDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BulkDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BulkDescription">
<input type="text" data-table="pharmacy_products" data-field="x_BulkDescription" name="x_BulkDescription" id="x_BulkDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BulkDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BulkDescription->EditValue ?>"<?php echo $pharmacy_products_edit->BulkDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BulkDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BarCodeDescription->Visible) { // BarCodeDescription ?>
	<div id="r_BarCodeDescription" class="form-group row">
		<label id="elh_pharmacy_products_BarCodeDescription" for="x_BarCodeDescription" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BarCodeDescription->caption() ?><?php echo $pharmacy_products_edit->BarCodeDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BarCodeDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDescription">
<input type="text" data-table="pharmacy_products" data-field="x_BarCodeDescription" name="x_BarCodeDescription" id="x_BarCodeDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BarCodeDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BarCodeDescription->EditValue ?>"<?php echo $pharmacy_products_edit->BarCodeDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BarCodeDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PackageInformation->Visible) { // PackageInformation ?>
	<div id="r_PackageInformation" class="form-group row">
		<label id="elh_pharmacy_products_PackageInformation" for="x_PackageInformation" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PackageInformation->caption() ?><?php echo $pharmacy_products_edit->PackageInformation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageInformation">
<input type="text" data-table="pharmacy_products" data-field="x_PackageInformation" name="x_PackageInformation" id="x_PackageInformation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PackageInformation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PackageInformation->EditValue ?>"<?php echo $pharmacy_products_edit->PackageInformation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PackageInformation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PackageId->Visible) { // PackageId ?>
	<div id="r_PackageId" class="form-group row">
		<label id="elh_pharmacy_products_PackageId" for="x_PackageId" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PackageId->caption() ?><?php echo $pharmacy_products_edit->PackageId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PackageId->cellAttributes() ?>>
<span id="el_pharmacy_products_PackageId">
<input type="text" data-table="pharmacy_products" data-field="x_PackageId" name="x_PackageId" id="x_PackageId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PackageId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PackageId->EditValue ?>"<?php echo $pharmacy_products_edit->PackageId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PackageId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Weight->Visible) { // Weight ?>
	<div id="r_Weight" class="form-group row">
		<label id="elh_pharmacy_products_Weight" for="x_Weight" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Weight->caption() ?><?php echo $pharmacy_products_edit->Weight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Weight->cellAttributes() ?>>
<span id="el_pharmacy_products_Weight">
<input type="text" data-table="pharmacy_products" data-field="x_Weight" name="x_Weight" id="x_Weight" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Weight->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Weight->EditValue ?>"<?php echo $pharmacy_products_edit->Weight->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Weight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AllowFractions->Visible) { // AllowFractions ?>
	<div id="r_AllowFractions" class="form-group row">
		<label id="elh_pharmacy_products_AllowFractions" for="x_AllowFractions" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AllowFractions->caption() ?><?php echo $pharmacy_products_edit->AllowFractions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AllowFractions->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowFractions">
<input type="text" data-table="pharmacy_products" data-field="x_AllowFractions" name="x_AllowFractions" id="x_AllowFractions" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AllowFractions->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AllowFractions->EditValue ?>"<?php echo $pharmacy_products_edit->AllowFractions->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AllowFractions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
	<div id="r_MinimumStockLevel" class="form-group row">
		<label id="elh_pharmacy_products_MinimumStockLevel" for="x_MinimumStockLevel" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MinimumStockLevel->caption() ?><?php echo $pharmacy_products_edit->MinimumStockLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MinimumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumStockLevel">
<input type="text" data-table="pharmacy_products" data-field="x_MinimumStockLevel" name="x_MinimumStockLevel" id="x_MinimumStockLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MinimumStockLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MinimumStockLevel->EditValue ?>"<?php echo $pharmacy_products_edit->MinimumStockLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MinimumStockLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
	<div id="r_MaximumStockLevel" class="form-group row">
		<label id="elh_pharmacy_products_MaximumStockLevel" for="x_MaximumStockLevel" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MaximumStockLevel->caption() ?><?php echo $pharmacy_products_edit->MaximumStockLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MaximumStockLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_MaximumStockLevel">
<input type="text" data-table="pharmacy_products" data-field="x_MaximumStockLevel" name="x_MaximumStockLevel" id="x_MaximumStockLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MaximumStockLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MaximumStockLevel->EditValue ?>"<?php echo $pharmacy_products_edit->MaximumStockLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MaximumStockLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ReorderLevel->Visible) { // ReorderLevel ?>
	<div id="r_ReorderLevel" class="form-group row">
		<label id="elh_pharmacy_products_ReorderLevel" for="x_ReorderLevel" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ReorderLevel->caption() ?><?php echo $pharmacy_products_edit->ReorderLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ReorderLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_ReorderLevel">
<input type="text" data-table="pharmacy_products" data-field="x_ReorderLevel" name="x_ReorderLevel" id="x_ReorderLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ReorderLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ReorderLevel->EditValue ?>"<?php echo $pharmacy_products_edit->ReorderLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ReorderLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MinMaxRatio->Visible) { // MinMaxRatio ?>
	<div id="r_MinMaxRatio" class="form-group row">
		<label id="elh_pharmacy_products_MinMaxRatio" for="x_MinMaxRatio" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MinMaxRatio->caption() ?><?php echo $pharmacy_products_edit->MinMaxRatio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxRatio">
<input type="text" data-table="pharmacy_products" data-field="x_MinMaxRatio" name="x_MinMaxRatio" id="x_MinMaxRatio" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MinMaxRatio->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MinMaxRatio->EditValue ?>"<?php echo $pharmacy_products_edit->MinMaxRatio->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MinMaxRatio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
	<div id="r_AutoMinMaxRatio" class="form-group row">
		<label id="elh_pharmacy_products_AutoMinMaxRatio" for="x_AutoMinMaxRatio" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AutoMinMaxRatio->caption() ?><?php echo $pharmacy_products_edit->AutoMinMaxRatio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_AutoMinMaxRatio">
<input type="text" data-table="pharmacy_products" data-field="x_AutoMinMaxRatio" name="x_AutoMinMaxRatio" id="x_AutoMinMaxRatio" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AutoMinMaxRatio->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AutoMinMaxRatio->EditValue ?>"<?php echo $pharmacy_products_edit->AutoMinMaxRatio->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AutoMinMaxRatio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ScheduleCode->Visible) { // ScheduleCode ?>
	<div id="r_ScheduleCode" class="form-group row">
		<label id="elh_pharmacy_products_ScheduleCode" for="x_ScheduleCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ScheduleCode->caption() ?><?php echo $pharmacy_products_edit->ScheduleCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ScheduleCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleCode">
<input type="text" data-table="pharmacy_products" data-field="x_ScheduleCode" name="x_ScheduleCode" id="x_ScheduleCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ScheduleCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ScheduleCode->EditValue ?>"<?php echo $pharmacy_products_edit->ScheduleCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ScheduleCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->RopRatio->Visible) { // RopRatio ?>
	<div id="r_RopRatio" class="form-group row">
		<label id="elh_pharmacy_products_RopRatio" for="x_RopRatio" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->RopRatio->caption() ?><?php echo $pharmacy_products_edit->RopRatio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->RopRatio->cellAttributes() ?>>
<span id="el_pharmacy_products_RopRatio">
<input type="text" data-table="pharmacy_products" data-field="x_RopRatio" name="x_RopRatio" id="x_RopRatio" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->RopRatio->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->RopRatio->EditValue ?>"<?php echo $pharmacy_products_edit->RopRatio->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->RopRatio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label id="elh_pharmacy_products_MRP" for="x_MRP" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MRP->caption() ?><?php echo $pharmacy_products_edit->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MRP->cellAttributes() ?>>
<span id="el_pharmacy_products_MRP">
<input type="text" data-table="pharmacy_products" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MRP->EditValue ?>"<?php echo $pharmacy_products_edit->MRP->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PurchasePrice->Visible) { // PurchasePrice ?>
	<div id="r_PurchasePrice" class="form-group row">
		<label id="elh_pharmacy_products_PurchasePrice" for="x_PurchasePrice" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PurchasePrice->caption() ?><?php echo $pharmacy_products_edit->PurchasePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PurchasePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchasePrice">
<input type="text" data-table="pharmacy_products" data-field="x_PurchasePrice" name="x_PurchasePrice" id="x_PurchasePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PurchasePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PurchasePrice->EditValue ?>"<?php echo $pharmacy_products_edit->PurchasePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PurchasePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PurchaseUnit->Visible) { // PurchaseUnit ?>
	<div id="r_PurchaseUnit" class="form-group row">
		<label id="elh_pharmacy_products_PurchaseUnit" for="x_PurchaseUnit" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PurchaseUnit->caption() ?><?php echo $pharmacy_products_edit->PurchaseUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PurchaseUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseUnit">
<input type="text" data-table="pharmacy_products" data-field="x_PurchaseUnit" name="x_PurchaseUnit" id="x_PurchaseUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PurchaseUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PurchaseUnit->EditValue ?>"<?php echo $pharmacy_products_edit->PurchaseUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PurchaseUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
	<div id="r_PurchaseTaxCode" class="form-group row">
		<label id="elh_pharmacy_products_PurchaseTaxCode" for="x_PurchaseTaxCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PurchaseTaxCode->caption() ?><?php echo $pharmacy_products_edit->PurchaseTaxCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PurchaseTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PurchaseTaxCode">
<input type="text" data-table="pharmacy_products" data-field="x_PurchaseTaxCode" name="x_PurchaseTaxCode" id="x_PurchaseTaxCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PurchaseTaxCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PurchaseTaxCode->EditValue ?>"<?php echo $pharmacy_products_edit->PurchaseTaxCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PurchaseTaxCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AllowDirectInward->Visible) { // AllowDirectInward ?>
	<div id="r_AllowDirectInward" class="form-group row">
		<label id="elh_pharmacy_products_AllowDirectInward" for="x_AllowDirectInward" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AllowDirectInward->caption() ?><?php echo $pharmacy_products_edit->AllowDirectInward->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AllowDirectInward->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowDirectInward">
<input type="text" data-table="pharmacy_products" data-field="x_AllowDirectInward" name="x_AllowDirectInward" id="x_AllowDirectInward" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AllowDirectInward->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AllowDirectInward->EditValue ?>"<?php echo $pharmacy_products_edit->AllowDirectInward->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AllowDirectInward->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SalePrice->Visible) { // SalePrice ?>
	<div id="r_SalePrice" class="form-group row">
		<label id="elh_pharmacy_products_SalePrice" for="x_SalePrice" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SalePrice->caption() ?><?php echo $pharmacy_products_edit->SalePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePrice">
<input type="text" data-table="pharmacy_products" data-field="x_SalePrice" name="x_SalePrice" id="x_SalePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SalePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SalePrice->EditValue ?>"<?php echo $pharmacy_products_edit->SalePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SalePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SaleUnit->Visible) { // SaleUnit ?>
	<div id="r_SaleUnit" class="form-group row">
		<label id="elh_pharmacy_products_SaleUnit" for="x_SaleUnit" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SaleUnit->caption() ?><?php echo $pharmacy_products_edit->SaleUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SaleUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleUnit">
<input type="text" data-table="pharmacy_products" data-field="x_SaleUnit" name="x_SaleUnit" id="x_SaleUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SaleUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SaleUnit->EditValue ?>"<?php echo $pharmacy_products_edit->SaleUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SaleUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SalesTaxCode->Visible) { // SalesTaxCode ?>
	<div id="r_SalesTaxCode" class="form-group row">
		<label id="elh_pharmacy_products_SalesTaxCode" for="x_SalesTaxCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SalesTaxCode->caption() ?><?php echo $pharmacy_products_edit->SalesTaxCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SalesTaxCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesTaxCode">
<input type="text" data-table="pharmacy_products" data-field="x_SalesTaxCode" name="x_SalesTaxCode" id="x_SalesTaxCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SalesTaxCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SalesTaxCode->EditValue ?>"<?php echo $pharmacy_products_edit->SalesTaxCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SalesTaxCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->StockReceived->Visible) { // StockReceived ?>
	<div id="r_StockReceived" class="form-group row">
		<label id="elh_pharmacy_products_StockReceived" for="x_StockReceived" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->StockReceived->caption() ?><?php echo $pharmacy_products_edit->StockReceived->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->StockReceived->cellAttributes() ?>>
<span id="el_pharmacy_products_StockReceived">
<input type="text" data-table="pharmacy_products" data-field="x_StockReceived" name="x_StockReceived" id="x_StockReceived" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->StockReceived->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->StockReceived->EditValue ?>"<?php echo $pharmacy_products_edit->StockReceived->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->StockReceived->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TotalStock->Visible) { // TotalStock ?>
	<div id="r_TotalStock" class="form-group row">
		<label id="elh_pharmacy_products_TotalStock" for="x_TotalStock" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TotalStock->caption() ?><?php echo $pharmacy_products_edit->TotalStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TotalStock->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalStock">
<input type="text" data-table="pharmacy_products" data-field="x_TotalStock" name="x_TotalStock" id="x_TotalStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TotalStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TotalStock->EditValue ?>"<?php echo $pharmacy_products_edit->TotalStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TotalStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->StockType->Visible) { // StockType ?>
	<div id="r_StockType" class="form-group row">
		<label id="elh_pharmacy_products_StockType" for="x_StockType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->StockType->caption() ?><?php echo $pharmacy_products_edit->StockType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->StockType->cellAttributes() ?>>
<span id="el_pharmacy_products_StockType">
<input type="text" data-table="pharmacy_products" data-field="x_StockType" name="x_StockType" id="x_StockType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->StockType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->StockType->EditValue ?>"<?php echo $pharmacy_products_edit->StockType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->StockType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->StockCheckDate->Visible) { // StockCheckDate ?>
	<div id="r_StockCheckDate" class="form-group row">
		<label id="elh_pharmacy_products_StockCheckDate" for="x_StockCheckDate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->StockCheckDate->caption() ?><?php echo $pharmacy_products_edit->StockCheckDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->StockCheckDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCheckDate">
<input type="text" data-table="pharmacy_products" data-field="x_StockCheckDate" name="x_StockCheckDate" id="x_StockCheckDate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->StockCheckDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->StockCheckDate->EditValue ?>"<?php echo $pharmacy_products_edit->StockCheckDate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->StockCheckDate->ReadOnly && !$pharmacy_products_edit->StockCheckDate->Disabled && !isset($pharmacy_products_edit->StockCheckDate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->StockCheckDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_StockCheckDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->StockCheckDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
	<div id="r_StockAdjustmentDate" class="form-group row">
		<label id="elh_pharmacy_products_StockAdjustmentDate" for="x_StockAdjustmentDate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->StockAdjustmentDate->caption() ?><?php echo $pharmacy_products_edit->StockAdjustmentDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->StockAdjustmentDate->cellAttributes() ?>>
<span id="el_pharmacy_products_StockAdjustmentDate">
<input type="text" data-table="pharmacy_products" data-field="x_StockAdjustmentDate" name="x_StockAdjustmentDate" id="x_StockAdjustmentDate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->StockAdjustmentDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->StockAdjustmentDate->EditValue ?>"<?php echo $pharmacy_products_edit->StockAdjustmentDate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->StockAdjustmentDate->ReadOnly && !$pharmacy_products_edit->StockAdjustmentDate->Disabled && !isset($pharmacy_products_edit->StockAdjustmentDate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->StockAdjustmentDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_StockAdjustmentDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->StockAdjustmentDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_products_Remarks" for="x_Remarks" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Remarks->caption() ?><?php echo $pharmacy_products_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_products_Remarks">
<input type="text" data-table="pharmacy_products" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Remarks->EditValue ?>"<?php echo $pharmacy_products_edit->Remarks->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CostCentre->Visible) { // CostCentre ?>
	<div id="r_CostCentre" class="form-group row">
		<label id="elh_pharmacy_products_CostCentre" for="x_CostCentre" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CostCentre->caption() ?><?php echo $pharmacy_products_edit->CostCentre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CostCentre->cellAttributes() ?>>
<span id="el_pharmacy_products_CostCentre">
<input type="text" data-table="pharmacy_products" data-field="x_CostCentre" name="x_CostCentre" id="x_CostCentre" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CostCentre->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CostCentre->EditValue ?>"<?php echo $pharmacy_products_edit->CostCentre->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CostCentre->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductType->Visible) { // ProductType ?>
	<div id="r_ProductType" class="form-group row">
		<label id="elh_pharmacy_products_ProductType" for="x_ProductType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductType->caption() ?><?php echo $pharmacy_products_edit->ProductType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductType->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductType">
<input type="text" data-table="pharmacy_products" data-field="x_ProductType" name="x_ProductType" id="x_ProductType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductType->EditValue ?>"<?php echo $pharmacy_products_edit->ProductType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TaxAmount->Visible) { // TaxAmount ?>
	<div id="r_TaxAmount" class="form-group row">
		<label id="elh_pharmacy_products_TaxAmount" for="x_TaxAmount" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TaxAmount->caption() ?><?php echo $pharmacy_products_edit->TaxAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TaxAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxAmount">
<input type="text" data-table="pharmacy_products" data-field="x_TaxAmount" name="x_TaxAmount" id="x_TaxAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TaxAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TaxAmount->EditValue ?>"<?php echo $pharmacy_products_edit->TaxAmount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TaxAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TaxId->Visible) { // TaxId ?>
	<div id="r_TaxId" class="form-group row">
		<label id="elh_pharmacy_products_TaxId" for="x_TaxId" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TaxId->caption() ?><?php echo $pharmacy_products_edit->TaxId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TaxId->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxId">
<input type="text" data-table="pharmacy_products" data-field="x_TaxId" name="x_TaxId" id="x_TaxId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TaxId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TaxId->EditValue ?>"<?php echo $pharmacy_products_edit->TaxId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TaxId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
	<div id="r_ResaleTaxApplicable" class="form-group row">
		<label id="elh_pharmacy_products_ResaleTaxApplicable" for="x_ResaleTaxApplicable" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ResaleTaxApplicable->caption() ?><?php echo $pharmacy_products_edit->ResaleTaxApplicable->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ResaleTaxApplicable">
<input type="text" data-table="pharmacy_products" data-field="x_ResaleTaxApplicable" name="x_ResaleTaxApplicable" id="x_ResaleTaxApplicable" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ResaleTaxApplicable->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ResaleTaxApplicable->EditValue ?>"<?php echo $pharmacy_products_edit->ResaleTaxApplicable->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ResaleTaxApplicable->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CstOtherTax->Visible) { // CstOtherTax ?>
	<div id="r_CstOtherTax" class="form-group row">
		<label id="elh_pharmacy_products_CstOtherTax" for="x_CstOtherTax" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CstOtherTax->caption() ?><?php echo $pharmacy_products_edit->CstOtherTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CstOtherTax->cellAttributes() ?>>
<span id="el_pharmacy_products_CstOtherTax">
<input type="text" data-table="pharmacy_products" data-field="x_CstOtherTax" name="x_CstOtherTax" id="x_CstOtherTax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CstOtherTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CstOtherTax->EditValue ?>"<?php echo $pharmacy_products_edit->CstOtherTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CstOtherTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TotalTax->Visible) { // TotalTax ?>
	<div id="r_TotalTax" class="form-group row">
		<label id="elh_pharmacy_products_TotalTax" for="x_TotalTax" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TotalTax->caption() ?><?php echo $pharmacy_products_edit->TotalTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TotalTax->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalTax">
<input type="text" data-table="pharmacy_products" data-field="x_TotalTax" name="x_TotalTax" id="x_TotalTax" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TotalTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TotalTax->EditValue ?>"<?php echo $pharmacy_products_edit->TotalTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TotalTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ItemCost->Visible) { // ItemCost ?>
	<div id="r_ItemCost" class="form-group row">
		<label id="elh_pharmacy_products_ItemCost" for="x_ItemCost" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ItemCost->caption() ?><?php echo $pharmacy_products_edit->ItemCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ItemCost">
<input type="text" data-table="pharmacy_products" data-field="x_ItemCost" name="x_ItemCost" id="x_ItemCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ItemCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ItemCost->EditValue ?>"<?php echo $pharmacy_products_edit->ItemCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ItemCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ExpiryDate->Visible) { // ExpiryDate ?>
	<div id="r_ExpiryDate" class="form-group row">
		<label id="elh_pharmacy_products_ExpiryDate" for="x_ExpiryDate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ExpiryDate->caption() ?><?php echo $pharmacy_products_edit->ExpiryDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ExpiryDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryDate">
<input type="text" data-table="pharmacy_products" data-field="x_ExpiryDate" name="x_ExpiryDate" id="x_ExpiryDate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ExpiryDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ExpiryDate->EditValue ?>"<?php echo $pharmacy_products_edit->ExpiryDate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->ExpiryDate->ReadOnly && !$pharmacy_products_edit->ExpiryDate->Disabled && !isset($pharmacy_products_edit->ExpiryDate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->ExpiryDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_ExpiryDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->ExpiryDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BatchDescription->Visible) { // BatchDescription ?>
	<div id="r_BatchDescription" class="form-group row">
		<label id="elh_pharmacy_products_BatchDescription" for="x_BatchDescription" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BatchDescription->caption() ?><?php echo $pharmacy_products_edit->BatchDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BatchDescription->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchDescription">
<input type="text" data-table="pharmacy_products" data-field="x_BatchDescription" name="x_BatchDescription" id="x_BatchDescription" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BatchDescription->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BatchDescription->EditValue ?>"<?php echo $pharmacy_products_edit->BatchDescription->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BatchDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FreeScheme->Visible) { // FreeScheme ?>
	<div id="r_FreeScheme" class="form-group row">
		<label id="elh_pharmacy_products_FreeScheme" for="x_FreeScheme" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FreeScheme->caption() ?><?php echo $pharmacy_products_edit->FreeScheme->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FreeScheme->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeScheme">
<input type="text" data-table="pharmacy_products" data-field="x_FreeScheme" name="x_FreeScheme" id="x_FreeScheme" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FreeScheme->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FreeScheme->EditValue ?>"<?php echo $pharmacy_products_edit->FreeScheme->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->FreeScheme->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
	<div id="r_CashDiscountEligibility" class="form-group row">
		<label id="elh_pharmacy_products_CashDiscountEligibility" for="x_CashDiscountEligibility" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CashDiscountEligibility->caption() ?><?php echo $pharmacy_products_edit->CashDiscountEligibility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CashDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_CashDiscountEligibility">
<input type="text" data-table="pharmacy_products" data-field="x_CashDiscountEligibility" name="x_CashDiscountEligibility" id="x_CashDiscountEligibility" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CashDiscountEligibility->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CashDiscountEligibility->EditValue ?>"<?php echo $pharmacy_products_edit->CashDiscountEligibility->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CashDiscountEligibility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
	<div id="r_DiscountPerAllowInBill" class="form-group row">
		<label id="elh_pharmacy_products_DiscountPerAllowInBill" for="x_DiscountPerAllowInBill" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DiscountPerAllowInBill->caption() ?><?php echo $pharmacy_products_edit->DiscountPerAllowInBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountPerAllowInBill">
<input type="text" data-table="pharmacy_products" data-field="x_DiscountPerAllowInBill" name="x_DiscountPerAllowInBill" id="x_DiscountPerAllowInBill" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DiscountPerAllowInBill->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DiscountPerAllowInBill->EditValue ?>"<?php echo $pharmacy_products_edit->DiscountPerAllowInBill->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DiscountPerAllowInBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_pharmacy_products_Discount" for="x_Discount" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Discount->caption() ?><?php echo $pharmacy_products_edit->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Discount->cellAttributes() ?>>
<span id="el_pharmacy_products_Discount">
<input type="text" data-table="pharmacy_products" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Discount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Discount->EditValue ?>"<?php echo $pharmacy_products_edit->Discount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TotalAmount->Visible) { // TotalAmount ?>
	<div id="r_TotalAmount" class="form-group row">
		<label id="elh_pharmacy_products_TotalAmount" for="x_TotalAmount" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TotalAmount->caption() ?><?php echo $pharmacy_products_edit->TotalAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TotalAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_TotalAmount">
<input type="text" data-table="pharmacy_products" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TotalAmount->EditValue ?>"<?php echo $pharmacy_products_edit->TotalAmount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TotalAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->StandardMargin->Visible) { // StandardMargin ?>
	<div id="r_StandardMargin" class="form-group row">
		<label id="elh_pharmacy_products_StandardMargin" for="x_StandardMargin" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->StandardMargin->caption() ?><?php echo $pharmacy_products_edit->StandardMargin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->StandardMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_StandardMargin">
<input type="text" data-table="pharmacy_products" data-field="x_StandardMargin" name="x_StandardMargin" id="x_StandardMargin" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->StandardMargin->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->StandardMargin->EditValue ?>"<?php echo $pharmacy_products_edit->StandardMargin->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->StandardMargin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Margin->Visible) { // Margin ?>
	<div id="r_Margin" class="form-group row">
		<label id="elh_pharmacy_products_Margin" for="x_Margin" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Margin->caption() ?><?php echo $pharmacy_products_edit->Margin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Margin->cellAttributes() ?>>
<span id="el_pharmacy_products_Margin">
<input type="text" data-table="pharmacy_products" data-field="x_Margin" name="x_Margin" id="x_Margin" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Margin->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Margin->EditValue ?>"<?php echo $pharmacy_products_edit->Margin->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Margin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MarginId->Visible) { // MarginId ?>
	<div id="r_MarginId" class="form-group row">
		<label id="elh_pharmacy_products_MarginId" for="x_MarginId" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MarginId->caption() ?><?php echo $pharmacy_products_edit->MarginId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MarginId->cellAttributes() ?>>
<span id="el_pharmacy_products_MarginId">
<input type="text" data-table="pharmacy_products" data-field="x_MarginId" name="x_MarginId" id="x_MarginId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MarginId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MarginId->EditValue ?>"<?php echo $pharmacy_products_edit->MarginId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MarginId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ExpectedMargin->Visible) { // ExpectedMargin ?>
	<div id="r_ExpectedMargin" class="form-group row">
		<label id="elh_pharmacy_products_ExpectedMargin" for="x_ExpectedMargin" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ExpectedMargin->caption() ?><?php echo $pharmacy_products_edit->ExpectedMargin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ExpectedMargin->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpectedMargin">
<input type="text" data-table="pharmacy_products" data-field="x_ExpectedMargin" name="x_ExpectedMargin" id="x_ExpectedMargin" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ExpectedMargin->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ExpectedMargin->EditValue ?>"<?php echo $pharmacy_products_edit->ExpectedMargin->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ExpectedMargin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
	<div id="r_SurchargeBeforeTax" class="form-group row">
		<label id="elh_pharmacy_products_SurchargeBeforeTax" for="x_SurchargeBeforeTax" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SurchargeBeforeTax->caption() ?><?php echo $pharmacy_products_edit->SurchargeBeforeTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeBeforeTax">
<input type="text" data-table="pharmacy_products" data-field="x_SurchargeBeforeTax" name="x_SurchargeBeforeTax" id="x_SurchargeBeforeTax" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SurchargeBeforeTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SurchargeBeforeTax->EditValue ?>"<?php echo $pharmacy_products_edit->SurchargeBeforeTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SurchargeBeforeTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
	<div id="r_SurchargeAfterTax" class="form-group row">
		<label id="elh_pharmacy_products_SurchargeAfterTax" for="x_SurchargeAfterTax" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SurchargeAfterTax->caption() ?><?php echo $pharmacy_products_edit->SurchargeAfterTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SurchargeAfterTax->cellAttributes() ?>>
<span id="el_pharmacy_products_SurchargeAfterTax">
<input type="text" data-table="pharmacy_products" data-field="x_SurchargeAfterTax" name="x_SurchargeAfterTax" id="x_SurchargeAfterTax" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SurchargeAfterTax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SurchargeAfterTax->EditValue ?>"<?php echo $pharmacy_products_edit->SurchargeAfterTax->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SurchargeAfterTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TempOrderNo->Visible) { // TempOrderNo ?>
	<div id="r_TempOrderNo" class="form-group row">
		<label id="elh_pharmacy_products_TempOrderNo" for="x_TempOrderNo" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TempOrderNo->caption() ?><?php echo $pharmacy_products_edit->TempOrderNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TempOrderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderNo">
<input type="text" data-table="pharmacy_products" data-field="x_TempOrderNo" name="x_TempOrderNo" id="x_TempOrderNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TempOrderNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TempOrderNo->EditValue ?>"<?php echo $pharmacy_products_edit->TempOrderNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TempOrderNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TempOrderDate->Visible) { // TempOrderDate ?>
	<div id="r_TempOrderDate" class="form-group row">
		<label id="elh_pharmacy_products_TempOrderDate" for="x_TempOrderDate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TempOrderDate->caption() ?><?php echo $pharmacy_products_edit->TempOrderDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TempOrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_TempOrderDate">
<input type="text" data-table="pharmacy_products" data-field="x_TempOrderDate" name="x_TempOrderDate" id="x_TempOrderDate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TempOrderDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TempOrderDate->EditValue ?>"<?php echo $pharmacy_products_edit->TempOrderDate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->TempOrderDate->ReadOnly && !$pharmacy_products_edit->TempOrderDate->Disabled && !isset($pharmacy_products_edit->TempOrderDate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->TempOrderDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_TempOrderDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->TempOrderDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->OrderUnit->Visible) { // OrderUnit ?>
	<div id="r_OrderUnit" class="form-group row">
		<label id="elh_pharmacy_products_OrderUnit" for="x_OrderUnit" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->OrderUnit->caption() ?><?php echo $pharmacy_products_edit->OrderUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->OrderUnit->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderUnit">
<input type="text" data-table="pharmacy_products" data-field="x_OrderUnit" name="x_OrderUnit" id="x_OrderUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->OrderUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->OrderUnit->EditValue ?>"<?php echo $pharmacy_products_edit->OrderUnit->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->OrderUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->OrderQuantity->Visible) { // OrderQuantity ?>
	<div id="r_OrderQuantity" class="form-group row">
		<label id="elh_pharmacy_products_OrderQuantity" for="x_OrderQuantity" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->OrderQuantity->caption() ?><?php echo $pharmacy_products_edit->OrderQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->OrderQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderQuantity">
<input type="text" data-table="pharmacy_products" data-field="x_OrderQuantity" name="x_OrderQuantity" id="x_OrderQuantity" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->OrderQuantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->OrderQuantity->EditValue ?>"<?php echo $pharmacy_products_edit->OrderQuantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->OrderQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MarkForOrder->Visible) { // MarkForOrder ?>
	<div id="r_MarkForOrder" class="form-group row">
		<label id="elh_pharmacy_products_MarkForOrder" for="x_MarkForOrder" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MarkForOrder->caption() ?><?php echo $pharmacy_products_edit->MarkForOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MarkForOrder->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkForOrder">
<input type="text" data-table="pharmacy_products" data-field="x_MarkForOrder" name="x_MarkForOrder" id="x_MarkForOrder" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MarkForOrder->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MarkForOrder->EditValue ?>"<?php echo $pharmacy_products_edit->MarkForOrder->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MarkForOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->OrderAllId->Visible) { // OrderAllId ?>
	<div id="r_OrderAllId" class="form-group row">
		<label id="elh_pharmacy_products_OrderAllId" for="x_OrderAllId" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->OrderAllId->caption() ?><?php echo $pharmacy_products_edit->OrderAllId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->OrderAllId->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderAllId">
<input type="text" data-table="pharmacy_products" data-field="x_OrderAllId" name="x_OrderAllId" id="x_OrderAllId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->OrderAllId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->OrderAllId->EditValue ?>"<?php echo $pharmacy_products_edit->OrderAllId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->OrderAllId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
	<div id="r_CalculateOrderQty" class="form-group row">
		<label id="elh_pharmacy_products_CalculateOrderQty" for="x_CalculateOrderQty" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CalculateOrderQty->caption() ?><?php echo $pharmacy_products_edit->CalculateOrderQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CalculateOrderQty->cellAttributes() ?>>
<span id="el_pharmacy_products_CalculateOrderQty">
<input type="text" data-table="pharmacy_products" data-field="x_CalculateOrderQty" name="x_CalculateOrderQty" id="x_CalculateOrderQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CalculateOrderQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CalculateOrderQty->EditValue ?>"<?php echo $pharmacy_products_edit->CalculateOrderQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CalculateOrderQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SubLocation->Visible) { // SubLocation ?>
	<div id="r_SubLocation" class="form-group row">
		<label id="elh_pharmacy_products_SubLocation" for="x_SubLocation" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SubLocation->caption() ?><?php echo $pharmacy_products_edit->SubLocation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SubLocation->cellAttributes() ?>>
<span id="el_pharmacy_products_SubLocation">
<input type="text" data-table="pharmacy_products" data-field="x_SubLocation" name="x_SubLocation" id="x_SubLocation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SubLocation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SubLocation->EditValue ?>"<?php echo $pharmacy_products_edit->SubLocation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SubLocation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CategoryCode->Visible) { // CategoryCode ?>
	<div id="r_CategoryCode" class="form-group row">
		<label id="elh_pharmacy_products_CategoryCode" for="x_CategoryCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CategoryCode->caption() ?><?php echo $pharmacy_products_edit->CategoryCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CategoryCode">
<input type="text" data-table="pharmacy_products" data-field="x_CategoryCode" name="x_CategoryCode" id="x_CategoryCode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CategoryCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CategoryCode->EditValue ?>"<?php echo $pharmacy_products_edit->CategoryCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CategoryCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SubCategory->Visible) { // SubCategory ?>
	<div id="r_SubCategory" class="form-group row">
		<label id="elh_pharmacy_products_SubCategory" for="x_SubCategory" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SubCategory->caption() ?><?php echo $pharmacy_products_edit->SubCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SubCategory->cellAttributes() ?>>
<span id="el_pharmacy_products_SubCategory">
<input type="text" data-table="pharmacy_products" data-field="x_SubCategory" name="x_SubCategory" id="x_SubCategory" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SubCategory->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SubCategory->EditValue ?>"<?php echo $pharmacy_products_edit->SubCategory->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SubCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
	<div id="r_FlexCategoryCode" class="form-group row">
		<label id="elh_pharmacy_products_FlexCategoryCode" for="x_FlexCategoryCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FlexCategoryCode->caption() ?><?php echo $pharmacy_products_edit->FlexCategoryCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FlexCategoryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_FlexCategoryCode">
<input type="text" data-table="pharmacy_products" data-field="x_FlexCategoryCode" name="x_FlexCategoryCode" id="x_FlexCategoryCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FlexCategoryCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FlexCategoryCode->EditValue ?>"<?php echo $pharmacy_products_edit->FlexCategoryCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->FlexCategoryCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ABCSaleQty->Visible) { // ABCSaleQty ?>
	<div id="r_ABCSaleQty" class="form-group row">
		<label id="elh_pharmacy_products_ABCSaleQty" for="x_ABCSaleQty" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ABCSaleQty->caption() ?><?php echo $pharmacy_products_edit->ABCSaleQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ABCSaleQty->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleQty">
<input type="text" data-table="pharmacy_products" data-field="x_ABCSaleQty" name="x_ABCSaleQty" id="x_ABCSaleQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ABCSaleQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ABCSaleQty->EditValue ?>"<?php echo $pharmacy_products_edit->ABCSaleQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ABCSaleQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ABCSaleValue->Visible) { // ABCSaleValue ?>
	<div id="r_ABCSaleValue" class="form-group row">
		<label id="elh_pharmacy_products_ABCSaleValue" for="x_ABCSaleValue" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ABCSaleValue->caption() ?><?php echo $pharmacy_products_edit->ABCSaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ABCSaleValue->cellAttributes() ?>>
<span id="el_pharmacy_products_ABCSaleValue">
<input type="text" data-table="pharmacy_products" data-field="x_ABCSaleValue" name="x_ABCSaleValue" id="x_ABCSaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ABCSaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ABCSaleValue->EditValue ?>"<?php echo $pharmacy_products_edit->ABCSaleValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ABCSaleValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ConvertionFactor->Visible) { // ConvertionFactor ?>
	<div id="r_ConvertionFactor" class="form-group row">
		<label id="elh_pharmacy_products_ConvertionFactor" for="x_ConvertionFactor" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ConvertionFactor->caption() ?><?php echo $pharmacy_products_edit->ConvertionFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ConvertionFactor->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionFactor">
<input type="text" data-table="pharmacy_products" data-field="x_ConvertionFactor" name="x_ConvertionFactor" id="x_ConvertionFactor" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ConvertionFactor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ConvertionFactor->EditValue ?>"<?php echo $pharmacy_products_edit->ConvertionFactor->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ConvertionFactor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
	<div id="r_ConvertionUnitDesc" class="form-group row">
		<label id="elh_pharmacy_products_ConvertionUnitDesc" for="x_ConvertionUnitDesc" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ConvertionUnitDesc->caption() ?><?php echo $pharmacy_products_edit->ConvertionUnitDesc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el_pharmacy_products_ConvertionUnitDesc">
<input type="text" data-table="pharmacy_products" data-field="x_ConvertionUnitDesc" name="x_ConvertionUnitDesc" id="x_ConvertionUnitDesc" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ConvertionUnitDesc->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ConvertionUnitDesc->EditValue ?>"<?php echo $pharmacy_products_edit->ConvertionUnitDesc->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ConvertionUnitDesc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TransactionId->Visible) { // TransactionId ?>
	<div id="r_TransactionId" class="form-group row">
		<label id="elh_pharmacy_products_TransactionId" for="x_TransactionId" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TransactionId->caption() ?><?php echo $pharmacy_products_edit->TransactionId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TransactionId->cellAttributes() ?>>
<span id="el_pharmacy_products_TransactionId">
<input type="text" data-table="pharmacy_products" data-field="x_TransactionId" name="x_TransactionId" id="x_TransactionId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TransactionId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TransactionId->EditValue ?>"<?php echo $pharmacy_products_edit->TransactionId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TransactionId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SoldProductId->Visible) { // SoldProductId ?>
	<div id="r_SoldProductId" class="form-group row">
		<label id="elh_pharmacy_products_SoldProductId" for="x_SoldProductId" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SoldProductId->caption() ?><?php echo $pharmacy_products_edit->SoldProductId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SoldProductId->cellAttributes() ?>>
<span id="el_pharmacy_products_SoldProductId">
<input type="text" data-table="pharmacy_products" data-field="x_SoldProductId" name="x_SoldProductId" id="x_SoldProductId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SoldProductId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SoldProductId->EditValue ?>"<?php echo $pharmacy_products_edit->SoldProductId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SoldProductId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->WantedBookId->Visible) { // WantedBookId ?>
	<div id="r_WantedBookId" class="form-group row">
		<label id="elh_pharmacy_products_WantedBookId" for="x_WantedBookId" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->WantedBookId->caption() ?><?php echo $pharmacy_products_edit->WantedBookId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->WantedBookId->cellAttributes() ?>>
<span id="el_pharmacy_products_WantedBookId">
<input type="text" data-table="pharmacy_products" data-field="x_WantedBookId" name="x_WantedBookId" id="x_WantedBookId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->WantedBookId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->WantedBookId->EditValue ?>"<?php echo $pharmacy_products_edit->WantedBookId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->WantedBookId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AllId->Visible) { // AllId ?>
	<div id="r_AllId" class="form-group row">
		<label id="elh_pharmacy_products_AllId" for="x_AllId" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AllId->caption() ?><?php echo $pharmacy_products_edit->AllId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AllId->cellAttributes() ?>>
<span id="el_pharmacy_products_AllId">
<input type="text" data-table="pharmacy_products" data-field="x_AllId" name="x_AllId" id="x_AllId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AllId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AllId->EditValue ?>"<?php echo $pharmacy_products_edit->AllId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AllId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
	<div id="r_BatchAndExpiryCompulsory" class="form-group row">
		<label id="elh_pharmacy_products_BatchAndExpiryCompulsory" for="x_BatchAndExpiryCompulsory" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BatchAndExpiryCompulsory->caption() ?><?php echo $pharmacy_products_edit->BatchAndExpiryCompulsory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchAndExpiryCompulsory">
<input type="text" data-table="pharmacy_products" data-field="x_BatchAndExpiryCompulsory" name="x_BatchAndExpiryCompulsory" id="x_BatchAndExpiryCompulsory" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BatchAndExpiryCompulsory->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BatchAndExpiryCompulsory->EditValue ?>"<?php echo $pharmacy_products_edit->BatchAndExpiryCompulsory->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BatchAndExpiryCompulsory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
	<div id="r_BatchStockForWantedBook" class="form-group row">
		<label id="elh_pharmacy_products_BatchStockForWantedBook" for="x_BatchStockForWantedBook" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BatchStockForWantedBook->caption() ?><?php echo $pharmacy_products_edit->BatchStockForWantedBook->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el_pharmacy_products_BatchStockForWantedBook">
<input type="text" data-table="pharmacy_products" data-field="x_BatchStockForWantedBook" name="x_BatchStockForWantedBook" id="x_BatchStockForWantedBook" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BatchStockForWantedBook->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BatchStockForWantedBook->EditValue ?>"<?php echo $pharmacy_products_edit->BatchStockForWantedBook->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BatchStockForWantedBook->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
	<div id="r_UnitBasedBilling" class="form-group row">
		<label id="elh_pharmacy_products_UnitBasedBilling" for="x_UnitBasedBilling" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->UnitBasedBilling->caption() ?><?php echo $pharmacy_products_edit->UnitBasedBilling->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->UnitBasedBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_UnitBasedBilling">
<input type="text" data-table="pharmacy_products" data-field="x_UnitBasedBilling" name="x_UnitBasedBilling" id="x_UnitBasedBilling" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->UnitBasedBilling->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->UnitBasedBilling->EditValue ?>"<?php echo $pharmacy_products_edit->UnitBasedBilling->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->UnitBasedBilling->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
	<div id="r_DoNotCheckStock" class="form-group row">
		<label id="elh_pharmacy_products_DoNotCheckStock" for="x_DoNotCheckStock" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DoNotCheckStock->caption() ?><?php echo $pharmacy_products_edit->DoNotCheckStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DoNotCheckStock->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckStock">
<input type="text" data-table="pharmacy_products" data-field="x_DoNotCheckStock" name="x_DoNotCheckStock" id="x_DoNotCheckStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DoNotCheckStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DoNotCheckStock->EditValue ?>"<?php echo $pharmacy_products_edit->DoNotCheckStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DoNotCheckStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AcceptRate->Visible) { // AcceptRate ?>
	<div id="r_AcceptRate" class="form-group row">
		<label id="elh_pharmacy_products_AcceptRate" for="x_AcceptRate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AcceptRate->caption() ?><?php echo $pharmacy_products_edit->AcceptRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AcceptRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRate">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptRate" name="x_AcceptRate" id="x_AcceptRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AcceptRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AcceptRate->EditValue ?>"<?php echo $pharmacy_products_edit->AcceptRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AcceptRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PriceLevel->Visible) { // PriceLevel ?>
	<div id="r_PriceLevel" class="form-group row">
		<label id="elh_pharmacy_products_PriceLevel" for="x_PriceLevel" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PriceLevel->caption() ?><?php echo $pharmacy_products_edit->PriceLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PriceLevel->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceLevel">
<input type="text" data-table="pharmacy_products" data-field="x_PriceLevel" name="x_PriceLevel" id="x_PriceLevel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PriceLevel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PriceLevel->EditValue ?>"<?php echo $pharmacy_products_edit->PriceLevel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PriceLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LastQuotePrice->Visible) { // LastQuotePrice ?>
	<div id="r_LastQuotePrice" class="form-group row">
		<label id="elh_pharmacy_products_LastQuotePrice" for="x_LastQuotePrice" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LastQuotePrice->caption() ?><?php echo $pharmacy_products_edit->LastQuotePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LastQuotePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_LastQuotePrice">
<input type="text" data-table="pharmacy_products" data-field="x_LastQuotePrice" name="x_LastQuotePrice" id="x_LastQuotePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LastQuotePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->LastQuotePrice->EditValue ?>"<?php echo $pharmacy_products_edit->LastQuotePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->LastQuotePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PriceChange->Visible) { // PriceChange ?>
	<div id="r_PriceChange" class="form-group row">
		<label id="elh_pharmacy_products_PriceChange" for="x_PriceChange" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PriceChange->caption() ?><?php echo $pharmacy_products_edit->PriceChange->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PriceChange->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceChange">
<input type="text" data-table="pharmacy_products" data-field="x_PriceChange" name="x_PriceChange" id="x_PriceChange" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PriceChange->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PriceChange->EditValue ?>"<?php echo $pharmacy_products_edit->PriceChange->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PriceChange->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CommodityCode->Visible) { // CommodityCode ?>
	<div id="r_CommodityCode" class="form-group row">
		<label id="elh_pharmacy_products_CommodityCode" for="x_CommodityCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CommodityCode->caption() ?><?php echo $pharmacy_products_edit->CommodityCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CommodityCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CommodityCode">
<input type="text" data-table="pharmacy_products" data-field="x_CommodityCode" name="x_CommodityCode" id="x_CommodityCode" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CommodityCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CommodityCode->EditValue ?>"<?php echo $pharmacy_products_edit->CommodityCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CommodityCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->InstitutePrice->Visible) { // InstitutePrice ?>
	<div id="r_InstitutePrice" class="form-group row">
		<label id="elh_pharmacy_products_InstitutePrice" for="x_InstitutePrice" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->InstitutePrice->caption() ?><?php echo $pharmacy_products_edit->InstitutePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->InstitutePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_InstitutePrice">
<input type="text" data-table="pharmacy_products" data-field="x_InstitutePrice" name="x_InstitutePrice" id="x_InstitutePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->InstitutePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->InstitutePrice->EditValue ?>"<?php echo $pharmacy_products_edit->InstitutePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->InstitutePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
	<div id="r_CtrlOrDCtrlProduct" class="form-group row">
		<label id="elh_pharmacy_products_CtrlOrDCtrlProduct" for="x_CtrlOrDCtrlProduct" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CtrlOrDCtrlProduct->caption() ?><?php echo $pharmacy_products_edit->CtrlOrDCtrlProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_CtrlOrDCtrlProduct">
<input type="text" data-table="pharmacy_products" data-field="x_CtrlOrDCtrlProduct" name="x_CtrlOrDCtrlProduct" id="x_CtrlOrDCtrlProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CtrlOrDCtrlProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CtrlOrDCtrlProduct->EditValue ?>"<?php echo $pharmacy_products_edit->CtrlOrDCtrlProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CtrlOrDCtrlProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ImportedDate->Visible) { // ImportedDate ?>
	<div id="r_ImportedDate" class="form-group row">
		<label id="elh_pharmacy_products_ImportedDate" for="x_ImportedDate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ImportedDate->caption() ?><?php echo $pharmacy_products_edit->ImportedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ImportedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ImportedDate">
<input type="text" data-table="pharmacy_products" data-field="x_ImportedDate" name="x_ImportedDate" id="x_ImportedDate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ImportedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ImportedDate->EditValue ?>"<?php echo $pharmacy_products_edit->ImportedDate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->ImportedDate->ReadOnly && !$pharmacy_products_edit->ImportedDate->Disabled && !isset($pharmacy_products_edit->ImportedDate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->ImportedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_ImportedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->ImportedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IsImported->Visible) { // IsImported ?>
	<div id="r_IsImported" class="form-group row">
		<label id="elh_pharmacy_products_IsImported" for="x_IsImported" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IsImported->caption() ?><?php echo $pharmacy_products_edit->IsImported->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IsImported->cellAttributes() ?>>
<span id="el_pharmacy_products_IsImported">
<input type="text" data-table="pharmacy_products" data-field="x_IsImported" name="x_IsImported" id="x_IsImported" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IsImported->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IsImported->EditValue ?>"<?php echo $pharmacy_products_edit->IsImported->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IsImported->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FileName->Visible) { // FileName ?>
	<div id="r_FileName" class="form-group row">
		<label id="elh_pharmacy_products_FileName" for="x_FileName" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FileName->caption() ?><?php echo $pharmacy_products_edit->FileName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FileName->cellAttributes() ?>>
<span id="el_pharmacy_products_FileName">
<input type="text" data-table="pharmacy_products" data-field="x_FileName" name="x_FileName" id="x_FileName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FileName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FileName->EditValue ?>"<?php echo $pharmacy_products_edit->FileName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->FileName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LPName->Visible) { // LPName ?>
	<div id="r_LPName" class="form-group row">
		<label id="elh_pharmacy_products_LPName" for="x_LPName" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LPName->caption() ?><?php echo $pharmacy_products_edit->LPName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LPName->cellAttributes() ?>>
<span id="el_pharmacy_products_LPName">
<textarea data-table="pharmacy_products" data-field="x_LPName" name="x_LPName" id="x_LPName" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LPName->getPlaceHolder()) ?>"<?php echo $pharmacy_products_edit->LPName->editAttributes() ?>><?php echo $pharmacy_products_edit->LPName->EditValue ?></textarea>
</span>
<?php echo $pharmacy_products_edit->LPName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->GodownNumber->Visible) { // GodownNumber ?>
	<div id="r_GodownNumber" class="form-group row">
		<label id="elh_pharmacy_products_GodownNumber" for="x_GodownNumber" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->GodownNumber->caption() ?><?php echo $pharmacy_products_edit->GodownNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->GodownNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_GodownNumber">
<input type="text" data-table="pharmacy_products" data-field="x_GodownNumber" name="x_GodownNumber" id="x_GodownNumber" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->GodownNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->GodownNumber->EditValue ?>"<?php echo $pharmacy_products_edit->GodownNumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->GodownNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CreationDate->Visible) { // CreationDate ?>
	<div id="r_CreationDate" class="form-group row">
		<label id="elh_pharmacy_products_CreationDate" for="x_CreationDate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CreationDate->caption() ?><?php echo $pharmacy_products_edit->CreationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CreationDate->cellAttributes() ?>>
<span id="el_pharmacy_products_CreationDate">
<input type="text" data-table="pharmacy_products" data-field="x_CreationDate" name="x_CreationDate" id="x_CreationDate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CreationDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CreationDate->EditValue ?>"<?php echo $pharmacy_products_edit->CreationDate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->CreationDate->ReadOnly && !$pharmacy_products_edit->CreationDate->Disabled && !isset($pharmacy_products_edit->CreationDate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->CreationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_CreationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->CreationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CreatedbyUser->Visible) { // CreatedbyUser ?>
	<div id="r_CreatedbyUser" class="form-group row">
		<label id="elh_pharmacy_products_CreatedbyUser" for="x_CreatedbyUser" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CreatedbyUser->caption() ?><?php echo $pharmacy_products_edit->CreatedbyUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CreatedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_CreatedbyUser">
<input type="text" data-table="pharmacy_products" data-field="x_CreatedbyUser" name="x_CreatedbyUser" id="x_CreatedbyUser" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CreatedbyUser->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CreatedbyUser->EditValue ?>"<?php echo $pharmacy_products_edit->CreatedbyUser->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CreatedbyUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ModifiedDate->Visible) { // ModifiedDate ?>
	<div id="r_ModifiedDate" class="form-group row">
		<label id="elh_pharmacy_products_ModifiedDate" for="x_ModifiedDate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ModifiedDate->caption() ?><?php echo $pharmacy_products_edit->ModifiedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ModifiedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedDate">
<input type="text" data-table="pharmacy_products" data-field="x_ModifiedDate" name="x_ModifiedDate" id="x_ModifiedDate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ModifiedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ModifiedDate->EditValue ?>"<?php echo $pharmacy_products_edit->ModifiedDate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->ModifiedDate->ReadOnly && !$pharmacy_products_edit->ModifiedDate->Disabled && !isset($pharmacy_products_edit->ModifiedDate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->ModifiedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_ModifiedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->ModifiedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
	<div id="r_ModifiedbyUser" class="form-group row">
		<label id="elh_pharmacy_products_ModifiedbyUser" for="x_ModifiedbyUser" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ModifiedbyUser->caption() ?><?php echo $pharmacy_products_edit->ModifiedbyUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ModifiedbyUser->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifiedbyUser">
<input type="text" data-table="pharmacy_products" data-field="x_ModifiedbyUser" name="x_ModifiedbyUser" id="x_ModifiedbyUser" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ModifiedbyUser->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ModifiedbyUser->EditValue ?>"<?php echo $pharmacy_products_edit->ModifiedbyUser->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ModifiedbyUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->isActive->Visible) { // isActive ?>
	<div id="r_isActive" class="form-group row">
		<label id="elh_pharmacy_products_isActive" for="x_isActive" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->isActive->caption() ?><?php echo $pharmacy_products_edit->isActive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->isActive->cellAttributes() ?>>
<span id="el_pharmacy_products_isActive">
<input type="text" data-table="pharmacy_products" data-field="x_isActive" name="x_isActive" id="x_isActive" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->isActive->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->isActive->EditValue ?>"<?php echo $pharmacy_products_edit->isActive->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->isActive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
	<div id="r_AllowExpiryClaim" class="form-group row">
		<label id="elh_pharmacy_products_AllowExpiryClaim" for="x_AllowExpiryClaim" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AllowExpiryClaim->caption() ?><?php echo $pharmacy_products_edit->AllowExpiryClaim->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AllowExpiryClaim->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryClaim">
<input type="text" data-table="pharmacy_products" data-field="x_AllowExpiryClaim" name="x_AllowExpiryClaim" id="x_AllowExpiryClaim" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AllowExpiryClaim->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AllowExpiryClaim->EditValue ?>"<?php echo $pharmacy_products_edit->AllowExpiryClaim->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AllowExpiryClaim->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BrandCode->Visible) { // BrandCode ?>
	<div id="r_BrandCode" class="form-group row">
		<label id="elh_pharmacy_products_BrandCode" for="x_BrandCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BrandCode->caption() ?><?php echo $pharmacy_products_edit->BrandCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BrandCode->cellAttributes() ?>>
<span id="el_pharmacy_products_BrandCode">
<input type="text" data-table="pharmacy_products" data-field="x_BrandCode" name="x_BrandCode" id="x_BrandCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BrandCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BrandCode->EditValue ?>"<?php echo $pharmacy_products_edit->BrandCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BrandCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
	<div id="r_FreeSchemeBasedon" class="form-group row">
		<label id="elh_pharmacy_products_FreeSchemeBasedon" for="x_FreeSchemeBasedon" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FreeSchemeBasedon->caption() ?><?php echo $pharmacy_products_edit->FreeSchemeBasedon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeSchemeBasedon">
<input type="text" data-table="pharmacy_products" data-field="x_FreeSchemeBasedon" name="x_FreeSchemeBasedon" id="x_FreeSchemeBasedon" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FreeSchemeBasedon->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FreeSchemeBasedon->EditValue ?>"<?php echo $pharmacy_products_edit->FreeSchemeBasedon->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->FreeSchemeBasedon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
	<div id="r_DoNotCheckCostInBill" class="form-group row">
		<label id="elh_pharmacy_products_DoNotCheckCostInBill" for="x_DoNotCheckCostInBill" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DoNotCheckCostInBill->caption() ?><?php echo $pharmacy_products_edit->DoNotCheckCostInBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_DoNotCheckCostInBill">
<input type="text" data-table="pharmacy_products" data-field="x_DoNotCheckCostInBill" name="x_DoNotCheckCostInBill" id="x_DoNotCheckCostInBill" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DoNotCheckCostInBill->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DoNotCheckCostInBill->EditValue ?>"<?php echo $pharmacy_products_edit->DoNotCheckCostInBill->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DoNotCheckCostInBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductGroupCode->Visible) { // ProductGroupCode ?>
	<div id="r_ProductGroupCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductGroupCode" for="x_ProductGroupCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductGroupCode->caption() ?><?php echo $pharmacy_products_edit->ProductGroupCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductGroupCode">
<input type="text" data-table="pharmacy_products" data-field="x_ProductGroupCode" name="x_ProductGroupCode" id="x_ProductGroupCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductGroupCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductGroupCode->EditValue ?>"<?php echo $pharmacy_products_edit->ProductGroupCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductGroupCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
	<div id="r_ProductStrengthCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductStrengthCode" for="x_ProductStrengthCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductStrengthCode->caption() ?><?php echo $pharmacy_products_edit->ProductStrengthCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductStrengthCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductStrengthCode">
<input type="text" data-table="pharmacy_products" data-field="x_ProductStrengthCode" name="x_ProductStrengthCode" id="x_ProductStrengthCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductStrengthCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductStrengthCode->EditValue ?>"<?php echo $pharmacy_products_edit->ProductStrengthCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductStrengthCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PackingCode->Visible) { // PackingCode ?>
	<div id="r_PackingCode" class="form-group row">
		<label id="elh_pharmacy_products_PackingCode" for="x_PackingCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PackingCode->caption() ?><?php echo $pharmacy_products_edit->PackingCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PackingCode->cellAttributes() ?>>
<span id="el_pharmacy_products_PackingCode">
<input type="text" data-table="pharmacy_products" data-field="x_PackingCode" name="x_PackingCode" id="x_PackingCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PackingCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PackingCode->EditValue ?>"<?php echo $pharmacy_products_edit->PackingCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PackingCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ComputedMinStock->Visible) { // ComputedMinStock ?>
	<div id="r_ComputedMinStock" class="form-group row">
		<label id="elh_pharmacy_products_ComputedMinStock" for="x_ComputedMinStock" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ComputedMinStock->caption() ?><?php echo $pharmacy_products_edit->ComputedMinStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ComputedMinStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMinStock">
<input type="text" data-table="pharmacy_products" data-field="x_ComputedMinStock" name="x_ComputedMinStock" id="x_ComputedMinStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ComputedMinStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ComputedMinStock->EditValue ?>"<?php echo $pharmacy_products_edit->ComputedMinStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ComputedMinStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
	<div id="r_ComputedMaxStock" class="form-group row">
		<label id="elh_pharmacy_products_ComputedMaxStock" for="x_ComputedMaxStock" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ComputedMaxStock->caption() ?><?php echo $pharmacy_products_edit->ComputedMaxStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ComputedMaxStock->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputedMaxStock">
<input type="text" data-table="pharmacy_products" data-field="x_ComputedMaxStock" name="x_ComputedMaxStock" id="x_ComputedMaxStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ComputedMaxStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ComputedMaxStock->EditValue ?>"<?php echo $pharmacy_products_edit->ComputedMaxStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ComputedMaxStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductRemark->Visible) { // ProductRemark ?>
	<div id="r_ProductRemark" class="form-group row">
		<label id="elh_pharmacy_products_ProductRemark" for="x_ProductRemark" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductRemark->caption() ?><?php echo $pharmacy_products_edit->ProductRemark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductRemark->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductRemark">
<input type="text" data-table="pharmacy_products" data-field="x_ProductRemark" name="x_ProductRemark" id="x_ProductRemark" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductRemark->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductRemark->EditValue ?>"<?php echo $pharmacy_products_edit->ProductRemark->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductRemark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductDrugCode->Visible) { // ProductDrugCode ?>
	<div id="r_ProductDrugCode" class="form-group row">
		<label id="elh_pharmacy_products_ProductDrugCode" for="x_ProductDrugCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductDrugCode->caption() ?><?php echo $pharmacy_products_edit->ProductDrugCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductDrugCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDrugCode">
<input type="text" data-table="pharmacy_products" data-field="x_ProductDrugCode" name="x_ProductDrugCode" id="x_ProductDrugCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductDrugCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductDrugCode->EditValue ?>"<?php echo $pharmacy_products_edit->ProductDrugCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductDrugCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
	<div id="r_IsMatrixProduct" class="form-group row">
		<label id="elh_pharmacy_products_IsMatrixProduct" for="x_IsMatrixProduct" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IsMatrixProduct->caption() ?><?php echo $pharmacy_products_edit->IsMatrixProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IsMatrixProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMatrixProduct">
<input type="text" data-table="pharmacy_products" data-field="x_IsMatrixProduct" name="x_IsMatrixProduct" id="x_IsMatrixProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IsMatrixProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IsMatrixProduct->EditValue ?>"<?php echo $pharmacy_products_edit->IsMatrixProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IsMatrixProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount1->Visible) { // AttributeCount1 ?>
	<div id="r_AttributeCount1" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount1" for="x_AttributeCount1" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount1->caption() ?><?php echo $pharmacy_products_edit->AttributeCount1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount1->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount1">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount1" name="x_AttributeCount1" id="x_AttributeCount1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount1->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount2->Visible) { // AttributeCount2 ?>
	<div id="r_AttributeCount2" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount2" for="x_AttributeCount2" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount2->caption() ?><?php echo $pharmacy_products_edit->AttributeCount2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount2->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount2">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount2" name="x_AttributeCount2" id="x_AttributeCount2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount2->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount3->Visible) { // AttributeCount3 ?>
	<div id="r_AttributeCount3" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount3" for="x_AttributeCount3" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount3->caption() ?><?php echo $pharmacy_products_edit->AttributeCount3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount3->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount3">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount3" name="x_AttributeCount3" id="x_AttributeCount3" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount3->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount3->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount4->Visible) { // AttributeCount4 ?>
	<div id="r_AttributeCount4" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount4" for="x_AttributeCount4" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount4->caption() ?><?php echo $pharmacy_products_edit->AttributeCount4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount4->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount4">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount4" name="x_AttributeCount4" id="x_AttributeCount4" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount4->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount4->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount4->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount5->Visible) { // AttributeCount5 ?>
	<div id="r_AttributeCount5" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount5" for="x_AttributeCount5" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount5->caption() ?><?php echo $pharmacy_products_edit->AttributeCount5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount5->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount5">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount5" name="x_AttributeCount5" id="x_AttributeCount5" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount5->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount5->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount5->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
	<div id="r_DefaultDiscountPercentage" class="form-group row">
		<label id="elh_pharmacy_products_DefaultDiscountPercentage" for="x_DefaultDiscountPercentage" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DefaultDiscountPercentage->caption() ?><?php echo $pharmacy_products_edit->DefaultDiscountPercentage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultDiscountPercentage">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultDiscountPercentage" name="x_DefaultDiscountPercentage" id="x_DefaultDiscountPercentage" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DefaultDiscountPercentage->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DefaultDiscountPercentage->EditValue ?>"<?php echo $pharmacy_products_edit->DefaultDiscountPercentage->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DefaultDiscountPercentage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
	<div id="r_DonotPrintBarcode" class="form-group row">
		<label id="elh_pharmacy_products_DonotPrintBarcode" for="x_DonotPrintBarcode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DonotPrintBarcode->caption() ?><?php echo $pharmacy_products_edit->DonotPrintBarcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DonotPrintBarcode->cellAttributes() ?>>
<span id="el_pharmacy_products_DonotPrintBarcode">
<input type="text" data-table="pharmacy_products" data-field="x_DonotPrintBarcode" name="x_DonotPrintBarcode" id="x_DonotPrintBarcode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DonotPrintBarcode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DonotPrintBarcode->EditValue ?>"<?php echo $pharmacy_products_edit->DonotPrintBarcode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DonotPrintBarcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
	<div id="r_ProductLevelDiscount" class="form-group row">
		<label id="elh_pharmacy_products_ProductLevelDiscount" for="x_ProductLevelDiscount" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductLevelDiscount->caption() ?><?php echo $pharmacy_products_edit->ProductLevelDiscount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductLevelDiscount->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLevelDiscount">
<input type="text" data-table="pharmacy_products" data-field="x_ProductLevelDiscount" name="x_ProductLevelDiscount" id="x_ProductLevelDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductLevelDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductLevelDiscount->EditValue ?>"<?php echo $pharmacy_products_edit->ProductLevelDiscount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductLevelDiscount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Markup->Visible) { // Markup ?>
	<div id="r_Markup" class="form-group row">
		<label id="elh_pharmacy_products_Markup" for="x_Markup" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Markup->caption() ?><?php echo $pharmacy_products_edit->Markup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Markup->cellAttributes() ?>>
<span id="el_pharmacy_products_Markup">
<input type="text" data-table="pharmacy_products" data-field="x_Markup" name="x_Markup" id="x_Markup" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Markup->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Markup->EditValue ?>"<?php echo $pharmacy_products_edit->Markup->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Markup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MarkDown->Visible) { // MarkDown ?>
	<div id="r_MarkDown" class="form-group row">
		<label id="elh_pharmacy_products_MarkDown" for="x_MarkDown" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MarkDown->caption() ?><?php echo $pharmacy_products_edit->MarkDown->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MarkDown->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDown">
<input type="text" data-table="pharmacy_products" data-field="x_MarkDown" name="x_MarkDown" id="x_MarkDown" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MarkDown->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MarkDown->EditValue ?>"<?php echo $pharmacy_products_edit->MarkDown->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MarkDown->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
	<div id="r_ReworkSalePrice" class="form-group row">
		<label id="elh_pharmacy_products_ReworkSalePrice" for="x_ReworkSalePrice" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ReworkSalePrice->caption() ?><?php echo $pharmacy_products_edit->ReworkSalePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ReworkSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_ReworkSalePrice">
<input type="text" data-table="pharmacy_products" data-field="x_ReworkSalePrice" name="x_ReworkSalePrice" id="x_ReworkSalePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ReworkSalePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ReworkSalePrice->EditValue ?>"<?php echo $pharmacy_products_edit->ReworkSalePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ReworkSalePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MultipleInput->Visible) { // MultipleInput ?>
	<div id="r_MultipleInput" class="form-group row">
		<label id="elh_pharmacy_products_MultipleInput" for="x_MultipleInput" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MultipleInput->caption() ?><?php echo $pharmacy_products_edit->MultipleInput->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MultipleInput->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleInput">
<input type="text" data-table="pharmacy_products" data-field="x_MultipleInput" name="x_MultipleInput" id="x_MultipleInput" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MultipleInput->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MultipleInput->EditValue ?>"<?php echo $pharmacy_products_edit->MultipleInput->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MultipleInput->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LpPackageInformation->Visible) { // LpPackageInformation ?>
	<div id="r_LpPackageInformation" class="form-group row">
		<label id="elh_pharmacy_products_LpPackageInformation" for="x_LpPackageInformation" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LpPackageInformation->caption() ?><?php echo $pharmacy_products_edit->LpPackageInformation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LpPackageInformation->cellAttributes() ?>>
<span id="el_pharmacy_products_LpPackageInformation">
<input type="text" data-table="pharmacy_products" data-field="x_LpPackageInformation" name="x_LpPackageInformation" id="x_LpPackageInformation" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LpPackageInformation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->LpPackageInformation->EditValue ?>"<?php echo $pharmacy_products_edit->LpPackageInformation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->LpPackageInformation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
	<div id="r_AllowNegativeStock" class="form-group row">
		<label id="elh_pharmacy_products_AllowNegativeStock" for="x_AllowNegativeStock" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AllowNegativeStock->caption() ?><?php echo $pharmacy_products_edit->AllowNegativeStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AllowNegativeStock->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowNegativeStock">
<input type="text" data-table="pharmacy_products" data-field="x_AllowNegativeStock" name="x_AllowNegativeStock" id="x_AllowNegativeStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AllowNegativeStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AllowNegativeStock->EditValue ?>"<?php echo $pharmacy_products_edit->AllowNegativeStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AllowNegativeStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->OrderDate->Visible) { // OrderDate ?>
	<div id="r_OrderDate" class="form-group row">
		<label id="elh_pharmacy_products_OrderDate" for="x_OrderDate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->OrderDate->caption() ?><?php echo $pharmacy_products_edit->OrderDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->OrderDate->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderDate">
<input type="text" data-table="pharmacy_products" data-field="x_OrderDate" name="x_OrderDate" id="x_OrderDate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->OrderDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->OrderDate->EditValue ?>"<?php echo $pharmacy_products_edit->OrderDate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->OrderDate->ReadOnly && !$pharmacy_products_edit->OrderDate->Disabled && !isset($pharmacy_products_edit->OrderDate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->OrderDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_OrderDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->OrderDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->OrderTime->Visible) { // OrderTime ?>
	<div id="r_OrderTime" class="form-group row">
		<label id="elh_pharmacy_products_OrderTime" for="x_OrderTime" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->OrderTime->caption() ?><?php echo $pharmacy_products_edit->OrderTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->OrderTime->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderTime">
<input type="text" data-table="pharmacy_products" data-field="x_OrderTime" name="x_OrderTime" id="x_OrderTime" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->OrderTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->OrderTime->EditValue ?>"<?php echo $pharmacy_products_edit->OrderTime->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->OrderTime->ReadOnly && !$pharmacy_products_edit->OrderTime->Disabled && !isset($pharmacy_products_edit->OrderTime->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->OrderTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_OrderTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->OrderTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->RateGroupCode->Visible) { // RateGroupCode ?>
	<div id="r_RateGroupCode" class="form-group row">
		<label id="elh_pharmacy_products_RateGroupCode" for="x_RateGroupCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->RateGroupCode->caption() ?><?php echo $pharmacy_products_edit->RateGroupCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->RateGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RateGroupCode">
<input type="text" data-table="pharmacy_products" data-field="x_RateGroupCode" name="x_RateGroupCode" id="x_RateGroupCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->RateGroupCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->RateGroupCode->EditValue ?>"<?php echo $pharmacy_products_edit->RateGroupCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->RateGroupCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
	<div id="r_ConversionCaseLot" class="form-group row">
		<label id="elh_pharmacy_products_ConversionCaseLot" for="x_ConversionCaseLot" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ConversionCaseLot->caption() ?><?php echo $pharmacy_products_edit->ConversionCaseLot->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ConversionCaseLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ConversionCaseLot">
<input type="text" data-table="pharmacy_products" data-field="x_ConversionCaseLot" name="x_ConversionCaseLot" id="x_ConversionCaseLot" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ConversionCaseLot->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ConversionCaseLot->EditValue ?>"<?php echo $pharmacy_products_edit->ConversionCaseLot->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ConversionCaseLot->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ShippingLot->Visible) { // ShippingLot ?>
	<div id="r_ShippingLot" class="form-group row">
		<label id="elh_pharmacy_products_ShippingLot" for="x_ShippingLot" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ShippingLot->caption() ?><?php echo $pharmacy_products_edit->ShippingLot->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ShippingLot->cellAttributes() ?>>
<span id="el_pharmacy_products_ShippingLot">
<input type="text" data-table="pharmacy_products" data-field="x_ShippingLot" name="x_ShippingLot" id="x_ShippingLot" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ShippingLot->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ShippingLot->EditValue ?>"<?php echo $pharmacy_products_edit->ShippingLot->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ShippingLot->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
	<div id="r_AllowExpiryReplacement" class="form-group row">
		<label id="elh_pharmacy_products_AllowExpiryReplacement" for="x_AllowExpiryReplacement" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AllowExpiryReplacement->caption() ?><?php echo $pharmacy_products_edit->AllowExpiryReplacement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowExpiryReplacement">
<input type="text" data-table="pharmacy_products" data-field="x_AllowExpiryReplacement" name="x_AllowExpiryReplacement" id="x_AllowExpiryReplacement" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AllowExpiryReplacement->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AllowExpiryReplacement->EditValue ?>"<?php echo $pharmacy_products_edit->AllowExpiryReplacement->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AllowExpiryReplacement->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
	<div id="r_NoOfMonthExpiryAllowed" class="form-group row">
		<label id="elh_pharmacy_products_NoOfMonthExpiryAllowed" for="x_NoOfMonthExpiryAllowed" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->NoOfMonthExpiryAllowed->caption() ?><?php echo $pharmacy_products_edit->NoOfMonthExpiryAllowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el_pharmacy_products_NoOfMonthExpiryAllowed">
<input type="text" data-table="pharmacy_products" data-field="x_NoOfMonthExpiryAllowed" name="x_NoOfMonthExpiryAllowed" id="x_NoOfMonthExpiryAllowed" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->NoOfMonthExpiryAllowed->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->NoOfMonthExpiryAllowed->EditValue ?>"<?php echo $pharmacy_products_edit->NoOfMonthExpiryAllowed->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->NoOfMonthExpiryAllowed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
	<div id="r_ProductDiscountEligibility" class="form-group row">
		<label id="elh_pharmacy_products_ProductDiscountEligibility" for="x_ProductDiscountEligibility" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductDiscountEligibility->caption() ?><?php echo $pharmacy_products_edit->ProductDiscountEligibility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductDiscountEligibility">
<input type="text" data-table="pharmacy_products" data-field="x_ProductDiscountEligibility" name="x_ProductDiscountEligibility" id="x_ProductDiscountEligibility" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductDiscountEligibility->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductDiscountEligibility->EditValue ?>"<?php echo $pharmacy_products_edit->ProductDiscountEligibility->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductDiscountEligibility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
	<div id="r_ScheduleTypeCode" class="form-group row">
		<label id="elh_pharmacy_products_ScheduleTypeCode" for="x_ScheduleTypeCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ScheduleTypeCode->caption() ?><?php echo $pharmacy_products_edit->ScheduleTypeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ScheduleTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ScheduleTypeCode">
<input type="text" data-table="pharmacy_products" data-field="x_ScheduleTypeCode" name="x_ScheduleTypeCode" id="x_ScheduleTypeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ScheduleTypeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ScheduleTypeCode->EditValue ?>"<?php echo $pharmacy_products_edit->ScheduleTypeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ScheduleTypeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
	<div id="r_AIOCDProductCode" class="form-group row">
		<label id="elh_pharmacy_products_AIOCDProductCode" for="x_AIOCDProductCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AIOCDProductCode->caption() ?><?php echo $pharmacy_products_edit->AIOCDProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AIOCDProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_AIOCDProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_AIOCDProductCode" name="x_AIOCDProductCode" id="x_AIOCDProductCode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AIOCDProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AIOCDProductCode->EditValue ?>"<?php echo $pharmacy_products_edit->AIOCDProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AIOCDProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FreeQuantity->Visible) { // FreeQuantity ?>
	<div id="r_FreeQuantity" class="form-group row">
		<label id="elh_pharmacy_products_FreeQuantity" for="x_FreeQuantity" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FreeQuantity->caption() ?><?php echo $pharmacy_products_edit->FreeQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FreeQuantity->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeQuantity">
<input type="text" data-table="pharmacy_products" data-field="x_FreeQuantity" name="x_FreeQuantity" id="x_FreeQuantity" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FreeQuantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FreeQuantity->EditValue ?>"<?php echo $pharmacy_products_edit->FreeQuantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->FreeQuantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DiscountType->Visible) { // DiscountType ?>
	<div id="r_DiscountType" class="form-group row">
		<label id="elh_pharmacy_products_DiscountType" for="x_DiscountType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DiscountType->caption() ?><?php echo $pharmacy_products_edit->DiscountType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DiscountType->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountType">
<input type="text" data-table="pharmacy_products" data-field="x_DiscountType" name="x_DiscountType" id="x_DiscountType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DiscountType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DiscountType->EditValue ?>"<?php echo $pharmacy_products_edit->DiscountType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DiscountType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DiscountValue->Visible) { // DiscountValue ?>
	<div id="r_DiscountValue" class="form-group row">
		<label id="elh_pharmacy_products_DiscountValue" for="x_DiscountValue" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DiscountValue->caption() ?><?php echo $pharmacy_products_edit->DiscountValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DiscountValue->cellAttributes() ?>>
<span id="el_pharmacy_products_DiscountValue">
<input type="text" data-table="pharmacy_products" data-field="x_DiscountValue" name="x_DiscountValue" id="x_DiscountValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DiscountValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DiscountValue->EditValue ?>"<?php echo $pharmacy_products_edit->DiscountValue->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DiscountValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
	<div id="r_HasProductOrderAttribute" class="form-group row">
		<label id="elh_pharmacy_products_HasProductOrderAttribute" for="x_HasProductOrderAttribute" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->HasProductOrderAttribute->caption() ?><?php echo $pharmacy_products_edit->HasProductOrderAttribute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el_pharmacy_products_HasProductOrderAttribute">
<input type="text" data-table="pharmacy_products" data-field="x_HasProductOrderAttribute" name="x_HasProductOrderAttribute" id="x_HasProductOrderAttribute" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->HasProductOrderAttribute->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->HasProductOrderAttribute->EditValue ?>"<?php echo $pharmacy_products_edit->HasProductOrderAttribute->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->HasProductOrderAttribute->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FirstPODate->Visible) { // FirstPODate ?>
	<div id="r_FirstPODate" class="form-group row">
		<label id="elh_pharmacy_products_FirstPODate" for="x_FirstPODate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FirstPODate->caption() ?><?php echo $pharmacy_products_edit->FirstPODate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FirstPODate->cellAttributes() ?>>
<span id="el_pharmacy_products_FirstPODate">
<input type="text" data-table="pharmacy_products" data-field="x_FirstPODate" name="x_FirstPODate" id="x_FirstPODate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FirstPODate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FirstPODate->EditValue ?>"<?php echo $pharmacy_products_edit->FirstPODate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->FirstPODate->ReadOnly && !$pharmacy_products_edit->FirstPODate->Disabled && !isset($pharmacy_products_edit->FirstPODate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->FirstPODate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_FirstPODate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->FirstPODate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
	<div id="r_SaleprcieAndMrpCalcPercent" class="form-group row">
		<label id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" for="x_SaleprcieAndMrpCalcPercent" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SaleprcieAndMrpCalcPercent->caption() ?><?php echo $pharmacy_products_edit->SaleprcieAndMrpCalcPercent->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el_pharmacy_products_SaleprcieAndMrpCalcPercent">
<input type="text" data-table="pharmacy_products" data-field="x_SaleprcieAndMrpCalcPercent" name="x_SaleprcieAndMrpCalcPercent" id="x_SaleprcieAndMrpCalcPercent" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SaleprcieAndMrpCalcPercent->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SaleprcieAndMrpCalcPercent->EditValue ?>"<?php echo $pharmacy_products_edit->SaleprcieAndMrpCalcPercent->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SaleprcieAndMrpCalcPercent->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
	<div id="r_IsGiftVoucherProducts" class="form-group row">
		<label id="elh_pharmacy_products_IsGiftVoucherProducts" for="x_IsGiftVoucherProducts" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IsGiftVoucherProducts->caption() ?><?php echo $pharmacy_products_edit->IsGiftVoucherProducts->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el_pharmacy_products_IsGiftVoucherProducts">
<input type="text" data-table="pharmacy_products" data-field="x_IsGiftVoucherProducts" name="x_IsGiftVoucherProducts" id="x_IsGiftVoucherProducts" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IsGiftVoucherProducts->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IsGiftVoucherProducts->EditValue ?>"<?php echo $pharmacy_products_edit->IsGiftVoucherProducts->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IsGiftVoucherProducts->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
	<div id="r_AcceptRange4SerialNumber" class="form-group row">
		<label id="elh_pharmacy_products_AcceptRange4SerialNumber" for="x_AcceptRange4SerialNumber" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AcceptRange4SerialNumber->caption() ?><?php echo $pharmacy_products_edit->AcceptRange4SerialNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRange4SerialNumber">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptRange4SerialNumber" name="x_AcceptRange4SerialNumber" id="x_AcceptRange4SerialNumber" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AcceptRange4SerialNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AcceptRange4SerialNumber->EditValue ?>"<?php echo $pharmacy_products_edit->AcceptRange4SerialNumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AcceptRange4SerialNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
	<div id="r_GiftVoucherDenomination" class="form-group row">
		<label id="elh_pharmacy_products_GiftVoucherDenomination" for="x_GiftVoucherDenomination" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->GiftVoucherDenomination->caption() ?><?php echo $pharmacy_products_edit->GiftVoucherDenomination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftVoucherDenomination">
<input type="text" data-table="pharmacy_products" data-field="x_GiftVoucherDenomination" name="x_GiftVoucherDenomination" id="x_GiftVoucherDenomination" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->GiftVoucherDenomination->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->GiftVoucherDenomination->EditValue ?>"<?php echo $pharmacy_products_edit->GiftVoucherDenomination->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->GiftVoucherDenomination->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Subclasscode->Visible) { // Subclasscode ?>
	<div id="r_Subclasscode" class="form-group row">
		<label id="elh_pharmacy_products_Subclasscode" for="x_Subclasscode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Subclasscode->caption() ?><?php echo $pharmacy_products_edit->Subclasscode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Subclasscode->cellAttributes() ?>>
<span id="el_pharmacy_products_Subclasscode">
<input type="text" data-table="pharmacy_products" data-field="x_Subclasscode" name="x_Subclasscode" id="x_Subclasscode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Subclasscode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Subclasscode->EditValue ?>"<?php echo $pharmacy_products_edit->Subclasscode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Subclasscode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
	<div id="r_BarCodeFromWeighingMachine" class="form-group row">
		<label id="elh_pharmacy_products_BarCodeFromWeighingMachine" for="x_BarCodeFromWeighingMachine" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BarCodeFromWeighingMachine->caption() ?><?php echo $pharmacy_products_edit->BarCodeFromWeighingMachine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeFromWeighingMachine">
<input type="text" data-table="pharmacy_products" data-field="x_BarCodeFromWeighingMachine" name="x_BarCodeFromWeighingMachine" id="x_BarCodeFromWeighingMachine" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BarCodeFromWeighingMachine->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BarCodeFromWeighingMachine->EditValue ?>"<?php echo $pharmacy_products_edit->BarCodeFromWeighingMachine->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BarCodeFromWeighingMachine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
	<div id="r_CheckCostInReturn" class="form-group row">
		<label id="elh_pharmacy_products_CheckCostInReturn" for="x_CheckCostInReturn" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CheckCostInReturn->caption() ?><?php echo $pharmacy_products_edit->CheckCostInReturn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CheckCostInReturn->cellAttributes() ?>>
<span id="el_pharmacy_products_CheckCostInReturn">
<input type="text" data-table="pharmacy_products" data-field="x_CheckCostInReturn" name="x_CheckCostInReturn" id="x_CheckCostInReturn" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CheckCostInReturn->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CheckCostInReturn->EditValue ?>"<?php echo $pharmacy_products_edit->CheckCostInReturn->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CheckCostInReturn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
	<div id="r_FrequentSaleProduct" class="form-group row">
		<label id="elh_pharmacy_products_FrequentSaleProduct" for="x_FrequentSaleProduct" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FrequentSaleProduct->caption() ?><?php echo $pharmacy_products_edit->FrequentSaleProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FrequentSaleProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_FrequentSaleProduct">
<input type="text" data-table="pharmacy_products" data-field="x_FrequentSaleProduct" name="x_FrequentSaleProduct" id="x_FrequentSaleProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FrequentSaleProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FrequentSaleProduct->EditValue ?>"<?php echo $pharmacy_products_edit->FrequentSaleProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->FrequentSaleProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->RateType->Visible) { // RateType ?>
	<div id="r_RateType" class="form-group row">
		<label id="elh_pharmacy_products_RateType" for="x_RateType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->RateType->caption() ?><?php echo $pharmacy_products_edit->RateType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->RateType->cellAttributes() ?>>
<span id="el_pharmacy_products_RateType">
<input type="text" data-table="pharmacy_products" data-field="x_RateType" name="x_RateType" id="x_RateType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->RateType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->RateType->EditValue ?>"<?php echo $pharmacy_products_edit->RateType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->RateType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TouchscreenName->Visible) { // TouchscreenName ?>
	<div id="r_TouchscreenName" class="form-group row">
		<label id="elh_pharmacy_products_TouchscreenName" for="x_TouchscreenName" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TouchscreenName->caption() ?><?php echo $pharmacy_products_edit->TouchscreenName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TouchscreenName->cellAttributes() ?>>
<span id="el_pharmacy_products_TouchscreenName">
<input type="text" data-table="pharmacy_products" data-field="x_TouchscreenName" name="x_TouchscreenName" id="x_TouchscreenName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TouchscreenName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TouchscreenName->EditValue ?>"<?php echo $pharmacy_products_edit->TouchscreenName->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TouchscreenName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FreeType->Visible) { // FreeType ?>
	<div id="r_FreeType" class="form-group row">
		<label id="elh_pharmacy_products_FreeType" for="x_FreeType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FreeType->caption() ?><?php echo $pharmacy_products_edit->FreeType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FreeType->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeType">
<input type="text" data-table="pharmacy_products" data-field="x_FreeType" name="x_FreeType" id="x_FreeType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FreeType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FreeType->EditValue ?>"<?php echo $pharmacy_products_edit->FreeType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->FreeType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
	<div id="r_LooseQtyasNewBatch" class="form-group row">
		<label id="elh_pharmacy_products_LooseQtyasNewBatch" for="x_LooseQtyasNewBatch" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LooseQtyasNewBatch->caption() ?><?php echo $pharmacy_products_edit->LooseQtyasNewBatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_LooseQtyasNewBatch">
<input type="text" data-table="pharmacy_products" data-field="x_LooseQtyasNewBatch" name="x_LooseQtyasNewBatch" id="x_LooseQtyasNewBatch" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LooseQtyasNewBatch->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->LooseQtyasNewBatch->EditValue ?>"<?php echo $pharmacy_products_edit->LooseQtyasNewBatch->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->LooseQtyasNewBatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
	<div id="r_AllowSlabBilling" class="form-group row">
		<label id="elh_pharmacy_products_AllowSlabBilling" for="x_AllowSlabBilling" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AllowSlabBilling->caption() ?><?php echo $pharmacy_products_edit->AllowSlabBilling->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AllowSlabBilling->cellAttributes() ?>>
<span id="el_pharmacy_products_AllowSlabBilling">
<input type="text" data-table="pharmacy_products" data-field="x_AllowSlabBilling" name="x_AllowSlabBilling" id="x_AllowSlabBilling" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AllowSlabBilling->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AllowSlabBilling->EditValue ?>"<?php echo $pharmacy_products_edit->AllowSlabBilling->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AllowSlabBilling->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
	<div id="r_ProductTypeForProduction" class="form-group row">
		<label id="elh_pharmacy_products_ProductTypeForProduction" for="x_ProductTypeForProduction" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductTypeForProduction->caption() ?><?php echo $pharmacy_products_edit->ProductTypeForProduction->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductTypeForProduction->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductTypeForProduction">
<input type="text" data-table="pharmacy_products" data-field="x_ProductTypeForProduction" name="x_ProductTypeForProduction" id="x_ProductTypeForProduction" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductTypeForProduction->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductTypeForProduction->EditValue ?>"<?php echo $pharmacy_products_edit->ProductTypeForProduction->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductTypeForProduction->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->RecipeCode->Visible) { // RecipeCode ?>
	<div id="r_RecipeCode" class="form-group row">
		<label id="elh_pharmacy_products_RecipeCode" for="x_RecipeCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->RecipeCode->caption() ?><?php echo $pharmacy_products_edit->RecipeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->RecipeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RecipeCode">
<input type="text" data-table="pharmacy_products" data-field="x_RecipeCode" name="x_RecipeCode" id="x_RecipeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->RecipeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->RecipeCode->EditValue ?>"<?php echo $pharmacy_products_edit->RecipeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->RecipeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DefaultUnitType->Visible) { // DefaultUnitType ?>
	<div id="r_DefaultUnitType" class="form-group row">
		<label id="elh_pharmacy_products_DefaultUnitType" for="x_DefaultUnitType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DefaultUnitType->caption() ?><?php echo $pharmacy_products_edit->DefaultUnitType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DefaultUnitType->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultUnitType">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultUnitType" name="x_DefaultUnitType" id="x_DefaultUnitType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DefaultUnitType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DefaultUnitType->EditValue ?>"<?php echo $pharmacy_products_edit->DefaultUnitType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DefaultUnitType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PIstatus->Visible) { // PIstatus ?>
	<div id="r_PIstatus" class="form-group row">
		<label id="elh_pharmacy_products_PIstatus" for="x_PIstatus" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PIstatus->caption() ?><?php echo $pharmacy_products_edit->PIstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PIstatus->cellAttributes() ?>>
<span id="el_pharmacy_products_PIstatus">
<input type="text" data-table="pharmacy_products" data-field="x_PIstatus" name="x_PIstatus" id="x_PIstatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PIstatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PIstatus->EditValue ?>"<?php echo $pharmacy_products_edit->PIstatus->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PIstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
	<div id="r_LastPiConfirmedDate" class="form-group row">
		<label id="elh_pharmacy_products_LastPiConfirmedDate" for="x_LastPiConfirmedDate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LastPiConfirmedDate->caption() ?><?php echo $pharmacy_products_edit->LastPiConfirmedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPiConfirmedDate">
<input type="text" data-table="pharmacy_products" data-field="x_LastPiConfirmedDate" name="x_LastPiConfirmedDate" id="x_LastPiConfirmedDate" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LastPiConfirmedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->LastPiConfirmedDate->EditValue ?>"<?php echo $pharmacy_products_edit->LastPiConfirmedDate->editAttributes() ?>>
<?php if (!$pharmacy_products_edit->LastPiConfirmedDate->ReadOnly && !$pharmacy_products_edit->LastPiConfirmedDate->Disabled && !isset($pharmacy_products_edit->LastPiConfirmedDate->EditAttrs["readonly"]) && !isset($pharmacy_products_edit->LastPiConfirmedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_productsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_productsedit", "x_LastPiConfirmedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_products_edit->LastPiConfirmedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BarCodeDesign->Visible) { // BarCodeDesign ?>
	<div id="r_BarCodeDesign" class="form-group row">
		<label id="elh_pharmacy_products_BarCodeDesign" for="x_BarCodeDesign" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BarCodeDesign->caption() ?><?php echo $pharmacy_products_edit->BarCodeDesign->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BarCodeDesign->cellAttributes() ?>>
<span id="el_pharmacy_products_BarCodeDesign">
<input type="text" data-table="pharmacy_products" data-field="x_BarCodeDesign" name="x_BarCodeDesign" id="x_BarCodeDesign" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BarCodeDesign->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BarCodeDesign->EditValue ?>"<?php echo $pharmacy_products_edit->BarCodeDesign->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BarCodeDesign->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
	<div id="r_AcceptRemarksInBill" class="form-group row">
		<label id="elh_pharmacy_products_AcceptRemarksInBill" for="x_AcceptRemarksInBill" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AcceptRemarksInBill->caption() ?><?php echo $pharmacy_products_edit->AcceptRemarksInBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptRemarksInBill">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptRemarksInBill" name="x_AcceptRemarksInBill" id="x_AcceptRemarksInBill" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AcceptRemarksInBill->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AcceptRemarksInBill->EditValue ?>"<?php echo $pharmacy_products_edit->AcceptRemarksInBill->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AcceptRemarksInBill->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Classification->Visible) { // Classification ?>
	<div id="r_Classification" class="form-group row">
		<label id="elh_pharmacy_products_Classification" for="x_Classification" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Classification->caption() ?><?php echo $pharmacy_products_edit->Classification->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Classification->cellAttributes() ?>>
<span id="el_pharmacy_products_Classification">
<input type="text" data-table="pharmacy_products" data-field="x_Classification" name="x_Classification" id="x_Classification" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Classification->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Classification->EditValue ?>"<?php echo $pharmacy_products_edit->Classification->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Classification->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TimeSlot->Visible) { // TimeSlot ?>
	<div id="r_TimeSlot" class="form-group row">
		<label id="elh_pharmacy_products_TimeSlot" for="x_TimeSlot" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TimeSlot->caption() ?><?php echo $pharmacy_products_edit->TimeSlot->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TimeSlot->cellAttributes() ?>>
<span id="el_pharmacy_products_TimeSlot">
<input type="text" data-table="pharmacy_products" data-field="x_TimeSlot" name="x_TimeSlot" id="x_TimeSlot" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TimeSlot->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TimeSlot->EditValue ?>"<?php echo $pharmacy_products_edit->TimeSlot->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TimeSlot->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IsBundle->Visible) { // IsBundle ?>
	<div id="r_IsBundle" class="form-group row">
		<label id="elh_pharmacy_products_IsBundle" for="x_IsBundle" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IsBundle->caption() ?><?php echo $pharmacy_products_edit->IsBundle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IsBundle->cellAttributes() ?>>
<span id="el_pharmacy_products_IsBundle">
<input type="text" data-table="pharmacy_products" data-field="x_IsBundle" name="x_IsBundle" id="x_IsBundle" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IsBundle->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IsBundle->EditValue ?>"<?php echo $pharmacy_products_edit->IsBundle->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IsBundle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ColorCode->Visible) { // ColorCode ?>
	<div id="r_ColorCode" class="form-group row">
		<label id="elh_pharmacy_products_ColorCode" for="x_ColorCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ColorCode->caption() ?><?php echo $pharmacy_products_edit->ColorCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ColorCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ColorCode">
<input type="text" data-table="pharmacy_products" data-field="x_ColorCode" name="x_ColorCode" id="x_ColorCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ColorCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ColorCode->EditValue ?>"<?php echo $pharmacy_products_edit->ColorCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ColorCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->GenderCode->Visible) { // GenderCode ?>
	<div id="r_GenderCode" class="form-group row">
		<label id="elh_pharmacy_products_GenderCode" for="x_GenderCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->GenderCode->caption() ?><?php echo $pharmacy_products_edit->GenderCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->GenderCode->cellAttributes() ?>>
<span id="el_pharmacy_products_GenderCode">
<input type="text" data-table="pharmacy_products" data-field="x_GenderCode" name="x_GenderCode" id="x_GenderCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->GenderCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->GenderCode->EditValue ?>"<?php echo $pharmacy_products_edit->GenderCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->GenderCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SizeCode->Visible) { // SizeCode ?>
	<div id="r_SizeCode" class="form-group row">
		<label id="elh_pharmacy_products_SizeCode" for="x_SizeCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SizeCode->caption() ?><?php echo $pharmacy_products_edit->SizeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SizeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_SizeCode">
<input type="text" data-table="pharmacy_products" data-field="x_SizeCode" name="x_SizeCode" id="x_SizeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SizeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SizeCode->EditValue ?>"<?php echo $pharmacy_products_edit->SizeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SizeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->GiftCard->Visible) { // GiftCard ?>
	<div id="r_GiftCard" class="form-group row">
		<label id="elh_pharmacy_products_GiftCard" for="x_GiftCard" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->GiftCard->caption() ?><?php echo $pharmacy_products_edit->GiftCard->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->GiftCard->cellAttributes() ?>>
<span id="el_pharmacy_products_GiftCard">
<input type="text" data-table="pharmacy_products" data-field="x_GiftCard" name="x_GiftCard" id="x_GiftCard" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->GiftCard->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->GiftCard->EditValue ?>"<?php echo $pharmacy_products_edit->GiftCard->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->GiftCard->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ToonLabel->Visible) { // ToonLabel ?>
	<div id="r_ToonLabel" class="form-group row">
		<label id="elh_pharmacy_products_ToonLabel" for="x_ToonLabel" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ToonLabel->caption() ?><?php echo $pharmacy_products_edit->ToonLabel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ToonLabel->cellAttributes() ?>>
<span id="el_pharmacy_products_ToonLabel">
<input type="text" data-table="pharmacy_products" data-field="x_ToonLabel" name="x_ToonLabel" id="x_ToonLabel" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ToonLabel->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ToonLabel->EditValue ?>"<?php echo $pharmacy_products_edit->ToonLabel->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ToonLabel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->GarmentType->Visible) { // GarmentType ?>
	<div id="r_GarmentType" class="form-group row">
		<label id="elh_pharmacy_products_GarmentType" for="x_GarmentType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->GarmentType->caption() ?><?php echo $pharmacy_products_edit->GarmentType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->GarmentType->cellAttributes() ?>>
<span id="el_pharmacy_products_GarmentType">
<input type="text" data-table="pharmacy_products" data-field="x_GarmentType" name="x_GarmentType" id="x_GarmentType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->GarmentType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->GarmentType->EditValue ?>"<?php echo $pharmacy_products_edit->GarmentType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->GarmentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AgeGroup->Visible) { // AgeGroup ?>
	<div id="r_AgeGroup" class="form-group row">
		<label id="elh_pharmacy_products_AgeGroup" for="x_AgeGroup" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AgeGroup->caption() ?><?php echo $pharmacy_products_edit->AgeGroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AgeGroup->cellAttributes() ?>>
<span id="el_pharmacy_products_AgeGroup">
<input type="text" data-table="pharmacy_products" data-field="x_AgeGroup" name="x_AgeGroup" id="x_AgeGroup" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AgeGroup->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AgeGroup->EditValue ?>"<?php echo $pharmacy_products_edit->AgeGroup->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AgeGroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Season->Visible) { // Season ?>
	<div id="r_Season" class="form-group row">
		<label id="elh_pharmacy_products_Season" for="x_Season" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Season->caption() ?><?php echo $pharmacy_products_edit->Season->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Season->cellAttributes() ?>>
<span id="el_pharmacy_products_Season">
<input type="text" data-table="pharmacy_products" data-field="x_Season" name="x_Season" id="x_Season" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Season->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Season->EditValue ?>"<?php echo $pharmacy_products_edit->Season->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Season->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DailyStockEntry->Visible) { // DailyStockEntry ?>
	<div id="r_DailyStockEntry" class="form-group row">
		<label id="elh_pharmacy_products_DailyStockEntry" for="x_DailyStockEntry" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DailyStockEntry->caption() ?><?php echo $pharmacy_products_edit->DailyStockEntry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DailyStockEntry->cellAttributes() ?>>
<span id="el_pharmacy_products_DailyStockEntry">
<input type="text" data-table="pharmacy_products" data-field="x_DailyStockEntry" name="x_DailyStockEntry" id="x_DailyStockEntry" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DailyStockEntry->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DailyStockEntry->EditValue ?>"<?php echo $pharmacy_products_edit->DailyStockEntry->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DailyStockEntry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ModifierApplicable->Visible) { // ModifierApplicable ?>
	<div id="r_ModifierApplicable" class="form-group row">
		<label id="elh_pharmacy_products_ModifierApplicable" for="x_ModifierApplicable" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ModifierApplicable->caption() ?><?php echo $pharmacy_products_edit->ModifierApplicable->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ModifierApplicable->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierApplicable">
<input type="text" data-table="pharmacy_products" data-field="x_ModifierApplicable" name="x_ModifierApplicable" id="x_ModifierApplicable" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ModifierApplicable->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ModifierApplicable->EditValue ?>"<?php echo $pharmacy_products_edit->ModifierApplicable->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ModifierApplicable->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ModifierType->Visible) { // ModifierType ?>
	<div id="r_ModifierType" class="form-group row">
		<label id="elh_pharmacy_products_ModifierType" for="x_ModifierType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ModifierType->caption() ?><?php echo $pharmacy_products_edit->ModifierType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ModifierType->cellAttributes() ?>>
<span id="el_pharmacy_products_ModifierType">
<input type="text" data-table="pharmacy_products" data-field="x_ModifierType" name="x_ModifierType" id="x_ModifierType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ModifierType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ModifierType->EditValue ?>"<?php echo $pharmacy_products_edit->ModifierType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ModifierType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
	<div id="r_AcceptZeroRate" class="form-group row">
		<label id="elh_pharmacy_products_AcceptZeroRate" for="x_AcceptZeroRate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AcceptZeroRate->caption() ?><?php echo $pharmacy_products_edit->AcceptZeroRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AcceptZeroRate->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptZeroRate">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptZeroRate" name="x_AcceptZeroRate" id="x_AcceptZeroRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AcceptZeroRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AcceptZeroRate->EditValue ?>"<?php echo $pharmacy_products_edit->AcceptZeroRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AcceptZeroRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
	<div id="r_ExciseDutyCode" class="form-group row">
		<label id="elh_pharmacy_products_ExciseDutyCode" for="x_ExciseDutyCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ExciseDutyCode->caption() ?><?php echo $pharmacy_products_edit->ExciseDutyCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ExciseDutyCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ExciseDutyCode">
<input type="text" data-table="pharmacy_products" data-field="x_ExciseDutyCode" name="x_ExciseDutyCode" id="x_ExciseDutyCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ExciseDutyCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ExciseDutyCode->EditValue ?>"<?php echo $pharmacy_products_edit->ExciseDutyCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ExciseDutyCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
	<div id="r_IndentProductGroupCode" class="form-group row">
		<label id="elh_pharmacy_products_IndentProductGroupCode" for="x_IndentProductGroupCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IndentProductGroupCode->caption() ?><?php echo $pharmacy_products_edit->IndentProductGroupCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IndentProductGroupCode->cellAttributes() ?>>
<span id="el_pharmacy_products_IndentProductGroupCode">
<input type="text" data-table="pharmacy_products" data-field="x_IndentProductGroupCode" name="x_IndentProductGroupCode" id="x_IndentProductGroupCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IndentProductGroupCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IndentProductGroupCode->EditValue ?>"<?php echo $pharmacy_products_edit->IndentProductGroupCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IndentProductGroupCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IsMultiBatch->Visible) { // IsMultiBatch ?>
	<div id="r_IsMultiBatch" class="form-group row">
		<label id="elh_pharmacy_products_IsMultiBatch" for="x_IsMultiBatch" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IsMultiBatch->caption() ?><?php echo $pharmacy_products_edit->IsMultiBatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IsMultiBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMultiBatch">
<input type="text" data-table="pharmacy_products" data-field="x_IsMultiBatch" name="x_IsMultiBatch" id="x_IsMultiBatch" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IsMultiBatch->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IsMultiBatch->EditValue ?>"<?php echo $pharmacy_products_edit->IsMultiBatch->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IsMultiBatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IsSingleBatch->Visible) { // IsSingleBatch ?>
	<div id="r_IsSingleBatch" class="form-group row">
		<label id="elh_pharmacy_products_IsSingleBatch" for="x_IsSingleBatch" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IsSingleBatch->caption() ?><?php echo $pharmacy_products_edit->IsSingleBatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IsSingleBatch->cellAttributes() ?>>
<span id="el_pharmacy_products_IsSingleBatch">
<input type="text" data-table="pharmacy_products" data-field="x_IsSingleBatch" name="x_IsSingleBatch" id="x_IsSingleBatch" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IsSingleBatch->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IsSingleBatch->EditValue ?>"<?php echo $pharmacy_products_edit->IsSingleBatch->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IsSingleBatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MarkUpRate1->Visible) { // MarkUpRate1 ?>
	<div id="r_MarkUpRate1" class="form-group row">
		<label id="elh_pharmacy_products_MarkUpRate1" for="x_MarkUpRate1" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MarkUpRate1->caption() ?><?php echo $pharmacy_products_edit->MarkUpRate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MarkUpRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate1">
<input type="text" data-table="pharmacy_products" data-field="x_MarkUpRate1" name="x_MarkUpRate1" id="x_MarkUpRate1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MarkUpRate1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MarkUpRate1->EditValue ?>"<?php echo $pharmacy_products_edit->MarkUpRate1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MarkUpRate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MarkDownRate1->Visible) { // MarkDownRate1 ?>
	<div id="r_MarkDownRate1" class="form-group row">
		<label id="elh_pharmacy_products_MarkDownRate1" for="x_MarkDownRate1" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MarkDownRate1->caption() ?><?php echo $pharmacy_products_edit->MarkDownRate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MarkDownRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate1">
<input type="text" data-table="pharmacy_products" data-field="x_MarkDownRate1" name="x_MarkDownRate1" id="x_MarkDownRate1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MarkDownRate1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MarkDownRate1->EditValue ?>"<?php echo $pharmacy_products_edit->MarkDownRate1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MarkDownRate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MarkUpRate2->Visible) { // MarkUpRate2 ?>
	<div id="r_MarkUpRate2" class="form-group row">
		<label id="elh_pharmacy_products_MarkUpRate2" for="x_MarkUpRate2" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MarkUpRate2->caption() ?><?php echo $pharmacy_products_edit->MarkUpRate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MarkUpRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkUpRate2">
<input type="text" data-table="pharmacy_products" data-field="x_MarkUpRate2" name="x_MarkUpRate2" id="x_MarkUpRate2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MarkUpRate2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MarkUpRate2->EditValue ?>"<?php echo $pharmacy_products_edit->MarkUpRate2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MarkUpRate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MarkDownRate2->Visible) { // MarkDownRate2 ?>
	<div id="r_MarkDownRate2" class="form-group row">
		<label id="elh_pharmacy_products_MarkDownRate2" for="x_MarkDownRate2" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MarkDownRate2->caption() ?><?php echo $pharmacy_products_edit->MarkDownRate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MarkDownRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_MarkDownRate2">
<input type="text" data-table="pharmacy_products" data-field="x_MarkDownRate2" name="x_MarkDownRate2" id="x_MarkDownRate2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MarkDownRate2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MarkDownRate2->EditValue ?>"<?php echo $pharmacy_products_edit->MarkDownRate2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MarkDownRate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->_Yield->Visible) { // Yield ?>
	<div id="r__Yield" class="form-group row">
		<label id="elh_pharmacy_products__Yield" for="x__Yield" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->_Yield->caption() ?><?php echo $pharmacy_products_edit->_Yield->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->_Yield->cellAttributes() ?>>
<span id="el_pharmacy_products__Yield">
<input type="text" data-table="pharmacy_products" data-field="x__Yield" name="x__Yield" id="x__Yield" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->_Yield->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->_Yield->EditValue ?>"<?php echo $pharmacy_products_edit->_Yield->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->_Yield->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->RefProductCode->Visible) { // RefProductCode ?>
	<div id="r_RefProductCode" class="form-group row">
		<label id="elh_pharmacy_products_RefProductCode" for="x_RefProductCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->RefProductCode->caption() ?><?php echo $pharmacy_products_edit->RefProductCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->RefProductCode->cellAttributes() ?>>
<span id="el_pharmacy_products_RefProductCode">
<input type="text" data-table="pharmacy_products" data-field="x_RefProductCode" name="x_RefProductCode" id="x_RefProductCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->RefProductCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->RefProductCode->EditValue ?>"<?php echo $pharmacy_products_edit->RefProductCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->RefProductCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_pharmacy_products_Volume" for="x_Volume" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Volume->caption() ?><?php echo $pharmacy_products_edit->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Volume->cellAttributes() ?>>
<span id="el_pharmacy_products_Volume">
<input type="text" data-table="pharmacy_products" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Volume->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Volume->EditValue ?>"<?php echo $pharmacy_products_edit->Volume->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MeasurementID->Visible) { // MeasurementID ?>
	<div id="r_MeasurementID" class="form-group row">
		<label id="elh_pharmacy_products_MeasurementID" for="x_MeasurementID" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MeasurementID->caption() ?><?php echo $pharmacy_products_edit->MeasurementID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MeasurementID->cellAttributes() ?>>
<span id="el_pharmacy_products_MeasurementID">
<input type="text" data-table="pharmacy_products" data-field="x_MeasurementID" name="x_MeasurementID" id="x_MeasurementID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MeasurementID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MeasurementID->EditValue ?>"<?php echo $pharmacy_products_edit->MeasurementID->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MeasurementID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CountryCode->Visible) { // CountryCode ?>
	<div id="r_CountryCode" class="form-group row">
		<label id="elh_pharmacy_products_CountryCode" for="x_CountryCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CountryCode->caption() ?><?php echo $pharmacy_products_edit->CountryCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CountryCode->cellAttributes() ?>>
<span id="el_pharmacy_products_CountryCode">
<input type="text" data-table="pharmacy_products" data-field="x_CountryCode" name="x_CountryCode" id="x_CountryCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CountryCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CountryCode->EditValue ?>"<?php echo $pharmacy_products_edit->CountryCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CountryCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AcceptWMQty->Visible) { // AcceptWMQty ?>
	<div id="r_AcceptWMQty" class="form-group row">
		<label id="elh_pharmacy_products_AcceptWMQty" for="x_AcceptWMQty" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AcceptWMQty->caption() ?><?php echo $pharmacy_products_edit->AcceptWMQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AcceptWMQty->cellAttributes() ?>>
<span id="el_pharmacy_products_AcceptWMQty">
<input type="text" data-table="pharmacy_products" data-field="x_AcceptWMQty" name="x_AcceptWMQty" id="x_AcceptWMQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AcceptWMQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AcceptWMQty->EditValue ?>"<?php echo $pharmacy_products_edit->AcceptWMQty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AcceptWMQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
	<div id="r_SingleBatchBasedOnRate" class="form-group row">
		<label id="elh_pharmacy_products_SingleBatchBasedOnRate" for="x_SingleBatchBasedOnRate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SingleBatchBasedOnRate->caption() ?><?php echo $pharmacy_products_edit->SingleBatchBasedOnRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBatchBasedOnRate">
<input type="text" data-table="pharmacy_products" data-field="x_SingleBatchBasedOnRate" name="x_SingleBatchBasedOnRate" id="x_SingleBatchBasedOnRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SingleBatchBasedOnRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SingleBatchBasedOnRate->EditValue ?>"<?php echo $pharmacy_products_edit->SingleBatchBasedOnRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SingleBatchBasedOnRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TenderNo->Visible) { // TenderNo ?>
	<div id="r_TenderNo" class="form-group row">
		<label id="elh_pharmacy_products_TenderNo" for="x_TenderNo" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TenderNo->caption() ?><?php echo $pharmacy_products_edit->TenderNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TenderNo->cellAttributes() ?>>
<span id="el_pharmacy_products_TenderNo">
<input type="text" data-table="pharmacy_products" data-field="x_TenderNo" name="x_TenderNo" id="x_TenderNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TenderNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TenderNo->EditValue ?>"<?php echo $pharmacy_products_edit->TenderNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TenderNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
	<div id="r_SingleBillMaximumSoldQtyFiled" class="form-group row">
		<label id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" for="x_SingleBillMaximumSoldQtyFiled" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->caption() ?><?php echo $pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el_pharmacy_products_SingleBillMaximumSoldQtyFiled">
<input type="text" data-table="pharmacy_products" data-field="x_SingleBillMaximumSoldQtyFiled" name="x_SingleBillMaximumSoldQtyFiled" id="x_SingleBillMaximumSoldQtyFiled" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->EditValue ?>"<?php echo $pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SingleBillMaximumSoldQtyFiled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Strength1->Visible) { // Strength1 ?>
	<div id="r_Strength1" class="form-group row">
		<label id="elh_pharmacy_products_Strength1" for="x_Strength1" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Strength1->caption() ?><?php echo $pharmacy_products_edit->Strength1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Strength1->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength1">
<input type="text" data-table="pharmacy_products" data-field="x_Strength1" name="x_Strength1" id="x_Strength1" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Strength1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Strength1->EditValue ?>"<?php echo $pharmacy_products_edit->Strength1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Strength1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Strength2->Visible) { // Strength2 ?>
	<div id="r_Strength2" class="form-group row">
		<label id="elh_pharmacy_products_Strength2" for="x_Strength2" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Strength2->caption() ?><?php echo $pharmacy_products_edit->Strength2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Strength2->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength2">
<input type="text" data-table="pharmacy_products" data-field="x_Strength2" name="x_Strength2" id="x_Strength2" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Strength2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Strength2->EditValue ?>"<?php echo $pharmacy_products_edit->Strength2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Strength2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Strength3->Visible) { // Strength3 ?>
	<div id="r_Strength3" class="form-group row">
		<label id="elh_pharmacy_products_Strength3" for="x_Strength3" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Strength3->caption() ?><?php echo $pharmacy_products_edit->Strength3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Strength3->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength3">
<input type="text" data-table="pharmacy_products" data-field="x_Strength3" name="x_Strength3" id="x_Strength3" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Strength3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Strength3->EditValue ?>"<?php echo $pharmacy_products_edit->Strength3->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Strength3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Strength4->Visible) { // Strength4 ?>
	<div id="r_Strength4" class="form-group row">
		<label id="elh_pharmacy_products_Strength4" for="x_Strength4" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Strength4->caption() ?><?php echo $pharmacy_products_edit->Strength4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Strength4->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength4">
<input type="text" data-table="pharmacy_products" data-field="x_Strength4" name="x_Strength4" id="x_Strength4" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Strength4->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Strength4->EditValue ?>"<?php echo $pharmacy_products_edit->Strength4->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Strength4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->Strength5->Visible) { // Strength5 ?>
	<div id="r_Strength5" class="form-group row">
		<label id="elh_pharmacy_products_Strength5" for="x_Strength5" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->Strength5->caption() ?><?php echo $pharmacy_products_edit->Strength5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->Strength5->cellAttributes() ?>>
<span id="el_pharmacy_products_Strength5">
<input type="text" data-table="pharmacy_products" data-field="x_Strength5" name="x_Strength5" id="x_Strength5" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->Strength5->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->Strength5->EditValue ?>"<?php echo $pharmacy_products_edit->Strength5->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->Strength5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IngredientCode1->Visible) { // IngredientCode1 ?>
	<div id="r_IngredientCode1" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode1" for="x_IngredientCode1" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IngredientCode1->caption() ?><?php echo $pharmacy_products_edit->IngredientCode1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IngredientCode1->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode1">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode1" name="x_IngredientCode1" id="x_IngredientCode1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IngredientCode1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IngredientCode1->EditValue ?>"<?php echo $pharmacy_products_edit->IngredientCode1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IngredientCode1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IngredientCode2->Visible) { // IngredientCode2 ?>
	<div id="r_IngredientCode2" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode2" for="x_IngredientCode2" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IngredientCode2->caption() ?><?php echo $pharmacy_products_edit->IngredientCode2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IngredientCode2->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode2">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode2" name="x_IngredientCode2" id="x_IngredientCode2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IngredientCode2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IngredientCode2->EditValue ?>"<?php echo $pharmacy_products_edit->IngredientCode2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IngredientCode2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IngredientCode3->Visible) { // IngredientCode3 ?>
	<div id="r_IngredientCode3" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode3" for="x_IngredientCode3" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IngredientCode3->caption() ?><?php echo $pharmacy_products_edit->IngredientCode3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IngredientCode3->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode3">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode3" name="x_IngredientCode3" id="x_IngredientCode3" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IngredientCode3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IngredientCode3->EditValue ?>"<?php echo $pharmacy_products_edit->IngredientCode3->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IngredientCode3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IngredientCode4->Visible) { // IngredientCode4 ?>
	<div id="r_IngredientCode4" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode4" for="x_IngredientCode4" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IngredientCode4->caption() ?><?php echo $pharmacy_products_edit->IngredientCode4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IngredientCode4->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode4">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode4" name="x_IngredientCode4" id="x_IngredientCode4" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IngredientCode4->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IngredientCode4->EditValue ?>"<?php echo $pharmacy_products_edit->IngredientCode4->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IngredientCode4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IngredientCode5->Visible) { // IngredientCode5 ?>
	<div id="r_IngredientCode5" class="form-group row">
		<label id="elh_pharmacy_products_IngredientCode5" for="x_IngredientCode5" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IngredientCode5->caption() ?><?php echo $pharmacy_products_edit->IngredientCode5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IngredientCode5->cellAttributes() ?>>
<span id="el_pharmacy_products_IngredientCode5">
<input type="text" data-table="pharmacy_products" data-field="x_IngredientCode5" name="x_IngredientCode5" id="x_IngredientCode5" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IngredientCode5->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IngredientCode5->EditValue ?>"<?php echo $pharmacy_products_edit->IngredientCode5->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IngredientCode5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->OrderType->Visible) { // OrderType ?>
	<div id="r_OrderType" class="form-group row">
		<label id="elh_pharmacy_products_OrderType" for="x_OrderType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->OrderType->caption() ?><?php echo $pharmacy_products_edit->OrderType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->OrderType->cellAttributes() ?>>
<span id="el_pharmacy_products_OrderType">
<input type="text" data-table="pharmacy_products" data-field="x_OrderType" name="x_OrderType" id="x_OrderType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->OrderType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->OrderType->EditValue ?>"<?php echo $pharmacy_products_edit->OrderType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->OrderType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->StockUOM->Visible) { // StockUOM ?>
	<div id="r_StockUOM" class="form-group row">
		<label id="elh_pharmacy_products_StockUOM" for="x_StockUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->StockUOM->caption() ?><?php echo $pharmacy_products_edit->StockUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->StockUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_StockUOM">
<input type="text" data-table="pharmacy_products" data-field="x_StockUOM" name="x_StockUOM" id="x_StockUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->StockUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->StockUOM->EditValue ?>"<?php echo $pharmacy_products_edit->StockUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->StockUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PriceUOM->Visible) { // PriceUOM ?>
	<div id="r_PriceUOM" class="form-group row">
		<label id="elh_pharmacy_products_PriceUOM" for="x_PriceUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PriceUOM->caption() ?><?php echo $pharmacy_products_edit->PriceUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PriceUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_PriceUOM">
<input type="text" data-table="pharmacy_products" data-field="x_PriceUOM" name="x_PriceUOM" id="x_PriceUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PriceUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PriceUOM->EditValue ?>"<?php echo $pharmacy_products_edit->PriceUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PriceUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
	<div id="r_DefaultSaleUOM" class="form-group row">
		<label id="elh_pharmacy_products_DefaultSaleUOM" for="x_DefaultSaleUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DefaultSaleUOM->caption() ?><?php echo $pharmacy_products_edit->DefaultSaleUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DefaultSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultSaleUOM">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultSaleUOM" name="x_DefaultSaleUOM" id="x_DefaultSaleUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DefaultSaleUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DefaultSaleUOM->EditValue ?>"<?php echo $pharmacy_products_edit->DefaultSaleUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DefaultSaleUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
	<div id="r_DefaultPurchaseUOM" class="form-group row">
		<label id="elh_pharmacy_products_DefaultPurchaseUOM" for="x_DefaultPurchaseUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DefaultPurchaseUOM->caption() ?><?php echo $pharmacy_products_edit->DefaultPurchaseUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultPurchaseUOM">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultPurchaseUOM" name="x_DefaultPurchaseUOM" id="x_DefaultPurchaseUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DefaultPurchaseUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DefaultPurchaseUOM->EditValue ?>"<?php echo $pharmacy_products_edit->DefaultPurchaseUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DefaultPurchaseUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ReportingUOM->Visible) { // ReportingUOM ?>
	<div id="r_ReportingUOM" class="form-group row">
		<label id="elh_pharmacy_products_ReportingUOM" for="x_ReportingUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ReportingUOM->caption() ?><?php echo $pharmacy_products_edit->ReportingUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ReportingUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_ReportingUOM">
<input type="text" data-table="pharmacy_products" data-field="x_ReportingUOM" name="x_ReportingUOM" id="x_ReportingUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ReportingUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ReportingUOM->EditValue ?>"<?php echo $pharmacy_products_edit->ReportingUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ReportingUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
	<div id="r_LastPurchasedUOM" class="form-group row">
		<label id="elh_pharmacy_products_LastPurchasedUOM" for="x_LastPurchasedUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LastPurchasedUOM->caption() ?><?php echo $pharmacy_products_edit->LastPurchasedUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LastPurchasedUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_LastPurchasedUOM">
<input type="text" data-table="pharmacy_products" data-field="x_LastPurchasedUOM" name="x_LastPurchasedUOM" id="x_LastPurchasedUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LastPurchasedUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->LastPurchasedUOM->EditValue ?>"<?php echo $pharmacy_products_edit->LastPurchasedUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->LastPurchasedUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TreatmentCodes->Visible) { // TreatmentCodes ?>
	<div id="r_TreatmentCodes" class="form-group row">
		<label id="elh_pharmacy_products_TreatmentCodes" for="x_TreatmentCodes" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TreatmentCodes->caption() ?><?php echo $pharmacy_products_edit->TreatmentCodes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TreatmentCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_TreatmentCodes">
<input type="text" data-table="pharmacy_products" data-field="x_TreatmentCodes" name="x_TreatmentCodes" id="x_TreatmentCodes" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TreatmentCodes->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TreatmentCodes->EditValue ?>"<?php echo $pharmacy_products_edit->TreatmentCodes->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TreatmentCodes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->InsuranceType->Visible) { // InsuranceType ?>
	<div id="r_InsuranceType" class="form-group row">
		<label id="elh_pharmacy_products_InsuranceType" for="x_InsuranceType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->InsuranceType->caption() ?><?php echo $pharmacy_products_edit->InsuranceType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->InsuranceType->cellAttributes() ?>>
<span id="el_pharmacy_products_InsuranceType">
<input type="text" data-table="pharmacy_products" data-field="x_InsuranceType" name="x_InsuranceType" id="x_InsuranceType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->InsuranceType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->InsuranceType->EditValue ?>"<?php echo $pharmacy_products_edit->InsuranceType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->InsuranceType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
	<div id="r_CoverageGroupCodes" class="form-group row">
		<label id="elh_pharmacy_products_CoverageGroupCodes" for="x_CoverageGroupCodes" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->CoverageGroupCodes->caption() ?><?php echo $pharmacy_products_edit->CoverageGroupCodes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->CoverageGroupCodes->cellAttributes() ?>>
<span id="el_pharmacy_products_CoverageGroupCodes">
<input type="text" data-table="pharmacy_products" data-field="x_CoverageGroupCodes" name="x_CoverageGroupCodes" id="x_CoverageGroupCodes" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->CoverageGroupCodes->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->CoverageGroupCodes->EditValue ?>"<?php echo $pharmacy_products_edit->CoverageGroupCodes->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->CoverageGroupCodes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MultipleUOM->Visible) { // MultipleUOM ?>
	<div id="r_MultipleUOM" class="form-group row">
		<label id="elh_pharmacy_products_MultipleUOM" for="x_MultipleUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MultipleUOM->caption() ?><?php echo $pharmacy_products_edit->MultipleUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MultipleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MultipleUOM">
<input type="text" data-table="pharmacy_products" data-field="x_MultipleUOM" name="x_MultipleUOM" id="x_MultipleUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MultipleUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MultipleUOM->EditValue ?>"<?php echo $pharmacy_products_edit->MultipleUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MultipleUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SalePriceComputation->Visible) { // SalePriceComputation ?>
	<div id="r_SalePriceComputation" class="form-group row">
		<label id="elh_pharmacy_products_SalePriceComputation" for="x_SalePriceComputation" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SalePriceComputation->caption() ?><?php echo $pharmacy_products_edit->SalePriceComputation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SalePriceComputation->cellAttributes() ?>>
<span id="el_pharmacy_products_SalePriceComputation">
<input type="text" data-table="pharmacy_products" data-field="x_SalePriceComputation" name="x_SalePriceComputation" id="x_SalePriceComputation" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SalePriceComputation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SalePriceComputation->EditValue ?>"<?php echo $pharmacy_products_edit->SalePriceComputation->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SalePriceComputation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->StockCorrection->Visible) { // StockCorrection ?>
	<div id="r_StockCorrection" class="form-group row">
		<label id="elh_pharmacy_products_StockCorrection" for="x_StockCorrection" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->StockCorrection->caption() ?><?php echo $pharmacy_products_edit->StockCorrection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->StockCorrection->cellAttributes() ?>>
<span id="el_pharmacy_products_StockCorrection">
<input type="text" data-table="pharmacy_products" data-field="x_StockCorrection" name="x_StockCorrection" id="x_StockCorrection" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->StockCorrection->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->StockCorrection->EditValue ?>"<?php echo $pharmacy_products_edit->StockCorrection->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->StockCorrection->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LBTPercentage->Visible) { // LBTPercentage ?>
	<div id="r_LBTPercentage" class="form-group row">
		<label id="elh_pharmacy_products_LBTPercentage" for="x_LBTPercentage" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LBTPercentage->caption() ?><?php echo $pharmacy_products_edit->LBTPercentage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LBTPercentage->cellAttributes() ?>>
<span id="el_pharmacy_products_LBTPercentage">
<input type="text" data-table="pharmacy_products" data-field="x_LBTPercentage" name="x_LBTPercentage" id="x_LBTPercentage" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LBTPercentage->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->LBTPercentage->EditValue ?>"<?php echo $pharmacy_products_edit->LBTPercentage->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->LBTPercentage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->SalesCommission->Visible) { // SalesCommission ?>
	<div id="r_SalesCommission" class="form-group row">
		<label id="elh_pharmacy_products_SalesCommission" for="x_SalesCommission" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->SalesCommission->caption() ?><?php echo $pharmacy_products_edit->SalesCommission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->SalesCommission->cellAttributes() ?>>
<span id="el_pharmacy_products_SalesCommission">
<input type="text" data-table="pharmacy_products" data-field="x_SalesCommission" name="x_SalesCommission" id="x_SalesCommission" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->SalesCommission->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->SalesCommission->EditValue ?>"<?php echo $pharmacy_products_edit->SalesCommission->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->SalesCommission->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LockedStock->Visible) { // LockedStock ?>
	<div id="r_LockedStock" class="form-group row">
		<label id="elh_pharmacy_products_LockedStock" for="x_LockedStock" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LockedStock->caption() ?><?php echo $pharmacy_products_edit->LockedStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LockedStock->cellAttributes() ?>>
<span id="el_pharmacy_products_LockedStock">
<input type="text" data-table="pharmacy_products" data-field="x_LockedStock" name="x_LockedStock" id="x_LockedStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LockedStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->LockedStock->EditValue ?>"<?php echo $pharmacy_products_edit->LockedStock->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->LockedStock->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MinMaxUOM->Visible) { // MinMaxUOM ?>
	<div id="r_MinMaxUOM" class="form-group row">
		<label id="elh_pharmacy_products_MinMaxUOM" for="x_MinMaxUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MinMaxUOM->caption() ?><?php echo $pharmacy_products_edit->MinMaxUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MinMaxUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_MinMaxUOM">
<input type="text" data-table="pharmacy_products" data-field="x_MinMaxUOM" name="x_MinMaxUOM" id="x_MinMaxUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MinMaxUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MinMaxUOM->EditValue ?>"<?php echo $pharmacy_products_edit->MinMaxUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MinMaxUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
	<div id="r_ExpiryMfrDateFormat" class="form-group row">
		<label id="elh_pharmacy_products_ExpiryMfrDateFormat" for="x_ExpiryMfrDateFormat" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ExpiryMfrDateFormat->caption() ?><?php echo $pharmacy_products_edit->ExpiryMfrDateFormat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el_pharmacy_products_ExpiryMfrDateFormat">
<input type="text" data-table="pharmacy_products" data-field="x_ExpiryMfrDateFormat" name="x_ExpiryMfrDateFormat" id="x_ExpiryMfrDateFormat" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ExpiryMfrDateFormat->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ExpiryMfrDateFormat->EditValue ?>"<?php echo $pharmacy_products_edit->ExpiryMfrDateFormat->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ExpiryMfrDateFormat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ProductLifeTime->Visible) { // ProductLifeTime ?>
	<div id="r_ProductLifeTime" class="form-group row">
		<label id="elh_pharmacy_products_ProductLifeTime" for="x_ProductLifeTime" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ProductLifeTime->caption() ?><?php echo $pharmacy_products_edit->ProductLifeTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ProductLifeTime->cellAttributes() ?>>
<span id="el_pharmacy_products_ProductLifeTime">
<input type="text" data-table="pharmacy_products" data-field="x_ProductLifeTime" name="x_ProductLifeTime" id="x_ProductLifeTime" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ProductLifeTime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ProductLifeTime->EditValue ?>"<?php echo $pharmacy_products_edit->ProductLifeTime->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ProductLifeTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IsCombo->Visible) { // IsCombo ?>
	<div id="r_IsCombo" class="form-group row">
		<label id="elh_pharmacy_products_IsCombo" for="x_IsCombo" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IsCombo->caption() ?><?php echo $pharmacy_products_edit->IsCombo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IsCombo->cellAttributes() ?>>
<span id="el_pharmacy_products_IsCombo">
<input type="text" data-table="pharmacy_products" data-field="x_IsCombo" name="x_IsCombo" id="x_IsCombo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IsCombo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IsCombo->EditValue ?>"<?php echo $pharmacy_products_edit->IsCombo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IsCombo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ComboTypeCode->Visible) { // ComboTypeCode ?>
	<div id="r_ComboTypeCode" class="form-group row">
		<label id="elh_pharmacy_products_ComboTypeCode" for="x_ComboTypeCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ComboTypeCode->caption() ?><?php echo $pharmacy_products_edit->ComboTypeCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ComboTypeCode->cellAttributes() ?>>
<span id="el_pharmacy_products_ComboTypeCode">
<input type="text" data-table="pharmacy_products" data-field="x_ComboTypeCode" name="x_ComboTypeCode" id="x_ComboTypeCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ComboTypeCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ComboTypeCode->EditValue ?>"<?php echo $pharmacy_products_edit->ComboTypeCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ComboTypeCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount6->Visible) { // AttributeCount6 ?>
	<div id="r_AttributeCount6" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount6" for="x_AttributeCount6" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount6->caption() ?><?php echo $pharmacy_products_edit->AttributeCount6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount6->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount6">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount6" name="x_AttributeCount6" id="x_AttributeCount6" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount6->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount6->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount6->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount7->Visible) { // AttributeCount7 ?>
	<div id="r_AttributeCount7" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount7" for="x_AttributeCount7" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount7->caption() ?><?php echo $pharmacy_products_edit->AttributeCount7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount7->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount7">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount7" name="x_AttributeCount7" id="x_AttributeCount7" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount7->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount7->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount7->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount8->Visible) { // AttributeCount8 ?>
	<div id="r_AttributeCount8" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount8" for="x_AttributeCount8" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount8->caption() ?><?php echo $pharmacy_products_edit->AttributeCount8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount8->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount8">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount8" name="x_AttributeCount8" id="x_AttributeCount8" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount8->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount8->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount8->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount9->Visible) { // AttributeCount9 ?>
	<div id="r_AttributeCount9" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount9" for="x_AttributeCount9" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount9->caption() ?><?php echo $pharmacy_products_edit->AttributeCount9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount9->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount9">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount9" name="x_AttributeCount9" id="x_AttributeCount9" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount9->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount9->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount9->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AttributeCount10->Visible) { // AttributeCount10 ?>
	<div id="r_AttributeCount10" class="form-group row">
		<label id="elh_pharmacy_products_AttributeCount10" for="x_AttributeCount10" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AttributeCount10->caption() ?><?php echo $pharmacy_products_edit->AttributeCount10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AttributeCount10->cellAttributes() ?>>
<span id="el_pharmacy_products_AttributeCount10">
<input type="text" data-table="pharmacy_products" data-field="x_AttributeCount10" name="x_AttributeCount10" id="x_AttributeCount10" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AttributeCount10->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AttributeCount10->EditValue ?>"<?php echo $pharmacy_products_edit->AttributeCount10->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AttributeCount10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LabourCharge->Visible) { // LabourCharge ?>
	<div id="r_LabourCharge" class="form-group row">
		<label id="elh_pharmacy_products_LabourCharge" for="x_LabourCharge" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LabourCharge->caption() ?><?php echo $pharmacy_products_edit->LabourCharge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LabourCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_LabourCharge">
<input type="text" data-table="pharmacy_products" data-field="x_LabourCharge" name="x_LabourCharge" id="x_LabourCharge" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LabourCharge->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->LabourCharge->EditValue ?>"<?php echo $pharmacy_products_edit->LabourCharge->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->LabourCharge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
	<div id="r_AffectOtherCharge" class="form-group row">
		<label id="elh_pharmacy_products_AffectOtherCharge" for="x_AffectOtherCharge" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AffectOtherCharge->caption() ?><?php echo $pharmacy_products_edit->AffectOtherCharge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AffectOtherCharge->cellAttributes() ?>>
<span id="el_pharmacy_products_AffectOtherCharge">
<input type="text" data-table="pharmacy_products" data-field="x_AffectOtherCharge" name="x_AffectOtherCharge" id="x_AffectOtherCharge" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AffectOtherCharge->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AffectOtherCharge->EditValue ?>"<?php echo $pharmacy_products_edit->AffectOtherCharge->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AffectOtherCharge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DosageInfo->Visible) { // DosageInfo ?>
	<div id="r_DosageInfo" class="form-group row">
		<label id="elh_pharmacy_products_DosageInfo" for="x_DosageInfo" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DosageInfo->caption() ?><?php echo $pharmacy_products_edit->DosageInfo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DosageInfo->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageInfo">
<input type="text" data-table="pharmacy_products" data-field="x_DosageInfo" name="x_DosageInfo" id="x_DosageInfo" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DosageInfo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DosageInfo->EditValue ?>"<?php echo $pharmacy_products_edit->DosageInfo->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DosageInfo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DosageType->Visible) { // DosageType ?>
	<div id="r_DosageType" class="form-group row">
		<label id="elh_pharmacy_products_DosageType" for="x_DosageType" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DosageType->caption() ?><?php echo $pharmacy_products_edit->DosageType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DosageType->cellAttributes() ?>>
<span id="el_pharmacy_products_DosageType">
<input type="text" data-table="pharmacy_products" data-field="x_DosageType" name="x_DosageType" id="x_DosageType" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DosageType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DosageType->EditValue ?>"<?php echo $pharmacy_products_edit->DosageType->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DosageType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
	<div id="r_DefaultIndentUOM" class="form-group row">
		<label id="elh_pharmacy_products_DefaultIndentUOM" for="x_DefaultIndentUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->DefaultIndentUOM->caption() ?><?php echo $pharmacy_products_edit->DefaultIndentUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->DefaultIndentUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_DefaultIndentUOM">
<input type="text" data-table="pharmacy_products" data-field="x_DefaultIndentUOM" name="x_DefaultIndentUOM" id="x_DefaultIndentUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->DefaultIndentUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->DefaultIndentUOM->EditValue ?>"<?php echo $pharmacy_products_edit->DefaultIndentUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->DefaultIndentUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PromoTag->Visible) { // PromoTag ?>
	<div id="r_PromoTag" class="form-group row">
		<label id="elh_pharmacy_products_PromoTag" for="x_PromoTag" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PromoTag->caption() ?><?php echo $pharmacy_products_edit->PromoTag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_PromoTag">
<input type="text" data-table="pharmacy_products" data-field="x_PromoTag" name="x_PromoTag" id="x_PromoTag" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PromoTag->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PromoTag->EditValue ?>"<?php echo $pharmacy_products_edit->PromoTag->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PromoTag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
	<div id="r_BillLevelPromoTag" class="form-group row">
		<label id="elh_pharmacy_products_BillLevelPromoTag" for="x_BillLevelPromoTag" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->BillLevelPromoTag->caption() ?><?php echo $pharmacy_products_edit->BillLevelPromoTag->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->BillLevelPromoTag->cellAttributes() ?>>
<span id="el_pharmacy_products_BillLevelPromoTag">
<input type="text" data-table="pharmacy_products" data-field="x_BillLevelPromoTag" name="x_BillLevelPromoTag" id="x_BillLevelPromoTag" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->BillLevelPromoTag->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->BillLevelPromoTag->EditValue ?>"<?php echo $pharmacy_products_edit->BillLevelPromoTag->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->BillLevelPromoTag->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->IsMRPProduct->Visible) { // IsMRPProduct ?>
	<div id="r_IsMRPProduct" class="form-group row">
		<label id="elh_pharmacy_products_IsMRPProduct" for="x_IsMRPProduct" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->IsMRPProduct->caption() ?><?php echo $pharmacy_products_edit->IsMRPProduct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->IsMRPProduct->cellAttributes() ?>>
<span id="el_pharmacy_products_IsMRPProduct">
<input type="text" data-table="pharmacy_products" data-field="x_IsMRPProduct" name="x_IsMRPProduct" id="x_IsMRPProduct" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->IsMRPProduct->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->IsMRPProduct->EditValue ?>"<?php echo $pharmacy_products_edit->IsMRPProduct->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->IsMRPProduct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MrpList->Visible) { // MrpList ?>
	<div id="r_MrpList" class="form-group row">
		<label id="elh_pharmacy_products_MrpList" for="x_MrpList" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MrpList->caption() ?><?php echo $pharmacy_products_edit->MrpList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MrpList->cellAttributes() ?>>
<span id="el_pharmacy_products_MrpList">
<textarea data-table="pharmacy_products" data-field="x_MrpList" name="x_MrpList" id="x_MrpList" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MrpList->getPlaceHolder()) ?>"<?php echo $pharmacy_products_edit->MrpList->editAttributes() ?>><?php echo $pharmacy_products_edit->MrpList->EditValue ?></textarea>
</span>
<?php echo $pharmacy_products_edit->MrpList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
	<div id="r_AlternateSaleUOM" class="form-group row">
		<label id="elh_pharmacy_products_AlternateSaleUOM" for="x_AlternateSaleUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AlternateSaleUOM->caption() ?><?php echo $pharmacy_products_edit->AlternateSaleUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AlternateSaleUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_AlternateSaleUOM">
<input type="text" data-table="pharmacy_products" data-field="x_AlternateSaleUOM" name="x_AlternateSaleUOM" id="x_AlternateSaleUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AlternateSaleUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AlternateSaleUOM->EditValue ?>"<?php echo $pharmacy_products_edit->AlternateSaleUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AlternateSaleUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FreeUOM->Visible) { // FreeUOM ?>
	<div id="r_FreeUOM" class="form-group row">
		<label id="elh_pharmacy_products_FreeUOM" for="x_FreeUOM" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FreeUOM->caption() ?><?php echo $pharmacy_products_edit->FreeUOM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FreeUOM->cellAttributes() ?>>
<span id="el_pharmacy_products_FreeUOM">
<input type="text" data-table="pharmacy_products" data-field="x_FreeUOM" name="x_FreeUOM" id="x_FreeUOM" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FreeUOM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FreeUOM->EditValue ?>"<?php echo $pharmacy_products_edit->FreeUOM->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->FreeUOM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MarketedCode->Visible) { // MarketedCode ?>
	<div id="r_MarketedCode" class="form-group row">
		<label id="elh_pharmacy_products_MarketedCode" for="x_MarketedCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MarketedCode->caption() ?><?php echo $pharmacy_products_edit->MarketedCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MarketedCode->cellAttributes() ?>>
<span id="el_pharmacy_products_MarketedCode">
<input type="text" data-table="pharmacy_products" data-field="x_MarketedCode" name="x_MarketedCode" id="x_MarketedCode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MarketedCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MarketedCode->EditValue ?>"<?php echo $pharmacy_products_edit->MarketedCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MarketedCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
	<div id="r_MinimumSalePrice" class="form-group row">
		<label id="elh_pharmacy_products_MinimumSalePrice" for="x_MinimumSalePrice" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->MinimumSalePrice->caption() ?><?php echo $pharmacy_products_edit->MinimumSalePrice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->MinimumSalePrice->cellAttributes() ?>>
<span id="el_pharmacy_products_MinimumSalePrice">
<input type="text" data-table="pharmacy_products" data-field="x_MinimumSalePrice" name="x_MinimumSalePrice" id="x_MinimumSalePrice" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->MinimumSalePrice->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->MinimumSalePrice->EditValue ?>"<?php echo $pharmacy_products_edit->MinimumSalePrice->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->MinimumSalePrice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PRate1->Visible) { // PRate1 ?>
	<div id="r_PRate1" class="form-group row">
		<label id="elh_pharmacy_products_PRate1" for="x_PRate1" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PRate1->caption() ?><?php echo $pharmacy_products_edit->PRate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PRate1->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate1">
<input type="text" data-table="pharmacy_products" data-field="x_PRate1" name="x_PRate1" id="x_PRate1" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PRate1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PRate1->EditValue ?>"<?php echo $pharmacy_products_edit->PRate1->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PRate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->PRate2->Visible) { // PRate2 ?>
	<div id="r_PRate2" class="form-group row">
		<label id="elh_pharmacy_products_PRate2" for="x_PRate2" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->PRate2->caption() ?><?php echo $pharmacy_products_edit->PRate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->PRate2->cellAttributes() ?>>
<span id="el_pharmacy_products_PRate2">
<input type="text" data-table="pharmacy_products" data-field="x_PRate2" name="x_PRate2" id="x_PRate2" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->PRate2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->PRate2->EditValue ?>"<?php echo $pharmacy_products_edit->PRate2->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->PRate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->LPItemCost->Visible) { // LPItemCost ?>
	<div id="r_LPItemCost" class="form-group row">
		<label id="elh_pharmacy_products_LPItemCost" for="x_LPItemCost" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->LPItemCost->caption() ?><?php echo $pharmacy_products_edit->LPItemCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->LPItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_LPItemCost">
<input type="text" data-table="pharmacy_products" data-field="x_LPItemCost" name="x_LPItemCost" id="x_LPItemCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->LPItemCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->LPItemCost->EditValue ?>"<?php echo $pharmacy_products_edit->LPItemCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->LPItemCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->FixedItemCost->Visible) { // FixedItemCost ?>
	<div id="r_FixedItemCost" class="form-group row">
		<label id="elh_pharmacy_products_FixedItemCost" for="x_FixedItemCost" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->FixedItemCost->caption() ?><?php echo $pharmacy_products_edit->FixedItemCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->FixedItemCost->cellAttributes() ?>>
<span id="el_pharmacy_products_FixedItemCost">
<input type="text" data-table="pharmacy_products" data-field="x_FixedItemCost" name="x_FixedItemCost" id="x_FixedItemCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->FixedItemCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->FixedItemCost->EditValue ?>"<?php echo $pharmacy_products_edit->FixedItemCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->FixedItemCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->HSNId->Visible) { // HSNId ?>
	<div id="r_HSNId" class="form-group row">
		<label id="elh_pharmacy_products_HSNId" for="x_HSNId" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->HSNId->caption() ?><?php echo $pharmacy_products_edit->HSNId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->HSNId->cellAttributes() ?>>
<span id="el_pharmacy_products_HSNId">
<input type="text" data-table="pharmacy_products" data-field="x_HSNId" name="x_HSNId" id="x_HSNId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->HSNId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->HSNId->EditValue ?>"<?php echo $pharmacy_products_edit->HSNId->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->HSNId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->TaxInclusive->Visible) { // TaxInclusive ?>
	<div id="r_TaxInclusive" class="form-group row">
		<label id="elh_pharmacy_products_TaxInclusive" for="x_TaxInclusive" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->TaxInclusive->caption() ?><?php echo $pharmacy_products_edit->TaxInclusive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->TaxInclusive->cellAttributes() ?>>
<span id="el_pharmacy_products_TaxInclusive">
<input type="text" data-table="pharmacy_products" data-field="x_TaxInclusive" name="x_TaxInclusive" id="x_TaxInclusive" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->TaxInclusive->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->TaxInclusive->EditValue ?>"<?php echo $pharmacy_products_edit->TaxInclusive->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->TaxInclusive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
	<div id="r_EligibleforWarranty" class="form-group row">
		<label id="elh_pharmacy_products_EligibleforWarranty" for="x_EligibleforWarranty" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->EligibleforWarranty->caption() ?><?php echo $pharmacy_products_edit->EligibleforWarranty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->EligibleforWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_EligibleforWarranty">
<input type="text" data-table="pharmacy_products" data-field="x_EligibleforWarranty" name="x_EligibleforWarranty" id="x_EligibleforWarranty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->EligibleforWarranty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->EligibleforWarranty->EditValue ?>"<?php echo $pharmacy_products_edit->EligibleforWarranty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->EligibleforWarranty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
	<div id="r_NoofMonthsWarranty" class="form-group row">
		<label id="elh_pharmacy_products_NoofMonthsWarranty" for="x_NoofMonthsWarranty" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->NoofMonthsWarranty->caption() ?><?php echo $pharmacy_products_edit->NoofMonthsWarranty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el_pharmacy_products_NoofMonthsWarranty">
<input type="text" data-table="pharmacy_products" data-field="x_NoofMonthsWarranty" name="x_NoofMonthsWarranty" id="x_NoofMonthsWarranty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->NoofMonthsWarranty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->NoofMonthsWarranty->EditValue ?>"<?php echo $pharmacy_products_edit->NoofMonthsWarranty->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->NoofMonthsWarranty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
	<div id="r_ComputeTaxonCost" class="form-group row">
		<label id="elh_pharmacy_products_ComputeTaxonCost" for="x_ComputeTaxonCost" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->ComputeTaxonCost->caption() ?><?php echo $pharmacy_products_edit->ComputeTaxonCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->ComputeTaxonCost->cellAttributes() ?>>
<span id="el_pharmacy_products_ComputeTaxonCost">
<input type="text" data-table="pharmacy_products" data-field="x_ComputeTaxonCost" name="x_ComputeTaxonCost" id="x_ComputeTaxonCost" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->ComputeTaxonCost->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->ComputeTaxonCost->EditValue ?>"<?php echo $pharmacy_products_edit->ComputeTaxonCost->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->ComputeTaxonCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
	<div id="r_HasEmptyBottleTrack" class="form-group row">
		<label id="elh_pharmacy_products_HasEmptyBottleTrack" for="x_HasEmptyBottleTrack" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->HasEmptyBottleTrack->caption() ?><?php echo $pharmacy_products_edit->HasEmptyBottleTrack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el_pharmacy_products_HasEmptyBottleTrack">
<input type="text" data-table="pharmacy_products" data-field="x_HasEmptyBottleTrack" name="x_HasEmptyBottleTrack" id="x_HasEmptyBottleTrack" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->HasEmptyBottleTrack->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->HasEmptyBottleTrack->EditValue ?>"<?php echo $pharmacy_products_edit->HasEmptyBottleTrack->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->HasEmptyBottleTrack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
	<div id="r_EmptyBottleReferenceCode" class="form-group row">
		<label id="elh_pharmacy_products_EmptyBottleReferenceCode" for="x_EmptyBottleReferenceCode" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->EmptyBottleReferenceCode->caption() ?><?php echo $pharmacy_products_edit->EmptyBottleReferenceCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleReferenceCode">
<input type="text" data-table="pharmacy_products" data-field="x_EmptyBottleReferenceCode" name="x_EmptyBottleReferenceCode" id="x_EmptyBottleReferenceCode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->EmptyBottleReferenceCode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->EmptyBottleReferenceCode->EditValue ?>"<?php echo $pharmacy_products_edit->EmptyBottleReferenceCode->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->EmptyBottleReferenceCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
	<div id="r_AdditionalCESSAmount" class="form-group row">
		<label id="elh_pharmacy_products_AdditionalCESSAmount" for="x_AdditionalCESSAmount" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->AdditionalCESSAmount->caption() ?><?php echo $pharmacy_products_edit->AdditionalCESSAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el_pharmacy_products_AdditionalCESSAmount">
<input type="text" data-table="pharmacy_products" data-field="x_AdditionalCESSAmount" name="x_AdditionalCESSAmount" id="x_AdditionalCESSAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->AdditionalCESSAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->AdditionalCESSAmount->EditValue ?>"<?php echo $pharmacy_products_edit->AdditionalCESSAmount->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->AdditionalCESSAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_products_edit->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
	<div id="r_EmptyBottleRate" class="form-group row">
		<label id="elh_pharmacy_products_EmptyBottleRate" for="x_EmptyBottleRate" class="<?php echo $pharmacy_products_edit->LeftColumnClass ?>"><?php echo $pharmacy_products_edit->EmptyBottleRate->caption() ?><?php echo $pharmacy_products_edit->EmptyBottleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_products_edit->RightColumnClass ?>"><div <?php echo $pharmacy_products_edit->EmptyBottleRate->cellAttributes() ?>>
<span id="el_pharmacy_products_EmptyBottleRate">
<input type="text" data-table="pharmacy_products" data-field="x_EmptyBottleRate" name="x_EmptyBottleRate" id="x_EmptyBottleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_products_edit->EmptyBottleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_products_edit->EmptyBottleRate->EditValue ?>"<?php echo $pharmacy_products_edit->EmptyBottleRate->editAttributes() ?>>
</span>
<?php echo $pharmacy_products_edit->EmptyBottleRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_products_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_products_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_products_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_products_edit->showPageFooter();
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
$pharmacy_products_edit->terminate();
?>
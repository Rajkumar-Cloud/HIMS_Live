<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_store_grn_grid))
	$view_store_grn_grid = new view_store_grn_grid();

// Run the page
$view_store_grn_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_grn_grid->Page_Render();
?>
<?php if (!$view_store_grn->isExport()) { ?>
<script>

// Form object
var fview_store_grngrid = new ew.Form("fview_store_grngrid", "grid");
fview_store_grngrid.formKeyCountName = '<?php echo $view_store_grn_grid->FormKeyCountName ?>';

// Validate form
fview_store_grngrid.validate = function() {
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
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($view_store_grn_grid->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PRC->caption(), $view_store_grn->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PrName->caption(), $view_store_grn->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->GrnQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->GrnQuantity->caption(), $view_store_grn->GrnQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->GrnQuantity->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->FreeQty->caption(), $view_store_grn->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->FreeQty->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->MFRCODE->caption(), $view_store_grn->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PUnit->caption(), $view_store_grn->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->PUnit->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SUnit->caption(), $view_store_grn->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->SUnit->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->MRP->caption(), $view_store_grn->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->MRP->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PurValue->caption(), $view_store_grn->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->PurValue->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->Disc->Required) { ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->Disc->caption(), $view_store_grn->Disc->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->Disc->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PSGST->caption(), $view_store_grn->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PCGST->caption(), $view_store_grn->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->PTax->Required) { ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->PTax->caption(), $view_store_grn->PTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->PTax->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->ItemValue->caption(), $view_store_grn->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->ItemValue->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->SalTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SalTax->caption(), $view_store_grn->SalTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->SalTax->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->BatchNo->caption(), $view_store_grn->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->ExpDate->caption(), $view_store_grn->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->ExpDate->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->Quantity->caption(), $view_store_grn->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->Quantity->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->SalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SalRate->caption(), $view_store_grn->SalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->SalRate->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SSGST->caption(), $view_store_grn->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->SCGST->caption(), $view_store_grn->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->BRCODE->caption(), $view_store_grn->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->HSN->Required) { ?>
			elm = this.getElements("x" + infix + "_HSN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->HSN->caption(), $view_store_grn->HSN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->HospID->caption(), $view_store_grn->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grncreatedby->caption(), $view_store_grn->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grncreatedDateTime->caption(), $view_store_grn->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grnModifiedby->caption(), $view_store_grn->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grnModifiedDateTime->caption(), $view_store_grn->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_grn_grid->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->BillDate->caption(), $view_store_grn->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->BillDate->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->CurStock->Required) { ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->CurStock->caption(), $view_store_grn->CurStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->CurStock->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->FreeQtyyy->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->FreeQtyyy->caption(), $view_store_grn->FreeQtyyy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->FreeQtyyy->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->grndate->Required) { ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grndate->caption(), $view_store_grn->grndate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->grndate->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->grndatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->grndatetime->caption(), $view_store_grn->grndatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->grndatetime->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->strid->Required) { ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->strid->caption(), $view_store_grn->strid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->strid->errorMessage()) ?>");
		<?php if ($view_store_grn_grid->GRNPer->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_grn->GRNPer->caption(), $view_store_grn->GRNPer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_grn->GRNPer->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_store_grngrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "GrnQuantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "FreeQty", false)) return false;
	if (ew.valueChanged(fobj, infix, "MFRCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "PUnit", false)) return false;
	if (ew.valueChanged(fobj, infix, "SUnit", false)) return false;
	if (ew.valueChanged(fobj, infix, "MRP", false)) return false;
	if (ew.valueChanged(fobj, infix, "PurValue", false)) return false;
	if (ew.valueChanged(fobj, infix, "Disc", false)) return false;
	if (ew.valueChanged(fobj, infix, "PSGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "PCGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "PTax", false)) return false;
	if (ew.valueChanged(fobj, infix, "ItemValue", false)) return false;
	if (ew.valueChanged(fobj, infix, "SalTax", false)) return false;
	if (ew.valueChanged(fobj, infix, "BatchNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "ExpDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "SalRate", false)) return false;
	if (ew.valueChanged(fobj, infix, "SSGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "SCGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "HSN", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "CurStock", false)) return false;
	if (ew.valueChanged(fobj, infix, "FreeQtyyy", false)) return false;
	if (ew.valueChanged(fobj, infix, "grndate", false)) return false;
	if (ew.valueChanged(fobj, infix, "grndatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "strid", false)) return false;
	if (ew.valueChanged(fobj, infix, "GRNPer", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_store_grngrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_store_grngrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_store_grngrid.lists["x_PrName"] = <?php echo $view_store_grn_grid->PrName->Lookup->toClientList() ?>;
fview_store_grngrid.lists["x_PrName"].options = <?php echo JsonEncode($view_store_grn_grid->PrName->lookupOptions()) ?>;
fview_store_grngrid.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_store_grn_grid->renderOtherOptions();
?>
<?php $view_store_grn_grid->showPageHeader(); ?>
<?php
$view_store_grn_grid->showMessage();
?>
<?php if ($view_store_grn_grid->TotalRecs > 0 || $view_store_grn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_store_grn_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_store_grn">
<?php if ($view_store_grn_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_store_grn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_store_grngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_store_grn" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_store_grngrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_store_grn_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_store_grn_grid->renderListOptions();

// Render list options (header, left)
$view_store_grn_grid->ListOptions->render("header", "left");
?>
<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_store_grn->PRC->headerCellClass() ?>"><div id="elh_view_store_grn_PRC" class="view_store_grn_PRC"><div class="ew-table-header-caption"><?php echo $view_store_grn->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_store_grn->PRC->headerCellClass() ?>"><div><div id="elh_view_store_grn_PRC" class="view_store_grn_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_store_grn->PrName->headerCellClass() ?>"><div id="elh_view_store_grn_PrName" class="view_store_grn_PrName"><div class="ew-table-header-caption"><?php echo $view_store_grn->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_store_grn->PrName->headerCellClass() ?>"><div><div id="elh_view_store_grn_PrName" class="view_store_grn_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->GrnQuantity) == "") { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_store_grn->GrnQuantity->headerCellClass() ?>"><div id="elh_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity"><div class="ew-table-header-caption"><?php echo $view_store_grn->GrnQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_store_grn->GrnQuantity->headerCellClass() ?>"><div><div id="elh_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->GrnQuantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->GrnQuantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_store_grn->FreeQty->headerCellClass() ?>"><div id="elh_view_store_grn_FreeQty" class="view_store_grn_FreeQty"><div class="ew-table-header-caption"><?php echo $view_store_grn->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_store_grn->FreeQty->headerCellClass() ?>"><div><div id="elh_view_store_grn_FreeQty" class="view_store_grn_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->FreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->FreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_store_grn->MFRCODE->headerCellClass() ?>"><div id="elh_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_store_grn->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_store_grn->MFRCODE->headerCellClass() ?>"><div><div id="elh_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_store_grn->PUnit->headerCellClass() ?>"><div id="elh_view_store_grn_PUnit" class="view_store_grn_PUnit"><div class="ew-table-header-caption"><?php echo $view_store_grn->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_store_grn->PUnit->headerCellClass() ?>"><div><div id="elh_view_store_grn_PUnit" class="view_store_grn_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $view_store_grn->SUnit->headerCellClass() ?>"><div id="elh_view_store_grn_SUnit" class="view_store_grn_SUnit"><div class="ew-table-header-caption"><?php echo $view_store_grn->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $view_store_grn->SUnit->headerCellClass() ?>"><div><div id="elh_view_store_grn_SUnit" class="view_store_grn_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_store_grn->MRP->headerCellClass() ?>"><div id="elh_view_store_grn_MRP" class="view_store_grn_MRP"><div class="ew-table-header-caption"><?php echo $view_store_grn->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_store_grn->MRP->headerCellClass() ?>"><div><div id="elh_view_store_grn_MRP" class="view_store_grn_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_store_grn->PurValue->headerCellClass() ?>"><div id="elh_view_store_grn_PurValue" class="view_store_grn_PurValue"><div class="ew-table-header-caption"><?php echo $view_store_grn->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_store_grn->PurValue->headerCellClass() ?>"><div><div id="elh_view_store_grn_PurValue" class="view_store_grn_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->Disc) == "") { ?>
		<th data-name="Disc" class="<?php echo $view_store_grn->Disc->headerCellClass() ?>"><div id="elh_view_store_grn_Disc" class="view_store_grn_Disc"><div class="ew-table-header-caption"><?php echo $view_store_grn->Disc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Disc" class="<?php echo $view_store_grn->Disc->headerCellClass() ?>"><div><div id="elh_view_store_grn_Disc" class="view_store_grn_Disc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->Disc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->Disc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->Disc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $view_store_grn->PSGST->headerCellClass() ?>"><div id="elh_view_store_grn_PSGST" class="view_store_grn_PSGST"><div class="ew-table-header-caption"><?php echo $view_store_grn->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $view_store_grn->PSGST->headerCellClass() ?>"><div><div id="elh_view_store_grn_PSGST" class="view_store_grn_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $view_store_grn->PCGST->headerCellClass() ?>"><div id="elh_view_store_grn_PCGST" class="view_store_grn_PCGST"><div class="ew-table-header-caption"><?php echo $view_store_grn->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $view_store_grn->PCGST->headerCellClass() ?>"><div><div id="elh_view_store_grn_PCGST" class="view_store_grn_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PTax) == "") { ?>
		<th data-name="PTax" class="<?php echo $view_store_grn->PTax->headerCellClass() ?>"><div id="elh_view_store_grn_PTax" class="view_store_grn_PTax"><div class="ew-table-header-caption"><?php echo $view_store_grn->PTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTax" class="<?php echo $view_store_grn->PTax->headerCellClass() ?>"><div><div id="elh_view_store_grn_PTax" class="view_store_grn_PTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_store_grn->ItemValue->headerCellClass() ?>"><div id="elh_view_store_grn_ItemValue" class="view_store_grn_ItemValue"><div class="ew-table-header-caption"><?php echo $view_store_grn->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_store_grn->ItemValue->headerCellClass() ?>"><div><div id="elh_view_store_grn_ItemValue" class="view_store_grn_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->ItemValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->ItemValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SalTax) == "") { ?>
		<th data-name="SalTax" class="<?php echo $view_store_grn->SalTax->headerCellClass() ?>"><div id="elh_view_store_grn_SalTax" class="view_store_grn_SalTax"><div class="ew-table-header-caption"><?php echo $view_store_grn->SalTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalTax" class="<?php echo $view_store_grn->SalTax->headerCellClass() ?>"><div><div id="elh_view_store_grn_SalTax" class="view_store_grn_SalTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SalTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SalTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_store_grn->BatchNo->headerCellClass() ?>"><div id="elh_view_store_grn_BatchNo" class="view_store_grn_BatchNo"><div class="ew-table-header-caption"><?php echo $view_store_grn->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_store_grn->BatchNo->headerCellClass() ?>"><div><div id="elh_view_store_grn_BatchNo" class="view_store_grn_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_store_grn->ExpDate->headerCellClass() ?>"><div id="elh_view_store_grn_ExpDate" class="view_store_grn_ExpDate"><div class="ew-table-header-caption"><?php echo $view_store_grn->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_store_grn->ExpDate->headerCellClass() ?>"><div><div id="elh_view_store_grn_ExpDate" class="view_store_grn_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_store_grn->Quantity->headerCellClass() ?>"><div id="elh_view_store_grn_Quantity" class="view_store_grn_Quantity"><div class="ew-table-header-caption"><?php echo $view_store_grn->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_store_grn->Quantity->headerCellClass() ?>"><div><div id="elh_view_store_grn_Quantity" class="view_store_grn_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $view_store_grn->SalRate->headerCellClass() ?>"><div id="elh_view_store_grn_SalRate" class="view_store_grn_SalRate"><div class="ew-table-header-caption"><?php echo $view_store_grn->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $view_store_grn->SalRate->headerCellClass() ?>"><div><div id="elh_view_store_grn_SalRate" class="view_store_grn_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SalRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SalRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_store_grn->SSGST->headerCellClass() ?>"><div id="elh_view_store_grn_SSGST" class="view_store_grn_SSGST"><div class="ew-table-header-caption"><?php echo $view_store_grn->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_store_grn->SSGST->headerCellClass() ?>"><div><div id="elh_view_store_grn_SSGST" class="view_store_grn_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_store_grn->SCGST->headerCellClass() ?>"><div id="elh_view_store_grn_SCGST" class="view_store_grn_SCGST"><div class="ew-table-header-caption"><?php echo $view_store_grn->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_store_grn->SCGST->headerCellClass() ?>"><div><div id="elh_view_store_grn_SCGST" class="view_store_grn_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_store_grn->BRCODE->headerCellClass() ?>"><div id="elh_view_store_grn_BRCODE" class="view_store_grn_BRCODE"><div class="ew-table-header-caption"><?php echo $view_store_grn->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_store_grn->BRCODE->headerCellClass() ?>"><div><div id="elh_view_store_grn_BRCODE" class="view_store_grn_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $view_store_grn->HSN->headerCellClass() ?>"><div id="elh_view_store_grn_HSN" class="view_store_grn_HSN"><div class="ew-table-header-caption"><?php echo $view_store_grn->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $view_store_grn->HSN->headerCellClass() ?>"><div><div id="elh_view_store_grn_HSN" class="view_store_grn_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->HSN->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->HSN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->HSN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_store_grn->HospID->headerCellClass() ?>"><div id="elh_view_store_grn_HospID" class="view_store_grn_HospID"><div class="ew-table-header-caption"><?php echo $view_store_grn->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_store_grn->HospID->headerCellClass() ?>"><div><div id="elh_view_store_grn_HospID" class="view_store_grn_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $view_store_grn->grncreatedby->headerCellClass() ?>"><div id="elh_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby"><div class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $view_store_grn->grncreatedby->headerCellClass() ?>"><div><div id="elh_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grncreatedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grncreatedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_store_grn->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_store_grn->grncreatedDateTime->headerCellClass() ?>"><div><div id="elh_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grncreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grncreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_store_grn->grnModifiedby->headerCellClass() ?>"><div id="elh_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby"><div class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_store_grn->grnModifiedby->headerCellClass() ?>"><div><div id="elh_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grnModifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grnModifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_store_grn->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_store_grn->grnModifiedDateTime->headerCellClass() ?>"><div><div id="elh_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_store_grn->BillDate->headerCellClass() ?>"><div id="elh_view_store_grn_BillDate" class="view_store_grn_BillDate"><div class="ew-table-header-caption"><?php echo $view_store_grn->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_store_grn->BillDate->headerCellClass() ?>"><div><div id="elh_view_store_grn_BillDate" class="view_store_grn_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->CurStock) == "") { ?>
		<th data-name="CurStock" class="<?php echo $view_store_grn->CurStock->headerCellClass() ?>"><div id="elh_view_store_grn_CurStock" class="view_store_grn_CurStock"><div class="ew-table-header-caption"><?php echo $view_store_grn->CurStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CurStock" class="<?php echo $view_store_grn->CurStock->headerCellClass() ?>"><div><div id="elh_view_store_grn_CurStock" class="view_store_grn_CurStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->CurStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->CurStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->FreeQtyyy) == "") { ?>
		<th data-name="FreeQtyyy" class="<?php echo $view_store_grn->FreeQtyyy->headerCellClass() ?>"><div id="elh_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy"><div class="ew-table-header-caption"><?php echo $view_store_grn->FreeQtyyy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQtyyy" class="<?php echo $view_store_grn->FreeQtyyy->headerCellClass() ?>"><div><div id="elh_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->FreeQtyyy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->FreeQtyyy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->FreeQtyyy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grndate) == "") { ?>
		<th data-name="grndate" class="<?php echo $view_store_grn->grndate->headerCellClass() ?>"><div id="elh_view_store_grn_grndate" class="view_store_grn_grndate"><div class="ew-table-header-caption"><?php echo $view_store_grn->grndate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndate" class="<?php echo $view_store_grn->grndate->headerCellClass() ?>"><div><div id="elh_view_store_grn_grndate" class="view_store_grn_grndate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grndate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grndate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grndate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grndatetime) == "") { ?>
		<th data-name="grndatetime" class="<?php echo $view_store_grn->grndatetime->headerCellClass() ?>"><div id="elh_view_store_grn_grndatetime" class="view_store_grn_grndatetime"><div class="ew-table-header-caption"><?php echo $view_store_grn->grndatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndatetime" class="<?php echo $view_store_grn->grndatetime->headerCellClass() ?>"><div><div id="elh_view_store_grn_grndatetime" class="view_store_grn_grndatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grndatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grndatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grndatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->strid->Visible) { // strid ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->strid) == "") { ?>
		<th data-name="strid" class="<?php echo $view_store_grn->strid->headerCellClass() ?>"><div id="elh_view_store_grn_strid" class="view_store_grn_strid"><div class="ew-table-header-caption"><?php echo $view_store_grn->strid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="strid" class="<?php echo $view_store_grn->strid->headerCellClass() ?>"><div><div id="elh_view_store_grn_strid" class="view_store_grn_strid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->strid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->strid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->strid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->GRNPer) == "") { ?>
		<th data-name="GRNPer" class="<?php echo $view_store_grn->GRNPer->headerCellClass() ?>"><div id="elh_view_store_grn_GRNPer" class="view_store_grn_GRNPer"><div class="ew-table-header-caption"><?php echo $view_store_grn->GRNPer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNPer" class="<?php echo $view_store_grn->GRNPer->headerCellClass() ?>"><div><div id="elh_view_store_grn_GRNPer" class="view_store_grn_GRNPer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->GRNPer->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->GRNPer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->GRNPer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_store_grn_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_store_grn_grid->StartRec = 1;
$view_store_grn_grid->StopRec = $view_store_grn_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_store_grn_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_store_grn_grid->FormKeyCountName) && ($view_store_grn->isGridAdd() || $view_store_grn->isGridEdit() || $view_store_grn->isConfirm())) {
		$view_store_grn_grid->KeyCount = $CurrentForm->getValue($view_store_grn_grid->FormKeyCountName);
		$view_store_grn_grid->StopRec = $view_store_grn_grid->StartRec + $view_store_grn_grid->KeyCount - 1;
	}
}
$view_store_grn_grid->RecCnt = $view_store_grn_grid->StartRec - 1;
if ($view_store_grn_grid->Recordset && !$view_store_grn_grid->Recordset->EOF) {
	$view_store_grn_grid->Recordset->moveFirst();
	$selectLimit = $view_store_grn_grid->UseSelectLimit;
	if (!$selectLimit && $view_store_grn_grid->StartRec > 1)
		$view_store_grn_grid->Recordset->move($view_store_grn_grid->StartRec - 1);
} elseif (!$view_store_grn->AllowAddDeleteRow && $view_store_grn_grid->StopRec == 0) {
	$view_store_grn_grid->StopRec = $view_store_grn->GridAddRowCount;
}

// Initialize aggregate
$view_store_grn->RowType = ROWTYPE_AGGREGATEINIT;
$view_store_grn->resetAttributes();
$view_store_grn_grid->renderRow();
if ($view_store_grn->isGridAdd())
	$view_store_grn_grid->RowIndex = 0;
if ($view_store_grn->isGridEdit())
	$view_store_grn_grid->RowIndex = 0;
while ($view_store_grn_grid->RecCnt < $view_store_grn_grid->StopRec) {
	$view_store_grn_grid->RecCnt++;
	if ($view_store_grn_grid->RecCnt >= $view_store_grn_grid->StartRec) {
		$view_store_grn_grid->RowCnt++;
		if ($view_store_grn->isGridAdd() || $view_store_grn->isGridEdit() || $view_store_grn->isConfirm()) {
			$view_store_grn_grid->RowIndex++;
			$CurrentForm->Index = $view_store_grn_grid->RowIndex;
			if ($CurrentForm->hasValue($view_store_grn_grid->FormActionName) && $view_store_grn_grid->EventCancelled)
				$view_store_grn_grid->RowAction = strval($CurrentForm->getValue($view_store_grn_grid->FormActionName));
			elseif ($view_store_grn->isGridAdd())
				$view_store_grn_grid->RowAction = "insert";
			else
				$view_store_grn_grid->RowAction = "";
		}

		// Set up key count
		$view_store_grn_grid->KeyCount = $view_store_grn_grid->RowIndex;

		// Init row class and style
		$view_store_grn->resetAttributes();
		$view_store_grn->CssClass = "";
		if ($view_store_grn->isGridAdd()) {
			if ($view_store_grn->CurrentMode == "copy") {
				$view_store_grn_grid->loadRowValues($view_store_grn_grid->Recordset); // Load row values
				$view_store_grn_grid->setRecordKey($view_store_grn_grid->RowOldKey, $view_store_grn_grid->Recordset); // Set old record key
			} else {
				$view_store_grn_grid->loadRowValues(); // Load default values
				$view_store_grn_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_store_grn_grid->loadRowValues($view_store_grn_grid->Recordset); // Load row values
		}
		$view_store_grn->RowType = ROWTYPE_VIEW; // Render view
		if ($view_store_grn->isGridAdd()) // Grid add
			$view_store_grn->RowType = ROWTYPE_ADD; // Render add
		if ($view_store_grn->isGridAdd() && $view_store_grn->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_store_grn_grid->restoreCurrentRowFormValues($view_store_grn_grid->RowIndex); // Restore form values
		if ($view_store_grn->isGridEdit()) { // Grid edit
			if ($view_store_grn->EventCancelled)
				$view_store_grn_grid->restoreCurrentRowFormValues($view_store_grn_grid->RowIndex); // Restore form values
			if ($view_store_grn_grid->RowAction == "insert")
				$view_store_grn->RowType = ROWTYPE_ADD; // Render add
			else
				$view_store_grn->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_store_grn->isGridEdit() && ($view_store_grn->RowType == ROWTYPE_EDIT || $view_store_grn->RowType == ROWTYPE_ADD) && $view_store_grn->EventCancelled) // Update failed
			$view_store_grn_grid->restoreCurrentRowFormValues($view_store_grn_grid->RowIndex); // Restore form values
		if ($view_store_grn->RowType == ROWTYPE_EDIT) // Edit row
			$view_store_grn_grid->EditRowCnt++;
		if ($view_store_grn->isConfirm()) // Confirm row
			$view_store_grn_grid->restoreCurrentRowFormValues($view_store_grn_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_store_grn->RowAttrs = array_merge($view_store_grn->RowAttrs, array('data-rowindex'=>$view_store_grn_grid->RowCnt, 'id'=>'r' . $view_store_grn_grid->RowCnt . '_view_store_grn', 'data-rowtype'=>$view_store_grn->RowType));

		// Render row
		$view_store_grn_grid->renderRow();

		// Render list options
		$view_store_grn_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_store_grn_grid->RowAction <> "delete" && $view_store_grn_grid->RowAction <> "insertdelete" && !($view_store_grn_grid->RowAction == "insert" && $view_store_grn->isConfirm() && $view_store_grn_grid->emptyRow())) {
?>
	<tr<?php echo $view_store_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_store_grn_grid->ListOptions->render("body", "left", $view_store_grn_grid->RowCnt);
?>
	<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_store_grn->PRC->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PRC" class="form-group view_store_grn_PRC">
<input type="text" data-table="view_store_grn" data-field="x_PRC" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_store_grn->PRC->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PRC->EditValue ?>"<?php echo $view_store_grn->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_grn->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PRC" class="form-group view_store_grn_PRC">
<input type="text" data-table="view_store_grn" data-field="x_PRC" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_store_grn->PRC->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PRC->EditValue ?>"<?php echo $view_store_grn->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PRC" class="view_store_grn_PRC">
<span<?php echo $view_store_grn->PRC->viewAttributes() ?>>
<?php echo $view_store_grn->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_grn->PRC->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_grn->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_grn->PRC->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_grn->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_id" name="x<?php echo $view_store_grn_grid->RowIndex ?>_id" id="x<?php echo $view_store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_store_grn->id->CurrentValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_id" name="o<?php echo $view_store_grn_grid->RowIndex ?>_id" id="o<?php echo $view_store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_store_grn->id->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT || $view_store_grn->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_id" name="x<?php echo $view_store_grn_grid->RowIndex ?>_id" id="x<?php echo $view_store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_store_grn->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_store_grn->PrName->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PrName" class="form-group view_store_grn_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_store_grn->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_grn->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $view_store_grn_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="sv_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($view_store_grn->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_store_grn->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_grn->PrName->getPlaceHolder()) ?>"<?php echo $view_store_grn->PrName->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "store_storemast") && !$view_store_grn->PrName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_store_grn->PrName->caption() ?>" data-title="<?php echo $view_store_grn->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_store_grn_grid->RowIndex ?>_PrName',url:'store_storemastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" data-value-separator="<?php echo $view_store_grn->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_grngrid.createAutoSuggest({"id":"x<?php echo $view_store_grn_grid->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $view_store_grn->PrName->Lookup->getParamTag("p_x" . $view_store_grn_grid->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PrName" class="form-group view_store_grn_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_store_grn->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_grn->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $view_store_grn_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="sv_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($view_store_grn->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_store_grn->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_grn->PrName->getPlaceHolder()) ?>"<?php echo $view_store_grn->PrName->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "store_storemast") && !$view_store_grn->PrName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_store_grn->PrName->caption() ?>" data-title="<?php echo $view_store_grn->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_store_grn_grid->RowIndex ?>_PrName',url:'store_storemastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" data-value-separator="<?php echo $view_store_grn->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_grngrid.createAutoSuggest({"id":"x<?php echo $view_store_grn_grid->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $view_store_grn->PrName->Lookup->getParamTag("p_x" . $view_store_grn_grid->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PrName" class="view_store_grn_PrName">
<span<?php echo $view_store_grn->PrName->viewAttributes() ?>>
<?php echo $view_store_grn->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity"<?php echo $view_store_grn->GrnQuantity->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_GrnQuantity" class="form-group view_store_grn_GrnQuantity">
<input type="text" data-table="view_store_grn" data-field="x_GrnQuantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->GrnQuantity->EditValue ?>"<?php echo $view_store_grn->GrnQuantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" name="o<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="o<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_store_grn->GrnQuantity->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_GrnQuantity" class="form-group view_store_grn_GrnQuantity">
<input type="text" data-table="view_store_grn" data-field="x_GrnQuantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->GrnQuantity->EditValue ?>"<?php echo $view_store_grn->GrnQuantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity">
<span<?php echo $view_store_grn->GrnQuantity->viewAttributes() ?>>
<?php echo $view_store_grn->GrnQuantity->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_store_grn->GrnQuantity->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" name="o<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="o<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_store_grn->GrnQuantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_store_grn->GrnQuantity->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_store_grn->GrnQuantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty"<?php echo $view_store_grn->FreeQty->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_FreeQty" class="form-group view_store_grn_FreeQty">
<input type="text" data-table="view_store_grn" data-field="x_FreeQty" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->FreeQty->EditValue ?>"<?php echo $view_store_grn->FreeQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" name="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_store_grn->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_FreeQty" class="form-group view_store_grn_FreeQty">
<input type="text" data-table="view_store_grn" data-field="x_FreeQty" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->FreeQty->EditValue ?>"<?php echo $view_store_grn->FreeQty->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_FreeQty" class="view_store_grn_FreeQty">
<span<?php echo $view_store_grn->FreeQty->viewAttributes() ?>>
<?php echo $view_store_grn->FreeQty->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_store_grn->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" name="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_store_grn->FreeQty->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_store_grn->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_store_grn->FreeQty->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_store_grn->MFRCODE->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_MFRCODE" class="form-group view_store_grn_MFRCODE">
<input type="text" data-table="view_store_grn" data-field="x_MFRCODE" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_store_grn->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->MFRCODE->EditValue ?>"<?php echo $view_store_grn->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" name="o<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_store_grn->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_MFRCODE" class="form-group view_store_grn_MFRCODE">
<input type="text" data-table="view_store_grn" data-field="x_MFRCODE" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_store_grn->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->MFRCODE->EditValue ?>"<?php echo $view_store_grn->MFRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE">
<span<?php echo $view_store_grn->MFRCODE->viewAttributes() ?>>
<?php echo $view_store_grn->MFRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_store_grn->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" name="o<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_store_grn->MFRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_store_grn->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_store_grn->MFRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $view_store_grn->PUnit->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PUnit" class="form-group view_store_grn_PUnit">
<input type="text" data-table="view_store_grn" data-field="x_PUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PUnit->EditValue ?>"<?php echo $view_store_grn->PUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_store_grn->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PUnit" class="form-group view_store_grn_PUnit">
<input type="text" data-table="view_store_grn" data-field="x_PUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PUnit->EditValue ?>"<?php echo $view_store_grn->PUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PUnit" class="view_store_grn_PUnit">
<span<?php echo $view_store_grn->PUnit->viewAttributes() ?>>
<?php echo $view_store_grn->PUnit->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_store_grn->PUnit->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_store_grn->PUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_store_grn->PUnit->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_store_grn->PUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $view_store_grn->SUnit->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SUnit" class="form-group view_store_grn_SUnit">
<input type="text" data-table="view_store_grn" data-field="x_SUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SUnit->EditValue ?>"<?php echo $view_store_grn->SUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_store_grn->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SUnit" class="form-group view_store_grn_SUnit">
<input type="text" data-table="view_store_grn" data-field="x_SUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SUnit->EditValue ?>"<?php echo $view_store_grn->SUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SUnit" class="view_store_grn_SUnit">
<span<?php echo $view_store_grn->SUnit->viewAttributes() ?>>
<?php echo $view_store_grn->SUnit->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_store_grn->SUnit->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_store_grn->SUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_store_grn->SUnit->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_store_grn->SUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $view_store_grn->MRP->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_MRP" class="form-group view_store_grn_MRP">
<input type="text" data-table="view_store_grn" data-field="x_MRP" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->MRP->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->MRP->EditValue ?>"<?php echo $view_store_grn->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" name="o<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="o<?php echo $view_store_grn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_grn->MRP->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_MRP" class="form-group view_store_grn_MRP">
<input type="text" data-table="view_store_grn" data-field="x_MRP" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->MRP->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->MRP->EditValue ?>"<?php echo $view_store_grn->MRP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_MRP" class="view_store_grn_MRP">
<span<?php echo $view_store_grn->MRP->viewAttributes() ?>>
<?php echo $view_store_grn->MRP->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_grn->MRP->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" name="o<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="o<?php echo $view_store_grn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_grn->MRP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_grn->MRP->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_grn->MRP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $view_store_grn->PurValue->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PurValue" class="form-group view_store_grn_PurValue">
<input type="text" data-table="view_store_grn" data-field="x_PurValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PurValue->EditValue ?>"<?php echo $view_store_grn->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_store_grn->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PurValue" class="form-group view_store_grn_PurValue">
<input type="text" data-table="view_store_grn" data-field="x_PurValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PurValue->EditValue ?>"<?php echo $view_store_grn->PurValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PurValue" class="view_store_grn_PurValue">
<span<?php echo $view_store_grn->PurValue->viewAttributes() ?>>
<?php echo $view_store_grn->PurValue->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_store_grn->PurValue->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_store_grn->PurValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_store_grn->PurValue->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_store_grn->PurValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
		<td data-name="Disc"<?php echo $view_store_grn->Disc->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_Disc" class="form-group view_store_grn_Disc">
<input type="text" data-table="view_store_grn" data-field="x_Disc" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->Disc->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Disc->EditValue ?>"<?php echo $view_store_grn->Disc->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" name="o<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="o<?php echo $view_store_grn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_store_grn->Disc->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_Disc" class="form-group view_store_grn_Disc">
<input type="text" data-table="view_store_grn" data-field="x_Disc" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->Disc->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Disc->EditValue ?>"<?php echo $view_store_grn->Disc->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_Disc" class="view_store_grn_Disc">
<span<?php echo $view_store_grn->Disc->viewAttributes() ?>>
<?php echo $view_store_grn->Disc->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_store_grn->Disc->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" name="o<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="o<?php echo $view_store_grn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_store_grn->Disc->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_store_grn->Disc->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_store_grn->Disc->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $view_store_grn->PSGST->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PSGST" class="form-group view_store_grn_PSGST">
<input type="text" data-table="view_store_grn" data-field="x_PSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PSGST->EditValue ?>"<?php echo $view_store_grn->PSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_store_grn->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PSGST" class="form-group view_store_grn_PSGST">
<input type="text" data-table="view_store_grn" data-field="x_PSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PSGST->EditValue ?>"<?php echo $view_store_grn->PSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PSGST" class="view_store_grn_PSGST">
<span<?php echo $view_store_grn->PSGST->viewAttributes() ?>>
<?php echo $view_store_grn->PSGST->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_store_grn->PSGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_store_grn->PSGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_store_grn->PSGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_store_grn->PSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $view_store_grn->PCGST->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PCGST" class="form-group view_store_grn_PCGST">
<input type="text" data-table="view_store_grn" data-field="x_PCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PCGST->EditValue ?>"<?php echo $view_store_grn->PCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_store_grn->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PCGST" class="form-group view_store_grn_PCGST">
<input type="text" data-table="view_store_grn" data-field="x_PCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PCGST->EditValue ?>"<?php echo $view_store_grn->PCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PCGST" class="view_store_grn_PCGST">
<span<?php echo $view_store_grn->PCGST->viewAttributes() ?>>
<?php echo $view_store_grn->PCGST->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_store_grn->PCGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_store_grn->PCGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_store_grn->PCGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_store_grn->PCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
		<td data-name="PTax"<?php echo $view_store_grn->PTax->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PTax" class="form-group view_store_grn_PTax">
<input type="text" data-table="view_store_grn" data-field="x_PTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->PTax->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PTax->EditValue ?>"<?php echo $view_store_grn->PTax->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_store_grn->PTax->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PTax" class="form-group view_store_grn_PTax">
<input type="text" data-table="view_store_grn" data-field="x_PTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->PTax->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PTax->EditValue ?>"<?php echo $view_store_grn->PTax->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_PTax" class="view_store_grn_PTax">
<span<?php echo $view_store_grn->PTax->viewAttributes() ?>>
<?php echo $view_store_grn->PTax->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_store_grn->PTax->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_store_grn->PTax->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_store_grn->PTax->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_store_grn->PTax->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue"<?php echo $view_store_grn->ItemValue->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_ItemValue" class="form-group view_store_grn_ItemValue">
<input type="text" data-table="view_store_grn" data-field="x_ItemValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_grn->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ItemValue->EditValue ?>"<?php echo $view_store_grn->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" name="o<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_grn->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_ItemValue" class="form-group view_store_grn_ItemValue">
<input type="text" data-table="view_store_grn" data-field="x_ItemValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_grn->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ItemValue->EditValue ?>"<?php echo $view_store_grn->ItemValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_ItemValue" class="view_store_grn_ItemValue">
<span<?php echo $view_store_grn->ItemValue->viewAttributes() ?>>
<?php echo $view_store_grn->ItemValue->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_grn->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" name="o<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_grn->ItemValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_grn->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_grn->ItemValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax"<?php echo $view_store_grn->SalTax->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SalTax" class="form-group view_store_grn_SalTax">
<input type="text" data-table="view_store_grn" data-field="x_SalTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_grn->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SalTax->EditValue ?>"<?php echo $view_store_grn->SalTax->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_store_grn->SalTax->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SalTax" class="form-group view_store_grn_SalTax">
<input type="text" data-table="view_store_grn" data-field="x_SalTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_grn->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SalTax->EditValue ?>"<?php echo $view_store_grn->SalTax->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SalTax" class="view_store_grn_SalTax">
<span<?php echo $view_store_grn->SalTax->viewAttributes() ?>>
<?php echo $view_store_grn->SalTax->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_store_grn->SalTax->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_store_grn->SalTax->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_store_grn->SalTax->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_store_grn->SalTax->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_store_grn->BatchNo->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_BatchNo" class="form-group view_store_grn_BatchNo">
<input type="text" data-table="view_store_grn" data-field="x_BatchNo" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->BatchNo->EditValue ?>"<?php echo $view_store_grn->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" name="o<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_grn->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_BatchNo" class="form-group view_store_grn_BatchNo">
<input type="text" data-table="view_store_grn" data-field="x_BatchNo" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->BatchNo->EditValue ?>"<?php echo $view_store_grn->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_BatchNo" class="view_store_grn_BatchNo">
<span<?php echo $view_store_grn->BatchNo->viewAttributes() ?>>
<?php echo $view_store_grn->BatchNo->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_grn->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" name="o<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_grn->BatchNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_grn->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_grn->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_store_grn->ExpDate->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_ExpDate" class="form-group view_store_grn_ExpDate">
<input type="text" data-table="view_store_grn" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ExpDate->EditValue ?>"<?php echo $view_store_grn->ExpDate->editAttributes() ?>>
<?php if (!$view_store_grn->ExpDate->ReadOnly && !$view_store_grn->ExpDate->Disabled && !isset($view_store_grn->ExpDate->EditAttrs["readonly"]) && !isset($view_store_grn->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_grn->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_ExpDate" class="form-group view_store_grn_ExpDate">
<input type="text" data-table="view_store_grn" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ExpDate->EditValue ?>"<?php echo $view_store_grn->ExpDate->editAttributes() ?>>
<?php if (!$view_store_grn->ExpDate->ReadOnly && !$view_store_grn->ExpDate->Disabled && !isset($view_store_grn->ExpDate->EditAttrs["readonly"]) && !isset($view_store_grn->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_ExpDate" class="view_store_grn_ExpDate">
<span<?php echo $view_store_grn->ExpDate->viewAttributes() ?>>
<?php echo $view_store_grn->ExpDate->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_grn->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_grn->ExpDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_grn->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_grn->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_store_grn->Quantity->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_Quantity" class="form-group view_store_grn_Quantity">
<input type="text" data-table="view_store_grn" data-field="x_Quantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Quantity->EditValue ?>"<?php echo $view_store_grn->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" name="o<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="o<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_grn->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_Quantity" class="form-group view_store_grn_Quantity">
<input type="text" data-table="view_store_grn" data-field="x_Quantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Quantity->EditValue ?>"<?php echo $view_store_grn->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_Quantity" class="view_store_grn_Quantity">
<span<?php echo $view_store_grn->Quantity->viewAttributes() ?>>
<?php echo $view_store_grn->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_grn->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" name="o<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="o<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_grn->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_grn->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_grn->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate"<?php echo $view_store_grn->SalRate->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SalRate" class="form-group view_store_grn_SalRate">
<input type="text" data-table="view_store_grn" data-field="x_SalRate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SalRate->EditValue ?>"<?php echo $view_store_grn->SalRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_store_grn->SalRate->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SalRate" class="form-group view_store_grn_SalRate">
<input type="text" data-table="view_store_grn" data-field="x_SalRate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SalRate->EditValue ?>"<?php echo $view_store_grn->SalRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SalRate" class="view_store_grn_SalRate">
<span<?php echo $view_store_grn->SalRate->viewAttributes() ?>>
<?php echo $view_store_grn->SalRate->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_store_grn->SalRate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_store_grn->SalRate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_store_grn->SalRate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_store_grn->SalRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $view_store_grn->SSGST->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SSGST" class="form-group view_store_grn_SSGST">
<input type="text" data-table="view_store_grn" data-field="x_SSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SSGST->EditValue ?>"<?php echo $view_store_grn->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_store_grn->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SSGST" class="form-group view_store_grn_SSGST">
<input type="text" data-table="view_store_grn" data-field="x_SSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SSGST->EditValue ?>"<?php echo $view_store_grn->SSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SSGST" class="view_store_grn_SSGST">
<span<?php echo $view_store_grn->SSGST->viewAttributes() ?>>
<?php echo $view_store_grn->SSGST->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_store_grn->SSGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_store_grn->SSGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_store_grn->SSGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_store_grn->SSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $view_store_grn->SCGST->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SCGST" class="form-group view_store_grn_SCGST">
<input type="text" data-table="view_store_grn" data-field="x_SCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SCGST->EditValue ?>"<?php echo $view_store_grn->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_store_grn->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SCGST" class="form-group view_store_grn_SCGST">
<input type="text" data-table="view_store_grn" data-field="x_SCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SCGST->EditValue ?>"<?php echo $view_store_grn->SCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_SCGST" class="view_store_grn_SCGST">
<span<?php echo $view_store_grn->SCGST->viewAttributes() ?>>
<?php echo $view_store_grn->SCGST->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_store_grn->SCGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_store_grn->SCGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_store_grn->SCGST->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_store_grn->SCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_store_grn->BRCODE->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" name="o<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_grn->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_BRCODE" class="view_store_grn_BRCODE">
<span<?php echo $view_store_grn->BRCODE->viewAttributes() ?>>
<?php echo $view_store_grn->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_grn->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" name="o<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_grn->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_grn->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_grn->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
		<td data-name="HSN"<?php echo $view_store_grn->HSN->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_HSN" class="form-group view_store_grn_HSN">
<input type="text" data-table="view_store_grn" data-field="x_HSN" name="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->HSN->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->HSN->EditValue ?>"<?php echo $view_store_grn->HSN->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" name="o<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="o<?php echo $view_store_grn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_store_grn->HSN->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_HSN" class="form-group view_store_grn_HSN">
<input type="text" data-table="view_store_grn" data-field="x_HSN" name="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->HSN->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->HSN->EditValue ?>"<?php echo $view_store_grn->HSN->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_HSN" class="view_store_grn_HSN">
<span<?php echo $view_store_grn->HSN->viewAttributes() ?>>
<?php echo $view_store_grn->HSN->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" name="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_store_grn->HSN->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" name="o<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="o<?php echo $view_store_grn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_store_grn->HSN->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_store_grn->HSN->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_store_grn->HSN->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_store_grn->HospID->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" name="o<?php echo $view_store_grn_grid->RowIndex ?>_HospID" id="o<?php echo $view_store_grn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_grn->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_HospID" class="view_store_grn_HospID">
<span<?php echo $view_store_grn->HospID->viewAttributes() ?>>
<?php echo $view_store_grn->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" name="x<?php echo $view_store_grn_grid->RowIndex ?>_HospID" id="x<?php echo $view_store_grn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_grn->HospID->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" name="o<?php echo $view_store_grn_grid->RowIndex ?>_HospID" id="o<?php echo $view_store_grn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_grn->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_HospID" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_grn->HospID->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_HospID" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_grn->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby"<?php echo $view_store_grn->grncreatedby->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_grn->grncreatedby->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby">
<span<?php echo $view_store_grn->grncreatedby->viewAttributes() ?>>
<?php echo $view_store_grn->grncreatedby->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_grn->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_grn->grncreatedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_grn->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_grn->grncreatedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime"<?php echo $view_store_grn->grncreatedDateTime->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_grn->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime">
<span<?php echo $view_store_grn->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->grncreatedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_grn->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_grn->grncreatedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_grn->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_grn->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby"<?php echo $view_store_grn->grnModifiedby->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_grn->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby">
<span<?php echo $view_store_grn->grnModifiedby->viewAttributes() ?>>
<?php echo $view_store_grn->grnModifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_grn->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_grn->grnModifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_grn->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_grn->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime"<?php echo $view_store_grn->grnModifiedDateTime->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_grn->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime">
<span<?php echo $view_store_grn->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->grnModifiedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_grn->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_grn->grnModifiedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_grn->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_grn->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $view_store_grn->BillDate->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_BillDate" class="form-group view_store_grn_BillDate">
<input type="text" data-table="view_store_grn" data-field="x_BillDate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_store_grn->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->BillDate->EditValue ?>"<?php echo $view_store_grn->BillDate->editAttributes() ?>>
<?php if (!$view_store_grn->BillDate->ReadOnly && !$view_store_grn->BillDate->Disabled && !isset($view_store_grn->BillDate->EditAttrs["readonly"]) && !isset($view_store_grn->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_grn->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_BillDate" class="form-group view_store_grn_BillDate">
<input type="text" data-table="view_store_grn" data-field="x_BillDate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_store_grn->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->BillDate->EditValue ?>"<?php echo $view_store_grn->BillDate->editAttributes() ?>>
<?php if (!$view_store_grn->BillDate->ReadOnly && !$view_store_grn->BillDate->Disabled && !isset($view_store_grn->BillDate->EditAttrs["readonly"]) && !isset($view_store_grn->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_BillDate" class="view_store_grn_BillDate">
<span<?php echo $view_store_grn->BillDate->viewAttributes() ?>>
<?php echo $view_store_grn->BillDate->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_grn->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_grn->BillDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_grn->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_grn->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock"<?php echo $view_store_grn->CurStock->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_CurStock" class="form-group view_store_grn_CurStock">
<input type="text" data-table="view_store_grn" data-field="x_CurStock" name="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->CurStock->EditValue ?>"<?php echo $view_store_grn->CurStock->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" name="o<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="o<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_grn->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_CurStock" class="form-group view_store_grn_CurStock">
<input type="text" data-table="view_store_grn" data-field="x_CurStock" name="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->CurStock->EditValue ?>"<?php echo $view_store_grn->CurStock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_CurStock" class="view_store_grn_CurStock">
<span<?php echo $view_store_grn->CurStock->viewAttributes() ?>>
<?php echo $view_store_grn->CurStock->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" name="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_grn->CurStock->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" name="o<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="o<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_grn->CurStock->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_grn->CurStock->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_grn->CurStock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy"<?php echo $view_store_grn->FreeQtyyy->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_FreeQtyyy" class="form-group view_store_grn_FreeQtyyy">
<input type="text" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->FreeQtyyy->EditValue ?>"<?php echo $view_store_grn->FreeQtyyy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" name="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_FreeQtyyy" class="form-group view_store_grn_FreeQtyyy">
<input type="text" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->FreeQtyyy->EditValue ?>"<?php echo $view_store_grn->FreeQtyyy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy">
<span<?php echo $view_store_grn->FreeQtyyy->viewAttributes() ?>>
<?php echo $view_store_grn->FreeQtyyy->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" name="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
		<td data-name="grndate"<?php echo $view_store_grn->grndate->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grndate" class="form-group view_store_grn_grndate">
<input type="text" data-table="view_store_grn" data-field="x_grndate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" placeholder="<?php echo HtmlEncode($view_store_grn->grndate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->grndate->EditValue ?>"<?php echo $view_store_grn->grndate->editAttributes() ?>>
<?php if (!$view_store_grn->grndate->ReadOnly && !$view_store_grn->grndate->Disabled && !isset($view_store_grn->grndate->EditAttrs["readonly"]) && !isset($view_store_grn->grndate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_grndate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_store_grn->grndate->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grndate" class="form-group view_store_grn_grndate">
<input type="text" data-table="view_store_grn" data-field="x_grndate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" placeholder="<?php echo HtmlEncode($view_store_grn->grndate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->grndate->EditValue ?>"<?php echo $view_store_grn->grndate->editAttributes() ?>>
<?php if (!$view_store_grn->grndate->ReadOnly && !$view_store_grn->grndate->Disabled && !isset($view_store_grn->grndate->EditAttrs["readonly"]) && !isset($view_store_grn->grndate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_grndate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grndate" class="view_store_grn_grndate">
<span<?php echo $view_store_grn->grndate->viewAttributes() ?>>
<?php echo $view_store_grn->grndate->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_store_grn->grndate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_store_grn->grndate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_store_grn->grndate->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_store_grn->grndate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime"<?php echo $view_store_grn->grndatetime->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grndatetime" class="form-group view_store_grn_grndatetime">
<input type="text" data-table="view_store_grn" data-field="x_grndatetime" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" placeholder="<?php echo HtmlEncode($view_store_grn->grndatetime->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->grndatetime->EditValue ?>"<?php echo $view_store_grn->grndatetime->editAttributes() ?>>
<?php if (!$view_store_grn->grndatetime->ReadOnly && !$view_store_grn->grndatetime->Disabled && !isset($view_store_grn->grndatetime->EditAttrs["readonly"]) && !isset($view_store_grn->grndatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_store_grn->grndatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grndatetime" class="form-group view_store_grn_grndatetime">
<input type="text" data-table="view_store_grn" data-field="x_grndatetime" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" placeholder="<?php echo HtmlEncode($view_store_grn->grndatetime->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->grndatetime->EditValue ?>"<?php echo $view_store_grn->grndatetime->editAttributes() ?>>
<?php if (!$view_store_grn->grndatetime->ReadOnly && !$view_store_grn->grndatetime->Disabled && !isset($view_store_grn->grndatetime->EditAttrs["readonly"]) && !isset($view_store_grn->grndatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_grndatetime" class="view_store_grn_grndatetime">
<span<?php echo $view_store_grn->grndatetime->viewAttributes() ?>>
<?php echo $view_store_grn->grndatetime->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_store_grn->grndatetime->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_store_grn->grndatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_store_grn->grndatetime->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_store_grn->grndatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->strid->Visible) { // strid ?>
		<td data-name="strid"<?php echo $view_store_grn->strid->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_strid" class="form-group view_store_grn_strid">
<input type="text" data-table="view_store_grn" data-field="x_strid" name="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->strid->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->strid->EditValue ?>"<?php echo $view_store_grn->strid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_strid" name="o<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="o<?php echo $view_store_grn_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_grn->strid->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_strid" class="form-group view_store_grn_strid">
<input type="text" data-table="view_store_grn" data-field="x_strid" name="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->strid->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->strid->EditValue ?>"<?php echo $view_store_grn->strid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_strid" class="view_store_grn_strid">
<span<?php echo $view_store_grn->strid->viewAttributes() ?>>
<?php echo $view_store_grn->strid->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_strid" name="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_grn->strid->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_strid" name="o<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="o<?php echo $view_store_grn_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_grn->strid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_strid" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_grn->strid->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_strid" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_grn->strid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
		<td data-name="GRNPer"<?php echo $view_store_grn->GRNPer->cellAttributes() ?>>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_GRNPer" class="form-group view_store_grn_GRNPer">
<input type="text" data-table="view_store_grn" data-field="x_GRNPer" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->GRNPer->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->GRNPer->EditValue ?>"<?php echo $view_store_grn->GRNPer->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" name="o<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="o<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($view_store_grn->GRNPer->OldValue) ?>">
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_GRNPer" class="form-group view_store_grn_GRNPer">
<input type="text" data-table="view_store_grn" data-field="x_GRNPer" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->GRNPer->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->GRNPer->EditValue ?>"<?php echo $view_store_grn->GRNPer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_grn_grid->RowCnt ?>_view_store_grn_GRNPer" class="view_store_grn_GRNPer">
<span<?php echo $view_store_grn->GRNPer->viewAttributes() ?>>
<?php echo $view_store_grn->GRNPer->getViewValue() ?></span>
</span>
<?php if (!$view_store_grn->isConfirm()) { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($view_store_grn->GRNPer->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" name="o<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="o<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($view_store_grn->GRNPer->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" name="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="fview_store_grngrid$x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($view_store_grn->GRNPer->FormValue) ?>">
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" name="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="fview_store_grngrid$o<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($view_store_grn->GRNPer->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_store_grn_grid->ListOptions->render("body", "right", $view_store_grn_grid->RowCnt);
?>
	</tr>
<?php if ($view_store_grn->RowType == ROWTYPE_ADD || $view_store_grn->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_store_grngrid.updateLists(<?php echo $view_store_grn_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_store_grn->isGridAdd() || $view_store_grn->CurrentMode == "copy")
		if (!$view_store_grn_grid->Recordset->EOF)
			$view_store_grn_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_store_grn->CurrentMode == "add" || $view_store_grn->CurrentMode == "copy" || $view_store_grn->CurrentMode == "edit") {
		$view_store_grn_grid->RowIndex = '$rowindex$';
		$view_store_grn_grid->loadRowValues();

		// Set row properties
		$view_store_grn->resetAttributes();
		$view_store_grn->RowAttrs = array_merge($view_store_grn->RowAttrs, array('data-rowindex'=>$view_store_grn_grid->RowIndex, 'id'=>'r0_view_store_grn', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_store_grn->RowAttrs["class"], "ew-template");
		$view_store_grn->RowType = ROWTYPE_ADD;

		// Render row
		$view_store_grn_grid->renderRow();

		// Render list options
		$view_store_grn_grid->renderListOptions();
		$view_store_grn_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_store_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_store_grn_grid->ListOptions->render("body", "left", $view_store_grn_grid->RowIndex);
?>
	<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PRC" class="form-group view_store_grn_PRC">
<input type="text" data-table="view_store_grn" data-field="x_PRC" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_store_grn->PRC->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PRC->EditValue ?>"<?php echo $view_store_grn->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PRC" class="form-group view_store_grn_PRC">
<span<?php echo $view_store_grn->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->PRC->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_grn->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PRC" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PRC" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_grn->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PrName" class="form-group view_store_grn_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_store_grn->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_grn->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $view_store_grn_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="sv_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($view_store_grn->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_store_grn->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_grn->PrName->getPlaceHolder()) ?>"<?php echo $view_store_grn->PrName->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "store_storemast") && !$view_store_grn->PrName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_store_grn->PrName->caption() ?>" data-title="<?php echo $view_store_grn->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_store_grn_grid->RowIndex ?>_PrName',url:'store_storemastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" data-value-separator="<?php echo $view_store_grn->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_grngrid.createAutoSuggest({"id":"x<?php echo $view_store_grn_grid->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $view_store_grn->PrName->Lookup->getParamTag("p_x" . $view_store_grn_grid->RowIndex . "_PrName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PrName" class="form-group view_store_grn_PrName">
<span<?php echo $view_store_grn->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->PrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PrName" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PrName" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_grn->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_GrnQuantity" class="form-group view_store_grn_GrnQuantity">
<input type="text" data-table="view_store_grn" data-field="x_GrnQuantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->GrnQuantity->EditValue ?>"<?php echo $view_store_grn->GrnQuantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_GrnQuantity" class="form-group view_store_grn_GrnQuantity">
<span<?php echo $view_store_grn->GrnQuantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->GrnQuantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_store_grn->GrnQuantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GrnQuantity" name="o<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" id="o<?php echo $view_store_grn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_store_grn->GrnQuantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_FreeQty" class="form-group view_store_grn_FreeQty">
<input type="text" data-table="view_store_grn" data-field="x_FreeQty" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->FreeQty->EditValue ?>"<?php echo $view_store_grn->FreeQty->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_FreeQty" class="form-group view_store_grn_FreeQty">
<span<?php echo $view_store_grn->FreeQty->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->FreeQty->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_store_grn->FreeQty->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQty" name="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_store_grn->FreeQty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_MFRCODE" class="form-group view_store_grn_MFRCODE">
<input type="text" data-table="view_store_grn" data-field="x_MFRCODE" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_store_grn->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->MFRCODE->EditValue ?>"<?php echo $view_store_grn->MFRCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_MFRCODE" class="form-group view_store_grn_MFRCODE">
<span<?php echo $view_store_grn->MFRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->MFRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_store_grn->MFRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MFRCODE" name="o<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_store_grn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_store_grn->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PUnit" class="form-group view_store_grn_PUnit">
<input type="text" data-table="view_store_grn" data-field="x_PUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PUnit->EditValue ?>"<?php echo $view_store_grn->PUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PUnit" class="form-group view_store_grn_PUnit">
<span<?php echo $view_store_grn->PUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->PUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_store_grn->PUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PUnit" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_store_grn->PUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SUnit" class="form-group view_store_grn_SUnit">
<input type="text" data-table="view_store_grn" data-field="x_SUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SUnit->EditValue ?>"<?php echo $view_store_grn->SUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SUnit" class="form-group view_store_grn_SUnit">
<span<?php echo $view_store_grn->SUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->SUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_store_grn->SUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SUnit" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_store_grn->SUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
		<td data-name="MRP">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_MRP" class="form-group view_store_grn_MRP">
<input type="text" data-table="view_store_grn" data-field="x_MRP" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->MRP->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->MRP->EditValue ?>"<?php echo $view_store_grn->MRP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_MRP" class="form-group view_store_grn_MRP">
<span<?php echo $view_store_grn->MRP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->MRP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" name="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_grn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_grn->MRP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_MRP" name="o<?php echo $view_store_grn_grid->RowIndex ?>_MRP" id="o<?php echo $view_store_grn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_grn->MRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PurValue" class="form-group view_store_grn_PurValue">
<input type="text" data-table="view_store_grn" data-field="x_PurValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PurValue->EditValue ?>"<?php echo $view_store_grn->PurValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PurValue" class="form-group view_store_grn_PurValue">
<span<?php echo $view_store_grn->PurValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->PurValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_store_grn->PurValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PurValue" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_store_grn->PurValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
		<td data-name="Disc">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_Disc" class="form-group view_store_grn_Disc">
<input type="text" data-table="view_store_grn" data-field="x_Disc" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->Disc->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Disc->EditValue ?>"<?php echo $view_store_grn->Disc->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_Disc" class="form-group view_store_grn_Disc">
<span<?php echo $view_store_grn->Disc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->Disc->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_store_grn->Disc->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Disc" name="o<?php echo $view_store_grn_grid->RowIndex ?>_Disc" id="o<?php echo $view_store_grn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_store_grn->Disc->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PSGST" class="form-group view_store_grn_PSGST">
<input type="text" data-table="view_store_grn" data-field="x_PSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PSGST->EditValue ?>"<?php echo $view_store_grn->PSGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PSGST" class="form-group view_store_grn_PSGST">
<span<?php echo $view_store_grn->PSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->PSGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_store_grn->PSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PSGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_store_grn->PSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PCGST" class="form-group view_store_grn_PCGST">
<input type="text" data-table="view_store_grn" data-field="x_PCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PCGST->EditValue ?>"<?php echo $view_store_grn->PCGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PCGST" class="form-group view_store_grn_PCGST">
<span<?php echo $view_store_grn->PCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->PCGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_store_grn->PCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PCGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_store_grn->PCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
		<td data-name="PTax">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_PTax" class="form-group view_store_grn_PTax">
<input type="text" data-table="view_store_grn" data-field="x_PTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->PTax->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->PTax->EditValue ?>"<?php echo $view_store_grn->PTax->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_PTax" class="form-group view_store_grn_PTax">
<span<?php echo $view_store_grn->PTax->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->PTax->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_store_grn->PTax->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_PTax" name="o<?php echo $view_store_grn_grid->RowIndex ?>_PTax" id="o<?php echo $view_store_grn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_store_grn->PTax->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_ItemValue" class="form-group view_store_grn_ItemValue">
<input type="text" data-table="view_store_grn" data-field="x_ItemValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_grn->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ItemValue->EditValue ?>"<?php echo $view_store_grn->ItemValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_ItemValue" class="form-group view_store_grn_ItemValue">
<span<?php echo $view_store_grn->ItemValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->ItemValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_grn->ItemValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ItemValue" name="o<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_store_grn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_grn->ItemValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SalTax" class="form-group view_store_grn_SalTax">
<input type="text" data-table="view_store_grn" data-field="x_SalTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_grn->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SalTax->EditValue ?>"<?php echo $view_store_grn->SalTax->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SalTax" class="form-group view_store_grn_SalTax">
<span<?php echo $view_store_grn->SalTax->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->SalTax->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_store_grn->SalTax->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalTax" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_store_grn->SalTax->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_BatchNo" class="form-group view_store_grn_BatchNo">
<input type="text" data-table="view_store_grn" data-field="x_BatchNo" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->BatchNo->EditValue ?>"<?php echo $view_store_grn->BatchNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_BatchNo" class="form-group view_store_grn_BatchNo">
<span<?php echo $view_store_grn->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->BatchNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_grn->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BatchNo" name="o<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_store_grn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_grn->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_ExpDate" class="form-group view_store_grn_ExpDate">
<input type="text" data-table="view_store_grn" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->ExpDate->EditValue ?>"<?php echo $view_store_grn->ExpDate->editAttributes() ?>>
<?php if (!$view_store_grn->ExpDate->ReadOnly && !$view_store_grn->ExpDate->Disabled && !isset($view_store_grn->ExpDate->EditAttrs["readonly"]) && !isset($view_store_grn->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_ExpDate" class="form-group view_store_grn_ExpDate">
<span<?php echo $view_store_grn->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->ExpDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_grn->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_ExpDate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_grn->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_Quantity" class="form-group view_store_grn_Quantity">
<input type="text" data-table="view_store_grn" data-field="x_Quantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->Quantity->EditValue ?>"<?php echo $view_store_grn->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_Quantity" class="form-group view_store_grn_Quantity">
<span<?php echo $view_store_grn->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->Quantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" name="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_grn->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_Quantity" name="o<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" id="o<?php echo $view_store_grn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_grn->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SalRate" class="form-group view_store_grn_SalRate">
<input type="text" data-table="view_store_grn" data-field="x_SalRate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_store_grn->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SalRate->EditValue ?>"<?php echo $view_store_grn->SalRate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SalRate" class="form-group view_store_grn_SalRate">
<span<?php echo $view_store_grn->SalRate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->SalRate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_store_grn->SalRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SalRate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_store_grn->SalRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SSGST" class="form-group view_store_grn_SSGST">
<input type="text" data-table="view_store_grn" data-field="x_SSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SSGST->EditValue ?>"<?php echo $view_store_grn->SSGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SSGST" class="form-group view_store_grn_SSGST">
<span<?php echo $view_store_grn->SSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->SSGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_store_grn->SSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SSGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_store_grn->SSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_SCGST" class="form-group view_store_grn_SCGST">
<input type="text" data-table="view_store_grn" data-field="x_SCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_store_grn->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->SCGST->EditValue ?>"<?php echo $view_store_grn->SCGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_SCGST" class="form-group view_store_grn_SCGST">
<span<?php echo $view_store_grn->SCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->SCGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" name="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_store_grn->SCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_SCGST" name="o<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" id="o<?php echo $view_store_grn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_store_grn->SCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$view_store_grn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_BRCODE" class="form-group view_store_grn_BRCODE">
<span<?php echo $view_store_grn->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->BRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_grn->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BRCODE" name="o<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_store_grn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_grn->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
		<td data-name="HSN">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_HSN" class="form-group view_store_grn_HSN">
<input type="text" data-table="view_store_grn" data-field="x_HSN" name="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_grn->HSN->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->HSN->EditValue ?>"<?php echo $view_store_grn->HSN->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_HSN" class="form-group view_store_grn_HSN">
<span<?php echo $view_store_grn->HSN->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->HSN->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" name="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="x<?php echo $view_store_grn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_store_grn->HSN->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HSN" name="o<?php echo $view_store_grn_grid->RowIndex ?>_HSN" id="o<?php echo $view_store_grn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_store_grn->HSN->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_store_grn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_HospID" class="form-group view_store_grn_HospID">
<span<?php echo $view_store_grn->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" name="x<?php echo $view_store_grn_grid->RowIndex ?>_HospID" id="x<?php echo $view_store_grn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_grn->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_HospID" name="o<?php echo $view_store_grn_grid->RowIndex ?>_HospID" id="o<?php echo $view_store_grn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_grn->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby">
<?php if (!$view_store_grn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grncreatedby" class="form-group view_store_grn_grncreatedby">
<span<?php echo $view_store_grn->grncreatedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->grncreatedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_grn->grncreatedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedby" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_grn->grncreatedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime">
<?php if (!$view_store_grn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grncreatedDateTime" class="form-group view_store_grn_grncreatedDateTime">
<span<?php echo $view_store_grn->grncreatedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->grncreatedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_grn->grncreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grncreatedDateTime" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_grn->grncreatedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby">
<?php if (!$view_store_grn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grnModifiedby" class="form-group view_store_grn_grnModifiedby">
<span<?php echo $view_store_grn->grnModifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->grnModifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_grn->grnModifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedby" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_grn->grnModifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime">
<?php if (!$view_store_grn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grnModifiedDateTime" class="form-group view_store_grn_grnModifiedDateTime">
<span<?php echo $view_store_grn->grnModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->grnModifiedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_grn->grnModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grnModifiedDateTime" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_grn->grnModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_BillDate" class="form-group view_store_grn_BillDate">
<input type="text" data-table="view_store_grn" data-field="x_BillDate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_store_grn->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->BillDate->EditValue ?>"<?php echo $view_store_grn->BillDate->editAttributes() ?>>
<?php if (!$view_store_grn->BillDate->ReadOnly && !$view_store_grn->BillDate->Disabled && !isset($view_store_grn->BillDate->EditAttrs["readonly"]) && !isset($view_store_grn->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_BillDate" class="form-group view_store_grn_BillDate">
<span<?php echo $view_store_grn->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->BillDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_grn->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_BillDate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_grn->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_CurStock" class="form-group view_store_grn_CurStock">
<input type="text" data-table="view_store_grn" data-field="x_CurStock" name="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->CurStock->EditValue ?>"<?php echo $view_store_grn->CurStock->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_CurStock" class="form-group view_store_grn_CurStock">
<span<?php echo $view_store_grn->CurStock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->CurStock->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" name="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_grn->CurStock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_CurStock" name="o<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" id="o<?php echo $view_store_grn_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_grn->CurStock->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_FreeQtyyy" class="form-group view_store_grn_FreeQtyyy">
<input type="text" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->FreeQtyyy->EditValue ?>"<?php echo $view_store_grn->FreeQtyyy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_FreeQtyyy" class="form-group view_store_grn_FreeQtyyy">
<span<?php echo $view_store_grn->FreeQtyyy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->FreeQtyyy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_FreeQtyyy" name="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" id="o<?php echo $view_store_grn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_store_grn->FreeQtyyy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
		<td data-name="grndate">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_grndate" class="form-group view_store_grn_grndate">
<input type="text" data-table="view_store_grn" data-field="x_grndate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" placeholder="<?php echo HtmlEncode($view_store_grn->grndate->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->grndate->EditValue ?>"<?php echo $view_store_grn->grndate->editAttributes() ?>>
<?php if (!$view_store_grn->grndate->ReadOnly && !$view_store_grn->grndate->Disabled && !isset($view_store_grn->grndate->EditAttrs["readonly"]) && !isset($view_store_grn->grndate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_grndate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grndate" class="form-group view_store_grn_grndate">
<span<?php echo $view_store_grn->grndate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->grndate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_store_grn->grndate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndate" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grndate" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_store_grn->grndate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_grndatetime" class="form-group view_store_grn_grndatetime">
<input type="text" data-table="view_store_grn" data-field="x_grndatetime" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" placeholder="<?php echo HtmlEncode($view_store_grn->grndatetime->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->grndatetime->EditValue ?>"<?php echo $view_store_grn->grndatetime->editAttributes() ?>>
<?php if (!$view_store_grn->grndatetime->ReadOnly && !$view_store_grn->grndatetime->Disabled && !isset($view_store_grn->grndatetime->EditAttrs["readonly"]) && !isset($view_store_grn->grndatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_grngrid", "x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_grndatetime" class="form-group view_store_grn_grndatetime">
<span<?php echo $view_store_grn->grndatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->grndatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" name="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="x<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_store_grn->grndatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_grndatetime" name="o<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" id="o<?php echo $view_store_grn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_store_grn->grndatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->strid->Visible) { // strid ?>
		<td data-name="strid">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_strid" class="form-group view_store_grn_strid">
<input type="text" data-table="view_store_grn" data-field="x_strid" name="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->strid->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->strid->EditValue ?>"<?php echo $view_store_grn->strid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_strid" class="form-group view_store_grn_strid">
<span<?php echo $view_store_grn->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->strid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_strid" name="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="x<?php echo $view_store_grn_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_grn->strid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_strid" name="o<?php echo $view_store_grn_grid->RowIndex ?>_strid" id="o<?php echo $view_store_grn_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_grn->strid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
		<td data-name="GRNPer">
<?php if (!$view_store_grn->isConfirm()) { ?>
<span id="el$rowindex$_view_store_grn_GRNPer" class="form-group view_store_grn_GRNPer">
<input type="text" data-table="view_store_grn" data-field="x_GRNPer" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" size="30" placeholder="<?php echo HtmlEncode($view_store_grn->GRNPer->getPlaceHolder()) ?>" value="<?php echo $view_store_grn->GRNPer->EditValue ?>"<?php echo $view_store_grn->GRNPer->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_grn_GRNPer" class="form-group view_store_grn_GRNPer">
<span<?php echo $view_store_grn->GRNPer->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_grn->GRNPer->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" name="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="x<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($view_store_grn->GRNPer->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_grn" data-field="x_GRNPer" name="o<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" id="o<?php echo $view_store_grn_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($view_store_grn->GRNPer->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_store_grn_grid->ListOptions->render("body", "right", $view_store_grn_grid->RowIndex);
?>
<script>
fview_store_grngrid.updateLists(<?php echo $view_store_grn_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
<?php

// Render aggregate row
$view_store_grn->RowType = ROWTYPE_AGGREGATE;
$view_store_grn->resetAttributes();
$view_store_grn_grid->renderRow();
?>
<?php if ($view_store_grn_grid->TotalRecs > 0 && $view_store_grn->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_store_grn_grid->renderListOptions();

// Render list options (footer, left)
$view_store_grn_grid->ListOptions->render("footer", "left");
?>
	<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_store_grn->PRC->footerCellClass() ?>"><span id="elf_view_store_grn_PRC" class="view_store_grn_PRC">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
		<td data-name="PrName" class="<?php echo $view_store_grn->PrName->footerCellClass() ?>"><span id="elf_view_store_grn_PrName" class="view_store_grn_PrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity" class="<?php echo $view_store_grn->GrnQuantity->footerCellClass() ?>"><span id="elf_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" class="<?php echo $view_store_grn->FreeQty->footerCellClass() ?>"><span id="elf_view_store_grn_FreeQty" class="view_store_grn_FreeQty">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_store_grn->MFRCODE->footerCellClass() ?>"><span id="elf_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit" class="<?php echo $view_store_grn->PUnit->footerCellClass() ?>"><span id="elf_view_store_grn_PUnit" class="view_store_grn_PUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit" class="<?php echo $view_store_grn->SUnit->footerCellClass() ?>"><span id="elf_view_store_grn_SUnit" class="view_store_grn_SUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
		<td data-name="MRP" class="<?php echo $view_store_grn->MRP->footerCellClass() ?>"><span id="elf_view_store_grn_MRP" class="view_store_grn_MRP">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" class="<?php echo $view_store_grn->PurValue->footerCellClass() ?>"><span id="elf_view_store_grn_PurValue" class="view_store_grn_PurValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
		<td data-name="Disc" class="<?php echo $view_store_grn->Disc->footerCellClass() ?>"><span id="elf_view_store_grn_Disc" class="view_store_grn_Disc">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" class="<?php echo $view_store_grn->PSGST->footerCellClass() ?>"><span id="elf_view_store_grn_PSGST" class="view_store_grn_PSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" class="<?php echo $view_store_grn->PCGST->footerCellClass() ?>"><span id="elf_view_store_grn_PCGST" class="view_store_grn_PCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
		<td data-name="PTax" class="<?php echo $view_store_grn->PTax->footerCellClass() ?>"><span id="elf_view_store_grn_PTax" class="view_store_grn_PTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_store_grn->PTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" class="<?php echo $view_store_grn->ItemValue->footerCellClass() ?>"><span id="elf_view_store_grn_ItemValue" class="view_store_grn_ItemValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_store_grn->ItemValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax" class="<?php echo $view_store_grn->SalTax->footerCellClass() ?>"><span id="elf_view_store_grn_SalTax" class="view_store_grn_SalTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_store_grn->SalTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" class="<?php echo $view_store_grn->BatchNo->footerCellClass() ?>"><span id="elf_view_store_grn_BatchNo" class="view_store_grn_BatchNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" class="<?php echo $view_store_grn->ExpDate->footerCellClass() ?>"><span id="elf_view_store_grn_ExpDate" class="view_store_grn_ExpDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_store_grn->Quantity->footerCellClass() ?>"><span id="elf_view_store_grn_Quantity" class="view_store_grn_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" class="<?php echo $view_store_grn->SalRate->footerCellClass() ?>"><span id="elf_view_store_grn_SalRate" class="view_store_grn_SalRate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" class="<?php echo $view_store_grn->SSGST->footerCellClass() ?>"><span id="elf_view_store_grn_SSGST" class="view_store_grn_SSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" class="<?php echo $view_store_grn->SCGST->footerCellClass() ?>"><span id="elf_view_store_grn_SCGST" class="view_store_grn_SCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_store_grn->BRCODE->footerCellClass() ?>"><span id="elf_view_store_grn_BRCODE" class="view_store_grn_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
		<td data-name="HSN" class="<?php echo $view_store_grn->HSN->footerCellClass() ?>"><span id="elf_view_store_grn_HSN" class="view_store_grn_HSN">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_store_grn->HospID->footerCellClass() ?>"><span id="elf_view_store_grn_HospID" class="view_store_grn_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby" class="<?php echo $view_store_grn->grncreatedby->footerCellClass() ?>"><span id="elf_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime" class="<?php echo $view_store_grn->grncreatedDateTime->footerCellClass() ?>"><span id="elf_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby" class="<?php echo $view_store_grn->grnModifiedby->footerCellClass() ?>"><span id="elf_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime" class="<?php echo $view_store_grn->grnModifiedDateTime->footerCellClass() ?>"><span id="elf_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" class="<?php echo $view_store_grn->BillDate->footerCellClass() ?>"><span id="elf_view_store_grn_BillDate" class="view_store_grn_BillDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock" class="<?php echo $view_store_grn->CurStock->footerCellClass() ?>"><span id="elf_view_store_grn_CurStock" class="view_store_grn_CurStock">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy" class="<?php echo $view_store_grn->FreeQtyyy->footerCellClass() ?>"><span id="elf_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
		<td data-name="grndate" class="<?php echo $view_store_grn->grndate->footerCellClass() ?>"><span id="elf_view_store_grn_grndate" class="view_store_grn_grndate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime" class="<?php echo $view_store_grn->grndatetime->footerCellClass() ?>"><span id="elf_view_store_grn_grndatetime" class="view_store_grn_grndatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->strid->Visible) { // strid ?>
		<td data-name="strid" class="<?php echo $view_store_grn->strid->footerCellClass() ?>"><span id="elf_view_store_grn_strid" class="view_store_grn_strid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
		<td data-name="GRNPer" class="<?php echo $view_store_grn->GRNPer->footerCellClass() ?>"><span id="elf_view_store_grn_GRNPer" class="view_store_grn_GRNPer">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_store_grn_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php if ($view_store_grn->CurrentMode == "add" || $view_store_grn->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_store_grn_grid->FormKeyCountName ?>" id="<?php echo $view_store_grn_grid->FormKeyCountName ?>" value="<?php echo $view_store_grn_grid->KeyCount ?>">
<?php echo $view_store_grn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_store_grn->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_store_grn_grid->FormKeyCountName ?>" id="<?php echo $view_store_grn_grid->FormKeyCountName ?>" value="<?php echo $view_store_grn_grid->KeyCount ?>">
<?php echo $view_store_grn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_store_grn->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_store_grngrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_store_grn_grid->Recordset)
	$view_store_grn_grid->Recordset->Close();
?>
</div>
<?php if ($view_store_grn_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_store_grn_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_store_grn_grid->TotalRecs == 0 && !$view_store_grn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_store_grn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_store_grn_grid->terminate();
?>
<?php if (!$view_store_grn->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_store_grn", "95%", "");
</script>
<?php } ?>
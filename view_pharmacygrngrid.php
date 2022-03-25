<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_pharmacygrn_grid))
	$view_pharmacygrn_grid = new view_pharmacygrn_grid();

// Run the page
$view_pharmacygrn_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacygrn_grid->Page_Render();
?>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<script>

// Form object
var fview_pharmacygrngrid = new ew.Form("fview_pharmacygrngrid", "grid");
fview_pharmacygrngrid.formKeyCountName = '<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>';

// Validate form
fview_pharmacygrngrid.validate = function() {
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
		<?php if ($view_pharmacygrn_grid->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PRC->caption(), $view_pharmacygrn->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PrName->caption(), $view_pharmacygrn->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->GrnQuantity->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->GrnQuantity->caption(), $view_pharmacygrn->GrnQuantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnQuantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->GrnQuantity->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->Quantity->caption(), $view_pharmacygrn->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->Quantity->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->FreeQty->caption(), $view_pharmacygrn->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->FreeQty->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->FreeQtyyy->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->FreeQtyyy->caption(), $view_pharmacygrn->FreeQtyyy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->FreeQtyyy->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->BatchNo->caption(), $view_pharmacygrn->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->ExpDate->caption(), $view_pharmacygrn->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->ExpDate->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->HSN->Required) { ?>
			elm = this.getElements("x" + infix + "_HSN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->HSN->caption(), $view_pharmacygrn->HSN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->MFRCODE->caption(), $view_pharmacygrn->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PUnit->caption(), $view_pharmacygrn->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->PUnit->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SUnit->caption(), $view_pharmacygrn->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->SUnit->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->MRP->caption(), $view_pharmacygrn->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->MRP->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PurValue->caption(), $view_pharmacygrn->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->PurValue->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->Disc->Required) { ?>
			elm = this.getElements("x" + infix + "_Disc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->Disc->caption(), $view_pharmacygrn->Disc->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PSGST->caption(), $view_pharmacygrn->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PCGST->caption(), $view_pharmacygrn->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->PTax->Required) { ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PTax->caption(), $view_pharmacygrn->PTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->PTax->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->ItemValue->caption(), $view_pharmacygrn->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->ItemValue->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->SalTax->Required) { ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SalTax->caption(), $view_pharmacygrn->SalTax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalTax");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->SalTax->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->PurRate->caption(), $view_pharmacygrn->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->PurRate->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->SalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SalRate->caption(), $view_pharmacygrn->SalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SalRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->SalRate->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SSGST->caption(), $view_pharmacygrn->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->SCGST->caption(), $view_pharmacygrn->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->BRCODE->caption(), $view_pharmacygrn->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->HospID->caption(), $view_pharmacygrn->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grncreatedby->caption(), $view_pharmacygrn->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grncreatedDateTime->caption(), $view_pharmacygrn->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grnModifiedby->caption(), $view_pharmacygrn->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grnModifiedDateTime->caption(), $view_pharmacygrn->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->BillDate->caption(), $view_pharmacygrn->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn->BillDate->errorMessage()) ?>");
		<?php if ($view_pharmacygrn_grid->grndate->Required) { ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grndate->caption(), $view_pharmacygrn->grndate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacygrn_grid->grndatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn->grndatetime->caption(), $view_pharmacygrn->grndatetime->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_pharmacygrngrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "GrnQuantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "FreeQty", false)) return false;
	if (ew.valueChanged(fobj, infix, "FreeQtyyy", false)) return false;
	if (ew.valueChanged(fobj, infix, "BatchNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "ExpDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "HSN", false)) return false;
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
	if (ew.valueChanged(fobj, infix, "PurRate", false)) return false;
	if (ew.valueChanged(fobj, infix, "SalRate", false)) return false;
	if (ew.valueChanged(fobj, infix, "SSGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "SCGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillDate", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacygrngrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacygrngrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacygrngrid.lists["x_PrName"] = <?php echo $view_pharmacygrn_grid->PrName->Lookup->toClientList() ?>;
fview_pharmacygrngrid.lists["x_PrName"].options = <?php echo JsonEncode($view_pharmacygrn_grid->PrName->lookupOptions()) ?>;
fview_pharmacygrngrid.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_pharmacygrn_grid->renderOtherOptions();
?>
<?php $view_pharmacygrn_grid->showPageHeader(); ?>
<?php
$view_pharmacygrn_grid->showMessage();
?>
<?php if ($view_pharmacygrn_grid->TotalRecs > 0 || $view_pharmacygrn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacygrn_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacygrn">
<?php if ($view_pharmacygrn_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacygrn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacygrngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacygrn" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacygrngrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacygrn_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacygrn_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacygrn_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacygrn->PRC->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacygrn->PRC->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacygrn->PrName->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacygrn->PrName->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->GrnQuantity) == "") { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_pharmacygrn->GrnQuantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->GrnQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_pharmacygrn->GrnQuantity->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->GrnQuantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->GrnQuantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacygrn->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacygrn->Quantity->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacygrn->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacygrn->FreeQty->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->FreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->FreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->FreeQtyyy) == "") { ?>
		<th data-name="FreeQtyyy" class="<?php echo $view_pharmacygrn->FreeQtyyy->headerCellClass() ?>"><div id="elh_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQtyyy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQtyyy" class="<?php echo $view_pharmacygrn->FreeQtyyy->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQtyyy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->FreeQtyyy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->FreeQtyyy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacygrn->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacygrn->BatchNo->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacygrn->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacygrn->ExpDate->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacygrn->HSN->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacygrn->HSN->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->HSN->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->HSN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->HSN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacygrn->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacygrn->MFRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacygrn->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacygrn->PUnit->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacygrn->SUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacygrn->SUnit->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacygrn->MRP->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacygrn->MRP->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacygrn->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacygrn->PurValue->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->Disc) == "") { ?>
		<th data-name="Disc" class="<?php echo $view_pharmacygrn->Disc->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->Disc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Disc" class="<?php echo $view_pharmacygrn->Disc->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->Disc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->Disc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->Disc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacygrn->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacygrn->PSGST->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacygrn->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacygrn->PCGST->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PTax) == "") { ?>
		<th data-name="PTax" class="<?php echo $view_pharmacygrn->PTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTax" class="<?php echo $view_pharmacygrn->PTax->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacygrn->ItemValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacygrn->ItemValue->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->ItemValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->ItemValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SalTax) == "") { ?>
		<th data-name="SalTax" class="<?php echo $view_pharmacygrn->SalTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalTax" class="<?php echo $view_pharmacygrn->SalTax->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SalTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SalTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacygrn->PurRate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacygrn->PurRate->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PurRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PurRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacygrn->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacygrn->SalRate->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SalRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SalRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacygrn->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacygrn->SSGST->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacygrn->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacygrn->SCGST->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacygrn->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacygrn->BRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacygrn->HospID->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacygrn->HospID->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacygrn->grncreatedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacygrn->grncreatedby->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grncreatedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grncreatedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn->grncreatedDateTime->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grncreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grncreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacygrn->grnModifiedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacygrn->grnModifiedby->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grnModifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grnModifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn->grnModifiedDateTime->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacygrn->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacygrn->BillDate->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grndate) == "") { ?>
		<th data-name="grndate" class="<?php echo $view_pharmacygrn->grndate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndate" class="<?php echo $view_pharmacygrn->grndate->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grndate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grndate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grndatetime) == "") { ?>
		<th data-name="grndatetime" class="<?php echo $view_pharmacygrn->grndatetime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndatetime" class="<?php echo $view_pharmacygrn->grndatetime->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grndatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grndatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacygrn_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_pharmacygrn_grid->StartRec = 1;
$view_pharmacygrn_grid->StopRec = $view_pharmacygrn_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_pharmacygrn_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacygrn_grid->FormKeyCountName) && ($view_pharmacygrn->isGridAdd() || $view_pharmacygrn->isGridEdit() || $view_pharmacygrn->isConfirm())) {
		$view_pharmacygrn_grid->KeyCount = $CurrentForm->getValue($view_pharmacygrn_grid->FormKeyCountName);
		$view_pharmacygrn_grid->StopRec = $view_pharmacygrn_grid->StartRec + $view_pharmacygrn_grid->KeyCount - 1;
	}
}
$view_pharmacygrn_grid->RecCnt = $view_pharmacygrn_grid->StartRec - 1;
if ($view_pharmacygrn_grid->Recordset && !$view_pharmacygrn_grid->Recordset->EOF) {
	$view_pharmacygrn_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacygrn_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacygrn_grid->StartRec > 1)
		$view_pharmacygrn_grid->Recordset->move($view_pharmacygrn_grid->StartRec - 1);
} elseif (!$view_pharmacygrn->AllowAddDeleteRow && $view_pharmacygrn_grid->StopRec == 0) {
	$view_pharmacygrn_grid->StopRec = $view_pharmacygrn->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacygrn->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacygrn->resetAttributes();
$view_pharmacygrn_grid->renderRow();
if ($view_pharmacygrn->isGridAdd())
	$view_pharmacygrn_grid->RowIndex = 0;
if ($view_pharmacygrn->isGridEdit())
	$view_pharmacygrn_grid->RowIndex = 0;
while ($view_pharmacygrn_grid->RecCnt < $view_pharmacygrn_grid->StopRec) {
	$view_pharmacygrn_grid->RecCnt++;
	if ($view_pharmacygrn_grid->RecCnt >= $view_pharmacygrn_grid->StartRec) {
		$view_pharmacygrn_grid->RowCnt++;
		if ($view_pharmacygrn->isGridAdd() || $view_pharmacygrn->isGridEdit() || $view_pharmacygrn->isConfirm()) {
			$view_pharmacygrn_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacygrn_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacygrn_grid->FormActionName) && $view_pharmacygrn_grid->EventCancelled)
				$view_pharmacygrn_grid->RowAction = strval($CurrentForm->getValue($view_pharmacygrn_grid->FormActionName));
			elseif ($view_pharmacygrn->isGridAdd())
				$view_pharmacygrn_grid->RowAction = "insert";
			else
				$view_pharmacygrn_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacygrn_grid->KeyCount = $view_pharmacygrn_grid->RowIndex;

		// Init row class and style
		$view_pharmacygrn->resetAttributes();
		$view_pharmacygrn->CssClass = "";
		if ($view_pharmacygrn->isGridAdd()) {
			if ($view_pharmacygrn->CurrentMode == "copy") {
				$view_pharmacygrn_grid->loadRowValues($view_pharmacygrn_grid->Recordset); // Load row values
				$view_pharmacygrn_grid->setRecordKey($view_pharmacygrn_grid->RowOldKey, $view_pharmacygrn_grid->Recordset); // Set old record key
			} else {
				$view_pharmacygrn_grid->loadRowValues(); // Load default values
				$view_pharmacygrn_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_pharmacygrn_grid->loadRowValues($view_pharmacygrn_grid->Recordset); // Load row values
		}
		$view_pharmacygrn->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacygrn->isGridAdd()) // Grid add
			$view_pharmacygrn->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacygrn->isGridAdd() && $view_pharmacygrn->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacygrn_grid->restoreCurrentRowFormValues($view_pharmacygrn_grid->RowIndex); // Restore form values
		if ($view_pharmacygrn->isGridEdit()) { // Grid edit
			if ($view_pharmacygrn->EventCancelled)
				$view_pharmacygrn_grid->restoreCurrentRowFormValues($view_pharmacygrn_grid->RowIndex); // Restore form values
			if ($view_pharmacygrn_grid->RowAction == "insert")
				$view_pharmacygrn->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacygrn->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacygrn->isGridEdit() && ($view_pharmacygrn->RowType == ROWTYPE_EDIT || $view_pharmacygrn->RowType == ROWTYPE_ADD) && $view_pharmacygrn->EventCancelled) // Update failed
			$view_pharmacygrn_grid->restoreCurrentRowFormValues($view_pharmacygrn_grid->RowIndex); // Restore form values
		if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacygrn_grid->EditRowCnt++;
		if ($view_pharmacygrn->isConfirm()) // Confirm row
			$view_pharmacygrn_grid->restoreCurrentRowFormValues($view_pharmacygrn_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacygrn->RowAttrs = array_merge($view_pharmacygrn->RowAttrs, array('data-rowindex'=>$view_pharmacygrn_grid->RowCnt, 'id'=>'r' . $view_pharmacygrn_grid->RowCnt . '_view_pharmacygrn', 'data-rowtype'=>$view_pharmacygrn->RowType));

		// Render row
		$view_pharmacygrn_grid->renderRow();

		// Render list options
		$view_pharmacygrn_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacygrn_grid->RowAction <> "delete" && $view_pharmacygrn_grid->RowAction <> "insertdelete" && !($view_pharmacygrn_grid->RowAction == "insert" && $view_pharmacygrn->isConfirm() && $view_pharmacygrn_grid->emptyRow())) {
?>
	<tr<?php echo $view_pharmacygrn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacygrn_grid->ListOptions->render("body", "left", $view_pharmacygrn_grid->RowCnt);
?>
	<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacygrn->PRC->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PRC" class="form-group view_pharmacygrn_PRC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PRC->EditValue ?>"<?php echo $view_pharmacygrn->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PRC" class="form-group view_pharmacygrn_PRC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PRC->EditValue ?>"<?php echo $view_pharmacygrn->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
<span<?php echo $view_pharmacygrn->PRC->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_id" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacygrn->id->CurrentValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_id" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacygrn->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT || $view_pharmacygrn->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_id" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacygrn->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacygrn->PrName->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PrName" class="form-group view_pharmacygrn_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacygrn->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacygrn->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacygrn_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($view_pharmacygrn->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacygrn->PrName->getPlaceHolder()) ?>"<?php echo $view_pharmacygrn->PrName->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pharmacy_storemast") && !$view_pharmacygrn->PrName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_pharmacygrn->PrName->caption() ?>" data-title="<?php echo $view_pharmacygrn->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName',url:'pharmacy_storemastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" data-value-separator="<?php echo $view_pharmacygrn->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacygrngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $view_pharmacygrn->PrName->Lookup->getParamTag("p_x" . $view_pharmacygrn_grid->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PrName" class="form-group view_pharmacygrn_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacygrn->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacygrn->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacygrn_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($view_pharmacygrn->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacygrn->PrName->getPlaceHolder()) ?>"<?php echo $view_pharmacygrn->PrName->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pharmacy_storemast") && !$view_pharmacygrn->PrName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_pharmacygrn->PrName->caption() ?>" data-title="<?php echo $view_pharmacygrn->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName',url:'pharmacy_storemastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" data-value-separator="<?php echo $view_pharmacygrn->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacygrngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $view_pharmacygrn->PrName->Lookup->getParamTag("p_x" . $view_pharmacygrn_grid->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
<span<?php echo $view_pharmacygrn->PrName->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity"<?php echo $view_pharmacygrn->GrnQuantity->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_GrnQuantity" class="form-group view_pharmacygrn_GrnQuantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->GrnQuantity->EditValue ?>"<?php echo $view_pharmacygrn->GrnQuantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_GrnQuantity" class="form-group view_pharmacygrn_GrnQuantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->GrnQuantity->EditValue ?>"<?php echo $view_pharmacygrn->GrnQuantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
<span<?php echo $view_pharmacygrn->GrnQuantity->viewAttributes() ?>>
<?php echo $view_pharmacygrn->GrnQuantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_pharmacygrn->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_Quantity" class="form-group view_pharmacygrn_Quantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Quantity->EditValue ?>"<?php echo $view_pharmacygrn->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_Quantity" class="form-group view_pharmacygrn_Quantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Quantity->EditValue ?>"<?php echo $view_pharmacygrn->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
<span<?php echo $view_pharmacygrn->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty"<?php echo $view_pharmacygrn->FreeQty->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_FreeQty" class="form-group view_pharmacygrn_FreeQty">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->FreeQty->EditValue ?>"<?php echo $view_pharmacygrn->FreeQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_FreeQty" class="form-group view_pharmacygrn_FreeQty">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->FreeQty->EditValue ?>"<?php echo $view_pharmacygrn->FreeQty->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
<span<?php echo $view_pharmacygrn->FreeQty->viewAttributes() ?>>
<?php echo $view_pharmacygrn->FreeQty->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy"<?php echo $view_pharmacygrn->FreeQtyyy->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_FreeQtyyy" class="form-group view_pharmacygrn_FreeQtyyy">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->FreeQtyyy->EditValue ?>"<?php echo $view_pharmacygrn->FreeQtyyy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_FreeQtyyy" class="form-group view_pharmacygrn_FreeQtyyy">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->FreeQtyyy->EditValue ?>"<?php echo $view_pharmacygrn->FreeQtyyy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy">
<span<?php echo $view_pharmacygrn->FreeQtyyy->viewAttributes() ?>>
<?php echo $view_pharmacygrn->FreeQtyyy->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_pharmacygrn->BatchNo->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_BatchNo" class="form-group view_pharmacygrn_BatchNo">
<input type="text" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->BatchNo->EditValue ?>"<?php echo $view_pharmacygrn->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_BatchNo" class="form-group view_pharmacygrn_BatchNo">
<input type="text" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->BatchNo->EditValue ?>"<?php echo $view_pharmacygrn->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
<span<?php echo $view_pharmacygrn->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BatchNo->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_pharmacygrn->ExpDate->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_ExpDate" class="form-group view_pharmacygrn_ExpDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ExpDate->EditValue ?>"<?php echo $view_pharmacygrn->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn->ExpDate->ReadOnly && !$view_pharmacygrn->ExpDate->Disabled && !isset($view_pharmacygrn->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_ExpDate" class="form-group view_pharmacygrn_ExpDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ExpDate->EditValue ?>"<?php echo $view_pharmacygrn->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn->ExpDate->ReadOnly && !$view_pharmacygrn->ExpDate->Disabled && !isset($view_pharmacygrn->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
<span<?php echo $view_pharmacygrn->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ExpDate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
		<td data-name="HSN"<?php echo $view_pharmacygrn->HSN->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_HSN" class="form-group view_pharmacygrn_HSN">
<input type="text" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->HSN->EditValue ?>"<?php echo $view_pharmacygrn->HSN->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn->HSN->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_HSN" class="form-group view_pharmacygrn_HSN">
<input type="text" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->HSN->EditValue ?>"<?php echo $view_pharmacygrn->HSN->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
<span<?php echo $view_pharmacygrn->HSN->viewAttributes() ?>>
<?php echo $view_pharmacygrn->HSN->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn->HSN->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn->HSN->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn->HSN->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn->HSN->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacygrn->MFRCODE->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_MFRCODE" class="form-group view_pharmacygrn_MFRCODE">
<input type="text" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->MFRCODE->EditValue ?>"<?php echo $view_pharmacygrn->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_MFRCODE" class="form-group view_pharmacygrn_MFRCODE">
<input type="text" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->MFRCODE->EditValue ?>"<?php echo $view_pharmacygrn->MFRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
<span<?php echo $view_pharmacygrn->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacygrn->MFRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $view_pharmacygrn->PUnit->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PUnit" class="form-group view_pharmacygrn_PUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PUnit->EditValue ?>"<?php echo $view_pharmacygrn->PUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PUnit" class="form-group view_pharmacygrn_PUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PUnit->EditValue ?>"<?php echo $view_pharmacygrn->PUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
<span<?php echo $view_pharmacygrn->PUnit->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PUnit->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn->PUnit->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn->PUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn->PUnit->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn->PUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $view_pharmacygrn->SUnit->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SUnit" class="form-group view_pharmacygrn_SUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SUnit->EditValue ?>"<?php echo $view_pharmacygrn->SUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SUnit" class="form-group view_pharmacygrn_SUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SUnit->EditValue ?>"<?php echo $view_pharmacygrn->SUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
<span<?php echo $view_pharmacygrn->SUnit->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SUnit->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn->SUnit->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn->SUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn->SUnit->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn->SUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $view_pharmacygrn->MRP->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_MRP" class="form-group view_pharmacygrn_MRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->MRP->EditValue ?>"<?php echo $view_pharmacygrn->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn->MRP->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_MRP" class="form-group view_pharmacygrn_MRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->MRP->EditValue ?>"<?php echo $view_pharmacygrn->MRP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
<span<?php echo $view_pharmacygrn->MRP->viewAttributes() ?>>
<?php echo $view_pharmacygrn->MRP->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn->MRP->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn->MRP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn->MRP->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn->MRP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $view_pharmacygrn->PurValue->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PurValue" class="form-group view_pharmacygrn_PurValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PurValue->EditValue ?>"<?php echo $view_pharmacygrn->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PurValue" class="form-group view_pharmacygrn_PurValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PurValue->EditValue ?>"<?php echo $view_pharmacygrn->PurValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
<span<?php echo $view_pharmacygrn->PurValue->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PurValue->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn->PurValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn->PurValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn->PurValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn->PurValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
		<td data-name="Disc"<?php echo $view_pharmacygrn->Disc->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_Disc" class="form-group view_pharmacygrn_Disc">
<input type="text" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Disc->EditValue ?>"<?php echo $view_pharmacygrn->Disc->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn->Disc->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_Disc" class="form-group view_pharmacygrn_Disc">
<input type="text" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Disc->EditValue ?>"<?php echo $view_pharmacygrn->Disc->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
<span<?php echo $view_pharmacygrn->Disc->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Disc->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn->Disc->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn->Disc->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn->Disc->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn->Disc->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $view_pharmacygrn->PSGST->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PSGST" class="form-group view_pharmacygrn_PSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PSGST->EditValue ?>"<?php echo $view_pharmacygrn->PSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PSGST" class="form-group view_pharmacygrn_PSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PSGST->EditValue ?>"<?php echo $view_pharmacygrn->PSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
<span<?php echo $view_pharmacygrn->PSGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PSGST->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn->PSGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn->PSGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn->PSGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn->PSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $view_pharmacygrn->PCGST->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PCGST" class="form-group view_pharmacygrn_PCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PCGST->EditValue ?>"<?php echo $view_pharmacygrn->PCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PCGST" class="form-group view_pharmacygrn_PCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PCGST->EditValue ?>"<?php echo $view_pharmacygrn->PCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
<span<?php echo $view_pharmacygrn->PCGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PCGST->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn->PCGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn->PCGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn->PCGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn->PCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
		<td data-name="PTax"<?php echo $view_pharmacygrn->PTax->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PTax" class="form-group view_pharmacygrn_PTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PTax->EditValue ?>"<?php echo $view_pharmacygrn->PTax->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn->PTax->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PTax" class="form-group view_pharmacygrn_PTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PTax->EditValue ?>"<?php echo $view_pharmacygrn->PTax->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
<span<?php echo $view_pharmacygrn->PTax->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PTax->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn->PTax->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn->PTax->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn->PTax->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn->PTax->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue"<?php echo $view_pharmacygrn->ItemValue->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_ItemValue" class="form-group view_pharmacygrn_ItemValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ItemValue->EditValue ?>"<?php echo $view_pharmacygrn->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_ItemValue" class="form-group view_pharmacygrn_ItemValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ItemValue->EditValue ?>"<?php echo $view_pharmacygrn->ItemValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
<span<?php echo $view_pharmacygrn->ItemValue->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ItemValue->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax"<?php echo $view_pharmacygrn->SalTax->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SalTax" class="form-group view_pharmacygrn_SalTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SalTax->EditValue ?>"<?php echo $view_pharmacygrn->SalTax->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn->SalTax->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SalTax" class="form-group view_pharmacygrn_SalTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SalTax->EditValue ?>"<?php echo $view_pharmacygrn->SalTax->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
<span<?php echo $view_pharmacygrn->SalTax->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SalTax->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn->SalTax->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn->SalTax->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn->SalTax->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn->SalTax->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate"<?php echo $view_pharmacygrn->PurRate->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PurRate" class="form-group view_pharmacygrn_PurRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PurRate->EditValue ?>"<?php echo $view_pharmacygrn->PurRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurRate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($view_pharmacygrn->PurRate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PurRate" class="form-group view_pharmacygrn_PurRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PurRate->EditValue ?>"<?php echo $view_pharmacygrn->PurRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate">
<span<?php echo $view_pharmacygrn->PurRate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PurRate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($view_pharmacygrn->PurRate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurRate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($view_pharmacygrn->PurRate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurRate" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($view_pharmacygrn->PurRate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurRate" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($view_pharmacygrn->PurRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate"<?php echo $view_pharmacygrn->SalRate->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SalRate" class="form-group view_pharmacygrn_SalRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SalRate->EditValue ?>"<?php echo $view_pharmacygrn->SalRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn->SalRate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SalRate" class="form-group view_pharmacygrn_SalRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SalRate->EditValue ?>"<?php echo $view_pharmacygrn->SalRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
<span<?php echo $view_pharmacygrn->SalRate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SalRate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn->SalRate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn->SalRate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn->SalRate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn->SalRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $view_pharmacygrn->SSGST->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SSGST" class="form-group view_pharmacygrn_SSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SSGST->EditValue ?>"<?php echo $view_pharmacygrn->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SSGST" class="form-group view_pharmacygrn_SSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SSGST->EditValue ?>"<?php echo $view_pharmacygrn->SSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
<span<?php echo $view_pharmacygrn->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SSGST->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn->SSGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn->SSGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn->SSGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn->SSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $view_pharmacygrn->SCGST->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SCGST" class="form-group view_pharmacygrn_SCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SCGST->EditValue ?>"<?php echo $view_pharmacygrn->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SCGST" class="form-group view_pharmacygrn_SCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SCGST->EditValue ?>"<?php echo $view_pharmacygrn->SCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
<span<?php echo $view_pharmacygrn->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SCGST->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn->SCGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn->SCGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn->SCGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn->SCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacygrn->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
<span<?php echo $view_pharmacygrn->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacygrn->HospID->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
<span<?php echo $view_pharmacygrn->HospID->viewAttributes() ?>>
<?php echo $view_pharmacygrn->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby"<?php echo $view_pharmacygrn->grncreatedby->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
<span<?php echo $view_pharmacygrn->grncreatedby->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grncreatedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime"<?php echo $view_pharmacygrn->grncreatedDateTime->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
<span<?php echo $view_pharmacygrn->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grncreatedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby"<?php echo $view_pharmacygrn->grnModifiedby->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
<span<?php echo $view_pharmacygrn->grnModifiedby->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grnModifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime"<?php echo $view_pharmacygrn->grnModifiedDateTime->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
<span<?php echo $view_pharmacygrn->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grnModifiedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $view_pharmacygrn->BillDate->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_BillDate" class="form-group view_pharmacygrn_BillDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacygrn->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->BillDate->EditValue ?>"<?php echo $view_pharmacygrn->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn->BillDate->ReadOnly && !$view_pharmacygrn->BillDate->Disabled && !isset($view_pharmacygrn->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_BillDate" class="form-group view_pharmacygrn_BillDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacygrn->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->BillDate->EditValue ?>"<?php echo $view_pharmacygrn->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn->BillDate->ReadOnly && !$view_pharmacygrn->BillDate->Disabled && !isset($view_pharmacygrn->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
<span<?php echo $view_pharmacygrn->BillDate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BillDate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn->BillDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
		<td data-name="grndate"<?php echo $view_pharmacygrn->grndate->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_pharmacygrn->grndate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate">
<span<?php echo $view_pharmacygrn->grndate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grndate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_pharmacygrn->grndate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_pharmacygrn->grndate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndate" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_pharmacygrn->grndate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndate" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_pharmacygrn->grndate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime"<?php echo $view_pharmacygrn->grndatetime->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndatetime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_pharmacygrn->grndatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCnt ?>_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime">
<span<?php echo $view_pharmacygrn->grndatetime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grndatetime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndatetime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_pharmacygrn->grndatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndatetime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_pharmacygrn->grndatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndatetime" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_pharmacygrn->grndatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndatetime" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_pharmacygrn->grndatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacygrn_grid->ListOptions->render("body", "right", $view_pharmacygrn_grid->RowCnt);
?>
	</tr>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD || $view_pharmacygrn->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_pharmacygrngrid.updateLists(<?php echo $view_pharmacygrn_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacygrn->isGridAdd() || $view_pharmacygrn->CurrentMode == "copy")
		if (!$view_pharmacygrn_grid->Recordset->EOF)
			$view_pharmacygrn_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacygrn->CurrentMode == "add" || $view_pharmacygrn->CurrentMode == "copy" || $view_pharmacygrn->CurrentMode == "edit") {
		$view_pharmacygrn_grid->RowIndex = '$rowindex$';
		$view_pharmacygrn_grid->loadRowValues();

		// Set row properties
		$view_pharmacygrn->resetAttributes();
		$view_pharmacygrn->RowAttrs = array_merge($view_pharmacygrn->RowAttrs, array('data-rowindex'=>$view_pharmacygrn_grid->RowIndex, 'id'=>'r0_view_pharmacygrn', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_pharmacygrn->RowAttrs["class"], "ew-template");
		$view_pharmacygrn->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacygrn_grid->renderRow();

		// Render list options
		$view_pharmacygrn_grid->renderListOptions();
		$view_pharmacygrn_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_pharmacygrn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacygrn_grid->ListOptions->render("body", "left", $view_pharmacygrn_grid->RowIndex);
?>
	<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PRC" class="form-group view_pharmacygrn_PRC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PRC->EditValue ?>"<?php echo $view_pharmacygrn->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PRC" class="form-group view_pharmacygrn_PRC">
<span<?php echo $view_pharmacygrn->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->PRC->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PrName" class="form-group view_pharmacygrn_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacygrn->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacygrn->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacygrn_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($view_pharmacygrn->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacygrn->PrName->getPlaceHolder()) ?>"<?php echo $view_pharmacygrn->PrName->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pharmacy_storemast") && !$view_pharmacygrn->PrName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_pharmacygrn->PrName->caption() ?>" data-title="<?php echo $view_pharmacygrn->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName',url:'pharmacy_storemastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" data-value-separator="<?php echo $view_pharmacygrn->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacygrngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $view_pharmacygrn->PrName->Lookup->getParamTag("p_x" . $view_pharmacygrn_grid->RowIndex . "_PrName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PrName" class="form-group view_pharmacygrn_PrName">
<span<?php echo $view_pharmacygrn->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->PrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_GrnQuantity" class="form-group view_pharmacygrn_GrnQuantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->GrnQuantity->EditValue ?>"<?php echo $view_pharmacygrn->GrnQuantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_GrnQuantity" class="form-group view_pharmacygrn_GrnQuantity">
<span<?php echo $view_pharmacygrn->GrnQuantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->GrnQuantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn->GrnQuantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_Quantity" class="form-group view_pharmacygrn_Quantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Quantity->EditValue ?>"<?php echo $view_pharmacygrn->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_Quantity" class="form-group view_pharmacygrn_Quantity">
<span<?php echo $view_pharmacygrn->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->Quantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_FreeQty" class="form-group view_pharmacygrn_FreeQty">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->FreeQty->EditValue ?>"<?php echo $view_pharmacygrn->FreeQty->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_FreeQty" class="form-group view_pharmacygrn_FreeQty">
<span<?php echo $view_pharmacygrn->FreeQty->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->FreeQty->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_FreeQtyyy" class="form-group view_pharmacygrn_FreeQtyyy">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->FreeQtyyy->EditValue ?>"<?php echo $view_pharmacygrn->FreeQtyyy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_FreeQtyyy" class="form-group view_pharmacygrn_FreeQtyyy">
<span<?php echo $view_pharmacygrn->FreeQtyyy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->FreeQtyyy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQtyyy" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($view_pharmacygrn->FreeQtyyy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_BatchNo" class="form-group view_pharmacygrn_BatchNo">
<input type="text" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->BatchNo->EditValue ?>"<?php echo $view_pharmacygrn->BatchNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_BatchNo" class="form-group view_pharmacygrn_BatchNo">
<span<?php echo $view_pharmacygrn->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->BatchNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_ExpDate" class="form-group view_pharmacygrn_ExpDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ExpDate->EditValue ?>"<?php echo $view_pharmacygrn->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn->ExpDate->ReadOnly && !$view_pharmacygrn->ExpDate->Disabled && !isset($view_pharmacygrn->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_ExpDate" class="form-group view_pharmacygrn_ExpDate">
<span<?php echo $view_pharmacygrn->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->ExpDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
		<td data-name="HSN">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_HSN" class="form-group view_pharmacygrn_HSN">
<input type="text" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->HSN->EditValue ?>"<?php echo $view_pharmacygrn->HSN->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_HSN" class="form-group view_pharmacygrn_HSN">
<span<?php echo $view_pharmacygrn->HSN->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->HSN->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn->HSN->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn->HSN->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_MFRCODE" class="form-group view_pharmacygrn_MFRCODE">
<input type="text" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->MFRCODE->EditValue ?>"<?php echo $view_pharmacygrn->MFRCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_MFRCODE" class="form-group view_pharmacygrn_MFRCODE">
<span<?php echo $view_pharmacygrn->MFRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->MFRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PUnit" class="form-group view_pharmacygrn_PUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PUnit->EditValue ?>"<?php echo $view_pharmacygrn->PUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PUnit" class="form-group view_pharmacygrn_PUnit">
<span<?php echo $view_pharmacygrn->PUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->PUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn->PUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn->PUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SUnit" class="form-group view_pharmacygrn_SUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SUnit->EditValue ?>"<?php echo $view_pharmacygrn->SUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SUnit" class="form-group view_pharmacygrn_SUnit">
<span<?php echo $view_pharmacygrn->SUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->SUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn->SUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn->SUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
		<td data-name="MRP">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_MRP" class="form-group view_pharmacygrn_MRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->MRP->EditValue ?>"<?php echo $view_pharmacygrn->MRP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_MRP" class="form-group view_pharmacygrn_MRP">
<span<?php echo $view_pharmacygrn->MRP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->MRP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn->MRP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn->MRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PurValue" class="form-group view_pharmacygrn_PurValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PurValue->EditValue ?>"<?php echo $view_pharmacygrn->PurValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PurValue" class="form-group view_pharmacygrn_PurValue">
<span<?php echo $view_pharmacygrn->PurValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->PurValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn->PurValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn->PurValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
		<td data-name="Disc">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_Disc" class="form-group view_pharmacygrn_Disc">
<input type="text" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->Disc->EditValue ?>"<?php echo $view_pharmacygrn->Disc->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_Disc" class="form-group view_pharmacygrn_Disc">
<span<?php echo $view_pharmacygrn->Disc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->Disc->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn->Disc->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn->Disc->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PSGST" class="form-group view_pharmacygrn_PSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PSGST->EditValue ?>"<?php echo $view_pharmacygrn->PSGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PSGST" class="form-group view_pharmacygrn_PSGST">
<span<?php echo $view_pharmacygrn->PSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->PSGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn->PSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn->PSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PCGST" class="form-group view_pharmacygrn_PCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PCGST->EditValue ?>"<?php echo $view_pharmacygrn->PCGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PCGST" class="form-group view_pharmacygrn_PCGST">
<span<?php echo $view_pharmacygrn->PCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->PCGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn->PCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn->PCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
		<td data-name="PTax">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PTax" class="form-group view_pharmacygrn_PTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PTax->EditValue ?>"<?php echo $view_pharmacygrn->PTax->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PTax" class="form-group view_pharmacygrn_PTax">
<span<?php echo $view_pharmacygrn->PTax->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->PTax->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn->PTax->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn->PTax->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_ItemValue" class="form-group view_pharmacygrn_ItemValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->ItemValue->EditValue ?>"<?php echo $view_pharmacygrn->ItemValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_ItemValue" class="form-group view_pharmacygrn_ItemValue">
<span<?php echo $view_pharmacygrn->ItemValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->ItemValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn->ItemValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SalTax" class="form-group view_pharmacygrn_SalTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SalTax->EditValue ?>"<?php echo $view_pharmacygrn->SalTax->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SalTax" class="form-group view_pharmacygrn_SalTax">
<span<?php echo $view_pharmacygrn->SalTax->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->SalTax->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn->SalTax->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn->SalTax->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PurRate" class="form-group view_pharmacygrn_PurRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->PurRate->EditValue ?>"<?php echo $view_pharmacygrn->PurRate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PurRate" class="form-group view_pharmacygrn_PurRate">
<span<?php echo $view_pharmacygrn->PurRate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->PurRate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($view_pharmacygrn->PurRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurRate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($view_pharmacygrn->PurRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SalRate" class="form-group view_pharmacygrn_SalRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SalRate->EditValue ?>"<?php echo $view_pharmacygrn->SalRate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SalRate" class="form-group view_pharmacygrn_SalRate">
<span<?php echo $view_pharmacygrn->SalRate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->SalRate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn->SalRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn->SalRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SSGST" class="form-group view_pharmacygrn_SSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SSGST->EditValue ?>"<?php echo $view_pharmacygrn->SSGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SSGST" class="form-group view_pharmacygrn_SSGST">
<span<?php echo $view_pharmacygrn->SSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->SSGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn->SSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn->SSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SCGST" class="form-group view_pharmacygrn_SCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->SCGST->EditValue ?>"<?php echo $view_pharmacygrn->SCGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SCGST" class="form-group view_pharmacygrn_SCGST">
<span<?php echo $view_pharmacygrn->SCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->SCGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn->SCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn->SCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_BRCODE" class="form-group view_pharmacygrn_BRCODE">
<span<?php echo $view_pharmacygrn->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->BRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_HospID" class="form-group view_pharmacygrn_HospID">
<span<?php echo $view_pharmacygrn->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grncreatedby" class="form-group view_pharmacygrn_grncreatedby">
<span<?php echo $view_pharmacygrn->grncreatedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->grncreatedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grncreatedDateTime" class="form-group view_pharmacygrn_grncreatedDateTime">
<span<?php echo $view_pharmacygrn->grncreatedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->grncreatedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grncreatedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grnModifiedby" class="form-group view_pharmacygrn_grnModifiedby">
<span<?php echo $view_pharmacygrn->grnModifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->grnModifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grnModifiedDateTime" class="form-group view_pharmacygrn_grnModifiedDateTime">
<span<?php echo $view_pharmacygrn->grnModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->grnModifiedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn->grnModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_BillDate" class="form-group view_pharmacygrn_BillDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacygrn->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn->BillDate->EditValue ?>"<?php echo $view_pharmacygrn->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn->BillDate->ReadOnly && !$view_pharmacygrn->BillDate->Disabled && !isset($view_pharmacygrn->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_BillDate" class="form-group view_pharmacygrn_BillDate">
<span<?php echo $view_pharmacygrn->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->BillDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
		<td data-name="grndate">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grndate" class="form-group view_pharmacygrn_grndate">
<span<?php echo $view_pharmacygrn->grndate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->grndate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_pharmacygrn->grndate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($view_pharmacygrn->grndate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grndatetime" class="form-group view_pharmacygrn_grndatetime">
<span<?php echo $view_pharmacygrn->grndatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacygrn->grndatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndatetime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_pharmacygrn->grndatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grndatetime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($view_pharmacygrn->grndatetime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacygrn_grid->ListOptions->render("body", "right", $view_pharmacygrn_grid->RowIndex);
?>
<script>
fview_pharmacygrngrid.updateLists(<?php echo $view_pharmacygrn_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
<?php

// Render aggregate row
$view_pharmacygrn->RowType = ROWTYPE_AGGREGATE;
$view_pharmacygrn->resetAttributes();
$view_pharmacygrn_grid->renderRow();
?>
<?php if ($view_pharmacygrn_grid->TotalRecs > 0 && $view_pharmacygrn->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_pharmacygrn_grid->renderListOptions();

// Render list options (footer, left)
$view_pharmacygrn_grid->ListOptions->render("footer", "left");
?>
	<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_pharmacygrn->PRC->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
		<td data-name="PrName" class="<?php echo $view_pharmacygrn->PrName->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity" class="<?php echo $view_pharmacygrn->GrnQuantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_pharmacygrn->Quantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" class="<?php echo $view_pharmacygrn->FreeQty->footerCellClass() ?>"><span id="elf_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy" class="<?php echo $view_pharmacygrn->FreeQtyyy->footerCellClass() ?>"><span id="elf_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" class="<?php echo $view_pharmacygrn->BatchNo->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" class="<?php echo $view_pharmacygrn->ExpDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
		<td data-name="HSN" class="<?php echo $view_pharmacygrn->HSN->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_pharmacygrn->MFRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit" class="<?php echo $view_pharmacygrn->PUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit" class="<?php echo $view_pharmacygrn->SUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
		<td data-name="MRP" class="<?php echo $view_pharmacygrn->MRP->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" class="<?php echo $view_pharmacygrn->PurValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
		<td data-name="Disc" class="<?php echo $view_pharmacygrn->Disc->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" class="<?php echo $view_pharmacygrn->PSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" class="<?php echo $view_pharmacygrn->PCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
		<td data-name="PTax" class="<?php echo $view_pharmacygrn->PTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn->PTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" class="<?php echo $view_pharmacygrn->ItemValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn->ItemValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax" class="<?php echo $view_pharmacygrn->SalTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn->SalTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate" class="<?php echo $view_pharmacygrn->PurRate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" class="<?php echo $view_pharmacygrn->SalRate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" class="<?php echo $view_pharmacygrn->SSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" class="<?php echo $view_pharmacygrn->SCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_pharmacygrn->BRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_pharmacygrn->HospID->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby" class="<?php echo $view_pharmacygrn->grncreatedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn->grncreatedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby" class="<?php echo $view_pharmacygrn->grnModifiedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn->grnModifiedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" class="<?php echo $view_pharmacygrn->BillDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
		<td data-name="grndate" class="<?php echo $view_pharmacygrn->grndate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime" class="<?php echo $view_pharmacygrn->grndatetime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacygrn_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php if ($view_pharmacygrn->CurrentMode == "add" || $view_pharmacygrn->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacygrn_grid->KeyCount ?>">
<?php echo $view_pharmacygrn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacygrn->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacygrn_grid->KeyCount ?>">
<?php echo $view_pharmacygrn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacygrn->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_pharmacygrngrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_pharmacygrn_grid->Recordset)
	$view_pharmacygrn_grid->Recordset->Close();
?>
</div>
<?php if ($view_pharmacygrn_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacygrn_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacygrn_grid->TotalRecs == 0 && !$view_pharmacygrn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacygrn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacygrn_grid->terminate();
?>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacygrn", "95%", "");
</script>
<?php } ?>
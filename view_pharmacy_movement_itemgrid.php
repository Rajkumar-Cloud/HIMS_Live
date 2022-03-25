<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_pharmacy_movement_item_grid))
	$view_pharmacy_movement_item_grid = new view_pharmacy_movement_item_grid();

// Run the page
$view_pharmacy_movement_item_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_movement_item_grid->Page_Render();
?>
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<script>

// Form object
var fview_pharmacy_movement_itemgrid = new ew.Form("fview_pharmacy_movement_itemgrid", "grid");
fview_pharmacy_movement_itemgrid.formKeyCountName = '<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>';

// Validate form
fview_pharmacy_movement_itemgrid.validate = function() {
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
		<?php if ($view_pharmacy_movement_item_grid->ProductFrom->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductFrom");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->ProductFrom->caption(), $view_pharmacy_movement_item->ProductFrom->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->Quantity->caption(), $view_pharmacy_movement_item->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->FreeQty->caption(), $view_pharmacy_movement_item->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->IQ->caption(), $view_pharmacy_movement_item->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->MRQ->caption(), $view_pharmacy_movement_item->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->BRCODE->caption(), $view_pharmacy_movement_item->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->OPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_OPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->OPNO->caption(), $view_pharmacy_movement_item->OPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->IPNO->Required) { ?>
			elm = this.getElements("x" + infix + "_IPNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->IPNO->caption(), $view_pharmacy_movement_item->IPNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->PatientBILLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientBILLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->PatientBILLNO->caption(), $view_pharmacy_movement_item->PatientBILLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->BILLDT->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->BILLDT->caption(), $view_pharmacy_movement_item->BILLDT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->GRNNO->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->GRNNO->caption(), $view_pharmacy_movement_item->GRNNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->DT->caption(), $view_pharmacy_movement_item->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->Customername->Required) { ?>
			elm = this.getElements("x" + infix + "_Customername");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->Customername->caption(), $view_pharmacy_movement_item->Customername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->createdby->caption(), $view_pharmacy_movement_item->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->createddatetime->caption(), $view_pharmacy_movement_item->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item->createddatetime->errorMessage()) ?>");
		<?php if ($view_pharmacy_movement_item_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->modifiedby->caption(), $view_pharmacy_movement_item->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->modifieddatetime->caption(), $view_pharmacy_movement_item->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item->modifieddatetime->errorMessage()) ?>");
		<?php if ($view_pharmacy_movement_item_grid->BILLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->BILLNO->caption(), $view_pharmacy_movement_item->BILLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->prc->Required) { ?>
			elm = this.getElements("x" + infix + "_prc");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->prc->caption(), $view_pharmacy_movement_item->prc->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->PrName->caption(), $view_pharmacy_movement_item->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->BatchNo->caption(), $view_pharmacy_movement_item->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->ExpDate->caption(), $view_pharmacy_movement_item->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item->ExpDate->errorMessage()) ?>");
		<?php if ($view_pharmacy_movement_item_grid->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->MFRCODE->caption(), $view_pharmacy_movement_item->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->hsn->Required) { ?>
			elm = this.getElements("x" + infix + "_hsn");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->hsn->caption(), $view_pharmacy_movement_item->hsn->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_movement_item_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item->HospID->caption(), $view_pharmacy_movement_item->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_pharmacy_movement_itemgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "ProductFrom", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "FreeQty", false)) return false;
	if (ew.valueChanged(fobj, infix, "IQ", false)) return false;
	if (ew.valueChanged(fobj, infix, "MRQ", false)) return false;
	if (ew.valueChanged(fobj, infix, "BRCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "OPNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "IPNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientBILLNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "BILLDT", false)) return false;
	if (ew.valueChanged(fobj, infix, "GRNNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "DT", false)) return false;
	if (ew.valueChanged(fobj, infix, "Customername", false)) return false;
	if (ew.valueChanged(fobj, infix, "createdby", false)) return false;
	if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "modifiedby", false)) return false;
	if (ew.valueChanged(fobj, infix, "modifieddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "BILLNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "prc", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "BatchNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "ExpDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "MFRCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "hsn", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_movement_itemgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_movement_itemgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_movement_itemgrid.lists["x_ProductFrom"] = <?php echo $view_pharmacy_movement_item_grid->ProductFrom->Lookup->toClientList() ?>;
fview_pharmacy_movement_itemgrid.lists["x_ProductFrom"].options = <?php echo JsonEncode($view_pharmacy_movement_item_grid->ProductFrom->lookupOptions()) ?>;
fview_pharmacy_movement_itemgrid.autoSuggests["x_ProductFrom"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacy_movement_itemgrid.lists["x_BRCODE"] = <?php echo $view_pharmacy_movement_item_grid->BRCODE->Lookup->toClientList() ?>;
fview_pharmacy_movement_itemgrid.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacy_movement_item_grid->BRCODE->lookupOptions()) ?>;
fview_pharmacy_movement_itemgrid.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_pharmacy_movement_item_grid->renderOtherOptions();
?>
<?php $view_pharmacy_movement_item_grid->showPageHeader(); ?>
<?php
$view_pharmacy_movement_item_grid->showMessage();
?>
<?php if ($view_pharmacy_movement_item_grid->TotalRecs > 0 || $view_pharmacy_movement_item->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_movement_item_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_movement_item">
<?php if ($view_pharmacy_movement_item_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacy_movement_item_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_movement_itemgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_movement_item" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_movement_itemgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_movement_item_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_movement_item_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacy_movement_item_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_movement_item->ProductFrom->Visible) { // ProductFrom ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->ProductFrom) == "") { ?>
		<th data-name="ProductFrom" class="<?php echo $view_pharmacy_movement_item->ProductFrom->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ProductFrom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductFrom" class="<?php echo $view_pharmacy_movement_item->ProductFrom->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ProductFrom->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->ProductFrom->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->ProductFrom->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_movement_item->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_movement_item->Quantity->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacy_movement_item->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacy_movement_item->FreeQty->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->FreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->FreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_movement_item->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_movement_item->IQ->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_movement_item->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_movement_item->MRQ->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->MRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->MRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_movement_item->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_movement_item->BRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->OPNO->Visible) { // OPNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->OPNO) == "") { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_movement_item->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->OPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_movement_item->OPNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->OPNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->OPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->OPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IPNO->Visible) { // IPNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->IPNO) == "") { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_movement_item->IPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_movement_item->IPNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IPNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->IPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->IPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PatientBILLNO->Visible) { // PatientBILLNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->PatientBILLNO) == "") { ?>
		<th data-name="PatientBILLNO" class="<?php echo $view_pharmacy_movement_item->PatientBILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PatientBILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientBILLNO" class="<?php echo $view_pharmacy_movement_item->PatientBILLNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PatientBILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->PatientBILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->PatientBILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLDT->Visible) { // BILLDT ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_movement_item->BILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_movement_item->BILLDT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->BILLDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->BILLDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->GRNNO->Visible) { // GRNNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $view_pharmacy_movement_item->GRNNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $view_pharmacy_movement_item->GRNNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->GRNNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->GRNNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->GRNNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->DT->Visible) { // DT ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_movement_item->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_movement_item->DT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Customername->Visible) { // Customername ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_movement_item->Customername->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_movement_item->Customername->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_movement_item->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_movement_item->createdby->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_movement_item->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_movement_item->createddatetime->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_movement_item->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_movement_item->modifiedby->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_movement_item->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_movement_item->modifieddatetime->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLNO->Visible) { // BILLNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_movement_item->BILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_movement_item->BILLNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->BILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->BILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_item->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_item->prc->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->prc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->prc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->prc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_item->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_item->PrName->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_item->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_item->BatchNo->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_item->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_item->ExpDate->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_item->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_item->MFRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->hsn->Visible) { // hsn ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->hsn) == "") { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_item->hsn->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->hsn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_item->hsn->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->hsn->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->hsn->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->hsn->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_item->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_item->HospID->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_movement_item_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_pharmacy_movement_item_grid->StartRec = 1;
$view_pharmacy_movement_item_grid->StopRec = $view_pharmacy_movement_item_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_pharmacy_movement_item_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_movement_item_grid->FormKeyCountName) && ($view_pharmacy_movement_item->isGridAdd() || $view_pharmacy_movement_item->isGridEdit() || $view_pharmacy_movement_item->isConfirm())) {
		$view_pharmacy_movement_item_grid->KeyCount = $CurrentForm->getValue($view_pharmacy_movement_item_grid->FormKeyCountName);
		$view_pharmacy_movement_item_grid->StopRec = $view_pharmacy_movement_item_grid->StartRec + $view_pharmacy_movement_item_grid->KeyCount - 1;
	}
}
$view_pharmacy_movement_item_grid->RecCnt = $view_pharmacy_movement_item_grid->StartRec - 1;
if ($view_pharmacy_movement_item_grid->Recordset && !$view_pharmacy_movement_item_grid->Recordset->EOF) {
	$view_pharmacy_movement_item_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_movement_item_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_movement_item_grid->StartRec > 1)
		$view_pharmacy_movement_item_grid->Recordset->move($view_pharmacy_movement_item_grid->StartRec - 1);
} elseif (!$view_pharmacy_movement_item->AllowAddDeleteRow && $view_pharmacy_movement_item_grid->StopRec == 0) {
	$view_pharmacy_movement_item_grid->StopRec = $view_pharmacy_movement_item->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_movement_item->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_movement_item->resetAttributes();
$view_pharmacy_movement_item_grid->renderRow();
if ($view_pharmacy_movement_item->isGridAdd())
	$view_pharmacy_movement_item_grid->RowIndex = 0;
if ($view_pharmacy_movement_item->isGridEdit())
	$view_pharmacy_movement_item_grid->RowIndex = 0;
while ($view_pharmacy_movement_item_grid->RecCnt < $view_pharmacy_movement_item_grid->StopRec) {
	$view_pharmacy_movement_item_grid->RecCnt++;
	if ($view_pharmacy_movement_item_grid->RecCnt >= $view_pharmacy_movement_item_grid->StartRec) {
		$view_pharmacy_movement_item_grid->RowCnt++;
		if ($view_pharmacy_movement_item->isGridAdd() || $view_pharmacy_movement_item->isGridEdit() || $view_pharmacy_movement_item->isConfirm()) {
			$view_pharmacy_movement_item_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_movement_item_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_movement_item_grid->FormActionName) && $view_pharmacy_movement_item_grid->EventCancelled)
				$view_pharmacy_movement_item_grid->RowAction = strval($CurrentForm->getValue($view_pharmacy_movement_item_grid->FormActionName));
			elseif ($view_pharmacy_movement_item->isGridAdd())
				$view_pharmacy_movement_item_grid->RowAction = "insert";
			else
				$view_pharmacy_movement_item_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_movement_item_grid->KeyCount = $view_pharmacy_movement_item_grid->RowIndex;

		// Init row class and style
		$view_pharmacy_movement_item->resetAttributes();
		$view_pharmacy_movement_item->CssClass = "";
		if ($view_pharmacy_movement_item->isGridAdd()) {
			if ($view_pharmacy_movement_item->CurrentMode == "copy") {
				$view_pharmacy_movement_item_grid->loadRowValues($view_pharmacy_movement_item_grid->Recordset); // Load row values
				$view_pharmacy_movement_item_grid->setRecordKey($view_pharmacy_movement_item_grid->RowOldKey, $view_pharmacy_movement_item_grid->Recordset); // Set old record key
			} else {
				$view_pharmacy_movement_item_grid->loadRowValues(); // Load default values
				$view_pharmacy_movement_item_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_pharmacy_movement_item_grid->loadRowValues($view_pharmacy_movement_item_grid->Recordset); // Load row values
		}
		$view_pharmacy_movement_item->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_movement_item->isGridAdd()) // Grid add
			$view_pharmacy_movement_item->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacy_movement_item->isGridAdd() && $view_pharmacy_movement_item->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacy_movement_item_grid->restoreCurrentRowFormValues($view_pharmacy_movement_item_grid->RowIndex); // Restore form values
		if ($view_pharmacy_movement_item->isGridEdit()) { // Grid edit
			if ($view_pharmacy_movement_item->EventCancelled)
				$view_pharmacy_movement_item_grid->restoreCurrentRowFormValues($view_pharmacy_movement_item_grid->RowIndex); // Restore form values
			if ($view_pharmacy_movement_item_grid->RowAction == "insert")
				$view_pharmacy_movement_item->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_movement_item->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_movement_item->isGridEdit() && ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT || $view_pharmacy_movement_item->RowType == ROWTYPE_ADD) && $view_pharmacy_movement_item->EventCancelled) // Update failed
			$view_pharmacy_movement_item_grid->restoreCurrentRowFormValues($view_pharmacy_movement_item_grid->RowIndex); // Restore form values
		if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_movement_item_grid->EditRowCnt++;
		if ($view_pharmacy_movement_item->isConfirm()) // Confirm row
			$view_pharmacy_movement_item_grid->restoreCurrentRowFormValues($view_pharmacy_movement_item_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacy_movement_item->RowAttrs = array_merge($view_pharmacy_movement_item->RowAttrs, array('data-rowindex'=>$view_pharmacy_movement_item_grid->RowCnt, 'id'=>'r' . $view_pharmacy_movement_item_grid->RowCnt . '_view_pharmacy_movement_item', 'data-rowtype'=>$view_pharmacy_movement_item->RowType));

		// Render row
		$view_pharmacy_movement_item_grid->renderRow();

		// Render list options
		$view_pharmacy_movement_item_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_movement_item_grid->RowAction <> "delete" && $view_pharmacy_movement_item_grid->RowAction <> "insertdelete" && !($view_pharmacy_movement_item_grid->RowAction == "insert" && $view_pharmacy_movement_item->isConfirm() && $view_pharmacy_movement_item_grid->emptyRow())) {
?>
	<tr<?php echo $view_pharmacy_movement_item->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_item_grid->ListOptions->render("body", "left", $view_pharmacy_movement_item_grid->RowCnt);
?>
	<?php if ($view_pharmacy_movement_item->ProductFrom->Visible) { // ProductFrom ?>
		<td data-name="ProductFrom"<?php echo $view_pharmacy_movement_item->ProductFrom->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_ProductFrom" class="form-group view_pharmacy_movement_item_ProductFrom">
<?php
$wrkonchange = "" . trim(@$view_pharmacy_movement_item->ProductFrom->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_movement_item->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_movement_item_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo RemoveHtml($view_pharmacy_movement_item->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-value-separator="<?php echo $view_pharmacy_movement_item->ProductFrom->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom","forceSelect":true});
</script>
<?php echo $view_pharmacy_movement_item->ProductFrom->Lookup->getParamTag("p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_ProductFrom") ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_ProductFrom" class="form-group view_pharmacy_movement_item_ProductFrom">
<?php
$wrkonchange = "" . trim(@$view_pharmacy_movement_item->ProductFrom->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_movement_item->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_movement_item_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo RemoveHtml($view_pharmacy_movement_item->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-value-separator="<?php echo $view_pharmacy_movement_item->ProductFrom->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom","forceSelect":true});
</script>
<?php echo $view_pharmacy_movement_item->ProductFrom->Lookup->getParamTag("p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_ProductFrom") ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom">
<span<?php echo $view_pharmacy_movement_item->ProductFrom->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->ProductFrom->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_pharmacy_movement_item->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_Quantity" class="form-group view_pharmacy_movement_item_Quantity">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->Quantity->EditValue ?>"<?php echo $view_pharmacy_movement_item->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_Quantity" class="form-group view_pharmacy_movement_item_Quantity">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->Quantity->EditValue ?>"<?php echo $view_pharmacy_movement_item->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity">
<span<?php echo $view_pharmacy_movement_item->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty"<?php echo $view_pharmacy_movement_item->FreeQty->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_FreeQty" class="form-group view_pharmacy_movement_item_FreeQty">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->FreeQty->EditValue ?>"<?php echo $view_pharmacy_movement_item->FreeQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_FreeQty" class="form-group view_pharmacy_movement_item_FreeQty">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->FreeQty->EditValue ?>"<?php echo $view_pharmacy_movement_item->FreeQty->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty">
<span<?php echo $view_pharmacy_movement_item->FreeQty->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->FreeQty->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $view_pharmacy_movement_item->IQ->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_IQ" class="form-group view_pharmacy_movement_item_IQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->IQ->EditValue ?>"<?php echo $view_pharmacy_movement_item->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_IQ" class="form-group view_pharmacy_movement_item_IQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->IQ->EditValue ?>"<?php echo $view_pharmacy_movement_item->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ">
<span<?php echo $view_pharmacy_movement_item->IQ->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->IQ->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ"<?php echo $view_pharmacy_movement_item->MRQ->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_MRQ" class="form-group view_pharmacy_movement_item_MRQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->MRQ->EditValue ?>"<?php echo $view_pharmacy_movement_item->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_MRQ" class="form-group view_pharmacy_movement_item_MRQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->MRQ->EditValue ?>"<?php echo $view_pharmacy_movement_item->MRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ">
<span<?php echo $view_pharmacy_movement_item->MRQ->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->MRQ->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_movement_item->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BRCODE" class="form-group view_pharmacy_movement_item_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacy_movement_item->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_movement_item->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_movement_item_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_movement_item->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE","forceSelect":true});
</script>
<?php echo $view_pharmacy_movement_item->BRCODE->Lookup->getParamTag("p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BRCODE" class="form-group view_pharmacy_movement_item_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacy_movement_item->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_movement_item->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_movement_item_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_movement_item->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE","forceSelect":true});
</script>
<?php echo $view_pharmacy_movement_item->BRCODE->Lookup->getParamTag("p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_BRCODE") ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE">
<span<?php echo $view_pharmacy_movement_item->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO"<?php echo $view_pharmacy_movement_item->OPNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_OPNO" class="form-group view_pharmacy_movement_item_OPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->OPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->OPNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_OPNO" class="form-group view_pharmacy_movement_item_OPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->OPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->OPNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO">
<span<?php echo $view_pharmacy_movement_item->OPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->OPNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->IPNO->Visible) { // IPNO ?>
		<td data-name="IPNO"<?php echo $view_pharmacy_movement_item->IPNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_IPNO" class="form-group view_pharmacy_movement_item_IPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->IPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->IPNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_IPNO" class="form-group view_pharmacy_movement_item_IPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->IPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->IPNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO">
<span<?php echo $view_pharmacy_movement_item->IPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->IPNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->PatientBILLNO->Visible) { // PatientBILLNO ?>
		<td data-name="PatientBILLNO"<?php echo $view_pharmacy_movement_item->PatientBILLNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_PatientBILLNO" class="form-group view_pharmacy_movement_item_PatientBILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->PatientBILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->PatientBILLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_PatientBILLNO" class="form-group view_pharmacy_movement_item_PatientBILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->PatientBILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->PatientBILLNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO">
<span<?php echo $view_pharmacy_movement_item->PatientBILLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->PatientBILLNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT"<?php echo $view_pharmacy_movement_item->BILLDT->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BILLDT" class="form-group view_pharmacy_movement_item_BILLDT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BILLDT->EditValue ?>"<?php echo $view_pharmacy_movement_item->BILLDT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BILLDT" class="form-group view_pharmacy_movement_item_BILLDT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BILLDT->EditValue ?>"<?php echo $view_pharmacy_movement_item->BILLDT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT">
<span<?php echo $view_pharmacy_movement_item->BILLDT->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BILLDT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO"<?php echo $view_pharmacy_movement_item->GRNNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_GRNNO" class="form-group view_pharmacy_movement_item_GRNNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->GRNNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->GRNNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_GRNNO" class="form-group view_pharmacy_movement_item_GRNNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->GRNNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->GRNNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO">
<span<?php echo $view_pharmacy_movement_item->GRNNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->GRNNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $view_pharmacy_movement_item->DT->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_DT" class="form-group view_pharmacy_movement_item_DT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->DT->EditValue ?>"<?php echo $view_pharmacy_movement_item->DT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_DT" class="form-group view_pharmacy_movement_item_DT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->DT->EditValue ?>"<?php echo $view_pharmacy_movement_item->DT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT">
<span<?php echo $view_pharmacy_movement_item->DT->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->DT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $view_pharmacy_movement_item->Customername->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_Customername" class="form-group view_pharmacy_movement_item_Customername">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->Customername->EditValue ?>"<?php echo $view_pharmacy_movement_item->Customername->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_Customername" class="form-group view_pharmacy_movement_item_Customername">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->Customername->EditValue ?>"<?php echo $view_pharmacy_movement_item->Customername->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername">
<span<?php echo $view_pharmacy_movement_item->Customername->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->Customername->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_pharmacy_movement_item->createdby->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_createdby" class="form-group view_pharmacy_movement_item_createdby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->createdby->EditValue ?>"<?php echo $view_pharmacy_movement_item->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_createdby" class="form-group view_pharmacy_movement_item_createdby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->createdby->EditValue ?>"<?php echo $view_pharmacy_movement_item->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby">
<span<?php echo $view_pharmacy_movement_item->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_pharmacy_movement_item->createddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_createddatetime" class="form-group view_pharmacy_movement_item_createddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->createddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item->createddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->createddatetime->ReadOnly && !$view_pharmacy_movement_item->createddatetime->Disabled && !isset($view_pharmacy_movement_item->createddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_createddatetime" class="form-group view_pharmacy_movement_item_createddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->createddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item->createddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->createddatetime->ReadOnly && !$view_pharmacy_movement_item->createddatetime->Disabled && !isset($view_pharmacy_movement_item->createddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime">
<span<?php echo $view_pharmacy_movement_item->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_pharmacy_movement_item->modifiedby->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_modifiedby" class="form-group view_pharmacy_movement_item_modifiedby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->modifiedby->EditValue ?>"<?php echo $view_pharmacy_movement_item->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_modifiedby" class="form-group view_pharmacy_movement_item_modifiedby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->modifiedby->EditValue ?>"<?php echo $view_pharmacy_movement_item->modifiedby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby">
<span<?php echo $view_pharmacy_movement_item->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_movement_item->modifieddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_modifieddatetime" class="form-group view_pharmacy_movement_item_modifieddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->modifieddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item->modifieddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->modifieddatetime->ReadOnly && !$view_pharmacy_movement_item->modifieddatetime->Disabled && !isset($view_pharmacy_movement_item->modifieddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_modifieddatetime" class="form-group view_pharmacy_movement_item_modifieddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->modifieddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item->modifieddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->modifieddatetime->ReadOnly && !$view_pharmacy_movement_item->modifieddatetime->Disabled && !isset($view_pharmacy_movement_item->modifieddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime">
<span<?php echo $view_pharmacy_movement_item->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO"<?php echo $view_pharmacy_movement_item->BILLNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BILLNO" class="form-group view_pharmacy_movement_item_BILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->BILLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BILLNO" class="form-group view_pharmacy_movement_item_BILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->BILLNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO">
<span<?php echo $view_pharmacy_movement_item->BILLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BILLNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->prc->Visible) { // prc ?>
		<td data-name="prc"<?php echo $view_pharmacy_movement_item->prc->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_pharmacy_movement_item->prc->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item->prc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->prc->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item->prc->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_pharmacy_movement_item->prc->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item->prc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->prc->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item->prc->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item->prc->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->prc->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacy_movement_item->PrName->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_PrName" class="form-group view_pharmacy_movement_item_PrName">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_PrName" class="form-group view_pharmacy_movement_item_PrName">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item->PrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName">
<span<?php echo $view_pharmacy_movement_item->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_pharmacy_movement_item->BatchNo->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_pharmacy_movement_item->BatchNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BatchNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BatchNo->EditValue ?>"<?php echo $view_pharmacy_movement_item->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_pharmacy_movement_item->BatchNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BatchNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BatchNo->EditValue ?>"<?php echo $view_pharmacy_movement_item->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BatchNo->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_pharmacy_movement_item->ExpDate->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_ExpDate" class="form-group view_pharmacy_movement_item_ExpDate">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->ExpDate->ReadOnly && !$view_pharmacy_movement_item->ExpDate->Disabled && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_ExpDate" class="form-group view_pharmacy_movement_item_ExpDate">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->ExpDate->ReadOnly && !$view_pharmacy_movement_item->ExpDate->Disabled && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate">
<span<?php echo $view_pharmacy_movement_item->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->ExpDate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacy_movement_item->MFRCODE->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_MFRCODE" class="form-group view_pharmacy_movement_item_MFRCODE">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_movement_item->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_MFRCODE" class="form-group view_pharmacy_movement_item_MFRCODE">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_movement_item->MFRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE">
<span<?php echo $view_pharmacy_movement_item->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->MFRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->hsn->Visible) { // hsn ?>
		<td data-name="hsn"<?php echo $view_pharmacy_movement_item->hsn->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_hsn" class="form-group view_pharmacy_movement_item_hsn">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->hsn->EditValue ?>"<?php echo $view_pharmacy_movement_item->hsn->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_hsn" class="form-group view_pharmacy_movement_item_hsn">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->hsn->EditValue ?>"<?php echo $view_pharmacy_movement_item->hsn->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn">
<span<?php echo $view_pharmacy_movement_item->hsn->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->hsn->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_movement_item->HospID->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCnt ?>_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID">
<span<?php echo $view_pharmacy_movement_item->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_item_grid->ListOptions->render("body", "right", $view_pharmacy_movement_item_grid->RowCnt);
?>
	</tr>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD || $view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_pharmacy_movement_itemgrid.updateLists(<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_movement_item->isGridAdd() || $view_pharmacy_movement_item->CurrentMode == "copy")
		if (!$view_pharmacy_movement_item_grid->Recordset->EOF)
			$view_pharmacy_movement_item_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_movement_item->CurrentMode == "add" || $view_pharmacy_movement_item->CurrentMode == "copy" || $view_pharmacy_movement_item->CurrentMode == "edit") {
		$view_pharmacy_movement_item_grid->RowIndex = '$rowindex$';
		$view_pharmacy_movement_item_grid->loadRowValues();

		// Set row properties
		$view_pharmacy_movement_item->resetAttributes();
		$view_pharmacy_movement_item->RowAttrs = array_merge($view_pharmacy_movement_item->RowAttrs, array('data-rowindex'=>$view_pharmacy_movement_item_grid->RowIndex, 'id'=>'r0_view_pharmacy_movement_item', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_pharmacy_movement_item->RowAttrs["class"], "ew-template");
		$view_pharmacy_movement_item->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_movement_item_grid->renderRow();

		// Render list options
		$view_pharmacy_movement_item_grid->renderListOptions();
		$view_pharmacy_movement_item_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_pharmacy_movement_item->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_item_grid->ListOptions->render("body", "left", $view_pharmacy_movement_item_grid->RowIndex);
?>
	<?php if ($view_pharmacy_movement_item->ProductFrom->Visible) { // ProductFrom ?>
		<td data-name="ProductFrom">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ProductFrom" class="form-group view_pharmacy_movement_item_ProductFrom">
<?php
$wrkonchange = "" . trim(@$view_pharmacy_movement_item->ProductFrom->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_movement_item->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_movement_item_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo RemoveHtml($view_pharmacy_movement_item->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-value-separator="<?php echo $view_pharmacy_movement_item->ProductFrom->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom","forceSelect":true});
</script>
<?php echo $view_pharmacy_movement_item->ProductFrom->Lookup->getParamTag("p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_ProductFrom") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ProductFrom" class="form-group view_pharmacy_movement_item_ProductFrom">
<span<?php echo $view_pharmacy_movement_item->ProductFrom->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->ProductFrom->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Quantity" class="form-group view_pharmacy_movement_item_Quantity">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->Quantity->EditValue ?>"<?php echo $view_pharmacy_movement_item->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Quantity" class="form-group view_pharmacy_movement_item_Quantity">
<span<?php echo $view_pharmacy_movement_item->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->Quantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_FreeQty" class="form-group view_pharmacy_movement_item_FreeQty">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->FreeQty->EditValue ?>"<?php echo $view_pharmacy_movement_item->FreeQty->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_FreeQty" class="form-group view_pharmacy_movement_item_FreeQty">
<span<?php echo $view_pharmacy_movement_item->FreeQty->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->FreeQty->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IQ" class="form-group view_pharmacy_movement_item_IQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->IQ->EditValue ?>"<?php echo $view_pharmacy_movement_item->IQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IQ" class="form-group view_pharmacy_movement_item_IQ">
<span<?php echo $view_pharmacy_movement_item->IQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->IQ->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MRQ" class="form-group view_pharmacy_movement_item_MRQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->MRQ->EditValue ?>"<?php echo $view_pharmacy_movement_item->MRQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MRQ" class="form-group view_pharmacy_movement_item_MRQ">
<span<?php echo $view_pharmacy_movement_item->MRQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->MRQ->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BRCODE" class="form-group view_pharmacy_movement_item_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacy_movement_item->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_movement_item->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_movement_item_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_movement_item->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE","forceSelect":true});
</script>
<?php echo $view_pharmacy_movement_item->BRCODE->Lookup->getParamTag("p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_BRCODE") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BRCODE" class="form-group view_pharmacy_movement_item_BRCODE">
<span<?php echo $view_pharmacy_movement_item->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_OPNO" class="form-group view_pharmacy_movement_item_OPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->OPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->OPNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_OPNO" class="form-group view_pharmacy_movement_item_OPNO">
<span<?php echo $view_pharmacy_movement_item->OPNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->OPNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->IPNO->Visible) { // IPNO ?>
		<td data-name="IPNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IPNO" class="form-group view_pharmacy_movement_item_IPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->IPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->IPNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IPNO" class="form-group view_pharmacy_movement_item_IPNO">
<span<?php echo $view_pharmacy_movement_item->IPNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->IPNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->PatientBILLNO->Visible) { // PatientBILLNO ?>
		<td data-name="PatientBILLNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PatientBILLNO" class="form-group view_pharmacy_movement_item_PatientBILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->PatientBILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->PatientBILLNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PatientBILLNO" class="form-group view_pharmacy_movement_item_PatientBILLNO">
<span<?php echo $view_pharmacy_movement_item->PatientBILLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->PatientBILLNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLDT" class="form-group view_pharmacy_movement_item_BILLDT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BILLDT->EditValue ?>"<?php echo $view_pharmacy_movement_item->BILLDT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLDT" class="form-group view_pharmacy_movement_item_BILLDT">
<span<?php echo $view_pharmacy_movement_item->BILLDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BILLDT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_GRNNO" class="form-group view_pharmacy_movement_item_GRNNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->GRNNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->GRNNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_GRNNO" class="form-group view_pharmacy_movement_item_GRNNO">
<span<?php echo $view_pharmacy_movement_item->GRNNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->GRNNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->DT->Visible) { // DT ?>
		<td data-name="DT">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_DT" class="form-group view_pharmacy_movement_item_DT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->DT->EditValue ?>"<?php echo $view_pharmacy_movement_item->DT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_DT" class="form-group view_pharmacy_movement_item_DT">
<span<?php echo $view_pharmacy_movement_item->DT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->DT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->Customername->Visible) { // Customername ?>
		<td data-name="Customername">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Customername" class="form-group view_pharmacy_movement_item_Customername">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->Customername->EditValue ?>"<?php echo $view_pharmacy_movement_item->Customername->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Customername" class="form-group view_pharmacy_movement_item_Customername">
<span<?php echo $view_pharmacy_movement_item->Customername->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->Customername->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createdby" class="form-group view_pharmacy_movement_item_createdby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->createdby->EditValue ?>"<?php echo $view_pharmacy_movement_item->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createdby" class="form-group view_pharmacy_movement_item_createdby">
<span<?php echo $view_pharmacy_movement_item->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createddatetime" class="form-group view_pharmacy_movement_item_createddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->createddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item->createddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->createddatetime->ReadOnly && !$view_pharmacy_movement_item->createddatetime->Disabled && !isset($view_pharmacy_movement_item->createddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createddatetime" class="form-group view_pharmacy_movement_item_createddatetime">
<span<?php echo $view_pharmacy_movement_item->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifiedby" class="form-group view_pharmacy_movement_item_modifiedby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->modifiedby->EditValue ?>"<?php echo $view_pharmacy_movement_item->modifiedby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifiedby" class="form-group view_pharmacy_movement_item_modifiedby">
<span<?php echo $view_pharmacy_movement_item->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifieddatetime" class="form-group view_pharmacy_movement_item_modifieddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->modifieddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item->modifieddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->modifieddatetime->ReadOnly && !$view_pharmacy_movement_item->modifieddatetime->Disabled && !isset($view_pharmacy_movement_item->modifieddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifieddatetime" class="form-group view_pharmacy_movement_item_modifieddatetime">
<span<?php echo $view_pharmacy_movement_item->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLNO" class="form-group view_pharmacy_movement_item_BILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->BILLNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLNO" class="form-group view_pharmacy_movement_item_BILLNO">
<span<?php echo $view_pharmacy_movement_item->BILLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BILLNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->prc->Visible) { // prc ?>
		<td data-name="prc">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<?php if ($view_pharmacy_movement_item->prc->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item->prc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->prc->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item->prc->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item->prc->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->prc->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PrName" class="form-group view_pharmacy_movement_item_PrName">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item->PrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PrName" class="form-group view_pharmacy_movement_item_PrName">
<span<?php echo $view_pharmacy_movement_item->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->PrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<?php if ($view_pharmacy_movement_item->BatchNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BatchNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BatchNo->EditValue ?>"<?php echo $view_pharmacy_movement_item->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BatchNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ExpDate" class="form-group view_pharmacy_movement_item_ExpDate">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->ExpDate->ReadOnly && !$view_pharmacy_movement_item->ExpDate->Disabled && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ExpDate" class="form-group view_pharmacy_movement_item_ExpDate">
<span<?php echo $view_pharmacy_movement_item->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->ExpDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MFRCODE" class="form-group view_pharmacy_movement_item_MFRCODE">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_movement_item->MFRCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MFRCODE" class="form-group view_pharmacy_movement_item_MFRCODE">
<span<?php echo $view_pharmacy_movement_item->MFRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->MFRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->hsn->Visible) { // hsn ?>
		<td data-name="hsn">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_hsn" class="form-group view_pharmacy_movement_item_hsn">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->hsn->EditValue ?>"<?php echo $view_pharmacy_movement_item->hsn->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_hsn" class="form-group view_pharmacy_movement_item_hsn">
<span<?php echo $view_pharmacy_movement_item->hsn->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->hsn->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_HospID" class="form-group view_pharmacy_movement_item_HospID">
<span<?php echo $view_pharmacy_movement_item->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_movement_item->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_item_grid->ListOptions->render("body", "right", $view_pharmacy_movement_item_grid->RowIndex);
?>
<script>
fview_pharmacy_movement_itemgrid.updateLists(<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($view_pharmacy_movement_item->CurrentMode == "add" || $view_pharmacy_movement_item->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_movement_item_grid->KeyCount ?>">
<?php echo $view_pharmacy_movement_item_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_movement_item_grid->KeyCount ?>">
<?php echo $view_pharmacy_movement_item_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_pharmacy_movement_itemgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_pharmacy_movement_item_grid->Recordset)
	$view_pharmacy_movement_item_grid->Recordset->Close();
?>
</div>
<?php if ($view_pharmacy_movement_item_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacy_movement_item_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->TotalRecs == 0 && !$view_pharmacy_movement_item->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_item_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_movement_item_grid->terminate();
?>
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_movement_item", "95%", "");
</script>
<?php } ?>
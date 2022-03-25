<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_store_transfer_grid))
	$view_store_transfer_grid = new view_store_transfer_grid();

// Run the page
$view_store_transfer_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_transfer_grid->Page_Render();
?>
<?php if (!$view_store_transfer->isExport()) { ?>
<script>

// Form object
var fview_store_transfergrid = new ew.Form("fview_store_transfergrid", "grid");
fview_store_transfergrid.formKeyCountName = '<?php echo $view_store_transfer_grid->FormKeyCountName ?>';

// Validate form
fview_store_transfergrid.validate = function() {
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
		<?php if ($view_store_transfer_grid->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->ORDNO->caption(), $view_store_transfer->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_grid->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PRC->caption(), $view_store_transfer->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_grid->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->LastMonthSale->caption(), $view_store_transfer->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->LastMonthSale->errorMessage()) ?>");
		<?php if ($view_store_transfer_grid->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->BatchNo->caption(), $view_store_transfer->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_grid->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->ExpDate->caption(), $view_store_transfer->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ExpDate->errorMessage()) ?>");
		<?php if ($view_store_transfer_grid->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->PrName->caption(), $view_store_transfer->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_grid->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->Quantity->caption(), $view_store_transfer->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->Quantity->errorMessage()) ?>");
		<?php if ($view_store_transfer_grid->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->ItemValue->caption(), $view_store_transfer->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ItemValue->errorMessage()) ?>");
		<?php if ($view_store_transfer_grid->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->MRP->caption(), $view_store_transfer->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->MRP->errorMessage()) ?>");
		<?php if ($view_store_transfer_grid->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->BRCODE->caption(), $view_store_transfer->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->BRCODE->errorMessage()) ?>");
		<?php if ($view_store_transfer_grid->strid->Required) { ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->strid->caption(), $view_store_transfer->strid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->strid->errorMessage()) ?>");
		<?php if ($view_store_transfer_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->HospID->caption(), $view_store_transfer->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_grid->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->grncreatedby->caption(), $view_store_transfer->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_grid->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->grncreatedDateTime->caption(), $view_store_transfer->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_grid->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->grnModifiedby->caption(), $view_store_transfer->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_grid->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->grnModifiedDateTime->caption(), $view_store_transfer->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_store_transfer_grid->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->BillDate->caption(), $view_store_transfer->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->BillDate->errorMessage()) ?>");
		<?php if ($view_store_transfer_grid->CurStock->Required) { ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_store_transfer->CurStock->caption(), $view_store_transfer->CurStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_store_transfer->CurStock->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_store_transfergrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "LastMonthSale", false)) return false;
	if (ew.valueChanged(fobj, infix, "BatchNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "ExpDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "ItemValue", false)) return false;
	if (ew.valueChanged(fobj, infix, "MRP", false)) return false;
	if (ew.valueChanged(fobj, infix, "BRCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "strid", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "CurStock", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_store_transfergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_store_transfergrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_store_transfergrid.lists["x_ORDNO"] = <?php echo $view_store_transfer_grid->ORDNO->Lookup->toClientList() ?>;
fview_store_transfergrid.lists["x_ORDNO"].options = <?php echo JsonEncode($view_store_transfer_grid->ORDNO->lookupOptions()) ?>;
fview_store_transfergrid.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_store_transfergrid.lists["x_LastMonthSale"] = <?php echo $view_store_transfer_grid->LastMonthSale->Lookup->toClientList() ?>;
fview_store_transfergrid.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_store_transfer_grid->LastMonthSale->lookupOptions()) ?>;
fview_store_transfergrid.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_store_transfergrid.lists["x_BRCODE"] = <?php echo $view_store_transfer_grid->BRCODE->Lookup->toClientList() ?>;
fview_store_transfergrid.lists["x_BRCODE"].options = <?php echo JsonEncode($view_store_transfer_grid->BRCODE->lookupOptions()) ?>;
fview_store_transfergrid.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_store_transfer_grid->renderOtherOptions();
?>
<?php $view_store_transfer_grid->showPageHeader(); ?>
<?php
$view_store_transfer_grid->showMessage();
?>
<?php if ($view_store_transfer_grid->TotalRecs > 0 || $view_store_transfer->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_store_transfer_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_store_transfer">
<?php if ($view_store_transfer_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_store_transfer_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_store_transfergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_store_transfer" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_store_transfergrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_store_transfer_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_store_transfer_grid->renderListOptions();

// Render list options (header, left)
$view_store_transfer_grid->ListOptions->render("header", "left");
?>
<?php if ($view_store_transfer->ORDNO->Visible) { // ORDNO ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->ORDNO) == "") { ?>
		<th data-name="ORDNO" class="<?php echo $view_store_transfer->ORDNO->headerCellClass() ?>"><div id="elh_view_store_transfer_ORDNO" class="view_store_transfer_ORDNO"><div class="ew-table-header-caption"><?php echo $view_store_transfer->ORDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORDNO" class="<?php echo $view_store_transfer->ORDNO->headerCellClass() ?>"><div><div id="elh_view_store_transfer_ORDNO" class="view_store_transfer_ORDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->ORDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->ORDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->ORDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->PRC->Visible) { // PRC ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_store_transfer->PRC->headerCellClass() ?>"><div id="elh_view_store_transfer_PRC" class="view_store_transfer_PRC"><div class="ew-table-header-caption"><?php echo $view_store_transfer->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_store_transfer->PRC->headerCellClass() ?>"><div><div id="elh_view_store_transfer_PRC" class="view_store_transfer_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->LastMonthSale) == "") { ?>
		<th data-name="LastMonthSale" class="<?php echo $view_store_transfer->LastMonthSale->headerCellClass() ?>"><div id="elh_view_store_transfer_LastMonthSale" class="view_store_transfer_LastMonthSale"><div class="ew-table-header-caption"><?php echo $view_store_transfer->LastMonthSale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastMonthSale" class="<?php echo $view_store_transfer->LastMonthSale->headerCellClass() ?>"><div><div id="elh_view_store_transfer_LastMonthSale" class="view_store_transfer_LastMonthSale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->LastMonthSale->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->LastMonthSale->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_store_transfer->BatchNo->headerCellClass() ?>"><div id="elh_view_store_transfer_BatchNo" class="view_store_transfer_BatchNo"><div class="ew-table-header-caption"><?php echo $view_store_transfer->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_store_transfer->BatchNo->headerCellClass() ?>"><div><div id="elh_view_store_transfer_BatchNo" class="view_store_transfer_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_store_transfer->ExpDate->headerCellClass() ?>"><div id="elh_view_store_transfer_ExpDate" class="view_store_transfer_ExpDate"><div class="ew-table-header-caption"><?php echo $view_store_transfer->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_store_transfer->ExpDate->headerCellClass() ?>"><div><div id="elh_view_store_transfer_ExpDate" class="view_store_transfer_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->PrName->Visible) { // PrName ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_store_transfer->PrName->headerCellClass() ?>"><div id="elh_view_store_transfer_PrName" class="view_store_transfer_PrName"><div class="ew-table-header-caption"><?php echo $view_store_transfer->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_store_transfer->PrName->headerCellClass() ?>"><div><div id="elh_view_store_transfer_PrName" class="view_store_transfer_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->Quantity->Visible) { // Quantity ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_store_transfer->Quantity->headerCellClass() ?>"><div id="elh_view_store_transfer_Quantity" class="view_store_transfer_Quantity"><div class="ew-table-header-caption"><?php echo $view_store_transfer->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_store_transfer->Quantity->headerCellClass() ?>"><div><div id="elh_view_store_transfer_Quantity" class="view_store_transfer_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_store_transfer->ItemValue->headerCellClass() ?>"><div id="elh_view_store_transfer_ItemValue" class="view_store_transfer_ItemValue"><div class="ew-table-header-caption"><?php echo $view_store_transfer->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_store_transfer->ItemValue->headerCellClass() ?>"><div><div id="elh_view_store_transfer_ItemValue" class="view_store_transfer_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->ItemValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->ItemValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->MRP->Visible) { // MRP ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_store_transfer->MRP->headerCellClass() ?>"><div id="elh_view_store_transfer_MRP" class="view_store_transfer_MRP"><div class="ew-table-header-caption"><?php echo $view_store_transfer->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_store_transfer->MRP->headerCellClass() ?>"><div><div id="elh_view_store_transfer_MRP" class="view_store_transfer_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_store_transfer->BRCODE->headerCellClass() ?>"><div id="elh_view_store_transfer_BRCODE" class="view_store_transfer_BRCODE"><div class="ew-table-header-caption"><?php echo $view_store_transfer->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_store_transfer->BRCODE->headerCellClass() ?>"><div><div id="elh_view_store_transfer_BRCODE" class="view_store_transfer_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->strid->Visible) { // strid ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->strid) == "") { ?>
		<th data-name="strid" class="<?php echo $view_store_transfer->strid->headerCellClass() ?>"><div id="elh_view_store_transfer_strid" class="view_store_transfer_strid"><div class="ew-table-header-caption"><?php echo $view_store_transfer->strid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="strid" class="<?php echo $view_store_transfer->strid->headerCellClass() ?>"><div><div id="elh_view_store_transfer_strid" class="view_store_transfer_strid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->strid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->strid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->strid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->HospID->Visible) { // HospID ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_store_transfer->HospID->headerCellClass() ?>"><div id="elh_view_store_transfer_HospID" class="view_store_transfer_HospID"><div class="ew-table-header-caption"><?php echo $view_store_transfer->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_store_transfer->HospID->headerCellClass() ?>"><div><div id="elh_view_store_transfer_HospID" class="view_store_transfer_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $view_store_transfer->grncreatedby->headerCellClass() ?>"><div id="elh_view_store_transfer_grncreatedby" class="view_store_transfer_grncreatedby"><div class="ew-table-header-caption"><?php echo $view_store_transfer->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $view_store_transfer->grncreatedby->headerCellClass() ?>"><div><div id="elh_view_store_transfer_grncreatedby" class="view_store_transfer_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->grncreatedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->grncreatedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_store_transfer->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_store_transfer_grncreatedDateTime" class="view_store_transfer_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_store_transfer->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_store_transfer->grncreatedDateTime->headerCellClass() ?>"><div><div id="elh_view_store_transfer_grncreatedDateTime" class="view_store_transfer_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->grncreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->grncreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_store_transfer->grnModifiedby->headerCellClass() ?>"><div id="elh_view_store_transfer_grnModifiedby" class="view_store_transfer_grnModifiedby"><div class="ew-table-header-caption"><?php echo $view_store_transfer->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_store_transfer->grnModifiedby->headerCellClass() ?>"><div><div id="elh_view_store_transfer_grnModifiedby" class="view_store_transfer_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->grnModifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->grnModifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_store_transfer->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_store_transfer_grnModifiedDateTime" class="view_store_transfer_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $view_store_transfer->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_store_transfer->grnModifiedDateTime->headerCellClass() ?>"><div><div id="elh_view_store_transfer_grnModifiedDateTime" class="view_store_transfer_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->BillDate->Visible) { // BillDate ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_store_transfer->BillDate->headerCellClass() ?>"><div id="elh_view_store_transfer_BillDate" class="view_store_transfer_BillDate"><div class="ew-table-header-caption"><?php echo $view_store_transfer->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_store_transfer->BillDate->headerCellClass() ?>"><div><div id="elh_view_store_transfer_BillDate" class="view_store_transfer_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->CurStock->Visible) { // CurStock ?>
	<?php if ($view_store_transfer->sortUrl($view_store_transfer->CurStock) == "") { ?>
		<th data-name="CurStock" class="<?php echo $view_store_transfer->CurStock->headerCellClass() ?>"><div id="elh_view_store_transfer_CurStock" class="view_store_transfer_CurStock"><div class="ew-table-header-caption"><?php echo $view_store_transfer->CurStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CurStock" class="<?php echo $view_store_transfer->CurStock->headerCellClass() ?>"><div><div id="elh_view_store_transfer_CurStock" class="view_store_transfer_CurStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_transfer->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_transfer->CurStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_transfer->CurStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_store_transfer_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_store_transfer_grid->StartRec = 1;
$view_store_transfer_grid->StopRec = $view_store_transfer_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_store_transfer_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_store_transfer_grid->FormKeyCountName) && ($view_store_transfer->isGridAdd() || $view_store_transfer->isGridEdit() || $view_store_transfer->isConfirm())) {
		$view_store_transfer_grid->KeyCount = $CurrentForm->getValue($view_store_transfer_grid->FormKeyCountName);
		$view_store_transfer_grid->StopRec = $view_store_transfer_grid->StartRec + $view_store_transfer_grid->KeyCount - 1;
	}
}
$view_store_transfer_grid->RecCnt = $view_store_transfer_grid->StartRec - 1;
if ($view_store_transfer_grid->Recordset && !$view_store_transfer_grid->Recordset->EOF) {
	$view_store_transfer_grid->Recordset->moveFirst();
	$selectLimit = $view_store_transfer_grid->UseSelectLimit;
	if (!$selectLimit && $view_store_transfer_grid->StartRec > 1)
		$view_store_transfer_grid->Recordset->move($view_store_transfer_grid->StartRec - 1);
} elseif (!$view_store_transfer->AllowAddDeleteRow && $view_store_transfer_grid->StopRec == 0) {
	$view_store_transfer_grid->StopRec = $view_store_transfer->GridAddRowCount;
}

// Initialize aggregate
$view_store_transfer->RowType = ROWTYPE_AGGREGATEINIT;
$view_store_transfer->resetAttributes();
$view_store_transfer_grid->renderRow();
if ($view_store_transfer->isGridAdd())
	$view_store_transfer_grid->RowIndex = 0;
if ($view_store_transfer->isGridEdit())
	$view_store_transfer_grid->RowIndex = 0;
while ($view_store_transfer_grid->RecCnt < $view_store_transfer_grid->StopRec) {
	$view_store_transfer_grid->RecCnt++;
	if ($view_store_transfer_grid->RecCnt >= $view_store_transfer_grid->StartRec) {
		$view_store_transfer_grid->RowCnt++;
		if ($view_store_transfer->isGridAdd() || $view_store_transfer->isGridEdit() || $view_store_transfer->isConfirm()) {
			$view_store_transfer_grid->RowIndex++;
			$CurrentForm->Index = $view_store_transfer_grid->RowIndex;
			if ($CurrentForm->hasValue($view_store_transfer_grid->FormActionName) && $view_store_transfer_grid->EventCancelled)
				$view_store_transfer_grid->RowAction = strval($CurrentForm->getValue($view_store_transfer_grid->FormActionName));
			elseif ($view_store_transfer->isGridAdd())
				$view_store_transfer_grid->RowAction = "insert";
			else
				$view_store_transfer_grid->RowAction = "";
		}

		// Set up key count
		$view_store_transfer_grid->KeyCount = $view_store_transfer_grid->RowIndex;

		// Init row class and style
		$view_store_transfer->resetAttributes();
		$view_store_transfer->CssClass = "";
		if ($view_store_transfer->isGridAdd()) {
			if ($view_store_transfer->CurrentMode == "copy") {
				$view_store_transfer_grid->loadRowValues($view_store_transfer_grid->Recordset); // Load row values
				$view_store_transfer_grid->setRecordKey($view_store_transfer_grid->RowOldKey, $view_store_transfer_grid->Recordset); // Set old record key
			} else {
				$view_store_transfer_grid->loadRowValues(); // Load default values
				$view_store_transfer_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_store_transfer_grid->loadRowValues($view_store_transfer_grid->Recordset); // Load row values
		}
		$view_store_transfer->RowType = ROWTYPE_VIEW; // Render view
		if ($view_store_transfer->isGridAdd()) // Grid add
			$view_store_transfer->RowType = ROWTYPE_ADD; // Render add
		if ($view_store_transfer->isGridAdd() && $view_store_transfer->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_store_transfer_grid->restoreCurrentRowFormValues($view_store_transfer_grid->RowIndex); // Restore form values
		if ($view_store_transfer->isGridEdit()) { // Grid edit
			if ($view_store_transfer->EventCancelled)
				$view_store_transfer_grid->restoreCurrentRowFormValues($view_store_transfer_grid->RowIndex); // Restore form values
			if ($view_store_transfer_grid->RowAction == "insert")
				$view_store_transfer->RowType = ROWTYPE_ADD; // Render add
			else
				$view_store_transfer->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_store_transfer->isGridEdit() && ($view_store_transfer->RowType == ROWTYPE_EDIT || $view_store_transfer->RowType == ROWTYPE_ADD) && $view_store_transfer->EventCancelled) // Update failed
			$view_store_transfer_grid->restoreCurrentRowFormValues($view_store_transfer_grid->RowIndex); // Restore form values
		if ($view_store_transfer->RowType == ROWTYPE_EDIT) // Edit row
			$view_store_transfer_grid->EditRowCnt++;
		if ($view_store_transfer->isConfirm()) // Confirm row
			$view_store_transfer_grid->restoreCurrentRowFormValues($view_store_transfer_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_store_transfer->RowAttrs = array_merge($view_store_transfer->RowAttrs, array('data-rowindex'=>$view_store_transfer_grid->RowCnt, 'id'=>'r' . $view_store_transfer_grid->RowCnt . '_view_store_transfer', 'data-rowtype'=>$view_store_transfer->RowType));

		// Render row
		$view_store_transfer_grid->renderRow();

		// Render list options
		$view_store_transfer_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_store_transfer_grid->RowAction <> "delete" && $view_store_transfer_grid->RowAction <> "insertdelete" && !($view_store_transfer_grid->RowAction == "insert" && $view_store_transfer->isConfirm() && $view_store_transfer_grid->emptyRow())) {
?>
	<tr<?php echo $view_store_transfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_store_transfer_grid->ListOptions->render("body", "left", $view_store_transfer_grid->RowCnt);
?>
	<?php if ($view_store_transfer->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO"<?php echo $view_store_transfer->ORDNO->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_store_transfer->ORDNO->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_ORDNO" class="view_store_transfer_ORDNO">
<span<?php echo $view_store_transfer->ORDNO->viewAttributes() ?>>
<?php echo $view_store_transfer->ORDNO->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_store_transfer->ORDNO->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_store_transfer->ORDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_store_transfer->ORDNO->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_store_transfer->ORDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_id" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_id" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_store_transfer->id->CurrentValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_id" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_id" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_store_transfer->id->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT || $view_store_transfer->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_id" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_id" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_store_transfer->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_store_transfer->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_store_transfer->PRC->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_PRC" class="form-group view_store_transfer_PRC">
<input type="text" data-table="view_store_transfer" data-field="x_PRC" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_store_transfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PRC->EditValue ?>"<?php echo $view_store_transfer->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_transfer->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_PRC" class="form-group view_store_transfer_PRC">
<input type="text" data-table="view_store_transfer" data-field="x_PRC" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_store_transfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PRC->EditValue ?>"<?php echo $view_store_transfer->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_PRC" class="view_store_transfer_PRC">
<span<?php echo $view_store_transfer->PRC->viewAttributes() ?>>
<?php echo $view_store_transfer->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_transfer->PRC->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_transfer->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_transfer->PRC->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_transfer->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale"<?php echo $view_store_transfer->LastMonthSale->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_LastMonthSale" class="form-group view_store_transfer_LastMonthSale">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_store_transfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" class="text-nowrap" style="z-index: <?php echo (9000 - $view_store_transfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo RemoveHtml($view_store_transfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_store_transfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_store_transfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transfergrid.createAutoSuggest({"id":"x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_store_transfer->LastMonthSale->Lookup->getParamTag("p_x" . $view_store_transfer_grid->RowIndex . "_LastMonthSale") ?>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_LastMonthSale" class="form-group view_store_transfer_LastMonthSale">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_store_transfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" class="text-nowrap" style="z-index: <?php echo (9000 - $view_store_transfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo RemoveHtml($view_store_transfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_store_transfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_store_transfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transfergrid.createAutoSuggest({"id":"x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_store_transfer->LastMonthSale->Lookup->getParamTag("p_x" . $view_store_transfer_grid->RowIndex . "_LastMonthSale") ?>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_LastMonthSale" class="view_store_transfer_LastMonthSale">
<span<?php echo $view_store_transfer->LastMonthSale->viewAttributes() ?>>
<?php echo $view_store_transfer->LastMonthSale->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_store_transfer->BatchNo->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_BatchNo" class="form-group view_store_transfer_BatchNo">
<input type="text" data-table="view_store_transfer" data-field="x_BatchNo" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BatchNo->EditValue ?>"<?php echo $view_store_transfer->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_transfer->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_BatchNo" class="form-group view_store_transfer_BatchNo">
<input type="text" data-table="view_store_transfer" data-field="x_BatchNo" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BatchNo->EditValue ?>"<?php echo $view_store_transfer->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_BatchNo" class="view_store_transfer_BatchNo">
<span<?php echo $view_store_transfer->BatchNo->viewAttributes() ?>>
<?php echo $view_store_transfer->BatchNo->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_transfer->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_transfer->BatchNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_transfer->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_transfer->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_store_transfer->ExpDate->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_ExpDate" class="form-group view_store_transfer_ExpDate">
<input type="text" data-table="view_store_transfer" data-field="x_ExpDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_transfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ExpDate->EditValue ?>"<?php echo $view_store_transfer->ExpDate->editAttributes() ?>>
<?php if (!$view_store_transfer->ExpDate->ReadOnly && !$view_store_transfer->ExpDate->Disabled && !isset($view_store_transfer->ExpDate->EditAttrs["readonly"]) && !isset($view_store_transfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfergrid", "x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_transfer->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_ExpDate" class="form-group view_store_transfer_ExpDate">
<input type="text" data-table="view_store_transfer" data-field="x_ExpDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_transfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ExpDate->EditValue ?>"<?php echo $view_store_transfer->ExpDate->editAttributes() ?>>
<?php if (!$view_store_transfer->ExpDate->ReadOnly && !$view_store_transfer->ExpDate->Disabled && !isset($view_store_transfer->ExpDate->EditAttrs["readonly"]) && !isset($view_store_transfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfergrid", "x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_ExpDate" class="view_store_transfer_ExpDate">
<span<?php echo $view_store_transfer->ExpDate->viewAttributes() ?>>
<?php echo $view_store_transfer->ExpDate->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_transfer->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_transfer->ExpDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_transfer->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_transfer->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_store_transfer->PrName->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_PrName" class="form-group view_store_transfer_PrName">
<input type="text" data-table="view_store_transfer" data-field="x_PrName" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_store_transfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PrName->EditValue ?>"<?php echo $view_store_transfer->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_transfer->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_PrName" class="form-group view_store_transfer_PrName">
<input type="text" data-table="view_store_transfer" data-field="x_PrName" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_store_transfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PrName->EditValue ?>"<?php echo $view_store_transfer->PrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_PrName" class="view_store_transfer_PrName">
<span<?php echo $view_store_transfer->PrName->viewAttributes() ?>>
<?php echo $view_store_transfer->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_transfer->PrName->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_transfer->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_transfer->PrName->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_transfer->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_store_transfer->Quantity->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_Quantity" class="form-group view_store_transfer_Quantity">
<input type="text" data-table="view_store_transfer" data-field="x_Quantity" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Quantity->EditValue ?>"<?php echo $view_store_transfer->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_transfer->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_Quantity" class="form-group view_store_transfer_Quantity">
<input type="text" data-table="view_store_transfer" data-field="x_Quantity" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Quantity->EditValue ?>"<?php echo $view_store_transfer->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_Quantity" class="view_store_transfer_Quantity">
<span<?php echo $view_store_transfer->Quantity->viewAttributes() ?>>
<?php echo $view_store_transfer->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_transfer->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_transfer->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_transfer->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_transfer->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue"<?php echo $view_store_transfer->ItemValue->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_ItemValue" class="form-group view_store_transfer_ItemValue">
<input type="text" data-table="view_store_transfer" data-field="x_ItemValue" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_store_transfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ItemValue->EditValue ?>"<?php echo $view_store_transfer->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_transfer->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_ItemValue" class="form-group view_store_transfer_ItemValue">
<input type="text" data-table="view_store_transfer" data-field="x_ItemValue" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_store_transfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ItemValue->EditValue ?>"<?php echo $view_store_transfer->ItemValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_ItemValue" class="view_store_transfer_ItemValue">
<span<?php echo $view_store_transfer->ItemValue->viewAttributes() ?>>
<?php echo $view_store_transfer->ItemValue->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_transfer->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_transfer->ItemValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_transfer->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_transfer->ItemValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $view_store_transfer->MRP->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_MRP" class="form-group view_store_transfer_MRP">
<input type="text" data-table="view_store_transfer" data-field="x_MRP" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->MRP->EditValue ?>"<?php echo $view_store_transfer->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_transfer->MRP->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_MRP" class="form-group view_store_transfer_MRP">
<input type="text" data-table="view_store_transfer" data-field="x_MRP" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->MRP->EditValue ?>"<?php echo $view_store_transfer->MRP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_MRP" class="view_store_transfer_MRP">
<span<?php echo $view_store_transfer->MRP->viewAttributes() ?>>
<?php echo $view_store_transfer->MRP->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_transfer->MRP->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_transfer->MRP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_transfer->MRP->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_transfer->MRP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_store_transfer->BRCODE->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_BRCODE" class="form-group view_store_transfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_store_transfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" class="text-nowrap" style="z-index: <?php echo (9000 - $view_store_transfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_store_transfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_store_transfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_store_transfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transfergrid.createAutoSuggest({"id":"x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE","forceSelect":false});
</script>
<?php echo $view_store_transfer->BRCODE->Lookup->getParamTag("p_x" . $view_store_transfer_grid->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_BRCODE" class="form-group view_store_transfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_store_transfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" class="text-nowrap" style="z-index: <?php echo (9000 - $view_store_transfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_store_transfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_store_transfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_store_transfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transfergrid.createAutoSuggest({"id":"x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE","forceSelect":false});
</script>
<?php echo $view_store_transfer->BRCODE->Lookup->getParamTag("p_x" . $view_store_transfer_grid->RowIndex . "_BRCODE") ?>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_BRCODE" class="view_store_transfer_BRCODE">
<span<?php echo $view_store_transfer->BRCODE->viewAttributes() ?>>
<?php echo $view_store_transfer->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->strid->Visible) { // strid ?>
		<td data-name="strid"<?php echo $view_store_transfer->strid->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_store_transfer->strid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<span<?php echo $view_store_transfer->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->strid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<input type="text" data-table="view_store_transfer" data-field="x_strid" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->strid->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->strid->EditValue ?>"<?php echo $view_store_transfer->strid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_store_transfer->strid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<span<?php echo $view_store_transfer->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->strid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<input type="text" data-table="view_store_transfer" data-field="x_strid" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->strid->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->strid->EditValue ?>"<?php echo $view_store_transfer->strid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_strid" class="view_store_transfer_strid">
<span<?php echo $view_store_transfer->strid->viewAttributes() ?>>
<?php echo $view_store_transfer->strid->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_store_transfer->HospID->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_transfer->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_HospID" class="view_store_transfer_HospID">
<span<?php echo $view_store_transfer->HospID->viewAttributes() ?>>
<?php echo $view_store_transfer->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_transfer->HospID->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_transfer->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_transfer->HospID->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_transfer->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby"<?php echo $view_store_transfer->grncreatedby->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_transfer->grncreatedby->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_grncreatedby" class="view_store_transfer_grncreatedby">
<span<?php echo $view_store_transfer->grncreatedby->viewAttributes() ?>>
<?php echo $view_store_transfer->grncreatedby->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_transfer->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_transfer->grncreatedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_transfer->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_transfer->grncreatedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime"<?php echo $view_store_transfer->grncreatedDateTime->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_grncreatedDateTime" class="view_store_transfer_grncreatedDateTime">
<span<?php echo $view_store_transfer->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_store_transfer->grncreatedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grncreatedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby"<?php echo $view_store_transfer->grnModifiedby->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_grnModifiedby" class="view_store_transfer_grnModifiedby">
<span<?php echo $view_store_transfer->grnModifiedby->viewAttributes() ?>>
<?php echo $view_store_transfer->grnModifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime"<?php echo $view_store_transfer->grnModifiedDateTime->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_grnModifiedDateTime" class="view_store_transfer_grnModifiedDateTime">
<span<?php echo $view_store_transfer->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_store_transfer->grnModifiedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $view_store_transfer->BillDate->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_BillDate" class="form-group view_store_transfer_BillDate">
<input type="text" data-table="view_store_transfer" data-field="x_BillDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_store_transfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BillDate->EditValue ?>"<?php echo $view_store_transfer->BillDate->editAttributes() ?>>
<?php if (!$view_store_transfer->BillDate->ReadOnly && !$view_store_transfer->BillDate->Disabled && !isset($view_store_transfer->BillDate->EditAttrs["readonly"]) && !isset($view_store_transfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfergrid", "x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_transfer->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_BillDate" class="form-group view_store_transfer_BillDate">
<input type="text" data-table="view_store_transfer" data-field="x_BillDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_store_transfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BillDate->EditValue ?>"<?php echo $view_store_transfer->BillDate->editAttributes() ?>>
<?php if (!$view_store_transfer->BillDate->ReadOnly && !$view_store_transfer->BillDate->Disabled && !isset($view_store_transfer->BillDate->EditAttrs["readonly"]) && !isset($view_store_transfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfergrid", "x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_BillDate" class="view_store_transfer_BillDate">
<span<?php echo $view_store_transfer->BillDate->viewAttributes() ?>>
<?php echo $view_store_transfer->BillDate->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_transfer->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_transfer->BillDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_transfer->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_transfer->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_store_transfer->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock"<?php echo $view_store_transfer->CurStock->cellAttributes() ?>>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_CurStock" class="form-group view_store_transfer_CurStock">
<input type="text" data-table="view_store_transfer" data-field="x_CurStock" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->CurStock->EditValue ?>"<?php echo $view_store_transfer->CurStock->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_transfer->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_CurStock" class="form-group view_store_transfer_CurStock">
<input type="text" data-table="view_store_transfer" data-field="x_CurStock" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->CurStock->EditValue ?>"<?php echo $view_store_transfer->CurStock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_store_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_store_transfer_grid->RowCnt ?>_view_store_transfer_CurStock" class="view_store_transfer_CurStock">
<span<?php echo $view_store_transfer->CurStock->viewAttributes() ?>>
<?php echo $view_store_transfer->CurStock->getViewValue() ?></span>
</span>
<?php if (!$view_store_transfer->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_transfer->CurStock->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_transfer->CurStock->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" name="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="fview_store_transfergrid$x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_transfer->CurStock->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" name="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="fview_store_transfergrid$o<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_transfer->CurStock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_store_transfer_grid->ListOptions->render("body", "right", $view_store_transfer_grid->RowCnt);
?>
	</tr>
<?php if ($view_store_transfer->RowType == ROWTYPE_ADD || $view_store_transfer->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_store_transfergrid.updateLists(<?php echo $view_store_transfer_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_store_transfer->isGridAdd() || $view_store_transfer->CurrentMode == "copy")
		if (!$view_store_transfer_grid->Recordset->EOF)
			$view_store_transfer_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_store_transfer->CurrentMode == "add" || $view_store_transfer->CurrentMode == "copy" || $view_store_transfer->CurrentMode == "edit") {
		$view_store_transfer_grid->RowIndex = '$rowindex$';
		$view_store_transfer_grid->loadRowValues();

		// Set row properties
		$view_store_transfer->resetAttributes();
		$view_store_transfer->RowAttrs = array_merge($view_store_transfer->RowAttrs, array('data-rowindex'=>$view_store_transfer_grid->RowIndex, 'id'=>'r0_view_store_transfer', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_store_transfer->RowAttrs["class"], "ew-template");
		$view_store_transfer->RowType = ROWTYPE_ADD;

		// Render row
		$view_store_transfer_grid->renderRow();

		// Render list options
		$view_store_transfer_grid->renderListOptions();
		$view_store_transfer_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_store_transfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_store_transfer_grid->ListOptions->render("body", "left", $view_store_transfer_grid->RowIndex);
?>
	<?php if ($view_store_transfer->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_ORDNO" class="form-group view_store_transfer_ORDNO">
<span<?php echo $view_store_transfer->ORDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->ORDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_store_transfer->ORDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_store_transfer->ORDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_PRC" class="form-group view_store_transfer_PRC">
<input type="text" data-table="view_store_transfer" data-field="x_PRC" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_store_transfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PRC->EditValue ?>"<?php echo $view_store_transfer->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_PRC" class="form-group view_store_transfer_PRC">
<span<?php echo $view_store_transfer->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->PRC->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_transfer->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_store_transfer->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_LastMonthSale" class="form-group view_store_transfer_LastMonthSale">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_store_transfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" class="text-nowrap" style="z-index: <?php echo (9000 - $view_store_transfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo RemoveHtml($view_store_transfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_store_transfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_store_transfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transfergrid.createAutoSuggest({"id":"x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_store_transfer->LastMonthSale->Lookup->getParamTag("p_x" . $view_store_transfer_grid->RowIndex . "_LastMonthSale") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_LastMonthSale" class="form-group view_store_transfer_LastMonthSale">
<span<?php echo $view_store_transfer->LastMonthSale->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->LastMonthSale->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_BatchNo" class="form-group view_store_transfer_BatchNo">
<input type="text" data-table="view_store_transfer" data-field="x_BatchNo" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BatchNo->EditValue ?>"<?php echo $view_store_transfer->BatchNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_BatchNo" class="form-group view_store_transfer_BatchNo">
<span<?php echo $view_store_transfer->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->BatchNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_transfer->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_store_transfer->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_ExpDate" class="form-group view_store_transfer_ExpDate">
<input type="text" data-table="view_store_transfer" data-field="x_ExpDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_transfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ExpDate->EditValue ?>"<?php echo $view_store_transfer->ExpDate->editAttributes() ?>>
<?php if (!$view_store_transfer->ExpDate->ReadOnly && !$view_store_transfer->ExpDate->Disabled && !isset($view_store_transfer->ExpDate->EditAttrs["readonly"]) && !isset($view_store_transfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfergrid", "x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_ExpDate" class="form-group view_store_transfer_ExpDate">
<span<?php echo $view_store_transfer->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->ExpDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_transfer->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_store_transfer->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_PrName" class="form-group view_store_transfer_PrName">
<input type="text" data-table="view_store_transfer" data-field="x_PrName" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_store_transfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PrName->EditValue ?>"<?php echo $view_store_transfer->PrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_PrName" class="form-group view_store_transfer_PrName">
<span<?php echo $view_store_transfer->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->PrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_transfer->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_store_transfer->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_Quantity" class="form-group view_store_transfer_Quantity">
<input type="text" data-table="view_store_transfer" data-field="x_Quantity" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Quantity->EditValue ?>"<?php echo $view_store_transfer->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_Quantity" class="form-group view_store_transfer_Quantity">
<span<?php echo $view_store_transfer->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->Quantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_transfer->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_store_transfer->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_ItemValue" class="form-group view_store_transfer_ItemValue">
<input type="text" data-table="view_store_transfer" data-field="x_ItemValue" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_store_transfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ItemValue->EditValue ?>"<?php echo $view_store_transfer->ItemValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_ItemValue" class="form-group view_store_transfer_ItemValue">
<span<?php echo $view_store_transfer->ItemValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->ItemValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_transfer->ItemValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_store_transfer->ItemValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->MRP->Visible) { // MRP ?>
		<td data-name="MRP">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_MRP" class="form-group view_store_transfer_MRP">
<input type="text" data-table="view_store_transfer" data-field="x_MRP" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->MRP->EditValue ?>"<?php echo $view_store_transfer->MRP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_MRP" class="form-group view_store_transfer_MRP">
<span<?php echo $view_store_transfer->MRP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->MRP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_transfer->MRP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_store_transfer->MRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_BRCODE" class="form-group view_store_transfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_store_transfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" class="text-nowrap" style="z-index: <?php echo (9000 - $view_store_transfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_store_transfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_store_transfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_store_transfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transfergrid.createAutoSuggest({"id":"x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE","forceSelect":false});
</script>
<?php echo $view_store_transfer->BRCODE->Lookup->getParamTag("p_x" . $view_store_transfer_grid->RowIndex . "_BRCODE") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_BRCODE" class="form-group view_store_transfer_BRCODE">
<span<?php echo $view_store_transfer->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->BRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->strid->Visible) { // strid ?>
		<td data-name="strid">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<?php if ($view_store_transfer->strid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<span<?php echo $view_store_transfer->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->strid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<input type="text" data-table="view_store_transfer" data-field="x_strid" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->strid->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->strid->EditValue ?>"<?php echo $view_store_transfer->strid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<span<?php echo $view_store_transfer->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->strid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_strid" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($view_store_transfer->strid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_HospID" class="form-group view_store_transfer_HospID">
<span<?php echo $view_store_transfer->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_transfer->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_store_transfer->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_grncreatedby" class="form-group view_store_transfer_grncreatedby">
<span<?php echo $view_store_transfer->grncreatedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->grncreatedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_transfer->grncreatedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_store_transfer->grncreatedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_grncreatedDateTime" class="form-group view_store_transfer_grncreatedDateTime">
<span<?php echo $view_store_transfer->grncreatedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->grncreatedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grncreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grncreatedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_grnModifiedby" class="form-group view_store_transfer_grnModifiedby">
<span<?php echo $view_store_transfer->grnModifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->grnModifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_grnModifiedDateTime" class="form-group view_store_transfer_grnModifiedDateTime">
<span<?php echo $view_store_transfer->grnModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->grnModifiedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_store_transfer->grnModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_BillDate" class="form-group view_store_transfer_BillDate">
<input type="text" data-table="view_store_transfer" data-field="x_BillDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_store_transfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BillDate->EditValue ?>"<?php echo $view_store_transfer->BillDate->editAttributes() ?>>
<?php if (!$view_store_transfer->BillDate->ReadOnly && !$view_store_transfer->BillDate->Disabled && !isset($view_store_transfer->BillDate->EditAttrs["readonly"]) && !isset($view_store_transfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfergrid", "x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_BillDate" class="form-group view_store_transfer_BillDate">
<span<?php echo $view_store_transfer->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->BillDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_transfer->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_store_transfer->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_store_transfer->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock">
<?php if (!$view_store_transfer->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_CurStock" class="form-group view_store_transfer_CurStock">
<input type="text" data-table="view_store_transfer" data-field="x_CurStock" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->CurStock->EditValue ?>"<?php echo $view_store_transfer->CurStock->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_CurStock" class="form-group view_store_transfer_CurStock">
<span<?php echo $view_store_transfer->CurStock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_store_transfer->CurStock->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" name="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_transfer->CurStock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" name="o<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" id="o<?php echo $view_store_transfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_store_transfer->CurStock->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_store_transfer_grid->ListOptions->render("body", "right", $view_store_transfer_grid->RowIndex);
?>
<script>
fview_store_transfergrid.updateLists(<?php echo $view_store_transfer_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($view_store_transfer->CurrentMode == "add" || $view_store_transfer->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_store_transfer_grid->FormKeyCountName ?>" id="<?php echo $view_store_transfer_grid->FormKeyCountName ?>" value="<?php echo $view_store_transfer_grid->KeyCount ?>">
<?php echo $view_store_transfer_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_store_transfer->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_store_transfer_grid->FormKeyCountName ?>" id="<?php echo $view_store_transfer_grid->FormKeyCountName ?>" value="<?php echo $view_store_transfer_grid->KeyCount ?>">
<?php echo $view_store_transfer_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_store_transfer->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_store_transfergrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_store_transfer_grid->Recordset)
	$view_store_transfer_grid->Recordset->Close();
?>
</div>
<?php if ($view_store_transfer_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_store_transfer_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_store_transfer_grid->TotalRecs == 0 && !$view_store_transfer->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_store_transfer_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_store_transfer_grid->terminate();
?>
<?php if (!$view_store_transfer->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_store_transfer", "95%", "");
</script>
<?php } ?>
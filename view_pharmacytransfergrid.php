<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_pharmacytransfer_grid))
	$view_pharmacytransfer_grid = new view_pharmacytransfer_grid();

// Run the page
$view_pharmacytransfer_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacytransfer_grid->Page_Render();
?>
<?php if (!$view_pharmacytransfer->isExport()) { ?>
<script>

// Form object
var fview_pharmacytransfergrid = new ew.Form("fview_pharmacytransfergrid", "grid");
fview_pharmacytransfergrid.formKeyCountName = '<?php echo $view_pharmacytransfer_grid->FormKeyCountName ?>';

// Validate form
fview_pharmacytransfergrid.validate = function() {
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
		<?php if ($view_pharmacytransfer_grid->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->ORDNO->caption(), $view_pharmacytransfer->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_grid->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->BRCODE->caption(), $view_pharmacytransfer->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->BRCODE->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_grid->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PRC->caption(), $view_pharmacytransfer->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_grid->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->LastMonthSale->caption(), $view_pharmacytransfer->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->LastMonthSale->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_grid->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->PrName->caption(), $view_pharmacytransfer->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_grid->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->Quantity->caption(), $view_pharmacytransfer->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->Quantity->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_grid->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->BatchNo->caption(), $view_pharmacytransfer->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_grid->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->ExpDate->caption(), $view_pharmacytransfer->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ExpDate->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_grid->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->MRP->caption(), $view_pharmacytransfer->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->MRP->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_grid->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->ItemValue->caption(), $view_pharmacytransfer->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ItemValue->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_grid->trid->Required) { ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->trid->caption(), $view_pharmacytransfer->trid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_trid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->trid->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->HospID->caption(), $view_pharmacytransfer->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_grid->grncreatedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->grncreatedby->caption(), $view_pharmacytransfer->grncreatedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_grid->grncreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grncreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->grncreatedDateTime->caption(), $view_pharmacytransfer->grncreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_grid->grnModifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->grnModifiedby->caption(), $view_pharmacytransfer->grnModifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_grid->grnModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_grnModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->grnModifiedDateTime->caption(), $view_pharmacytransfer->grnModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacytransfer_grid->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->BillDate->caption(), $view_pharmacytransfer->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->BillDate->errorMessage()) ?>");
		<?php if ($view_pharmacytransfer_grid->CurStock->Required) { ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer->CurStock->caption(), $view_pharmacytransfer->CurStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->CurStock->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_pharmacytransfergrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "BRCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "LastMonthSale", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "BatchNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "ExpDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "MRP", false)) return false;
	if (ew.valueChanged(fobj, infix, "ItemValue", false)) return false;
	if (ew.valueChanged(fobj, infix, "trid", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "CurStock", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacytransfergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacytransfergrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacytransfergrid.lists["x_ORDNO"] = <?php echo $view_pharmacytransfer_grid->ORDNO->Lookup->toClientList() ?>;
fview_pharmacytransfergrid.lists["x_ORDNO"].options = <?php echo JsonEncode($view_pharmacytransfer_grid->ORDNO->lookupOptions()) ?>;
fview_pharmacytransfergrid.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacytransfergrid.lists["x_BRCODE"] = <?php echo $view_pharmacytransfer_grid->BRCODE->Lookup->toClientList() ?>;
fview_pharmacytransfergrid.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacytransfer_grid->BRCODE->lookupOptions()) ?>;
fview_pharmacytransfergrid.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacytransfergrid.lists["x_LastMonthSale"] = <?php echo $view_pharmacytransfer_grid->LastMonthSale->Lookup->toClientList() ?>;
fview_pharmacytransfergrid.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_pharmacytransfer_grid->LastMonthSale->lookupOptions()) ?>;
fview_pharmacytransfergrid.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_pharmacytransfer_grid->renderOtherOptions();
?>
<?php $view_pharmacytransfer_grid->showPageHeader(); ?>
<?php
$view_pharmacytransfer_grid->showMessage();
?>
<?php if ($view_pharmacytransfer_grid->TotalRecs > 0 || $view_pharmacytransfer->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacytransfer_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacytransfer">
<?php if ($view_pharmacytransfer_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacytransfer_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacytransfergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacytransfer" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacytransfergrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacytransfer_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacytransfer_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacytransfer_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacytransfer->ORDNO->Visible) { // ORDNO ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->ORDNO) == "") { ?>
		<th data-name="ORDNO" class="<?php echo $view_pharmacytransfer->ORDNO->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ORDNO" class="view_pharmacytransfer_ORDNO"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->ORDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORDNO" class="<?php echo $view_pharmacytransfer->ORDNO->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_ORDNO" class="view_pharmacytransfer_ORDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->ORDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->ORDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->ORDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacytransfer->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BRCODE" class="view_pharmacytransfer_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacytransfer->BRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_BRCODE" class="view_pharmacytransfer_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacytransfer->PRC->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PRC" class="view_pharmacytransfer_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacytransfer->PRC->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_PRC" class="view_pharmacytransfer_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->LastMonthSale) == "") { ?>
		<th data-name="LastMonthSale" class="<?php echo $view_pharmacytransfer->LastMonthSale->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_LastMonthSale" class="view_pharmacytransfer_LastMonthSale"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->LastMonthSale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastMonthSale" class="<?php echo $view_pharmacytransfer->LastMonthSale->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_LastMonthSale" class="view_pharmacytransfer_LastMonthSale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->LastMonthSale->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->LastMonthSale->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacytransfer->PrName->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PrName" class="view_pharmacytransfer_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacytransfer->PrName->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_PrName" class="view_pharmacytransfer_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacytransfer->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Quantity" class="view_pharmacytransfer_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacytransfer->Quantity->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_Quantity" class="view_pharmacytransfer_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacytransfer->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BatchNo" class="view_pharmacytransfer_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacytransfer->BatchNo->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_BatchNo" class="view_pharmacytransfer_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacytransfer->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ExpDate" class="view_pharmacytransfer_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacytransfer->ExpDate->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_ExpDate" class="view_pharmacytransfer_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacytransfer->MRP->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_MRP" class="view_pharmacytransfer_MRP"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacytransfer->MRP->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_MRP" class="view_pharmacytransfer_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacytransfer->ItemValue->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ItemValue" class="view_pharmacytransfer_ItemValue"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacytransfer->ItemValue->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_ItemValue" class="view_pharmacytransfer_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->ItemValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->ItemValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->trid->Visible) { // trid ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->trid) == "") { ?>
		<th data-name="trid" class="<?php echo $view_pharmacytransfer->trid->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_trid" class="view_pharmacytransfer_trid"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->trid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="trid" class="<?php echo $view_pharmacytransfer->trid->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_trid" class="view_pharmacytransfer_trid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->trid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->trid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->trid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacytransfer->HospID->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_HospID" class="view_pharmacytransfer_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacytransfer->HospID->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_HospID" class="view_pharmacytransfer_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacytransfer->grncreatedby->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grncreatedby" class="view_pharmacytransfer_grncreatedby"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacytransfer->grncreatedby->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_grncreatedby" class="view_pharmacytransfer_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->grncreatedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->grncreatedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacytransfer->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grncreatedDateTime" class="view_pharmacytransfer_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacytransfer->grncreatedDateTime->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_grncreatedDateTime" class="view_pharmacytransfer_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->grncreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->grncreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacytransfer->grnModifiedby->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grnModifiedby" class="view_pharmacytransfer_grnModifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacytransfer->grnModifiedby->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_grnModifiedby" class="view_pharmacytransfer_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->grnModifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->grnModifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacytransfer->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grnModifiedDateTime" class="view_pharmacytransfer_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacytransfer->grnModifiedDateTime->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_grnModifiedDateTime" class="view_pharmacytransfer_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacytransfer->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BillDate" class="view_pharmacytransfer_BillDate"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacytransfer->BillDate->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_BillDate" class="view_pharmacytransfer_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->CurStock->Visible) { // CurStock ?>
	<?php if ($view_pharmacytransfer->sortUrl($view_pharmacytransfer->CurStock) == "") { ?>
		<th data-name="CurStock" class="<?php echo $view_pharmacytransfer->CurStock->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_CurStock" class="view_pharmacytransfer_CurStock"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer->CurStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CurStock" class="<?php echo $view_pharmacytransfer->CurStock->headerCellClass() ?>"><div><div id="elh_view_pharmacytransfer_CurStock" class="view_pharmacytransfer_CurStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer->CurStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacytransfer->CurStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacytransfer_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_pharmacytransfer_grid->StartRec = 1;
$view_pharmacytransfer_grid->StopRec = $view_pharmacytransfer_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_pharmacytransfer_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacytransfer_grid->FormKeyCountName) && ($view_pharmacytransfer->isGridAdd() || $view_pharmacytransfer->isGridEdit() || $view_pharmacytransfer->isConfirm())) {
		$view_pharmacytransfer_grid->KeyCount = $CurrentForm->getValue($view_pharmacytransfer_grid->FormKeyCountName);
		$view_pharmacytransfer_grid->StopRec = $view_pharmacytransfer_grid->StartRec + $view_pharmacytransfer_grid->KeyCount - 1;
	}
}
$view_pharmacytransfer_grid->RecCnt = $view_pharmacytransfer_grid->StartRec - 1;
if ($view_pharmacytransfer_grid->Recordset && !$view_pharmacytransfer_grid->Recordset->EOF) {
	$view_pharmacytransfer_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacytransfer_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacytransfer_grid->StartRec > 1)
		$view_pharmacytransfer_grid->Recordset->move($view_pharmacytransfer_grid->StartRec - 1);
} elseif (!$view_pharmacytransfer->AllowAddDeleteRow && $view_pharmacytransfer_grid->StopRec == 0) {
	$view_pharmacytransfer_grid->StopRec = $view_pharmacytransfer->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacytransfer->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacytransfer->resetAttributes();
$view_pharmacytransfer_grid->renderRow();
if ($view_pharmacytransfer->isGridAdd())
	$view_pharmacytransfer_grid->RowIndex = 0;
if ($view_pharmacytransfer->isGridEdit())
	$view_pharmacytransfer_grid->RowIndex = 0;
while ($view_pharmacytransfer_grid->RecCnt < $view_pharmacytransfer_grid->StopRec) {
	$view_pharmacytransfer_grid->RecCnt++;
	if ($view_pharmacytransfer_grid->RecCnt >= $view_pharmacytransfer_grid->StartRec) {
		$view_pharmacytransfer_grid->RowCnt++;
		if ($view_pharmacytransfer->isGridAdd() || $view_pharmacytransfer->isGridEdit() || $view_pharmacytransfer->isConfirm()) {
			$view_pharmacytransfer_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacytransfer_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacytransfer_grid->FormActionName) && $view_pharmacytransfer_grid->EventCancelled)
				$view_pharmacytransfer_grid->RowAction = strval($CurrentForm->getValue($view_pharmacytransfer_grid->FormActionName));
			elseif ($view_pharmacytransfer->isGridAdd())
				$view_pharmacytransfer_grid->RowAction = "insert";
			else
				$view_pharmacytransfer_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacytransfer_grid->KeyCount = $view_pharmacytransfer_grid->RowIndex;

		// Init row class and style
		$view_pharmacytransfer->resetAttributes();
		$view_pharmacytransfer->CssClass = "";
		if ($view_pharmacytransfer->isGridAdd()) {
			if ($view_pharmacytransfer->CurrentMode == "copy") {
				$view_pharmacytransfer_grid->loadRowValues($view_pharmacytransfer_grid->Recordset); // Load row values
				$view_pharmacytransfer_grid->setRecordKey($view_pharmacytransfer_grid->RowOldKey, $view_pharmacytransfer_grid->Recordset); // Set old record key
			} else {
				$view_pharmacytransfer_grid->loadRowValues(); // Load default values
				$view_pharmacytransfer_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_pharmacytransfer_grid->loadRowValues($view_pharmacytransfer_grid->Recordset); // Load row values
		}
		$view_pharmacytransfer->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacytransfer->isGridAdd()) // Grid add
			$view_pharmacytransfer->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacytransfer->isGridAdd() && $view_pharmacytransfer->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacytransfer_grid->restoreCurrentRowFormValues($view_pharmacytransfer_grid->RowIndex); // Restore form values
		if ($view_pharmacytransfer->isGridEdit()) { // Grid edit
			if ($view_pharmacytransfer->EventCancelled)
				$view_pharmacytransfer_grid->restoreCurrentRowFormValues($view_pharmacytransfer_grid->RowIndex); // Restore form values
			if ($view_pharmacytransfer_grid->RowAction == "insert")
				$view_pharmacytransfer->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacytransfer->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacytransfer->isGridEdit() && ($view_pharmacytransfer->RowType == ROWTYPE_EDIT || $view_pharmacytransfer->RowType == ROWTYPE_ADD) && $view_pharmacytransfer->EventCancelled) // Update failed
			$view_pharmacytransfer_grid->restoreCurrentRowFormValues($view_pharmacytransfer_grid->RowIndex); // Restore form values
		if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacytransfer_grid->EditRowCnt++;
		if ($view_pharmacytransfer->isConfirm()) // Confirm row
			$view_pharmacytransfer_grid->restoreCurrentRowFormValues($view_pharmacytransfer_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacytransfer->RowAttrs = array_merge($view_pharmacytransfer->RowAttrs, array('data-rowindex'=>$view_pharmacytransfer_grid->RowCnt, 'id'=>'r' . $view_pharmacytransfer_grid->RowCnt . '_view_pharmacytransfer', 'data-rowtype'=>$view_pharmacytransfer->RowType));

		// Render row
		$view_pharmacytransfer_grid->renderRow();

		// Render list options
		$view_pharmacytransfer_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacytransfer_grid->RowAction <> "delete" && $view_pharmacytransfer_grid->RowAction <> "insertdelete" && !($view_pharmacytransfer_grid->RowAction == "insert" && $view_pharmacytransfer->isConfirm() && $view_pharmacytransfer_grid->emptyRow())) {
?>
	<tr<?php echo $view_pharmacytransfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacytransfer_grid->ListOptions->render("body", "left", $view_pharmacytransfer_grid->RowCnt);
?>
	<?php if ($view_pharmacytransfer->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO"<?php echo $view_pharmacytransfer->ORDNO->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_ORDNO" class="view_pharmacytransfer_ORDNO">
<span<?php echo $view_pharmacytransfer->ORDNO->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ORDNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_id" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacytransfer->id->CurrentValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_id" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacytransfer->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT || $view_pharmacytransfer->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_id" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacytransfer->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_pharmacytransfer->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacytransfer->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_BRCODE" class="form-group view_pharmacytransfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacytransfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacytransfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransfergrid.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE","forceSelect":false});
</script>
<?php echo $view_pharmacytransfer->BRCODE->Lookup->getParamTag("p_x" . $view_pharmacytransfer_grid->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_BRCODE" class="form-group view_pharmacytransfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacytransfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacytransfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransfergrid.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE","forceSelect":false});
</script>
<?php echo $view_pharmacytransfer->BRCODE->Lookup->getParamTag("p_x" . $view_pharmacytransfer_grid->RowIndex . "_BRCODE") ?>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_BRCODE" class="view_pharmacytransfer_BRCODE">
<span<?php echo $view_pharmacytransfer->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacytransfer->PRC->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_PRC" class="form-group view_pharmacytransfer_PRC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PRC->EditValue ?>"<?php echo $view_pharmacytransfer->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacytransfer->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_PRC" class="form-group view_pharmacytransfer_PRC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PRC->EditValue ?>"<?php echo $view_pharmacytransfer->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_PRC" class="view_pharmacytransfer_PRC">
<span<?php echo $view_pharmacytransfer->PRC->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacytransfer->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacytransfer->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacytransfer->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacytransfer->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale"<?php echo $view_pharmacytransfer->LastMonthSale->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_LastMonthSale" class="form-group view_pharmacytransfer_LastMonthSale">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacytransfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransfergrid.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_pharmacytransfer->LastMonthSale->Lookup->getParamTag("p_x" . $view_pharmacytransfer_grid->RowIndex . "_LastMonthSale") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_LastMonthSale" class="form-group view_pharmacytransfer_LastMonthSale">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacytransfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransfergrid.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_pharmacytransfer->LastMonthSale->Lookup->getParamTag("p_x" . $view_pharmacytransfer_grid->RowIndex . "_LastMonthSale") ?>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_LastMonthSale" class="view_pharmacytransfer_LastMonthSale">
<span<?php echo $view_pharmacytransfer->LastMonthSale->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->LastMonthSale->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacytransfer->PrName->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_PrName" class="form-group view_pharmacytransfer_PrName">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PrName->EditValue ?>"<?php echo $view_pharmacytransfer->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacytransfer->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_PrName" class="form-group view_pharmacytransfer_PrName">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PrName->EditValue ?>"<?php echo $view_pharmacytransfer->PrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_PrName" class="view_pharmacytransfer_PrName">
<span<?php echo $view_pharmacytransfer->PrName->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacytransfer->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacytransfer->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacytransfer->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacytransfer->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_pharmacytransfer->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_Quantity" class="form-group view_pharmacytransfer_Quantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_Quantity" class="form-group view_pharmacytransfer_Quantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_Quantity" class="view_pharmacytransfer_Quantity">
<span<?php echo $view_pharmacytransfer->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_pharmacytransfer->BatchNo->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_BatchNo" class="form-group view_pharmacytransfer_BatchNo">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_BatchNo" class="form-group view_pharmacytransfer_BatchNo">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_BatchNo" class="view_pharmacytransfer_BatchNo">
<span<?php echo $view_pharmacytransfer->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->BatchNo->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_pharmacytransfer->ExpDate->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_ExpDate" class="form-group view_pharmacytransfer_ExpDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->ExpDate->ReadOnly && !$view_pharmacytransfer->ExpDate->Disabled && !isset($view_pharmacytransfer->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfergrid", "x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_ExpDate" class="form-group view_pharmacytransfer_ExpDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->ExpDate->ReadOnly && !$view_pharmacytransfer->ExpDate->Disabled && !isset($view_pharmacytransfer->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfergrid", "x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_ExpDate" class="view_pharmacytransfer_ExpDate">
<span<?php echo $view_pharmacytransfer->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ExpDate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $view_pharmacytransfer->MRP->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_MRP" class="form-group view_pharmacytransfer_MRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->MRP->EditValue ?>"<?php echo $view_pharmacytransfer->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacytransfer->MRP->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_MRP" class="form-group view_pharmacytransfer_MRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->MRP->EditValue ?>"<?php echo $view_pharmacytransfer->MRP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_MRP" class="view_pharmacytransfer_MRP">
<span<?php echo $view_pharmacytransfer->MRP->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->MRP->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacytransfer->MRP->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacytransfer->MRP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacytransfer->MRP->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacytransfer->MRP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue"<?php echo $view_pharmacytransfer->ItemValue->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_ItemValue" class="form-group view_pharmacytransfer_ItemValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_ItemValue" class="form-group view_pharmacytransfer_ItemValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer->ItemValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_ItemValue" class="view_pharmacytransfer_ItemValue">
<span<?php echo $view_pharmacytransfer->ItemValue->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ItemValue->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->trid->Visible) { // trid ?>
		<td data-name="trid"<?php echo $view_pharmacytransfer->trid->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_pharmacytransfer->trid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer->trid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->trid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->trid->EditValue ?>"<?php echo $view_pharmacytransfer->trid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_pharmacytransfer->trid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer->trid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->trid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->trid->EditValue ?>"<?php echo $view_pharmacytransfer->trid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_trid" class="view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer->trid->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->trid->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacytransfer->HospID->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacytransfer->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_HospID" class="view_pharmacytransfer_HospID">
<span<?php echo $view_pharmacytransfer->HospID->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacytransfer->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacytransfer->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacytransfer->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacytransfer->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby"<?php echo $view_pharmacytransfer->grncreatedby->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_grncreatedby" class="view_pharmacytransfer_grncreatedby">
<span<?php echo $view_pharmacytransfer->grncreatedby->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grncreatedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime"<?php echo $view_pharmacytransfer->grncreatedDateTime->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_grncreatedDateTime" class="view_pharmacytransfer_grncreatedDateTime">
<span<?php echo $view_pharmacytransfer->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grncreatedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby"<?php echo $view_pharmacytransfer->grnModifiedby->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_grnModifiedby" class="view_pharmacytransfer_grnModifiedby">
<span<?php echo $view_pharmacytransfer->grnModifiedby->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grnModifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime"<?php echo $view_pharmacytransfer->grnModifiedDateTime->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_grnModifiedDateTime" class="view_pharmacytransfer_grnModifiedDateTime">
<span<?php echo $view_pharmacytransfer->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grnModifiedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $view_pharmacytransfer->BillDate->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_BillDate" class="form-group view_pharmacytransfer_BillDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->BillDate->ReadOnly && !$view_pharmacytransfer->BillDate->Disabled && !isset($view_pharmacytransfer->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfergrid", "x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_BillDate" class="form-group view_pharmacytransfer_BillDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->BillDate->ReadOnly && !$view_pharmacytransfer->BillDate->Disabled && !isset($view_pharmacytransfer->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfergrid", "x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_BillDate" class="view_pharmacytransfer_BillDate">
<span<?php echo $view_pharmacytransfer->BillDate->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->BillDate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock"<?php echo $view_pharmacytransfer->CurStock->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_CurStock" class="form-group view_pharmacytransfer_CurStock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer->CurStock->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_CurStock" class="form-group view_pharmacytransfer_CurStock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer->CurStock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_grid->RowCnt ?>_view_pharmacytransfer_CurStock" class="view_pharmacytransfer_CurStock">
<span<?php echo $view_pharmacytransfer->CurStock->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->CurStock->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" name="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="fview_pharmacytransfergrid$x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->FormValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" name="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="fview_pharmacytransfergrid$o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacytransfer_grid->ListOptions->render("body", "right", $view_pharmacytransfer_grid->RowCnt);
?>
	</tr>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD || $view_pharmacytransfer->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_pharmacytransfergrid.updateLists(<?php echo $view_pharmacytransfer_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacytransfer->isGridAdd() || $view_pharmacytransfer->CurrentMode == "copy")
		if (!$view_pharmacytransfer_grid->Recordset->EOF)
			$view_pharmacytransfer_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacytransfer->CurrentMode == "add" || $view_pharmacytransfer->CurrentMode == "copy" || $view_pharmacytransfer->CurrentMode == "edit") {
		$view_pharmacytransfer_grid->RowIndex = '$rowindex$';
		$view_pharmacytransfer_grid->loadRowValues();

		// Set row properties
		$view_pharmacytransfer->resetAttributes();
		$view_pharmacytransfer->RowAttrs = array_merge($view_pharmacytransfer->RowAttrs, array('data-rowindex'=>$view_pharmacytransfer_grid->RowIndex, 'id'=>'r0_view_pharmacytransfer', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_pharmacytransfer->RowAttrs["class"], "ew-template");
		$view_pharmacytransfer->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacytransfer_grid->renderRow();

		// Render list options
		$view_pharmacytransfer_grid->renderListOptions();
		$view_pharmacytransfer_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_pharmacytransfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacytransfer_grid->ListOptions->render("body", "left", $view_pharmacytransfer_grid->RowIndex);
?>
	<?php if ($view_pharmacytransfer->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_ORDNO" class="form-group view_pharmacytransfer_ORDNO">
<span<?php echo $view_pharmacytransfer->ORDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->ORDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_BRCODE" class="form-group view_pharmacytransfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacytransfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacytransfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransfergrid.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE","forceSelect":false});
</script>
<?php echo $view_pharmacytransfer->BRCODE->Lookup->getParamTag("p_x" . $view_pharmacytransfer_grid->RowIndex . "_BRCODE") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_BRCODE" class="form-group view_pharmacytransfer_BRCODE">
<span<?php echo $view_pharmacytransfer->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->BRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_PRC" class="form-group view_pharmacytransfer_PRC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PRC->EditValue ?>"<?php echo $view_pharmacytransfer->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_PRC" class="form-group view_pharmacytransfer_PRC">
<span<?php echo $view_pharmacytransfer->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->PRC->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacytransfer->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacytransfer->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_LastMonthSale" class="form-group view_pharmacytransfer_LastMonthSale">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacytransfer_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="sv_x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransfergrid.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_pharmacytransfer->LastMonthSale->Lookup->getParamTag("p_x" . $view_pharmacytransfer_grid->RowIndex . "_LastMonthSale") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_LastMonthSale" class="form-group view_pharmacytransfer_LastMonthSale">
<span<?php echo $view_pharmacytransfer->LastMonthSale->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->LastMonthSale->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_PrName" class="form-group view_pharmacytransfer_PrName">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PrName->EditValue ?>"<?php echo $view_pharmacytransfer->PrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_PrName" class="form-group view_pharmacytransfer_PrName">
<span<?php echo $view_pharmacytransfer->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->PrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacytransfer->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacytransfer->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_Quantity" class="form-group view_pharmacytransfer_Quantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_Quantity" class="form-group view_pharmacytransfer_Quantity">
<span<?php echo $view_pharmacytransfer->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->Quantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_BatchNo" class="form-group view_pharmacytransfer_BatchNo">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer->BatchNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_BatchNo" class="form-group view_pharmacytransfer_BatchNo">
<span<?php echo $view_pharmacytransfer->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->BatchNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_ExpDate" class="form-group view_pharmacytransfer_ExpDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->ExpDate->ReadOnly && !$view_pharmacytransfer->ExpDate->Disabled && !isset($view_pharmacytransfer->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfergrid", "x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_ExpDate" class="form-group view_pharmacytransfer_ExpDate">
<span<?php echo $view_pharmacytransfer->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->ExpDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->MRP->Visible) { // MRP ?>
		<td data-name="MRP">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_MRP" class="form-group view_pharmacytransfer_MRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->MRP->EditValue ?>"<?php echo $view_pharmacytransfer->MRP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_MRP" class="form-group view_pharmacytransfer_MRP">
<span<?php echo $view_pharmacytransfer->MRP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->MRP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacytransfer->MRP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacytransfer->MRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_ItemValue" class="form-group view_pharmacytransfer_ItemValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer->ItemValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_ItemValue" class="form-group view_pharmacytransfer_ItemValue">
<span<?php echo $view_pharmacytransfer->ItemValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->ItemValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->trid->Visible) { // trid ?>
		<td data-name="trid">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<?php if ($view_pharmacytransfer->trid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer->trid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->trid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->trid->EditValue ?>"<?php echo $view_pharmacytransfer->trid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer->trid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->trid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer->trid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_HospID" class="form-group view_pharmacytransfer_HospID">
<span<?php echo $view_pharmacytransfer->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacytransfer->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacytransfer->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_grncreatedby" class="form-group view_pharmacytransfer_grncreatedby">
<span<?php echo $view_pharmacytransfer->grncreatedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->grncreatedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_grncreatedDateTime" class="form-group view_pharmacytransfer_grncreatedDateTime">
<span<?php echo $view_pharmacytransfer->grncreatedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->grncreatedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_grnModifiedby" class="form-group view_pharmacytransfer_grnModifiedby">
<span<?php echo $view_pharmacytransfer->grnModifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->grnModifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_grnModifiedDateTime" class="form-group view_pharmacytransfer_grnModifiedDateTime">
<span<?php echo $view_pharmacytransfer->grnModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->grnModifiedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_BillDate" class="form-group view_pharmacytransfer_BillDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->BillDate->ReadOnly && !$view_pharmacytransfer->BillDate->Disabled && !isset($view_pharmacytransfer->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfergrid", "x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_BillDate" class="form-group view_pharmacytransfer_BillDate">
<span<?php echo $view_pharmacytransfer->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->BillDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock">
<?php if (!$view_pharmacytransfer->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacytransfer_CurStock" class="form-group view_pharmacytransfer_CurStock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer->CurStock->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_CurStock" class="form-group view_pharmacytransfer_CurStock">
<span<?php echo $view_pharmacytransfer->CurStock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacytransfer->CurStock->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="x<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" name="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" id="o<?php echo $view_pharmacytransfer_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacytransfer_grid->ListOptions->render("body", "right", $view_pharmacytransfer_grid->RowIndex);
?>
<script>
fview_pharmacytransfergrid.updateLists(<?php echo $view_pharmacytransfer_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($view_pharmacytransfer->CurrentMode == "add" || $view_pharmacytransfer->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_pharmacytransfer_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacytransfer_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacytransfer_grid->KeyCount ?>">
<?php echo $view_pharmacytransfer_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacytransfer->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_pharmacytransfer_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacytransfer_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacytransfer_grid->KeyCount ?>">
<?php echo $view_pharmacytransfer_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacytransfer->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_pharmacytransfergrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_pharmacytransfer_grid->Recordset)
	$view_pharmacytransfer_grid->Recordset->Close();
?>
</div>
<?php if ($view_pharmacytransfer_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacytransfer_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacytransfer_grid->TotalRecs == 0 && !$view_pharmacytransfer->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacytransfer_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacytransfer_grid->terminate();
?>
<?php if (!$view_pharmacytransfer->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacytransfer", "95%", "");
</script>
<?php } ?>
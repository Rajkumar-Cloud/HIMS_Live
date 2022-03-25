<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($pharmacy_purchaseorder_grid))
	$pharmacy_purchaseorder_grid = new pharmacy_purchaseorder_grid();

// Run the page
$pharmacy_purchaseorder_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchaseorder_grid->Page_Render();
?>
<?php if (!$pharmacy_purchaseorder->isExport()) { ?>
<script>

// Form object
var fpharmacy_purchaseordergrid = new ew.Form("fpharmacy_purchaseordergrid", "grid");
fpharmacy_purchaseordergrid.formKeyCountName = '<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>';

// Validate form
fpharmacy_purchaseordergrid.validate = function() {
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
		<?php if ($pharmacy_purchaseorder_grid->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->PRC->caption(), $pharmacy_purchaseorder->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_grid->QTY->Required) { ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->QTY->caption(), $pharmacy_purchaseorder->QTY->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_QTY");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->QTY->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_grid->Stock->Required) { ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->Stock->caption(), $pharmacy_purchaseorder->Stock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Stock");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->Stock->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_grid->LastMonthSale->Required) { ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->LastMonthSale->caption(), $pharmacy_purchaseorder->LastMonthSale->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LastMonthSale");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->LastMonthSale->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->HospID->caption(), $pharmacy_purchaseorder->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_grid->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->CreatedBy->caption(), $pharmacy_purchaseorder->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_grid->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->CreatedDateTime->caption(), $pharmacy_purchaseorder->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_grid->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->ModifiedBy->caption(), $pharmacy_purchaseorder->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_grid->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->ModifiedDateTime->caption(), $pharmacy_purchaseorder->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_grid->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->BillDate->caption(), $pharmacy_purchaseorder->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->BillDate->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_grid->CurStock->Required) { ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->CurStock->caption(), $pharmacy_purchaseorder->CurStock->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CurStock");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->CurStock->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_grid->grndate->Required) { ?>
			elm = this.getElements("x" + infix + "_grndate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->grndate->caption(), $pharmacy_purchaseorder->grndate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_grid->grndatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_grndatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->grndatetime->caption(), $pharmacy_purchaseorder->grndatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchaseorder_grid->strid->Required) { ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->strid->caption(), $pharmacy_purchaseorder->strid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_strid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->strid->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_grid->GRNPer->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->GRNPer->caption(), $pharmacy_purchaseorder->GRNPer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNPer");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->GRNPer->errorMessage()) ?>");
		<?php if ($pharmacy_purchaseorder_grid->FreeQtyyy->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder->FreeQtyyy->caption(), $pharmacy_purchaseorder->FreeQtyyy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FreeQtyyy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder->FreeQtyyy->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpharmacy_purchaseordergrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "QTY", false)) return false;
	if (ew.valueChanged(fobj, infix, "Stock", false)) return false;
	if (ew.valueChanged(fobj, infix, "LastMonthSale", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "CurStock", false)) return false;
	if (ew.valueChanged(fobj, infix, "strid", false)) return false;
	if (ew.valueChanged(fobj, infix, "GRNPer", false)) return false;
	if (ew.valueChanged(fobj, infix, "FreeQtyyy", false)) return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_purchaseordergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchaseordergrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_purchaseordergrid.lists["x_PRC"] = <?php echo $pharmacy_purchaseorder_grid->PRC->Lookup->toClientList() ?>;
fpharmacy_purchaseordergrid.lists["x_PRC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_grid->PRC->lookupOptions()) ?>;
fpharmacy_purchaseordergrid.autoSuggests["x_PRC"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$pharmacy_purchaseorder_grid->renderOtherOptions();
?>
<?php $pharmacy_purchaseorder_grid->showPageHeader(); ?>
<?php
$pharmacy_purchaseorder_grid->showMessage();
?>
<?php if ($pharmacy_purchaseorder_grid->TotalRecs > 0 || $pharmacy_purchaseorder->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_purchaseorder_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchaseorder">
<?php if ($pharmacy_purchaseorder_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $pharmacy_purchaseorder_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_purchaseordergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_purchaseorder" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_purchaseordergrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_purchaseorder_grid->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_purchaseorder_grid->renderListOptions();

// Render list options (header, left)
$pharmacy_purchaseorder_grid->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchaseorder->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchaseorder->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchaseorder->PRC->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->QTY->Visible) { // QTY ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->QTY) == "") { ?>
		<th data-name="QTY" class="<?php echo $pharmacy_purchaseorder->QTY->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->QTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QTY" class="<?php echo $pharmacy_purchaseorder->QTY->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->QTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->QTY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->QTY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Stock->Visible) { // Stock ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $pharmacy_purchaseorder->Stock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $pharmacy_purchaseorder->Stock->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->Stock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->Stock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->LastMonthSale) == "") { ?>
		<th data-name="LastMonthSale" class="<?php echo $pharmacy_purchaseorder->LastMonthSale->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->LastMonthSale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastMonthSale" class="<?php echo $pharmacy_purchaseorder->LastMonthSale->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->LastMonthSale->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->LastMonthSale->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchaseorder->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchaseorder->HospID->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $pharmacy_purchaseorder->CreatedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $pharmacy_purchaseorder->CreatedBy->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $pharmacy_purchaseorder->CreatedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $pharmacy_purchaseorder->CreatedDateTime->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->CreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->CreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $pharmacy_purchaseorder->ModifiedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $pharmacy_purchaseorder->ModifiedBy->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $pharmacy_purchaseorder->ModifiedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->ModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $pharmacy_purchaseorder->ModifiedDateTime->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->ModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->ModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->BillDate->Visible) { // BillDate ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $pharmacy_purchaseorder->BillDate->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $pharmacy_purchaseorder->BillDate->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurStock->Visible) { // CurStock ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->CurStock) == "") { ?>
		<th data-name="CurStock" class="<?php echo $pharmacy_purchaseorder->CurStock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->CurStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CurStock" class="<?php echo $pharmacy_purchaseorder->CurStock->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->CurStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->CurStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndate->Visible) { // grndate ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->grndate) == "") { ?>
		<th data-name="grndate" class="<?php echo $pharmacy_purchaseorder->grndate->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_grndate" class="pharmacy_purchaseorder_grndate"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->grndate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndate" class="<?php echo $pharmacy_purchaseorder->grndate->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_grndate" class="pharmacy_purchaseorder_grndate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->grndate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->grndate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->grndate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndatetime->Visible) { // grndatetime ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->grndatetime) == "") { ?>
		<th data-name="grndatetime" class="<?php echo $pharmacy_purchaseorder->grndatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_grndatetime" class="pharmacy_purchaseorder_grndatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->grndatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndatetime" class="<?php echo $pharmacy_purchaseorder->grndatetime->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_grndatetime" class="pharmacy_purchaseorder_grndatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->grndatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->grndatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->grndatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->strid->Visible) { // strid ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->strid) == "") { ?>
		<th data-name="strid" class="<?php echo $pharmacy_purchaseorder->strid->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_strid" class="pharmacy_purchaseorder_strid"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->strid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="strid" class="<?php echo $pharmacy_purchaseorder->strid->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_strid" class="pharmacy_purchaseorder_strid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->strid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->strid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->strid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GRNPer->Visible) { // GRNPer ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->GRNPer) == "") { ?>
		<th data-name="GRNPer" class="<?php echo $pharmacy_purchaseorder->GRNPer->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_GRNPer" class="pharmacy_purchaseorder_GRNPer"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->GRNPer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNPer" class="<?php echo $pharmacy_purchaseorder->GRNPer->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_GRNPer" class="pharmacy_purchaseorder_GRNPer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->GRNPer->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->GRNPer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->GRNPer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<?php if ($pharmacy_purchaseorder->sortUrl($pharmacy_purchaseorder->FreeQtyyy) == "") { ?>
		<th data-name="FreeQtyyy" class="<?php echo $pharmacy_purchaseorder->FreeQtyyy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_FreeQtyyy" class="pharmacy_purchaseorder_FreeQtyyy"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->FreeQtyyy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQtyyy" class="<?php echo $pharmacy_purchaseorder->FreeQtyyy->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_FreeQtyyy" class="pharmacy_purchaseorder_FreeQtyyy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder->FreeQtyyy->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder->FreeQtyyy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder->FreeQtyyy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchaseorder_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$pharmacy_purchaseorder_grid->StartRec = 1;
$pharmacy_purchaseorder_grid->StopRec = $pharmacy_purchaseorder_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $pharmacy_purchaseorder_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_purchaseorder_grid->FormKeyCountName) && ($pharmacy_purchaseorder->isGridAdd() || $pharmacy_purchaseorder->isGridEdit() || $pharmacy_purchaseorder->isConfirm())) {
		$pharmacy_purchaseorder_grid->KeyCount = $CurrentForm->getValue($pharmacy_purchaseorder_grid->FormKeyCountName);
		$pharmacy_purchaseorder_grid->StopRec = $pharmacy_purchaseorder_grid->StartRec + $pharmacy_purchaseorder_grid->KeyCount - 1;
	}
}
$pharmacy_purchaseorder_grid->RecCnt = $pharmacy_purchaseorder_grid->StartRec - 1;
if ($pharmacy_purchaseorder_grid->Recordset && !$pharmacy_purchaseorder_grid->Recordset->EOF) {
	$pharmacy_purchaseorder_grid->Recordset->moveFirst();
	$selectLimit = $pharmacy_purchaseorder_grid->UseSelectLimit;
	if (!$selectLimit && $pharmacy_purchaseorder_grid->StartRec > 1)
		$pharmacy_purchaseorder_grid->Recordset->move($pharmacy_purchaseorder_grid->StartRec - 1);
} elseif (!$pharmacy_purchaseorder->AllowAddDeleteRow && $pharmacy_purchaseorder_grid->StopRec == 0) {
	$pharmacy_purchaseorder_grid->StopRec = $pharmacy_purchaseorder->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_purchaseorder->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_purchaseorder->resetAttributes();
$pharmacy_purchaseorder_grid->renderRow();
if ($pharmacy_purchaseorder->isGridAdd())
	$pharmacy_purchaseorder_grid->RowIndex = 0;
if ($pharmacy_purchaseorder->isGridEdit())
	$pharmacy_purchaseorder_grid->RowIndex = 0;
while ($pharmacy_purchaseorder_grid->RecCnt < $pharmacy_purchaseorder_grid->StopRec) {
	$pharmacy_purchaseorder_grid->RecCnt++;
	if ($pharmacy_purchaseorder_grid->RecCnt >= $pharmacy_purchaseorder_grid->StartRec) {
		$pharmacy_purchaseorder_grid->RowCnt++;
		if ($pharmacy_purchaseorder->isGridAdd() || $pharmacy_purchaseorder->isGridEdit() || $pharmacy_purchaseorder->isConfirm()) {
			$pharmacy_purchaseorder_grid->RowIndex++;
			$CurrentForm->Index = $pharmacy_purchaseorder_grid->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_purchaseorder_grid->FormActionName) && $pharmacy_purchaseorder_grid->EventCancelled)
				$pharmacy_purchaseorder_grid->RowAction = strval($CurrentForm->getValue($pharmacy_purchaseorder_grid->FormActionName));
			elseif ($pharmacy_purchaseorder->isGridAdd())
				$pharmacy_purchaseorder_grid->RowAction = "insert";
			else
				$pharmacy_purchaseorder_grid->RowAction = "";
		}

		// Set up key count
		$pharmacy_purchaseorder_grid->KeyCount = $pharmacy_purchaseorder_grid->RowIndex;

		// Init row class and style
		$pharmacy_purchaseorder->resetAttributes();
		$pharmacy_purchaseorder->CssClass = "";
		if ($pharmacy_purchaseorder->isGridAdd()) {
			if ($pharmacy_purchaseorder->CurrentMode == "copy") {
				$pharmacy_purchaseorder_grid->loadRowValues($pharmacy_purchaseorder_grid->Recordset); // Load row values
				$pharmacy_purchaseorder_grid->setRecordKey($pharmacy_purchaseorder_grid->RowOldKey, $pharmacy_purchaseorder_grid->Recordset); // Set old record key
			} else {
				$pharmacy_purchaseorder_grid->loadRowValues(); // Load default values
				$pharmacy_purchaseorder_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$pharmacy_purchaseorder_grid->loadRowValues($pharmacy_purchaseorder_grid->Recordset); // Load row values
		}
		$pharmacy_purchaseorder->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_purchaseorder->isGridAdd()) // Grid add
			$pharmacy_purchaseorder->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_purchaseorder->isGridAdd() && $pharmacy_purchaseorder->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_purchaseorder_grid->restoreCurrentRowFormValues($pharmacy_purchaseorder_grid->RowIndex); // Restore form values
		if ($pharmacy_purchaseorder->isGridEdit()) { // Grid edit
			if ($pharmacy_purchaseorder->EventCancelled)
				$pharmacy_purchaseorder_grid->restoreCurrentRowFormValues($pharmacy_purchaseorder_grid->RowIndex); // Restore form values
			if ($pharmacy_purchaseorder_grid->RowAction == "insert")
				$pharmacy_purchaseorder->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_purchaseorder->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_purchaseorder->isGridEdit() && ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT || $pharmacy_purchaseorder->RowType == ROWTYPE_ADD) && $pharmacy_purchaseorder->EventCancelled) // Update failed
			$pharmacy_purchaseorder_grid->restoreCurrentRowFormValues($pharmacy_purchaseorder_grid->RowIndex); // Restore form values
		if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_purchaseorder_grid->EditRowCnt++;
		if ($pharmacy_purchaseorder->isConfirm()) // Confirm row
			$pharmacy_purchaseorder_grid->restoreCurrentRowFormValues($pharmacy_purchaseorder_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$pharmacy_purchaseorder->RowAttrs = array_merge($pharmacy_purchaseorder->RowAttrs, array('data-rowindex'=>$pharmacy_purchaseorder_grid->RowCnt, 'id'=>'r' . $pharmacy_purchaseorder_grid->RowCnt . '_pharmacy_purchaseorder', 'data-rowtype'=>$pharmacy_purchaseorder->RowType));

		// Render row
		$pharmacy_purchaseorder_grid->renderRow();

		// Render list options
		$pharmacy_purchaseorder_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_purchaseorder_grid->RowAction <> "delete" && $pharmacy_purchaseorder_grid->RowAction <> "insertdelete" && !($pharmacy_purchaseorder_grid->RowAction == "insert" && $pharmacy_purchaseorder->isConfirm() && $pharmacy_purchaseorder_grid->emptyRow())) {
?>
	<tr<?php echo $pharmacy_purchaseorder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchaseorder_grid->ListOptions->render("body", "left", $pharmacy_purchaseorder_grid->RowCnt);
?>
	<?php if ($pharmacy_purchaseorder->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $pharmacy_purchaseorder->PRC->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<?php
$wrkonchange = "" . trim(@$pharmacy_purchaseorder->PRC->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_purchaseorder->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_purchaseorder_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder->PRC->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_purchaseordergrid.createAutoSuggest({"id":"x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC","forceSelect":true});
</script>
<?php echo $pharmacy_purchaseorder->PRC->Lookup->getParamTag("p_x" . $pharmacy_purchaseorder_grid->RowIndex . "_PRC") ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<?php
$wrkonchange = "" . trim(@$pharmacy_purchaseorder->PRC->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_purchaseorder->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_purchaseorder_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder->PRC->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_purchaseordergrid.createAutoSuggest({"id":"x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC","forceSelect":true});
</script>
<?php echo $pharmacy_purchaseorder->PRC->Lookup->getParamTag("p_x" . $pharmacy_purchaseorder_grid->RowIndex . "_PRC") ?>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC">
<span<?php echo $pharmacy_purchaseorder->PRC->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->PRC->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder->id->CurrentValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT || $pharmacy_purchaseorder->CurrentMode == "edit") { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($pharmacy_purchaseorder->QTY->Visible) { // QTY ?>
		<td data-name="QTY"<?php echo $pharmacy_purchaseorder->QTY->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder->QTY->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder->QTY->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY">
<span<?php echo $pharmacy_purchaseorder->QTY->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->QTY->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->Stock->Visible) { // Stock ?>
		<td data-name="Stock"<?php echo $pharmacy_purchaseorder->Stock->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder->Stock->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder->Stock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock">
<span<?php echo $pharmacy_purchaseorder->Stock->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->Stock->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale"<?php echo $pharmacy_purchaseorder->LastMonthSale->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder->LastMonthSale->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale">
<span<?php echo $pharmacy_purchaseorder->LastMonthSale->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->LastMonthSale->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $pharmacy_purchaseorder->HospID->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID">
<span<?php echo $pharmacy_purchaseorder->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->HospID->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder->HospID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder->HospID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $pharmacy_purchaseorder->CreatedBy->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy">
<span<?php echo $pharmacy_purchaseorder->CreatedBy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CreatedBy->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime"<?php echo $pharmacy_purchaseorder->CreatedDateTime->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime">
<span<?php echo $pharmacy_purchaseorder->CreatedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CreatedDateTime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $pharmacy_purchaseorder->ModifiedBy->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy">
<span<?php echo $pharmacy_purchaseorder->ModifiedBy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->ModifiedBy->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime"<?php echo $pharmacy_purchaseorder->ModifiedDateTime->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder->ModifiedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->ModifiedDateTime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $pharmacy_purchaseorder->BillDate->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder->BillDate->ReadOnly && !$pharmacy_purchaseorder->BillDate->Disabled && !isset($pharmacy_purchaseorder->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_purchaseordergrid", "x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder->BillDate->ReadOnly && !$pharmacy_purchaseorder->BillDate->Disabled && !isset($pharmacy_purchaseorder->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_purchaseordergrid", "x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate">
<span<?php echo $pharmacy_purchaseorder->BillDate->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->BillDate->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock"<?php echo $pharmacy_purchaseorder->CurStock->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder->CurStock->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder->CurStock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock">
<span<?php echo $pharmacy_purchaseorder->CurStock->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CurStock->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->grndate->Visible) { // grndate ?>
		<td data-name="grndate"<?php echo $pharmacy_purchaseorder->grndate->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_grndate" class="pharmacy_purchaseorder_grndate">
<span<?php echo $pharmacy_purchaseorder->grndate->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grndate->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime"<?php echo $pharmacy_purchaseorder->grndatetime->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_grndatetime" class="pharmacy_purchaseorder_grndatetime">
<span<?php echo $pharmacy_purchaseorder->grndatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grndatetime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->strid->Visible) { // strid ?>
		<td data-name="strid"<?php echo $pharmacy_purchaseorder->strid->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_strid" class="form-group pharmacy_purchaseorder_strid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->strid->EditValue ?>"<?php echo $pharmacy_purchaseorder->strid->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_strid" class="form-group pharmacy_purchaseorder_strid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->strid->EditValue ?>"<?php echo $pharmacy_purchaseorder->strid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_strid" class="pharmacy_purchaseorder_strid">
<span<?php echo $pharmacy_purchaseorder->strid->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->strid->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->GRNPer->Visible) { // GRNPer ?>
		<td data-name="GRNPer"<?php echo $pharmacy_purchaseorder->GRNPer->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_GRNPer" class="form-group pharmacy_purchaseorder_GRNPer">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->GRNPer->EditValue ?>"<?php echo $pharmacy_purchaseorder->GRNPer->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_GRNPer" class="form-group pharmacy_purchaseorder_GRNPer">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->GRNPer->EditValue ?>"<?php echo $pharmacy_purchaseorder->GRNPer->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_GRNPer" class="pharmacy_purchaseorder_GRNPer">
<span<?php echo $pharmacy_purchaseorder->GRNPer->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->GRNPer->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy"<?php echo $pharmacy_purchaseorder->FreeQtyyy->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_FreeQtyyy" class="form-group pharmacy_purchaseorder_FreeQtyyy">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->FreeQtyyy->EditValue ?>"<?php echo $pharmacy_purchaseorder->FreeQtyyy->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_FreeQtyyy" class="form-group pharmacy_purchaseorder_FreeQtyyy">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->FreeQtyyy->EditValue ?>"<?php echo $pharmacy_purchaseorder->FreeQtyyy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCnt ?>_pharmacy_purchaseorder_FreeQtyyy" class="pharmacy_purchaseorder_FreeQtyyy">
<span<?php echo $pharmacy_purchaseorder->FreeQtyyy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->FreeQtyyy->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchaseorder_grid->ListOptions->render("body", "right", $pharmacy_purchaseorder_grid->RowCnt);
?>
	</tr>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD || $pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_purchaseordergrid.updateLists(<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_purchaseorder->isGridAdd() || $pharmacy_purchaseorder->CurrentMode == "copy")
		if (!$pharmacy_purchaseorder_grid->Recordset->EOF)
			$pharmacy_purchaseorder_grid->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_purchaseorder->CurrentMode == "add" || $pharmacy_purchaseorder->CurrentMode == "copy" || $pharmacy_purchaseorder->CurrentMode == "edit") {
		$pharmacy_purchaseorder_grid->RowIndex = '$rowindex$';
		$pharmacy_purchaseorder_grid->loadRowValues();

		// Set row properties
		$pharmacy_purchaseorder->resetAttributes();
		$pharmacy_purchaseorder->RowAttrs = array_merge($pharmacy_purchaseorder->RowAttrs, array('data-rowindex'=>$pharmacy_purchaseorder_grid->RowIndex, 'id'=>'r0_pharmacy_purchaseorder', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_purchaseorder->RowAttrs["class"], "ew-template");
		$pharmacy_purchaseorder->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_purchaseorder_grid->renderRow();

		// Render list options
		$pharmacy_purchaseorder_grid->renderListOptions();
		$pharmacy_purchaseorder_grid->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_purchaseorder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchaseorder_grid->ListOptions->render("body", "left", $pharmacy_purchaseorder_grid->RowIndex);
?>
	<?php if ($pharmacy_purchaseorder->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<?php
$wrkonchange = "" . trim(@$pharmacy_purchaseorder->PRC->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_purchaseorder->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_purchaseorder_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder->PRC->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_purchaseordergrid.createAutoSuggest({"id":"x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC","forceSelect":true});
</script>
<?php echo $pharmacy_purchaseorder->PRC->Lookup->getParamTag("p_x" . $pharmacy_purchaseorder_grid->RowIndex . "_PRC") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<span<?php echo $pharmacy_purchaseorder->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->PRC->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->QTY->Visible) { // QTY ?>
		<td data-name="QTY">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder->QTY->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<span<?php echo $pharmacy_purchaseorder->QTY->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->QTY->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder->QTY->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->Stock->Visible) { // Stock ?>
		<td data-name="Stock">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder->Stock->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<span<?php echo $pharmacy_purchaseorder->Stock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->Stock->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->Stock->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder->LastMonthSale->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<span<?php echo $pharmacy_purchaseorder->LastMonthSale->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->LastMonthSale->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder->LastMonthSale->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_HospID" class="form-group pharmacy_purchaseorder_HospID">
<span<?php echo $pharmacy_purchaseorder->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CreatedBy" class="form-group pharmacy_purchaseorder_CreatedBy">
<span<?php echo $pharmacy_purchaseorder->CreatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->CreatedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CreatedDateTime" class="form-group pharmacy_purchaseorder_CreatedDateTime">
<span<?php echo $pharmacy_purchaseorder->CreatedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->CreatedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CreatedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_ModifiedBy" class="form-group pharmacy_purchaseorder_ModifiedBy">
<span<?php echo $pharmacy_purchaseorder->ModifiedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->ModifiedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_ModifiedDateTime" class="form-group pharmacy_purchaseorder_ModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder->ModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->ModifiedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->ModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder->BillDate->ReadOnly && !$pharmacy_purchaseorder->BillDate->Disabled && !isset($pharmacy_purchaseorder->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_purchaseordergrid", "x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<span<?php echo $pharmacy_purchaseorder->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->BillDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder->CurStock->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<span<?php echo $pharmacy_purchaseorder->CurStock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->CurStock->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder->CurStock->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->grndate->Visible) { // grndate ?>
		<td data-name="grndate">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_grndate" class="form-group pharmacy_purchaseorder_grndate">
<span<?php echo $pharmacy_purchaseorder->grndate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->grndate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndate" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_grndatetime" class="form-group pharmacy_purchaseorder_grndatetime">
<span<?php echo $pharmacy_purchaseorder->grndatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->grndatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_grndatetime" value="<?php echo HtmlEncode($pharmacy_purchaseorder->grndatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->strid->Visible) { // strid ?>
		<td data-name="strid">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_strid" class="form-group pharmacy_purchaseorder_strid">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->strid->EditValue ?>"<?php echo $pharmacy_purchaseorder->strid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_strid" class="form-group pharmacy_purchaseorder_strid">
<span<?php echo $pharmacy_purchaseorder->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->strid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_strid" value="<?php echo HtmlEncode($pharmacy_purchaseorder->strid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->GRNPer->Visible) { // GRNPer ?>
		<td data-name="GRNPer">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_GRNPer" class="form-group pharmacy_purchaseorder_GRNPer">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->GRNPer->EditValue ?>"<?php echo $pharmacy_purchaseorder->GRNPer->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_GRNPer" class="form-group pharmacy_purchaseorder_GRNPer">
<span<?php echo $pharmacy_purchaseorder->GRNPer->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->GRNPer->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_GRNPer" value="<?php echo HtmlEncode($pharmacy_purchaseorder->GRNPer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_FreeQtyyy" class="form-group pharmacy_purchaseorder_FreeQtyyy">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder->FreeQtyyy->EditValue ?>"<?php echo $pharmacy_purchaseorder->FreeQtyyy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_FreeQtyyy" class="form-group pharmacy_purchaseorder_FreeQtyyy">
<span<?php echo $pharmacy_purchaseorder->FreeQtyyy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchaseorder->FreeQtyyy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_FreeQtyyy" value="<?php echo HtmlEncode($pharmacy_purchaseorder->FreeQtyyy->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchaseorder_grid->ListOptions->render("body", "right", $pharmacy_purchaseorder_grid->RowIndex);
?>
<script>
fpharmacy_purchaseordergrid.updateLists(<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($pharmacy_purchaseorder->CurrentMode == "add" || $pharmacy_purchaseorder->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_purchaseorder_grid->KeyCount ?>">
<?php echo $pharmacy_purchaseorder_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_purchaseorder_grid->KeyCount ?>">
<?php echo $pharmacy_purchaseorder_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpharmacy_purchaseordergrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($pharmacy_purchaseorder_grid->Recordset)
	$pharmacy_purchaseorder_grid->Recordset->Close();
?>
</div>
<?php if ($pharmacy_purchaseorder_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $pharmacy_purchaseorder_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->TotalRecs == 0 && !$pharmacy_purchaseorder->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchaseorder_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_purchaseorder_grid->terminate();
?>
<?php if (!$pharmacy_purchaseorder->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_purchaseorder", "95%", "");
</script>
<?php } ?>
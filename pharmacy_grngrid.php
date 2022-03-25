<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($pharmacy_grn_grid))
	$pharmacy_grn_grid = new pharmacy_grn_grid();

// Run the page
$pharmacy_grn_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_grn_grid->Page_Render();
?>
<?php if (!$pharmacy_grn->isExport()) { ?>
<script>

// Form object
var fpharmacy_grngrid = new ew.Form("fpharmacy_grngrid", "grid");
fpharmacy_grngrid.formKeyCountName = '<?php echo $pharmacy_grn_grid->FormKeyCountName ?>';

// Validate form
fpharmacy_grngrid.validate = function() {
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
		<?php if ($pharmacy_grn_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->id->caption(), $pharmacy_grn->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_grn_grid->GRNNO->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->GRNNO->caption(), $pharmacy_grn->GRNNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_grn_grid->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->DT->caption(), $pharmacy_grn->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->DT->errorMessage()) ?>");
		<?php if ($pharmacy_grn_grid->Customername->Required) { ?>
			elm = this.getElements("x" + infix + "_Customername");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->Customername->caption(), $pharmacy_grn->Customername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_grn_grid->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->State->caption(), $pharmacy_grn->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_grn_grid->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->Pincode->caption(), $pharmacy_grn->Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_grn_grid->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->Phone->caption(), $pharmacy_grn->Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_grn_grid->BILLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->BILLNO->caption(), $pharmacy_grn->BILLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_grn_grid->BILLDT->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->BILLDT->caption(), $pharmacy_grn->BILLDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->BILLDT->errorMessage()) ?>");
		<?php if ($pharmacy_grn_grid->BillTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->BillTotalValue->caption(), $pharmacy_grn->BillTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->BillTotalValue->errorMessage()) ?>");
		<?php if ($pharmacy_grn_grid->GRNTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->GRNTotalValue->caption(), $pharmacy_grn->GRNTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->GRNTotalValue->errorMessage()) ?>");
		<?php if ($pharmacy_grn_grid->BillDiscount->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->BillDiscount->caption(), $pharmacy_grn->BillDiscount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->BillDiscount->errorMessage()) ?>");
		<?php if ($pharmacy_grn_grid->GrnValue->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->GrnValue->caption(), $pharmacy_grn->GrnValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->GrnValue->errorMessage()) ?>");
		<?php if ($pharmacy_grn_grid->Pid->Required) { ?>
			elm = this.getElements("x" + infix + "_Pid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->Pid->caption(), $pharmacy_grn->Pid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Pid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->Pid->errorMessage()) ?>");
		<?php if ($pharmacy_grn_grid->PaymentNo->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->PaymentNo->caption(), $pharmacy_grn->PaymentNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_grn_grid->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->PaymentStatus->caption(), $pharmacy_grn->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_grn_grid->PaidAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn->PaidAmount->caption(), $pharmacy_grn->PaidAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->PaidAmount->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpharmacy_grngrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "GRNNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "DT", false)) return false;
	if (ew.valueChanged(fobj, infix, "Customername", false)) return false;
	if (ew.valueChanged(fobj, infix, "State", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pincode", false)) return false;
	if (ew.valueChanged(fobj, infix, "Phone", false)) return false;
	if (ew.valueChanged(fobj, infix, "BILLNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "BILLDT", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillTotalValue", false)) return false;
	if (ew.valueChanged(fobj, infix, "GRNTotalValue", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillDiscount", false)) return false;
	if (ew.valueChanged(fobj, infix, "GrnValue", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pid", false)) return false;
	if (ew.valueChanged(fobj, infix, "PaymentNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "PaymentStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "PaidAmount", false)) return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_grngrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_grngrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$pharmacy_grn_grid->renderOtherOptions();
?>
<?php $pharmacy_grn_grid->showPageHeader(); ?>
<?php
$pharmacy_grn_grid->showMessage();
?>
<?php if ($pharmacy_grn_grid->TotalRecs > 0 || $pharmacy_grn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_grn_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_grn">
<?php if ($pharmacy_grn_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $pharmacy_grn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_grngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_grn" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_grngrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_grn_grid->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_grn_grid->renderListOptions();

// Render list options (header, left)
$pharmacy_grn_grid->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_grn->id->Visible) { // id ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_grn->id->headerCellClass() ?>"><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_grn->id->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $pharmacy_grn->GRNNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $pharmacy_grn->GRNNO->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->GRNNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->GRNNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_grn->DT->headerCellClass() ?>"><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_grn->DT->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_grn->Customername->headerCellClass() ?>"><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_grn->Customername->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_grn->State->headerCellClass() ?>"><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_grn->State->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_grn->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_grn->Pincode->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->Pincode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_grn->Phone->headerCellClass() ?>"><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_grn->Phone->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->Phone->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $pharmacy_grn->BILLNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $pharmacy_grn->BILLNO->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->BILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->BILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $pharmacy_grn->BILLDT->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $pharmacy_grn->BILLDT->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->BILLDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->BILLDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->BillTotalValue) == "") { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_grn->BillTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->BillTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_grn->BillTotalValue->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->BillTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->BillTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->GRNTotalValue) == "") { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_grn->GRNTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_grn->GRNTotalValue->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->GRNTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->GRNTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->BillDiscount) == "") { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_grn->BillDiscount->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->BillDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_grn->BillDiscount->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->BillDiscount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->BillDiscount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->GrnValue) == "") { ?>
		<th data-name="GrnValue" class="<?php echo $pharmacy_grn->GrnValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->GrnValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnValue" class="<?php echo $pharmacy_grn->GrnValue->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->GrnValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->GrnValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->GrnValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->Pid) == "") { ?>
		<th data-name="Pid" class="<?php echo $pharmacy_grn->Pid->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->Pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pid" class="<?php echo $pharmacy_grn->Pid->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->Pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->Pid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->Pid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->PaymentNo) == "") { ?>
		<th data-name="PaymentNo" class="<?php echo $pharmacy_grn->PaymentNo->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentNo" class="<?php echo $pharmacy_grn->PaymentNo->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->PaymentNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->PaymentNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $pharmacy_grn->PaymentStatus->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $pharmacy_grn->PaymentStatus->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_grn->PaidAmount->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_grn->PaidAmount->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_grn_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$pharmacy_grn_grid->StartRec = 1;
$pharmacy_grn_grid->StopRec = $pharmacy_grn_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $pharmacy_grn_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_grn_grid->FormKeyCountName) && ($pharmacy_grn->isGridAdd() || $pharmacy_grn->isGridEdit() || $pharmacy_grn->isConfirm())) {
		$pharmacy_grn_grid->KeyCount = $CurrentForm->getValue($pharmacy_grn_grid->FormKeyCountName);
		$pharmacy_grn_grid->StopRec = $pharmacy_grn_grid->StartRec + $pharmacy_grn_grid->KeyCount - 1;
	}
}
$pharmacy_grn_grid->RecCnt = $pharmacy_grn_grid->StartRec - 1;
if ($pharmacy_grn_grid->Recordset && !$pharmacy_grn_grid->Recordset->EOF) {
	$pharmacy_grn_grid->Recordset->moveFirst();
	$selectLimit = $pharmacy_grn_grid->UseSelectLimit;
	if (!$selectLimit && $pharmacy_grn_grid->StartRec > 1)
		$pharmacy_grn_grid->Recordset->move($pharmacy_grn_grid->StartRec - 1);
} elseif (!$pharmacy_grn->AllowAddDeleteRow && $pharmacy_grn_grid->StopRec == 0) {
	$pharmacy_grn_grid->StopRec = $pharmacy_grn->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_grn->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_grn->resetAttributes();
$pharmacy_grn_grid->renderRow();
if ($pharmacy_grn->isGridAdd())
	$pharmacy_grn_grid->RowIndex = 0;
if ($pharmacy_grn->isGridEdit())
	$pharmacy_grn_grid->RowIndex = 0;
while ($pharmacy_grn_grid->RecCnt < $pharmacy_grn_grid->StopRec) {
	$pharmacy_grn_grid->RecCnt++;
	if ($pharmacy_grn_grid->RecCnt >= $pharmacy_grn_grid->StartRec) {
		$pharmacy_grn_grid->RowCnt++;
		if ($pharmacy_grn->isGridAdd() || $pharmacy_grn->isGridEdit() || $pharmacy_grn->isConfirm()) {
			$pharmacy_grn_grid->RowIndex++;
			$CurrentForm->Index = $pharmacy_grn_grid->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_grn_grid->FormActionName) && $pharmacy_grn_grid->EventCancelled)
				$pharmacy_grn_grid->RowAction = strval($CurrentForm->getValue($pharmacy_grn_grid->FormActionName));
			elseif ($pharmacy_grn->isGridAdd())
				$pharmacy_grn_grid->RowAction = "insert";
			else
				$pharmacy_grn_grid->RowAction = "";
		}

		// Set up key count
		$pharmacy_grn_grid->KeyCount = $pharmacy_grn_grid->RowIndex;

		// Init row class and style
		$pharmacy_grn->resetAttributes();
		$pharmacy_grn->CssClass = "";
		if ($pharmacy_grn->isGridAdd()) {
			if ($pharmacy_grn->CurrentMode == "copy") {
				$pharmacy_grn_grid->loadRowValues($pharmacy_grn_grid->Recordset); // Load row values
				$pharmacy_grn_grid->setRecordKey($pharmacy_grn_grid->RowOldKey, $pharmacy_grn_grid->Recordset); // Set old record key
			} else {
				$pharmacy_grn_grid->loadRowValues(); // Load default values
				$pharmacy_grn_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$pharmacy_grn_grid->loadRowValues($pharmacy_grn_grid->Recordset); // Load row values
		}
		$pharmacy_grn->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_grn->isGridAdd()) // Grid add
			$pharmacy_grn->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_grn->isGridAdd() && $pharmacy_grn->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_grn_grid->restoreCurrentRowFormValues($pharmacy_grn_grid->RowIndex); // Restore form values
		if ($pharmacy_grn->isGridEdit()) { // Grid edit
			if ($pharmacy_grn->EventCancelled)
				$pharmacy_grn_grid->restoreCurrentRowFormValues($pharmacy_grn_grid->RowIndex); // Restore form values
			if ($pharmacy_grn_grid->RowAction == "insert")
				$pharmacy_grn->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_grn->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_grn->isGridEdit() && ($pharmacy_grn->RowType == ROWTYPE_EDIT || $pharmacy_grn->RowType == ROWTYPE_ADD) && $pharmacy_grn->EventCancelled) // Update failed
			$pharmacy_grn_grid->restoreCurrentRowFormValues($pharmacy_grn_grid->RowIndex); // Restore form values
		if ($pharmacy_grn->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_grn_grid->EditRowCnt++;
		if ($pharmacy_grn->isConfirm()) // Confirm row
			$pharmacy_grn_grid->restoreCurrentRowFormValues($pharmacy_grn_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$pharmacy_grn->RowAttrs = array_merge($pharmacy_grn->RowAttrs, array('data-rowindex'=>$pharmacy_grn_grid->RowCnt, 'id'=>'r' . $pharmacy_grn_grid->RowCnt . '_pharmacy_grn', 'data-rowtype'=>$pharmacy_grn->RowType));

		// Render row
		$pharmacy_grn_grid->renderRow();

		// Render list options
		$pharmacy_grn_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_grn_grid->RowAction <> "delete" && $pharmacy_grn_grid->RowAction <> "insertdelete" && !($pharmacy_grn_grid->RowAction == "insert" && $pharmacy_grn->isConfirm() && $pharmacy_grn_grid->emptyRow())) {
?>
	<tr<?php echo $pharmacy_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_grn_grid->ListOptions->render("body", "left", $pharmacy_grn_grid->RowCnt);
?>
	<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_grn->id->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_id" class="form-group pharmacy_grn_id">
<span<?php echo $pharmacy_grn->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_id" class="pharmacy_grn_id">
<span<?php echo $pharmacy_grn->id->viewAttributes() ?>>
<?php echo $pharmacy_grn->id->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO"<?php echo $pharmacy_grn->GRNNO->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_GRNNO" class="form-group pharmacy_grn_GRNNO">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->GRNNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->GRNNO->EditValue ?>"<?php echo $pharmacy_grn->GRNNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn->GRNNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_GRNNO" class="form-group pharmacy_grn_GRNNO">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->GRNNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->GRNNO->EditValue ?>"<?php echo $pharmacy_grn->GRNNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn->GRNNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNNO->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn->GRNNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn->GRNNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn->GRNNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn->GRNNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $pharmacy_grn->DT->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_DT" class="form-group pharmacy_grn_DT">
<input type="text" data-table="pharmacy_grn" data-field="x_DT" data-format="7" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" placeholder="<?php echo HtmlEncode($pharmacy_grn->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->DT->EditValue ?>"<?php echo $pharmacy_grn->DT->editAttributes() ?>>
<?php if (!$pharmacy_grn->DT->ReadOnly && !$pharmacy_grn->DT->Disabled && !isset($pharmacy_grn->DT->EditAttrs["readonly"]) && !isset($pharmacy_grn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn->DT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_DT" class="form-group pharmacy_grn_DT">
<input type="text" data-table="pharmacy_grn" data-field="x_DT" data-format="7" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" placeholder="<?php echo HtmlEncode($pharmacy_grn->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->DT->EditValue ?>"<?php echo $pharmacy_grn->DT->editAttributes() ?>>
<?php if (!$pharmacy_grn->DT->ReadOnly && !$pharmacy_grn->DT->Disabled && !isset($pharmacy_grn->DT->EditAttrs["readonly"]) && !isset($pharmacy_grn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_DT" class="pharmacy_grn_DT">
<span<?php echo $pharmacy_grn->DT->viewAttributes() ?>>
<?php echo $pharmacy_grn->DT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn->DT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn->DT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn->DT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn->DT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $pharmacy_grn->Customername->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Customername" class="form-group pharmacy_grn_Customername">
<input type="text" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Customername->EditValue ?>"<?php echo $pharmacy_grn->Customername->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn->Customername->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Customername" class="form-group pharmacy_grn_Customername">
<input type="text" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Customername->EditValue ?>"<?php echo $pharmacy_grn->Customername->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn->Customername->viewAttributes() ?>>
<?php echo $pharmacy_grn->Customername->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn->Customername->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn->Customername->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn->Customername->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn->Customername->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<td data-name="State"<?php echo $pharmacy_grn->State->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_State" class="form-group pharmacy_grn_State">
<input type="text" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->State->EditValue ?>"<?php echo $pharmacy_grn->State->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn->State->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_State" class="form-group pharmacy_grn_State">
<input type="text" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->State->EditValue ?>"<?php echo $pharmacy_grn->State->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_State" class="pharmacy_grn_State">
<span<?php echo $pharmacy_grn->State->viewAttributes() ?>>
<?php echo $pharmacy_grn->State->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn->State->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn->State->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn->State->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn->State->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $pharmacy_grn->Pincode->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Pincode" class="form-group pharmacy_grn_Pincode">
<input type="text" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Pincode->EditValue ?>"<?php echo $pharmacy_grn->Pincode->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn->Pincode->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Pincode" class="form-group pharmacy_grn_Pincode">
<input type="text" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Pincode->EditValue ?>"<?php echo $pharmacy_grn->Pincode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pincode->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn->Pincode->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn->Pincode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn->Pincode->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn->Pincode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $pharmacy_grn->Phone->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Phone" class="form-group pharmacy_grn_Phone">
<input type="text" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Phone->EditValue ?>"<?php echo $pharmacy_grn->Phone->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn->Phone->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Phone" class="form-group pharmacy_grn_Phone">
<input type="text" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Phone->EditValue ?>"<?php echo $pharmacy_grn->Phone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn->Phone->viewAttributes() ?>>
<?php echo $pharmacy_grn->Phone->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn->Phone->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn->Phone->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn->Phone->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn->Phone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO"<?php echo $pharmacy_grn->BILLNO->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BILLNO" class="form-group pharmacy_grn_BILLNO">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->BILLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BILLNO->EditValue ?>"<?php echo $pharmacy_grn->BILLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn->BILLNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BILLNO" class="form-group pharmacy_grn_BILLNO">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->BILLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BILLNO->EditValue ?>"<?php echo $pharmacy_grn->BILLNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn->BILLNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLNO->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn->BILLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn->BILLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn->BILLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn->BILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT"<?php echo $pharmacy_grn->BILLDT->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BILLDT" class="form-group pharmacy_grn_BILLDT">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_grn->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BILLDT->EditValue ?>"<?php echo $pharmacy_grn->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_grn->BILLDT->ReadOnly && !$pharmacy_grn->BILLDT->Disabled && !isset($pharmacy_grn->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_grn->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn->BILLDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BILLDT" class="form-group pharmacy_grn_BILLDT">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_grn->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BILLDT->EditValue ?>"<?php echo $pharmacy_grn->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_grn->BILLDT->ReadOnly && !$pharmacy_grn->BILLDT->Disabled && !isset($pharmacy_grn->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_grn->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn->BILLDT->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLDT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn->BILLDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn->BILLDT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn->BILLDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn->BILLDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue"<?php echo $pharmacy_grn->BillTotalValue->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BillTotalValue" class="form-group pharmacy_grn_BillTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BillTotalValue->EditValue ?>"<?php echo $pharmacy_grn->BillTotalValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BillTotalValue" class="form-group pharmacy_grn_BillTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BillTotalValue->EditValue ?>"<?php echo $pharmacy_grn->BillTotalValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillTotalValue->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue"<?php echo $pharmacy_grn->GRNTotalValue->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_GRNTotalValue" class="form-group pharmacy_grn_GRNTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->GRNTotalValue->EditValue ?>"<?php echo $pharmacy_grn->GRNTotalValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_GRNTotalValue" class="form-group pharmacy_grn_GRNTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->GRNTotalValue->EditValue ?>"<?php echo $pharmacy_grn->GRNTotalValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNTotalValue->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount"<?php echo $pharmacy_grn->BillDiscount->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BillDiscount" class="form-group pharmacy_grn_BillDiscount">
<input type="text" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BillDiscount->EditValue ?>"<?php echo $pharmacy_grn->BillDiscount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BillDiscount" class="form-group pharmacy_grn_BillDiscount">
<input type="text" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BillDiscount->EditValue ?>"<?php echo $pharmacy_grn->BillDiscount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn->BillDiscount->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillDiscount->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue"<?php echo $pharmacy_grn->GrnValue->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_GrnValue" class="form-group pharmacy_grn_GrnValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->GrnValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->GrnValue->EditValue ?>"<?php echo $pharmacy_grn->GrnValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn->GrnValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_GrnValue" class="form-group pharmacy_grn_GrnValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->GrnValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->GrnValue->EditValue ?>"<?php echo $pharmacy_grn->GrnValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn->GrnValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GrnValue->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn->GrnValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn->GrnValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn->GrnValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn->GrnValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid"<?php echo $pharmacy_grn->Pid->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pharmacy_grn->Pid->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->Pid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<input type="text" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->Pid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Pid->EditValue ?>"<?php echo $pharmacy_grn->Pid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pharmacy_grn->Pid->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->Pid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<input type="text" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->Pid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Pid->EditValue ?>"<?php echo $pharmacy_grn->Pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pid->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo"<?php echo $pharmacy_grn->PaymentNo->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_PaymentNo" class="form-group pharmacy_grn_PaymentNo">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->PaymentNo->EditValue ?>"<?php echo $pharmacy_grn->PaymentNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_PaymentNo" class="form-group pharmacy_grn_PaymentNo">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->PaymentNo->EditValue ?>"<?php echo $pharmacy_grn->PaymentNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn->PaymentNo->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentNo->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $pharmacy_grn->PaymentStatus->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_PaymentStatus" class="form-group pharmacy_grn_PaymentStatus">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->PaymentStatus->EditValue ?>"<?php echo $pharmacy_grn->PaymentStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_PaymentStatus" class="form-group pharmacy_grn_PaymentStatus">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->PaymentStatus->EditValue ?>"<?php echo $pharmacy_grn->PaymentStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentStatus->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $pharmacy_grn->PaidAmount->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_PaidAmount" class="form-group pharmacy_grn_PaidAmount">
<input type="text" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->PaidAmount->EditValue ?>"<?php echo $pharmacy_grn->PaidAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_PaidAmount" class="form-group pharmacy_grn_PaidAmount">
<input type="text" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->PaidAmount->EditValue ?>"<?php echo $pharmacy_grn->PaidAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCnt ?>_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn->PaidAmount->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaidAmount->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_grn_grid->ListOptions->render("body", "right", $pharmacy_grn_grid->RowCnt);
?>
	</tr>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD || $pharmacy_grn->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_grngrid.updateLists(<?php echo $pharmacy_grn_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_grn->isGridAdd() || $pharmacy_grn->CurrentMode == "copy")
		if (!$pharmacy_grn_grid->Recordset->EOF)
			$pharmacy_grn_grid->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_grn->CurrentMode == "add" || $pharmacy_grn->CurrentMode == "copy" || $pharmacy_grn->CurrentMode == "edit") {
		$pharmacy_grn_grid->RowIndex = '$rowindex$';
		$pharmacy_grn_grid->loadRowValues();

		// Set row properties
		$pharmacy_grn->resetAttributes();
		$pharmacy_grn->RowAttrs = array_merge($pharmacy_grn->RowAttrs, array('data-rowindex'=>$pharmacy_grn_grid->RowIndex, 'id'=>'r0_pharmacy_grn', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_grn->RowAttrs["class"], "ew-template");
		$pharmacy_grn->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_grn_grid->renderRow();

		// Render list options
		$pharmacy_grn_grid->renderListOptions();
		$pharmacy_grn_grid->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_grn_grid->ListOptions->render("body", "left", $pharmacy_grn_grid->RowIndex);
?>
	<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_id" class="form-group pharmacy_grn_id">
<span<?php echo $pharmacy_grn->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_GRNNO" class="form-group pharmacy_grn_GRNNO">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->GRNNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->GRNNO->EditValue ?>"<?php echo $pharmacy_grn->GRNNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_GRNNO" class="form-group pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn->GRNNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->GRNNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn->GRNNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn->GRNNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<td data-name="DT">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_DT" class="form-group pharmacy_grn_DT">
<input type="text" data-table="pharmacy_grn" data-field="x_DT" data-format="7" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" placeholder="<?php echo HtmlEncode($pharmacy_grn->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->DT->EditValue ?>"<?php echo $pharmacy_grn->DT->editAttributes() ?>>
<?php if (!$pharmacy_grn->DT->ReadOnly && !$pharmacy_grn->DT->Disabled && !isset($pharmacy_grn->DT->EditAttrs["readonly"]) && !isset($pharmacy_grn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_DT" class="form-group pharmacy_grn_DT">
<span<?php echo $pharmacy_grn->DT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->DT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn->DT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn->DT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_Customername" class="form-group pharmacy_grn_Customername">
<input type="text" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Customername->EditValue ?>"<?php echo $pharmacy_grn->Customername->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Customername" class="form-group pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn->Customername->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->Customername->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn->Customername->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn->Customername->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<td data-name="State">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_State" class="form-group pharmacy_grn_State">
<input type="text" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->State->EditValue ?>"<?php echo $pharmacy_grn->State->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_State" class="form-group pharmacy_grn_State">
<span<?php echo $pharmacy_grn->State->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->State->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn->State->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn->State->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_Pincode" class="form-group pharmacy_grn_Pincode">
<input type="text" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Pincode->EditValue ?>"<?php echo $pharmacy_grn->Pincode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Pincode" class="form-group pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn->Pincode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->Pincode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn->Pincode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn->Pincode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_Phone" class="form-group pharmacy_grn_Phone">
<input type="text" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Phone->EditValue ?>"<?php echo $pharmacy_grn->Phone->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Phone" class="form-group pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn->Phone->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->Phone->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn->Phone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn->Phone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BILLNO" class="form-group pharmacy_grn_BILLNO">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->BILLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BILLNO->EditValue ?>"<?php echo $pharmacy_grn->BILLNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BILLNO" class="form-group pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn->BILLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->BILLNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn->BILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn->BILLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BILLDT" class="form-group pharmacy_grn_BILLDT">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_grn->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BILLDT->EditValue ?>"<?php echo $pharmacy_grn->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_grn->BILLDT->ReadOnly && !$pharmacy_grn->BILLDT->Disabled && !isset($pharmacy_grn->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_grn->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BILLDT" class="form-group pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn->BILLDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->BILLDT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn->BILLDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn->BILLDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BillTotalValue" class="form-group pharmacy_grn_BillTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BillTotalValue->EditValue ?>"<?php echo $pharmacy_grn->BillTotalValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BillTotalValue" class="form-group pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn->BillTotalValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->BillTotalValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->BillTotalValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_GRNTotalValue" class="form-group pharmacy_grn_GRNTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->GRNTotalValue->EditValue ?>"<?php echo $pharmacy_grn->GRNTotalValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_GRNTotalValue" class="form-group pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn->GRNTotalValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->GRNTotalValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn->GRNTotalValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BillDiscount" class="form-group pharmacy_grn_BillDiscount">
<input type="text" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BillDiscount->EditValue ?>"<?php echo $pharmacy_grn->BillDiscount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BillDiscount" class="form-group pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn->BillDiscount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->BillDiscount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn->BillDiscount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_GrnValue" class="form-group pharmacy_grn_GrnValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->GrnValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->GrnValue->EditValue ?>"<?php echo $pharmacy_grn->GrnValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_GrnValue" class="form-group pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn->GrnValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->GrnValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn->GrnValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn->GrnValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<?php if ($pharmacy_grn->Pid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->Pid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<input type="text" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->Pid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Pid->EditValue ?>"<?php echo $pharmacy_grn->Pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->Pid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn->Pid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentNo" class="form-group pharmacy_grn_PaymentNo">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->PaymentNo->EditValue ?>"<?php echo $pharmacy_grn->PaymentNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentNo" class="form-group pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn->PaymentNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->PaymentNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn->PaymentNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentStatus" class="form-group pharmacy_grn_PaymentStatus">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->PaymentStatus->EditValue ?>"<?php echo $pharmacy_grn->PaymentStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentStatus" class="form-group pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn->PaymentStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->PaymentStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn->PaymentStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_PaidAmount" class="form-group pharmacy_grn_PaidAmount">
<input type="text" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->PaidAmount->EditValue ?>"<?php echo $pharmacy_grn->PaidAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_PaidAmount" class="form-group pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_grn->PaidAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn->PaidAmount->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_grn_grid->ListOptions->render("body", "right", $pharmacy_grn_grid->RowIndex);
?>
<script>
fpharmacy_grngrid.updateLists(<?php echo $pharmacy_grn_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
<?php

// Render aggregate row
$pharmacy_grn->RowType = ROWTYPE_AGGREGATE;
$pharmacy_grn->resetAttributes();
$pharmacy_grn_grid->renderRow();
?>
<?php if ($pharmacy_grn_grid->TotalRecs > 0 && $pharmacy_grn->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$pharmacy_grn_grid->renderListOptions();

// Render list options (footer, left)
$pharmacy_grn_grid->ListOptions->render("footer", "left");
?>
	<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $pharmacy_grn->id->footerCellClass() ?>"><span id="elf_pharmacy_grn_id" class="pharmacy_grn_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" class="<?php echo $pharmacy_grn->GRNNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<td data-name="DT" class="<?php echo $pharmacy_grn->DT->footerCellClass() ?>"><span id="elf_pharmacy_grn_DT" class="pharmacy_grn_DT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername" class="<?php echo $pharmacy_grn->Customername->footerCellClass() ?>"><span id="elf_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<td data-name="State" class="<?php echo $pharmacy_grn->State->footerCellClass() ?>"><span id="elf_pharmacy_grn_State" class="pharmacy_grn_State">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" class="<?php echo $pharmacy_grn->Pincode->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone" class="<?php echo $pharmacy_grn->Phone->footerCellClass() ?>"><span id="elf_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" class="<?php echo $pharmacy_grn->BILLNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" class="<?php echo $pharmacy_grn->BILLDT->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" class="<?php echo $pharmacy_grn->BillTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn->BillTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" class="<?php echo $pharmacy_grn->GRNTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn->GRNTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" class="<?php echo $pharmacy_grn->BillDiscount->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn->BillDiscount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue" class="<?php echo $pharmacy_grn->GrnValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid" class="<?php echo $pharmacy_grn->Pid->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo" class="<?php echo $pharmacy_grn->PaymentNo->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" class="<?php echo $pharmacy_grn->PaymentStatus->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" class="<?php echo $pharmacy_grn->PaidAmount->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$pharmacy_grn_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php if ($pharmacy_grn->CurrentMode == "add" || $pharmacy_grn->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $pharmacy_grn_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_grn_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_grn_grid->KeyCount ?>">
<?php echo $pharmacy_grn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_grn->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $pharmacy_grn_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_grn_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_grn_grid->KeyCount ?>">
<?php echo $pharmacy_grn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_grn->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpharmacy_grngrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($pharmacy_grn_grid->Recordset)
	$pharmacy_grn_grid->Recordset->Close();
?>
</div>
<?php if ($pharmacy_grn_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $pharmacy_grn_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_grn_grid->TotalRecs == 0 && !$pharmacy_grn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_grn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_grn_grid->terminate();
?>
<?php if (!$pharmacy_grn->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_grn", "95%", "");
</script>
<?php } ?>
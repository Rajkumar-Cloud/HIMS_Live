<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($store_grn_grid))
	$store_grn_grid = new store_grn_grid();

// Run the page
$store_grn_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_grn_grid->Page_Render();
?>
<?php if (!$store_grn->isExport()) { ?>
<script>

// Form object
var fstore_grngrid = new ew.Form("fstore_grngrid", "grid");
fstore_grngrid.formKeyCountName = '<?php echo $store_grn_grid->FormKeyCountName ?>';

// Validate form
fstore_grngrid.validate = function() {
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
		<?php if ($store_grn_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->id->caption(), $store_grn->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_grid->GRNNO->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->GRNNO->caption(), $store_grn->GRNNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_grid->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->DT->caption(), $store_grn->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->DT->errorMessage()) ?>");
		<?php if ($store_grn_grid->Customername->Required) { ?>
			elm = this.getElements("x" + infix + "_Customername");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Customername->caption(), $store_grn->Customername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_grid->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->State->caption(), $store_grn->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_grid->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Pincode->caption(), $store_grn->Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_grid->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Phone->caption(), $store_grn->Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_grid->BILLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->BILLNO->caption(), $store_grn->BILLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_grid->BILLDT->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->BILLDT->caption(), $store_grn->BILLDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->BILLDT->errorMessage()) ?>");
		<?php if ($store_grn_grid->BillTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->BillTotalValue->caption(), $store_grn->BillTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->BillTotalValue->errorMessage()) ?>");
		<?php if ($store_grn_grid->GRNTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->GRNTotalValue->caption(), $store_grn->GRNTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->GRNTotalValue->errorMessage()) ?>");
		<?php if ($store_grn_grid->BillDiscount->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->BillDiscount->caption(), $store_grn->BillDiscount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->BillDiscount->errorMessage()) ?>");
		<?php if ($store_grn_grid->GrnValue->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->GrnValue->caption(), $store_grn->GrnValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->GrnValue->errorMessage()) ?>");
		<?php if ($store_grn_grid->Pid->Required) { ?>
			elm = this.getElements("x" + infix + "_Pid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Pid->caption(), $store_grn->Pid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Pid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->Pid->errorMessage()) ?>");
		<?php if ($store_grn_grid->PaymentNo->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->PaymentNo->caption(), $store_grn->PaymentNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_grid->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->PaymentStatus->caption(), $store_grn->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_grid->PaidAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->PaidAmount->caption(), $store_grn->PaidAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->PaidAmount->errorMessage()) ?>");
		<?php if ($store_grn_grid->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->StoreID->caption(), $store_grn->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->StoreID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fstore_grngrid.emptyRow = function(infix) {
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
	if (ew.valueChanged(fobj, infix, "StoreID", false)) return false;
	return true;
}

// Form_CustomValidate event
fstore_grngrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_grngrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$store_grn_grid->renderOtherOptions();
?>
<?php $store_grn_grid->showPageHeader(); ?>
<?php
$store_grn_grid->showMessage();
?>
<?php if ($store_grn_grid->TotalRecs > 0 || $store_grn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_grn_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_grn">
<?php if ($store_grn_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $store_grn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fstore_grngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_store_grn" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_store_grngrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_grn_grid->RowType = ROWTYPE_HEADER;

// Render list options
$store_grn_grid->renderListOptions();

// Render list options (header, left)
$store_grn_grid->ListOptions->render("header", "left");
?>
<?php if ($store_grn->id->Visible) { // id ?>
	<?php if ($store_grn->sortUrl($store_grn->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_grn->id->headerCellClass() ?>"><div id="elh_store_grn_id" class="store_grn_id"><div class="ew-table-header-caption"><?php echo $store_grn->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_grn->id->headerCellClass() ?>"><div><div id="elh_store_grn_id" class="store_grn_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
	<?php if ($store_grn->sortUrl($store_grn->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $store_grn->GRNNO->headerCellClass() ?>"><div id="elh_store_grn_GRNNO" class="store_grn_GRNNO"><div class="ew-table-header-caption"><?php echo $store_grn->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $store_grn->GRNNO->headerCellClass() ?>"><div><div id="elh_store_grn_GRNNO" class="store_grn_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->GRNNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->GRNNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->GRNNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->DT->Visible) { // DT ?>
	<?php if ($store_grn->sortUrl($store_grn->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $store_grn->DT->headerCellClass() ?>"><div id="elh_store_grn_DT" class="store_grn_DT"><div class="ew-table-header-caption"><?php echo $store_grn->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $store_grn->DT->headerCellClass() ?>"><div><div id="elh_store_grn_DT" class="store_grn_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->Customername->Visible) { // Customername ?>
	<?php if ($store_grn->sortUrl($store_grn->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $store_grn->Customername->headerCellClass() ?>"><div id="elh_store_grn_Customername" class="store_grn_Customername"><div class="ew-table-header-caption"><?php echo $store_grn->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $store_grn->Customername->headerCellClass() ?>"><div><div id="elh_store_grn_Customername" class="store_grn_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->State->Visible) { // State ?>
	<?php if ($store_grn->sortUrl($store_grn->State) == "") { ?>
		<th data-name="State" class="<?php echo $store_grn->State->headerCellClass() ?>"><div id="elh_store_grn_State" class="store_grn_State"><div class="ew-table-header-caption"><?php echo $store_grn->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $store_grn->State->headerCellClass() ?>"><div><div id="elh_store_grn_State" class="store_grn_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
	<?php if ($store_grn->sortUrl($store_grn->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $store_grn->Pincode->headerCellClass() ?>"><div id="elh_store_grn_Pincode" class="store_grn_Pincode"><div class="ew-table-header-caption"><?php echo $store_grn->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $store_grn->Pincode->headerCellClass() ?>"><div><div id="elh_store_grn_Pincode" class="store_grn_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->Pincode->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->Phone->Visible) { // Phone ?>
	<?php if ($store_grn->sortUrl($store_grn->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $store_grn->Phone->headerCellClass() ?>"><div id="elh_store_grn_Phone" class="store_grn_Phone"><div class="ew-table-header-caption"><?php echo $store_grn->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $store_grn->Phone->headerCellClass() ?>"><div><div id="elh_store_grn_Phone" class="store_grn_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->Phone->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
	<?php if ($store_grn->sortUrl($store_grn->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $store_grn->BILLNO->headerCellClass() ?>"><div id="elh_store_grn_BILLNO" class="store_grn_BILLNO"><div class="ew-table-header-caption"><?php echo $store_grn->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $store_grn->BILLNO->headerCellClass() ?>"><div><div id="elh_store_grn_BILLNO" class="store_grn_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->BILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->BILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->BILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
	<?php if ($store_grn->sortUrl($store_grn->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $store_grn->BILLDT->headerCellClass() ?>"><div id="elh_store_grn_BILLDT" class="store_grn_BILLDT"><div class="ew-table-header-caption"><?php echo $store_grn->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $store_grn->BILLDT->headerCellClass() ?>"><div><div id="elh_store_grn_BILLDT" class="store_grn_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->BILLDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->BILLDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($store_grn->sortUrl($store_grn->BillTotalValue) == "") { ?>
		<th data-name="BillTotalValue" class="<?php echo $store_grn->BillTotalValue->headerCellClass() ?>"><div id="elh_store_grn_BillTotalValue" class="store_grn_BillTotalValue"><div class="ew-table-header-caption"><?php echo $store_grn->BillTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillTotalValue" class="<?php echo $store_grn->BillTotalValue->headerCellClass() ?>"><div><div id="elh_store_grn_BillTotalValue" class="store_grn_BillTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->BillTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->BillTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($store_grn->sortUrl($store_grn->GRNTotalValue) == "") { ?>
		<th data-name="GRNTotalValue" class="<?php echo $store_grn->GRNTotalValue->headerCellClass() ?>"><div id="elh_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue"><div class="ew-table-header-caption"><?php echo $store_grn->GRNTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNTotalValue" class="<?php echo $store_grn->GRNTotalValue->headerCellClass() ?>"><div><div id="elh_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->GRNTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->GRNTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($store_grn->sortUrl($store_grn->BillDiscount) == "") { ?>
		<th data-name="BillDiscount" class="<?php echo $store_grn->BillDiscount->headerCellClass() ?>"><div id="elh_store_grn_BillDiscount" class="store_grn_BillDiscount"><div class="ew-table-header-caption"><?php echo $store_grn->BillDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDiscount" class="<?php echo $store_grn->BillDiscount->headerCellClass() ?>"><div><div id="elh_store_grn_BillDiscount" class="store_grn_BillDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->BillDiscount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->BillDiscount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
	<?php if ($store_grn->sortUrl($store_grn->GrnValue) == "") { ?>
		<th data-name="GrnValue" class="<?php echo $store_grn->GrnValue->headerCellClass() ?>"><div id="elh_store_grn_GrnValue" class="store_grn_GrnValue"><div class="ew-table-header-caption"><?php echo $store_grn->GrnValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnValue" class="<?php echo $store_grn->GrnValue->headerCellClass() ?>"><div><div id="elh_store_grn_GrnValue" class="store_grn_GrnValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->GrnValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->GrnValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->GrnValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->Pid->Visible) { // Pid ?>
	<?php if ($store_grn->sortUrl($store_grn->Pid) == "") { ?>
		<th data-name="Pid" class="<?php echo $store_grn->Pid->headerCellClass() ?>"><div id="elh_store_grn_Pid" class="store_grn_Pid"><div class="ew-table-header-caption"><?php echo $store_grn->Pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pid" class="<?php echo $store_grn->Pid->headerCellClass() ?>"><div><div id="elh_store_grn_Pid" class="store_grn_Pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->Pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->Pid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->Pid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
	<?php if ($store_grn->sortUrl($store_grn->PaymentNo) == "") { ?>
		<th data-name="PaymentNo" class="<?php echo $store_grn->PaymentNo->headerCellClass() ?>"><div id="elh_store_grn_PaymentNo" class="store_grn_PaymentNo"><div class="ew-table-header-caption"><?php echo $store_grn->PaymentNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentNo" class="<?php echo $store_grn->PaymentNo->headerCellClass() ?>"><div><div id="elh_store_grn_PaymentNo" class="store_grn_PaymentNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->PaymentNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->PaymentNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->PaymentNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($store_grn->sortUrl($store_grn->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $store_grn->PaymentStatus->headerCellClass() ?>"><div id="elh_store_grn_PaymentStatus" class="store_grn_PaymentStatus"><div class="ew-table-header-caption"><?php echo $store_grn->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $store_grn->PaymentStatus->headerCellClass() ?>"><div><div id="elh_store_grn_PaymentStatus" class="store_grn_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($store_grn->sortUrl($store_grn->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $store_grn->PaidAmount->headerCellClass() ?>"><div id="elh_store_grn_PaidAmount" class="store_grn_PaidAmount"><div class="ew-table-header-caption"><?php echo $store_grn->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $store_grn->PaidAmount->headerCellClass() ?>"><div><div id="elh_store_grn_PaidAmount" class="store_grn_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
	<?php if ($store_grn->sortUrl($store_grn->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_grn->StoreID->headerCellClass() ?>"><div id="elh_store_grn_StoreID" class="store_grn_StoreID"><div class="ew-table-header-caption"><?php echo $store_grn->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_grn->StoreID->headerCellClass() ?>"><div><div id="elh_store_grn_StoreID" class="store_grn_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_grn_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$store_grn_grid->StartRec = 1;
$store_grn_grid->StopRec = $store_grn_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $store_grn_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($store_grn_grid->FormKeyCountName) && ($store_grn->isGridAdd() || $store_grn->isGridEdit() || $store_grn->isConfirm())) {
		$store_grn_grid->KeyCount = $CurrentForm->getValue($store_grn_grid->FormKeyCountName);
		$store_grn_grid->StopRec = $store_grn_grid->StartRec + $store_grn_grid->KeyCount - 1;
	}
}
$store_grn_grid->RecCnt = $store_grn_grid->StartRec - 1;
if ($store_grn_grid->Recordset && !$store_grn_grid->Recordset->EOF) {
	$store_grn_grid->Recordset->moveFirst();
	$selectLimit = $store_grn_grid->UseSelectLimit;
	if (!$selectLimit && $store_grn_grid->StartRec > 1)
		$store_grn_grid->Recordset->move($store_grn_grid->StartRec - 1);
} elseif (!$store_grn->AllowAddDeleteRow && $store_grn_grid->StopRec == 0) {
	$store_grn_grid->StopRec = $store_grn->GridAddRowCount;
}

// Initialize aggregate
$store_grn->RowType = ROWTYPE_AGGREGATEINIT;
$store_grn->resetAttributes();
$store_grn_grid->renderRow();
if ($store_grn->isGridAdd())
	$store_grn_grid->RowIndex = 0;
if ($store_grn->isGridEdit())
	$store_grn_grid->RowIndex = 0;
while ($store_grn_grid->RecCnt < $store_grn_grid->StopRec) {
	$store_grn_grid->RecCnt++;
	if ($store_grn_grid->RecCnt >= $store_grn_grid->StartRec) {
		$store_grn_grid->RowCnt++;
		if ($store_grn->isGridAdd() || $store_grn->isGridEdit() || $store_grn->isConfirm()) {
			$store_grn_grid->RowIndex++;
			$CurrentForm->Index = $store_grn_grid->RowIndex;
			if ($CurrentForm->hasValue($store_grn_grid->FormActionName) && $store_grn_grid->EventCancelled)
				$store_grn_grid->RowAction = strval($CurrentForm->getValue($store_grn_grid->FormActionName));
			elseif ($store_grn->isGridAdd())
				$store_grn_grid->RowAction = "insert";
			else
				$store_grn_grid->RowAction = "";
		}

		// Set up key count
		$store_grn_grid->KeyCount = $store_grn_grid->RowIndex;

		// Init row class and style
		$store_grn->resetAttributes();
		$store_grn->CssClass = "";
		if ($store_grn->isGridAdd()) {
			if ($store_grn->CurrentMode == "copy") {
				$store_grn_grid->loadRowValues($store_grn_grid->Recordset); // Load row values
				$store_grn_grid->setRecordKey($store_grn_grid->RowOldKey, $store_grn_grid->Recordset); // Set old record key
			} else {
				$store_grn_grid->loadRowValues(); // Load default values
				$store_grn_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$store_grn_grid->loadRowValues($store_grn_grid->Recordset); // Load row values
		}
		$store_grn->RowType = ROWTYPE_VIEW; // Render view
		if ($store_grn->isGridAdd()) // Grid add
			$store_grn->RowType = ROWTYPE_ADD; // Render add
		if ($store_grn->isGridAdd() && $store_grn->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$store_grn_grid->restoreCurrentRowFormValues($store_grn_grid->RowIndex); // Restore form values
		if ($store_grn->isGridEdit()) { // Grid edit
			if ($store_grn->EventCancelled)
				$store_grn_grid->restoreCurrentRowFormValues($store_grn_grid->RowIndex); // Restore form values
			if ($store_grn_grid->RowAction == "insert")
				$store_grn->RowType = ROWTYPE_ADD; // Render add
			else
				$store_grn->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($store_grn->isGridEdit() && ($store_grn->RowType == ROWTYPE_EDIT || $store_grn->RowType == ROWTYPE_ADD) && $store_grn->EventCancelled) // Update failed
			$store_grn_grid->restoreCurrentRowFormValues($store_grn_grid->RowIndex); // Restore form values
		if ($store_grn->RowType == ROWTYPE_EDIT) // Edit row
			$store_grn_grid->EditRowCnt++;
		if ($store_grn->isConfirm()) // Confirm row
			$store_grn_grid->restoreCurrentRowFormValues($store_grn_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$store_grn->RowAttrs = array_merge($store_grn->RowAttrs, array('data-rowindex'=>$store_grn_grid->RowCnt, 'id'=>'r' . $store_grn_grid->RowCnt . '_store_grn', 'data-rowtype'=>$store_grn->RowType));

		// Render row
		$store_grn_grid->renderRow();

		// Render list options
		$store_grn_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($store_grn_grid->RowAction <> "delete" && $store_grn_grid->RowAction <> "insertdelete" && !($store_grn_grid->RowAction == "insert" && $store_grn->isConfirm() && $store_grn_grid->emptyRow())) {
?>
	<tr<?php echo $store_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_grn_grid->ListOptions->render("body", "left", $store_grn_grid->RowCnt);
?>
	<?php if ($store_grn->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_grn->id->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="store_grn" data-field="x_id" name="o<?php echo $store_grn_grid->RowIndex ?>_id" id="o<?php echo $store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($store_grn->id->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_id" class="form-group store_grn_id">
<span<?php echo $store_grn->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_id" name="x<?php echo $store_grn_grid->RowIndex ?>_id" id="x<?php echo $store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($store_grn->id->CurrentValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_id" class="store_grn_id">
<span<?php echo $store_grn->id->viewAttributes() ?>>
<?php echo $store_grn->id->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_id" name="x<?php echo $store_grn_grid->RowIndex ?>_id" id="x<?php echo $store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($store_grn->id->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_id" name="o<?php echo $store_grn_grid->RowIndex ?>_id" id="o<?php echo $store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($store_grn->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_id" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_id" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($store_grn->id->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_id" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_id" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($store_grn->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO"<?php echo $store_grn->GRNNO->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_GRNNO" class="form-group store_grn_GRNNO">
<input type="text" data-table="store_grn" data-field="x_GRNNO" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->GRNNO->getPlaceHolder()) ?>" value="<?php echo $store_grn->GRNNO->EditValue ?>"<?php echo $store_grn->GRNNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_GRNNO" name="o<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="o<?php echo $store_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($store_grn->GRNNO->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_GRNNO" class="form-group store_grn_GRNNO">
<input type="text" data-table="store_grn" data-field="x_GRNNO" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->GRNNO->getPlaceHolder()) ?>" value="<?php echo $store_grn->GRNNO->EditValue ?>"<?php echo $store_grn->GRNNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_GRNNO" class="store_grn_GRNNO">
<span<?php echo $store_grn->GRNNO->viewAttributes() ?>>
<?php echo $store_grn->GRNNO->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_GRNNO" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($store_grn->GRNNO->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_GRNNO" name="o<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="o<?php echo $store_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($store_grn->GRNNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_GRNNO" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($store_grn->GRNNO->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_GRNNO" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($store_grn->GRNNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $store_grn->DT->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_DT" class="form-group store_grn_DT">
<input type="text" data-table="store_grn" data-field="x_DT" name="x<?php echo $store_grn_grid->RowIndex ?>_DT" id="x<?php echo $store_grn_grid->RowIndex ?>_DT" placeholder="<?php echo HtmlEncode($store_grn->DT->getPlaceHolder()) ?>" value="<?php echo $store_grn->DT->EditValue ?>"<?php echo $store_grn->DT->editAttributes() ?>>
<?php if (!$store_grn->DT->ReadOnly && !$store_grn->DT->Disabled && !isset($store_grn->DT->EditAttrs["readonly"]) && !isset($store_grn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_grngrid", "x<?php echo $store_grn_grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="store_grn" data-field="x_DT" name="o<?php echo $store_grn_grid->RowIndex ?>_DT" id="o<?php echo $store_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($store_grn->DT->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_DT" class="form-group store_grn_DT">
<input type="text" data-table="store_grn" data-field="x_DT" name="x<?php echo $store_grn_grid->RowIndex ?>_DT" id="x<?php echo $store_grn_grid->RowIndex ?>_DT" placeholder="<?php echo HtmlEncode($store_grn->DT->getPlaceHolder()) ?>" value="<?php echo $store_grn->DT->EditValue ?>"<?php echo $store_grn->DT->editAttributes() ?>>
<?php if (!$store_grn->DT->ReadOnly && !$store_grn->DT->Disabled && !isset($store_grn->DT->EditAttrs["readonly"]) && !isset($store_grn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_grngrid", "x<?php echo $store_grn_grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_DT" class="store_grn_DT">
<span<?php echo $store_grn->DT->viewAttributes() ?>>
<?php echo $store_grn->DT->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_DT" name="x<?php echo $store_grn_grid->RowIndex ?>_DT" id="x<?php echo $store_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($store_grn->DT->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_DT" name="o<?php echo $store_grn_grid->RowIndex ?>_DT" id="o<?php echo $store_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($store_grn->DT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_DT" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_DT" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($store_grn->DT->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_DT" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_DT" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($store_grn->DT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $store_grn->Customername->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Customername" class="form-group store_grn_Customername">
<input type="text" data-table="store_grn" data-field="x_Customername" name="x<?php echo $store_grn_grid->RowIndex ?>_Customername" id="x<?php echo $store_grn_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Customername->getPlaceHolder()) ?>" value="<?php echo $store_grn->Customername->EditValue ?>"<?php echo $store_grn->Customername->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_Customername" name="o<?php echo $store_grn_grid->RowIndex ?>_Customername" id="o<?php echo $store_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($store_grn->Customername->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Customername" class="form-group store_grn_Customername">
<input type="text" data-table="store_grn" data-field="x_Customername" name="x<?php echo $store_grn_grid->RowIndex ?>_Customername" id="x<?php echo $store_grn_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Customername->getPlaceHolder()) ?>" value="<?php echo $store_grn->Customername->EditValue ?>"<?php echo $store_grn->Customername->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Customername" class="store_grn_Customername">
<span<?php echo $store_grn->Customername->viewAttributes() ?>>
<?php echo $store_grn->Customername->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_Customername" name="x<?php echo $store_grn_grid->RowIndex ?>_Customername" id="x<?php echo $store_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($store_grn->Customername->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_Customername" name="o<?php echo $store_grn_grid->RowIndex ?>_Customername" id="o<?php echo $store_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($store_grn->Customername->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_Customername" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_Customername" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($store_grn->Customername->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_Customername" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_Customername" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($store_grn->Customername->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->State->Visible) { // State ?>
		<td data-name="State"<?php echo $store_grn->State->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_State" class="form-group store_grn_State">
<input type="text" data-table="store_grn" data-field="x_State" name="x<?php echo $store_grn_grid->RowIndex ?>_State" id="x<?php echo $store_grn_grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->State->getPlaceHolder()) ?>" value="<?php echo $store_grn->State->EditValue ?>"<?php echo $store_grn->State->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_State" name="o<?php echo $store_grn_grid->RowIndex ?>_State" id="o<?php echo $store_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($store_grn->State->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_State" class="form-group store_grn_State">
<input type="text" data-table="store_grn" data-field="x_State" name="x<?php echo $store_grn_grid->RowIndex ?>_State" id="x<?php echo $store_grn_grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->State->getPlaceHolder()) ?>" value="<?php echo $store_grn->State->EditValue ?>"<?php echo $store_grn->State->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_State" class="store_grn_State">
<span<?php echo $store_grn->State->viewAttributes() ?>>
<?php echo $store_grn->State->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_State" name="x<?php echo $store_grn_grid->RowIndex ?>_State" id="x<?php echo $store_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($store_grn->State->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_State" name="o<?php echo $store_grn_grid->RowIndex ?>_State" id="o<?php echo $store_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($store_grn->State->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_State" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_State" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($store_grn->State->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_State" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_State" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($store_grn->State->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $store_grn->Pincode->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Pincode" class="form-group store_grn_Pincode">
<input type="text" data-table="store_grn" data-field="x_Pincode" name="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Pincode->getPlaceHolder()) ?>" value="<?php echo $store_grn->Pincode->EditValue ?>"<?php echo $store_grn->Pincode->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_Pincode" name="o<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="o<?php echo $store_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($store_grn->Pincode->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Pincode" class="form-group store_grn_Pincode">
<input type="text" data-table="store_grn" data-field="x_Pincode" name="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Pincode->getPlaceHolder()) ?>" value="<?php echo $store_grn->Pincode->EditValue ?>"<?php echo $store_grn->Pincode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Pincode" class="store_grn_Pincode">
<span<?php echo $store_grn->Pincode->viewAttributes() ?>>
<?php echo $store_grn->Pincode->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_Pincode" name="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($store_grn->Pincode->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_Pincode" name="o<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="o<?php echo $store_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($store_grn->Pincode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_Pincode" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($store_grn->Pincode->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_Pincode" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($store_grn->Pincode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $store_grn->Phone->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Phone" class="form-group store_grn_Phone">
<input type="text" data-table="store_grn" data-field="x_Phone" name="x<?php echo $store_grn_grid->RowIndex ?>_Phone" id="x<?php echo $store_grn_grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Phone->getPlaceHolder()) ?>" value="<?php echo $store_grn->Phone->EditValue ?>"<?php echo $store_grn->Phone->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_Phone" name="o<?php echo $store_grn_grid->RowIndex ?>_Phone" id="o<?php echo $store_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($store_grn->Phone->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Phone" class="form-group store_grn_Phone">
<input type="text" data-table="store_grn" data-field="x_Phone" name="x<?php echo $store_grn_grid->RowIndex ?>_Phone" id="x<?php echo $store_grn_grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Phone->getPlaceHolder()) ?>" value="<?php echo $store_grn->Phone->EditValue ?>"<?php echo $store_grn->Phone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Phone" class="store_grn_Phone">
<span<?php echo $store_grn->Phone->viewAttributes() ?>>
<?php echo $store_grn->Phone->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_Phone" name="x<?php echo $store_grn_grid->RowIndex ?>_Phone" id="x<?php echo $store_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($store_grn->Phone->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_Phone" name="o<?php echo $store_grn_grid->RowIndex ?>_Phone" id="o<?php echo $store_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($store_grn->Phone->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_Phone" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_Phone" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($store_grn->Phone->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_Phone" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_Phone" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($store_grn->Phone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO"<?php echo $store_grn->BILLNO->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BILLNO" class="form-group store_grn_BILLNO">
<input type="text" data-table="store_grn" data-field="x_BILLNO" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->BILLNO->getPlaceHolder()) ?>" value="<?php echo $store_grn->BILLNO->EditValue ?>"<?php echo $store_grn->BILLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_BILLNO" name="o<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="o<?php echo $store_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($store_grn->BILLNO->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BILLNO" class="form-group store_grn_BILLNO">
<input type="text" data-table="store_grn" data-field="x_BILLNO" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->BILLNO->getPlaceHolder()) ?>" value="<?php echo $store_grn->BILLNO->EditValue ?>"<?php echo $store_grn->BILLNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BILLNO" class="store_grn_BILLNO">
<span<?php echo $store_grn->BILLNO->viewAttributes() ?>>
<?php echo $store_grn->BILLNO->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_BILLNO" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($store_grn->BILLNO->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_BILLNO" name="o<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="o<?php echo $store_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($store_grn->BILLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_BILLNO" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($store_grn->BILLNO->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_BILLNO" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($store_grn->BILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT"<?php echo $store_grn->BILLDT->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BILLDT" class="form-group store_grn_BILLDT">
<input type="text" data-table="store_grn" data-field="x_BILLDT" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" placeholder="<?php echo HtmlEncode($store_grn->BILLDT->getPlaceHolder()) ?>" value="<?php echo $store_grn->BILLDT->EditValue ?>"<?php echo $store_grn->BILLDT->editAttributes() ?>>
<?php if (!$store_grn->BILLDT->ReadOnly && !$store_grn->BILLDT->Disabled && !isset($store_grn->BILLDT->EditAttrs["readonly"]) && !isset($store_grn->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_grngrid", "x<?php echo $store_grn_grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="store_grn" data-field="x_BILLDT" name="o<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="o<?php echo $store_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($store_grn->BILLDT->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BILLDT" class="form-group store_grn_BILLDT">
<input type="text" data-table="store_grn" data-field="x_BILLDT" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" placeholder="<?php echo HtmlEncode($store_grn->BILLDT->getPlaceHolder()) ?>" value="<?php echo $store_grn->BILLDT->EditValue ?>"<?php echo $store_grn->BILLDT->editAttributes() ?>>
<?php if (!$store_grn->BILLDT->ReadOnly && !$store_grn->BILLDT->Disabled && !isset($store_grn->BILLDT->EditAttrs["readonly"]) && !isset($store_grn->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_grngrid", "x<?php echo $store_grn_grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BILLDT" class="store_grn_BILLDT">
<span<?php echo $store_grn->BILLDT->viewAttributes() ?>>
<?php echo $store_grn->BILLDT->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_BILLDT" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($store_grn->BILLDT->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_BILLDT" name="o<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="o<?php echo $store_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($store_grn->BILLDT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_BILLDT" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($store_grn->BILLDT->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_BILLDT" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($store_grn->BILLDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue"<?php echo $store_grn->BillTotalValue->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BillTotalValue" class="form-group store_grn_BillTotalValue">
<input type="text" data-table="store_grn" data-field="x_BillTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->BillTotalValue->EditValue ?>"<?php echo $store_grn->BillTotalValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_BillTotalValue" name="o<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="o<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($store_grn->BillTotalValue->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BillTotalValue" class="form-group store_grn_BillTotalValue">
<input type="text" data-table="store_grn" data-field="x_BillTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->BillTotalValue->EditValue ?>"<?php echo $store_grn->BillTotalValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BillTotalValue" class="store_grn_BillTotalValue">
<span<?php echo $store_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $store_grn->BillTotalValue->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_BillTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($store_grn->BillTotalValue->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_BillTotalValue" name="o<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="o<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($store_grn->BillTotalValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_BillTotalValue" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($store_grn->BillTotalValue->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_BillTotalValue" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($store_grn->BillTotalValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue"<?php echo $store_grn->GRNTotalValue->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_GRNTotalValue" class="form-group store_grn_GRNTotalValue">
<input type="text" data-table="store_grn" data-field="x_GRNTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->GRNTotalValue->EditValue ?>"<?php echo $store_grn->GRNTotalValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_GRNTotalValue" name="o<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="o<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($store_grn->GRNTotalValue->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_GRNTotalValue" class="form-group store_grn_GRNTotalValue">
<input type="text" data-table="store_grn" data-field="x_GRNTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->GRNTotalValue->EditValue ?>"<?php echo $store_grn->GRNTotalValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue">
<span<?php echo $store_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $store_grn->GRNTotalValue->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_GRNTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($store_grn->GRNTotalValue->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_GRNTotalValue" name="o<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="o<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($store_grn->GRNTotalValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_GRNTotalValue" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($store_grn->GRNTotalValue->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_GRNTotalValue" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($store_grn->GRNTotalValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount"<?php echo $store_grn->BillDiscount->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BillDiscount" class="form-group store_grn_BillDiscount">
<input type="text" data-table="store_grn" data-field="x_BillDiscount" name="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($store_grn->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $store_grn->BillDiscount->EditValue ?>"<?php echo $store_grn->BillDiscount->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_BillDiscount" name="o<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="o<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($store_grn->BillDiscount->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BillDiscount" class="form-group store_grn_BillDiscount">
<input type="text" data-table="store_grn" data-field="x_BillDiscount" name="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($store_grn->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $store_grn->BillDiscount->EditValue ?>"<?php echo $store_grn->BillDiscount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_BillDiscount" class="store_grn_BillDiscount">
<span<?php echo $store_grn->BillDiscount->viewAttributes() ?>>
<?php echo $store_grn->BillDiscount->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_BillDiscount" name="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($store_grn->BillDiscount->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_BillDiscount" name="o<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="o<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($store_grn->BillDiscount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_BillDiscount" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($store_grn->BillDiscount->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_BillDiscount" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($store_grn->BillDiscount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue"<?php echo $store_grn->GrnValue->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_GrnValue" class="form-group store_grn_GrnValue">
<input type="text" data-table="store_grn" data-field="x_GrnValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->GrnValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->GrnValue->EditValue ?>"<?php echo $store_grn->GrnValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_GrnValue" name="o<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="o<?php echo $store_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($store_grn->GrnValue->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_GrnValue" class="form-group store_grn_GrnValue">
<input type="text" data-table="store_grn" data-field="x_GrnValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->GrnValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->GrnValue->EditValue ?>"<?php echo $store_grn->GrnValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_GrnValue" class="store_grn_GrnValue">
<span<?php echo $store_grn->GrnValue->viewAttributes() ?>>
<?php echo $store_grn->GrnValue->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_GrnValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($store_grn->GrnValue->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_GrnValue" name="o<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="o<?php echo $store_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($store_grn->GrnValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_GrnValue" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($store_grn->GrnValue->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_GrnValue" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($store_grn->GrnValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid"<?php echo $store_grn->Pid->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($store_grn->Pid->getSessionValue() <> "") { ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Pid" class="form-group store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->Pid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $store_grn_grid->RowIndex ?>_Pid" name="x<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Pid" class="form-group store_grn_Pid">
<input type="text" data-table="store_grn" data-field="x_Pid" name="x<?php echo $store_grn_grid->RowIndex ?>_Pid" id="x<?php echo $store_grn_grid->RowIndex ?>_Pid" size="30" placeholder="<?php echo HtmlEncode($store_grn->Pid->getPlaceHolder()) ?>" value="<?php echo $store_grn->Pid->EditValue ?>"<?php echo $store_grn->Pid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_Pid" name="o<?php echo $store_grn_grid->RowIndex ?>_Pid" id="o<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($store_grn->Pid->getSessionValue() <> "") { ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Pid" class="form-group store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->Pid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $store_grn_grid->RowIndex ?>_Pid" name="x<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Pid" class="form-group store_grn_Pid">
<input type="text" data-table="store_grn" data-field="x_Pid" name="x<?php echo $store_grn_grid->RowIndex ?>_Pid" id="x<?php echo $store_grn_grid->RowIndex ?>_Pid" size="30" placeholder="<?php echo HtmlEncode($store_grn->Pid->getPlaceHolder()) ?>" value="<?php echo $store_grn->Pid->EditValue ?>"<?php echo $store_grn->Pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_Pid" class="store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<?php echo $store_grn->Pid->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_Pid" name="x<?php echo $store_grn_grid->RowIndex ?>_Pid" id="x<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_Pid" name="o<?php echo $store_grn_grid->RowIndex ?>_Pid" id="o<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_Pid" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_Pid" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_Pid" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_Pid" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo"<?php echo $store_grn->PaymentNo->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_PaymentNo" class="form-group store_grn_PaymentNo">
<input type="text" data-table="store_grn" data-field="x_PaymentNo" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaymentNo->EditValue ?>"<?php echo $store_grn->PaymentNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_PaymentNo" name="o<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="o<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($store_grn->PaymentNo->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_PaymentNo" class="form-group store_grn_PaymentNo">
<input type="text" data-table="store_grn" data-field="x_PaymentNo" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaymentNo->EditValue ?>"<?php echo $store_grn->PaymentNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_PaymentNo" class="store_grn_PaymentNo">
<span<?php echo $store_grn->PaymentNo->viewAttributes() ?>>
<?php echo $store_grn->PaymentNo->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_PaymentNo" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($store_grn->PaymentNo->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_PaymentNo" name="o<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="o<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($store_grn->PaymentNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_PaymentNo" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($store_grn->PaymentNo->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_PaymentNo" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($store_grn->PaymentNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $store_grn->PaymentStatus->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_PaymentStatus" class="form-group store_grn_PaymentStatus">
<input type="text" data-table="store_grn" data-field="x_PaymentStatus" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaymentStatus->EditValue ?>"<?php echo $store_grn->PaymentStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_PaymentStatus" name="o<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($store_grn->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_PaymentStatus" class="form-group store_grn_PaymentStatus">
<input type="text" data-table="store_grn" data-field="x_PaymentStatus" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaymentStatus->EditValue ?>"<?php echo $store_grn->PaymentStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_PaymentStatus" class="store_grn_PaymentStatus">
<span<?php echo $store_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $store_grn->PaymentStatus->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_PaymentStatus" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($store_grn->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_PaymentStatus" name="o<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($store_grn->PaymentStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_PaymentStatus" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($store_grn->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_PaymentStatus" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($store_grn->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $store_grn->PaidAmount->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_PaidAmount" class="form-group store_grn_PaidAmount">
<input type="text" data-table="store_grn" data-field="x_PaidAmount" name="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($store_grn->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaidAmount->EditValue ?>"<?php echo $store_grn->PaidAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_PaidAmount" name="o<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="o<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($store_grn->PaidAmount->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_PaidAmount" class="form-group store_grn_PaidAmount">
<input type="text" data-table="store_grn" data-field="x_PaidAmount" name="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($store_grn->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaidAmount->EditValue ?>"<?php echo $store_grn->PaidAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_PaidAmount" class="store_grn_PaidAmount">
<span<?php echo $store_grn->PaidAmount->viewAttributes() ?>>
<?php echo $store_grn->PaidAmount->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_PaidAmount" name="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($store_grn->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_PaidAmount" name="o<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="o<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($store_grn->PaidAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_PaidAmount" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($store_grn->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_PaidAmount" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($store_grn->PaidAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_grn->StoreID->cellAttributes() ?>>
<?php if ($store_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_StoreID" class="form-group store_grn_StoreID">
<input type="text" data-table="store_grn" data-field="x_StoreID" name="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_grn->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_grn->StoreID->EditValue ?>"<?php echo $store_grn->StoreID->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_grn" data-field="x_StoreID" name="o<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="o<?php echo $store_grn_grid->RowIndex ?>_StoreID" value="<?php echo HtmlEncode($store_grn->StoreID->OldValue) ?>">
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_StoreID" class="form-group store_grn_StoreID">
<input type="text" data-table="store_grn" data-field="x_StoreID" name="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_grn->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_grn->StoreID->EditValue ?>"<?php echo $store_grn->StoreID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_grn_grid->RowCnt ?>_store_grn_StoreID" class="store_grn_StoreID">
<span<?php echo $store_grn->StoreID->viewAttributes() ?>>
<?php echo $store_grn->StoreID->getViewValue() ?></span>
</span>
<?php if (!$store_grn->isConfirm()) { ?>
<input type="hidden" data-table="store_grn" data-field="x_StoreID" name="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" value="<?php echo HtmlEncode($store_grn->StoreID->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_StoreID" name="o<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="o<?php echo $store_grn_grid->RowIndex ?>_StoreID" value="<?php echo HtmlEncode($store_grn->StoreID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="store_grn" data-field="x_StoreID" name="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="fstore_grngrid$x<?php echo $store_grn_grid->RowIndex ?>_StoreID" value="<?php echo HtmlEncode($store_grn->StoreID->FormValue) ?>">
<input type="hidden" data-table="store_grn" data-field="x_StoreID" name="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="fstore_grngrid$o<?php echo $store_grn_grid->RowIndex ?>_StoreID" value="<?php echo HtmlEncode($store_grn->StoreID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_grn_grid->ListOptions->render("body", "right", $store_grn_grid->RowCnt);
?>
	</tr>
<?php if ($store_grn->RowType == ROWTYPE_ADD || $store_grn->RowType == ROWTYPE_EDIT) { ?>
<script>
fstore_grngrid.updateLists(<?php echo $store_grn_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$store_grn->isGridAdd() || $store_grn->CurrentMode == "copy")
		if (!$store_grn_grid->Recordset->EOF)
			$store_grn_grid->Recordset->moveNext();
}
?>
<?php
	if ($store_grn->CurrentMode == "add" || $store_grn->CurrentMode == "copy" || $store_grn->CurrentMode == "edit") {
		$store_grn_grid->RowIndex = '$rowindex$';
		$store_grn_grid->loadRowValues();

		// Set row properties
		$store_grn->resetAttributes();
		$store_grn->RowAttrs = array_merge($store_grn->RowAttrs, array('data-rowindex'=>$store_grn_grid->RowIndex, 'id'=>'r0_store_grn', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($store_grn->RowAttrs["class"], "ew-template");
		$store_grn->RowType = ROWTYPE_ADD;

		// Render row
		$store_grn_grid->renderRow();

		// Render list options
		$store_grn_grid->renderListOptions();
		$store_grn_grid->StartRowCnt = 0;
?>
	<tr<?php echo $store_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_grn_grid->ListOptions->render("body", "left", $store_grn_grid->RowIndex);
?>
	<?php if ($store_grn->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$store_grn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_store_grn_id" class="form-group store_grn_id">
<span<?php echo $store_grn->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_id" name="x<?php echo $store_grn_grid->RowIndex ?>_id" id="x<?php echo $store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($store_grn->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_id" name="o<?php echo $store_grn_grid->RowIndex ?>_id" id="o<?php echo $store_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($store_grn->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_GRNNO" class="form-group store_grn_GRNNO">
<input type="text" data-table="store_grn" data-field="x_GRNNO" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->GRNNO->getPlaceHolder()) ?>" value="<?php echo $store_grn->GRNNO->EditValue ?>"<?php echo $store_grn->GRNNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_GRNNO" class="form-group store_grn_GRNNO">
<span<?php echo $store_grn->GRNNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->GRNNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_GRNNO" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($store_grn->GRNNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_GRNNO" name="o<?php echo $store_grn_grid->RowIndex ?>_GRNNO" id="o<?php echo $store_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($store_grn->GRNNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->DT->Visible) { // DT ?>
		<td data-name="DT">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_DT" class="form-group store_grn_DT">
<input type="text" data-table="store_grn" data-field="x_DT" name="x<?php echo $store_grn_grid->RowIndex ?>_DT" id="x<?php echo $store_grn_grid->RowIndex ?>_DT" placeholder="<?php echo HtmlEncode($store_grn->DT->getPlaceHolder()) ?>" value="<?php echo $store_grn->DT->EditValue ?>"<?php echo $store_grn->DT->editAttributes() ?>>
<?php if (!$store_grn->DT->ReadOnly && !$store_grn->DT->Disabled && !isset($store_grn->DT->EditAttrs["readonly"]) && !isset($store_grn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_grngrid", "x<?php echo $store_grn_grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_DT" class="form-group store_grn_DT">
<span<?php echo $store_grn->DT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->DT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_DT" name="x<?php echo $store_grn_grid->RowIndex ?>_DT" id="x<?php echo $store_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($store_grn->DT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_DT" name="o<?php echo $store_grn_grid->RowIndex ?>_DT" id="o<?php echo $store_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($store_grn->DT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_Customername" class="form-group store_grn_Customername">
<input type="text" data-table="store_grn" data-field="x_Customername" name="x<?php echo $store_grn_grid->RowIndex ?>_Customername" id="x<?php echo $store_grn_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Customername->getPlaceHolder()) ?>" value="<?php echo $store_grn->Customername->EditValue ?>"<?php echo $store_grn->Customername->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_Customername" class="form-group store_grn_Customername">
<span<?php echo $store_grn->Customername->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->Customername->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_Customername" name="x<?php echo $store_grn_grid->RowIndex ?>_Customername" id="x<?php echo $store_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($store_grn->Customername->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_Customername" name="o<?php echo $store_grn_grid->RowIndex ?>_Customername" id="o<?php echo $store_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($store_grn->Customername->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->State->Visible) { // State ?>
		<td data-name="State">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_State" class="form-group store_grn_State">
<input type="text" data-table="store_grn" data-field="x_State" name="x<?php echo $store_grn_grid->RowIndex ?>_State" id="x<?php echo $store_grn_grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->State->getPlaceHolder()) ?>" value="<?php echo $store_grn->State->EditValue ?>"<?php echo $store_grn->State->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_State" class="form-group store_grn_State">
<span<?php echo $store_grn->State->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->State->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_State" name="x<?php echo $store_grn_grid->RowIndex ?>_State" id="x<?php echo $store_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($store_grn->State->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_State" name="o<?php echo $store_grn_grid->RowIndex ?>_State" id="o<?php echo $store_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($store_grn->State->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_Pincode" class="form-group store_grn_Pincode">
<input type="text" data-table="store_grn" data-field="x_Pincode" name="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Pincode->getPlaceHolder()) ?>" value="<?php echo $store_grn->Pincode->EditValue ?>"<?php echo $store_grn->Pincode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_Pincode" class="form-group store_grn_Pincode">
<span<?php echo $store_grn->Pincode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->Pincode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_Pincode" name="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $store_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($store_grn->Pincode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_Pincode" name="o<?php echo $store_grn_grid->RowIndex ?>_Pincode" id="o<?php echo $store_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($store_grn->Pincode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_Phone" class="form-group store_grn_Phone">
<input type="text" data-table="store_grn" data-field="x_Phone" name="x<?php echo $store_grn_grid->RowIndex ?>_Phone" id="x<?php echo $store_grn_grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Phone->getPlaceHolder()) ?>" value="<?php echo $store_grn->Phone->EditValue ?>"<?php echo $store_grn->Phone->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_Phone" class="form-group store_grn_Phone">
<span<?php echo $store_grn->Phone->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->Phone->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_Phone" name="x<?php echo $store_grn_grid->RowIndex ?>_Phone" id="x<?php echo $store_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($store_grn->Phone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_Phone" name="o<?php echo $store_grn_grid->RowIndex ?>_Phone" id="o<?php echo $store_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($store_grn->Phone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_BILLNO" class="form-group store_grn_BILLNO">
<input type="text" data-table="store_grn" data-field="x_BILLNO" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->BILLNO->getPlaceHolder()) ?>" value="<?php echo $store_grn->BILLNO->EditValue ?>"<?php echo $store_grn->BILLNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_BILLNO" class="form-group store_grn_BILLNO">
<span<?php echo $store_grn->BILLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->BILLNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_BILLNO" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($store_grn->BILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_BILLNO" name="o<?php echo $store_grn_grid->RowIndex ?>_BILLNO" id="o<?php echo $store_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($store_grn->BILLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_BILLDT" class="form-group store_grn_BILLDT">
<input type="text" data-table="store_grn" data-field="x_BILLDT" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" placeholder="<?php echo HtmlEncode($store_grn->BILLDT->getPlaceHolder()) ?>" value="<?php echo $store_grn->BILLDT->EditValue ?>"<?php echo $store_grn->BILLDT->editAttributes() ?>>
<?php if (!$store_grn->BILLDT->ReadOnly && !$store_grn->BILLDT->Disabled && !isset($store_grn->BILLDT->EditAttrs["readonly"]) && !isset($store_grn->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_grngrid", "x<?php echo $store_grn_grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_BILLDT" class="form-group store_grn_BILLDT">
<span<?php echo $store_grn->BILLDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->BILLDT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_BILLDT" name="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $store_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($store_grn->BILLDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_BILLDT" name="o<?php echo $store_grn_grid->RowIndex ?>_BILLDT" id="o<?php echo $store_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($store_grn->BILLDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_BillTotalValue" class="form-group store_grn_BillTotalValue">
<input type="text" data-table="store_grn" data-field="x_BillTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->BillTotalValue->EditValue ?>"<?php echo $store_grn->BillTotalValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_BillTotalValue" class="form-group store_grn_BillTotalValue">
<span<?php echo $store_grn->BillTotalValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->BillTotalValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_BillTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($store_grn->BillTotalValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_BillTotalValue" name="o<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" id="o<?php echo $store_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($store_grn->BillTotalValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_GRNTotalValue" class="form-group store_grn_GRNTotalValue">
<input type="text" data-table="store_grn" data-field="x_GRNTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->GRNTotalValue->EditValue ?>"<?php echo $store_grn->GRNTotalValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_GRNTotalValue" class="form-group store_grn_GRNTotalValue">
<span<?php echo $store_grn->GRNTotalValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->GRNTotalValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_GRNTotalValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($store_grn->GRNTotalValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_GRNTotalValue" name="o<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" id="o<?php echo $store_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($store_grn->GRNTotalValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_BillDiscount" class="form-group store_grn_BillDiscount">
<input type="text" data-table="store_grn" data-field="x_BillDiscount" name="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($store_grn->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $store_grn->BillDiscount->EditValue ?>"<?php echo $store_grn->BillDiscount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_BillDiscount" class="form-group store_grn_BillDiscount">
<span<?php echo $store_grn->BillDiscount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->BillDiscount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_BillDiscount" name="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($store_grn->BillDiscount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_BillDiscount" name="o<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" id="o<?php echo $store_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($store_grn->BillDiscount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_GrnValue" class="form-group store_grn_GrnValue">
<input type="text" data-table="store_grn" data-field="x_GrnValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->GrnValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->GrnValue->EditValue ?>"<?php echo $store_grn->GrnValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_GrnValue" class="form-group store_grn_GrnValue">
<span<?php echo $store_grn->GrnValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->GrnValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_GrnValue" name="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $store_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($store_grn->GrnValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_GrnValue" name="o<?php echo $store_grn_grid->RowIndex ?>_GrnValue" id="o<?php echo $store_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($store_grn->GrnValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid">
<?php if (!$store_grn->isConfirm()) { ?>
<?php if ($store_grn->Pid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_store_grn_Pid" class="form-group store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->Pid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $store_grn_grid->RowIndex ?>_Pid" name="x<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_store_grn_Pid" class="form-group store_grn_Pid">
<input type="text" data-table="store_grn" data-field="x_Pid" name="x<?php echo $store_grn_grid->RowIndex ?>_Pid" id="x<?php echo $store_grn_grid->RowIndex ?>_Pid" size="30" placeholder="<?php echo HtmlEncode($store_grn->Pid->getPlaceHolder()) ?>" value="<?php echo $store_grn->Pid->EditValue ?>"<?php echo $store_grn->Pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_store_grn_Pid" class="form-group store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->Pid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_Pid" name="x<?php echo $store_grn_grid->RowIndex ?>_Pid" id="x<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_Pid" name="o<?php echo $store_grn_grid->RowIndex ?>_Pid" id="o<?php echo $store_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($store_grn->Pid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_PaymentNo" class="form-group store_grn_PaymentNo">
<input type="text" data-table="store_grn" data-field="x_PaymentNo" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaymentNo->EditValue ?>"<?php echo $store_grn->PaymentNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_PaymentNo" class="form-group store_grn_PaymentNo">
<span<?php echo $store_grn->PaymentNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->PaymentNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_PaymentNo" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($store_grn->PaymentNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_PaymentNo" name="o<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" id="o<?php echo $store_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($store_grn->PaymentNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_PaymentStatus" class="form-group store_grn_PaymentStatus">
<input type="text" data-table="store_grn" data-field="x_PaymentStatus" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaymentStatus->EditValue ?>"<?php echo $store_grn->PaymentStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_PaymentStatus" class="form-group store_grn_PaymentStatus">
<span<?php echo $store_grn->PaymentStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->PaymentStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_PaymentStatus" name="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($store_grn->PaymentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_PaymentStatus" name="o<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $store_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($store_grn->PaymentStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_PaidAmount" class="form-group store_grn_PaidAmount">
<input type="text" data-table="store_grn" data-field="x_PaidAmount" name="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($store_grn->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaidAmount->EditValue ?>"<?php echo $store_grn->PaidAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_PaidAmount" class="form-group store_grn_PaidAmount">
<span<?php echo $store_grn->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->PaidAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_PaidAmount" name="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($store_grn->PaidAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_PaidAmount" name="o<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" id="o<?php echo $store_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($store_grn->PaidAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID">
<?php if (!$store_grn->isConfirm()) { ?>
<span id="el$rowindex$_store_grn_StoreID" class="form-group store_grn_StoreID">
<input type="text" data-table="store_grn" data-field="x_StoreID" name="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_grn->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_grn->StoreID->EditValue ?>"<?php echo $store_grn->StoreID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_store_grn_StoreID" class="form-group store_grn_StoreID">
<span<?php echo $store_grn->StoreID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->StoreID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="store_grn" data-field="x_StoreID" name="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="x<?php echo $store_grn_grid->RowIndex ?>_StoreID" value="<?php echo HtmlEncode($store_grn->StoreID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="store_grn" data-field="x_StoreID" name="o<?php echo $store_grn_grid->RowIndex ?>_StoreID" id="o<?php echo $store_grn_grid->RowIndex ?>_StoreID" value="<?php echo HtmlEncode($store_grn->StoreID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_grn_grid->ListOptions->render("body", "right", $store_grn_grid->RowIndex);
?>
<script>
fstore_grngrid.updateLists(<?php echo $store_grn_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
<?php

// Render aggregate row
$store_grn->RowType = ROWTYPE_AGGREGATE;
$store_grn->resetAttributes();
$store_grn_grid->renderRow();
?>
<?php if ($store_grn_grid->TotalRecs > 0 && $store_grn->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$store_grn_grid->renderListOptions();

// Render list options (footer, left)
$store_grn_grid->ListOptions->render("footer", "left");
?>
	<?php if ($store_grn->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $store_grn->id->footerCellClass() ?>"><span id="elf_store_grn_id" class="store_grn_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" class="<?php echo $store_grn->GRNNO->footerCellClass() ?>"><span id="elf_store_grn_GRNNO" class="store_grn_GRNNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->DT->Visible) { // DT ?>
		<td data-name="DT" class="<?php echo $store_grn->DT->footerCellClass() ?>"><span id="elf_store_grn_DT" class="store_grn_DT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername" class="<?php echo $store_grn->Customername->footerCellClass() ?>"><span id="elf_store_grn_Customername" class="store_grn_Customername">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->State->Visible) { // State ?>
		<td data-name="State" class="<?php echo $store_grn->State->footerCellClass() ?>"><span id="elf_store_grn_State" class="store_grn_State">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" class="<?php echo $store_grn->Pincode->footerCellClass() ?>"><span id="elf_store_grn_Pincode" class="store_grn_Pincode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone" class="<?php echo $store_grn->Phone->footerCellClass() ?>"><span id="elf_store_grn_Phone" class="store_grn_Phone">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" class="<?php echo $store_grn->BILLNO->footerCellClass() ?>"><span id="elf_store_grn_BILLNO" class="store_grn_BILLNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" class="<?php echo $store_grn->BILLDT->footerCellClass() ?>"><span id="elf_store_grn_BILLDT" class="store_grn_BILLDT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" class="<?php echo $store_grn->BillTotalValue->footerCellClass() ?>"><span id="elf_store_grn_BillTotalValue" class="store_grn_BillTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $store_grn->BillTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" class="<?php echo $store_grn->GRNTotalValue->footerCellClass() ?>"><span id="elf_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $store_grn->GRNTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" class="<?php echo $store_grn->BillDiscount->footerCellClass() ?>"><span id="elf_store_grn_BillDiscount" class="store_grn_BillDiscount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $store_grn->BillDiscount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue" class="<?php echo $store_grn->GrnValue->footerCellClass() ?>"><span id="elf_store_grn_GrnValue" class="store_grn_GrnValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid" class="<?php echo $store_grn->Pid->footerCellClass() ?>"><span id="elf_store_grn_Pid" class="store_grn_Pid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo" class="<?php echo $store_grn->PaymentNo->footerCellClass() ?>"><span id="elf_store_grn_PaymentNo" class="store_grn_PaymentNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" class="<?php echo $store_grn->PaymentStatus->footerCellClass() ?>"><span id="elf_store_grn_PaymentStatus" class="store_grn_PaymentStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" class="<?php echo $store_grn->PaidAmount->footerCellClass() ?>"><span id="elf_store_grn_PaidAmount" class="store_grn_PaidAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID" class="<?php echo $store_grn->StoreID->footerCellClass() ?>"><span id="elf_store_grn_StoreID" class="store_grn_StoreID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$store_grn_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php if ($store_grn->CurrentMode == "add" || $store_grn->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $store_grn_grid->FormKeyCountName ?>" id="<?php echo $store_grn_grid->FormKeyCountName ?>" value="<?php echo $store_grn_grid->KeyCount ?>">
<?php echo $store_grn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($store_grn->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $store_grn_grid->FormKeyCountName ?>" id="<?php echo $store_grn_grid->FormKeyCountName ?>" value="<?php echo $store_grn_grid->KeyCount ?>">
<?php echo $store_grn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($store_grn->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fstore_grngrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($store_grn_grid->Recordset)
	$store_grn_grid->Recordset->Close();
?>
</div>
<?php if ($store_grn_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $store_grn_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_grn_grid->TotalRecs == 0 && !$store_grn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_grn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_grn_grid->terminate();
?>
<?php if (!$store_grn->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_grn", "95%", "");
</script>
<?php } ?>
<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$pharmacy_grn_grid->isExport()) { ?>
<script>
var fpharmacy_grngrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpharmacy_grngrid = new ew.Form("fpharmacy_grngrid", "grid");
	fpharmacy_grngrid.formKeyCountName = '<?php echo $pharmacy_grn_grid->FormKeyCountName ?>';

	// Validate form
	fpharmacy_grngrid.validate = function() {
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
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($pharmacy_grn_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->id->caption(), $pharmacy_grn_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_grid->GRNNO->Required) { ?>
				elm = this.getElements("x" + infix + "_GRNNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->GRNNO->caption(), $pharmacy_grn_grid->GRNNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_grid->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->DT->caption(), $pharmacy_grn_grid->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_grid->DT->errorMessage()) ?>");
			<?php if ($pharmacy_grn_grid->Customername->Required) { ?>
				elm = this.getElements("x" + infix + "_Customername");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->Customername->caption(), $pharmacy_grn_grid->Customername->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_grid->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->State->caption(), $pharmacy_grn_grid->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_grid->Pincode->Required) { ?>
				elm = this.getElements("x" + infix + "_Pincode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->Pincode->caption(), $pharmacy_grn_grid->Pincode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_grid->Phone->Required) { ?>
				elm = this.getElements("x" + infix + "_Phone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->Phone->caption(), $pharmacy_grn_grid->Phone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_grid->BILLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->BILLNO->caption(), $pharmacy_grn_grid->BILLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_grid->BILLDT->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->BILLDT->caption(), $pharmacy_grn_grid->BILLDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BILLDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_grid->BILLDT->errorMessage()) ?>");
			<?php if ($pharmacy_grn_grid->BillTotalValue->Required) { ?>
				elm = this.getElements("x" + infix + "_BillTotalValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->BillTotalValue->caption(), $pharmacy_grn_grid->BillTotalValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillTotalValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_grid->BillTotalValue->errorMessage()) ?>");
			<?php if ($pharmacy_grn_grid->GRNTotalValue->Required) { ?>
				elm = this.getElements("x" + infix + "_GRNTotalValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->GRNTotalValue->caption(), $pharmacy_grn_grid->GRNTotalValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GRNTotalValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_grid->GRNTotalValue->errorMessage()) ?>");
			<?php if ($pharmacy_grn_grid->BillDiscount->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDiscount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->BillDiscount->caption(), $pharmacy_grn_grid->BillDiscount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDiscount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_grid->BillDiscount->errorMessage()) ?>");
			<?php if ($pharmacy_grn_grid->GrnValue->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->GrnValue->caption(), $pharmacy_grn_grid->GrnValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_grid->GrnValue->errorMessage()) ?>");
			<?php if ($pharmacy_grn_grid->Pid->Required) { ?>
				elm = this.getElements("x" + infix + "_Pid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->Pid->caption(), $pharmacy_grn_grid->Pid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Pid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_grid->Pid->errorMessage()) ?>");
			<?php if ($pharmacy_grn_grid->PaymentNo->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->PaymentNo->caption(), $pharmacy_grn_grid->PaymentNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_grid->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->PaymentStatus->caption(), $pharmacy_grn_grid->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_grid->PaidAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PaidAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_grid->PaidAmount->caption(), $pharmacy_grn_grid->PaidAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PaidAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_grid->PaidAmount->errorMessage()) ?>");

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpharmacy_grngrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_grngrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpharmacy_grngrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$pharmacy_grn_grid->renderOtherOptions();
?>
<?php if ($pharmacy_grn_grid->TotalRecords > 0 || $pharmacy_grn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_grn_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_grn">
<?php if ($pharmacy_grn_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $pharmacy_grn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_grngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_grn" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_grngrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_grn->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_grn_grid->renderListOptions();

// Render list options (header, left)
$pharmacy_grn_grid->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_grn_grid->id->Visible) { // id ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_grn_grid->id->headerCellClass() ?>"><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_grn_grid->id->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->GRNNO->Visible) { // GRNNO ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $pharmacy_grn_grid->GRNNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $pharmacy_grn_grid->GRNNO->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->GRNNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->GRNNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->GRNNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->DT->Visible) { // DT ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_grn_grid->DT->headerCellClass() ?>"><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_grn_grid->DT->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->DT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->DT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_grn_grid->Customername->headerCellClass() ?>"><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_grn_grid->Customername->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->Customername->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->Customername->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->State->Visible) { // State ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_grn_grid->State->headerCellClass() ?>"><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_grn_grid->State->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_grn_grid->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_grn_grid->Pincode->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->Pincode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->Pincode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->Pincode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_grn_grid->Phone->headerCellClass() ?>"><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_grn_grid->Phone->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->Phone->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->Phone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->Phone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->BILLNO->Visible) { // BILLNO ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $pharmacy_grn_grid->BILLNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $pharmacy_grn_grid->BILLNO->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->BILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->BILLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->BILLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->BILLDT->Visible) { // BILLDT ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $pharmacy_grn_grid->BILLDT->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $pharmacy_grn_grid->BILLDT->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->BILLDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->BILLDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->BillTotalValue) == "") { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_grn_grid->BillTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->BillTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_grn_grid->BillTotalValue->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->BillTotalValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->BillTotalValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->GRNTotalValue) == "") { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_grn_grid->GRNTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->GRNTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_grn_grid->GRNTotalValue->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->GRNTotalValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->GRNTotalValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->BillDiscount) == "") { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_grn_grid->BillDiscount->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->BillDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_grn_grid->BillDiscount->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->BillDiscount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->BillDiscount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->GrnValue->Visible) { // GrnValue ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->GrnValue) == "") { ?>
		<th data-name="GrnValue" class="<?php echo $pharmacy_grn_grid->GrnValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->GrnValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnValue" class="<?php echo $pharmacy_grn_grid->GrnValue->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->GrnValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->GrnValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->GrnValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->Pid->Visible) { // Pid ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->Pid) == "") { ?>
		<th data-name="Pid" class="<?php echo $pharmacy_grn_grid->Pid->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->Pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pid" class="<?php echo $pharmacy_grn_grid->Pid->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->Pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->Pid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->Pid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->PaymentNo->Visible) { // PaymentNo ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->PaymentNo) == "") { ?>
		<th data-name="PaymentNo" class="<?php echo $pharmacy_grn_grid->PaymentNo->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->PaymentNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentNo" class="<?php echo $pharmacy_grn_grid->PaymentNo->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->PaymentNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->PaymentNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->PaymentNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $pharmacy_grn_grid->PaymentStatus->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $pharmacy_grn_grid->PaymentStatus->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_grid->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($pharmacy_grn_grid->SortUrl($pharmacy_grn_grid->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_grn_grid->PaidAmount->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_grn_grid->PaidAmount->headerCellClass() ?>"><div><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_grid->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_grid->PaidAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_grid->PaidAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$pharmacy_grn_grid->StartRecord = 1;
$pharmacy_grn_grid->StopRecord = $pharmacy_grn_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($pharmacy_grn->isConfirm() || $pharmacy_grn_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_grn_grid->FormKeyCountName) && ($pharmacy_grn_grid->isGridAdd() || $pharmacy_grn_grid->isGridEdit() || $pharmacy_grn->isConfirm())) {
		$pharmacy_grn_grid->KeyCount = $CurrentForm->getValue($pharmacy_grn_grid->FormKeyCountName);
		$pharmacy_grn_grid->StopRecord = $pharmacy_grn_grid->StartRecord + $pharmacy_grn_grid->KeyCount - 1;
	}
}
$pharmacy_grn_grid->RecordCount = $pharmacy_grn_grid->StartRecord - 1;
if ($pharmacy_grn_grid->Recordset && !$pharmacy_grn_grid->Recordset->EOF) {
	$pharmacy_grn_grid->Recordset->moveFirst();
	$selectLimit = $pharmacy_grn_grid->UseSelectLimit;
	if (!$selectLimit && $pharmacy_grn_grid->StartRecord > 1)
		$pharmacy_grn_grid->Recordset->move($pharmacy_grn_grid->StartRecord - 1);
} elseif (!$pharmacy_grn->AllowAddDeleteRow && $pharmacy_grn_grid->StopRecord == 0) {
	$pharmacy_grn_grid->StopRecord = $pharmacy_grn->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_grn->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_grn->resetAttributes();
$pharmacy_grn_grid->renderRow();
if ($pharmacy_grn_grid->isGridAdd())
	$pharmacy_grn_grid->RowIndex = 0;
if ($pharmacy_grn_grid->isGridEdit())
	$pharmacy_grn_grid->RowIndex = 0;
while ($pharmacy_grn_grid->RecordCount < $pharmacy_grn_grid->StopRecord) {
	$pharmacy_grn_grid->RecordCount++;
	if ($pharmacy_grn_grid->RecordCount >= $pharmacy_grn_grid->StartRecord) {
		$pharmacy_grn_grid->RowCount++;
		if ($pharmacy_grn_grid->isGridAdd() || $pharmacy_grn_grid->isGridEdit() || $pharmacy_grn->isConfirm()) {
			$pharmacy_grn_grid->RowIndex++;
			$CurrentForm->Index = $pharmacy_grn_grid->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_grn_grid->FormActionName) && ($pharmacy_grn->isConfirm() || $pharmacy_grn_grid->EventCancelled))
				$pharmacy_grn_grid->RowAction = strval($CurrentForm->getValue($pharmacy_grn_grid->FormActionName));
			elseif ($pharmacy_grn_grid->isGridAdd())
				$pharmacy_grn_grid->RowAction = "insert";
			else
				$pharmacy_grn_grid->RowAction = "";
		}

		// Set up key count
		$pharmacy_grn_grid->KeyCount = $pharmacy_grn_grid->RowIndex;

		// Init row class and style
		$pharmacy_grn->resetAttributes();
		$pharmacy_grn->CssClass = "";
		if ($pharmacy_grn_grid->isGridAdd()) {
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
		if ($pharmacy_grn_grid->isGridAdd()) // Grid add
			$pharmacy_grn->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_grn_grid->isGridAdd() && $pharmacy_grn->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_grn_grid->restoreCurrentRowFormValues($pharmacy_grn_grid->RowIndex); // Restore form values
		if ($pharmacy_grn_grid->isGridEdit()) { // Grid edit
			if ($pharmacy_grn->EventCancelled)
				$pharmacy_grn_grid->restoreCurrentRowFormValues($pharmacy_grn_grid->RowIndex); // Restore form values
			if ($pharmacy_grn_grid->RowAction == "insert")
				$pharmacy_grn->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_grn->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_grn_grid->isGridEdit() && ($pharmacy_grn->RowType == ROWTYPE_EDIT || $pharmacy_grn->RowType == ROWTYPE_ADD) && $pharmacy_grn->EventCancelled) // Update failed
			$pharmacy_grn_grid->restoreCurrentRowFormValues($pharmacy_grn_grid->RowIndex); // Restore form values
		if ($pharmacy_grn->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_grn_grid->EditRowCount++;
		if ($pharmacy_grn->isConfirm()) // Confirm row
			$pharmacy_grn_grid->restoreCurrentRowFormValues($pharmacy_grn_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$pharmacy_grn->RowAttrs->merge(["data-rowindex" => $pharmacy_grn_grid->RowCount, "id" => "r" . $pharmacy_grn_grid->RowCount . "_pharmacy_grn", "data-rowtype" => $pharmacy_grn->RowType]);

		// Render row
		$pharmacy_grn_grid->renderRow();

		// Render list options
		$pharmacy_grn_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_grn_grid->RowAction != "delete" && $pharmacy_grn_grid->RowAction != "insertdelete" && !($pharmacy_grn_grid->RowAction == "insert" && $pharmacy_grn->isConfirm() && $pharmacy_grn_grid->emptyRow())) {
?>
	<tr <?php echo $pharmacy_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_grn_grid->ListOptions->render("body", "left", $pharmacy_grn_grid->RowCount);
?>
	<?php if ($pharmacy_grn_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_grn_grid->id->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_id" class="form-group">
<span<?php echo $pharmacy_grn_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_id">
<span<?php echo $pharmacy_grn_grid->id->viewAttributes() ?>><?php echo $pharmacy_grn_grid->id->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn_grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn_grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" <?php echo $pharmacy_grn_grid->GRNNO->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_GRNNO" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->GRNNO->EditValue ?>"<?php echo $pharmacy_grn_grid->GRNNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_GRNNO" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->GRNNO->EditValue ?>"<?php echo $pharmacy_grn_grid->GRNNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn_grid->GRNNO->viewAttributes() ?>><?php echo $pharmacy_grn_grid->GRNNO->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->DT->Visible) { // DT ?>
		<td data-name="DT" <?php echo $pharmacy_grn_grid->DT->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_DT" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_DT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->DT->EditValue ?>"<?php echo $pharmacy_grn_grid->DT->editAttributes() ?>>
<?php if (!$pharmacy_grn_grid->DT->ReadOnly && !$pharmacy_grn_grid->DT->Disabled && !isset($pharmacy_grn_grid->DT->EditAttrs["readonly"]) && !isset($pharmacy_grn_grid->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn_grid->DT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_DT" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_DT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->DT->EditValue ?>"<?php echo $pharmacy_grn_grid->DT->editAttributes() ?>>
<?php if (!$pharmacy_grn_grid->DT->ReadOnly && !$pharmacy_grn_grid->DT->Disabled && !isset($pharmacy_grn_grid->DT->EditAttrs["readonly"]) && !isset($pharmacy_grn_grid->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_DT">
<span<?php echo $pharmacy_grn_grid->DT->viewAttributes() ?>><?php echo $pharmacy_grn_grid->DT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn_grid->DT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn_grid->DT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn_grid->DT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn_grid->DT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Customername->Visible) { // Customername ?>
		<td data-name="Customername" <?php echo $pharmacy_grn_grid->Customername->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Customername" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Customername->EditValue ?>"<?php echo $pharmacy_grn_grid->Customername->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Customername" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Customername->EditValue ?>"<?php echo $pharmacy_grn_grid->Customername->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn_grid->Customername->viewAttributes() ?>><?php echo $pharmacy_grn_grid->Customername->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->State->Visible) { // State ?>
		<td data-name="State" <?php echo $pharmacy_grn_grid->State->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_State" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->State->EditValue ?>"<?php echo $pharmacy_grn_grid->State->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn_grid->State->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_State" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->State->EditValue ?>"<?php echo $pharmacy_grn_grid->State->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_State">
<span<?php echo $pharmacy_grn_grid->State->viewAttributes() ?>><?php echo $pharmacy_grn_grid->State->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn_grid->State->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn_grid->State->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn_grid->State->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn_grid->State->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" <?php echo $pharmacy_grn_grid->Pincode->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Pincode" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Pincode->EditValue ?>"<?php echo $pharmacy_grn_grid->Pincode->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Pincode" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Pincode->EditValue ?>"<?php echo $pharmacy_grn_grid->Pincode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn_grid->Pincode->viewAttributes() ?>><?php echo $pharmacy_grn_grid->Pincode->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Phone->Visible) { // Phone ?>
		<td data-name="Phone" <?php echo $pharmacy_grn_grid->Phone->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Phone" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Phone->EditValue ?>"<?php echo $pharmacy_grn_grid->Phone->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Phone" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Phone->EditValue ?>"<?php echo $pharmacy_grn_grid->Phone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn_grid->Phone->viewAttributes() ?>><?php echo $pharmacy_grn_grid->Phone->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" <?php echo $pharmacy_grn_grid->BILLNO->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BILLNO" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BILLNO->EditValue ?>"<?php echo $pharmacy_grn_grid->BILLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BILLNO" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BILLNO->EditValue ?>"<?php echo $pharmacy_grn_grid->BILLNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn_grid->BILLNO->viewAttributes() ?>><?php echo $pharmacy_grn_grid->BILLNO->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" <?php echo $pharmacy_grn_grid->BILLDT->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BILLDT" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BILLDT->EditValue ?>"<?php echo $pharmacy_grn_grid->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_grn_grid->BILLDT->ReadOnly && !$pharmacy_grn_grid->BILLDT->Disabled && !isset($pharmacy_grn_grid->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_grn_grid->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BILLDT" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BILLDT->EditValue ?>"<?php echo $pharmacy_grn_grid->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_grn_grid->BILLDT->ReadOnly && !$pharmacy_grn_grid->BILLDT->Disabled && !isset($pharmacy_grn_grid->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_grn_grid->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn_grid->BILLDT->viewAttributes() ?>><?php echo $pharmacy_grn_grid->BILLDT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" <?php echo $pharmacy_grn_grid->BillTotalValue->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BillTotalValue" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BillTotalValue->EditValue ?>"<?php echo $pharmacy_grn_grid->BillTotalValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BillTotalValue" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BillTotalValue->EditValue ?>"<?php echo $pharmacy_grn_grid->BillTotalValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn_grid->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_grid->BillTotalValue->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" <?php echo $pharmacy_grn_grid->GRNTotalValue->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_GRNTotalValue" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->GRNTotalValue->EditValue ?>"<?php echo $pharmacy_grn_grid->GRNTotalValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_GRNTotalValue" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->GRNTotalValue->EditValue ?>"<?php echo $pharmacy_grn_grid->GRNTotalValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn_grid->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_grid->GRNTotalValue->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" <?php echo $pharmacy_grn_grid->BillDiscount->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BillDiscount" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BillDiscount->EditValue ?>"<?php echo $pharmacy_grn_grid->BillDiscount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BillDiscount" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BillDiscount->EditValue ?>"<?php echo $pharmacy_grn_grid->BillDiscount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn_grid->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_grn_grid->BillDiscount->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue" <?php echo $pharmacy_grn_grid->GrnValue->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_GrnValue" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->GrnValue->EditValue ?>"<?php echo $pharmacy_grn_grid->GrnValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_GrnValue" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->GrnValue->EditValue ?>"<?php echo $pharmacy_grn_grid->GrnValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn_grid->GrnValue->viewAttributes() ?>><?php echo $pharmacy_grn_grid->GrnValue->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Pid->Visible) { // Pid ?>
		<td data-name="Pid" <?php echo $pharmacy_grn_grid->Pid->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pharmacy_grn_grid->Pid->getSessionValue() != "") { ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Pid" class="form-group">
<span<?php echo $pharmacy_grn_grid->Pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->Pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Pid" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Pid->EditValue ?>"<?php echo $pharmacy_grn_grid->Pid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pharmacy_grn_grid->Pid->getSessionValue() != "") { ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Pid" class="form-group">
<span<?php echo $pharmacy_grn_grid->Pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->Pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Pid" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Pid->EditValue ?>"<?php echo $pharmacy_grn_grid->Pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn_grid->Pid->viewAttributes() ?>><?php echo $pharmacy_grn_grid->Pid->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo" <?php echo $pharmacy_grn_grid->PaymentNo->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_PaymentNo" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->PaymentNo->EditValue ?>"<?php echo $pharmacy_grn_grid->PaymentNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_PaymentNo" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->PaymentNo->EditValue ?>"<?php echo $pharmacy_grn_grid->PaymentNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn_grid->PaymentNo->viewAttributes() ?>><?php echo $pharmacy_grn_grid->PaymentNo->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $pharmacy_grn_grid->PaymentStatus->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_PaymentStatus" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->PaymentStatus->EditValue ?>"<?php echo $pharmacy_grn_grid->PaymentStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_PaymentStatus" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->PaymentStatus->EditValue ?>"<?php echo $pharmacy_grn_grid->PaymentStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn_grid->PaymentStatus->viewAttributes() ?>><?php echo $pharmacy_grn_grid->PaymentStatus->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" <?php echo $pharmacy_grn_grid->PaidAmount->cellAttributes() ?>>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_PaidAmount" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->PaidAmount->EditValue ?>"<?php echo $pharmacy_grn_grid->PaidAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_PaidAmount" class="form-group">
<input type="text" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->PaidAmount->EditValue ?>"<?php echo $pharmacy_grn_grid->PaidAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_grn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_grn_grid->RowCount ?>_pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn_grid->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_grn_grid->PaidAmount->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="fpharmacy_grngrid$x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="fpharmacy_grngrid$o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_grn_grid->ListOptions->render("body", "right", $pharmacy_grn_grid->RowCount);
?>
	</tr>
<?php if ($pharmacy_grn->RowType == ROWTYPE_ADD || $pharmacy_grn->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "load"], function() {
	fpharmacy_grngrid.updateLists(<?php echo $pharmacy_grn_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_grn_grid->isGridAdd() || $pharmacy_grn->CurrentMode == "copy")
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
		$pharmacy_grn->RowAttrs->merge(["data-rowindex" => $pharmacy_grn_grid->RowIndex, "id" => "r0_pharmacy_grn", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_grn->RowAttrs->appendClass("ew-template");
		$pharmacy_grn->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_grn_grid->renderRow();

		// Render list options
		$pharmacy_grn_grid->renderListOptions();
		$pharmacy_grn_grid->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_grn_grid->ListOptions->render("body", "left", $pharmacy_grn_grid->RowIndex);
?>
	<?php if ($pharmacy_grn_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_id" class="form-group pharmacy_grn_id"></span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_id" class="form-group pharmacy_grn_id">
<span<?php echo $pharmacy_grn_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_grn_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_GRNNO" class="form-group pharmacy_grn_GRNNO">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->GRNNO->EditValue ?>"<?php echo $pharmacy_grn_grid->GRNNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_GRNNO" class="form-group pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn_grid->GRNNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->GRNNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->DT->Visible) { // DT ?>
		<td data-name="DT">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_DT" class="form-group pharmacy_grn_DT">
<input type="text" data-table="pharmacy_grn" data-field="x_DT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->DT->EditValue ?>"<?php echo $pharmacy_grn_grid->DT->editAttributes() ?>>
<?php if (!$pharmacy_grn_grid->DT->ReadOnly && !$pharmacy_grn_grid->DT->Disabled && !isset($pharmacy_grn_grid->DT->EditAttrs["readonly"]) && !isset($pharmacy_grn_grid->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_DT" class="form-group pharmacy_grn_DT">
<span<?php echo $pharmacy_grn_grid->DT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->DT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn_grid->DT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($pharmacy_grn_grid->DT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Customername->Visible) { // Customername ?>
		<td data-name="Customername">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_Customername" class="form-group pharmacy_grn_Customername">
<input type="text" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Customername->EditValue ?>"<?php echo $pharmacy_grn_grid->Customername->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Customername" class="form-group pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn_grid->Customername->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->Customername->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($pharmacy_grn_grid->Customername->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->State->Visible) { // State ?>
		<td data-name="State">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_State" class="form-group pharmacy_grn_State">
<input type="text" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->State->EditValue ?>"<?php echo $pharmacy_grn_grid->State->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_State" class="form-group pharmacy_grn_State">
<span<?php echo $pharmacy_grn_grid->State->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->State->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn_grid->State->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($pharmacy_grn_grid->State->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_Pincode" class="form-group pharmacy_grn_Pincode">
<input type="text" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Pincode->EditValue ?>"<?php echo $pharmacy_grn_grid->Pincode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Pincode" class="form-group pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn_grid->Pincode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->Pincode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pincode" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pincode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Phone->Visible) { // Phone ?>
		<td data-name="Phone">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_Phone" class="form-group pharmacy_grn_Phone">
<input type="text" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Phone->EditValue ?>"<?php echo $pharmacy_grn_grid->Phone->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Phone" class="form-group pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn_grid->Phone->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->Phone->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Phone" value="<?php echo HtmlEncode($pharmacy_grn_grid->Phone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BILLNO" class="form-group pharmacy_grn_BILLNO">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BILLNO->EditValue ?>"<?php echo $pharmacy_grn_grid->BILLNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BILLNO" class="form-group pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn_grid->BILLNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->BILLNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BILLDT" class="form-group pharmacy_grn_BILLDT">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BILLDT->EditValue ?>"<?php echo $pharmacy_grn_grid->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_grn_grid->BILLDT->ReadOnly && !$pharmacy_grn_grid->BILLDT->Disabled && !isset($pharmacy_grn_grid->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_grn_grid->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_grngrid", "x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BILLDT" class="form-group pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn_grid->BILLDT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->BILLDT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($pharmacy_grn_grid->BILLDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BillTotalValue" class="form-group pharmacy_grn_BillTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BillTotalValue->EditValue ?>"<?php echo $pharmacy_grn_grid->BillTotalValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BillTotalValue" class="form-group pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn_grid->BillTotalValue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->BillTotalValue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillTotalValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_GRNTotalValue" class="form-group pharmacy_grn_GRNTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->GRNTotalValue->EditValue ?>"<?php echo $pharmacy_grn_grid->GRNTotalValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_GRNTotalValue" class="form-group pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn_grid->GRNTotalValue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->GRNTotalValue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GRNTotalValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GRNTotalValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BillDiscount" class="form-group pharmacy_grn_BillDiscount">
<input type="text" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->BillDiscount->EditValue ?>"<?php echo $pharmacy_grn_grid->BillDiscount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BillDiscount" class="form-group pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn_grid->BillDiscount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->BillDiscount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_BillDiscount" value="<?php echo HtmlEncode($pharmacy_grn_grid->BillDiscount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_GrnValue" class="form-group pharmacy_grn_GrnValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->GrnValue->EditValue ?>"<?php echo $pharmacy_grn_grid->GrnValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_GrnValue" class="form-group pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn_grid->GrnValue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->GrnValue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_GrnValue" value="<?php echo HtmlEncode($pharmacy_grn_grid->GrnValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Pid->Visible) { // Pid ?>
		<td data-name="Pid">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<?php if ($pharmacy_grn_grid->Pid->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn_grid->Pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->Pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<input type="text" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->Pid->EditValue ?>"<?php echo $pharmacy_grn_grid->Pid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn_grid->Pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->Pid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_Pid" value="<?php echo HtmlEncode($pharmacy_grn_grid->Pid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentNo" class="form-group pharmacy_grn_PaymentNo">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->PaymentNo->EditValue ?>"<?php echo $pharmacy_grn_grid->PaymentNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentNo" class="form-group pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn_grid->PaymentNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->PaymentNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentNo" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentStatus" class="form-group pharmacy_grn_PaymentStatus">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->PaymentStatus->EditValue ?>"<?php echo $pharmacy_grn_grid->PaymentStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentStatus" class="form-group pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn_grid->PaymentStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->PaymentStatus->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaymentStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount">
<?php if (!$pharmacy_grn->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_PaidAmount" class="form-group pharmacy_grn_PaidAmount">
<input type="text" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_grid->PaidAmount->EditValue ?>"<?php echo $pharmacy_grn_grid->PaidAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_PaidAmount" class="form-group pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn_grid->PaidAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_grid->PaidAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="x<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" name="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" id="o<?php echo $pharmacy_grn_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($pharmacy_grn_grid->PaidAmount->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_grn_grid->ListOptions->render("body", "right", $pharmacy_grn_grid->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_grngrid", "load"], function() {
	fpharmacy_grngrid.updateLists(<?php echo $pharmacy_grn_grid->RowIndex ?>);
});
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
<?php if ($pharmacy_grn_grid->TotalRecords > 0 && $pharmacy_grn->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$pharmacy_grn_grid->renderListOptions();

// Render list options (footer, left)
$pharmacy_grn_grid->ListOptions->render("footer", "left");
?>
	<?php if ($pharmacy_grn_grid->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $pharmacy_grn_grid->id->footerCellClass() ?>"><span id="elf_pharmacy_grn_id" class="pharmacy_grn_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" class="<?php echo $pharmacy_grn_grid->GRNNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->DT->Visible) { // DT ?>
		<td data-name="DT" class="<?php echo $pharmacy_grn_grid->DT->footerCellClass() ?>"><span id="elf_pharmacy_grn_DT" class="pharmacy_grn_DT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Customername->Visible) { // Customername ?>
		<td data-name="Customername" class="<?php echo $pharmacy_grn_grid->Customername->footerCellClass() ?>"><span id="elf_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->State->Visible) { // State ?>
		<td data-name="State" class="<?php echo $pharmacy_grn_grid->State->footerCellClass() ?>"><span id="elf_pharmacy_grn_State" class="pharmacy_grn_State">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" class="<?php echo $pharmacy_grn_grid->Pincode->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Phone->Visible) { // Phone ?>
		<td data-name="Phone" class="<?php echo $pharmacy_grn_grid->Phone->footerCellClass() ?>"><span id="elf_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" class="<?php echo $pharmacy_grn_grid->BILLNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" class="<?php echo $pharmacy_grn_grid->BILLDT->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" class="<?php echo $pharmacy_grn_grid->BillTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn_grid->BillTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" class="<?php echo $pharmacy_grn_grid->GRNTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn_grid->GRNTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" class="<?php echo $pharmacy_grn_grid->BillDiscount->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn_grid->BillDiscount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue" class="<?php echo $pharmacy_grn_grid->GrnValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->Pid->Visible) { // Pid ?>
		<td data-name="Pid" class="<?php echo $pharmacy_grn_grid->Pid->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo" class="<?php echo $pharmacy_grn_grid->PaymentNo->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" class="<?php echo $pharmacy_grn_grid->PaymentStatus->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_grid->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" class="<?php echo $pharmacy_grn_grid->PaidAmount->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
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
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_grn_grid->Recordset)
	$pharmacy_grn_grid->Recordset->Close();
?>
<?php if ($pharmacy_grn_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $pharmacy_grn_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_grn_grid->TotalRecords == 0 && !$pharmacy_grn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_grn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$pharmacy_grn_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");
	// Write your table-specific startup script here
	// document.write("page loaded");
	// Write your table-specific startup script here
	// document.write("page loaded");

	</script>
	<style>
	.input-group>.form-control.ew-lookup-text {
		width: 35em;
	}
	.input-group {
		position: relative;
		display: flex;
		flex-wrap: nowrap;
		align-items: stretch;
		width: 100%;
	}
	.ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
		border: 0;
		padding: 0;
		margin-bottom: 0;
		overflow-x: scroll;
	}
	</style>
	<script>
	$("[data-name='Quantity']").hide();
	$("[data-name='BillDate']").hide();
});
</script>
<?php if (!$pharmacy_grn->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_grn",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$pharmacy_grn_grid->terminate();
?>
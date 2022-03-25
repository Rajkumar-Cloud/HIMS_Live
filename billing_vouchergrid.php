<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($billing_voucher_grid))
	$billing_voucher_grid = new billing_voucher_grid();

// Run the page
$billing_voucher_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_voucher_grid->Page_Render();
?>
<?php if (!$billing_voucher->isExport()) { ?>
<script>

// Form object
var fbilling_vouchergrid = new ew.Form("fbilling_vouchergrid", "grid");
fbilling_vouchergrid.formKeyCountName = '<?php echo $billing_voucher_grid->FormKeyCountName ?>';

// Validate form
fbilling_vouchergrid.validate = function() {
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
		<?php if ($billing_voucher_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->id->caption(), $billing_voucher->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Reception->caption(), $billing_voucher->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->PatientId->caption(), $billing_voucher->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->PatientId->errorMessage()) ?>");
		<?php if ($billing_voucher_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->mrnno->caption(), $billing_voucher->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->PatientName->caption(), $billing_voucher->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Age->caption(), $billing_voucher->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Gender->caption(), $billing_voucher->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Mobile->caption(), $billing_voucher->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->IP_OP->caption(), $billing_voucher->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Doctor->caption(), $billing_voucher->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->voucher_type->caption(), $billing_voucher->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Details->caption(), $billing_voucher->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->ModeofPayment->caption(), $billing_voucher->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->Amount->caption(), $billing_voucher->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->Amount->errorMessage()) ?>");
		<?php if ($billing_voucher_grid->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->AnyDues->caption(), $billing_voucher->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->createdby->caption(), $billing_voucher->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->createddatetime->caption(), $billing_voucher->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->modifiedby->caption(), $billing_voucher->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->modifieddatetime->caption(), $billing_voucher->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationAmount->caption(), $billing_voucher->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->RealizationAmount->errorMessage()) ?>");
		<?php if ($billing_voucher_grid->RealizationStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationStatus->caption(), $billing_voucher->RealizationStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->RealizationRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationRemarks->caption(), $billing_voucher->RealizationRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->RealizationBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationBatchNo->caption(), $billing_voucher->RealizationBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->RealizationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RealizationDate->caption(), $billing_voucher->RealizationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->HospID->caption(), $billing_voucher->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_voucher_grid->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->RIDNO->caption(), $billing_voucher->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->RIDNO->errorMessage()) ?>");
		<?php if ($billing_voucher_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_voucher->TidNo->caption(), $billing_voucher->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_voucher->TidNo->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fbilling_vouchergrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
	if (ew.valueChanged(fobj, infix, "IP_OP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Doctor", false)) return false;
	if (ew.valueChanged(fobj, infix, "voucher_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "Details", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
	if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "AnyDues", false)) return false;
	if (ew.valueChanged(fobj, infix, "RealizationAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "RealizationStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "RealizationRemarks", false)) return false;
	if (ew.valueChanged(fobj, infix, "RealizationBatchNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "RealizationDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "RIDNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	return true;
}

// Form_CustomValidate event
fbilling_vouchergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_vouchergrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbilling_vouchergrid.lists["x_Reception"] = <?php echo $billing_voucher_grid->Reception->Lookup->toClientList() ?>;
fbilling_vouchergrid.lists["x_Reception"].options = <?php echo JsonEncode($billing_voucher_grid->Reception->lookupOptions()) ?>;
fbilling_vouchergrid.lists["x_Doctor"] = <?php echo $billing_voucher_grid->Doctor->Lookup->toClientList() ?>;
fbilling_vouchergrid.lists["x_Doctor"].options = <?php echo JsonEncode($billing_voucher_grid->Doctor->lookupOptions()) ?>;
fbilling_vouchergrid.autoSuggests["x_Doctor"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fbilling_vouchergrid.lists["x_voucher_type"] = <?php echo $billing_voucher_grid->voucher_type->Lookup->toClientList() ?>;
fbilling_vouchergrid.lists["x_voucher_type"].options = <?php echo JsonEncode($billing_voucher_grid->voucher_type->lookupOptions()) ?>;
fbilling_vouchergrid.lists["x_ModeofPayment"] = <?php echo $billing_voucher_grid->ModeofPayment->Lookup->toClientList() ?>;
fbilling_vouchergrid.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_voucher_grid->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$billing_voucher_grid->renderOtherOptions();
?>
<?php $billing_voucher_grid->showPageHeader(); ?>
<?php
$billing_voucher_grid->showMessage();
?>
<?php if ($billing_voucher_grid->TotalRecs > 0 || $billing_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($billing_voucher_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_voucher">
<?php if ($billing_voucher_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $billing_voucher_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fbilling_vouchergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_billing_voucher" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_billing_vouchergrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$billing_voucher_grid->RowType = ROWTYPE_HEADER;

// Render list options
$billing_voucher_grid->renderListOptions();

// Render list options (header, left)
$billing_voucher_grid->ListOptions->render("header", "left");
?>
<?php if ($billing_voucher->id->Visible) { // id ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->id) == "") { ?>
		<th data-name="id" class="<?php echo $billing_voucher->id->headerCellClass() ?>"><div id="elh_billing_voucher_id" class="billing_voucher_id"><div class="ew-table-header-caption"><?php echo $billing_voucher->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $billing_voucher->id->headerCellClass() ?>"><div><div id="elh_billing_voucher_id" class="billing_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Reception->Visible) { // Reception ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $billing_voucher->Reception->headerCellClass() ?>"><div id="elh_billing_voucher_Reception" class="billing_voucher_Reception"><div class="ew-table-header-caption"><?php echo $billing_voucher->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $billing_voucher->Reception->headerCellClass() ?>"><div><div id="elh_billing_voucher_Reception" class="billing_voucher_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $billing_voucher->PatientId->headerCellClass() ?>"><div id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId"><div class="ew-table-header-caption"><?php echo $billing_voucher->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $billing_voucher->PatientId->headerCellClass() ?>"><div><div id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->mrnno->Visible) { // mrnno ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $billing_voucher->mrnno->headerCellClass() ?>"><div id="elh_billing_voucher_mrnno" class="billing_voucher_mrnno"><div class="ew-table-header-caption"><?php echo $billing_voucher->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $billing_voucher->mrnno->headerCellClass() ?>"><div><div id="elh_billing_voucher_mrnno" class="billing_voucher_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $billing_voucher->PatientName->headerCellClass() ?>"><div id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $billing_voucher->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $billing_voucher->PatientName->headerCellClass() ?>"><div><div id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Age->Visible) { // Age ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $billing_voucher->Age->headerCellClass() ?>"><div id="elh_billing_voucher_Age" class="billing_voucher_Age"><div class="ew-table-header-caption"><?php echo $billing_voucher->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $billing_voucher->Age->headerCellClass() ?>"><div><div id="elh_billing_voucher_Age" class="billing_voucher_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $billing_voucher->Gender->headerCellClass() ?>"><div id="elh_billing_voucher_Gender" class="billing_voucher_Gender"><div class="ew-table-header-caption"><?php echo $billing_voucher->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $billing_voucher->Gender->headerCellClass() ?>"><div><div id="elh_billing_voucher_Gender" class="billing_voucher_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $billing_voucher->Mobile->headerCellClass() ?>"><div id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $billing_voucher->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $billing_voucher->Mobile->headerCellClass() ?>"><div><div id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->IP_OP->Visible) { // IP_OP ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $billing_voucher->IP_OP->headerCellClass() ?>"><div id="elh_billing_voucher_IP_OP" class="billing_voucher_IP_OP"><div class="ew-table-header-caption"><?php echo $billing_voucher->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $billing_voucher->IP_OP->headerCellClass() ?>"><div><div id="elh_billing_voucher_IP_OP" class="billing_voucher_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->IP_OP->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->IP_OP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->IP_OP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $billing_voucher->Doctor->headerCellClass() ?>"><div id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor"><div class="ew-table-header-caption"><?php echo $billing_voucher->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $billing_voucher->Doctor->headerCellClass() ?>"><div><div id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Doctor->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->voucher_type->Visible) { // voucher_type ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $billing_voucher->voucher_type->headerCellClass() ?>"><div id="elh_billing_voucher_voucher_type" class="billing_voucher_voucher_type"><div class="ew-table-header-caption"><?php echo $billing_voucher->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $billing_voucher->voucher_type->headerCellClass() ?>"><div><div id="elh_billing_voucher_voucher_type" class="billing_voucher_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->voucher_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Details->Visible) { // Details ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $billing_voucher->Details->headerCellClass() ?>"><div id="elh_billing_voucher_Details" class="billing_voucher_Details"><div class="ew-table-header-caption"><?php echo $billing_voucher->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $billing_voucher->Details->headerCellClass() ?>"><div><div id="elh_billing_voucher_Details" class="billing_voucher_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Details->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_voucher->ModeofPayment->headerCellClass() ?>"><div id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $billing_voucher->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_voucher->ModeofPayment->headerCellClass() ?>"><div><div id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $billing_voucher->Amount->headerCellClass() ?>"><div id="elh_billing_voucher_Amount" class="billing_voucher_Amount"><div class="ew-table-header-caption"><?php echo $billing_voucher->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $billing_voucher->Amount->headerCellClass() ?>"><div><div id="elh_billing_voucher_Amount" class="billing_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $billing_voucher->AnyDues->headerCellClass() ?>"><div id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues"><div class="ew-table-header-caption"><?php echo $billing_voucher->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $billing_voucher->AnyDues->headerCellClass() ?>"><div><div id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->AnyDues->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $billing_voucher->createdby->headerCellClass() ?>"><div id="elh_billing_voucher_createdby" class="billing_voucher_createdby"><div class="ew-table-header-caption"><?php echo $billing_voucher->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $billing_voucher->createdby->headerCellClass() ?>"><div><div id="elh_billing_voucher_createdby" class="billing_voucher_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $billing_voucher->createddatetime->headerCellClass() ?>"><div id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $billing_voucher->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $billing_voucher->createddatetime->headerCellClass() ?>"><div><div id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $billing_voucher->modifiedby->headerCellClass() ?>"><div id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby"><div class="ew-table-header-caption"><?php echo $billing_voucher->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $billing_voucher->modifiedby->headerCellClass() ?>"><div><div id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $billing_voucher->modifieddatetime->headerCellClass() ?>"><div id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime"><div class="ew-table-header-caption"><?php echo $billing_voucher->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $billing_voucher->modifieddatetime->headerCellClass() ?>"><div><div id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $billing_voucher->RealizationAmount->headerCellClass() ?>"><div id="elh_billing_voucher_RealizationAmount" class="billing_voucher_RealizationAmount"><div class="ew-table-header-caption"><?php echo $billing_voucher->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $billing_voucher->RealizationAmount->headerCellClass() ?>"><div><div id="elh_billing_voucher_RealizationAmount" class="billing_voucher_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->RealizationAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->RealizationAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $billing_voucher->RealizationStatus->headerCellClass() ?>"><div id="elh_billing_voucher_RealizationStatus" class="billing_voucher_RealizationStatus"><div class="ew-table-header-caption"><?php echo $billing_voucher->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $billing_voucher->RealizationStatus->headerCellClass() ?>"><div><div id="elh_billing_voucher_RealizationStatus" class="billing_voucher_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->RealizationStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->RealizationStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $billing_voucher->RealizationRemarks->headerCellClass() ?>"><div id="elh_billing_voucher_RealizationRemarks" class="billing_voucher_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $billing_voucher->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $billing_voucher->RealizationRemarks->headerCellClass() ?>"><div><div id="elh_billing_voucher_RealizationRemarks" class="billing_voucher_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationRemarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->RealizationRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->RealizationRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $billing_voucher->RealizationBatchNo->headerCellClass() ?>"><div id="elh_billing_voucher_RealizationBatchNo" class="billing_voucher_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $billing_voucher->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $billing_voucher->RealizationBatchNo->headerCellClass() ?>"><div><div id="elh_billing_voucher_RealizationBatchNo" class="billing_voucher_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationBatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->RealizationBatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->RealizationBatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $billing_voucher->RealizationDate->headerCellClass() ?>"><div id="elh_billing_voucher_RealizationDate" class="billing_voucher_RealizationDate"><div class="ew-table-header-caption"><?php echo $billing_voucher->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $billing_voucher->RealizationDate->headerCellClass() ?>"><div><div id="elh_billing_voucher_RealizationDate" class="billing_voucher_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->RealizationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->RealizationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->RealizationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $billing_voucher->HospID->headerCellClass() ?>"><div id="elh_billing_voucher_HospID" class="billing_voucher_HospID"><div class="ew-table-header-caption"><?php echo $billing_voucher->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $billing_voucher->HospID->headerCellClass() ?>"><div><div id="elh_billing_voucher_HospID" class="billing_voucher_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $billing_voucher->RIDNO->headerCellClass() ?>"><div id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO"><div class="ew-table-header-caption"><?php echo $billing_voucher->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $billing_voucher->RIDNO->headerCellClass() ?>"><div><div id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $billing_voucher->TidNo->headerCellClass() ?>"><div id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo"><div class="ew-table-header-caption"><?php echo $billing_voucher->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $billing_voucher->TidNo->headerCellClass() ?>"><div><div id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$billing_voucher_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$billing_voucher_grid->StartRec = 1;
$billing_voucher_grid->StopRec = $billing_voucher_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $billing_voucher_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($billing_voucher_grid->FormKeyCountName) && ($billing_voucher->isGridAdd() || $billing_voucher->isGridEdit() || $billing_voucher->isConfirm())) {
		$billing_voucher_grid->KeyCount = $CurrentForm->getValue($billing_voucher_grid->FormKeyCountName);
		$billing_voucher_grid->StopRec = $billing_voucher_grid->StartRec + $billing_voucher_grid->KeyCount - 1;
	}
}
$billing_voucher_grid->RecCnt = $billing_voucher_grid->StartRec - 1;
if ($billing_voucher_grid->Recordset && !$billing_voucher_grid->Recordset->EOF) {
	$billing_voucher_grid->Recordset->moveFirst();
	$selectLimit = $billing_voucher_grid->UseSelectLimit;
	if (!$selectLimit && $billing_voucher_grid->StartRec > 1)
		$billing_voucher_grid->Recordset->move($billing_voucher_grid->StartRec - 1);
} elseif (!$billing_voucher->AllowAddDeleteRow && $billing_voucher_grid->StopRec == 0) {
	$billing_voucher_grid->StopRec = $billing_voucher->GridAddRowCount;
}

// Initialize aggregate
$billing_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$billing_voucher->resetAttributes();
$billing_voucher_grid->renderRow();
if ($billing_voucher->isGridAdd())
	$billing_voucher_grid->RowIndex = 0;
if ($billing_voucher->isGridEdit())
	$billing_voucher_grid->RowIndex = 0;
while ($billing_voucher_grid->RecCnt < $billing_voucher_grid->StopRec) {
	$billing_voucher_grid->RecCnt++;
	if ($billing_voucher_grid->RecCnt >= $billing_voucher_grid->StartRec) {
		$billing_voucher_grid->RowCnt++;
		if ($billing_voucher->isGridAdd() || $billing_voucher->isGridEdit() || $billing_voucher->isConfirm()) {
			$billing_voucher_grid->RowIndex++;
			$CurrentForm->Index = $billing_voucher_grid->RowIndex;
			if ($CurrentForm->hasValue($billing_voucher_grid->FormActionName) && $billing_voucher_grid->EventCancelled)
				$billing_voucher_grid->RowAction = strval($CurrentForm->getValue($billing_voucher_grid->FormActionName));
			elseif ($billing_voucher->isGridAdd())
				$billing_voucher_grid->RowAction = "insert";
			else
				$billing_voucher_grid->RowAction = "";
		}

		// Set up key count
		$billing_voucher_grid->KeyCount = $billing_voucher_grid->RowIndex;

		// Init row class and style
		$billing_voucher->resetAttributes();
		$billing_voucher->CssClass = "";
		if ($billing_voucher->isGridAdd()) {
			if ($billing_voucher->CurrentMode == "copy") {
				$billing_voucher_grid->loadRowValues($billing_voucher_grid->Recordset); // Load row values
				$billing_voucher_grid->setRecordKey($billing_voucher_grid->RowOldKey, $billing_voucher_grid->Recordset); // Set old record key
			} else {
				$billing_voucher_grid->loadRowValues(); // Load default values
				$billing_voucher_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$billing_voucher_grid->loadRowValues($billing_voucher_grid->Recordset); // Load row values
		}
		$billing_voucher->RowType = ROWTYPE_VIEW; // Render view
		if ($billing_voucher->isGridAdd()) // Grid add
			$billing_voucher->RowType = ROWTYPE_ADD; // Render add
		if ($billing_voucher->isGridAdd() && $billing_voucher->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$billing_voucher_grid->restoreCurrentRowFormValues($billing_voucher_grid->RowIndex); // Restore form values
		if ($billing_voucher->isGridEdit()) { // Grid edit
			if ($billing_voucher->EventCancelled)
				$billing_voucher_grid->restoreCurrentRowFormValues($billing_voucher_grid->RowIndex); // Restore form values
			if ($billing_voucher_grid->RowAction == "insert")
				$billing_voucher->RowType = ROWTYPE_ADD; // Render add
			else
				$billing_voucher->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($billing_voucher->isGridEdit() && ($billing_voucher->RowType == ROWTYPE_EDIT || $billing_voucher->RowType == ROWTYPE_ADD) && $billing_voucher->EventCancelled) // Update failed
			$billing_voucher_grid->restoreCurrentRowFormValues($billing_voucher_grid->RowIndex); // Restore form values
		if ($billing_voucher->RowType == ROWTYPE_EDIT) // Edit row
			$billing_voucher_grid->EditRowCnt++;
		if ($billing_voucher->isConfirm()) // Confirm row
			$billing_voucher_grid->restoreCurrentRowFormValues($billing_voucher_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$billing_voucher->RowAttrs = array_merge($billing_voucher->RowAttrs, array('data-rowindex'=>$billing_voucher_grid->RowCnt, 'id'=>'r' . $billing_voucher_grid->RowCnt . '_billing_voucher', 'data-rowtype'=>$billing_voucher->RowType));

		// Render row
		$billing_voucher_grid->renderRow();

		// Render list options
		$billing_voucher_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($billing_voucher_grid->RowAction <> "delete" && $billing_voucher_grid->RowAction <> "insertdelete" && !($billing_voucher_grid->RowAction == "insert" && $billing_voucher->isConfirm() && $billing_voucher_grid->emptyRow())) {
?>
	<tr<?php echo $billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_voucher_grid->ListOptions->render("body", "left", $billing_voucher_grid->RowCnt);
?>
	<?php if ($billing_voucher->id->Visible) { // id ?>
		<td data-name="id"<?php echo $billing_voucher->id->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="o<?php echo $billing_voucher_grid->RowIndex ?>_id" id="o<?php echo $billing_voucher_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_voucher->id->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_id" class="form-group billing_voucher_id">
<span<?php echo $billing_voucher->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="x<?php echo $billing_voucher_grid->RowIndex ?>_id" id="x<?php echo $billing_voucher_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_voucher->id->CurrentValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_id" class="billing_voucher_id">
<span<?php echo $billing_voucher->id->viewAttributes() ?>>
<?php echo $billing_voucher->id->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="x<?php echo $billing_voucher_grid->RowIndex ?>_id" id="x<?php echo $billing_voucher_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_voucher->id->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="o<?php echo $billing_voucher_grid->RowIndex ?>_id" id="o<?php echo $billing_voucher_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_voucher->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_id" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_voucher->id->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_id" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_voucher->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $billing_voucher->Reception->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Reception" class="form-group billing_voucher_Reception">
<?php $billing_voucher->Reception->EditAttrs["onchange"] = "ew.autoFill(this);" . @$billing_voucher->Reception->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $billing_voucher_grid->RowIndex ?>_Reception"><?php echo strval($billing_voucher->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($billing_voucher->Reception->ViewValue) : $billing_voucher->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($billing_voucher->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($billing_voucher->Reception->ReadOnly || $billing_voucher->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $billing_voucher_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $billing_voucher->Reception->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $billing_voucher->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo $billing_voucher->Reception->CurrentValue ?>"<?php echo $billing_voucher->Reception->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($billing_voucher->Reception->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Reception" class="form-group billing_voucher_Reception">
<?php $billing_voucher->Reception->EditAttrs["onchange"] = "ew.autoFill(this);" . @$billing_voucher->Reception->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $billing_voucher_grid->RowIndex ?>_Reception"><?php echo strval($billing_voucher->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($billing_voucher->Reception->ViewValue) : $billing_voucher->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($billing_voucher->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($billing_voucher->Reception->ReadOnly || $billing_voucher->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $billing_voucher_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $billing_voucher->Reception->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $billing_voucher->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo $billing_voucher->Reception->CurrentValue ?>"<?php echo $billing_voucher->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Reception" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->Reception, $billing_voucher->Reception->getViewValue()) ?>
</script>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Reception" class="billing_voucher_Reception">
<span><?php echo Barcode()->show($billing_voucher->Reception->CurrentValue, 'QRCODE', 60) ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($billing_voucher->Reception->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($billing_voucher->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($billing_voucher->Reception->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($billing_voucher->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $billing_voucher->PatientId->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($billing_voucher->PatientId->getSessionValue() <> "") { ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?>
</script>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="form-group billing_voucher_PatientId">
<span>
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?></span>
</span>
<input type="hidden" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?>
</script>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="form-group billing_voucher_PatientId">
<input type="text" data-table="billing_voucher" data-field="x_PatientId" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" size="80" placeholder="<?php echo HtmlEncode($billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatientId->EditValue ?>"<?php echo $billing_voucher->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" name="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($billing_voucher->PatientId->getSessionValue() <> "") { ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?>
</script>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="form-group billing_voucher_PatientId">
<span>
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?></span>
</span>
<input type="hidden" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?>
</script>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="form-group billing_voucher_PatientId">
<input type="text" data-table="billing_voucher" data-field="x_PatientId" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" size="80" placeholder="<?php echo HtmlEncode($billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatientId->EditValue ?>"<?php echo $billing_voucher->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->getViewValue()) ?>
</script>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="billing_voucher_PatientId">
<span><?php echo Barcode()->show($billing_voucher->PatientId->CurrentValue, 'CODE128', 40) ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" name="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $billing_voucher->mrnno->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_mrnno" class="form-group billing_voucher_mrnno">
<input type="text" data-table="billing_voucher" data-field="x_mrnno" name="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->mrnno->EditValue ?>"<?php echo $billing_voucher->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" name="o<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="o<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($billing_voucher->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_mrnno" class="form-group billing_voucher_mrnno">
<input type="text" data-table="billing_voucher" data-field="x_mrnno" name="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->mrnno->EditValue ?>"<?php echo $billing_voucher->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_mrnno" class="billing_voucher_mrnno">
<span<?php echo $billing_voucher->mrnno->viewAttributes() ?>>
<?php echo $billing_voucher->mrnno->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" name="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($billing_voucher->mrnno->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" name="o<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="o<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($billing_voucher->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($billing_voucher->mrnno->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($billing_voucher->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $billing_voucher->PatientName->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientName" class="form-group billing_voucher_PatientName">
<input type="text" data-table="billing_voucher" data-field="x_PatientName" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatientName->EditValue ?>"<?php echo $billing_voucher->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" name="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($billing_voucher->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientName" class="form-group billing_voucher_PatientName">
<input type="text" data-table="billing_voucher" data-field="x_PatientName" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatientName->EditValue ?>"<?php echo $billing_voucher->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientName" class="billing_voucher_PatientName">
<span<?php echo $billing_voucher->PatientName->viewAttributes() ?>>
<?php echo $billing_voucher->PatientName->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($billing_voucher->PatientName->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" name="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($billing_voucher->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($billing_voucher->PatientName->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($billing_voucher->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $billing_voucher->Age->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Age" class="form-group billing_voucher_Age">
<input type="text" data-table="billing_voucher" data-field="x_Age" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Age->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Age->EditValue ?>"<?php echo $billing_voucher->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Age" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($billing_voucher->Age->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Age" class="form-group billing_voucher_Age">
<input type="text" data-table="billing_voucher" data-field="x_Age" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Age->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Age->EditValue ?>"<?php echo $billing_voucher->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Age" class="billing_voucher_Age">
<span<?php echo $billing_voucher->Age->viewAttributes() ?>>
<?php echo $billing_voucher->Age->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Age" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($billing_voucher->Age->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Age" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($billing_voucher->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Age" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($billing_voucher->Age->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Age" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($billing_voucher->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $billing_voucher->Gender->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Gender" class="form-group billing_voucher_Gender">
<input type="text" data-table="billing_voucher" data-field="x_Gender" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Gender->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Gender->EditValue ?>"<?php echo $billing_voucher->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($billing_voucher->Gender->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Gender" class="form-group billing_voucher_Gender">
<input type="text" data-table="billing_voucher" data-field="x_Gender" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Gender->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Gender->EditValue ?>"<?php echo $billing_voucher->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Gender" class="billing_voucher_Gender">
<span<?php echo $billing_voucher->Gender->viewAttributes() ?>>
<?php echo $billing_voucher->Gender->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($billing_voucher->Gender->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($billing_voucher->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($billing_voucher->Gender->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($billing_voucher->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $billing_voucher->Mobile->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Mobile" class="form-group billing_voucher_Mobile">
<input type="text" data-table="billing_voucher" data-field="x_Mobile" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Mobile->EditValue ?>"<?php echo $billing_voucher->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($billing_voucher->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Mobile" class="form-group billing_voucher_Mobile">
<input type="text" data-table="billing_voucher" data-field="x_Mobile" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Mobile->EditValue ?>"<?php echo $billing_voucher->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Mobile" class="billing_voucher_Mobile">
<span<?php echo $billing_voucher->Mobile->viewAttributes() ?>>
<?php echo $billing_voucher->Mobile->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($billing_voucher->Mobile->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($billing_voucher->Mobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($billing_voucher->Mobile->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($billing_voucher->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP"<?php echo $billing_voucher->IP_OP->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_IP_OP" class="form-group billing_voucher_IP_OP">
<input type="text" data-table="billing_voucher" data-field="x_IP_OP" name="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->IP_OP->EditValue ?>"<?php echo $billing_voucher->IP_OP->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" name="o<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="o<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($billing_voucher->IP_OP->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_IP_OP" class="form-group billing_voucher_IP_OP">
<input type="text" data-table="billing_voucher" data-field="x_IP_OP" name="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->IP_OP->EditValue ?>"<?php echo $billing_voucher->IP_OP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_IP_OP" class="billing_voucher_IP_OP">
<span<?php echo $billing_voucher->IP_OP->viewAttributes() ?>>
<?php echo $billing_voucher->IP_OP->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" name="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($billing_voucher->IP_OP->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" name="o<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="o<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($billing_voucher->IP_OP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($billing_voucher->IP_OP->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($billing_voucher->IP_OP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $billing_voucher->Doctor->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Doctor" class="form-group billing_voucher_Doctor">
<?php
$wrkonchange = "" . trim(@$billing_voucher->Doctor->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$billing_voucher->Doctor->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" class="text-nowrap" style="z-index: <?php echo (9000 - $billing_voucher_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="sv_x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo RemoveHtml($billing_voucher->Doctor->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Doctor->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($billing_voucher->Doctor->getPlaceHolder()) ?>"<?php echo $billing_voucher->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" data-value-separator="<?php echo $billing_voucher->Doctor->displayValueSeparatorAttribute() ?>" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fbilling_vouchergrid.createAutoSuggest({"id":"x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor","forceSelect":false});
</script>
<?php echo $billing_voucher->Doctor->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_Doctor") ?>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Doctor" class="form-group billing_voucher_Doctor">
<?php
$wrkonchange = "" . trim(@$billing_voucher->Doctor->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$billing_voucher->Doctor->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" class="text-nowrap" style="z-index: <?php echo (9000 - $billing_voucher_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="sv_x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo RemoveHtml($billing_voucher->Doctor->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Doctor->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($billing_voucher->Doctor->getPlaceHolder()) ?>"<?php echo $billing_voucher->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" data-value-separator="<?php echo $billing_voucher->Doctor->displayValueSeparatorAttribute() ?>" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fbilling_vouchergrid.createAutoSuggest({"id":"x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor","forceSelect":false});
</script>
<?php echo $billing_voucher->Doctor->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_Doctor") ?>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Doctor" class="billing_voucher_Doctor">
<span<?php echo $billing_voucher->Doctor->viewAttributes() ?>>
<?php echo $billing_voucher->Doctor->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $billing_voucher->voucher_type->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_voucher_type" class="form-group billing_voucher_voucher_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_voucher_type" data-value-separator="<?php echo $billing_voucher->voucher_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" name="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type"<?php echo $billing_voucher->voucher_type->editAttributes() ?>>
		<?php echo $billing_voucher->voucher_type->selectOptionListHtml("x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type") ?>
	</select>
</div>
<?php echo $billing_voucher->voucher_type->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_voucher_type") ?>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" name="o<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" id="o<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($billing_voucher->voucher_type->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_voucher_type" class="form-group billing_voucher_voucher_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_voucher_type" data-value-separator="<?php echo $billing_voucher->voucher_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" name="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type"<?php echo $billing_voucher->voucher_type->editAttributes() ?>>
		<?php echo $billing_voucher->voucher_type->selectOptionListHtml("x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type") ?>
	</select>
</div>
<?php echo $billing_voucher->voucher_type->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_voucher_type") ?>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_voucher_type" class="billing_voucher_voucher_type">
<span<?php echo $billing_voucher->voucher_type->viewAttributes() ?>>
<?php echo $billing_voucher->voucher_type->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" name="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" id="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($billing_voucher->voucher_type->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" name="o<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" id="o<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($billing_voucher->voucher_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($billing_voucher->voucher_type->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($billing_voucher->voucher_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $billing_voucher->Details->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Details" class="form-group billing_voucher_Details">
<input type="text" data-table="billing_voucher" data-field="x_Details" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Details->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Details->EditValue ?>"<?php echo $billing_voucher->Details->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Details" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($billing_voucher->Details->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Details" class="form-group billing_voucher_Details">
<input type="text" data-table="billing_voucher" data-field="x_Details" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Details->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Details->EditValue ?>"<?php echo $billing_voucher->Details->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Details" class="billing_voucher_Details">
<span<?php echo $billing_voucher->Details->viewAttributes() ?>>
<?php echo $billing_voucher->Details->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Details" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($billing_voucher->Details->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Details" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($billing_voucher->Details->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Details" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($billing_voucher->Details->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Details" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($billing_voucher->Details->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $billing_voucher->ModeofPayment->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_ModeofPayment" class="form-group billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment"<?php echo $billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $billing_voucher->ModeofPayment->selectOptionListHtml("x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $billing_voucher->ModeofPayment->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($billing_voucher->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_ModeofPayment" class="form-group billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment"<?php echo $billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $billing_voucher->ModeofPayment->selectOptionListHtml("x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $billing_voucher->ModeofPayment->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_ModeofPayment") ?>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment">
<span<?php echo $billing_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" name="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($billing_voucher->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($billing_voucher->ModeofPayment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($billing_voucher->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($billing_voucher->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $billing_voucher->Amount->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Amount" class="form-group billing_voucher_Amount">
<input type="text" data-table="billing_voucher" data-field="x_Amount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Amount->EditValue ?>"<?php echo $billing_voucher->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($billing_voucher->Amount->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Amount" class="form-group billing_voucher_Amount">
<input type="text" data-table="billing_voucher" data-field="x_Amount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Amount->EditValue ?>"<?php echo $billing_voucher->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Amount" class="billing_voucher_Amount">
<span<?php echo $billing_voucher->Amount->viewAttributes() ?>>
<?php echo $billing_voucher->Amount->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($billing_voucher->Amount->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($billing_voucher->Amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($billing_voucher->Amount->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($billing_voucher->Amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $billing_voucher->AnyDues->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_AnyDues" class="form-group billing_voucher_AnyDues">
<input type="text" data-table="billing_voucher" data-field="x_AnyDues" name="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->AnyDues->EditValue ?>"<?php echo $billing_voucher->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" name="o<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="o<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($billing_voucher->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_AnyDues" class="form-group billing_voucher_AnyDues">
<input type="text" data-table="billing_voucher" data-field="x_AnyDues" name="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->AnyDues->EditValue ?>"<?php echo $billing_voucher->AnyDues->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_AnyDues" class="billing_voucher_AnyDues">
<span<?php echo $billing_voucher->AnyDues->viewAttributes() ?>>
<?php echo $billing_voucher->AnyDues->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" name="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($billing_voucher->AnyDues->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" name="o<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="o<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($billing_voucher->AnyDues->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($billing_voucher->AnyDues->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($billing_voucher->AnyDues->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $billing_voucher->createdby->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="billing_voucher" data-field="x_createdby" name="o<?php echo $billing_voucher_grid->RowIndex ?>_createdby" id="o<?php echo $billing_voucher_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($billing_voucher->createdby->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_createdby" class="billing_voucher_createdby">
<span<?php echo $billing_voucher->createdby->viewAttributes() ?>>
<?php echo $billing_voucher->createdby->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_createdby" name="x<?php echo $billing_voucher_grid->RowIndex ?>_createdby" id="x<?php echo $billing_voucher_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($billing_voucher->createdby->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_createdby" name="o<?php echo $billing_voucher_grid->RowIndex ?>_createdby" id="o<?php echo $billing_voucher_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($billing_voucher->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_createdby" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_createdby" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($billing_voucher->createdby->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_createdby" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_createdby" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($billing_voucher->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $billing_voucher->createddatetime->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="billing_voucher" data-field="x_createddatetime" name="o<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" id="o<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($billing_voucher->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_createddatetime" class="billing_voucher_createddatetime">
<span<?php echo $billing_voucher->createddatetime->viewAttributes() ?>>
<?php echo $billing_voucher->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_createddatetime" name="x<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" id="x<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($billing_voucher->createddatetime->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_createddatetime" name="o<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" id="o<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($billing_voucher->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_createddatetime" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($billing_voucher->createddatetime->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_createddatetime" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($billing_voucher->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $billing_voucher->modifiedby->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="billing_voucher" data-field="x_modifiedby" name="o<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" id="o<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($billing_voucher->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_modifiedby" class="billing_voucher_modifiedby">
<span<?php echo $billing_voucher->modifiedby->viewAttributes() ?>>
<?php echo $billing_voucher->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_modifiedby" name="x<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" id="x<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($billing_voucher->modifiedby->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_modifiedby" name="o<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" id="o<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($billing_voucher->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_modifiedby" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($billing_voucher->modifiedby->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_modifiedby" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($billing_voucher->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $billing_voucher->modifieddatetime->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="billing_voucher" data-field="x_modifieddatetime" name="o<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($billing_voucher->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime">
<span<?php echo $billing_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_modifieddatetime" name="x<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($billing_voucher->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_modifieddatetime" name="o<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($billing_voucher->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_modifieddatetime" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($billing_voucher->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_modifieddatetime" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($billing_voucher->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount"<?php echo $billing_voucher->RealizationAmount->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationAmount" class="form-group billing_voucher_RealizationAmount">
<input type="text" data-table="billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationAmount->EditValue ?>"<?php echo $billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($billing_voucher->RealizationAmount->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationAmount" class="form-group billing_voucher_RealizationAmount">
<input type="text" data-table="billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationAmount->EditValue ?>"<?php echo $billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationAmount" class="billing_voucher_RealizationAmount">
<span<?php echo $billing_voucher->RealizationAmount->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationAmount->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($billing_voucher->RealizationAmount->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($billing_voucher->RealizationAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($billing_voucher->RealizationAmount->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($billing_voucher->RealizationAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus"<?php echo $billing_voucher->RealizationStatus->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationStatus" class="form-group billing_voucher_RealizationStatus">
<input type="text" data-table="billing_voucher" data-field="x_RealizationStatus" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationStatus->EditValue ?>"<?php echo $billing_voucher->RealizationStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" value="<?php echo HtmlEncode($billing_voucher->RealizationStatus->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationStatus" class="form-group billing_voucher_RealizationStatus">
<input type="text" data-table="billing_voucher" data-field="x_RealizationStatus" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationStatus->EditValue ?>"<?php echo $billing_voucher->RealizationStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationStatus" class="billing_voucher_RealizationStatus">
<span<?php echo $billing_voucher->RealizationStatus->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationStatus->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" value="<?php echo HtmlEncode($billing_voucher->RealizationStatus->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" value="<?php echo HtmlEncode($billing_voucher->RealizationStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" value="<?php echo HtmlEncode($billing_voucher->RealizationStatus->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" value="<?php echo HtmlEncode($billing_voucher->RealizationStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks"<?php echo $billing_voucher->RealizationRemarks->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationRemarks" class="form-group billing_voucher_RealizationRemarks">
<input type="text" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationRemarks->EditValue ?>"<?php echo $billing_voucher->RealizationRemarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" value="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationRemarks" class="form-group billing_voucher_RealizationRemarks">
<input type="text" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationRemarks->EditValue ?>"<?php echo $billing_voucher->RealizationRemarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationRemarks" class="billing_voucher_RealizationRemarks">
<span<?php echo $billing_voucher->RealizationRemarks->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationRemarks->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" value="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" value="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" value="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" value="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo"<?php echo $billing_voucher->RealizationBatchNo->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationBatchNo" class="form-group billing_voucher_RealizationBatchNo">
<input type="text" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationBatchNo->EditValue ?>"<?php echo $billing_voucher->RealizationBatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" value="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationBatchNo" class="form-group billing_voucher_RealizationBatchNo">
<input type="text" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationBatchNo->EditValue ?>"<?php echo $billing_voucher->RealizationBatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationBatchNo" class="billing_voucher_RealizationBatchNo">
<span<?php echo $billing_voucher->RealizationBatchNo->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationBatchNo->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" value="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" value="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" value="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" value="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate"<?php echo $billing_voucher->RealizationDate->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationDate" class="form-group billing_voucher_RealizationDate">
<input type="text" data-table="billing_voucher" data-field="x_RealizationDate" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationDate->EditValue ?>"<?php echo $billing_voucher->RealizationDate->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" value="<?php echo HtmlEncode($billing_voucher->RealizationDate->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationDate" class="form-group billing_voucher_RealizationDate">
<input type="text" data-table="billing_voucher" data-field="x_RealizationDate" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationDate->EditValue ?>"<?php echo $billing_voucher->RealizationDate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RealizationDate" class="billing_voucher_RealizationDate">
<span<?php echo $billing_voucher->RealizationDate->viewAttributes() ?>>
<?php echo $billing_voucher->RealizationDate->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" value="<?php echo HtmlEncode($billing_voucher->RealizationDate->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" value="<?php echo HtmlEncode($billing_voucher->RealizationDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" value="<?php echo HtmlEncode($billing_voucher->RealizationDate->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" value="<?php echo HtmlEncode($billing_voucher->RealizationDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $billing_voucher->HospID->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="billing_voucher" data-field="x_HospID" name="o<?php echo $billing_voucher_grid->RowIndex ?>_HospID" id="o<?php echo $billing_voucher_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($billing_voucher->HospID->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_HospID" class="billing_voucher_HospID">
<span<?php echo $billing_voucher->HospID->viewAttributes() ?>>
<?php echo $billing_voucher->HospID->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_HospID" name="x<?php echo $billing_voucher_grid->RowIndex ?>_HospID" id="x<?php echo $billing_voucher_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($billing_voucher->HospID->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_HospID" name="o<?php echo $billing_voucher_grid->RowIndex ?>_HospID" id="o<?php echo $billing_voucher_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($billing_voucher->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_HospID" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_HospID" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($billing_voucher->HospID->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_HospID" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_HospID" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($billing_voucher->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $billing_voucher->RIDNO->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($billing_voucher->RIDNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RIDNO" class="form-group billing_voucher_RIDNO">
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RIDNO" class="form-group billing_voucher_RIDNO">
<input type="text" data-table="billing_voucher" data-field="x_RIDNO" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->RIDNO->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RIDNO->EditValue ?>"<?php echo $billing_voucher->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($billing_voucher->RIDNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RIDNO" class="form-group billing_voucher_RIDNO">
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RIDNO" class="form-group billing_voucher_RIDNO">
<input type="text" data-table="billing_voucher" data-field="x_RIDNO" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->RIDNO->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RIDNO->EditValue ?>"<?php echo $billing_voucher->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_RIDNO" class="billing_voucher_RIDNO">
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>>
<?php echo $billing_voucher->RIDNO->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $billing_voucher->TidNo->cellAttributes() ?>>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($billing_voucher->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_TidNo" class="form-group billing_voucher_TidNo">
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_TidNo" class="form-group billing_voucher_TidNo">
<input type="text" data-table="billing_voucher" data-field="x_TidNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->TidNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->TidNo->EditValue ?>"<?php echo $billing_voucher->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" name="o<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="o<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($billing_voucher->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_TidNo" class="form-group billing_voucher_TidNo">
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_TidNo" class="form-group billing_voucher_TidNo">
<input type="text" data-table="billing_voucher" data-field="x_TidNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->TidNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->TidNo->EditValue ?>"<?php echo $billing_voucher->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_TidNo" class="billing_voucher_TidNo">
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>>
<?php echo $billing_voucher->TidNo->getViewValue() ?></span>
</span>
<?php if (!$billing_voucher->isConfirm()) { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" name="o<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="o<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" name="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="fbilling_vouchergrid$x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->FormValue) ?>">
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" name="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="fbilling_vouchergrid$o<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_voucher_grid->ListOptions->render("body", "right", $billing_voucher_grid->RowCnt);
?>
	</tr>
<?php if ($billing_voucher->RowType == ROWTYPE_ADD || $billing_voucher->RowType == ROWTYPE_EDIT) { ?>
<script>
fbilling_vouchergrid.updateLists(<?php echo $billing_voucher_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$billing_voucher->isGridAdd() || $billing_voucher->CurrentMode == "copy")
		if (!$billing_voucher_grid->Recordset->EOF)
			$billing_voucher_grid->Recordset->moveNext();
}
?>
<?php
	if ($billing_voucher->CurrentMode == "add" || $billing_voucher->CurrentMode == "copy" || $billing_voucher->CurrentMode == "edit") {
		$billing_voucher_grid->RowIndex = '$rowindex$';
		$billing_voucher_grid->loadRowValues();

		// Set row properties
		$billing_voucher->resetAttributes();
		$billing_voucher->RowAttrs = array_merge($billing_voucher->RowAttrs, array('data-rowindex'=>$billing_voucher_grid->RowIndex, 'id'=>'r0_billing_voucher', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($billing_voucher->RowAttrs["class"], "ew-template");
		$billing_voucher->RowType = ROWTYPE_ADD;

		// Render row
		$billing_voucher_grid->renderRow();

		// Render list options
		$billing_voucher_grid->renderListOptions();
		$billing_voucher_grid->StartRowCnt = 0;
?>
	<tr<?php echo $billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_voucher_grid->ListOptions->render("body", "left", $billing_voucher_grid->RowIndex);
?>
	<?php if ($billing_voucher->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$billing_voucher->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_id" class="form-group billing_voucher_id">
<span<?php echo $billing_voucher->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="x<?php echo $billing_voucher_grid->RowIndex ?>_id" id="x<?php echo $billing_voucher_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_voucher->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_id" name="o<?php echo $billing_voucher_grid->RowIndex ?>_id" id="o<?php echo $billing_voucher_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_voucher->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_Reception" class="form-group billing_voucher_Reception">
<?php $billing_voucher->Reception->EditAttrs["onchange"] = "ew.autoFill(this);" . @$billing_voucher->Reception->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $billing_voucher_grid->RowIndex ?>_Reception"><?php echo strval($billing_voucher->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($billing_voucher->Reception->ViewValue) : $billing_voucher->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($billing_voucher->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($billing_voucher->Reception->ReadOnly || $billing_voucher->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $billing_voucher_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $billing_voucher->Reception->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $billing_voucher->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo $billing_voucher->Reception->CurrentValue ?>"<?php echo $billing_voucher->Reception->editAttributes() ?>>
</span>
<?php } else { ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_Reception" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->Reception, $billing_voucher->Reception->ViewValue) ?>
</script>
<span id="el$rowindex$_billing_voucher_Reception" class="form-group billing_voucher_Reception">
<span>
<?php echo GetImageViewTag($billing_voucher->Reception, $billing_voucher->Reception->ViewValue) ?></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($billing_voucher->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Reception" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($billing_voucher->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$billing_voucher->isConfirm()) { ?>
<?php if ($billing_voucher->PatientId->getSessionValue() <> "") { ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?>
</script>
<span id="el$rowindex$_billing_voucher_PatientId" class="form-group billing_voucher_PatientId">
<span>
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?></span>
</span>
<input type="hidden" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?>
</script>
<span id="el$rowindex$_billing_voucher_PatientId" class="form-group billing_voucher_PatientId">
<input type="text" data-table="billing_voucher" data-field="x_PatientId" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" size="80" placeholder="<?php echo HtmlEncode($billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatientId->EditValue ?>"<?php echo $billing_voucher->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<script id="orig<?php echo $billing_voucher_grid->RowCnt ?>_billing_voucher_PatientId" class="view_patient_discharge_summaryview" type="text/html">
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?>
</script>
<span id="el$rowindex$_billing_voucher_PatientId" class="form-group billing_voucher_PatientId">
<span>
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->ViewValue) ?></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" name="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" id="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($billing_voucher->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_mrnno" class="form-group billing_voucher_mrnno">
<input type="text" data-table="billing_voucher" data-field="x_mrnno" name="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->mrnno->EditValue ?>"<?php echo $billing_voucher->mrnno->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_mrnno" class="form-group billing_voucher_mrnno">
<span<?php echo $billing_voucher->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" name="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="x<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($billing_voucher->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" name="o<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" id="o<?php echo $billing_voucher_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($billing_voucher->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_PatientName" class="form-group billing_voucher_PatientName">
<input type="text" data-table="billing_voucher" data-field="x_PatientName" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatientName->EditValue ?>"<?php echo $billing_voucher->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_PatientName" class="form-group billing_voucher_PatientName">
<span<?php echo $billing_voucher->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" name="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="x<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($billing_voucher->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" name="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" id="o<?php echo $billing_voucher_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($billing_voucher->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_Age" class="form-group billing_voucher_Age">
<input type="text" data-table="billing_voucher" data-field="x_Age" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Age->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Age->EditValue ?>"<?php echo $billing_voucher->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_Age" class="form-group billing_voucher_Age">
<span<?php echo $billing_voucher->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Age" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($billing_voucher->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Age" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Age" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($billing_voucher->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_Gender" class="form-group billing_voucher_Gender">
<input type="text" data-table="billing_voucher" data-field="x_Gender" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Gender->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Gender->EditValue ?>"<?php echo $billing_voucher->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_Gender" class="form-group billing_voucher_Gender">
<span<?php echo $billing_voucher->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($billing_voucher->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Gender" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($billing_voucher->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_Mobile" class="form-group billing_voucher_Mobile">
<input type="text" data-table="billing_voucher" data-field="x_Mobile" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Mobile->EditValue ?>"<?php echo $billing_voucher->Mobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_Mobile" class="form-group billing_voucher_Mobile">
<span<?php echo $billing_voucher->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Mobile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($billing_voucher->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($billing_voucher->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_IP_OP" class="form-group billing_voucher_IP_OP">
<input type="text" data-table="billing_voucher" data-field="x_IP_OP" name="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->IP_OP->EditValue ?>"<?php echo $billing_voucher->IP_OP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_IP_OP" class="form-group billing_voucher_IP_OP">
<span<?php echo $billing_voucher->IP_OP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->IP_OP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" name="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="x<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($billing_voucher->IP_OP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" name="o<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" id="o<?php echo $billing_voucher_grid->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($billing_voucher->IP_OP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_Doctor" class="form-group billing_voucher_Doctor">
<?php
$wrkonchange = "" . trim(@$billing_voucher->Doctor->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$billing_voucher->Doctor->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" class="text-nowrap" style="z-index: <?php echo (9000 - $billing_voucher_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="sv_x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo RemoveHtml($billing_voucher->Doctor->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Doctor->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($billing_voucher->Doctor->getPlaceHolder()) ?>"<?php echo $billing_voucher->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" data-value-separator="<?php echo $billing_voucher->Doctor->displayValueSeparatorAttribute() ?>" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fbilling_vouchergrid.createAutoSuggest({"id":"x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor","forceSelect":false});
</script>
<?php echo $billing_voucher->Doctor->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_Doctor") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_Doctor" class="form-group billing_voucher_Doctor">
<span<?php echo $billing_voucher->Doctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Doctor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($billing_voucher->Doctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_voucher_type" class="form-group billing_voucher_voucher_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_voucher_type" data-value-separator="<?php echo $billing_voucher->voucher_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" name="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type"<?php echo $billing_voucher->voucher_type->editAttributes() ?>>
		<?php echo $billing_voucher->voucher_type->selectOptionListHtml("x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type") ?>
	</select>
</div>
<?php echo $billing_voucher->voucher_type->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_voucher_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_voucher_type" class="form-group billing_voucher_voucher_type">
<span<?php echo $billing_voucher->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->voucher_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" name="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" id="x<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($billing_voucher->voucher_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" name="o<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" id="o<?php echo $billing_voucher_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($billing_voucher->voucher_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->Details->Visible) { // Details ?>
		<td data-name="Details">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_Details" class="form-group billing_voucher_Details">
<input type="text" data-table="billing_voucher" data-field="x_Details" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Details->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Details->EditValue ?>"<?php echo $billing_voucher->Details->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_Details" class="form-group billing_voucher_Details">
<span<?php echo $billing_voucher->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Details->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Details" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($billing_voucher->Details->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Details" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Details" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($billing_voucher->Details->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_ModeofPayment" class="form-group billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment"<?php echo $billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $billing_voucher->ModeofPayment->selectOptionListHtml("x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $billing_voucher->ModeofPayment->Lookup->getParamTag("p_x" . $billing_voucher_grid->RowIndex . "_ModeofPayment") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_ModeofPayment" class="form-group billing_voucher_ModeofPayment">
<span<?php echo $billing_voucher->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->ModeofPayment->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" name="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($billing_voucher->ModeofPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $billing_voucher_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($billing_voucher->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_Amount" class="form-group billing_voucher_Amount">
<input type="text" data-table="billing_voucher" data-field="x_Amount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Amount->EditValue ?>"<?php echo $billing_voucher->Amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_Amount" class="form-group billing_voucher_Amount">
<span<?php echo $billing_voucher->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->Amount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($billing_voucher->Amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" name="o<?php echo $billing_voucher_grid->RowIndex ?>_Amount" id="o<?php echo $billing_voucher_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($billing_voucher->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_AnyDues" class="form-group billing_voucher_AnyDues">
<input type="text" data-table="billing_voucher" data-field="x_AnyDues" name="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->AnyDues->EditValue ?>"<?php echo $billing_voucher->AnyDues->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_AnyDues" class="form-group billing_voucher_AnyDues">
<span<?php echo $billing_voucher->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->AnyDues->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" name="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="x<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($billing_voucher->AnyDues->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" name="o<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" id="o<?php echo $billing_voucher_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($billing_voucher->AnyDues->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$billing_voucher->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_createdby" class="form-group billing_voucher_createdby">
<span<?php echo $billing_voucher->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_createdby" name="x<?php echo $billing_voucher_grid->RowIndex ?>_createdby" id="x<?php echo $billing_voucher_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($billing_voucher->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_createdby" name="o<?php echo $billing_voucher_grid->RowIndex ?>_createdby" id="o<?php echo $billing_voucher_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($billing_voucher->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$billing_voucher->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_createddatetime" class="form-group billing_voucher_createddatetime">
<span<?php echo $billing_voucher->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_createddatetime" name="x<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" id="x<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($billing_voucher->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_createddatetime" name="o<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" id="o<?php echo $billing_voucher_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($billing_voucher->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$billing_voucher->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_modifiedby" class="form-group billing_voucher_modifiedby">
<span<?php echo $billing_voucher->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_modifiedby" name="x<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" id="x<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($billing_voucher->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_modifiedby" name="o<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" id="o<?php echo $billing_voucher_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($billing_voucher->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$billing_voucher->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_modifieddatetime" class="form-group billing_voucher_modifieddatetime">
<span<?php echo $billing_voucher->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_modifieddatetime" name="x<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($billing_voucher->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_modifieddatetime" name="o<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $billing_voucher_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($billing_voucher->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_RealizationAmount" class="form-group billing_voucher_RealizationAmount">
<input type="text" data-table="billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationAmount->EditValue ?>"<?php echo $billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_RealizationAmount" class="form-group billing_voucher_RealizationAmount">
<span<?php echo $billing_voucher->RealizationAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($billing_voucher->RealizationAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($billing_voucher->RealizationAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_RealizationStatus" class="form-group billing_voucher_RealizationStatus">
<input type="text" data-table="billing_voucher" data-field="x_RealizationStatus" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationStatus->EditValue ?>"<?php echo $billing_voucher->RealizationStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_RealizationStatus" class="form-group billing_voucher_RealizationStatus">
<span<?php echo $billing_voucher->RealizationStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" value="<?php echo HtmlEncode($billing_voucher->RealizationStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationStatus" value="<?php echo HtmlEncode($billing_voucher->RealizationStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_RealizationRemarks" class="form-group billing_voucher_RealizationRemarks">
<input type="text" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationRemarks->EditValue ?>"<?php echo $billing_voucher->RealizationRemarks->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_RealizationRemarks" class="form-group billing_voucher_RealizationRemarks">
<span<?php echo $billing_voucher->RealizationRemarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationRemarks->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" value="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationRemarks" value="<?php echo HtmlEncode($billing_voucher->RealizationRemarks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_RealizationBatchNo" class="form-group billing_voucher_RealizationBatchNo">
<input type="text" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationBatchNo->EditValue ?>"<?php echo $billing_voucher->RealizationBatchNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_RealizationBatchNo" class="form-group billing_voucher_RealizationBatchNo">
<span<?php echo $billing_voucher->RealizationBatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationBatchNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" value="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationBatchNo" value="<?php echo HtmlEncode($billing_voucher->RealizationBatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate">
<?php if (!$billing_voucher->isConfirm()) { ?>
<span id="el$rowindex$_billing_voucher_RealizationDate" class="form-group billing_voucher_RealizationDate">
<input type="text" data-table="billing_voucher" data-field="x_RealizationDate" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RealizationDate->EditValue ?>"<?php echo $billing_voucher->RealizationDate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_RealizationDate" class="form-group billing_voucher_RealizationDate">
<span<?php echo $billing_voucher->RealizationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RealizationDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" value="<?php echo HtmlEncode($billing_voucher->RealizationDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RealizationDate" value="<?php echo HtmlEncode($billing_voucher->RealizationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$billing_voucher->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_HospID" class="form-group billing_voucher_HospID">
<span<?php echo $billing_voucher->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_HospID" name="x<?php echo $billing_voucher_grid->RowIndex ?>_HospID" id="x<?php echo $billing_voucher_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($billing_voucher->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_HospID" name="o<?php echo $billing_voucher_grid->RowIndex ?>_HospID" id="o<?php echo $billing_voucher_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($billing_voucher->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$billing_voucher->isConfirm()) { ?>
<?php if ($billing_voucher->RIDNO->getSessionValue() <> "") { ?>
<span id="el$rowindex$_billing_voucher_RIDNO" class="form-group billing_voucher_RIDNO">
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_RIDNO" class="form-group billing_voucher_RIDNO">
<input type="text" data-table="billing_voucher" data-field="x_RIDNO" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->RIDNO->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->RIDNO->EditValue ?>"<?php echo $billing_voucher->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_RIDNO" class="form-group billing_voucher_RIDNO">
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" name="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="x<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" name="o<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" id="o<?php echo $billing_voucher_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($billing_voucher->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$billing_voucher->isConfirm()) { ?>
<?php if ($billing_voucher->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_billing_voucher_TidNo" class="form-group billing_voucher_TidNo">
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_TidNo" class="form-group billing_voucher_TidNo">
<input type="text" data-table="billing_voucher" data-field="x_TidNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->TidNo->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->TidNo->EditValue ?>"<?php echo $billing_voucher->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_billing_voucher_TidNo" class="form-group billing_voucher_TidNo">
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_voucher->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" name="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="x<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" name="o<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" id="o<?php echo $billing_voucher_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($billing_voucher->TidNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_voucher_grid->ListOptions->render("body", "right", $billing_voucher_grid->RowIndex);
?>
<script>
fbilling_vouchergrid.updateLists(<?php echo $billing_voucher_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($billing_voucher->CurrentMode == "add" || $billing_voucher->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $billing_voucher_grid->FormKeyCountName ?>" id="<?php echo $billing_voucher_grid->FormKeyCountName ?>" value="<?php echo $billing_voucher_grid->KeyCount ?>">
<?php echo $billing_voucher_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($billing_voucher->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $billing_voucher_grid->FormKeyCountName ?>" id="<?php echo $billing_voucher_grid->FormKeyCountName ?>" value="<?php echo $billing_voucher_grid->KeyCount ?>">
<?php echo $billing_voucher_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($billing_voucher->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fbilling_vouchergrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($billing_voucher_grid->Recordset)
	$billing_voucher_grid->Recordset->Close();
?>
</div>
<?php if ($billing_voucher_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $billing_voucher_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($billing_voucher_grid->TotalRecs == 0 && !$billing_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $billing_voucher_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$billing_voucher_grid->terminate();
?>
<?php if (!$billing_voucher->isExport()) { ?>
<script>
ew.scrollableTable("gmp_billing_voucher", "95%", "");
</script>
<?php } ?>
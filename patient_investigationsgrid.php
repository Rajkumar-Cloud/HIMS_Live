<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_investigations_grid))
	$patient_investigations_grid = new patient_investigations_grid();

// Run the page
$patient_investigations_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_investigations_grid->Page_Render();
?>
<?php if (!$patient_investigations->isExport()) { ?>
<script>

// Form object
var fpatient_investigationsgrid = new ew.Form("fpatient_investigationsgrid", "grid");
fpatient_investigationsgrid.formKeyCountName = '<?php echo $patient_investigations_grid->FormKeyCountName ?>';

// Validate form
fpatient_investigationsgrid.validate = function() {
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
		<?php if ($patient_investigations_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->id->caption(), $patient_investigations->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->Investigation->Required) { ?>
			elm = this.getElements("x" + infix + "_Investigation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Investigation->caption(), $patient_investigations->Investigation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->Value->Required) { ?>
			elm = this.getElements("x" + infix + "_Value");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Value->caption(), $patient_investigations->Value->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->NormalRange->Required) { ?>
			elm = this.getElements("x" + infix + "_NormalRange");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->NormalRange->caption(), $patient_investigations->NormalRange->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->mrnno->caption(), $patient_investigations->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Age->caption(), $patient_investigations->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Gender->caption(), $patient_investigations->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->SampleCollected->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleCollected");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->SampleCollected->caption(), $patient_investigations->SampleCollected->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleCollected");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->SampleCollected->errorMessage()) ?>");
		<?php if ($patient_investigations_grid->SampleCollectedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleCollectedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->SampleCollectedBy->caption(), $patient_investigations->SampleCollectedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->ResultedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->ResultedDate->caption(), $patient_investigations->ResultedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->ResultedDate->errorMessage()) ?>");
		<?php if ($patient_investigations_grid->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->ResultedBy->caption(), $patient_investigations->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->Modified->Required) { ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Modified->caption(), $patient_investigations->Modified->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->Modified->errorMessage()) ?>");
		<?php if ($patient_investigations_grid->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->ModifiedBy->caption(), $patient_investigations->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Created->caption(), $patient_investigations->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->Created->errorMessage()) ?>");
		<?php if ($patient_investigations_grid->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->CreatedBy->caption(), $patient_investigations->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->GroupHead->Required) { ?>
			elm = this.getElements("x" + infix + "_GroupHead");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->GroupHead->caption(), $patient_investigations->GroupHead->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->Cost->Required) { ?>
			elm = this.getElements("x" + infix + "_Cost");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->Cost->caption(), $patient_investigations->Cost->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Cost");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_investigations->Cost->errorMessage()) ?>");
		<?php if ($patient_investigations_grid->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->PaymentStatus->caption(), $patient_investigations->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->PayMode->Required) { ?>
			elm = this.getElements("x" + infix + "_PayMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->PayMode->caption(), $patient_investigations->PayMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_investigations_grid->VoucherNo->Required) { ?>
			elm = this.getElements("x" + infix + "_VoucherNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations->VoucherNo->caption(), $patient_investigations->VoucherNo->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_investigationsgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Investigation", false)) return false;
	if (ew.valueChanged(fobj, infix, "Value", false)) return false;
	if (ew.valueChanged(fobj, infix, "NormalRange", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "SampleCollected", false)) return false;
	if (ew.valueChanged(fobj, infix, "SampleCollectedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultedDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Modified", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModifiedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Created", false)) return false;
	if (ew.valueChanged(fobj, infix, "CreatedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "GroupHead", false)) return false;
	if (ew.valueChanged(fobj, infix, "Cost", false)) return false;
	if (ew.valueChanged(fobj, infix, "PaymentStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "PayMode", false)) return false;
	if (ew.valueChanged(fobj, infix, "VoucherNo", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_investigationsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_investigationsgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_investigations_grid->renderOtherOptions();
?>
<?php $patient_investigations_grid->showPageHeader(); ?>
<?php
$patient_investigations_grid->showMessage();
?>
<?php if ($patient_investigations_grid->TotalRecs > 0 || $patient_investigations->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_investigations_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_investigations">
<?php if ($patient_investigations_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_investigations_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_investigationsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_investigations" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_investigationsgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_investigations_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_investigations_grid->renderListOptions();

// Render list options (header, left)
$patient_investigations_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_investigations->id->Visible) { // id ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_investigations->id->headerCellClass() ?>"><div id="elh_patient_investigations_id" class="patient_investigations_id"><div class="ew-table-header-caption"><?php echo $patient_investigations->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_investigations->id->headerCellClass() ?>"><div><div id="elh_patient_investigations_id" class="patient_investigations_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Investigation) == "") { ?>
		<th data-name="Investigation" class="<?php echo $patient_investigations->Investigation->headerCellClass() ?>"><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation"><div class="ew-table-header-caption"><?php echo $patient_investigations->Investigation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Investigation" class="<?php echo $patient_investigations->Investigation->headerCellClass() ?>"><div><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Investigation->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Investigation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Investigation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Value->Visible) { // Value ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Value) == "") { ?>
		<th data-name="Value" class="<?php echo $patient_investigations->Value->headerCellClass() ?>"><div id="elh_patient_investigations_Value" class="patient_investigations_Value"><div class="ew-table-header-caption"><?php echo $patient_investigations->Value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Value" class="<?php echo $patient_investigations->Value->headerCellClass() ?>"><div><div id="elh_patient_investigations_Value" class="patient_investigations_Value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Value->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Value->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Value->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->NormalRange) == "") { ?>
		<th data-name="NormalRange" class="<?php echo $patient_investigations->NormalRange->headerCellClass() ?>"><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange"><div class="ew-table-header-caption"><?php echo $patient_investigations->NormalRange->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NormalRange" class="<?php echo $patient_investigations->NormalRange->headerCellClass() ?>"><div><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->NormalRange->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->NormalRange->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->NormalRange->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_investigations->mrnno->headerCellClass() ?>"><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno"><div class="ew-table-header-caption"><?php echo $patient_investigations->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_investigations->mrnno->headerCellClass() ?>"><div><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Age->Visible) { // Age ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_investigations->Age->headerCellClass() ?>"><div id="elh_patient_investigations_Age" class="patient_investigations_Age"><div class="ew-table-header-caption"><?php echo $patient_investigations->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_investigations->Age->headerCellClass() ?>"><div><div id="elh_patient_investigations_Age" class="patient_investigations_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_investigations->Gender->headerCellClass() ?>"><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender"><div class="ew-table-header-caption"><?php echo $patient_investigations->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_investigations->Gender->headerCellClass() ?>"><div><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->SampleCollected) == "") { ?>
		<th data-name="SampleCollected" class="<?php echo $patient_investigations->SampleCollected->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected"><div class="ew-table-header-caption"><?php echo $patient_investigations->SampleCollected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleCollected" class="<?php echo $patient_investigations->SampleCollected->headerCellClass() ?>"><div><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->SampleCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->SampleCollected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->SampleCollected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->SampleCollectedBy) == "") { ?>
		<th data-name="SampleCollectedBy" class="<?php echo $patient_investigations->SampleCollectedBy->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy"><div class="ew-table-header-caption"><?php echo $patient_investigations->SampleCollectedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleCollectedBy" class="<?php echo $patient_investigations->SampleCollectedBy->headerCellClass() ?>"><div><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->SampleCollectedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->SampleCollectedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->SampleCollectedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->ResultedDate) == "") { ?>
		<th data-name="ResultedDate" class="<?php echo $patient_investigations->ResultedDate->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate"><div class="ew-table-header-caption"><?php echo $patient_investigations->ResultedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedDate" class="<?php echo $patient_investigations->ResultedDate->headerCellClass() ?>"><div><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->ResultedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->ResultedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->ResultedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_investigations->ResultedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy"><div class="ew-table-header-caption"><?php echo $patient_investigations->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_investigations->ResultedBy->headerCellClass() ?>"><div><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Modified) == "") { ?>
		<th data-name="Modified" class="<?php echo $patient_investigations->Modified->headerCellClass() ?>"><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified"><div class="ew-table-header-caption"><?php echo $patient_investigations->Modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Modified" class="<?php echo $patient_investigations->Modified->headerCellClass() ?>"><div><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Modified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Modified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_investigations->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy"><div class="ew-table-header-caption"><?php echo $patient_investigations->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_investigations->ModifiedBy->headerCellClass() ?>"><div><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Created->Visible) { // Created ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Created) == "") { ?>
		<th data-name="Created" class="<?php echo $patient_investigations->Created->headerCellClass() ?>"><div id="elh_patient_investigations_Created" class="patient_investigations_Created"><div class="ew-table-header-caption"><?php echo $patient_investigations->Created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Created" class="<?php echo $patient_investigations->Created->headerCellClass() ?>"><div><div id="elh_patient_investigations_Created" class="patient_investigations_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_investigations->CreatedBy->headerCellClass() ?>"><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy"><div class="ew-table-header-caption"><?php echo $patient_investigations->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_investigations->CreatedBy->headerCellClass() ?>"><div><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->GroupHead) == "") { ?>
		<th data-name="GroupHead" class="<?php echo $patient_investigations->GroupHead->headerCellClass() ?>"><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead"><div class="ew-table-header-caption"><?php echo $patient_investigations->GroupHead->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupHead" class="<?php echo $patient_investigations->GroupHead->headerCellClass() ?>"><div><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->GroupHead->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->GroupHead->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->GroupHead->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->Cost) == "") { ?>
		<th data-name="Cost" class="<?php echo $patient_investigations->Cost->headerCellClass() ?>"><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost"><div class="ew-table-header-caption"><?php echo $patient_investigations->Cost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cost" class="<?php echo $patient_investigations->Cost->headerCellClass() ?>"><div><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->Cost->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->Cost->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->Cost->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $patient_investigations->PaymentStatus->headerCellClass() ?>"><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus"><div class="ew-table-header-caption"><?php echo $patient_investigations->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $patient_investigations->PaymentStatus->headerCellClass() ?>"><div><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->PayMode) == "") { ?>
		<th data-name="PayMode" class="<?php echo $patient_investigations->PayMode->headerCellClass() ?>"><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode"><div class="ew-table-header-caption"><?php echo $patient_investigations->PayMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayMode" class="<?php echo $patient_investigations->PayMode->headerCellClass() ?>"><div><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->PayMode->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->PayMode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->PayMode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
	<?php if ($patient_investigations->sortUrl($patient_investigations->VoucherNo) == "") { ?>
		<th data-name="VoucherNo" class="<?php echo $patient_investigations->VoucherNo->headerCellClass() ?>"><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo"><div class="ew-table-header-caption"><?php echo $patient_investigations->VoucherNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VoucherNo" class="<?php echo $patient_investigations->VoucherNo->headerCellClass() ?>"><div><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations->VoucherNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations->VoucherNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_investigations->VoucherNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_investigations_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_investigations_grid->StartRec = 1;
$patient_investigations_grid->StopRec = $patient_investigations_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_investigations_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_investigations_grid->FormKeyCountName) && ($patient_investigations->isGridAdd() || $patient_investigations->isGridEdit() || $patient_investigations->isConfirm())) {
		$patient_investigations_grid->KeyCount = $CurrentForm->getValue($patient_investigations_grid->FormKeyCountName);
		$patient_investigations_grid->StopRec = $patient_investigations_grid->StartRec + $patient_investigations_grid->KeyCount - 1;
	}
}
$patient_investigations_grid->RecCnt = $patient_investigations_grid->StartRec - 1;
if ($patient_investigations_grid->Recordset && !$patient_investigations_grid->Recordset->EOF) {
	$patient_investigations_grid->Recordset->moveFirst();
	$selectLimit = $patient_investigations_grid->UseSelectLimit;
	if (!$selectLimit && $patient_investigations_grid->StartRec > 1)
		$patient_investigations_grid->Recordset->move($patient_investigations_grid->StartRec - 1);
} elseif (!$patient_investigations->AllowAddDeleteRow && $patient_investigations_grid->StopRec == 0) {
	$patient_investigations_grid->StopRec = $patient_investigations->GridAddRowCount;
}

// Initialize aggregate
$patient_investigations->RowType = ROWTYPE_AGGREGATEINIT;
$patient_investigations->resetAttributes();
$patient_investigations_grid->renderRow();
if ($patient_investigations->isGridAdd())
	$patient_investigations_grid->RowIndex = 0;
if ($patient_investigations->isGridEdit())
	$patient_investigations_grid->RowIndex = 0;
while ($patient_investigations_grid->RecCnt < $patient_investigations_grid->StopRec) {
	$patient_investigations_grid->RecCnt++;
	if ($patient_investigations_grid->RecCnt >= $patient_investigations_grid->StartRec) {
		$patient_investigations_grid->RowCnt++;
		if ($patient_investigations->isGridAdd() || $patient_investigations->isGridEdit() || $patient_investigations->isConfirm()) {
			$patient_investigations_grid->RowIndex++;
			$CurrentForm->Index = $patient_investigations_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_investigations_grid->FormActionName) && $patient_investigations_grid->EventCancelled)
				$patient_investigations_grid->RowAction = strval($CurrentForm->getValue($patient_investigations_grid->FormActionName));
			elseif ($patient_investigations->isGridAdd())
				$patient_investigations_grid->RowAction = "insert";
			else
				$patient_investigations_grid->RowAction = "";
		}

		// Set up key count
		$patient_investigations_grid->KeyCount = $patient_investigations_grid->RowIndex;

		// Init row class and style
		$patient_investigations->resetAttributes();
		$patient_investigations->CssClass = "";
		if ($patient_investigations->isGridAdd()) {
			if ($patient_investigations->CurrentMode == "copy") {
				$patient_investigations_grid->loadRowValues($patient_investigations_grid->Recordset); // Load row values
				$patient_investigations_grid->setRecordKey($patient_investigations_grid->RowOldKey, $patient_investigations_grid->Recordset); // Set old record key
			} else {
				$patient_investigations_grid->loadRowValues(); // Load default values
				$patient_investigations_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_investigations_grid->loadRowValues($patient_investigations_grid->Recordset); // Load row values
		}
		$patient_investigations->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_investigations->isGridAdd()) // Grid add
			$patient_investigations->RowType = ROWTYPE_ADD; // Render add
		if ($patient_investigations->isGridAdd() && $patient_investigations->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_investigations_grid->restoreCurrentRowFormValues($patient_investigations_grid->RowIndex); // Restore form values
		if ($patient_investigations->isGridEdit()) { // Grid edit
			if ($patient_investigations->EventCancelled)
				$patient_investigations_grid->restoreCurrentRowFormValues($patient_investigations_grid->RowIndex); // Restore form values
			if ($patient_investigations_grid->RowAction == "insert")
				$patient_investigations->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_investigations->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_investigations->isGridEdit() && ($patient_investigations->RowType == ROWTYPE_EDIT || $patient_investigations->RowType == ROWTYPE_ADD) && $patient_investigations->EventCancelled) // Update failed
			$patient_investigations_grid->restoreCurrentRowFormValues($patient_investigations_grid->RowIndex); // Restore form values
		if ($patient_investigations->RowType == ROWTYPE_EDIT) // Edit row
			$patient_investigations_grid->EditRowCnt++;
		if ($patient_investigations->isConfirm()) // Confirm row
			$patient_investigations_grid->restoreCurrentRowFormValues($patient_investigations_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_investigations->RowAttrs = array_merge($patient_investigations->RowAttrs, array('data-rowindex'=>$patient_investigations_grid->RowCnt, 'id'=>'r' . $patient_investigations_grid->RowCnt . '_patient_investigations', 'data-rowtype'=>$patient_investigations->RowType));

		// Render row
		$patient_investigations_grid->renderRow();

		// Render list options
		$patient_investigations_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_investigations_grid->RowAction <> "delete" && $patient_investigations_grid->RowAction <> "insertdelete" && !($patient_investigations_grid->RowAction == "insert" && $patient_investigations->isConfirm() && $patient_investigations_grid->emptyRow())) {
?>
	<tr<?php echo $patient_investigations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_investigations_grid->ListOptions->render("body", "left", $patient_investigations_grid->RowCnt);
?>
	<?php if ($patient_investigations->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_investigations->id->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="o<?php echo $patient_investigations_grid->RowIndex ?>_id" id="o<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_id" class="form-group patient_investigations_id">
<span<?php echo $patient_investigations->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="x<?php echo $patient_investigations_grid->RowIndex ?>_id" id="x<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_id" class="patient_investigations_id">
<span<?php echo $patient_investigations->id->viewAttributes() ?>>
<?php echo $patient_investigations->id->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="x<?php echo $patient_investigations_grid->RowIndex ?>_id" id="x<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="o<?php echo $patient_investigations_grid->RowIndex ?>_id" id="o<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_id" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_id" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
		<td data-name="Investigation"<?php echo $patient_investigations->Investigation->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Investigation->EditValue ?>"<?php echo $patient_investigations->Investigation->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations->Investigation->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Investigation->EditValue ?>"<?php echo $patient_investigations->Investigation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Investigation" class="patient_investigations_Investigation">
<span<?php echo $patient_investigations->Investigation->viewAttributes() ?>>
<?php echo $patient_investigations->Investigation->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations->Investigation->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations->Investigation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations->Investigation->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations->Investigation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Value->Visible) { // Value ?>
		<td data-name="Value"<?php echo $patient_investigations->Value->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Value" class="form-group patient_investigations_Value">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Value->EditValue ?>"<?php echo $patient_investigations->Value->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations->Value->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Value" class="form-group patient_investigations_Value">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Value->EditValue ?>"<?php echo $patient_investigations->Value->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Value" class="patient_investigations_Value">
<span<?php echo $patient_investigations->Value->viewAttributes() ?>>
<?php echo $patient_investigations->Value->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations->Value->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations->Value->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations->Value->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations->Value->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange"<?php echo $patient_investigations->NormalRange->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->NormalRange->EditValue ?>"<?php echo $patient_investigations->NormalRange->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations->NormalRange->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->NormalRange->EditValue ?>"<?php echo $patient_investigations->NormalRange->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_NormalRange" class="patient_investigations_NormalRange">
<span<?php echo $patient_investigations->NormalRange->viewAttributes() ?>>
<?php echo $patient_investigations->NormalRange->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations->NormalRange->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations->NormalRange->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations->NormalRange->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations->NormalRange->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_investigations->mrnno->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_investigations->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<input type="text" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->mrnno->EditValue ?>"<?php echo $patient_investigations->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_mrnno" class="patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<?php echo $patient_investigations->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_investigations->Age->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Age" class="form-group patient_investigations_Age">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Age->EditValue ?>"<?php echo $patient_investigations->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Age" class="form-group patient_investigations_Age">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Age->EditValue ?>"<?php echo $patient_investigations->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Age" class="patient_investigations_Age">
<span<?php echo $patient_investigations->Age->viewAttributes() ?>>
<?php echo $patient_investigations->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations->Age->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations->Age->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_investigations->Gender->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Gender->EditValue ?>"<?php echo $patient_investigations->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Gender->EditValue ?>"<?php echo $patient_investigations->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Gender" class="patient_investigations_Gender">
<span<?php echo $patient_investigations->Gender->viewAttributes() ?>>
<?php echo $patient_investigations->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
		<td data-name="SampleCollected"<?php echo $patient_investigations->SampleCollected->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollected->EditValue ?>"<?php echo $patient_investigations->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations->SampleCollected->ReadOnly && !$patient_investigations->SampleCollected->Disabled && !isset($patient_investigations->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations->SampleCollected->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollected->EditValue ?>"<?php echo $patient_investigations->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations->SampleCollected->ReadOnly && !$patient_investigations->SampleCollected->Disabled && !isset($patient_investigations->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected">
<span<?php echo $patient_investigations->SampleCollected->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollected->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations->SampleCollected->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations->SampleCollected->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations->SampleCollected->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations->SampleCollected->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<td data-name="SampleCollectedBy"<?php echo $patient_investigations->SampleCollectedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations->SampleCollectedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations->SampleCollectedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations->SampleCollectedBy->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollectedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
		<td data-name="ResultedDate"<?php echo $patient_investigations->ResultedDate->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedDate->EditValue ?>"<?php echo $patient_investigations->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations->ResultedDate->ReadOnly && !$patient_investigations->ResultedDate->Disabled && !isset($patient_investigations->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations->ResultedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedDate->EditValue ?>"<?php echo $patient_investigations->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations->ResultedDate->ReadOnly && !$patient_investigations->ResultedDate->Disabled && !isset($patient_investigations->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate">
<span<?php echo $patient_investigations->ResultedDate->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedDate->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations->ResultedDate->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations->ResultedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations->ResultedDate->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations->ResultedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $patient_investigations->ResultedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedBy->EditValue ?>"<?php echo $patient_investigations->ResultedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedBy->EditValue ?>"<?php echo $patient_investigations->ResultedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy">
<span<?php echo $patient_investigations->ResultedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations->ResultedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
		<td data-name="Modified"<?php echo $patient_investigations->Modified->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Modified->EditValue ?>"<?php echo $patient_investigations->Modified->editAttributes() ?>>
<?php if (!$patient_investigations->Modified->ReadOnly && !$patient_investigations->Modified->Disabled && !isset($patient_investigations->Modified->EditAttrs["readonly"]) && !isset($patient_investigations->Modified->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations->Modified->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Modified->EditValue ?>"<?php echo $patient_investigations->Modified->editAttributes() ?>>
<?php if (!$patient_investigations->Modified->ReadOnly && !$patient_investigations->Modified->Disabled && !isset($patient_investigations->Modified->EditAttrs["readonly"]) && !isset($patient_investigations->Modified->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Modified" class="patient_investigations_Modified">
<span<?php echo $patient_investigations->Modified->viewAttributes() ?>>
<?php echo $patient_investigations->Modified->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations->Modified->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations->Modified->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations->Modified->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations->Modified->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $patient_investigations->ModifiedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ModifiedBy->EditValue ?>"<?php echo $patient_investigations->ModifiedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ModifiedBy->EditValue ?>"<?php echo $patient_investigations->ModifiedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ModifiedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations->ModifiedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Created->Visible) { // Created ?>
		<td data-name="Created"<?php echo $patient_investigations->Created->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Created" class="form-group patient_investigations_Created">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Created->EditValue ?>"<?php echo $patient_investigations->Created->editAttributes() ?>>
<?php if (!$patient_investigations->Created->ReadOnly && !$patient_investigations->Created->Disabled && !isset($patient_investigations->Created->EditAttrs["readonly"]) && !isset($patient_investigations->Created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations->Created->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Created" class="form-group patient_investigations_Created">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Created->EditValue ?>"<?php echo $patient_investigations->Created->editAttributes() ?>>
<?php if (!$patient_investigations->Created->ReadOnly && !$patient_investigations->Created->Disabled && !isset($patient_investigations->Created->EditAttrs["readonly"]) && !isset($patient_investigations->Created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Created" class="patient_investigations_Created">
<span<?php echo $patient_investigations->Created->viewAttributes() ?>>
<?php echo $patient_investigations->Created->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations->Created->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations->Created->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations->Created->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations->Created->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $patient_investigations->CreatedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->CreatedBy->EditValue ?>"<?php echo $patient_investigations->CreatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->CreatedBy->EditValue ?>"<?php echo $patient_investigations->CreatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy">
<span<?php echo $patient_investigations->CreatedBy->viewAttributes() ?>>
<?php echo $patient_investigations->CreatedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations->CreatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
		<td data-name="GroupHead"<?php echo $patient_investigations->GroupHead->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->GroupHead->EditValue ?>"<?php echo $patient_investigations->GroupHead->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations->GroupHead->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->GroupHead->EditValue ?>"<?php echo $patient_investigations->GroupHead->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_GroupHead" class="patient_investigations_GroupHead">
<span<?php echo $patient_investigations->GroupHead->viewAttributes() ?>>
<?php echo $patient_investigations->GroupHead->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations->GroupHead->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations->GroupHead->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations->GroupHead->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations->GroupHead->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
		<td data-name="Cost"<?php echo $patient_investigations->Cost->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Cost->EditValue ?>"<?php echo $patient_investigations->Cost->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations->Cost->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Cost->EditValue ?>"<?php echo $patient_investigations->Cost->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_Cost" class="patient_investigations_Cost">
<span<?php echo $patient_investigations->Cost->viewAttributes() ?>>
<?php echo $patient_investigations->Cost->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations->Cost->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations->Cost->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations->Cost->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations->Cost->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $patient_investigations->PaymentStatus->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PaymentStatus->EditValue ?>"<?php echo $patient_investigations->PaymentStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PaymentStatus->EditValue ?>"<?php echo $patient_investigations->PaymentStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations->PaymentStatus->viewAttributes() ?>>
<?php echo $patient_investigations->PaymentStatus->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations->PaymentStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
		<td data-name="PayMode"<?php echo $patient_investigations->PayMode->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PayMode->EditValue ?>"<?php echo $patient_investigations->PayMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations->PayMode->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PayMode->EditValue ?>"<?php echo $patient_investigations->PayMode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_PayMode" class="patient_investigations_PayMode">
<span<?php echo $patient_investigations->PayMode->viewAttributes() ?>>
<?php echo $patient_investigations->PayMode->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations->PayMode->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations->PayMode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations->PayMode->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations->PayMode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
		<td data-name="VoucherNo"<?php echo $patient_investigations->VoucherNo->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->VoucherNo->EditValue ?>"<?php echo $patient_investigations->VoucherNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations->VoucherNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->VoucherNo->EditValue ?>"<?php echo $patient_investigations->VoucherNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_investigations_grid->RowCnt ?>_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo">
<span<?php echo $patient_investigations->VoucherNo->viewAttributes() ?>>
<?php echo $patient_investigations->VoucherNo->getViewValue() ?></span>
</span>
<?php if (!$patient_investigations->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations->VoucherNo->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations->VoucherNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="fpatient_investigationsgrid$x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations->VoucherNo->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="fpatient_investigationsgrid$o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations->VoucherNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_investigations_grid->ListOptions->render("body", "right", $patient_investigations_grid->RowCnt);
?>
	</tr>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD || $patient_investigations->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_investigationsgrid.updateLists(<?php echo $patient_investigations_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_investigations->isGridAdd() || $patient_investigations->CurrentMode == "copy")
		if (!$patient_investigations_grid->Recordset->EOF)
			$patient_investigations_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_investigations->CurrentMode == "add" || $patient_investigations->CurrentMode == "copy" || $patient_investigations->CurrentMode == "edit") {
		$patient_investigations_grid->RowIndex = '$rowindex$';
		$patient_investigations_grid->loadRowValues();

		// Set row properties
		$patient_investigations->resetAttributes();
		$patient_investigations->RowAttrs = array_merge($patient_investigations->RowAttrs, array('data-rowindex'=>$patient_investigations_grid->RowIndex, 'id'=>'r0_patient_investigations', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_investigations->RowAttrs["class"], "ew-template");
		$patient_investigations->RowType = ROWTYPE_ADD;

		// Render row
		$patient_investigations_grid->renderRow();

		// Render list options
		$patient_investigations_grid->renderListOptions();
		$patient_investigations_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_investigations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_investigations_grid->ListOptions->render("body", "left", $patient_investigations_grid->RowIndex);
?>
	<?php if ($patient_investigations->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_investigations->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_id" class="form-group patient_investigations_id">
<span<?php echo $patient_investigations->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="x<?php echo $patient_investigations_grid->RowIndex ?>_id" id="x<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="o<?php echo $patient_investigations_grid->RowIndex ?>_id" id="o<?php echo $patient_investigations_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
		<td data-name="Investigation">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Investigation->EditValue ?>"<?php echo $patient_investigations->Investigation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<span<?php echo $patient_investigations->Investigation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->Investigation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations->Investigation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations->Investigation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->Value->Visible) { // Value ?>
		<td data-name="Value">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Value" class="form-group patient_investigations_Value">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Value->EditValue ?>"<?php echo $patient_investigations->Value->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Value" class="form-group patient_investigations_Value">
<span<?php echo $patient_investigations->Value->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->Value->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations->Value->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations->Value->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->NormalRange->EditValue ?>"<?php echo $patient_investigations->NormalRange->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<span<?php echo $patient_investigations->NormalRange->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->NormalRange->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations->NormalRange->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" id="o<?php echo $patient_investigations_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations->NormalRange->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_investigations->isConfirm()) { ?>
<?php if ($patient_investigations->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<input type="text" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->mrnno->EditValue ?>"<?php echo $patient_investigations->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_investigations_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Age" class="form-group patient_investigations_Age">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Age->EditValue ?>"<?php echo $patient_investigations->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Age" class="form-group patient_investigations_Age">
<span<?php echo $patient_investigations->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Gender->EditValue ?>"<?php echo $patient_investigations->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<span<?php echo $patient_investigations->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
		<td data-name="SampleCollected">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollected->EditValue ?>"<?php echo $patient_investigations->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations->SampleCollected->ReadOnly && !$patient_investigations->SampleCollected->Disabled && !isset($patient_investigations->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<span<?php echo $patient_investigations->SampleCollected->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->SampleCollected->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations->SampleCollected->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations->SampleCollected->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<td data-name="SampleCollectedBy">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations->SampleCollectedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations->SampleCollectedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->SampleCollectedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations->SampleCollectedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
		<td data-name="ResultedDate">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedDate->EditValue ?>"<?php echo $patient_investigations->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations->ResultedDate->ReadOnly && !$patient_investigations->ResultedDate->Disabled && !isset($patient_investigations->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<span<?php echo $patient_investigations->ResultedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->ResultedDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations->ResultedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations->ResultedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ResultedBy->EditValue ?>"<?php echo $patient_investigations->ResultedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<span<?php echo $patient_investigations->ResultedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->ResultedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
		<td data-name="Modified">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Modified->EditValue ?>"<?php echo $patient_investigations->Modified->editAttributes() ?>>
<?php if (!$patient_investigations->Modified->ReadOnly && !$patient_investigations->Modified->Disabled && !isset($patient_investigations->Modified->EditAttrs["readonly"]) && !isset($patient_investigations->Modified->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<span<?php echo $patient_investigations->Modified->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->Modified->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations->Modified->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations->Modified->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->ModifiedBy->EditValue ?>"<?php echo $patient_investigations->ModifiedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations->ModifiedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->ModifiedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->Created->Visible) { // Created ?>
		<td data-name="Created">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Created" class="form-group patient_investigations_Created">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Created->EditValue ?>"<?php echo $patient_investigations->Created->editAttributes() ?>>
<?php if (!$patient_investigations->Created->ReadOnly && !$patient_investigations->Created->Disabled && !isset($patient_investigations->Created->EditAttrs["readonly"]) && !isset($patient_investigations->Created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_investigationsgrid", "x<?php echo $patient_investigations_grid->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Created" class="form-group patient_investigations_Created">
<span<?php echo $patient_investigations->Created->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->Created->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations->Created->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations->Created->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->CreatedBy->EditValue ?>"<?php echo $patient_investigations->CreatedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<span<?php echo $patient_investigations->CreatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->CreatedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_investigations_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
		<td data-name="GroupHead">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->GroupHead->EditValue ?>"<?php echo $patient_investigations->GroupHead->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<span<?php echo $patient_investigations->GroupHead->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->GroupHead->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations->GroupHead->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" id="o<?php echo $patient_investigations_grid->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations->GroupHead->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
		<td data-name="Cost">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->Cost->EditValue ?>"<?php echo $patient_investigations->Cost->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<span<?php echo $patient_investigations->Cost->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->Cost->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations->Cost->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" id="o<?php echo $patient_investigations_grid->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations->Cost->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PaymentStatus->EditValue ?>"<?php echo $patient_investigations->PaymentStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations->PaymentStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->PaymentStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations->PaymentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations->PaymentStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
		<td data-name="PayMode">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->PayMode->EditValue ?>"<?php echo $patient_investigations->PayMode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<span<?php echo $patient_investigations->PayMode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->PayMode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations->PayMode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" id="o<?php echo $patient_investigations_grid->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations->PayMode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
		<td data-name="VoucherNo">
<?php if (!$patient_investigations->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations->VoucherNo->EditValue ?>"<?php echo $patient_investigations->VoucherNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<span<?php echo $patient_investigations->VoucherNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_investigations->VoucherNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations->VoucherNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" id="o<?php echo $patient_investigations_grid->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations->VoucherNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_investigations_grid->ListOptions->render("body", "right", $patient_investigations_grid->RowIndex);
?>
<script>
fpatient_investigationsgrid.updateLists(<?php echo $patient_investigations_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_investigations->CurrentMode == "add" || $patient_investigations->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_investigations_grid->FormKeyCountName ?>" id="<?php echo $patient_investigations_grid->FormKeyCountName ?>" value="<?php echo $patient_investigations_grid->KeyCount ?>">
<?php echo $patient_investigations_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_investigations->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_investigations_grid->FormKeyCountName ?>" id="<?php echo $patient_investigations_grid->FormKeyCountName ?>" value="<?php echo $patient_investigations_grid->KeyCount ?>">
<?php echo $patient_investigations_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_investigations->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_investigationsgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_investigations_grid->Recordset)
	$patient_investigations_grid->Recordset->Close();
?>
</div>
<?php if ($patient_investigations_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_investigations_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_investigations_grid->TotalRecs == 0 && !$patient_investigations->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_investigations_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_investigations_grid->terminate();
?>
<?php if (!$patient_investigations->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_investigations", "95%", "");
</script>
<?php } ?>
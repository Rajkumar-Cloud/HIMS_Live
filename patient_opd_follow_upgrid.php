<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_opd_follow_up_grid))
	$patient_opd_follow_up_grid = new patient_opd_follow_up_grid();

// Run the page
$patient_opd_follow_up_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_grid->Page_Render();
?>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<script>

// Form object
var fpatient_opd_follow_upgrid = new ew.Form("fpatient_opd_follow_upgrid", "grid");
fpatient_opd_follow_upgrid.formKeyCountName = '<?php echo $patient_opd_follow_up_grid->FormKeyCountName ?>';

// Validate form
fpatient_opd_follow_upgrid.validate = function() {
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
		<?php if ($patient_opd_follow_up_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->id->caption(), $patient_opd_follow_up->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Reception->caption(), $patient_opd_follow_up->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->PatientId->caption(), $patient_opd_follow_up->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->mrnno->caption(), $patient_opd_follow_up->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->PatientName->caption(), $patient_opd_follow_up->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->Telephone->Required) { ?>
			elm = this.getElements("x" + infix + "_Telephone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Telephone->caption(), $patient_opd_follow_up->Telephone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Age->caption(), $patient_opd_follow_up->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Gender->caption(), $patient_opd_follow_up->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->NextReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->NextReviewDate->caption(), $patient_opd_follow_up->NextReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->NextReviewDate->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_grid->ICSIAdvised->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSIAdvised[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->ICSIAdvised->caption(), $patient_opd_follow_up->ICSIAdvised->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->DeliveryRegistered->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryRegistered[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->DeliveryRegistered->caption(), $patient_opd_follow_up->DeliveryRegistered->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->EDD->Required) { ?>
			elm = this.getElements("x" + infix + "_EDD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->EDD->caption(), $patient_opd_follow_up->EDD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EDD");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->EDD->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_grid->SerologyPositive->Required) { ?>
			elm = this.getElements("x" + infix + "_SerologyPositive[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->SerologyPositive->caption(), $patient_opd_follow_up->SerologyPositive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->Allergy->Required) { ?>
			elm = this.getElements("x" + infix + "_Allergy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Allergy->caption(), $patient_opd_follow_up->Allergy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->status->caption(), $patient_opd_follow_up->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->createdby->caption(), $patient_opd_follow_up->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->createddatetime->caption(), $patient_opd_follow_up->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->modifiedby->caption(), $patient_opd_follow_up->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->modifieddatetime->caption(), $patient_opd_follow_up->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->LMP->Required) { ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->LMP->caption(), $patient_opd_follow_up->LMP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->LMP->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_grid->ProcedureDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->ProcedureDateTime->caption(), $patient_opd_follow_up->ProcedureDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_grid->ICSIDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSIDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->ICSIDate->caption(), $patient_opd_follow_up->ICSIDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ICSIDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->ICSIDate->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_opd_follow_upgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Telephone", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "NextReviewDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ICSIAdvised[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeliveryRegistered[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "EDD", false)) return false;
	if (ew.valueChanged(fobj, infix, "SerologyPositive[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "Allergy", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "LMP", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProcedureDateTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "ICSIDate", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_opd_follow_upgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_opd_follow_upgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_opd_follow_upgrid.lists["x_ICSIAdvised[]"] = <?php echo $patient_opd_follow_up_grid->ICSIAdvised->Lookup->toClientList() ?>;
fpatient_opd_follow_upgrid.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($patient_opd_follow_up_grid->ICSIAdvised->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upgrid.lists["x_DeliveryRegistered[]"] = <?php echo $patient_opd_follow_up_grid->DeliveryRegistered->Lookup->toClientList() ?>;
fpatient_opd_follow_upgrid.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($patient_opd_follow_up_grid->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upgrid.lists["x_SerologyPositive[]"] = <?php echo $patient_opd_follow_up_grid->SerologyPositive->Lookup->toClientList() ?>;
fpatient_opd_follow_upgrid.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($patient_opd_follow_up_grid->SerologyPositive->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upgrid.lists["x_Allergy"] = <?php echo $patient_opd_follow_up_grid->Allergy->Lookup->toClientList() ?>;
fpatient_opd_follow_upgrid.lists["x_Allergy"].options = <?php echo JsonEncode($patient_opd_follow_up_grid->Allergy->lookupOptions()) ?>;
fpatient_opd_follow_upgrid.autoSuggests["x_Allergy"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_opd_follow_upgrid.lists["x_status"] = <?php echo $patient_opd_follow_up_grid->status->Lookup->toClientList() ?>;
fpatient_opd_follow_upgrid.lists["x_status"].options = <?php echo JsonEncode($patient_opd_follow_up_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_opd_follow_up_grid->renderOtherOptions();
?>
<?php $patient_opd_follow_up_grid->showPageHeader(); ?>
<?php
$patient_opd_follow_up_grid->showMessage();
?>
<?php if ($patient_opd_follow_up_grid->TotalRecs > 0 || $patient_opd_follow_up->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_opd_follow_up_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_opd_follow_up">
<?php if ($patient_opd_follow_up_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_opd_follow_up_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_opd_follow_upgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_opd_follow_up" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_opd_follow_upgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_opd_follow_up_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_opd_follow_up_grid->renderListOptions();

// Render list options (header, left)
$patient_opd_follow_up_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_opd_follow_up->id->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_id" class="patient_opd_follow_up_id"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_opd_follow_up->id->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_id" class="patient_opd_follow_up_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->Reception->Visible) { // Reception ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_opd_follow_up->Reception->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_Reception" class="patient_opd_follow_up_Reception"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_opd_follow_up->Reception->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_Reception" class="patient_opd_follow_up_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_opd_follow_up->PatientId->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_PatientId" class="patient_opd_follow_up_PatientId"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_opd_follow_up->PatientId->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_PatientId" class="patient_opd_follow_up_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_opd_follow_up->mrnno->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_mrnno" class="patient_opd_follow_up_mrnno"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_opd_follow_up->mrnno->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_mrnno" class="patient_opd_follow_up_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_opd_follow_up->PatientName->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_opd_follow_up->PatientName->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->Telephone->Visible) { // Telephone ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->Telephone) == "") { ?>
		<th data-name="Telephone" class="<?php echo $patient_opd_follow_up->Telephone->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_Telephone" class="patient_opd_follow_up_Telephone"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Telephone" class="<?php echo $patient_opd_follow_up->Telephone->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_Telephone" class="patient_opd_follow_up_Telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Telephone->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->Telephone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->Telephone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->Age->Visible) { // Age ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_opd_follow_up->Age->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_Age" class="patient_opd_follow_up_Age"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_opd_follow_up->Age->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_Age" class="patient_opd_follow_up_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_opd_follow_up->Gender->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_opd_follow_up->Gender->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_opd_follow_up->NextReviewDate->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_opd_follow_up->NextReviewDate->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->NextReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->NextReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->ICSIAdvised) == "") { ?>
		<th data-name="ICSIAdvised" class="<?php echo $patient_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ICSIAdvised->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIAdvised" class="<?php echo $patient_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ICSIAdvised->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->ICSIAdvised->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->ICSIAdvised->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->DeliveryRegistered) == "") { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $patient_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->DeliveryRegistered->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $patient_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->DeliveryRegistered->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->DeliveryRegistered->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->DeliveryRegistered->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->EDD) == "") { ?>
		<th data-name="EDD" class="<?php echo $patient_opd_follow_up->EDD->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->EDD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDD" class="<?php echo $patient_opd_follow_up->EDD->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->EDD->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->EDD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->EDD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->SerologyPositive) == "") { ?>
		<th data-name="SerologyPositive" class="<?php echo $patient_opd_follow_up->SerologyPositive->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->SerologyPositive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerologyPositive" class="<?php echo $patient_opd_follow_up->SerologyPositive->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->SerologyPositive->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->SerologyPositive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->SerologyPositive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->Allergy) == "") { ?>
		<th data-name="Allergy" class="<?php echo $patient_opd_follow_up->Allergy->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Allergy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Allergy" class="<?php echo $patient_opd_follow_up->Allergy->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->Allergy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->Allergy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->Allergy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_opd_follow_up->status->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_status" class="patient_opd_follow_up_status"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_opd_follow_up->status->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_status" class="patient_opd_follow_up_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_opd_follow_up->createdby->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_opd_follow_up->createdby->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_opd_follow_up->createddatetime->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_opd_follow_up->createddatetime->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_opd_follow_up->modifiedby->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_opd_follow_up->modifiedby->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_opd_follow_up->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_opd_follow_up->modifieddatetime->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $patient_opd_follow_up->LMP->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $patient_opd_follow_up->LMP->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->LMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->LMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->ProcedureDateTime) == "") { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $patient_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ProcedureDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $patient_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ProcedureDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->ProcedureDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->ProcedureDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<?php if ($patient_opd_follow_up->sortUrl($patient_opd_follow_up->ICSIDate) == "") { ?>
		<th data-name="ICSIDate" class="<?php echo $patient_opd_follow_up->ICSIDate->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ICSIDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDate" class="<?php echo $patient_opd_follow_up->ICSIDate->headerCellClass() ?>"><div><div id="elh_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up->ICSIDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up->ICSIDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_opd_follow_up->ICSIDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_opd_follow_up_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_opd_follow_up_grid->StartRec = 1;
$patient_opd_follow_up_grid->StopRec = $patient_opd_follow_up_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_opd_follow_up_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_opd_follow_up_grid->FormKeyCountName) && ($patient_opd_follow_up->isGridAdd() || $patient_opd_follow_up->isGridEdit() || $patient_opd_follow_up->isConfirm())) {
		$patient_opd_follow_up_grid->KeyCount = $CurrentForm->getValue($patient_opd_follow_up_grid->FormKeyCountName);
		$patient_opd_follow_up_grid->StopRec = $patient_opd_follow_up_grid->StartRec + $patient_opd_follow_up_grid->KeyCount - 1;
	}
}
$patient_opd_follow_up_grid->RecCnt = $patient_opd_follow_up_grid->StartRec - 1;
if ($patient_opd_follow_up_grid->Recordset && !$patient_opd_follow_up_grid->Recordset->EOF) {
	$patient_opd_follow_up_grid->Recordset->moveFirst();
	$selectLimit = $patient_opd_follow_up_grid->UseSelectLimit;
	if (!$selectLimit && $patient_opd_follow_up_grid->StartRec > 1)
		$patient_opd_follow_up_grid->Recordset->move($patient_opd_follow_up_grid->StartRec - 1);
} elseif (!$patient_opd_follow_up->AllowAddDeleteRow && $patient_opd_follow_up_grid->StopRec == 0) {
	$patient_opd_follow_up_grid->StopRec = $patient_opd_follow_up->GridAddRowCount;
}

// Initialize aggregate
$patient_opd_follow_up->RowType = ROWTYPE_AGGREGATEINIT;
$patient_opd_follow_up->resetAttributes();
$patient_opd_follow_up_grid->renderRow();
if ($patient_opd_follow_up->isGridAdd())
	$patient_opd_follow_up_grid->RowIndex = 0;
if ($patient_opd_follow_up->isGridEdit())
	$patient_opd_follow_up_grid->RowIndex = 0;
while ($patient_opd_follow_up_grid->RecCnt < $patient_opd_follow_up_grid->StopRec) {
	$patient_opd_follow_up_grid->RecCnt++;
	if ($patient_opd_follow_up_grid->RecCnt >= $patient_opd_follow_up_grid->StartRec) {
		$patient_opd_follow_up_grid->RowCnt++;
		if ($patient_opd_follow_up->isGridAdd() || $patient_opd_follow_up->isGridEdit() || $patient_opd_follow_up->isConfirm()) {
			$patient_opd_follow_up_grid->RowIndex++;
			$CurrentForm->Index = $patient_opd_follow_up_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_opd_follow_up_grid->FormActionName) && $patient_opd_follow_up_grid->EventCancelled)
				$patient_opd_follow_up_grid->RowAction = strval($CurrentForm->getValue($patient_opd_follow_up_grid->FormActionName));
			elseif ($patient_opd_follow_up->isGridAdd())
				$patient_opd_follow_up_grid->RowAction = "insert";
			else
				$patient_opd_follow_up_grid->RowAction = "";
		}

		// Set up key count
		$patient_opd_follow_up_grid->KeyCount = $patient_opd_follow_up_grid->RowIndex;

		// Init row class and style
		$patient_opd_follow_up->resetAttributes();
		$patient_opd_follow_up->CssClass = "";
		if ($patient_opd_follow_up->isGridAdd()) {
			if ($patient_opd_follow_up->CurrentMode == "copy") {
				$patient_opd_follow_up_grid->loadRowValues($patient_opd_follow_up_grid->Recordset); // Load row values
				$patient_opd_follow_up_grid->setRecordKey($patient_opd_follow_up_grid->RowOldKey, $patient_opd_follow_up_grid->Recordset); // Set old record key
			} else {
				$patient_opd_follow_up_grid->loadRowValues(); // Load default values
				$patient_opd_follow_up_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_opd_follow_up_grid->loadRowValues($patient_opd_follow_up_grid->Recordset); // Load row values
		}
		$patient_opd_follow_up->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_opd_follow_up->isGridAdd()) // Grid add
			$patient_opd_follow_up->RowType = ROWTYPE_ADD; // Render add
		if ($patient_opd_follow_up->isGridAdd() && $patient_opd_follow_up->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_opd_follow_up_grid->restoreCurrentRowFormValues($patient_opd_follow_up_grid->RowIndex); // Restore form values
		if ($patient_opd_follow_up->isGridEdit()) { // Grid edit
			if ($patient_opd_follow_up->EventCancelled)
				$patient_opd_follow_up_grid->restoreCurrentRowFormValues($patient_opd_follow_up_grid->RowIndex); // Restore form values
			if ($patient_opd_follow_up_grid->RowAction == "insert")
				$patient_opd_follow_up->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_opd_follow_up->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_opd_follow_up->isGridEdit() && ($patient_opd_follow_up->RowType == ROWTYPE_EDIT || $patient_opd_follow_up->RowType == ROWTYPE_ADD) && $patient_opd_follow_up->EventCancelled) // Update failed
			$patient_opd_follow_up_grid->restoreCurrentRowFormValues($patient_opd_follow_up_grid->RowIndex); // Restore form values
		if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) // Edit row
			$patient_opd_follow_up_grid->EditRowCnt++;
		if ($patient_opd_follow_up->isConfirm()) // Confirm row
			$patient_opd_follow_up_grid->restoreCurrentRowFormValues($patient_opd_follow_up_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_opd_follow_up->RowAttrs = array_merge($patient_opd_follow_up->RowAttrs, array('data-rowindex'=>$patient_opd_follow_up_grid->RowCnt, 'id'=>'r' . $patient_opd_follow_up_grid->RowCnt . '_patient_opd_follow_up', 'data-rowtype'=>$patient_opd_follow_up->RowType));

		// Render row
		$patient_opd_follow_up_grid->renderRow();

		// Render list options
		$patient_opd_follow_up_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_opd_follow_up_grid->RowAction <> "delete" && $patient_opd_follow_up_grid->RowAction <> "insertdelete" && !($patient_opd_follow_up_grid->RowAction == "insert" && $patient_opd_follow_up->isConfirm() && $patient_opd_follow_up_grid->emptyRow())) {
?>
	<tr<?php echo $patient_opd_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_opd_follow_up_grid->ListOptions->render("body", "left", $patient_opd_follow_up_grid->RowCnt);
?>
	<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_opd_follow_up->id->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_opd_follow_up->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_id" class="form-group patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_opd_follow_up->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_id" class="patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up->id->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->id->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_opd_follow_up->id->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_opd_follow_up->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_opd_follow_up->id->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_opd_follow_up->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_opd_follow_up->Reception->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_opd_follow_up->Reception->getSessionValue() <> "") { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->ViewValue) ?>">
</script>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="form-group patient_opd_follow_up_Reception">
<span<?php echo $patient_opd_follow_up->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->ViewValue) ?>">
</script>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="form-group patient_opd_follow_up_Reception">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Reception" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Reception->EditValue ?>"<?php echo $patient_opd_follow_up->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Reception" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->EditValue) ?>">
</script>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="form-group patient_opd_follow_up_Reception">
<span<?php echo $patient_opd_follow_up->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Reception" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="patient_vitalsedit" type="text/html">
<?php echo $patient_opd_follow_up->Reception->getViewValue() ?>
</script>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="patient_opd_follow_up_Reception">
<span<?php echo $patient_opd_follow_up->Reception->viewAttributes() ?>><?php echo Barcode()->show($patient_opd_follow_up->Reception->CurrentValue, 'QRCODE', 80) ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Reception" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Reception" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Reception" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Reception" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_opd_follow_up->PatientId->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_opd_follow_up->PatientId->getSessionValue() <> "") { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->ViewValue) ?>">
</script>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="form-group patient_opd_follow_up_PatientId">
<span<?php echo $patient_opd_follow_up->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->ViewValue) ?>">
</script>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="form-group patient_opd_follow_up_PatientId">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientId->EditValue ?>"<?php echo $patient_opd_follow_up->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientId" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->EditValue) ?>">
</script>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="form-group patient_opd_follow_up_PatientId">
<span<?php echo $patient_opd_follow_up->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="patient_vitalsedit" type="text/html">
<?php echo $patient_opd_follow_up->PatientId->getViewValue() ?>
</script>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="patient_opd_follow_up_PatientId">
<span<?php echo $patient_opd_follow_up->PatientId->viewAttributes() ?>><?php echo Barcode()->show($patient_opd_follow_up->PatientId->CurrentValue, 'CODE128', 40) ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientId" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientId" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientId" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_opd_follow_up->mrnno->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_opd_follow_up->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_mrnno" class="form-group patient_opd_follow_up_mrnno">
<span<?php echo $patient_opd_follow_up->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_mrnno" class="form-group patient_opd_follow_up_mrnno">
<input type="text" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->mrnno->EditValue ?>"<?php echo $patient_opd_follow_up->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_mrnno" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_mrnno" class="form-group patient_opd_follow_up_mrnno">
<span<?php echo $patient_opd_follow_up->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_mrnno" class="patient_opd_follow_up_mrnno">
<span<?php echo $patient_opd_follow_up->mrnno->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_mrnno" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_mrnno" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_mrnno" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_opd_follow_up->PatientName->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientName" class="form-group patient_opd_follow_up_PatientName">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientName->EditValue ?>"<?php echo $patient_opd_follow_up->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientName" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientName" class="form-group patient_opd_follow_up_PatientName">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientName->EditValue ?>"<?php echo $patient_opd_follow_up->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName">
<span<?php echo $patient_opd_follow_up->PatientName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientName" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientName" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientName" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Telephone->Visible) { // Telephone ?>
		<td data-name="Telephone"<?php echo $patient_opd_follow_up->Telephone->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Telephone" class="form-group patient_opd_follow_up_Telephone">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Telephone->EditValue ?>"<?php echo $patient_opd_follow_up->Telephone->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Telephone" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" value="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Telephone" class="form-group patient_opd_follow_up_Telephone">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Telephone->EditValue ?>"<?php echo $patient_opd_follow_up->Telephone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Telephone" class="patient_opd_follow_up_Telephone">
<span<?php echo $patient_opd_follow_up->Telephone->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Telephone->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" value="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Telephone" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" value="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Telephone" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" value="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Telephone" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" value="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_opd_follow_up->Age->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Age" class="form-group patient_opd_follow_up_Age">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Age" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Age->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Age->EditValue ?>"<?php echo $patient_opd_follow_up->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Age" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_opd_follow_up->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Age" class="form-group patient_opd_follow_up_Age">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Age" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Age->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Age->EditValue ?>"<?php echo $patient_opd_follow_up->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Age" class="patient_opd_follow_up_Age">
<span<?php echo $patient_opd_follow_up->Age->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Age" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_opd_follow_up->Age->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Age" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_opd_follow_up->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Age" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_opd_follow_up->Age->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Age" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_opd_follow_up->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_opd_follow_up->Gender->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Gender" class="form-group patient_opd_follow_up_Gender">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Gender" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Gender->EditValue ?>"<?php echo $patient_opd_follow_up->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Gender" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_opd_follow_up->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Gender" class="form-group patient_opd_follow_up_Gender">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Gender" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Gender->EditValue ?>"<?php echo $patient_opd_follow_up->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender">
<span<?php echo $patient_opd_follow_up->Gender->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Gender" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_opd_follow_up->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Gender" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_opd_follow_up->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Gender" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_opd_follow_up->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Gender" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_opd_follow_up->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate"<?php echo $patient_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_NextReviewDate" class="form-group patient_opd_follow_up_NextReviewDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->NextReviewDate->EditValue ?>"<?php echo $patient_opd_follow_up->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->NextReviewDate->ReadOnly && !$patient_opd_follow_up->NextReviewDate->Disabled && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_NextReviewDate" class="form-group patient_opd_follow_up_NextReviewDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->NextReviewDate->EditValue ?>"<?php echo $patient_opd_follow_up->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->NextReviewDate->ReadOnly && !$patient_opd_follow_up->NextReviewDate->Disabled && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate">
<span<?php echo $patient_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td data-name="ICSIAdvised"<?php echo $patient_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_ICSIAdvised" class="form-group patient_opd_follow_up_ICSIAdvised">
<div id="tp_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $patient_opd_follow_up->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" value="{value}"<?php echo $patient_opd_follow_up->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->ICSIAdvised->checkBoxListHtml(FALSE, "x{$patient_opd_follow_up_grid->RowIndex}_ICSIAdvised[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIAdvised->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_ICSIAdvised" class="form-group patient_opd_follow_up_ICSIAdvised">
<div id="tp_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $patient_opd_follow_up->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" value="{value}"<?php echo $patient_opd_follow_up->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->ICSIAdvised->checkBoxListHtml(FALSE, "x{$patient_opd_follow_up_grid->RowIndex}_ICSIAdvised[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised">
<span<?php echo $patient_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ICSIAdvised->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIAdvised->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIAdvised->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIAdvised->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIAdvised->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td data-name="DeliveryRegistered"<?php echo $patient_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_DeliveryRegistered" class="form-group patient_opd_follow_up_DeliveryRegistered">
<div id="tp_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $patient_opd_follow_up->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" value="{value}"<?php echo $patient_opd_follow_up->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->DeliveryRegistered->checkBoxListHtml(FALSE, "x{$patient_opd_follow_up_grid->RowIndex}_DeliveryRegistered[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" value="<?php echo HtmlEncode($patient_opd_follow_up->DeliveryRegistered->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_DeliveryRegistered" class="form-group patient_opd_follow_up_DeliveryRegistered">
<div id="tp_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $patient_opd_follow_up->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" value="{value}"<?php echo $patient_opd_follow_up->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->DeliveryRegistered->checkBoxListHtml(FALSE, "x{$patient_opd_follow_up_grid->RowIndex}_DeliveryRegistered[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered">
<span<?php echo $patient_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->DeliveryRegistered->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" value="<?php echo HtmlEncode($patient_opd_follow_up->DeliveryRegistered->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" value="<?php echo HtmlEncode($patient_opd_follow_up->DeliveryRegistered->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" value="<?php echo HtmlEncode($patient_opd_follow_up->DeliveryRegistered->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" value="<?php echo HtmlEncode($patient_opd_follow_up->DeliveryRegistered->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
		<td data-name="EDD"<?php echo $patient_opd_follow_up->EDD->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_EDD" class="form-group patient_opd_follow_up_EDD">
<input type="text" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->EDD->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->EDD->EditValue ?>"<?php echo $patient_opd_follow_up->EDD->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->EDD->ReadOnly && !$patient_opd_follow_up->EDD->Disabled && !isset($patient_opd_follow_up->EDD->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->EDD->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_EDD" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" value="<?php echo HtmlEncode($patient_opd_follow_up->EDD->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_EDD" class="form-group patient_opd_follow_up_EDD">
<input type="text" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->EDD->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->EDD->EditValue ?>"<?php echo $patient_opd_follow_up->EDD->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->EDD->ReadOnly && !$patient_opd_follow_up->EDD->Disabled && !isset($patient_opd_follow_up->EDD->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->EDD->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD">
<span<?php echo $patient_opd_follow_up->EDD->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->EDD->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_EDD" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" value="<?php echo HtmlEncode($patient_opd_follow_up->EDD->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_EDD" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" value="<?php echo HtmlEncode($patient_opd_follow_up->EDD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_EDD" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" value="<?php echo HtmlEncode($patient_opd_follow_up->EDD->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_EDD" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" value="<?php echo HtmlEncode($patient_opd_follow_up->EDD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
		<td data-name="SerologyPositive"<?php echo $patient_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_SerologyPositive" class="form-group patient_opd_follow_up_SerologyPositive">
<div id="tp_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $patient_opd_follow_up->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" value="{value}"<?php echo $patient_opd_follow_up->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->SerologyPositive->checkBoxListHtml(FALSE, "x{$patient_opd_follow_up_grid->RowIndex}_SerologyPositive[]") ?>
</div></div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" value="<?php echo HtmlEncode($patient_opd_follow_up->SerologyPositive->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_SerologyPositive" class="form-group patient_opd_follow_up_SerologyPositive">
<div id="tp_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $patient_opd_follow_up->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" value="{value}"<?php echo $patient_opd_follow_up->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->SerologyPositive->checkBoxListHtml(FALSE, "x{$patient_opd_follow_up_grid->RowIndex}_SerologyPositive[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive">
<span<?php echo $patient_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->SerologyPositive->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" value="<?php echo HtmlEncode($patient_opd_follow_up->SerologyPositive->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" value="<?php echo HtmlEncode($patient_opd_follow_up->SerologyPositive->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" value="<?php echo HtmlEncode($patient_opd_follow_up->SerologyPositive->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" value="<?php echo HtmlEncode($patient_opd_follow_up->SerologyPositive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
		<td data-name="Allergy"<?php echo $patient_opd_follow_up->Allergy->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Allergy" class="form-group patient_opd_follow_up_Allergy">
<?php
$wrkonchange = "" . trim(@$patient_opd_follow_up->Allergy->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_opd_follow_up->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_opd_follow_up_grid->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="sv_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo RemoveHtml($patient_opd_follow_up->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Allergy->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->Allergy->ReadOnly || $patient_opd_follow_up->Allergy->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->Allergy->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_opd_follow_upgrid.createAutoSuggest({"id":"x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy","forceSelect":false});
</script>
<?php echo $patient_opd_follow_up->Allergy->Lookup->getParamTag("p_x" . $patient_opd_follow_up_grid->RowIndex . "_Allergy") ?>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Allergy" class="form-group patient_opd_follow_up_Allergy">
<?php
$wrkonchange = "" . trim(@$patient_opd_follow_up->Allergy->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_opd_follow_up->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_opd_follow_up_grid->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="sv_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo RemoveHtml($patient_opd_follow_up->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Allergy->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->Allergy->ReadOnly || $patient_opd_follow_up->Allergy->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->Allergy->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_opd_follow_upgrid.createAutoSuggest({"id":"x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy","forceSelect":false});
</script>
<?php echo $patient_opd_follow_up->Allergy->Lookup->getParamTag("p_x" . $patient_opd_follow_up_grid->RowIndex . "_Allergy") ?>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy">
<span<?php echo $patient_opd_follow_up->Allergy->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Allergy->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_opd_follow_up->status->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_status" class="form-group patient_opd_follow_up_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_status" data-value-separator="<?php echo $patient_opd_follow_up->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status"<?php echo $patient_opd_follow_up->status->editAttributes() ?>>
		<?php echo $patient_opd_follow_up->status->selectOptionListHtml("x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_opd_follow_up->status->Lookup->getParamTag("p_x" . $patient_opd_follow_up_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_status" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_opd_follow_up->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_status" class="form-group patient_opd_follow_up_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_status" data-value-separator="<?php echo $patient_opd_follow_up->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status"<?php echo $patient_opd_follow_up->status->editAttributes() ?>>
		<?php echo $patient_opd_follow_up->status->selectOptionListHtml("x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_opd_follow_up->status->Lookup->getParamTag("p_x" . $patient_opd_follow_up_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_status" class="patient_opd_follow_up_status">
<span<?php echo $patient_opd_follow_up->status->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->status->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_status" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_opd_follow_up->status->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_status" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_opd_follow_up->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_status" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_opd_follow_up->status->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_status" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_opd_follow_up->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_opd_follow_up->createdby->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createdby" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_opd_follow_up->createdby->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby">
<span<?php echo $patient_opd_follow_up->createdby->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createdby->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createdby" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_opd_follow_up->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createdby" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_opd_follow_up->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createdby" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_opd_follow_up->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createdby" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_opd_follow_up->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_opd_follow_up->createddatetime->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime">
<span<?php echo $patient_opd_follow_up->createddatetime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_opd_follow_up->modifiedby->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_opd_follow_up->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby">
<span<?php echo $patient_opd_follow_up->modifiedby->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_opd_follow_up->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_opd_follow_up->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_opd_follow_up->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_opd_follow_up->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_opd_follow_up->modifieddatetime->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime">
<span<?php echo $patient_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
		<td data-name="LMP"<?php echo $patient_opd_follow_up->LMP->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_LMP" class="form-group patient_opd_follow_up_LMP">
<input type="text" data-table="patient_opd_follow_up" data-field="x_LMP" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->LMP->EditValue ?>"<?php echo $patient_opd_follow_up->LMP->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->LMP->ReadOnly && !$patient_opd_follow_up->LMP->Disabled && !isset($patient_opd_follow_up->LMP->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_LMP" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_opd_follow_up->LMP->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_LMP" class="form-group patient_opd_follow_up_LMP">
<input type="text" data-table="patient_opd_follow_up" data-field="x_LMP" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->LMP->EditValue ?>"<?php echo $patient_opd_follow_up->LMP->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->LMP->ReadOnly && !$patient_opd_follow_up->LMP->Disabled && !isset($patient_opd_follow_up->LMP->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP">
<span<?php echo $patient_opd_follow_up->LMP->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->LMP->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_LMP" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_opd_follow_up->LMP->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_LMP" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_opd_follow_up->LMP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_LMP" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_opd_follow_up->LMP->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_LMP" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_opd_follow_up->LMP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td data-name="ProcedureDateTime"<?php echo $patient_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_ProcedureDateTime" class="form-group patient_opd_follow_up_ProcedureDateTime">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ProcedureDateTime->EditValue ?>"<?php echo $patient_opd_follow_up->ProcedureDateTime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ProcedureDateTime->ReadOnly && !$patient_opd_follow_up->ProcedureDateTime->Disabled && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" value="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_ProcedureDateTime" class="form-group patient_opd_follow_up_ProcedureDateTime">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ProcedureDateTime->EditValue ?>"<?php echo $patient_opd_follow_up->ProcedureDateTime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ProcedureDateTime->ReadOnly && !$patient_opd_follow_up->ProcedureDateTime->Disabled && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime">
<span<?php echo $patient_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ProcedureDateTime->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" value="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" value="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" value="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" value="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
		<td data-name="ICSIDate"<?php echo $patient_opd_follow_up->ICSIDate->cellAttributes() ?>>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_ICSIDate" class="form-group patient_opd_follow_up_ICSIDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ICSIDate->EditValue ?>"<?php echo $patient_opd_follow_up->ICSIDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ICSIDate->ReadOnly && !$patient_opd_follow_up->ICSIDate->Disabled && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_ICSIDate" class="form-group patient_opd_follow_up_ICSIDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ICSIDate->EditValue ?>"<?php echo $patient_opd_follow_up->ICSIDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ICSIDate->ReadOnly && !$patient_opd_follow_up->ICSIDate->Disabled && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate">
<span<?php echo $patient_opd_follow_up->ICSIDate->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ICSIDate->getViewValue() ?></span>
</span>
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="fpatient_opd_follow_upgrid$x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->FormValue) ?>">
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="fpatient_opd_follow_upgrid$o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_opd_follow_up_grid->ListOptions->render("body", "right", $patient_opd_follow_up_grid->RowCnt);
?>
	</tr>
<?php if ($patient_opd_follow_up->RowType == ROWTYPE_ADD || $patient_opd_follow_up->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_opd_follow_upgrid.updateLists(<?php echo $patient_opd_follow_up_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_opd_follow_up->isGridAdd() || $patient_opd_follow_up->CurrentMode == "copy")
		if (!$patient_opd_follow_up_grid->Recordset->EOF)
			$patient_opd_follow_up_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_opd_follow_up->CurrentMode == "add" || $patient_opd_follow_up->CurrentMode == "copy" || $patient_opd_follow_up->CurrentMode == "edit") {
		$patient_opd_follow_up_grid->RowIndex = '$rowindex$';
		$patient_opd_follow_up_grid->loadRowValues();

		// Set row properties
		$patient_opd_follow_up->resetAttributes();
		$patient_opd_follow_up->RowAttrs = array_merge($patient_opd_follow_up->RowAttrs, array('data-rowindex'=>$patient_opd_follow_up_grid->RowIndex, 'id'=>'r0_patient_opd_follow_up', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_opd_follow_up->RowAttrs["class"], "ew-template");
		$patient_opd_follow_up->RowType = ROWTYPE_ADD;

		// Render row
		$patient_opd_follow_up_grid->renderRow();

		// Render list options
		$patient_opd_follow_up_grid->renderListOptions();
		$patient_opd_follow_up_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_opd_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_opd_follow_up_grid->ListOptions->render("body", "left", $patient_opd_follow_up_grid->RowIndex);
?>
	<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_id" class="form-group patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_opd_follow_up->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_opd_follow_up->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<?php if ($patient_opd_follow_up->Reception->getSessionValue() <> "") { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->ViewValue) ?>">
</script>
<span id="el$rowindex$_patient_opd_follow_up_Reception" class="form-group patient_opd_follow_up_Reception">
<span<?php echo $patient_opd_follow_up->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->ViewValue) ?>">
</script>
<span id="el$rowindex$_patient_opd_follow_up_Reception" class="form-group patient_opd_follow_up_Reception">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Reception" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Reception->EditValue ?>"<?php echo $patient_opd_follow_up->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_Reception" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->ViewValue) ?>">
</script>
<span id="el$rowindex$_patient_opd_follow_up_Reception" class="form-group patient_opd_follow_up_Reception">
<span<?php echo $patient_opd_follow_up->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Reception" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Reception" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_opd_follow_up->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<?php if ($patient_opd_follow_up->PatientId->getSessionValue() <> "") { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->ViewValue) ?>">
</script>
<span id="el$rowindex$_patient_opd_follow_up_PatientId" class="form-group patient_opd_follow_up_PatientId">
<span<?php echo $patient_opd_follow_up->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->ViewValue) ?>">
</script>
<span id="el$rowindex$_patient_opd_follow_up_PatientId" class="form-group patient_opd_follow_up_PatientId">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientId->EditValue ?>"<?php echo $patient_opd_follow_up->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<script id="orig<?php echo $patient_opd_follow_up_grid->RowCnt ?>_patient_opd_follow_up_PatientId" class="patient_vitalsedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->ViewValue) ?>">
</script>
<span id="el$rowindex$_patient_opd_follow_up_PatientId" class="form-group patient_opd_follow_up_PatientId">
<span<?php echo $patient_opd_follow_up->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientId" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<?php if ($patient_opd_follow_up->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_opd_follow_up_mrnno" class="form-group patient_opd_follow_up_mrnno">
<span<?php echo $patient_opd_follow_up->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_mrnno" class="form-group patient_opd_follow_up_mrnno">
<input type="text" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->mrnno->EditValue ?>"<?php echo $patient_opd_follow_up->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_mrnno" class="form-group patient_opd_follow_up_mrnno">
<span<?php echo $patient_opd_follow_up->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_mrnno" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_PatientName" class="form-group patient_opd_follow_up_PatientName">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientName->EditValue ?>"<?php echo $patient_opd_follow_up->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_PatientName" class="form-group patient_opd_follow_up_PatientName">
<span<?php echo $patient_opd_follow_up->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientName" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Telephone->Visible) { // Telephone ?>
		<td data-name="Telephone">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_Telephone" class="form-group patient_opd_follow_up_Telephone">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Telephone->EditValue ?>"<?php echo $patient_opd_follow_up->Telephone->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_Telephone" class="form-group patient_opd_follow_up_Telephone">
<span<?php echo $patient_opd_follow_up->Telephone->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Telephone->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" value="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Telephone" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Telephone" value="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_Age" class="form-group patient_opd_follow_up_Age">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Age" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Age->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Age->EditValue ?>"<?php echo $patient_opd_follow_up->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_Age" class="form-group patient_opd_follow_up_Age">
<span<?php echo $patient_opd_follow_up->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Age" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_opd_follow_up->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Age" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_opd_follow_up->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_Gender" class="form-group patient_opd_follow_up_Gender">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Gender" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Gender->EditValue ?>"<?php echo $patient_opd_follow_up->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_Gender" class="form-group patient_opd_follow_up_Gender">
<span<?php echo $patient_opd_follow_up->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Gender" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_opd_follow_up->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Gender" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_opd_follow_up->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_NextReviewDate" class="form-group patient_opd_follow_up_NextReviewDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->NextReviewDate->EditValue ?>"<?php echo $patient_opd_follow_up->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->NextReviewDate->ReadOnly && !$patient_opd_follow_up->NextReviewDate->Disabled && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_NextReviewDate" class="form-group patient_opd_follow_up_NextReviewDate">
<span<?php echo $patient_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->NextReviewDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_NextReviewDate" value="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td data-name="ICSIAdvised">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_ICSIAdvised" class="form-group patient_opd_follow_up_ICSIAdvised">
<div id="tp_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $patient_opd_follow_up->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" value="{value}"<?php echo $patient_opd_follow_up->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->ICSIAdvised->checkBoxListHtml(FALSE, "x{$patient_opd_follow_up_grid->RowIndex}_ICSIAdvised[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_ICSIAdvised" class="form-group patient_opd_follow_up_ICSIAdvised">
<span<?php echo $patient_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->ICSIAdvised->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIAdvised->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIAdvised[]" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIAdvised->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td data-name="DeliveryRegistered">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_DeliveryRegistered" class="form-group patient_opd_follow_up_DeliveryRegistered">
<div id="tp_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $patient_opd_follow_up->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" value="{value}"<?php echo $patient_opd_follow_up->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->DeliveryRegistered->checkBoxListHtml(FALSE, "x{$patient_opd_follow_up_grid->RowIndex}_DeliveryRegistered[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_DeliveryRegistered" class="form-group patient_opd_follow_up_DeliveryRegistered">
<span<?php echo $patient_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->DeliveryRegistered->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered" value="<?php echo HtmlEncode($patient_opd_follow_up->DeliveryRegistered->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_DeliveryRegistered[]" value="<?php echo HtmlEncode($patient_opd_follow_up->DeliveryRegistered->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
		<td data-name="EDD">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_EDD" class="form-group patient_opd_follow_up_EDD">
<input type="text" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->EDD->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->EDD->EditValue ?>"<?php echo $patient_opd_follow_up->EDD->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->EDD->ReadOnly && !$patient_opd_follow_up->EDD->Disabled && !isset($patient_opd_follow_up->EDD->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->EDD->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_EDD" class="form-group patient_opd_follow_up_EDD">
<span<?php echo $patient_opd_follow_up->EDD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->EDD->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_EDD" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" value="<?php echo HtmlEncode($patient_opd_follow_up->EDD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_EDD" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_EDD" value="<?php echo HtmlEncode($patient_opd_follow_up->EDD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
		<td data-name="SerologyPositive">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_SerologyPositive" class="form-group patient_opd_follow_up_SerologyPositive">
<div id="tp_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $patient_opd_follow_up->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" value="{value}"<?php echo $patient_opd_follow_up->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->SerologyPositive->checkBoxListHtml(FALSE, "x{$patient_opd_follow_up_grid->RowIndex}_SerologyPositive[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_SerologyPositive" class="form-group patient_opd_follow_up_SerologyPositive">
<span<?php echo $patient_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->SerologyPositive->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive" value="<?php echo HtmlEncode($patient_opd_follow_up->SerologyPositive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_SerologyPositive[]" value="<?php echo HtmlEncode($patient_opd_follow_up->SerologyPositive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
		<td data-name="Allergy">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_Allergy" class="form-group patient_opd_follow_up_Allergy">
<?php
$wrkonchange = "" . trim(@$patient_opd_follow_up->Allergy->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_opd_follow_up->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_opd_follow_up_grid->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="sv_x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo RemoveHtml($patient_opd_follow_up->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Allergy->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->Allergy->ReadOnly || $patient_opd_follow_up->Allergy->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->Allergy->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_opd_follow_upgrid.createAutoSuggest({"id":"x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy","forceSelect":false});
</script>
<?php echo $patient_opd_follow_up->Allergy->Lookup->getParamTag("p_x" . $patient_opd_follow_up_grid->RowIndex . "_Allergy") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_Allergy" class="form-group patient_opd_follow_up_Allergy">
<span<?php echo $patient_opd_follow_up->Allergy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->Allergy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_status" class="form-group patient_opd_follow_up_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_status" data-value-separator="<?php echo $patient_opd_follow_up->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status"<?php echo $patient_opd_follow_up->status->editAttributes() ?>>
		<?php echo $patient_opd_follow_up->status->selectOptionListHtml("x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_opd_follow_up->status->Lookup->getParamTag("p_x" . $patient_opd_follow_up_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_status" class="form-group patient_opd_follow_up_status">
<span<?php echo $patient_opd_follow_up->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_status" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_opd_follow_up->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_status" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_opd_follow_up->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_createdby" class="form-group patient_opd_follow_up_createdby">
<span<?php echo $patient_opd_follow_up->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createdby" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_opd_follow_up->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createdby" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_opd_follow_up->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_createddatetime" class="form-group patient_opd_follow_up_createddatetime">
<span<?php echo $patient_opd_follow_up->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_modifiedby" class="form-group patient_opd_follow_up_modifiedby">
<span<?php echo $patient_opd_follow_up->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_opd_follow_up->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_opd_follow_up->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_modifieddatetime" class="form-group patient_opd_follow_up_modifieddatetime">
<span<?php echo $patient_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_opd_follow_up->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
		<td data-name="LMP">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_LMP" class="form-group patient_opd_follow_up_LMP">
<input type="text" data-table="patient_opd_follow_up" data-field="x_LMP" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->LMP->EditValue ?>"<?php echo $patient_opd_follow_up->LMP->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->LMP->ReadOnly && !$patient_opd_follow_up->LMP->Disabled && !isset($patient_opd_follow_up->LMP->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_LMP" class="form-group patient_opd_follow_up_LMP">
<span<?php echo $patient_opd_follow_up->LMP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->LMP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_LMP" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_opd_follow_up->LMP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_LMP" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_LMP" value="<?php echo HtmlEncode($patient_opd_follow_up->LMP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td data-name="ProcedureDateTime">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_ProcedureDateTime" class="form-group patient_opd_follow_up_ProcedureDateTime">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ProcedureDateTime->EditValue ?>"<?php echo $patient_opd_follow_up->ProcedureDateTime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ProcedureDateTime->ReadOnly && !$patient_opd_follow_up->ProcedureDateTime->Disabled && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_ProcedureDateTime" class="form-group patient_opd_follow_up_ProcedureDateTime">
<span<?php echo $patient_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->ProcedureDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" value="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ProcedureDateTime" value="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
		<td data-name="ICSIDate">
<?php if (!$patient_opd_follow_up->isConfirm()) { ?>
<span id="el$rowindex$_patient_opd_follow_up_ICSIDate" class="form-group patient_opd_follow_up_ICSIDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ICSIDate->EditValue ?>"<?php echo $patient_opd_follow_up->ICSIDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ICSIDate->ReadOnly && !$patient_opd_follow_up->ICSIDate->Disabled && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upgrid", "x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_opd_follow_up_ICSIDate" class="form-group patient_opd_follow_up_ICSIDate">
<span<?php echo $patient_opd_follow_up->ICSIDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_opd_follow_up->ICSIDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="x<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" id="o<?php echo $patient_opd_follow_up_grid->RowIndex ?>_ICSIDate" value="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_opd_follow_up_grid->ListOptions->render("body", "right", $patient_opd_follow_up_grid->RowIndex);
?>
<script>
fpatient_opd_follow_upgrid.updateLists(<?php echo $patient_opd_follow_up_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_opd_follow_up->CurrentMode == "add" || $patient_opd_follow_up->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_opd_follow_up_grid->FormKeyCountName ?>" id="<?php echo $patient_opd_follow_up_grid->FormKeyCountName ?>" value="<?php echo $patient_opd_follow_up_grid->KeyCount ?>">
<?php echo $patient_opd_follow_up_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_opd_follow_up->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_opd_follow_up_grid->FormKeyCountName ?>" id="<?php echo $patient_opd_follow_up_grid->FormKeyCountName ?>" value="<?php echo $patient_opd_follow_up_grid->KeyCount ?>">
<?php echo $patient_opd_follow_up_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_opd_follow_up->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_opd_follow_upgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_opd_follow_up_grid->Recordset)
	$patient_opd_follow_up_grid->Recordset->Close();
?>
</div>
<?php if ($patient_opd_follow_up_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_opd_follow_up_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_opd_follow_up_grid->TotalRecs == 0 && !$patient_opd_follow_up->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_opd_follow_up_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_opd_follow_up_grid->terminate();
?>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_opd_follow_up", "95%", "");
</script>
<?php } ?>
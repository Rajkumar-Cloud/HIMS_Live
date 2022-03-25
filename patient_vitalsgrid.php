<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_vitals_grid))
	$patient_vitals_grid = new patient_vitals_grid();

// Run the page
$patient_vitals_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_vitals_grid->Page_Render();
?>
<?php if (!$patient_vitals->isExport()) { ?>
<script>

// Form object
var fpatient_vitalsgrid = new ew.Form("fpatient_vitalsgrid", "grid");
fpatient_vitalsgrid.formKeyCountName = '<?php echo $patient_vitals_grid->FormKeyCountName ?>';

// Validate form
fpatient_vitalsgrid.validate = function() {
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
		<?php if ($patient_vitals_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->id->caption(), $patient_vitals->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->mrnno->caption(), $patient_vitals->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PatientName->caption(), $patient_vitals->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PatID->caption(), $patient_vitals->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->MobileNumber->caption(), $patient_vitals->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->HT->Required) { ?>
			elm = this.getElements("x" + infix + "_HT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->HT->caption(), $patient_vitals->HT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->WT->Required) { ?>
			elm = this.getElements("x" + infix + "_WT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->WT->caption(), $patient_vitals->WT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->SurfaceArea->Required) { ?>
			elm = this.getElements("x" + infix + "_SurfaceArea");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->SurfaceArea->caption(), $patient_vitals->SurfaceArea->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->BodyMassIndex->Required) { ?>
			elm = this.getElements("x" + infix + "_BodyMassIndex");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->BodyMassIndex->caption(), $patient_vitals->BodyMassIndex->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->AnticoagulantifAny->Required) { ?>
			elm = this.getElements("x" + infix + "_AnticoagulantifAny");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->AnticoagulantifAny->caption(), $patient_vitals->AnticoagulantifAny->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->FoodAllergies->Required) { ?>
			elm = this.getElements("x" + infix + "_FoodAllergies");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->FoodAllergies->caption(), $patient_vitals->FoodAllergies->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->GenericAllergies->Required) { ?>
			elm = this.getElements("x" + infix + "_GenericAllergies[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->GenericAllergies->caption(), $patient_vitals->GenericAllergies->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->GroupAllergies->Required) { ?>
			elm = this.getElements("x" + infix + "_GroupAllergies[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->GroupAllergies->caption(), $patient_vitals->GroupAllergies->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Temp->caption(), $patient_vitals->Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->Pulse->Required) { ?>
			elm = this.getElements("x" + infix + "_Pulse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Pulse->caption(), $patient_vitals->Pulse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->BP->Required) { ?>
			elm = this.getElements("x" + infix + "_BP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->BP->caption(), $patient_vitals->BP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->PR->Required) { ?>
			elm = this.getElements("x" + infix + "_PR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PR->caption(), $patient_vitals->PR->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->CNS->Required) { ?>
			elm = this.getElements("x" + infix + "_CNS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->CNS->caption(), $patient_vitals->CNS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->RSA->Required) { ?>
			elm = this.getElements("x" + infix + "_RSA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->RSA->caption(), $patient_vitals->RSA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->CVS->Required) { ?>
			elm = this.getElements("x" + infix + "_CVS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->CVS->caption(), $patient_vitals->CVS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->PA->Required) { ?>
			elm = this.getElements("x" + infix + "_PA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PA->caption(), $patient_vitals->PA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->PS->Required) { ?>
			elm = this.getElements("x" + infix + "_PS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PS->caption(), $patient_vitals->PS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->PV->Required) { ?>
			elm = this.getElements("x" + infix + "_PV");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PV->caption(), $patient_vitals->PV->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->clinicaldetails->Required) { ?>
			elm = this.getElements("x" + infix + "_clinicaldetails[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->clinicaldetails->caption(), $patient_vitals->clinicaldetails->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->status->caption(), $patient_vitals->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->createdby->caption(), $patient_vitals->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->createddatetime->caption(), $patient_vitals->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->modifiedby->caption(), $patient_vitals->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->modifieddatetime->caption(), $patient_vitals->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Age->caption(), $patient_vitals->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Gender->caption(), $patient_vitals->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->PatientId->caption(), $patient_vitals->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->Reception->caption(), $patient_vitals->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_vitals_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals->HospID->caption(), $patient_vitals->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_vitalsgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
	if (ew.valueChanged(fobj, infix, "MobileNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "HT", false)) return false;
	if (ew.valueChanged(fobj, infix, "WT", false)) return false;
	if (ew.valueChanged(fobj, infix, "SurfaceArea", false)) return false;
	if (ew.valueChanged(fobj, infix, "BodyMassIndex", false)) return false;
	if (ew.valueChanged(fobj, infix, "AnticoagulantifAny", false)) return false;
	if (ew.valueChanged(fobj, infix, "FoodAllergies", false)) return false;
	if (ew.valueChanged(fobj, infix, "GenericAllergies[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "GroupAllergies[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "Temp", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pulse", false)) return false;
	if (ew.valueChanged(fobj, infix, "BP", false)) return false;
	if (ew.valueChanged(fobj, infix, "PR", false)) return false;
	if (ew.valueChanged(fobj, infix, "CNS", false)) return false;
	if (ew.valueChanged(fobj, infix, "RSA", false)) return false;
	if (ew.valueChanged(fobj, infix, "CVS", false)) return false;
	if (ew.valueChanged(fobj, infix, "PA", false)) return false;
	if (ew.valueChanged(fobj, infix, "PS", false)) return false;
	if (ew.valueChanged(fobj, infix, "PV", false)) return false;
	if (ew.valueChanged(fobj, infix, "clinicaldetails[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_vitalsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_vitalsgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_vitalsgrid.lists["x_AnticoagulantifAny"] = <?php echo $patient_vitals_grid->AnticoagulantifAny->Lookup->toClientList() ?>;
fpatient_vitalsgrid.lists["x_AnticoagulantifAny"].options = <?php echo JsonEncode($patient_vitals_grid->AnticoagulantifAny->lookupOptions()) ?>;
fpatient_vitalsgrid.autoSuggests["x_AnticoagulantifAny"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_vitalsgrid.lists["x_GenericAllergies[]"] = <?php echo $patient_vitals_grid->GenericAllergies->Lookup->toClientList() ?>;
fpatient_vitalsgrid.lists["x_GenericAllergies[]"].options = <?php echo JsonEncode($patient_vitals_grid->GenericAllergies->lookupOptions()) ?>;
fpatient_vitalsgrid.lists["x_GroupAllergies[]"] = <?php echo $patient_vitals_grid->GroupAllergies->Lookup->toClientList() ?>;
fpatient_vitalsgrid.lists["x_GroupAllergies[]"].options = <?php echo JsonEncode($patient_vitals_grid->GroupAllergies->lookupOptions()) ?>;
fpatient_vitalsgrid.lists["x_clinicaldetails[]"] = <?php echo $patient_vitals_grid->clinicaldetails->Lookup->toClientList() ?>;
fpatient_vitalsgrid.lists["x_clinicaldetails[]"].options = <?php echo JsonEncode($patient_vitals_grid->clinicaldetails->lookupOptions()) ?>;
fpatient_vitalsgrid.lists["x_status"] = <?php echo $patient_vitals_grid->status->Lookup->toClientList() ?>;
fpatient_vitalsgrid.lists["x_status"].options = <?php echo JsonEncode($patient_vitals_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_vitals_grid->renderOtherOptions();
?>
<?php $patient_vitals_grid->showPageHeader(); ?>
<?php
$patient_vitals_grid->showMessage();
?>
<?php if ($patient_vitals_grid->TotalRecs > 0 || $patient_vitals->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_vitals_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_vitals">
<?php if ($patient_vitals_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_vitals_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_vitalsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_vitals" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_vitalsgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_vitals_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_vitals_grid->renderListOptions();

// Render list options (header, left)
$patient_vitals_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_vitals->id->Visible) { // id ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_vitals->id->headerCellClass() ?>"><div id="elh_patient_vitals_id" class="patient_vitals_id"><div class="ew-table-header-caption"><?php echo $patient_vitals->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_vitals->id->headerCellClass() ?>"><div><div id="elh_patient_vitals_id" class="patient_vitals_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_vitals->mrnno->headerCellClass() ?>"><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno"><div class="ew-table-header-caption"><?php echo $patient_vitals->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_vitals->mrnno->headerCellClass() ?>"><div><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_vitals->PatientName->headerCellClass() ?>"><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName"><div class="ew-table-header-caption"><?php echo $patient_vitals->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_vitals->PatientName->headerCellClass() ?>"><div><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_vitals->PatID->headerCellClass() ?>"><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID"><div class="ew-table-header-caption"><?php echo $patient_vitals->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_vitals->PatID->headerCellClass() ?>"><div><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_vitals->MobileNumber->headerCellClass() ?>"><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_vitals->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_vitals->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->HT->Visible) { // HT ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->HT) == "") { ?>
		<th data-name="HT" class="<?php echo $patient_vitals->HT->headerCellClass() ?>"><div id="elh_patient_vitals_HT" class="patient_vitals_HT"><div class="ew-table-header-caption"><?php echo $patient_vitals->HT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HT" class="<?php echo $patient_vitals->HT->headerCellClass() ?>"><div><div id="elh_patient_vitals_HT" class="patient_vitals_HT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->HT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->HT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->HT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->WT->Visible) { // WT ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->WT) == "") { ?>
		<th data-name="WT" class="<?php echo $patient_vitals->WT->headerCellClass() ?>"><div id="elh_patient_vitals_WT" class="patient_vitals_WT"><div class="ew-table-header-caption"><?php echo $patient_vitals->WT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WT" class="<?php echo $patient_vitals->WT->headerCellClass() ?>"><div><div id="elh_patient_vitals_WT" class="patient_vitals_WT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->WT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->WT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->WT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->SurfaceArea) == "") { ?>
		<th data-name="SurfaceArea" class="<?php echo $patient_vitals->SurfaceArea->headerCellClass() ?>"><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea"><div class="ew-table-header-caption"><?php echo $patient_vitals->SurfaceArea->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurfaceArea" class="<?php echo $patient_vitals->SurfaceArea->headerCellClass() ?>"><div><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->SurfaceArea->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->SurfaceArea->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->SurfaceArea->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->BodyMassIndex) == "") { ?>
		<th data-name="BodyMassIndex" class="<?php echo $patient_vitals->BodyMassIndex->headerCellClass() ?>"><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex"><div class="ew-table-header-caption"><?php echo $patient_vitals->BodyMassIndex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BodyMassIndex" class="<?php echo $patient_vitals->BodyMassIndex->headerCellClass() ?>"><div><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->BodyMassIndex->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->BodyMassIndex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->BodyMassIndex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->AnticoagulantifAny) == "") { ?>
		<th data-name="AnticoagulantifAny" class="<?php echo $patient_vitals->AnticoagulantifAny->headerCellClass() ?>"><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny"><div class="ew-table-header-caption"><?php echo $patient_vitals->AnticoagulantifAny->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnticoagulantifAny" class="<?php echo $patient_vitals->AnticoagulantifAny->headerCellClass() ?>"><div><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->AnticoagulantifAny->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->AnticoagulantifAny->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->AnticoagulantifAny->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->FoodAllergies) == "") { ?>
		<th data-name="FoodAllergies" class="<?php echo $patient_vitals->FoodAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals->FoodAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FoodAllergies" class="<?php echo $patient_vitals->FoodAllergies->headerCellClass() ?>"><div><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->FoodAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->FoodAllergies->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->FoodAllergies->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->GenericAllergies) == "") { ?>
		<th data-name="GenericAllergies" class="<?php echo $patient_vitals->GenericAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals->GenericAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GenericAllergies" class="<?php echo $patient_vitals->GenericAllergies->headerCellClass() ?>"><div><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->GenericAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->GenericAllergies->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->GenericAllergies->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->GroupAllergies) == "") { ?>
		<th data-name="GroupAllergies" class="<?php echo $patient_vitals->GroupAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals->GroupAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupAllergies" class="<?php echo $patient_vitals->GroupAllergies->headerCellClass() ?>"><div><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->GroupAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->GroupAllergies->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->GroupAllergies->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Temp) == "") { ?>
		<th data-name="Temp" class="<?php echo $patient_vitals->Temp->headerCellClass() ?>"><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp"><div class="ew-table-header-caption"><?php echo $patient_vitals->Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Temp" class="<?php echo $patient_vitals->Temp->headerCellClass() ?>"><div><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Temp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Temp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $patient_vitals->Pulse->headerCellClass() ?>"><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse"><div class="ew-table-header-caption"><?php echo $patient_vitals->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $patient_vitals->Pulse->headerCellClass() ?>"><div><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Pulse->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Pulse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Pulse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->BP->Visible) { // BP ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $patient_vitals->BP->headerCellClass() ?>"><div id="elh_patient_vitals_BP" class="patient_vitals_BP"><div class="ew-table-header-caption"><?php echo $patient_vitals->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $patient_vitals->BP->headerCellClass() ?>"><div><div id="elh_patient_vitals_BP" class="patient_vitals_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->BP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->BP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->BP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PR->Visible) { // PR ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PR) == "") { ?>
		<th data-name="PR" class="<?php echo $patient_vitals->PR->headerCellClass() ?>"><div id="elh_patient_vitals_PR" class="patient_vitals_PR"><div class="ew-table-header-caption"><?php echo $patient_vitals->PR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR" class="<?php echo $patient_vitals->PR->headerCellClass() ?>"><div><div id="elh_patient_vitals_PR" class="patient_vitals_PR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PR->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->CNS) == "") { ?>
		<th data-name="CNS" class="<?php echo $patient_vitals->CNS->headerCellClass() ?>"><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS"><div class="ew-table-header-caption"><?php echo $patient_vitals->CNS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CNS" class="<?php echo $patient_vitals->CNS->headerCellClass() ?>"><div><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->CNS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->CNS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->CNS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->RSA) == "") { ?>
		<th data-name="RSA" class="<?php echo $patient_vitals->RSA->headerCellClass() ?>"><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA"><div class="ew-table-header-caption"><?php echo $patient_vitals->RSA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RSA" class="<?php echo $patient_vitals->RSA->headerCellClass() ?>"><div><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->RSA->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->RSA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->RSA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $patient_vitals->CVS->headerCellClass() ?>"><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS"><div class="ew-table-header-caption"><?php echo $patient_vitals->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $patient_vitals->CVS->headerCellClass() ?>"><div><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->CVS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->CVS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->CVS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PA->Visible) { // PA ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $patient_vitals->PA->headerCellClass() ?>"><div id="elh_patient_vitals_PA" class="patient_vitals_PA"><div class="ew-table-header-caption"><?php echo $patient_vitals->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $patient_vitals->PA->headerCellClass() ?>"><div><div id="elh_patient_vitals_PA" class="patient_vitals_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PA->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PS->Visible) { // PS ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PS) == "") { ?>
		<th data-name="PS" class="<?php echo $patient_vitals->PS->headerCellClass() ?>"><div id="elh_patient_vitals_PS" class="patient_vitals_PS"><div class="ew-table-header-caption"><?php echo $patient_vitals->PS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PS" class="<?php echo $patient_vitals->PS->headerCellClass() ?>"><div><div id="elh_patient_vitals_PS" class="patient_vitals_PS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PV->Visible) { // PV ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PV) == "") { ?>
		<th data-name="PV" class="<?php echo $patient_vitals->PV->headerCellClass() ?>"><div id="elh_patient_vitals_PV" class="patient_vitals_PV"><div class="ew-table-header-caption"><?php echo $patient_vitals->PV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PV" class="<?php echo $patient_vitals->PV->headerCellClass() ?>"><div><div id="elh_patient_vitals_PV" class="patient_vitals_PV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PV->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PV->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PV->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->clinicaldetails) == "") { ?>
		<th data-name="clinicaldetails" class="<?php echo $patient_vitals->clinicaldetails->headerCellClass() ?>"><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails"><div class="ew-table-header-caption"><?php echo $patient_vitals->clinicaldetails->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="clinicaldetails" class="<?php echo $patient_vitals->clinicaldetails->headerCellClass() ?>"><div><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->clinicaldetails->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->clinicaldetails->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->clinicaldetails->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->status->Visible) { // status ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_vitals->status->headerCellClass() ?>"><div id="elh_patient_vitals_status" class="patient_vitals_status"><div class="ew-table-header-caption"><?php echo $patient_vitals->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_vitals->status->headerCellClass() ?>"><div><div id="elh_patient_vitals_status" class="patient_vitals_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_vitals->createdby->headerCellClass() ?>"><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby"><div class="ew-table-header-caption"><?php echo $patient_vitals->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_vitals->createdby->headerCellClass() ?>"><div><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_vitals->createddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_vitals->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_vitals->createddatetime->headerCellClass() ?>"><div><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_vitals->modifiedby->headerCellClass() ?>"><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_vitals->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_vitals->modifiedby->headerCellClass() ?>"><div><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_vitals->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_vitals->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_vitals->modifieddatetime->headerCellClass() ?>"><div><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Age->Visible) { // Age ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_vitals->Age->headerCellClass() ?>"><div id="elh_patient_vitals_Age" class="patient_vitals_Age"><div class="ew-table-header-caption"><?php echo $patient_vitals->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_vitals->Age->headerCellClass() ?>"><div><div id="elh_patient_vitals_Age" class="patient_vitals_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_vitals->Gender->headerCellClass() ?>"><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender"><div class="ew-table-header-caption"><?php echo $patient_vitals->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_vitals->Gender->headerCellClass() ?>"><div><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_vitals->PatientId->headerCellClass() ?>"><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId"><div class="ew-table-header-caption"><?php echo $patient_vitals->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_vitals->PatientId->headerCellClass() ?>"><div><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_vitals->Reception->headerCellClass() ?>"><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception"><div class="ew-table-header-caption"><?php echo $patient_vitals->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_vitals->Reception->headerCellClass() ?>"><div><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_vitals->HospID->headerCellClass() ?>"><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID"><div class="ew-table-header-caption"><?php echo $patient_vitals->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_vitals->HospID->headerCellClass() ?>"><div><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_vitals_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_vitals_grid->StartRec = 1;
$patient_vitals_grid->StopRec = $patient_vitals_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_vitals_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_vitals_grid->FormKeyCountName) && ($patient_vitals->isGridAdd() || $patient_vitals->isGridEdit() || $patient_vitals->isConfirm())) {
		$patient_vitals_grid->KeyCount = $CurrentForm->getValue($patient_vitals_grid->FormKeyCountName);
		$patient_vitals_grid->StopRec = $patient_vitals_grid->StartRec + $patient_vitals_grid->KeyCount - 1;
	}
}
$patient_vitals_grid->RecCnt = $patient_vitals_grid->StartRec - 1;
if ($patient_vitals_grid->Recordset && !$patient_vitals_grid->Recordset->EOF) {
	$patient_vitals_grid->Recordset->moveFirst();
	$selectLimit = $patient_vitals_grid->UseSelectLimit;
	if (!$selectLimit && $patient_vitals_grid->StartRec > 1)
		$patient_vitals_grid->Recordset->move($patient_vitals_grid->StartRec - 1);
} elseif (!$patient_vitals->AllowAddDeleteRow && $patient_vitals_grid->StopRec == 0) {
	$patient_vitals_grid->StopRec = $patient_vitals->GridAddRowCount;
}

// Initialize aggregate
$patient_vitals->RowType = ROWTYPE_AGGREGATEINIT;
$patient_vitals->resetAttributes();
$patient_vitals_grid->renderRow();
if ($patient_vitals->isGridAdd())
	$patient_vitals_grid->RowIndex = 0;
if ($patient_vitals->isGridEdit())
	$patient_vitals_grid->RowIndex = 0;
while ($patient_vitals_grid->RecCnt < $patient_vitals_grid->StopRec) {
	$patient_vitals_grid->RecCnt++;
	if ($patient_vitals_grid->RecCnt >= $patient_vitals_grid->StartRec) {
		$patient_vitals_grid->RowCnt++;
		if ($patient_vitals->isGridAdd() || $patient_vitals->isGridEdit() || $patient_vitals->isConfirm()) {
			$patient_vitals_grid->RowIndex++;
			$CurrentForm->Index = $patient_vitals_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_vitals_grid->FormActionName) && $patient_vitals_grid->EventCancelled)
				$patient_vitals_grid->RowAction = strval($CurrentForm->getValue($patient_vitals_grid->FormActionName));
			elseif ($patient_vitals->isGridAdd())
				$patient_vitals_grid->RowAction = "insert";
			else
				$patient_vitals_grid->RowAction = "";
		}

		// Set up key count
		$patient_vitals_grid->KeyCount = $patient_vitals_grid->RowIndex;

		// Init row class and style
		$patient_vitals->resetAttributes();
		$patient_vitals->CssClass = "";
		if ($patient_vitals->isGridAdd()) {
			if ($patient_vitals->CurrentMode == "copy") {
				$patient_vitals_grid->loadRowValues($patient_vitals_grid->Recordset); // Load row values
				$patient_vitals_grid->setRecordKey($patient_vitals_grid->RowOldKey, $patient_vitals_grid->Recordset); // Set old record key
			} else {
				$patient_vitals_grid->loadRowValues(); // Load default values
				$patient_vitals_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_vitals_grid->loadRowValues($patient_vitals_grid->Recordset); // Load row values
		}
		$patient_vitals->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_vitals->isGridAdd()) // Grid add
			$patient_vitals->RowType = ROWTYPE_ADD; // Render add
		if ($patient_vitals->isGridAdd() && $patient_vitals->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_vitals_grid->restoreCurrentRowFormValues($patient_vitals_grid->RowIndex); // Restore form values
		if ($patient_vitals->isGridEdit()) { // Grid edit
			if ($patient_vitals->EventCancelled)
				$patient_vitals_grid->restoreCurrentRowFormValues($patient_vitals_grid->RowIndex); // Restore form values
			if ($patient_vitals_grid->RowAction == "insert")
				$patient_vitals->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_vitals->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_vitals->isGridEdit() && ($patient_vitals->RowType == ROWTYPE_EDIT || $patient_vitals->RowType == ROWTYPE_ADD) && $patient_vitals->EventCancelled) // Update failed
			$patient_vitals_grid->restoreCurrentRowFormValues($patient_vitals_grid->RowIndex); // Restore form values
		if ($patient_vitals->RowType == ROWTYPE_EDIT) // Edit row
			$patient_vitals_grid->EditRowCnt++;
		if ($patient_vitals->isConfirm()) // Confirm row
			$patient_vitals_grid->restoreCurrentRowFormValues($patient_vitals_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_vitals->RowAttrs = array_merge($patient_vitals->RowAttrs, array('data-rowindex'=>$patient_vitals_grid->RowCnt, 'id'=>'r' . $patient_vitals_grid->RowCnt . '_patient_vitals', 'data-rowtype'=>$patient_vitals->RowType));

		// Render row
		$patient_vitals_grid->renderRow();

		// Render list options
		$patient_vitals_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_vitals_grid->RowAction <> "delete" && $patient_vitals_grid->RowAction <> "insertdelete" && !($patient_vitals_grid->RowAction == "insert" && $patient_vitals->isConfirm() && $patient_vitals_grid->emptyRow())) {
?>
	<tr<?php echo $patient_vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_vitals_grid->ListOptions->render("body", "left", $patient_vitals_grid->RowCnt);
?>
	<?php if ($patient_vitals->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_vitals->id->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="o<?php echo $patient_vitals_grid->RowIndex ?>_id" id="o<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_id" class="form-group patient_vitals_id">
<span<?php echo $patient_vitals->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="x<?php echo $patient_vitals_grid->RowIndex ?>_id" id="x<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_id" class="patient_vitals_id">
<span<?php echo $patient_vitals->id->viewAttributes() ?>>
<?php echo $patient_vitals->id->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="x<?php echo $patient_vitals_grid->RowIndex ?>_id" id="x<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals->id->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="o<?php echo $patient_vitals_grid->RowIndex ?>_id" id="o<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_id" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals->id->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_id" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_vitals->mrnno->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_vitals->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<input type="text" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->mrnno->EditValue ?>"<?php echo $patient_vitals->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_mrnno" class="patient_vitals_mrnno">
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<?php echo $patient_vitals->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_vitals->PatientName->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatientName" class="form-group patient_vitals_PatientName">
<input type="text" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PatientName->EditValue ?>"<?php echo $patient_vitals->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatientName" class="form-group patient_vitals_PatientName">
<span<?php echo $patient_vitals->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatientName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatientName" class="patient_vitals_PatientName">
<span<?php echo $patient_vitals->PatientName->viewAttributes() ?>>
<?php echo $patient_vitals->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_vitals->PatID->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatID" class="form-group patient_vitals_PatID">
<input type="text" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PatID->EditValue ?>"<?php echo $patient_vitals->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatID" class="form-group patient_vitals_PatID">
<span<?php echo $patient_vitals->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals->PatID->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatID" class="patient_vitals_PatID">
<span<?php echo $patient_vitals->PatID->viewAttributes() ?>>
<?php echo $patient_vitals->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_vitals->MobileNumber->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_MobileNumber" class="form-group patient_vitals_MobileNumber">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->MobileNumber->EditValue ?>"<?php echo $patient_vitals->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_MobileNumber" class="form-group patient_vitals_MobileNumber">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->MobileNumber->EditValue ?>"<?php echo $patient_vitals->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber">
<span<?php echo $patient_vitals->MobileNumber->viewAttributes() ?>>
<?php echo $patient_vitals->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->HT->Visible) { // HT ?>
		<td data-name="HT"<?php echo $patient_vitals->HT->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_HT" class="form-group patient_vitals_HT">
<input type="text" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals->HT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->HT->EditValue ?>"<?php echo $patient_vitals->HT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals->HT->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_HT" class="form-group patient_vitals_HT">
<input type="text" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals->HT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->HT->EditValue ?>"<?php echo $patient_vitals->HT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_HT" class="patient_vitals_HT">
<span<?php echo $patient_vitals->HT->viewAttributes() ?>>
<?php echo $patient_vitals->HT->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals->HT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals->HT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals->HT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals->HT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->WT->Visible) { // WT ?>
		<td data-name="WT"<?php echo $patient_vitals->WT->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_WT" class="form-group patient_vitals_WT">
<input type="text" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals->WT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->WT->EditValue ?>"<?php echo $patient_vitals->WT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals->WT->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_WT" class="form-group patient_vitals_WT">
<input type="text" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals->WT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->WT->EditValue ?>"<?php echo $patient_vitals->WT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_WT" class="patient_vitals_WT">
<span<?php echo $patient_vitals->WT->viewAttributes() ?>>
<?php echo $patient_vitals->WT->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals->WT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals->WT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals->WT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals->WT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
		<td data-name="SurfaceArea"<?php echo $patient_vitals->SurfaceArea->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_SurfaceArea" class="form-group patient_vitals_SurfaceArea">
<input type="text" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->SurfaceArea->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->SurfaceArea->EditValue ?>"<?php echo $patient_vitals->SurfaceArea->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals->SurfaceArea->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_SurfaceArea" class="form-group patient_vitals_SurfaceArea">
<input type="text" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->SurfaceArea->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->SurfaceArea->EditValue ?>"<?php echo $patient_vitals->SurfaceArea->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals->SurfaceArea->viewAttributes() ?>>
<?php echo $patient_vitals->SurfaceArea->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals->SurfaceArea->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals->SurfaceArea->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals->SurfaceArea->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals->SurfaceArea->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<td data-name="BodyMassIndex"<?php echo $patient_vitals->BodyMassIndex->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_BodyMassIndex" class="form-group patient_vitals_BodyMassIndex">
<input type="text" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->BodyMassIndex->EditValue ?>"<?php echo $patient_vitals->BodyMassIndex->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_BodyMassIndex" class="form-group patient_vitals_BodyMassIndex">
<input type="text" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->BodyMassIndex->EditValue ?>"<?php echo $patient_vitals->BodyMassIndex->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals->BodyMassIndex->viewAttributes() ?>>
<?php echo $patient_vitals->BodyMassIndex->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<td data-name="AnticoagulantifAny"<?php echo $patient_vitals->AnticoagulantifAny->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_AnticoagulantifAny" class="form-group patient_vitals_AnticoagulantifAny">
<?php
$wrkonchange = "" . trim(@$patient_vitals->AnticoagulantifAny->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_vitals->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_vitals_grid->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo RemoveHtml($patient_vitals->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->getPlaceHolder()) ?>"<?php echo $patient_vitals->AnticoagulantifAny->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->AnticoagulantifAny->ReadOnly || $patient_vitals->AnticoagulantifAny->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_vitalsgrid.createAutoSuggest({"id":"x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny","forceSelect":true});
</script>
<?php echo $patient_vitals->AnticoagulantifAny->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_AnticoagulantifAny") ?>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_AnticoagulantifAny" class="form-group patient_vitals_AnticoagulantifAny">
<?php
$wrkonchange = "" . trim(@$patient_vitals->AnticoagulantifAny->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_vitals->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_vitals_grid->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo RemoveHtml($patient_vitals->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->getPlaceHolder()) ?>"<?php echo $patient_vitals->AnticoagulantifAny->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->AnticoagulantifAny->ReadOnly || $patient_vitals->AnticoagulantifAny->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_vitalsgrid.createAutoSuggest({"id":"x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny","forceSelect":true});
</script>
<?php echo $patient_vitals->AnticoagulantifAny->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_AnticoagulantifAny") ?>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals->AnticoagulantifAny->viewAttributes() ?>>
<?php echo $patient_vitals->AnticoagulantifAny->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
		<td data-name="FoodAllergies"<?php echo $patient_vitals->FoodAllergies->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_FoodAllergies" class="form-group patient_vitals_FoodAllergies">
<input type="text" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->FoodAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->FoodAllergies->EditValue ?>"<?php echo $patient_vitals->FoodAllergies->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals->FoodAllergies->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_FoodAllergies" class="form-group patient_vitals_FoodAllergies">
<input type="text" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->FoodAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->FoodAllergies->EditValue ?>"<?php echo $patient_vitals->FoodAllergies->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals->FoodAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->FoodAllergies->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals->FoodAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals->FoodAllergies->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals->FoodAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals->FoodAllergies->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
		<td data-name="GenericAllergies"<?php echo $patient_vitals->GenericAllergies->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_GenericAllergies" class="form-group patient_vitals_GenericAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies"><?php echo strval($patient_vitals->GenericAllergies->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_vitals->GenericAllergies->ViewValue) : $patient_vitals->GenericAllergies->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->GenericAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->GenericAllergies->ReadOnly || $patient_vitals->GenericAllergies->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]',m:1,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals->GenericAllergies->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_GenericAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo $patient_vitals->GenericAllergies->CurrentValue ?>"<?php echo $patient_vitals->GenericAllergies->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo HtmlEncode($patient_vitals->GenericAllergies->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_GenericAllergies" class="form-group patient_vitals_GenericAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies"><?php echo strval($patient_vitals->GenericAllergies->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_vitals->GenericAllergies->ViewValue) : $patient_vitals->GenericAllergies->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->GenericAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->GenericAllergies->ReadOnly || $patient_vitals->GenericAllergies->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]',m:1,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals->GenericAllergies->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_GenericAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo $patient_vitals->GenericAllergies->CurrentValue ?>"<?php echo $patient_vitals->GenericAllergies->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals->GenericAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GenericAllergies->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" value="<?php echo HtmlEncode($patient_vitals->GenericAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo HtmlEncode($patient_vitals->GenericAllergies->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" value="<?php echo HtmlEncode($patient_vitals->GenericAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo HtmlEncode($patient_vitals->GenericAllergies->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
		<td data-name="GroupAllergies"<?php echo $patient_vitals->GroupAllergies->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_GroupAllergies" class="form-group patient_vitals_GroupAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies"><?php echo strval($patient_vitals->GroupAllergies->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_vitals->GroupAllergies->ViewValue) : $patient_vitals->GroupAllergies->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->GroupAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->GroupAllergies->ReadOnly || $patient_vitals->GroupAllergies->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]',m:1,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals->GroupAllergies->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_GroupAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo $patient_vitals->GroupAllergies->CurrentValue ?>"<?php echo $patient_vitals->GroupAllergies->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo HtmlEncode($patient_vitals->GroupAllergies->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_GroupAllergies" class="form-group patient_vitals_GroupAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies"><?php echo strval($patient_vitals->GroupAllergies->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_vitals->GroupAllergies->ViewValue) : $patient_vitals->GroupAllergies->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->GroupAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->GroupAllergies->ReadOnly || $patient_vitals->GroupAllergies->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]',m:1,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals->GroupAllergies->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_GroupAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo $patient_vitals->GroupAllergies->CurrentValue ?>"<?php echo $patient_vitals->GroupAllergies->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals->GroupAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GroupAllergies->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" value="<?php echo HtmlEncode($patient_vitals->GroupAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo HtmlEncode($patient_vitals->GroupAllergies->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" value="<?php echo HtmlEncode($patient_vitals->GroupAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo HtmlEncode($patient_vitals->GroupAllergies->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
		<td data-name="Temp"<?php echo $patient_vitals->Temp->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Temp" class="form-group patient_vitals_Temp">
<input type="text" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Temp->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Temp->EditValue ?>"<?php echo $patient_vitals->Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals->Temp->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Temp" class="form-group patient_vitals_Temp">
<input type="text" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Temp->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Temp->EditValue ?>"<?php echo $patient_vitals->Temp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Temp" class="patient_vitals_Temp">
<span<?php echo $patient_vitals->Temp->viewAttributes() ?>>
<?php echo $patient_vitals->Temp->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals->Temp->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals->Temp->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals->Temp->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals->Temp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse"<?php echo $patient_vitals->Pulse->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Pulse" class="form-group patient_vitals_Pulse">
<input type="text" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Pulse->EditValue ?>"<?php echo $patient_vitals->Pulse->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals->Pulse->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Pulse" class="form-group patient_vitals_Pulse">
<input type="text" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Pulse->EditValue ?>"<?php echo $patient_vitals->Pulse->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Pulse" class="patient_vitals_Pulse">
<span<?php echo $patient_vitals->Pulse->viewAttributes() ?>>
<?php echo $patient_vitals->Pulse->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals->Pulse->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals->Pulse->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals->Pulse->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals->Pulse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->BP->Visible) { // BP ?>
		<td data-name="BP"<?php echo $patient_vitals->BP->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_BP" class="form-group patient_vitals_BP">
<input type="text" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->BP->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->BP->EditValue ?>"<?php echo $patient_vitals->BP->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals->BP->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_BP" class="form-group patient_vitals_BP">
<input type="text" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->BP->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->BP->EditValue ?>"<?php echo $patient_vitals->BP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_BP" class="patient_vitals_BP">
<span<?php echo $patient_vitals->BP->viewAttributes() ?>>
<?php echo $patient_vitals->BP->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals->BP->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals->BP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals->BP->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals->BP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PR->Visible) { // PR ?>
		<td data-name="PR"<?php echo $patient_vitals->PR->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PR" class="form-group patient_vitals_PR">
<input type="text" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PR->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PR->EditValue ?>"<?php echo $patient_vitals->PR->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals->PR->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PR" class="form-group patient_vitals_PR">
<input type="text" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PR->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PR->EditValue ?>"<?php echo $patient_vitals->PR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PR" class="patient_vitals_PR">
<span<?php echo $patient_vitals->PR->viewAttributes() ?>>
<?php echo $patient_vitals->PR->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals->PR->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals->PR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals->PR->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals->PR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
		<td data-name="CNS"<?php echo $patient_vitals->CNS->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_CNS" class="form-group patient_vitals_CNS">
<input type="text" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->CNS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->CNS->EditValue ?>"<?php echo $patient_vitals->CNS->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals->CNS->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_CNS" class="form-group patient_vitals_CNS">
<input type="text" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->CNS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->CNS->EditValue ?>"<?php echo $patient_vitals->CNS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_CNS" class="patient_vitals_CNS">
<span<?php echo $patient_vitals->CNS->viewAttributes() ?>>
<?php echo $patient_vitals->CNS->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals->CNS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals->CNS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals->CNS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals->CNS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
		<td data-name="RSA"<?php echo $patient_vitals->RSA->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_RSA" class="form-group patient_vitals_RSA">
<input type="text" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->RSA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->RSA->EditValue ?>"<?php echo $patient_vitals->RSA->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals->RSA->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_RSA" class="form-group patient_vitals_RSA">
<input type="text" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->RSA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->RSA->EditValue ?>"<?php echo $patient_vitals->RSA->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_RSA" class="patient_vitals_RSA">
<span<?php echo $patient_vitals->RSA->viewAttributes() ?>>
<?php echo $patient_vitals->RSA->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals->RSA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals->RSA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals->RSA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals->RSA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
		<td data-name="CVS"<?php echo $patient_vitals->CVS->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_CVS" class="form-group patient_vitals_CVS">
<input type="text" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->CVS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->CVS->EditValue ?>"<?php echo $patient_vitals->CVS->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals->CVS->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_CVS" class="form-group patient_vitals_CVS">
<input type="text" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->CVS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->CVS->EditValue ?>"<?php echo $patient_vitals->CVS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_CVS" class="patient_vitals_CVS">
<span<?php echo $patient_vitals->CVS->viewAttributes() ?>>
<?php echo $patient_vitals->CVS->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals->CVS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals->CVS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals->CVS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals->CVS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PA->Visible) { // PA ?>
		<td data-name="PA"<?php echo $patient_vitals->PA->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PA" class="form-group patient_vitals_PA">
<input type="text" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PA->EditValue ?>"<?php echo $patient_vitals->PA->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals->PA->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PA" class="form-group patient_vitals_PA">
<input type="text" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PA->EditValue ?>"<?php echo $patient_vitals->PA->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PA" class="patient_vitals_PA">
<span<?php echo $patient_vitals->PA->viewAttributes() ?>>
<?php echo $patient_vitals->PA->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals->PA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals->PA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals->PA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals->PA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PS->Visible) { // PS ?>
		<td data-name="PS"<?php echo $patient_vitals->PS->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PS" class="form-group patient_vitals_PS">
<input type="text" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PS->EditValue ?>"<?php echo $patient_vitals->PS->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals->PS->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PS" class="form-group patient_vitals_PS">
<input type="text" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PS->EditValue ?>"<?php echo $patient_vitals->PS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PS" class="patient_vitals_PS">
<span<?php echo $patient_vitals->PS->viewAttributes() ?>>
<?php echo $patient_vitals->PS->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals->PS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals->PS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals->PS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals->PS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PV->Visible) { // PV ?>
		<td data-name="PV"<?php echo $patient_vitals->PV->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PV" class="form-group patient_vitals_PV">
<input type="text" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PV->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PV->EditValue ?>"<?php echo $patient_vitals->PV->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals->PV->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PV" class="form-group patient_vitals_PV">
<input type="text" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PV->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PV->EditValue ?>"<?php echo $patient_vitals->PV->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PV" class="patient_vitals_PV">
<span<?php echo $patient_vitals->PV->viewAttributes() ?>>
<?php echo $patient_vitals->PV->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals->PV->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals->PV->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals->PV->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals->PV->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
		<td data-name="clinicaldetails"<?php echo $patient_vitals->clinicaldetails->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_clinicaldetails" class="form-group patient_vitals_clinicaldetails">
<div id="tp_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_vitals" data-field="x_clinicaldetails" data-value-separator="<?php echo $patient_vitals->clinicaldetails->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="{value}"<?php echo $patient_vitals->clinicaldetails->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_vitals->clinicaldetails->checkBoxListHtml(FALSE, "x{$patient_vitals_grid->RowIndex}_clinicaldetails[]") ?>
</div></div>
<?php echo $patient_vitals->clinicaldetails->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_clinicaldetails") ?>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="<?php echo HtmlEncode($patient_vitals->clinicaldetails->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_clinicaldetails" class="form-group patient_vitals_clinicaldetails">
<div id="tp_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_vitals" data-field="x_clinicaldetails" data-value-separator="<?php echo $patient_vitals->clinicaldetails->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="{value}"<?php echo $patient_vitals->clinicaldetails->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_vitals->clinicaldetails->checkBoxListHtml(FALSE, "x{$patient_vitals_grid->RowIndex}_clinicaldetails[]") ?>
</div></div>
<?php echo $patient_vitals->clinicaldetails->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_clinicaldetails") ?>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals->clinicaldetails->viewAttributes() ?>>
<?php echo $patient_vitals->clinicaldetails->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" value="<?php echo HtmlEncode($patient_vitals->clinicaldetails->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="<?php echo HtmlEncode($patient_vitals->clinicaldetails->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" value="<?php echo HtmlEncode($patient_vitals->clinicaldetails->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="<?php echo HtmlEncode($patient_vitals->clinicaldetails->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_vitals->status->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_status" class="form-group patient_vitals_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_vitals" data-field="x_status" data-value-separator="<?php echo $patient_vitals->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status"<?php echo $patient_vitals->status->editAttributes() ?>>
		<?php echo $patient_vitals->status->selectOptionListHtml("x<?php echo $patient_vitals_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_vitals->status->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="o<?php echo $patient_vitals_grid->RowIndex ?>_status" id="o<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_status" class="form-group patient_vitals_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_vitals" data-field="x_status" data-value-separator="<?php echo $patient_vitals->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status"<?php echo $patient_vitals->status->editAttributes() ?>>
		<?php echo $patient_vitals->status->selectOptionListHtml("x<?php echo $patient_vitals_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_vitals->status->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_status" class="patient_vitals_status">
<span<?php echo $patient_vitals->status->viewAttributes() ?>>
<?php echo $patient_vitals->status->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals->status->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="o<?php echo $patient_vitals_grid->RowIndex ?>_status" id="o<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_status" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals->status->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_status" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_vitals->createdby->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals->createdby->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_createdby" class="patient_vitals_createdby">
<span<?php echo $patient_vitals->createdby->viewAttributes() ?>>
<?php echo $patient_vitals->createdby->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_vitals->createddatetime->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_createddatetime" class="patient_vitals_createddatetime">
<span<?php echo $patient_vitals->createddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_vitals->modifiedby->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_modifiedby" class="patient_vitals_modifiedby">
<span<?php echo $patient_vitals->modifiedby->viewAttributes() ?>>
<?php echo $patient_vitals->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_vitals->modifieddatetime->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_vitals->Age->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Age" class="form-group patient_vitals_Age">
<input type="text" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Age->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Age->EditValue ?>"<?php echo $patient_vitals->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Age" class="form-group patient_vitals_Age">
<input type="text" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Age->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Age->EditValue ?>"<?php echo $patient_vitals->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Age" class="patient_vitals_Age">
<span<?php echo $patient_vitals->Age->viewAttributes() ?>>
<?php echo $patient_vitals->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals->Age->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals->Age->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_vitals->Gender->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Gender" class="form-group patient_vitals_Gender">
<input type="text" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Gender->EditValue ?>"<?php echo $patient_vitals->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Gender" class="form-group patient_vitals_Gender">
<input type="text" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Gender->EditValue ?>"<?php echo $patient_vitals->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Gender" class="patient_vitals_Gender">
<span<?php echo $patient_vitals->Gender->viewAttributes() ?>>
<?php echo $patient_vitals->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_vitals->PatientId->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_vitals->PatientId->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<input type="text" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PatientId->EditValue ?>"<?php echo $patient_vitals->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatientId->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_PatientId" class="patient_vitals_PatientId">
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<?php echo $patient_vitals->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_vitals->Reception->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_vitals->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<input type="text" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_vitals->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Reception->EditValue ?>"<?php echo $patient_vitals->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_Reception" class="patient_vitals_Reception">
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<?php echo $patient_vitals->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_vitals->HospID->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCnt ?>_patient_vitals_HospID" class="patient_vitals_HospID">
<span<?php echo $patient_vitals->HospID->viewAttributes() ?>>
<?php echo $patient_vitals->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_vitals_grid->ListOptions->render("body", "right", $patient_vitals_grid->RowCnt);
?>
	</tr>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD || $patient_vitals->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_vitalsgrid.updateLists(<?php echo $patient_vitals_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_vitals->isGridAdd() || $patient_vitals->CurrentMode == "copy")
		if (!$patient_vitals_grid->Recordset->EOF)
			$patient_vitals_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_vitals->CurrentMode == "add" || $patient_vitals->CurrentMode == "copy" || $patient_vitals->CurrentMode == "edit") {
		$patient_vitals_grid->RowIndex = '$rowindex$';
		$patient_vitals_grid->loadRowValues();

		// Set row properties
		$patient_vitals->resetAttributes();
		$patient_vitals->RowAttrs = array_merge($patient_vitals->RowAttrs, array('data-rowindex'=>$patient_vitals_grid->RowIndex, 'id'=>'r0_patient_vitals', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_vitals->RowAttrs["class"], "ew-template");
		$patient_vitals->RowType = ROWTYPE_ADD;

		// Render row
		$patient_vitals_grid->renderRow();

		// Render list options
		$patient_vitals_grid->renderListOptions();
		$patient_vitals_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_vitals_grid->ListOptions->render("body", "left", $patient_vitals_grid->RowIndex);
?>
	<?php if ($patient_vitals->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_id" class="form-group patient_vitals_id">
<span<?php echo $patient_vitals->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="x<?php echo $patient_vitals_grid->RowIndex ?>_id" id="x<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="o<?php echo $patient_vitals_grid->RowIndex ?>_id" id="o<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php if ($patient_vitals->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<input type="text" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->mrnno->EditValue ?>"<?php echo $patient_vitals->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PatientName" class="form-group patient_vitals_PatientName">
<input type="text" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PatientName->EditValue ?>"<?php echo $patient_vitals->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatientName" class="form-group patient_vitals_PatientName">
<span<?php echo $patient_vitals->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PatID" class="form-group patient_vitals_PatID">
<input type="text" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PatID->EditValue ?>"<?php echo $patient_vitals->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatID" class="form-group patient_vitals_PatID">
<span<?php echo $patient_vitals->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_MobileNumber" class="form-group patient_vitals_MobileNumber">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->MobileNumber->EditValue ?>"<?php echo $patient_vitals->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_MobileNumber" class="form-group patient_vitals_MobileNumber">
<span<?php echo $patient_vitals->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->MobileNumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->HT->Visible) { // HT ?>
		<td data-name="HT">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_HT" class="form-group patient_vitals_HT">
<input type="text" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals->HT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->HT->EditValue ?>"<?php echo $patient_vitals->HT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_HT" class="form-group patient_vitals_HT">
<span<?php echo $patient_vitals->HT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->HT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals->HT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals->HT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->WT->Visible) { // WT ?>
		<td data-name="WT">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_WT" class="form-group patient_vitals_WT">
<input type="text" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals->WT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->WT->EditValue ?>"<?php echo $patient_vitals->WT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_WT" class="form-group patient_vitals_WT">
<span<?php echo $patient_vitals->WT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->WT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals->WT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals->WT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
		<td data-name="SurfaceArea">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_SurfaceArea" class="form-group patient_vitals_SurfaceArea">
<input type="text" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->SurfaceArea->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->SurfaceArea->EditValue ?>"<?php echo $patient_vitals->SurfaceArea->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_SurfaceArea" class="form-group patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals->SurfaceArea->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->SurfaceArea->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals->SurfaceArea->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals->SurfaceArea->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<td data-name="BodyMassIndex">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_BodyMassIndex" class="form-group patient_vitals_BodyMassIndex">
<input type="text" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->BodyMassIndex->EditValue ?>"<?php echo $patient_vitals->BodyMassIndex->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_BodyMassIndex" class="form-group patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals->BodyMassIndex->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->BodyMassIndex->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals->BodyMassIndex->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<td data-name="AnticoagulantifAny">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_AnticoagulantifAny" class="form-group patient_vitals_AnticoagulantifAny">
<?php
$wrkonchange = "" . trim(@$patient_vitals->AnticoagulantifAny->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_vitals->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_vitals_grid->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo RemoveHtml($patient_vitals->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->getPlaceHolder()) ?>"<?php echo $patient_vitals->AnticoagulantifAny->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->AnticoagulantifAny->ReadOnly || $patient_vitals->AnticoagulantifAny->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_vitalsgrid.createAutoSuggest({"id":"x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny","forceSelect":true});
</script>
<?php echo $patient_vitals->AnticoagulantifAny->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_AnticoagulantifAny") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_AnticoagulantifAny" class="form-group patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals->AnticoagulantifAny->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->AnticoagulantifAny->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals->AnticoagulantifAny->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
		<td data-name="FoodAllergies">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_FoodAllergies" class="form-group patient_vitals_FoodAllergies">
<input type="text" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->FoodAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->FoodAllergies->EditValue ?>"<?php echo $patient_vitals->FoodAllergies->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_FoodAllergies" class="form-group patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals->FoodAllergies->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->FoodAllergies->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals->FoodAllergies->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals->FoodAllergies->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
		<td data-name="GenericAllergies">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_GenericAllergies" class="form-group patient_vitals_GenericAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies"><?php echo strval($patient_vitals->GenericAllergies->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_vitals->GenericAllergies->ViewValue) : $patient_vitals->GenericAllergies->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->GenericAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->GenericAllergies->ReadOnly || $patient_vitals->GenericAllergies->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]',m:1,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals->GenericAllergies->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_GenericAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo $patient_vitals->GenericAllergies->CurrentValue ?>"<?php echo $patient_vitals->GenericAllergies->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_GenericAllergies" class="form-group patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals->GenericAllergies->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->GenericAllergies->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" value="<?php echo HtmlEncode($patient_vitals->GenericAllergies->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo HtmlEncode($patient_vitals->GenericAllergies->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
		<td data-name="GroupAllergies">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_GroupAllergies" class="form-group patient_vitals_GroupAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies"><?php echo strval($patient_vitals->GroupAllergies->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_vitals->GroupAllergies->ViewValue) : $patient_vitals->GroupAllergies->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals->GroupAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_vitals->GroupAllergies->ReadOnly || $patient_vitals->GroupAllergies->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]',m:1,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals->GroupAllergies->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_GroupAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo $patient_vitals->GroupAllergies->CurrentValue ?>"<?php echo $patient_vitals->GroupAllergies->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_GroupAllergies" class="form-group patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals->GroupAllergies->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->GroupAllergies->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" value="<?php echo HtmlEncode($patient_vitals->GroupAllergies->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo HtmlEncode($patient_vitals->GroupAllergies->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
		<td data-name="Temp">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Temp" class="form-group patient_vitals_Temp">
<input type="text" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Temp->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Temp->EditValue ?>"<?php echo $patient_vitals->Temp->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Temp" class="form-group patient_vitals_Temp">
<span<?php echo $patient_vitals->Temp->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->Temp->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals->Temp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals->Temp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Pulse" class="form-group patient_vitals_Pulse">
<input type="text" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Pulse->EditValue ?>"<?php echo $patient_vitals->Pulse->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Pulse" class="form-group patient_vitals_Pulse">
<span<?php echo $patient_vitals->Pulse->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->Pulse->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals->Pulse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals->Pulse->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->BP->Visible) { // BP ?>
		<td data-name="BP">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_BP" class="form-group patient_vitals_BP">
<input type="text" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->BP->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->BP->EditValue ?>"<?php echo $patient_vitals->BP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_BP" class="form-group patient_vitals_BP">
<span<?php echo $patient_vitals->BP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->BP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals->BP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals->BP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->PR->Visible) { // PR ?>
		<td data-name="PR">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PR" class="form-group patient_vitals_PR">
<input type="text" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PR->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PR->EditValue ?>"<?php echo $patient_vitals->PR->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PR" class="form-group patient_vitals_PR">
<span<?php echo $patient_vitals->PR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PR->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals->PR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals->PR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
		<td data-name="CNS">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_CNS" class="form-group patient_vitals_CNS">
<input type="text" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->CNS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->CNS->EditValue ?>"<?php echo $patient_vitals->CNS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_CNS" class="form-group patient_vitals_CNS">
<span<?php echo $patient_vitals->CNS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->CNS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals->CNS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals->CNS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
		<td data-name="RSA">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_RSA" class="form-group patient_vitals_RSA">
<input type="text" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->RSA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->RSA->EditValue ?>"<?php echo $patient_vitals->RSA->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_RSA" class="form-group patient_vitals_RSA">
<span<?php echo $patient_vitals->RSA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->RSA->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals->RSA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals->RSA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
		<td data-name="CVS">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_CVS" class="form-group patient_vitals_CVS">
<input type="text" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->CVS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->CVS->EditValue ?>"<?php echo $patient_vitals->CVS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_CVS" class="form-group patient_vitals_CVS">
<span<?php echo $patient_vitals->CVS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->CVS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals->CVS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals->CVS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->PA->Visible) { // PA ?>
		<td data-name="PA">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PA" class="form-group patient_vitals_PA">
<input type="text" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PA->EditValue ?>"<?php echo $patient_vitals->PA->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PA" class="form-group patient_vitals_PA">
<span<?php echo $patient_vitals->PA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PA->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals->PA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals->PA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->PS->Visible) { // PS ?>
		<td data-name="PS">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PS" class="form-group patient_vitals_PS">
<input type="text" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PS->EditValue ?>"<?php echo $patient_vitals->PS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PS" class="form-group patient_vitals_PS">
<span<?php echo $patient_vitals->PS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals->PS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals->PS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->PV->Visible) { // PV ?>
		<td data-name="PV">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PV" class="form-group patient_vitals_PV">
<input type="text" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PV->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PV->EditValue ?>"<?php echo $patient_vitals->PV->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PV" class="form-group patient_vitals_PV">
<span<?php echo $patient_vitals->PV->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PV->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals->PV->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals->PV->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
		<td data-name="clinicaldetails">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_clinicaldetails" class="form-group patient_vitals_clinicaldetails">
<div id="tp_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_vitals" data-field="x_clinicaldetails" data-value-separator="<?php echo $patient_vitals->clinicaldetails->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="{value}"<?php echo $patient_vitals->clinicaldetails->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_vitals->clinicaldetails->checkBoxListHtml(FALSE, "x{$patient_vitals_grid->RowIndex}_clinicaldetails[]") ?>
</div></div>
<?php echo $patient_vitals->clinicaldetails->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_clinicaldetails") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_clinicaldetails" class="form-group patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals->clinicaldetails->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->clinicaldetails->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" value="<?php echo HtmlEncode($patient_vitals->clinicaldetails->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="<?php echo HtmlEncode($patient_vitals->clinicaldetails->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_status" class="form-group patient_vitals_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_vitals" data-field="x_status" data-value-separator="<?php echo $patient_vitals->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status"<?php echo $patient_vitals->status->editAttributes() ?>>
		<?php echo $patient_vitals->status->selectOptionListHtml("x<?php echo $patient_vitals_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_vitals->status->Lookup->getParamTag("p_x" . $patient_vitals_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_status" class="form-group patient_vitals_status">
<span<?php echo $patient_vitals->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="o<?php echo $patient_vitals_grid->RowIndex ?>_status" id="o<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_createdby" class="form-group patient_vitals_createdby">
<span<?php echo $patient_vitals->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_createddatetime" class="form-group patient_vitals_createddatetime">
<span<?php echo $patient_vitals->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_modifiedby" class="form-group patient_vitals_modifiedby">
<span<?php echo $patient_vitals->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_modifieddatetime" class="form-group patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Age" class="form-group patient_vitals_Age">
<input type="text" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Age->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Age->EditValue ?>"<?php echo $patient_vitals->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Age" class="form-group patient_vitals_Age">
<span<?php echo $patient_vitals->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Gender" class="form-group patient_vitals_Gender">
<input type="text" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Gender->EditValue ?>"<?php echo $patient_vitals->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Gender" class="form-group patient_vitals_Gender">
<span<?php echo $patient_vitals->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php if ($patient_vitals->PatientId->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<input type="text" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PatientId->EditValue ?>"<?php echo $patient_vitals->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php if ($patient_vitals->Reception->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<input type="text" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_vitals->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->Reception->EditValue ?>"<?php echo $patient_vitals->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_HospID" class="form-group patient_vitals_HospID">
<span<?php echo $patient_vitals->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_vitals->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_vitals_grid->ListOptions->render("body", "right", $patient_vitals_grid->RowIndex);
?>
<script>
fpatient_vitalsgrid.updateLists(<?php echo $patient_vitals_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_vitals->CurrentMode == "add" || $patient_vitals->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_vitals_grid->FormKeyCountName ?>" id="<?php echo $patient_vitals_grid->FormKeyCountName ?>" value="<?php echo $patient_vitals_grid->KeyCount ?>">
<?php echo $patient_vitals_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_vitals->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_vitals_grid->FormKeyCountName ?>" id="<?php echo $patient_vitals_grid->FormKeyCountName ?>" value="<?php echo $patient_vitals_grid->KeyCount ?>">
<?php echo $patient_vitals_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_vitals->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_vitalsgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_vitals_grid->Recordset)
	$patient_vitals_grid->Recordset->Close();
?>
</div>
<?php if ($patient_vitals_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_vitals_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_vitals_grid->TotalRecs == 0 && !$patient_vitals->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_vitals_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_vitals_grid->terminate();
?>
<?php if (!$patient_vitals->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_vitals", "95%", "");
</script>
<?php } ?>
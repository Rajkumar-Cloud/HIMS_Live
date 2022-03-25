<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_prescription_grid))
	$patient_prescription_grid = new patient_prescription_grid();

// Run the page
$patient_prescription_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_prescription_grid->Page_Render();
?>
<?php if (!$patient_prescription->isExport()) { ?>
<script>

// Form object
var fpatient_prescriptiongrid = new ew.Form("fpatient_prescriptiongrid", "grid");
fpatient_prescriptiongrid.formKeyCountName = '<?php echo $patient_prescription_grid->FormKeyCountName ?>';

// Validate form
fpatient_prescriptiongrid.validate = function() {
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
		<?php if ($patient_prescription_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->id->caption(), $patient_prescription->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Reception->caption(), $patient_prescription->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PatientId->caption(), $patient_prescription->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PatientName->caption(), $patient_prescription->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->Medicine->Required) { ?>
			elm = this.getElements("x" + infix + "_Medicine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Medicine->caption(), $patient_prescription->Medicine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->M->Required) { ?>
			elm = this.getElements("x" + infix + "_M");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->M->caption(), $patient_prescription->M->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->A->Required) { ?>
			elm = this.getElements("x" + infix + "_A");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->A->caption(), $patient_prescription->A->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->N->Required) { ?>
			elm = this.getElements("x" + infix + "_N");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->N->caption(), $patient_prescription->N->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->NoOfDays->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfDays");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->NoOfDays->caption(), $patient_prescription->NoOfDays->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->PreRoute->Required) { ?>
			elm = this.getElements("x" + infix + "_PreRoute");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PreRoute->caption(), $patient_prescription->PreRoute->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->TimeOfTaking->Required) { ?>
			elm = this.getElements("x" + infix + "_TimeOfTaking");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->TimeOfTaking->caption(), $patient_prescription->TimeOfTaking->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Type->caption(), $patient_prescription->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->mrnno->caption(), $patient_prescription->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Age->caption(), $patient_prescription->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Gender->caption(), $patient_prescription->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->profilePic->caption(), $patient_prescription->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Status->caption(), $patient_prescription->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->CreatedBy->caption(), $patient_prescription->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->CreateDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreateDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->CreateDateTime->caption(), $patient_prescription->CreateDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->ModifiedBy->caption(), $patient_prescription->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_grid->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->ModifiedDateTime->caption(), $patient_prescription->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_prescriptiongrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Medicine", false)) return false;
	if (ew.valueChanged(fobj, infix, "M", false)) return false;
	if (ew.valueChanged(fobj, infix, "A", false)) return false;
	if (ew.valueChanged(fobj, infix, "N", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoOfDays", false)) return false;
	if (ew.valueChanged(fobj, infix, "PreRoute", false)) return false;
	if (ew.valueChanged(fobj, infix, "TimeOfTaking", false)) return false;
	if (ew.valueChanged(fobj, infix, "Type", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "profilePic", false)) return false;
	if (ew.valueChanged(fobj, infix, "Status", false)) return false;
	if (ew.valueChanged(fobj, infix, "CreatedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "CreateDateTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModifiedBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModifiedDateTime", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_prescriptiongrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_prescriptiongrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_prescriptiongrid.lists["x_Medicine"] = <?php echo $patient_prescription_grid->Medicine->Lookup->toClientList() ?>;
fpatient_prescriptiongrid.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_grid->Medicine->lookupOptions()) ?>;
fpatient_prescriptiongrid.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptiongrid.lists["x_PreRoute"] = <?php echo $patient_prescription_grid->PreRoute->Lookup->toClientList() ?>;
fpatient_prescriptiongrid.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_grid->PreRoute->lookupOptions()) ?>;
fpatient_prescriptiongrid.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptiongrid.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_grid->TimeOfTaking->Lookup->toClientList() ?>;
fpatient_prescriptiongrid.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_grid->TimeOfTaking->lookupOptions()) ?>;
fpatient_prescriptiongrid.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptiongrid.lists["x_Type"] = <?php echo $patient_prescription_grid->Type->Lookup->toClientList() ?>;
fpatient_prescriptiongrid.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_grid->Type->options(FALSE, TRUE)) ?>;
fpatient_prescriptiongrid.lists["x_Status"] = <?php echo $patient_prescription_grid->Status->Lookup->toClientList() ?>;
fpatient_prescriptiongrid.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_grid->Status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_prescription_grid->renderOtherOptions();
?>
<?php $patient_prescription_grid->showPageHeader(); ?>
<?php
$patient_prescription_grid->showMessage();
?>
<?php if ($patient_prescription_grid->TotalRecs > 0 || $patient_prescription->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_prescription_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_prescription">
<?php if ($patient_prescription_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_prescription_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_prescriptiongrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_prescription" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_prescriptiongrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_prescription_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_prescription_grid->renderListOptions();

// Render list options (header, left)
$patient_prescription_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_prescription->id->Visible) { // id ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_prescription->id->headerCellClass() ?>"><div id="elh_patient_prescription_id" class="patient_prescription_id"><div class="ew-table-header-caption"><?php echo $patient_prescription->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_prescription->id->headerCellClass() ?>"><div><div id="elh_patient_prescription_id" class="patient_prescription_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_prescription->Reception->headerCellClass() ?>"><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception"><div class="ew-table-header-caption"><?php echo $patient_prescription->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_prescription->Reception->headerCellClass() ?>"><div><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_prescription->PatientId->headerCellClass() ?>"><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId"><div class="ew-table-header-caption"><?php echo $patient_prescription->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_prescription->PatientId->headerCellClass() ?>"><div><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_prescription->PatientName->headerCellClass() ?>"><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName"><div class="ew-table-header-caption"><?php echo $patient_prescription->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_prescription->PatientName->headerCellClass() ?>"><div><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Medicine) == "") { ?>
		<th data-name="Medicine" class="<?php echo $patient_prescription->Medicine->headerCellClass() ?>" style="width: 20px;"><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine"><div class="ew-table-header-caption"><?php echo $patient_prescription->Medicine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medicine" class="<?php echo $patient_prescription->Medicine->headerCellClass() ?>" style="width: 20px;"><div><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Medicine->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Medicine->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Medicine->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->M) == "") { ?>
		<th data-name="M" class="<?php echo $patient_prescription->M->headerCellClass() ?>"><div id="elh_patient_prescription_M" class="patient_prescription_M"><div class="ew-table-header-caption"><?php echo $patient_prescription->M->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M" class="<?php echo $patient_prescription->M->headerCellClass() ?>"><div><div id="elh_patient_prescription_M" class="patient_prescription_M">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->M->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->M->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->M->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->A) == "") { ?>
		<th data-name="A" class="<?php echo $patient_prescription->A->headerCellClass() ?>"><div id="elh_patient_prescription_A" class="patient_prescription_A"><div class="ew-table-header-caption"><?php echo $patient_prescription->A->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A" class="<?php echo $patient_prescription->A->headerCellClass() ?>"><div><div id="elh_patient_prescription_A" class="patient_prescription_A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->A->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->A->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->A->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->N) == "") { ?>
		<th data-name="N" class="<?php echo $patient_prescription->N->headerCellClass() ?>"><div id="elh_patient_prescription_N" class="patient_prescription_N"><div class="ew-table-header-caption"><?php echo $patient_prescription->N->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="N" class="<?php echo $patient_prescription->N->headerCellClass() ?>"><div><div id="elh_patient_prescription_N" class="patient_prescription_N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->N->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->N->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->N->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->NoOfDays) == "") { ?>
		<th data-name="NoOfDays" class="<?php echo $patient_prescription->NoOfDays->headerCellClass() ?>"><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays"><div class="ew-table-header-caption"><?php echo $patient_prescription->NoOfDays->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfDays" class="<?php echo $patient_prescription->NoOfDays->headerCellClass() ?>"><div><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->NoOfDays->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->NoOfDays->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->NoOfDays->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->PreRoute) == "") { ?>
		<th data-name="PreRoute" class="<?php echo $patient_prescription->PreRoute->headerCellClass() ?>"><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute"><div class="ew-table-header-caption"><?php echo $patient_prescription->PreRoute->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreRoute" class="<?php echo $patient_prescription->PreRoute->headerCellClass() ?>"><div><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->PreRoute->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->PreRoute->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->PreRoute->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->TimeOfTaking) == "") { ?>
		<th data-name="TimeOfTaking" class="<?php echo $patient_prescription->TimeOfTaking->headerCellClass() ?>"><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking"><div class="ew-table-header-caption"><?php echo $patient_prescription->TimeOfTaking->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeOfTaking" class="<?php echo $patient_prescription->TimeOfTaking->headerCellClass() ?>"><div><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->TimeOfTaking->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->TimeOfTaking->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->TimeOfTaking->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $patient_prescription->Type->headerCellClass() ?>" style="width: 12px;"><div id="elh_patient_prescription_Type" class="patient_prescription_Type"><div class="ew-table-header-caption"><?php echo $patient_prescription->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $patient_prescription->Type->headerCellClass() ?>" style="width: 12px;"><div><div id="elh_patient_prescription_Type" class="patient_prescription_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_prescription->mrnno->headerCellClass() ?>"><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno"><div class="ew-table-header-caption"><?php echo $patient_prescription->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_prescription->mrnno->headerCellClass() ?>"><div><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_prescription->Age->headerCellClass() ?>"><div id="elh_patient_prescription_Age" class="patient_prescription_Age"><div class="ew-table-header-caption"><?php echo $patient_prescription->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_prescription->Age->headerCellClass() ?>"><div><div id="elh_patient_prescription_Age" class="patient_prescription_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_prescription->Gender->headerCellClass() ?>"><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender"><div class="ew-table-header-caption"><?php echo $patient_prescription->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_prescription->Gender->headerCellClass() ?>"><div><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $patient_prescription->profilePic->headerCellClass() ?>"><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic"><div class="ew-table-header-caption"><?php echo $patient_prescription->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $patient_prescription->profilePic->headerCellClass() ?>"><div><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->profilePic->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $patient_prescription->Status->headerCellClass() ?>"><div id="elh_patient_prescription_Status" class="patient_prescription_Status"><div class="ew-table-header-caption"><?php echo $patient_prescription->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $patient_prescription->Status->headerCellClass() ?>"><div><div id="elh_patient_prescription_Status" class="patient_prescription_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_prescription->CreatedBy->headerCellClass() ?>"><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy"><div class="ew-table-header-caption"><?php echo $patient_prescription->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_prescription->CreatedBy->headerCellClass() ?>"><div><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->CreateDateTime) == "") { ?>
		<th data-name="CreateDateTime" class="<?php echo $patient_prescription->CreateDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime"><div class="ew-table-header-caption"><?php echo $patient_prescription->CreateDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreateDateTime" class="<?php echo $patient_prescription->CreateDateTime->headerCellClass() ?>"><div><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->CreateDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->CreateDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->CreateDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_prescription->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy"><div class="ew-table-header-caption"><?php echo $patient_prescription->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_prescription->ModifiedBy->headerCellClass() ?>"><div><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($patient_prescription->sortUrl($patient_prescription->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $patient_prescription->ModifiedDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime"><div class="ew-table-header-caption"><?php echo $patient_prescription->ModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $patient_prescription->ModifiedDateTime->headerCellClass() ?>"><div><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription->ModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_prescription->ModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_prescription_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_prescription_grid->StartRec = 1;
$patient_prescription_grid->StopRec = $patient_prescription_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_prescription_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_prescription_grid->FormKeyCountName) && ($patient_prescription->isGridAdd() || $patient_prescription->isGridEdit() || $patient_prescription->isConfirm())) {
		$patient_prescription_grid->KeyCount = $CurrentForm->getValue($patient_prescription_grid->FormKeyCountName);
		$patient_prescription_grid->StopRec = $patient_prescription_grid->StartRec + $patient_prescription_grid->KeyCount - 1;
	}
}
$patient_prescription_grid->RecCnt = $patient_prescription_grid->StartRec - 1;
if ($patient_prescription_grid->Recordset && !$patient_prescription_grid->Recordset->EOF) {
	$patient_prescription_grid->Recordset->moveFirst();
	$selectLimit = $patient_prescription_grid->UseSelectLimit;
	if (!$selectLimit && $patient_prescription_grid->StartRec > 1)
		$patient_prescription_grid->Recordset->move($patient_prescription_grid->StartRec - 1);
} elseif (!$patient_prescription->AllowAddDeleteRow && $patient_prescription_grid->StopRec == 0) {
	$patient_prescription_grid->StopRec = $patient_prescription->GridAddRowCount;
}

// Initialize aggregate
$patient_prescription->RowType = ROWTYPE_AGGREGATEINIT;
$patient_prescription->resetAttributes();
$patient_prescription_grid->renderRow();
if ($patient_prescription->isGridAdd())
	$patient_prescription_grid->RowIndex = 0;
if ($patient_prescription->isGridEdit())
	$patient_prescription_grid->RowIndex = 0;
while ($patient_prescription_grid->RecCnt < $patient_prescription_grid->StopRec) {
	$patient_prescription_grid->RecCnt++;
	if ($patient_prescription_grid->RecCnt >= $patient_prescription_grid->StartRec) {
		$patient_prescription_grid->RowCnt++;
		if ($patient_prescription->isGridAdd() || $patient_prescription->isGridEdit() || $patient_prescription->isConfirm()) {
			$patient_prescription_grid->RowIndex++;
			$CurrentForm->Index = $patient_prescription_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_prescription_grid->FormActionName) && $patient_prescription_grid->EventCancelled)
				$patient_prescription_grid->RowAction = strval($CurrentForm->getValue($patient_prescription_grid->FormActionName));
			elseif ($patient_prescription->isGridAdd())
				$patient_prescription_grid->RowAction = "insert";
			else
				$patient_prescription_grid->RowAction = "";
		}

		// Set up key count
		$patient_prescription_grid->KeyCount = $patient_prescription_grid->RowIndex;

		// Init row class and style
		$patient_prescription->resetAttributes();
		$patient_prescription->CssClass = "";
		if ($patient_prescription->isGridAdd()) {
			if ($patient_prescription->CurrentMode == "copy") {
				$patient_prescription_grid->loadRowValues($patient_prescription_grid->Recordset); // Load row values
				$patient_prescription_grid->setRecordKey($patient_prescription_grid->RowOldKey, $patient_prescription_grid->Recordset); // Set old record key
			} else {
				$patient_prescription_grid->loadRowValues(); // Load default values
				$patient_prescription_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_prescription_grid->loadRowValues($patient_prescription_grid->Recordset); // Load row values
		}
		$patient_prescription->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_prescription->isGridAdd()) // Grid add
			$patient_prescription->RowType = ROWTYPE_ADD; // Render add
		if ($patient_prescription->isGridAdd() && $patient_prescription->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_prescription_grid->restoreCurrentRowFormValues($patient_prescription_grid->RowIndex); // Restore form values
		if ($patient_prescription->isGridEdit()) { // Grid edit
			if ($patient_prescription->EventCancelled)
				$patient_prescription_grid->restoreCurrentRowFormValues($patient_prescription_grid->RowIndex); // Restore form values
			if ($patient_prescription_grid->RowAction == "insert")
				$patient_prescription->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_prescription->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_prescription->isGridEdit() && ($patient_prescription->RowType == ROWTYPE_EDIT || $patient_prescription->RowType == ROWTYPE_ADD) && $patient_prescription->EventCancelled) // Update failed
			$patient_prescription_grid->restoreCurrentRowFormValues($patient_prescription_grid->RowIndex); // Restore form values
		if ($patient_prescription->RowType == ROWTYPE_EDIT) // Edit row
			$patient_prescription_grid->EditRowCnt++;
		if ($patient_prescription->isConfirm()) // Confirm row
			$patient_prescription_grid->restoreCurrentRowFormValues($patient_prescription_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_prescription->RowAttrs = array_merge($patient_prescription->RowAttrs, array('data-rowindex'=>$patient_prescription_grid->RowCnt, 'id'=>'r' . $patient_prescription_grid->RowCnt . '_patient_prescription', 'data-rowtype'=>$patient_prescription->RowType));

		// Render row
		$patient_prescription_grid->renderRow();

		// Render list options
		$patient_prescription_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_prescription_grid->RowAction <> "delete" && $patient_prescription_grid->RowAction <> "insertdelete" && !($patient_prescription_grid->RowAction == "insert" && $patient_prescription->isConfirm() && $patient_prescription_grid->emptyRow())) {
?>
	<tr<?php echo $patient_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_grid->ListOptions->render("body", "left", $patient_prescription_grid->RowCnt);
?>
	<?php if ($patient_prescription->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_prescription->id->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_grid->RowIndex ?>_id" id="o<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_id" class="form-group patient_prescription_id">
<span<?php echo $patient_prescription->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x<?php echo $patient_prescription_grid->RowIndex ?>_id" id="x<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_id" class="patient_prescription_id">
<span<?php echo $patient_prescription->id->viewAttributes() ?>>
<?php echo $patient_prescription->id->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x<?php echo $patient_prescription_grid->RowIndex ?>_id" id="x<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_grid->RowIndex ?>_id" id="o<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_id" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_id" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_prescription->Reception->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Reception->EditValue ?>"<?php echo $patient_prescription->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Reception" class="patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<?php echo $patient_prescription->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_prescription->PatientId->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription->PatientId->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientId->EditValue ?>"<?php echo $patient_prescription->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientId->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PatientId" class="patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<?php echo $patient_prescription->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_prescription->PatientName->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientName->EditValue ?>"<?php echo $patient_prescription->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientName->EditValue ?>"<?php echo $patient_prescription->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PatientName" class="patient_prescription_PatientName">
<span<?php echo $patient_prescription->PatientName->viewAttributes() ?>>
<?php echo $patient_prescription->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine"<?php echo $patient_prescription->Medicine->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$patient_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_grid->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_prescription->Medicine->ReadOnly || $patient_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine","forceSelect":false});
</script>
<?php echo $patient_prescription->Medicine->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_Medicine") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$patient_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_grid->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_prescription->Medicine->ReadOnly || $patient_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine","forceSelect":false});
</script>
<?php echo $patient_prescription->Medicine->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_Medicine") ?>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Medicine" class="patient_prescription_Medicine">
<span<?php echo $patient_prescription->Medicine->viewAttributes() ?>>
<?php echo $patient_prescription->Medicine->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->M->Visible) { // M ?>
		<td data-name="M"<?php echo $patient_prescription->M->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_M" class="form-group patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->M->EditValue ?>"<?php echo $patient_prescription->M->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_grid->RowIndex ?>_M" id="o<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription->M->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_M" class="form-group patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->M->EditValue ?>"<?php echo $patient_prescription->M->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_M" class="patient_prescription_M">
<span<?php echo $patient_prescription->M->viewAttributes() ?>>
<?php echo $patient_prescription->M->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription->M->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_grid->RowIndex ?>_M" id="o<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription->M->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription->M->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_M" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription->M->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->A->Visible) { // A ?>
		<td data-name="A"<?php echo $patient_prescription->A->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_A" class="form-group patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->A->EditValue ?>"<?php echo $patient_prescription->A->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_grid->RowIndex ?>_A" id="o<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription->A->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_A" class="form-group patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->A->EditValue ?>"<?php echo $patient_prescription->A->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_A" class="patient_prescription_A">
<span<?php echo $patient_prescription->A->viewAttributes() ?>>
<?php echo $patient_prescription->A->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription->A->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_grid->RowIndex ?>_A" id="o<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription->A->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription->A->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_A" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription->A->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->N->Visible) { // N ?>
		<td data-name="N"<?php echo $patient_prescription->N->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_N" class="form-group patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->N->EditValue ?>"<?php echo $patient_prescription->N->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_grid->RowIndex ?>_N" id="o<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription->N->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_N" class="form-group patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->N->EditValue ?>"<?php echo $patient_prescription->N->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_N" class="patient_prescription_N">
<span<?php echo $patient_prescription->N->viewAttributes() ?>>
<?php echo $patient_prescription->N->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription->N->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_grid->RowIndex ?>_N" id="o<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription->N->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription->N->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_N" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription->N->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays"<?php echo $patient_prescription->NoOfDays->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->NoOfDays->EditValue ?>"<?php echo $patient_prescription->NoOfDays->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription->NoOfDays->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->NoOfDays->EditValue ?>"<?php echo $patient_prescription->NoOfDays->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays">
<span<?php echo $patient_prescription->NoOfDays->viewAttributes() ?>>
<?php echo $patient_prescription->NoOfDays->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription->NoOfDays->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription->NoOfDays->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription->NoOfDays->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription->NoOfDays->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute"<?php echo $patient_prescription->PreRoute->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$patient_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription->PreRoute->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription->PreRoute->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
</script>
<?php echo $patient_prescription->PreRoute->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_PreRoute") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$patient_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription->PreRoute->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription->PreRoute->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
</script>
<?php echo $patient_prescription->PreRoute->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_PreRoute") ?>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_PreRoute" class="patient_prescription_PreRoute">
<span<?php echo $patient_prescription->PreRoute->viewAttributes() ?>>
<?php echo $patient_prescription->PreRoute->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking"<?php echo $patient_prescription->TimeOfTaking->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$patient_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
</script>
<?php echo $patient_prescription->TimeOfTaking->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_TimeOfTaking") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$patient_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
</script>
<?php echo $patient_prescription->TimeOfTaking->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_TimeOfTaking") ?>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription->TimeOfTaking->viewAttributes() ?>>
<?php echo $patient_prescription->TimeOfTaking->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $patient_prescription->Type->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Type" class="form-group patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type"<?php echo $patient_prescription->Type->editAttributes() ?>>
		<?php echo $patient_prescription->Type->selectOptionListHtml("x<?php echo $patient_prescription_grid->RowIndex ?>_Type") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription->Type->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Type" class="form-group patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type"<?php echo $patient_prescription->Type->editAttributes() ?>>
		<?php echo $patient_prescription->Type->selectOptionListHtml("x<?php echo $patient_prescription_grid->RowIndex ?>_Type") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Type" class="patient_prescription_Type">
<span<?php echo $patient_prescription->Type->viewAttributes() ?>>
<?php echo $patient_prescription->Type->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription->Type->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription->Type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription->Type->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription->Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_prescription->mrnno->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->mrnno->EditValue ?>"<?php echo $patient_prescription->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_mrnno" class="patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<?php echo $patient_prescription->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_prescription->Age->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Age->EditValue ?>"<?php echo $patient_prescription->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Age->EditValue ?>"<?php echo $patient_prescription->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Age" class="patient_prescription_Age">
<span<?php echo $patient_prescription->Age->viewAttributes() ?>>
<?php echo $patient_prescription->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription->Age->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription->Age->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_prescription->Gender->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Gender->EditValue ?>"<?php echo $patient_prescription->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Gender->EditValue ?>"<?php echo $patient_prescription->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Gender" class="patient_prescription_Gender">
<span<?php echo $patient_prescription->Gender->viewAttributes() ?>>
<?php echo $patient_prescription->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $patient_prescription->profilePic->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription->profilePic->editAttributes() ?>><?php echo $patient_prescription->profilePic->EditValue ?></textarea>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription->profilePic->editAttributes() ?>><?php echo $patient_prescription->profilePic->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_profilePic" class="patient_prescription_profilePic">
<span<?php echo $patient_prescription->profilePic->viewAttributes() ?>>
<?php echo $patient_prescription->profilePic->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription->profilePic->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription->profilePic->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription->profilePic->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription->profilePic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $patient_prescription->Status->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Status" class="form-group patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status"<?php echo $patient_prescription->Status->editAttributes() ?>>
		<?php echo $patient_prescription->Status->selectOptionListHtml("x<?php echo $patient_prescription_grid->RowIndex ?>_Status") ?>
	</select>
</div>
<?php echo $patient_prescription->Status->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_Status") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription->Status->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Status" class="form-group patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status"<?php echo $patient_prescription->Status->editAttributes() ?>>
		<?php echo $patient_prescription->Status->selectOptionListHtml("x<?php echo $patient_prescription_grid->RowIndex ?>_Status") ?>
	</select>
</div>
<?php echo $patient_prescription->Status->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_Status") ?>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_Status" class="patient_prescription_Status">
<span<?php echo $patient_prescription->Status->viewAttributes() ?>>
<?php echo $patient_prescription->Status->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription->Status->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription->Status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription->Status->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription->Status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $patient_prescription->CreatedBy->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreatedBy->EditValue ?>"<?php echo $patient_prescription->CreatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreatedBy->EditValue ?>"<?php echo $patient_prescription->CreatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy">
<span<?php echo $patient_prescription->CreatedBy->viewAttributes() ?>>
<?php echo $patient_prescription->CreatedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription->CreatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime"<?php echo $patient_prescription->CreateDateTime->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreateDateTime->EditValue ?>"<?php echo $patient_prescription->CreateDateTime->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreateDateTime->EditValue ?>"<?php echo $patient_prescription->CreateDateTime->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription->CreateDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->CreateDateTime->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription->CreateDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription->CreateDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription->CreateDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $patient_prescription->ModifiedBy->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedBy->EditValue ?>"<?php echo $patient_prescription->ModifiedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedBy->EditValue ?>"<?php echo $patient_prescription->ModifiedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription->ModifiedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime"<?php echo $patient_prescription->ModifiedDateTime->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription->ModifiedDateTime->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription->ModifiedDateTime->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCnt ?>_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription->ModifiedDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedDateTime->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_grid->ListOptions->render("body", "right", $patient_prescription_grid->RowCnt);
?>
	</tr>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD || $patient_prescription->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_prescriptiongrid.updateLists(<?php echo $patient_prescription_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_prescription->isGridAdd() || $patient_prescription->CurrentMode == "copy")
		if (!$patient_prescription_grid->Recordset->EOF)
			$patient_prescription_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_prescription->CurrentMode == "add" || $patient_prescription->CurrentMode == "copy" || $patient_prescription->CurrentMode == "edit") {
		$patient_prescription_grid->RowIndex = '$rowindex$';
		$patient_prescription_grid->loadRowValues();

		// Set row properties
		$patient_prescription->resetAttributes();
		$patient_prescription->RowAttrs = array_merge($patient_prescription->RowAttrs, array('data-rowindex'=>$patient_prescription_grid->RowIndex, 'id'=>'r0_patient_prescription', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_prescription->RowAttrs["class"], "ew-template");
		$patient_prescription->RowType = ROWTYPE_ADD;

		// Render row
		$patient_prescription_grid->renderRow();

		// Render list options
		$patient_prescription_grid->renderListOptions();
		$patient_prescription_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_grid->ListOptions->render("body", "left", $patient_prescription_grid->RowIndex);
?>
	<?php if ($patient_prescription->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_prescription->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_id" class="form-group patient_prescription_id">
<span<?php echo $patient_prescription->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x<?php echo $patient_prescription_grid->RowIndex ?>_id" id="x<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_grid->RowIndex ?>_id" id="o<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_prescription->isConfirm()) { ?>
<?php if ($patient_prescription->Reception->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Reception->EditValue ?>"<?php echo $patient_prescription->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_prescription->isConfirm()) { ?>
<?php if ($patient_prescription->PatientId->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientId->EditValue ?>"<?php echo $patient_prescription->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientName->EditValue ?>"<?php echo $patient_prescription->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<span<?php echo $patient_prescription->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$patient_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_grid->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_prescription->Medicine->ReadOnly || $patient_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine","forceSelect":false});
</script>
<?php echo $patient_prescription->Medicine->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_Medicine") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<span<?php echo $patient_prescription->Medicine->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Medicine->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->M->Visible) { // M ?>
		<td data-name="M">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_M" class="form-group patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->M->EditValue ?>"<?php echo $patient_prescription->M->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_M" class="form-group patient_prescription_M">
<span<?php echo $patient_prescription->M->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->M->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription->M->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_grid->RowIndex ?>_M" id="o<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription->M->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->A->Visible) { // A ?>
		<td data-name="A">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_A" class="form-group patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->A->EditValue ?>"<?php echo $patient_prescription->A->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_A" class="form-group patient_prescription_A">
<span<?php echo $patient_prescription->A->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->A->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription->A->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_grid->RowIndex ?>_A" id="o<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription->A->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->N->Visible) { // N ?>
		<td data-name="N">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_N" class="form-group patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->N->EditValue ?>"<?php echo $patient_prescription->N->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_N" class="form-group patient_prescription_N">
<span<?php echo $patient_prescription->N->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->N->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription->N->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_grid->RowIndex ?>_N" id="o<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription->N->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->NoOfDays->EditValue ?>"<?php echo $patient_prescription->NoOfDays->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<span<?php echo $patient_prescription->NoOfDays->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->NoOfDays->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription->NoOfDays->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription->NoOfDays->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$patient_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription->PreRoute->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription->PreRoute->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
</script>
<?php echo $patient_prescription->PreRoute->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_PreRoute") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<span<?php echo $patient_prescription->PreRoute->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PreRoute->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$patient_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" class="text-nowrap" style="z-index: <?php echo (9000 - $patient_prescription_grid->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
</script>
<?php echo $patient_prescription->TimeOfTaking->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_TimeOfTaking") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription->TimeOfTaking->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->TimeOfTaking->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Type->Visible) { // Type ?>
		<td data-name="Type">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Type" class="form-group patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type"<?php echo $patient_prescription->Type->editAttributes() ?>>
		<?php echo $patient_prescription->Type->selectOptionListHtml("x<?php echo $patient_prescription_grid->RowIndex ?>_Type") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Type" class="form-group patient_prescription_Type">
<span<?php echo $patient_prescription->Type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription->Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_prescription->isConfirm()) { ?>
<?php if ($patient_prescription->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->mrnno->EditValue ?>"<?php echo $patient_prescription->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Age->EditValue ?>"<?php echo $patient_prescription->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Age" class="form-group patient_prescription_Age">
<span<?php echo $patient_prescription->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Gender->EditValue ?>"<?php echo $patient_prescription->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<span<?php echo $patient_prescription->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription->profilePic->editAttributes() ?>><?php echo $patient_prescription->profilePic->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<span<?php echo $patient_prescription->profilePic->viewAttributes() ?>>
<?php echo $patient_prescription->profilePic->ViewValue ?></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription->profilePic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->Status->Visible) { // Status ?>
		<td data-name="Status">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Status" class="form-group patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status"<?php echo $patient_prescription->Status->editAttributes() ?>>
		<?php echo $patient_prescription->Status->selectOptionListHtml("x<?php echo $patient_prescription_grid->RowIndex ?>_Status") ?>
	</select>
</div>
<?php echo $patient_prescription->Status->Lookup->getParamTag("p_x" . $patient_prescription_grid->RowIndex . "_Status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Status" class="form-group patient_prescription_Status">
<span<?php echo $patient_prescription->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription->Status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreatedBy->EditValue ?>"<?php echo $patient_prescription->CreatedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<span<?php echo $patient_prescription->CreatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->CreatedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreateDateTime->EditValue ?>"<?php echo $patient_prescription->CreateDateTime->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription->CreateDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->CreateDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription->CreateDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription->CreateDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedBy->EditValue ?>"<?php echo $patient_prescription->ModifiedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription->ModifiedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->ModifiedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription->ModifiedDateTime->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription->ModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->ModifiedDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_grid->ListOptions->render("body", "right", $patient_prescription_grid->RowIndex);
?>
<script>
fpatient_prescriptiongrid.updateLists(<?php echo $patient_prescription_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_prescription->CurrentMode == "add" || $patient_prescription->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_prescription_grid->FormKeyCountName ?>" id="<?php echo $patient_prescription_grid->FormKeyCountName ?>" value="<?php echo $patient_prescription_grid->KeyCount ?>">
<?php echo $patient_prescription_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_prescription->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_prescription_grid->FormKeyCountName ?>" id="<?php echo $patient_prescription_grid->FormKeyCountName ?>" value="<?php echo $patient_prescription_grid->KeyCount ?>">
<?php echo $patient_prescription_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_prescription->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_prescriptiongrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_prescription_grid->Recordset)
	$patient_prescription_grid->Recordset->Close();
?>
</div>
<?php if ($patient_prescription_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_prescription_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_prescription_grid->TotalRecs == 0 && !$patient_prescription->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_prescription_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_prescription_grid->terminate();
?>
<?php if (!$patient_prescription->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_prescription", "100%", "");
</script>
<?php } ?>
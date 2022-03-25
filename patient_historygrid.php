<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_history_grid))
	$patient_history_grid = new patient_history_grid();

// Run the page
$patient_history_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_grid->Page_Render();
?>
<?php if (!$patient_history->isExport()) { ?>
<script>

// Form object
var fpatient_historygrid = new ew.Form("fpatient_historygrid", "grid");
fpatient_historygrid.formKeyCountName = '<?php echo $patient_history_grid->FormKeyCountName ?>';

// Validate form
fpatient_historygrid.validate = function() {
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
		<?php if ($patient_history_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->id->caption(), $patient_history->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->mrnno->caption(), $patient_history->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->PatientName->caption(), $patient_history->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->PatientId->caption(), $patient_history->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->MobileNumber->caption(), $patient_history->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->MaritalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MaritalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->MaritalHistory->caption(), $patient_history->MaritalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->MenstrualHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MenstrualHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->MenstrualHistory->caption(), $patient_history->MenstrualHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->ObstetricHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_ObstetricHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->ObstetricHistory->caption(), $patient_history->ObstetricHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->Age->caption(), $patient_history->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->Gender->caption(), $patient_history->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->PatID->caption(), $patient_history->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->Reception->caption(), $patient_history->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_history_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_history->HospID->caption(), $patient_history->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_historygrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "MobileNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "MaritalHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "MenstrualHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "ObstetricHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_historygrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_historygrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_history_grid->renderOtherOptions();
?>
<?php $patient_history_grid->showPageHeader(); ?>
<?php
$patient_history_grid->showMessage();
?>
<?php if ($patient_history_grid->TotalRecs > 0 || $patient_history->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_history_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_history">
<?php if ($patient_history_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_history_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_historygrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_history" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_historygrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_history_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_history_grid->renderListOptions();

// Render list options (header, left)
$patient_history_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_history->id->Visible) { // id ?>
	<?php if ($patient_history->sortUrl($patient_history->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_history->id->headerCellClass() ?>"><div id="elh_patient_history_id" class="patient_history_id"><div class="ew-table-header-caption"><?php echo $patient_history->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_history->id->headerCellClass() ?>"><div><div id="elh_patient_history_id" class="patient_history_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_history->sortUrl($patient_history->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_history->mrnno->headerCellClass() ?>"><div id="elh_patient_history_mrnno" class="patient_history_mrnno"><div class="ew-table-header-caption"><?php echo $patient_history->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_history->mrnno->headerCellClass() ?>"><div><div id="elh_patient_history_mrnno" class="patient_history_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_history->sortUrl($patient_history->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_history->PatientName->headerCellClass() ?>"><div id="elh_patient_history_PatientName" class="patient_history_PatientName"><div class="ew-table-header-caption"><?php echo $patient_history->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_history->PatientName->headerCellClass() ?>"><div><div id="elh_patient_history_PatientName" class="patient_history_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_history->sortUrl($patient_history->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_history->PatientId->headerCellClass() ?>"><div id="elh_patient_history_PatientId" class="patient_history_PatientId"><div class="ew-table-header-caption"><?php echo $patient_history->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_history->PatientId->headerCellClass() ?>"><div><div id="elh_patient_history_PatientId" class="patient_history_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_history->sortUrl($patient_history->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_history->MobileNumber->headerCellClass() ?>"><div id="elh_patient_history_MobileNumber" class="patient_history_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_history->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_history->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_history_MobileNumber" class="patient_history_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_history->sortUrl($patient_history->MaritalHistory) == "") { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_history->MaritalHistory->headerCellClass() ?>"><div id="elh_patient_history_MaritalHistory" class="patient_history_MaritalHistory"><div class="ew-table-header-caption"><?php echo $patient_history->MaritalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_history->MaritalHistory->headerCellClass() ?>"><div><div id="elh_patient_history_MaritalHistory" class="patient_history_MaritalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->MaritalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->MaritalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->MaritalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_history->sortUrl($patient_history->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_history->MenstrualHistory->headerCellClass() ?>"><div id="elh_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $patient_history->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_history->MenstrualHistory->headerCellClass() ?>"><div><div id="elh_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->MenstrualHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->MenstrualHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_history->sortUrl($patient_history->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_history->ObstetricHistory->headerCellClass() ?>"><div id="elh_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $patient_history->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_history->ObstetricHistory->headerCellClass() ?>"><div><div id="elh_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->ObstetricHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->ObstetricHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->ObstetricHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->Age->Visible) { // Age ?>
	<?php if ($patient_history->sortUrl($patient_history->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_history->Age->headerCellClass() ?>"><div id="elh_patient_history_Age" class="patient_history_Age"><div class="ew-table-header-caption"><?php echo $patient_history->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_history->Age->headerCellClass() ?>"><div><div id="elh_patient_history_Age" class="patient_history_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->Gender->Visible) { // Gender ?>
	<?php if ($patient_history->sortUrl($patient_history->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_history->Gender->headerCellClass() ?>"><div id="elh_patient_history_Gender" class="patient_history_Gender"><div class="ew-table-header-caption"><?php echo $patient_history->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_history->Gender->headerCellClass() ?>"><div><div id="elh_patient_history_Gender" class="patient_history_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->PatID->Visible) { // PatID ?>
	<?php if ($patient_history->sortUrl($patient_history->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_history->PatID->headerCellClass() ?>"><div id="elh_patient_history_PatID" class="patient_history_PatID"><div class="ew-table-header-caption"><?php echo $patient_history->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_history->PatID->headerCellClass() ?>"><div><div id="elh_patient_history_PatID" class="patient_history_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->Reception->Visible) { // Reception ?>
	<?php if ($patient_history->sortUrl($patient_history->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_history->Reception->headerCellClass() ?>"><div id="elh_patient_history_Reception" class="patient_history_Reception"><div class="ew-table-header-caption"><?php echo $patient_history->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_history->Reception->headerCellClass() ?>"><div><div id="elh_patient_history_Reception" class="patient_history_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->HospID->Visible) { // HospID ?>
	<?php if ($patient_history->sortUrl($patient_history->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_history->HospID->headerCellClass() ?>"><div id="elh_patient_history_HospID" class="patient_history_HospID"><div class="ew-table-header-caption"><?php echo $patient_history->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_history->HospID->headerCellClass() ?>"><div><div id="elh_patient_history_HospID" class="patient_history_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_history->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_history_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_history_grid->StartRec = 1;
$patient_history_grid->StopRec = $patient_history_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_history_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_history_grid->FormKeyCountName) && ($patient_history->isGridAdd() || $patient_history->isGridEdit() || $patient_history->isConfirm())) {
		$patient_history_grid->KeyCount = $CurrentForm->getValue($patient_history_grid->FormKeyCountName);
		$patient_history_grid->StopRec = $patient_history_grid->StartRec + $patient_history_grid->KeyCount - 1;
	}
}
$patient_history_grid->RecCnt = $patient_history_grid->StartRec - 1;
if ($patient_history_grid->Recordset && !$patient_history_grid->Recordset->EOF) {
	$patient_history_grid->Recordset->moveFirst();
	$selectLimit = $patient_history_grid->UseSelectLimit;
	if (!$selectLimit && $patient_history_grid->StartRec > 1)
		$patient_history_grid->Recordset->move($patient_history_grid->StartRec - 1);
} elseif (!$patient_history->AllowAddDeleteRow && $patient_history_grid->StopRec == 0) {
	$patient_history_grid->StopRec = $patient_history->GridAddRowCount;
}

// Initialize aggregate
$patient_history->RowType = ROWTYPE_AGGREGATEINIT;
$patient_history->resetAttributes();
$patient_history_grid->renderRow();
if ($patient_history->isGridAdd())
	$patient_history_grid->RowIndex = 0;
if ($patient_history->isGridEdit())
	$patient_history_grid->RowIndex = 0;
while ($patient_history_grid->RecCnt < $patient_history_grid->StopRec) {
	$patient_history_grid->RecCnt++;
	if ($patient_history_grid->RecCnt >= $patient_history_grid->StartRec) {
		$patient_history_grid->RowCnt++;
		if ($patient_history->isGridAdd() || $patient_history->isGridEdit() || $patient_history->isConfirm()) {
			$patient_history_grid->RowIndex++;
			$CurrentForm->Index = $patient_history_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_history_grid->FormActionName) && $patient_history_grid->EventCancelled)
				$patient_history_grid->RowAction = strval($CurrentForm->getValue($patient_history_grid->FormActionName));
			elseif ($patient_history->isGridAdd())
				$patient_history_grid->RowAction = "insert";
			else
				$patient_history_grid->RowAction = "";
		}

		// Set up key count
		$patient_history_grid->KeyCount = $patient_history_grid->RowIndex;

		// Init row class and style
		$patient_history->resetAttributes();
		$patient_history->CssClass = "";
		if ($patient_history->isGridAdd()) {
			if ($patient_history->CurrentMode == "copy") {
				$patient_history_grid->loadRowValues($patient_history_grid->Recordset); // Load row values
				$patient_history_grid->setRecordKey($patient_history_grid->RowOldKey, $patient_history_grid->Recordset); // Set old record key
			} else {
				$patient_history_grid->loadRowValues(); // Load default values
				$patient_history_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_history_grid->loadRowValues($patient_history_grid->Recordset); // Load row values
		}
		$patient_history->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_history->isGridAdd()) // Grid add
			$patient_history->RowType = ROWTYPE_ADD; // Render add
		if ($patient_history->isGridAdd() && $patient_history->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_history_grid->restoreCurrentRowFormValues($patient_history_grid->RowIndex); // Restore form values
		if ($patient_history->isGridEdit()) { // Grid edit
			if ($patient_history->EventCancelled)
				$patient_history_grid->restoreCurrentRowFormValues($patient_history_grid->RowIndex); // Restore form values
			if ($patient_history_grid->RowAction == "insert")
				$patient_history->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_history->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_history->isGridEdit() && ($patient_history->RowType == ROWTYPE_EDIT || $patient_history->RowType == ROWTYPE_ADD) && $patient_history->EventCancelled) // Update failed
			$patient_history_grid->restoreCurrentRowFormValues($patient_history_grid->RowIndex); // Restore form values
		if ($patient_history->RowType == ROWTYPE_EDIT) // Edit row
			$patient_history_grid->EditRowCnt++;
		if ($patient_history->isConfirm()) // Confirm row
			$patient_history_grid->restoreCurrentRowFormValues($patient_history_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_history->RowAttrs = array_merge($patient_history->RowAttrs, array('data-rowindex'=>$patient_history_grid->RowCnt, 'id'=>'r' . $patient_history_grid->RowCnt . '_patient_history', 'data-rowtype'=>$patient_history->RowType));

		// Render row
		$patient_history_grid->renderRow();

		// Render list options
		$patient_history_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_history_grid->RowAction <> "delete" && $patient_history_grid->RowAction <> "insertdelete" && !($patient_history_grid->RowAction == "insert" && $patient_history->isConfirm() && $patient_history_grid->emptyRow())) {
?>
	<tr<?php echo $patient_history->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_history_grid->ListOptions->render("body", "left", $patient_history_grid->RowCnt);
?>
	<?php if ($patient_history->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_history->id->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_history" data-field="x_id" name="o<?php echo $patient_history_grid->RowIndex ?>_id" id="o<?php echo $patient_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_history->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_id" class="form-group patient_history_id">
<span<?php echo $patient_history->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_id" name="x<?php echo $patient_history_grid->RowIndex ?>_id" id="x<?php echo $patient_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_history->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_id" class="patient_history_id">
<span<?php echo $patient_history->id->viewAttributes() ?>>
<?php echo $patient_history->id->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_id" name="x<?php echo $patient_history_grid->RowIndex ?>_id" id="x<?php echo $patient_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_history->id->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_id" name="o<?php echo $patient_history_grid->RowIndex ?>_id" id="o<?php echo $patient_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_history->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_id" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_id" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_history->id->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_id" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_id" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_history->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_history->mrnno->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_history->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_mrnno" class="form-group patient_history_mrnno">
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_mrnno" class="form-group patient_history_mrnno">
<input type="text" data-table="patient_history" data-field="x_mrnno" name="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_history->mrnno->EditValue ?>"<?php echo $patient_history->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_mrnno" name="o<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_mrnno" class="form-group patient_history_mrnno">
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_mrnno" name="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_mrnno" class="patient_history_mrnno">
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<?php echo $patient_history->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_mrnno" name="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_mrnno" name="o<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_mrnno" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_mrnno" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_history->PatientName->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatientName" class="form-group patient_history_PatientName">
<input type="text" data-table="patient_history" data-field="x_PatientName" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientName->EditValue ?>"<?php echo $patient_history->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_history" data-field="x_PatientName" name="o<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_history_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_history->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatientName" class="form-group patient_history_PatientName">
<input type="text" data-table="patient_history" data-field="x_PatientName" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientName->EditValue ?>"<?php echo $patient_history->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatientName" class="patient_history_PatientName">
<span<?php echo $patient_history->PatientName->viewAttributes() ?>>
<?php echo $patient_history->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientName" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_history->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_PatientName" name="o<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_history_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_history->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientName" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_history->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_PatientName" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_history->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_history->PatientId->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_history->PatientId->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatientId" class="form-group patient_history_PatientId">
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatientId" class="form-group patient_history_PatientId">
<input type="text" data-table="patient_history" data-field="x_PatientId" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_history->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientId->EditValue ?>"<?php echo $patient_history->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientId" name="o<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatientId" class="form-group patient_history_PatientId">
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->PatientId->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_PatientId" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatientId" class="patient_history_PatientId">
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<?php echo $patient_history->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientId" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_PatientId" name="o<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientId" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_PatientId" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_history->MobileNumber->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_MobileNumber" class="form-group patient_history_MobileNumber">
<input type="text" data-table="patient_history" data-field="x_MobileNumber" name="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_history->MobileNumber->EditValue ?>"<?php echo $patient_history->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_history" data-field="x_MobileNumber" name="o<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_history->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_MobileNumber" class="form-group patient_history_MobileNumber">
<input type="text" data-table="patient_history" data-field="x_MobileNumber" name="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_history->MobileNumber->EditValue ?>"<?php echo $patient_history->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_MobileNumber" class="patient_history_MobileNumber">
<span<?php echo $patient_history->MobileNumber->viewAttributes() ?>>
<?php echo $patient_history->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_MobileNumber" name="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_history->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_MobileNumber" name="o<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_history->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_MobileNumber" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_history->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_MobileNumber" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_history->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory"<?php echo $patient_history->MaritalHistory->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_MaritalHistory" class="form-group patient_history_MaritalHistory">
<textarea data-table="patient_history" data-field="x_MaritalHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->MaritalHistory->getPlaceHolder()) ?>"<?php echo $patient_history->MaritalHistory->editAttributes() ?>><?php echo $patient_history->MaritalHistory->EditValue ?></textarea>
</span>
<input type="hidden" data-table="patient_history" data-field="x_MaritalHistory" name="o<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="o<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_history->MaritalHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_MaritalHistory" class="form-group patient_history_MaritalHistory">
<textarea data-table="patient_history" data-field="x_MaritalHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->MaritalHistory->getPlaceHolder()) ?>"<?php echo $patient_history->MaritalHistory->editAttributes() ?>><?php echo $patient_history->MaritalHistory->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_MaritalHistory" class="patient_history_MaritalHistory">
<span<?php echo $patient_history->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_history->MaritalHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_MaritalHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_history->MaritalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_MaritalHistory" name="o<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="o<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_history->MaritalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_MaritalHistory" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_history->MaritalHistory->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_MaritalHistory" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_history->MaritalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory"<?php echo $patient_history->MenstrualHistory->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_MenstrualHistory" class="form-group patient_history_MenstrualHistory">
<textarea data-table="patient_history" data-field="x_MenstrualHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $patient_history->MenstrualHistory->editAttributes() ?>><?php echo $patient_history->MenstrualHistory->EditValue ?></textarea>
</span>
<input type="hidden" data-table="patient_history" data-field="x_MenstrualHistory" name="o<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_history->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_MenstrualHistory" class="form-group patient_history_MenstrualHistory">
<textarea data-table="patient_history" data-field="x_MenstrualHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $patient_history->MenstrualHistory->editAttributes() ?>><?php echo $patient_history->MenstrualHistory->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory">
<span<?php echo $patient_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_history->MenstrualHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_MenstrualHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_history->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_MenstrualHistory" name="o<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_history->MenstrualHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_MenstrualHistory" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_history->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_MenstrualHistory" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_history->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory"<?php echo $patient_history->ObstetricHistory->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_ObstetricHistory" class="form-group patient_history_ObstetricHistory">
<textarea data-table="patient_history" data-field="x_ObstetricHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $patient_history->ObstetricHistory->editAttributes() ?>><?php echo $patient_history->ObstetricHistory->EditValue ?></textarea>
</span>
<input type="hidden" data-table="patient_history" data-field="x_ObstetricHistory" name="o<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_history->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_ObstetricHistory" class="form-group patient_history_ObstetricHistory">
<textarea data-table="patient_history" data-field="x_ObstetricHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $patient_history->ObstetricHistory->editAttributes() ?>><?php echo $patient_history->ObstetricHistory->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory">
<span<?php echo $patient_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_history->ObstetricHistory->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_ObstetricHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_history->ObstetricHistory->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_ObstetricHistory" name="o<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_history->ObstetricHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_ObstetricHistory" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_history->ObstetricHistory->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_ObstetricHistory" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_history->ObstetricHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_history->Age->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Age" class="form-group patient_history_Age">
<input type="text" data-table="patient_history" data-field="x_Age" name="x<?php echo $patient_history_grid->RowIndex ?>_Age" id="x<?php echo $patient_history_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Age->getPlaceHolder()) ?>" value="<?php echo $patient_history->Age->EditValue ?>"<?php echo $patient_history->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_history" data-field="x_Age" name="o<?php echo $patient_history_grid->RowIndex ?>_Age" id="o<?php echo $patient_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_history->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Age" class="form-group patient_history_Age">
<input type="text" data-table="patient_history" data-field="x_Age" name="x<?php echo $patient_history_grid->RowIndex ?>_Age" id="x<?php echo $patient_history_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Age->getPlaceHolder()) ?>" value="<?php echo $patient_history->Age->EditValue ?>"<?php echo $patient_history->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Age" class="patient_history_Age">
<span<?php echo $patient_history->Age->viewAttributes() ?>>
<?php echo $patient_history->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_Age" name="x<?php echo $patient_history_grid->RowIndex ?>_Age" id="x<?php echo $patient_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_history->Age->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_Age" name="o<?php echo $patient_history_grid->RowIndex ?>_Age" id="o<?php echo $patient_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_history->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_Age" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_Age" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_history->Age->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_Age" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_Age" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_history->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_history->Gender->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Gender" class="form-group patient_history_Gender">
<input type="text" data-table="patient_history" data-field="x_Gender" name="x<?php echo $patient_history_grid->RowIndex ?>_Gender" id="x<?php echo $patient_history_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_history->Gender->EditValue ?>"<?php echo $patient_history->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_history" data-field="x_Gender" name="o<?php echo $patient_history_grid->RowIndex ?>_Gender" id="o<?php echo $patient_history_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_history->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Gender" class="form-group patient_history_Gender">
<input type="text" data-table="patient_history" data-field="x_Gender" name="x<?php echo $patient_history_grid->RowIndex ?>_Gender" id="x<?php echo $patient_history_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_history->Gender->EditValue ?>"<?php echo $patient_history->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Gender" class="patient_history_Gender">
<span<?php echo $patient_history->Gender->viewAttributes() ?>>
<?php echo $patient_history->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_Gender" name="x<?php echo $patient_history_grid->RowIndex ?>_Gender" id="x<?php echo $patient_history_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_history->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_Gender" name="o<?php echo $patient_history_grid->RowIndex ?>_Gender" id="o<?php echo $patient_history_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_history->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_Gender" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_Gender" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_history->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_Gender" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_Gender" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_history->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_history->PatID->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatID" class="form-group patient_history_PatID">
<input type="text" data-table="patient_history" data-field="x_PatID" name="x<?php echo $patient_history_grid->RowIndex ?>_PatID" id="x<?php echo $patient_history_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatID->EditValue ?>"<?php echo $patient_history->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_history" data-field="x_PatID" name="o<?php echo $patient_history_grid->RowIndex ?>_PatID" id="o<?php echo $patient_history_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_history->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatID" class="form-group patient_history_PatID">
<input type="text" data-table="patient_history" data-field="x_PatID" name="x<?php echo $patient_history_grid->RowIndex ?>_PatID" id="x<?php echo $patient_history_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatID->EditValue ?>"<?php echo $patient_history->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_PatID" class="patient_history_PatID">
<span<?php echo $patient_history->PatID->viewAttributes() ?>>
<?php echo $patient_history->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_PatID" name="x<?php echo $patient_history_grid->RowIndex ?>_PatID" id="x<?php echo $patient_history_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_history->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_PatID" name="o<?php echo $patient_history_grid->RowIndex ?>_PatID" id="o<?php echo $patient_history_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_history->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_PatID" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_PatID" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_history->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_PatID" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_PatID" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_history->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_history->Reception->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_history->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Reception" class="form-group patient_history_Reception">
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_history_grid->RowIndex ?>_Reception" name="x<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Reception" class="form-group patient_history_Reception">
<input type="text" data-table="patient_history" data-field="x_Reception" name="x<?php echo $patient_history_grid->RowIndex ?>_Reception" id="x<?php echo $patient_history_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_history->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_history->Reception->EditValue ?>"<?php echo $patient_history->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_Reception" name="o<?php echo $patient_history_grid->RowIndex ?>_Reception" id="o<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Reception" class="form-group patient_history_Reception">
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_Reception" name="x<?php echo $patient_history_grid->RowIndex ?>_Reception" id="x<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_Reception" class="patient_history_Reception">
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<?php echo $patient_history->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_Reception" name="x<?php echo $patient_history_grid->RowIndex ?>_Reception" id="x<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_Reception" name="o<?php echo $patient_history_grid->RowIndex ?>_Reception" id="o<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_Reception" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_Reception" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_Reception" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_Reception" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_history->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_history->HospID->cellAttributes() ?>>
<?php if ($patient_history->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_history" data-field="x_HospID" name="o<?php echo $patient_history_grid->RowIndex ?>_HospID" id="o<?php echo $patient_history_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_history->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_history->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_history_grid->RowCnt ?>_patient_history_HospID" class="patient_history_HospID">
<span<?php echo $patient_history->HospID->viewAttributes() ?>>
<?php echo $patient_history->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_history->isConfirm()) { ?>
<input type="hidden" data-table="patient_history" data-field="x_HospID" name="x<?php echo $patient_history_grid->RowIndex ?>_HospID" id="x<?php echo $patient_history_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_history->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_HospID" name="o<?php echo $patient_history_grid->RowIndex ?>_HospID" id="o<?php echo $patient_history_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_history->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_history" data-field="x_HospID" name="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_HospID" id="fpatient_historygrid$x<?php echo $patient_history_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_history->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_history" data-field="x_HospID" name="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_HospID" id="fpatient_historygrid$o<?php echo $patient_history_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_history->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_history_grid->ListOptions->render("body", "right", $patient_history_grid->RowCnt);
?>
	</tr>
<?php if ($patient_history->RowType == ROWTYPE_ADD || $patient_history->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_historygrid.updateLists(<?php echo $patient_history_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_history->isGridAdd() || $patient_history->CurrentMode == "copy")
		if (!$patient_history_grid->Recordset->EOF)
			$patient_history_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_history->CurrentMode == "add" || $patient_history->CurrentMode == "copy" || $patient_history->CurrentMode == "edit") {
		$patient_history_grid->RowIndex = '$rowindex$';
		$patient_history_grid->loadRowValues();

		// Set row properties
		$patient_history->resetAttributes();
		$patient_history->RowAttrs = array_merge($patient_history->RowAttrs, array('data-rowindex'=>$patient_history_grid->RowIndex, 'id'=>'r0_patient_history', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_history->RowAttrs["class"], "ew-template");
		$patient_history->RowType = ROWTYPE_ADD;

		// Render row
		$patient_history_grid->renderRow();

		// Render list options
		$patient_history_grid->renderListOptions();
		$patient_history_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_history->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_history_grid->ListOptions->render("body", "left", $patient_history_grid->RowIndex);
?>
	<?php if ($patient_history->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_history->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_history_id" class="form-group patient_history_id">
<span<?php echo $patient_history->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_id" name="x<?php echo $patient_history_grid->RowIndex ?>_id" id="x<?php echo $patient_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_history->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_id" name="o<?php echo $patient_history_grid->RowIndex ?>_id" id="o<?php echo $patient_history_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_history->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_history->isConfirm()) { ?>
<?php if ($patient_history->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_history_mrnno" class="form-group patient_history_mrnno">
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_history_mrnno" class="form-group patient_history_mrnno">
<input type="text" data-table="patient_history" data-field="x_mrnno" name="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_history->mrnno->EditValue ?>"<?php echo $patient_history->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_history_mrnno" class="form-group patient_history_mrnno">
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_mrnno" name="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_mrnno" name="o<?php echo $patient_history_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_history_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_history->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_history->isConfirm()) { ?>
<span id="el$rowindex$_patient_history_PatientName" class="form-group patient_history_PatientName">
<input type="text" data-table="patient_history" data-field="x_PatientName" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientName->EditValue ?>"<?php echo $patient_history->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_history_PatientName" class="form-group patient_history_PatientName">
<span<?php echo $patient_history->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_PatientName" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_history->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientName" name="o<?php echo $patient_history_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_history_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_history->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_history->isConfirm()) { ?>
<?php if ($patient_history->PatientId->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_history_PatientId" class="form-group patient_history_PatientId">
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_history_PatientId" class="form-group patient_history_PatientId">
<input type="text" data-table="patient_history" data-field="x_PatientId" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_history->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientId->EditValue ?>"<?php echo $patient_history->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_history_PatientId" class="form-group patient_history_PatientId">
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_PatientId" name="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientId" name="o<?php echo $patient_history_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_history_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_history->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_history->isConfirm()) { ?>
<span id="el$rowindex$_patient_history_MobileNumber" class="form-group patient_history_MobileNumber">
<input type="text" data-table="patient_history" data-field="x_MobileNumber" name="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_history->MobileNumber->EditValue ?>"<?php echo $patient_history->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_history_MobileNumber" class="form-group patient_history_MobileNumber">
<span<?php echo $patient_history->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->MobileNumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_MobileNumber" name="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_history->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_MobileNumber" name="o<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_history_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_history->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory">
<?php if (!$patient_history->isConfirm()) { ?>
<span id="el$rowindex$_patient_history_MaritalHistory" class="form-group patient_history_MaritalHistory">
<textarea data-table="patient_history" data-field="x_MaritalHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->MaritalHistory->getPlaceHolder()) ?>"<?php echo $patient_history->MaritalHistory->editAttributes() ?>><?php echo $patient_history->MaritalHistory->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_history_MaritalHistory" class="form-group patient_history_MaritalHistory">
<span<?php echo $patient_history->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_history->MaritalHistory->ViewValue ?></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_MaritalHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_history->MaritalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_MaritalHistory" name="o<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" id="o<?php echo $patient_history_grid->RowIndex ?>_MaritalHistory" value="<?php echo HtmlEncode($patient_history->MaritalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory">
<?php if (!$patient_history->isConfirm()) { ?>
<span id="el$rowindex$_patient_history_MenstrualHistory" class="form-group patient_history_MenstrualHistory">
<textarea data-table="patient_history" data-field="x_MenstrualHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->MenstrualHistory->getPlaceHolder()) ?>"<?php echo $patient_history->MenstrualHistory->editAttributes() ?>><?php echo $patient_history->MenstrualHistory->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_history_MenstrualHistory" class="form-group patient_history_MenstrualHistory">
<span<?php echo $patient_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_history->MenstrualHistory->ViewValue ?></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_MenstrualHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_history->MenstrualHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_MenstrualHistory" name="o<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $patient_history_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($patient_history->MenstrualHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory">
<?php if (!$patient_history->isConfirm()) { ?>
<span id="el$rowindex$_patient_history_ObstetricHistory" class="form-group patient_history_ObstetricHistory">
<textarea data-table="patient_history" data-field="x_ObstetricHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_history->ObstetricHistory->getPlaceHolder()) ?>"<?php echo $patient_history->ObstetricHistory->editAttributes() ?>><?php echo $patient_history->ObstetricHistory->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_history_ObstetricHistory" class="form-group patient_history_ObstetricHistory">
<span<?php echo $patient_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_history->ObstetricHistory->ViewValue ?></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_ObstetricHistory" name="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="x<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_history->ObstetricHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_ObstetricHistory" name="o<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" id="o<?php echo $patient_history_grid->RowIndex ?>_ObstetricHistory" value="<?php echo HtmlEncode($patient_history->ObstetricHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_history->isConfirm()) { ?>
<span id="el$rowindex$_patient_history_Age" class="form-group patient_history_Age">
<input type="text" data-table="patient_history" data-field="x_Age" name="x<?php echo $patient_history_grid->RowIndex ?>_Age" id="x<?php echo $patient_history_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Age->getPlaceHolder()) ?>" value="<?php echo $patient_history->Age->EditValue ?>"<?php echo $patient_history->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_history_Age" class="form-group patient_history_Age">
<span<?php echo $patient_history->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_Age" name="x<?php echo $patient_history_grid->RowIndex ?>_Age" id="x<?php echo $patient_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_history->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_Age" name="o<?php echo $patient_history_grid->RowIndex ?>_Age" id="o<?php echo $patient_history_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_history->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_history->isConfirm()) { ?>
<span id="el$rowindex$_patient_history_Gender" class="form-group patient_history_Gender">
<input type="text" data-table="patient_history" data-field="x_Gender" name="x<?php echo $patient_history_grid->RowIndex ?>_Gender" id="x<?php echo $patient_history_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_history->Gender->EditValue ?>"<?php echo $patient_history->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_history_Gender" class="form-group patient_history_Gender">
<span<?php echo $patient_history->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_Gender" name="x<?php echo $patient_history_grid->RowIndex ?>_Gender" id="x<?php echo $patient_history_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_history->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_Gender" name="o<?php echo $patient_history_grid->RowIndex ?>_Gender" id="o<?php echo $patient_history_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_history->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_history->isConfirm()) { ?>
<span id="el$rowindex$_patient_history_PatID" class="form-group patient_history_PatID">
<input type="text" data-table="patient_history" data-field="x_PatID" name="x<?php echo $patient_history_grid->RowIndex ?>_PatID" id="x<?php echo $patient_history_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatID->EditValue ?>"<?php echo $patient_history->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_history_PatID" class="form-group patient_history_PatID">
<span<?php echo $patient_history->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_PatID" name="x<?php echo $patient_history_grid->RowIndex ?>_PatID" id="x<?php echo $patient_history_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_history->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_PatID" name="o<?php echo $patient_history_grid->RowIndex ?>_PatID" id="o<?php echo $patient_history_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_history->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_history->isConfirm()) { ?>
<?php if ($patient_history->Reception->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_history_Reception" class="form-group patient_history_Reception">
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_history_grid->RowIndex ?>_Reception" name="x<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_history_Reception" class="form-group patient_history_Reception">
<input type="text" data-table="patient_history" data-field="x_Reception" name="x<?php echo $patient_history_grid->RowIndex ?>_Reception" id="x<?php echo $patient_history_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_history->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_history->Reception->EditValue ?>"<?php echo $patient_history->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_history_Reception" class="form-group patient_history_Reception">
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_Reception" name="x<?php echo $patient_history_grid->RowIndex ?>_Reception" id="x<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_Reception" name="o<?php echo $patient_history_grid->RowIndex ?>_Reception" id="o<?php echo $patient_history_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_history->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_history->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_history->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_history_HospID" class="form-group patient_history_HospID">
<span<?php echo $patient_history->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_history->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_history" data-field="x_HospID" name="x<?php echo $patient_history_grid->RowIndex ?>_HospID" id="x<?php echo $patient_history_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_history->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_history" data-field="x_HospID" name="o<?php echo $patient_history_grid->RowIndex ?>_HospID" id="o<?php echo $patient_history_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_history->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_history_grid->ListOptions->render("body", "right", $patient_history_grid->RowIndex);
?>
<script>
fpatient_historygrid.updateLists(<?php echo $patient_history_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_history->CurrentMode == "add" || $patient_history->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_history_grid->FormKeyCountName ?>" id="<?php echo $patient_history_grid->FormKeyCountName ?>" value="<?php echo $patient_history_grid->KeyCount ?>">
<?php echo $patient_history_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_history->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_history_grid->FormKeyCountName ?>" id="<?php echo $patient_history_grid->FormKeyCountName ?>" value="<?php echo $patient_history_grid->KeyCount ?>">
<?php echo $patient_history_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_history->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_historygrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_history_grid->Recordset)
	$patient_history_grid->Recordset->Close();
?>
</div>
<?php if ($patient_history_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_history_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_history_grid->TotalRecs == 0 && !$patient_history->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_history_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_history_grid->terminate();
?>
<?php if (!$patient_history->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_history", "95%", "");
</script>
<?php } ?>
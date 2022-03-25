<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_provisional_diagnosis_grid))
	$patient_provisional_diagnosis_grid = new patient_provisional_diagnosis_grid();

// Run the page
$patient_provisional_diagnosis_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_provisional_diagnosis_grid->Page_Render();
?>
<?php if (!$patient_provisional_diagnosis->isExport()) { ?>
<script>

// Form object
var fpatient_provisional_diagnosisgrid = new ew.Form("fpatient_provisional_diagnosisgrid", "grid");
fpatient_provisional_diagnosisgrid.formKeyCountName = '<?php echo $patient_provisional_diagnosis_grid->FormKeyCountName ?>';

// Validate form
fpatient_provisional_diagnosisgrid.validate = function() {
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
		<?php if ($patient_provisional_diagnosis_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->id->caption(), $patient_provisional_diagnosis->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_provisional_diagnosis_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->mrnno->caption(), $patient_provisional_diagnosis->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_provisional_diagnosis_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->PatientName->caption(), $patient_provisional_diagnosis->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_provisional_diagnosis_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->PatID->caption(), $patient_provisional_diagnosis->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_provisional_diagnosis_grid->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->MobileNumber->caption(), $patient_provisional_diagnosis->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_provisional_diagnosis_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->Reception->caption(), $patient_provisional_diagnosis->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_provisional_diagnosis_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->PatientId->caption(), $patient_provisional_diagnosis->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_provisional_diagnosis_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->Age->caption(), $patient_provisional_diagnosis->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_provisional_diagnosis_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->Gender->caption(), $patient_provisional_diagnosis->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_provisional_diagnosis_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_provisional_diagnosis->HospID->caption(), $patient_provisional_diagnosis->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_provisional_diagnosisgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
	if (ew.valueChanged(fobj, infix, "MobileNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_provisional_diagnosisgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_provisional_diagnosisgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_provisional_diagnosis_grid->renderOtherOptions();
?>
<?php $patient_provisional_diagnosis_grid->showPageHeader(); ?>
<?php
$patient_provisional_diagnosis_grid->showMessage();
?>
<?php if ($patient_provisional_diagnosis_grid->TotalRecs > 0 || $patient_provisional_diagnosis->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_provisional_diagnosis_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_provisional_diagnosis">
<?php if ($patient_provisional_diagnosis_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_provisional_diagnosis_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_provisional_diagnosisgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_provisional_diagnosis" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_provisional_diagnosisgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_provisional_diagnosis_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_provisional_diagnosis_grid->renderListOptions();

// Render list options (header, left)
$patient_provisional_diagnosis_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_provisional_diagnosis->id->Visible) { // id ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_provisional_diagnosis->id->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_id" class="patient_provisional_diagnosis_id"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_provisional_diagnosis->id->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_id" class="patient_provisional_diagnosis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_provisional_diagnosis->mrnno->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_mrnno" class="patient_provisional_diagnosis_mrnno"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_provisional_diagnosis->mrnno->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_mrnno" class="patient_provisional_diagnosis_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_provisional_diagnosis->PatientName->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_PatientName" class="patient_provisional_diagnosis_PatientName"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_provisional_diagnosis->PatientName->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_PatientName" class="patient_provisional_diagnosis_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatID->Visible) { // PatID ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_provisional_diagnosis->PatID->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_PatID" class="patient_provisional_diagnosis_PatID"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_provisional_diagnosis->PatID->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_PatID" class="patient_provisional_diagnosis_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_provisional_diagnosis->MobileNumber->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_MobileNumber" class="patient_provisional_diagnosis_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_provisional_diagnosis->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_MobileNumber" class="patient_provisional_diagnosis_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Reception->Visible) { // Reception ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_provisional_diagnosis->Reception->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_Reception" class="patient_provisional_diagnosis_Reception"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_provisional_diagnosis->Reception->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_Reception" class="patient_provisional_diagnosis_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_provisional_diagnosis->PatientId->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_PatientId" class="patient_provisional_diagnosis_PatientId"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_provisional_diagnosis->PatientId->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_PatientId" class="patient_provisional_diagnosis_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Age->Visible) { // Age ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_provisional_diagnosis->Age->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_Age" class="patient_provisional_diagnosis_Age"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_provisional_diagnosis->Age->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_Age" class="patient_provisional_diagnosis_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Gender->Visible) { // Gender ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_provisional_diagnosis->Gender->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_Gender" class="patient_provisional_diagnosis_Gender"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_provisional_diagnosis->Gender->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_Gender" class="patient_provisional_diagnosis_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->HospID->Visible) { // HospID ?>
	<?php if ($patient_provisional_diagnosis->sortUrl($patient_provisional_diagnosis->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_provisional_diagnosis->HospID->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_HospID" class="patient_provisional_diagnosis_HospID"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_provisional_diagnosis->HospID->headerCellClass() ?>"><div><div id="elh_patient_provisional_diagnosis_HospID" class="patient_provisional_diagnosis_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_provisional_diagnosis_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_provisional_diagnosis_grid->StartRec = 1;
$patient_provisional_diagnosis_grid->StopRec = $patient_provisional_diagnosis_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_provisional_diagnosis_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_provisional_diagnosis_grid->FormKeyCountName) && ($patient_provisional_diagnosis->isGridAdd() || $patient_provisional_diagnosis->isGridEdit() || $patient_provisional_diagnosis->isConfirm())) {
		$patient_provisional_diagnosis_grid->KeyCount = $CurrentForm->getValue($patient_provisional_diagnosis_grid->FormKeyCountName);
		$patient_provisional_diagnosis_grid->StopRec = $patient_provisional_diagnosis_grid->StartRec + $patient_provisional_diagnosis_grid->KeyCount - 1;
	}
}
$patient_provisional_diagnosis_grid->RecCnt = $patient_provisional_diagnosis_grid->StartRec - 1;
if ($patient_provisional_diagnosis_grid->Recordset && !$patient_provisional_diagnosis_grid->Recordset->EOF) {
	$patient_provisional_diagnosis_grid->Recordset->moveFirst();
	$selectLimit = $patient_provisional_diagnosis_grid->UseSelectLimit;
	if (!$selectLimit && $patient_provisional_diagnosis_grid->StartRec > 1)
		$patient_provisional_diagnosis_grid->Recordset->move($patient_provisional_diagnosis_grid->StartRec - 1);
} elseif (!$patient_provisional_diagnosis->AllowAddDeleteRow && $patient_provisional_diagnosis_grid->StopRec == 0) {
	$patient_provisional_diagnosis_grid->StopRec = $patient_provisional_diagnosis->GridAddRowCount;
}

// Initialize aggregate
$patient_provisional_diagnosis->RowType = ROWTYPE_AGGREGATEINIT;
$patient_provisional_diagnosis->resetAttributes();
$patient_provisional_diagnosis_grid->renderRow();
if ($patient_provisional_diagnosis->isGridAdd())
	$patient_provisional_diagnosis_grid->RowIndex = 0;
if ($patient_provisional_diagnosis->isGridEdit())
	$patient_provisional_diagnosis_grid->RowIndex = 0;
while ($patient_provisional_diagnosis_grid->RecCnt < $patient_provisional_diagnosis_grid->StopRec) {
	$patient_provisional_diagnosis_grid->RecCnt++;
	if ($patient_provisional_diagnosis_grid->RecCnt >= $patient_provisional_diagnosis_grid->StartRec) {
		$patient_provisional_diagnosis_grid->RowCnt++;
		if ($patient_provisional_diagnosis->isGridAdd() || $patient_provisional_diagnosis->isGridEdit() || $patient_provisional_diagnosis->isConfirm()) {
			$patient_provisional_diagnosis_grid->RowIndex++;
			$CurrentForm->Index = $patient_provisional_diagnosis_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_provisional_diagnosis_grid->FormActionName) && $patient_provisional_diagnosis_grid->EventCancelled)
				$patient_provisional_diagnosis_grid->RowAction = strval($CurrentForm->getValue($patient_provisional_diagnosis_grid->FormActionName));
			elseif ($patient_provisional_diagnosis->isGridAdd())
				$patient_provisional_diagnosis_grid->RowAction = "insert";
			else
				$patient_provisional_diagnosis_grid->RowAction = "";
		}

		// Set up key count
		$patient_provisional_diagnosis_grid->KeyCount = $patient_provisional_diagnosis_grid->RowIndex;

		// Init row class and style
		$patient_provisional_diagnosis->resetAttributes();
		$patient_provisional_diagnosis->CssClass = "";
		if ($patient_provisional_diagnosis->isGridAdd()) {
			if ($patient_provisional_diagnosis->CurrentMode == "copy") {
				$patient_provisional_diagnosis_grid->loadRowValues($patient_provisional_diagnosis_grid->Recordset); // Load row values
				$patient_provisional_diagnosis_grid->setRecordKey($patient_provisional_diagnosis_grid->RowOldKey, $patient_provisional_diagnosis_grid->Recordset); // Set old record key
			} else {
				$patient_provisional_diagnosis_grid->loadRowValues(); // Load default values
				$patient_provisional_diagnosis_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_provisional_diagnosis_grid->loadRowValues($patient_provisional_diagnosis_grid->Recordset); // Load row values
		}
		$patient_provisional_diagnosis->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_provisional_diagnosis->isGridAdd()) // Grid add
			$patient_provisional_diagnosis->RowType = ROWTYPE_ADD; // Render add
		if ($patient_provisional_diagnosis->isGridAdd() && $patient_provisional_diagnosis->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_provisional_diagnosis_grid->restoreCurrentRowFormValues($patient_provisional_diagnosis_grid->RowIndex); // Restore form values
		if ($patient_provisional_diagnosis->isGridEdit()) { // Grid edit
			if ($patient_provisional_diagnosis->EventCancelled)
				$patient_provisional_diagnosis_grid->restoreCurrentRowFormValues($patient_provisional_diagnosis_grid->RowIndex); // Restore form values
			if ($patient_provisional_diagnosis_grid->RowAction == "insert")
				$patient_provisional_diagnosis->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_provisional_diagnosis->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_provisional_diagnosis->isGridEdit() && ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT || $patient_provisional_diagnosis->RowType == ROWTYPE_ADD) && $patient_provisional_diagnosis->EventCancelled) // Update failed
			$patient_provisional_diagnosis_grid->restoreCurrentRowFormValues($patient_provisional_diagnosis_grid->RowIndex); // Restore form values
		if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) // Edit row
			$patient_provisional_diagnosis_grid->EditRowCnt++;
		if ($patient_provisional_diagnosis->isConfirm()) // Confirm row
			$patient_provisional_diagnosis_grid->restoreCurrentRowFormValues($patient_provisional_diagnosis_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_provisional_diagnosis->RowAttrs = array_merge($patient_provisional_diagnosis->RowAttrs, array('data-rowindex'=>$patient_provisional_diagnosis_grid->RowCnt, 'id'=>'r' . $patient_provisional_diagnosis_grid->RowCnt . '_patient_provisional_diagnosis', 'data-rowtype'=>$patient_provisional_diagnosis->RowType));

		// Render row
		$patient_provisional_diagnosis_grid->renderRow();

		// Render list options
		$patient_provisional_diagnosis_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_provisional_diagnosis_grid->RowAction <> "delete" && $patient_provisional_diagnosis_grid->RowAction <> "insertdelete" && !($patient_provisional_diagnosis_grid->RowAction == "insert" && $patient_provisional_diagnosis->isConfirm() && $patient_provisional_diagnosis_grid->emptyRow())) {
?>
	<tr<?php echo $patient_provisional_diagnosis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_provisional_diagnosis_grid->ListOptions->render("body", "left", $patient_provisional_diagnosis_grid->RowCnt);
?>
	<?php if ($patient_provisional_diagnosis->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_provisional_diagnosis->id->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_id" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_id" class="form-group patient_provisional_diagnosis_id">
<span<?php echo $patient_provisional_diagnosis->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_id" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_id" class="patient_provisional_diagnosis_id">
<span<?php echo $patient_provisional_diagnosis->id->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->id->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_id" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis->id->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_id" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_id" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis->id->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_id" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_provisional_diagnosis->mrnno->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_provisional_diagnosis->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_mrnno" class="form-group patient_provisional_diagnosis_mrnno">
<span<?php echo $patient_provisional_diagnosis->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_mrnno" class="form-group patient_provisional_diagnosis_mrnno">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->mrnno->EditValue ?>"<?php echo $patient_provisional_diagnosis->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_mrnno" class="form-group patient_provisional_diagnosis_mrnno">
<span<?php echo $patient_provisional_diagnosis->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_mrnno" class="patient_provisional_diagnosis_mrnno">
<span<?php echo $patient_provisional_diagnosis->mrnno->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_provisional_diagnosis->PatientName->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatientName" class="form-group patient_provisional_diagnosis_PatientName">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->PatientName->EditValue ?>"<?php echo $patient_provisional_diagnosis->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatientName" class="form-group patient_provisional_diagnosis_PatientName">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->PatientName->EditValue ?>"<?php echo $patient_provisional_diagnosis->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatientName" class="patient_provisional_diagnosis_PatientName">
<span<?php echo $patient_provisional_diagnosis->PatientName->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_provisional_diagnosis->PatID->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatID" class="form-group patient_provisional_diagnosis_PatID">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->PatID->EditValue ?>"<?php echo $patient_provisional_diagnosis->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatID" class="form-group patient_provisional_diagnosis_PatID">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->PatID->EditValue ?>"<?php echo $patient_provisional_diagnosis->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatID" class="patient_provisional_diagnosis_PatID">
<span<?php echo $patient_provisional_diagnosis->PatID->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_provisional_diagnosis->MobileNumber->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_MobileNumber" class="form-group patient_provisional_diagnosis_MobileNumber">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->MobileNumber->EditValue ?>"<?php echo $patient_provisional_diagnosis->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_MobileNumber" class="form-group patient_provisional_diagnosis_MobileNumber">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->MobileNumber->EditValue ?>"<?php echo $patient_provisional_diagnosis->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_MobileNumber" class="patient_provisional_diagnosis_MobileNumber">
<span<?php echo $patient_provisional_diagnosis->MobileNumber->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_provisional_diagnosis->Reception->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_provisional_diagnosis->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Reception" class="form-group patient_provisional_diagnosis_Reception">
<span<?php echo $patient_provisional_diagnosis->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Reception" class="form-group patient_provisional_diagnosis_Reception">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->Reception->EditValue ?>"<?php echo $patient_provisional_diagnosis->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Reception" class="form-group patient_provisional_diagnosis_Reception">
<span<?php echo $patient_provisional_diagnosis->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Reception" class="patient_provisional_diagnosis_Reception">
<span<?php echo $patient_provisional_diagnosis->Reception->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_provisional_diagnosis->PatientId->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_provisional_diagnosis->PatientId->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatientId" class="form-group patient_provisional_diagnosis_PatientId">
<span<?php echo $patient_provisional_diagnosis->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatientId" class="form-group patient_provisional_diagnosis_PatientId">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->PatientId->EditValue ?>"<?php echo $patient_provisional_diagnosis->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatientId" class="form-group patient_provisional_diagnosis_PatientId">
<span<?php echo $patient_provisional_diagnosis->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->PatientId->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_PatientId" class="patient_provisional_diagnosis_PatientId">
<span<?php echo $patient_provisional_diagnosis->PatientId->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_provisional_diagnosis->Age->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Age" class="form-group patient_provisional_diagnosis_Age">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Age" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->Age->EditValue ?>"<?php echo $patient_provisional_diagnosis->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Age" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Age" class="form-group patient_provisional_diagnosis_Age">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Age" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->Age->EditValue ?>"<?php echo $patient_provisional_diagnosis->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Age" class="patient_provisional_diagnosis_Age">
<span<?php echo $patient_provisional_diagnosis->Age->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Age" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Age" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Age" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Age" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_provisional_diagnosis->Gender->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Gender" class="form-group patient_provisional_diagnosis_Gender">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->Gender->EditValue ?>"<?php echo $patient_provisional_diagnosis->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Gender" class="form-group patient_provisional_diagnosis_Gender">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->Gender->EditValue ?>"<?php echo $patient_provisional_diagnosis->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_Gender" class="patient_provisional_diagnosis_Gender">
<span<?php echo $patient_provisional_diagnosis->Gender->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_provisional_diagnosis->HospID->cellAttributes() ?>>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_HospID" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_provisional_diagnosis_grid->RowCnt ?>_patient_provisional_diagnosis_HospID" class="patient_provisional_diagnosis_HospID">
<span<?php echo $patient_provisional_diagnosis->HospID->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_HospID" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_HospID" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_HospID" name="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" id="fpatient_provisional_diagnosisgrid$x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_HospID" name="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" id="fpatient_provisional_diagnosisgrid$o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_provisional_diagnosis_grid->ListOptions->render("body", "right", $patient_provisional_diagnosis_grid->RowCnt);
?>
	</tr>
<?php if ($patient_provisional_diagnosis->RowType == ROWTYPE_ADD || $patient_provisional_diagnosis->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_provisional_diagnosisgrid.updateLists(<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_provisional_diagnosis->isGridAdd() || $patient_provisional_diagnosis->CurrentMode == "copy")
		if (!$patient_provisional_diagnosis_grid->Recordset->EOF)
			$patient_provisional_diagnosis_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_provisional_diagnosis->CurrentMode == "add" || $patient_provisional_diagnosis->CurrentMode == "copy" || $patient_provisional_diagnosis->CurrentMode == "edit") {
		$patient_provisional_diagnosis_grid->RowIndex = '$rowindex$';
		$patient_provisional_diagnosis_grid->loadRowValues();

		// Set row properties
		$patient_provisional_diagnosis->resetAttributes();
		$patient_provisional_diagnosis->RowAttrs = array_merge($patient_provisional_diagnosis->RowAttrs, array('data-rowindex'=>$patient_provisional_diagnosis_grid->RowIndex, 'id'=>'r0_patient_provisional_diagnosis', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_provisional_diagnosis->RowAttrs["class"], "ew-template");
		$patient_provisional_diagnosis->RowType = ROWTYPE_ADD;

		// Render row
		$patient_provisional_diagnosis_grid->renderRow();

		// Render list options
		$patient_provisional_diagnosis_grid->renderListOptions();
		$patient_provisional_diagnosis_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_provisional_diagnosis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_provisional_diagnosis_grid->ListOptions->render("body", "left", $patient_provisional_diagnosis_grid->RowIndex);
?>
	<?php if ($patient_provisional_diagnosis->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_id" class="form-group patient_provisional_diagnosis_id">
<span<?php echo $patient_provisional_diagnosis->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_id" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_id" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<?php if ($patient_provisional_diagnosis->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_mrnno" class="form-group patient_provisional_diagnosis_mrnno">
<span<?php echo $patient_provisional_diagnosis->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_mrnno" class="form-group patient_provisional_diagnosis_mrnno">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->mrnno->EditValue ?>"<?php echo $patient_provisional_diagnosis->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_mrnno" class="form-group patient_provisional_diagnosis_mrnno">
<span<?php echo $patient_provisional_diagnosis->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_provisional_diagnosis->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_PatientName" class="form-group patient_provisional_diagnosis_PatientName">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->PatientName->EditValue ?>"<?php echo $patient_provisional_diagnosis->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_PatientName" class="form-group patient_provisional_diagnosis_PatientName">
<span<?php echo $patient_provisional_diagnosis->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_PatID" class="form-group patient_provisional_diagnosis_PatID">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->PatID->EditValue ?>"<?php echo $patient_provisional_diagnosis->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_PatID" class="form-group patient_provisional_diagnosis_PatID">
<span<?php echo $patient_provisional_diagnosis->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_MobileNumber" class="form-group patient_provisional_diagnosis_MobileNumber">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->MobileNumber->EditValue ?>"<?php echo $patient_provisional_diagnosis->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_MobileNumber" class="form-group patient_provisional_diagnosis_MobileNumber">
<span<?php echo $patient_provisional_diagnosis->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->MobileNumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_provisional_diagnosis->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<?php if ($patient_provisional_diagnosis->Reception->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_Reception" class="form-group patient_provisional_diagnosis_Reception">
<span<?php echo $patient_provisional_diagnosis->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_Reception" class="form-group patient_provisional_diagnosis_Reception">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->Reception->EditValue ?>"<?php echo $patient_provisional_diagnosis->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_Reception" class="form-group patient_provisional_diagnosis_Reception">
<span<?php echo $patient_provisional_diagnosis->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<?php if ($patient_provisional_diagnosis->PatientId->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_PatientId" class="form-group patient_provisional_diagnosis_PatientId">
<span<?php echo $patient_provisional_diagnosis->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_PatientId" class="form-group patient_provisional_diagnosis_PatientId">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->PatientId->EditValue ?>"<?php echo $patient_provisional_diagnosis->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_PatientId" class="form-group patient_provisional_diagnosis_PatientId">
<span<?php echo $patient_provisional_diagnosis->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_provisional_diagnosis->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_Age" class="form-group patient_provisional_diagnosis_Age">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Age" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->Age->EditValue ?>"<?php echo $patient_provisional_diagnosis->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_Age" class="form-group patient_provisional_diagnosis_Age">
<span<?php echo $patient_provisional_diagnosis->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Age" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Age" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_Gender" class="form-group patient_provisional_diagnosis_Gender">
<input type="text" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_provisional_diagnosis->Gender->EditValue ?>"<?php echo $patient_provisional_diagnosis->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_Gender" class="form-group patient_provisional_diagnosis_Gender">
<span<?php echo $patient_provisional_diagnosis->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_provisional_diagnosis->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_provisional_diagnosis->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_provisional_diagnosis_HospID" class="form-group patient_provisional_diagnosis_HospID">
<span<?php echo $patient_provisional_diagnosis->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_provisional_diagnosis->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_HospID" name="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" id="x<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_provisional_diagnosis" data-field="x_HospID" name="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" id="o<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_provisional_diagnosis->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_provisional_diagnosis_grid->ListOptions->render("body", "right", $patient_provisional_diagnosis_grid->RowIndex);
?>
<script>
fpatient_provisional_diagnosisgrid.updateLists(<?php echo $patient_provisional_diagnosis_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_provisional_diagnosis->CurrentMode == "add" || $patient_provisional_diagnosis->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_provisional_diagnosis_grid->FormKeyCountName ?>" id="<?php echo $patient_provisional_diagnosis_grid->FormKeyCountName ?>" value="<?php echo $patient_provisional_diagnosis_grid->KeyCount ?>">
<?php echo $patient_provisional_diagnosis_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_provisional_diagnosis_grid->FormKeyCountName ?>" id="<?php echo $patient_provisional_diagnosis_grid->FormKeyCountName ?>" value="<?php echo $patient_provisional_diagnosis_grid->KeyCount ?>">
<?php echo $patient_provisional_diagnosis_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_provisional_diagnosisgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_provisional_diagnosis_grid->Recordset)
	$patient_provisional_diagnosis_grid->Recordset->Close();
?>
</div>
<?php if ($patient_provisional_diagnosis_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_provisional_diagnosis_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_provisional_diagnosis_grid->TotalRecs == 0 && !$patient_provisional_diagnosis->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_provisional_diagnosis_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_provisional_diagnosis_grid->terminate();
?>
<?php if (!$patient_provisional_diagnosis->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_provisional_diagnosis", "95%", "");
</script>
<?php } ?>
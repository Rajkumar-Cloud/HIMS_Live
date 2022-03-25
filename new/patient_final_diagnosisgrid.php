<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_final_diagnosis_grid))
	$patient_final_diagnosis_grid = new patient_final_diagnosis_grid();

// Run the page
$patient_final_diagnosis_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_final_diagnosis_grid->Page_Render();
?>
<?php if (!$patient_final_diagnosis_grid->isExport()) { ?>
<script>
var fpatient_final_diagnosisgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_final_diagnosisgrid = new ew.Form("fpatient_final_diagnosisgrid", "grid");
	fpatient_final_diagnosisgrid.formKeyCountName = '<?php echo $patient_final_diagnosis_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_final_diagnosisgrid.validate = function() {
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
			<?php if ($patient_final_diagnosis_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->id->caption(), $patient_final_diagnosis_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_grid->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->PatID->caption(), $patient_final_diagnosis_grid->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->PatientName->caption(), $patient_final_diagnosis_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->mrnno->caption(), $patient_final_diagnosis_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_grid->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->MobileNumber->caption(), $patient_final_diagnosis_grid->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->Age->caption(), $patient_final_diagnosis_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->Gender->caption(), $patient_final_diagnosis_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_grid->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->PatientId->caption(), $patient_final_diagnosis_grid->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->Reception->caption(), $patient_final_diagnosis_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_final_diagnosis_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_final_diagnosis_grid->HospID->caption(), $patient_final_diagnosis_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpatient_final_diagnosisgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
		if (ew.valueChanged(fobj, infix, "MobileNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "Age", false)) return false;
		if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
		if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_final_diagnosisgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_final_diagnosisgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_final_diagnosisgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_final_diagnosis_grid->renderOtherOptions();
?>
<?php if ($patient_final_diagnosis_grid->TotalRecords > 0 || $patient_final_diagnosis->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_final_diagnosis_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_final_diagnosis">
<?php if ($patient_final_diagnosis_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_final_diagnosis_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_final_diagnosisgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_final_diagnosis" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_final_diagnosisgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_final_diagnosis->RowType = ROWTYPE_HEADER;

// Render list options
$patient_final_diagnosis_grid->renderListOptions();

// Render list options (header, left)
$patient_final_diagnosis_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_final_diagnosis_grid->id->Visible) { // id ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_final_diagnosis_grid->id->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_id" class="patient_final_diagnosis_id"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_final_diagnosis_grid->id->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_id" class="patient_final_diagnosis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_grid->PatID->Visible) { // PatID ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_final_diagnosis_grid->PatID->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_PatID" class="patient_final_diagnosis_PatID"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_final_diagnosis_grid->PatID->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_PatID" class="patient_final_diagnosis_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_final_diagnosis_grid->PatientName->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_PatientName" class="patient_final_diagnosis_PatientName"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_final_diagnosis_grid->PatientName->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_PatientName" class="patient_final_diagnosis_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_final_diagnosis_grid->mrnno->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_mrnno" class="patient_final_diagnosis_mrnno"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_final_diagnosis_grid->mrnno->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_mrnno" class="patient_final_diagnosis_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_grid->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_final_diagnosis_grid->MobileNumber->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_MobileNumber" class="patient_final_diagnosis_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_final_diagnosis_grid->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_MobileNumber" class="patient_final_diagnosis_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_grid->Age->Visible) { // Age ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_final_diagnosis_grid->Age->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_Age" class="patient_final_diagnosis_Age"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_final_diagnosis_grid->Age->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_Age" class="patient_final_diagnosis_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_grid->Gender->Visible) { // Gender ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_final_diagnosis_grid->Gender->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_Gender" class="patient_final_diagnosis_Gender"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_final_diagnosis_grid->Gender->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_Gender" class="patient_final_diagnosis_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_grid->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_final_diagnosis_grid->PatientId->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_PatientId" class="patient_final_diagnosis_PatientId"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_final_diagnosis_grid->PatientId->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_PatientId" class="patient_final_diagnosis_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_grid->Reception->Visible) { // Reception ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_final_diagnosis_grid->Reception->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_Reception" class="patient_final_diagnosis_Reception"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_final_diagnosis_grid->Reception->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_Reception" class="patient_final_diagnosis_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_grid->HospID->Visible) { // HospID ?>
	<?php if ($patient_final_diagnosis_grid->SortUrl($patient_final_diagnosis_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_final_diagnosis_grid->HospID->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_HospID" class="patient_final_diagnosis_HospID"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_final_diagnosis_grid->HospID->headerCellClass() ?>"><div><div id="elh_patient_final_diagnosis_HospID" class="patient_final_diagnosis_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_final_diagnosis_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_final_diagnosis_grid->StartRecord = 1;
$patient_final_diagnosis_grid->StopRecord = $patient_final_diagnosis_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_final_diagnosis->isConfirm() || $patient_final_diagnosis_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_final_diagnosis_grid->FormKeyCountName) && ($patient_final_diagnosis_grid->isGridAdd() || $patient_final_diagnosis_grid->isGridEdit() || $patient_final_diagnosis->isConfirm())) {
		$patient_final_diagnosis_grid->KeyCount = $CurrentForm->getValue($patient_final_diagnosis_grid->FormKeyCountName);
		$patient_final_diagnosis_grid->StopRecord = $patient_final_diagnosis_grid->StartRecord + $patient_final_diagnosis_grid->KeyCount - 1;
	}
}
$patient_final_diagnosis_grid->RecordCount = $patient_final_diagnosis_grid->StartRecord - 1;
if ($patient_final_diagnosis_grid->Recordset && !$patient_final_diagnosis_grid->Recordset->EOF) {
	$patient_final_diagnosis_grid->Recordset->moveFirst();
	$selectLimit = $patient_final_diagnosis_grid->UseSelectLimit;
	if (!$selectLimit && $patient_final_diagnosis_grid->StartRecord > 1)
		$patient_final_diagnosis_grid->Recordset->move($patient_final_diagnosis_grid->StartRecord - 1);
} elseif (!$patient_final_diagnosis->AllowAddDeleteRow && $patient_final_diagnosis_grid->StopRecord == 0) {
	$patient_final_diagnosis_grid->StopRecord = $patient_final_diagnosis->GridAddRowCount;
}

// Initialize aggregate
$patient_final_diagnosis->RowType = ROWTYPE_AGGREGATEINIT;
$patient_final_diagnosis->resetAttributes();
$patient_final_diagnosis_grid->renderRow();
if ($patient_final_diagnosis_grid->isGridAdd())
	$patient_final_diagnosis_grid->RowIndex = 0;
if ($patient_final_diagnosis_grid->isGridEdit())
	$patient_final_diagnosis_grid->RowIndex = 0;
while ($patient_final_diagnosis_grid->RecordCount < $patient_final_diagnosis_grid->StopRecord) {
	$patient_final_diagnosis_grid->RecordCount++;
	if ($patient_final_diagnosis_grid->RecordCount >= $patient_final_diagnosis_grid->StartRecord) {
		$patient_final_diagnosis_grid->RowCount++;
		if ($patient_final_diagnosis_grid->isGridAdd() || $patient_final_diagnosis_grid->isGridEdit() || $patient_final_diagnosis->isConfirm()) {
			$patient_final_diagnosis_grid->RowIndex++;
			$CurrentForm->Index = $patient_final_diagnosis_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_final_diagnosis_grid->FormActionName) && ($patient_final_diagnosis->isConfirm() || $patient_final_diagnosis_grid->EventCancelled))
				$patient_final_diagnosis_grid->RowAction = strval($CurrentForm->getValue($patient_final_diagnosis_grid->FormActionName));
			elseif ($patient_final_diagnosis_grid->isGridAdd())
				$patient_final_diagnosis_grid->RowAction = "insert";
			else
				$patient_final_diagnosis_grid->RowAction = "";
		}

		// Set up key count
		$patient_final_diagnosis_grid->KeyCount = $patient_final_diagnosis_grid->RowIndex;

		// Init row class and style
		$patient_final_diagnosis->resetAttributes();
		$patient_final_diagnosis->CssClass = "";
		if ($patient_final_diagnosis_grid->isGridAdd()) {
			if ($patient_final_diagnosis->CurrentMode == "copy") {
				$patient_final_diagnosis_grid->loadRowValues($patient_final_diagnosis_grid->Recordset); // Load row values
				$patient_final_diagnosis_grid->setRecordKey($patient_final_diagnosis_grid->RowOldKey, $patient_final_diagnosis_grid->Recordset); // Set old record key
			} else {
				$patient_final_diagnosis_grid->loadRowValues(); // Load default values
				$patient_final_diagnosis_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_final_diagnosis_grid->loadRowValues($patient_final_diagnosis_grid->Recordset); // Load row values
		}
		$patient_final_diagnosis->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_final_diagnosis_grid->isGridAdd()) // Grid add
			$patient_final_diagnosis->RowType = ROWTYPE_ADD; // Render add
		if ($patient_final_diagnosis_grid->isGridAdd() && $patient_final_diagnosis->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_final_diagnosis_grid->restoreCurrentRowFormValues($patient_final_diagnosis_grid->RowIndex); // Restore form values
		if ($patient_final_diagnosis_grid->isGridEdit()) { // Grid edit
			if ($patient_final_diagnosis->EventCancelled)
				$patient_final_diagnosis_grid->restoreCurrentRowFormValues($patient_final_diagnosis_grid->RowIndex); // Restore form values
			if ($patient_final_diagnosis_grid->RowAction == "insert")
				$patient_final_diagnosis->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_final_diagnosis->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_final_diagnosis_grid->isGridEdit() && ($patient_final_diagnosis->RowType == ROWTYPE_EDIT || $patient_final_diagnosis->RowType == ROWTYPE_ADD) && $patient_final_diagnosis->EventCancelled) // Update failed
			$patient_final_diagnosis_grid->restoreCurrentRowFormValues($patient_final_diagnosis_grid->RowIndex); // Restore form values
		if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) // Edit row
			$patient_final_diagnosis_grid->EditRowCount++;
		if ($patient_final_diagnosis->isConfirm()) // Confirm row
			$patient_final_diagnosis_grid->restoreCurrentRowFormValues($patient_final_diagnosis_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_final_diagnosis->RowAttrs->merge(["data-rowindex" => $patient_final_diagnosis_grid->RowCount, "id" => "r" . $patient_final_diagnosis_grid->RowCount . "_patient_final_diagnosis", "data-rowtype" => $patient_final_diagnosis->RowType]);

		// Render row
		$patient_final_diagnosis_grid->renderRow();

		// Render list options
		$patient_final_diagnosis_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_final_diagnosis_grid->RowAction != "delete" && $patient_final_diagnosis_grid->RowAction != "insertdelete" && !($patient_final_diagnosis_grid->RowAction == "insert" && $patient_final_diagnosis->isConfirm() && $patient_final_diagnosis_grid->emptyRow())) {
?>
	<tr <?php echo $patient_final_diagnosis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_final_diagnosis_grid->ListOptions->render("body", "left", $patient_final_diagnosis_grid->RowCount);
?>
	<?php if ($patient_final_diagnosis_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_final_diagnosis_grid->id->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_id" class="form-group"></span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_id" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_id" class="form-group">
<span<?php echo $patient_final_diagnosis_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_id" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_id">
<span<?php echo $patient_final_diagnosis_grid->id->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_id" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_id" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_id" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_id" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_final_diagnosis_grid->PatID->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatID" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatID" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->PatID->EditValue ?>"<?php echo $patient_final_diagnosis_grid->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatID" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatID" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatID" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->PatID->EditValue ?>"<?php echo $patient_final_diagnosis_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatID">
<span<?php echo $patient_final_diagnosis_grid->PatID->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatID" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatID" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatID" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatID" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_final_diagnosis_grid->PatientName->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatientName" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->PatientName->EditValue ?>"<?php echo $patient_final_diagnosis_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientName" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatientName" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->PatientName->EditValue ?>"<?php echo $patient_final_diagnosis_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatientName">
<span<?php echo $patient_final_diagnosis_grid->PatientName->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientName" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientName" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientName" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_final_diagnosis_grid->mrnno->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_final_diagnosis_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_mrnno" class="form-group">
<span<?php echo $patient_final_diagnosis_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_mrnno" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->mrnno->EditValue ?>"<?php echo $patient_final_diagnosis_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_mrnno" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_mrnno" class="form-group">
<span<?php echo $patient_final_diagnosis_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_mrnno">
<span<?php echo $patient_final_diagnosis_grid->mrnno->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_mrnno" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_mrnno" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_mrnno" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_final_diagnosis_grid->MobileNumber->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_MobileNumber" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->MobileNumber->EditValue ?>"<?php echo $patient_final_diagnosis_grid->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_MobileNumber" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->MobileNumber->EditValue ?>"<?php echo $patient_final_diagnosis_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_MobileNumber">
<span<?php echo $patient_final_diagnosis_grid->MobileNumber->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_final_diagnosis_grid->Age->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Age" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Age" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->Age->EditValue ?>"<?php echo $patient_final_diagnosis_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Age" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Age" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Age" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->Age->EditValue ?>"<?php echo $patient_final_diagnosis_grid->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Age">
<span<?php echo $patient_final_diagnosis_grid->Age->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Age" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Age" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Age" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Age" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_final_diagnosis_grid->Gender->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Gender" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Gender" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->Gender->EditValue ?>"<?php echo $patient_final_diagnosis_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Gender" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Gender" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Gender" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->Gender->EditValue ?>"<?php echo $patient_final_diagnosis_grid->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Gender">
<span<?php echo $patient_final_diagnosis_grid->Gender->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Gender" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Gender" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Gender" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Gender" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_final_diagnosis_grid->PatientId->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_final_diagnosis_grid->PatientId->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatientId" class="form-group">
<span<?php echo $patient_final_diagnosis_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatientId" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->PatientId->EditValue ?>"<?php echo $patient_final_diagnosis_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientId" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatientId" class="form-group">
<span<?php echo $patient_final_diagnosis_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->PatientId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_PatientId">
<span<?php echo $patient_final_diagnosis_grid->PatientId->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientId" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientId" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientId" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_final_diagnosis_grid->Reception->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_final_diagnosis_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Reception" class="form-group">
<span<?php echo $patient_final_diagnosis_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Reception" class="form-group">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Reception" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->Reception->EditValue ?>"<?php echo $patient_final_diagnosis_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Reception" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Reception" class="form-group">
<span<?php echo $patient_final_diagnosis_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Reception" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_Reception">
<span<?php echo $patient_final_diagnosis_grid->Reception->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Reception" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Reception" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Reception" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Reception" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_final_diagnosis_grid->HospID->cellAttributes() ?>>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_HospID" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_final_diagnosis_grid->RowCount ?>_patient_final_diagnosis_HospID">
<span<?php echo $patient_final_diagnosis_grid->HospID->viewAttributes() ?>><?php echo $patient_final_diagnosis_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_HospID" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_HospID" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_HospID" name="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" id="fpatient_final_diagnosisgrid$x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_HospID" name="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" id="fpatient_final_diagnosisgrid$o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_final_diagnosis_grid->ListOptions->render("body", "right", $patient_final_diagnosis_grid->RowCount);
?>
	</tr>
<?php if ($patient_final_diagnosis->RowType == ROWTYPE_ADD || $patient_final_diagnosis->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_final_diagnosisgrid", "load"], function() {
	fpatient_final_diagnosisgrid.updateLists(<?php echo $patient_final_diagnosis_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_final_diagnosis_grid->isGridAdd() || $patient_final_diagnosis->CurrentMode == "copy")
		if (!$patient_final_diagnosis_grid->Recordset->EOF)
			$patient_final_diagnosis_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_final_diagnosis->CurrentMode == "add" || $patient_final_diagnosis->CurrentMode == "copy" || $patient_final_diagnosis->CurrentMode == "edit") {
		$patient_final_diagnosis_grid->RowIndex = '$rowindex$';
		$patient_final_diagnosis_grid->loadRowValues();

		// Set row properties
		$patient_final_diagnosis->resetAttributes();
		$patient_final_diagnosis->RowAttrs->merge(["data-rowindex" => $patient_final_diagnosis_grid->RowIndex, "id" => "r0_patient_final_diagnosis", "data-rowtype" => ROWTYPE_ADD]);
		$patient_final_diagnosis->RowAttrs->appendClass("ew-template");
		$patient_final_diagnosis->RowType = ROWTYPE_ADD;

		// Render row
		$patient_final_diagnosis_grid->renderRow();

		// Render list options
		$patient_final_diagnosis_grid->renderListOptions();
		$patient_final_diagnosis_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_final_diagnosis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_final_diagnosis_grid->ListOptions->render("body", "left", $patient_final_diagnosis_grid->RowIndex);
?>
	<?php if ($patient_final_diagnosis_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_final_diagnosis_id" class="form-group patient_final_diagnosis_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_id" class="form-group patient_final_diagnosis_id">
<span<?php echo $patient_final_diagnosis_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_id" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_id" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_final_diagnosis_PatID" class="form-group patient_final_diagnosis_PatID">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatID" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->PatID->EditValue ?>"<?php echo $patient_final_diagnosis_grid->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_PatID" class="form-group patient_final_diagnosis_PatID">
<span<?php echo $patient_final_diagnosis_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatID" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatID" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_final_diagnosis_PatientName" class="form-group patient_final_diagnosis_PatientName">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->PatientName->EditValue ?>"<?php echo $patient_final_diagnosis_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_PatientName" class="form-group patient_final_diagnosis_PatientName">
<span<?php echo $patient_final_diagnosis_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientName" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientName" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<?php if ($patient_final_diagnosis_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_final_diagnosis_mrnno" class="form-group patient_final_diagnosis_mrnno">
<span<?php echo $patient_final_diagnosis_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_mrnno" class="form-group patient_final_diagnosis_mrnno">
<input type="text" data-table="patient_final_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->mrnno->EditValue ?>"<?php echo $patient_final_diagnosis_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_mrnno" class="form-group patient_final_diagnosis_mrnno">
<span<?php echo $patient_final_diagnosis_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_mrnno" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_mrnno" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_final_diagnosis_MobileNumber" class="form-group patient_final_diagnosis_MobileNumber">
<input type="text" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->MobileNumber->EditValue ?>"<?php echo $patient_final_diagnosis_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_MobileNumber" class="form-group patient_final_diagnosis_MobileNumber">
<span<?php echo $patient_final_diagnosis_grid->MobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->MobileNumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_MobileNumber" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_final_diagnosis_Age" class="form-group patient_final_diagnosis_Age">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Age" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->Age->EditValue ?>"<?php echo $patient_final_diagnosis_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_Age" class="form-group patient_final_diagnosis_Age">
<span<?php echo $patient_final_diagnosis_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Age" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Age" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<span id="el$rowindex$_patient_final_diagnosis_Gender" class="form-group patient_final_diagnosis_Gender">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Gender" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->Gender->EditValue ?>"<?php echo $patient_final_diagnosis_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_Gender" class="form-group patient_final_diagnosis_Gender">
<span<?php echo $patient_final_diagnosis_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Gender" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Gender" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<?php if ($patient_final_diagnosis_grid->PatientId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_final_diagnosis_PatientId" class="form-group patient_final_diagnosis_PatientId">
<span<?php echo $patient_final_diagnosis_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_PatientId" class="form-group patient_final_diagnosis_PatientId">
<input type="text" data-table="patient_final_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->PatientId->EditValue ?>"<?php echo $patient_final_diagnosis_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_PatientId" class="form-group patient_final_diagnosis_PatientId">
<span<?php echo $patient_final_diagnosis_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientId" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_PatientId" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<?php if ($patient_final_diagnosis_grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_final_diagnosis_Reception" class="form-group patient_final_diagnosis_Reception">
<span<?php echo $patient_final_diagnosis_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_Reception" class="form-group patient_final_diagnosis_Reception">
<input type="text" data-table="patient_final_diagnosis" data-field="x_Reception" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_final_diagnosis_grid->Reception->EditValue ?>"<?php echo $patient_final_diagnosis_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_Reception" class="form-group patient_final_diagnosis_Reception">
<span<?php echo $patient_final_diagnosis_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Reception" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_Reception" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_final_diagnosis->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_final_diagnosis_HospID" class="form-group patient_final_diagnosis_HospID">
<span<?php echo $patient_final_diagnosis_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_final_diagnosis_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_HospID" name="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" id="x<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_final_diagnosis" data-field="x_HospID" name="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" id="o<?php echo $patient_final_diagnosis_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_final_diagnosis_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_final_diagnosis_grid->ListOptions->render("body", "right", $patient_final_diagnosis_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_final_diagnosisgrid", "load"], function() {
	fpatient_final_diagnosisgrid.updateLists(<?php echo $patient_final_diagnosis_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_final_diagnosis->CurrentMode == "add" || $patient_final_diagnosis->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_final_diagnosis_grid->FormKeyCountName ?>" id="<?php echo $patient_final_diagnosis_grid->FormKeyCountName ?>" value="<?php echo $patient_final_diagnosis_grid->KeyCount ?>">
<?php echo $patient_final_diagnosis_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_final_diagnosis->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_final_diagnosis_grid->FormKeyCountName ?>" id="<?php echo $patient_final_diagnosis_grid->FormKeyCountName ?>" value="<?php echo $patient_final_diagnosis_grid->KeyCount ?>">
<?php echo $patient_final_diagnosis_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_final_diagnosis->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_final_diagnosisgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_final_diagnosis_grid->Recordset)
	$patient_final_diagnosis_grid->Recordset->Close();
?>
<?php if ($patient_final_diagnosis_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_final_diagnosis_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_final_diagnosis_grid->TotalRecords == 0 && !$patient_final_diagnosis->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_final_diagnosis_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_final_diagnosis_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_final_diagnosis",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_final_diagnosis_grid->terminate();
?>
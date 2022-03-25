<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$patient_prescription_grid->isExport()) { ?>
<script>
var fpatient_prescriptiongrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_prescriptiongrid = new ew.Form("fpatient_prescriptiongrid", "grid");
	fpatient_prescriptiongrid.formKeyCountName = '<?php echo $patient_prescription_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_prescriptiongrid.validate = function() {
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
			<?php if ($patient_prescription_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->id->caption(), $patient_prescription_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->Reception->caption(), $patient_prescription_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->PatientId->caption(), $patient_prescription_grid->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->PatientName->caption(), $patient_prescription_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->Medicine->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->Medicine->caption(), $patient_prescription_grid->Medicine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->M->Required) { ?>
				elm = this.getElements("x" + infix + "_M");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->M->caption(), $patient_prescription_grid->M->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->A->Required) { ?>
				elm = this.getElements("x" + infix + "_A");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->A->caption(), $patient_prescription_grid->A->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->N->Required) { ?>
				elm = this.getElements("x" + infix + "_N");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->N->caption(), $patient_prescription_grid->N->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->NoOfDays->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfDays");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->NoOfDays->caption(), $patient_prescription_grid->NoOfDays->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->PreRoute->Required) { ?>
				elm = this.getElements("x" + infix + "_PreRoute");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->PreRoute->caption(), $patient_prescription_grid->PreRoute->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->TimeOfTaking->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeOfTaking");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->TimeOfTaking->caption(), $patient_prescription_grid->TimeOfTaking->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->Type->caption(), $patient_prescription_grid->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->mrnno->caption(), $patient_prescription_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->Age->caption(), $patient_prescription_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->Gender->caption(), $patient_prescription_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->profilePic->caption(), $patient_prescription_grid->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->Status->caption(), $patient_prescription_grid->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->CreatedBy->caption(), $patient_prescription_grid->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->CreateDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreateDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->CreateDateTime->caption(), $patient_prescription_grid->CreateDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->ModifiedBy->caption(), $patient_prescription_grid->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_grid->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_grid->ModifiedDateTime->caption(), $patient_prescription_grid->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_prescriptiongrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_prescriptiongrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_prescriptiongrid.lists["x_Medicine"] = <?php echo $patient_prescription_grid->Medicine->Lookup->toClientList($patient_prescription_grid) ?>;
	fpatient_prescriptiongrid.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_grid->Medicine->lookupOptions()) ?>;
	fpatient_prescriptiongrid.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_prescriptiongrid.lists["x_PreRoute"] = <?php echo $patient_prescription_grid->PreRoute->Lookup->toClientList($patient_prescription_grid) ?>;
	fpatient_prescriptiongrid.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_grid->PreRoute->lookupOptions()) ?>;
	fpatient_prescriptiongrid.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_prescriptiongrid.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_grid->TimeOfTaking->Lookup->toClientList($patient_prescription_grid) ?>;
	fpatient_prescriptiongrid.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_grid->TimeOfTaking->lookupOptions()) ?>;
	fpatient_prescriptiongrid.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_prescriptiongrid.lists["x_Type"] = <?php echo $patient_prescription_grid->Type->Lookup->toClientList($patient_prescription_grid) ?>;
	fpatient_prescriptiongrid.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_grid->Type->options(FALSE, TRUE)) ?>;
	fpatient_prescriptiongrid.lists["x_Status"] = <?php echo $patient_prescription_grid->Status->Lookup->toClientList($patient_prescription_grid) ?>;
	fpatient_prescriptiongrid.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_grid->Status->lookupOptions()) ?>;
	loadjs.done("fpatient_prescriptiongrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_prescription_grid->renderOtherOptions();
?>
<?php if ($patient_prescription_grid->TotalRecords > 0 || $patient_prescription->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_prescription_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_prescription">
<?php if ($patient_prescription_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_prescription_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_prescriptiongrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_prescription" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_prescriptiongrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_prescription->RowType = ROWTYPE_HEADER;

// Render list options
$patient_prescription_grid->renderListOptions();

// Render list options (header, left)
$patient_prescription_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_prescription_grid->id->Visible) { // id ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_prescription_grid->id->headerCellClass() ?>"><div id="elh_patient_prescription_id" class="patient_prescription_id"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_prescription_grid->id->headerCellClass() ?>"><div><div id="elh_patient_prescription_id" class="patient_prescription_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->Reception->Visible) { // Reception ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_prescription_grid->Reception->headerCellClass() ?>"><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_prescription_grid->Reception->headerCellClass() ?>"><div><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_prescription_grid->PatientId->headerCellClass() ?>"><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_prescription_grid->PatientId->headerCellClass() ?>"><div><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_prescription_grid->PatientName->headerCellClass() ?>"><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_prescription_grid->PatientName->headerCellClass() ?>"><div><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->Medicine->Visible) { // Medicine ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->Medicine) == "") { ?>
		<th data-name="Medicine" class="<?php echo $patient_prescription_grid->Medicine->headerCellClass() ?>" style="width: 20px;"><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->Medicine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medicine" class="<?php echo $patient_prescription_grid->Medicine->headerCellClass() ?>" style="width: 20px;"><div><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->Medicine->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->Medicine->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->Medicine->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->M->Visible) { // M ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->M) == "") { ?>
		<th data-name="M" class="<?php echo $patient_prescription_grid->M->headerCellClass() ?>"><div id="elh_patient_prescription_M" class="patient_prescription_M"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->M->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M" class="<?php echo $patient_prescription_grid->M->headerCellClass() ?>"><div><div id="elh_patient_prescription_M" class="patient_prescription_M">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->M->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->M->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->M->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->A->Visible) { // A ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->A) == "") { ?>
		<th data-name="A" class="<?php echo $patient_prescription_grid->A->headerCellClass() ?>"><div id="elh_patient_prescription_A" class="patient_prescription_A"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->A->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A" class="<?php echo $patient_prescription_grid->A->headerCellClass() ?>"><div><div id="elh_patient_prescription_A" class="patient_prescription_A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->A->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->A->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->A->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->N->Visible) { // N ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->N) == "") { ?>
		<th data-name="N" class="<?php echo $patient_prescription_grid->N->headerCellClass() ?>"><div id="elh_patient_prescription_N" class="patient_prescription_N"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->N->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="N" class="<?php echo $patient_prescription_grid->N->headerCellClass() ?>"><div><div id="elh_patient_prescription_N" class="patient_prescription_N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->N->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->N->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->N->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->NoOfDays->Visible) { // NoOfDays ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->NoOfDays) == "") { ?>
		<th data-name="NoOfDays" class="<?php echo $patient_prescription_grid->NoOfDays->headerCellClass() ?>"><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->NoOfDays->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfDays" class="<?php echo $patient_prescription_grid->NoOfDays->headerCellClass() ?>"><div><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->NoOfDays->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->NoOfDays->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->NoOfDays->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->PreRoute->Visible) { // PreRoute ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->PreRoute) == "") { ?>
		<th data-name="PreRoute" class="<?php echo $patient_prescription_grid->PreRoute->headerCellClass() ?>"><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->PreRoute->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreRoute" class="<?php echo $patient_prescription_grid->PreRoute->headerCellClass() ?>"><div><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->PreRoute->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->PreRoute->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->PreRoute->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->TimeOfTaking) == "") { ?>
		<th data-name="TimeOfTaking" class="<?php echo $patient_prescription_grid->TimeOfTaking->headerCellClass() ?>"><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->TimeOfTaking->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeOfTaking" class="<?php echo $patient_prescription_grid->TimeOfTaking->headerCellClass() ?>"><div><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->TimeOfTaking->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->TimeOfTaking->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->TimeOfTaking->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->Type->Visible) { // Type ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $patient_prescription_grid->Type->headerCellClass() ?>" style="width: 12px;"><div id="elh_patient_prescription_Type" class="patient_prescription_Type"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $patient_prescription_grid->Type->headerCellClass() ?>" style="width: 12px;"><div><div id="elh_patient_prescription_Type" class="patient_prescription_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_prescription_grid->mrnno->headerCellClass() ?>"><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_prescription_grid->mrnno->headerCellClass() ?>"><div><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->Age->Visible) { // Age ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_prescription_grid->Age->headerCellClass() ?>"><div id="elh_patient_prescription_Age" class="patient_prescription_Age"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_prescription_grid->Age->headerCellClass() ?>"><div><div id="elh_patient_prescription_Age" class="patient_prescription_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->Gender->Visible) { // Gender ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_prescription_grid->Gender->headerCellClass() ?>"><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_prescription_grid->Gender->headerCellClass() ?>"><div><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->profilePic->Visible) { // profilePic ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $patient_prescription_grid->profilePic->headerCellClass() ?>"><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $patient_prescription_grid->profilePic->headerCellClass() ?>"><div><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->profilePic->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->Status->Visible) { // Status ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $patient_prescription_grid->Status->headerCellClass() ?>"><div id="elh_patient_prescription_Status" class="patient_prescription_Status"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $patient_prescription_grid->Status->headerCellClass() ?>"><div><div id="elh_patient_prescription_Status" class="patient_prescription_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_prescription_grid->CreatedBy->headerCellClass() ?>"><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_prescription_grid->CreatedBy->headerCellClass() ?>"><div><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->CreatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->CreatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->CreateDateTime->Visible) { // CreateDateTime ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->CreateDateTime) == "") { ?>
		<th data-name="CreateDateTime" class="<?php echo $patient_prescription_grid->CreateDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->CreateDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreateDateTime" class="<?php echo $patient_prescription_grid->CreateDateTime->headerCellClass() ?>"><div><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->CreateDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->CreateDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->CreateDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_prescription_grid->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_prescription_grid->ModifiedBy->headerCellClass() ?>"><div><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->ModifiedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->ModifiedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($patient_prescription_grid->SortUrl($patient_prescription_grid->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $patient_prescription_grid->ModifiedDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime"><div class="ew-table-header-caption"><?php echo $patient_prescription_grid->ModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $patient_prescription_grid->ModifiedDateTime->headerCellClass() ?>"><div><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_grid->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_grid->ModifiedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_grid->ModifiedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$patient_prescription_grid->StartRecord = 1;
$patient_prescription_grid->StopRecord = $patient_prescription_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_prescription->isConfirm() || $patient_prescription_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_prescription_grid->FormKeyCountName) && ($patient_prescription_grid->isGridAdd() || $patient_prescription_grid->isGridEdit() || $patient_prescription->isConfirm())) {
		$patient_prescription_grid->KeyCount = $CurrentForm->getValue($patient_prescription_grid->FormKeyCountName);
		$patient_prescription_grid->StopRecord = $patient_prescription_grid->StartRecord + $patient_prescription_grid->KeyCount - 1;
	}
}
$patient_prescription_grid->RecordCount = $patient_prescription_grid->StartRecord - 1;
if ($patient_prescription_grid->Recordset && !$patient_prescription_grid->Recordset->EOF) {
	$patient_prescription_grid->Recordset->moveFirst();
	$selectLimit = $patient_prescription_grid->UseSelectLimit;
	if (!$selectLimit && $patient_prescription_grid->StartRecord > 1)
		$patient_prescription_grid->Recordset->move($patient_prescription_grid->StartRecord - 1);
} elseif (!$patient_prescription->AllowAddDeleteRow && $patient_prescription_grid->StopRecord == 0) {
	$patient_prescription_grid->StopRecord = $patient_prescription->GridAddRowCount;
}

// Initialize aggregate
$patient_prescription->RowType = ROWTYPE_AGGREGATEINIT;
$patient_prescription->resetAttributes();
$patient_prescription_grid->renderRow();
if ($patient_prescription_grid->isGridAdd())
	$patient_prescription_grid->RowIndex = 0;
if ($patient_prescription_grid->isGridEdit())
	$patient_prescription_grid->RowIndex = 0;
while ($patient_prescription_grid->RecordCount < $patient_prescription_grid->StopRecord) {
	$patient_prescription_grid->RecordCount++;
	if ($patient_prescription_grid->RecordCount >= $patient_prescription_grid->StartRecord) {
		$patient_prescription_grid->RowCount++;
		if ($patient_prescription_grid->isGridAdd() || $patient_prescription_grid->isGridEdit() || $patient_prescription->isConfirm()) {
			$patient_prescription_grid->RowIndex++;
			$CurrentForm->Index = $patient_prescription_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_prescription_grid->FormActionName) && ($patient_prescription->isConfirm() || $patient_prescription_grid->EventCancelled))
				$patient_prescription_grid->RowAction = strval($CurrentForm->getValue($patient_prescription_grid->FormActionName));
			elseif ($patient_prescription_grid->isGridAdd())
				$patient_prescription_grid->RowAction = "insert";
			else
				$patient_prescription_grid->RowAction = "";
		}

		// Set up key count
		$patient_prescription_grid->KeyCount = $patient_prescription_grid->RowIndex;

		// Init row class and style
		$patient_prescription->resetAttributes();
		$patient_prescription->CssClass = "";
		if ($patient_prescription_grid->isGridAdd()) {
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
		if ($patient_prescription_grid->isGridAdd()) // Grid add
			$patient_prescription->RowType = ROWTYPE_ADD; // Render add
		if ($patient_prescription_grid->isGridAdd() && $patient_prescription->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_prescription_grid->restoreCurrentRowFormValues($patient_prescription_grid->RowIndex); // Restore form values
		if ($patient_prescription_grid->isGridEdit()) { // Grid edit
			if ($patient_prescription->EventCancelled)
				$patient_prescription_grid->restoreCurrentRowFormValues($patient_prescription_grid->RowIndex); // Restore form values
			if ($patient_prescription_grid->RowAction == "insert")
				$patient_prescription->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_prescription->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_prescription_grid->isGridEdit() && ($patient_prescription->RowType == ROWTYPE_EDIT || $patient_prescription->RowType == ROWTYPE_ADD) && $patient_prescription->EventCancelled) // Update failed
			$patient_prescription_grid->restoreCurrentRowFormValues($patient_prescription_grid->RowIndex); // Restore form values
		if ($patient_prescription->RowType == ROWTYPE_EDIT) // Edit row
			$patient_prescription_grid->EditRowCount++;
		if ($patient_prescription->isConfirm()) // Confirm row
			$patient_prescription_grid->restoreCurrentRowFormValues($patient_prescription_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_prescription->RowAttrs->merge(["data-rowindex" => $patient_prescription_grid->RowCount, "id" => "r" . $patient_prescription_grid->RowCount . "_patient_prescription", "data-rowtype" => $patient_prescription->RowType]);

		// Render row
		$patient_prescription_grid->renderRow();

		// Render list options
		$patient_prescription_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_prescription_grid->RowAction != "delete" && $patient_prescription_grid->RowAction != "insertdelete" && !($patient_prescription_grid->RowAction == "insert" && $patient_prescription->isConfirm() && $patient_prescription_grid->emptyRow())) {
?>
	<tr <?php echo $patient_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_grid->ListOptions->render("body", "left", $patient_prescription_grid->RowCount);
?>
	<?php if ($patient_prescription_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_prescription_grid->id->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_id" class="form-group"></span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_grid->RowIndex ?>_id" id="o<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_id" class="form-group">
<span<?php echo $patient_prescription_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x<?php echo $patient_prescription_grid->RowIndex ?>_id" id="x<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_id">
<span<?php echo $patient_prescription_grid->id->viewAttributes() ?>><?php echo $patient_prescription_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x<?php echo $patient_prescription_grid->RowIndex ?>_id" id="x<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_grid->RowIndex ?>_id" id="o<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_id" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_id" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_prescription_grid->Reception->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Reception" class="form-group">
<span<?php echo $patient_prescription_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Reception" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->Reception->EditValue ?>"<?php echo $patient_prescription_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Reception" class="form-group">
<span<?php echo $patient_prescription_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Reception">
<span<?php echo $patient_prescription_grid->Reception->viewAttributes() ?>><?php echo $patient_prescription_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_prescription_grid->PatientId->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription_grid->PatientId->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PatientId" class="form-group">
<span<?php echo $patient_prescription_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PatientId" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->PatientId->EditValue ?>"<?php echo $patient_prescription_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PatientId" class="form-group">
<span<?php echo $patient_prescription_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->PatientId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PatientId">
<span<?php echo $patient_prescription_grid->PatientId->viewAttributes() ?>><?php echo $patient_prescription_grid->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_prescription_grid->PatientName->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PatientName" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->PatientName->EditValue ?>"<?php echo $patient_prescription_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PatientName" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->PatientName->EditValue ?>"<?php echo $patient_prescription_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PatientName">
<span<?php echo $patient_prescription_grid->PatientName->viewAttributes() ?>><?php echo $patient_prescription_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine" <?php echo $patient_prescription_grid->Medicine->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Medicine" class="form-group">
<?php
$onchange = $patient_prescription_grid->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_grid->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription_grid->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_grid->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription_grid->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_prescription_grid->Medicine->ReadOnly || $patient_prescription_grid->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription_grid->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
	fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine","forceSelect":false});
});
</script>
<?php echo $patient_prescription_grid->Medicine->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_Medicine") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Medicine" class="form-group">
<?php
$onchange = $patient_prescription_grid->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_grid->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription_grid->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_grid->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription_grid->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_prescription_grid->Medicine->ReadOnly || $patient_prescription_grid->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription_grid->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
	fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine","forceSelect":false});
});
</script>
<?php echo $patient_prescription_grid->Medicine->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_Medicine") ?>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Medicine">
<span<?php echo $patient_prescription_grid->Medicine->viewAttributes() ?>><?php echo $patient_prescription_grid->Medicine->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->M->Visible) { // M ?>
		<td data-name="M" <?php echo $patient_prescription_grid->M->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_M" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->M->EditValue ?>"<?php echo $patient_prescription_grid->M->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_grid->RowIndex ?>_M" id="o<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription_grid->M->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_M" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->M->EditValue ?>"<?php echo $patient_prescription_grid->M->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_M">
<span<?php echo $patient_prescription_grid->M->viewAttributes() ?>><?php echo $patient_prescription_grid->M->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription_grid->M->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_grid->RowIndex ?>_M" id="o<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription_grid->M->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription_grid->M->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_M" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription_grid->M->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->A->Visible) { // A ?>
		<td data-name="A" <?php echo $patient_prescription_grid->A->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_A" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->A->EditValue ?>"<?php echo $patient_prescription_grid->A->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_grid->RowIndex ?>_A" id="o<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription_grid->A->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_A" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->A->EditValue ?>"<?php echo $patient_prescription_grid->A->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_A">
<span<?php echo $patient_prescription_grid->A->viewAttributes() ?>><?php echo $patient_prescription_grid->A->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription_grid->A->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_grid->RowIndex ?>_A" id="o<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription_grid->A->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription_grid->A->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_A" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription_grid->A->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->N->Visible) { // N ?>
		<td data-name="N" <?php echo $patient_prescription_grid->N->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_N" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->N->EditValue ?>"<?php echo $patient_prescription_grid->N->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_grid->RowIndex ?>_N" id="o<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription_grid->N->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_N" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->N->EditValue ?>"<?php echo $patient_prescription_grid->N->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_N">
<span<?php echo $patient_prescription_grid->N->viewAttributes() ?>><?php echo $patient_prescription_grid->N->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription_grid->N->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_grid->RowIndex ?>_N" id="o<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription_grid->N->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription_grid->N->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_N" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription_grid->N->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays" <?php echo $patient_prescription_grid->NoOfDays->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_NoOfDays" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->NoOfDays->EditValue ?>"<?php echo $patient_prescription_grid->NoOfDays->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_NoOfDays" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->NoOfDays->EditValue ?>"<?php echo $patient_prescription_grid->NoOfDays->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_NoOfDays">
<span<?php echo $patient_prescription_grid->NoOfDays->viewAttributes() ?>><?php echo $patient_prescription_grid->NoOfDays->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute" <?php echo $patient_prescription_grid->PreRoute->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PreRoute" class="form-group">
<?php
$onchange = $patient_prescription_grid->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_grid->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription_grid->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->PreRoute->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription_grid->PreRoute->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_grid->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription_grid->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription_grid->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
	fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
});
</script>
<?php echo $patient_prescription_grid->PreRoute->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_PreRoute") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PreRoute" class="form-group">
<?php
$onchange = $patient_prescription_grid->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_grid->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription_grid->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->PreRoute->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription_grid->PreRoute->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_grid->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription_grid->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription_grid->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
	fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
});
</script>
<?php echo $patient_prescription_grid->PreRoute->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_PreRoute") ?>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_PreRoute">
<span<?php echo $patient_prescription_grid->PreRoute->viewAttributes() ?>><?php echo $patient_prescription_grid->PreRoute->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking" <?php echo $patient_prescription_grid->TimeOfTaking->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $patient_prescription_grid->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_grid->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription_grid->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->TimeOfTaking->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription_grid->TimeOfTaking->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_grid->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription_grid->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription_grid->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
	fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
});
</script>
<?php echo $patient_prescription_grid->TimeOfTaking->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_TimeOfTaking") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $patient_prescription_grid->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_grid->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription_grid->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->TimeOfTaking->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription_grid->TimeOfTaking->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_grid->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription_grid->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription_grid->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
	fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
});
</script>
<?php echo $patient_prescription_grid->TimeOfTaking->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_TimeOfTaking") ?>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription_grid->TimeOfTaking->viewAttributes() ?>><?php echo $patient_prescription_grid->TimeOfTaking->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $patient_prescription_grid->Type->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription_grid->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type"<?php echo $patient_prescription_grid->Type->editAttributes() ?>>
			<?php echo $patient_prescription_grid->Type->selectOptionListHtml("x{$patient_prescription_grid->RowIndex}_Type") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription_grid->Type->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription_grid->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type"<?php echo $patient_prescription_grid->Type->editAttributes() ?>>
			<?php echo $patient_prescription_grid->Type->selectOptionListHtml("x{$patient_prescription_grid->RowIndex}_Type") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Type">
<span<?php echo $patient_prescription_grid->Type->viewAttributes() ?>><?php echo $patient_prescription_grid->Type->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription_grid->Type->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription_grid->Type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription_grid->Type->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription_grid->Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_prescription_grid->mrnno->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_mrnno" class="form-group">
<span<?php echo $patient_prescription_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_mrnno" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->mrnno->EditValue ?>"<?php echo $patient_prescription_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_mrnno" class="form-group">
<span<?php echo $patient_prescription_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_mrnno">
<span<?php echo $patient_prescription_grid->mrnno->viewAttributes() ?>><?php echo $patient_prescription_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_prescription_grid->Age->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Age" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->Age->EditValue ?>"<?php echo $patient_prescription_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Age" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->Age->EditValue ?>"<?php echo $patient_prescription_grid->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Age">
<span<?php echo $patient_prescription_grid->Age->viewAttributes() ?>><?php echo $patient_prescription_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_prescription_grid->Gender->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Gender" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->Gender->EditValue ?>"<?php echo $patient_prescription_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Gender" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->Gender->EditValue ?>"<?php echo $patient_prescription_grid->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Gender">
<span<?php echo $patient_prescription_grid->Gender->viewAttributes() ?>><?php echo $patient_prescription_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $patient_prescription_grid->profilePic->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_profilePic" class="form-group">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription_grid->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->profilePic->editAttributes() ?>><?php echo $patient_prescription_grid->profilePic->EditValue ?></textarea>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription_grid->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_profilePic" class="form-group">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription_grid->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->profilePic->editAttributes() ?>><?php echo $patient_prescription_grid->profilePic->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_profilePic">
<span<?php echo $patient_prescription_grid->profilePic->viewAttributes() ?>><?php echo $patient_prescription_grid->profilePic->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription_grid->profilePic->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription_grid->profilePic->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription_grid->profilePic->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription_grid->profilePic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $patient_prescription_grid->Status->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription_grid->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status"<?php echo $patient_prescription_grid->Status->editAttributes() ?>>
			<?php echo $patient_prescription_grid->Status->selectOptionListHtml("x{$patient_prescription_grid->RowIndex}_Status") ?>
		</select>
</div>
<?php echo $patient_prescription_grid->Status->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_Status") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription_grid->Status->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription_grid->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status"<?php echo $patient_prescription_grid->Status->editAttributes() ?>>
			<?php echo $patient_prescription_grid->Status->selectOptionListHtml("x{$patient_prescription_grid->RowIndex}_Status") ?>
		</select>
</div>
<?php echo $patient_prescription_grid->Status->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_Status") ?>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_Status">
<span<?php echo $patient_prescription_grid->Status->viewAttributes() ?>><?php echo $patient_prescription_grid->Status->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription_grid->Status->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription_grid->Status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription_grid->Status->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription_grid->Status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy" <?php echo $patient_prescription_grid->CreatedBy->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_CreatedBy" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->CreatedBy->EditValue ?>"<?php echo $patient_prescription_grid->CreatedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_CreatedBy" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->CreatedBy->EditValue ?>"<?php echo $patient_prescription_grid->CreatedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_CreatedBy">
<span<?php echo $patient_prescription_grid->CreatedBy->viewAttributes() ?>><?php echo $patient_prescription_grid->CreatedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime" <?php echo $patient_prescription_grid->CreateDateTime->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_CreateDateTime" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->CreateDateTime->EditValue ?>"<?php echo $patient_prescription_grid->CreateDateTime->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_CreateDateTime" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->CreateDateTime->EditValue ?>"<?php echo $patient_prescription_grid->CreateDateTime->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription_grid->CreateDateTime->viewAttributes() ?>><?php echo $patient_prescription_grid->CreateDateTime->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy" <?php echo $patient_prescription_grid->ModifiedBy->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_ModifiedBy" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->ModifiedBy->EditValue ?>"<?php echo $patient_prescription_grid->ModifiedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_ModifiedBy" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->ModifiedBy->EditValue ?>"<?php echo $patient_prescription_grid->ModifiedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription_grid->ModifiedBy->viewAttributes() ?>><?php echo $patient_prescription_grid->ModifiedBy->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime" <?php echo $patient_prescription_grid->ModifiedDateTime->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription_grid->ModifiedDateTime->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription_grid->ModifiedDateTime->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_prescription_grid->RowCount ?>_patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription_grid->ModifiedDateTime->viewAttributes() ?>><?php echo $patient_prescription_grid->ModifiedDateTime->getViewValue() ?></span>
</span>
<?php if (!$patient_prescription->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="fpatient_prescriptiongrid$x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="fpatient_prescriptiongrid$o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_grid->ListOptions->render("body", "right", $patient_prescription_grid->RowCount);
?>
	</tr>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD || $patient_prescription->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_prescriptiongrid", "load"], function() {
	fpatient_prescriptiongrid.updateLists(<?php echo $patient_prescription_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_prescription_grid->isGridAdd() || $patient_prescription->CurrentMode == "copy")
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
		$patient_prescription->RowAttrs->merge(["data-rowindex" => $patient_prescription_grid->RowIndex, "id" => "r0_patient_prescription", "data-rowtype" => ROWTYPE_ADD]);
		$patient_prescription->RowAttrs->appendClass("ew-template");
		$patient_prescription->RowType = ROWTYPE_ADD;

		// Render row
		$patient_prescription_grid->renderRow();

		// Render list options
		$patient_prescription_grid->renderListOptions();
		$patient_prescription_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_grid->ListOptions->render("body", "left", $patient_prescription_grid->RowIndex);
?>
	<?php if ($patient_prescription_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_id" class="form-group patient_prescription_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_id" class="form-group patient_prescription_id">
<span<?php echo $patient_prescription_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x<?php echo $patient_prescription_grid->RowIndex ?>_id" id="x<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_grid->RowIndex ?>_id" id="o<?php echo $patient_prescription_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_prescription->isConfirm()) { ?>
<?php if ($patient_prescription_grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->Reception->EditValue ?>"<?php echo $patient_prescription_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_prescription->isConfirm()) { ?>
<?php if ($patient_prescription_grid->PatientId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->PatientId->EditValue ?>"<?php echo $patient_prescription_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_grid->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->PatientName->EditValue ?>"<?php echo $patient_prescription_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<span<?php echo $patient_prescription_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$onchange = $patient_prescription_grid->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_grid->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription_grid->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_grid->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription_grid->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_prescription_grid->Medicine->ReadOnly || $patient_prescription_grid->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription_grid->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
	fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine","forceSelect":false});
});
</script>
<?php echo $patient_prescription_grid->Medicine->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_Medicine") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<span<?php echo $patient_prescription_grid->Medicine->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->Medicine->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_grid->Medicine->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->M->Visible) { // M ?>
		<td data-name="M">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_M" class="form-group patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->M->EditValue ?>"<?php echo $patient_prescription_grid->M->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_M" class="form-group patient_prescription_M">
<span<?php echo $patient_prescription_grid->M->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->M->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_grid->RowIndex ?>_M" id="x<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription_grid->M->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_grid->RowIndex ?>_M" id="o<?php echo $patient_prescription_grid->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription_grid->M->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->A->Visible) { // A ?>
		<td data-name="A">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_A" class="form-group patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->A->EditValue ?>"<?php echo $patient_prescription_grid->A->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_A" class="form-group patient_prescription_A">
<span<?php echo $patient_prescription_grid->A->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->A->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_grid->RowIndex ?>_A" id="x<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription_grid->A->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_grid->RowIndex ?>_A" id="o<?php echo $patient_prescription_grid->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription_grid->A->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->N->Visible) { // N ?>
		<td data-name="N">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_N" class="form-group patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_grid->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->N->EditValue ?>"<?php echo $patient_prescription_grid->N->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_N" class="form-group patient_prescription_N">
<span<?php echo $patient_prescription_grid->N->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->N->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_grid->RowIndex ?>_N" id="x<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription_grid->N->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_grid->RowIndex ?>_N" id="o<?php echo $patient_prescription_grid->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription_grid->N->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->NoOfDays->EditValue ?>"<?php echo $patient_prescription_grid->NoOfDays->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<span<?php echo $patient_prescription_grid->NoOfDays->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->NoOfDays->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_grid->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription_grid->NoOfDays->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$onchange = $patient_prescription_grid->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_grid->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription_grid->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->PreRoute->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription_grid->PreRoute->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_grid->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription_grid->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription_grid->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
	fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
});
</script>
<?php echo $patient_prescription_grid->PreRoute->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_PreRoute") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<span<?php echo $patient_prescription_grid->PreRoute->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->PreRoute->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_grid->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_grid->PreRoute->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$onchange = $patient_prescription_grid->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_grid->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription_grid->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->TimeOfTaking->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription_grid->TimeOfTaking->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_grid->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription_grid->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription_grid->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
	fpatient_prescriptiongrid.createAutoSuggest({"id":"x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
});
</script>
<?php echo $patient_prescription_grid->TimeOfTaking->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_TimeOfTaking") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription_grid->TimeOfTaking->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->TimeOfTaking->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_grid->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_grid->TimeOfTaking->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Type->Visible) { // Type ?>
		<td data-name="Type">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Type" class="form-group patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription_grid->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type"<?php echo $patient_prescription_grid->Type->editAttributes() ?>>
			<?php echo $patient_prescription_grid->Type->selectOptionListHtml("x{$patient_prescription_grid->RowIndex}_Type") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Type" class="form-group patient_prescription_Type">
<span<?php echo $patient_prescription_grid->Type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->Type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription_grid->Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription_grid->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_prescription->isConfirm()) { ?>
<?php if ($patient_prescription_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->mrnno->EditValue ?>"<?php echo $patient_prescription_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->Age->EditValue ?>"<?php echo $patient_prescription_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Age" class="form-group patient_prescription_Age">
<span<?php echo $patient_prescription_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->Gender->EditValue ?>"<?php echo $patient_prescription_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<span<?php echo $patient_prescription_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription_grid->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription_grid->profilePic->editAttributes() ?>><?php echo $patient_prescription_grid->profilePic->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<span<?php echo $patient_prescription_grid->profilePic->viewAttributes() ?>><?php echo $patient_prescription_grid->profilePic->ViewValue ?></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription_grid->profilePic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_grid->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription_grid->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->Status->Visible) { // Status ?>
		<td data-name="Status">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Status" class="form-group patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription_grid->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status"<?php echo $patient_prescription_grid->Status->editAttributes() ?>>
			<?php echo $patient_prescription_grid->Status->selectOptionListHtml("x{$patient_prescription_grid->RowIndex}_Status") ?>
		</select>
</div>
<?php echo $patient_prescription_grid->Status->Lookup->getParamTag($patient_prescription_grid, "p_x" . $patient_prescription_grid->RowIndex . "_Status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Status" class="form-group patient_prescription_Status">
<span<?php echo $patient_prescription_grid->Status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->Status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="x<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription_grid->Status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" id="o<?php echo $patient_prescription_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription_grid->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->CreatedBy->EditValue ?>"<?php echo $patient_prescription_grid->CreatedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<span<?php echo $patient_prescription_grid->CreatedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->CreatedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription_grid->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->CreateDateTime->EditValue ?>"<?php echo $patient_prescription_grid->CreateDateTime->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription_grid->CreateDateTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->CreateDateTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->CreateDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->ModifiedBy->EditValue ?>"<?php echo $patient_prescription_grid->ModifiedBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription_grid->ModifiedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->ModifiedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime">
<?php if (!$patient_prescription->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_grid->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription_grid->ModifiedDateTime->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription_grid->ModifiedDateTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_grid->ModifiedDateTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription_grid->ModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_grid->ListOptions->render("body", "right", $patient_prescription_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_prescriptiongrid", "load"], function() {
	fpatient_prescriptiongrid.updateLists(<?php echo $patient_prescription_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_prescription_grid->Recordset)
	$patient_prescription_grid->Recordset->Close();
?>
<?php if ($patient_prescription_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_prescription_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_prescription_grid->TotalRecords == 0 && !$patient_prescription->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_prescription_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_prescription_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");

	 var c = document.getElementById("el_ip_admission_profilePic").children;
	 var d = c[0].children;
	 var evalue = c[0].innerText;

	 //document.getElementById("profilePicturePatient").src = 'uploads/' + evalue;
		var myParent =  document.getElementById("tpd_ip_admissionmaster");
		var t = document.createTextNode("Select Drug Template : ");
		myParent.appendChild(t);

	//Create array of options to be added
	var array = ["Volvo","Saab","Mercades","Audi"];

	//Create and append select list
	var selectList = document.createElement("select");
	selectList.id = "mySelect";
	myParent.appendChild(selectList);

	//Create and append the options
	//for (var i = 0; i < array.length; i++) {
	//    var option = document.createElement("option");
	//    option.value = array[i];
	//    option.text = array[i];
	//    selectList.appendChild(option);
	//}

		var btn = document.createElement("BUTTON");   // Create a <button> element
		btn.innerHTML = "Select";                   // Insert text
		btn.addEventListener("click", myScriptSelect);
	myParent.appendChild(btn);               // Append <button> to <body>
			var user = [{
				'CustomerName': '<?php  echo CurrentUserName();  ?>'                    
			}];

		//v
			var jsonString = JSON.stringify(user);
				$.ajax({
					type: "POST",
					url: "ajaxinsert.php?control=selectTemplatePRE",
					data: { data: jsonString },
					cache: false,
					success: function (data) {
						let jsonObject = JSON.parse(data);
						var json = jsonObject["records"];
						for(var i = 0; i < json.length; i++) {
							var obj = json[i];
							console.log(obj.id);
							 var option = document.createElement("option");
		option.value = obj.TemplateName;
		option.text = obj.TemplateName;
		selectList.appendChild(option);
						  }

						//alert(data + "Saved Sucessfully...........");
						//swal({ text: "Saved Sucessfully......", icon: "success", });
					   // Receiptreset();
					  //  document.getElementById("VoucherAmt0").focus();

					}
				});
		for (var i = 0; i < 20; i++) {
			var kkk = $('*[data-caption="Add Blank Row"]')
			ew.addGridRow(kkk);
		}

		function myScriptSelect() {

		   // alert("hai");
	//n

			var hhhh = document.getElementById("mySelect");
					var user = [{
						'CustomerName': '<?php  echo CurrentUserName();  ?>',
						'TemplateName': hhhh.value
			}];

		//v
			var jsonString = JSON.stringify(user);
				$.ajax({
					type: "POST",
					url: "ajaxinsert.php?control=selectTemplatePREItem",
					data: { data: jsonString },
					cache: false,
					success: function (data) {
						let jsonObject = JSON.parse(data);
						var json = jsonObject["records"];
						for(var i = 0; i < json.length; i++) {
							var obj = json[i];
							console.log(obj.id);
							 var option = document.createElement("option");
		option.value = obj.TemplateName;
		option.text = obj.TemplateName;
							selectList.appendChild(option);
							var Medicine = document.getElementById("sv_x"+(i+1)+"_Medicine");
							Medicine.value = obj.Medicine;
							Medicine.innerHTML  = obj.Medicine;
							Medicine.selectedIndex = obj.Medicine;
							Medicine.value = obj.Medicine;
							Medicine.text = obj.Medicine;
							var Medicine = document.getElementById("x"+(i+1)+"_Medicine");
							Medicine.value = obj.Medicine;
							var M = document.getElementById("x"+(i+1)+"_M");
							M.value = obj.M;
							var A = document.getElementById("x"+(i+1)+"_A");
							A.value = obj.A;
							var N = document.getElementById("x"+(i+1)+"_N");
							N.value = obj.N;
							var NoOfDays = document.getElementById("x"+(i+1)+"_NoOfDays");
							NoOfDays.value = obj.NoOfDays;
							var PreRoute = document.getElementById("sv_x"+(i+1)+"_PreRoute");
							PreRoute.value = obj.PreRoute;
							  var PreRoute = document.getElementById("x"+(i+1)+"_PreRoute");
							PreRoute.value = obj.PreRoute;
							var TimeOfTaking = document.getElementById("sv_x"+(i+1)+"_TimeOfTaking");
							TimeOfTaking.value = obj.TimeOfTaking;
								var TimeOfTaking = document.getElementById("x"+(i+1)+"_TimeOfTaking");
							TimeOfTaking.value = obj.TimeOfTaking;
							   var TimeOfTaking = document.getElementById("x"+(i+1)+"_Type");
							TimeOfTaking.value = 'Normal';
							var TimeOfTaking = document.getElementById("x"+(i+1)+"_Status");
							TimeOfTaking.value = 'Live';
						  }

						//alert(data + "Saved Sucessfully...........");
						//swal({ text: "Saved Sucessfully......", icon: "success", });
					   // Receiptreset();
					  //  document.getElementById("VoucherAmt0").focus();

					}
				});
		}
	 </script>
	<style>
	.input-group {
		position: relative;
		display: flex;
		flex-wrap: unset;
		align-items: stretch;
		width: 100%;
	}
	.ew-grid .ew-table>tbody>tr>td, .ew-grid .ew-table>tfoot>tr>td {
		padding: .0rem;
		border-bottom: 1px solid;
		border-top: 0;
		border-left: 0;
		border-right: 1px solid;
		border-color: silver;
	}
	.text-nowrap {
		white-space: nowrap !important;
		line-height: 1;
		height: 33px;
	}
	</style>
	<script>
	jQuery("#tpd_patient_prescriptionlist th.ew-list-option-header").each(function() {this.rowSpan = 1});
	jQuery("#tpd_patient_prescriptionlist td.ew-list-option-body").each(function() {this.rowSpan = 1});
});
</script>
<?php if (!$patient_prescription->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_prescription",
		width: "100%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_prescription_grid->terminate();
?>